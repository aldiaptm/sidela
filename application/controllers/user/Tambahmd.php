<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahmd extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TambahMd';

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/tambahmd', $data);
        $this->load->view('user/template/footer');
    }
}
