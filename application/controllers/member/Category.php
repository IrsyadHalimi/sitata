<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    // memanggil helper
    $this->load->helper('sitata_helper');
    // memanggil model berita
    $this->load->model('Category_model');
    $this->load->model('News_model');
    check_login();
    check_user();
    // memanggil library pagination
    $this->load->library("pagination");
  }

  public function index()
  {
    // memberi judul halaman profil anggota
    $data['title'] = 'Kategori Berita';
    $data['sidebar'] = 'Beranda';
    // data user
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['category'] = $this->Category_model->get();
    // menampilkan halaman view profil, dengan templates header, sidebar, topbar, dan footer
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('member/category', $data);
    $this->load->view('templates/footer', $data);
  }

  public function news_by_category($id)
  {
    // memberi judul halaman profil anggota
    $data['sidebar'] = 'Beranda';
    // data user
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['news_by_category'] = $this->News_model->get_by_category($id);
    $category_id = array('id_kategori' => $id);
    // data berita berdasarkan id berita
    $data['category'] = $this->Category_model->get_by_id($category_id);
    // menampilkan halaman view profil, dengan templates header, sidebar, topbar, dan footer
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('member/news_category', $data);
    $this->load->view('templates/footer', $data);
  }
}