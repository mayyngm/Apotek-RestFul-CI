<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class obat extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Obat_model', 'obat');
    }

    //Menampilkan data obat
    public function index_get(){
        $id = $this->get('id');
        if($id === null){
            $data = $this->obat->getObat();
        } else{
            $data = $this->obat->getObat($id);
        }

        if($data){
            $this->response([
                'status' => true,
                'data' => $data
            ], REST_Controller::HTTP_OK);
        } else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    //Meenghapus data obat
    public function index_delete(){
        $id=$this->delete('id');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else{
            if($this->obat->deleteObat($id)>0){
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
        } else{
            //id not found
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

    public function index_post(){
        $data = [
            'id' => $this->post('id'),
            'nama_obat' => $this->post('nama_obat'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok'),
        ];

        if($this->obat->createObat($data)>0){
            $this->response([
                'status' => true,
                'message' => 'new obat has been created'
            ], REST_Controller::HTTP_CREATED);
        } else{
            //id not found
            $this->response([
                'status' => true,
                'message' => 'failed to created new obat!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put(){
        $id = $this->put('id');
        $data = [
            'id' => $this->put('id'),
            'nama_obat' => $this->put('nama_obat'),
            'harga' => $this->put('harga'),
            'stok' => $this->put('stok'),
        ];

        if($this->obat->updateObat($data, $id)>0){
            $this->response([
                'status' => true,
                'message' => 'data obat has been updated'
            ], REST_Controller::HTTP_OK);
        } else{
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update obat!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
?>