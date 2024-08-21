<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasimd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datameninggal_model');
    }

    public function index()
    {
        // Panggil fungsi get_all_detail_meninggal dari model
        // $data['detail_meninggal'] = $this->Datameninggal_model->get_all_detail_meninggal();
        $data['detail_meninggal_disetujui'] = $this->Datameninggal_model->get_detail_meninggal_by_status('disetujui');

        // Memuat view untuk menampilkan data
        $data['title'] = 'DATA MENINGGAL DUNIA';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/mutasimd', $data);
        $this->load->view('template/footer');
    }
}
?>