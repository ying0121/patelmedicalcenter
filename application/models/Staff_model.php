<?php
class Staff_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//cemail Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('staff');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function create($en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status, $acc_assigned, $acc_email, $general_assigned, $general_email, $spec_assigned, $spec_email)
	{
		$account_request = 0;
		if ($acc_assigned == 'true') $account_request += 1;
		if ($acc_email == 'true') $account_request += 2;
		$general_online = 0;
		if ($general_assigned == 'true') $general_online += 1;
		if ($general_email == 'true') $general_online += 2;
		$spec_message = 0;
		if ($spec_assigned == 'true') $spec_message += 1;
		if ($spec_email == 'true') $spec_message += 2;

		$data = array(
			'en_name' => $en_name,
			'es_name' => $es_name,
			'en_job' => $en_job,
			'es_job' => $es_job,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'en_fdesc' => $en_fdesc,
			'es_fdesc' => $es_fdesc,
			'status' => $status,
			'account_request' => $account_request,
			'general_online' => $general_online,
			'spec_message' => $spec_message,
			'img' => 'default.jpg'
		);
		$result = $this->db->insert('staff', $data);
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update($id, $en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status, $email, $tel, $ext, $email_tel_ext_toggle, $send_message_toggle, $acc_assigned, $acc_email, $general_assigned, $general_email, $spec_assigned, $spec_email)
	{
		$account_request = 0;
		if ($acc_assigned == 'true') $account_request += 1;
		if ($acc_email == 'true') $account_request += 2;
		$general_online = 0;
		if ($general_assigned == 'true') $general_online += 1;
		if ($general_email == 'true') $general_online += 2;
		$spec_message = 0;
		if ($spec_assigned == 'true') $spec_message += 1;
		if ($spec_email == 'true') $spec_message += 2;

		$data = array(
			'en_name' => $en_name,
			'es_name' => $es_name,
			'en_job' => $en_job,
			'es_job' => $es_job,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'en_fdesc' => $en_fdesc,
			'es_fdesc' => $es_fdesc,
			'status' => $status,
			'email' => $email,
			'account_request' => $account_request,
			'general_online' => $general_online,
			'spec_message' => $spec_message,
			'tel' => $tel,
			'ext' => $ext,
			'send_message_toggle' => $send_message_toggle,
			'email_tel_ext_toggle' => $email_tel_ext_toggle,
		);
		error_log(json_encode($data));
		$result = $this->db->update('staff', $data, 'id=' . $id);
		return $result;
	}
	function updateImg($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('staff', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('staff');
		return $result;
	}
	function getStaffForGeneralOnlineEmail()
	{
		$staffs = $this->db->select('*')->from('staff')->where('general_online >', '1')->get()->result_array();
		return $staffs;
	}
	function getStaffForGeneralOnlineAssigned()
	{
		$staffs = $this->db->select('*')->from('staff')->where('general_online', '1')->or_where('general_online', '3')->get()->result_array();
		return $staffs;
	}
	function getStaffForAccountRequestEmail()
	{
		$staffs = $this->db->select('*')->from('staff')->where('account_request >', '1')->get()->result_array();
		return $staffs;
	}
	function getStaffForAccountRequestAssigned()
	{
		$staffs = $this->db->select('*')->from('staff')->where('account_request', '1')->or_where('account_request', '3')->get()->result_array();
		return $staffs;
	}
}
