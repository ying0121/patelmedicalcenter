<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

include('utilities.php');
class Vault extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vault_model');
        $this->load->model('Content_model');
        $this->load->model('Frontend_model');

        // $this->load->model('AreaToggle_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }
    public function read()
    {
        $result = $this->Vault_model->read();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }
    public function create()
    {
        $patient_id = $this->input->post('patient_id');
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $result = $this->Vault_model->create($patient_id, $title, $desc);
        if ($result > 0) {
            $result = $this->uploadFile($result);
            if ($result == "ok") {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "failed";
        }
    }
    public function update()
    {
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $title = $this->input->post('title');
        $desc = $this->input->post('desc');
        $result = $this->Vault_model->update($id, $patient_id, $title, $desc);
        if ($result)
            echo "ok";
    }
    public function upload()
    {
        echo $this->uploadFile($_POST['id']);
    }
    function sendEmail($email, $lang)
    {
        $this->load->library('email');
        $this->email->set_newline("rn");
        $config = array();
        $config['protocol']    = 'mail';
        $config['smtp_timeout'] = '7';
        $config['auth'] = true;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bo
        $this->email->initialize($config);
        $this->email->from($this->config->item('smtp_user'));
        // $this->email->to("buenmandev@gmail.com,roswellg@gmail.com"); 
        $this->email->bcc($email);

        $data['component_text'] = $this->Frontend_model->getComponentTexts($lang);
        $message = $this->load->view('email/vault_notify.php', $data, TRUE);
        $subject = "";
        if ($this->session->userdata('language') == 'en') {
            $subject = "patelmedicalcenter.com - Vault Updated";
        } else {
            $subject = "patelmedicalcenter.com - Actualización de la Bóveda";
        }
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
    function delete()
    {
        $id = $this->input->post('id');
        $chosen = $this->Vault_model->choose($id);
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/vault/" . $chosen['document']);
        $result = $this->Vault_model->delete($id);
        if ($result)
            echo "ok";
    }
    function choose()
    {
        $id = $this->input->post('id');
        $result = $this->Vault_model->choose($id);
        if ($result)
            echo json_encode($result);
    }
    public function updateVaultDesc()
    {
        $title_en = $this->input->post('title_en');
        $title_es = $this->input->post('title_es');
        $this->Content_model->updateComponent('t_vault_title', $title_en, $title_es);

        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $result = $this->Content_model->updateComponent('t_vault_desc', $desc_en, $desc_es);
        if ($result)
            echo "ok";
    }
    public function updateLoginDesc()
    {
        $title_en = $this->input->post('title_en');
        $title_es = $this->input->post('title_es');
        $this->Content_model->updateComponent('t_vault_login_title', $title_en, $title_es);

        $desc_en = $this->input->post('desc_en');
        $desc_es = $this->input->post('desc_es');
        $result = $this->Content_model->updateComponent('t_vault_login_desc', $desc_en, $desc_es);

        $footer_en = $this->input->post('footer_en');
        $footer_es = $this->input->post('footer_es');
        $result = $this->Content_model->updateComponent('t_vault_login_footer', $footer_en, $footer_es);
        if ($result)
            echo "ok";
    }
    private function uploadFile($id)
    {
        $filename = generateRandomString(10);
        $config['upload_path']          = './assets/vault/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('document')) {
            $error = array('error' => $this->upload->display_errors());
            return "failed";
        } else {
            $data = array('upload_data' => $this->upload->data());
            $chosen = $this->Vault_model->choose($id);
            unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/vault/" . $chosen['document']);
            $result = $this->Vault_model->upload($id, $data['upload_data']['orig_name']);

            $patient = $this->Vault_model->getPatientInfo($id);

            $email = $patient['email'];
            if ($patient['language'] == 'English')
                $lang = 'en';
            else
                $lang = 'es';
            $this->sendEmail($email, $lang);
            if ($result)
                return "ok";
        }
    }
}
