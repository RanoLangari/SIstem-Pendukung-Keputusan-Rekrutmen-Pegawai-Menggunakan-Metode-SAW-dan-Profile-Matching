<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


    <div class="row">
        <div class="col-lg-12">


            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Nilai</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                    <div class="card-body">
                        <?= form_error('penilaian', '<div class="alert
                    alert-danger" role="alert">', '</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>
                        <a href="<?= base_url('penerimaan/tambahpenilaian_saw'); ?>" class="btn btn-secondary mb-3">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-bordered" id="display1">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Pelamar</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Sub Kriteria</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Atribut</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($penilaian as $p) : ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i ?></th>
                                            <td><?= $p['nama_karyawan']; ?></td>
                                            <td><?= $p['nama_kriteria']; ?></td>
                                            <td><?= $p['nama_subkriteria']; ?></td>
                                            <td><?= $p['nilai']; ?></td>
                                            <td><?= $p['atribut']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#editPenilaianModal<?= $p['id_penilaian']; ?>">Ubah</a>
                                                </div>

                                                <div class="modal fade" id="editPenilaianModal<?= $p['id_penilaian']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Penilaian</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('penerimaan/editpenilaian_saw'); ?>" method="post">
                                                                <input type="hidden" name="id_penilaian" value="<?= $p['id_penilaian'] ?>">
                                                                <input type="hidden" name="id_karyawan" value="<?= $p['id_karyawan'] ?>">
                                                                <input type="hidden" name="id_subkriteria" value="<?= $p['id_subkriteria'] ?>">

                                                                <div class="container">

                                                                    <div class="  row">
                                                                        <div class="col-md-4">
                                                                            <h6> Nama Pelamar </h6>
                                                                            <h6> Kriteria </h6>
                                                                            <h6> Subkriteria</h6>
                                                                            <h6> Pilihan</h6>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <h6>: <?= $p['nama_karyawan']; ?></h6>
                                                                            <h6>: <?= $p['nama_kriteria']; ?></h6>
                                                                            <h6>: <?= $p['nama_subkriteria']; ?></h6>
                                                                            <div class="form-group">
                                                                                <?php if ($p['id_subkriteria'] == 6) : ?>
                                                                                    <select name="subkriteria<?= $p['id_subkriteria'] ?>" id="subkriteria<?= $p['id_subkriteria'] ?>" class="form-control col-sm-9" required>
                                                                                        <option value="">--Pilih Pendidikan Terakhir--</option>
                                                                                        <option value="1" <?= ($p['nilai'] == 1) ? 'selected' : '' ?>>SMA</option>
                                                                                        <option value="2" <?= ($p['nilai'] == 2) ? 'selected' : '' ?>>D3</option>
                                                                                        <option value="3" <?= ($p['nilai'] == 3) ? 'selected' : '' ?>>D4</option>
                                                                                        <option value="4" <?= ($p['nilai'] == 4) ? 'selected' : '' ?>>S1</option>
                                                                                        <option value="5" <?= ($p['nilai'] == 5) ? 'selected' : '' ?>>S2</option>
                                                                                    </select>
                                                                                <?php elseif ($p['id_subkriteria'] == 5) : ?>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-5">
                                                                                            <input type="number" name="subkriteriaTahun<?= $p['id_subkriteria'] ?>" id="subkriteria<?= $p['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Tahun" required>
                                                                                        </div>
                                                                                        <div class="col-sm-5">
                                                                                            <input type="number" name="subkriteriaBulan<?= $p['id_subkriteria'] ?>" id="subkriteria<?= $p['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Bulan" required>
                                                                                        </div>
                                                                                    </div>

                                                                                <?php elseif ($p['id_subkriteria'] == 9) : ?>
                                                                                    <?php
                                                                                    $sqlPenerimaan = "SELECT * FROM penerimaan WHERE id_karyawan = $p[id_karyawan]";
                                                                                    $penerimaan = $this->db->query($sqlPenerimaan)->row_array();
                                                                                    ?>
                                                                                    <input type="number" name="subkriteria<?= $p['id_subkriteria'] ?>" id="subkriteria<?= $p['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Dalam Tahun" value="<?= $penerimaan['usia'] ?>" required>
                                                                                <?php else : ?>
                                                                                    <select name=" subkriteria<?= $p['id_subkriteria'] ?>" id="subkriteria<?= $p['id_subkriteria'] ?>" class="form-control col-sm-9" required>
                                                                                        <option value="">--Pilih Nilai--</option>
                                                                                        <option value="1">1</option>
                                                                                        <option value="2">2</option>
                                                                                        <option value="3">3</option>
                                                                                        <option value="4">4</option>
                                                                                        <option value="5">5</option>
                                                                                    </select>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><i class="fas fa-zhihu    "></i>

                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                    <button class="btn btn-primary">Simpan</button>
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
            <div class="row">
                <div class="col-lg-6">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Normalisasi</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample2">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-bordered" id="display2">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Karyawan</th>
                                                <th scope="col">Kriteria</th>
                                                <th scope="col">Sub Kriteria</th>
                                                <th class="text-center" scope="col">Nilai Normalisasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($hitung as $h) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $h['nama_karyawan']; ?></td>
                                                    <td><?= $h['nama_kriteria']; ?></td>
                                                    <td><?= $h['nama_subkriteria']; ?></td>
                                                    <td><?= $h['nilai_normalisasi']; ?></td>
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
                <div class="col-lg-6">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Preverensi</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-bordered" id="display3">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Karyawan</th>
                                                <th scope="col">Kriteria</th>
                                                <th class="text-center" scope="col">Subkriteria</th>
                                                <th class="text-center" scope="col">Nilai Preverensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($hitung as $h) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $h['nama_karyawan']; ?></td>
                                                    <td><?= $h['nama_kriteria']; ?></td>
                                                    <td><?= $h['nama_subkriteria']; ?></td>
                                                    <td><?= $h['nilai_preverensi']; ?></td>
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
            <div class="row">
                <div class="col-lg-12">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Rangking </h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-bordered" id="display4">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Rangking</th>
                                                <th scope="col">Nama Pelamar</th>
                                                <th class="text-center" scope="col">Hasil</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT karyawan.*, rangking_saw.nilai_rangking, penerimaan.usia 
                              FROM karyawan
                              JOIN rangking_saw ON rangking_saw.id_karyawan = karyawan.id_karyawan
                              LEFT JOIN penerimaan ON karyawan.id_karyawan = penerimaan.id_karyawan
                              WHERE periode = (SELECT MAX(periode) FROM karyawan)
                              ORDER BY nilai_rangking DESC, penerimaan.usia ASC";
                                            $karyawan = $this->db->query($query)->result_array();
                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($karyawan as $k) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $k['nama_karyawan']; ?></td>
                                                    <td><?= round($k['nilai_rangking'], 3); ?></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <a href="" data-toggle="modal" data-target="#hapusKaryawanModal<?= $k['id_karyawan']; ?>" class="badge badge-danger">Hapus</a>
                                                        </div>
                                                        <div class="modal fade" id="hapusKaryawanModal<?= $k['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKaryawanModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="hapusKaryawanModalLabel">Hapus Pelamar</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?= base_url('penerimaan/hapuskaryawannilaisaw'); ?>" method="post">
                                                                        <input type="hidden" name="id_karyawan" value="<?= $k['id_karyawan'] ?>">
                                                                        <div class="modal-body">Apakah ingin menghapus <?= $k['nama_karyawan'] ?>?</div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                            <button class="btn btn-primary">Hapus</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            endforeach; ?>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->