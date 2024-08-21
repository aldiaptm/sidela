<style>
    h1,
    label {
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    label {
        color: black;
        font-size: 15px;
        margin-left: 10px;
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
                <div class="card o-hidden border-2 shadow-lg my-5" style="background-color: rgba(255, 255, 255, 0.9); box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><strong>LOGIN USER (MASYARAKAT)</strong></h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="admin" method="POST" action="<?= base_url('user/login'); ?>">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control form-control-admin" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-admin" id="password" name="password" placeholder="Masukkan Kata Sandi">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-admin btn-block" style="color:white; font-size:15px;">
                                            <strong>LOGIN</strong>
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="<?= base_url('user/registration'); ?>" style="color: #3498db; font-size: 18px;">
                                            <i class="fas fa-user-plus"></i> Daftar Akun
                                        </a>
                                    </div>
                                    <hr>
                                    <a href="<?= base_url('index.php'); ?>" class="btn btn-back btn-block">
                                        <strong>KEMBALI KE BERANDA</strong>
                                    </a>
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>