<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasibt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Databerpindahtempat_model');
    }

    public function index()
    {
        $data['detail_pindah_disetujui'] = $this->Databerpindahtempat_model->get_detail_pindah_by_status('disetujui');

        // Memuat view untuk menampilkan data
        $data['title'] = 'DATA BERPINDAH TEMPAT';
        $this->load->view('kades/template/header', $data);
        $this->load->view('kades/template/sidebar', $data);
        $this->load->view('kades/mutasibt', $data);
        $this->load->view('kades/template/footer');
    }
}
