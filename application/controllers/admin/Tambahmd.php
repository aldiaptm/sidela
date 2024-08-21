<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahmd extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TambahMd';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tambahmd', $data);
        $this->load->view('template/footer');
    }
}
