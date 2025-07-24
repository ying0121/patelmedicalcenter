<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Security extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Security_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index() {}

    public function add()
    {
        $data['en'] = $_POST['en'];
        $data['es'] = $_POST['es'];
        $data['status'] = $_POST['status'];
        $result = $this->Security_model->add($data);
        switch ($result) {
            case 0:
                echo json_encode(array('status' => 'error'));
                break;
            case 1:
                echo json_encode(array('status' => 'success'));
                break;
            case 2:
                echo json_encode(array('status' => 'exist'));
        }
    }

    public function read()
    {
        $result = $this->Security_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readOnlyActive()
    {
        $result = $this->Security_model->readOnlyActive();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['en'] = $_POST['en'];
        $data['es'] = $_POST['es'];
        $data['status'] = $_POST['status'];
        $result = $this->Security_model->update($data);
        switch ($result) {
            case 0:
                echo json_encode(array('status' => 'error'));
                break;
            case 1:
                echo json_encode(array('status' => 'success'));
                break;
            case 2:
                echo json_encode(array('status' => 'exist'));
        }
    }

    function choose()
    {
        $data['id'] = $_POST['id'];
        $result = $this->Security_model->choose($data);
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    function delete()
    {
        $data['id'] = $_POST['id'];
        $result = $this->Security_model->delete($data);
        if ($result) {
            echo json_encode(array('status' => 'ok'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    function addUserSecurity()
    {
        $data['user_id'] = $_POST['user_id'];
        $data['user_type'] = $_POST['user_type'];
        $data['question_id'] = $_POST['question_id'];
        $data['answer'] = $_POST['answer'];

        // check if exist
        $result = $this->Security_model->getUserSecurity($data);
        if ($result[0]) {
            $result = $this->Security_model->updateUserSecurity($data);
            if ($result) {
                echo 'ok';
            } else {
                echo 'error';
            }
        } else {
            $result = $this->Security_model->addUserSecurity($data);
            if ($result) {
                echo 'ok';
            } else {
                echo 'error';
            }
        }

        echo '';
    }
}
