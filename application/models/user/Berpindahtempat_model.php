<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berpindahtempat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_detail_pindah_by_name($nama)
    {
        // Query database untuk mendapatkan detail berpindah tempat berdasarkan nama penduduk
        $this->db->where('nama', $nama);
        return $this->db->get('detail_pindah')->result_array(); // Ganti 'nama_tabel' dengan nama tabel yang benar
    }
    // Fungsi untuk mengambil semua data dari tabel detail_meninggal
    public function get_all_detail_pindah()
    {
        $this->db->select('dp.*, p.nama as nama_penduduk'); // Pastikan Anda mengambil kolom 'nama' dari tabel 'penduduk'
        $this->db->from('detail_pindah dp');
        $this->db->join('penduduk p', 'dp.id_penduduk = p.id_penduduk', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_id_penduduk_by_name($nama)
    {
        $this->db->select('id_penduduk');
        $this->db->where('nama', $nama);
        $query = $this->db->get('penduduk'); // ganti 'nama_tabel_penduduk' dengan nama tabel penduduk
        $result = $query->row();
        return $result ? $result->id_penduduk : null;
    }

    public function insert_data($data)
    {
        return $this->db->insert('detail_pindah', $data); // Ganti 'detail_pindah' dengan nama tabel yang benar
    }

    public function hapus_data($id_penduduk, $detail_pindah) {
        // Implementasi penghapusan data dari tabel berdasarkan $id_penduduk
        // Contoh:
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->delete($detail_pindah);
    }
    }

?>