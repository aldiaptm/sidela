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
            $this->load->view('admin/auth/login', $data);
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) {
            if ($admin['is_active'] == 1) {
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'email' => $admin['email'],
                        'role_id' => $admin['role_id']
                    ];

                    // Simpan data ke session menggunakan set_userdata()
                    $this->session->set_userdata('admin_data', $data);

                    if ($admin['role_id'] == 1) {
                        redirect('admin/dashboard');
                    } else {
                        redirect('admin/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Teraktivasi</div>');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
            redirect('admin/login');
        }
        // Set session 'role' berdasarkan role_id yang diperoleh dari hasil query
        if ($admin['role_id'] == 1) {
            $role = 'admin';
        } else {
            $role = 'user';
        }

        // Simpan 'role' ke dalam session
        $this->session->set_userdata('role', $role);
    }
}