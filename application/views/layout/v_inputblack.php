        <?php echo form_open('home/input_blackspot')?>
        <div class="main-panel py-5">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Daerah Black Spot</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Black Spot Daerah Rawan Kecelakaan Lalu Lintas
                    </p>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tahun</label>
                          <div class="col-sm-9">
                            <input type="year" name="tahun" class="form-control" placeholder="Tahun Kejadian"/>
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
                            <input type="text" name="daerah_jalan" class="form-control" placeholder="Daerah Jalan" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Patokan Jalan</label>
                          <div class="col-sm-9">
                            <input type="text" name="patokan" class="form-control" placeholder="Patokan Jalan" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kecamatan">
                              <option value="" >- Pilih Kecamatan -</option>
                              <option value="Bambanglipuro" >Bambanglipuro</option>
                              <option value="Banguntapan" >Banguntapan</option>
                              <option value="Bantul" >Bantul</option>
                              <option value="Dlingo" >Dlingo</option>
                              <option value="Imogiri" >Imogiri</option>
                              <option value="Jetis" >Jetis</option>
                              <option value="Kasihan" >Kasihan</option>
                              <option value="Kretek" >Kretek</option>
                              <option value="Pajangan" >Pajangan</option>
                              <option value="Pandak" >Pandak</option>
                              <option value="Piyungan" >Piyungan</option>
                              <option value="Pleret" >Pleret</option>
                              <option value="Pundong" >Pundong</option>
                              <option value="Sanden" >Sanden</option>
                              <option value="Sedayu" >Sedayu</option>
                              <option value="Sewon" >Sewon</option>
                              <option value="Sradakan" >Sradakan</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kabupaten</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kabupaten">
                              <option value="" >- Pilih Kabupaten -</option>
                              <option value="Bantul" >Bantul</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="card-description"><b>Pusat Black Spot (Latitude, Longitude)</b></p>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Titik Latitude</label>
                          <div class="col-sm-9">
                            <input type="text" name="pusat_lat" class="form-control" placeholder="Titik"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Titik Longitude</label>
                          <div class="col-sm-9">
                            <input type="text" name="pusat_long" class="form-control" placeholder="Titik"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <a href="<?= base_url('index.php/home/blackspot')?>"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw">Submit</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <?php echo form_close()?>