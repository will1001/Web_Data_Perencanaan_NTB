<?php
class Api_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		parent::__construct();
	}
	public function data_delete($id){
		$this->db->delete('data', array('id' => $id)); 
	}
	public function data_get($id = NULL, $ket = NULL){
		if($id === "0"){
			$id = "ksjlkdslkshldhld";
		}

		if($ket == NULL){
			$query = $this->db->where('id', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "nama"){
			if($id === null) return null;
			$id = str_replace("%20", " ", $id);
			$query = $this->db->like('nama_data', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "id_kategori"){
			$query = $this->db->where('id_kategori', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "id_prov"){
			$query = $this->db->where('id_prov', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "id_kab_kota"){
			$query = $this->db->where('id_kab_kota', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "kec"){
			$query = $this->db->where('kec', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "urusan"){
			$query = $this->db->where('urusan', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "id_table"){
			$query = $this->db->where('id_table', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "elemen"){
			$query = $this->db->where('elemen', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "id_sumber_data"){
			$query = $this->db->where('id_sumber_data', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "nilai"){
			$query = $this->db->where('nilai', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "satuan"){
			$query = $this->db->where('satuan', $id)->get('data');
			$data = $query->result_array();
		}
		if($ket == "tahun"){
			if($id === null) return null;
			$query = $this->db->where('YEAR(tahun)', $id)->get('data');
			$data = $query->result_array();
		}
		if($id === NULL AND $ket=== NULL){
			$query = $this->db->get('data');
			$data = $query->result_array();
		}
		if(sizeof($data) == 0) return null;
		// Ambil Keterangan jadikan array
		foreach ($data as $key => $value) {
			$query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
			->from('keterangan ket')->join('label', 'id_label = label.id');
			$query = $this->db->get();
			$keterangan = $query->result_array();
			// bisa di hapus
			for($i= 1; $i< 10; $i++){
				$data[$key]['sub_ket'.$i] = null;			
			} 
			// for yang di atas bisa dihapus
			foreach ($keterangan as $i => $ket) {
				$data[$key]['sub_ket'.++$i] = $ket['nama'];			
			}
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kab_kota'])
			->from('kab_kota')->get();
			$data[$key]['kab_kota'] = $query->row_array()['nama'];
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kategori'])
			->from('kategori')->get();
			$data[$key]['kategori'] = $query->row_array()['nama'];
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_sumber_data'])
			->from('sumber_data')->get();
			$data[$key]['sumber_data'] = $query->row_array()['nama_sumber'];
		}
		// if(sizeof($data)==1){
		// 	$data = $data[0];
		// }
		return $data;
	}

	public function data_getby_ket($ket){
		$ket = str_replace("%20", " ", $ket);
		$query = $this->db->select('data.*')->like('label.nama', $ket)
		->from('keterangan')->join('data', 'id_data = data.id')->join('label', 'id_label = label.id');
		$query = $this->db->get();
		$data = $query->result_array();
		if(sizeof($data) == 0) return null;
		// Ambil Keterangan jadikan array
		foreach ($data as $key => $value) {
			$query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
			->from('keterangan ket')->join('label', 'id_label = label.id');
			$query = $this->db->get();
			$keterangan = $query->result_array();
			// bisa di hapus
			for($i= 1; $i< 10; $i++){
				$data[$key]['sub_ket'.$i] = null;			
			} 
			// for yang di atas bisa dihapus
			foreach ($keterangan as $i => $ket) {
				$data[$key]['sub_ket'.++$i] = $ket['nama'];			
			}
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kab_kota'])
			->from('kab_kota')->get();
			$data[$key]['kab_kota'] = $query->row_array()['nama'];
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_kategori'])
			->from('kategori')->get();
			$data[$key]['kategori'] = $query->row_array()['nama'];
		}
		foreach ($data as $key => $value) {
			$query = $this->db->where('id', $value['id_sumber_data'])
			->from('sumber_data')->get();
			$data[$key]['sumber_data'] = $query->row_array()['nama_sumber'];
		}
		return $data;
	}
}