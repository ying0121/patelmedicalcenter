<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Survey extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ContactInfo_model');

		$this->load->model('Contacts_model');
		$this->load->model('Survey_model');
		$this->load->helper('url');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['sideitem'] = 'survey';
		$data['contact_info'] = $this->ContactInfo_model->read();

		$data['questions'] = $this->Survey_model->getquestions();
		$data['reponses'] = $this->Survey_model->getreponses();
		$id = $this->input->get('id');
		$data['result'] = $this->Survey_model->getsurveydata($id, "en");
		$data['id'] = $id;
		$this->load->view('local/survey', $data);
	}
	public function list()
	{
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
		$data['sideitem'] = 'surveylist';
		$data['contact_info'] = $this->ContactInfo_model->read();

		$data['emails'] = $this->Survey_model->getusersbyemails();
		$data['phones'] = $this->Survey_model->getusersbyphones();

		$this->load->view('local/surveylist', $data);
	}
	function getsurvey()
	{
		$result = $this->Survey_model->getsurvey();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	function chosensurvey()
	{
		$id = $this->input->post('id');
		$result = $this->Survey_model->chosensurvey($id);
		if ($result)
			echo json_encode($result);
	}
	function editsurvey()
	{
		$id = $this->input->post('id');
		$en_sub = $this->input->post('en_sub');
		$es_sub = $this->input->post('es_sub');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');
		$result = $this->Survey_model->editsurvey($id, $en_sub, $es_sub, $en_desc, $es_desc);
		if ($result)
			echo "ok";
		else
			echo "failed";
	}

	public function chosenresponse()
	{
		$id = $this->input->post('id');

		$result = $this->Survey_model->chosenresponse($id);
		if ($result)
			echo json_encode($result);
	}
	public function addsurvey()
	{
		$en_sub = $this->input->post('en_sub');
		$es_sub = $this->input->post('es_sub');
		$en_desc = $this->input->post('en_desc');
		$es_desc = $this->input->post('es_desc');

		$result = $this->Survey_model->addsurvey($en_sub, $es_sub, $en_desc, $es_desc);
		if ($result)
			echo json_encode($result);
		else {
			echo "failed";
		}
	}
	public function generatesurvey()
	{
		$id = $this->input->post('id');
		$quiz = $this->input->post('quiz');
		$res = $this->input->post('res');
		$result = $this->Survey_model->generatesurvey($id, $quiz, $res);
		if ($result)
			echo "ok";
		else
			echo "failed";
	}
	public function sendemail()
	{
		$id = $this->input->post('id');
		$emails = $this->input->post('emails');
		$lang = $this->input->post('lang');
		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";
		$this->Survey_model->updatesurveydate($id);
		$chosensurvey = $this->Survey_model->getsurveydata($id, $tmplang);
		$chosenfooter = $this->Survey_model->getsurveyfooter($tmplang);
		if ($emails && $emails != "") {
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
			// $this->email->to("buenmandev@gmail.com,roswellg@gmail.com"); 
			// $this->email->to("buenmandev@gmail.com,roswellg@gmail.com,rikhil.kochhar@gmail.com,mabreu2288@yahoo.com, joseagoris@gmail.com,fabgoris@gmail.com,marina29cruz@gmail.com,mayra.cerrato@josegoris.com,yinros@gmail.com,yinet.ae@gmail.com,cisco.duran@josegoris.com,luisbuenodg@gmail.com,jacobo181@yahoo.com,yanievicabreu@gmail.com,ramnajoseph@gmail.com,harry.urena@josegoris.com,marina.bisono@bestcareever.com,Aurora_9@live.com,dr.gaft0425@gmail.com"); 
			$this->email->bcc($emails);
			$data = array(
				'base_url' => $this->config->item('base_url'),
				'id' => $id,
				'lang' => $lang,
				'sub' => $chosensurvey['sub'],
				'desc' => $chosensurvey['desc'],
				'footer' => $chosenfooter['desc'],
			);
			$this->load->model('ContactInfo_model', 'ContactInfo_model');
			$clinic = $this->ContactInfo_model->read();
			$tmpmessage = $this->load->view('email/surveyemail.php', $data, TRUE);
			$this->email->subject($clinic['name'] . " : " . $chosensurvey['sub']);
			$this->email->message($tmpmessage);
			if ($this->email->send()) {
				echo "ok";
			} else {
				echo $this->email->print_debugger();
				echo "failed";
			}
		} else {
			echo "failed";
		}
	}
	public function sendsms()
	{
		$id = $this->input->post('id');
		$phones = $this->input->post('phones');
		$lang = $this->input->post('lang');
		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";
		$this->Survey_model->updatesurveydate($id);
		$chosensurvey = $this->Survey_model->getsurveydata($id, $tmplang);

		$phoneArr = explode(",", $phones);

		$tmptext = "<b>" . $chosensurvey['sub'] . "</b><br>" . strip_tags($chosensurvey['desc']) . "<br> - ";
		$tmptext .= $this->config->item('base_url') . "/local/survey/submit?id=" . $id . "&lang=" . $lang;
		$from = "+13476012801";
		require './Twilio/autoload.php';
		// Your Account SID and Auth Token from twilio.com/console
		$sid = 'ACfb0589237e348241f182e3da53b60129';
		$token = '1e19e0366421ddc18e8e174bb7ebf0b0';
		$client = new Twilio\Rest\Client($sid, $token);
		// Use the client to do fun stuff like send text messages!
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
	public function submit()
	{
		$id = $this->input->get('id');
		$lang = $this->input->get('lang');
		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";
		$data['result'] = $this->Survey_model->getsurveydata($id, $tmplang);
		$data['id'] = $id;
		$this->load->model('User_model', 'User_model');
		$data['langs'] = $this->User_model->getcomponents($tmplang);

		$this->load->view('local/submitsurvey', $data);
	}
	public function resultsurvey()
	{
		$id = $this->input->post('id');
		$quiz = $this->input->post('quiz');
		$res = $this->input->post('res');
		$value = $this->input->post('value');
		$result = $this->Survey_model->addsurveyresult($id, $quiz, $res, $value);
		redirect('local/Survey/finished', 'refresh');
	}
	public function finished()
	{
		if ($this->session->userdata('language') == "" || $this->session->userdata('language') == null)
			$lang = "en";
		else
			$lang = $this->session->userdata('language');
		$this->load->model('User_model', 'User_model');
		$data['langs'] = $this->User_model->getcomponents($lang);

		$this->load->view('local/resultsurvey', $data);
	}
	public function deletesurvey()
	{
		$id = $this->input->post('id');
		$result = $this->Survey_model->deletesurvey($id);
		if ($result)
			echo "ok";
	}
	public function viewresultsurvey()
	{
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');

		$data['sideitem'] = 'survey';
		$id = $this->input->get('id');
		$view = $this->input->get('view');
		$data['id'] = $id;
		$data['view'] = $view;
		$data['result'] = $this->Survey_model->viewresultsurvey($id);
		$data['emails'] = $this->Survey_model->getclinicemails();
		$this->load->view('local/viewresultsurvey', $data);
	}
	public function deletedata()
	{
		$id = $this->input->post('id');
		$result = $this->Survey_model->deletesurveydata($id);
		if ($result)
			echo "ok";
	}
	public function sendsurvey()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$emailcheck = $this->input->post('emailcheck');
		$smscheck = $this->input->post('smscheck');
		$lang = $this->input->post('lang');
		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";
		$this->Survey_model->updatesurveydate($id);
		$chosensurvey = $this->Survey_model->getsurveydata($id, $tmplang);
		$chosenfooter = $this->Survey_model->getsurveyfooter($tmplang);

		if ($emailcheck == 1) {
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
			// $this->email->to("buenmandev@gmail.com,roswellg@gmail.com"); 
			$this->email->bcc($email);
			$data = array(
				'base_url' => $this->config->item('base_url'),
				'id' => $id,
				'sub' => $chosensurvey['sub'],
				'desc' => $chosensurvey['desc'],
				'footer' => $chosenfooter['desc'],
				'lang' => $lang
			);
			$this->load->model('ContactInfo_model', 'ContactInfo_model');
			$clinic = $this->ContactInfo_model->read();
			$tmpmessage = $this->load->view('email/surveyemail.php', $data, TRUE);
			$this->email->subject($clinic['name'] . " : " . $chosensurvey['sub']);
			$this->email->message($tmpmessage);
			if ($this->email->send()) {
				// echo $this->email->print_debugger();
			} else {
				echo $this->email->print_debugger();
				echo "failed";
				return;
			}
		}
		if ($smscheck == 1) {
			$tmptext = "<b>" . $chosensurvey['sub'] . "</b><br>" . strip_tags($chosensurvey['desc']) . "<br> - ";
			$tmptext .= $this->config->item('base_url') . "/local/survey/submit?id=" . $id . "&lang=" . $lang;
			$to = '+1' . $phone;
			$from = "+13476012801";
			require './Twilio/autoload.php';
			// Your Account SID and Auth Token from twilio.com/console
			$sid = 'ACfb0589237e348241f182e3da53b60129';
			$token = '1e19e0366421ddc18e8e174bb7ebf0b0';
			$client = new Twilio\Rest\Client($sid, $token);
			// Use the client to do fun stuff like send text messages!
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
			if ($result1->sid != "" && $result1->sid != null) {
			} else {
				echo 'failed';
			}
		}
		echo "ok";
	}

	public function get_count_multi_sendsurvey()
	{
		$use_daterange = $this->input->post('use_daterange');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');

		$result = $this->Contacts_model->get_track_counts($use_daterange, $startdate, $enddate);
		echo $result;
	}

	public function multi_sendsurvey()
	{

		$id = $this->input->post('id');
		$use_daterange = $this->input->post('use_daterange');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$emailcheck = $this->input->post('emailcheck');
		$smscheck = $this->input->post('smscheck');
		$lang = $this->input->post('lang');

		if ($lang == 2)
			$tmplang = "es";
		else
			$tmplang = "en";
		$this->Survey_model->updatesurveydate($id);
		$chosensurvey = $this->Survey_model->getsurveydata($id, $tmplang);
		$chosenfooter = $this->Survey_model->getsurveyfooter($tmplang);

		$result = $this->Contacts_model->get_track_email_sms_list($use_daterange, $startdate, $enddate);

		if ($emailcheck == 1) {
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

			$data = array(
				'base_url' => $this->config->item('base_url'),
				'id' => $id,
				'sub' => $chosensurvey['sub'],
				'desc' => $chosensurvey['desc'],
				'footer' => $chosenfooter['desc'],
			);
			$this->load->model('ContactInfo_model', 'ContactInfo_model');
			$clinic = $this->ContactInfo_model->read();
			$tmpmessage = $this->load->view('email/surveyemail.php', $data, TRUE);
			$this->email->subject($clinic['name'] . " : " . $chosensurvey['sub']);
			$this->email->message($tmpmessage);

			$emailList = $result["email"];
			for ($i = 0; $i < count($emailList); $i += 200) {
				$emails_segment = array_slice($emailList, $i, 200);
				$this->email->bcc(join(",", $emails_segment));
				$this->email->send();
				sleep(3);
			}
		}
		if ($smscheck == 1) {
			$tmptext = "<b>" . $chosensurvey['sub'] . "</b><br>" . strip_tags($chosensurvey['desc']) . "<br> - ";
			$tmptext .= $this->config->item('base_url') . "/local/survey/submit?id=" . $id . "&lang=" . $lang;
			$from = "+13476012801";
			require './Twilio/autoload.php';
			// Your Account SID and Auth Token from twilio.com/console
			$sid = 'ACfb0589237e348241f182e3da53b60129';
			$token = '1e19e0366421ddc18e8e174bb7ebf0b0';
			$client = new Twilio\Rest\Client($sid, $token);
			// Use the client to do fun stuff like send text messages!

			$phoneArr = $result["sms"];
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
		}
		echo "ok";
	}

	public function sendemail_surveyresult()
	{
		$id = $this->input->post('id');
		$emails = $this->input->post('emails');

		$tmplang = "en";
		$chosensurvey = $this->Survey_model->getsurveydata($id, $tmplang);
		$survey_result = $this->Survey_model->viewresultsurvey($id);
		if ($emails && $emails != "") {
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
			// $this->email->to("buenmandev@gmail.com,roswellg@gmail.com"); 
			// $this->email->to("buenmandev@gmail.com,roswellg@gmail.com,rikhil.kochhar@gmail.com,mabreu2288@yahoo.com, joseagoris@gmail.com,fabgoris@gmail.com,marina29cruz@gmail.com,mayra.cerrato@josegoris.com,yinros@gmail.com,yinet.ae@gmail.com,cisco.duran@josegoris.com,luisbuenodg@gmail.com,jacobo181@yahoo.com,yanievicabreu@gmail.com,ramnajoseph@gmail.com,harry.urena@josegoris.com,marina.bisono@bestcareever.com,Aurora_9@live.com,dr.gaft0425@gmail.com"); 
			$this->email->bcc($emails);
			$data = array(
				'base_url' => $this->config->item('base_url'),
				'id' => $id,
				'sub' => $chosensurvey['sub'],
				'desc' => $chosensurvey['desc'],
				'result' => $survey_result
			);
			$this->load->model('ContactInfo_model', 'ContactInfo_model');
			$clinic = $this->ContactInfo_model->read();
			$tmpmessage = $this->load->view('email/surveyresultemail.php', $data, TRUE);

			$this->email->subject($clinic['name'] . " : " . $chosensurvey['sub']);
			$this->email->message($tmpmessage);
			if ($this->email->send()) {
				// echo $this->email->print_debugger();
				echo "ok";
			} else {
				echo $this->email->print_debugger();
				echo "failed";
			}
		} else {
			echo "failed";
		}
	}
}
