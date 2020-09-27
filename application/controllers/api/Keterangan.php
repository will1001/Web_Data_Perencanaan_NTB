<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Keterangan extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        $id_data = $this->get('id_data'); 
        $limit = $this->get('limit');
        if ($limit == '' && $id_data == '') {
            $jsonData = $this->db->select("");
            $jsonData = $this->db->get('keterangan',10,0)->result();
        } else if($id_data != '' && $limit == '') {
            $this->db->where('id_data', $id_data);
            $jsonData = $this->db->get('keterangan')->result();
        }else {
            $jsonData = $this->db->get('keterangan',10,$limit)->result();
        }

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>