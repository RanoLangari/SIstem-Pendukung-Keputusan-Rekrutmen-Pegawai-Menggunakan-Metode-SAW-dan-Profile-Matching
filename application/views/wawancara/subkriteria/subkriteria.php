<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Subkriteria</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">
                        <?= form_error('subkriteria', '<div class="alert
        alert-danger" role="alert">', '</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>
                        <a href="<?= base_url('wawancara/tambahsubkriteria'); ?>" class="btn btn-secondary mb-3">Tambah SubKriteria</a>
                        <a href="<?= base_url('wawancara/tambah_detail'); ?>" class="btn btn-secondary mb-3">Tambah Penilaian SubKriteria</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Nama Sub Kriteria</th>
                                        <th scope="col">Faktor</th>
                                        <th scope="col">Nilai Target</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = "SELECT subkriteria.id_subkriteria,kriteria.id_kriteria, subkriteria.nama_subkriteria, subkriteria.faktor, subkriteria.nilai_subkriteria, kriteria.nama_kriteria FROM subkriteria INNER JOIN kriteria ON subkriteria.id_kriteria = kriteria.id_kriteria";
                                $datasubkriteria = $this->db->query($query)->result_array();
                                ?>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subkriteria as $sk) : ?>
                                        <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $sk['nama_kriteria']; ?></td>
                                            <td><?= $sk['nama_subkriteria']; ?></td>
                                            <td><?= $sk['faktor']; ?></td>
                                            <td><?= $sk['nilai_subkriteria']; ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>wawancara/editsubkriteria/<?= $sk['id_subkriteria']; ?>" class="badge badge-success">Ubah</a>
                                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusSubkriteriaModal<?= $sk['id_subkriteria']; ?>">Hapus</a>
                                                <a href="<?= base_url() ?>wawancara/detail/<?= $sk['id_subkriteria']; ?>" class="badge badge-primary">Detail</a>

                                                <div class="modal fade" id="hapusSubkriteriaModal<?= $sk['id_subkriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus Sub Kriteria</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('wawancara/hapussubkriteria'); ?>" method="post">
                                                                <input type="hidden" name="id_subkriteria" value="<?= $sk['id_subkriteria'] ?>">
                                                                <div class="modal-body">Apakah ingin menghapus <?= $sk['nama_subkriteria']; ?> ?</div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->