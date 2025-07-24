<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');

class Education extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('AreaToggle_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('ConectorApi_model');
        $this->load->model('Language_model');
        $this->load->model('Education_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'education';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['api'] = $this->ConectorApi_model->read();
        $data['languages'] = $this->Language_model->read();

        $this->load->view('local/education/main', $data);
    }

    // video
    public function readVideo()
    {
        $tag = $_POST['tag'];
        $res = $this->Education_model->readVideo($tag);
        echo json_encode(array("data" => $res));
    }
    public function readVideoById()
    {
        $id = $_POST['id'];
        $res = $this->Education_model->readVideoById($id);
        echo json_encode($res);
    }
    public function addVideo()
    {
        $data['title_en'] = $_POST['title_en'];
        $data['title_es'] = $_POST['title_es'];
        $data['url_en'] = $_POST['url_en'];
        $data['url_es'] = $_POST['url_es'];
        $data['status'] = $_POST['status'];
        $data['tag'] = $_POST['tag'];
        $res = $this->Education_model->addVideo($data);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }
    public function updateVideo()
    {
        $id = $_POST['id'];
        $data['title_en'] = $_POST['title_en'];
        $data['title_es'] = $_POST['title_es'];
        $data['url_en'] = $_POST['url_en'];
        $data['url_es'] = $_POST['url_es'];
        $data['status'] = $_POST['status'];
        $data['tag'] = $_POST['tag'];
        $res = $this->Education_model->updateVideo($data, $id);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }
    public function deleteVideo()
    {
        $id = $_POST['id'];
        $tag = $_POST['tag'];
        $res = $this->Education_model->deleteVideo($id, $tag);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // document
    public function readDocument()
    {
        $tag = $_POST['tag'];
        $res = $this->Education_model->readDocument($tag);
        echo json_encode(array("data" => $res));
    }
    public function readDocumentById()
    {
        $id = $_POST['id'];
        $res = $this->Education_model->readDocumentById($id);
        echo json_encode($res);
    }
    public function addDocument()
    {
        $data['title_en'] = $_POST['title_en'];
        $data['title_es'] = $_POST['title_es'];
        $data['desc_en'] = $_POST['desc_en'];
        $data['desc_es'] = $_POST['desc_es'];
        $data['status'] = $_POST['status'];
        $data['tag'] = $_POST['tag'];
        $res = $this->Education_model->addDocument($data);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }
    public function updateDocument()
    {
        $id = $_POST['id'];
        $data['title_en'] = $_POST['title_en'];
        $data['title_es'] = $_POST['title_es'];
        $data['desc_en'] = $_POST['desc_en'];
        $data['desc_es'] = $_POST['desc_es'];
        $data['status'] = $_POST['status'];
        $data['tag'] = $_POST['tag'];
        $res = $this->Education_model->updateDocument($data, $id);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }
    public function deleteDocument()
    {
        $id = $_POST['id'];
        $tag = $_POST['tag'];
        $res = $this->Education_model->deleteDocument($id, $tag);
        if ($res) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // upload file
    public function uploadFiles()
    {
        $id = $_POST['id'];
        $chosen = $this->Education_model->readDocumentById($id);
        $res = "";

        $filename = generateRandomString(10);
        $config['upload_path']          = './assets/education/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // english file
        if ($this->upload->do_upload('file_en')) {
            $data = array('upload_data' => $this->upload->data());
            $oldFilePath = $_SERVER["DOCUMENT_ROOT"] . "/assets/education/" . $chosen['url_en'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            $res = $this->Education_model->uploadFile("en", $id, $data['upload_data']['orig_name']);
        } else {
            $res = $this->upload->display_errors();
        }

        // spanish file
        if ($this->upload->do_upload('file_es')) {
            $data = array('upload_data' => $this->upload->data());
            $oldFilePath = $_SERVER["DOCUMENT_ROOT"] . "/assets/education/" . $chosen['url_es'];
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
            $res = $this->Education_model->uploadFile("es", $id, $data['upload_data']['orig_name']);
        } else {
            $res = $this->upload->display_errors();
        }

        if ($res) {
            echo json_encode(array("msg" => "ok"));
        } else {
            echo json_encode(array("msg" => "error"));
        }
    }
}
