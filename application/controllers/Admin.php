<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');
        $this->load->helper('cookie');
    }
    public function index()
    {
        //if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function new_leads()
    {
        //if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/new_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function contacted_leads()
    {
        //if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/contacted_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function visit()
    {
        //if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/visit', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function close_leads()
    {
        //if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/close_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }
}
