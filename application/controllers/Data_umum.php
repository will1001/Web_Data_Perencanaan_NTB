<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data_umum extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data label
    function index_get() {
        $limit = $this->get('limit');
        if ($limit == '') {
            $this->db->select("nilai,tahun");
            $this->db->from('data')->limit(10,0);
            $jsonData = $this->db->get()->result();
        } else {
            $jsonData = $this->db->get('bagian',10,$limit)->result();
        }

//         $myArr = Array (
//     "0" => Array (
//         "id" => "USER1",
//         "name" => "Steve Jobs",
//         "company" => "Apple"
//     ),
//     "1" => Array (
//         "id" => "USER2",
//         "name" => "Bill Gates",
//         "company" => "Microsoft"
//     ),
//     "2" => Array (
//         "id" => "USER3",
//         "name" => "Mark Zuckerberg",
//         "company" => "Facebook"
//     )
// );

// $myJSON = json_encode($myArr);

// print_r($jsonData);

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>