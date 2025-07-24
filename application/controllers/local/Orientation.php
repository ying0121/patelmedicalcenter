<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');
class Orientation extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AreaToggle_model');
        $this->load->model('Content_model');
        $this->load->model('ContactInfo_model');

        $this->load->model('Document_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'orientation';
        $data['contact_info'] = $this->ContactInfo_model->read();

        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();

        $this->load->view('local/orientation/main', $data);
    }

    public function updateOrientationDesc()
    {
        $title_en = $this->input->post('title_en');
        $title_es = $this->input->post('title_es');
        $this->Content_model->updateComponent('t_orientation_title', $title_en, $title_es);

        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $result = $this->Content_model->updateComponent('t_orientation_desc', $desc_en, $desc_es);
        if ($result)
            echo "ok";
    }
    public function read()
    {
        $result = $this->Document_model->readPageDocuments('Orientation');
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function create()
    {
        $entitle = $this->input->post('entitle');
        $estitle = $this->input->post('estitle');
        $endesc = $this->input->post('endesc');
        $esdesc = $this->input->post('esdesc');

        $result = $this->Document_model->create('Orientation', $entitle, $estitle, $endesc, $esdesc);
        if ($result)
            echo "ok";
    }
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    public function uploadDocument()
    {
        $id = $this->input->post('id');

        $filename1 = "en_" . generateRandomString(10);
        $config1['upload_path']          = './assets/documents/';
        $config1['allowed_types']        = '*';
        $config1['max_size']             = 20480000;
        $config1['file_name']             = $filename1;
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $result1 = $this->upload->do_upload('enfile');
        $enfile = null;
        if ($result1) {
            $data = array('upload_data' => $this->upload->data());
            $enfile = $data['upload_data']['orig_name'];
            $en_size = $data['upload_data']['file_size'] . ' KB';

            $chosen = $this->Document_model->choose($id);
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/documents/" . $chosen['en_doc']);
        }

        $filename2 = "es_" . generateRandomString(10);
        $config2['upload_path']          = './assets/documents/';
        $config2['allowed_types']        = '*';
        $config2['max_size']             = 20480000;
        $config2['file_name']             = $filename2;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $result2 = $this->upload->do_upload('esfile');
        $esfile = null;
        if ($result2) {
            $data = array('upload_data' => $this->upload->data());
            $esfile = $data['upload_data']['orig_name'];
            $es_size = $data['upload_data']['file_size'] . ' KB';

            $chosen = $this->Document_model->choose($id);
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/documents/" . $chosen['es_doc']);
        }

        $result = $this->Document_model->upload($id, $enfile, $esfile, $en_size, $es_size);
        if ($result)
            echo "ok";
    }
    public function update()
    {
        $id = $this->input->post('id');
        $entitle = $this->input->post('entitle');
        $estitle = $this->input->post('estitle');
        $endesc = $this->input->post('endesc');
        $esdesc = $this->input->post('esdesc');

        $result = $this->Document_model->update($id, $entitle, $estitle, $endesc, $esdesc);
        if ($result)
            echo "ok";
    }
    public function choose()
    {
        $id = $this->input->post('id');
        $result = $this->Document_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $chosen = $this->Document_model->choose($id);
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/documents/" . $chosen['es_doc']);
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/documents/" . $chosen['en_doc']);
        $result = $this->Document_model->delete($id);
        if ($result)
            echo "ok";
    }
}
