<?php
class Doctor_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//cemail Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('doctor');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function create($en_name, $es_name, $en_job, $es_job, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status)
	{
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
		);
		$result = $this->db->insert('doctor', $data);
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('doctor');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update(
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
	) {
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
			'tel' => $tel,
			'ext' => $ext,
			'send_message_toggle' => $send_message_toggle,
			'email_tel_ext_toggle' => $email_tel_ext_toggle,

			'npi' => $npi,
			'specialty' => $specialty,
			'license' => $license,
			'license_state' => $license_state,
			'license_start' => $license_start,
			'license_end' => $license_end,
			'dea' => $dea,
			'dea_start' => $dea_start,
			'dea_end' => $dea_end
		);
		$result = $this->db->update('doctor', $data, 'id=' . $id);
		return $result;
	}
	function updateImg($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('doctor', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('doctor');
		return $result;
	}
}
