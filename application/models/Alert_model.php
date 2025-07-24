<?php
class Alert_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function read()
    {
        $this->db->select("alert_clinic.*, managers.fname, managers.lname");
        $this->db->from("alert_clinic");
        $this->db->join("managers", "alert_clinic.created_by = managers.id");
        return $this->db->get()->result_array();
    }

    function chosenById($id)
    {
        return $this->db->select("*")->from("alert_clinic")->where("id", $id)->get()->row_array();
    }

    function add($data)
    {
        $this->db->insert("alert_clinic", $data);
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        return $this->db->where("id", $id)->update("alert_clinic", $data);
    }

    function deleteById($id)
    {
        return $this->db->where("id", $id)->delete("alert_clinic");
    }

    function getAvailableAlert()
    {
        $date = date("Y-m-d h:i:s");
        $result = $this->db->select("*")->from("alert_clinic")->where("end >", $date)->where("status", 1)->get()->result_array();
        return $result;
    }

    function upload($id, $image)
    {
        $data = array(
            'image' => $image
        );
        $result = $this->db->update('alert_clinic', $data, 'id=' . $id);
        return $result;
    }
}
