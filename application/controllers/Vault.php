<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

use GuzzleHttp\Client;

class Vault extends CI_Controller
{
    public $directory = './assets/two-captcha';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');

        $this->load->model('Frontend_model');
        $this->load->model('Patient_model');
        $this->load->model('Vault_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Contacts_model');
        $this->load->model('Staff_model');
        $this->load->model('Communication_model');
        $this->load->model('Contacts_model');
        $this->load->model('Vault_model');
        $this->load->model('Systeminfo_model');
        $this->load->model('Alert_model');
        $this->load->model('Language_model');

        $this->session->set_userdata("page_status", "vault");

        $area_toggle = $this->Frontend_model->getAreaToggle();
        if ($area_toggle['vault_area'] == 0)
            redirect('Home', 'refresh');
        if ($this->session->userdata('patient_id') == '' || $this->session->userdata('patient_name') == null) {
            redirect('PtLogin', 'refresh');
        }
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
            // for footer signup captcha
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
            $data['footer_captcha_image'] = $captcha_image;
        }

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Vault', 'HEADER-BANNER', $siteLang);
        $data['CENTRAL'] = $this->Frontend_model->getPageImages('Vault', 'CENTRAL', $siteLang);

        $data['vault'] = $this->Frontend_model->getVault($this->session->userdata('patient_id'));
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];
        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['languages'] = $this->Language_model->read();
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

        $this->session->set_userdata("page_status", "vault");

        $this->load->view('vault', $data);
    }

    public function getContacts()
    {
        // $patient_id = $_POST['patient_id'];
        $pt_emr_id = $_POST['pt_emr_id'];
        $result = $this->Vault_model->getContacts($pt_emr_id);
        echo json_encode(array('data' => $result));
    }

    public function submitContact()
    {
        $contact_info = $this->ContactInfo_model->read();
        $acronym = $contact_info["acronym"];

        $data['clinic_id'] = $this->config->item('clinic_id');
        $data['patient_id'] = $_POST['patient_id'];
        $data['name'] = $_POST['patient_name'];
        $data['dob'] = $_POST['patient_dob'];
        $data['email'] = $_POST['patient_email'];
        $data['cel'] = $_POST['patient_phone'];
        $data['reason'] = $_POST['reason'];
        $data['subject'] = $_POST['subject'];
        $data['message'] = $_POST['message'];
        $data['best_time'] = $_POST['best_time'];
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d H:i:s');
        $data['lang'] = $this->session->userdata('language');
        $data['msg_type'] = 0; // Specific Message

        // save to table
        $case_number = $this->Vault_model->submitContact($data);

        // send email
        $emails = $this->Frontend_model->readManagerEmails();
        $tmpemails = "";
        for ($i = 0; $i < count($emails); $i++) {
            if ($i == 0)
                $tmpemails = $emails[$i]['email'];
            else
                $tmpemails .= "," . $emails[$i]['email'];
        }
        // get email from staff
        $staffs = $this->Staff_model->getStaffForGeneralOnlineEmail();
        for ($i = 0; $i < count($staffs); $i++) {
            $tmpemails .= ',' . $staffs[$i]['email'];
        }

        $tmpsubject = 'Case #: ' . $case_number . $acronym . ' ' . $data['reason'] . " - Email From " . $contact_info["name"];

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

        $dobObj = new DateTime($data['dob']);

        $this->email->initialize($config);
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($tmpemails);
        $mail_info = array(
            'id' => $case_number,
            'title' => "Email From " . $contact_info["name"],
            'reason' => $data['reason'],
            'subject' => $data['subject'],
            'name' => $data['name'],
            'email' => $data['email'],
            'cel' => $data['cel'],
            'dob' => $dobObj->format('m/d/Y'),
            'message' => $data['message'],
            'besttime' => $data['best_time'],
            'opt_in' => ''
        );
        $tmpmessage = $this->load->view('email/contactemail.php', $mail_info, TRUE);
        $this->email->subject($tmpsubject);
        $this->email->message($tmpmessage);

        $this->email->send();

        echo json_encode(array(
            'id' => $case_number,
            'status' => 'success'
        ));
    }

    public function addMessage()
    {
        $privateKey = $this->config->item('private_key');
        $contact_id = $_POST['contact_id'];
        openssl_private_decrypt(base64_decode($_POST['message']), $decryptedData, $privateKey);
        $message = $decryptedData;
        openssl_private_decrypt(base64_decode($_POST['case_number']), $decryptedData, $privateKey);
        $case_number = $decryptedData;
        openssl_private_decrypt(base64_decode($_POST['patient_id']), $decryptedData, $privateKey);
        $patient_id = $decryptedData;
        openssl_private_decrypt(base64_decode($_POST['assign']), $decryptedData, $privateKey);
        $assign = $decryptedData;
        openssl_private_decrypt(base64_decode($_POST['person_type']), $decryptedData, $privateKey);
        $person_type = $decryptedData;

        ////////////////////////////////////Send Email/////////////////////////////////
        $contact_info = $this->ContactInfo_model->read();
        $acronym = $contact_info["acronym"];
        $contact = $this->Contacts_model->chosentrack($contact_id);
        $staff = $this->Staff_model->choose($assign);
        $dobObj = new DateTime($contact['dob']);

        $tmpsubject = "CASE #: " . $case_number . $acronym . " " . $contact['reason'] . " - Email From " . $contact_info["name"];

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
        $this->email->to($staff['email']);
        $data = array(
            'id' => 0,
            'title' => "Email From " . $contact_info["name"],
            'reason' => $contact['reason'],
            'subject' => "Message From " . $contact['name'],
            'name' => $contact['name'],
            'email' => $contact['email'],
            'cel' => $contact['cel'],
            'dob' => $dobObj->format('m/d/Y'),
            'message' => $message,
            'besttime' => $contact['best_time'],
            'opt_in' => ''
        );
        $tmpmessage = $this->load->view('email/contactemail.php', $data, TRUE);
        $this->email->subject($tmpsubject);
        $this->email->message($tmpmessage);

        $this->email->send();
        ////////////////////////////////////Send Email/////////////////////////////////

        $communication = array(
            'message' => $message,
            'case_number' => $case_number,
            'patient_id' => $patient_id,
            'staff_id' => $assign,
            'person_type' => $person_type,
            'created_time' => date('Y-m-d H:i:s')
        );

        $this->Vault_model->setUnreadCount($contact_id, $person_type);
        $result = $this->Communication_model->addMessage($communication);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function viewCommunicationHistory()
    {
        $data = array(
            'id' => $_POST['id'],
            'case_number' => $_POST['case_number'],
            'staff_id' => $_POST['assign'],
            'patient_id' => $_POST['patient_id'],
            'person_type' => $_POST['person_type']
        );

        $this->Vault_model->clearUnreadCount($data['id'], 'patient');
        $this->Vault_model->setSeen($data);
        $result = $this->Vault_model->viewCommunicationHistory($data);
        $contact = $this->Contacts_model->viewtrack($data['id']);

        if ($result) {
            echo json_encode(array('history' => $result, 'contact' => $contact, 'status' => 'success'));
        } else {
            echo json_encode(array('history' => [], 'contact' => $contact, 'status' => 'error'));
        }
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }

    public function getApptInfo()
    {
        $privateKey = $this->config->item('private_key');

        // API endpoint URL
        // $url = "http://localhost:5001/service/hedis_track";
        $url = "https://ehr.azul.us.com/service/hedis_track";

        $client = new Client([
            'timeout' => 1800,
            'connect_timeout' => 60,
        ]);
        $requestData = [
            'form_params' => [
                'clinic_id' => 1,
                'apptdate' => "2025-06-04",
            ]
        ];
        $response = $client->request('POST', $url, $requestData);
        $data = json_decode($response->getBody(), true);

        // for ($i = 0; $i < count($data['data']); $i++) {
        //     openssl_private_decrypt(base64_decode($data['data'][$i]), $decryptedData, $privateKey);
        //     error_log($decryptedData);
        // }
        $b = openssl_private_decrypt(base64_decode($data['data'][0]), $decryptedData, $privateKey);

        echo json_encode(array("status" => $b));
    }
}
