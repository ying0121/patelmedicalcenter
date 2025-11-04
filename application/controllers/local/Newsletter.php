<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Newsletter extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ContactInfo_model');
		$this->load->model('AreaToggle_model');
		$this->load->model('Newsletter_model');
		$this->load->helper('url');

		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'newsletter';
		$data['contact_info'] = $this->ContactInfo_model->read();
		$data['area_toggle'] = $this->AreaToggle_model->read();

		$data['phones'] = $this->Newsletter_model->getusersbyphones();
		$data['images'] = $this->Newsletter_model->getimages();
		$this->load->view('local/newsletter', $data);
	}
	public function viewrenewsletter()
	{
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('central', 'refresh');

		$data['contact_info'] = $this->ContactInfo_model->read();
		$data['area_toggle'] = $this->AreaToggle_model->read();
		$data['sideitem'] = 'newsletter';
		$id = $this->input->get('id');
		$data['id'] = $id;
		$data['result'] = $this->Newsletter_model->viewrenewsletter($id);
		$data['medConditions'] = $this->Newsletter_model->getMedicationConditions();

		$this->load->view('local/viewrenewsletter', $data);
	}
	public function renderNewsLetter($link)
	{
		// get id from newsletterdata table
		$newsletter = $this->Newsletter_model->getByLink($link);

		$data['contact_info'] = $this->ContactInfo_model->read();
		$data['area_toggle'] = $this->AreaToggle_model->read();
		$data['sideitem'] = 'newsletter';
		$data['result'] = $this->Newsletter_model->viewrenewsletter($newsletter["id"]);
		$data['medConditions'] = $this->Newsletter_model->getMedicationConditions();

		$this->load->view('local/viewrenewsletter', $data);
	}
	public function getnewsletter()
	{
		$result = $this->Newsletter_model->getnewsletter();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addnewsletter()
	{
		//generate 8 length string to verify
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$c_length = strlen($characters);
		$link = '';
		for ($i = 0; $i < 8; $i++) {
			$link .= $characters[rand(0, $c_length - 1)];
		}

		$en_sub = $this->input->post('en_sub');
		$es_sub = $this->input->post('es_sub');
		$author = $this->input->post('author');
		$date = $this->input->post('date');

		$result = $this->Newsletter_model->addnewsletter($en_sub, $es_sub, $author, $date, $link);
		if ($result)
			echo json_encode($result);
		else {
			echo "failed";
		}
	}
	public function editnewsletterstatus()
	{
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$result = $this->Newsletter_model->editnewsletterstatus($id, $value);
		if ($result)
			echo "ok";
	}
	public function updatenewsletter()
	{
		$id = $this->input->post('id');
		$en_sub = $this->input->post('en_sub');
		$es_sub = $this->input->post('es_sub');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$author = $this->input->post('author');
		$date = $this->input->post('date');
		$med_cond = $this->input->post('med_cond');
		$education_material = $this->input->post('education_material');
		$gender = $this->input->post('gender');
		$age_all = $this->input->post('age_all');
		$age_from = $this->input->post('age_from');
		$age_to = $this->input->post('age_to');

		if ($age_all != "true" && intval($age_from) > intval($age_to)) {
			echo "failed";
			return;
		}

		$result = $this->Newsletter_model->updatenewsletter($id, $en_sub, $es_sub, $en_desc, $es_desc, $author, $date, $med_cond, $education_material, $gender, $age_all, $age_from, $age_to);
		if ($result)
			echo json_encode($result);
		else {
			echo "failed";
		}
	}
	public function deletenewsletter()
	{
		$id = $this->input->post('id');
		$result = $this->Newsletter_model->deletenewsletter($id);
		if ($result)
			echo "ok";
	}
	public function sendemail()
	{
		$newsletter_id = $this->input->post('id');
		$lang = $this->input->post('lang');
		$all = $this->input->post('all');
		$apt_months = $this->input->post('apt_months');
		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";

		$emailList = $this->Newsletter_model->getPatientEmailsWithMedCond($all, $apt_months, $newsletter_id);

		$this->load->library('email');
		$this->email->set_newline("rn");
		$config = array();
		$config['protocol']    = 'mail';
		$config['smtp_host']    = $this->config->item('smtp_host');
		$config['smtp_port']    = $this->config->item('smtp_port');
		$config['smtp_timeout'] = '7';
		$config['auth'] = true;
		$config['smtp_user']    = $this->config->item('smtp_user');
		$config['smtp_pass']    = $this->config->item('smtp_pass');
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bo
		$this->email->initialize($config);
		$this->email->from($this->config->item('smtp_user'));
		$this->email->to("buenmaker@gmail.com,roswellg@gmail.com");

		$result = $this->Newsletter_model->getchosennewsletter($newsletter_id, $tmplang);
		$eduList = $this->Newsletter_model->getEducationMaterialUrlsFromNewsLetter($newsletter_id, $tmplang);
		$data = array(
			'base_url' => $this->config->item('base_url'),
			'data' => $result,
			'edu_data' => $eduList
		);
		$this->load->model('ContactInfo_model', 'ContactInfo_model');
		$clinic = $this->ContactInfo_model->read();
		$tmpmessage = $this->load->view('email/newsletter.php', $data, TRUE);
		$this->email->subject($clinic['name'] . " : " . $result['header']);
		$this->email->message($tmpmessage);

		//test
		// $this->email->to("super.vision.dev@gmail.com"); 
		// $result = $this->email->send();
		// var_dump($result);

		// var_dump($eduList);
		// echo $tmpmessage;
		// return;

		for ($i = 0; $i < count($emailList); $i += 200) {
			$emails_segment = array_slice($emailList, $i, 200);
			$this->email->bcc(join(",", $emails_segment));
			$this->email->send();
			sleep(3);
		}
		echo "ok";
	}
	public function addimgtonews()
	{
		$id = $this->input->post('id');
		$img = $this->input->post('img');

		$result = $this->Newsletter_model->addimgtonews($id, $img);
		if ($result)
			echo json_encode($result);
		else {
			echo "failed";
		}
	}
	public function sendsms()
	{
		$newsletter_id = $this->input->post('id');
		$lang = $this->input->post('lang');
		$all = $this->input->post('all');
		$apt_months = $this->input->post('apt_months');

		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";

		$result = $this->Newsletter_model->getchosennewsletter($newsletter_id, $tmplang);
		$phoneArr = $this->Newsletter_model->getPatientSmsesWithMedCond($all, $apt_months, $newsletter_id);

		$tmptext = "Best Care Ever Alert\n\n" . $result['header'] . "\n" . $result['author'] . " - " . $result['published'] . "\n";
		$tmptext .= $this->config->item('base_url') . "/newsletter/detail?id=" . $newsletter_id;
		$from = "+13476012801";
		require './Twilio/autoload.php';
		// Your Account SID and Auth Token from twilio.com/console
		$sid = 'ACfb0589237e348241f182e3da53b60129';
		$token = '1e19e0366421ddc18e8e174bb7ebf0b0';
		$client = new Twilio\Rest\Client($sid, $token);
		// $result1 = $client->messages->create(
		// 	// the number you'd like to send the message to
		// 	"+16464680123",
		// 	array(
		// 		// A Twilio phone number you purchased at twilio.com/console
		// 		'from' => $from,
		// 		// the body of the text message you'd like to send
		// 		'body' => $tmptext
		// 	)
		// );
		if (count($phoneArr) > 0) {
			for ($i = 0; $i < count($phoneArr); $i++) {
				if ($phoneArr[$i] != "") {
					$to = '+1' . $phoneArr[$i];
					$result1 = $client->messages->create(
						// the number you'd like to send the message to
						$to,
						array(
							// A Twilio phone number you purchased at twilio.com/console
							'from' => $from,
							// the body of the text message you'd like to send
							'body' => str_replace("&nbsp;", "", strip_tags($tmptext))
						)
					);
				}
			}
		}
		echo "ok";
	}
	public function test()
	{
		$data = $this->Newsletter_model->getPatientEmailsWithMedCond(NULL, NULL, 5);

		echo json_encode(array('data' => $data));
	}

	public function getEducationMaterial()
	{
		$med_cond = $this->input->post('med_cond');
		$result = $this->Newsletter_model->getEducationMaterial($med_cond);
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
}
