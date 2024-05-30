<?php echo form_open_multipart('home/inputlapor')?>
       <div class="main-panel">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Laporan</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Titik Lokasi Kecelakaan Lalu Lintas Terbaru
                    </p>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Kejadian</label>
                          <div class="col-sm-9">
                            <input type="date" name="tgl_kejadian" class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Waktu</label>
                          <div class="col-sm-9">
                            <input type="time" name="jam" class="form-control" placeholder="jam/menit/detik"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
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
                      </div>
                    </div>
                    <p class="card-description">Data Korban Kecelakaan</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Ringan</label>
                          <div class="col-sm-9">
                            <input type="number" name="luka_ringan" class="form-control" placeholder="Jumlah"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Berat</label>
                          <div class="col-sm-9">
                            <input type="number" name="luka_berat" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Meninggal Dunia</label>
                          <div class="col-sm-9">
                            <input type="number" name="meninggal" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kerugian Materil</label>
                          <div class="col-sm-9">
                            <input type="number" name="rugi" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">Dokumentasi</p>
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Titik Lokasi Maps</label>
                          <div class="col-sm-9">
                            <input type="url" name="link_maps" class="form-control" placeholder="https://link disini"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label>Upload Foto Lokasi (.jpg/.png/.jpeg)</label><br><br>
                        <input type="file" name="foto" id="foto" class="file-upload-default">
                      </div>        
                    </div><br><br>
                    <a href="<?= base_url() ?>index.php/user/lapor"><button type="button" class="btn btn-danger btn-rounded btn-fw text-white">Back</button></a>
                    <a><button type="submit" class="btn btn-primary btn-rounded btn-fw text-white">Submit</button></a>

                  </form>
                </div>
              </div>
            </div>
        </div>
        <?php echo form_close()?>