<?php

class Verify_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add($data)
    {
        $data = array(
            'email' => $data['email'],
            'patient_id' => $data['patient_id'],
            'link' => $data['link'],
            'create_time' => date('Y-m-d H:i:s')
        );
        // check exist
        $exist = $this->db->select('*')->from('verify')->where('email', $data['email'])->where('patient_id', $data['patient_id'])->get()->result_array();
        if ($exist[0]) {
            // update
            $result = $this->db->where('email', $data['email'])->update('verify', $data);
            return $result;
        } else {
            $result = $this->db->insert('verify', $data);
            return $result;
        }
    }

    function chooseByEmailPtId($email, $patient_id)
    {
        $result = $this->db->select('*')->from('verify')->where('email', $email)->where('patient_id', $patient_id)->get()->result_array();
        return $result;
    }

    function choose($id)
    {
        $result = $this->db->select('*')->from('verify')->where('id', $id)->get()->result_array();
        return $result;
    }

    function chooseByLink($link)
    {
        $result = $this->db->select('*')->from('verify')->where('link', $link)->get()->result_array();
        return $result;
    }

    function deleteByEmailPtId($email, $patient_id)
    {
        $result = $this->db->where('email', $email)->where('patient_id', $patient_id)->delete('verify');
        return $result;
    }

    function delete($id)
    {
        $result = $this->db->where('id', $id)->delete('verify');
        return $result;
    }

    function deleteByLink($link)
    {
        $result = $this->db->where('link', $link)->delete('verify');
        return $result;
    }

    function verifyLink($patient_id, $link)
    {
        $result = $this->db->select('*')->from('verify')->where('patient_id', $patient_id)->where('link', $link)->get()->result_array();
        if ($result[0]) {
            $create_time = new DateTime($result[0]['create_time']);
            error_log($result[0]['create_time']);
            $now = new DateTime();
            $diff = $now->diff($create_time);
            if ($diff->days < 2) {
                return true;
            } else {
                $this->db->where('email', $email)->where('patient_id', $patient_id)->delete('verify');
                return false;
            }
        } else {
            return false;
        }
    }
}
