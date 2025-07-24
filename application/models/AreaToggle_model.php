<?php
class AreaToggle_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function choose($area_id)
    {
        $this->db->select('*');
        $this->db->from('area_toggle');
        $this->db->where("area_id", $area_id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function read()
    {
        $this->db->select('*');
        $this->db->from('area_toggle');
        $query = $this->db->get();
        $table_data = $query->result_array();
        for ($i = 0; $i < count($table_data); $i++)
            $data[$table_data[$i]['area_id']] = $table_data[$i]['status'];
        return $data;
    }
    function update($area_id, $status)
    {
        $data = array(
            'status' => $status
        );
        $result = $this->db->where('area_id', $area_id)->update('area_toggle', $data);
        return $result;
    }
}
