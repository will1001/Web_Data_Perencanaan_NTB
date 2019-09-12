<?php
class Api extends CI_Controller {
	
	public function data_get($id = null)
	{
		$data = $this->api_model->data_get($id);
		echo json_encode($data);
	}
	public function data_getby_nama($id = null)
	{
		$data = $this->api_model->data_get($id, 'nama');
		echo json_encode($data);
	}
	public function data_getby_id_kategori($id = null)
	{
		$data = $this->api_model->data_get($id, 'id_kategori');
		echo json_encode($data);
	}
	public function data_getby_id_prov($id = null)
	{
		$data = $this->api_model->data_get($id, 'id_prov');
		echo json_encode($data);
	}
	public function data_getby_id_kab_kota($id = null)
	{
		$data = $this->api_model->data_get($id, 'id_kab_kota');
		echo json_encode($data);
	}
	public function data_getby_kec($id = null)
	{
		$data = $this->api_model->data_get($id, 'kec');
		echo json_encode($data);
	}
	public function data_getby_urusan($id = null)
	{
		$data = $this->api_model->data_get($id, 'urusan');
		echo json_encode($data);
	}
	public function data_getby_id_table($id = null)
	{
		$data = $this->api_model->data_get($id, 'id_table');
		echo json_encode($data);
	}
	public function data_getby_elemen($id = null)
	{
		$data = $this->api_model->data_get($id, 'elemen');
		echo json_encode($data);
	}
	public function data_getby_id_sumber_data($id = null)
	{
		$data = $this->api_model->data_get($id, 'id_sumber_data');
		echo json_encode($data);
	}
	public function data_getby_nilai($id = null)
	{
		$data = $this->api_model->data_get($id, 'nilai');
		echo json_encode($data);
	}
	public function data_getby_satuan($id = null)
	{
		$data = $this->api_model->data_get($id, 'satuan');
		echo json_encode($data);
	}
	public function data_getby_tahun($id = null)
	{
		$data = $this->api_model->data_get($id, 'tahun');
		echo json_encode($data);
	}
	public function data_getby_keterangan($id = null)
	{
		$data = $this->api_model->data_getby_ket($id);
		echo json_encode($data);
	}
	
}
