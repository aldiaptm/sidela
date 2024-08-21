<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editmd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/Meninggaldunia_model');
    }

    public function edit($id_detail_meninggal)
    {
        // Mendapatkan data detail_meninggal berdasarkan ID
        $data['detail_meninggal'] = $this->Meninggaldunia_model->get_detail_meninggal_by_id($id_detail_meninggal);

        // Load view untuk halaman edit
        $this->load->view('user/template/header', $data);
        $this->load->view('user/template/sidebar', $data);
        $this->load->view('user/editmd');
        $this->load->view('user/template/footer');
    }

    public function update_data()
    {
        // Ambil nilai ID detail_meninggal dari form
        $id_detail_meninggal = $this->input->post('id_detail_meninggal');

        // Data yang akan diupdate
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal_kematian' => $this->input->post('tanggal_kematian'),
            'tempat_kematian' => $this->input->post('tempat_kematian'),
            'tempat_kelahiran' => $this->input->post('tempat_kelahiran'),
            'tanggal_kelahiran' => $this->input->post('tanggal_kelahiran'),
            'keterangan' => $this->input->post('keterangan')
            // Tambahkan bidang lainnya sesuai kebutuhan
        );

        // Panggil model untuk melakukan update
        $this->Meninggaldunia_model->update_detail_meninggal($id_detail_meninggal, $data);

        // Set pesan flashdata untuk notifikasi
        $this->session->set_flashdata('message', 'Data detail_meninggal berhasil diupdate.');

        // Redirect ke halaman edit jika perlu
        redirect('user/meninggaldunia' . $id_detail_meninggal);
    }
}
