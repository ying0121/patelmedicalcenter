<?php
class PageVideo_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function create($video, $page, $position)
	{
		$data = array(
			'video' => $video,
			'page' => $page,
			'position' => $position,
			'status' => 1,
		);
		$result = $this->db->insert('pagevideo', $data);
		return $result;
	}
	function read()
	{
		$this->db->select('*');
		$this->db->from('pagevideo');
		//$this->db->order_by('id');	
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function update($id, $video, $page, $position, $status)
	{
		$data = array(
			'video' => $video,
			'page' => $page,
			'position' => $position,
			'status' => $status
		);
		$result = $this->db->update('pagevideo', $data, 'id=' . $id);
		return $result;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('pagevideo');
		return $result;
	}

	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('pagevideo');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
}
