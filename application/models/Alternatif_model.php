<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alternatif_model extends CI_Model
{

    public function get_all_alternatif($sort = 'asc')
    {
        $this->db->order_by('id_alternatif', $sort);
        return $this->db->get('alternatif');
    }

    public function get_alternatif_by_random($limit)
    {
        $this->db->order_by('rand()');
        $this->db->limit($limit);
        return $this->db->get('alternatif');
    }

    public function get_alternatif($id_alternatif)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->get('alternatif');
    }

    public function add_alternatif($params)
    {
        $this->db->insert('alternatif', $params);
        return $this->db->insert_id();
    }

    public function update_alternatif($id_alternatif, $params)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->update('alternatif', $params);
    }

    public function delete_alternatif($id_alternatif)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->delete('alternatif');
    }

    public function cek_unik_kode_alternatif($kode_alternatif, $kode_alternatif_awal)
    {
        $this->db->where('kode_alternatif', $kode_alternatif);
        $this->db->where('kode_alternatif <>', $kode_alternatif_awal);
        return $this->db->get('alternatif');
    }
}

/* End of file Alternatif_model.php */
/* Location: ./application/models/Alternatif_model.php */