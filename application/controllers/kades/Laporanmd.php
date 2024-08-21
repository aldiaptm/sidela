<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporanmd extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'LaporanMd';

        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/laporanmd');
        $this->load->view('kades/template/footer');
    }
}
