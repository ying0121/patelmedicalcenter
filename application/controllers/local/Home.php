<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('AreaToggle_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Vault_model');
        $this->load->model('Patient_model');
        $this->load->model('ConectorApi_model');
        $this->load->model('Language_model');
        $this->load->model('Contacts_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {
        $data['sideitem'] = 'home';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['contact_info'] = $this->ContactInfo_model->read();
        $data['acronym'] = $data['contact_info']['acronym'];
        $data['api'] = $this->ConectorApi_model->read();
        $data['languages'] = $this->Language_model->read();

        $this->load->model('staff_model', 'staff_model');
        $data['staffs'] = $this->staff_model->read();
        $this->load->model('survey_model', 'survey_model');
        $data['survey'] = $this->survey_model->getsurvey();

        // statistic number
        $data["statistic"]['total'] = $this->Contacts_model->getTotalCount();
        $data["statistic"]['open'] = $this->Contacts_model->getOPenCount();
        $data["statistic"]['inprogress'] = $this->Contacts_model->getInProgressCount();
        $data["statistic"]['close'] = $this->Contacts_model->getCloseCount();

        $this->load->view('local/patient_area/main', $data);
    }
    public function updateHomeHeaderText()
    {
        $text_en = $this->input->post('text_en');
        $text_es = $this->input->post('text_es');
        $result = $this->Content_model->updateComponent('t_home_header', $text_en, $text_es);
        if ($result)
            echo "ok";
    }
    public function updateHomeText()
    {
        $data['header_en'] = $this->input->post('header_en');
        $data['header_es'] = $this->input->post('header_es');
        $data['footer_en'] = $this->input->post('footer_en');
        $data['footer_es'] = $this->input->post('footer_es');
        $result = $this->Content_model->updateHomeText($data);
        if ($result)
            echo "ok";
    }
}
