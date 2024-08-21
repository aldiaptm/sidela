<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'DASHBOARD';

        // Load model
        $this->load->model('Data_model'); // Pastikan nama model sesuai

        // Ambil data
        $data['jumlah_penduduk'] = $this->Data_model->count_penduduk();
        $data['jumlah_meninggal'] = $this->Data_model->count_meninggal();
        $data['jumlah_pindah'] = $this->Data_model->count_pindah();

        // Load views
        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/dashboard',);
        $this->load->view('kades/template/footer');
    }
}
