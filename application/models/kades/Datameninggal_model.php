<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datameninggal_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mengambil semua data dari tabel detail_meninggal
    public function get_all_detail_meninggal()
    {
        $this->db->select('dm.*, p.nama as nama_penduduk');
        $this->db->from('detail_meninggal dm');
        $this->db->join('penduduk p', 'dm.id_penduduk = p.id_penduduk', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function hapus_data_by_id($id_penduduk, $detail_meninggal)
    {
        // Hapus data dari tabel yang ditentukan berdasarkan ID
        $this->db->where('id_penduduk', $id_penduduk);
        $delete_result = $this->db->delete($detail_meninggal);

        // Kembalikan hasil operasi penghapusan
        return $delete_result;
    }

    public function cek_keterhubungan_data_pengguna($id_penduduk)
    {
        // Periksa apakah ada keterhubungan data pengguna dengan data yang akan dihapus
        $this->db->where('id_penduduk', $id_penduduk);
        $query = $this->db->get('detail_meninggal'); // Ganti 'tabel_pengguna' dengan nama tabel pengguna yang sesuai

        return $query->num_rows() > 0;
    }

    public function hapus_data_daftarmd($id_penduduk)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        $delete_result = $this->db->delete('detail_meninggal');
        return $delete_result;
    }


    // Fungsi untuk menghapus data berdasarkan ID
    public function hapus_data_by_id_admin($id_penduduk)
    {
        // Lakukan pengecekan apakah ID penduduk valid
        if (!empty($id_penduduk)) {
            // Lakukan penghapusan data berdasarkan ID penduduk
            $this->db->where('id_penduduk', $id_penduduk);
            $this->db->delete('detail_meninggal');

            // Mengecek jumlah baris yang terpengaruh oleh operasi delete
            if ($this->db->affected_rows() > 0) {
                return true; // Mengembalikan true jika ada baris yang terpengaruh
            } else {
                return false; // Mengembalikan false jika tidak ada baris yang terpengaruh
            }
        } else {
            return false; // Mengembalikan false jika ID penduduk kosong atau tidak valid
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
    public function get_id_penduduk_by_name($nama)
    {
        $this->db->select('id_penduduk');
        $this->db->where('nama', $nama);
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

    public function get_detail_meninggal_by_name($nama)
    {
        $this->db->where('nama_penduduk', $nama);
        return $this->db->get('detail_meninggal')->result();
    }

    // Fungsi untuk memperbarui status persetujuan berdasarkan ID penduduk
    public function updateStatusPersetujuan($id_penduduk, $status_persetujuan)
    {
        // Lakukan pembaruan status persetujuan dalam database
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->update('detail_meninggal', array('status_persetujuan' => $status_persetujuan));
    }
    public function get_detail_meninggal_by_status($status_persetujuan)
    {
        // Memilih data berdasarkan status persetujuan
        $this->db->where('dm.status_persetujuan', $status_persetujuan);
        $this->db->select('dm.*, p.nama as nama_penduduk'); // Memilih semua kolom dari detail_meninggal dan nama dari tabel penduduk
        $this->db->from('detail_meninggal dm');
        $this->db->join('penduduk p', 'dm.id_penduduk = p.id_penduduk'); // Melakukan join dengan tabel penduduk berdasarkan id_penduduk
        return $this->db->get()->result();
    }



}
?>