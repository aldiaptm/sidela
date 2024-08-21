<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Penduduk</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="<?= base_url('admin/tambahaksi') ?>" method="POST">
        <div class="card-body">
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukan nik" name="nik">
            </div>
            <div class="form-group">
                <label for="rw">RW</label>
                <select class="form-control" id="rw" name="rw">
                    <?php
                    // Buat array dari 1 sampai 30 untuk RW
                    $rw_options = range(1, 30);

                    // Loop untuk menampilkan pilihan RW
                    foreach ($rw_options as $rw) {
                    ?>
                        <option value="<?php echo $rw; ?>">RW <?php echo $rw; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" placeholder="Masukan tempat lahir"
                    name="tempat_lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Masukan tanggal lahir"
                    name="tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="laki laki">laki laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <select class="form-control" id="agama" name="agama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <!-- Tambahkan agama lainnya sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name="alamat">
            </div>

            <div class="form-group">
                <label for="status">Status Pernikahan</label>
                <select class="form-control" id="status" name="status">
                    <option value="">Pilih Status Pernikahan</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <!-- Tambahkan opsi status pernikahan lainnya sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <select class="form-control" id="pekerjaan" name="pekerjaan">
                    <option value="">Pilih Pekerjaan</option>
                    <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Petani/Nelayan">Petani/Nelayan</option>
                    <option value="Pengangguran">Pengangguran</option>
                    <option value="Guru/Dosen">Guru/Dosen</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Perawat">Perawat</option>
                    <option value="Teknisi">Teknisi</option>
                    <option value="Penyiar Televisi/Radio">Penyiar Televisi/Radio</option>
                    <option value="Desainer">Desainer</option>
                    <option value="Montir">Montir</option>
                    <option value="Polisi/Tentara">Polisi/Tentara</option>
                    <option value="Pedagang">Pedagang</option>
                    <option value="Penulis/Editor">Penulis/Editor</option>
                    <option value="Seniman">Seniman</option>
                    <option value="Pilot">Pilot</option>
                    <option value="Pengemudi (Supir)">Pengemudi (Supir)</option>
                    <option value="Satpam/Security">Satpam/Security</option>
                    <option value="Arsitek">Arsitek</option>
                    <option value="Ahli IT">Ahli IT</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Pembantu">Pembantu</option>
                    <option value="Tukang Kebun">Tukang Kebun</option>
                    <option value="Dll.">Dll. (Lainnya)</option>
                    <!-- Tambahkan opsi pekerjaan lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="status_mutasi">Status Penduduk</label>
                <select class="form-control" id="status_mutasi" name="status_mutasi">
                    <option value="">Pilih Status Penduduk</option>
                    <option value="HIDUP">HIDUP</option>
                    <option value="MENINGGAL">MENINGGAL</option>
                    <option value="PINDAH">PINDAH</option>
                    <!-- Tambahkan opsi status pernikahan lainnya sesuai kebutuhan -->
                </select>
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