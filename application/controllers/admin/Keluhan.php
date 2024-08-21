<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keluhan_model');
    }

    public function index()
    {
        $data['title'] = 'DATA KELUHAN';
        $data['keluhan'] = $this->Keluhan_model->get_keluhan();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/keluhan_view', $data);
        $this->load->view('template/footer');
    }
}
