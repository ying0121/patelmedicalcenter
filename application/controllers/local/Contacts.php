<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class Contacts extends CI_Controller
{

	public $qrcode_path = './assets/images/common/qrcode.png';

	function __construct()
	{
		parent::__construct();
		$this->load->model('Content_model');
		$this->load->model('AreaToggle_model');
		$this->load->model('ContactInfo_model');
		$this->load->model('Patient_model');
		$this->load->model('Frontend_model');
		$this->load->model('Vault_model');
		$this->load->model('Communication_model');

		$this->load->model('Contacts_model');
		$this->load->helper('url');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'contacts';
		$data['component'] = $this->Content_model->getComponentTexts();
		$data['area_toggle'] = $this->AreaToggle_model->read();
		$data['contact_info'] = $this->ContactInfo_model->read();

		$data['total'] = $this->Contacts_model->gettotals();
		$this->load->model('manager_model', 'manager_model');
		$data['managers'] = $this->manager_model->read();
		$this->load->model('survey_model', 'survey_model');
		$data['survey'] = $this->survey_model->getsurvey();
		$this->load->view('local/contacts', $data);
	}
	public function gettracks()
	{
		$result = $this->Contacts_model->gettracks();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function viewtrack()
	{
		$id = $this->input->post('id');
		$result = $this->Contacts_model->viewtrack($id);
		if ($result)
			echo json_encode($result);
	}
	public function deletetrack()
	{
		$id = $this->input->post('id');
		$result = $this->Contacts_model->deletetrack($id);
		if ($result)
			echo "ok";
	}
	public function updatetrack()
	{
		$data['id'] = $this->input->post('id');
		$data['patient_id'] = $this->input->post('patient_id');
		$data['case_number'] = $this->input->post('case_number');
		$data['assign'] = $this->input->post('assign');
		$data['priority'] = $this->input->post('priority');
		$data['status'] = $this->input->post('status');
		$data['old_status'] = $this->input->post('old_status');
		$data['comment'] = $this->input->post('comment');
		$data['date'] = date('Y-m-d H:i:s');

		// 1. send to central begin //
		$central_data = array(
			'case_number' => $data['case_number'],
			'assign' => $data['assign'],
			'priority' => $data['priority'],
			'status' => $data['status']
		);

		// API endpoint URL
		$url = $this->config->item('medical_center_url') . 'api/updateContactTrackByCase';

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
		// 1. send to central end //

		if ($data['old_status'] != $data['status']) {
			$patient_info = $this->Patient_model->choose($data['patient_id']);
			$component_text = $this->Frontend_model->getComponentTexts($patient_info['language'] ?? 'en');
			$contact_info = $this->ContactInfo_model->read();
			$track_info = $this->Contacts_model->viewtrack($data['id']);

			// Generate QrCode
			$vCard = "BEGIN:VCARD\n";
			$vCard .= "VERSION:3.0\n";
			$vCard .= "NAME:" . $track_info['name'] . "\n";
			$vCard .= "EMAIL:" . $track_info['email'] . "\n";
			$vCard .= "VERIFY URL:https://patelmedicalcenter.com/PtLogin/\n";
			$vCard .= "END:VCARD";

			$qrCode = QrCode::create($vCard)
				->setEncoding(new Encoding('UTF-8'))
				->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
				->setSize(300)
				->setMargin(10);
			$writer = new PngWriter();
			error_log($writer->write($qrCode)->getString());
			file_put_contents($this->qrcode_path, $writer->write($qrCode)->getString());

			// 2. send email begin //
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

			$this->email->to($track_info['email']);

			$subject = $data['status'] == 3 ? $component_text['t_pa_ec_subject'] : $component_text['t_pa_eu_subject'];
			$subject = str_replace('$case;', $data['case_number'], $subject);
			$subject = str_replace('$acr;', $contact_info['acronym'], $subject);

			$body = $data['status'] == 3 ? $component_text['t_pa_ec_etext'] : $component_text['t_pa_eu_etext'];
			$body = str_replace('$case;', $data['case_number'], $body);
			$body = str_replace('$acr;', $contact_info['acronym'], $body);
			$body = str_replace('$br;', "<br>", $body);
			$body = str_replace('$patient_name;', $track_info['name'], $body);

			$mail_body = array(
				'status' => $data['status'],
				'disclaimer' => $component_text['t_pa_ea_disclaimer'],
				'subject' => $subject,
				'body' => $body,
				'url' => 'https://patelmedicalcenter.com/PtLogin',
				'qrcode' => $this->qrcode_path
			);
			$html = $this->load->view('email/emailupdate.php', $mail_body, TRUE);
			$this->email->subject('Case #: ' . $data['case_number'] . $contact_info['acronym'] . ' Email From ' . $contact_info['name']);
			$this->email->message($html);
			$this->email->send();
			// 2. send email end //
		}

		if ($data['status'] == 3) {
			$data['closed_date'] = date('Y-m-d H:i:s');
		}
		$result = $this->Contacts_model->addUpdatedContact($data);
		if ($result) {
			if ($data['comment'] != null && $data['comment'] != "") {
				$this->Contacts_model->addcomments($data['id'], $this->session->userdata('userid'), $data['comment']);
			}
			echo json_encode(array('status' => 'ok'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
	public function comments($ticketid)
	{
		$data['comments'] = $this->Contacts_model->comments($ticketid);
		$data['sideitem'] = 'contacts';
		$this->load->view('local/comments', $data);
	}
	public function updateContactDesc()
	{
		$desc_en = $this->input->post('desc_en');
		$desc_es = $this->input->post('desc_es');
		$this->Content_model->updateComponent('t_contact_desc', $desc_en, $desc_es);
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

		$this->Vault_model->clearUnreadCount($data['id'], 'staff');
		$this->Vault_model->setSeen($data);
		$result = $this->Vault_model->viewCommunicationHistory($data);
		$contact = $this->Contacts_model->viewtrack($data['id']);

		if ($result) {
			echo json_encode(array('history' => $result, 'contact' => $contact, 'status' => 'success'));
		} else {
			echo json_encode(array('history' => [], 'contact' => $contact, 'status' => 'error'));
		}
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
		$this->email->to($contact['email']);
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
}
