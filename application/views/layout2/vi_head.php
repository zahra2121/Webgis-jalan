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
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYMpyDVmi2y43ZdkNmn4ojKmdPpvnUBEM"></script>

        <script>
            function initMap() {
                var mapOptions = {
                    zoom: 14,
                    center: new google.maps.LatLng(0, 0),
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP 
                
                };

                var map = new google.maps.Map(document.getElementById('map_lokasi'), mapOptions);
                var infowindow = new google.maps.InfoWindow({
                    content: "<strong>Lokasi Sekarang</strong>"
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

                // Mendapatkan lokasi GPS terkini
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Lokasi Anda saat ini');
                        infoWindow.open(map);
                        map.setCenter(pos);

                        document.getElementById('current').innerHTML =
                        "Latitude saat ini: " + position.coords.latitude +
                        "<br>Longitude saat ini: " + position.coords.longitude;

                        // Mendapatkan alamat dari koordinat
                        getAddress(position.coords.latitude, position.coords.longitude);

                        var marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title:""
                        });

                    }, function() {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser tidak mendukung Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    infoWindow.setPosition(pos);
                    infoWindow.setContent(browserHasGeolocation ?
                                            'Error: The Geolocation service failed.' :
                                            'Error: Your browser doesn\'t support geolocation.');
                    infoWindow.open(map);
                }

                function getAddress(lat, lng) {
                    var geocoder = new google.maps.Geocoder();
                    var latlng = new google.maps.LatLng(lat, lng);
                    geocoder.geocode({ 'location': latlng }, function(results, status) {
                        if (status === 'OK') {
                        if (results[0]) {
                            document.getElementById('lokasi').innerHTML +=
                            "<br>Address = " + results[0].formatted_address;
                        } else {
                            document.getElementById('lokasi').innerHTML +=
                            "<br>No results found";
                        }
                        } else {
                        console.error('Geocoder failed due to: ' + status);
                        document.getElementById('lokasi').innerHTML +=
                            "<br>Geocoder failed due to: " + status;
                        }
                    });
                }
            }
        </script>

        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>template3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <style>
            #title {padding:5px;}
            #current2 {font-size:10pt;padding:5px;}
            #current {font-size:10pt;padding:5px;}
            #lokasi {font-size:10pt;padding:5px;color: palevioletred;}
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