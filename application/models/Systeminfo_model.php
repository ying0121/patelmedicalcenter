<?php
class Systeminfo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function readSysInfo()
    {
        $result = $this->db->select("*")->from("system_info")->get()->result_array();
        $data["month"] = $result[0]["value"];
        $data["year"] = $result[1]["value"];
        $data["word"] = $result[2]["value"];
        $data["type"] = $result[3]["value"];
        $data["language"] = $result[4]["value"];
        return $data;
    }

    function updateSysInfo($data)
    {
        // month
        $this->db->where("info_name", "month")->update("system_info", array("value" => $data['month']));
        // year
        $this->db->where("info_name", "year")->update("system_info", array("value" => $data['year']));
        // word
        $this->db->where("info_name", "word")->update("system_info", array("value" => $data['word']));
        // type
        $this->db->where("info_name", "type")->update("system_info", array("value" => $data['type']));
        // language
        $this->db->where("info_name", "language")->update("system_info", array("value" => $data['language']));

        return true;
    }
}
