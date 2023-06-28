<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
		// memanggil helper
		$this->load->helper('sitata_helper');
		// memanggil model berita
		$this->load->model('News_model');
	}

	public function report_print($start_date, $end_date)
	{
		// konversi format tanggal
		$start_date = date('Y-m-d', strtotime($start_date));
		$end_date = date('Y-m-d', strtotime($end_date));
		// mengambil data berita berdasarkan rentang waktu
		$data['news_report'] = $this->News_model->get_news_by_date_range($start_date, $end_date);
		// menampilkan halaman view cetak laporan
		$html = $this->load->view('report.php', $data, true);
		// membuat judul laporan
		$this->pdf->set_title('Laporan Berita');
		// membuat file PDF
		$this->pdf->load_html($html);
		$this->pdf->render();
		$this->pdf->stream('laporan_berita.pdf', array('Attachment' => 0));
	}
}