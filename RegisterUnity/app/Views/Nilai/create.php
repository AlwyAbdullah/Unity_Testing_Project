<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Nilai</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('nilai/store') ?>">
                <?= csrf_field(); ?>

                <?php foreach ($nilai as $row) { ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_santri" name="id_santri" value="<?= $row->id_santri  ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row->nama  ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $row->kelas  ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jenis_ujian">Ujian</label>
                        <select name="jenis_ujian" class="form-control" id="jenis_ujian">
                            <option value="Mustawayat 1">Mustawayat 1</option>
                            <option value="Mustawayat 2">Mustawayat 2</option>
                            <option value="Mustawayat 3">Mustawayat 3</option>
                            <option value="Ujian Semester">Ujian Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number">Nilai 1</label>
                        <input type="number" class="form-control" id="nilai1" name="nilai1" value="<?= old('email') ?>" min="1" max="100" />
                    </div>
                    <div class="form-group">
                        <label for="number">Nilai 2</label>
                        <input type="number" class="form-control" id="nilai2" name="nilai2" value="<?= old('email') ?>" min="1" max="100" />
                    </div>
                    <div class="form-group">
                        <label for="number">Nilai 3</label>
                        <input type="number" class="form-control" id="nilai3" name="nilai3" value="<?= old('email') ?>" min="1" max="100" />
                    </div>
                    <div class="form-group">
                        <label for="number">Nilai 4</label>
                        <input type="number" class="form-control" id="nilai4" name="nilai4" value="<?= old('email') ?>" min="1" max="100" />
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Simpan" class="btn btn-success text-white mt-2 " />
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>