<?php
class Language_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function read()
    {
        $result = $this->db->select('*')->from('f_vs_languages')->get()->result_array();
        return $result;
    }
}
