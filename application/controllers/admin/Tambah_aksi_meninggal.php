<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_aksi_meninggal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('datameninggal_model'); // Memuat model datameninggal_model
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Memanggil method _rules() untuk validasi form
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, redirect ke halaman tambah
            redirect('admin/tambahmd');
        } else {
            // Ambil nama dari input form
            $nama = $this->input->post('nama');

            // Cari id_penduduk berdasarkan nama
            $id_penduduk = $this->datameninggal_model->get_id_penduduk_by_name($nama);

            if ($id_penduduk) {
                // Siapkan data untuk disimpan ke dalam tabel detail_meninggal
                $data = array(
                    'id_penduduk' => $id_penduduk,
                    'tanggal_kematian' => $this->input->post('tanggal_kematian'),
                    'tempat_kematian' => $this->input->post('tempat_kematian'),
                    'tempat_kelahiran' => $this->input->post('tempat_kelahiran'),
                    'tanggal_kelahiran' => $this->input->post('tanggal_kelahiran'),
                    'keterangan' => $this->input->post('keterangan')
                );

                // Insert data ke dalam tabel detail_meninggal menggunakan model
                $insert_status = $this->datameninggal_model->insert_data($data);

                if ($insert_status) {
                    // Jika insert berhasil, set flash data success
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
                } else {
                    // Jika insert gagal, set flash data error
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>');
                }
            } else {
                // Jika id_penduduk tidak ditemukan berdasarkan nama
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nama tidak ditemukan di database</div>');
            }

            // Redirect ke halaman admin/mutasimd setelah selesai
            redirect('admin/daftarmd');
        }
    }

    private function _rules()
    {
        // Atur aturan validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'required');
        $this->form_validation->set_rules('tempat_kematian', 'Tempat Kematian', 'required');
        $this->form_validation->set_rules('tempat_kelahiran', 'Tempat Kelahiran', 'required');
        $this->form_validation->set_rules('tanggal_kelahiran', 'Tanggal Kelahiran', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }
}
