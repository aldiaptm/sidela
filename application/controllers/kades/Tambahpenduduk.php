<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahpenduduk extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TAMBAH PENDUDUK';

        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/tambahpenduduk', $data);
        $this->load->view('kades/template/footer');
    }
}
