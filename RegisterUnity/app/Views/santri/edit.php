<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>edit Data santri</h3>
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
            <form method="post" action="<?= base_url('santri/update/' . $santri->id) ?>">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $santri->nama; ?>">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" class="form-control" id="kelas">
                        <option value="1" <?= ($santri->kelas == "1" ? "selected" : "") ?>>Kelas 1</option>
                        <option value="2" <?= ($santri->kelas == "2" ? "selected" : "") ?>>Kelas 2</option>
                        <option value="3" <?= ($santri->kelas == "3" ? "selected" : "") ?>>Kelas 3</option>
                        <option value="5" <?= ($santri->kelas == "5" ? "selected" : "") ?>>Kelas 5</option>
                        <option value="6" <?= ($santri->kelas == "6" ? "selected" : "") ?>>Kelas 6</option>
                        <option value="Private" <?= ($santri->kelas == "Private" ? "selected" : "") ?>>Private</option>
                        <option value="Sifr" <?= ($santri->kelas == "Sifr" ? "selected" : "") ?>>Sifr</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jenis_ujian">Ujian</label>
                    <select name="jenis_ujian" class="form-control" id="jenis_ujian">
                        <option value="Mustawayat 1" <?= $santri->jenis_ujian == "Mustawayat 1" ? "selected" : "" ?>>Mustawayat 1</option>
                        <option value="Mustawayat 2" <?= $santri->jenis_ujian == "Mustawayat 2" ? "selected" : "" ?>>Mustawayat 2</option>
                        <option value="Mustawayat 3" <?= $santri->jenis_ujian == "Mustawayat 3" ? "selected" : "" ?>>Mustawayat 3</option>
                        <option value="Ujian Semester" <?= $santri->jenis_ujian == "Ujian Semester" ? "selected" : "" ?>>Ujian Semester</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="number">Nilai 1</label>
                    <input type="number" class="form-control" id="nilai1" name="nilai1" value="<?= $santri->nilai1 ?>" min="1" max="100" />
                </div>
                <div class="form-group">
                    <label for="number">Nilai 2</label>
                    <input type="number" class="form-control" id="nilai2" name="nilai2" value="<?= $santri->nilai2 ?>" min="1" max="100" />
                </div>
                <div class="form-group">
                    <label for="number">Nilai 3</label>
                    <input type="number" class="form-control" id="nilai3" name="nilai3" value="<?= $santri->nilai3 ?>" min="1" max="100" />
                </div>
                <div class="form-group">
                    <label for="number">Nilai 4</label>
                    <input type="number" class="form-control" id="nilai4" name="nilai4" value="<?= $santri->nilai4 ?>" min="1" max="100" />
                </div>

                <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-info" />
                </div>

            </form>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>