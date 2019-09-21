<script type="text/javascript">
	var id_kategori = '<?= $id_kategori ?>';
	main.loadData(id_kategori);
	main.loadKategori(id_kategori);
	main.lokasi = main.base_url + 'site/data_ditail/';

	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.modal');
		var instances = M.Modal.init(elems);
	});
</script>