<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('admin_data')) {
    redirect('kades/login');
}
?>

<div class="card">
    <div class="card-header">
        <h1 class="card-title" style="font-size: 20px;">DAFTAR MUTASI MENINGGAL DUNIA</h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($this->session->flashdata('message')) : ?>
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
                    <th>Tanggal Kematian</th>
                    <th>Tempat Kematian</th>
                    <th>Tempat Kelahiran</th>
                    <th>Tanggal Kelahiran</th>
                    <th>Keterangan</th>
                    <th>Proses Persetujuan</th>
                    <th>Status Persetujuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($detail_meninggal as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->nama_penduduk; ?></td>
                        <td><?= $data->tanggal_kematian; ?></td>
                        <td><?= $data->tempat_kematian; ?></td>
                        <td><?= $data->tempat_kelahiran; ?></td>
                        <td><?= $data->tanggal_kelahiran; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                            <?php if ($data->status_persetujuan == 'Disetujui') : ?>
                                <span class="badge badge-success">Disetujui</span>
                            <?php elseif ($data->status_persetujuan == 'Tidak Disetujui') : ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php else : ?>
                                <span class="badge badge-secondary">Belum Diproses</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('admin/statuspersetujuan_md/setuju/' . $data->id_penduduk) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-check"></i> Setuju
                                </a>
                                <span style="margin-left: 7px;"></span>
                                <a href="<?= base_url('admin/statuspersetujuan_md/tolak/' . $data->id_penduduk) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-times"></i> Tolak
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('admin/hapusmd/hapus/' . $data->id_penduduk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin hapus?');">
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