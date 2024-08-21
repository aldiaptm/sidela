<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuspersetujuan_bt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Databerpindahtempat_model'); // Menggunakan model Datapindah_model
    }

    public function setuju($id_detail_pindah)
    {
        // Ambil data status persetujuan dari form atau parameter lainnya
        $status_persetujuan = 'Disetujui';

        // Simpan data status persetujuan ke dalam database untuk entri dengan ID $id_detail_pindah
        $this->Databerpindahtempat_model->updateStatusPersetujuan($id_detail_pindah, $status_persetujuan);

        // Redirect kembali ke halaman admin setelah selesai
        redirect('admin/daftarbt');
    }

    public function tolak($id_detail_pindah)
    {
        // Ambil data status persetujuan dari form atau parameter lainnya
        $status_persetujuan = 'Tidak Disetujui';

        // Simpan data status persetujuan ke dalam database untuk entri dengan ID $id_detail_pindah
        $this->Databerpindahtempat_model->updateStatusPersetujuan($id_detail_pindah, $status_persetujuan);

        // Redirect kembali ke halaman admin setelah selesai
        redirect('admin/daftarbt');
    }
}
?>