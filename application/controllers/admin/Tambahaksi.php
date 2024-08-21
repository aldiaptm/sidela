<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambahaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('datapenduduk_model'); // Memuat model datapenduduk_model
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->_rules(); // Memanggil method _rules() untuk validasi form

        if ($this->form_validation->run() == FALSE) {
            $this->tambah(); // Panggil method tambah() jika validasi gagal
        } else {
            // Proses data hanya dilakukan jika validasi form berhasil

            // Data untuk disimpan ke dalam basis data
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'rw' => $this->input->post('rw'),
                'status_mutasi' => $this->input->post('status_mutasi')
            );

            // Lakukan proses tambah data ke dalam basis data
            $insert_status = $this->datapenduduk_model->insert_data($data);

            if ($insert_status) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>');
            }

            redirect('admin/datapenduduk');
        }
    }



    public function _rules()
    {
        // Atur aturan validasi di sini
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required'); // Aturan validasi untuk RW
        $this->form_validation->set_rules('status_mutasi', 'Status Penduduk', 'required');
        
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Penduduk';
        $data['rw'] = $this->datapenduduk_model->getRW(); // Mengambil data RW untuk ditampilkan di dropdown

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/tambahpenduduk', $data);
        $this->load->view('template/footer');
    }
}
