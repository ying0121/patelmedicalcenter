<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
include('utilities.php');
class PatientReview extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// Load member model
		$this->load->model('PatientReview_model');
		$this->load->model('ContactInfo_model');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'patient_review';
		$data['contact_info'] = $this->ContactInfo_model->read();

		$this->load->view('local/patient_review', $data);
	}
	//Cemail Area
	public function read()
	{
		$result = $this->PatientReview_model->read();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function create()
	{
		$en_name = $this->input->post('en_name');
		$es_name = $this->input->post('es_name');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$en_fdesc = $this->input->post('en_fdesc');
		$es_fdesc = $this->input->post('es_fdesc');
		$status = $this->input->post('status');
		$result = $this->PatientReview_model->create($en_name, $es_name, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status);
		if ($result)
			echo "ok";
	}
	public function choose()
	{
		$id = $this->input->post('id');
		$result = $this->PatientReview_model->choose($id);
		if ($result)
			echo json_encode($result);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$en_name = $this->input->post('en_name');
		$es_name = $this->input->post('es_name');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$en_fdesc = $this->input->post('en_fdesc');
		$es_fdesc = $this->input->post('es_fdesc');
		$status = $this->input->post('status');
		$result = $this->PatientReview_model->update($id, $en_name, $es_name, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status);
		if ($result)
			echo "ok";
	}
	public function uploadImg()
	{
		$id = $this->input->post('id');
		$filename = generateRandomString(10);
		$config['upload_path']          = './assets/images/patient_review/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480000;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			echo "fail";
		} else {
			$chosen = $this->PatientReview_model->choose($id);
			if ($chosen['img'] != 'default.jpg')
				unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/patient_review/" . $chosen['img']);

			$data = array('upload_data' => $this->upload->data());
			$result = $this->PatientReview_model->updateImg($id, $data['upload_data']['orig_name']);
			if ($result)
				echo "ok";
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');

		$chosen = $this->PatientReview_model->choose($id);
		if ($chosen['img'] != 'default.jpg')
			unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/patient_review/" . $chosen['img']);

		$result = $this->PatientReview_model->delete($id);
		if ($result)
			echo "ok";
	}
}
