<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class PageVideo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PageVideo_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {

        $data['sideitem'] = 'page_videos';
        $this->load->view('local/page_video/main', $data);
    }
    public function create()
    {
        $video = $this->input->post('video');
        $page = $this->input->post('page');
        $position = $this->input->post('position');
        $result = $this->PageVideo_model->create($video, $page, $position);
        if ($result)
            echo "ok";
    }

    public function read()
    {
        $result = $this->PageVideo_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function update()
    {
        $id = $this->input->post('id');
        $video = $this->input->post('video');
        $page = $this->input->post('page');
        $position = $this->input->post('position');
        $status = $this->input->post('status');

        $result = $this->PageVideo_model->update($id, $video, $page, $position, $status);
        if ($result)
            echo "ok";
    }

    function delete()
    {
        $id = $this->input->post('id');
        $result = $this->PageVideo_model->delete($id);
        if ($result)
            echo "ok";
    }

    function choose()
    {
        $id = $this->input->post('id');
        $result = $this->PageVideo_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
}
