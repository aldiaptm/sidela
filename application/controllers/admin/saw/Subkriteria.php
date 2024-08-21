<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Subkriteria extends CI_Controller
{
    private $id_kriteria;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
        }
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('subkriteria_model');
        $this->load->model('subkriteria_ahp_model');
        $this->load->model('kriteria_model');

        $kriteria = $this->kriteria_model->get_all_kriteria()->row();

        $this->id_kriteria = $this->input->post('kriteria') ? $this->input->post('kriteria') : $kriteria->id_kriteria;
    }

    public function index()
    {
        $data['subkriteria'] = $this->subkriteria_model->get_all_subkriteria()->result();
        $this->load->view('admin/subkriteria/tabel', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
        $this->form_validation->set_rules('nama_subkriteria', 'Nama Subkriteria', 'required');

        $this->form_validation->set_message('required', 'Isi dulu %s');

        if ($this->form_validation->run()) {
            $params = array(
                'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                'nama_subkriteria' => $this->input->post('nama_subkriteria', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );
            $this->subkriteria_model->add_subkriteria($params);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect('admin/subkriteria/tambah');
        } else {
            $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();
            $this->load->view('admin/subkriteria/tambah', $data);
        }
    }

    public function ubah($id_subkriteria = '')
    {
        $data['subkriteria'] = $this->subkriteria_model->get_subkriteria($id_subkriteria)->row();
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        if (empty($data['subkriteria'])) {
            redirect('admin/subkriteria');
        } else {
            $this->form_validation->set_rules('id_kriteria', 'Kriteria', 'required');
            $this->form_validation->set_rules('nama_subkriteria', 'Nama Subkriteria', 'required');

            $this->form_validation->set_message('required', 'Isi dulu %s');

            if ($this->form_validation->run()) {
                $params = array(
                    'id_kriteria' => $this->input->post('id_kriteria', TRUE),
                    'nama_subkriteria' => $this->input->post('nama_subkriteria', TRUE),
                    'keterangan' => $this->input->post('keterangan', TRUE),
                );
                $this->subkriteria_model->update_subkriteria($id_subkriteria, $params);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
                redirect('admin/subkriteria/ubah/' . $id_subkriteria);
            } else {
                $this->load->view('admin/subkriteria/ubah', $data);
            }
        }
    }

    public function hapus($id_subkriteria = '')
    {
        $subkriteria = $this->subkriteria_model->get_subkriteria($id_subkriteria);

        if ($subkriteria->num_rows() > 0) {
            $this->subkriteria_model->delete_subkriteria($id_subkriteria);
        }
        redirect('admin/subkriteria');
    }

    public function prioritas()
    {
        $query_subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($this->id_kriteria);
        $data['subkriteria'] = $query_subkriteria->result();

        if (isset($_POST['save'])) {
            $this->subkriteria_ahp_model->delete_subkriteria_ahp($this->id_kriteria);
            $i = 0;
            foreach ($data['subkriteria'] as $row1) {
                $ii = 0;
                foreach ($data['subkriteria'] as $row2) {
                    if ($i < $ii) {
                        $subkriteria_input = $this->input->post('subkriteria_' . $row1->id_subkriteria . '_' . $row2->id_subkriteria);
                        $nilai_1 = 0;
                        $nilai_2 = 0;
                        if ($subkriteria_input < 1) {
                            $nilai_1 = abs($subkriteria_input);
                            $nilai_2 = number_format(1 / abs($subkriteria_input), 5);
                        } elseif ($subkriteria_input > 1) {
                            $nilai_1 = number_format(1 / abs($subkriteria_input), 5);
                            $nilai_2 = abs($subkriteria_input);
                        } elseif ($subkriteria_input == 1) {
                            $nilai_1 = 1;
                            $nilai_2 = 1;
                        }
                        $params = array(
                            'id_kriteria' => $this->id_kriteria,
                            'id_subkriteria_1' => $row1->id_subkriteria,
                            'id_subkriteria_2' => $row2->id_subkriteria,
                            'nilai_1' => $nilai_1,
                            'nilai_2' => $nilai_2,
                        );
                        $this->subkriteria_ahp_model->add_subkriteria_ahp($params);
                    }
                    $ii++;
                }
                $i++;
            }
            $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan subkriteria berhasil disimpan</div>');
        }

        if (isset($_POST['check'])) {
            if ($query_subkriteria->num_rows() < 3) {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Jumlah subkriteria kurang, minimal 3</div>');
            } else {
                $id_subkriteria = array();
                foreach ($data['subkriteria'] as $row)
                    $id_subkriteria[] = $row->id_subkriteria;
            }

            // perhitungan metode AHP
            $matrik_subkriteria = $this->ahp_get_matrik_subkriteria($id_subkriteria);
            $jumlah_kolom = $this->ahp_get_jumlah_kolom($matrik_subkriteria);
            $matrik_normalisasi = $this->ahp_get_normalisasi($matrik_subkriteria, $jumlah_kolom);
            $prioritas = $this->ahp_get_prioritas($matrik_normalisasi);
            $prioritas_sub = $this->ahp_get_prioritas_subkriteria($prioritas);
            $matrik_baris = $this->ahp_get_matrik_baris($prioritas, $matrik_subkriteria);
            $jumlah_matrik_baris = $this->ahp_get_jumlah_matrik_baris($matrik_baris);
            $hasil_tabel_konsistensi = $this->ahp_get_tabel_konsistensi($jumlah_matrik_baris, $prioritas);
            if ($this->ahp_uji_konsistensi($hasil_tabel_konsistensi)) {
                $this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success" role="alert">Nilai perbandingan : KONSISTEN</div>');
                $i = 0;
                foreach ($data['subkriteria'] as $row) {
                    $params = array(
                        'prioritas' => $prioritas_sub[$i++],
                    );
                    $this->subkriteria_model->update_subkriteria($row->id_subkriteria, $params);
                }

                $data['list_data'] = $this->tampil_data_1($matrik_subkriteria, $jumlah_kolom, $this->id_kriteria);
                $data['list_data2'] = $this->tampil_data_2($matrik_normalisasi, $prioritas, $prioritas_sub, $this->id_kriteria);
                $data['list_data3'] = $this->tampil_data_3($matrik_baris, $jumlah_matrik_baris, $this->id_kriteria);
                $list_data = $this->tampil_data_4($jumlah_matrik_baris, $prioritas, $hasil_tabel_konsistensi, $this->id_kriteria);
                $data['list_data4'] = $list_data[0];
                $data['list_data5'] = $list_data[1];
            } else {
                $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert">Nilai perbandingan : TIDAK KONSISTEN</div>');
            }
        }

        $result = array();
        $i = 0;
        foreach ($data['subkriteria'] as $row1) {
            $ii = 0;
            foreach ($data['subkriteria'] as $row2) {
                if ($i < $ii) {
                    $subkriteria_ahp = $this->subkriteria_ahp_model->get_subkriteria_ahp($row1->id_subkriteria, $row2->id_subkriteria)->row();
                    if (empty($subkriteria_ahp)) {
                        $params = array(
                            'id_kriteria' => $this->id_kriteria,
                            'id_subkriteria_1' => $row1->id_subkriteria,
                            'id_subkriteria_2' => $row2->id_subkriteria,
                            'nilai_1' => 1,
                            'nilai_2' => 1,
                        );
                        $this->subkriteria_ahp_model->add_subkriteria_ahp($params);
                        $nilai_1 = 1;
                        $nilai_2 = 1;
                    } else {
                        $nilai_1 = $subkriteria_ahp->nilai_1;
                        $nilai_2 = $subkriteria_ahp->nilai_2;
                    }
                    $subkriteria = 0;
                    if ($nilai_1 < 1) {
                        $subkriteria = $nilai_2;
                    } elseif ($nilai_1 > 1) {
                        $subkriteria = -$nilai_1;
                    } elseif ($nilai_1 == 1) {
                        $subkriteria = 1;
                    }
                    $result[$row1->id_subkriteria][$row2->id_subkriteria] = $subkriteria;
                }
                $ii++;
            }
            $i++;
        }

        $data['subkriteria_ahp'] = $result;
        $data['id_kriteria'] = $this->id_kriteria;
        $data['kriteria'] = $this->kriteria_model->get_all_kriteria()->result();

        $this->load->view('admin/subkriteria/prioritas', $data);
    }

    public function reset($id_kriteria)
    {
        $this->subkriteria_ahp_model->delete_subkriteria_ahp($id_kriteria);
        $params = array(
            'prioritas' => null,
        );
        $this->subkriteria_model->update_prioritas($id_kriteria, $params);
        redirect('admin/subkriteria/prioritas');
    }

    // --- metode AHP --- START
    public function ahp_get_matrik_subkriteria($subkriteria)
    {
        $matrik = array();
        $i = 0;
        foreach ($subkriteria as $row1) {
            $ii = 0;
            foreach ($subkriteria as $row2) {
                if ($i == $ii) {
                    $matrik[$i][$ii] = 1;
                } else {
                    if ($i < $ii) {
                        $subkriteria_ahp = $this->subkriteria_ahp_model->get_subkriteria_ahp($row1, $row2)->row();
                        if (empty($subkriteria_ahp)) {
                            $matrik[$i][$ii] = 1;
                            $matrik[$ii][$i] = 1;
                        } else {
                            $matrik[$i][$ii] = $subkriteria_ahp->nilai_1;
                            $matrik[$ii][$i] = $subkriteria_ahp->nilai_2;
                        }
                    }
                }
                $ii++;
            }
            $i++;
        }
        return $matrik;
    }

    public function ahp_get_jumlah_kolom($matrik)
    {
        $jumlah_kolom = array();
        for ($i = 0; $i < count($matrik); $i++) {
            $jumlah_kolom[$i] = 0;
            for ($ii = 0; $ii < count($matrik); $ii++) {
                $jumlah_kolom[$i] = $jumlah_kolom[$i] + $matrik[$ii][$i];
            }
        }
        return $jumlah_kolom;
    }

    public function ahp_get_normalisasi($matrik, $jumlah_kolom)
    {
        $matrik_normalisasi = array();
        for ($i = 0; $i < count($matrik); $i++) {
            for ($ii = 0; $ii < count($matrik); $ii++) {
                $matrik_normalisasi[$i][$ii] = number_format($matrik[$i][$ii] / $jumlah_kolom[$ii], 5);
            }
        }
        return $matrik_normalisasi;
    }

    public function ahp_get_prioritas($matrik_normalisasi)
    {
        $prioritas = array();
        for ($i = 0; $i < count($matrik_normalisasi); $i++) {
            $prioritas[$i] = 0;
            for ($ii = 0; $ii < count($matrik_normalisasi); $ii++) {
                $prioritas[$i] = $prioritas[$i] + $matrik_normalisasi[$i][$ii];
            }
            $prioritas[$i] = number_format($prioritas[$i] / count($matrik_normalisasi), 5);
        }
        return $prioritas;
    }

    function ahp_get_prioritas_subkriteria($prioritas)
    {
        $prioritas_sub = array();
        $subkriteria_max = max($prioritas);
        for ($i = 0; $i < count($prioritas); $i++) {
            $prioritas_sub[$i] = number_format($prioritas[$i] / $subkriteria_max, 5);
        }
        return $prioritas_sub;
    }

    public function ahp_get_matrik_baris($prioritas, $matrik_subkriteria)
    {
        $matrik_baris = array();
        for ($i = 0; $i < count($matrik_subkriteria); $i++) {
            for ($ii = 0; $ii < count($matrik_subkriteria); $ii++) {
                $matrik_baris[$i][$ii] = number_format($prioritas[$ii] * $matrik_subkriteria[$i][$ii], 5);
            }
        }
        return $matrik_baris;
    }

    public function ahp_get_jumlah_matrik_baris($matrik_baris)
    {
        $jumlah_baris = array();
        for ($i = 0; $i < count($matrik_baris); $i++) {
            $jumlah_baris[$i] = 0;
            for ($ii = 0; $ii < count($matrik_baris); $ii++) {
                $jumlah_baris[$i] = $jumlah_baris[$i] + $matrik_baris[$i][$ii];
            }
        }
        return $jumlah_baris;
    }

    public function ahp_get_tabel_konsistensi($jumlah_matrik_baris, $prioritas)
    {
        $jumlah = array();
        for ($i = 0; $i < count($jumlah_matrik_baris); $i++) {
            $jumlah[$i] = $jumlah_matrik_baris[$i] / $prioritas[$i];
        }
        return $jumlah;
    }

    public function ahp_uji_konsistensi($tabel_konsistensi)
    {
        $jumlah = array_sum($tabel_konsistensi);
        $n = count($tabel_konsistensi);
        $lambda_maks = $jumlah / $n;
        $ci = ($lambda_maks - $n) / ($n - 1);
        $ir = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);
        if ($n <= 15) {
            $ir = $ir[$n - 1];
        } else {
            $ir = $ir[14];
        }
        $cr = number_format($ci / $ir, 5);

        if ($cr <= 0.1) {
            return true;
        } else {
            return false;
        }
    }
    // --- metode AHP --- END

    // --- untuk menampilkan langkah perhitungan ---
    public function tampil_data_1($matrik_subkriteria, $jumlah_kolom, $id_kriteria)
    {
        $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($id_kriteria)->result();
        // --- tabel matriks perbandingan berpasangan
        $list_data = '';
        $list_data .= '<tr><td class="text-center">Subkriteria</td>';
        foreach ($subkriteria as $row) {
            $list_data .= '<td class="text-center">' . $row->nama_subkriteria . '</td>';
        }
        $list_data .= '</tr>';
        $i = 0;
        foreach ($subkriteria as $row) {
            $list_data .= '<tr>';
            $list_data .= '<td style="text-align: left">' . $row->nama_subkriteria . '</td>';
            $ii = 0;
            foreach ($subkriteria as $row2) {
                $list_data .= '<td class="text-center">' . $matrik_subkriteria[$i][$ii] . '</td>';
                $ii++;
            }
            $list_data .= '</tr>';
            $i++;
        }
        $list_data .= '<tr><td class="font-weight-bold">Jumlah</td>';
        for ($i = 0; $i < count($jumlah_kolom); $i++) {
            $list_data .= '<td class="text-center font-weight-bold">' . $jumlah_kolom[$i] . '</td>';
        }
        $list_data .= '</tr>';
        // ---
        return $list_data;
    }

    public function tampil_data_2($matrik_normalisasi, $prioritas, $prioritas_sub, $id_kriteria)
    {
        $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($id_kriteria)->result();
        // --- matriks subkriteria kriteria
        $list_data2 = '';
        $list_data2 .= '<tr><td class="text-center">Subkriteria</td>';
        foreach ($subkriteria as $row) {
            $list_data2 .= '<td class="text-center">' . $row->nama_subkriteria . '</td>';
        }
        $list_data2 .= '<td class="text-center font-weight-bold">Jumlah</td>';
        $list_data2 .= '<td class="text-center font-weight-bold">Prioritas</td>';
        $list_data2 .= '<td class="text-center font-weight-bold">Prioritas Subkriteria</td>';
        $list_data2 .= '</tr>';
        $i = 0;
        foreach ($subkriteria as $row) {
            $list_data2 .= '<tr>';
            $list_data2 .= '<td style="text-align: left">' . $row->nama_subkriteria . '</td>';
            $jumlah = 0;
            $ii = 0;
            foreach ($subkriteria as $row2) {
                $list_data2 .= '<td class="text-center">' . $matrik_normalisasi[$i][$ii] . '</td>';
                $jumlah += $matrik_normalisasi[$i][$ii];
                $ii++;
            }
            $list_data2 .= '<td class="text-center font-weight-bold">' . $jumlah . '</td>';
            $list_data2 .= '<td class="text-center font-weight-bold">' . $prioritas[$i] . '</td>';
            $list_data2 .= '<td class="text-center font-weight-bold">' . $prioritas_sub[$i] . '</td>';
            $list_data2 .= '</tr>';
            $i++;
        }
        // ---
        return $list_data2;
    }

    public function tampil_data_3($matrik_baris, $jumlah_matrik_baris, $id_kriteria)
    {
        $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($id_kriteria)->result();
        // --- matriks penjumlahan setiap baris
        $list_data3 = '';
        $list_data3 .= '<tr><td class="text-center">Subkriteria</td>';
        foreach ($subkriteria as $row) {
            $list_data3 .= '<td class="text-center">' . $row->nama_subkriteria . '</td>';
        }
        $list_data3 .= '<td class="text-center font-weight-bold">Jumlah</td>';
        $list_data3 .= '</tr>';
        $i = 0;
        foreach ($subkriteria as $row) {
            $list_data3 .= '<tr>';
            $list_data3 .= '<td style="text-align: left">' . $row->nama_subkriteria . '</td>';
            $ii = 0;
            foreach ($subkriteria as $row2) {
                $list_data3 .= '<td class="text-center">' . $matrik_baris[$i][$ii] . '</td>';
                $ii++;
            }
            $list_data3 .= '<td class="text-center font-weight-bold">' . $jumlah_matrik_baris[$i] . '</td>';
            $list_data3 .= '</tr>';
            $i++;
        }
        // ---
        return $list_data3;
    }

    public function tampil_data_4($jumlah_matrik_baris, $prioritas, $hasil_tabel_konsistensi, $id_kriteria)
    {
        $subkriteria = $this->subkriteria_model->get_all_subkriteria_by_kriteria($id_kriteria)->result();
        // --- perhitungan rasio konsistensi
        $list_data4 = '';
        $list_data4 .= '<tr><td class="text-center">Subkriteria</td>';
        $list_data4 .= '<td class="text-center">Jumlah per Baris</td>';
        $list_data4 .= '<td class="text-center">Prioritas</td>';
        $list_data4 .= '<td class="text-center font-weight-bold">Hasil</td>';
        $list_data4 .= '</tr>';
        $i = 0;
        foreach ($subkriteria as $row) {
            $list_data4 .= '<tr>';
            $list_data4 .= '<td style="text-align: left">' . $row->nama_subkriteria . '</td>';
            $list_data4 .= '<td class="text-center">' . $jumlah_matrik_baris[$i] . '</td>';
            $list_data4 .= '<td class="text-center">' . $prioritas[$i] . '</td>';
            $list_data4 .= '<td class="text-center font-weight-bold">' . $hasil_tabel_konsistensi[$i] . '</td>';
            $list_data4 .= '</tr>';
            $i++;
        }
        $jumlah = array_sum($hasil_tabel_konsistensi);
        $n = count($hasil_tabel_konsistensi);
        $lambda_maks = $jumlah / $n;
        $ci = ($lambda_maks - $n) / ($n - 1);
        $ir = array(0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59);
        if ($n <= 15) {
            $ir = $ir[$n - 1];
        } else {
            $ir = $ir[14];
        }
        $cr = number_format($ci / $ir, 5);

        $list_data5 = '';
        $list_data5 .= '<table class="table-prioritas mt-4">
<tr>
    <td width="100" style="text-align: left">λ</td>
    <td style="text-align: left">= ' . number_format($lambda_maks, 5) . '</td>
</tr>
<tr>
    <td width="100" style="text-align: left">CI</td>
    <td style="text-align: left">= ' . number_format($ci, 5) . '</td>
</tr>
<tr>
    <td width="100" style="text-align: left">CR</td>
    <td style="text-align: left">= ' . $cr . '</td>
</tr>
<tr>
    <td width="100" style="text-align: left">CR <= 0.1</td>';
        if ($cr <= 0.1) {
            $list_data5 .= '
    <td style="text-align: left">Konsisten</td>';
        } else {
            $list_data5 .= '
    <td style="text-align: left">Tidak Konsisten</td>';
        }
        $list_data5 .= '
</tr>
</table>';
        // ---
        return array($list_data4, $list_data5);
    }
    // -------

}


/* End of file Subkriteria.php */
/* Location: ./application/controllers/Subkriteria.php */