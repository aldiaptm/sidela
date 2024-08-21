<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('admin_data')) {
    redirect('admin/login');
}
?>

<style>
    @media print {

        .btn-primary,
        .btn-warning,
        .btn-danger,
        .dataTables_filter,
        .dataTables_length,
        .dataTables_info,
        .dataTables_paginate,
        th:last-child,
        td:last-child {
            display: none !important;
        }
    }
</style>

<div class="card">
    <div class="card-header">
        <h1 class="card-title" style="font-size: 20px;">DAFTAR MUTASI BERPINDAH TEMPAT</h1>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <div style="margin-bottom: 20px;">
            <p style="margin-bottom: 0;"><strong>Catatan untuk Admin:</strong></p>
            <p style="margin-top: 5px;">Mohon periksa setiap pengajuan data mutasi dengan cermat sebelum menyetujui atau
                menolak. Kesalahan dalam validasi dapat berdampak pada integritas data. Terima kasih atas perhatiannya.
            </p>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal Pindah</th>
                    <th>Alamat Asli</th>
                    <th>Alamat Tujuan</th>
                    <th>Keterangan Pindah</th>
                    <th>Proses Persetujuan</th>
                    <th>Status Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($detail_pindah as $data): ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data->nama_penduduk; ?>
                        </td>
                        <td>
                            <?php echo $data->tanggal_pindah; ?>
                        </td>
                        <td>
                            <?php echo $data->alamat_asal; ?>
                        </td>
                        <td>
                            <?php echo $data->alamat_tujuan; ?>
                        </td>
                        <td>
                            <?php echo $data->alasan_pindah; ?>
                        </td>
                        <td>
                            <?php if ($data->status_persetujuan == 'Disetujui'): ?>
                                <span class="badge badge-success">Disetujui</span>
                            <?php elseif ($data->status_persetujuan == 'Tidak Disetujui'): ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php else: ?>
                                <span class="badge badge-secondary">Belum Diproses</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('admin/statuspersetujuan_bt/setuju/' . $data->id_penduduk) ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-check"></i> Setuju
                                </a>
                                <span style="margin-left: 7px;"></span>
                                <a href="<?= base_url('admin/statuspersetujuan_bt/tolak/' . $data->id_penduduk) ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-times"></i> Tolak
                                </a>
                            </div>
                        </td> <td>
                            <div class="btn-group">
                                <a href="<?= base_url('admin/hapusmd/hapus/' . $data->id_penduduk) ?>"
                                    class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Tambahkan baris lain sesuai kebutuhan -->
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>