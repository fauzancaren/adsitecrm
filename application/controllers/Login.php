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
        $row = $this->M_login->login(get_cookie('email'), $this->M_app->DecryptedPassword(get_cookie('password')));
        $err_code = $this->input->get("message");
        if ($row) {  
            $this->get_menu($row);
        } else {  
            //reset session
            $this->session->flashdata(); 
            delete_cookie('username');
            delete_cookie('email');
            delete_cookie('password');
            delete_cookie('level');

            $data["error"] = "";
            if($err_code==1) $data["error"] = "Silahkan masukan email sebelum klik login!!!";
            if($err_code==2) $data["error"] = "Silahkan masukan password sebelum klik login!!!";
            if($err_code==3) $data["error"] = "Email belum Terdaftar";
            if($err_code==4) $data["error"] = "password tidak sesuai";
            $this->load->view('template/login',$data);  
        }
    }
    public function check_login()
    { 
        $email = $this->input->post('email');
        $password = $this->input->post('password'); 

        //email kosong
        if (!$email) {   
            redirect("login?message=1", 'refresh');
            return false;
        }

        //password kosong
        if (!$password) {   
            redirect("login?message=2", 'refresh');
            return false;
        }

        
        //Email belum registrasi
        $row = $this->M_login->login_email($email); 
        if (!$row) {   
            redirect("login?message=3", 'refresh');
            return false;
        }

        //password salah
        $row = $this->M_login->login($email, $password);
        if (!$row) { 
            redirect("login?message=4", 'refresh');
            return false;
        }  

        $this->get_menu($row);
    }
    public function get_menu($row){ 
        //Simpan Session User CI
        $this->session->set_userdata(
            array(
                'username'  => $row->name,
                'email'     => $row->email,
                'level'     => $row->level, 
            )
        );
        
        //Simpan Session User Cookie Browser
        set_cookie('username', $row->name, '3600');
        set_cookie('email', $row->email, '3600');
        set_cookie('password', $this->M_app->EncryptedPassword(str_replace("'", "''",  $row->password)), '3600'); 
        set_cookie('level', $row->level, '3600'); 

        //redirect menu sesuai dengan level 
        if($row->level == "Admin") redirect("admin", 'refresh'); 
        if($row->level == "Leader") redirect("leader", 'refresh');
        if($row->level == "Sales") redirect("sales", 'refresh');
        if($row->level == "GM") redirect("gm", 'refresh');
        if($row->level == "Management") redirect("managemant", 'refresh');  
    }
    public function checkout(){
        $this->session->flashdata(); 
        delete_cookie('username');
        delete_cookie('email');
        delete_cookie('password');
        delete_cookie('level');

        redirect("login", 'refresh'); 
    }
}
