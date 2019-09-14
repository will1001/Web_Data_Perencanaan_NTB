<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Data extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_api_model','mData');
    }
    public function index_get()
    {
        $id_kategori = $this->get('id_kategori');
        $id = $this->get('id');
        
        if($id === null && $id_kategori === null){
            $data = $this->mData->get();
        } elseif($id) {
            $data = $this->mData->get($id);
        } elseif($id_kategori){
            $data = $this->mData->get_by_id_kategori($id_kategori);
        } else { 
            $data = null;
        }
        
        if($data){
            $this->response([
                'status' => true,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
