<?php
class Data_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		parent::__construct();
	}
	public function getUsers($id=FALSE){
		if($id==FALSE){
			$data = $this->db->get('user');
			return  $data->result_array();
		}else{
			$data = $this->db->where('id', $id)->get('user');
			return  $data->row_array();
		}
	}
	public function saveUser($data){
		$data = $this->db->insert('user',$data);
	}
	public function updateUser($data){
		$this->db->where('id', $data['id']);
		$this->db->update('user', $data);
	}
	public function deleteUser($id){
		$this->db->delete('user', array('id' => $id));
	}

	public function delete($id)
	{
		$this->db->delete('data', array('id' => $id));
	}
	public function delete_pertahun($id_kategori, $tahun)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->where('year(tahun)', $tahun);
		$this->db->delete('data');
	}

	public function get_data_byId($id)
	{

		$query = $this->db->select('data.*, sumber_data.nama_sumber as sumber_data')->where('data.id', $id)->from('data')
				->join('sumber_data', 'data.id_sumber_data = sumber_data.id')->get();
		$data = $query->result_array();
		if (!$data) return null;
		// Ambil Keterangan jadikan array
		foreach ($data as $key => $value) {
			$query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
				->from('keterangan ket')->join('label', 'id_label = label.id');
			$query = $this->db->get();
			$data[$key]['keterangan'] = $query->result_array();
			//tambahkan kolom semester Ganjil Genap
			$tahun = $data[$key]['tahun'];
			if ($tahun) {
				$month = date("m", strtotime($tahun));
				if ($month < 07) {
					$data[$key]['semester'] = 'Ganjil';
				} else {
					$data[$key]['semester'] = "Genap";
				}
			}
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kab_kota'])
				->from('kab_kota')->get();
			$data[$key]['kab_kota'] = $query->row_array();
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kategori'])
				->from('kategori')->get();
			$data[$key]['kategori'] = $query->row_array();
		}
		return $data = $data[0];
	}
	public function get_data($id = NULL)
	{
		if ($id === NULL) {
			$query = $this->db->get('data');
			$data = $query->result_array();
		}
		if ($id) {
			$query = $this->db->select('data.*')->where('id_kategori', $id)
				->from('data')->join('kategori', 'id_kategori = kategori.id');
			$query = $this->db->get();
			$data = $query->result_array();
		}
		// Ambil Keterangan jadikan array
		foreach ($data as $key => $value) {
			$query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
				->from('keterangan ket')->join('label', 'id_label = label.id');
			$query = $this->db->get();
			$data[$key]['keterangan'] = $query->result_array();
			//tambahkan kolom semester Ganjil Genap
			$tahun = $data[$key]['tahun'];
			if ($tahun) {
				$month = date("m", strtotime($tahun));
				if ($month < 07) {
					$data[$key]['semester'] = 'Ganjil';
				} else {
					$data[$key]['semester'] = "Genap";
				}
			}
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kab_kota'])
				->from('kab_kota')->get();
			$data[$key]['kab_kota'] = $query->row_array();
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kategori'])
				->from('kategori')->get();
			$data[$key]['kategori'] = $query->row_array();
		}
		return $data;
	}
	public function get_bagian()
	{
		$query = $this->db->get('bagian');
		$bagians = $query->result_array();

		foreach ($bagians as $key => $bagian) {
			$query = $this->db->select('kat.id, kat.nama')->where('id_bagian', $bagian['id'])
				->from('kategori kat')->join('bagian', 'id_bagian = bagian.id')->get();
			$bagians[$key]['kategori'] = $query->result_array();
		}
		return $bagians;
	}
	public function get_kategori($id)
	{
		$query = $this->db->select('kategori.*, bagian.nama as nama_bagian')->where('kategori.id', $id)
			->from('kategori')->join('bagian', 'id_bagian = bagian.id')->get();
		return $query->row_array();
	}
	public function get_kategori_by_name($name)
	{
		$query = $this->db->where('LOWER(nama)', strtolower($name))->get('kategori');
		return $query->row_array();
	}
	public function get_kategoriAll($id_bagian)
	{
		$query = $this->db->where('id_bagian', $id_bagian)->get('kategori');
		return $query->result_array();
	}
	public function get_provinsi()
	{
		$query = $this->db->get('provinsi');
		return $query->row_array();
	}
	public function get_kab_kota()
	{
		$query = $this->db->get('kab_kota');
		return $query->result_array();
	}
	public function get_sumber_data($id = null)
	{
		if ($id === NULL) {
			$query = $this->db->get('sumber_data');
			return $query->result_array();
		} else {
			$query = $this->db->where('id', $id)->get('sumber_data');
			return $query->row_array();
		}
	}
	public function add_sumber_data($id)
	{
		$data = [
			'id' => $id,
			'nama_sumber' => $id,
		];
		$this->db->insert('sumber_data', $data);
	}
	public function add_data($data)
	{
		$this->db->insert('data', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	public function get_data_last_id(){
		$this->db->select_max('id', 'last_id');
		$query = $this->db->get('data');
		return $query->row()->last_id;
	}
	public function data_update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('data', $data);
	}
}
