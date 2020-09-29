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
        $tahun = $this->get('tahun');
        $sumber_data = $this->get('sumber_data');
        $semester = $this->get('semester');
        $cari = $this->get('cari');
        $get_group_parameter = $this->get('get_group_parameter');
        if ($limit == '' && $id_kategori == '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,0);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $jsonData = $this->db->get()->result();
        } else if($tahun != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('YEAR(`tahun`)', $tahun);
            $jsonData = $this->db->get()->result();
        }else if($sumber_data != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('id_sumber_data', $sumber_data);
            $jsonData = $this->db->get()->result();
        }else if($semester != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            if($semester == '1'){
                $this->db->where('MONTH(`tahun`) <', 7);
            }if($semester == '2'){
                $this->db->where('MONTH(`tahun`) >', 6);
            }
            $jsonData = $this->db->get()->result();
        }
        else if($tahun != '' && $sumber_data != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('YEAR(`tahun`)', $tahun);
            $this->db->where('id_sumber_data', $sumber_data);
            $jsonData = $this->db->get()->result();
        }else if($tahun != '' && $semester != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('YEAR(`tahun`)', $tahun);
             if($semester == '1'){
                $this->db->where('MONTH(`tahun`) <', 7);
            }if($semester == '2'){
                $this->db->where('MONTH(`tahun`) ', 3);
            }
            $jsonData = $this->db->get()->result();
        }else if($semester != '' && $sumber_data != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
             if($semester == '1'){
                $this->db->where('MONTH(`tahun`) <', 7);
            }if($semester == '2'){
                $this->db->where('MONTH(`tahun`) >', 6);
            }
            $this->db->where('id_sumber_data', $sumber_data);
            $jsonData = $this->db->get()->result();
        }else if($tahun != '' && $sumber_data != '' && $semester == '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('YEAR(`tahun`)', $tahun);
            $this->db->where('id_sumber_data', $sumber_data);
             if($semester == '1'){
                $this->db->where('MONTH(`tahun`) <', 7);
            }if($semester == '2'){
                $this->db->where('MONTH(`tahun`) >', 6);
            }
            $jsonData = $this->db->get()->result();
        }else if($cari != '') {
            $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            $this->db->from("data")->limit(10,$limit);
            $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->like('nama_data', $cari);
            $jsonData = $this->db->get()->result();
        }else if($get_group_parameter == 'tahun') {
            $this->db->select("YEAR(`tahun`)");
            $this->db->from("data");
            $this->db->where('id_kategori', $id_kategori);
            $this->db->group_by("tahun");
            $jsonData = $this->db->get()->result();
        }else if($get_group_parameter == 'sumber_data') {
            $this->db->select("sumber_data.id,nama_sumber");
            $this->db->from("data");
            $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->group_by("nama_sumber");
            $jsonData = $this->db->get()->result();
        }else {
            // $this->db->select("data.id,nama_data,nilai,satuan,tahun,nama_sumber,nama");
            // $this->db->from("data")->limit(10,$limit);
            // $this->db->join('kab_kota', 'kab_kota.id = data.id_kab_kota','left');
            // $this->db->join('sumber_data', 'sumber_data.id = data.id_sumber_data','left');
            // $this->db->where('id_kategori', $id_kategori);
            $jsonData = [];
        } 

        $this->response($jsonData, 200);
    }

    //Masukan function selanjutnya disini
}
?>