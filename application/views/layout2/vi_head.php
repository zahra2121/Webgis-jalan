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

        <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>
       
        <script src="<?php echo base_url()?>/assets/js/geo.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>template3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <style>
            
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
        </style>
            
    
    </head>