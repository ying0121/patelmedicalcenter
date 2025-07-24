<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class AreaToggle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AreaToggle_model');
    }

    public function choose()
    {
        $area_id = $this->input->post('area_id');
        echo json_encode($this->AreaToggle_model->choose($area_id));
    }

    public function update()
    {
        $area_id = $this->input->post('area_id');
        $status = $this->input->post('status');
        $result = $this->AreaToggle_model->update($area_id, $status);
        if ($result)
            echo "ok";
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }
}
