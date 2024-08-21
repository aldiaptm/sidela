<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapusberpindahtempat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('databerpindahtempat_model'); // Memuat model yang benar
    }

    public function hapus($id_penduduk)
    {
        if (!$this->session->userdata('admin_data')) {
            redirect('admin/mutasibt');
        }

        // Panggil model untuk menghapus data dari tabel 'detail_pindah' berdasarkan ID penduduk
        $hapus_status = $this->databerpindahtempat_model->hapus_data($id_penduduk, 'detail_pindah');

        if ($hapus_status) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('message', 'Gagal menghapus data.');
        }

        // Redirect kembali ke halaman daftar setelah operasi penghapusan selesai
        redirect('admin/mutasibt');
    }
}
