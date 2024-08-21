<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapusmd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Meninggaldunia_model'); // Memuat model Datameninggal_model
    }

    public function hapus($id_penduduk)
    {
        // Hapus data hanya jika diakses dari admin
        if ($this->session->userdata('user_data')['role'] == 'admin') {
            // Panggil model untuk menghapus data berdasarkan ID penduduk
            $hapus_status = $this->Meninggaldunia_model->hapus_data_by_id_admin($id_penduduk);
        } else {
            // Panggil model untuk menghapus data berdasarkan ID penduduk
            $hapus_status = $this->Meninggaldunia_model->hapus_data_by_id_pengguna($id_penduduk);
        }

        if ($hapus_status) {
            // Jika berhasil menghapus
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            // Jika gagal menghapus
            $this->session->set_flashdata('message', 'Gagal menghapus data.');
        }

        // Redirect ke halaman tertentu setelah operasi selesai
        if ($this->session->userdata('user_data')['role'] == 'admin') {
            redirect('admin/daftarmd');
        } else {
            redirect('user/daftarmd'); // Ubah sesuai dengan rute halaman pengguna
        }
    }
}
?>
