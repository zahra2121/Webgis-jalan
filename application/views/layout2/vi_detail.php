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
                    <h4 class="fw-bolder text-secondary"> <?= $detail->daerah_jalan ?></h4><br>
                    <h3 class="fw-bolder text-danger">
                        <?php
                            if($detail->status == '0' and $detail->aek > $detail->ucl){
                                echo "<label class='badge badge-danger' name='$detail->status' id='$detail->status'>DAERAH RAWAN</label>";
                            }
                            elseif($detail->status == '1' and $detail->aek < $detail->ucl){
                                echo "<label class='badge badge-success' name='$detail->status' id='$detail->status'>BUKAN DAERAH RAWAN</label>";
                            }else{
                                echo "<label class='badge badge-warning' name='$detail->status' id='$detail->status'>PROSES</label>";
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
                    if($detail->status == '0' and $detail->aek > $detail->ucl){
                        echo "color: 'red',
                        fillColor: '#FF0000',
                        fillOpacity: 0.3,
                        radius: 30";
                    }
                    elseif($detail->status == '1' and $detail->aek < $detail->ucl){
                        echo "color: 'green',
                        fillColor: '#008000',
                        fillOpacity: 0.3,
                        radius: 30";
                    }else{
                        echo "color: 'yellow',
                        fillColor: '#FFFF00',
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
                        <table class="table" id="dataTable" width="70%">
                        <tbody>
                            <Tr>
                                <th class="text-dark"><h4>Latitude</h4></th>
                                <Td><?php echo $detail->pusat_lat?></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark">Longitude</th>
                                <Td><?php echo $detail->pusat_long?></Td>
                            </Tr>
                            
                            <Tr>
                                <th class="text-dark">Kecamatan</th>
                                <Td><?php echo $detail->kecamatan?></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark">Kabupaten</th>
                                <Td><?php echo $detail->kabupaten?></Td>
                            </Tr>
                    
                            <Tr>
                                <th class="text-dark">Luka Ringan</th>
                                <Td><?php echo $detail->luka_ringan?></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark">Luka Berat</th>
                                <Td><?php echo $detail->luka_berat?></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark">Meninggal</th>
                                <Td><?php echo $detail->meninggal?></Td>
                            </Tr>
                            <Tr>
                                <th class="text-dark">Kerugian Material</th>
                                <Td><?php echo $detail->rugi?></Td>
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