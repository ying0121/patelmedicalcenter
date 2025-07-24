
<?php
class ConectorApi_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function read()
	{
		$this->db->select('*');
		$this->db->from('api');
		return $this->db->get()->result_array();
	}

	function add($url)
	{
		$data = array(
			'url' => $url
		);
		$result = $this->db->insert('api', $data);
		if ($result) {
			return 'success';
		} else {
			return 'error';
		}
	}

	function update($api)
	{
		$data = array(
			'url' => $api['url']
		);
		$result = $this->db->where('id', $api['id'])->update('api', $data);
		if ($result) {
			return 'success';
		} else {
			return 'error';
		}
	}

	function choose($url)
	{
		$this->db->select('*');
		$this->db->from('api');
		$this->db->where('url', $url);
		return $this->db->get()->result_array();
	}

	function delete($id)
	{
		$result = $this->db->where('id', $id)->delete('api');
		if ($result) {
			return 'success';
		} else {
			return 'error';
		}
	}
}
