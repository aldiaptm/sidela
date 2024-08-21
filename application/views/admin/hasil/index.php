<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold">HASIL PERANKINGAN</h6>
                            </div>
                            <div class="card-body">

                                <!-- Print Button -->
                                <button class="btn btn-primary mb-3" onclick="printTable()">Print</button>

                                <div id="printableContent">
                                    <h2 class="m-0 font-weight-bold" text-align="center">REKOMENDASI PENERIMA BANTUAN</h2><br>
                                    <table class="table table-bordered" id="rankingTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Kode</th>
                                                <th class="text-center">Nama Anggota</th>
                                                <th class="text-center">Nilai</th>
                                                <th class="text-center">Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ranking as $index => $alt) : ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $alt['ranking']; ?></td>
                                                    <td class="text-center"><?php echo $alt['kode_alternatif']; ?></td>
                                                    <td><?php echo $alt['nama_alternatif']; ?></td>
                                                    <td class="text-center"><?php echo $alt['nilai_saw']; ?></td>
                                                    <td class="text-center"><?php echo $alt['keterangan']; ?></td>
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


<!-- Print Function Script -->
<script>
    function printTable() {
        var printContents = document.getElementById('printableContent').outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Reload the page to restore the original contents
    }
</script>