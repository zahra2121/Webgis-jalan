<script>
    alert("Selamat Datang ". <?php echo ucfirst($this->session->userdata('iduser')); ?>);
</script>

<!-- CHART GRAFIK ADMIN-->
        <section>
            <div class="mx-5 px-3 my-3">
		        <?php foreach ($countkasus as $value) {?>
        	    <div class= "stretch-card">
                        <div class="col-lg-2 mx-3 px-2 py-1 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <h3 class="card-title mb-1 text-dark">DATA KASUS</h3><br>
									<div class="d-flex align-items-center justify-content-between">
										<br><h2 class="text-dark font-weight-bold"><b><?Php echo $value->total_kasus?></b></h2>
									</div>
								</div>
                                <canvas id="newClient" style="width: 100%; height: 30px;"></canvas>
							</div>
						</div>
                        <?php }?>
                        <?php foreach ($countblack as $key => $value) {?>
                            <div class="col-lg-2 px-2 mx-3 py-1 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <h3 class="card-title mb-1 text-dark">DATA JALAN</h3><br>
									<div class="d-flex align-items-center justify-content-between">
										<br><h2 class="text-dark font-weight-bold"><b><?Php echo $value->total_jalan?></b></h2>
									</div>
								</div>
                                <canvas id="projects" style="width: 100%; height: 30px;"></canvas>
							</div>
						</div>
                        <?php }?>
                        <?php foreach ($countrawan as $value) {?>
                        <div class="col-lg-2 px-2 mx-2 py-1 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <h3 class="card-title mb-1 text-dark">STATUS DAERAH RAWAN KECELAKAAN</h3>
									<div class="d-flex align-items-center justify-content-between">
										<br><h2 class="text-danger font-weight-bold"><b><?Php echo $value->tot_rawan?></b></h2>
									</div>
								</div>
                                <canvas id="transactions" style="width: 100%; height: 30px;"></canvas>
							</div>
						</div>
                        <?php }?>
                        <?php foreach ($countaman as $key => $value) {?>
                        <div class="col-lg-2 px-1 mx-2 py-1 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <h3 class="card-title mb-1 text-dark">STATUS BUKAN DAERAH RAWAN KECELAKAAN</h3>
									<div class="d-flex align-items-center justify-content-between">
										<br><h2 class="text-warning font-weight-bold"><b><?Php echo $value->tot_aman?></b></h2>
									</div>
								</div>
                                <canvas id="invoices" style="width: 100%; height: 30px;"></canvas>
							</div>
						</div>
                        <?php }?>
                        <?php foreach ($countproses as $key => $value) {?>
                        <div class="col-lg-2 px-2 mx-3 py-1 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
                                    <h3 class="card-title mb-1 text-dark">STATUS PROSES DATA</h3><br>
									<div class="d-flex align-items-center justify-content-between">
										<br><h2 class="text-success font-weight-bold"><b><?Php echo $value->tot_proses?></b></h2>
									</div>
								</div>
                                <canvas id="allProducts" style="width: 100%; height: 30px;"></canvas>
							</div>
						</div>
			    <?php }?>
        	    </div>
            </div>
        </section>
        
        <!-- GRAFIK ADMIN -->
        <section class="col-lg-6 px-4 center grid-margin stretch-card" style="grid-template-columns: 50% 50%; grid-template-rows: repeat(2, auto);">
            <div class="card mx-2 px-4 center grid-margin stretch-card">
                <div class="card-body"> 
                    <center><h3 class="card-title mb-2 text-dark center">GRAFIK JUMLAH DATA KASUS KECELAKAAN BERDASARKAN TAHUN KEJADIAN</h3></center><br>
                    <div style="grid-template-columns: 50% 50%; grid-template-rows: repeat(2, auto);"><canvas id="myChart1"></canvas>
                    <?php
                    //Inisialisasi nilai variabel awal
                    $nama_status= "";
                    $jumlah=null;
                    $kasus=null;
                    foreach ($counttahun as $item){
                        $jur=$item->tahun;
                        $nama_status .= "'$jur'". ", ";
                        $jum= $item->total_idkasus;
                        $jumlah .= "$jum". ", ";
                    }

                    ?>
                    <script>
                        var ctx = document.getElementById('myChart1').getContext('2d');
                        var chart = new Chart(ctx, {
                            // The type of chart we want to create
                            type: 'line',
                            // The data for our dataset
                            data: {
                                labels: [<?php echo $nama_status; ?>],
                                datasets: [{
                                    label:'Jumlah Data (kasus)',
                                    borderDash: [5, 5],
                                    borderColor: ['rgb(255,165,0)'],
                                    backgroundColor: 'transparent',
                                    pointBorderColor: 'orange',
                                    pointBackgroundColor: 'rgb(255,165,0)',
                                    pointRadius: 5,
                                    pointHoverRadius: 10,
                                    pointHitRadius: 30,
                                    pointBorderWidth: 2,
                                    pointStyle: 'rectRounded',
                                    data: [<?php echo $jumlah; ?>]
                                }]
                            },
                            // Configuration options go here
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    </div>
                </div>
            </div>


            <div class="card mx-3 px-4 center grid-margin stretch-card">
                <div class="card-body"> 
                    <center><h3 class="card-title mb-2 text-dark center">GRAFIK JUMLAH DATA KASUS KECELAKAAN BERDASARKAN KECAMATAN</h3></center><br>
                    <div style="grid-template-columns: 50% 50%; grid-template-rows: repeat(2, auto);"><canvas id="myChart"></canvas>
                    <?php
                    //Inisialisasi nilai variabel awal
                   
                    $nama_status= "";
                    $jumlah=null;
                    $jum2 = null;
                    $jum3 = null;

                    foreach ($countkec as $value){
                        $jur=$value->kecamatan;
                        $nama_status .= "'$jur'". ", ";
                        $jum= $value->total_data;
                        $jumlah .= "$jum". ", ";
                    }
                    
                    foreach ($countkatrawan as $item){
                        // status rawan/kecamatan
                        $jum_status= $item->tot_rawan;
                        $jum2 .= "$jum_status". ", ";
                    }
                    foreach ($countkataman as $item){
                        // status bukan rawan/kecamatan
                        $jum_aman= $item->tot_aman;
                        $jum3 .= "$jum_aman". ", ";
                    }
                    ?>
                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var densityData = {
                            label: 'Jumlah Data (kasus)',
                            data: [<?php echo $jumlah; ?>],
                            backgroundColor: [
                                'rgba(0, 99, 132, 0.6)',
                                'rgba(30, 99, 132, 0.6)',
                                'rgba(60, 99, 132, 0.6)',
                                'rgba(90, 99, 132, 0.6)',
                                'rgba(120, 99, 132, 0.6)',
                                'rgba(150, 99, 132, 0.6)',
                                'rgba(180, 99, 132, 0.6)',
                                'rgba(210, 99, 132, 0.6)',
                                'rgba(240, 99, 132, 0.6)',
                                'rgba(240, 99, 132, 0.6)',
                                'rgba(210, 99, 132, 0.6)',
                                'rgba(180, 99, 132, 0.6)',
                                'rgba(150, 99, 132, 0.6)',
                                'rgba(120, 99, 132, 0.6)',
                                'rgba(90, 99, 132, 0.6)',
                                'rgba(60, 99, 132, 0.6)',
                                'rgba(30, 99, 132, 0.6)',
                                'rgba(0, 99, 132, 0.6)'
                            ],
                            borderColor: [
                                'rgba(0, 99, 132, 1)',
                                'rgba(30, 99, 132, 1)',
                                'rgba(60, 99, 132, 1)',
                                'rgba(90, 99, 132, 1)',
                                'rgba(120, 99, 132, 1)',
                                'rgba(150, 99, 132, 1)',
                                'rgba(180, 99, 132, 1)',
                                'rgba(210, 99, 132, 1)',
                                'rgba(240, 99, 132, 1)',
                                'rgba(240, 99, 132, 1)',
                                'rgba(210, 99, 132, 1)',
                                'rgba(180, 99, 132, 1)',
                                'rgba(150, 99, 132, 1)',
                                'rgba(120, 99, 132, 1)',
                                'rgba(90, 99, 132, 1)',
                                'rgba(60, 99, 132, 1)',
                                'rgba(30, 99, 132, 1)',
                                'rgba(0, 99, 132, 1)'
                                
                            ],
                            borderWidth: 2,
                            hoverBorderWidth: 0
                        };
                        var chartOptions = {
                        scales: {
                            yAxes: [{
                            barPercentage: 0.5
                            }]
                        },
                        };
                              
                        var dataSecond = {
                            label: "Daerah Rawan ",
                            borderColor: ['rgb(255,0,0)'],
                            backgroundColor: 'transparent',
                            pointBorderColor: 'red',
                            pointBackgroundColor: 'rgb(255,0,0)',
                            pointRadius: 5,
                            pointHoverRadius: 10,
                            pointHitRadius: 30,
                            pointBorderWidth: 2,
                            pointStyle: 'rectRounded',
                            data: [<?php echo $jum2; ?>],
                            // Set More Options 
                        };

                        var dataThird = {
                            label: "Daerah Bukan Rawan ",
                            borderColor: 'rgb(255,165,0)',
                            backgroundColor: 'transparent',
                            pointBorderColor: 'orange',
                            pointBackgroundColor: 'rgb(255,165,0)',
                            pointRadius: 5,
                            pointHoverRadius: 10,
                            pointHitRadius: 30,
                            pointBorderWidth: 2,
                            pointStyle: 'rectRounded',
                            data: [<?php echo $jum3; ?>],
                            // Set More Options 
                        };

                        // var barChart = new Chart(ctx, {
                        // type: 'bar',
                        // data: {
                        //     labels: [<?php echo $nama_status; ?>],
                        //     datasets: [densityData],
                        // },
                        // options: chartOptions
                        // });

                        var barChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [<?php echo $nama_status; ?>],
                            datasets: [dataSecond, dataThird],
                        }
                        });
                        
                    </script>
                    </div>
                </div>
            </div>
        </section>
 
        <!-- MAPS ADMIN -->
        <section class="card mx-3 px-4 my-3">
            <div class="card-body">
                <div class="row">
                    <center><h1 class="card-title mb-2 text-dark center">PETA PEMETAAN TITIK LOKASI KECELAKAAN LALU LINTAS DI KABUPATEN BANTUL</h1></center><br>
                    <center><div class="mx-2 px-4 py-4 my-2">
                        <p> 🔴 : <label class='badge bg-danger text-white' >DAERAH RAWAN</label><br>
                            🟡 : <label class='badge bg-warning text-dark'>BUKAN DAERAH RAWAN </label><br>
                            🟢 : <label class='badge bg-success text-white'>PROSES DATA</label></p>
                    </div></center>
                    <br><br>

                    <!-- Add Peta, Polygon Kecamatan -->
                    <div id="map" style="width: 100%; height: 680px;"></div>
                    <script src="<?= base_url()?>assets/kecamatan/bambanglipuro.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/banguntapan.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/bantul.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/dlingo.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/imogiri.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/jetis.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/kasihan.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/kretek.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/pajangan.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/pandak.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/piyungan.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/pleret.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/pundong.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/sanden.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/sedayu.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/sewon.js"></script>
                    <script src="<?= base_url()?>assets/kecamatan/sradakan.js"></script>

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
                            maxZoom: 18,
                            id: 'mapbox/outdoors-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q'
                        });


                        var peta5 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 18,
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        });


                        var peta6 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFyZGFsaXVzIiwiYSI6ImNsZnVtbDdtZzAyYjMzdXRhdDN6djY5cWoifQ.Xqtyqa7hvGhQla2oAwpG_Q', {
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                            id: 'mapbox/dark-v10'
                        });


                        var peta7 = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                            maxZoom: 19,
                            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                                '<a href="https://carto.com/attributions">CARTO</a>'
                        });


                        var peta8 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                            attribution: 'Map data &copy; <a href="https://www.arcgis.com/">ArcGIS</a>'
                        });


                        var peta9 = L.tileLayer('https://{s}.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
                        });


                        var peta10 = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                            maxZoom: 20,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            attribution: 'Map data &copy; <a href="https://www.google.com/maps">Google Maps</a>'
                        });

                        var map = L.map('map', {
                            center: [-7.889229799481091, 110.34618188086941],
                            zoom: 12,
                            layers: [peta5],
                        });

                        var baseLayers = {
                            'GMaps': peta2,
                            'Satelite': peta3,
                            'Street': peta5,
                            'Light': peta7,
                            'ArcGIS': peta8,
                        };

                        var layerControl = L.control.layers(baseLayers).addTo(map);


                        //STATE POLYGON MAPS
                        L.geoJSON(bambanglipuro, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(0, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);

                        L.geoJSON(banguntapan, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(30, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(bantul, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(60, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(dlingo, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(90, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(imogiri, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(120, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(jetis, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(150, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(kasihan, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(180, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(kretek, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(210, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(pajangan, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(240, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(pandak, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(0, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(piyungan, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(210, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(pleret, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(180, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(pundong, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(150, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(sanden, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(120, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(sedayu, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(90, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(sewon, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(60, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);
                        L.geoJSON(sradakan, {
                            style: function(feature) {
                                return{
                                    color: 'rgba(30, 99, 132, 0.6)',
                                    fillOpacity: 0.3,
                                }
                            },
                            onEachFeature: function(feature, layer) {
                                if (feature.properties && feature.properties.kecamatan) {
                                    layer.bindTooltip(feature.properties.kecamatan, {
                                        permanent: true,
                                        direction: 'center',
                                        className: 'polygon-label'
                                    }).openTooltip();
                                }
                            }
                        }).addTo(map);

                        // CIRCLE BLACK SPOT
                        <?php foreach ($black as $value) {?>
                            var circle = L.circle([<?= $value->pusat_lat ?>, <?=$value->pusat_long ?>], {
                                    <?php
                                        if($value->status == '0' and $value->aek > $value->bca){
                                            echo "color: 'red',
                                            fillColor: '#FF0000',
                                            fillOpacity: 0.7,
                                            radius: 200";
                                        }
                                        elseif($value->status == '1' and $value->aek < $value->bca){
                                            echo "color: 'yellow',
                                            fillColor: '#FFFF00',
                                            fillOpacity: 0.3,
                                            borderOpacity: 0.5,
                                            radius: 200";
                                        }
                                        elseif($value->status == '2' and $value->aek == 0){
                                            echo "color: 'green',
                                            fillColor: '#008000',
                                            fillOpacity: 0.3,
                                            borderOpacity: 0.5,
                                            radius: 150";
                                        }
                                    ?>
                            })
                            .bindPopup("<h5><b> Daerah Jalan <?= $value->idblack?> <br><br><?= $value->daerah_jalan?></b><br><br> Kecamatan : <?= $value->kecamatan?><br> Tahun : <?= $value->tahun?><br> Jumlah Kasus : <?= $value->total_idkasus?><br><br> Status Jalan : <?php
                                    if($value->status == '0' and $value->aek > $value->bca){
                                        echo "<label class='badge bg-danger text-white' name='$value->status' id='$value->status'>DAERAH RAWAN</label>";
                                    }
                                    elseif($value->status == '1' and $value->aek < $value->bca){
                                        echo "<label class='badge bg-warning text-dark' name='$value->status' id='$value->status'>BUKAN DAERAH RAWAN</label>";
                                    }else{
                                        echo "<label class='badge bg-success text-white' name='$value->status' id='$value->status'>PROSES DATA</label>";
                                    }
                               
                                ?><br><br></h5>")
                            .addTo(map);
                                
                        <?php }?>

                        var popup = L.popup()
                        .setLatLng([-7.889995974115885, 110.34488101173861]);

                        function onMapClick(e) {
                            popup
                            .setLatLng(e.latlng)
                            .setContent('Titik Latitude dan Longitude : <br>' + e.latlng.toString())
                            .openOn(map);
                        }
                        map.on('click', onMapClick);
                        
                    </script>
                </div>
            </div>
        </section> 
 