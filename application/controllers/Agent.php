<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agent extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');
        $this->load->helper('cookie');
    }
    public function index()
    {
        //if (get_cookie('level') != "Leader") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('agent/agent', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }
}
