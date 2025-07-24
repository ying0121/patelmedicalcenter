<?php


defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

function generateRandomString($length = 10)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
class Settings extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_model');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['sideitem'] = 'settings';

		$this->load->model('content_model', 'content_model');
		$data['menu'] = $this->content_model->getmenu();
		$data['surveycats'] = $this->Settings_model->getsurcat();
		$data['surveyfooter'] = $this->Settings_model->getsurfooter();
		$this->load->view('central/settings', $data);
	}
	//Cemail Area
	public function getcemail()
	{
		$result = $this->Settings_model->getcemail();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addcemail()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$result = $this->Settings_model->addcemail($name, $email);
		if ($result)
			echo "ok";
	}
	public function chosencemail()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosencemail($id);
		if ($result)
			echo json_encode($result);
	}
	public function editcemail()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$result = $this->Settings_model->editcemail($id, $name, $email);
		if ($result)
			echo "ok";
	}
	public function deletecemail()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletecemail($id);
		if ($result)
			echo "ok";
	}
	//Creason Area
	public function getcreason()
	{
		$result = $this->Settings_model->getcreason();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addcreason()
	{
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->addcreason($en, $es);
		if ($result)
			echo "ok";
	}
	public function chosencreason()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosencreason($id);
		if ($result)
			echo json_encode($result);
	}
	public function editcreason()
	{
		$id = $this->input->post('id');
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->editcreason($id, $en, $es);
		if ($result)
			echo "ok";
	}
	public function deletecreason()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletecreason($id);
		if ($result)
			echo "ok";
	}
	//Wortime Area
	public function readWorkingHour()
	{
		$result = $this->Settings_model->readWorkingHour();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addworktime()
	{
		$en_day = $this->input->post('en_day');
		$es_day = $this->input->post('es_day');
		$en_time = $this->input->post('en_time');
		$es_time = $this->input->post('es_time');
		$result = $this->Settings_model->addworktime($en_day, $es_day, $en_time, $es_time);
		if ($result)
			echo "ok";
	}
	public function chosenworktime()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosenworktime($id);
		if ($result)
			echo json_encode($result);
	}
	public function editworktime()
	{
		$id = $this->input->post('id');
		$en_day = $this->input->post('en_day');
		$es_day = $this->input->post('es_day');
		$en_time = $this->input->post('en_time');
		$es_time = $this->input->post('es_time');
		$result = $this->Settings_model->editworktime($id, $en_day, $es_day, $en_time, $es_time);
		if ($result)
			echo "ok";
	}
	public function deleteworktime()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deleteworktime($id);
		if ($result)
			echo "ok";
	}
	//Page Img
	public function getpageimg()
	{
		$result = $this->Settings_model->getpageimg();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addimg()
	{
		$id = $this->input->post('pageid');
		$desc = $this->input->post('desc');
		$filename = $id . "_" . generateRandomString(10);
		$config['upload_path']          = './assets/images/pageimg/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480000;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			echo "failed";
		} else {
			$data = array('upload_data' => $this->upload->data());
			$result = $this->Settings_model->addpageimg($id, $desc, $data['upload_data']['orig_name']);
			if ($result)
				echo "ok";
		}
	}
	public function deletepageimg()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletepageimg($id);
		if ($result)
			echo "ok";
	}
	public function editimg()
	{
		$id = $this->input->post('id');
		$filename = $id . "_" . generateRandomString(10);
		$config['upload_path']          = './assets/images/pageimg/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480000;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (! $this->upload->do_upload('img')) {
			$error = array('error' => $this->upload->display_errors());
			echo "failed";
		} else {
			$data = array('upload_data' => $this->upload->data());
			$result = $this->Settings_model->updatepageimg($id, $data['upload_data']['orig_name']);
			if ($result)
				echo "ok";
		}
	}
	//Quality Category Area
	public function getqcat()
	{
		$result = $this->Settings_model->getqcat();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addqcat()
	{
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->addqcat($en, $es);
		if ($result)
			echo "ok";
	}
	public function chosenqcat()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosenqcat($id);
		if ($result)
			echo json_encode($result);
	}
	public function editqcat()
	{
		$id = $this->input->post('id');
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$status = $this->input->post('status');
		$result = $this->Settings_model->editqcat($id, $en, $es, $status);
		if ($result)
			echo "ok";
	}
	public function deleteqcat()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deleteqcat($id);
		if ($result)
			echo "ok";
	}
	public function qualitymeasure()
	{
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('central', 'refresh');
		$data['sideitem'] = 'measuresbycat';
		$data['catid'] = $this->input->get('id');
		$data['topics'] = $this->Settings_model->getqcat();
		$this->load->view('central/measuresbycat', $data);
	}
	public function getmeasures()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->getmeasures($id);
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function deletemeasure()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletemeasure($id);
		if ($result)
			echo "ok";
	}
	public function chosenmeasure()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosenmeasure($id);
		if ($result)
			echo json_encode($result);
	}
	public function updatemeasure()
	{
		$id = $this->input->post('id');
		$measure_en = $this->input->post('measure_en');
		$measure_es = $this->input->post('measure_es');
		$topic = $this->input->post('topic');
		$denominator = $this->input->post('denominator');
		$numerator = $this->input->post('numerator');
		$sdate = $this->input->post('sdate');
		$edate = $this->input->post('edate');
		$desc_en = $this->input->post('desc_en');
		$desc_es = $this->input->post('desc_es');
		$fdesc_en = $this->input->post('fdesc_en');
		$fdesc_es = $this->input->post('fdesc_es');
		$status = $this->input->post('status');
		$result = $this->Settings_model->updatemeasure($id, $measure_en, $measure_es, $topic, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es, $status);
		if ($result)
			echo "ok";
	}
	public function addmeasures()
	{
		$id = $this->input->post('id');
		$measure_en = $this->input->post('measure_en');
		$measure_es = $this->input->post('measure_es');
		$denominator = $this->input->post('denominator');
		$numerator = $this->input->post('numerator');
		$sdate = $this->input->post('sdate');
		$edate = $this->input->post('edate');
		$desc_en = $this->input->post('desc_en');
		$desc_es = $this->input->post('desc_es');
		$fdesc_en = $this->input->post('fdesc_en');
		$fdesc_es = $this->input->post('fdesc_es');
		$result = $this->Settings_model->addmeasures($id, $measure_en, $measure_es, $denominator, $numerator, $sdate, $edate, $desc_en, $desc_es, $fdesc_en, $fdesc_es);
		if ($result)
			echo "ok";
	}
	//Survey Category Area
	public function getsurcat()
	{
		$result = $this->Settings_model->getsurcat();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addsurcat()
	{
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->addsurcat($en, $es);
		if ($result)
			echo "ok";
	}
	public function chosensurcat()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosensurcat($id);
		if ($result)
			echo json_encode($result);
	}
	public function editsurcat()
	{
		$id = $this->input->post('id');
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->editsurcat($id, $en, $es);
		if ($result)
			echo "ok";
	}
	public function deletesurcat()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletesurcat($id);
		if ($result)
			echo "ok";
	}
	//Survey Question Area
	public function getsurque()
	{
		$result = $this->Settings_model->getsurque();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addsurque()
	{
		$cat = $this->input->post('cat');
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->addsurque($cat, $en, $es);
		if ($result)
			echo "ok";
	}
	public function chosensurque()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosensurque($id);
		if ($result)
			echo json_encode($result);
	}
	public function editsurque()
	{
		$id = $this->input->post('id');
		$cat = $this->input->post('cat');
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->editsurque($id, $cat, $en, $es);
		if ($result)
			echo "ok";
	}
	public function deletesurque()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletesurque($id);
		if ($result)
			echo "ok";
	}
	//Survey Response Area
	public function getsurres()
	{
		$result = $this->Settings_model->getsurres();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addsurres()
	{
		$key = $this->input->post('key');
		$result = $this->Settings_model->addsurres($key);
		if ($result)
			echo "ok";
	}
	public function chosensurres()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosensurres($id);
		if ($result)
			echo json_encode($result);
	}
	public function editsurres()
	{
		$id = $this->input->post('id');
		$key = $this->input->post('key');
		$result = $this->Settings_model->editsurres($id, $key);
		if ($result)
			echo "ok";
	}
	public function updatesurresen()
	{
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$result = $this->Settings_model->updatesurresen($id, $value);
		if ($result)
			echo "ok";
	}
	public function updatesurreses()
	{
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$result = $this->Settings_model->updatesurreses($id, $value);
		if ($result)
			echo "ok";
	}
	public function deletesurres()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletesurres($id);
		if ($result)
			echo "ok";
	}
	public function updatesurveyfooter()
	{
		$en = $this->input->post('en');
		$es = $this->input->post('es');
		$result = $this->Settings_model->updatesurveyfooter($en, $es);
		if ($result)
			echo "ok";
	}
	public function getnewsimg()
	{
		$result = $this->Settings_model->getnewsimg();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function updatenewsimg()
	{
		$name = $this->input->post('newsimg');
		$filename = generateRandomString(10);
		$config['upload_path']          = './assets/images/newsimg/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 20480000;
		$config['max_width']            = 1024 * 5;
		$config['max_height']           = 768 * 5;
		$config['file_name'] 			= $filename;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			redirect('central/settings', 'refresh');
		} else {
			$data = array('upload_data' => $this->upload->data());
			$result = $this->Settings_model->updatenewsimg($name, $data['upload_data']['orig_name']);
			if ($result)
				redirect('central/settings', 'refresh');
		}
	}
	public function deletenewsimg()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletenewsimg($id);
		if ($result)
			echo "ok";
	}
	//Defined Medical Condition Area
	public function getDefinedMedicalCondition()
	{
		$result = $this->Settings_model->getDefinedMedicalCondition();
		if ($result) {
			echo json_encode(array('data' => $result));
		} else {
			echo json_encode(array('data' => []));
		}
	}
	public function addDefinedMedicalCondition()
	{
		$name = $this->input->post('name');
		$codes = $this->input->post('codes');
		$result = $this->Settings_model->addDefinedMedicalCondition($name, $codes);
		if ($result)
			echo "ok";
	}
	public function chosenDefinedMedicalCondition()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->chosenDefinedMedicalCondition($id);
		if ($result)
			echo json_encode($result);
	}
	public function editDefinedMedicalCondition()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$codes = $this->input->post('codes');
		$result = $this->Settings_model->editDefinedMedicalCondition($id, $name, $codes);
		if ($result)
			echo "ok";
	}
	public function deletedefinedMedicalCondition()
	{
		$id = $this->input->post('id');
		$result = $this->Settings_model->deletedefinedMedicalCondition($id);
		if ($result)
			echo "ok";
	}
}
