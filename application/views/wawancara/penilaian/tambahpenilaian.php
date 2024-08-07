<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Penilaian</h1> -->

    <div class="row">
        <div class="col-lg-12">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Penilaian</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">
                        <?= form_open_multipart('wawancara/tambahpenilaian'); ?>
                        <div class="form-group row justify-between">
                            <label for="id_karyawan" class="col-sm-6 col-form-label">Pilih Karyawan</label>
                            <div class="col sm-2 justify-content-end">
                                <select name="id_karyawan" id="id_karyawan" class="form-control Col-sm-9" required>
                                    <option value="">--Pilih Karyawan--</option>
                                    <?php foreach ($karyawan as $ka) : ?>

                                        <option value="<?= $ka['id_karyawan'] ?>"><?= $ka['nama_karyawan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <?php

                        $query = "SELECT nama_subkriteria , id_subkriteria from subkriteria";
                        $querk = "SELECT nama_kriteria , id_kriteria from kriteria";
                        $querb = "SELECT nama_penilaian, id_wawancara from wawancara";

                        $que = $this->db->query($query)->result_array();
                        $queryk = $this->db->query($querk)->result_array();
                        ?>
                        <?php foreach ($queryk as $qk) : ?>
                            <h5> <span class="badge m-0 font-weight-bold  badge-secondary"><?= $qk['nama_kriteria']; ?></span> </h5>

                            <?php
                            $id_kriteria = $qk['id_kriteria'];
                            $querySubkriteria =  "SELECT *
                                FROM subkriteria JOIN kriteria
                                ON subkriteria.id_kriteria = kriteria.id_kriteria
                                WHERE subkriteria.id_kriteria = $id_kriteria";

                            $subkriteria = $this->db->query($querySubkriteria)->result_array();


                            ?>

                            <?php foreach ($subkriteria as $q) : ?>
                                <div class="form-group">
                                    <label for="subkriteria<?= $q['id_subkriteria'] ?>" name="subkriteria<?= $q['id_subkriteria'] ?>" class="col-sm-6 col-form-label"><?= $q['nama_subkriteria']; ?></label>
                                    <?php
                                    $id_subkriteria = $q['id_subkriteria'];
                                    $queryPenilaian =  "SELECT * FROM wawancara WHERE id_subkriteria = $id_subkriteria";
                                    $penilaian = $this->db->query($queryPenilaian)->result_array();
                                    ?>
                                    <?php foreach ($penilaian as $p) : ?>
                                        <div class="row">
                                            <div class="form-group col">
                                                <h5><span class="badge  font-weight-bold badge-primary "><?= $p['nama_penilaian']; ?></span></h5>
                                            </div>
                                            <div class="col-sm-3 mt-1">
                                                <select name="penilaian<?= $p['id_wawancara'] ?>" id="penilaian<?= $p['id_wawancara'] ?>" class="form-control col-sm-6" required>
                                                    <option value="">--Pilih Nilai--</option>
                                                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>

                            <?php endforeach; ?>



                        <?php endforeach; ?>


                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9 row mr-8 justify-content-end">
                                <button type="submit" class="btn btn-info mr-4">Simpan</button>
                                <a href="<?= base_url('wawancara/penilaian'); ?>" class="btn btn-secondary">Batal</a>
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