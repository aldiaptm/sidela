<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Databerpindahtempat_model extends CI_Model
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

    public function hapus_data($id_penduduk, $detail_pindah)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        return $this->db->delete($detail_pindah);
    }


    // Hapus deklarasi berikut:
    /*
    public function get_detail_pindah_by_name($nama)
    {
        if (!method_exists($this, 'get_detail_pindah_by_name')) {
            $this->db->where('nama_penduduk', $nama);
            return $this->db->get('detail_pindah')->result();
        }
    }
    */

    // Fungsi untuk memperbarui status persetujuan berdasarkan ID penduduk
    public function updateStatusPersetujuan($id_penduduk, $status_persetujuan)
    {
        $data = array(
            'status_persetujuan' => $status_persetujuan
        );
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->update('detail_pindah', $data);
    }
    public function get_detail_pindah_by_status($status_persetujuan)
    {
        // Memilih data berdasarkan status persetujuan
        $this->db->where('status_persetujuan', $status_persetujuan);
        $this->db->select('dp.*, p.nama as nama_penduduk'); // Memilih semua kolom dari detail_meninggal dan nama dari tabel penduduk
        $this->db->from('detail_pindah dp');
        $this->db->join('penduduk p', 'dp.id_penduduk = p.id_penduduk'); // Melakukan join dengan tabel penduduk berdasarkan id_penduduk
        return $this->db->get()->result();
    }
}
