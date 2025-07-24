<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

//require 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;

class Manager extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// Load member model
		$this->load->model('ContactInfo_model');
		$this->load->model('Security_model');

		$this->load->model('Manager_model');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'manager';
		$data['answers'] = $this->Security_model->readOnlyActive();
		$data['contact_info'] = $this->ContactInfo_model->read();

		$this->load->view('local/manager', $data);
	}
	public function read()
	{
		$result = $this->Manager_model->read();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function create()
	{
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$type = $this->input->post('type');
		$status = $this->input->post('status');
		$result = $this->Manager_model->create($fname, $lname, $email, $type, $status);
		if ($result)
			echo "ok";
	}
	public function choose()
	{
		$id = $this->input->post('id');
		$result = $this->Manager_model->choose($id);
		if ($result)
			echo json_encode($result);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$email = $this->input->post('email');
		$type = $this->input->post('type');
		$status = $this->input->post('status');
		$result = $this->Manager_model->update($id, $fname, $lname, $email, $type, $status);
		if ($result)
			echo "ok";
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$result = $this->Manager_model->delete($id);
		if ($result)
			echo "ok";
	}
	public function resetpwd()
	{
		$id = $this->input->post('id');
		$pwd = $this->input->post('pwd');
		$result = $this->Manager_model->resetpwd($id, $pwd);
		if ($result)
			echo "ok";
	}
	public function updateAccessRights()
	{
		$id = $this->input->post('id');
		$access_rights = $this->input->post('access_rights');
		$result = $this->Manager_model->updateAccessRights($id, $access_rights);
		if ($result)
			echo "ok";
	}
	public function getQRCode()
	{

		$vCard = "BEGIN:VCARD\n";
		$vCard .= "VERSION:3.0\n";
		$vCard .= "N:" . $this->input->post('name') . "\n";
		$vCard .= "EMAIL:" . $this->input->post('email') . "\n";
		$vCard .= "END:VCARD";
		// Create a QR code
		$qrCode = QrCode::create($vCard)
			->setEncoding(new Encoding('UTF-8'))
			->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
			->setSize(300)
			->setMargin(10);

		$writer = new PngWriter();

		$dataUri = $writer->write($qrCode)->getDataUri();
		echo $dataUri;
	}
	public function setSecurity()
	{
		$data['user_id'] = $_POST['id'];
		$data['question_id'] = $_POST['question_id'];
		$data['answer'] = $_POST['answer'];
		$data['user_type'] = 'manager';

		// get exist
		$result = $this->Security_model->getUserSecurity($data);
		if ($result[0]) {
			$result = $this->Security_model->updateUserSecurity($data);
			if ($result) {
				echo 'ok';
			} else {
				echo 'error';
			}
		} else {
			$result = $this->Security_model->addUserSecurity($data);
			if ($result) {
				echo 'ok';
			} else {
				echo 'error';
			}
		}
	}
}
