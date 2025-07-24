<?php
class Manager_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//cemail Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('managers');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function create($fname, $lname, $email, $type, $status)
	{
		$data = array(
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
			'type' => $type,
			'status' => $status,
		);
		$result = $this->db->insert('managers', $data);
		return $result;
	}
	function auth($email, $password)
	{
		$condition = "email ='" . $email . "' AND " . "password ='" . MD5($password) . "'";
		$this->db->select('*');
		$this->db->from('managers');
		$this->db->where($condition);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('managers');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update($id, $fname, $lname, $email, $type, $status)
	{
		$data = array(
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
			'type' => $type,
			'status' => $status,
		);
		$result = $this->db->update('managers', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('managers');
		return $result;
	}
	function resetpwd($id, $pwd)
	{
		$data = array(
			'password' => MD5($pwd),
		);
		$result = $this->db->update('managers', $data, 'id=' . $id);
		return $result;
	}
	function updateAccessRights($id, $access_rights)
	{
		$data = array(
			'access_rights' => $access_rights
		);
		$result = $this->db->update('managers', $data, 'id=' . $id);
		return $result;
	}
}
