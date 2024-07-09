<?php echo form_open('user/detail/'. $detail->idkasus)?>
<!-- Content section-->
<section>
    <div class="container">
        <div class="card-body">
        <div class="col-lg-auto mx-3 px-3 py-3">
            <br><br>
            <?php
                echo "<center><h1 class='fs-3 fw-bolder'>TANGGAL ". date('d ', strtotime($detail->tanggal));
                $month = date('F', strtotime($detail->tanggal));
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
                echo date(' Y', strtotime($detail->tanggal))." </h1></center>";
                
                echo "<center><h4 class='fw-bolder'>PUKUL " . date('H.i', strtotime($detail->jam)).  " WIB</h4></center>"; 
            ?>
            <br>
                <center><div class="col-md-10 col-sm-4 mx-auto">
                    <h4 class="fw-bolder text-secondary"> <?= $detail->daerah_jalan ?></h4>
                    <h4 class="fw-bolder text-secondary text-warning"> <?= "(Patokan : ".$detail->patokan. ")" ?></h4>
                    <h4 class="fw-bolder text-secondary">Kecamatan <?= $detail->kecamatan ?>, Kabupaten <?= $detail->kabupaten?></h4><br>
                    <h3 class="fw-bolder text-danger">
                        <?php
                            if($detail->status == '0' and $detail->aek > $detail->bca){
                                echo "<label class='badge bg-danger text-white' name='$detail->status' id='$detail->status'>DAERAH RAWAN</label>";
                            }
                            elseif($detail->status == '1' and $detail->aek < $detail->bca){
                                echo "<label class='badge bg-warning text-dark' name='$detail->status' id='$detail->status'>BUKAN DAERAH RAWAN</label>";
                            }
                            elseif($detail->status == '2' and $detail->aek == 0){
                                echo "<label class='badge bg-success text-white' name='$detail->status' id='$detail->status'>PROSES DATA</label>";
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
                center: [<?= $detail->pusat_lat ?>, <?= $detail->pusat_long ?>],
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
            var circle = L.circle([<?= $detail->pusat_lat ?>, <?=$detail->pusat_long ?>], {
                <?php
                    if($detail->status == '0' and $detail->aek > $detail->bca){
                        echo "color: 'red',
                        fillColor: '#FF0000',
                        fillOpacity: 0.3,
                        radius: 30";
                    }
                    elseif($detail->status == '1' and $detail->aek < $detail->bca){
                        echo "color: 'yellow',
                        fillColor: '#FFFF00',
                        fillOpacity: 0.3,
                        radius: 30";
                    }
                    elseif($detail->status == '2' and $detail->aek == 0){
                        echo "color: 'green',
                        fillColor: '#008000',
                        fillOpacity: 0.3,
                        radius: 30";
                    }
                ?>
            }).addTo(map)
            .bindPopup("<h5><b> Daerah Jalan<br><br><?= $detail->daerah_jalan?></b><br><br> Latitude : <?= $detail->pusat_lat?><br><br> Longitude : <?= $detail->pusat_long?><br><br></h5>");
            
            vpup = L.popup()
            .setLatLng([<?= $detail->pusat_lat ?>, <?= $detail->pusat_long ?>]);

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
                                <Td><h3><b><?php echo "<label class='badge bg-secondary text-white'>$detail->pusat_lat, $detail->pusat_long</label>"?></b></h3></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark"><h4>KORBAN</h4></th>
                                <Td><h3>
                                    <?php 
                                        if($detail->luka_ringan == 0){
                                            echo "<label class='badge badge-secondary'>LUKA RINGAN: $detail->luka_ringan</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>LUKA RINGAN: $detail->luka_ringan</label>&nbsp";
                                        }
                                        if($detail->luka_berat == 0){
                                            echo "<label class='badge badge-secondary'>LUKA BERAT: $detail->luka_berat</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>LUKA BERAT: $detail->luka_berat</label>&nbsp";
                                        }
                                        if($detail->meninggal == 0){
                                            echo "<label class='badge badge-secondary'>MENINGGAL: $detail->meninggal</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>MENINGGAL: $detail->meninggal</label>&nbsp";
                                        }
                                        if($detail->rugi == 0){
                                            echo "<label class='badge badge-secondary'>KERUGIAN MATERIL: $detail->rugi</label>&nbsp";
                                        }else{
                                            echo "<label class='badge badge-danger'>KERUGIAN MATERIL: $detail->rugi</label>&nbsp";
                                        }
                                    ?>
                                </h3></Td>
                            </Tr>
                        </tbody>
                        </table>
                        <br>
                        <a href="<?= base_url() ?>index.php/user/tabelsemua"><button type="button" class="btn btn-dark">Back</button></a>
                        <br><br>
                    </div>
                </div>
            </div>            
        </div>
                
    </div>
    </div>

</section>
<?php echo form_close()?>