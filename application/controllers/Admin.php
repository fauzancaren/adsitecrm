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
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function leads($category = "New")
    {
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data["category"] = $category;
        $this->load->view('template/header', $data);
        $this->load->view('admin/leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }
    public function data_leads($id)
    {
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/data_leads', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    function get_card_dashboard()
    {
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
            "data-ds-contacted" => $sum_contacted,
            "data-ds-visit" => $sum_visit,
            "data-ds-close" => $sum_close,
            "data-ds-invalid" => $sum_invalid,
            "data-ds-pending" => $sum_pending,
        ));
    }
    function get_list_new_dashboard()
    {
        $data = $this->db->query("SELECT * FROM leads WHERE status = 'New' ORDER BY id DESC LIMIT 6")->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    function get_list_deal_dashboard()
    {
        $tanggal_sekarang = date('Y-m-d');

        $interval = date('Y-m-d', strtotime($tanggal_sekarang . ' - 30 days'));

        $data = $this->db->query("SELECT * FROM leads WHERE status =  'Close' AND date_new BETWEEN '$interval' AND '$tanggal_sekarang'  ORDER BY id DESC LIMIT 6")->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    function get_list_leads()
    {
        $status = $this->input->post("status");
        $data = $this->db->query("SELECT * FROM leads WHERE status =  '" . $status . "' AND category IN ('New','Cold','Warm','Hot','Reserve','Booking') ORDER BY id DESC ")->result();
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // Account

    public function account()
    {
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/account', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function profile()
    {
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }

    public function report()
    {
        if (get_cookie('level') != "Admin") redirect("login", 'refresh');
        $data = null;
        $this->load->view('template/header', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('template/navbar_mobile', $data);
    }
}
