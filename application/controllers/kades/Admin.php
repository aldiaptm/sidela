<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin  extends CI_Controller
{
    public function index()
    {
        // Memeriksa apakah pengguna telah masuk atau belum
        if ($this->session->userdata('email')) {
            // Mengambil data pengguna dari database berdasarkan email sesi pengguna
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'dashboard';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('template/footer');

    }
}
}