<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_category extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    // memanggil helper
    $this->load->helper('sitata');
    // memanggil model kategori
    $this->load->model('Category_model');
    check_login();
    check_admin();
  }

  public function index()
  {
    // memberi judul halaman kategori
    $data['title'] = 'Kategori Berita';
    $data['sidebar'] = 'Dashboard';
    // data user
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    // data kategori
    $data['category'] = $this->Category_model->get();

    // menampilkan halaman view kategori, dengan templates header, sidebar, topbar, dan footer
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/category', $data);
    $this->load->view('templates/footer', $data);
  }

  // fungsi membuat kategori berita
  public function new()
  {
    $data['title'] = 'Kategori Berita';
    $data['sidebar'] = 'Dashboard';
    // data user
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    // data kategori
    $data['category'] = $this->Category_model->get();

    // membuat validasi kategori
    $this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Kategori harus diisi']);
		// jika validasi salah, maka akan tetap berada dihalaman yang sama
    if ($this->form_validation->run() == false) 
    {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/category_new_form', $data);
			$this->load->view('templates/footer', $data);
		} 
    // jika validasi benar dan method nya adalah post, maka data akan dimasukan ke database
    else {
			if ($this->input->method() === 'post') 
      {
        // menampung data kategori
				$category = [
          'kategori' => $this->input->post('kategori')
				];
        
        $saved = $this->Category_model->insert($category);

        // jika data sudah disimpan maka muncul pemberitahuan berhasil dibuat
				if ($saved) {
					$this->session->set_flashdata('message', 'Kategori Berhasil Dibuat');
					return redirect('admin/News_category');
				}
			}
		}
  }

  // fungsi untuk mengedit kategori
  function category_edit($id)
  {
    // memberi judul halaman edit kategori
    $data['title'] = 'Edit Kategori';
    $data['sidebar'] = "Admin";
    // data user
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();$category_id = array('id_kategori' => $id);
    // data kategori berdasarkan kategori yang dipilih
    $data['category'] = $this->Category_model->get_by_id($category_id);
    
    // menampilkan halaman view kategori edit, dengan templates header, sidebar, topbar, dan footer
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/category_edit', $data);
    $this->load->view('templates/footer', $data);
  }

  // fungsi untuk menyimpan perubahan kategori
  function category_update()
  {
    // menampung data kategori yang diubah
    $categoryid = $this->input->post('idkategori');
    $category = $this->input->post('kategori');
    $data = array(
      'kategori' => $category
    );
    $where = array(
        'id_kategori' => $categoryid
    );

    // merubah data kategori berdasarkan id
    $this->Category_model->update($where, $data);
    // mengarahkan kembali ke halaman kategori berita
    redirect('admin/News_category');
  }

  // fungsi hapus kategori berdasarkan kategori yang dipilih
  public function delete($id)
	{
    // menghapus kategori
		$deleted = $this->Category_model->delete_category($id);
		// jika sudah dihapus maka akan menampilkan pemberitahuan kategori berhasil dihapus 
    if ($deleted) {
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable fade show" role="alert">Kategori Berhasil dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      // mengarahkan kembali ke halaman kategori berita
			redirect('admin/News_category');
		}
	}
}