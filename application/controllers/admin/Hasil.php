<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('logged_in')) {
        // redirect('admin/login');
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
        $hasil = $this->saw();
        $data['ranking'] = $this->processRanking($hasil['saw']);
        $data['perhitungan'] = $hasil['rumus'];


        $data['title'] = 'DATA HASIL';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/hasil/index', $data); // Menambahkan $data ke view 'admin/datapenduduk'
        $this->load->view('template/footer');
    }

    private function processRanking($hasil)
    {
        // Sort hasil by nilai_saw
        usort($hasil, function ($a, $b) {
            if ($a['nilai_saw'] == $b['nilai_saw']) {
                return 0;
            }
            return ($a['nilai_saw'] < $b['nilai_saw']) ? 1 : -1;
        });


        // Calculate high, middle, low categories
        $totalAlternatif = count($hasil);
        $third = ceil($totalAlternatif / 3);

        foreach ($hasil as $index => &$alt) {
            $alt['ranking'] = $index + 1;

            if ($index < $third) {
                $alt['keterangan'] = 'High';
            } elseif ($index < 2 * $third) {
                $alt['keterangan'] = 'Middle';
            } else {
                $alt['keterangan'] = 'Low';
            }
        }

        return $hasil;
    }

    // Metode SAW
    public function saw()
    {
        $hasil = array('saw' => null, 'rumus' => null, 'tabel1' => null, 'tabel2' => null);
        $var_rumus = '';

        $query_kriteria = $this->kriteria_model->get_all_kriteria();
        $query_alternatif = $this->alternatif_model->get_all_alternatif();
        $arr_alternatif = $query_alternatif->result();

        if (!empty($arr_alternatif)) {

            // mencari nilai matriks keputusan X
            foreach ($arr_alternatif as $row_alt) {
                foreach ($query_kriteria->result() as $row) {
                    $arr_X[$row_alt->id_alternatif][$row->id_kriteria] = '';
                    $res = $this->alternatif_kriteria_model->get_alternatif_kriteria($row_alt->id_alternatif, $row->id_kriteria);
                    if ($res->num_rows() > 0) {
                        $res_array = $res->row_array();
                        $res2 = $this->subkriteria_model->get_subkriteria($res_array['id_subkriteria'])->row_array();
                        $arr_X[$row_alt->id_alternatif][$row->id_kriteria] = empty($res2) ? 0 : $res2['prioritas'];
                    }
                }
            }

            // mencari nilai matriks R
            $var_rumus .= '<h4 class="mt-4 mb-1">Normalisasi Matriks</h4>';
            $i = 0;
            foreach ($query_kriteria->result() as $row_k) {
                $var_rumus .= '<h4 class="mt-4 mb-1">Kriteria ' . $row_k->kode_kriteria . '</h4>';
                $j = 0;
                foreach ($arr_alternatif as $row) {
                    $show_j = $j + 1; // untuk kebutuhan menampilkan rumus perhitungan
                    $show_i = $i + 1; // untuk kebutuhan menampilkan rumus perhitungan
                    $show_array = implode("; ", array_column($arr_X, $row_k->id_kriteria)); // untuk kebutuhan menampilkan rumus perhitungan
                    if ($row_k->tipe == 'Cost') {
                        $min = min(array_column($arr_X, $row_k->id_kriteria));
                        $arr_R[$row->id_alternatif][$row_k->id_kriteria] = $min / $arr_X[$row->id_alternatif][$row_k->id_kriteria];
                        // untuk kebutuhan menampilkan rumus perhitungan
                        $var_rumus .= "r<sub>" . $show_j . "" . $show_i . "</sub> = ";
                        $var_rumus .= "min{" . $show_array . "} / " . $arr_X[$row->id_alternatif][$row_k->id_kriteria] . " = ";
                        $var_rumus .= $min . " / " . $arr_X[$row->id_alternatif][$row_k->id_kriteria] . " = " . round($arr_R[$row->id_alternatif][$row_k->id_kriteria], 5);
                    } elseif ($row_k->tipe == 'Benefit') {
                        $max = max(array_column($arr_X, $row_k->id_kriteria));
                        $arr_R[$row->id_alternatif][$row_k->id_kriteria] = $arr_X[$row->id_alternatif][$row_k->id_kriteria] / $max;
                        // untuk kebutuhan menampilkan rumus perhitungan
                        $var_rumus .= "r<sub>" . $show_j . "" . $show_i . "</sub> = ";
                        $var_rumus .= $arr_X[$row->id_alternatif][$row_k->id_kriteria] . " / max{" . $show_array . "} = ";
                        $var_rumus .= $arr_X[$row->id_alternatif][$row_k->id_kriteria] . " / " . $max . " = " . round($arr_R[$row->id_alternatif][$row_k->id_kriteria], 5);
                    }
                    $var_rumus .= "<br>";
                    $j++;
                }
                $i++;
            }

            $tampil_hasil = ''; // digunakan untuk kebutuhan menampilkan rumus perhitungan
            $tampil_hasil = '<table class="table table-bordered"><tbody>';
            foreach ($arr_alternatif as $row) {
                $tampil_hasil .= '<tr>';
                foreach ($query_kriteria->result() as $row_k) {
                    $tampil_hasil .= '<td>' . round($arr_R[$row->id_alternatif][$row_k->id_kriteria], 5) . '</td>';
                }
                $tampil_hasil .= '</tr>';
            }
            $tampil_hasil .= '</tbody></table>';

            $var_rumus .= '<h4 class="mt-4 mb-1">Hasil Matriks Normalisasi</h4>';
            $var_rumus .= $tampil_hasil;

            // mencari nilai bobot preferensi W
            foreach ($query_kriteria->result() as $row) {
                $bobot[$row->id_kriteria] = $row->prioritas;
            }

            $var_rumus .= '<h4 class="mt-4 mb-1">Bobot Preferensi W</h4>';
            $var_rumus .= 'W = [' . implode(', ', $bobot) . '] <br>';

            $var_rumus .= '<h4 class="mt-4 mb-1">Menghitung Nilai V</h4>';
            $var_rumus .= '<table class="table table-bordered"><tbody>';

            // mencari nilai v
            foreach ($arr_alternatif as $row) {
                $nilai_v = 0;
                $var_rumus .= '<tr>';
                $var_rumus .= '<td>' . $row->kode_alternatif . '</td>';
                $var_rumus .= '<td>' . $row->nama_alternatif . '</td>';
                $string_tampil = ''; // untuk kebutuhan menampilkan rumus perhitungan
                foreach ($query_kriteria->result() as $row_k) {
                    $nilai_v += $bobot[$row_k->id_kriteria] * $arr_R[$row->id_alternatif][$row_k->id_kriteria];
                    $string_tampil .= '(' . $bobot[$row_k->id_kriteria] . ')(' . round($arr_R[$row->id_alternatif][$row_k->id_kriteria], 5) . ') + ';
                }
                $v[$row->id_alternatif]['kode_alternatif'] = $row->kode_alternatif;
                $v[$row->id_alternatif]['nama_alternatif'] = $row->nama_alternatif;
                $v[$row->id_alternatif]['nilai_saw'] = round($nilai_v, 5);
                $string_tampil = substr($string_tampil, 0, -2);
                $var_rumus .= '<td>' . $string_tampil . '</td>';
                $var_rumus .= '<td>' . $v[$row->id_alternatif]['nilai_saw'] . '</td>';
                $var_rumus .= '</tr>';
            }

            $var_rumus .= '</tbody></table>';

            $this->array_sort_by_column($v, 'nilai_saw');

            $hasil['rumus'] = $var_rumus;
            $hasil['saw'] = $v;

            // --- tabel detail perhitungan
            $list_data = '';
            $list_data .= '
            <thead>
                <tr>
                    <td class="text-center font-weight-bold">No</td>
                    <td class="text-center font-weight-bold">Kode</td>
                    <td class="text-center font-weight-bold">Alternatif</td>';
            foreach ($query_kriteria->result_array() as $row) {
                $list_data .= '<td class="text-center font-weight-bold">' . $row['nama_kriteria'] . '</td>';
            }
            $list_data .= '
                </tr>
            </thead>
            <tbody>';
            $no = 0;
            foreach ($arr_alternatif as $row) {
                $no++;
                $list_data .= '
                <tr>
                    <td class="text-center">' . $no . '</td>
                    <td>' . $row->kode_alternatif . '</td>
                    <td>' . $row->nama_alternatif . '</td>';
                foreach ($query_kriteria->result_array() as $r2) {
                    $res = $this->alternatif_kriteria_model->get_alternatif_kriteria($row->id_alternatif, $r2['id_kriteria']);
                    if ($res->num_rows() > 0) {
                        $res_array = $res->row_array();
                        $res2 = $this->subkriteria_model->get_subkriteria($res_array['id_subkriteria'])->row_array();
                        $list_data .= '<td class="text-center">' . $res2['nama_subkriteria'] . '</td>';
                    }
                }
                $list_data .= '
                </tr>';
            }
            $list_data .= '</tbody>';

            $list_data2 = '';
            $list_data2 .= '
            <thead>
                <tr>
                    <td class="text-center font-weight-bold">Kode</td>
                    <td class="text-center font-weight-bold">Alternatif</td>';
            foreach ($query_kriteria->result_array() as $r2) {
                $list_data2 .= '<td class="text-center font-weight-bold">' . $r2['kode_kriteria'] . '</td>';
            }
            $list_data2 .= '
                </tr>
            </thead>
            <tbody>';
            foreach ($arr_alternatif as $alt) {
                $list_data2 .= '
                <tr>
                    <td>' . $alt->kode_alternatif . '</td>
                    <td width="200">' . $alt->nama_alternatif . '</td>';
                foreach ($query_kriteria->result_array() as $r2) {
                    $res = $this->alternatif_kriteria_model->get_alternatif_kriteria($alt->id_alternatif, $r2['id_kriteria']);
                    if ($res->num_rows() > 0) {
                        $res_array = $res->row_array();
                        $res2 = $this->subkriteria_model->get_subkriteria($res_array['id_subkriteria'])->row_array();
                        $list_data2 .= '<td class="text-center">' . $res2['prioritas'] . '</td>';
                    }
                }
                $list_data2 .= '
                </tr>';
            }
            $list_data2 .= '</tbody>';

            $hasil['tabel1'] = $list_data;
            $hasil['tabel2'] = $list_data2;
            // ----
        }

        return $hasil;
    }

    public function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row) {
            $sort_col[$key] = $row[$col];
        }
        return array_multisort($sort_col, $dir, $arr);
    }
}

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */
