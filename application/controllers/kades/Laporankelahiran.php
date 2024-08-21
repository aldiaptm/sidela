<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporankelahiran extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'LaporanKelahiran';

        $this->load->view('kades/template/header',  $data);
        $this->load->view('kades/template/sidebar',  $data);
        $this->load->view('kades/laporankelahiran');
        $this->load->view('kades/template/footer');
    }
}
