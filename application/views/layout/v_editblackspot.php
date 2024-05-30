  <?php echo form_open('home/edit_blackspot/'. $blackspot->idblack)?>
        <div class="main-panel py-5">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Data</h4>
                  <form class="form-sample">
                    <p class="card-description">
                     Update Titik Blackspot Daerah Rawan Kecelakaan Lalu Lintas
                    </p><br>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tahun</label>
                          <div class="col-sm-9">
                            <input type="year" value="<?= $blackspot->tahun ?>" name="tahun" class="form-control" placeholder="Tahun Kejadian"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p class="card-description"><b>Daerah Black Spot</b></p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Daerah Jalan</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $blackspot->daerah_jalan ?>" name="daerah_jalan" class="form-control" placeholder="Daerah Jalan" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kecamatan">
                              <option value="">- Pilih Kecamatan -</option>
                              <option value="Bambanglipuro" <?= $blackspot->kecamatan == "Bambanglipuro" ? 'selected' : ''?>>Bambanglipuro</option>
                              <option value="Banguntapan" <?= $blackspot->kecamatan == "Banguntapan" ? 'selected' : ''?>>Banguntapan</option>
                              <option value="Bantul" <?= $blackspot->kecamatan == "Bantul" ? 'selected' : ''?>>Bantul</option>
                              <option value="Dlingo" <?= $blackspot->kecamatan == "Dlingo" ? 'selected' : ''?>>Dlingo</option>
                              <option value="Imogiri" <?= $blackspot->kecamatan == "Imogiri" ? 'selected' : ''?>>Imogiri</option>
                              <option value="Jetis" <?= $blackspot->kecamatan == "Jetis" ? 'selected' : ''?>>Jetis</option>
                              <option value="Kasihan" <?= $blackspot->kecamatan == "Kasihan" ? 'selected' : ''?>>Kasihan</option>
                              <option value="Kretek" <?= $blackspot->kecamatan == "Kretek" ? 'selected' : ''?>>Kretek</option>
                              <option value="Pajangan" <?= $blackspot->kecamatan == "Pajangan" ? 'selected' : ''?>>Pajangan</option>
                              <option value="Pandak" <?= $blackspot->kecamatan == "Pandak" ? 'selected' : ''?>>Pandak</option>
                              <option value="Piyungan" <?=$blackspot->kecamatan == "Piyungan" ? 'selected' : ''?>>Piyungan</option>
                              <option value="Pleret" <?= $blackspot->kecamatan == "Pleret" ? 'selected' : ''?>>Pleret</option>
                              <option value="Pundong" <?= $blackspot->kecamatan == "Pundong" ? 'selected' : ''?>>Pundong</option>
                              <option value="Sanden" <?= $blackspot->kecamatan == "Sanden" ? 'selected' : ''?>>Sanden</option>
                              <option value="Sedayu" <?= $blackspot->kecamatan == "Sedayu" ? 'selected' : ''?>>Sedayu</option>
                              <option value="Sewon" <?= $blackspot->kecamatan == "Sewon" ? 'selected' : ''?>>Sewon</option>
                              <option value="Sradakan" <?= $blackspot->kecamatan == "Sradakan" ? 'selected' : ''?>>Sradakan</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kabupaten</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kabupaten">
                              <option value="">- Pilih Kabupaten -</option>
                              <option value="Bantul" <?= $blackspot->kabupaten == "Bantul" ? 'selected' : ''?>>Bantul</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="card-description"><b>Pusat Black Spot</b></p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Titik Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $blackspot->pusat_lat ?>" name="pusat_lat" class="form-control" placeholder="Titik"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Titik Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $blackspot->pusat_long ?>" name="pusat_long" class="form-control" placeholder="Titik"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <a href="<?= base_url('index.php/home/blackspot')?>"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw">Update</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <?php echo form_close()?>