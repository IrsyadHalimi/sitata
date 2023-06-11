<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('sitata');
        check_login();
        check_admin();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['sidebar'] = "Admin";
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/news_list', $data);
        $this->load->view('templates/footer');
    }

    public function tes()
    {
        $this->load->view('tes');
    }
}