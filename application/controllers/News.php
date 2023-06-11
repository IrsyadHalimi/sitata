<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller 
{
  public function __construct()
	{
		parent::__construct();
		$this->load->helper('sitata_helper');
		$this->load->model('News_model');
		$this->load->library("pagination");
		check_login();
		check_admin();
	}

	public function index()
	{
		$config = array();
		$config["base_url"] = base_url() . "news";
		$config["total_rows"] = $this->News_model->get_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 2;
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['news'] = $this->News_model->get_news($config["per_page"], $page);

		$data['title'] = 'Dashboard';
		$data['sidebar'] = "Admin";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		// $data['news'] = $this->News_model->get_news();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/news_list', $data);
		$this->load->view('templates/footer');
	}

	public function new()
	{
		$data['title'] = 'Dashboard';
		$data['sidebar'] = "Admin";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['category'] = $this->News_model->get_category();

		$this->form_validation->set_rules('judul', 'Judul', 'required', ['required' => 'Judul harus diisi']);
		$this->form_validation->set_rules('isiberita', 'Isiberita', 'required', ['required' => 'Isi berita harus diisi']);
		$this->form_validation->set_rules('idkategori', 'Idkategori', 'required', ['required' => 'Kategori belum dipilih']);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/news_new_form', $data);
			$this->load->view('templates/footer');
		} else {
			if ($this->input->method() === 'post') {
				$news_picture = 
				$_FILES['gambar'];
				if ($news_picture = '') {
				} else {
					$config['upload_path'] = './assets/img/news';
					$config['allowed_types'] = 'jpg|png|gif';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar')) {
							$news_picture = 'newspaper.png';
					} else {
							$news_picture = $this->upload->data('file_name');
					}
				}
				date_default_timezone_set("Asia/Jakarta");
				$news = [
				'judul' => $this->input->post('judul'),
				'id_kategori' => $this->input->post('idkategori'),
				'gambar' => $news_picture,
				'isi_berita' => $this->input->post('isiberita'),
				'waktu_dibuat' => Date('Y-m-d H:i:s'),
				'dilihat' => 19000
				];
				
				$saved = $this->News_model->insert($news);

				if ($saved) {
					$this->session->set_flashdata('message', 'Berita Berhasil Dibuat');
					return redirect('News');
				}
			}
		}
	}

	function news_edit($id)
    {
			$data['title'] = 'Dashboard';
			$data['sidebar'] = "Admin";
			$data['user'] = $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();
			$news_id = array('id_berita' => $id);
			$data['news'] = $this->News_model->get_by_id($news_id);
			$data['category'] = $this->News_model->get_category();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/news_edit', $data);
			$this->load->view('templates/footer');
    }

    function news_update()
    {
			$newsid = $this->input->post('idberita');
			$title = $this->input->post('judul');
			$idcategory = $this->input->post('idkategori');
			$newsbody = $this->input->post('isiberita');

			$upload_image = $_FILES['gambar'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['upload_path'] = './assets/img/news/';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('gambar')) {
					$news_picture = $this->input->post('old_pict', TRUE);
					$data = array(
						'judul' => $title,
						'id_kategori' => $idcategory,
						'gambar' => $news_picture,
						'isi_berita' => $newsbody,
					);

					$where = array(
							'id_berita' => $newsid
					);

					$this->News_model->update($where, $data);
					redirect('News');
				} else {
					$file = $this->upload->data();
					unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
					$news_picture = $file['file_name'];
					$data = array(
						'judul' => $title,
						'id_kategori' => $idcategory,
						'gambar' => $news_picture,
						'isi_berita' => $newsbody,
					);

					$where = array(
							'id_berita' => $newsid
					);

					$this->News_model->update($where, $data);
					redirect('News');
				}
			}
    }

	public function preview($id_berita)
	{
		$data['title'] = 'Dashboard';
		$data['sidebar'] = "Admin";
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$where = array('id_berita' => $id_berita);
		$data['news_detail'] = $this->News_model->detail($where);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/news_detail', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id = null)
	{
		$deleted = $this->News_model->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Berita Berhasil dihapus');
			redirect('news');
		}
	}
}