<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Home extends CI_Controller
{
    public $directory = './assets/two-captcha';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');

        $this->load->model('Frontend_model');
        $this->load->model('User_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Staff_model');
        $this->load->model('Systeminfo_model');
        $this->load->model('Alert_model');
        $this->load->model('Language_model');
        $this->load->model('Patient_model');
        $this->load->model('Contactemail_model');
        $this->load->model('Content_model');
        $this->load->model('Contacts_model');
        $this->load->model('Service_model');

        $this->session->set_userdata("page_status", "home");
    }

    public function index()
    {
        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else {
            $this->session->set_userdata('language', 'es');
            $siteLang = 'es';
        }

        // get random two-captcha image
        $files = array_diff(scandir($this->directory), array('..', '.'));
        if (empty($files)) {
            error_log('===================================');
        } else {
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying', md5($randomFile));
            $data['captcha_image'] = $captcha_image;
            // for footer signup captcha
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
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];

        $data['doctors'] = $this->Frontend_model->getDoctors($siteLang);
        $data['staffs'] = $this->Frontend_model->getStaffs($siteLang);
        $data['patient_reviews'] = $this->Frontend_model->getPatientReviews($siteLang);

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Home', 'HEADER-BANNER', $siteLang);
        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['languages'] = $this->Language_model->read();
        $data['services'] = $this->Service_model->getClinicServiceOnlyHomePage($siteLang == "en" ? 17 : 25);

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

        $this->session->set_userdata("page_status", "home");

        $this->load->view('home', $data);
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }

    public function submit()
    {
        $contact_info = $this->ContactInfo_model->read();
        $acronym = $contact_info["acronym"];

        $privateKey = $this->config->item('private_key');

        $type = $this->input->post('contactusertype');
        $reason = $this->input->post('contactreason');

        openssl_private_decrypt(base64_decode($this->input->post('contact_name')), $decryptedData, $privateKey);
        $name = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('contact_email')), $decryptedData, $privateKey);
        $email = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('contact_cel')), $decryptedData, $privateKey);
        $cel = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('contact_dob')), $decryptedData, $privateKey);
        $dob = $decryptedData;
        openssl_private_decrypt(base64_decode($this->input->post('contact_captcha')), $decryptedData, $privateKey);
        $captcha = $decryptedData;

        $dobObj = new DateTime($dob);

        $subject = $this->input->post('contact_subject');
        $message = $this->input->post('contact_message');
        $lang = $this->input->post('contact_lang');
        $besttime = $this->input->post('contact_time');
        $patient_type = $this->input->post('contactpttype');
        $opt_status = $this->input->post('opt_status');

        if ($this->session->userdata('ying') == md5($captcha . '.png')) {
            $this->session->unset_userdata('ying');

            $staffs = $this->Staff_model->getStaffForGeneralOnlineAssigned();

            // get patient info
            $pt_info = $this->Patient_model->getPatientByPtEmail($email);

            // save
            $data = array(
                'clinic' => $contact_info["name"],
                'type' => $type,
                'patient_type' => $patient_type,
                'opt_status' => $opt_status,
                'reason' => $reason,
                'name' => $name,
                'dob' => $dob, // Date format: YYYY-MM-DD
                'email' => $email,
                'cel' => $cel,
                'subject' => $subject,
                'message' => $message,
                'lang' => $lang,
                'besttime' => $besttime,
                'pt_emr_id' => $pt_info[0]['patient_id'],
                'msg_type' => 1 // 1 = General Message, 0 = Specific Message
            );

            $result = $this->User_model->addContacts($data['type'], $data['reason'], $data['pt_emr_id'], $data['name'], $data['email'], $data['cel'], $data['dob'], $data['subject'], $data['message'], $data['lang'], $data['besttime'], $data['patient_type'], $data['opt_status'], $staffs[0]['id'], $data['msg_type']);

            // send to central
            $data = array(
                'clinic' => $contact_info["name"],
                'type' => $type,
                'patient_type' => $patient_type,
                'opt_status' => $opt_status,
                'reason' => $reason,
                'name' => $name,
                'dob' => $dob, // Date format: YYYY-MM-DD
                'email' => $email,
                'cel' => $cel,
                'subject' => $subject,
                'message' => $message,
                'lang' => $lang,
                'assign' => $staffs[0]['en_name'],
                'besttime' => $besttime,
                'case_number' => $result['case_number']
            );

            // API endpoint URL
            $url = $this->config->item('medical_center_url') . 'api/sendContact';

            // Initialize cURL session
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            // Execute cURL request
            $response = curl_exec($curl);

            // Check for errors
            if ($response === false) {
                $error = curl_error($curl);
                echo 'Error creating record: ' . $error;
                return;
            } else if ($response !== 'ok') {
                echo 'Error creating record: ' . $response;
                return;
            }
            // Close cURL session
            curl_close($curl);

            ////////////////////////////////////Send Email/////////////////////////////////

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

            $tmpsubject = "CASE #: " . $result["case_number"] . $acronym . " " . $reason . " - Email From " . $contact_info["name"];


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
            //$this->email->from('securedev24@gmail.com');
            $this->email->from($this->config->item('smtp_user'));
            $this->email->to($tmpemails);
            $data = array(
                'id' => 0,
                'title' => "Email From " . $contact_info["name"],
                'reason' => $reason,
                'subject' => $subject,
                'name' => $name,
                'email' => $email,
                'cel' => $cel,
                'dob' => $dobObj->format('m/d/Y'),
                'message' => $message,
                'besttime' => $besttime,
                'opt_in' => $opt_status == 1 ? 'Yes' : 'No'
            );
            $tmpmessage = $this->load->view('email/contactemail.php', $data, TRUE);
            $this->email->subject($tmpsubject);
            $this->email->message($tmpmessage);

            if ($this->email->send()) {

                if ($result["last_id"]) {
                    echo json_encode(array('status' => 'success', 'id' => $result["case_number"]));
                } else {
                    echo json_encode(array('status' => 'error'));
                }
            } else {
                echo json_encode(array('status' => 'success', 'id' => $result["case_number"], 'message' => "Failed in Sending Email!"));
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

            error_log('CAPTCHA verification failed');
            echo json_encode(array('status' => 'Non Verified!', 'captcha' => $captcha_image));
        }
    }

    public function changeCaptchaImageForFooter()
    {
        // get random two-captcha image
        $captcha_image = '';
        $files = array_diff(scandir($this->directory), array('..', '.'));
        if (empty($files)) {
            error_log('===================================');
        } else {
            $randomFile = $files[array_rand($files)];
            $captcha_image = $this->directory . '/' . $randomFile;
            $this->session->set_userdata('ying-footer', md5($randomFile));
        }
        echo $captcha_image;
    }

    public function submitSignUpForFooter()
    {
        $contact_info = $this->ContactInfo_model->read();
        $acronym = $contact_info["acronym"];

        $emailaccount_content = $this->Content_model->readEmailAccountContent();
        $signup_content = $this->Content_model->readSignUpContent();

        $captcha = $_POST['captcha'];
        if ($this->session->userdata('ying-footer') == md5($captcha . '.png')) {
            $this->session->unset_userdata('ying-footer');

            $data['fname'] = $_POST['first_name'];
            $data['lname'] = $_POST['last_name'];
            $data['dob'] = $_POST['dob'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];

            if ($data['fname'] == '' || $data['lname'] == '' || $data['email'] == '') {
                echo json_encode(array("message" => "required"));
            } else {
                $staffs = $this->Staff_model->getStaffForAccountRequestAssigned();
                $result = $this->Patient_model->checkPatient($data);

                if ($result['message'] == 'success') {
                    $data['patient_id'] = $result['id'] ?? 0;
                    $data['assign'] = $staffs[0]['id'];
                    $case_number = $this->Contacts_model->addContactForSignUp($data);
                    $result['id'] = $case_number;

                    // send to central
                    $data = array(
                        'clinic' => $contact_info["name"],
                        'type' => 1,
                        'patient_type' => 1,
                        'opt_status' => 1,
                        'reason' => 'Account Request',
                        'name' => $data['fname'] . " " . $data['lname'],
                        'dob' => $data['dob'], // Date format: YYYY-MM-DD
                        'email' => $data['email'],
                        'cel' => $data['phone'],
                        'subject' => '',
                        'message' => '',
                        'lang' => 'en',
                        'assign' => $staffs[0]['en_name'],
                        'besttime' => 'Anytime',
                        'case_number' => $case_number
                    );

                    // API endpoint URL
                    $url = $this->config->item('medical_center_url') . 'api/sendContact';

                    // Initialize cURL session
                    $curl = curl_init();

                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    // Execute cURL request
                    curl_exec($curl);

                    // Close cURL session
                    curl_close($curl);

                    // send an email
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

                    // get email list from contact_email table
                    $emails = $this->Contactemail_model->getEmailListForAccount();

                    $this->email->to($emails);

                    $mail_body = array(
                        'id' => $case_number,
                        'fname' => $data['fname'],
                        'lname' => $data['lname'],
                        'dob' => '',
                        'email' => $data['email'],
                        'phone' => $data['phone'],
                        'email_header' => $signup_content['en']['t_pa_su_eheader'],
                        'disclaimer' => $emailaccount_content['en']['t_pa_ea_disclaimer'],
                    );
                    $html = $this->load->view('email/accountemail.php', $mail_body, TRUE);
                    $this->email->subject('Case #: ' . $mail_body['id'] . $acronym . ' patelmedicalcenter.com - PT Area Account Request');
                    $this->email->message($html);
                    $this->email->send();
                }
                $result['acronym'] = $acronym;
                echo json_encode($result);
            }
        } else {
            echo json_encode(array("message" => "captcha"));
        }
    }
}
