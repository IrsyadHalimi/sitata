<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // memanggil helper
        $this->load->helper('sitata');
        // memanggil model yang akan digunakan
        $this->load->model('News_model');
        $this->load->model('Member_model');
        $this->load->model('Comment_model');
        // memastikan user sudah login dan user tersebut adalah admin
        check_login();
        check_admin();
    }

    // fungsi index, sebagai fungsi yang akan dieksekusi pertama kali, yaitu halaman dashboard
    public function index()
    {
        // memberi judul halaman dashboard
        $data['title'] = 'Dashboard';
        $data['sidebar'] = 'Dashboard';
        // data user, yang diambil dari model
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // data perhitungan jumlah anggota, berita dan komentar
		$data["total_member"] = $this->Member_model->get_count();
		$data["total_news"] = $this->News_model->get_count();
		$data["total_comment"] = $this->Comment_model->get_count();
        
        // data komentar terbaru yang diurutkan berdasarkan variabel comment_order_by, dibatasi hanya 3 data terbaru
        $comment_order_by = 'waktu_dibuat_komentar';
        $comment_limit = 3;
        $data["recent_comment"] = $this->Comment_model->get_recent_comment($comment_order_by, $comment_limit);
        // data berita terpopuler yang diurutkan berdasarkan variabel news_order_by yaitu berita yang paling banyak dilihat, dibatasi hanya 3 data berita
        $news_order_by = 'dilihat';
        $news_limit = 3;
        $data["popular_news"] = $this->News_model->get_popular_news($news_order_by, $news_limit);

        // menampilkan halaman view dashboard, dengan templates header, sidebar, topbar, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function get_member()
    {
        // menggunakan library pagination untuk pembatas jumlah data di satu halaman 
        $this->load->library("pagination");
        // inisialisasi untuk pagination, dengan jumlah 10 data per halaman
        $config = array();
		$config["base_url"] = base_url() . "admin/get_comment/";
		$config["total_rows"] = $this->Comment_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();

        // data anggota dengan parameter pagination
		$data['member'] = $this->Member_model->get($config["per_page"], $page);

        // memberi judul halaman anggota
        $data['title'] = 'Anggota';
        $data['sidebar'] = 'Dashboard';
        // data admin
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        // menampilkan halaman view anggota, dengan templates header, sidebar, topbar, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete_member($id)
	{
		// menghapus data anggota berdasarkan id anggota
		$deleted = $this->Member_model->delete($id);
		// jika sudah dihapus, maka tampilkan pesan
		if ($deleted) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show" role="alert">Anggota Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// mengarahkan langsung ke halaman daftar berita
			redirect('admin/Dashboard/get_member');
		}
	}
}