<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $this->load->view('admin/home');
    }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */