<?php
class Label_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		parent::__construct();
	}

	public function getId($nama){
		$query = $this->db->select('id')->where('nama', $nama)
		->get('label');
		return $query->row_array()['id'];
	}

	public function add($data){
		$this->db->insert('label', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
}