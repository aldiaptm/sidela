<style>
    /* Gaya untuk judul dan label */
    h1,
    label {
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    label {
        color: black;
        font-size: 15px;
        margin-left: 10px;
    }

    /* Gaya untuk tombol login */
    .btn-admin {
        background-color: #4CAF50;
        /* Warna hijau */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 10px;
        transition-duration: 0.4s;
    }

    .btn-admin:hover {
        background-color: #45a049;
        /* Warna hijau lebih gelap saat hover */
    }

    /* Gaya untuk latar belakang kartu */
    .card {
        background-color: rgba(255, 255, 255, 0.5);
        /* Warna putih transparan */
    }
</style>

<body>
    <div class="container pt-4">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6" style="padding-top: 50px">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><strong>SISTEM INFORMASI DESA <br> GALANGGANG</strong></h1>
                </div>
                <div class="text-center">
                    <img src="<?= base_url('assets/icon/logokbb.png') ?>" style="width: 350px;">
                </div>
            </div>
            <div class="col-lg-6" style="padding-left: 50px; padding-right: 50px">
                <div class="card o-hidden border-2 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="" style="padding: 50px">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><strong>LOGIN ADMIN</strong></h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="POST" action="<?= base_url('admin/login'); ?>">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Kata Sandi">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-admin btn-block">
                                            <strong>LOGIN</strong>
                                        </button>
                                    </form>
                                    <br>
                                    <a href="<?= base_url('index.php'); ?>" class="btn btn-back btn-block">
                                        <strong>KEMBALI KE BERANDA</strong>
                                    </a>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>