<?php
class PageImage_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function create($page, $position)
	{
		$data = array(
			'img' => 'default.jpg',
			'page' => $page,
			'position' => $position,
			'status' => 1,
		);
		$result = $this->db->insert('pageimg', $data);
		return $result;
	}
	function read()
	{
		$this->db->select('*');
		$this->db->from('pageimg');
		$this->db->order_by('page', 'asc');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function update($original_id, $id, $page, $position, $title_en, $desc_en, $title_es, $desc_es, $status)
	{
		$data = array(
			'id' => $id,
			'page' => $page,
			'position' => $position,
			'title_en' => $title_en,
			'desc_en' => $desc_en,
			'title_es' => $title_es,
			'desc_es' => $desc_es,
			'status' => $status
		);
		$result = $this->db->update('pageimg', $data, 'id=' . $original_id);
		return $result;
	}

	function upload($id, $img)
	{
		$data = array(
			'img' => $img
		);
		$result = $this->db->update('pageimg', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('pageimg');
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('pageimg');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
}
