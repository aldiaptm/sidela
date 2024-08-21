<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editmeninggal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user/Meninggaldunia_model');
    }

    public function index() {
        $data['title']= ' EDIT DATA MD';
        $data['detail_meninggal'] = $this->Meninggaldunia_model->get_all_detail_meninggal();
        
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/editmd', $data); 
        $this->load->view('user/template/footer');
    }

}
