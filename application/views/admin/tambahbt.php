<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Berpindah Tempat</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="<?= base_url('admin/tambah_aksi_pindah') ?>" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="nik"> NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukan NIK" name="nik">
            </div>
            <div class="form-group">
                <label for="nama"> Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama">
            </div>
            <div class="form-group">
                <label for="tanggal_pindah">Tanggal Pindah</label>
                <input type="date" class="form-control" id="tanggal_pindah placeholder=" Masukan tanggal pindah"
                    name="tanggal_pindah">
            </div>
            <div class="form-group">
                <label for="alamat_asli">Alamat Asli</label>
                <input type="text" class="form-control" id="alamat_asal" placeholder="Masukan Alamat Asli"
                    name="alamat_asal">
            </div>
            <div class="form-group">
                <label for="alamat_tujuan">Alamat Tujuan</label>
                <input type="text" class="form-control" id="alamat_tujuan" placeholder="Masukan Alamat Tujuan"
                    name="alamat_tujuan">
            </div>
            <div class="form-group">
                <label for="alasan_pindah">Keterangan Pindah</label>
                <input type="text" class="form-control" id="alasan_pindah" placeholder="Masukan Alasan Pindah"
                    name="alasan_pindah">
            </div>


            <!-- Tombol Simpan Data -->
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Data
            </button>

            <!-- Tombol Reset -->
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-sync-alt"></i> Reset
            </button>
        </div>
    </form>
</div>