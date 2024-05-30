            <!-- TABEL USER -->

               
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">TABEL DAFTAR PENGGUNA WEBSITE</h4>
                  <p class="card-description">Detail Pengguna Website SIG Daerah Rawan Kecelakaan Lalu Lintas di Kabupaten Bantul</p>

                  <div class="card-body">

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
                      <thead class="bg-success text-white">
                        <tr>
                          <th>No.</th>
                          <th>Email</th>
                          <th>Nama Pengguna</th>
                          <th>Username</th>
                          <th>Nomor HP</th>
                          <th>Level Pengguna</th>
                          <th>Status Pengguna</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?Php
                              $jumlah = 0;
                              $Count = 0;
                              $user = $this->session->userdata('iduser');
                              foreach ($daftaruser as $Row) {
                                  $Count = $Count + 1;
                            ?>
                        <Tr>
                            <Td><?Php echo $Count?></Td>
                            <Td><?Php echo $Row->email ?></Td>
                            <Td><?Php echo $Row->nama ?></Td>
                            <Td><?Php echo $Row->username?></Td>
                            <Td><?Php echo $Row->no_hp ?></Td>
                            <Td>
                                <?php 
                                    if($Row->level == '2'){
                                      echo "<label class='badge badge-warning' name='2'>USER PENGGUNA</label>";
                                    }
                                    elseif($Row->level == '1'){
                                      echo "<label class='badge badge-dark' name='1'>ADMIN</label>";
                                    }
                                ?>
                            </Td>
                            <Td>
                                <?php 
                                    if($Row->status == '0'){
                                      echo "<label class='badge badge-danger' name='0'>NON AKTIF</label>";
                                    }
                                    elseif($Row->status == '1'){
                                      echo "<label class='badge badge-success' name='1'>AKTIF</label>";
                                    }
                                ?>
                            </Td>
                            <Td>
                                <a href="<?= base_url('index.php/home/edit_user/' . $Row->iduser)?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <input type="hidden" name="iduser" value="<?=$Row->iduser;?>">
                                <a href="<?= base_url('index.php/home/hapus_user/' . $Row->iduser)?>" onclick="return confirm('Apakah Anda yakin ingin Menghapus Data <?=$Row->username;?> ?')"><button type="button" class="btn btn-danger">Hapus</button>
                            </Td> 
                        </Tr> 
                        <?Php   
                            }
                        ?>                   
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>