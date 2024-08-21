<?php
defined('BASEPATH') or exit('No direct script access allowed');

    class Tambahpenduduk extends CI_Controller
    {
        public function index()
    {
        $data['title'] = 'TAMBAH PENDUDUK';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tambahpenduduk', $data);
        $this->load->view('template/footer');
    }
}

