<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Services extends CI_Controller
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
        $this->load->model('Patient_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Service_model');
        $this->load->model('Staff_model');
        $this->load->model('User_model');
        $this->load->model('Content_model');
    }

    public function index()
    {
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
            $this->session->set_userdata('ying', md5($randomFile));
            $data['captcha_image'] = $captcha_image;

            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
            $data['footer_captcha_image'] = $captcha_image;
        }

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);

        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['languages'] = $this->Language_model->read();
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['meta'] = $this->Frontend_model->getMeta();

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

        $filter['category'] = 0;
        if ($siteLang == "en") $filter['language'] = 17;
        else $filter['language'] = 25;
        $data['services'] = $this->Service_model->getClinicService($filter);

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

        $this->session->set_userdata("page_status", "services");

        $this->load->view('services', $data);
    }

    public function detail()
    {
        $id = $_GET['s'];

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
            $this->session->set_userdata('ying', md5($randomFile));
            $data['captcha_image'] = $captcha_image;

            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
            $data['footer_captcha_image'] = $captcha_image;
        }

        // Generate QrCode
        $vCard = "BEGIN:VCARD\n";
        $vCard .= "VERSION:3.0\n";
        $vCard .= base_url() . "Services/detail?s=" . $id;
        $vCard .= "END:VCARD";
        $qrCode = QrCode::create($vCard)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(210)
            ->setMargin(-1);
        $writer = new PngWriter();
        $qr_res = $writer->write($qrCode);

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);

        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['languages'] = $this->Language_model->read();
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['meta'] = $this->Frontend_model->getMeta();
        $data['qrcode'] = base64_encode($qr_res->getString());

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

        $data['service'] = $this->Service_model->chosenClinicService($id);

        $this->session->set_userdata("page_status", "services");

        $this->load->view('service_detail', $data);
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }

    public function sendEmailToFriend()
    {
        $privateKey = $this->config->item('private_key');

        openssl_private_decrypt(base64_decode($this->input->post('name')), $decryptedData, $privateKey);
        $name = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('email')), $decryptedData, $privateKey);
        $email = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('captcha')), $decryptedData, $privateKey);
        $captcha = $decryptedData;
        $id = $this->input->post('id');

        $clinic = $this->ContactInfo_model->read();
        $service = $this->Service_model->chosenClinicService($id);

        // check captcha
        if ($this->session->userdata('ying') == md5($captcha . '.png')) {
            $this->session->unset_userdata('ying');

            // get subject and text
            $result = $this->Content_model->readSendToFriend();

            // string replace
            // $text = $result[$this->session->userdata('language')]['t_sf_updated_text'];
            $text = $result['en']['t_sf_updated_text'];
            $text = str_replace('$sender_name', $name, $text);
            $text = str_replace('$clinic_name', $clinic['name'], $text);
            $text = str_replace('$clinic_name', $clinic['name'], $text);
            $text = str_replace('$service_name', $service['title'], $text);
            $text = str_replace('$short_desc', $service['short_desc'], $text);

            ////////////////////////////////////Send Email/////////////////////////////////
            $this->load->library('email');
            $this->email->set_newline("rn");
            $config = array();
            $config['protocol']    = 'mail';
            $config['smtp_timeout'] = '7';
            $config['auth'] = true;
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html'; // or html
            $config['validation'] = TRUE; // bo

            $this->email->initialize($config);
            $this->email->from($this->config->item('smtp_user'));
            $this->email->to($email);
            $data = array(
                'body' => $text
            );
            $message = $this->load->view('email/friendemail.php', $data, TRUE);
            $this->email->subject($result[$this->session->userdata('language')]['t_sf_subject']);
            $this->email->message($message);

            // get random two-captcha image
            $captcha_image = '';
            $files = array_diff(scandir($this->directory), array('..', '.'));
            if (empty($files)) {
                error_log('===================================');
            } else {
                $randomFile = $files[array_rand($files)];
                $captcha_image = $this->directory . '/' . $randomFile;
                $this->session->set_userdata('ying', md5($randomFile));
            }

            if ($this->email->send()) {
                echo json_encode(array('status' => 'success', 'captcha' => $captcha_image));
            } else {
                echo json_encode(array('status' => 'error', 'message' => "Failed in Sending Email!", 'captcha' => $captcha_image));
            }
            ////////////////////////////////////////////////////////////////////////////////
        } else {
            // get random two-captcha image
            $captcha_image = '';
            $files = array_diff(scandir($this->directory), array('..', '.'));
            if (empty($files)) {
                error_log('===================================');
            } else {
                $randomFile = $files[array_rand($files)];
                $captcha_image = $this->directory . '/' . $randomFile;
                $this->session->set_userdata('ying', md5($randomFile));
            }

            echo json_encode(array('status' => 'Non Verified!', 'captcha' => $captcha_image));
        }
    }

    public function getCost()
    {
        $id = $_POST['id'];
        $res = $this->Service_model->getCostById($id);
        echo json_encode($res);
    }
}
