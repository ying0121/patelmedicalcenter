<?php
class Meta_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	//Clinic info Area
	function read()
	{
		$this->db->select('*');
		$this->db->from('meta');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function updateMeta($meta_title, $meta_desc)
	{
		$data = array(
			'meta_title' => $meta_title,
			'meta_desc' => $meta_desc
		);
		$result = $this->db->update('meta', $data, 'id=1');
		return $result;
	}
	function updateFacebook($facebook_title, $facebook_desc)
	{
		$data = array(
			'facebook_title' => $facebook_title,
			'facebook_desc' => $facebook_desc
		);
		$result = $this->db->update('meta', $data, 'id=1');
		return $result;
	}
	function updateTwitter($twitter_title, $twitter_desc)
	{
		$data = array(
			'twitter_title' => $twitter_title,
			'twitter_desc' => $twitter_desc
		);
		$result = $this->db->update('meta', $data, 'id=1');
		return $result;
	}
}
