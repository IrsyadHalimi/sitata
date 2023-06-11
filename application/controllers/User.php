<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('sitata_helper');
        $this->load->model('News_model');
        check_login();
        check_user();
        $this->load->library("pagination");
    }
    
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['sidebar'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function news()
    {
        $config = array();
		$config["base_url"] = base_url() . "user/news/";
		$config["total_rows"] = $this->News_model->get_count();
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['news'] = $this->News_model->get_news($config["per_page"], $page);

        $data['title'] = 'My Profile';
        $data['sidebar'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/news_page', $data);
        $this->load->view('templates/footer');
    }

    public function news_preview($id_berita)
	{
		$data['title'] = 'Beranda';
		$data['sidebar'] = "Halooooo";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$where = array('id_berita' => $id_berita);
		$data['news_detail'] = $this->News_model->detail($where);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/news_detail_page', $data);
		$this->load->view('templates/footer');
	}
}