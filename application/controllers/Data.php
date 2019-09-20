<?php
class Data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_model', 'mData');
		$this->load->model('label_model', 'mLabel');
		$this->load->model('keterangan_model', 'mKeterangan');
	}

	public function get_byId($id)
	{
		$data = $this->mData->get_data_byId($id);
		echo json_encode($data);
	}
	public function get($id = null)
	{
		$data = $this->mData->get_data($id);
		echo json_encode($data);
	}
	public function get_sumber_data()
	{
		$data = $this->mData->get_sumber_data();
		echo json_encode($data);
	}
	public function get_provinsi()
	{
		$data = $this->mData->get_provinsi();
		echo json_encode($data);
	}
	public function get_kab_kota()
	{
		$data = $this->mData->get_kab_kota();
		echo json_encode($data);
	}
	public function get_kategori($id)
	{
		$data = $this->mData->get_kategori($id);
		echo json_encode($data);
	}
	public function get_kategori_by_name($name)
	{
		// hapus karakter special
		$name = str_replace("%20", " ", $name);
		$data = $this->mData->get_kategori_by_name($name);
		echo json_encode($data);
	}
	public function get_kategoriAll($id)
	{
		$data = $this->mData->get_kategoriAll($id);
		echo json_encode($data);
	}
	public function get_bagian()
	{
		$data = $this->mData->get_bagian();
		echo json_encode($data);
	}
	public function update($id)
	{
		$id_kab_kota = $this->input->post('id_kab_kota');
		if (!$id_kab_kota) $id_kab_kota = null;

		$id_sumber_data = $this->input->post('id_sumber_data');
		if (!$id_sumber_data) $id_sumber_data = null;

		$id_kategori = $this->input->post('id_kategori');
		$data = [
			// 'nama_data' => 'coba 1',
			// 'id_kategori' => "2",
			// 'id_prov' => "52",
			'nama_data' => $this->input->post('nama_data'),
			'id_kategori' => $id_kategori,
			'id_prov' => $this->input->post('id_prov'),
			'id_kab_kota' => $id_kab_kota,
			'kec' => $this->input->post('kec'),
			'urusan' => $this->input->post('urusan'),
			'id_table' => $this->input->post('id_table'),
			'elemen' => $this->input->post('elemen'),
			'id_sumber_data' => $id_sumber_data,
			'nilai' => $this->input->post('nilai'),
			'satuan' => $this->input->post('satuan'),
			'tahun' => $this->input->post('tahun'),
			'updated_at' => date("Y/m/d"),
		];
		//simpan data dan ambil id_data
		$this->mData->data_update($data, $id);
		$nama_keterangan = $this->input->post('nama_keterangan[]');
		$id_keterangan = $this->input->post('id_keterangan[]');
		$id_labels = [];
		if ($nama_keterangan) {
			foreach ($nama_keterangan as $key => $keterangan) {
				if (!$keterangan) continue; //abaikan jika keterangan kosong/null
				$label = [
					'nama' => $keterangan,
				];
				//cari label yang sama, Jika tidak ada simpan,
				//kemudian ambil id_label nya sebanyak keterangan yang di inputkan
				$id_labels[$key] = $this->mLabel->getId($keterangan);
				if (!$id_labels[$key])
					$id_labels[$key] = $this->mLabel->add($label);
			}
		}
		// simpan semua keterangan, sebanyak keterangan yang di inputkan
		foreach ($id_labels as $key => $id_label) {
			$keterangan = [
				'id_data' => $id,
				'id_label' => $id_label,
			];
			// jika ada id_keterangan, update. Jika TIDAK ada, tambah data
			if ($id_keterangan[$key]) {
				$this->mKeterangan->update($keterangan, $id_keterangan[$key]);
			} else {
				$this->mKeterangan->add($keterangan);
			}
		}
		redirect(base_url() . "site/index/" . $id_kategori);
	}
	public function create()
	{
		$id_kab_kota = $this->input->post('id_kab_kota');
		if (!$id_kab_kota) $id_kab_kota = null;

		$id_sumber_data = $this->input->post('id_sumber_data');
		if (!$id_sumber_data) $id_sumber_data = null;
		$id_kategori = $this->input->post('id_kategori');

		$data = [
			// 'nama_data' => 'coba 1',
			// 'id_kategori' => "2",
			// 'id_prov' => "52",
			'nama_data' => $this->input->post('nama_data'),
			'id_kategori' => $id_kategori,
			'id_prov' => $this->input->post('id_prov'),
			'id_kab_kota' => $id_kab_kota,
			'kec' => $this->input->post('kec'),
			'urusan' => $this->input->post('urusan'),
			'id_table' => $this->input->post('id_table'),
			'elemen' => $this->input->post('elemen'),
			'id_sumber_data' => $id_sumber_data,
			'nilai' => $this->input->post('nilai'),
			'satuan' => $this->input->post('satuan'),
			'tahun' => $this->input->post('tahun'),
			'created_at' => date("Y/m/d"),
			'updated_at' => NULL,
		];
		//simpan data dan ambil id_data
		$id_data = $this->mData->add_data($data);
		$nama_keterangan = $this->input->post('nama_keterangan[]');
		$id_labels = [];
		if ($nama_keterangan) {
			foreach ($nama_keterangan as $key => $keterangan) {
				if (!$keterangan) continue; //abaikan jika keterangan kosong/null
				$label = [
					'nama' => $keterangan,
				];
				//cari label yang sama, Jika tidak ada simpan,
				//kemudian ambil id_label nya sebanyak keterangan yang di inputkan
				$id_labels[$key] = $this->mLabel->getId($keterangan);
				if (!$id_labels[$key])
					$id_labels[$key] = $this->mLabel->add($label);
			}
		}
		// simpan semua keterangan, sebanyak keterangan yang di inputkan
		foreach ($id_labels as $id_label) {
			$keterangan = [
				'id_data' => $id_data,
				'id_label' => $id_label,
			];
			$this->mKeterangan->add($keterangan);
		}
		redirect(base_url() . "site/index/" . $id_kategori);
	}
	public function delete()
	{
		$id = $this->input->post('id');
		// echo 'berhasil mengakses data id-'.$id;
		if ($id) {
			$this->mData->delete($id);
		}
	}
	public function import()
	{
		set_time_limit(1000);

		// At start of script
		$time_start = microtime(true);

		$data1 = $this->input->post('data1');
		$id_kategori = $this->input->post('id_kategori');
		$data1 = json_decode($data1);

		$data = [];
		foreach ($data1 as $key => $dat) {
			$id_kab_kota = $dat->kab_kota;
			if ($id_kab_kota < 1) {
				$id_kab_kota = null;
			}
			$nama_data = $dat->nama_data;
			if (!$nama_data) {
				$nama_data = "-";
			}

			$tahun = $dat->tahun . '/01/01';
			$data[$key] = [];
			$data[$key]['nama_data'] =  $nama_data;
			$data[$key]['id_kategori'] =  $id_kategori;
			$data[$key]['id_prov'] =  52;
			$data[$key]['id_kab_kota'] =  $id_kab_kota;
			$data[$key]['kec'] =  $dat->kec;
			$data[$key]['urusan'] =  $dat->urusan;
			$data[$key]['id_table'] =  $dat->id_table;
			$data[$key]['elemen'] =  $dat->elemen;
			$id_sumber_data = null;
			if ($dat->sumber_data) {
				// id_sumber_data tidak selalu ada
				if (!$this->mData->get_sumber_data($dat->sumber_data)) {
					// echo $dat->sumber_data;
					$this->mData->add_sumber_data($dat->sumber_data);
					// tambah sumber data jika id tidak ditemukan
				}
				$id_sumber_data = $dat->sumber_data;
			}
			$data[$key]['id_sumber_data'] = $id_sumber_data;
			$data[$key]['nilai'] =  $dat->nilai;
			$data[$key]['satuan'] =  $dat->satuan;
			$data[$key]['tahun'] =  $tahun;
			$data[$key]['created_at'] =  date("Y/m/d");
			$data[$key]['updated_at'] =  null;
			//Tambah Data baru 
			$id_data = $this->mData->add_data($data[$key]);
			$nama_keterangan = [];
			$id_labels = [];
			$data[$key]['keterangan'] =  [];
			$j = 0;
			$dat_ket = (array) $dat;
			for ($i = 0; $i < 5; $i++) {
				$keterangan = $nama_keterangan[$i] = $dat_ket['sub_ket' . ($i + 1)];
				if (!$keterangan) continue; //abaikan jika keterangan kosong/null
				$data[$key]['keterangan'][$j++] = $keterangan;
				$label = [
					'nama' => $keterangan,
				];
				//cari label yang sama, Jika tidak ada simpan,
				//kemudian ambil id_label nya sebanyak keterangan yang di inputkan
				$id_labels[$i] = $this->mLabel->getId($keterangan);
				if (!$id_labels[$i])
					$id_labels[$i] = $this->mLabel->add($label);
			}
			// simpan semua keterangan, sebanyak keterangan yang di inputkan
			foreach ($id_labels as $id_label) {
				$keterangan = [
					'id_data' => $id_data,
					'id_label' => $id_label,
				];
				$this->mKeterangan->add($keterangan);
			}
		}
		// Anywhere else in the script
		// echo "berhasil/n";
		// echo 'Total execution time in seconds: ' . (microtime(true) - $time_start);
		
		redirect(base_url() . "site/index/" . $id_kategori);
	}
}
