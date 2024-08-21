<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berpindahtempat extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user/Berpindahtempat_model');
    }

    public function index() {
        $data['title']= 'MENINGGAL DUNIA';
        $data['detail_pindah'] = $this->Berpindahtempat_model->get_all_detail_pindah();
        
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/berpindahtempat', $data); 
        $this->load->view('user/template/footer');
    }

}
