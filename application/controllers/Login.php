<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_app');
        $this->load->model('M_login');
        $this->load->helper('cookie');
    }
    public function index()
    {
        $client_id = '57741008501-7lupg3ae0o49kc1416dri88tu87rdfar.apps.googleusercontent.com';
        $client_secret = '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';
        $redirect_uri = base_url('login');

        $google_client = new Google_Client();
        $google_client->setClientId($client_id); //masukkan ClientID anda
        $google_client->setClientSecret($client_secret); //masukkan Client Secret Key anda
        $google_client->setRedirectUri($redirect_uri); //Masukkan Redirect Uri anda
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if(isset($_GET["code"]))
        {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
            if(!isset($token["error"]))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                $user_data = array(
                    'first_name' => $data['given_name'],
                    'last_name'  => $data['family_name'],
                    'email_address' => $data['email'],
                    'profile_picture'=> $data['picture'],
                    'updated_at' => $current_datetime
                );
                $this->session->set_userdata('user_data', $data);
            }
        }
        if(!$this->session->userdata('access_token'))
        { 
            //reset session
            $this->session->flashdata();
            delete_cookie('username');
            delete_cookie('email');
            delete_cookie('password');
            delete_cookie('level'); 

            $this->session->unset_userdata('access_token');
            $this->session->unset_userdata('user_data');
            $this->session->flashdata();

            $login_button =  $google_client->createAuthUrl();
            $data['login_button'] = $login_button;
            $this->load->view('template/login', $data);
        }
        else
        {
            $row = $this->M_login->login_email($this->session->userdata('user_data')['email']); 
            if ($row) {
                $this->get_menu($row);
            } else {
                redirect("login/signup","refresh");
            }
        } 
    }
    public function signup(){
        $this->load->view('template/registrasi');
    }
    public function check_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //email kosong
        if (!$email) {
            $json = array(
                "status" => "1",
                "message" => "Silahkan masukan email sebelum klik login!!!"
            );
            header('Content-type: application/json');
            echo json_encode($json);
            return true;
        }

        //password kosong
        else if (!$password) {
            $json = array(
                "status" => "2",
                "message" => "Silahkan masukan password sebelum klik login!!!",
            );
            header('Content-type: application/json');
            echo json_encode($json);
            return true;
        }


        //Email belum registrasi
        $row = $this->M_login->login_email($email);
        if (!$row) {
            $json = array(
                "status" => "3",
                "message" => "Email belum Terdaftar",
            );
            header('Content-type: application/json');
            echo json_encode($json);
            return true;
        }

        //password salah
        $row = $this->M_login->login($email, $password);
        if (!$row) {
            $json = array(
                "status" => "4",
                "message" => "password tidak sesuai",
            );
            header('Content-type: application/json');
            echo json_encode($json);
            return true;
        }

        set_cookie('username', $row->name, '3600');
        set_cookie('email', $row->email, '3600');
        set_cookie('password', $this->M_app->EncryptedPassword(str_replace("'", "''",  $row->password)), '3600');
        set_cookie('level', $row->level, '3600');

        $json = array(
            "status" => "5",
            "message" => "",
        );
        header('Content-type: application/json');
        echo json_encode($json);
    }
    public function get_menu($row)
    {
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
        if ($row->level == "Admin") redirect("admin", 'refresh');
        if ($row->level == "Leader") redirect("leader", 'refresh');
        if ($row->level == "Sales") redirect("sales", 'refresh');
        if ($row->level == "GM") redirect("gm", 'refresh');
        if ($row->level == "Management") redirect("managemant", 'refresh');
    }
    public function checkout()
    {

        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        $this->session->flashdata();
        delete_cookie('username');
        delete_cookie('email');
        delete_cookie('password');
        delete_cookie('level');

        redirect("login", 'refresh');
    }
}
