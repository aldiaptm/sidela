<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'LOGIN';
            $this->load->view('template/auth_header', $data);
            $this->load->view('kades/auth/login', $data);
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $kades = $this->db->get_where('kades', ['email' => $email])->row_array();

        if ($kades) {
            if ($kades['is_active'] == 1) {
                if (password_verify($password, $kades['password'])) {
                    $data = [
                        'email' => $kades['email'],
                        'role_id' => $kades['role_id']
                    ];

                    // Simpan data ke session menggunakan set_userdata()
                    $this->session->set_userdata('kades_data', $data);

                    if ($kades['role_id'] == 1) {
                        redirect('kades/dashboard');
                    } else {
                        redirect('kades/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('kades/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Teraktivasi</div>');
                redirect('kades/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
            redirect('kades/login');
        }
        // Set session 'role' berdasarkan role_id yang diperoleh dari hasil query
        if ($kades['role_id'] == 1) {
            $role = 'kades';
        } else {
            $role = 'user';
        }

        // Simpan 'role' ke dalam session
        $this->session->set_userdata('role', $role);
    }
}
