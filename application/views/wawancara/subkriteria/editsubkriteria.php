<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Edit Subkriteria</h1> -->

    <div class="row">
        <div class="col-lg-8">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Subkriteria</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">
                        <?= form_open_multipart(); ?>
                        <div class="form-group row">
                            <label for="id_kriteria" class="col-sm-3 col-form-label">Pilih Kriteria</label>
                            <div class="col-sm-9">
                                <select name="id_kriteria" id="id_kriteria" class="form-control col-sm-9">
                                    <?php foreach ($kriteria as $k) : ?>
                                        <?php if ($k['id_kriteria'] == $subkriteria['id_kriteria']) : ?>
                                            <option value="<?= $k['id_kriteria'] ?>" selected><?= $k['nama_kriteria'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $k['id_kriteria'] ?>"><?= $k['nama_kriteria'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_subkriteria" class="col-sm-3 col-form-label">Nama Subkriteria</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" value="<?= $subkriteria['nama_subkriteria']; ?>">
                                <?= form_error('nama_subkriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="faktor" class="col-sm-3 col-form-label">Factor</label>
                            <div class="col-sm-9">
                                <select name="faktor" id="faktor" class="form-control col-sm-9">
                                    <?php foreach ($faktor as $f) : ?>
                                        <?php if ($f == $subkriteria['faktor']) : ?>
                                            <option value="<?= $f; ?>" selected><?= $f; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $f; ?>"><?= $f; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilai_subkriteria" class="col-sm-3 col-form-label">Nilai Subkriteria</label>
                            <div class="col-sm-9">
                                <select name="nilai_subkriteria" id="nilai_subkriteria" class="form-control col-sm-9">
                                    <?php foreach ($nilai_subkriteria as $ns) : ?>
                                        <?php if ($ns == $subkriteria['nilai_subkriteria']) : ?>
                                            <option value="<?= $ns; ?>" selected><?= $ns; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $ns; ?>"><?= $ns; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $query = "SELECT subkriteria.id_subkriteria,kriteria.id_kriteria, subkriteria.nama_subkriteria, subkriteria.faktor, subkriteria.nilai_subkriteria FROM subkriteria INNER JOIN kriteria ON subkriteria.id_kriteria = kriteria.id_kriteria";
                        $datasubkriteria = $this->db->query($query)->result_array();
                        // var_dump($datakriteria);
                        // die;
                        ?>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="<?= base_url('wawancara/subkriteria'); ?>" class="btn btn-secondary">Batal</a>
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