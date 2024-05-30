<?php echo form_open('home/detailadmin/'. $detailadmin->idkasus)?>
<!-- Content section-->
<section>
    <div>
        <div class="card-body">
            <ul style="display:grid; list-style-type:none; grid-template-columns: 50% 50%; grid-template-rows: repeat(2, auto);">
                <li>
                    <div class="card col-lg-auto mx-3 px-3 py-3">
                    <!-- MAPS DETAIL -->
                    <div class="card-column" id="map" style="width: auto; height: 500px;"></div>
                    <script>
                        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/streets-v11'
                        });


                        var peta2 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                            attribution: '© Google Maps',
                            maxZoom: 20,
                        });


                        var peta3 = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                        });


                        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            maxZoom: 20,
                            id: 'mapbox/outdoors-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q'
                        });

                        
                        var peta5 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 20,
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        });

                        var map = L.map('map', {
                            center: [<?= $detailadmin->pusat_lat ?>, <?= $detailadmin->pusat_long ?>],
                            zoom: 18,
                            layers: [peta5]
                        });

                        var baseLayers = {
                            'GMaps': peta2,
                            'Satelite': peta3,
                            'Street': peta5,
                        };

                        var layerControl = L.control.layers(baseLayers).addTo(map);

                        // CIRCLE BLACK SPOT
                        var circle = L.circle([<?= $detailadmin->pusat_lat ?>, <?=$detailadmin->pusat_long ?>], {
                            <?php
                                if($detailadmin->status == '0' and $detailadmin->aek > $detailadmin->ucl){
                                    echo "color: 'red',
                                    fillColor: '#FF0000',
                                    fillOpacity: 0.3,
                                    radius: 30";
                                }
                                elseif($detailadmin->status == '1' and $detailadmin->aek < $detailadmin->ucl){
                                    echo "color: 'yellow',
                                    fillColor: '#FFFF00',
                                    fillOpacity: 0.3,
                                    radius: 30";
                                }else{
                                    echo "color: 'green',
                                    fillColor: '#008000',
                                    fillOpacity: 0.3,
                                    radius: 30";
                                }
                            ?>
                        }).addTo(map)
                        .bindPopup("<h5><b> Daerah Jalan<br><br><?= $detailadmin->daerah_jalan?></b><br><br> Latitude : <?= $detailadmin->pusat_lat?><br><br> Longitude : <?= $detailadmin->pusat_long?><br><br></h5>");
                        
                        vpup = L.popup()
                        .setLatLng([<?= $detailadmin->pusat_lat ?>, <?= $detailadmin->pusat_long ?>])

                        function onMapClick(e) {
                            popup
                            .setLatLng(e.latlng)
                            .setContent('Titik Latitude dan Longitude : <br>' + e.latlng.toString())
                            .openOn(map);
                        }
                        map.on('click', onMapClick);
                    </script><br>

                        <div class="col-md-10 col-sm-4 mx-auto">
                            <h4 class="fw-bolder text-secondary"> <?= $detailadmin->daerah_jalan ?></h4><br>
                            <h4 class="fw-bolder text-danger">
                                STATUS JALAN : 
                                <?php
                                    if($detailadmin->status == '0' and $detailadmin->aek > $detailadmin->ucl){
                                        echo "<label class='badge bg-danger text-white' name='$detailadmin->status' id='$detailadmin->status'>DAERAH RAWAN</label>";
                                    }
                                    elseif($detailadmin->status == '1' and $detailadmin->aek < $detailadmin->ucl){
                                        echo "<label class='badge bg-warning text-dark' name='$detailadmin->status' id='$detailadmin->status'>BUKAN DAERAH RAWAN</label>";
                                    }else{
                                        echo "<label class='badge bg-success text-white' name='$detailadmin->status' id='$detailadmin->status'>PROSES</label>";
                                    }
                                ?>
                            </h4><br>
                        </div>             
                    </div>
                </li>
                <li>
                    <div class="card col-lg-auto mx-3 px-3 py-3 my-3">
                        <div class="card-column"><br>
                        <?php
                            echo "<center><h1 class='fs-3 fw-bolder'>TANGGAL ". date('d ', strtotime($detailadmin->tanggal));
                            $month = date('F', strtotime($detailadmin->tanggal));
                            switch ($month) {
                                case 'January':
                                    echo "JANUARI ";
                                    break;
                                case 'February':
                                    echo "FEBRUARI "; 
                                    break;
                                case 'March':
                                    echo "MARET ";
                                    break;
                                case 'April':
                                    echo "APRIL ";
                                    break;
                                case 'May':
                                    echo "MEI ";
                                    break;
                                case 'June':
                                    echo "JUNI ";
                                    break;
                                case 'July':
                                    echo "JULI ";
                                    break;
                                case 'August':
                                    echo "AGUSTUS ";
                                    break;
                                case 'September':
                                    echo "SEPTEMBER ";
                                    break;
                                case 'October':
                                    echo "OKTOBER ";
                                    break;
                                case 'November':
                                    echo "NOVEMBER ";
                                    break;
                                default:
                                    echo "DESEMBER ";
                            }
                            echo date(' Y', strtotime($detailadmin->tanggal))." </h1></center>";
                            
                            echo "<center><h4 class='fw-bolder'>PUKUL " . date('H.i', strtotime($detailadmin->jam)).  " WIB</h4></center>"; 
                        ?>
                            <!-- TABEL DETAIL -->
                            <div class="col-md-10 col-sm-4 mx-auto">
                                <div class="table-responsive">
                                    <table class="table" id="dataTable" width="50%">
                                    <tbody>
                                        <Tr>
                                            <th class="text-dark">Latitude</th>
                                            <Td><?php echo $detailadmin->pusat_lat?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Longitude</th>
                                            <Td><?php echo $detailadmin->pusat_long?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Alamat</th>
                                            <Td>
                                                <?php 
                                                    $num_char = 50;
                                                    echo substr($detailadmin->daerah_jalan, 0, $num_char) . '...';
                                                ?>
                                            </Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Kecamatan</th>
                                            <Td><?php echo $detailadmin->kecamatan?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Kabupaten</th>
                                            <Td><?php echo $detailadmin->kabupaten?></Td>
                                        </Tr>
                                
                                        <Tr>
                                            <th class="text-dark">Luka Ringan</th>
                                            <Td><?php echo $detailadmin->luka_ringan?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Luka Berat</th>
                                            <Td><?php echo $detailadmin->luka_berat?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Meninggal</th>
                                            <Td><?php echo $detailadmin->meninggal?></Td>
                                        </Tr>
                                        <Tr>
                                            <th class="text-dark">Kerugian Material</th>
                                            <Td><?php echo $detailadmin->rugi?></Td>
                                        </Tr>
                                    
                                    </tbody>
                                    </table>
                                    <br><br>
                                    <a href="<?= base_url('index.php/home/edit_kasus/' . $detailadmin->idkasus)?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <input type="hidden" name="idkasus" value="<?=$detailadmin->idkasus;?>">
                                    <a href="<?= base_url('index.php/home/hapus_kasus/' . $detailadmin->idkasus)?>" onclick="return confirm('Apakah Anda yakin ingin Menghapus Data <?=$detailadmin->tanggal;?>, pada pukul <?=$detailadmin->jam;?> ?')"><button type="button" class="btn btn-danger">Hapus</button></a>   
                                    <br><br>
                                    <a href="<?= base_url() ?>index.php/home/kasus"><button type="button" class="btn btn-dark">Back</button></a>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                </li>
                <?php  ?>
            </ul>
        </div>
    </div>

</section>
<?php echo form_close()?>