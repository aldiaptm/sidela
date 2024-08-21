<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Alternatif</h6>
                            </div>
                            <div class="card-body">
                                <?= $this->session->userdata('pesan') ?>

                                <!-- Display validation errors -->
                                <?php if (validation_errors()) : ?>
                                    <div class="alert alert-danger">
                                        <?= validation_errors() ?>
                                    </div>
                                <?php endif; ?>

                                <?= form_open_multipart('admin/alternatif/ubah/' . $alternatif->id_alternatif) ?>
                                <?= form_hidden('kode_alternatif_awal', $alternatif->kode_alternatif) ?>

                                <!-- Input fields -->
                                <div class="form-group">
                                    <label>Kode Alternatif</label>
                                    <input type="text" name="kode_alternatif" class="form-control" value="<?= set_value('kode_alternatif', $alternatif->kode_alternatif) ?>">
                                    <small class="form-text text-danger"><?= form_error('kode_alternatif') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" name="nama_alternatif" class="form-control" value="<?= set_value('nama_alternatif', $alternatif->nama_alternatif) ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_alternatif') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat', $alternatif->alamat) ?>">
                                    <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                                </div>
                                <?php foreach ($kriteria as $row) : ?>
                                    <div class="form-group">
                                        <label><?= $row->nama_kriteria ?></label>
                                        <select class="form-control" name="kriteria<?= $row->id_kriteria ?>">
                                            <option value=""></option>
                                            <?php foreach ($subkriteria[$row->id_kriteria] as $row_sub) : ?>
                                                <option value="<?= $row_sub->id_subkriteria ?>" <?= set_select('kriteria' . $row->id_kriteria, $row_sub->id_subkriteria, $atribut[$row->id_kriteria] == $row_sub->id_subkriteria ? TRUE : FALSE) ?>><?= $row_sub->nama_subkriteria ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kriteria' . $row->id_kriteria) ?></small>
                                    </div>
                                <?php endforeach; ?>

                                <!-- Submit button -->
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="<?= site_url('admin/alternatif') ?>" class="btn btn-secondary">Kembali</a>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>