<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahbt extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'TAMBAHBT';

        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/tambahbt', $data);
        $this->load->view('kades/template/footer');
    }
}
