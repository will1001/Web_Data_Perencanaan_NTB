<h4 class="center-align">{{ kategori.nama_bagian }}</h4>
<h3 class="center-align">Upload File Data Kategori {{ kategori.nama }}</h3>
<h6 class="center-align">Provinsi {{ provinsi.nama }}</h6><br>
<form action="<?= base_url() ?>data/upload/<?= $id_kategori ?>" method="post">

    <?php
    $this->load->view('site/_formuploadfiles');
    $this->load->view('templates/footer');
    ?>

    <script type="text/javascript">
        var id_kategori = '<?= $id_kategori ?>';
        main.loadKategori(id_kategori);
        main.loadSumberData();
        main.loadKabKota();
        var lokasi = "<?= base_url() ?>site/index/" + id_kategori;
        main.lokasi = lokasi;
    </script>