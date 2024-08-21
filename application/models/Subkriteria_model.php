<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Subkriteria_model extends CI_Model
{

    public function get_all_subkriteria($sort = 'asc')
    {
        $this->db->select('subkriteria.*,kriteria.nama_kriteria,kriteria.kode_kriteria');
        $this->db->join('kriteria', 'kriteria.id_kriteria=subkriteria.id_kriteria', 'left');
        $this->db->order_by('subkriteria.id_kriteria', $sort);
        return $this->db->get('subkriteria');
    }

    public function get_all_subkriteria_by_kriteria($id_kriteria)
    {
        $this->db->select('subkriteria.*,kriteria.nama_kriteria,kriteria.kode_kriteria');
        $this->db->where('subkriteria.id_kriteria', $id_kriteria);
        $this->db->join('kriteria', 'kriteria.id_kriteria=subkriteria.id_kriteria', 'left');
        return $this->db->get('subkriteria');
    }

    public function get_subkriteria($id_subkriteria)
    {
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->get('subkriteria');
    }

    public function add_subkriteria($params)
    {
        return $this->db->insert('subkriteria', $params);
    }

    public function update_subkriteria($id_subkriteria, $params)
    {
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->update('subkriteria', $params);
    }

    public function delete_subkriteria($id_subkriteria)
    {
        $this->db->where('id_subkriteria', $id_subkriteria);
        return $this->db->delete('subkriteria');
    }

    public function update_prioritas($id_kriteria, $params)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        return $this->db->update('subkriteria', $params);
    }
}

/* End of file Subkriteria_model.php */
/* Location: ./application/models/Subkriteria_model.php */