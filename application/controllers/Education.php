<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Education extends CI_Controller
{
    public $directory = './assets/two-captcha';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');

        $this->load->model('Frontend_model');
        $this->load->model('Systeminfo_model');
        $this->load->model('Alert_model');
        $this->load->model('Language_model');
        $this->load->model('Education_model');
        $this->load->model('Patient_model');

        $this->session->set_userdata("page_status", "education/Asthma");
    }

    public function index()
    {
        // Get Page Type For Education
        $page = $_GET["p"];

        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        // get random two-captcha image
        $files = array_diff(scandir($this->directory), array('..', '.'));
        if (empty($files)) {
            error_log('===================================');
        } else {
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
            $data['footer_captcha_image'] = $captcha_image;
        }

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Orientation', 'HEADER-BANNER', $siteLang);
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

        //education
        $data['videos'] = $this->Education_model->getVideos($siteLang, $page);
        $data['docs'] = $this->Education_model->getDocs($siteLang, $page);
        $data["page_type"] = $page;

        $this->load->view('education', $data);
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }
}
