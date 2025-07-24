<?php
class Optinout_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function updateOptInOutText($data)
    {
        // Header
        $record = array(
            'en' => $data['opt_header_en'],
            'es' => $data['opt_header_es']
        );
        $result = $this->db->where('keyvalue', 't_opt_in_out_header')->update('contents', $record);
        if (!$result) return 0;

        // Opt In
        $record = array(
            'en' => $data['opt_in_en'],
            'es' => $data['opt_in_es']
        );
        $result = $this->db->where('keyvalue', 't_opt_in_out_in')->update('contents', $record);
        if (!$result) return 0;

        // Opt Out
        $record = array(
            'en' => $data['opt_out_en'],
            'es' => $data['opt_out_es']
        );
        $result = $this->db->where('keyvalue', 't_opt_in_out_out')->update('contents', $record);
        if (!$result) return 0;

        // Footer
        $record = array(
            'en' => $data['opt_footer_en'],
            'es' => $data['opt_footer_es']
        );
        $result = $this->db->where('keyvalue', 't_opt_in_out_footer')->update('contents', $record);
        if (!$result) return 0;

        // More Info
        $record = array(
            'en' => $data['opt_more_en'],
            'es' => $data['opt_more_es']
        );
        $result = $this->db->where('keyvalue', 't_opt_in_out_more')->update('contents', $record);
        if (!$result) return 0;

        return 1;
    }

    function read()
    {
        $this->db->select('*');
        $this->db->from('contents');
        $this->db->where("keyvalue LIKE '%t_opt_in_out_%'");
        $this->db->where('type', 'template');
        $result = $this->db->get()->result_array();

        $data = array('en' => array(), 'es' => array());
        foreach ($result as $key => $row) {
            $data['en'][$row['keyvalue']] = $row['en'];
            $data['es'][$row['keyvalue']] = $row['es'];
        }
        return $data;
    }
}
