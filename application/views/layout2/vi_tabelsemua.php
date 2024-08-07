        <!-- TABEL BLACKSPOT -->
        <div class="card-deck">   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">


                <div class="card-body">
                  <a href="<?= base_url() ?>index.php/laporanfpdf">
                  <button type="button" class="btn btn-dark btn-icon-text float-right">
                    Print Alamat
                    <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                  </button></a>

                  <a href="<?= base_url() ?>index.php/kasusfpdf">
                  <button type="button" class="btn btn-success btn-icon-text float-right">
                    Print Kasus
                    <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                  </button></a>
                  
                  <div class="table-responsive"><br>
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead class="bg-dark text-white">
                        <tr>
                          <th>No.</th>
                          <th>Tanggal & Waktu</th>
                          <th>Kecamatan</th>
                          <th>Alamat</th>
                          <th>Status Area</th>
                          <th>Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?Php 
                              $Count = 0;
                              foreach ($tabelsemua as $Row) {
                                  $Count = $Count + 1;
                            ?>
                        <Tr>
                            <Td><?php echo $Count?></Td>
                            <Td>
                                <?php
                                echo date('d ', strtotime($Row->tanggal));
                                $month = date('F', strtotime($Row->tanggal));
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
                                  echo date(' Y', strtotime($Row->tanggal));
                                  echo "<br> Pukul ". date('H:i', strtotime($Row->jam))
                                  ?>
                            </Td>
                            <Td><?Php echo $Row->kecamatan ?></Td>
                            <Td><?Php echo $Row->daerah_jalan. "<br><br><b> Patokan: </b>". $Row->patokan?></Td>
                            <Td>
                                <?Php
                                  if($Row->status == '0' or $Row->aek > $Row->bca){
                                    echo "<label class='badge bg-danger text-white' name='0'>DAERAH RAWAN</label>";
                                  }
                                  elseif($Row->status == '1' or $Row->aek < $Row->bca){
                                    echo "<label class='badge bg-warning text-dark' name='1'>BUKAN DAERAH RAWAN</label>";
                                  }
                                  elseif($Row->status == '2' and $Row->aek == 0){
                                    echo "<label class='badge bg-success text-white' name='2'>PROSES DATA</label>";
                                  }
                                ?>
                                <!-- 
                                  EAK > UCL Rawan
                                  EAK < UCL Tidak Rawan-->
                            </Td>
                            <Td>
                                <a href="<?= base_url('index.php/user/detail/' . $Row->idkasus)?>"><button type="button" class="btn btn-warning">Detail Jalan</button></a>
                                <input type="hidden" name="idkasus" value="<?=$Row->idkasus;?>">
                            </Td>
                        </Tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>
            </div>
        </div>