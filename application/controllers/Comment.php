<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
		$this->load->helper('sitata_helper');
		check_login();
    check_user();
	}

  public function new($idnews)
  {
    $this->load->model('Comment_model');
    date_default_timezone_set("Asia/Jakarta");
    $comment = [
    'id_berita' => $this->input->post('idberita'),
    'id' => $this->input->post('iduser'),
    'isi_komentar' => $this->input->post('isikomentar'),
    'waktu_dibuat' => Date('Y-m-d H:i:s'),
    'ip_address' => $this->input->ip_address(),
    ];
    
    $saved = $this->Comment_model->insert($comment);

    if ($saved) {
      $this->session->set_flashdata('message', 'Komentar Berhasil Dibuat');
      return redirect('Member/news_preview/'.$idnews);
    }
  }
}