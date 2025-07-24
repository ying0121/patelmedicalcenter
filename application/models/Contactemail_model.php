<?php
class Contactemail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function add($data)
    {
        $this->db->select('*');
        $this->db->from('contact_email');
        $this->db->where('email', $data['email']);
        $result = $this->db->get()->result_array();

        if ($result) return 2;

        $record = array(
            'contact_name' => $data['contact_name'],
            'email' => $data['email'],
            'account_request' => $data['account_request'],
            'general_online' => $data['general_online'],
            'specific_online' => $data['specific_online'],
            'payment_email' => $data['payment_email']
        );
        $result = $this->db->insert('contact_email', $record);
        if ($result) return 1;
        else return 0;
    }

    function update($data)
    {
        $this->db->select('*');
        $this->db->from('contact_email');
        $this->db->where('email', $data['email']);
        $result = $this->db->get()->result_array();

        if ($result) return 2;

        $record = array(
            'contact_name' => $data['contact_name'],
            'email' => $data['email'],
            'account_request' => $data['account_request'],
            'general_online' => $data['general_online'],
            'specific_online' => $data['specific_online'],
            'payment_email' => $data['payment_email']
        );
        $result = $this->db->where('id', $data['id'])->update('contact_email', $record);
        if ($result) return 1;
        else return 0;
    }

    function delete($data)
    {
        return $this->db->where('id', $data['id'])->delete('contact_email');
    }

    function choose($data)
    {
        $this->db->select('*');
        $this->db->from('contact_email');
        $this->db->where('id', $data['id']);
        return $this->db->get()->result_array();
    }

    function read()
    {
        $this->db->select('*');
        $this->db->from('contact_email');
        return $this->db->get()->result_array();
    }

    function getEmailListForAccount()
    {
        $this->db->select('email');
        $this->db->from('contact_email');
        $this->db->where('account_request', 1);
        $result = $this->db->get()->result_array();

        $emails = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($emails, $result[$i]['email']);
        }

        return $emails;
    }

    function getEmailListForGeneralOnline()
    {
        $this->db->select('email');
        $this->db->from('contact_email');
        $this->db->where('general_online', 1);
        $result = $this->db->get()->result_array();

        $emails = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($emails, $result[$i]['email']);
        }

        return $emails;
    }

    function getEmailListForSpecificOnline()
    {
        $this->db->select('email');
        $this->db->from('contact_email');
        $this->db->where('specific_online', 1);
        $result = $this->db->get()->result_array();

        $emails = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($emails, $result[$i]['email']);
        }

        return $emails;
    }

    function getEmailListForPayment()
    {
        $this->db->select('email');
        $this->db->from('contact_email');
        $this->db->where('payment_email', 1);
        $result = $this->db->get()->result_array();

        $emails = array();
        for ($i = 0; $i < count($result); $i++) {
            array_push($emails, $result[$i]['email']);
        }

        return $emails;
    }
}
