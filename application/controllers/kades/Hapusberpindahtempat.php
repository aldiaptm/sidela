<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapusberpindahtempat extends CI_Controller
{
    public function hapus($id_penduduk)
    {
        // Memuat model
        $this->load->model('Databerpindahtempat_model');

        // Memanggil fungsi hapus_data dari model Databerpindahtempat_model
        $this->Databerpindahtempat_model->hapus_data($id_penduduk, "penduduk");

        // Set notifikasi bahwa data sudah dihapus
        $this->session->set_flashdata('message', 'Data penduduk berhasil dihapus.');

        // Redirect ke halaman admin/mutasibt setelah penghapusan
        redirect('kades/mutasibt');
    }
}
