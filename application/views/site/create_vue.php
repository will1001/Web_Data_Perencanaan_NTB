<script type="text/javascript">
	var id_kategori = '<?= $id_kategori ?>';
	main.loadKategori(id_kategori);
    main.loadSumberData();
    main.loadKabKota();
    var lokasi = "<?= base_url()?>site/index/"+id_kategori;
    main.lokasi = lokasi;
</script>