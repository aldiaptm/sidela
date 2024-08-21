<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_keluhan()
    {
        $query = $this->db->get('keluhan');
        return $query->result_array();
    }

    public function insert_keluhan($data)
    {
        return $this->db->insert('keluhan', $data);
    }
    public function delete_keluhan($id_keluhan)
    {
        $this->db->where('id_keluhan', $id_keluhan);
        return $this->db->delete('keluhan');
    }
}
