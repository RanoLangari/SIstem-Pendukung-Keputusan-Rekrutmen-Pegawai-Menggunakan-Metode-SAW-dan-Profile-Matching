<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->
    <h6 class="m-0 mb-3 font-weight-bold text-primary">Beranda</h6>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kriteria ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-file fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('wawancara/kriteria'); ?>" class="btn  btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Detail Kriteria</span>
                </a>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sub Kriteria</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $subkriteria ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('wawancara/subkriteria'); ?>" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Detail Sub Kriteria</span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Laporan</div>
                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $laporan ?></div> -->
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('/laporan'); ?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Detail Laporan</span>
                </a>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Penilaian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $rangking ?> <h6 class="font-weight-bold text-xs  badge badge-primary ">Karyawan telah dinilai</h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas  fa-edit fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('wawancara/penilaian'); ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Detail Penilaian</span>
                </a>
            </div>
        </div>
    </div>



    <!-- Bar Chart -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Diagram Rangking</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="chart-bar">
                        <canvas id="myBarChart1"></canvas>
                    </div>
                     <hr>
                    Nilai rangking pada karyawan | <code>Metode Profile Matching</code>. -->
    <!-- </div>
            </div>

        </div>
    </div> -->



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->