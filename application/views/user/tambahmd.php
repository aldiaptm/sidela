<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('user_data')) {
    redirect('user/login');
}
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Formulir Pengajuan Untuk Mutasi Meninggal Dunia Pengguna</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="<?= base_url('user/tambah_aksi_meninggal') ?>" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="nik"> NIK</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukan NIK" name="nik">
            </div>
            <!-- <div class="form-group">
                <label for="nama"> Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama">
            </div> -->
            <div class="form-group">
                <label for="tanggal_kematian">Tanggal Kematian</label>
                <input type="date" class="form-control" id="tanggal_kematian" placeholder="Masukan tanggal kematian" name="tanggal_kematian">
            </div>
            <div class="form-group">
                <label for="tempat_kematian">Tempat Kematian</label>
                <input type="text" class="form-control" id="tanggal_lahir" placeholder="Masukan tempat kematian" name="tempat_kematian">
            </div>
            <div class="form-group">
                <label for="tempat_kelahiran">Tempat Kelahiran</label>
                <input type="text" class="form-control" id="tempat_kelahiran" placeholder="Masukan tempat kelahiran" name="tempat_kelahiran">
            </div>
            <div class="form-group">
                <label for="tanggal_kelahiran">Tanggal Kelahiran</label>
                <input type="date" class="form-control" id="tanggal_kelahiran" placeholder="Masukan tanggal kelahiran" name="tanggal_kelahiran">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="Masukan keterangan" name="keterangan">
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