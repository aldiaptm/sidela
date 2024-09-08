<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('user_data')) {
    redirect('user/login');
}
?>

<style>
    /* Styling untuk tabel */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    /* Styling untuk tombol Hapus */
    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }

    .btn-delete:hover {
        background-color: #dc3545;
    }

    /* Hover effect untuk tombol Edit */
    .btn-edit:hover {
        background-color: #ffc107;
    }

    /* Styling untuk tombol Edit */
    .btn-edit {
        background-color: #ffc107;
        color: #212529;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
    }
</style>

<div class="card">
    <div class="card-header">
        <h1 class="card-title" style="font-size: 28px;"><strong>DAFTAR PENGAJUAN MUTASI MENINGGAL DUNIA
            </strong></h1>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <div style="margin-bottom: 20px;">
            <p style="margin-bottom: 0;"><strong>Catatan:</strong></p>
            <p style="margin-top: 5px;">Jika pengajuan telah disetujui, surat pengajuan mutasi dapat diambil di Kantor Desa
            </p>
        </div>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal Kematian</th>
                    <th>Tempat Kematian</th>
                    <th>Tempat Kelahiran</th>
                    <th>Tanggal Kelahiran</th>
                    <th>Keterangan Sakit</th>
                    <th>Status Persetujuan</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if (isset($detail_meninggal) && !empty($detail_meninggal)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($detail_meninggal as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->nik; ?></td>
                            <td><?= $data->nama_penduduk; ?></td>
                            <td><?= $data->tanggal_kematian; ?></td>
                            <td><?= $data->tempat_kematian; ?></td>
                            <td><?= $data->tempat_kelahiran; ?></td>
                            <td><?= $data->tanggal_kelahiran; ?></td>
                            <td><?= $data->keterangan; ?></td>
                            <td>
                                <?php if ($data->status_persetujuan == 'Menunggu Persetujuan') : ?>
                                    <span class="badge badge-secondary">Menunggu Persetujuan <i class="fas fa-clock"></i></span>
                                <?php elseif ($data->status_persetujuan == 'Disetujui') : ?>
                                    <span class="badge badge-success">Disetujui <i class="fas fa-check-circle"></i></span>
                                <?php elseif ($data->status_persetujuan == 'Tidak Disetujui') : ?>
                                    <span class="badge badge-danger">Tidak Disetujui <i class="fas fa-times-circle"></i></span>
                                <?php endif; ?>
                            </td>
                            <!-- <td>
                                <div class="btn-group" style="display: flex; justify-content: center;">
                                    <a href="<?= base_url('admin/hapusmd/hapus/' . $data->id_penduduk) ?>" class="btn btn-delete btn-sm" onclick="return confirm('Anda yakin ingin hapus?');">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                    <a href="<?= base_url('user/editmd/edit/' . $data->id_detail_meninggal) ?>" class="btn btn-edit btn-sm" style="margin-left: 5px;">
                                        <i class="fa fa-pencil-alt"></i> Edit
                                    </a>

                                </div>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">Data tidak tersedia</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- /.card -->