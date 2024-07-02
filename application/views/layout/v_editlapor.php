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
                  </form>

                  <p class="card-description"><b>Tanggal Lapor : </b><?Php echo date('d-m-Y', strtotime($detaillapor->tanggal_isi)) ?></p>
                  <p class="card-description"><b>Jam Lapor : </b><?php echo date('H:i', strtotime($detaillapor->tanggal_isi)) ?></p><br>
                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead class="bg-success text-white">
                        <tr>
                          <th>Alamat</th>
                          <th>Tanggal Kejadian</th>
                          <th>Jam</th>
                          <th>Jumlah Korban</th>
                          <th>Link Maps</th>
                          <th>Data Foto</th>
                          <th>Pengirim</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <Td><?Php echo $detaillapor->alamat ?></Td>
                          <Td>
                              <?php
                              echo date('d ', strtotime($detaillapor->tgl_kejadian));
                              $month = date('F', strtotime($detaillapor->tgl_kejadian));
                                switch ($month) {
                                  case 'January':
                                    echo "Januari ";
                                      break;
                                    case 'February':
                                      echo "Februari ";
                                      break;
                                    case 'March':
                                      echo "Maret ";
                                      break;
                                    case 'April':
                                      echo "April ";
                                      break;
                                    case 'May':
                                      echo "Mei ";
                                      break;
                                    case 'June':
                                      echo "Juni ";
                                      break;
                                    case 'July':
                                      echo "Juli ";
                                      break;
                                    case 'August':
                                      echo "Agustus ";
                                      break;
                                    case 'September':
                                      echo "September ";
                                      break;
                                    case 'October':
                                      echo "Oktober ";
                                      break;
                                    case 'November':
                                      echo "November ";
                                      break;
                                    default:
                                      echo "Desember ";
                                  }
                                  echo date(' Y', strtotime($detaillapor->tgl_kejadian));  
                                  ?>
                          </Td>
                          <Td><?Php echo date('H:i', strtotime($detaillapor->jam)) ?></Td>
                          <Td><?Php echo "LR : ". $detaillapor->luka_ringan. "<br>";
                            echo "LB : ". $detaillapor->luka_berat. "<br>";
                            echo "M  : " . $detaillapor->meninggal. "<br>" ;
                            echo "R  : " . $detaillapor->rugi. "<br>" ;
                          ?></Td>
                          <Td>
                            <a href="<?Php echo $detaillapor->link_maps ?>"><?Php echo $detaillapor->link_maps ?></a>
                          </Td>
                          <Td>
                            <?php
                              $image = $detaillapor->foto;
                              if($image == null){
                                  echo $img = "No Photo";
                              } else {
                            ?>
                              <img src='<?=base_url()?>assets/user_lapor/<?=$image;?>' style='width:130px; height:130px; border-radius: 5px; -moz-border-radius: 20px;' class="zoomable">
                            <?php } ?>
                          </Td>
                          <Td><?Php echo $detaillapor->nama ?></Td>
                        </tr>
                      </tbody>
                  </table>

                  <a href="<?= base_url('index.php/home/lapor/')?>"><button type="button" class="btn btn-warning btn-rounded btn-fw">Back</button></a>
                  <button type="submit" class="btn btn-primary btn-rounded btn-fw">Verifikasi</button>
              </div>
            </div>
        </div>
<?php echo form_close()?>