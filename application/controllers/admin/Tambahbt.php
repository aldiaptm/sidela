<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahbt extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TAMBAHBT';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tambahbt', $data);
        $this->load->view('template/footer');
    }
}
