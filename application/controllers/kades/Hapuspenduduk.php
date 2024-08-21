<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapuspenduduk extends CI_Controller
{
    public function hapus($id_penduduk)
    {
        // Memuat model
        $this->load->model('Datapenduduk_model');

        // Memanggil fungsi hapus_data dari model Datapenduduk_model
        $this->Datapenduduk_model->hapus_data($id_penduduk, "penduduk");

        // Set notifikasi bahwa data sudah dihapus
        $this->session->set_flashdata('message', 'Data penduduk berhasil dihapus.');

        // Redirect ke halaman admin/datapenduduk
        redirect('kades/datapenduduk');
    }
}
