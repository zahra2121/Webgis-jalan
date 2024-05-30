<?php echo form_open('home/edit_lapor/' . $lapor->idlapor)?>

        <div class="main-panel">
            <br><div class="container col-10 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Laporan</h4>
                  <form class="form-sample">
                    <p class="card-description">
                      Titik Lokasi Kecelakaan Lalu Lintas Terbaru
                    </p>

                    <?php
                    // validasi input
                    echo validation_errors('<div class="alert alert-danger">','</div>');
                    ?><br>

                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"><b>STATUS LAPORAN</b></label>
                          <div class="col-sm-4">
                            <select class="form-control" name="status_lapor">
                              <option value="" >- Pilih -</option>
                              <option value="0" <?= $lapor->status_lapor == 0 ? 'selected' : ''?>>DITOLAK</option>
                              <option value="1" <?= $lapor->status_lapor == 1 ? 'selected' : ''?>>DITERIMA</option>
                              <option value="2" <?= $lapor->status_lapor == 2 ? 'selected' : ''?>>DIPROSES</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?= $lapor->alamat ?>" name="alamat" class="form-control" placeholder="Alamat Lengkap" />
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kecamatan</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="kecamatan">
                              <option value="">- Pilih Kecamatan -</option>
                              <option value="Bambanglipuro" <?= $lapor->kecamatan == "Bambanglipuro" ? 'selected' : ''?>>Bambanglipuro</option>
                              <option value="Banguntapan" <?= $lapor->kecamatan == "Banguntapan" ? 'selected' : ''?>>Banguntapan</option>
                              <option value="Bantul" <?= $lapor->kecamatan == "Bantul" ? 'selected' : ''?>>Bantul</option>
                              <option value="Dlingo" <?= $lapor->kecamatan == "Dlingo" ? 'selected' : ''?>>Dlingo</option>
                              <option value="Imogiri" <?= $lapor->kecamatan == "Imogiri" ? 'selected' : ''?>>Imogiri</option>
                              <option value="Jetis" <?= $lapor->kecamatan == "Jetis" ? 'selected' : ''?>>Jetis</option>
                              <option value="Kasihan" <?= $lapor->kecamatan == "Kasihan" ? 'selected' : ''?>>Kasihan</option>
                              <option value="Kretek" <?= $lapor->kecamatan == "Kretek" ? 'selected' : ''?>>Kretek</option>
                              <option value="Pajangan" <?= $lapor->kecamatan == "Pajangan" ? 'selected' : ''?>>Pajangan</option>
                              <option value="Pandak" <?= $lapor->kecamatan == "Pandak" ? 'selected' : ''?>>Pandak</option>
                              <option value="Piyungan" <?=$lapor->kecamatan == "Piyungan" ? 'selected' : ''?>>Piyungan</option>
                              <option value="Pleret" <?= $lapor->kecamatan == "Pleret" ? 'selected' : ''?>>Pleret</option>
                              <option value="Pundong" <?= $lapor->kecamatan == "Pundong" ? 'selected' : ''?>>Pundong</option>
                              <option value="Sanden" <?= $lapor->kecamatan == "Sanden" ? 'selected' : ''?>>Sanden</option>
                              <option value="Sedayu" <?= $lapor->kecamatan == "Sedayu" ? 'selected' : ''?>>Sedayu</option>
                              <option value="Sewon" <?= $lapor->kecamatan == "Sewon" ? 'selected' : ''?>>Sewon</option>
                              <option value="Sradakan" <?= $lapor->kecamatan == "Sradakan" ? 'selected' : ''?>>Sradakan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Kejadian</label>
                          <div class="col-sm-9">
                            <input type="date" value="<?= $lapor->tgl_kejadian ?>" name="tgl_kejadian" class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Waktu</label>
                          <div class="col-sm-9">
                            <input type="time" value="<?= $lapor->jam ?>" name="jam" class="form-control" placeholder="jam/menit/detik"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br>
                    <p class="card-description"><b>Data Korban Kecelakaan</b></p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Ringan</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $lapor->luka_ringan ?>" name="luka_ringan" class="form-control" placeholder="Jumlah"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Luka Berat</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $lapor->luka_berat ?>" name="luka_berat" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Meninggal Dunia</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $lapor->meninggal ?>" name="meninggal" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kerugian Materil</label>
                          <div class="col-sm-9">
                            <input type="number" value="<?= $lapor->rugi ?>" name="rugi" class="form-control" placeholder="Jumlah" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <br><br>
                    <a href="<?= base_url() ?>index.php/home/lapor"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                    <a><button type="submit" class="btn btn-primary btn-rounded btn-fw text-white">Update</button></a>

                  </form>
                </div>
              </div>
            </div>
        </div>
<?php echo form_close()?>