<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

use GuzzleHttp\Client;

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Terms_of_use extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Patient_model");
        $this->load->model("Frontend_model");
    }

    public function index()
    {
        // get terms of use
        $url = $this->config->item("medical_center_url") . "api/terms_of_use";
        $client = new Client([
            'timeout' => 1800,
            'connect_timeout' => 60,
        ]);
        $requestData = [
            'form_params' => [
                'clinic_id' => 10,
                'lang' => $this->session->userdata('language')
            ]
        ];
        $response = $client->request('POST', $url, $requestData);

        $data['info'] = json_decode($response->getBody(), true);
        $data['contact_info'] = $this->Frontend_model->getContactInfo();
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

        $this->session->set_userdata("page_status", "terms_of_use");

        $this->load->view('terms_of_use', $data);
    }
}
