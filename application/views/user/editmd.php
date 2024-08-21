<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Detail Meninggal</h3>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="<?= base_url('user/editmd/update_data') ?>" method="POST">
        <div class="card-body">
            <!-- Input hidden untuk menyimpan ID detail_meninggal -->
            <input type="hidden" name="id_detail_meninggal" value="<?= !empty($detail_meninggal['id_detail_meninggal']) ? $detail_meninggal['id_detail_meninggal'] : '' ?>">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama"
                    value="<?= !empty($detail_meninggal['nama']) ? $detail_meninggal['nama'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_kematian">Tanggal Kematian</label>
                <input type="date" class="form-control" id="tanggal_kematian" placeholder="Masukkan tanggal kematian"
                    name="tanggal_kematian" value="<?= !empty($detail_meninggal['tanggal_kematian']) ? $detail_meninggal['tanggal_kematian'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="tempat_kematian">Tempat Kematian</label>
                <input type="text" class="form-control" id="tempat_kematian" placeholder="Masukkan Tempat Kematian"
                    name="tempat_kematian" value="<?= !empty($detail_meninggal['tempat_kematian']) ? $detail_meninggal['tempat_kematian'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="tempat_kelahiran">Tempat Kelahiran</label>
                <input type="text" class="form-control" id="tempat_kelahiran" placeholder="Masukkan Tempat Kelahiran"
                    name="tempat_kelahiran" value="<?= !empty($detail_meninggal['tempat_kelahiran']) ? $detail_meninggal['tempat_kelahiran'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_kelahiran">Tanggal Kelahiran</label>
                <input type="date" class="form-control" id="tanggal_kelahiran" placeholder="Masukkan tanggal kelahiran"
                    name="tanggal_kelahiran" value="<?= !empty($detail_meninggal['tanggal_kelahiran']) ? $detail_meninggal['tanggal_kelahiran'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" placeholder="Masukkan Keterangan"
                    name="keterangan" value="<?= !empty($detail_meninggal['keterangan']) ? $detail_meninggal['keterangan'] : '' ?>">
            </div>

            <!-- Tombol Simpan Data -->
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Data
            </button>

            <!-- Tombol Reset -->
            <button type="reset" class="btn btn-secondary">
                <i class="fas fa-sync-alt"></i> Reset
            </button>
        </div>
    </form>
</div>
