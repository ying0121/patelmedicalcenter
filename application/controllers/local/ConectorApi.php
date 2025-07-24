<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class ConectorApi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ConectorApi_model');
		$this->load->helper('url');
		if ($this->session->userdata('userid') == '' || $this->session->userdata('userid') == null)
			redirect('admin', 'refresh');
	}
	public function index()
	{
		$data['api'] = $this->ConectorApi_model->read();

		$this->load->view('local/setting/api', $data);
	}

	public function read()
	{
		$result = $this->ConectorApi_model->read();
		echo json_encode(array('data' => $result));
	}

	public function choose()
	{
		$url = $_POST['url'];
		$result = $this->ConectorApi_model->choose($url);
		echo json_encode(array('data' => $result));
	}

	public function update()
	{
		$data = array(
			'id' => $_POST['id'],
			'url' => $_POST['url']
		);
		$result = $this->ConectorApi_model->choose($data['url']);
		if (count($result)) {
			echo json_encode(array('status' => 'exist'));
		} else {
			$result = $this->ConectorApi_model->update($data);
			echo json_encode(array('status' => $result));
		}
	}

	public function delete()
	{
		$id = $_POST['id'];
		$result = $this->ConectorApi_model->delete($id);
		echo json_encode(array('status' => $result));
	}

	public function add()
	{
		$url = $_POST['url'];
		$result = $this->ConectorApi_model->choose($url);
		if (count($result)) {
			echo json_encode(array('status' => 'exist'));
		} else {
			$result = $this->ConectorApi_model->add($url);
			echo json_encode(array('status' => $result));
		}
	}
}
