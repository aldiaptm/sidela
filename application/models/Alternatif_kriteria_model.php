<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alternatif_kriteria_model extends CI_Model
{

    public function get_alternatif_kriteria($id_alternatif, $id_kriteria)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->get('alternatif_kriteria');
    }

    public function add_alternatif_kriteria($params)
    {
        return $this->db->insert('alternatif_kriteria', $params);
    }

    public function update_alternatif_kriteria($id_alternatif, $id_kriteria, $params)
    {
        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('alternatif_kriteria', $params);
    }

    public function get_all_alternatif_kriteria()
    {
        return $this->db->get('alternatif_kriteria');
    }

    public function update_by_id($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('alternatif_kriteria', $params);
    }
}

/* End of file Alternatif_kriteria_model.php */
/* Location: ./application/models/Alternatif_kriteria_model.php */