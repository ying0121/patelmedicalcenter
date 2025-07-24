<?php
class ContactInfo_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Clinic info Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('contactinfo');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update($name, $address, $acronym, $city, $state, $zip, $tel, $fax, $email, $domain, $portal, $portal_show)
	{
		$data = array(
			'name' => $name,
			'address' => $address,
			'acronym' => $acronym,
			'city' => $city,
			'state' => $state,
			'zip' => $zip,
			'tel' => $tel,
			'fax' => $fax,
			'email' => $email,
			'domain' => $domain,
			'portal' => $portal,
			'portal_show' => $portal_show,
			'status' => 1,
		);
		$result = $this->db->update('contactinfo', $data, 'id=1');
		return $result;
	}
	function readAcronym()
	{
		$this->db->select('acronym');
		$this->db->from('contactinfo');
		$this->db->where('id', '1');
		$result = $this->db->get()->result_array();
		if ($result) return $data['acronym'] = $result[0];
		else return '';
	}
}
