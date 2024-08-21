<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporanmd extends CI_Controller
{
    public function index()
    {
        $data['title']= 'LaporanMd';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/laporanmd');
        $this->load->view('template/footer');

    }
}

