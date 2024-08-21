<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datauser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datauser_model');
    }

    public function index()
    {
        $data['title'] = 'DATA USER';
        $data['user'] = $this->Datauser_model->get_data(); // Mengambil data dari model
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/datauser', $data); // Menambahkan $data ke view 'admin/datapenduduk'
        $this->load->view('template/footer');
    }
}
