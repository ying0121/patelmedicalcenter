<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

use GuzzleHttp\Client;

class PatientArea extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vault_model');
        $this->load->model('AreaToggle_model');
        $this->load->model('Content_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Patient_model');
        $this->load->model('ConectorApi_model');
        $this->load->model('Language_model');
        $this->load->model('Contacts_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'patient_area';
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['contact_info'] = $this->ContactInfo_model->read();
        $data['acronym'] = $data['contact_info']['acronym'];
        $data['api'] = $this->ConectorApi_model->read();
        $data['languages'] = $this->Language_model->read();

        // statistic number
        $data["statistic"]['total'] = $this->Contacts_model->getTotalCount();
        $data["statistic"]['open'] = $this->Contacts_model->getOPenCount();
        $data["statistic"]['inprogress'] = $this->Contacts_model->getInProgressCount();
        $data["statistic"]['close'] = $this->Contacts_model->getCloseCount();

        $this->load->model('staff_model', 'staff_model');
        $data['staffs'] = $this->staff_model->read();
        $this->load->model('survey_model', 'survey_model');
        $data['survey'] = $this->survey_model->getsurvey();

        $this->load->view('local/patient_area/main', $data);
    }

    public function addPatients()
    {
        $url = $_POST['url'];
        $client = new Client([
            'timeout' => 1800,
            'connect_timeout' => 60,
        ]);
        $requestData = [
            'form_params' => [
                'all' => 'true',
                'clinic_id' => 10,
            ]
        ];
        $response = $client->request('POST', $url, $requestData);
        $data = json_decode($response->getBody(), true);
        $result = $this->Patient_model->addPatients($data);
        echo json_encode(array('status' => $result >= 0 ? 'success' : 'error', 'total' => json_encode($result)));
    }
}
