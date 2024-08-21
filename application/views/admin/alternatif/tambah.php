<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Input Data Alternatif</h6>
                            </div>
                            <div class="card-body">
                                <?= $this->session->userdata('pesan') ?>
                                <?= form_open_multipart('admin/alternatif/tambah') ?>
                                <div class="form-group">
                                    <label>Kode Alternatif</label>
                                    <input type="text" name="kode_alternatif" class="form-control" value="<?= set_value('kode_alternatif') ?>">
                                    <small class="form-text text-danger"><?= form_error('kode_alternatif') ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" name="nama_alternatif" class="form-control" value="<?= set_value('nama_alternatif') ?>">
                                    <small class="form-text text-danger"><?= form_error('nama_alternatif') ?></small>
                                </div>
                                <?php foreach ($kriteria as $row) : ?>
                                    <div class="form-group">
                                        <label><?= $row->nama_kriteria ?></label>
                                        <select class="form-control" name="kriteria<?= $row->id_kriteria ?>">
                                            <option value=""></option>
                                            <?php foreach ($subkriteria[$row->id_kriteria] as $row_sub) : ?>
                                                <option value="<?= $row_sub->id_subkriteria ?>" <?= set_select('kriteria' . $row->id_kriteria, $row_sub->id_subkriteria) ?>><?= $row_sub->nama_subkriteria ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kriteria' . $row->id_kriteria) ?></small>
                                    </div>
                                <?php endforeach; ?>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>