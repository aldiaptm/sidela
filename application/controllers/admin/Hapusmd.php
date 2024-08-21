<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapusmd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('datameninggal_model'); // Memuat model Datameninggal_model
    }

    public function hapus($id_penduduk)
    {
        // Verifikasi apakah pengguna adalah admin
        if (!$this->session->userdata('admin_data')) {
            // Jika bukan admin, arahkan kembali ke halaman sebelumnya atau lakukan tindakan lain
            redirect('admin/daftarmd');
        }

        // Panggil model untuk menghapus data dari tabel 'daftarmd' berdasarkan ID penduduk
        $hapus_status_daftarmd = $this->datameninggal_model->hapus_data_daftarmd($id_penduduk);

        if ($hapus_status_daftarmd) {
            // Jika berhasil menghapus dari 'daftarmd', lanjutkan dengan menghapus dari 'detail_meninggal'
            $hapus_status_detail_meninggal = $this->datameninggal_model->hapus_data_by_id($id_penduduk, 'detail_meninggal');

            if ($hapus_status_detail_meninggal) {
                // Jika berhasil menghapus
                $this->session->set_flashdata('message', 'Data berhasil dihapus.');
            } else {
                // Jika gagal menghapus dari 'detail_meninggal'
                $this->session->set_flashdata('message', 'Gagal menghapus data dari detail_meninggal.');
            }
        } else {
            // Jika gagal menghapus dari 'daftarmd'
            $this->session->set_flashdata('message', 'Gagal menghapus data dari daftarmd.');
        }

        // Redirect kembali ke halaman daftarmd setelah operasi penghapusan selesai
        redirect('admin/daftarmd');
    }

}
?>