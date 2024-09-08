<!DOCTYPE html>
<html>

<head>
    <title>Data Keluhan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
    <div class="card-header">
        <h1 class="card-title" style="font-size: 28px;"><strong>KELUHAN MASYARAKAT DESA GALANGGANG
            </strong></h1>
    </div>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keluhan as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama_pengisi']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat_pengisi']); ?></td>
                    <td><?php echo htmlspecialchars($row['telpon_pengisi']); ?></td>
                    <td><?php echo htmlspecialchars($row['pesan']); ?></td>
                    <td>
                        <!-- Form untuk menghapus data -->
                        <form action="<?php echo base_url('admin/hapus_keluhan/delete/' . $row['id_keluhan']); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>