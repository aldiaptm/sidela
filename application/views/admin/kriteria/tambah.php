<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('admin/template/header'); ?>

<div id="wrapper">
    <?php $this->load->view('admin/template/sidebar'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?php $this->load->view('admin/template/topbar'); ?>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Input Data Kriteria</h6>
                            </div>
                            <div class="card-body">
                                <?= $this->session->userdata('pesan') ?>
                                <?= form_open('admin/kriteria/tambah') ?>
                                <div class="form-group">
                                    <label>Kode Kriteria</label>
                                    <input type="text" name="kode_kriteria" class="form-control" value="<?= set_value('kode_kriteria') ?>">
                                    <small class="form-text text-danger"><?= form_error('kode_kriteria') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Kriteria</label>
                                    <input type="text" name="nama_kriteria" class="form-control" value="<?= set_value('nama_kriteria') ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_kriteria') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Tipe</label>
                                    <select name="tipe" class="form-control">
                                        <option value="">Pilih</option>
                                        <option <?= set_value('tipe') == 'Cost' ? 'selected' : '' ?>>Cost</option>
                                        <option <?= set_value('tipe') == 'Benefit' ? 'selected' : '' ?>>Benefit</option>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('tipe') ?></small>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php $this->load->view('admin/template/footer_text'); ?>
    </div>
</div>

<?php $this->load->view('admin/template/js'); ?>
<?php $this->load->view('admin/template/footer'); ?>