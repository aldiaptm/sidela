<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$this->session->userdata('user_data')) {
    redirect('user/login');
}
?>
<style>
    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #007bff;
        text-align: center;
        margin-bottom: 30px;
    }

    h3 {
        color: #007bff;
        margin-bottom: 20px;
    }

    ul {
        list-style-type: none;
        padding-left: 20px;
    }

    li {
        line-height: 1.8;
    }

    hr {
        border-top: 1px solid #ddd;
        margin-top: 40px;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <h1>Cara Pengajuan Mutasi</h1>

    <div>
        <h3>Langkah-langkah Pengajuan Mutasi:</h3>
        <ol>
            <li>Pilih menu <strong>Pengajuan Mutasi</strong> pada sidebar.</li>
            <li>Pilih jenis mutasi yang ingin diajukan:
                <ul>
                    <li>Untuk <strong>Mutasi Meninggal Dunia</strong>: Klik pada menu <strong>Mutasi Meninggal Dunia</strong> di submenu.</li>
                    <li>Untuk <strong>Mutasi Berpindah Tempat</strong>: Klik pada menu <strong>Mutasi Berpindah Tempat</strong> di submenu.</li>
                </ul>
            </li>
            <li>Isi formulir pengajuan mutasi sesuai dengan petunjuk yang tersedia.</li>
            <li>Klik tombol <strong>Submit</strong> untuk mengirim pengajuan.</li>
        </ol>
    </div>
    <div class="container d-flex">
        <div class="col-lg-6">
            <div style="margin-bottom: 10px;">
                <a class="btn btn-primary" href="<?= base_url('user/tambahmd') ?>" role="button" style="background-color: #8e44ad;">
                    <i class=""></i> Ajukan Mutasi Meninggal Dunia
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div style="margin-bottom: 10px;">
                <a class="btn btn-primary" href="<?= base_url('user/tambahbt') ?>" role="button" style="background-color: #8e44ad;">
                    <i class=""></i> Ajukan Mutasi Berpindah Tempat
                </a>
            </div>
        </div>
    </div>
    <div>
        <h3>Catatan:</h3>
        <p>Setelah pengajuan mutasi dilakukan, silahkan tunggu konfirmasi dari pihak yang berwenang terkait proses pengajuan Anda 1x24 jam.</p>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>