<body class="hold-transition sidebar-mini">
    <style>
        .nav-item .nav-link p {
            font-size: 18px;
            /* Ganti dengan ukuran font yang diinginkan */
        }

        .main-sidebar {
            background-color: #424242;
            /* Ganti dengan warna yang diinginkan */
        }

        .nav-item .nav-link p {
            color: black;
            /* Ganti dengan warna yang diinginkan, misalnya warna merah (#ff0000) */
        }

        .main-header {
            background-color: #00BCD4;
        }

        .navbar-nav .nav-link {
            color: #fff;
            /* Ganti dengan warna yang diinginkan, misalnya warna biru (#3498db) */
        }

        .info a {
            color: #e74c3c;
            /* Ganti dengan warna yang diinginkan, misalnya warna merah tua (#e74c3c) */
        }

        .navbar {
            background-color: #28a745;
        }


        .brand-link {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand-link span {
            font-family: Arial, sans-serif;
            /* Ganti dengan font yang Anda inginkan */
            font-weight: bold;
            font-size: 24px;
            /* Sesuaikan dengan ukuran yang diinginkan */
            color: white;
        }

        /* CSS untuk desain tombol logout yang menarik */
        .btn-danger {
            background: linear-gradient(to right, #ff416c, #ff4b2b);
            color: #fff;
            border: none;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .btn-danger:hover {
            transform: scale(1.1);
            background: linear-gradient(to right, #ff4b2b, #ff416c);
        }

        aside {
            height: 1000px !important;
        }
    </style>

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color:white; "></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" style="color:white  ; font-size:17px;">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4" style="height: 100vh;">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin/dashboard') ?>" class="brand-link d-flex justify-content-center">
                <span class="font-weight-bold-light"><img src="<?= base_url('assets/icon/logokbb.png') ?>" alt="" style="width: 25px">&nbsp;SIDELA</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color: #fff;">Admin</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p style="color: white; ">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/datapenduduk') ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p style="color: white;  ">Data Penduduk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/datauser') ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p style="color: white;  ">Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/keluhan') ?>" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p style="color: white;  ">Data Keluhan</p>
                            </a>
                        </li>
                        <li class="nav">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p style="color: white;  ">DATA SAW :</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('') ?>" class="nav-link ">
                                <i class="nav-icon fas fa-database"></i>
                                <p style="color: white;">
                                    Alternatif
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/alternatif/tambah') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px; ">Input Data</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/alternatif') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px;">Data Alternatif</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/penilaian') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-check-circle"></i>
                                <p style="color: white;  ">Penilaian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/hasil') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-check-circle"></i>
                                <p style="color: white;  ">Hasil</p>
                            </a>
                        </li>
                        <li class="nav">
                            <a href="#" class="nav-link">
                                <i class=""></i>
                                <p style="color: white;  ">DATA MUTASI :</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('') ?>" class="nav-link ">
                                <i class="nav-icon fas fa-database"></i>
                                <p style="color: white;">
                                    Kelola Mutasi Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/mutasimd') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px; ">Meninggal Dunia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/mutasibt') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px;">Berpindah Tempat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('') ?>" class="nav-link ">
                                <i class="nav-icon fas fa-list"></i>
                                <p style="color: white;">
                                    Daftar Mutasi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/daftarmd') ?>" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px; ">Meninggal Dunia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/daftarbt') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white; font-size: 18px;">Berpindah Tempat</p>
                                    </a>
                                </li>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
                <div class="mt-5 d-flex justify-content-center">
                    <form action="<?= base_url('admin/logout') ?>" method="post">
                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirmLogout()">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
                <!-- /.sidebar-menu -->
            </div>
            <!-- Bagian logout -->
            <!-- /.logout -->
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h2 class="m-0">Dashboard</h2> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">