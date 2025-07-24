<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');

class Letters extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('AreaToggle_model');
        $this->load->model('Content_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Letters_model');

        $this->load->model('Metrics_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'letter';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['contact_info'] = $this->ContactInfo_model->read();

        $this->load->view('local/letter/main', $data);
    }

    // letters
    function readLetters()
    {
        $filter['category'] = $_POST['category'];
        $filter['language'] = $_POST['language'];
        $result = $this->Letters_model->readLetters($filter);
        echo json_encode(array('data' => $result));
    }

    function addLetters()
    {
        $data = array(
            'language' => $_POST['language'],
            'icon' => $_POST['icon'],
            'category' => $_POST['category'],
            'title' => $_POST['title'],
            'short_desc' => $_POST['short_desc'],
            'long_desc' => $_POST['long_desc'],
            'status' => $_POST['status'],
            'request_letter' => $_POST['request_letter']
        );
        $result = $this->Letters_model->addLetters($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function updateLetters()
    {
        $data = array(
            'id' => $_POST['id'],
            'language' => $_POST['language'],
            'icon' => $_POST['icon'],
            'category' => $_POST['category'],
            'title' => $_POST['title'],
            'short_desc' => $_POST['short_desc'],
            'long_desc' => $_POST['long_desc'],
            'status' => $_POST['status'],
            'request_letter' => $_POST['request_letter']
        );
        $result = $this->Letters_model->updateLetters($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function chosenLetters()
    {
        $result = $this->Letters_model->chosenLetters($_POST['id']);
        echo json_encode(array('data' => $result));
    }

    function deleteLetters()
    {
        // delete image and video
        $chosen = $this->Letters_model->chosenLetters($_POST['id']);
        if ($chosen["image"]) {
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/letter/image/" . $chosen["image"]);
        }
        if ($chosen["video"]) {
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/letter/video/" . $chosen["video"]);
        }

        $result = $this->Letters_model->deleteLetters($_POST['id']);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // letter category
    public function readLetterCategory()
    {
        $lang = $_POST['lang'];
        $result = $this->Letters_model->readLetterCategory($lang);
        echo json_encode(array('data' => $result));
    }

    public function addLetterCategory()
    {
        $data['lang'] = $_POST['lang'];
        $data['name'] = $_POST['name'];
        $data['desc'] = $_POST['desc'];
        $data['status'] = $_POST['status'];

        $result = $this->Letters_model->addLetterCategory($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function editLetterCategory()
    {
        $id = $_POST['id'];
        $data['lang'] = $_POST['lang'];
        $data['name'] = $_POST['name'];
        $data['desc'] = $_POST['desc'];
        $data['status'] = $_POST['status'];

        $result = $this->Letters_model->editLetterCategory($data, $id);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    public function chosenLetterCategory()
    {
        $id = $_POST['id'];

        $result = $this->Letters_model->chosenLetterCategory($id);
        echo json_encode($result);
    }

    public function deleteLetterCategory()
    {
        $id = $_POST['id'];

        $result = $this->Letters_model->deleteLetterCategory($id);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // upload file
    function uploadLetterFile()
    {
        $file_type = $_POST['type'];
        $id = $_POST['id'];

        $filename = generateRandomString(10);
        $config['upload_path']          = "./assets/letter/" . $file_type . "/";
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());

            $chosen = $this->Letters_model->chosenLetters($id);
            if ($chosen[$file_type]) {
                unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/letter/" . $file_type . "/" . $chosen[$file_type]);
            }

            $result = $this->Letters_model->updateFileName($id, $data['upload_data']['orig_name'], $file_type);

            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        }
    }

    // get desc
    function getLetterDescription()
    {
        $lang = $_POST['lang'];
        $result = $this->Letters_model->getLetterDescription($lang);
        echo json_encode($result);
    }

    function updateLetterDescription()
    {
        $data['lang'] = $_POST['lang'];
        $data['desc'] = $_POST['desc'];
        $result = $this->Letters_model->updateLetterDescription($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }
}
