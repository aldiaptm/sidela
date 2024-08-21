<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model'); // Memuat model User_model
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar Akun';
            $this->load->view('template/auth_header', $data);
            $this->load->view('admin/auth/registration', $data);
            // Hapus load->view('template/auth_footer', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT), // Ganti 'password' menjadi 'password1'
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            // Pindahkan redirect sebelum insert ke database
            $this->User_model->insert($data); // Menggunakan method insert() dari model User_model
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat Akun Anda Berhasil Dibuat. Silahkan Login!
          </div>');

            redirect('admin/login');
        }
    }
}
