<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Carapengajuan extends CI_Controller
{
    public function index()
    {
        $data['title']= 'CARA PENGAJUAN'; 
        
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/carapengajuan');
        $this->load->view('user/template/footer');

    }
}

