<?php echo form_open('home/detailadmin/'. $detailadmin->idkasus)?>
<!-- Content section-->
<section>
    <div class="container">
        <div class="card-body">
        <div class="col-lg-auto mx-3 px-3 py-3">
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
            <br>
                <center><div class="col-md-10 col-sm-4 mx-auto">
                    <h4 class="fw-bolder text-secondary"> <?= $detailadmin->daerah_jalan ?></h4>
                    <h4 class="fw-bolder text-secondary">Kecamatan <?= $detailadmin->kecamatan ?>, Kabupaten <?= $detailadmin->kabupaten?></h4><br>
                    <h3 class="fw-bolder text-danger">
                        <?php
                            if($detailadmin->status == '0' and $detailadmin->aek > $detailadmin->ucl){
                                echo "<label class='badge bg-danger text-white' name='$detailadmin->status' id='$detailadmin->status'>DAERAH RAWAN</label>";
                            }
                            elseif($detailadmin->status == '1' and $detailadmin->aek < $detailadmin->ucl){
                                echo "<label class='badge bg-warning text-dark' name='$detailadmin->status' id='$detailadmin->status'>BUKAN DAERAH RAWAN</label>";
                            }else{
                                echo "<label class='badge bg-success text-white' name='$detailadmin->status' id='$detailadmin->status'>PROSES DATA</label>";
                            }
                        ?>
                    </h3>
                </div></center>

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
            .setLatLng([<?= $detailadmin->pusat_lat ?>, <?= $detailadmin->pusat_long ?>]);

            function onMapClick(e) {
                popup
                .setLatLng(e.latlng)
                .setContent('Titik Latitude dan Longitude : <br>' + e.latlng.toString())
                .openOn(map);
            }
            map.on('click', onMapClick);

            
        </script><br>

            <div>
                <!-- TABEL DETAIL -->
                <div class="col-md-10 col-sm-4 mx-auto">
                    <div class="table-responsive">
                        <table class="table borderless" id="dataTable" width="70%">
                        <tbody>
                            <Tr>
                                <th class="text-dark"><h4>LATITUDE, LONGITUDE</h4></th>
                                <Td><h3><b><?php echo "<label class='badge bg-secondary text-white'>$detailadmin->pusat_lat,$detailadmin->pusat_long</label>"?></b></h3></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark"><h4>KORBAN</h4></th>
                                <Td><h3>
                                    <?php 
                                        if($detailadmin->luka_ringan == 0){
                                            echo "<label class='badge badge-secondary'>LUKA RINGAN: $detailadmin->luka_ringan</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>LUKA RINGAN: $detailadmin->luka_ringan</label>&nbsp";
                                        }
                                        if($detailadmin->luka_berat == 0){
                                            echo "<label class='badge badge-secondary'>LUKA BERAT: $detailadmin->luka_berat</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>LUKA BERAT: $detailadmin->luka_berat</label>&nbsp";
                                        }
                                        if($detailadmin->meninggal == 0){
                                            echo "<label class='badge badge-secondary'>MENINGGAL: $detailadmin->meninggal</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>MENINGGAL: $detailadmin->meninggal</label>&nbsp";
                                        }
                                        if($detailadmin->rugi == 0){
                                            echo "<label class='badge badge-secondary'>KERUGIAN MATERIL: $detailadmin->rugi</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>KERUGIAN MATERIL: $detailadmin->rugi</label>&nbsp";
                                        }
                                    ?>
                                </h3></Td>
                            </Tr>
                        </tbody>
                        </table>
                        <br>
                        <a href="<?= base_url('index.php/home/edit_kasus/' . $detailadmin->idkasus)?>"><button type="button" class="btn btn-warning">Edit</button></a>
                        <input type="hidden" name="idkasus" value="<?=$detailadmin->idkasus;?>">
                        <a href="<?= base_url('index.php/home/hapus_kasus/' . $detailadmin->idkasus)?>" onclick="return confirm('Apakah Anda yakin ingin Menghapus Data <?=$detailadmin->tanggal;?>, pada pukul <?=$detailadmin->jam;?> ?')"><button type="button" class="btn btn-danger">Hapus</button></a>   
                        <br><br>
                        <a href="<?= base_url() ?>index.php/home/kasus"><button type="button" class="btn btn-dark">Back</button></a>
                        <br><br>
                    </div>
                </div>
            </div>            
        </div>
                
    </div>
    </div>

</section>
<?php echo form_close()?>