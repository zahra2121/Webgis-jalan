<?php echo form_open('home/blackspot')?>

        <div>   
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- GRAFIK NILAI AEK - BCA - UCL -->
                  <div class="card px-4 center grid-margin stretch-card" style="width: 100%; height:1100;">
                    <div class="card-body"> 
                        <center><h2 class="card-title mb-2 text-dark center">GRAFIK NILAI AEK, BKA, DAN UCL BERDASARKAN DATA BLACKSPOT DALAM PENENTUAN DAERAH RAWAN KECELAKAAN LALU LINTAS</h2></center><br>
                        
                        <div style="width: 100%;"><canvas id="myChart1"></canvas>
                        <?php
                        //Inisialisasi nilai variabel awal
                        $nama_status= "";
                        $jum=null;
                        $jum2=null;
                        $jum3=null;
                        $Count=0;
                       
                        foreach ($counting as $item){
                            $jur=$item->patokan;
                            $nama_status .= "'$jur'". ", ";
                            // AEK
                            $jum_aek= $item->aek;
                            $jum .= "$jum_aek". ", ";
                            // BCA
                            $jum_bca= $item->bca;
                            $jum2 .= "$jum_bca". ", ";
                            // UCL
                            $jum_ucl= $item->ucl;
                            $jum3 .= "$jum_ucl". ", ";
                            $Count++;
                        }
                        ?>
                        <script>
                            var ctx = document.getElementById('myChart1').getContext('2d');

                            var dataFirst = {
                              label: "Nilai AEK ",
                              borderColor: ['rgba(0,0,255,1)'],
                              backgroundColor: 'transparent',
                              pointBorderColor: 'blue',
                              pointBackgroundColor:  ['rgba(0,0,255,1)'],
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
                              label: "Nilai BKA ",
                              borderColor: ['rgb(255,165,0)'],
                              backgroundColor: 'transparent',
                              pointBorderColor: 'orange',
                              pointBackgroundColor: ['rgb(255,165,0)'],
                              pointRadius: 5,
                              pointHoverRadius: 10,
                              pointHitRadius: 30,
                              pointBorderWidth: 2,
                              pointStyle: 'rectRounded',
                              data: [<?php echo $jum2; ?>],
                              // Set More Options 
                            };

                            var dataThird = {
                              label: "Nilai UCL ",
                              borderColor: ['rgb(0,128,0)'],
                              backgroundColor: 'transparent',
                              pointBorderColor: 'green',
                              pointBackgroundColor: ['rgb(0,128,0)'],
                              pointRadius: 5,
                              pointHoverRadius: 10,
                              pointHitRadius: 30,
                              pointBorderWidth: 2,
                              pointStyle: 'rectRounded',
                              data: [<?php echo $jum3; ?>],
                              // Set More Options 
                            };
                              
                            var speedData = {
                              // labels: nama_status.map(function(label) {
                              //     var maxLength = 10; // Tentukan panjang maksimum label
                              //     return label.length > maxLength ? label.substring(0, maxLength) + '...' : label;
                              // })
                              labels: [<?php echo $nama_status; ?>],
                              datasets: [dataFirst, dataSecond, dataThird]
                            };
                            var chartOptions = {
                                scales: {
                                    xAxes: [{
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Titik Lokasi Blackspot Kecelakaan Lalu Lintas'
                                        }
                                        // ticks: {
                                        //     callback: function(labels) {
                                        //         var maxLength = 10; // Tentukan panjang maksimum label
                                        //         var label = this.getLabelForValue(labels);
                                        //         return label.length > maxLength ? label.substring(0, maxLength) + '...' : label;
                                        //     }
                                        // }
                                    }],
                                    yAxes: [{
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Skor Perhitungan Akhir'
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            };  
                            var lineChart = new Chart(ctx, {
                              type: 'line',
                              data: speedData,
                              options: chartOptions
                            });

                        </script>
                        
                        <div class="card mx-2 px-4 py-4 my-2" style="width: 700px; height:300px;">
                          <p><b>Penetuan Daerah Rawan</b></p>
                          <p>︙ EAK ﹥ UCL & BKA ⭢ <label class='badge bg-danger text-white' >DAERAH RAWAN</label></p>
                          <p>︙ EAK ﹤ UCL & BKA ⭢ <label class='badge bg-warning text-dark'>BUKAN DAERAH RAWAN </label></p>
                          
                          <br>
                          <p><b>Dimana </b></p>
                          <p>︙EAK = Angka Ekivalen Kecelakaan ⤏ Pembobotan angka kecelakaan setiap titik kasus kecelakaan</p>
                          <p>︙BKA = Batas Kontrol Atas ⤏ Batasan tingkat rata-rata dari seluruh kecelakaan</p>
                          <p>︙UCL = Upper Control Limit ⤏ Penentuan daerah rawan kecelakaan setiap titik jalan</p>
                        </div>
                        </div>
                    </div>
                  </div>

                  <h4 class="card-title">TABEL BLACK SPOT</h4>
                  <p class="card-description">Area Daerah Rawan Kecelakaan Lalu Lintas di Kabupaten Bantul</p>

                  <?php
                  // notifikasi CRUD
                    if($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success">';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                    }

                    // function jumlah aek
                    // mati*12 + lukaringan*3 + lukaberat*3 + rugi*1
                    function jumlah_aek($m, $lr, $lb, $r){
                      $hasil = $m*12 + $lr*3 + $lb*3 + $r*1;
                      return $hasil;
                    }
                  ?>
                    <div class="card-body">
                      <!-- PRINT DATA TABEL -->
                      <a href="<?= base_url() ?>index.php/laporanfpdf">
                      <button type="button" class="btn btn-dark btn-icon-text float-right">
                        Print
                        <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                      </button></a>

                    <div class="table-responsive"><br>
                      <!-- TABEL DATA BLACKSPOT DAN KASUS SEMUANYA -->
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                          <thead class="bg-dark text-white">
                            <tr>
                              <th>No.</th>
                              <th>Total (kasus)</th>
                              <th>Tahun</th>
                              <th>Kecamatan</th>
                              <th>Daerah Jalan</th>
                              <th>Patokan Jalan</th>
                              <th>EAK</th>
                              <th>BKA</th>
                              <th>UCL</th>
                              <th>Status Hasil</th>
                              <th>Opsi</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?Php
                                  foreach ($countblack as $key => $value) {
                                    // hitung rata"
                                    $rataan = $value->totalsemua_aek/$value->total_data; //total aek/data black
                                   // echo $value->total_data;
                                    //total aek = 1731
                                    // total data = 97
                                    // rataan = 1731/97 = 17.84
                                    

                                    $kali = 3*sqrt($rataan);
                                    // BCA = C + 3 akar C 
                                   // kali = 12.67
                                    $bca = $rataan + $kali;
                                    $nilai_bca = round($bca,3);
                                    $sql = "UPDATE blackspot SET bca = '$nilai_bca'";
                                    $query = $this->db->query($sql);

                                  }
                                  $Count = 0;
                                  foreach ($blackspot as $value) {
                                    $Count++;
                                ?>
                            <Tr>
                                <Td><?Php echo $Count?></Td>
                                <Td><?Php echo $value->total_idkasus ?></Td>
                                <Td><?Php echo $value->tahun?></Td>
                                <Td><?Php echo $value->kecamatan?></Td>
                                <Td>
                                  <?Php echo $value->daerah_jalan. 
                                   "<br><br> (". $value->pusat_lat.
                                   ", ". $value->pusat_long. ")"
                                  ?>
                                </Td>
                                <Td><?Php echo $value->patokan?></Td>
                                <Td>
                                    <?Php
                                      $aek = jumlah_aek($value->m_aek, $value->lr_aek, $value->lb_aek, $value->r_aek);
                                      
                                      $sql = "UPDATE blackspot SET aek = '$aek' WHERE idblack = '$value->idblack'";
                                      $query = $this->db->query($sql);
                                      echo $value->aek. "<br>";
                                         
                                    ?> 
                                </Td>
                                <Td><?php echo $value->bca. "<br>" ?></Td>
                                    <!--  C = akar dari rataan
                                          BCA = C + 3 akar C 
                                          totalkan semua data EAK, baru BCA
                                        -->
                                <Td>
                                  <?Php
                                    if($value->aek != 0){
                                      $t1 = $rataan/$value->aek;
                                      $t2 = 0.829/$value->aek;
                                      $t3 = 1/(2*$value->aek);
                                      $ucl = $rataan + (2.576*sqrt(($t1)+($t2)+($t3)) );
                                      $nilai_ucl = round($ucl,3);

                                      $sql = "UPDATE blackspot SET ucl = '$nilai_ucl' WHERE idblack = '$value->idblack'";
                                      $query = $this->db->query($sql);
                                      echo $value->ucl. "<br>";

                                      // m = jumlah aek per titik
                                      // rataan = c (rataan eak total semua/ jumlah semua)
                                      // UCL = rataan + 2,576 * akar ([rataan/m] + [0,829/m + [1/2*m])
                                    }
                                    else{
                                      $nilai_ucl = 0;

                                      $sql = "UPDATE blackspot SET ucl = '$nilai_ucl' WHERE idblack = '$value->idblack'";
                                      $query = $this->db->query($sql);
                                      echo $value->ucl. "<br>";
                                    }

                                  ?>
                                </Td>
                                <Td>
                                    <?Php
                                      if($value->aek > $value->bca){
                                        $status = 0;
                                        $sql = "UPDATE blackspot SET status = '$status' WHERE idblack = '$value->idblack'";
                                        $query = $this->db->query($sql);
                                        
                                        echo "<label class='badge bg-danger text-white' name='$value->status' id='$value->status'>DAERAH RAWAN</label>";
                                      }
                                      elseif($value->aek !=0 and $value->aek < $value->bca){
                                        $status = 1;
                                        $sql = "UPDATE blackspot SET status = '$status' WHERE idblack = '$value->idblack'";
                                        $query = $this->db->query($sql);
                                        
                                        echo "<label class='badge bg-warning text-dark' name='$value->status' id='$value->status'>BUKAN DAERAH RAWAN</label>";
                                      }
                                      elseif($value->aek == 0){
                                        $status = 2;
                                        $sql = "UPDATE blackspot SET status = '$status' WHERE idblack = '$value->idblack'";
                                        $query = $this->db->query($sql);
                                        
                                        echo "<label class='badge bg-success text-white' name='$value->status' id='$value->status'>PROSES DATA</label>";
                                      }
                                    ?>
                                  
                                      <!-- EAK > UCL, BKA Rawan
                                      EAK < UCL, BKA Tidak Rawan -->
                                </Td>
                                <Td>
                                    <a href="<?= base_url('index.php/home/edit_blackspot/' . $value->idblack)?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <input type="hidden" name="idblack" value="<?=$value->idblack;?>">
                                    <a href="<?= base_url('index.php/home/hapus_black/' . $value->idblack)?>" onclick="return confirm('Apakah Anda yakin ingin Menghapus Data <?=$value->tahun;?>, beralamat <?=$value->daerah_jalan;?> ?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                                </Td>  
                            </Tr> 
                                                
                            <?Php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
              </div>
            </div>
        </div>
        <?php echo form_close()?>