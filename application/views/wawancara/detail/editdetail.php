<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


    <div class="row">
        <div class="col-lg-8">
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Penilaian SubKriteria</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample3">
                    <div class="card-body">

                        <?= form_open_multipart(); ?>
                        <div class="form-group row">
                            <label for="nilai_subkriteria" class="col-sm-3 col-form-label">Subkriteria</label>
                            <div class="col-sm-9">
                                <?php
                                $dataSubkriteria = $this->db->get('subkriteria')->result_array();
                                ?>
                                <select name="id_subkriteria" id="id_subkriteria" class="form-control col-sm-9" required>
                                    <option value="">--Pilih Subkriteria--</option>
                                    <?php foreach ($dataSubkriteria as $ds) : ?>
                                        <?php if ($ds['id_subkriteria'] == $detail['id_subkriteria']) : ?>
                                            <option value="<?= $ds['id_subkriteria'] ?>" selected><?= $ds['nama_subkriteria'] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $ds['id_subkriteria'] ?>"><?= $ds['nama_subkriteria'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_penilaian" class="col-sm-3 col-form-label">Nama Penilaian</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama_penilaian" name="nama_penilaian" placeholder="Masukkan Nama Penilaian" value="<?= $detail['nama_penilaian']; ?>">
                                <?= form_error('nama_penilaian', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class=" form-group row justify-content-end">
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