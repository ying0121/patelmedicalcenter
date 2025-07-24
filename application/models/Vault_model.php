<?php

class Vault_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function create($patient_id, $title, $desc)
    {
        $data = array(
            'patient_id' => $patient_id,
            'title' => $title,
            'desc' => $desc,
            'submit_date' => date("Y-m-d")
        );
        $this->db->insert('vault', $data);
        return $this->db->insert_id();
    }

    function deleteOld()
    {
        $sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));
        $this->db->where('submit_date <=', $sevenDaysAgo);
        $result = $this->db->delete('vault');
        return $result;
    }

    function read()
    {
        $this->deleteOld();
        $this->db->reset_query();
        $this->db->select('vault.id, vault.patient_id, vault.title, vault.desc, vault.document, vault.submit_date, patient_list.fname, patient_list.mname, patient_list.lname');
        $this->db->from('vault, patient_list');
        $this->db->where('vault.patient_id = patient_list.id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function readOnlyNames()
    {
        $this->db->select('document AS filename');
        $this->db->from('vault');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function update($id, $patient_id, $title, $desc)
    {
        $data = array(
            'patient_id' => $patient_id,
            'title' => $title,
            'desc' => $desc,
            'submit_date' => date("Y-m-d")
        );
        $result = $this->db->update('vault', $data, 'id=' . $id);
        return $result;
    }

    function upload($id, $document)
    {
        $data = array(
            'document' => $document,
            'submit_date' => date("Y-m-d")
        );
        $result = $this->db->update('vault', $data, 'id=' . $id);
        return $result;
    }

    function getPatientInfo($id)
    {
        $this->db->select('patient_list.email, patient_list.language');
        $this->db->from('vault, patient_list');
        $this->db->where('vault.patient_id = patient_list.id AND vault.id = ' . $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('vault');
        return $result;
    }

    function choose($id)
    {
        $this->db->select('*');
        $this->db->from('vault');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    function getContacts($pt_emr_id)
    {
        $this->db->select('f_com_contact.*, staff.en_name AS assigned_name');
        $this->db->from('f_com_contact');
        $this->db->join('staff', 'f_com_contact.assign = staff.id', 'left');
        $this->db->where('f_com_contact.pt_emr_id', $pt_emr_id);
        $this->db->where('f_com_contact.clinic_id', $this->config->item('clinic_id'));
        $this->db->where('f_com_contact.new_status', 1);
        $this->db->order_by('f_com_contact.id', 'desc');
        return $this->db->get()->result_array();
    }

    function submitContact($data)
    {
        $contact = array(
            'pt_emr_id' => $data['patient_id'],
            'clinic_id' => $data['clinic_id'],
            'type' => 1,
            'reason' => $data['reason'],
            'name' => $data['name'],
            'dob' => $data['dob'],
            'email' => $data['email'],
            'cel' => $data['cel'],
            'priority' => 1,
            'subject' => $data['subject'],
            'message' => $data['message'],
            'best_time' => $data['best_time'],
            'date' => $data['date'],
            'opt_status' => 1,
            'lang' => $data['lang'],
            'sender' => $data['name'],
            'sent' => $data['date'],
            'status' => 1,
            'assign' => 'Nobody',
            'new_status' => 1,
            'msg_type' => $data['msg_type']
        );
        $this->db->insert('f_com_contact', $contact);
        $id = $this->db->insert_id();

        // define case number
        $case_number = 0;
        $last_case_number = $this->db->select('case_number')->from('f_com_contact')->order_by('case_number', 'desc')->limit(1)->get()->result_array();
        if ($last_case_number[0]) {
            $case_number = $last_case_number[0]['case_number'] + 1;
        } else {
            $case_number = 1;
        }

        // update case number
        $contact = array(
            'case_number' => $case_number
        );
        $this->db->where('id', $id)->update('f_com_contact', $contact);

        return $case_number;
    }

    function viewCommunicationHistory($data)
    {
        $result = $this->db->select('*')->from('communication_track')->where('case_number', $data['case_number'])->where('patient_id', $data['patient_id'])->where('staff_id', $data['staff_id'])->get()->result_array();
        return $result;
    }

    function setUnreadCount($id, $person_type)
    {
        if ($person_type == 'staff') {
            // get unread
            $res = $this->db->select('pt_unread_count')->from('f_com_contact')->where('id', $id)->get()->row_array();
            // update date of f_com_contact
            $info = array(
                'date' => date('Y-m-d H:i:s'),
                'pt_unread_count' => $res['pt_unread_count'] + 1
            );
            $this->db->where('id', $id)->update('f_com_contact', $info);
        } else if ($person_type == 'patient') {
            // get unread
            $res = $this->db->select('sf_unread_count')->from('f_com_contact')->where('id', $id)->get()->row_array();
            // update date of f_com_contact
            $info = array(
                'date' => date('Y-m-d H:i:s'),
                'sf_unread_count' => $res['sf_unread_count'] + 1
            );
            $this->db->where('id', $id)->update('f_com_contact', $info);
        }
    }

    function clearUnreadCount($id, $person_type)
    {
        if ($person_type == 'patient') {
            $info = array(
                'pt_unread_count' => 0
            );
            $this->db->where('id', $id)->update('f_com_contact', $info);
        } else if ($person_type == 'staff') {
            $info = array(
                'sf_unread_count' => 0
            );
            $this->db->where('id', $id)->update('f_com_contact', $info);
        }
    }

    function setSeen($data)
    {
        $this->db->where('case_number', $data['case_number'])->where('patient_id', $data['patient_id'])->where('staff_id', $data['staff_id'])->where('person_type', $data['person_type']);
        return $this->db->update('communication_track', array('seen' => 1));
    }
}
