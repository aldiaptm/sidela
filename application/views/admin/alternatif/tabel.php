<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Alternatif</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <!-- <th>No</th> -->
                                                <th>Kode Alternatif</th>
                                                <th>Nama Anggota</th>
                                                <th width="25%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alternatif as $row) : ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?= $row->kode_alternatif ?></td>
                                                    <td><?= $row->nama_alternatif ?></td>
                                                    <td>
                                                        <a href="<?= site_url('admin/alternatif/detail/' . $row->id_alternatif) ?>" class="btn btn-info btn-sm">Detail</a>
                                                        <a href="<?= site_url('admin/alternatif/ubah/' . $row->id_alternatif) ?>" class="btn btn-success btn-sm">Ubah</a>
                                                        <a href="<?= site_url('admin/alternatif/hapus/' . $row->id_alternatif) ?>" data-href="<?= site_url('admin/alternatif/hapus/' . $row->id_alternatif) ?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin akan menghapus data ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var href = $(e.relatedTarget).data('href');
            $(this).find('.btn-ok').attr('href', href);
        });
    });
</script>