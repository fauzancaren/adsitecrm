<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');
        $this->load->model('M_login');
        $this->load->helper('cookie');
    } 
    public function index()
    {
        $row = $this->M_login->login(get_cookie('username'), $this->M_app->DecryptedPassword(get_cookie('password')));
        if ($row) {  
            redirect('client', 'refresh'); 
        } else {  
            $data["error"] = "";
            $this->load->view('template/login',$data); 
        }
    }
}
