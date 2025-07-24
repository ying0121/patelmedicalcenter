<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
include('utilities.php');

require_once 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Dompdf\Dompdf;

class TheClinic extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('AreaToggle_model');
        $this->load->model('ContactInfo_model');

        $this->load->model('WorkingHour_model');
        $this->load->model('SocialMedia_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'the_clinic';
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['area_toggle'] = $this->AreaToggle_model->read();
        $data['contact_info'] = $this->ContactInfo_model->read();

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
            ->setSize(300)
            ->setMargin(-18);
        // Png File
        $writer = new PngWriter();
        $writer->write($qrCode)->saveToFile('assets/images/qrcode.png');
        // PDF File
        $dompdf = new Dompdf();
        $html = '
            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <img src="data:image/png;base64,' . base64_encode($writer->write($qrCode)->getString()) . '">
            </div>
        ';
        $dompdf->loadHtml($html);
        $dompdf->setPaper('B5', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        $file_name = 'assets/documents/qrcode.pdf';
        file_put_contents($file_name, $pdf);

        $this->load->view('local/the_clinic/main', $data);
    }
    public function createSocialMedia()
    {
        $url = $this->input->post('url');
        $result = $this->SocialMedia_model->create($url);
        if ($result)
            echo "ok";
    }
    public function readSocialMedia()
    {
        $result = $this->SocialMedia_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function updateSocialMedia()
    {
        $id = $this->input->post('id');
        $url = $this->input->post('url');
        $status = $this->input->post('status');
        $result = $this->SocialMedia_model->update($id, $url, $status);
        if ($result)
            echo "ok";
    }
    public function uploadSocialMedia()
    {
        $filename = generateRandomString(10);
        $config['upload_path']          = './assets/images/social_media/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (! $this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            echo "failed";
        } else {
            $data = array('upload_data' => $this->upload->data());

            $id = $this->input->post('id');
            $chosen = $this->SocialMedia_model->choose($id);
            if ($chosen['img'] != 'default.jpg')
                unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/social_media/" . $chosen['img']);
            $result = $this->SocialMedia_model->upload($id, $data['upload_data']['orig_name']);

            if ($result)
                echo "ok";
        }
    }
    function deleteSocialMedia()
    {
        $id = $this->input->post('id');
        $chosen = $this->SocialMedia_model->choose($id);
        if ($chosen['img'] != 'default.jpg')
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/social_media/" . $chosen['img']);
        $result = $this->SocialMedia_model->delete($id);
        if ($result)
            echo "ok";
    }
    function chooseSocialMedia()
    {
        $id = $this->input->post('id');
        $result = $this->SocialMedia_model->choose($id);
        if ($result)
            echo json_encode($result);
    }


    public function updateContactInfo()
    {
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $acronym = $this->input->post('acronym');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $tel = $this->input->post('tel');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        $domain = $this->input->post('domain');
        $portal = $this->input->post('portal');
        $portal_show = $this->input->post('portal_show');
        $this->ContactInfo_model->update($name, $address, $acronym, $city, $state, $zip, $tel, $fax, $email, $domain, $portal, $portal_show);

        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $result = $this->Content_model->updateComponent('t_location_desc', $desc_en, $desc_es);
        if ($result) {
            echo json_encode(array(
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
            ));
        } else
            echo "fail";
    }

    //Wortime Area
    public function readWorkingHour()
    {
        $result = $this->WorkingHour_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function createWorkingHour()
    {
        $en_day = $this->input->post('en_day');
        $es_day = $this->input->post('es_day');
        $en_time = $this->input->post('en_time');
        $es_time = $this->input->post('es_time');
        $result = $this->WorkingHour_model->create($en_day, $es_day, $en_time, $es_time);
        if ($result)
            echo "ok";
    }
    public function chooseWorkingHour()
    {
        $id = $this->input->post('id');
        $result = $this->WorkingHour_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
    public function updateWorkingHour()
    {
        $id = $this->input->post('id');
        $en_day = $this->input->post('en_day');
        $es_day = $this->input->post('es_day');
        $en_time = $this->input->post('en_time');
        $es_time = $this->input->post('es_time');
        $result = $this->WorkingHour_model->update($id, $en_day, $es_day, $en_time, $es_time);
        if ($result)
            echo "ok";
    }
    public function deleteWorkingHour()
    {
        $id = $this->input->post('id');
        $result = $this->WorkingHour_model->delete($id);
        if ($result)
            echo json_encode($result);
    }
    public function updateAfterHour()
    {
        $after_hours_en = $this->input->post('after_hours_en');
        $after_hours_es = $this->input->post('after_hours_es');

        $result = $this->Content_model->updateComponent('t_after_hours', $after_hours_en, $after_hours_es);
        if ($result)
            echo "ok";
    }

    public function updateAdditional()
    {

        $val_en = $this->input->post('data')[0];
        $val_es = $this->input->post('data')[1];
        $this->Content_model->updateComponent('t_clinic_additional_1_title', $val_en, $val_es);

        $val_en = $this->input->post('data')[2];
        $val_es = $this->input->post('data')[3];
        $this->Content_model->updateComponent('t_clinic_additional_1_desc', $val_en, $val_es);

        $val_en = $this->input->post('data')[4];
        $val_es = $this->input->post('data')[5];
        $this->Content_model->updateComponent('t_clinic_additional_2_title', $val_en, $val_es);

        $val_en = $this->input->post('data')[6];
        $val_es = $this->input->post('data')[7];
        $this->Content_model->updateComponent('t_clinic_additional_2_desc', $val_en, $val_es);

        $val_en = $this->input->post('data')[8];
        $val_es = $this->input->post('data')[9];
        $this->Content_model->updateComponent('t_clinic_additional_3_title', $val_en, $val_es);

        $val_en = $this->input->post('data')[10];
        $val_es = $this->input->post('data')[11];
        $this->Content_model->updateComponent('t_clinic_additional_3_desc', $val_en, $val_es);

        $val_en = $this->input->post('data')[12];
        $val_es = $this->input->post('data')[13];
        $this->Content_model->updateComponent('t_clinic_additional_4_title', $val_en, $val_es);

        $val_en = $this->input->post('data')[14];
        $val_es = $this->input->post('data')[15];
        $this->Content_model->updateComponent('t_clinic_additional_4_desc', $val_en, $val_es);

        $val_en = $this->input->post('data')[16];
        $val_es = $this->input->post('data')[17];
        $this->Content_model->updateComponent('t_clinic_additional_5_title', $val_en, $val_es);

        $val_en = $this->input->post('data')[18];
        $val_es = $this->input->post('data')[19];

        $result = $this->Content_model->updateComponent('t_clinic_additional_5_desc', $val_en, $val_es);
        if ($result)
            echo "ok";
    }
    public function uploadLogo()
    {
        $filename = $this->input->post("filename");
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/" . $filename);
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (! $this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array("status" => "error"));
        } else
            echo json_encode(array("status" => "success"));
    }

    // download QRCode file
    public function getQRCode()
    {
        $filetype = $_GET['filetype'];
        if (($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null) && ($this->session->userdata('patient_id') == '' || $this->session->userdata('patient_name') == null))
            redirect('admin', 'refresh');

        $filePath = "";
        if ($filetype == 'png') {
            $filePath = "assets/images/qrcode.png";
        } else if ($filetype == 'pdf') {
            $filePath = "assets/documents/qrcode.pdf";
        }

        // Check if the file exists and is readable
        if (file_exists($filePath) && is_readable($filePath)) {
            // Set appropriate headers
            header('Content-Description: File Transfer');
            header('Content-Type: ' . mime_content_type($filePath));
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Clear output buffer
            ob_clean();
            flush();

            // Output the file content
            readfile($filePath);
            exit;
        } else {
            // If the file does not exist or is not readable, return a 404 error
            show_404();
        }
    }
}
