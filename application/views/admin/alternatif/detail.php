<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Data Alternatif</h6>
                            </div>
                            <div class="card-body">
                                <?= anchor('admin/alternatif', 'Kembali', 'class="btn btn-secondary"') ?>
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td width="25%">NIK</td>
                                            <td><?= $alternatif->kode_alternatif ?></td>
                                        </tr>
                                        <tr>
                                            <td width="25%">Nama Anggota</td>
                                            <td><?= $alternatif->nama_alternatif ?></td>
                                        </tr>
                                        <?php foreach ($kriteria as $row) : ?>
                                            <tr>
                                                <td width="25%"><?= $row->nama_kriteria ?></td>
                                                <td><?= $alternatif_kriteria[$row->id_kriteria] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>