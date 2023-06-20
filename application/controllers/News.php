<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
		// memanggil helper
		$this->load->helper('sitata_helper');
		// memanggil model berita
		$this->load->model('News_model');
		// memanggil library pagination
		$this->load->library("pagination");
		// memeriksa jika admin sudah login
		check_login();
		check_admin();
	}

	public function index()
	{
		// konfigurasi untuk pagination halaman daftar data berita, dengan 10 data per halaman
		$config = array();
		$config["base_url"] = base_url() . "news";
		$config["total_rows"] = $this->News_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();

		// data berita dengan parameter pagination
		$data['news'] = $this->News_model->get_news($config["per_page"], $page);

		// memberi judul halaman daftar berita
		$data['title'] = 'Daftar Berita';
		$data['sidebar'] = "Admin";
		// data user
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		// menampilkan halaman view daftar data berita, dengan templates header, sidebar, topbar, dan footer
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/news_list', $data);
		$this->load->view('templates/footer', $data);
	}

	// fungsi untuk menambahkan berita baru
	public function new()
	{
		// memberi judul halaman tambah berita
		$data['title'] = 'Tambah Berita';
		$data['sidebar'] = "Admin";
		// data user
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// data kategori berita
		$data['category'] = $this->News_model->get_category();

		// membuat validasi data berita
		$this->form_validation->set_rules('judul', 'Judul', 'required', ['required' => 'Judul harus diisi']);
		$this->form_validation->set_rules('isiberita', 'Isiberita', 'required', ['required' => 'Isi berita harus diisi']);
		$this->form_validation->set_rules('idkategori', 'Idkategori', 'required', ['required' => 'Kategori belum dipilih']);
		// jika validasi salah, maka akan tetap pada halaman yang sama dengan pemberitahuan kesalahan input
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/news_new_form', $data);
			$this->load->view('templates/footer', $data);
		} 
		// jika validasi benar dan input method sama dengan post maka data berita akan dibuat
		else {
			if ($this->input->method() === 'post') {
				// konfigurasi untuk mengupload gambar berita
				$news_picture = 
				$_FILES['gambar'];
				if ($news_picture = '') {
				} else {
					$config['upload_path'] = './assets/img/news';
					$config['allowed_types'] = 'jpg|png|gif';
					
					// memanggil library upload
					$this->load->library('upload', $config);

					// jika gambar tidak dipilih maka gambar newspaper akan menjadi gambar pengganti
					if (!$this->upload->do_upload('gambar')) {
							$news_picture = 'newspaper.png';
					} 
					// jika gambar dipilih maka akan diupload berdasarkan nama file gambar tersebut
					else {
							$news_picture = $this->upload->data('file_name');
					}
				}
				// konfigurasi waktu lokal
				date_default_timezone_set("Asia/Jakarta");
				// variabel penampung isi berita
				$newsbody = $this->input->post('isiberita');
				// menggunakan fungsi php nl2br untuk mengkonversi garis baru 
				$newsbody = nl2br($newsbody);
				// menampung data berita pada arrray
				$news = [
				'judul' => $this->input->post('judul'),
				'id_kategori' => $this->input->post('idkategori'),
				'gambar' => $news_picture,
				'isi_berita' => $newsbody,
				'waktu_dibuat' => Date('Y-m-d H:i:s'),
				'dilihat' => 0
				];
				
				// menyimpan data berita
				$saved = $this->News_model->insert($news);
				// jika sudah tersimpan, maka tampilkan pesan
				if ($saved) {
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show" role="alert">Berita Berhasil dibuat<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					return redirect('News');
				}
			}
		}
	}

	// fungsi untuk mengedit
	function news_edit($id)
    {
			// memberi judul halaman
			$data['title'] = 'Edit Berita';
			$data['sidebar'] = "Admin";
			// data user
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
			// mengambil id berita dari parameter fungsi
			$news_id = array('id_berita' => $id);
			// data berita berdasarkan id berita
			$data['news'] = $this->News_model->get_by_id($news_id);
			// data kategori berdasarkan id berita
			$data['category'] = $this->News_model->get_category();

			// menampilkan halaman view edit data berita, dengan templates header, sidebar, topbar, dan footer
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/news_edit', $data);
			$this->load->view('templates/footer', $data);
    }

		// fungsi mengubah data berita yang sudah di edit
    function news_update()
    {
			// menampung data berita yang sudah di edit
			$newsid = $this->input->post('idberita');
			$title = $this->input->post('judul');
			$idcategory = $this->input->post('idkategori');
			$newsbody = $this->input->post('isiberita');

			$upload_image = $_FILES['gambar'];

			// jika data gambar tersedia maka dikonfigurasi gambar
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['upload_path'] = './assets/img/news/';

				// memanggil library upload
				$this->load->library('upload', $config);

				// jika gambar tidak diubah maka gambar sebelumnya akan tetap digunakan
				if (!$this->upload->do_upload('gambar')) {
					$news_picture = $this->input->post('old_pict', TRUE);
					// menampung data berita kedalam array
					$data = array(
						'judul' => $title,
						'id_kategori' => $idcategory,
						'gambar' => $news_picture,
						'isi_berita' => $newsbody,
					);

					// menampung id berita kedalam array
					$where = array(
							'id_berita' => $newsid
					);

					// mengubah data berita dengan argumen id berita dan data berita yang telah diedit
					$this->News_model->update($where, $data);
					// mengarahkan langsung menuju halaman daftar berita
					redirect('News');
				} 
				// jika gambar diubah maka akan mengganti gambar lama dan ditambahkan gambar yang baru 
				else {
					// mengupload data
					$file = $this->upload->data();
					// mengganti gambar lama
					unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
					// gambar baru
					$news_picture = $file['file_name'];
					// menampung data berita yang sudah diedit kedalam array
					$data = array(
						'judul' => $title,
						'id_kategori' => $idcategory,
						'gambar' => $news_picture,
						'isi_berita' => $newsbody,
					);

					// data id berita
					$where = array(
							'id_berita' => $newsid
					);

					// mengubah data berita dengan argumen id berita dan data berita yang sudah diedit
					$updated = $this->News_model->update($where, $data);
					// jika sudah diubah, maka tampilkan pesan
					if ($updated) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						Berita berhasil diubah</div>');
						// mengarahkan langsung ke halaman daftar berita
						return redirect('News');
					}
				}
			}
    }

	// fungsi pratinjau detail berita
	public function preview($idnews)
	{
		// memberi judul halaman
		$data['title'] = 'Detail Berita';
		$data['sidebar'] = "Admin";
		// data user
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// id berita
		$where = array('id_berita' => $idnews);
		// data berita berdasarkan id berita
		$data['news_detail'] = $this->News_model->detail($where);
		
		// menampilkan halaman view detail data berita, dengan templates header, sidebar, topbar, dan footer
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/news_detail', $data);
		$this->load->view('templates/footer', $data);
	}

	// fungsi hapus berita
	public function delete($id)
	{
		// menghapus data berita berdasarkan id berita
		$deleted = $this->News_model->delete($id);
		// jika sudah dihapus, maka tampilkan pesan
		if ($deleted) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show" role="alert">Berita Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			// mengarahkan langsung ke halaman daftar berita
			redirect('news');
		}
	}
}