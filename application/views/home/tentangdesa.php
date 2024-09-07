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
            height: 200px !important;
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

        .carousel {
            position: relative;
            /* Untuk memposisikan indikator dengan benar */
        }

        .carousel .carousel-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 200px;
            color: black;
            font-weight: bold;
            /* Sesuaikan tinggi sesuai kebutuhan */
        }

        .carousel .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 200px;
            /* Sesuaikan tinggi gambar */
            object-fit: cover;
        }

        .carousel .carousel-indicators {
            position: absolute;
            bottom: 10px;
            /* Jarak dari bagian bawah carousel */
            width: 100%;
            text-align: center;
        }

        .carousel .carousel-indicators .indicator-item {
            background-color: #fff;
            /* Warna indikator */
            opacity: 0.7;
            /* Transparansi indikator */
        }

        .carousel .carousel-indicators .indicator-item.active {
            background-color: #000;
            /* Warna indikator aktif */
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
                        <li><a class="list" href="<?= base_url('page') ?>">Beranda</a></li>
                        <li><a class="list" href="">Tentang Desa</a></li>
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
        <li><a class="list" href="<?= base_url('page') ?>">Beranda</a></li>
        <li><a class="list" href="">Tentang Desa</a></li>
        <li><a class="list" href="<?= base_url('home/potensidesa') ?>">Potensi Desa</a></li>
        <li><a class="list" href="<?= base_url('home/keluhan') ?>">Keluhan</a></li><br>
        <h6 style="color: white; margin-left: 15px;">Login Sebagai</h6>
        <li><a class="list" href="<?= base_url('kades/login') ?>">Kades</a></li>
        <li><a class="list" href="<?= base_url('admin/login') ?>">Admin</a></li>
        <li><a class="list" href="<?= base_url('user/login') ?>">User&nbsp;</a></li>
    </ul>
    <section id="about" class="about scrollspy" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <h3 class="center">TENTANG DESA GALANGGANG</h3>
                <hr><br>
                <div class="col m4">
                    <img src="<?php echo base_url('assets/slider/14.jpg') ?>" alt="" style="width: 270px; item-align: center">
                </div>
                <div class="col m8">
                    <h5>Visi</h5>
                    <p>Kebersamaan Dalam Membangun Demi Masa Depan Galanggang Yang Lebih Maju<br></p>
                    <h5>Misi</h5>
                    <ol>
                        <li>Bersama masyarakat memperkuat kelembagaan desa yang ada sehingga dapat melayani masyarakat secara optimal.</li>
                        <li>Bersama masyarakat memperkuat kelembagaan desa menyelenggarakan pemerintahan dan melaksanakan pembangunan yang partisipatif.</li>
                        <li>Bersama masyarakat dan kelembagaan desa dalam mewujudkan Desa Galanggang yang aman, tentram, dan damai.</li>
                        <li>Bersama masyarakat memperkuat kelembagaan desa memberdayakan masyarakat untuk meningkatkan kesejahteraan masyarakat.</li>
                        <li>Melakukan evaluasi kinerja pemerintah desa dan evaluasi, refleksi program untuk mencapai tujuan pembangunan desa.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section id="struktur" class="struktur" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <h3 class="center">STRUKTUR ORGANISASI DESA GALANGGANG</h3>
                <hr><br>=
                <div style="text-align: center">
                    <img src="<?php echo base_url('assets/slider/16.png') ?>" alt="" style="width: 80%">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="carousel">
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KEPALA DESA <br>H. Muhamad Hidayat</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>SEKRETARIS DESA <br>Abdul Wahab Firmansyah</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KASI PEMERINTAHAN <br>Erdi Ermawan Zaenudin</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KASI KESEJAHTERAAN <br>Priyana Armedika</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KASI PELAYANAN <br>Muhamad Iqbal Syahid</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KAUR TATA USAHA & UMUM <br>Beni Nur Hartanto</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KAUR KEUANGAN <br>Reskanita Maulida</a>
                <a class="carousel-item"><img src="<?php echo base_url('assets/slider/profil.jpg') ?>" alt="Kepala Kanjut"><br>KAUR PERENCANAAN <br>Neng Ai Nurazizah</a>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            M.Carousel.init(elems, {
                duration: 100, // Durasi perpindahan menjadi 2 detik
                dist: -30,
                shift: 7,
                padding: 0,
                numVisible: 7,
                indicators: true, // Memastikan indikator ditampilkan
                noWrap: false
            });
        });
    </script>

</body>

</html>