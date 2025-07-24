<?php
class WorkingHour_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function read()
	{
		$this->db->select('*');
		$this->db->from('working_hour');
		$this->db->order_by("id");
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	function create($en_day, $es_day, $en_time, $es_time)
	{
		$data = array(
			'en_name' => $en_day,
			'es_name' => $es_day,
			'en_time' => $en_time,
			'es_time' => $es_time,
			'status' => 1,
		);
		$result = $this->db->insert('working_hour', $data);
		return $result;
	}
	function choose($id)
	{
		$this->db->select('*');
		$this->db->from('working_hour');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	function update($id, $en_day, $es_day, $en_time, $es_time)
	{
		$data = array(
			'en_name' => $en_day,
			'es_name' => $es_day,
			'en_time' => $en_time,
			'es_time' => $es_time,
		);
		$result = $this->db->update('working_hour', $data, 'id=' . $id);
		return $result;
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete('working_hour');
		return $result;
	}
}
