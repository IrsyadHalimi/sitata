<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_category extends CI_Controller 
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('sitata');
    $this->load->model('Category_model');
    check_login();
    check_admin();
  }

  public function index()
  {
    $data['title'] = 'Kategori Berita';
    $data['sidebar'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['category'] = $this->Category_model->get();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/category', $data);
    $this->load->view('templates/footer', $data);
  }

  public function new()
  {
    $data['title'] = 'Kategori Berita';
    $data['sidebar'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['category'] = $this->Category_model->get();

    $this->form_validation->set_rules('kategori', 'Kategori', 'required', ['required' => 'Kategori harus diisi']);
		if ($this->form_validation->run() == false) 
    {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/category_new_form', $data);
			$this->load->view('templates/footer', $data);
		} else {
			if ($this->input->method() === 'post') 
      {
				$category = [
          'kategori' => $this->input->post('kategori')
				];
        
        $saved = $this->Category_model->insert($category);

				if ($saved) {
					$this->session->set_flashdata('message', 'Kategori Berhasil Dibuat');
					return redirect('News_category');
				}
			}
		}
  }

  function category_edit($id)
  {
    $data['title'] = 'Dashboard';
    $data['sidebar'] = "Admin";
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();$category_id = array('id_kategori' => $id);
    $data['category'] = $this->Category_model->get_by_id($category_id);
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/category_edit', $data);
    $this->load->view('templates/footer', $data);
  }

  function category_update()
  {
    $categoryid = $this->input->post('idkategori');
    $category = $this->input->post('kategori');
    $data = array(
      'kategori' => $category
    );
    $where = array(
        'id_kategori' => $categoryid
    );

    $this->Category_model->update($where, $data);
    redirect('News_category');
  }

  public function delete($id)
	{
		$deleted = $this->Category_model->delete_category($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Berita Berhasil dihapus');
			redirect('News_category');
		}
	}
}