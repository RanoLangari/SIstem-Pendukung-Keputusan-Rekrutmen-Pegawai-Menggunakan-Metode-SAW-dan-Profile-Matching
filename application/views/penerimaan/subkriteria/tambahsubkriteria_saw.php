<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Tambah Subkriteria</h1> -->

    <div class="row">
        <div class="col-lg-8">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Subkriteria</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">
                        <?= form_open_multipart('penerimaan/tambahsubkriteria_saw'); ?>
                        <div class="form-group row">
                            <label for="id_kriteria" class="col-sm-3 col-form-label">Pilih Kriteria</label>
                            <div class="col-sm-9">
                                <select name="id_kriteria" id="id_kriteria" class="form-control col-sm-9">
                                    <?php foreach ($kriteria as $k) : ?>
                                        <option value="<?= $k['id_kriteria'] ?>"><?= $k['nama_kriteria'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_subkriteria" class="col-sm-3 col-form-label">Nama Subkriteria</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" placeholder="Masukkan Nama Subkriteria" value="<?= set_value('nama_subkriteria'); ?>">
                                <?= form_error('nama_subkriteria', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="faktor" class="col-sm-3 col-form-label">Persentase</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="persentase" name="persentase" placeholder="Masukkan Persentase" value="<?= set_value('persentase'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="atribut" class="col-sm-3 col-form-label">Atribut</label>
                            <div class="col-sm-6">
                                <select name="atribut" id="atribut" class="form-control col-sm-9" required>
                                    <option value="">--Pilih Atribut--</option>
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="<?= base_url('penerimaan/subkriteria_saw'); ?>" class="btn btn-secondary">Batal</a>
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