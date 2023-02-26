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
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function new_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/new_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }
    public function contacted_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/contacted_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function visit()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/visit', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function close_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/close_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function pending_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/pending_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function invalid_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/invalid_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    // Detail Data Leads & Follow Up
    public function data_leads()
    {
        if(get_cookie('level') != "Admin") redirect("login", 'refresh'); 
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/data_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    function get_card_dashboard(){ 
        $tanggal_sekarang = date('Y-m-d');  
        $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days')); 

        $sum_new = $this->db->query("SELECT * FROM leads WHERE status ='New' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
        $sum_invalid = $this->db->query("SELECT * FROM leads WHERE category ='Invalid' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
        $sum_pending = $this->db->query("SELECT * FROM leads WHERE category ='Pending' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
        $sum_contacted = $this->db->query("SELECT * FROM leads WHERE status ='Contacted' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
        $sum_visit = $this->db->query("SELECT * FROM leads WHERE status ='Visit' AND  date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
        $sum_close = $this->db->query("SELECT * FROM leads WHERE status ='close' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang' ORDER BY id DESC ")->num_rows();
 
        header('Content-Type: application/json');
        echo json_encode(array(
            "data-ds-new" => $sum_new,
            "data-ds-invalid" => $sum_invalid,
            "data-ds-pending" => $sum_pending,
            "data-ds-contacted" => $sum_contacted,
            "data-ds-visit" => $sum_visit,
            "data-ds-close" => $sum_close,
        ));
    }
    function get_list_new_dashboard(){ 
        $data = $this->db->query("SELECT * FROM leads WHERE status = 'New' ORDER BY id DESC LIMIT 6")->result();
        header('Content-Type: application/json');
        echo json_encode($data); 
    }
    function get_list_deal_dashboard(){
        $tanggal_sekarang = date('Y-m-d'); 

        $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days')); 
 
        $data = $this->db->query("SELECT * FROM leads WHERE status =  'Close' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang'  ORDER BY id DESC LIMIT 6")->result();
        header('Content-Type: application/json');
        echo json_encode($data);  
    }

}
