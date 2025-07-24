<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');
class AboutUs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('AreaToggle_model');
        $this->load->model('Content_model');
        $this->load->model('ContactInfo_model');

        $this->load->model('Metrics_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {
        $data['sideitem'] = 'about_us';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['contact_info'] = $this->ContactInfo_model->read();

        $this->load->view('local/about_us/main', $data);
    }
    public function updateAboutClinic()
    {
        $en_desc = $this->input->post('en_desc');
        $es_desc = $this->input->post('es_desc');
        $en_fdesc = $this->input->post('en_fdesc');
        $es_fdesc = $this->input->post('es_fdesc');
        $result_1 = $this->Content_model->updateComponent('t_about_clinic_desc', $en_desc, $es_desc);
        $result_2 = $this->Content_model->updateComponent('t_about_clinic_fdesc', $en_fdesc, $es_fdesc);
        if ($result_1 && $result_2)
            echo "ok";
    }
    public function updateMetricsDesc()
    {
        $title_en = $this->input->post('title_en');
        $title_es = $this->input->post('title_es');
        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');

        $result_1 = $this->Content_model->updateComponent('t_quality_metrics_title', $title_en, $title_es);
        $result_2 = $this->Content_model->updateComponent('t_quality_metrics_desc', $desc_en, $desc_es);
        if ($result_1 && $result_2)
            echo "ok";
    }
    public function readQualityCategories()
    {
        $result = $this->Metrics_model->readQualityCategories();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function createQualityCategory()
    {
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $result = $this->Metrics_model->createQualityCategory($en, $es);
        if ($result)
            echo "ok";
    }
    public function chooseQualityCategory()
    {
        $id = $this->input->post('id');
        $result = $this->Metrics_model->chooseQualityCategory($id);
        if ($result)
            echo json_encode($result);
    }
    public function updateQualityCategory()
    {
        $id = $this->input->post('id');
        $en = $this->input->post('en');
        $es = $this->input->post('es');
        $status = $this->input->post('status');
        $result = $this->Metrics_model->updateQualityCategory($id, $en, $es, $status);
        if ($result)
            echo "ok";
    }
    public function deleteQualityCategory()
    {
        $id = $this->input->post('id');
        $result = $this->Metrics_model->deleteQualityCategory($id);
        if ($result)
            echo "ok";
    }
    public function measureByCategory()
    {
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('local', 'refresh');
        $data['sideitem'] = 'measuresbycat';
        $data['catid'] = $this->input->get('id');
        $data['topics'] = $this->Metrics_model->readQualityCategories();
        $this->load->view('local/about_us/measuresbycat', $data);
    }
    public function readMeasures()
    {
        $id = $this->input->post('id');
        $result = $this->Metrics_model->readMeasures($id);
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function deleteMeasure()
    {
        $id = $this->input->post('id');
        $result = $this->Metrics_model->deleteMeasure($id);
        if ($result)
            echo "ok";
    }
    public function chooseMeasure()
    {
        $id = $this->input->post('id');
        $result = $this->Metrics_model->chooseMeasure($id);
        if ($result)
            echo json_encode($result);
    }
    public function updateMeasure()
    {
        $id = $this->input->post('id');
        $measure_en = $this->input->post('measure_en');
        $measure_es = $this->input->post('measure_es');
        $topic = $this->input->post('topic');
        $denominator = $this->input->post('denominator');
        $numerator = $this->input->post('numerator');
        $sdate = $this->input->post('sdate');
        $edate = $this->input->post('edate');
        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $fdesc_en = $this->input->post('fdesc_en');
        $fdesc_es = $this->input->post('fdesc_es');
        $status = $this->input->post('status');
        $result = $this->Metrics_model->updateMeasure($id, $measure_en, $measure_es, $topic, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es, $status);
        if ($result)
            echo "ok";
    }
    public function createMeasure()
    {
        $id = $this->input->post('id');
        $measure_en = $this->input->post('measure_en');
        $measure_es = $this->input->post('measure_es');
        $denominator = $this->input->post('denominator');
        $numerator = $this->input->post('numerator');
        $sdate = $this->input->post('sdate');
        $edate = $this->input->post('edate');
        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $fdesc_en = $this->input->post('fdesc_en');
        $fdesc_es = $this->input->post('fdesc_es');
        $result = $this->Metrics_model->createMeasure($id, $measure_en, $measure_es, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es);
        if ($result)
            echo "ok";
    }
}
