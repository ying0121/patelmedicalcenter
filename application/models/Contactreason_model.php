<?php
class Contactreason_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add($data)
    {
        $this->db->select('*');
        $this->db->from('contact_reason');
        $this->db->where('sp_name', $data['sp_name']);
        $result = $this->db->get()->result_array();

        if ($result) return 2;

        $record = array(
            'en_name' => $data['en_name'],
            'sp_name' => $data['sp_name']
        );
        $result = $this->db->insert('contact_reason', $record);
        if ($result) return 1;
        else return 0;
    }

    function update($data)
    {
        $this->db->select('*');
        $this->db->from('contact_reason');
        $this->db->where('en_name', $data['en_name']);
        $this->db->where('sp_name', $data['sp_name']);
        $result = $this->db->get()->result_array();

        if ($result) return 2;

        $record = array(
            'en_name' => $data['en_name'],
            'sp_name' => $data['sp_name']
        );
        $result = $this->db->where('id', $data['id'])->update('contact_reason', $record);
        if ($result) return 1;
        else return 0;
    }

    function delete($data)
    {
        return $this->db->where('id', $data['id'])->delete('contact_reason');
    }

    function choose($data)
    {
        $this->db->select('*');
        $this->db->from('contact_reason');
        $this->db->where('id', $data['id']);
        return $this->db->get()->result_array();
    }

    function read()
    {
        $this->db->select('*');
        $this->db->from('contact_reason');
        return $this->db->get()->result_array();
    }
}
