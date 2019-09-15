
<h4 class="center-align">{{ kategori.nama_bagian }}</h4>
<h3 class="center-align">Tambah Data Kategori {{ kategori.nama }}</h3>
<h6 class="center-align">Provinsi {{ provinsi.nama }}</h6><br>
<form action="<?= base_url().'data/update/'.$id?>" method="post">

<?php
        $data['id'] = $id;
        $this->load->view('site/_form');
        $this->load->view('templates/footer');
?>
<script type="text/javascript">
    var id = '<?= $id ?>';
    main.loadData_byId(id);
    main.loadSumberData();
    main.loadKabKota();
    var lokasi = "<?= base_url()?>site/index/"+ main.newItem.id_kategori;
    main.lokasi = lokasi;
</script>