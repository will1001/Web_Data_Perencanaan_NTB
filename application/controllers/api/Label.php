<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Label extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        // $id = $this->get('id'); 
        $limit = $this->get('limit'); 
      if($limit != '') {
            $this->db->select("*");
            $this->db->from("label")->limit(10,$limit);
            $this->db->join('keterangan', 'keterangan.id_label = label.id_','left');
            $jsonData = $this->db->get()->result();
        }else{
            $this->db->select("*");
            $this->db->from("label")->limit(10,$limit);
            $jsonData = $this->db->get()->result();
        }

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>