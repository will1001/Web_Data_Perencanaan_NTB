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
        $id_kategori = $this->get('id_kategori');
        if ($limit == '' && $id_kategori == '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,0);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $jsonData = $this->db->get()->result();
        } else {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $jsonData = $this->db->get()->result();
        }

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>