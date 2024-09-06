<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDELA | HOME</title>
    <link rel="stylesheet" href="<?= base_url('assets/templates') ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="icon" type="image/png" href="<?= base_url('assets/icon/logokbb.png') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/materialize/css/materialize.min.css'); ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        nav {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', 'Geneva', 'Verdana', 'sans-serif';
            background-color: rgb(147 123 0 / 85%);
        }

        .brand-logo img {
            height: 23px;
            margin-right: 10px;
        }

        .slider {
            height: 550px !important;
            background-color: lightgoldenrodyellow;
        }

        .slider .slides li img {
            height: 100% !important;
            width: 100%;
            object-fit: cover;
        }

        .about {
            height: 520px !important;
        }

        .slides {
            text-shadow: 3px 2px 1px grey;
        }

        .pelayanan {
            text-align: center;
            font-family: 'Courier New', Courier, monospace;
            text-shadow: 1px 1px 1px grey;
            margin-top: 50px;
        }

        footer {
            background-color: rgb(157 139 50 / 87%);
            padding: 20px;
            text-align: center;
        }

        .footer {
            background-color: rgb(170 152 50 / 87%);
            padding: 20px;
        }

        .footer .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .col-4 {
            padding: 20px;
        }

        @media only screen and (max-width: 600px) {
            .col-4 {
                width: 100%;
                padding: 10px;
            }

            .footer .container {
                flex-direction: column;
            }
        }

        /* Responsif Navbar */
        @media only screen and (max-width: 992px) {
            .hide-on-med-and-down {
                display: none;
            }

            .sidenav {
                width: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="index.php" class="brand-logo">
                        <img src="<?= base_url('assets/icon/logokbb.png') ?>" alt="">
                        SIDELA
                    </a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="list" href="">Beranda</a></li>
                        <li><a class="list" href="<?= base_url('home/tentangdesa') ?>">Tentang Desa</a></li>
                        <li><a class="list" href="<?= base_url('home/potensidesa') ?>">Potensi Desa</a></li>
                        <li><a class="list" href="#keluhan">Keluhan</a></li>
                        <li><a class="list" href="#">Login</a>
                            <ul class="dropdown">
                                <li><a class="list" href="<?= base_url('kades/login') ?>">Kades</a></li>
                                <li><a class="list" href="<?= base_url('admin/login') ?>">Admin</a></li>
                                <li><a class="list" href="<?= base_url('user/login') ?>">User&nbsp;</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Side Navigation for Mobile -->
    <ul id="mobile-nav" class="sidenav">
        <li><a class="list" href="<?= base_url('page') ?>">Beranda</a></li>
        <li><a class="list" href="<?= base_url('home/tentangdesa') ?>">Tentang Desa</a></li>
        <li><a class="list" href="<?= base_url('home/potensidesa') ?>">Potensi Desa</a></li>
        <li><a class="list" href="">Keluhan</a></li>
        <li><a class="list" href="#">Login</a>
            <ul class="dropdown">
                <li><a class="list" href="<?= base_url('kades/login') ?>">Kades</a></li>
                <li><a class="list" href="<?= base_url('admin/login') ?>">Admin</a></li>
                <li><a class="list" href="<?= base_url('user/login') ?>">User&nbsp;</a></li>
            </ul>
        </li>
    </ul>

    <section id="keluhan" class="keluhan scrollspy" style="padding-top: 20px">
        <div class="container">
            <div class="row">
                <h3 class="center">SAMPAIKAN KELUHAN ANDA</h3>
                <hr>
                <p class="center">Isi formulir di bawah, lalu tekan kirim untuk menyampaikan keluhan anda.</p>
                <div class="col m5 s12">
                    <div class="card-panel brown darken-3 center white-text">
                        <i class="material-icons medium">mail</i>
                        <h4>Kritik & Saran</h4>
                    </div>
                </div>
                <div class="col m7 s12">
                    <form action="<?= base_url('admin/tambah_keluhan') ?>" method="POST">
                        <?php echo validation_errors(); ?>
                        <div class="card-panel">
                            <div class="input-field">
                                <input type="text" name="nama_pengisi" id="nama_pengisi">
                                <label for="nama_pengisi">Nama :</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="alamat_pengisi" id="alamat_pengisi">
                                <label for="alamat_pengisi">Alamat :</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="telpon_pengisi" id="telpon_pengisi">
                                <label for="telpon_pengisi">Telepon :</label>
                            </div>
                            <div class="input-field">
                                <textarea class="materialize-textarea" name="pesan" id="pesan"></textarea>
                                <label for="pesan">Pesan :</label>
                            </div>
                            <button type="submit" class="btn btn-keluhan" value="Kirim">
                                <strong>Kirim</strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="footer">
            <div class="container">
                <div class="col-4">
                    <h5>Pelayanan Kami</h5>
                    <img style="width: 180px; padding: 20px;" src="<?= base_url('assets/icon/logokbb.png') ?>" alt="">
                </div>
                <div class="col-4">
                    <h6><a class="list" href="" style="color: black">Beranda</a></h6>
                    <h6><a class="list" href="#about" style="color: black">Tentang Desa</a></h6>
                    <h6><a class="list" href="#potensi" style="color: black">Potensi Desa</a></h6>
                    <h6><a class="list" href="#keluhan" style="color: black">Keluhan</a></h6>
                </div>
                <div class="col-4">
                    Untuk melakukan pelayanan seperti pengajuan mutasi penduduk, anda dapat melakukan login terlebih dahulu pada menu 'Login' yang ada di pojok kanan atas. Loginlah sebagai User (Masyarakat), registrasi terlebih dahulu jika belum mempunyai akun. Selamat beraktivitas!
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy;Copyright | SIDELA <?php echo date('Y'); ?></p>
    </footer>

    <script type="text/javascript" src="<?php echo base_url('assets/materialize/js/materialize.min.js'); ?>"></script>

    <!-- slider -->
    <script type="text/javascript">
        const slider = document.querySelectorAll('.slider');
        M.Slider.init(slider, {
            duration: 400,
            interval: 5000
        });

        const materialbox = document.querySelectorAll('.materialboxed');
        M.Materialbox.init(materialbox);

        const scroll = document.querySelectorAll('.scrollspy');
        M.ScrollSpy.init(scroll, {
            scrollOffset: 50
        });

        // Initialize Sidenav for mobile
        const sidenav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sidenav);
    </script>
</body>

</html>