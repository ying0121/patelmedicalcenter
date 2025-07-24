<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class CentralUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        redirect('central/content', 'refresh');
    }
}
