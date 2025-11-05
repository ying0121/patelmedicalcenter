<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
include('utilities.php');
class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('ConectorApi_model');
        $this->load->model('Content_model');
        $this->load->model('Settings_model');
        $this->load->model('Systeminfo_model');

        $this->load->model('Meta_model');
        if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
            redirect('admin', 'refresh');
    }

    public function index()
    {
        $data['sideitem'] = 'setting';
        $data['component'] = $this->Content_model->getComponentTexts();
        $data['meta'] = $this->Meta_model->read();
        $data['api'] = $this->ConectorApi_model->read();
        $data['logout_rules'] = $this->Settings_model->getLogoutRules();
        $data['sysinfo'] = $this->Systeminfo_model->readSysInfo();
        $data['stripes'] = $this->Settings_model->readPaymentStripe();

        $this->load->view('local/setting/main', $data);
    }
    public function updateMeta()
    {
        $meta_title = $this->input->post('meta_title');
        $meta_desc = $this->input->post('meta_desc');
        $r = $this->Meta_model->updateMeta($meta_title, $meta_desc);
        if ($r) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    public function updateFacebook()
    {
        $facebook_title = $this->input->post('facebook_title');
        $facebook_desc = $this->input->post('facebook_desc');
        $r = $this->Meta_model->updateFacebook($facebook_title, $facebook_desc);
        if ($r) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    public function updateTwitter()
    {
        $twitter_title = $this->input->post('twitter_title');
        $twitter_desc = $this->input->post('twitter_desc');
        $r = $this->Meta_model->updateTwitter($twitter_title, $twitter_desc);
        if ($r) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }
    public function uploadMetaImage()
    {
        $filename = $this->input->post("filename");
        unlink($_SERVER["DOCUMENT_ROOT"] . "/assets/images/" . $filename);
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 20480000;
        $config['file_name']             = $filename;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (! $this->upload->do_upload('img')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array("status" => "error"));
        } else
            echo json_encode(array("status" => "success"));
    }

    public function readSignInContent()
    {
        $result = $this->Content_model->readSignInContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readSignUpContent()
    {
        $result = $this->Content_model->readSignUpContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readLoginFailedContent()
    {
        $result = $this->Content_model->readLoginFailedContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readPromptsContent()
    {
        $result = $this->Content_model->readPromptsContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readNeedHelpContent()
    {
        $result = $this->Content_model->readNeedHelpContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readEmailAccountContent()
    {
        $result = $this->Content_model->readEmailAccountContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readEmailPasswordContent()
    {
        $result = $this->Content_model->readEmailPasswordContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readVaultContent()
    {
        $result = $this->Content_model->readVaultContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readEmailUpdateContent()
    {
        $result = $this->Content_model->readEmailUpdateContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function readEmailCloseContent()
    {
        $result = $this->Content_model->readEmailCloseContent();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }



    public function updateSignInContent()
    {
        $data['pa_si_welcome_en'] = $_POST['pa_si_welcome_en'];
        $data['pa_si_welcome_sp'] = $_POST['pa_si_welcome_sp'];
        $data['pa_si_signin_en'] = $_POST['pa_si_signin_en'];
        $data['pa_si_signin_sp'] = $_POST['pa_si_signin_sp'];
        $data['pa_si_formtext_en'] = $_POST['pa_si_formtext_en'];
        $data['pa_si_formtext_sp'] = $_POST['pa_si_formtext_sp'];
        $result = $this->Content_model->updateSignInContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateSignUpContent()
    {
        $data['pa_su_account_en'] = $_POST['pa_su_account_en'];
        $data['pa_su_account_sp'] = $_POST['pa_su_account_sp'];
        $data['pa_su_signup_en'] = $_POST['pa_su_signup_en'];
        $data['pa_su_signup_sp'] = $_POST['pa_su_signup_sp'];
        $data['pa_su_send_en'] = $_POST['pa_su_send_en'];
        $data['pa_su_send_sp'] = $_POST['pa_su_send_sp'];
        $data['pa_su_eheader_en'] = $_POST['pa_su_eheader_en'];
        $data['pa_su_eheader_sp'] = $_POST['pa_su_eheader_sp'];
        $data['pa_su_disclaimer_en'] = $_POST['pa_su_disclaimer_en'];
        $data['pa_su_alert_success_en'] = $_POST['pa_su_alert_success_en'];
        $data['pa_su_alert_success_sp'] = $_POST['pa_su_alert_success_sp'];
        $data['pa_su_alert_failed_en'] = $_POST['pa_su_alert_failed_en'];
        $data['pa_su_alert_failed_sp'] = $_POST['pa_su_alert_failed_sp'];
        $data['pa_su_alert_exist_en'] = $_POST['pa_su_alert_exist_en'];
        $data['pa_su_alert_exist_sp'] = $_POST['pa_su_alert_exist_sp'];
        $result = $this->Content_model->updateSignUpContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateLoginFailedContent()
    {
        $data['pa_lf_invalid_en'] = $_POST['pa_lf_invalid_en'];
        $data['pa_lf_invalid_sp'] = $_POST['pa_lf_invalid_sp'];
        $data['pa_lf_text_en'] = $_POST['pa_lf_text_en'];
        $data['pa_lf_text_sp'] = $_POST['pa_lf_text_sp'];
        $data['pa_lf_failed_en'] = $_POST['pa_lf_failed_en'];
        $data['pa_lf_failed_sp'] = $_POST['pa_lf_failed_sp'];
        $data['pa_lf_inactive_en'] = $_POST['pa_lf_inactive_en'];
        $data['pa_lf_inactive_sp'] = $_POST['pa_lf_inactive_sp'];
        $result = $this->Content_model->updateLoginFailedContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updatePromptsContent()
    {
        $data['pa_pr_footer_en'] = $_POST['pa_pr_footer_en'];
        $data['pa_pr_footer_sp'] = $_POST['pa_pr_footer_sp'];
        $data['pa_pr_security_en'] = $_POST['pa_pr_security_en'];
        $data['pa_pr_security_sp'] = $_POST['pa_pr_security_sp'];
        $data['pa_pr_sihelp_en'] = $_POST['pa_pr_sihelp_en'];
        $data['pa_pr_sihelp_sp'] = $_POST['pa_pr_sihelp_sp'];
        $result = $this->Content_model->updatePromptsContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateNeedHelpContent()
    {
        $data['pa_ah_invalid_en'] = $_POST['pa_ah_invalid_en'];
        $data['pa_ah_invalid_sp'] = $_POST['pa_ah_invalid_sp'];
        $data['pa_ah_help_en'] = $_POST['pa_ah_help_en'];
        $data['pa_ah_help_sp'] = $_POST['pa_ah_help_sp'];
        $data['pa_ah_hques_en'] = $_POST['pa_ah_hques_en'];
        $data['pa_ah_hques_sp'] = $_POST['pa_ah_hques_sp'];
        $data['pa_ah_facc_en'] = $_POST['pa_ah_facc_en'];
        $data['pa_ah_facc_sp'] = $_POST['pa_ah_facc_sp'];
        $data['pa_ah_fpwd_en'] = $_POST['pa_ah_fpwd_en'];
        $data['pa_ah_fpwd_sp'] = $_POST['pa_ah_fpwd_sp'];
        $data['pa_ah_desc_en'] = $_POST['pa_ah_desc_en'];
        $data['pa_ah_desc_sp'] = $_POST['pa_ah_desc_sp'];
        $data['pa_ah_rpheader_en'] = $_POST['pa_ah_rpheader_en'];
        $data['pa_ah_rpheader_sp'] = $_POST['pa_ah_rpheader_sp'];
        $data['pa_ah_ques_en'] = $_POST['pa_ah_ques_en'];
        $data['pa_ah_ques_sp'] = $_POST['pa_ah_ques_sp'];
        $data['pa_ah_alert_success_en'] = $_POST['pa_ah_alert_success_en'];
        $data['pa_ah_alert_success_sp'] = $_POST['pa_ah_alert_success_sp'];
        $data['pa_ah_alert_failed_en'] = $_POST['pa_ah_alert_failed_en'];
        $data['pa_ah_alert_failed_sp'] = $_POST['pa_ah_alert_failed_sp'];
        $data['pa_ah_alert_notexisted_en'] = $_POST['pa_ah_alert_notexisted_en'];
        $data['pa_ah_alert_notexisted_sp'] = $_POST['pa_ah_alert_notexisted_sp'];
        $result = $this->Content_model->updateNeedHelpContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateEmailAccountContent()
    {
        $data['pa_ea_email_text_en'] = $_POST['pa_ea_email_text_en'];
        $data['pa_ea_email_text_sp'] = $_POST['pa_ea_email_text_sp'];
        $data['pa_ea_link_en'] = $_POST['pa_ea_link_en'];
        $data['pa_ea_link_sp'] = $_POST['pa_ea_link_sp'];
        $data['pa_ea_subject_en'] = $_POST['pa_ea_subject_en'];
        $data['pa_ea_subject_sp'] = $_POST['pa_ea_subject_sp'];
        $data['pa_ea_disclaimer_en'] = $_POST['pa_ea_disclaimer_en'];
        $data['pa_ea_disclaimer_sp'] = $_POST['pa_ea_disclaimer_sp'];
        $result = $this->Content_model->updateEmailAccountContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateEmailPasswordContent()
    {
        $data['pa_ep_subject_en'] = $_POST['pa_ep_subject_en'];
        $data['pa_ep_subject_sp'] = $_POST['pa_ep_subject_sp'];
        $data['pa_ep_emailtext_en'] = $_POST['pa_ep_emailtext_en'];
        $data['pa_ep_emailtext_sp'] = $_POST['pa_ep_emailtext_sp'];
        $data['pa_ep_linktime_en'] = $_POST['pa_ep_linktime_en'];
        $data['pa_ep_linktime_sp'] = $_POST['pa_ep_linktime_sp'];
        $data['pa_ep_notexisted_en'] = $_POST['pa_ep_notexisted_en'];
        $data['pa_ep_notexisted_sp'] = $_POST['pa_ep_notexisted_sp'];
        $data['pa_ep_alert_success_en'] = $_POST['pa_ep_alert_success_en'];
        $data['pa_ep_alert_success_sp'] = $_POST['pa_ep_alert_success_sp'];
        $result = $this->Content_model->updateEmailPasswordContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateVaultContent()
    {
        $data['pa_v_welcome_en'] = $_POST['pa_v_welcome_en'];
        $data['pa_v_welcome_sp'] = $_POST['pa_v_welcome_sp'];
        $data['pa_v_desc_en'] = $_POST['pa_v_desc_en'];
        $data['pa_v_desc_sp'] = $_POST['pa_v_desc_sp'];
        $data['pa_v_htext_en'] = $_POST['pa_v_htext_en'];
        $data['pa_v_htext_sp'] = $_POST['pa_v_htext_sp'];
        $data['pa_v_alert_success_en'] = $_POST['pa_v_alert_success_en'];
        $data['pa_v_alert_success_sp'] = $_POST['pa_v_alert_success_sp'];
        $data['pa_v_alert_failed_en'] = $_POST['pa_v_alert_failed_en'];
        $data['pa_v_alert_failed_sp'] = $_POST['pa_v_alert_failed_sp'];
        $result = $this->Content_model->updateVaultContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateEmailUpdateContent()
    {
        $data['pa_eu_subject_en'] = $_POST['pa_eu_subject_en'];
        $data['pa_eu_subject_sp'] = $_POST['pa_eu_subject_sp'];
        $data['pa_eu_etext_en'] = $_POST['pa_eu_etext_en'];
        $data['pa_eu_etext_sp'] = $_POST['pa_eu_etext_sp'];
        $result = $this->Content_model->updateEmailUpdateContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    public function updateEmailCloseContent()
    {
        $data['pa_ec_subject_en'] = $_POST['pa_ec_subject_en'];
        $data['pa_ec_subject_sp'] = $_POST['pa_ec_subject_sp'];
        $data['pa_ec_etext_en'] = $_POST['pa_ec_etext_en'];
        $data['pa_ec_etext_sp'] = $_POST['pa_ec_etext_sp'];
        $result = $this->Content_model->updateEmailCloseContent($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }



    public function updateSettingValue()
    {
        $value = $_POST['value'];
        $type = $_POST['type'];
        $result = $this->Settings_model->updateSettingValue($type, $value);
        echo json_encode($result);
    }

    // System Info
    public function readSysInfo()
    {
        $data = $this->Systeminfo_model->readSysInfo();
        echo json_encode($data);
    }

    public function updateSysInfo()
    {
        $data['month'] = $_POST['month'];
        $data['year'] = $_POST['year'];
        $data['word'] = $_POST['word'];
        $data['type'] = $_POST['type'];
        $data['language'] = $_POST['language'];

        $result = $this->Systeminfo_model->updateSysInfo($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    // send to friend
    public function readSendToFriend()
    {
        $result = $this->Content_model->readSendToFriend();
        if ($result) {
            echo json_encode(array('data' => $result));
        } else {
            echo json_encode(array('data' => []));
        }
    }

    public function updateSendToFriend()
    {
        $data['sf_subject_en'] = $_POST['sf_subject_en'];
        $data['sf_subject_es'] = $_POST['sf_subject_es'];
        $data['sf_updated_text_en'] = $_POST['sf_updated_text_en'];
        $data['sf_updated_text_es'] = $_POST['sf_updated_text_es'];
        $result = $this->Content_model->updateSendToFriend($data);
        if ($result) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'fail'));
        }
    }

    // icons
    public function readIcons()
    {
        $name = $_POST['name'];
        $result = $this->Settings_model->readIcons($name);
        echo json_encode($result);
    }

    public function addIcon()
    {
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];

        echo $this->Settings_model->addIcon($data);
    }

    public function updateIcon()
    {
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];

        $result = $this->Settings_model->updateIcon($data);
        if ($result) {
            echo json_encode(array("status" => "ok"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function deleteIcon()
    {
        $id = $_POST['id'];
        $result = $this->Settings_model->deleteIcon($id);
        if ($result) {
            echo json_encode(array("status" => "ok"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    // payment
    public function readPaymentStripe()
    {
        $res = $this->Settings_model->readPaymentStripe();
        echo json_encode($res);
    }

    public function addPaymentStripe()
    {
        $data["stripe"] = $_POST["stripe"];
        $result = $this->Settings_model->addPaymentStripe($data);
        if ($result) {
            echo json_encode(array("status" => "ok"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function updatePaymentStripe()
    {
        $data["id"] = $_POST["id"];
        $data["stripe"] = $_POST["stripe"];
        $result = $this->Settings_model->updatePaymentStripe($data);
        if ($result) {
            echo json_encode(array("status" => "ok"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function chosenPaymentStripe()
    {
        $data["id"] = $_POST["id"];
        $res = $this->Settings_model->chosenPaymentStripe($data["id"]);
        echo json_encode($res);
    }

    public function deletePaymentStripe()
    {
        $data["id"] = $_POST["id"];
        $result = $this->Settings_model->deletePaymentStripe($data["id"]);
        if ($result) {
            echo json_encode(array("status" => "ok"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    // download meta file
    public function getMetaFile()
    {
        $filetype = $_GET['filetype'];
        if (($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null) && ($this->session->userdata('patient_id') == '' || $this->session->userdata('patient_name') == null))
            redirect('admin', 'refresh');

        $filePath = "";
        if ($filetype == 'facebook') {
            $filePath = "assets/images/facebook_meta.jpg";
        } else if ($filetype == 'twitter') {
            $filePath = "assets/images/twitter_meta.jpg";
        }

        // Check if the file exists and is readable
        if (file_exists($filePath) && is_readable($filePath)) {
            // Set appropriate headers
            header('Content-Description: File Transfer');
            header('Content-Type: ' . mime_content_type($filePath));
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Clear output buffer
            ob_clean();
            flush();

            // Output the file content
            readfile($filePath);
            exit;
        } else {
            // If the file does not exist or is not readable, return a 404 error
            show_404();
        }
    }
}
