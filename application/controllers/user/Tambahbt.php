<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahbt extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tambahbt';

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/tambahbt', $data);
        $this->load->view('user/template/footer');
    }
}
