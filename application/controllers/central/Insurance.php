<?php


defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

class Insurance extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Insurance_model');
		$this->load->helper('url');
	}
	public function index()
	{
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('central', 'refresh');
		$data['sideitem'] = 'insurance';
		$this->load->view('central/insurance', $data);
	}
	public function getinsurance()
	{
		$result = $this->Insurance_model->getinsurance();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addinsurance()
	{
		$name = $this->input->post('insurance_name');
		$email = $this->input->post('insurance_email');
		$phone = $this->input->post('insurance_phone');
		$fax = $this->input->post('insurance_fax');
		$address = $this->input->post('insurance_address');
		$city = $this->input->post('insurance_city');
		$state = $this->input->post('insurance_state');
		$zip = $this->input->post('insurance_zip');
		$status = $this->input->post('insurance_status');
		$img = $this->input->post('insurance_img');
		$result = $this->Insurance_model->addinsurance($name, $email, $phone, $fax, $address, $city, $state, $zip, $status, $img);
		if ($result)
			redirect('central/insurance', 'refresh');
	}
	public function editinsurance()
	{
		$id = $this->input->post('chosen_id');
		$name = $this->input->post('einsurance_name');
		$email = $this->input->post('einsurance_email');
		$phone = $this->input->post('einsurance_phone');
		$fax = $this->input->post('einsurance_fax');
		$address = $this->input->post('einsurance_address');
		$city = $this->input->post('einsurance_city');
		$state = $this->input->post('einsurance_state');
		$zip = $this->input->post('einsurance_zip');
		$status = $this->input->post('einsurance_status');
		$img = $this->input->post('insurance_img');
		$result = $this->Insurance_model->editinsurance($id, $name, $email, $phone, $fax, $address, $city, $state, $zip, $status, $img);
		if ($result)
			redirect('central/insurance', 'refresh');
	}
	public function choseninsurance()
	{
		$id = $this->input->post('id');
		$result = $this->Insurance_model->choseninsurance($id);
		if ($result)
			echo json_encode($result);
	}
	public function editinsurancestatus()
	{
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$result = $this->Insurance_model->editinsurancestatus($id, $value);
		if ($result)
			echo "ok";
	}
	public function deleteinsurance()
	{
		$id = $this->input->post('id');
		$result = $this->Insurance_model->deleteinsurance($id);
		if ($result)
			echo "ok";
	}
	public function updateimg()
	{
		$id = $this->input->post('chosen_ins_img_id');
		$filename = generateRandomString(10);
		$config['upload_path']          = './assets/images/insurance/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 20480000;
		$config['max_width']            = 1024 * 5;
		$config['max_height']           = 768 * 5;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			redirect('central/insurance', 'refresh');
		} else {
			$data = array('upload_data' => $this->upload->data());
			$result = $this->Insurance_model->updateimg($id, $data['upload_data']['orig_name']);
			if ($result)
				redirect('central/insurance', 'refresh');
		}
	}
}
