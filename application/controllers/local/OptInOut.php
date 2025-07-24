<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class OptInOut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Optinout_model');
        $this->load->model('Content_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index() {}

    public function updateOptInOutText()
    {
        $data['opt_header_en'] = $_POST['opt_header_en'];
        $data['opt_header_es'] = $_POST['opt_header_sp'];
        $data['opt_in_en'] = $_POST['opt_in_en'];
        $data['opt_in_es'] = $_POST['opt_in_sp'];
        $data['opt_out_en'] = $_POST['opt_out_en'];
        $data['opt_out_es'] = $_POST['opt_out_sp'];
        $data['opt_footer_en'] = $_POST['opt_footer_en'];
        $data['opt_footer_es'] = $_POST['opt_footer_sp'];
        $data['opt_more_en'] = $_POST['opt_more_en'];
        $data['opt_more_es'] = $_POST['opt_more_sp'];
        $result = $this->Optinout_model->updateOptInOutText($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function read()
    {
        $result = $this->Optinout_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
}
