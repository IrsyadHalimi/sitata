<?php defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
  private $_tabel = "berita";

  public $id_berita;
  public $judul;
  public $id_kategori;
  public $gambar = "default.jpg";
  public $isi_berita;
  public $waktu_dibuat;
  public $waktu_diubah;
  public $dilihat;

  public function rules()
  {
    return [
      [
        'field' => 'judul',
        'label' => 'Judul',
        'rules' => 'required'
      ],
      [
        'field' => 'isi_berita',
        'label' => 'Isi Berita',
        'rules' => 'required'
      ],
    ];
  }

  public function ambil()
  {
    return $this->db->get($this->_tabel)->result();
  }

  public function ambil_denganId($id)
  {
    return $this->db->get_where($this->_tabel, ["id_berita" => $id])->row();
  }

  public function simpan()
  {
    $post = $this->input->post();
    $this->judul = $post["judul"];
    $this->gambar = $post["gambar"];
    $this->isi_berita = $post["isi_berita"];
    $this->waktu_dibuat = $post["waktu_dibuat"];
    $this->waktu_diubah = $post["waktu_diubah"];
    $this->dilihat = $post["dilihat"];
    return $this->db->insert($this->_tabel, $this);
  }
}
