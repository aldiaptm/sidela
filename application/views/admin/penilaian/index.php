<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-0 font-weight-bold">Perhitungan Metode SAW</h3>
                            </div>
                            <div class="card-body">
                                <?php if (is_null($hasil)) : ?>
                                    <div class="alert alert-warning" role="alert">Tidak ada alternatif</div>
                                    <hr>
                                <?php else : ?>

                                    <?php if (!is_null($tabel1)) : ?>
                                        <table class='table table-striped table-bordered'>
                                            <?= $tabel1; ?>
                                        </table>
                                    <?php endif; ?>
                                    <?php if (!is_null($tabel2)) : ?>
                                        <table class='table table-striped table-bordered mt-4'>
                                            <?= $tabel2; ?>
                                        </table>
                                    <?php endif; ?>
                                    <?= $perhitungan; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>