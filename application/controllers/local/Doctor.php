<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
include('utilities.php');
class Doctor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// Load member model
		$this->load->model('AreaToggle_model');
		$this->load->model('Content_model');
		$this->load->model('ContactInfo_model');

		$this->load->model('Doctor_model');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'doctor';
		$data['area_toggle'] = $this->AreaToggle_model->read();
		$data['component'] = $this->Content_model->getComponentTexts();
		$data['contact_info'] = $this->ContactInfo_model->read();

		$this->load->view('local/doctor/main', $data);
	}
	//Cemail Area
	public function updateDoctorDesc()
	{
		$title_en = $this->input->post('title_en');
		$title_es = $this->input->post('title_es');
		$desc_en = $this->input->post('desc_en');
		$desc_es = $this->input->post('desc_es');

		$result_1 = $this->Content_model->updateComponent('t_doctor_title', $title_en, $title_es);
		$result_2 = $this->Content_model->updateComponent('t_doctor_desc', $desc_en, $desc_es);
		if ($result_1 && $result_2)
			echo "ok";
	}
	public function read()
	{
		$result = $this->Doctor_model->read();
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
		$en_job = $this->input->post('en_job');
		$es_job = $this->input->post('es_job');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$en_fdesc = $this->input->post('en_fdesc');
		$es_fdesc = $this->input->post('es_fdesc');
		$status = $this->input->post('status');
		$result = $this->Doctor_model->create($en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status);
		if ($result)
			echo "ok";
	}
	public function choose()
	{
		$id = $this->input->post('id');
		$result = $this->Doctor_model->choose($id);
		if ($result)
			echo json_encode($result);
	}
	public function update()
	{
		$id = $this->input->post('id');
		$en_name = $this->input->post('en_name');
		$es_name = $this->input->post('es_name');
		$en_job = $this->input->post('en_job');
		$es_job = $this->input->post('es_job');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$en_fdesc = $this->input->post('en_fdesc');
		$es_fdesc = $this->input->post('es_fdesc');
		$status = $this->input->post('status');
		$email = $this->input->post('email');
		$tel = $this->input->post('tel');
		$ext = $this->input->post('ext');
		$email_tel_ext_toggle = $this->input->post('email_tel_ext_toggle');
		$send_message_toggle = $this->input->post('send_message_toggle');

		$npi = $this->input->post('npi');
		$specialty = $this->input->post('specialty');
		$license = $this->input->post('license');
		$license_state = $this->input->post('license_state');
		$license_start = $this->input->post('license_start');
		$license_end = $this->input->post('license_end');
		$dea = $this->input->post('dea');
		$dea_start = $this->input->post('dea_start');
		$dea_end = $this->input->post('dea_end');

		$result = $this->Doctor_model->update(
			$id,
			$en_name,
			$es_name,
			$en_job,
			$es_job,
			$en_desc,
			$es_desc,
			$en_fdesc,
			$es_fdesc,
			$status,
			$email,
			$tel,
			$ext,
			$email_tel_ext_toggle,
			$send_message_toggle,
			$npi,
			$specialty,
			$license,
			$license_state,
			$license_start,
			$license_end,
			$dea,
			$dea_start,
			$dea_end
		);
		if ($result)
			echo "ok";
	}

	public function uploadImg()
	{
		$id = $this->input->post('id');
		$filename = generateRandomString(10);
		$config['upload_path']          = './assets/images/doctors/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480000;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			echo "fail";
		} else {
			$chosen = $this->Doctor_model->choose($id);
			if ($chosen['img'] != 'default.jpg')
				unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/doctors/" . $chosen['img']);

			$data = array('upload_data' => $this->upload->data());
			$result = $this->Doctor_model->updateImg($id, $data['upload_data']['orig_name']);
			if ($result)
				echo "ok";
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');

		$chosen = $this->Doctor_model->choose($id);
		if ($chosen['img'] != 'default.jpg')
			unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/doctors/" . $chosen['img']);

		$result = $this->Doctor_model->delete($id);
		if ($result)
			echo "ok";
	}
}
