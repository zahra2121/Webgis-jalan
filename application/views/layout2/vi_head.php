<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIG Pemetaan Kecelakaan Kab Bantul</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?= base_url() ?>template2/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url() ?>template2/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?= base_url() ?>template/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>template/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>template/vendors/base/vendor.bundle.base.css">

        <!-- Map Leaflet-->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

        <script src="leaflet.ajax.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>

        <!-- GPS OTOMATIS GOOGLE -->
        <script src="<?php echo base_url()?>/assets/js/geo.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>

        <script>
            function initialize_map()
            {
                var myOptions = {
                    zoom: 4,
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP      
                    }	
                map = new google.maps.Map(document.getElementById("map_lokasi"), myOptions);
            }
            function initialize()
            {
                if(geo_position_js.init())
                {
                document.getElementById('current').innerHTML="Receiving...";
                geo_position_js.getCurrentPosition(show_position,function(){document.getElementById('current').innerHTML="Couldn't get location"},{enableHighAccuracy:true});
                }
                else
                {
                document.getElementById('current').innerHTML="Functionality not available";
                }
            }

            function show_position(p)
            {
                document.getElementById('current').innerHTML="Titik Latitude saat ini: <span class='badge badge-danger col-xs-4'>"+p.coords.latitude+"</span><br>Longitude saat ini: <span class='badge badge-danger'>"+p.coords.longitude+"</span>";
                
                document.getElementById('latitude').innerHTML=p.coords.latitude.toFixed(5);
                document.getElementById('longitude').innerHTML=p.coords.longitude.toFixed(5);

                var pos=new google.maps.LatLng(p.coords.latitude,p.coords.longitude);
                map.setCenter(pos);
                map.setZoom(14);

                //getAddress(p.coords.latitude, p.coords.longitude);

                var infowindow = new google.maps.InfoWindow({
                    content: "<strong>Lokasi Sekarang</strong>"
                });

                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title:""
                });

                google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
                });

                $(document).ready(function() {
                    navigator.geolocation.getCurrentPosition(function (pos) {
                        tampilLokasi(pos);
                    }, function (e) {
                        alert('Geolocation Tidak Mendukung Pada Browser Anda');
                    }, {
                        enableHighAccuracy: true
                    });
                });

            }

            function tampilLokasi(p) {
                //console.log(posisi);
                var latitude 	= p.coords.latitude;
                var longitude 	= p.coords.longitude;
                $.ajax({
                type 	: 'POST',
                url		: 'vi_lokasi.php',
                data 	: 'latitude='+p.coords.latitude+'&longitude='+p.coords.longitude,
                success	: function (e) {
                    if (e) {
                    $('#lokasi').html(e);
                    }else{
                    $('#lokasi').html('Tidak Tersedia');
                    }
                }
                })
            }

            function getAddress(lat, lng) {
                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(lat, lng);
                geocoder.geocode({ 'location': latlng }, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            document.getElementById('current2').innerHTML +=
                            "<br>Alamat = " + results[0].formatted_address;
                        } else {
                            document.getElementById('current2').innerHTML +=
                            "<br>No results found";
                        }
                    } 
                    else {
                        document.getElementById('current2').innerHTML +=
                            "<br>Geocoder failed due to: " + status;
                    }
                });
            }
 
        </script>
        <script>
            var langID = "en-US", mapCanvas = "#map_lokasi", $ = jQuery;
            setInterval(function () {googlemap_remap();}, 10);
            function googlemap_remap() {
                $(`${mapCanvas}>div:last-of-type`).hide(); //hide top message says this is for dev only
                var gimg = $(`img[src*="maps.googleapis.com/maps/vt?"]:not(.gmf)`);
                $.each(gimg, function(i,x){
                    var imgurl = $(x).attr("src");
                    var urlarray = imgurl.split('!');
                    var newurl = ""; var newc = 0;
                    for (i = 0; i < 1000; i++) {if (urlarray[i] == "2s"+langID){newc = i-3;break;}}
                    for (i = 0; i < newc+1; i++) {newurl += urlarray[i] + "!";}
                    $(x).attr("src",newurl).addClass("gmf");
                });
            }
            var buttons = document.querySelectorAll(".dismissButton");
            buttons.forEach(function (button) {
                button.click();
            });
        </script>

        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>template3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <style>
            #title {padding:5px;}
            #current2 {font-size:10pt;padding:5px;}
            #current {font-size:10pt;padding:5px;}
            #lokasi {font-size:10pt;padding:5px;}
            ul {
                display:grid;
                list-style-type:none;
                margin:0;padding:0;
                grid-template-columns: 50% auto;
                grid-template-rows: repeat(2, auto);
            }
            .error {
                color: #FF0000;
            }

            body {
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            }
            
            /* Table */
            table {
                margin: auto;
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
                font-size: 12px;

            }
            .demo-table {
                border-collapse: collapse;
                font-size: 13px;
            }
            .demo-table th, 
            .demo-table td {
                border-bottom: 1px solid #e1edff;
                border-left: 1px solid #e1edff;
                padding: 7px 17px;
            }
            .demo-table th, 
            .demo-table td:last-child {
                border-right: 1px solid #e1edff;
            }
            .demo-table td:first-child {
                border-top: 1px solid #e1edff;
            }
            .demo-table td:last-child{
                border-bottom: 0;
            }
            caption {
                caption-side: top;
                margin-bottom: 10px;
            }
            
            /* Table Header */
            .demo-table thead th {
                background-color: #508abb;
                color: #FFFFFF;
                border-color: #6ea1cc !important;
                text-transform: uppercase;
            }
            
            /* Table Body */
            .demo-table tbody td {
                color: #353535;
            }
            
            .demo-table tbody tr:nth-child(odd) td {
                background-color: #f4fbff;
            }
            .demo-table tbody tr:hover th,
            .demo-table tbody tr:hover td {
                background-color: #ffffa2;
                border-color: #ffff0f;
                transition: all .2s;
            }

            .zoomable{
                width: 150px;
            }
            .zoomable:hover{
                transform: scale(1.5);
                transition: 0.5s ease;
            }

            .polygon-label {
                font-size: 20px;
                font-weight: bold;
                background: none;
                border: none;
                box-shadow: none;
                color: navy;
            }

            #copyButton {
                background-color: #4CAF50; /* Warna background hijau */
                border: none; /* Menghilangkan border */
                color: white; /* Warna teks putih */
                padding: 15px 32px; /* Padding di dalam tombol */
                text-align: center; /* Teks di tengah */
                text-decoration: none; /* Menghilangkan underline */
                display: inline-block; /* Tampilan inline-block */
                font-size: 16px; /* Ukuran font */
                margin: 4px 2px; /* Margin */
                cursor: pointer; /* Pointer saat hover */
                border-radius: 12px; /* Membuat border melengkung */
                transition: background-color 0.3s ease; /* Animasi transisi saat background berubah */
            }

            #copyButton:hover {
                background-color: #45a049; /* Warna background saat di-hover */
            }

            #copyButton:active {
                background-color: #3e8e41; /* Warna background saat diklik */
                box-shadow: 0 5px #666; /* Bayangan saat diklik */
                transform: translateY(4px); /* Efek tekan ke bawah */
            }
        </style>
    </head>