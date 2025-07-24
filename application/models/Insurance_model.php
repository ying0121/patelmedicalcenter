<?php
class Insurance_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getinsurance()
	{
		$this->db->select('*');
		$this->db->from('insurances');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function addinsurance($name, $email, $phone, $fax, $address, $city, $state, $zip, $status, $img)
	{
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'fax' => $fax,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'status' => $status,
			'img' => $img
		);
		$result = $this->db->insert('insurances', $data);
		return $result;
	}
	function editinsurance($id, $name, $email, $phone, $fax, $address, $city, $state, $zip, $status, $img)
	{
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'fax' => $fax,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'status' => $status,
			'img' => $img
		);
		$result = $this->db->update('insurances', $data, 'id=' . $id);
		return $result;
	}
	function choseninsurance($id)
	{
		$this->db->select('*');
		$this->db->from('insurances');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function editinsurancestatus($id, $value)
	{
		$data = array(
			'status' => $value,
		);
		$result = $this->db->update('insurances', $data, 'id=' . $id);
		return $result;
	}
	function updateimg($id, $img)
	{
		$data = array(
			'img' => $img,
		);
		$result = $this->db->update('insurances', $data, 'id=' . $id);
		return $result;
	}
	function deleteinsurance($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('insurances');
		return $result;
	}
	function refreshinsurance($insurances)
	{
		foreach ($insurances as $insurance) {
			$data = array(
				'insurance_id' => $insurance['id'],
				'name' => $insurance['name'],
				'email' => $insurance['email'],
				'phone' => $insurance['phone'],
				'fax' => $insurance['fax'],
				'address' => $insurance['address'],
				'city' => $insurance['city'],
				'state' => $insurance['state'],
				'zip' => $insurance['zip'],
				'status' => $insurance['status'],
				'img' => $insurance['img']
			);
			$res = $this->db->select("*")->from("insurances")->where("insurance_id", $data['insurance_id'])->get()->row_array();
			if ($res['insurance_id']) {
				$this->db->update('insurances', $data, "insurance_id=" . $data['insurance_id']);
			} else {
				$this->db->insert('insurances', $data);
			}
		}
	}
}
