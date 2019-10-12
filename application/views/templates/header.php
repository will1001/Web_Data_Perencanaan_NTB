<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basis Data Perencanaan NTB</title>

    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico" type="image/gif">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />

    <!-- <link rel="stylesheet" href="styles.css"> -->

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/materialize.js"></script>
   

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/axios.js"></script>
    <script src="<?= base_url() ?>assets/js/vue.js"></script>
    <style>
        ul#data {
            width: 261px !important;
        }

        .margin-0 {
            margin: 0px !important;
        }

        .cari-sd {}

        /* .cari-sd input:focus {
            border-bottom: none !important;
            box-shadow: none !important;
        } */

        .cari-sd:focus {
            position: relative;
            z-index: 200;
            margin-top: 10px !important;
            margin-left: 0px !important;
            padding-left: 10px !important;
            width: 95% !important;
            color: black;
            border-bottom: none !important;
            box-shadow: none !important;
            background-color: #fff !important;
        }

        ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: gray;
            /* opacity: 1; */
            /* Firefox */
        }


        .kotak-sumber_data {
            margin-top: -53px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            position: relative;
            z-index: 100;
            max-height: 400px;
            overflow: scroll;
        }

        .isi-sumber_data-kosong {
            padding-top: 48.5px;
        }

        .isi-sumber_data {
            position: relative;
            z-index: 101;
            background-color: white;
            padding: 10px 0 10px 15px;
            margin: 0px;
        }

        .isi-sumber_data:hover {
            background-color: #e0e0e0;
            color: #757575;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Dropdown Structure -->
    <ul id="data_urusan_pilihan1" class="dropdown-content">
        <li><a href="#!">Kelautan dan Perikanan</a></li>
        <li><a href="#!">Pariwisata</a></li>
        <li><a href="#!">Pertanian</a></li>
        <li><a href="#!">Kehutanan</a></li>
        <li><a href="#!">Energi dan SumberDaya Mineral</a></li>
        <li><a href="#!">Perdagangan</a></li>
        <li><a href="#!">Perindustrian</a></li>
        <li><a href="#!">Transmigrasi</a></li>
    </ul>
    <ul id="data_urusan_pilihan2" class="dropdown-content">
        <li><a href="#!">Kelautan dan Perikanan</a></li>
        <li><a href="#!">Pariwisata</a></li>
        <li><a href="#!">Pertanian</a></li>
        <li><a href="#!">Kehutanan</a></li>
        <li><a href="#!">Energi dan SumberDaya Mineral</a></li>
        <li><a href="#!">Perdagangan</a></li>
        <li><a href="#!">Perindustrian</a></li>
        <li><a href="#!">Transmigrasi</a></li>
    </ul>
    <ul id="data_urusan_wajib1" class="dropdown-content">
        <li><a href="#!">Pendidikan</a></li>
        <li><a href="#!">Kesehatan</a></li>
        <li><a href="#!">Pekerjaan Umum dan Penataan Ruang</a></li>
        <li><a href="#!">Perumahan dan Kawasan Permukiman</a></li>
        <li><a href="#!">Keamanan dan Ketertiban Umum</a></li>
        <li><a href="#!">Sosial</a></li>
        <li><a href="#!">Tenaga Kerja</a></li>
        <li><a href="#!">Pemberdayaan Perempuan dan Perlindungan Anak</a></li>
        <li><a href="#!">Pangan</a></li>
        <li><a href="#!">Pertanahan</a></li>
        <li><a href="#!">Lingkungan Hidup</a></li>
        <li><a href="#!">Administrasi Kependudukan dan Pencatatan Sipil</a></li>
        <li><a href="#!">Pemberdayaan Masyarakat Desa</a></li>
        <li><a href="#!">Pengendalian Penduduk dan Keluarga Berencana</a></li>
        <li><a href="#!">Perhubungan</a></li>
        <li><a href="#!">Komunikasi dan Informatika</a></li>
        <li><a href="#!">Koperasi Usaha Kecil dan Menengah</a></li>
        <li><a href="#!">Penanaman Modal</a></li>
        <li><a href="#!">Kepemudaan dan Olahraga</a></li>
        <li><a href="#!">Kebudayaan</a></li>
        <li><a href="#!">Perpustakaan</a></li>
        <li><a href="#!">Kearsipan</a></li>
    </ul>
    <ul id="data_urusan_wajib2" class="dropdown-content">
        <li><a href="#!">Pendidikan</a></li>
        <li><a href="#!">Kesehatan</a></li>
        <li><a href="#!">Pekerjaan Umum dan Penataan Ruang</a></li>
        <li><a href="#!">Perumahan dan Kawasan Permukiman</a></li>
        <li><a href="#!">Keamanan dan Ketertiban Umum</a></li>
        <li><a href="#!">Sosial</a></li>
        <li><a href="#!">Tenaga Kerja</a></li>
        <li><a href="#!">Pemberdayaan Perempuan dan Perlindungan Anak</a></li>
        <li><a href="#!">Pangan</a></li>
        <li><a href="#!">Pertanahan</a></li>
        <li><a href="#!">Lingkungan Hidup</a></li>
        <li><a href="#!">Administrasi Kependudukan dan Pencatatan Sipil</a></li>
        <li><a href="#!">Pemberdayaan Masyarakat Desa</a></li>
        <li><a href="#!">Pengendalian Penduduk dan Keluarga Berencana</a></li>
        <li><a href="#!">Perhubungan</a></li>
        <li><a href="#!">Komunikasi dan Informatika</a></li>
        <li><a href="#!">Koperasi Usaha Kecil dan Menengah</a></li>
        <li><a href="#!">Penanaman Modal</a></li>
        <li><a href="#!">Kepemudaan dan Olahraga</a></li>
        <li><a href="#!">Kebudayaan</a></li>
        <li><a href="#!">Perpustakaan</a></li>
        <li><a href="#!">Kearsipan</a></li>
    </ul>

    <ul id="data" class="dropdown-content">
        <li><a href="<?= base_url() ?>">Data Umum</a></li>
        <li><a href="<?= base_url() ?>site/data_pilihan">Data Urusan Pilihan</a></li>
        <li><a href="<?= base_url() ?>site/data_wajib">Data Urusan Wajib</a></li>
        <li><a href="<?= base_url() ?>site/data_realisasi">Data Realisasi Pembangunan Provinsi NTB</a></li>
        <li><a href="<?= base_url() ?>site/data_rencana">Data Rencana Pembangunan Provinsi NTB</a></li>
    </ul>
    <nav class="nav-wraper indigo">
        <div class="container">
            <a href="<?= base_url() ?>" class="brand-logo">Basis Data Perencanaan NTB</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= base_url() ?>user">User</a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="data">Data<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="<?= base_url() ?>auth/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-links">
        <li class="indigo darken-2 white-text center-align">Menu</li>
        <li title="Data Umum"><a href="<?= base_url() ?>">Umum<i class="material-icons left">dvr</i></a></li>
        <li title="Data Urusan Pilihan"><a href="<?= base_url() ?>site/data_pilihan">Urusan Pilihan<i class="material-icons left">dvr</i></a></li>
        <li title="Data Urusan Wajib"><a href="<?= base_url() ?>site/data_wajib">Urusan Wajib<i class="material-icons left">dvr</i></a></li>
        <li title="Data Realisasi Pembangunan"><a href="<?= base_url() ?>site/data_realisasi">Realisasi Pembangunan<i class="material-icons left">dvr</i></a></li>
        <li title="Data Rencana Pembangunan"><a href="<?= base_url() ?>site/data_rencana">Rencana Pembangunan<i class="material-icons left">dvr</i></a></li>
        <li><a href="<?= base_url() ?>auth/logout">Logout<i class="material-icons left">exit_to_app</i></a></li>
    </ul>
    <div id="main-app">
        <div class="container">