<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class PtLogin extends CI_Controller
{
    public $directory = './assets/two-captcha';
    public $qrcode_path = './assets/images/common/qrcode.png';

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');

        $this->load->model('Frontend_model');
        $this->load->model('Patient_model');
        $this->load->model('Security_model');
        $this->load->model('Content_model');
        $this->load->model('Settings_model');
        $this->load->model('ContactInfo_model');
        $this->load->model('Contactemail_model');
        $this->load->model('Contacts_model');
        $this->load->model('Verify_model');
        $this->load->model('Systeminfo_model');
        $this->load->model('Alert_model');
        $this->load->model('Staff_model');
    }

    public function index()
    {
        if (($this->session->userdata('patient_id') != '' && $this->session->userdata('patient_name') != null) && !$this->session->userdata('question')) {
            redirect("Vault");
        }

        $area_toggle = $this->Frontend_model->getAreaToggle();
        if ($area_toggle['vault_area'] == 0)
            redirect('Home', 'refresh');

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

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Auth', 'HEADER-BANNER', $siteLang);
        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $this->Frontend_model->getAreaToggle();
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
        $data['security'] = 0;
        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['alerts'] = $this->Alert_model->getAvailableAlert();
        $data['acronym'] = $this->ContactInfo_model->readAcronym()['acronym'];

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

        $this->session->set_userdata('page_status', 'signin');

        $this->load->view('login', $data);
    }

    public function security()
    {
        if (!$this->session->userdata('question')) {
            redirect('PtLogin', 'refresh');
        } else {
            $area_toggle = $this->Frontend_model->getAreaToggle();
            if ($area_toggle['vault_area'] == 0)
                redirect('Home', 'refresh');

            if ($this->session->userdata('language'))
                $siteLang = $this->session->userdata('language');
            else
                $siteLang = 'es';

            $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Auth', 'HEADER-BANNER', $siteLang);
            $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
            $data['contact_info'] = $this->Frontend_model->getContactInfo();
            $data['area_toggle'] = $area_toggle;
            $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
            $data['security'] = 1;
            $data['alerts'] = $this->Alert_model->getAvailableAlert();

            // generate qr code for footer qr code
            $vCard = "BEGIN : VCARD\n";
            $vCard .= "VERSION : 3.0\n";
            $vCard .= "NAME : " . $contact_info["name"];
            if ($contact_info["email"]) {
                $vCard .= "EMAIL : " . $contact_info["email"];
            }
            $vCard .= "SITE : " . base_url();
            $vCard .= "ADDRESS : " . $contact_info["address"];
            $vCard .= "CITY : " . $contact_info["city"];
            $vCard .= "ZIP : " . $contact_info["zip"];
            $vCard .= "TEL : " . $contact_info["tel"];
            $vCard .= "FAX : " . $contact_info["fax"];
            $vCard .= "END:VCARD";
            $qrCode = QrCode::create($vCard)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(210)
                ->setMargin(-1);
            $writer = new PngWriter();
            $qr_res = $writer->write($qrCode);
            $data['footer_qrcode'] = base64_encode($qr_res->getString());

            $this->session->set_userdata('page_status', 'signin');

            $this->load->view('login', $data);
        }
    }

    public function login()
    {
        $action = $_POST['action'];

        if ($action == 'signin') { // Sign In
            $name = $this->input->post('email');
            $password = $this->input->post('password');

            $loginText = $this->Content_model->readLoginFailedContent();
            $failedLimit = $this->Settings_model->getFailedLimit();

            if ($name == '' || $password == '') { // Invalid Account

                $failedText['en'] = $loginText['en']['t_pa_lf_invalid'];
                $failedText['es'] = $loginText['es']['t_pa_lf_invalid'];
                $this->session->set_userdata('loginresult', $failedText);

                redirect('PtLogin', 'refresh');

                return;
            }

            $result = $this->Patient_model->auth($name, $password);

            $this->session->set_userdata('page_status', 'signin');

            if ($result) { // correct email
                if ($result['status'] == 0) { // inactive account
                    $inactiveText['en'] = $loginText['en']['t_pa_lf_inactive'];
                    $inactiveText['es'] = $loginText['es']['t_pa_lf_inactive'];
                    $this->session->set_userdata('loginresult', $inactiveText);

                    redirect('PtLogin', 'refresh');
                } else if ($result['status'] == 1) { // active account
                    if ($result['password_status'] == 'correct') { // correct password
                        $this->Patient_model->updateLoginCount($result['id'], 0);

                        $this->session->set_userdata('patient_id', $result['id']);
                        $this->session->set_userdata('patient_name', $result['fname'] . " " . $result['mname'] . " " . $result['lname']);

                        $list = $this->Security_model->getSecurityListByUser($result['id'], 'patient');
                        if ($list) {
                            $length = count($list);
                            $number = rand(0, $length - 1);
                            $data['id'] = $list[$number]['question_id'];
                            $question = $this->Security_model->choose($data);

                            $this->session->set_userdata('question', $question[0]);

                            $this->session->unset_userdata('loginresult');
                            redirect('PtLogin/security');
                        } else {
                            $this->session->unset_userdata('page_status');
                            redirect('Vault', 'refresh');
                        }
                    } else { // wrong password
                        $count = $result['login_count'];
                        $count++;

                        if ($count >= $failedLimit['value']) {
                            $this->Patient_model->updateActiveStatus($result['id'], 0);
                        } else {
                            $this->Patient_model->updateLoginCount($result['id'], $count);
                        }

                        $failedText['en'] = $loginText['en']['t_pa_lf_text'];
                        $failedText['es'] = $loginText['es']['t_pa_lf_text'];
                        $failedText['count'] = $failedLimit['value'] - $count;
                        $this->session->set_userdata('loginresult', $failedText);
                        redirect('PtLogin', 'refresh');
                    }
                }
            } else { // wrong email
                $failedText['en'] = $loginText['en']['t_pa_lf_failed'];
                $failedText['es'] = $loginText['es']['t_pa_lf_failed'];
                $this->session->set_userdata('loginresult', $failedText);
                redirect('PtLogin', 'refresh');
            }
        } else if ($action == 'signup') { // Sign Up
            redirect('PtLogin/signup', 'refresh');
        } else if ($action == 'help') { // Help
            redirect('PtLogin/help', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('patient_id');
        $this->session->unset_userdata('patient_name');
        redirect('Home', 'refresh');
    }

    public function checkSecurity()
    {
        $answer = $_POST['answer'];
        $data['user_id'] = $this->session->userdata('patient_id');
        $data['user_type'] = 'patient';
        $data['question_id'] = $this->session->userdata('question')['id'];

        $result = $this->Security_model->getUserSecurity($data);
        $loginText = $this->Content_model->readLoginFailedContent();

        if ($result[0]['answer'] == md5($answer)) {
            $this->session->unset_userdata('question');
            $this->session->unset_userdata('page_status');
            redirect('Vault', 'refresh');
        } else {
            $failedText['en'] = $loginText['en']['t_pa_lf_failed'];
            $failedText['es'] = $loginText['es']['t_pa_lf_failed'];
            $this->session->set_userdata('loginresult', $failedText);
            redirect('PtLogin', 'refresh');
        }
    }

    public function help()
    {
        // get random two-captcha image
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

        $area_toggle = $this->Frontend_model->getAreaToggle();
        if ($area_toggle['vault_area'] == 0)
            redirect('Home', 'refresh');

        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Auth', 'HEADER-BANNER', $siteLang);
        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $area_toggle;
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
        $data['alerts'] = $this->Alert_model->getAvailableAlert();

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

        $this->session->unset_userdata('loginresult');
        $this->session->set_userdata('page_status', 'help');

        $this->load->view('login', $data);
    }

    public function submitTohelp()
    {
        $action = $_POST['action'];

        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        $component_text = $this->Frontend_model->getComponentTexts($siteLang);
        $body = $this->Content_model->readEmailAccountContent();
        $clinic_info = $this->ContactInfo_model->read();

        if ($action == 'submit') { // submit button
            $forgot_type = $_POST['forgot_type'];

            if ($forgot_type == 1) { // Forgot Account
                $info['first_name'] = $_POST['first_name'];
                $info['last_name'] = $_POST['last_name'];
                $info['dob'] = $_POST['dob'];

                if ($info['first_name'] == '' || $info['last_name'] == '' || $info['dob'] == '') { // Invalid information
                    $this->session->set_userdata('helpresult', $component_text['t_pa_ah_invalid']);

                    redirect('PtLogin/help');
                } else {
                    // get patient information from patient table
                    $patient = $this->Patient_model->getPatientByNameDOB($info);

                    if ($patient[0]) {
                        // send email
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
                        $this->email->to($patient[0]['email']);

                        $mail_body = array(
                            'clinic_info' => $clinic_info,
                            'domain_name' => 'patelmedicalcenter',
                            'body' => $body,
                            'from_email' => $this->config->item('smtp_user'),
                            'patient_id' => $patient[0]['id'],
                            'patient_fname' => $patient[0]['fname'],
                            'patient_language' => $patient[0]['language'],
                            'contact_url' => 'https://patelmedicalcenter.com/PtLogin',
                            'contact_email' => 'roswellg@gmail.com'
                        );
                        $html = $this->load->view('email/helpemail.php', $mail_body, TRUE);
                        $this->email->subject('patelmedicalcenter.com - ' . $body[$patient[0]['language']]['t_pa_ea_subject']);
                        $this->email->message($html);

                        if ($this->email->send()) {
                            $this->session->set_userdata('alert_status', 'success');
                            $this->session->set_userdata('alert_message', $component_text['t_pa_ah_alert_success']);
                        } else {
                            $this->session->set_userdata('alert_status', 'error');
                            $this->session->set_userdata('alert_message', $component_text['t_pa_ah_alert_failed']);
                        }
                    } else {
                        $this->session->set_userdata('alert_status', 'info');
                        $this->session->set_userdata('alert_message', $component_text['t_pa_ah_alert_notexisted']);
                    }

                    redirect('PtLogin/help', 'refresh');
                }
            } else if ($forgot_type == 2) { // Forgot Password
                $info['email'] = $_POST['email'];
                $info['captcha'] = $_POST['captcha'];

                $patient = $this->Patient_model->getPatientByPtInfo($info['email']);
                if ($patient[0]) { // exist patient
                    if ($this->session->userdata('ying') == md5($info['captcha'] . '.png')) { // correct captcha
                        $this->session->unset_userdata('ying');

                        //generate 32 length string to verify
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $c_length = strlen($characters);
                        $verify_key = '';
                        for ($i = 0; $i < 32; $i++) {
                            $verify_key .= $characters[rand(0, $c_length - 1)];
                        }

                        // Generate QrCode
                        $vCard = "BEGIN:VCARD\n";
                        $vCard .= "VERSION:3.0\n";
                        $vCard .= "NAME:" . $patient[0]['fname'] . " " . $patient[0]['fname'] . "\n";
                        $vCard .= "EMAIL:" . $info['email'] . "\n";
                        $vCard .= "VERIFY URL:" . $this->config->item('base_url') . 'verify/' . $verify_key . '?id=' . $patient[0]['id'] . "\n";
                        $vCard .= "END:VCARD";
                        $qrCode = QrCode::create($vCard)
                            ->setEncoding(new Encoding('UTF-8'))
                            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                            ->setSize(300)
                            ->setMargin(10);
                        $writer = new PngWriter();
                        file_put_contents($this->qrcode_path, $writer->write($qrCode)->getString());

                        // send an email to patient
                        $email_password = $this->Content_model->readEmailPasswordContent();

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
                        $this->email->to($info['email']);

                        $mail_body = array(
                            'body' => $email_password,
                            'link' => $this->config->item('base_url') . 'verify/' . $verify_key . '?id=' . $patient[0]['id'],
                            'patient_fname' => $patient[0]['fname'],
                            'patient_language' => $patient[0]['language'],
                            'disclaimer' => array(
                                'en' => $body['en']['t_pa_ea_disclaimer'],
                                'es' => $body['es']['t_pa_ea_disclaimer']
                            ),
                            'qrcode' => $this->qrcode_path
                        );
                        $html = $this->load->view('email/passwordemail.php', $mail_body, TRUE);
                        $this->email->subject('patelmedicalcenter.com - ' . $email_password[$patient[0]['language']]['t_pa_ep_subject']);
                        $this->email->message($html);

                        $this->email->send();

                        // save the key
                        $this->Verify_model->add(array(
                            'email' => $info['email'],
                            'patient_id' => $patient[0]['id'],
                            'link' => $verify_key
                        ));

                        // refresh page
                        $this->session->set_userdata('alert_status', 'success');
                        $this->session->set_userdata('alert_message', $component_text['t_pa_ep_alert_success']);

                        redirect('PtLogin/help', 'refresh');
                    } else { // wrong captcha
                        $this->session->set_userdata('helpresult', $component_text['t_pa_ah_invalid']);

                        redirect('PtLogin/help');
                    }
                } else { // not exist patient
                    $this->session->set_userdata('helpresult', $component_text['t_pa_ep_notexisted']);

                    redirect('PtLogin/help');
                }
            }
        } else if ($action == 'signin') {
            redirect('PtLogin', 'refresh');
        }
    }

    public function signup()
    {
        $area_toggle = $this->Frontend_model->getAreaToggle();
        if ($area_toggle['vault_area'] == 0)
            redirect('Home', 'refresh');

        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
        $data['area_toggle'] = $area_toggle;
        $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
        $this->session->set_userdata('page_status', 'signup');
        $this->session->unset_userdata('loginresult');
        $data['alerts'] = $this->Alert_model->getAvailableAlert();

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

        $this->load->view('login', $data);
    }

    public function submitSignUp()
    {
        $action = $_POST['action'];

        if ($this->session->userdata('language'))
            $siteLang = $this->session->userdata('language');
        else
            $siteLang = 'es';

        $component_text = $this->Frontend_model->getComponentTexts($siteLang);
        $emailaccount_content = $this->Content_model->readEmailAccountContent();
        $signup_content = $this->Content_model->readSignUpContent();

        if ($action == 'signin') {
            redirect('PtLogin', 'refresh');
        } else if ($action == 'submit') {
            $captcha = $_POST['captcha'];
            if ($this->session->userdata('ying') == md5($captcha . '.png')) {
                $this->session->unset_userdata('ying');

                $data['fname'] = $_POST['first_name'];
                $data['lname'] = $_POST['last_name'];
                $data['dob'] = $_POST['dob'];
                $data['email'] = $_POST['email'];
                $data['phone'] = $_POST['phone'];
                $phone = $data['phone'];
                $fname = $data['fname'];
                $lname = $data['lname'];

                if ($data['fname'] == '' || $data['lname'] == '' || $data['dob'] == '') {
                    $this->session->set_userdata('signupresult', $component_text['t_pa_ah_invalid']);

                    redirect('PtLogin/signup');
                } else {
                    $result = $this->Patient_model->checkPatient($data);

                    if ($result['message'] == 'success') {
                        $data['patient_id'] = $result['id'] ?? 0;

                        $staffs = $this->Staff_model->getStaffForAccountRequestAssigned();
                        $data['assign'] = $staffs[0]['id'];
                        $case_number = $this->Contacts_model->addContactForSignUp($data);

                        $contact_info = $this->ContactInfo_model->read();
                        $acronym = $contact_info["acronym"];

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
                            'fname' => $fname,
                            'lname' => $lname,
                            'dob' => $data['dob'],
                            'email' => $data['email'],
                            'phone' => $phone,
                            'email_header' => $signup_content['en']['t_pa_su_eheader'],
                            'disclaimer' => $emailaccount_content['en']['t_pa_ea_disclaimer'],
                        );
                        $html = $this->load->view('email/accountemail.php', $mail_body, TRUE);
                        $this->email->subject('Case #: ' . $case_number  . $acronym . ' patelmedicalcenter.com - PT Area Account Request');
                        $this->email->message($html);
                        $this->email->send();

                        $this->session->set_userdata('case_number', $case_number);
                        $this->session->set_userdata('acronym', $acronym);
                        $this->session->set_userdata('alert_status', 'success');
                        $this->session->set_userdata('alert_message', $component_text['t_pa_su_alert_success']);

                        redirect('PtLogin/signup', 'refresh');
                    } else if ($result['message'] == 'exist') {
                        $this->session->set_userdata('alert_status', 'warning');
                        $this->session->set_userdata('alert_message', $component_text['t_pa_su_alert_exist']);

                        redirect('PtLogin/signup', 'refresh');
                    } else {
                        $this->session->set_userdata('alert_status', 'error');
                        $this->session->set_userdata('alert_message', $component_text['t_pa_su_alert_failed']);

                        redirect('PtLogin/signup', 'refresh');
                    }
                }
            } else {
                $this->session->set_userdata('alert_status', 'error');
                $this->session->set_userdata('alert_message', $component_text['t_pa_su_alert_failed']);
                redirect('PtLogin/signup', 'refresh');
            }
        }
    }

    public function verify($verify_link)
    {
        $patient_id = $_GET['id'];

        if ($this->Verify_model->verifyLink($patient_id, $verify_link)) {
            $area_toggle = $this->Frontend_model->getAreaToggle();
            if ($area_toggle['vault_area'] == 0)
                redirect('Home', 'refresh');

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

            $data['HEADER_BANNER'] = $this->Frontend_model->getPageImages('Auth', 'HEADER-BANNER', $siteLang);
            $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
            $data['contact_info'] = $this->Frontend_model->getContactInfo();
            $data['area_toggle'] = $area_toggle;
            $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
            $data['verify_link'] = $verify_link;
            $data['alerts'] = $this->Alert_model->getAvailableAlert();

            // generate qr code for footer qr code
            $vCard = "BEGIN : VCARD\n";
            $vCard .= "VERSION : 3.0\n";
            $vCard .= "NAME : " . $contact_info["name"];
            if ($contact_info["email"]) {
                $vCard .= "EMAIL : " . $contact_info["email"];
            }
            $vCard .= "SITE : " . base_url();
            $vCard .= "ADDRESS : " . $contact_info["address"];
            $vCard .= "CITY : " . $contact_info["city"];
            $vCard .= "ZIP : " . $contact_info["zip"];
            $vCard .= "TEL : " . $contact_info["tel"];
            $vCard .= "FAX : " . $contact_info["fax"];
            $vCard .= "END:VCARD";
            $qrCode = QrCode::create($vCard)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                ->setSize(210)
                ->setMargin(-1);
            $writer = new PngWriter();
            $qr_res = $writer->write($qrCode);
            $data['footer_qrcode'] = base64_encode($qr_res->getString());

            $this->session->set_userdata('page_status', 'verify');
            $this->session->unset_userdata('loginresult');

            $this->load->view('login', $data);
        }
    }

    public function resetPassword($link)
    {
        $action = $_POST['action'];
        if ($action == 'signin') {
            redirect('PtLogin', 'refresh');
        } else if ($action == 'submit') {
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            if ($password == $repassword) {
                $result = $this->Verify_model->chooseByLink($link);
                $this->Patient_model->resetpwd($result[0]['patient_id'], $password);
                $this->Verify_model->deleteByLink($link);

                $this->session->set_userdata('alert_status', 'success');
                $this->session->set_userdata('alert_message', 'Your password has reset successfully!');

                $this->session->set_userdata('pate_status', 'signin');
                redirect('PtLogin', 'refresh');
            } else {
                $area_toggle = $this->Frontend_model->getAreaToggle();
                if ($area_toggle['vault_area'] == 0)
                    redirect('Home', 'refresh');

                if ($this->session->userdata('language'))
                    $siteLang = $this->session->userdata('language');
                else
                    $siteLang = 'es';

                $data['component_text'] = $this->Frontend_model->getComponentTexts($siteLang);
                $data['contact_info'] = $this->Frontend_model->getContactInfo();
                $data['area_toggle'] = $area_toggle;
                $data['working_hours'] = $this->Frontend_model->getWorkingHours($siteLang);
                $data['verify_link'] = $link;

                $this->session->set_userdata('alert_status', 'error');
                $this->session->set_userdata('alert_message', 'Password is not correct!');
                $this->session->set_userdata('page_status', 'verify');
                $this->session->unset_userdata('loginresult');

                $this->load->view('login', $data);
            }
        }
    }

    public function changeCaptchaImage()
    {
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
        echo $captcha_image;
    }

    public function setLang()
    {
        $lang = $this->input->post('language');
        $this->session->set_userdata('language', $lang);
    }
}
