<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hapus_user extends CI_Controller
{
    public function delete($id)
    {
        // Memuat model
        $this->load->model('Datauser_model');

        // Memanggil fungsi hapus_data dari model Datapenduduk_model
        $this->Datauser_model->hapus_data($id, "user");

        // Set notifikasi bahwa data sudah dihapus
        $this->session->set_flashdata('message', 'Data user berhasil dihapus.');

        // Redirect ke halaman admin/datapenduduk
        redirect('admin/datauser');
    }
}
