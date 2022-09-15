<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data santri</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('/santri/create'); ?>" class="btn btn-primary">Tambah Santri</a>
            <a href="<?= base_url('/nilai/create'); ?>" class="btn btn-success">Tambah Nilai</a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Action</th>
                    <!-- <th>Jenis Ujian</th>
                    <th>Nilai 1</th>
                    <th>Nilai 2</th>
                    <th>Nilai 3</th>
                    <th>Nilai 4</th> -->
                </tr>
                <?php
                $no = 1;
                foreach ($santri as $row) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->kelas; ?></td>
                        <td>
                            <a title="Edit" href="<?= base_url("santri/edit/$row->id"); ?>" class="btn btn-info text-white">Edit</a>
                            <a title="Delete" href="<?= base_url("santri/delete/$row->id") ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            <a title="Detail" href="<?= base_url("nilai/detail/$row->id"); ?>" class="btn btn-success">Detail</a>
                            <a title="Add" href="<?= base_url("nilai/create/$row->id"); ?>" class="btn btn-warning text-white">Add Nilai</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>