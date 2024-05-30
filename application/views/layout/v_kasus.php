      <div>   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TABEL KASUS</h4>
                  <p class="card-description">Area Daerah Rawan Kecelakaan Lalu Lintas di Kabupaten Bantul</p>

                <div class="card-body">

                  <div class="mx-2 px-7 my-2 center">
                      <?php foreach ($countkasus as $value) {?>
                    <div class= "stretch-card">
                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h3 class="card-title mb-2 text-dark">DATA KASUS</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-dark font-weight-bold"><b><?Php echo $value->total_idkasus?></b></h2>
                            </div>
                          </div>
                          <canvas id="newClient" style="width: 100%; height: 30px;"></canvas>
                        </div>
                      </div>      
                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body pb-0">
                            <h3 class="card-title mb-2 text-dark">JUMLAH SELURUH KORBAN</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-dark font-weight-bold"><b><?Php echo $value->lr_aek+$value->lb_aek+$value->m_aek?></b></h2>
                            </div>
                          </div>
                          <canvas id="orderRecieved" style="width: 100%; height: 40px;"></canvas>
                        </div>
                      </div>

                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body pb-0">
                            <h3 class="card-title mb-2 text-dark">JUMLAH KORBAN LUKA RINGAN</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-success font-weight-bold"><b><?Php echo $value->lr_aek?></b></h2>
                            </div>
                          </div>
                          <canvas id="invoices" style="width: 100%; height: 40px;"></canvas>
                        </div>
                      </div>
                      
                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body pb-0">
                            <h3 class="card-title mb-2 text-dark">JUMLAH KORBAN LUKA BERAT</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-success font-weight-bold"><b><?Php echo $value->lb_aek?></b></h2>
                            </div>
                          </div>
                          <canvas id="transactions" style="width: 100%; height: 40px;"></canvas>
                        </div>
                      </div>
                      
                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body pb-0">
                            <h3 class="card-title mb-2 text-dark">JUMLAH KORBAN MENINGGAL DUNIA</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-danger font-weight-bold"><b><?Php echo $value->m_aek?></b></h2>
                            </div>
                          </div>
                          <canvas id="projects" style="width: 100%; height: 40px;"></canvas>
                        </div>
                      </div>

                      <div class="col-lg-2 px-3 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body pb-0">
                            <h3 class="card-title mb-2 text-dark">JUMLAH KERUGIAN MATERIL</h3>
                            <div class="d-flex align-items-center justify-content-between">
                              <br><h2 class="text-dark font-weight-bold"><b><?Php echo $value->r_aek?></b></h2>
                            </div>
                          </div>
                          <canvas id="allProducts" style="width: 100%; height: 40px;"></canvas>
                        </div>
                      </div>
                    <?php }?>
                  </div>
                </div>

                  <a href="<?= base_url() ?>index.php/kasusfpdf">
                  <button type="button" class="btn btn-dark btn-icon-text">
                    Print
                    <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                  </button></a>

                  <?php
                  // notifikasi CRUD
                    if($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success">';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                    }
                  ?>
               
                <div class="table-responsive"><br>
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead class="bg-dark text-white">
                        <tr>
                          <th>No.</th>
                          <th>Detail</th>
                          <th>Alamat Area</th>
                          <th>Tanggal</th>
                          <th>Luka Ringan</th>
                          <th>Luka Berat</th>
                          <th>Meninggal</th>
                          <th>Kerugian Materil</th>
                          <th>Kategori Jalan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?Php
                              $jumlah = 0;
                              $Count = 0;
                              foreach ($kasus as $Row) {
                                  $Count = $Count + 1;
                            ?>
                        <Tr>
                            <Td><?Php echo $Row->idkasus?></Td>
                            <Td>
                                <a href="<?= base_url('index.php/home/detailadmin/' . $Row->idkasus)?>"><button type="button" class="btn btn-warning">Detail</button></a>
                                <input type="hidden" name="idkasus" value="<?=$Row->idkasus;?>">
                                
                            </Td> 
                            <Td><?Php echo $Row->daerah_jalan?></Td>
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
                            <Td><?Php echo $Row->luka_ringan ?></Td>
                            <Td><?Php echo $Row->luka_berat ?></Td>
                            <Td><?Php echo $Row->meninggal ?></Td>
                            <Td><?Php echo $Row->rugi ?></Td>
                            <Td><?Php
                                  if($Row->status == '0' or $Row->aek > $Row->ucl){
                                    echo "<label class='badge bg-danger text-white' name='0'>DAERAH RAWAN</label>";
                                  }
                                  elseif($Row->status == '1' or $Row->aek < $Row->ucl){
                                    echo "<label class='badge bg-warning text-dark' name='1'>BUKAN DAERAH RAWAN</label>";
                                  }else{
                                    echo "<label class='badge bg-success text-white' name='2'>HATI-HATI</label>";
                                  }
                                ?></Td>
                            
                        </Tr>                    
                          <?Php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
            </div>
        </div>
        </div>
        </div>
      </div>