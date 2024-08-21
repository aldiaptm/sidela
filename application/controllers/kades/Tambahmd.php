<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahmd extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TambahMd';

        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/tambahmd', $data);
        $this->load->view('kades/template/footer');
    }
}
