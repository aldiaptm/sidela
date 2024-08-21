<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function count_penduduk()
    {
        return $this->db->count_all('penduduk'); // Sesuaikan nama tabel dengan tabel Anda
    }

    public function count_meninggal()
    {
        $this->db->where('status_persetujuan', 'Disetujui'); // Sesuaikan dengan kondisi data
        return $this->db->count_all_results('detail_meninggal'); // Sesuaikan nama tabel dengan tabel Anda
    }

    public function count_pindah()
    {
        $this->db->where('status_persetujuan', 'Disetujui'); // Sesuaikan dengan kondisi data
        return $this->db->count_all_results('detail_pindah'); // Sesuaikan nama tabel dengan tabel Anda
    }
}
