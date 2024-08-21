<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporankelahiran extends CI_Controller
{
    public function index()
    { 
        $data['title']= 'LaporanKelahiran';

        $this->load->view('template/header',  $data);
        $this->load->view('template/sidebar',  $data);
        $this->load->view('admin/laporankelahiran');
        $this->load->view('template/footer');

    }
}

