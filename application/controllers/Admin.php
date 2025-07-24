<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Manager_model');
        $this->load->model('Settings_model');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->session->set_userdata('status', 'login');
        $this->load->view('local/login');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $result = $this->Manager_model->auth($email, $password);

        if ($result) { // Correct Account
            $this->session->set_userdata('userid', $result['id']);
            $this->session->set_userdata('userfullname', $result['fname'] . ' ' . $result['lname']);
            $this->session->set_userdata('usertype', $result['type']);
            $this->session->set_userdata('chosen_menu', $result['access_rights']);

            $questions = $this->Security_model->getSecurityListByUser($result['id'], 'manager');
            if (count($questions)) { // Exist Security
                // get random questions
                $length = count($questions);
                $number = rand(0, $length - 1);
                $data['id'] = $questions[$number]['question_id'];
                $question = $this->Security_model->choose($data);

                $this->session->set_userdata('question', $question[0]);

                redirect('admin/security', 'refresh');
            } else { // No Security
                $expiredTime = $this->Settings_model->getExpiredTime();
                $this->session->set_userdata('login_time', (new DateTime("now", new DateTimeZone("America/New_York")))->getTimestamp());
                $this->session->set_userdata('expired_time', $expiredTime['value'] ? intval($expiredTime['value']) : 30);
                redirect('local/Home', 'refresh');
            }
        } else { // Wrong Account
            $this->session->set_userdata('loginresult', 'Your credential is incorrect. Please try again.');
            redirect('admin', 'refresh');
        }
    }

    public function security()
    {
        $this->session->set_userdata('status', 'security');
        $this->load->view('local/login');
    }

    public function submitSecurity()
    {
        $answer = $_POST['answer'];
        $data['user_id'] = $this->session->userdata('userid');
        $data['question_id'] = $this->session->userdata('question')['id'];
        $data['user_type'] = 'manager';

        $auth = $this->Security_model->getUserSecurity($data);

        if (md5($answer) == $auth[0]['answer']) { // Correct Answer
            $expiredTime = $this->Settings_model->getExpiredTime();
            $this->session->set_userdata('login_time', (new DateTime("now", new DateTimeZone("America/New_York")))->getTimestamp());
            $this->session->set_userdata('expired_time', $expiredTime['value'] ? intval($expiredTime['value']) : 30);
            $this->session->unset_userdata('question');
            $this->session->unset_userdata('status');
            redirect('local/Home', 'refresh');
        } else { // Wrong Answer
            $this->session->unset_userdata('userid');
            $this->session->unset_userdata('chosen_menu');
            $this->session->unset_userdata('userfullname');
            $this->session->unset_userdata('usertype');

            $this->session->set_userdata('status', 'login');
            $this->session->set_userdata('loginresult', 'Your credential is incorrect. Please try again.');
            redirect('admin', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('chosen_menu');
        $this->session->unset_userdata('userfullname');
        $this->session->unset_userdata('usertype');
        $this->session->unset_userdata('login_time');
        $this->session->unset_userdata('expired_time');
        redirect('admin', 'refresh');
    }
}
