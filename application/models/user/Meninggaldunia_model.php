<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meninggaldunia_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mengambil semua data dari tabel detail_meninggal
    public function get_all_detail_meninggal()
    {
        $this->db->select('dm.*, p.nama as nama_penduduk, p.nik');
        $this->db->from('detail_meninggal dm');
        $this->db->join('penduduk p', 'dm.id_penduduk = p.id_penduduk', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function hapus_data_by_id_admin($id)
    {
        $this->db->where('id_penduduk', $id);
        $this->db->delete('detail_meninggal');

        // Mengecek jumlah baris yang terpengaruh oleh operasi delete
        if ($this->db->affected_rows() > 0) {
            return true; // Mengembalikan true jika ada baris yang terpengaruh
        } else {
            return false; // Mengembalikan false jika tidak ada baris yang terpengaruh
        }
    }

    // Fungsi untuk menghapus data dari tabel 'tabel_pengguna' untuk pengguna
    public function hapus_data_by_id_pengguna($id)
    {
        $this->db->where('id_penduduk', $id); // Ubah sesuai dengan kolom yang sesuai dengan tabel pengguna
        $this->db->delete('detail_meninggal');

        // Mengecek jumlah baris yang terpengaruh oleh operasi delete
        if ($this->db->affected_rows() > 0) {
            return true; // Mengembalikan true jika ada baris yang terpengaruh
        } else {
            return false; // Mengembalikan false jika tidak ada baris yang terpengaruh
        }
    }

    // Fungsi untuk mencari id_penduduk berdasarkan nama
    public function get_id_penduduk_by_nik($nik)
    {
        $this->db->select('id_penduduk');
        $this->db->where('nik', $nik);
        $query = $this->db->get('penduduk');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id_penduduk;
        }

        // Jika tidak ditemukan, kembalikan null
        return null;
    }

    // Fungsi untuk memasukkan data ke dalam tabel detail_meninggal
    public function insert_data($data)
    {
        $this->db->insert('detail_meninggal', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_data_by_id_penduduk($id_penduduk)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        $query = $this->db->get('detail_meninggal');
        return $query->result_array();
    }

    public function get_detail_meninggal_by_id($id_detail_meninggal)
    {
        return $this->db->get_where('detail_meninggal', array('id_detail_meninggal' => $id_detail_meninggal))->row_array();
    }

    public function update_detail_meninggal($id_detail_meninggal, $data)
    {
        $this->db->where('id_detail_meninggal', $id_detail_meninggal);
        return $this->db->update('detail_meninggal', $data);
    }

    public function hapus_data_by_id($id)
    {
        $this->db->where('id_detail_meninggal', $id);
        $this->db->delete('detail_meninggal');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
