<body class="hold-transition sidebar-mini">
    <style>
        body {
            font-family: Arial, sans-serif;
            /* Font family yang digunakan */
        }

        /* Menghapus garis di atas dan di bawah user panel */
        .user-panel {
            border-top: none;
            border-bottom: none;
        }

        /* Mengatur warna dan font pada sidebar */
        /* Background sidebar */
        .main-sidebar {
            background-color: #2c3e50;
            /* Warna biru tua */
            color: #ffffff;
            /* Warna teks putih */
        }

        /* Brand Logo */
        .brand-link span {
            font-weight: bold;
            font-size: 24px;
            /* Ukuran font judul */
            color: #ffffff;
            /* Warna teks putih */
        }

        /* Sidebar Menu */
        .nav-item .nav-link p {
            font-size: 16px;
            /* Ukuran font teks */
            color: #ffffff;
            /* Warna teks putih */
        }

        /* Sidebar Menu Icon */
        .nav-item .nav-link i {
            color: #ffffff;
            /* Warna ikon putih */
        }

        /* Sidebar Profile Image */
        .user-panel .image img {
            border-radius: 50%;
            /* Bulatkan gambar profil */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* Efek bayangan halus */
        }

        /* Logout Button */
        .btn-danger {
            background: linear-gradient(to right, #3498db, #2980b9);
            /* Gradien biru */
            color: #ffffff;
            /* Warna teks putih */
            border: none;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            /* Efek bayangan halus */
            transition: transform 0.3s ease;
        }

        .btn-danger:hover {
            transform: scale(1.1);
            /* Efek hover scaling */
            background: linear-gradient(to right, #2980b9, #3498db);
            /* Gradien biru terbalik */
        }
    </style>

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color:black; "></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" style="color:black  ; font-size:18px;">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-success elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('user/carapengajuan') ?>" class="brand-link d-flex justify-content-center">
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
                        <a href="user/profile" class="d-block" style="color: #fff;">User</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('user/carapengajuan') ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p style="font-size: 16px;">Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('') ?>" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p style="font-size: 16px;">Pengajuan Mutasi <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('user/meninggaldunia') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="font-size: 14px;">Meninggal Dunia</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('user/berpindahtempat') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="font-size: 14px;">Berpindah Tempat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

                <!-- Logout Button -->
                <div class="mt-5 d-flex justify-content-center">
                    <form action="<?= base_url('user/logout') ?>" method="post">
                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirmLogout()">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
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