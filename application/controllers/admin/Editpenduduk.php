<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editpenduduk extends CI_Controller 
{
    public function edit($id_penduduk)
    {
        // Memuat model
        $this->load->model('Datapenduduk_model');

        // Mendapatkan data penduduk berdasarkan ID
        $data['penduduk'] = $this->Datapenduduk_model->get_data_by_id($id_penduduk);

        // Memuat view edit data penduduk
        $data['title'] = 'EDIT PENDUDUK';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/editpenduduk', $data);
        $this->load->view('template/footer');

    }

    public function update($id_penduduk)
    {
        // Memuat model
        $this->load->model('Datapenduduk_model');

        
        // Mengambil data yang akan diupdate
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'rw' => $this->input->post('rw'),
            'status_mutasi' => $this->input->post('status_mutasi')
        );

        // Memanggil fungsi update_data dari model Datapenduduk_model
        $this->Datapenduduk_model->update_data($id_penduduk, $data);

        // Set notifikasi bahwa data berhasil diupdate
        $this->session->set_flashdata('message', 'Data penduduk berhasil diupdate.');

        // Redirect ke halaman admin/datapenduduk
        redirect('admin/datapenduduk');
    }
}