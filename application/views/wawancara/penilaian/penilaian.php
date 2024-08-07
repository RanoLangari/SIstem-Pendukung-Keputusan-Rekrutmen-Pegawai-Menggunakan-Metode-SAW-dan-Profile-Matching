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
                        <a href="<?= base_url('wawancara/tambahpenilaian'); ?>" class="btn btn-secondary mb-3 mr-2">Tambah</a>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                            Kuota
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <?php
                                        $query = "SELECT nilai FROM kuota WHERE id_kuota = 1";
                                        $kuota = $this->db->query($query)->row_array();
                                        $kuota = $kuota['nilai'];

                                        ?>
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Kuota</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('wawancara/editKuota'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="nilai" class="col-sm-3 col-form-label">Nilai</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="nilai" name="nilai" value="<?= $kuota; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-bordered" id="display1">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Karyawan</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Sub Kriteria</th>
                                        <th scope="col">Nilai</th>
                                        <th class="text-center" scope="col">Selisih<br>
                                            <p style="font-size:10px">(Nilai - Nilai Target Subkriteria)</p>
                                        </th>
                                        <th scope="col">Nilai Gap</th>
                                        <!-- <th scope="col">Aksi</th> -->
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
                                            <td><?= $p['selisih']; ?></td>
                                            <td><?= $p['nilai_gap']; ?></td>
                                            <!-- <td>
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
                                                            <form action="<?= base_url('wawancara/editpenilaian'); ?>" method="post">
                                                                <input type="hidden" name="id_penilaian" value="<?= $p['id_penilaian'] ?>">
                                                                <input type="hidden" name="id_karyawan" value="<?= $p['id_karyawan'] ?>">
                                                                <input type="hidden" name="nilai_subkriteria" value="<?= $p['nilai_subkriteria'] ?>">

                                                                <div class="container">

                                                                    <div class="  row">
                                                                        <div class="col-md-4">
                                                                            <h6> Nama Karyawan </h6>
                                                                            <h6> Kriteria </h6>
                                                                            <h6> Subkriteria</h6>
                                                                            <h6> Pilihan</h6>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <h6>: <?= $p['nama_karyawan']; ?></h6>
                                                                            <h6>: <?= $p['nama_kriteria']; ?></h6>
                                                                            <h6>: <?= $p['nama_subkriteria']; ?></h6>
                                                                            <div class="form-group">
                                                                                <select name="nilai" id="nilai" class="form-control">
                                                                                    <?php foreach ($nilai as $n) : ?>

                                                                                        <?php if ($n['id_nilai'] == $p['nilai']) : ?>
                                                                                            <option value="<?= $n['id_nilai'] ?>" selected><?= $n['nama_nilai'] ?></option>
                                                                                        <?php else : ?>
                                                                                            <option value="<?= $n['id_nilai'] ?>"><?= $n['nama_nilai'] ?></option>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                                        <button class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> -->

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
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Rata - Rata Per Faktor</h6>
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
                                                <th scope="col">Fakor</th>
                                                <th class="text-center" scope="col">Rata - Rata <br>
                                                    <p style="font-size:10px">(Rata2 Nilai GAP per Faktor)</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($hitung as $h) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $h['nama_karyawan']; ?></td>
                                                    <td><?= $h['nama_kriteria']; ?></td>
                                                    <td><?= $h['faktor']; ?></td>
                                                    <td><?= $h['rata_rata']; ?></td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Nilai Total & Akhir</h6>
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
                                                <th class="text-center" scope="col">Nilai Total <br>
                                                    <p style="font-size:10px">(Rata2 Core x 60%) + (Rata2 Secondary x 40%)</p>
                                                </th>
                                                <th class="text-center" scope="col">Nilai Akhir <br>
                                                    <p style="font-size:10px">(Nilai Total x Persentase Kriteria)</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($nilaiakhir as $na) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $na['nama_karyawan']; ?></td>
                                                    <td><?= $na['nama_kriteria']; ?></td>
                                                    <td><?= $na['nilai_total']; ?></td>
                                                    <td><?= $na['nilai_akhir']; ?></td>
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
                            <h6 class="m-0 font-weight-bold text-primary">Rangking Karyawan</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover table-bordered " id="display4">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">Rangking</th>
                                                <th scope="col">Nama Karyawan</th>
                                                <th class="text-center" scope="col">Hasil Akhir <br>
                                                </th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM karyawan JOIN rangking ON rangking.id_karyawan = karyawan.id_karyawan
                                            LEFT JOIN penerimaan ON penerimaan.id_karyawan = karyawan.id_karyawan
                                            WHERE periode = (SELECT MAX(periode) FROM karyawan)
                                            ORDER BY nilai_rangking DESC, penerimaan.usia ASC";

                                            $karyawan = $this->db->query($query)->result_array();

                                            ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($karyawan as $k) : ?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i ?></th>
                                                    <td><?= $k['nama_karyawan']; ?></td>
                                                    <td><?= round($k['nilai_rangking'], 2); ?></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <a href="" data-toggle="modal" data-target="#hapusKaryawanModal<?= $k['id_karyawan']; ?>" class="badge badge-danger">Hapus</a>
                                                        </div>
                                                        <div class="modal fade" id="hapusKaryawanModal<?= $k['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKaryawanModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="hapusKaryawanModalLabel">Hapus Karyawan</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?= base_url('wawancara/hapuskaryawannilai'); ?>" method="post">
                                                                        <input type="hidden" name="id_karyawan" value="<?= $k['id_karyawan'] ?>">
                                                                        <div class="modal-body">Apakah ingin menghapus Karyawan <?= $k['nama_karyawan'] ?>?</div>
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
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->