<?php echo form_open('home/edit_user/'. $daftaruser->iduser)?>
        <div class="main-panel py-5">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Update User Website Daerah Rawan Kecelakaan Lalu Lintas
                    </p>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-6">
                        <p class="card-description"><b>Identitas Pengguna</b></p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" value="<?= $daftaruser->email ?>" name="email" class="form-control" placeholder="Email" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Pengguna</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $daftaruser->nama?>" name="nama" class="form-control" placeholder="Nama Pengguna" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $daftaruser->username ?>" name="username" class="form-control" placeholder="Username" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor HP</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $daftaruser->no_hp ?>" name="no_hp" class="form-control" placeholder="Nomor HP" />
                          </div>
                        </div>
                      </div>
                      
                      <p class="card-description"><b>Detail Pengguna</b></p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Level Pengguna</label>
                          <div class="col-sm-7">
                            <select class="form-control" name="level">
                              <option value="" >- Pilih -</option>
                              <option value="1" <?= $daftaruser->level == 1 ? 'selected' : ''?>>ADMIN</option>
                              <option value="2" <?= $daftaruser->level == 2 ? 'selected' : ''?>>USER PENGGUNA</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status Pengguna</label>
                          <div class="col-sm-7">
                            <select class="form-control" name="status">
                              <option value="" >- Pilih -</option>
                              <option value="0" <?= $daftaruser->status == 0 ? 'selected' : ''?>>NON AKTIF</option>
                              <option value="1" <?= $daftaruser->status == 1 ? 'selected' : ''?>>AKTIF</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div> 
                    </div> 
                    <br>
                    <a href="<?= base_url() ?>index.php/home/daftar_user"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                    <a><button type="submit" class="btn btn-primary btn-rounded btn-fw text-white">Update</button></a>

                  </form>
                </div>
              </div>
            </div>
        </div>
<?php echo form_close()?>