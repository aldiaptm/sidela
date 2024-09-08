<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('admin/login');
        // }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('alternatif_model');
        $this->load->model('alternatif_kriteria_model');
        $this->load->model('kriteria_model');
        $this->load->model('subkriteria_model');
    }

    public function index()
    {
        $data['alternatif'] = $this->alternatif_model->get_all_alternatif()->result();

        $data['title'] = 'DATA ALTERNATIF';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/alternatif/tabel', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
        foreach ($data['kriteria'] as $row) {
            $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($row->id_kriteria)->result();
            $data['subkriteria'][$row->id_kriteria] = empty($subkriteria) ? '' : $subkriteria;
        }

        $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|is_unique[alternatif.kode_alternatif]');
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');
        foreach ($data['kriteria'] as $row) {
            $this->form_validation->set_rules('kriteria' . $row->id_kriteria, $row->nama_kriteria, 'required');
        }

        $this->form_validation->set_message('required', 'Isi dulu %s');
        $this->form_validation->set_message('is_unique', 'NIK Sudah Ada');

        if ($this->form_validation->run()) {

            $params = array(
                'kode_alternatif' => $this->input->post('kode_alternatif', TRUE),
                'nama_alternatif' => $this->input->post('nama_alternatif', TRUE),
            );
            $id_alternatif = $this->alternatif_model->add_alternatif($params);

            foreach ($data['kriteria'] as $row) {
                $params2 = array(
                    'id_alternatif' => $id_alternatif,
                    'id_kriteria' => $row->id_kriteria,
                    'id_subkriteria' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                );
                $this->alternatif_kriteria_model->add_alternatif_kriteria($params2);
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('admin/alternatif');
        } else {
            $data['title'] = 'INPUT DATA ALTERNATIF';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/alternatif/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function ubah($id_alternatif = '')
    {
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
        $data['alternatif'] = $this->alternatif_model->get_alternatif($id_alternatif)->row();
        foreach ($data['kriteria'] as $row) {
            $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($row->id_kriteria)->result();
            $data['subkriteria'][$row->id_kriteria] = empty($subkriteria) ? '' : $subkriteria;
        }

        if (empty($data['alternatif'])) {
            redirect('admin/alternatif');
        } else {
            $atribut = array();
            $this->form_validation->set_rules('kode_alternatif', 'Kode Alternatif', 'required|callback_cek_unik_kode_alternatif');
            $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            foreach ($data['kriteria'] as $row) {
                $this->form_validation->set_rules('kriteria' . $row->id_kriteria, $row->nama_kriteria, 'required');
                $result = $this->alternatif_kriteria_model->get_alternatif_kriteria($id_alternatif, $row->id_kriteria)->row();
                $atribut[$row->id_kriteria] = empty($result) ? '' : $result->id_subkriteria;
            }
            $data['atribut'] = $atribut;
            $this->form_validation->set_message('required', 'Isi dulu %s');

            if ($this->form_validation->run()) {
                $alt = $data['alternatif'];

                $params = array(
                    'kode_alternatif' => $this->input->post('kode_alternatif', TRUE),
                    'nama_alternatif' => $this->input->post('nama_alternatif', TRUE),
                );
                $this->alternatif_model->update_alternatif($id_alternatif, $params);

                foreach ($data['kriteria'] as $row) {
                    $alternatif_kriteria = $this->alternatif_kriteria_model->get_alternatif_kriteria($id_alternatif, $row->id_kriteria)->row();
                    if (empty($alternatif_kriteria)) {
                        $params2 = array(
                            'id_alternatif' => $id_alternatif,
                            'id_kriteria' => $row->id_kriteria,
                            'id_subkriteria' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                        );
                        $this->alternatif_kriteria_model->add_alternatif_kriteria($params2);
                    } else {
                        $params2 = array(
                            'id_subkriteria' => $this->input->post('kriteria' . $row->id_kriteria, TRUE),
                        );
                        $this->alternatif_kriteria_model->update_alternatif_kriteria($id_alternatif, $row->id_kriteria, $params2);
                    }
                }

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('admin/alternatif');
            } else {
                $data['title'] = 'UBAH DATA ALTERNATIF';
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('admin/alternatif/ubah', $data);
                $this->load->view('template/footer');
            }
        }
    }

    public function hapus($id_alternatif = '')
    {
        $alternatif = $this->alternatif_model->get_alternatif($id_alternatif);

        if ($alternatif->num_rows() > 0) {
            $data = $alternatif->row_array();
            if (!empty($data['foto1'])) {
                unlink('./assets/img/' . $data['foto1']);
            }
            if (!empty($data['foto2'])) {
                unlink('./assets/img/' . $data['foto2']);
            }
            $this->alternatif_model->delete_alternatif($id_alternatif);
        }
        redirect('admin/alternatif');
    }

    public function cek_unik_kode_alternatif($kode)
    {
        $query = $this->alternatif_model->cek_unik_kode_alternatif($kode, $this->input->post('kode_alternatif_awal'));
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('cek_unik_kode_alternatif', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function detail($id_alternatif = '')
    {
        $query = $this->alternatif_model->get_alternatif($id_alternatif);

        if ($query->num_rows() > 0) {
            $data['alternatif'] = $query->row();
            $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
            $alternatif_kriteria = array();
            foreach ($data['kriteria'] as $row) {
                $result = $this->alternatif_kriteria_model->get_alternatif_kriteria($id_alternatif, $row->id_kriteria)->row();
                $subkriteria = $this->subkriteria_model->get_subkriteria($result->id_subkriteria)->row();
                $alternatif_kriteria[$row->id_kriteria] = empty($result) ? '' : $subkriteria->nama_subkriteria;
            }
            $data['alternatif_kriteria'] = $alternatif_kriteria;

            $data['title'] = 'DETAIL ALTERNATIF';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('admin/alternatif/detail', $data);
            $this->load->view('template/footer');
        } else {
            redirect('admin/alternatif');
        }
    }

    public function validasi_file1()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto1')) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validasi_file', $this->upload->display_errors());
            return FALSE;
        }
    }
}


/* End of file Alternatif.php */
/* Location: ./application/controllers/Alternatif.php */