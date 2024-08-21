<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapus_keluhan extends CI_Controller
{
    public function delete($id_keluhan)
    {
        // Memuat model
        $this->load->model('Keluhan_model');

        // Memanggil fungsi hapus_data dari model Datapenduduk_model
        $this->Keluhan_model->delete_keluhan($id_keluhan, "keluhan");

        // Set notifikasi bahwa data sudah dihapus
        $this->session->set_flashdata('message', 'Data keluhan berhasil dihapus.');

        // Redirect ke halaman admin/datapenduduk
        redirect('admin/keluhan');
    }
}
