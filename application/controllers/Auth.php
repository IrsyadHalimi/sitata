<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // menggunakan library form validation
        $this->load->library('form_validation');
    }

    public function index()
    {
        // membuat validasi input email dan password
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email harus diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus diisi']);
        // jika validasi salah, maka dikembalikan ke halaman login lagi, jika benar maka akan mengeksekusi fungsi login
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    
    // fungsi yang akan di eksekusi jika validasi login benar
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        // jika user ada
        if($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('member/member');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Maaf kata sandi salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf email ini belum di buat!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf email ini tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    // fungsi registrasi untuk membuat akun
    public function registration()
    {
        // membuat validasi input
        $this->form_validation->set_rules('name', 'Name', 'required|trim', ['required' => 'Nama Lengkap harus diisi']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email ini sudah terdaftar!', 'required' => 'Email harus diisi']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password Tidak Sama', 'min_length' => 'Password Terlalu Pendek', 'required' => 'Password harus diisi']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // jika validasi salah maka akan tetap berada di halaman registrasi, jika benar maka data akan di masukkan kedalam database user
        if ($this->form_validation->run() == false) {
            $data['title'] = "Registration";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');      
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun Sudah Dibuat. Silahkan Login!</div>');
            redirect('auth');
        }
    }

    // fungsi logout untuk keluar akun, dan mengakhiri sesi
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat anda berhasil logout!</div>');
        redirect('auth');
    }
}