<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Language extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('Language_model');

        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {
        $data['sideitem'] = 'language';
        $this->load->view('local/language/main', $data);
    }

    public function read()
    {
        $result = $this->Content_model->getLanguage();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function getAll()
    {
        $result = $this->Language_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function update()
    {
        $keyvalue = $this->input->post('keyvalue');
        $en = $this->input->post('en');
        $es = $this->input->post('es');

        $result = $this->Content_model->updateComponent($keyvalue, $en, $es);
        if ($result)
            echo "ok";
    }

    function choose()
    {
        $id = $this->input->post('id');
        $result = $this->Content_model->chooseComponent($id);
        if ($result)
            echo json_encode($result);
    }
}
