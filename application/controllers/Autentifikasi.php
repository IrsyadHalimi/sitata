<?php

class Autentifikasi extends CI_Controller
{
  public function index() 
  {
    show_404();
  }

  public function login()
  {
    $this->load->model('Aut_Model');
    $this->load->library('form_validation');

    $cek = $this->Aut_Model->cek();
    $this->form_validation->set_rules($cek);

    if ($this->form_validation->run() == FALSE) {
      return $this->load->view('aut/login');
    }

    $email = $this->input->post('email');
    $password = $this->input->post('password');

    if ($this->Aut_Model->login($email, $password))
    {
      redirect('admin/dashboard');
    }
    else
    {
      $this->session->set_flashdata('message_login_error', 'Login Gagal, Pastikan');
    }
    $this->load->view('aut/login');
  }

  public function logout()
  {
    $this->load->model('Aut_Model');
    $this->Aut_Model->logout();
    redirect(site_url());
  }
}