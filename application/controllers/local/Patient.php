<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Patient extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Patient_model');
        $this->load->model('ContactInfo_model');

        $this->load->helper('file');
        $this->load->library('form_validation');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function index()
    {
        $data['sideitem'] = 'patient';
        $data['contact_info'] = $this->ContactInfo_model->read();

        $this->load->view('local/patient_area/main', $data);
    }
    public function create()
    {
        $patient_id = $this->input->post('patient_id');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $result = $this->Patient_model->create($patient_id, $fname, $lname);
        if ($result)
            echo "ok";
    }
    public function read()
    {
        $order = $_GET['order'];
        $search = $_GET['search'];
        $start = $_GET['start'];
        $length = $_GET['length'];
        $result = $this->Patient_model->read($search, $start, $length, $order);
        echo json_encode($result);
    }
    public function update()
    {
        $this->load->model('Patient_model');

        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $phone = $this->input->post('phone');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $state = $this->input->post('state');
        $zip = $this->input->post('zip');
        $gender = $this->input->post('gender');
        $dob = $this->input->post('dob');
        $language = $this->input->post('language');
        $ethnicity = $this->input->post('ethnicity');
        $race = $this->input->post('race');
        $status = $this->input->post('status');

        $result = $this->Patient_model->update($id, $patient_id, $fname, $mname, $lname, $phone, $mobile, $email, $address, $city, $state, $zip, $gender, $dob, $language, $ethnicity, $race, $status);
        if ($result)
            echo "ok";
    }
    function delete()
    {
        $id = $this->input->post('id');
        $result = $this->Patient_model->delete($id);
        if ($result)
            echo "ok";
    }
    function choose()
    {
        $id = $this->input->post('id');
        $result = $this->Patient_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
    public function resetpwd()
    {
        $this->load->model('Patient_model');

        $id = $this->input->post('id');
        $pwd = $this->input->post('pwd');
        $result = $this->Patient_model->resetpwd($id, $pwd);
        if ($result)
            echo "ok";
    }
    public function import()
    {
        //var_dump('asdsad');exit;
        $data = array();
        $memData = array();
        // If import request is submitted
        //Form field validation rules
        $this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');
        //Validate submitted form data
        if ($this->form_validation->run() == true) {
            $insertCount = $updateCount = $rowCount = $notAddCount = 0;

            // If file uploaded
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Load CSV reader library
                $this->load->library('CSVReader');

                // Parse data from CSV file
                $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);

                // Insert/update CSV data into database
                if (!empty($csvData)) {
                    $countArray = array();
                    $memData = [];
                    foreach ($csvData as $key => $row) {
                        // Prepare data for DB insertion
                        $tmp = array(
                            'patient_id' => trim($row['uid']),
                            'fname' => trim($row['ufname']),
                            'mname' => trim($row['uminitial']),
                            'lname' => trim($row['ulname']),
                            'phone' => trim($row['upPhone']),
                            'mobile' => trim($row['umobileno']),
                            'email' => trim($row['uemail']),
                            'address' => trim($row['upaddress']),
                            'city' => trim($row['upcity']),
                            'zip' => trim($row['zipcode']),
                            'state' => trim($row['upstate']),
                            'gender' => trim($row['sex']),
                            'dob' => date('Y-m-d', strtotime($row['DOB'])),
                            'language' => trim($row['language']),
                            'ethnicity' => trim($row['ethnicity']),
                            'race' => trim($row['race'])

                        );
                        $memData[] = $tmp;
                    }
                    $loadres = $this->Patient_model->patientlog($memData);
                    if ($loadres)
                        $this->session->set_userdata('csvupload', 'File uploaded successfully.');
                }
            } else {
                $this->session->set_userdata('csvupload', 'Error on file upload, please try again.');
            }
        } else {
            $this->session->set_userdata('csvupload', 'Invalid file, please select only CSV file.');
        }
        redirect('local/Patient', 'refresh');
    }
    public function file_check($str)
    {
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if (($ext == 'csv') && in_array($mime, $allowed_mime_types)) {
                return true;
            } else {
                $this->session->set_userdata('csvupload', 'Please select only CSV file to upload.');
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        } else {
            $this->session->set_userdata('csvupload', 'Please select only CSV file to upload.');
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }
    public function filter()
    {
        echo json_encode($this->Patient_model->filterForEssentialInfo($_POST['value']));
    }
}
