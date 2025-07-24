<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Contact extends CI_Controller
{
    public $directory = './assets/two-captcha';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');

        $this->load->model('Contacts_model');
        $this->load->model('Frontend_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Systeminfo_model');
        $this->load->model('Alert_model');
        $this->load->model('Language_model');
        $this->load->model('Patient_model');
    }

    public function index()
    {
        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        // get random two-captcha image
        $captcha_image = '';
        $files = array_diff(scandir($this->directory), array('..', '.'));
        if (empty($files)) {
            error_log('===================================');
        } else {
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying', md5($randomFile));
            $data['captcha_image'] = $captcha_image;
            // get footer captcha
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
            $data['footer_captcha_image'] = $captcha_image;
        }

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['meta'] = $this->Frontend_model->getMeta();

        $data['doctors'] = $this->Frontend_model->getDoctors($siteLang);
        $data['staffs'] = $this->Frontend_model->getStaffs($siteLang);
        $data['patient_reviews'] = $this->Frontend_model->getPatientReviews($siteLang);

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Home', 'HEADER-BANNER', $siteLang);

        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['languages'] = $this->Language_model->read();

        // generate qr code for footer qr code
        $vCard = "BEGIN : VCARD\n";
        $vCard .= "VERSION : 3.0\n";
        $vCard .= "NAME : " . $data['contact_info']["name"] . "\n";
        if ($data['contact_info']["email"]) {
            $vCard .= "EMAIL : " . $data['contact_info']["email"] . "\n";
        }
        $vCard .= "SITE : " . base_url() . "\n";
        $vCard .= "ADDRESS : " . $data['contact_info']["address"] . "\n";
        $vCard .= "CITY : " . $data['contact_info']["city"] . "\n";
        $vCard .= "ZIP : " . $data['contact_info']["zip"] . "\n";
        $vCard .= "TEL : " . $data['contact_info']["tel"] . "\n";
        $vCard .= "FAX : " . $data['contact_info']["fax"] . "\n";
        $vCard .= "END:VCARD";
        $qrCode = QrCode::create($vCard)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(210)
            ->setMargin(-18);
        $writer = new PngWriter();
        $qr_res = $writer->write($qrCode);
        $data['footer_qrcode'] = base64_encode($qr_res->getString());

        if ($this->session->userdata('patient_id')) {
            $patient = $this->Patient_model->choose($this->session->userdata('patient_id'));
            $data['patient_info'] = $patient;
        } else {
            $data['patient_info'] = array(
                'id' => 0,
                'patient_id' => 0,
                'fname' => '',
                'lname' => '',
                'mname' => '',
                'gender' => 'M',
                'dob' => '',
                'email' => '',
                'phone' => '',
                'mobile' => '',
                'address' => '',
                'city' => '',
                'state' => '',
                'zip' => '',
                'language' => 17,
                'ethnicity' => '',
                'race' => ''
            );
        }

        $this->session->set_userdata("page_status", "contact");

        $this->load->view('contact', $data);
    }

    public function addContact()
    {
        $g_reCaptCha = $_POST['g-recaptcha-response'];
        if ($g_reCaptCha == '' || $g_reCaptCha == null) {
            return json_encode(array('status' => 'verify'));
        }

        $data = array(
            'type' => $_POST['contacttype'],
            'reason' => $_POST['contactreason'],
            'name' => $_POST['contactname'],
            'dob' => $_POST['contact_dob'],
            'email' => $_POST['contact_email'],
            'cel' => $_POST['contact_cel'],
            'patient_type' => $_POST['contactpttype'],
            'subject' => $_POST['contact_subject'],
            'messgae' => $_POST['contact_message'],
            'date' => $_POST['contact_time'],
            'opt_status' => $_POST['opt_status'],
            'lang' => $_POST['contact_lang']
        );
        $result = $this->Contacts_model->addContact($data);
        if ($result) {
            return json_encode(array('status' => 'success'));
        } else {
            return json_encode(array('status' => 'error'));
        }
    }

    public function getAllContacts()
    {
        $status = $_POST['status'];
        $reason = $_POST['reason'];
        $assigned = $_POST['assigned'];
        $start_date = $_POST['start_date'];

        $date = $_POST['end_date'];
        $end_date = new DateTime($date);
        $end_date->setTime(23, 59, 59);

        $result = $this->Contacts_model->getOnlyNewContacts($status, $reason, $assigned, $start_date, $end_date->format("Y-m-d h:i:s"));
        echo json_encode(array('data' => $result));
    }

    public function viewContact()
    {
        $id = $_POST['id'];
        $result = $this->Contacts_model->viewtrack($id);
        if ($result) {
            echo json_encode(array('data' => $result, 'status' => 'success'));
        } else {
            echo json_encode(array('data' => [], 'status' => 'error'));
        }
    }

    public function deleteContact()
    {
        $id = $_POST['id'];
        $data = $this->Contacts_model->chosentrack($id);

        // 2. send to central begin //
        $central_data = array(
            'case_number' => $data['case_number']
        );
        // API endpoint URL
        $url = $this->config->item('medical_center_url') . 'api/deleteContactTrackByCase';
        // Initialize cURL session
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($central_data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // Execute cURL request
        curl_exec($curl);
        // Close cURL session
        curl_close($curl);
        // 2. send to central end //

        $result = $this->Contacts_model->deletetrackbycase($data['case_number']);
        if ($result) {
            echo "ok";
        }
    }

    public function getReports()
    {
        $dayType = $_POST['dayType'];
        $year = $_POST['year'];
        $month = $_POST['month'];
        if ((int)$month < 10) {
            $month = "0" . $month;
        }
        $date = $_POST['date'];
        $res = $this->Contacts_model->getReports($dayType, $year, $month, $date);
        echo json_encode($res);
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }
}
