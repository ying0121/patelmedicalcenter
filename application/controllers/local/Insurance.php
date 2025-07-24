<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Insurance extends CI_Controller
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
        $data['sideitem'] = 'insurance';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['api'] = $this->ConectorApi_model->read();
        $data['languages'] = $this->Language_model->read();

        $this->load->model('staff_model', 'staff_model');
        $data['staffs'] = $this->staff_model->read();
        $this->load->model('survey_model', 'survey_model');
        $data['survey'] = $this->survey_model->getsurvey();

        $this->load->view('local/insurances', $data);
    }
    public function updateInsuranceDesc()
    {
        $data['title']['en'] = $this->input->post('insurance_title_en');
        $data['title']['es'] = $this->input->post('insurance_title_es');
        $data['desc']['en'] = $this->input->post('insurance_desc_en');
        $data['desc']['es'] = $this->input->post('insurance_desc_es');
        $result = $this->Content_model->updateInsuranceContent($data);
        if ($result)
            echo "ok";
    }
}
