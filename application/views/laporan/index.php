<!-- Begin Page Content -->

<?php
if (isset($_GET['periode'])) {
  $periode = $this->input->get('periode');
  $query = "SELECT karyawan.*, rangking.nilai_rangking FROM karyawan
                                                      JOIN rangking ON rangking.id_karyawan = karyawan.id_karyawan
                                                      WHERE periode = '$periode' ORDER BY nilai_rangking DESC";
  $karyawan = $this->db->query($query)->result_array();
} else {
  $query = "SELECT karyawan.*, rangking.nilai_rangking FROM karyawan
                                                      JOIN rangking ON rangking.id_karyawan = karyawan.id_karyawan
                                                      WHERE periode = (SELECT MAX(periode) FROM karyawan)
                                                      ORDER BY nilai_rangking DESC";
  $karyawan = $this->db->query($query)->result_array();
}
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


  <div class="row">
    <div class="col-lg-12">



      <div class="row">
        <div class="col-lg-9">
          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
            </a>

            <!-- Button trigger modal -->
            <div class="d-flex justify-content-start ml-4 mt-4">
              <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
                Periode
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <form action="<?= base_url('laporan') ?>" method="get">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Pilih Periode</h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <?php
                      $periode = $this->input->get('periode');
                      $query = "SELECT periode FROM karyawan GROUP BY periode";
                      $periode = $this->db->query($query)->result_array();
                      ?>
                      <div class="form-group row">
                        <label for="nilai" class="col-sm-3 col-form-label">Periode</label>
                        <div class="col-sm-9">
                          <select name="periode" id="periode" class="form-control col-sm-9" required>
                            <option value="">--Pilih Periode--</option>
                            <?php foreach ($periode as $p) : ?>
                              <option value="<?= $p['periode'] ?>"><?= $p['periode'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-sm table-hover table-bordered " id="display4">
                    <thead>
                      <tr>
                        <th class="text-center" scope="col">Rangking</th>
                        <th scope="col">Nama Pelamar</th>
                        <th class="text-center" scope="col">Hasil Akhir
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($karyawan as $k) : ?>
                        <tr>
                          <th class="text-center" scope="row"><?= $i ?></th>
                          <td><?= $k['nama_karyawan']; ?></td>
                          <td><?= round($k['nilai_rangking'], 3); ?></td>
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