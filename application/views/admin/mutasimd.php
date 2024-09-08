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
        <h1 class="card-title" style="font-size: 28px;"><strong>DATA MUTASI MENINGGAL DUNIA
            </strong></h1>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <a class="btn btn-primary" href="<?= base_url('admin/tambahmd') ?>" role="button"
                style="background-color: #8e44ad;">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
            <button onclick="printTable()" class="btn btn-primary" style="padding: 5px 20px; font-size: 15px;">
                <i class="fas fa-print"></i> Print
            </button>
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
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($detail_meninggal_disetujui as $data): ?>
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
                            <div class="btn-group">
                                <a href="<?= base_url('admin/hapusmd/hapus/' . $data->id_penduduk) ?>"
                                    class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin hapus?');">
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

<script>
    function printTable() {
        window.print(); // Mencetak halaman saat tombol cetak ditekan
    }
</script>