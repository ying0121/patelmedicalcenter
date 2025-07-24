<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class ContactEmail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contactemail_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index() {}

    public function add()
    {
        $data['contact_name'] = $_POST['contact_name'];
        $data['email'] = $_POST['email'];
        $data['general_online'] = $_POST['general_online'];
        $data['specific_online'] = $_POST['specific_online'];
        $data['account_request'] = $_POST['account_request'];
        $data['payment_email'] = $_POST['payment_email'];
        $result = $this->Contactemail_model->add($data);
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
        $result = $this->Contactemail_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function update()
    {
        $data['id'] = $_POST['id'];
        $data['contact_name'] = $_POST['contact_name'];
        $data['email'] = $_POST['email'];
        $data['general_online'] = $_POST['general_online'];
        $data['specific_online'] = $_POST['specific_online'];
        $data['account_request'] = $_POST['account_request'];
        $data['payment_email'] = $_POST['payment_email'];
        $result = $this->Contactemail_model->update($data);
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
        $result = $this->Contactemail_model->choose($data);
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    function delete()
    {
        $data['id'] = $_POST['id'];
        $result = $this->Contactemail_model->delete($data);
        if ($result) {
            echo json_encode(array('status' => 'ok'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }
}
