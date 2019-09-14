<?php

class Data_api_model extends CI_Model
{
    public function get($id = null)
    {
        if($id === null){
            $data = $this->db->get('data')->result_array();
        } else {
            $data = $this->db->get_where('data',['id' => $id])->result_array();
        }
        if($data) {
             // Ambil Keterangan jadikan array
            foreach ($data as $key => $value) {
                $query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
                ->from('keterangan ket')->join('label', 'id_label = label.id');
                $query = $this->db->get();
                $keterangan = $query->result_array();
                // bisa di hapus
                for($i= 1; $i< 10; $i++){
                    $data[$key]['sub_ket'.$i] = null;			
                } 
                // for yang di atas bisa dihapus
                foreach ($keterangan as $i => $ket) {
                    $data[$key]['sub_ket'.++$i] = $ket['nama'];			
                }
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_kab_kota'])
                ->from('kab_kota')->get();
                $data[$key]['kab_kota'] = $query->row_array()['nama'];
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_kategori'])
                ->from('kategori')->get();
                $data[$key]['kategori'] = $query->row_array()['nama'];
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_sumber_data'])
                ->from('sumber_data')->get();
                $data[$key]['sumber_data'] = $query->row_array()['nama_sumber'];
            }
            // if(sizeof($data)==1){
            // 	$data = $data[0];
            // }
            return $data;
        }
    }
    
    public function get_by_id_kategori($id)
    {
        $data = $this->db->get_where('data',['id_kategori' => $id])->result_array();
        if($data) {
             // Ambil Keterangan jadikan array
            foreach ($data as $key => $value) {
                $query = $this->db->select('ket.id, id_label, label.nama')->where('id_data', $value['id'])
                ->from('keterangan ket')->join('label', 'id_label = label.id');
                $query = $this->db->get();
                $keterangan = $query->result_array();
                // bisa di hapus
                for($i= 1; $i< 10; $i++){
                    $data[$key]['sub_ket'.$i] = null;			
                } 
                // for yang di atas bisa dihapus
                foreach ($keterangan as $i => $ket) {
                    $data[$key]['sub_ket'.++$i] = $ket['nama'];			
                }
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_kab_kota'])
                ->from('kab_kota')->get();
                $data[$key]['kab_kota'] = $query->row_array()['nama'];
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_kategori'])
                ->from('kategori')->get();
                $data[$key]['kategori'] = $query->row_array()['nama'];
            }
            foreach ($data as $key => $value) {
                $query = $this->db->where('id', $value['id_sumber_data'])
                ->from('sumber_data')->get();
                $data[$key]['sumber_data'] = $query->row_array()['nama_sumber'];
            }
            // if(sizeof($data)==1){
            // 	$data = $data[0];
            // }
            return $data;
        }
    }
}