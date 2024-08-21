
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('keluhan_model'); // Memuat model datapenduduk_model
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
                'nama_pengisi' => $this->input->post('nama_pengisi'),
                'alamat_pengisi' => $this->input->post('alamat_pengisi'),
                'telpon_pengisi' => $this->input->post('telpon_pengisi'),
                'pesan' => $this->input->post('pesan')
            );

            // Lakukan proses tambah data ke dalam basis data
            $insert_status = $this->keluhan_model->insert_keluhan($data);

            if ($insert_status) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>');
            }

            redirect('');
        }
    }



    public function _rules()
    {
        // Atur aturan validasi di sini
        $this->form_validation->set_rules('nama_pengisi', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_pengisi', 'Alamat', 'required');
        $this->form_validation->set_rules('telpon_pengisi', 'Telepon', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Penduduk';
        $data['pesan'] = $this->keluhan_model->getPESAN(); // Mengambil data RW untuk ditampilkan di dropdown
        $this->load->view('index.php', $data);
    }
}
