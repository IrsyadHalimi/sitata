<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aut_Model');
		redirect('auth/login');
	}

	// ... ada kode lain di sini ...
}