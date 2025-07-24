<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class ContactReason extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contactreason_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index() {}

    public function add()
    {
        $data['en_name'] = $_POST['en_name'];
        $data['sp_name'] = $_POST['sp_name'];
        $result = $this->Contactreason_model->add($data);
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
        $result = $this->Contactreason_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['en_name'] = $_POST['en_name'];
        $data['sp_name'] = $_POST['sp_name'];
        $result = $this->Contactreason_model->update($data);
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
        $result = $this->Contactreason_model->choose($data);
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    function delete()
    {
        $data['id'] = $_POST['id'];
        $result = $this->Contactreason_model->delete($data);
        if ($result) {
            echo json_encode(array('status' => 'ok'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}
