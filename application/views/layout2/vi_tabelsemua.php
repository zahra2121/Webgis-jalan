        <!-- TABEL BLACKSPOT -->
        <div class="card-deck">   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                <!-- GRAFIK ADMIN -->
              <center><section class="col-lg-6 px-4 center grid-margin stretch-card" style="width: 70%;">
                  <div class="card mx-2 px-4 center grid-margin stretch-card">
                      <div class="card-body"> 
                      <center><h2 class="card-title mb-2 text-dark center">GRAFIK STATUS JALAN BERDASARKAN TAHUN TERJADI KECELAKAAN LALU LINTAS</h2></center><br>
                        
                        <div style="width: 60%;"><canvas id="myChart1"></canvas>
                        <?php
                        //Inisialisasi nilai variabel awal
                        $nama_status= "";
                        $jum=null;
                        $jum2=null;
                        $jum3=null;
                       
                        foreach ($jumrawan as $item){
                            $jur=$item->tahun;
                            $nama_status .= "'$jur'". ", ";
                            // status rawan
                            $jum_rawan= $item->tot_rawan;
                            $jum .= "$jum_rawan". ", ";
                        }
                        foreach ($jumaman as $item){
                            // status aman
                            $jum_aman= $item->tot_aman;
                            $jum2 .= "$jum_aman". ", ";
                        }
                        foreach ($jumproses as $item){
                          // status proses
                          $jum_proses= $item->tot_proses;
                          $jum3 .= "$jum_proses". ", ";
                      }
                        ?>
                        <script>
                            var ctx = document.getElementById('myChart1').getContext('2d');

                            var dataFirst = {
                              label: "Status Daerah Rawan ",
                              borderColor: 'rgb(255,0,0)',
                              backgroundColor: 'transparent',
                              pointBorderColor: 'red',
                              pointBackgroundColor: 'rgb(255,0,0)',
                              pointRadius: 5,
                              pointHoverRadius: 10,
                              pointHitRadius: 30,
                              pointBorderWidth: 2,
                              pointStyle: 'rectRounded',
                              data: [<?php echo $jum; ?>],
                              lineTension: 0.3,
                              // Set More Options 
                            };
                              
                            var dataSecond = {
                              label: "Status Bukan Daerah Rawan ",
                              borderColor: ['rgb(255,165,0)'],
                              backgroundColor: 'transparent',
                              pointBorderColor: 'orange',
                              pointBackgroundColor: 'rgb(255,165,0)',
                              pointRadius: 5,
                              pointHoverRadius: 10,
                              pointHitRadius: 30,
                              pointBorderWidth: 2,
                              pointStyle: 'rectRounded',
                              data: [<?php echo $jum2; ?>],
                              // Set More Options 
                            };

                            var dataThird = {
                              label: "Status Proses Data ",
                              borderColor: 'rgb(0,128,0)',
                              backgroundColor: 'transparent',
                              pointBorderColor: 'green',
                              pointBackgroundColor: 'rgb(0,128,0)',
                              pointRadius: 5,
                              pointHoverRadius: 10,
                              pointHitRadius: 30,
                              pointBorderWidth: 2,
                              pointStyle: 'rectRounded',
                              data: [<?php echo $jum3; ?>],
                              // Set More Options 
                            };
                              
                            var speedData = {
                              labels: [<?php echo $nama_status; ?>],
                              datasets: [dataFirst, dataSecond, dataThird]
                            };
                            var lineChart = new Chart(ctx, {
                              type: 'line',
                              data: speedData
                            });

                        </script>
                          </div>
                      </div>
                  </div>
            </section></center>

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
                          <th>Tahun</th>
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
                            <Td><?Php echo $Row->tahun ?></Td>
                            <Td><?Php echo $Row->kecamatan ?></Td>
                            <Td><?Php echo $Row->daerah_jalan ?></Td>
                            <Td>
                                <?Php
                                  if($Row->status == '0' or $Row->aek > $Row->ucl){
                                    echo "<label class='badge bg-danger text-white' name='0'>DAERAH RAWAN</label>";
                                  }
                                  elseif($Row->status == '1' or $Row->aek < $Row->ucl){
                                    echo "<label class='badge bg-warning text-dark' name='1'>BUKAN DAERAH RAWAN</label>";
                                  }else{
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