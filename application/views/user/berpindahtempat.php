<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('user_data')) {
    redirect('user/login');
}
?>


<div class="card">
    <div class="card-header">
        <h1 class="card-title" style="font-size: 20px;">DATA BERPINDAH TEMPAT</h1>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama Penduduk</th>
                    <th>Tanggal Pindah</th>
                    <th>Alamat Asli</th>
                    <th>Alamat Tujuan</th>
                    <th>Keterangan Pindah</th>
                    <th>Status Persetujuan</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if (isset($detail_pindah) && is_array($detail_pindah) && !empty($detail_pindah)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($detail_pindah as $data) : ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data->nama_penduduk; ?></td>
                            <td><?php echo $data->tanggal_pindah; ?></td>
                            <td><?php echo $data->alamat_asal; ?></td>
                            <td><?php echo $data->alamat_tujuan; ?></td>
                            <td><?php echo $data->alasan_pindah; ?></td>
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
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/hapusberpindahtempat/hapus/' . $data->id_penduduk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus?');">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </div>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Data tidak tersedia</td>
                    </tr>
                <?php endif; ?>
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
<!-- /.container-fluid --></section>