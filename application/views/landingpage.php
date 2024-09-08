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

        .brand-logo {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .brand-logo img {
            height: 23px;
            margin-right: 10px;
        }

        .slider {
            height: 550px !important;
            background-color: lightgoldenrodyellow;
            /* margin-top: 8px; */
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
            /* padding: 20px; */
        }

        .footer .container {
            display: flex;
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
                background-color: rgb(147 123 0 / 85%);
            }

            .sidenav .list {
                color: aliceblue;
                font-family: Arial, Helvetica, sans-serif;
            }
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(147 123 0 / 50%);
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
        }

        .dropdown-content li {
            list-style: none;
        }

        .dropdown-content li a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dropdown-content li a:hover {
            background-color: rgb(147 123 0 / 85%);
        }

        /* Show dropdown on hover */
        .nav-wrapper>ul>li:hover .dropdown-content {
            display: block;
        }

        .card {
            height: 450px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar-fixed">
        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="<?= base_url('page') ?>" class="brand-logo">
                        <img src="<?= base_url('assets/icon/logokbb.png') ?>" alt="">
                        SIDELA
                    </a>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="list" href="">Beranda</a></li>
                        <li><a class="list" href="<?= base_url('home/tentangdesa') ?>">Tentang Desa</a></li>
                        <li><a class="list" href="<?= base_url('home/potensidesa') ?>">Potensi Desa</a></li>
                        <li><a class="list" href="<?= base_url('home/keluhan') ?>">Keluhan</a></li>
                        <li>
                            <a class="dropdown-trigger list" href="#" data-target="dropdown1">Login</a>
                            <ul id="dropdown1" class="dropdown-content">
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
        <h6 style="color: white; margin-left: 15px;">Menu</h6>
        <li><a class="list" href="">Beranda</a></li>
        <li><a class="list" href="<?= base_url('home/tentangdesa') ?>">Tentang Desa</a></li>
        <li><a class="list" href="<?= base_url('home/potensidesa') ?>">Potensi Desa</a></li>
        <li><a class="list" href="<?= base_url('home/keluhan') ?>">Keluhan</a></li><br>
        <h6 style="color: white; margin-left: 15px;">Login Sebagai</h6>
        <li><a class="list" href="<?= base_url('kades/login') ?>">Kades</a></li>
        <li><a class="list" href="<?= base_url('admin/login') ?>">Admin</a></li>
        <li><a class="list" href="<?= base_url('user/login') ?>">User&nbsp;</a></li>
    </ul>

    <!-- SLIDER -->
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="<?php echo base_url('assets/slider/11.jpg') ?>" alt="">
                <div class="caption">
                    <h3>WELCOME TO SISTEM INFORMASI DESA GALANGGANG (SIDELA)</h3>
                    <h5>Pelayanan - Kebutuhan - danlainlain</h5>
                </div>
            </li>
            <li>
                <img src="<?php echo base_url('assets/slider/15.jpg') ?>" alt="">
                <div class="caption">
                    <h3>WELCOME TO SISTEM INFORMASI DESA GALANGGANG (SIDELA)</h3>
                    <h5>Pelayanan - Kebutuhan - danlainlain</h5>
                </div>
            </li>
        </ul>
        <p class="pelayanan">Anda dapat mengakses pelayanan dengan melakukan login terlebih dahulu <br> Klik menu 'Login' di pojok kanan atas, lalu pilih user</p>
    </div>

    <div class="container">
        <div class="row">
            <p class="center" style="font-size: 32px; font-weight: bold; margin-bottom: 30px;">
                BERITA SEPUTAR DESA GALANGGANG
            </p>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url('assets/slider/11.jpg') ?>" alt="Berita 1">
                        <span class="card-title"><strong>Launching SIDELA</strong></span>
                    </div>
                    <div class="card-content">
                        <p>SIDELA merupakan Sistem Informasi Desa Galanggang. SIDELA juga Mencakup banyak informasi mengenai Desa Galanggang.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url('assets/slider/11.jpg') ?>" alt="Berita 2">
                        <span class="card-title"><strong>Pembinaan Masyarakat Lansia</strong></span>
                    </div>
                    <div class="card-content">
                        <p>Pembinaan masyarakat lansia merupakan pembinaan yang diikuti oleh masyarakat yang berumur lebih dari 55 tahun.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url('assets/slider/11.jpg') ?>" alt="Berita 3">
                        <span class="card-title"><strong>Pembinaan Aparatur Desa</strong></span>
                    </div>
                    <div class="card-content">
                        <p>Pembinaan ini ditujukan kepada seluruh Aparatur Desa, baik Ketua RT, Ketua RW dan Kepala Dusun atau KADUS.</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SLIDER -->
    <!-- <div class="news">
        <div class="slider" style="margin-top: 10px;">
            <ul class="slides">
                <li>
                    <img src="<?php echo base_url('assets/slider/bantuan1.jpeg') ?>" alt="">
                    <div class="caption">
                        <h3>BANTUAN SOSIAL</h3>
                        <h5>Bantuan sosial adalah bantuan yang diberikan oleh pemerintah, organisasi, atau individu untuk membantu mereka yang membutuhkan. Bantuan ini bisa berbentuk uang, barang, layanan, atau bentuk dukungan lainnya yang dirancang untuk meningkatkan kesejahteraan dan kualitas hidup penerima bantuan.</h5>
                    </div>
                </li>
                <li>
                    <img src="<?php echo base_url('assets/slider/bantuan2.jpeg') ?>" alt="">
                    <div class="caption">
                        <h3>PEMBERITAHUAN PEMBAYARAN PAJAK</h3>
                        <h5>Pajak adalah kontribusi wajib yang dibayar oleh individu atau perusahaan kepada negara atau pemerintah sebagai bagian dari kewajiban hukum. Pajak digunakan untuk membiayai berbagai layanan dan fasilitas publik yang diberikan oleh pemerintah, seperti pendidikan, kesehatan, infrastruktur, keamanan, dan administrasi negara.</h5>
                    </div>
                </li>
            </ul>
            <p class="pelayanan">Anda dapat mengakses pelayanan dengan melakukan login terlebih dahulu <br> Klik menu 'Login' di pojok kanan atas, lalu pilih user</p>
        </div>
    </div> -->
    <section>
        <div class="footer">
            <div class="container">
                <div class="col-4">
                    <h5>Pelayanan Kami</h5>
                    <img style="width: 180px; padding: 20px;" src="<?= base_url('assets/icon/logokbb.png') ?>" alt="">
                </div>
                <div class="col-4">
                    <h6><a class="list" href="" style="color: black">Beranda</a></h6>
                    <h6><a class="list" href="<?= base_url('home/tentangdesa') ?>" style="color: black">Tentang Desa</a></h6>
                    <h6><a class="list" href="<?= base_url('home/potensidesa') ?>" style="color: black">Potensi Desa</a></h6>
                    <h6><a class="list" href="<?= base_url('home/keluhan') ?>" style="color: black">Keluhan</a></h6>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Dropdown
            const dropdowns = document.querySelectorAll('.dropdown-trigger');
            M.Dropdown.init(dropdowns, {
                alignment: 'right',
                coverTrigger: false
            });
        });

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

        // Initialize Dropdown
        const dropdowns = document.querySelectorAll('.dropdown-trigger');
        M.Dropdown.init(dropdowns, {
            alignment: 'right', // Atur alignment sesuai kebutuhan
            coverTrigger: false // Atur jika dropdown harus menutup saat klik di luar
        });
    </script>

</body>

</html>