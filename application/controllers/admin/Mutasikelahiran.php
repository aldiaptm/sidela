<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mutasikelahiran extends CI_Controller
{
    public function index()
    {
        $data['title']= 'MutasiKelahiran';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/mutasikelahiran');
        $this->load->view('template/footer');

    }
}

