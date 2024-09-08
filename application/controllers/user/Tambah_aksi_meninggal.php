<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_aksi_meninggal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datameninggal_model'); // Ganti pemanggilan model menjadi Datameninggal_model
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Memanggil method _rules() untuk validasi form
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, redirect ke halaman tambah
            redirect('user/tambahmd');
        } else {
            // Ambil nama dari input form
            $nik = $this->input->post('nik');

            // Cari id_penduduk berdasarkan nama menggunakan Datameninggal_model
            $id_penduduk = $this->Datameninggal_model->get_id_penduduk_by_nik($nik);

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

                // Insert data ke dalam tabel detail_meninggal menggunakan Datameninggal_model
                $insert_status = $this->Datameninggal_model->insert_data($data);

                if ($insert_status) {
                    // Jika insert berhasil, set flash data success
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>');
                } else {
                    // Jika insert gagal, set flash data error
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Data</div>');
                }
            } else {
                // Jika id_penduduk tidak ditemukan berdasarkan nama
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIK Bukan Penduduk Desa Galanggang</div>');
            }

            redirect('user/meninggaldunia');
        }
    }

    private function _rules()
    {
        // Atur aturan validasi form
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_kematian', 'Tanggal Kematian', 'required');
        $this->form_validation->set_rules('tempat_kematian', 'Tempat Kematian', 'required');
        $this->form_validation->set_rules('tempat_kelahiran', 'Tempat Kelahiran', 'required');
        $this->form_validation->set_rules('tanggal_kelahiran', 'Tanggal Kelahiran', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    }
}
