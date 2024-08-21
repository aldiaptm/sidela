<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('admin/home');
        }
        $this->load->helper('form');
        $this->load->view('admin/login');
    }

    public function cek()
    {
        $this->load->library('form_validation');
        $this->load->model('admin_model');

        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => "Isi dulu %s",));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => "Isi dulu %s",));

        if ($this->form_validation->run()) {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $query = $this->admin_model->get_by_username($username);
            if ($query->num_rows() > 0) {
                $result = $query->row_array();
                if (password_verify($password, $result['password'])) {
                    $session_data = array(
                        'id_admin' => $result['id_admin'],
                        'nama_lengkap' => $result['nama_lengkap'],
                        'logged_in' => TRUE,
                    );
                    $this->session->set_userdata($session_data);
                    redirect('admin/home');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau Password salah</div>');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username atau Password salah</div>');
                redirect('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */