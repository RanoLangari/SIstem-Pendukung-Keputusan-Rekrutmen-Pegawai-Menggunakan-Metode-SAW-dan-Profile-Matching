<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->


  <div class="row">
    <div class="col-lg-9">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User Management</h6>
        </div>
        <div class="card-body">
          <?= form_error('email', '<div class="alert
                    alert-danger" role="alert">', '</div>'); ?>

          <?= $this->session->flashdata('message'); ?>
          <div>
            <a href="" data-toggle="modal" data-target="#tambahUserModal" class="btn btn-primary">Tambah</a>
          </div>
          <div class=" table-responsive">
            <table class="table table-hover table-bordered display">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status User</th>
                  <th scope="col">Status Aktif</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($alluser as $au) : ?>
                  <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $au['name']; ?></td>
                    <td><?= $au['email']; ?></td>
                    <td><?= $au['role']; ?></td>

                    <?php if ($au['is_active'] == 1) : ?>
                      <td class="text-center">
                        <div class="badge badge-success">Aktif</div>
                      </td>
                    <?php else : ?>
                      <td class="text-center">
                        <div class="badge badge-danger">Tidak Aktif</div>
                      </td>

                    <?php endif; ?>
                    <td>
                      <div class="text-center">
                        <a href="" data-toggle="modal" data-target="#editUserModal<?= $au['user_id']; ?>" class=" badge badge-success">Ubah</a>

                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusUserModal<?= $au['user_id']; ?>">Hapus</a>
                      </div>
                      <div class="modal fade" id="editUserModal<?= $au['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?= form_open_multipart('user_management/edituser') ?>
                              <input type="hidden" name="id" value="<?= $au['user_id'] ?>">

                              <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Nama User</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="name" name="name" value="<?= $au['name']; ?>" placeholder="Masukkan Nama User" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email User</label>
                                <div class="col-sm-9">
                                  <input type="email" class="form-control" id="email" value="<?= $au['email']; ?>" name="email" placeholder="Masukkan Email User" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-3">Foto</div>
                                <div class="col-sm-9">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <img src="<?= base_url('assets/img/profile/' . $au['image']); ?>" class="img-thumbnail gambar_load">
                                    </div>
                                    <div class="col-sm-9">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input preview_gambar" name="image">
                                        <label class="custom-file-label" for="image">Pilih File</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label"> Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input type="password" pattern="(?=.*\d)(?=.*[\W_]).{8,}" title="Minimal 8 karakter. Minimal memiliki satu karakter khusus dan satu angka." onChange="onChangeEdit()" class="form-control passwordedit" name="password" placeholder="ganti Kata Sandi">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="confirm_password" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-sm-9">
                                  <input type="password" class="form-control confirm_passwordedit" onChange="onChangeEdit()" name="confirm_password" placeholder="Ganti Konfirmasi Kata Sandi">
                                  <small class="messageedit"></small>
                                </div>
                              </div>

                              <div class="form-group  row">
                                <div class="col-sm-3"> <label for="role_id" class="col-form-label">Role</label></div>
                                <div class="col-sm-9">
                                  <div class="row">
                                    <div class="col-sm-7">
                                      <select name="role_id" id="role_id" class="form-control" required>
                                        <option value="">--Pilh Role--</option>
                                        <?php foreach ($role as $r) : ?>
                                          <?php if ($r['role_id' == $au['role_id']]) : ?>

                                            <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                          <?php else : ?>
                                            <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-check form-check-inline pl-3">
                                        <?php if ($au['is_active'] == 1) : ?>
                                          <input type="hidden" name="is_active" value="0" />
                                          <input type="checkbox" name="is_active" value="1" checked />
                                        <?php else : ?>
                                          <input type="hidden" name="is_active" value="0" />
                                          <input type="checkbox" name="is_active" value="1" />
                                        <?php endif; ?>
                                        <label class="form-check-label" for="aktif">&nbsp;Aktif</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Ubah</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Hapus modal -->
                      <div class="modal fade" id="hapusUserModal<?= $au['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <form action="<?= base_url('user_management/hapususer'); ?>" method="post">
                              <input type="hidden" name="id" value="<?= $au['user_id'] ?>">
                              <div class="modal-body">Apakah ingin menghapus <?= $au['name']; ?> ?</div>
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



    <div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>

          <div class="modal-body">
            <?= form_open_multipart('user_management/tambahuser') ?>

            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Nama User</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama User" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email User</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email User" required>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-3">Foto</div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="img-thumbnail gambar_load">
                  </div>
                  <div class="col-sm-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input preview_gambar" name="image">
                      <label class="custom-file-label" for="image">Pilih File</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-3 col-form-label">Kata Sandi</label>
              <div class="col-sm-9">
                <input type="password" pattern="(?=.*\d)(?=.*[\W_]).{8,}" title="Minimal 8 karakter. Minimal memiliki satu karakter khusus dan satu angka." onChange="onChangeTambah()" class="form-control passwordtambah" name="password" placeholder="Masukkan Kata Sandi" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="confirm_password" class="col-sm-3 col-form-label">Konfirmasi Kata Sandi</label>
              <div class="col-sm-9">
                <input type="password" class="form-control confirm_passwordtambah" onChange="onChangeTambah()" name="confirm_password" placeholder="Masukkan Konfirmasi Kata Sandi" required>
                <small class="messagetambah"></small>
              </div>
            </div>

            <div class="form-group  row">
              <div class="col-sm-3"> <label for="role_id" class=" col-form-label">Role</label></div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-7">
                    <select name="role_id" id="role_id" class="form-control" required>
                      <option value="">--Pilh Role--</option>
                      <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-check form-check-inline pl-3">
                      <input type="hidden" name="is_active" value="0" />
                      <input type="checkbox" name="is_active" value="1" checked />
                      <label class="form-check-label" for="aktif">&nbsp;Aktif</label>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <button class="btn btn-primary">Tambah</button>
            </div>
            </form>
          </div>
        </div>
      </div>



    </div>
    <!-- /.container-fluid -->

  </div>
</div>
<!-- End of Main Content -->