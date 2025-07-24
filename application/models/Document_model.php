<?php

class Document_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function readPageDocuments($page)
    {
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->where('page', $page);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    function create($page, $entitle, $estitle, $endesc, $esdesc)
    {
        $data = array(
            'page' => $page,
            'en_title' => $entitle,
            'es_title' => $estitle,
            'en_desc' => $endesc,
            'es_desc' => $esdesc,
            'status' => 1,
        );
        $result = $this->db->insert('documents', $data);
        return $result;
    }
    function choose($id)
    {
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function update($id, $entitle, $estitle, $endesc, $esdesc)
    {
        $data = array(
            'en_title' => $entitle,
            'es_title' => $estitle,
            'en_desc' => $endesc,
            'es_desc' => $esdesc
        );
        $result = $this->db->update('documents', $data, 'id=' . $id);
        return $result;
    }
    function upload($id, $enfile, $esfile, $en_size, $es_size)
    {
        if ($enfile != null && $esfile != null)
            $data = array(
                'en_doc' => $enfile,
                'es_doc' => $esfile,
                'en_size' => $en_size,
                'es_size' => $es_size
            );
        elseif ($enfile == null && $esfile != null) {
            $data = array(
                'es_doc' => $esfile,
                'es_size' => $es_size
            );
        } elseif ($enfile != null && $esfile == null) {
            $data = array(
                'en_doc' => $enfile,
                'en_size' => $en_size
            );
        } else {
            $data = array();
        }
        $result = $this->db->update('documents', $data, 'id=' . $id);
        return $result;
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('documents');
        return $result;
    }
}
