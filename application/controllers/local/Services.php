<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');

class Services extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('Service_model');
    }

    function index()
    {
        $data['component'] = $this->Content_model->getComponentTexts();
        $this->load->view('local/service/main', $data);
    }

    // clinic service
    function getClinicService()
    {
        $filter['category'] = $_POST['category'];
        $filter['language'] = $_POST['language'];
        $result = $this->Service_model->getClinicService($filter);
        echo json_encode(array('data' => $result));
    }

    function addClinicService()
    {
        $data = array(
            'language' => $_POST['language'],
            'category' => $_POST['category'],
            'title' => $_POST['title'],
            'short_desc' => $_POST['short_desc'],
            'long_desc' => $_POST['long_desc'],
            'status' => $_POST['status'],
            'request_service' => $_POST['request_service'],
            'online_payment' => $_POST['online_payment'],
            'home_page' => $_POST['home_page'],
            'cost' => $_POST['cost']
        );
        $result = $this->Service_model->addClinicService($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function updateClinicService()
    {
        $data = array(
            'id' => $_POST['id'],
            'language' => $_POST['language'],
            'category' => $_POST['category'],
            'title' => $_POST['title'],
            'short_desc' => $_POST['short_desc'],
            'long_desc' => $_POST['long_desc'],
            'status' => $_POST['status'],
            'request_service' => $_POST['request_service'],
            'online_payment' => $_POST['online_payment'],
            'home_page' => $_POST['home_page'],
            'cost' => $_POST['cost']
        );
        $result = $this->Service_model->updateClinicService($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function chosenClinicService()
    {
        $result = $this->Service_model->chosenClinicService($_POST['id']);
        echo json_encode(array('data' => $result));
    }

    function deleteClinicService()
    {
        // delete image and video
        $chosen = $this->Service_model->chosenClinicService($_POST['id']);
        if ($chosen["image"]) {
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/service/image/" . $chosen["image"]);
        }
        if ($chosen["video"]) {
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/service/video/" . $chosen["video"]);
        }

        $result = $this->Service_model->deleteClinicService($_POST['id']);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // service category
    function getServiceCategory()
    {
        $result = $this->Service_model->getServiceCategory();
        echo json_encode(array('data' => $result));
    }

    function addServiceCategory()
    {
        $data = array(
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'status' => $_POST['status']
        );
        $result = $this->Service_model->addServiceCategory($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function updateServiceCategory()
    {
        $data = array(
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'desc' => $_POST['desc'],
            'status' => $_POST['status']
        );
        $result = $this->Service_model->updateServiceCategory($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function chosenServiceCategory()
    {
        $result = $this->Service_model->chosenServiceCategory($_POST['id']);
        echo json_encode(array('data' => $result));
    }

    function deleteServiceCategory()
    {
        $result = $this->Service_model->deleteServiceCategory($_POST['id']);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    // upload file
    function uploadServiceFile()
    {
        $file_type = $_POST['type'];
        $id = $_POST['id'];

        $filename = generateRandomString(10);
        $config['upload_path']          = "./assets/service/" . $file_type . "/";
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

            $chosen = $this->Service_model->chosenClinicService($id);
            if ($chosen[$file_type]) {
                unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/service/" . $file_type . "/" . $chosen[$file_type]);
            }

            $result = $this->Service_model->updateFileName($id, $data['upload_data']['orig_name'], $file_type);

            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        }
    }

    // get desc
    function getDesc()
    {
        $result = $this->Service_model->getDesc();
        echo json_encode($result);
    }

    function updateDesc()
    {
        $data = array(
            'en' => $_POST['en'],
            'es' => $_POST['es']
        );
        $result = $this->Service_model->updateDesc($data);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }
}
