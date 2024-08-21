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
        <h1 class="card-title" style="font-size: 20px;">DATA USER (WARGA PENGGUNA SIDELA)</h1>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->name; ?></td>
                        <td><?= $data->email; ?></td>
                        <td><?= $data->password; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= base_url('admin/hapus_user/delete/' . $data->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin hapus?');">
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