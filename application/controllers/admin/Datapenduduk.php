<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapenduduk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Datapenduduk_model');
    }

    public function index() {
        $data['title']= 'DATA PENDUDUK';
        $data['penduduk'] = $this->Datapenduduk_model->get_data(); // Mengambil data dari model
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/datapenduduk', $data); // Menambahkan $data ke view 'admin/datapenduduk'
        $this->load->view('template/footer');
    }

}
