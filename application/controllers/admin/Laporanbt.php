<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporanbt extends CI_Controller
{
    public function index()
    {
        $data['title']= 'Laporanbt';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data );
        $this->load->view('admin/laporanbt');
        $this->load->view('template/footer');

    }
}

