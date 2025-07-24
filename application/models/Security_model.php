<?php
class Security_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add($data)
    {
        $this->db->select('*');
        $this->db->from('squestion');
        $this->db->where('en', $data['en']);
        $this->db->where('es', $data['es']);
        $result = $this->db->get()->result_array();

        if ($result) return 2;

        $record = array(
            'en' => $data['en'],
            'es' => $data['es'],
            'status' => $data['status']
        );
        $result = $this->db->insert('squestion', $record);
        if ($result) return 1;
        else return 0;
    }

    function update($data)
    {
        $record = array(
            'en' => $data['en'],
            'es' => $data['es'],
            'status' => $data['status']
        );
        $result = $this->db->where('id', $data['id'])->update('squestion', $record);
        if ($result) return 1;
        else return 0;
    }

    function delete($data)
    {
        return $this->db->where('id', $data['id'])->delete('squestion');
    }

    function choose($data)
    {
        $this->db->select('*');
        $this->db->from('squestion');
        $this->db->where('id', $data['id']);
        return $this->db->get()->result_array();
    }

    function read()
    {
        $this->db->select('*');
        $this->db->from('squestion');
        return $this->db->get()->result_array();
    }

    function readOnlyActive()
    {
        $this->db->select('*');
        $this->db->from('squestion');
        $this->db->where('status', 1);
        return $this->db->get()->result_array();
    }

    function addUserSecurity($data)
    {
        $record = array(
            'user_id' => $data['user_id'],
            'user_type' => $data['user_type'],
            'question_id' => $data['question_id'],
            'answer' => md5($data['answer'])
        );
        $result = $this->db->insert('user_security', $record);
        if ($result) return 1;
        else return 0;
    }

    function updateUserSecurity($data)
    {
        $record = array(
            'answer' => md5($data['answer'])
        );
        $result = $this->db->where('user_id', $data['user_id'])->where('user_type', $data['user_type'])->where('question_id', $data['question_id'])->update('user_security', $record);
        if ($result) return 1;
        else return 0;
    }

    function getUserSecurity($data)
    {
        $this->db->select('*');
        $this->db->from('user_security');
        $this->db->where('user_id', $data['user_id'])->where('user_type', $data['user_type'])->where('question_id', $data['question_id']);
        $result = $this->db->get()->result_array();

        return $result;
    }

    function getSecurityListByUser($user_id, $user_type)
    {
        $this->db->select('*');
        $this->db->from('user_security');
        $this->db->where('user_id', $user_id)->where('user_type', $user_type);

        $result = $this->db->get()->result_array();
        return $result;
    }
}
