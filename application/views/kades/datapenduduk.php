<div class="card" style="margin-top: 0px;">
    <div class="card-header">
        <h1 class="card-title" style="font-size: 28px;"><strong>DATA PENDUDUK DESA GALANGGANG
            </strong></h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <a class="btn btn-primary" href="<?= base_url('kades/tambahpenduduk') ?>" role="button" style="margin-bottom: 1px; background-color: #8e44ad;">
            <i class="fas fa-plus"></i> Tambah Data
        </a>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat Lengkap</th>
                    <th>Status Pernikahan</th>
                    <th>Pekerjaan</th>
                    <th>RW</th>
                    <th>Status Penduduk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($penduduk as $data) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->nik ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->tempat_lahir ?></td>
                        <td><?= $data->tanggal_lahir ?></td>
                        <td><?= $data->jenis_kelamin ?></td>
                        <td><?= $data->agama ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->status ?></td>
                        <td><?= $data->pekerjaan ?></td>
                        <td><?= $data->rw ?></td>
                        <td><?= $data->status_mutasi ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('kades/hapuspenduduk/hapus/' . $data->id_penduduk) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin hapus?');">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>

                                <!-- Memberikan jarak antara tombol Hapus dan Edit -->
                                <span style="margin-right: 10px;"></span>

                                <!-- Tombol Edit -->
                                <a href="<?= base_url('kades/editpenduduk/edit/' . $data->id_penduduk) ?>" class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>