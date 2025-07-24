<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
include('utilities.php');
class Staff extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('AreaToggle_model');
		$this->load->model('Content_model');
		$this->load->model('ContactInfo_model');

		$this->load->model('Staff_model');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'staff';
		$data['area_toggle'] = $this->AreaToggle_model->read();
		$data['component'] = $this->Content_model->getComponentTexts();
		$data['contact_info'] = $this->ContactInfo_model->read();

		$this->load->view('local/staff', $data);
	}
	//Cemail Area
	public function updateStaffDesc()
	{
		$title_en = $this->input->post('title_en');
		$title_es = $this->input->post('title_es');
		$desc_en = $this->input->post('desc_en');
		$desc_es = $this->input->post('desc_es');

		$result_1 = $this->Content_model->updateComponent('t_staff_title', $title_en, $title_es);
		$result_2 = $this->Content_model->updateComponent('t_staff_desc', $desc_en, $desc_es);
		if ($result_1 && $result_2)
			echo "ok";
	}
	public function read()
	{
		$result = $this->Staff_model->read();
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
		$acc_assigned = $this->input->post('type_acc_assigned');
		$acc_email = $this->input->post('type_acc_email');
		$general_assigned = $this->input->post('type_general_assigned');
		$general_email = $this->input->post('type_general_email');
		$spec_assigned = $this->input->post('type_spec_assigned');
		$spec_email = $this->input->post('type_spec_email');
		$status = $this->input->post('status');
		$result = $this->Staff_model->create($en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status, $acc_assigned, $acc_email, $general_assigned, $general_email, $spec_assigned, $spec_email);
		if ($result)
			echo "ok";
	}
	public function choose()
	{
		$id = $this->input->post('id');
		$result = $this->Staff_model->choose($id);
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
		$acc_assigned = $this->input->post('etype_acc_assigned');
		$acc_email = $this->input->post('etype_acc_email');
		$general_assigned = $this->input->post('etype_general_assigned');
		$general_email = $this->input->post('etype_general_email');
		$spec_assigned = $this->input->post('etype_spec_assigned');
		$spec_email = $this->input->post('etype_spec_email');
		$tel = $this->input->post('tel');
		$ext = $this->input->post('ext');
		$email_tel_ext_toggle = $this->input->post('email_tel_ext_toggle');
		$send_message_toggle = $this->input->post('send_message_toggle');

		$result = $this->Staff_model->update($id, $en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status, $email, $tel, $ext, $email_tel_ext_toggle, $send_message_toggle, $acc_assigned, $acc_email, $general_assigned, $general_email, $spec_assigned, $spec_email);
		if ($result)
			echo "ok";
	}
	public function uploadImg()
	{
		$id = $this->input->post('id');
		$filename = generateRandomString(10);
		$config['upload_path']          = './assets/images/staffs/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480000;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			echo "fail";
		} else {
			$chosen = $this->Staff_model->choose($id);
			if ($chosen['img'] != 'default.jpg')
				unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/staffs/" . $chosen['img']);

			$data = array('upload_data' => $this->upload->data());
			$result = $this->Staff_model->updateImg($id, $data['upload_data']['orig_name']);
			if ($result)
				echo "ok";
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$chosen = $this->Staff_model->choose($id);
		if ($chosen['img'] != 'default.jpg')
			unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/staffs/" . $chosen['img']);
		$result = $this->Staff_model->delete($id);
		if ($result)
			echo "ok";
	}
}
