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

        .dropdown {
            display: none;
        }

        nav .container .nav-wrapper ul li:hover .dropdown {
            display: block;
            background-color: rgb(0 0 0 / 30%);
            position: absolute;
        }

        .brand-logo {
            font-weight: bolder;
            font-style: italic;
            font-family: cursive;
            text-shadow: 3px 2px 1px grey;
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
            /* Agar gambar memenuhi area slider dengan proporsi yang baik */
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
            padding: 2px;
            text-align: center;
        }

        .footer {
            background-color: rgb(170 152 50 / 87%);
        }

        .footer .container {
            align-items: center;
            text-align: center;
            display: flex;
        }

        .col-4 {
            padding: 20px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <div class="navbar-fixed">
        <nav class="peach darken-3">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="" class="brand-logo"><img src="" alt="">
                        <img src="<?= base_url('assets/icon/logokbb.png') ?>">SIDELA
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="list" href="">Beranda</a></li>
                        <li><a class="list" href="#about">Tentang Desa</a></li>
                        <li><a class="list" href="#potensi">Potensi Desa</a></li>
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

    <!-- Content About Us -->
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
                    <p>Kebersamaan Dalam Membangun Demi Masa Depan Galanggang Yang Lebih Maju<br>
                    </p>
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
    <section id="about" class="about scrollspy" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <h3 class="center">STRUKTUR ORGANISASI DESA GALANGGANG</h3>
                <hr><br>
                <div class="col m4">
                    <div style="text-align: center">
                        <img src="<?php echo base_url('assets/slider/16.png') ?>" alt="" style="width: 800px">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SLIDER -->
    <div class=" news">
        <div class="slider" style="margin-top: 200px;">
            <ul class="slides">
                <li>
                    <img src="<?php echo base_url('assets/slider/bantuan1.jpeg') ?>" alt="">
                    <div class="caption">
                        <h3>PEMBERITAHUAN BANTUAN SOSIAL</h3>
                        <h5>Bantuan sosial adalah dukungan atau bantuan yang diberikan oleh pemerintah, organisasi, atau individu untuk membantu mereka yang membutuhkan. Bantuan ini bisa berbentuk uang, barang, layanan, atau bentuk dukungan lainnya yang dirancang untuk meningkatkan kesejahteraan dan kualitas hidup penerima bantuan.</h5>
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
    </div>

    <section id="potensi" class="potensi scrollspy" style="padding-top: 20px">
        <div class="container">
            <div class="row">
                <h3 class="center">POTENSI DESA GALANGGANG</h3>
                <hr><br>
                <div class="col m6 center">

                    <img src="<?php echo base_url('assets/slider/17.jpg') ?>" alt="" style="width: 270px; item-align: center">
                </div>
                <div class="col m6 center">
                    <h5>Kebun Demplot</h5>
                    <p>Kebun Demplot merupakan salah satu bentuk potensi Desa Galanggang. Sebagai contoh yang terdapat pada gambar di samping, kebun demplot tersebut merupakan milik Kelompok Tani Cipta Mandiri 5 yang terletak di Hegarmanah RW 05 Desa Galanggang, Kecamatan Batujajar, Kabupaten Bandung Barat, Jawa Barat 40561</p>
                </div>
            </div>
            <div class="row">
                <div class="col m4">
                    <img src="<?php echo base_url('assets/slider/18.jpg') ?>" alt="" style="width: 270px; item-align: center">
                    <img src="<?php echo base_url('assets/slider/21.jpg') ?>" alt="" style="width: 270px; item-align: center">
                </div>
                <div class="col m4">
                    <img src="<?php echo base_url('assets/slider/19.jpg') ?>" alt="" style="width: 270px; item-align: center">
                    <img src="<?php echo base_url('assets/slider/22.jpg') ?>" alt="" style="width: 270px; item-align: center">
                </div>
                <div class="col m4">
                    <img src="<?php echo base_url('assets/slider/20.jpg') ?>" alt="" style="width: 270px; item-align: center">
                    <img src="<?php echo base_url('assets/slider/23.jpg') ?>" alt="" style="width: 270px; item-align: center">
                </div>
            </div>
        </div>
    </section>

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
                <div class="col-4" style="margin-top:50px">
                    <h5>Pelayanan Kami</h5>
                    <img style="width: 180px; padding: 20px;" src="<?= base_url('assets/icon/logokbb.png') ?>" alt="">
                </div>
                <div class="col-4" style="margin-left: 100px;">
                    <h6><a class="list" href="" style="color: black">Beranda</a></h6>
                    <h6><a class="list" href="#about" style="color: black">Tentang Desa</a></h6>
                    <h6><a class="list" href="#potensi" style="color: black">Potensi Desa</a></h6>
                    <h6><a class="list" href="#keluhan" style="color: black">Keluhan</a></h6>
                </div>
                <div class="col-4" style="margin-left: 50px;">
                    Untuk melakukan pelayanan seperti pengajuan mutasi penduduk, anda dapat melakukan login terlebih dahulu pada menu 'Login' yang ada di pojok kanan atas. Loginlah sebagai User (Masyarakat), registrasi terlebih dahulu jika belum mempunyai akun. Selamat beraktivitas!
                </div>
            </div>
        </div>
    </section>

    <footer>
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
    </script>
</body>

</html>