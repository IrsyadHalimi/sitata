<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // memanggil helper
        $this->load->helper('sitata_helper');
        // memanggil model berita
        $this->load->model('News_model');
        check_login();
        check_user();
        // memanggil library pagination
        $this->load->library("pagination");
    }

    public function index()
    {
        // memberi judul halaman profil anggota
        $data['title'] = 'Beranda';
        $data['sidebar'] = 'Beranda';
        // data user
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $news_order_by = 'dilihat';
        $news_limit = 4;
        $data["popular_news"] = $this->News_model->get_popular_news($news_order_by, $news_limit);
        $news_order_by = 'waktu_dibuat';
        $news_limit = 4;
        $data["recent_news"] = $this->News_model->get_recent_news($news_order_by, $news_limit);
        
        // menampilkan halaman view profil, dengan templates header, sidebar, topbar, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function profile()
    {
        // memberi judul halaman profil anggota
        $data['title'] = 'Profil Saya';
        $data['sidebar'] = 'Beranda';
        // data user
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        // menampilkan halaman view profil, dengan templates header, sidebar, topbar, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/profile_page', $data);
        $this->load->view('templates/footer', $data);
    }

    // fungsi untuk menampilkan daftar berita
    public function news()
    {
        // inisialisasi untuk pagination, dengan 8 data per halaman
        $config = array();
		$config["base_url"] = base_url() . "member/news/";
		$config["total_rows"] = $this->News_model->get_count();
		$config["per_page"] = 8;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();

        // mengambil data berita
		$data['news'] = $this->News_model->get_news($config["per_page"], $page);
        // memberi judul halaman beranda
        $data['title'] = 'Berita';
        $data['sidebar'] = 'Beranda';
        // data user
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        // menampilkan halaman view berita, dengan templates header, sidebar, topbar, dan footer
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('member/news_page', $data);
        $this->load->view('templates/footer', $data);
    }

    // fungsi untuk menampilkan detail berita yang dipilih
    public function news_preview($idnews)
	{
        // memberi judul halaman detail berita
		$data['title'] = 'Detail Berita';
		$data['sidebar'] = "Detail Berita";
        // data user
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// mengambil data berita sesuai id / sesuai yang dipilih
        $where = array('id_berita' => $idnews);
		$data['news_detail'] = $this->News_model->detail($where);
        // memanggil model komentar
        $this->load->model('Comment_model');
        // memanggil data komentar
		$data['komentar'] = $this->Comment_model->get_comment($idnews);
        
        // menampilkan halaman view detail berita yang dipilih, dengan templates header, sidebar, topbar, dan footer
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('member/news_detail_page', $data);
		$this->load->view('templates/footer', $data);
	}

    // fungsi untuk menambahkan jumlah dilihat pada berita yang di pilih, lalu melanjutkan ke fungsi preview/detail berita diatas
    public function news_increment($idnews)
    {
        $this->News_model->increment_view($idnews);
        redirect('Member/news_preview/'. $idnews);
    }

    // fungsi new untuk membuat komentar, dan memasukkan data komentar ke database
    public function new_comment($idnews)
    {
        // memanggil model komentar
        $this->load->model('Comment_model');
        // merubah waktu menjadi lokal
        date_default_timezone_set("Asia/Jakarta");
        // menampung data komentar yang di masukkan
        $comment = [
        'id_berita' => $this->input->post('idberita'),
        'id' => $this->input->post('iduser'),
        'isi_komentar' => $this->input->post('isikomentar'),
        'waktu_dibuat_komentar' => Date('Y-m-d H:i:s'),
        'ip_address' => $this->input->ip_address(),
        ];
        
        $saved = $this->Comment_model->insert($comment);
        
        // jika data sudah dimasukkan maka muncul pemberitahuan bahwa komentar berhasil dibuat
        if ($saved) {
        $this->session->set_flashdata('message', 'Komentar Berhasil Dibuat');
        return redirect('Member/news_preview/'.$idnews);
        }
    }
}