<style>
    .row {
        display: flex;
        justify-content: center;
        align-items: stretch;
        /* Mengubah align-items menjadi stretch */
        gap: 20px;
    }

    .col-lg-3 {
        flex: 1 1 auto;
        min-width: 250px;
        max-width: 300px;
    }

    .small-box {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        /* Mengatur tinggi kotak agar rata */
    }

    .small-box:hover {
        transform: translateY(-5px);
    }

    .inner {
        margin-bottom: 20px;
    }

    .inner p {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .icon {
        font-size: 40px;
        color: #666;
    }

    .small-box-footer {
        color: #007bff;
        text-decoration: none;
        font-weight: 600;
        display: block;
        transition: color 0.3s ease;
    }

    .small-box-footer:hover {
        color: #0056b3;
    }

    .content {
        margin-top: -25px;
    }

    .content .container-fluid h1 {
        font-weight: bolder;
        text-align: center;
        color: #666;
    }

    .content .container-fluid h4 {
        font-weight: bolder;
        text-align: center;
        color: #666;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <h1>"SIDELA"</h1>
        <h1>SISTEM INFORMASI DESA GALANGGANG</h1>
        <H4>KABUPATEN BANDUNG BARAT</H4><br>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jumlah_penduduk; ?></h3>
                        <p>Data Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('kades/datapenduduk') ?>" class="small-box-footer">View details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jumlah_meninggal; ?></h3>
                        <p>Mutasi Meninggal Dunia</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <a href="<?= base_url('kades/mutasimd') ?>" class="small-box-footer">View details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jumlah_pindah; ?></h3>
                        <p>Mutasi Berpindah Tempat</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <a href="<?= base_url('kades/mutasibt') ?>" class="small-box-footer">View details <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>