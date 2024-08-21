<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuspersetujuan_md extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datameninggal_model');
    }

    public function setuju($id_penduduk)
    {
        // Panggil model untuk mengubah status persetujuan menjadi 'Disetujui'
        $this->Datameninggal_model->updateStatusPersetujuan($id_penduduk, 'Disetujui');

        // Redirect kembali ke halaman daftar mutasi setelah perubahan status
        redirect('admin/mutasimd');
    }

    public function tolak($id_penduduk)
    {
        // Panggil model untuk mengubah status persetujuan menjadi 'Tidak Disetujui'
        $this->Datameninggal_model->updateStatusPersetujuan($id_penduduk, 'Tidak Disetujui');

        // Redirect kembali ke halaman daftar mutasi setelah perubahan status
        redirect('admin/mutasimd');
    }
}
