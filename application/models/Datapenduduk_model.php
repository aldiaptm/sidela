<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapenduduk_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_data()
    {
        // Contoh query pengambilan semua data penduduk dari tabel 'penduduk'
        $query = $this->db->get('penduduk');
        return $query->result(); // Mengembalikan hasil query
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where('penduduk', array('id_penduduk' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function update_data($id_penduduk, $data)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->update('penduduk', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    // public function checkRWExists($rw)
    // {
    //     $this->db->where('id_rw', $rw);
    //     $query = $this->db->get('rw');
    //     return $query->num_rows() > 0;
    // }

    // Method untuk menyimpan data penduduk ke dalam database
    public function insert_data($data)
    {
        $this->db->insert('penduduk', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function hapus_data($id_penduduk)
    {
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->delete('penduduk'); // Ganti 'nama_tabel' dengan nama tabel yang benar

        return ($this->db->affected_rows() > 0) ? true : false;
    }

}
?>