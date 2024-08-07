<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Penilaian</h1> -->

    <div class="row">
        <div class="col-lg-8">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Penilaian</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">
                        <?= form_open_multipart('penerimaan/tambahpenilaian_saw'); ?>
                        <div class="form-group row">
                            <label for="id_karyawan" class="col-sm-6 col-form-label">Pilih Pelamar</label>
                            <div class="col-sm-6">
                                <select name="id_karyawan" id="id_karyawan" class="form-control col-sm-9" required>
                                    <option value="">--Pilih Pelamar--</option>
                                    <?php foreach ($karyawan as $ka) : ?>

                                        <option value="<?= $ka['id_karyawan'] ?>"><?= $ka['nama_karyawan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <?php

                        $query = "SELECT nama_subkriteria , id_subkriteria from subkriteria_saw";
                        $querk = "SELECT nama_kriteria , id_kriteria from kriteria_saw";

                        $que = $this->db->query($query)->result_array();
                        $queryk = $this->db->query($querk)->result_array();
                        ?>
                        <?php foreach ($queryk as $qk) : ?>
                            <h5> <span class="badge m-0 font-weight-bold  badge-secondary"><?= $qk['nama_kriteria']; ?></span> </h5>

                            <?php
                            $id_kriteria = $qk['id_kriteria'];
                            $querySubkriteria =  "SELECT *
                                FROM subkriteria_saw JOIN kriteria_saw
                                ON subkriteria_saw.id_kriteria = kriteria_saw.id_kriteria
                                WHERE subkriteria_saw.id_kriteria = $id_kriteria";

                            $subkriteria = $this->db->query($querySubkriteria)->result_array();
                            ?>

                            <?php foreach ($subkriteria as $q) : ?>
                                <div class="form-group row">
                                    <label for="subkriteria<?= $q['id_subkriteria'] ?>" name="subkriteria<?= $q['id_subkriteria'] ?>" class="col-sm-6 col-form-label"><?= $q['nama_subkriteria']; ?></label>
                                    <div class="col-sm-6">
                                        <?php if ($q['id_subkriteria'] == 6) : ?>
                                            <select name="subkriteria<?= $q['id_subkriteria'] ?>" id="subkriteria<?= $q['id_subkriteria'] ?>" class="form-control col-sm-9" required>
                                                <option value="">--Pilih Pendidikan Terakhir--</option>
                                                <option value="1">SMA</option>
                                                <option value="2">D3</option>
                                                <option value="3">D4</option>
                                                <option value="4">S1</option>
                                                <option value="5">S2</option>
                                            </select>
                                        <?php elseif ($q['id_subkriteria'] == 5) : ?>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input type="number" name="subkriteriaTahun<?= $q['id_subkriteria'] ?>" id="subkriteria<?= $q['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Tahun" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="number" name="subkriteriaBulan<?= $q['id_subkriteria'] ?>" id="subkriteria<?= $q['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Bulan" required>
                                                </div>
                                            </div>
                                        <?php elseif ($q['id_subkriteria'] == 9) : ?>
                                            <input type="number" name="subkriteria<?= $q['id_subkriteria'] ?>" id="subkriteria<?= $q['id_subkriteria'] ?>" class="form-control col-sm-9" placeholder="Dalam Tahun" required>
                                        <?php else : ?>
                                            <select name=" subkriteria<?= $q['id_subkriteria'] ?>" id="subkriteria<?= $q['id_subkriteria'] ?>" class="form-control col-sm-9" required>
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
                            <?php endforeach; ?>


                        <?php endforeach; ?>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="<?= base_url('penerimaan/penilaian_saw'); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->