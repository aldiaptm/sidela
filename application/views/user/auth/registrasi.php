<style>
    h1 {
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
</style>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto" style="background-color: rgba(255, 255, 255, 0.5);">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><strong>DAFTAR AKUN PENGGUNA</strong></h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('user/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">

                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" style="color: white; font-size:15px;">
                                <strong>DAFTAR</strong>
                            </button>
                        </form>
                        <hr>
                        <div class="text-center" style="color: white;">
                            <a class="small" href="<?= base_url('user/login'); ?>">
                                <i class="fas fa-arrow-left"></i> Kembali Login
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>