<?php

function check_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}

function check_admin()
{
    $ci = get_instance();

    if ($ci->session->userdata['role_id'] == 1) {
    } else {
        show_404();
    }
}

function check_user()
{
    $ci = get_instance();

    if ($ci->session->userdata['role_id'] == 2) {
    } else {
        show_404();
    }
}
