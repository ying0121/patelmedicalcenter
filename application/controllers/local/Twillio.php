
<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');
class Twillio extends CI_Controller
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
		// $this->load->view('local/setting/api/twillio', $data);
	}
}
