<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');

class Patient_model extends CI_Model
{

    function __construct() {}
    function patientlog($memDataArray)
    {
        foreach ($memDataArray as $memData) {
            $this->db->select('*');
            $this->db->from('patient_list');
            $this->db->where('patient_id', $memData['patient_id']);
            $query = $this->db->get();

            if ($query->num_rows() == 0) {
                $data = array(
                    'patient_id' => $memData['patient_id'],
                    'fname' => $memData['fname'],
                    'mname' => $memData['mname'],
                    'lname' => $memData['lname'],
                    'phone' => $memData['phone'],
                    'mobile' => $memData['mobile'],
                    'email' => $memData['email'],
                    'address' => $memData['address'],
                    'city' => $memData['city'],
                    'zip' => $memData['zip'],
                    'state' => $memData['state'],
                    'gender' => $memData['gender'],
                    'dob' => $memData['dob'],
                    'language' => $memData['language'],
                    'ethnicity' => $memData['ethnicity'],
                    'race' => $memData['race'],
                );
                $this->db->insert('patient_list', $data);
            }
        }
        return true;
    }

    function create($patient_id, $fname, $lname)
    {

        $this->db->select('*');
        $this->db->from('patient_list');
        $this->db->where('patient_id', $patient_id);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return 0;
        }
        $data = array(
            'patient_id' => $patient_id,
            'fname' => $fname,
            'lname' => $lname
        );
        $result = $this->db->insert('patient_list', $data);
        return $result;
    }

    function read($search, $start, $length, $order)
    {
        // get patient count
        $this->db->select('COUNT(*) AS total');
        $this->db->from('patient_list');
        if ($search['value']) {
            $this->db->like('id', $search['value'], 'both');
            $this->db->or_like('fname', $search['value'], 'both');
            $this->db->or_like('lname', $search['value'], 'both');
            $this->db->or_like('phone', $search['value'], 'both');
            $this->db->or_like('mobile', $search['value'], 'both');
            $this->db->or_like('email', $search['value'], 'both');
            $this->db->or_like('address', $search['value'], 'both');
        }
        if ($order[0]['column'] == 0) {
            $this->db->order_by('id', $order[0]['dir']);
        } else if ($order[0]['column'] == 1) {
            $this->db->order_by('fname', $order[0]['dir']);
        } else if ($order[0]['column'] == 2) {
            $this->db->order_by('phone', $order[0]['dir']);
        } else if ($order[0]['column'] == 3) {
            $this->db->order_by('email', $order[0]['dir']);
        } else if ($order[0]['column'] == 4) {
            $this->db->order_by('address', $order[0]['dir']);
        } else if ($order[0]['column'] == 5) {
            $this->db->order_by('dob', $order[0]['dir']);
        }
        $total = $this->db->get()->row()->total;
        // get patient data
        $this->db->select('*');
        $this->db->from('patient_list');
        if ($search['value']) {
            $this->db->like('id', $search['value'], 'both');
            $this->db->or_like('fname', $search['value'], 'both');
            $this->db->or_like('lname', $search['value'], 'both');
            $this->db->or_like('phone', $search['value'], 'both');
            $this->db->or_like('mobile', $search['value'], 'both');
            $this->db->or_like('email', $search['value'], 'both');
            $this->db->or_like('address', $search['value'], 'both');
        }
        if ($order[0]['column'] == 0) {
            $this->db->order_by('id', $order[0]['dir']);
        } else if ($order[0]['column'] == 1) {
            $this->db->order_by('fname', $order[0]['dir']);
        } else if ($order[0]['column'] == 2) {
            $this->db->order_by('phone', $order[0]['dir']);
        } else if ($order[0]['column'] == 3) {
            $this->db->order_by('email', $order[0]['dir']);
        } else if ($order[0]['column'] == 4) {
            $this->db->order_by('address', $order[0]['dir']);
        } else if ($order[0]['column'] == 5) {
            $this->db->order_by('dob', $order[0]['dir']);
        }
        $this->db->limit($length, $start);
        $data = $this->db->get()->result_array();

        return array('data' => $data, 'recordsFiltered' => $total, 'recordsTotal' => $total);
    }

    function readAll()
    {
        $this->db->select('patient_list.*');
        $this->db->from('patient_list');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function update($id, $patient_id, $fname, $mname, $lname, $phone, $mobile, $email, $address, $city, $state, $zip, $gender, $dob, $language, $ethnicity, $race, $status)
    {
        $data = array(
            'patient_id' => $patient_id,
            'fname' => $fname,
            'mname' => $mname,
            'lname' => $lname,
            'phone' => $phone,
            'mobile' => $mobile,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'gender' => $gender,
            'dob' => $dob,
            'language' => $language,
            'ethnicity' => $ethnicity,
            'race' => $race,
            'status' => $status,
        );
        $result = $this->db->update('patient_list', $data, 'id=' . $id);
        return $result;
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('patient_list');
        return $result;
    }

    function choose($id)
    {
        $this->db->select('*');
        $this->db->from('patient_list');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    function getPatientByNameDOB($data)
    {
        $this->db->select('*')->from('patient_list');
        $result = $this->db->where('fname', $data['first_name'])->where('lname', $data['last_name'])->where('dob', $data['dob'])->get()->result_array();
        return $result;
    }

    function getPatientByPtInfo($info)
    {
        $this->db->select('*')->from('patient_list');
        $result = $this->db->where('email', $info)->or_where('phone', $info)->or_where('id', $info)->get()->result_array();
        return $result;
    }

    function getPatientByPtEmail($email)
    {
        $this->db->select('*')->from('patient_list');
        $result = $this->db->where('email', $email)->get()->result_array();
        return $result;
    }

    function auth($name, $password)
    {
        $condition_1 = "email ='" . $name . "'";
        $condition_2 = "id ='" . $name . "'";
        $condition_3 = "phone ='" . $name . "'";
        $this->db->select('*');
        $this->db->from('patient_list');
        $this->db->where($condition_1);
        $this->db->or_where($condition_2);
        $this->db->or_where($condition_3);
        $query = $this->db->get();
        $result = $query->row_array();

        if ($result) {
            if ($result['password'] == MD5($password)) {
                $result['password_status'] = 'correct';
            } else {
                $result['password_status'] = 'error';
            }
        }

        return $result;
    }

    function resetpwd($id, $pwd)
    {
        $data = array(
            'password' => MD5($pwd),
        );
        $result = $this->db->update('patient_list', $data, 'id=' . $id);
        return $result;
    }

    function addPatients($patients)
    {
        // read all language
        $languages = $this->db->select('*')->from('f_vs_languages')->get()->result_array();
        $lang = array();
        for ($i = 0; $i < count($languages); $i++) {
            $lang[$languages[$i]['English']] = $languages[$i]['code'];
        }

        $newPatient = 0;
        for ($i = 0; $i < count($patients['data']); $i++) {
            // check if already existed
            $this->db->select('*');
            $this->db->from('patient_list');
            $exist = $this->db->where('patient_id', $patients['data'][$i]['id'])->get()->result_array();
            if (!count($exist)) {
                $data = array(
                    'patient_id' => $patients['data'][$i]['id'],
                    'insurance_id' => $patients['data'][$i]['insurance_id'],
                    'fname' => $patients['data'][$i]['fname'],
                    'lname' => $patients['data'][$i]['lname'],
                    'mname' => $patients['data'][$i]['mname'],
                    'phone' => $patients['data'][$i]['phone'],
                    'mobile' => $patients['data'][$i]['mobile'],
                    'email' => $patients['data'][$i]['email'],
                    'password' => '',
                    'address' => $patients['data'][$i]['address'],
                    'city' => $patients['data'][$i]['city'],
                    'zip' => $patients['data'][$i]['zip'],
                    'state' => $patients['data'][$i]['state'],
                    'gender' => ucfirst($patients['data'][$i]['gender']),
                    'dob' => $patients['data'][$i]['dob'],
                    'language' => $lang[$patients['data'][$i]['language']] ?? 'en',
                    'ethnicity' => $patients['data'][$i]['ethnicity'],
                    'race' => $patients['data'][$i]['race'],
                    'status' => 1,
                );
                $result = $this->db->insert('patient_list', $data);
                if (!$result) {
                    break;
                    return -1;
                } else {
                    $newPatient++;
                }
            }
            // add to database
        }
        return $newPatient;
    }

    function getLoginCount($id)
    {
        error_log($id);
        $result = $this->db->select('login_count')->from('patient_list')->where('id', $id)->get()->result_array();
        return $result;
    }

    function updateLoginCount($id, $count)
    {
        $data = array(
            'login_count' => $count
        );
        $result = $this->db->where('id', $id)->update('patient_list', $data);
        return $result;
    }

    function updateActiveStatus($id, $status)
    {
        $data = array(
            'status' => $status
        );
        $result = $this->db->where('id', $id)->update('patient_list', $data);
        return $result;
    }

    function checkPatient($data)
    {
        $patient = array(
            'insurance_id' => 0,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'language' => 'en',
            'status' => 1
        );

        // check duplicate
        $this->db->select('*')->from('patient_list')->where('fname', $data['fname'])->where('lname', $data['lname'])->where('dob', $data['dob'])->where('email', $data['email']);
        $c = $this->db->get()->result_array();
        if ($c) {
            return array(
                'status' => false,
                'message' => 'exist'
            );
        } else {
            return array(
                'status' => true,
                'message' => 'success',
                'id' => 0
            );
        }
    }

    function filterForEssentialInfo($value)
    {
        $this->db->select("id, fname, lname, dob, email, phone");
        $this->db->from("patient_list");
        $this->db->like("id", $value, "both");
        $this->db->or_like("fname", $value, "both");
        $this->db->or_like("lname", $value, "both");
        $this->db->or_like("dob", $value, "both");
        $this->db->or_like("email", $value, "both");
        $this->db->or_like("phone", $value, "both");
        return $this->db->get()->result_array();
    }
}
