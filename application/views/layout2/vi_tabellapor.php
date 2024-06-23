            <!-- TABEL LAPORAN UNTUK USER -->

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Riwayat Laporan Kejadian Kecelakaan Lalu Lintas</h4>
                  <p class="card-description">Selamat Datang, Anda Login sebagai <?php echo ucfirst($this->session->userdata('nama')); ?>
                   <br> Anda dapat menambah data laporan kecelakaan lalu lintas terbaru di Kabupaten Bantul</p>

                    <div class="card-body">

                    <a href="<?= base_url() ?>index.php/user/userlapor">
                    <button type="button" class="btn btn-success btn-icon-text">
                    Tambah Laporan
                    <i class="mdi mdi-file-check btn-icon-append"></i>                                                                              
                  </button></a>

                  <br>
                  <?php
                  // notifikasi CRUD
                    if($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success">';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                    }

                    $user = $this->session->userdata('iduser');
                  ?>
              
                  <div class="table-responsive"><br>
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
                              
                              foreach ($lapor as $Row) {
                                if($Row->iduser == $user){
                                  $Count = $Count + 1;
                            ?>
                        <Tr>
                            <Td><?Php echo $Count?></Td>
                            <Td><?Php echo date('d-m-Y, H:i', strtotime($Row->tanggal_isi)) ?></Td>
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
                            <td><?php echo ucfirst($this->session->userdata('nama')); ?></td>
                        </Tr> 
                        <?Php 
                              }  
                            }
                        ?>                   
                      </tbody>
                    </table>
                  </div>
                  </div>  
                </div>
              </div>
            </div>