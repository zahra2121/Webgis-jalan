<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIG Pemetaan Kecelakaan Admin</title>
    <!-- base:css -->

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>template2/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url() ?>template2/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>template/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/vendors/base/vendor.bundle.base.css">

    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>template2/css/bootstrap.css"> -->
    <!-- <script type="text/javascript" href="<?= base_url() ?>template2/js/jquery.js"></script>
    <script type="text/javascript" href="<?= base_url() ?>template2/js/bootstrap.js"></script> -->
    
    <!-- Map Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
        
    <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>

    <!-- Custom styles for this page -->
    <link href="<?= base_url() ?>template3/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        ul {
          list-style-type:none;
          margin:0;
          padding:0;
        }
        .error {
          color: #FF0000;
        }

        .zoomable{
            width: 150px;
        }
        .zoomable:hover{
            transform: scale(1.5);
            transition: 0.5s ease;
        }
    </style>
      
  </head>