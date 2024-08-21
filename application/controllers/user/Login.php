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
            $this->load->view('user/template/auth_header', $data);
            $this->load->view('user/auth/login', $data);
            $this->load->view('user/template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Ubah query untuk mengambil data dari tabel 'user'
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    // Simpan data ke session menggunakan set_userdata()
                    $this->session->set_userdata('user_data', $data);

                    // Sesuaikan redirect berdasarkan role_id jika diperlukan
                    if ($user['role_id'] == 1) {
                         redirect('user/carapengajuan');
                    } else {
                        redirect('user/carapengajuan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('user/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Teraktivasi</div>');
                redirect('user/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
            redirect('user/login');
        }
    }
}
