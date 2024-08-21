<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meninggaldunia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Meninggaldunia_model');
    }

    public function index()
    {
        $data['title'] = 'MENINGGAL DUNIA';
        $data['detail_meninggal'] = $this->Meninggaldunia_model->get_all_detail_meninggal();

        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/meninggaldunia', $data);
        $this->load->view('user/template/footer');
    }
}
