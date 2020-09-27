<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Datas extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        $limit = $this->get('limit');
        if ($limit == '') {
            $this->db->select("nama_data,nilai,satuan,tahun,id_sumber_data,id_kab_kota");
            $this->db->from("data")->limit(10,0);
            $jsonData = $this->db->get()->result();
        } else {
            $jsonData = $this->db->get('data',10,$limit)->result();
        }

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>