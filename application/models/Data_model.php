<?php
class Data_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		parent::__construct();
	}
	public function delete($id){
		$this->db->delete('data', array('id' => $id)); 
	}
	public function get_data($id = NULL){
		if($id === NULL){
			$query = $this->db->get('data');
			$data = $query->result_array();
		}
		if($id){
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
	public function get_bagian(){
		$query = $this->db->get('bagian');
		$bagians = $query->result_array();

		foreach ($bagians as $key => $bagian) {
			$query = $this->db->select('kat.id, kat.nama')->where('id_bagian', $bagian['id'])
			->from('kategori kat')->join('bagian', 'id_bagian = bagian.id')->get();
			$bagians[$key]['kategori'] = $query->result_array();
		}
		return $bagians;
	}
	public function get_kategori($id){
		$query = $this->db->select('kategori.*, bagian.nama as nama_bagian')->where('kategori.id',$id)
		->from('kategori')->join('bagian', 'id_bagian = bagian.id')->get();
		return $query->row_array();
	}
	public function get_kategoriAll($id_bagian){
		$query = $this->db->where('id_bagian',$id_bagian)->get('kategori');
		return $query->result_array();
	}
	public function get_provinsi(){
		$query = $this->db->get('provinsi');
		return $query->row_array();
	}
	public function get_kab_kota(){
		$query = $this->db->get('kab_kota');
		return $query->result_array();
	}
	public function get_sumber_data(){
		$query = $this->db->get('sumber_data');
		return $query->result_array();
	}
	public function add_data($data){
		$this->db->insert('data', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
}