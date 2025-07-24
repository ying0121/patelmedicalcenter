<?php
class PatientReview_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//cemail Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('patient_review');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function create($en_name, $es_name, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status)
	{
		$data = array(
			'en_name' => $en_name,
			'es_name' => $es_name,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'en_fdesc' => $en_fdesc,
			'es_fdesc' => $es_fdesc,
			'status' => $status,
		);
		$result = $this->db->insert('patient_review', $data);
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('patient_review');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update($id, $en_name, $es_name, $en_desc, $es_desc, $en_fdesc, $es_fdesc, $status)
	{
		$data = array(
			'en_name' => $en_name,
			'es_name' => $es_name,
			'en_desc' => $en_desc,
			'es_desc' => $es_desc,
			'en_fdesc' => $en_fdesc,
			'es_fdesc' => $es_fdesc,
			'status' => $status,
		);
		$result = $this->db->update('patient_review', $data, 'id=' . $id);
		return $result;
	}
	function updateImg($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('patient_review', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('patient_review');
		return $result;
	}
}
