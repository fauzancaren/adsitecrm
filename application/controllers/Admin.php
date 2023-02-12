<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app'); 
        $this->load->helper('cookie');
    } 
    public function index()
    {  
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('admin/menu',$data); 
    }
}