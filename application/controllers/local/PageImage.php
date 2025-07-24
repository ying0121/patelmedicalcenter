<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');
class PageImage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PageImage_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {

        $data['sideitem'] = 'page_images';
        $this->load->view('local/page_image/main', $data);
    }
    public function read()
    {
        $result = $this->PageImage_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function create()
    {
        $page = $this->input->post('page');
        $position = $this->input->post('position');
        $result = $this->PageImage_model->create($page, $position);
        if ($result)
            echo "ok";
    }
    public function update()
    {
        $original_id = $this->input->post('original_id');
        $id = $this->input->post('id');
        $page = $this->input->post('page');
        $position = $this->input->post('position');
        $status = $this->input->post('status');

        $title_en = $this->input->post('title_en');
        $desc_en = $this->input->post('desc_en');
        $title_es = $this->input->post('title_es');
        $desc_es = $this->input->post('desc_es');
        $result = $this->PageImage_model->update($original_id, $id, $page, $position, $title_en, $desc_en, $title_es, $desc_es, $status);
        if ($result)
            echo "ok";
    }
    public function upload()
    {
        $id = $this->input->post('id');
        $filename = generateRandomString(10);
        $config['upload_path']          = './assets/images/pageimgs/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (! $this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            echo "failed";
        } else {
            $data = array('upload_data' => $this->upload->data());
            $chosen = $this->PageImage_model->choose($id);
            if ($chosen['img'] != 'default.jpg')
                unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/pageimgs/" . $chosen['img']);
            $this->PageImage_model->upload($id, $data['upload_data']['orig_name']);
            echo "ok";
        }
    }
    function delete()
    {
        $id = $this->input->post('id');
        $chosen = $this->PageImage_model->choose($id);
        if ($chosen['img'] != 'default.jpg')
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/pageimgs/" . $chosen['img']);
        $result = $this->PageImage_model->delete($id);
        if ($result)
            echo "ok";
    }
    function choose()
    {
        $id = $this->input->post('id');
        $result = $this->PageImage_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
}
