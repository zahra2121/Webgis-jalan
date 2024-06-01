<?php echo form_open('home/edit_kasus/'. $kasus->idkasus)?>
        <div class="main-panel py-5">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Update Daerah Rawan Kecelakaan Lalu Lintas
                    </p>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Pilih Alamat</label>
                          <div class="col-sm-12">
                            <select class="form-control" id="daerah_jalan" name="id">
                              <option value="" >- Pilih Alamat -</option>
                              <?php
                                foreach($update_id as $key => $value){
                              ?>
                                <option value="<?= $value->id ?>" <?= $value->id == $value->daerah_jalan  ? 'selected' : ''?>><?= $value->daerah_jalan ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="card-description"><b>Detail Kasus</b></p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal</label>
                          <div class="col-sm-9">
                            <input type="date" value="<?= $kasus->tanggal ?>" name="tanggal" class="form-control" placeholder="Tanggal" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jam</label>
                          <div class="col-sm-9">
                            <input type="time" value="<?= $kasus->jam ?>" name="jam" class="form-control" placeholder="Jam" />
                          </div>
                        </div>
                      </div>
                      
                      <p class="card-description"><b>Data Korban Kecelakaan</b></p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Ringan</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $kasus->luka_ringan ?>" name="luka_ringan" class="form-control" placeholder="Jumlah"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Berat</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $kasus->luka_berat ?>" name="luka_berat" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Meninggal Dunia</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $kasus->meninggal ?>" name="meninggal" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kerugian Materil</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $kasus->rugi ?>" name="rugi" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                    </div>
                </div>  
                    <a href="<?= base_url('index.php/home/detailadmin/' . $kasus->idkasus)?>"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw">Update</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <?php echo form_close()?>