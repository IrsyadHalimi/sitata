<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aut_Model extends CI_Model
{
    private $_tabel = 'admin';
    const SESSION_KEY = 'id'; 
    
    public function cek()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|max_length[225]'
            ]
        ];
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->$_tabel);
        $admin = $query->row();

        if (!$admin) {
            return FALSE;
        }

        if (!password_verify($password, $admin->password)) {
            return FALSE;
        }

        $this->session->set_userdata([self::SESSION_KEY => $admin->id]);
        $this->_update_last_login($admin->id);

        return $this->session->has_userdata(self::SESSION_KEY);
    }

    public function current_user()
    {
        if(!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_tabel, ['id' => $user_id]);
        return $query->row();
    }

    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
}