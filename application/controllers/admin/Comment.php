<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
    // memanggil helper, dan memastikan admin sudah login
		$this->load->helper('sitata_helper');
		check_login();
    check_admin();
    // memanggil model comment
    $this->load->model('Comment_model');
	}

  public function index()
    {
      $data['title'] = 'Komentar';
      $data['sidebar'] = 'Dashboard';
      // menggunakan library pagination untuk pembatas jumlah data di satu halaman 
      $this->load->library("pagination");
      // konfigurasi untuk pagination, dengan jumlah 10 data per halaman
      $config = array();
		  $config["base_url"] = base_url() . "comment";
      $config["total_rows"] = $this->Comment_model->get_count();
      $config["per_page"] = 10;
      $config["uri_segment"] = 2;
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
      $data["links"] = $this->pagination->create_links();
      // data user
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();
      $data['comment'] = $this->Comment_model->get($config["per_page"], $page);
      
      // menampilkan halaman view komentar, dengan templates header, sidebar, topbar, dan footer
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/comment_list', $data);
      $this->load->view('templates/footer', $data);
    }

    public function delete($id)
    {
      // menghapus data komentar berdasarkan id komentar
		  $deleted = $this->Comment_model->delete($id);
		  // jika sudah dihapus, maka tampilkan pesan
		  if ($deleted) {
			  $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show" role="alert">Komentar Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			  // mengarahkan langsung ke halaman daftar berita
			  redirect('admin/Comment');
      }
    }
}