<?php
class Data extends CI_Controller {
	
	public function get_byId($id)
	{
		$data = $this->data_model->get_data_byId($id);
		echo json_encode($data);
	}
	public function get($id = null)
	{
		$data = $this->data_model->get_data($id);
		echo json_encode($data);
	}
	public function get_sumber_data()
	{
		$data = $this->data_model->get_sumber_data();
		echo json_encode($data);
	}
	public function get_provinsi()
	{
		$data = $this->data_model->get_provinsi();
		echo json_encode($data);
	}
	public function get_kab_kota()
	{
		$data = $this->data_model->get_kab_kota();
		echo json_encode($data);
	}
	public function get_kategori($id)
	{
		$data = $this->data_model->get_kategori($id);
		echo json_encode($data);
	}
	public function get_kategoriAll($id)
	{
		$data = $this->data_model->get_kategoriAll($id);
		echo json_encode($data);
	}
	public function get_bagian()
	{
		$data = $this->data_model->get_bagian();
		echo json_encode($data);
	}
	public function create()
	{
		$id_kab_kota = $this->input->post('id_kab_kota');
		if(!$id_kab_kota) $id_kab_kota = null;
		
		$id_sumber_data = $this->input->post('id_sumber_data');
		if(!$id_sumber_data) $id_sumber_data = null;

		$data = [
			// 'nama_data' => 'coba 1',
			// 'id_kategori' => "2",
			// 'id_prov' => "52",
			'nama_data' => $this->input->post('nama_data'),
			'id_kategori' => $this->input->post('id_kategori'),
			'id_prov' => $this->input->post('id_prov'),
			'id_kab_kota' => $id_kab_kota,
			'kec' => $this->input->post('kec'),
			'urusan' => $this->input->post('urusan'),
			'id_table' => $this->input->post('id_table'),
			'elemen' => $this->input->post('elemen'),
			'id_sumber_data' => $id_sumber_data,
			'nilai' => $this->input->post('nilai'),
			'satuan' => $this->input->post('satuan'),
			'tahun' => null,
			'created_at' => NULL,
			'updated_at' => NULL,
		];
		//simpan data dan ambil id_data
		$id_data = $this->data_model->add_data($data);

		$nama_keterangan = $this->input->post('nama_keterangan[]');

		$id_labels = [];
		foreach ($nama_keterangan as $key => $keterangan) {	
			if(!$keterangan) continue; //abaikan jika keterangan kosong/null
			$label = [
				'nama' => $keterangan,
			];
			//cari label yang sama, Jika tidak ada simpan,
			//kemudian ambil id_label nya sebanyak keterangan yang di inputkan
			$id_labels[$key] = $this->label_model->getId($keterangan);
			if(!$id_labels[$key])
				$id_labels[$key] = $this->label_model->add($label);
		}

		// simpan semua keterangan, sebanyak keterangan yang di inputkan
		foreach ($id_labels as $id_label) {
			$keterangan = [
				'id_data' => $id_data,
				'id_label' => $id_label,
			];
			$this->keterangan_model->add($keterangan);
		}

	}
	public function update()
	{

	}
	public function delete()
	{
		$id = $this->input->post('id');
		// echo 'berhasil mengakses data id-'.$id;
		if($id){
			$this->data_model->delete($id);
		}
	}
}
