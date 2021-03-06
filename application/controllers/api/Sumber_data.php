<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Sumber_data extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        $id = $this->get('id'); 
        $limit = $this->get('limit');
        if ($limit == '' && $id == '') {
            $jsonData = $this->db->select("");
            $jsonData = $this->db->get('sumber_data',10,0)->result();
        } else if($id != '' && $limit == '') {
            $this->db->where('id', $id);
            $jsonData = $this->db->get('sumber_data')->result();
        }else {
            $jsonData = $this->db->get('sumber_data',10,$limit)->result();
        }


        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>