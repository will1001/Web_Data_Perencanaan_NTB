<?php
class Keterangan_model extends CI_Model{
	public function __construct(){
		$this->load->database();
		parent::__construct();
	}

	public function add($data){
		$this->db->insert('keterangan', $data);
		// $insert_id = $this->db->insert_id();
		// return  $insert_id;
	}
}