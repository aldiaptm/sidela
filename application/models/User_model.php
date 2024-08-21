<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session'); // Memuat library session
    }

    public function insert($data)
    {
        // Simpan data pengguna ke dalam tabel 'user'
        $this->db->insert('admin', $data);
    }

    // Anda dapat menambahkan method lain di sini sesuai kebutuhan, seperti method untuk mengambil data pengguna, mengupdate data, dll.
}
