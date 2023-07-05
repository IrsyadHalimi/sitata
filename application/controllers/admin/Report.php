<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
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
      // mengambil data berita
      $data['news_report'] = $this->News_model->get_report();
      // mengambil data komentar
      $data['comment_report'] = $this->Comment_model->get_report();
      // konfigurasi waktu lokal
      date_default_timezone_set("Asia/Jakarta");
      $date = Date('Y-m-d');
      // memanggil library pdf
      $this->load->library('Pdf');
      // konfigurasi ukuran kertas cetak
      $this->pdf->setPaper('A4', 'potrait');
      // memberi nama file untuk hasil download
      $this->pdf->filename = "laporan-sitata {$date}.pdf";
      // menampilkan halaman cetak pdf
      $this->pdf->load_view('admin/report_pdf', $data);
    }

}