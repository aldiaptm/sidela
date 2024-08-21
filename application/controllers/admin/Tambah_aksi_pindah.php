<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_aksi_pindah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('databerpindahtempat_model'); // Memuat model datameninggal_model
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Memanggil method _rules() untuk validasi form
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, redirect ke halaman tambah
            redirect('admin/tambahbt');
        } else {
            // Ambil nama dari input form
            $nama = $this->input->post('nama');

            // Cari id_penduduk berdasarkan nama
            $id_penduduk = $this->databerpindahtempat_model->get_id_penduduk_by_name($nama);

            if ($id_penduduk) {
                // Siapkan data untuk disimpan ke dalam tabel detail_meninggal
                $data = array(
                    'id_penduduk' => $id_penduduk,
                    'tanggal_pindah' => $this->input->post('tanggal_pindah'),
                    'alamat_asal' => $this->input->post('alamat_asal'),
                    'alamat_tujuan' => $this->input->post('alamat_tujuan'),
                    'alasan_pindah' => $this->input->post('alasan_pindah'),
                );

                // Insert data ke dalam tabel detail_meninggal menggunakan model
                $insert_status = $this->databerpindahtempat_model->insert_data($data);

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
            redirect('admin/daftarbt');
        }
    }

    private function _rules()
    {
        // Atur aturan validasi form
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_pindah', 'Tanggal Pindah', 'required');
        $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'required'); // Pastikan nama field sesuai
        $this->form_validation->set_rules('alamat_tujuan', 'Alamat Tujuan', 'required');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required');
    }
}
