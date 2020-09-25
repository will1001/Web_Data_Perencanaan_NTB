<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Provinsi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        $limit = $this->get('limit');
        if ($limit == '') {
            $jsonData = $this->db->select("");
            $jsonData = $this->db->get('provinsi',10,0)->result();
        } else {
            $jsonData = $this->db->get('provinsi',10,$limit)->result();
        }

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>