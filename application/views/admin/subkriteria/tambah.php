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
                                <h6 class="m-0 font-weight-bold text-primary">Input Data Subkriteria</h6>
                            </div>
                            <div class="card-body">
                                <?= $this->session->userdata('pesan') ?>
                                <?= form_open('admin/subkriteria/tambah') ?>
                                <div class="form-group">
                                    <label>Kriteria</label>
                                    <select name="id_kriteria" class="form-control">
                                        <option value="">Pilih...</option>
                                        <?php foreach ($kriteria as $row) : ?>
                                            <option value="<?= $row->id_kriteria ?>" <?= set_value('id_kriteria') == $row->id_kriteria ? 'selected' : '' ?>><?= $row->kode_kriteria . ' - ' . $row->nama_kriteria ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="form-text text-danger"><?= form_error('id_kriteria') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Subkriteria</label>
                                    <input type="text" name="nama_subkriteria" class="form-control" value="<?= set_value('nama_subkriteria') ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_subkriteria') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?= set_value('keterangan') ?>">
                                    <small class="form-text text-danger"><?= form_error('keterangan') ?></small>
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