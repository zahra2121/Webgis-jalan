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


                  <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead class="bg-success text-white">
                        <tr>
                          <th>No.</th>
                          <th>Tanggal Lapor</th>
                          <th>Alamat</th>
                          <th>Tanggal Kejadian</th>
                          <th>Jam</th>
                          <th>Link Maps</th>
                          <th>Data Foto</th>
                          <th>Status Lapor</th>
                          <th>Pengirim</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?Php
                            $jumlah = 0;
                            $Count = 0;
                            foreach ($detaillapor as $Row) {
                                $Count = $Count + 1;
                          ?>
                        <tr>
                          <Td><?Php echo $Count?></Td>
                          <Td><?Php echo "<b>". $Row->nama. "</b><br>"; echo date('d-m-Y, H:i', strtotime($Row->tanggal_isi)) ?></Td>
                          <Td><?Php echo $Row->alamat ?></Td>
                          <Td>
                              <?php
                              echo date('d ', strtotime($Row->tgl_kejadian));
                              $month = date('F', strtotime($Row->tgl_kejadian));
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
                                  echo date(' Y', strtotime($Row->tgl_kejadian));  
                                  ?>
                          </Td>
                          <Td><?Php echo date('H:i', strtotime($Row->jam)) ?></Td>
                          <Td><?Php echo "LR : ". $Row->luka_ringan. "<br>";
                            echo "LB : ". $Row->luka_berat. "<br>";
                            echo "M  : " . $Row->meninggal. "<br>" ;
                            echo "R  : " . $Row->rugi. "<br>" ;
                          ?></Td>
                          <Td>
                            <a href="<?Php echo $Row->link_maps ?>"><?Php echo $Row->link_maps ?></a>
                          </Td>
                          <Td>
                            <?php
                              $image = $Row->foto;
                              if($image == null){
                                  echo $img = "No Photo";
                              } else {
                            ?>
                              <img src='<?=base_url()?>assets/user_lapor/<?=$image;?>' style='width:130px; height:130px; border-radius: 5px; -moz-border-radius: 20px;' class="zoomable">
                            <?php } ?>
                          </Td>
                          <td>
                              <?php 
                                  if($Row->status_lapor == '0'){
                                    echo "<label class='badge badge-danger' name='0'>DITOLAK</label>";
                                  }
                                  elseif($Row->status_lapor == '1'){
                                    echo "<label class='badge badge-success' name='1'>DITERIMA</label>";
                                  }else{
                                    echo "<label class='badge badge-warning' name='2'>DIPROSES</label>";
                                  }
                              ?>
                          </td>
                        </tr>
                        <?Php } ?>  
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
<?php echo form_close()?>