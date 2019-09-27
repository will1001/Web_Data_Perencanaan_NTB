<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB SIPD</title>

    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/gif">

    <!-- <link rel="stylesheet" href="styles.css"> -->

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/materialize.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/axios.js"></script>
    <script src="<?= base_url() ?>assets/js/vue.js"></script>
</head>

<body>
    <nav class="nav-wraper indigo">
        <div class="container">
            <a href="<?= base_url() ?>" class="brand-logo">Web SIPD</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= base_url() ?>">Umum</a></li>
                <li><a href="<?= base_url() ?>site/data_pilihan">Pilihan</a></li>
                <li><a href="<?= base_url() ?>site/data_wajib">Wajib</a></li>
                <li><a href="<?= base_url() ?>site/data_wajib">Realitas Pemb.</a></li>
                <li><a href="<?= base_url() ?>site/data_wajib">Rencana Pemb.</a></li>
                <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-links">
        <li class="indigo darken-2 white-text center-align">Menu</li>
        <li><a href="<?= base_url() ?>">Umum<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>site/data_pilihan">Urusan Pilihan<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>site/data_wajib">Urusan Wajib<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>site/data_wajib">Realitas Pembangunan<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>site/data_wajib">Rencana Pembangunan<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>auth/logout">Logout<i class="material-icons left">exit_to_app</i></a></li>
    </ul>
    <div id="main-app">
        <div class="container">