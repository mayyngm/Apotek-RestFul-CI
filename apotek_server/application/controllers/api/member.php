<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class member extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Data_model', 'data');
    }

    //Menampilkan data member apotek
    public function index_get(){
        $id = $this->get('id');
        if($id === null){
            $data = $this->data->getMember();
        } else{
            $data = $this->data->getMember($id);
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
    //Menghapus data member apotek
    public function index_delete(){
        $id=$this->delete('id');
        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else{
            if($this->data->deleteMember($id)>0){
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
    //Menambahkan data member apotek
    public function index_post(){
        $data = [
            'id' => $this->post('id'),
            'nama' => $this->post('nama'),
            'no_telp' => $this->post('no_telp'),
            'email' => $this->post('email'),
            'no_member' => $this->post('no_member'),
        ];

        if($this->data->createMember($data)>0){
            $this->response([
                'status' => true,
                'message' => 'new member has been created'
            ], REST_Controller::HTTP_CREATED);
        } else{
            //id not found
            $this->response([
                'status' => true,
                'message' => 'failed to created new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Mengupdate data member apotek
    public function index_put(){
        $id = $this->put('id');
        $data = [
            'id' => $this->put('id'),
            'nama' => $this->put('nama'),
            'no_telp' => $this->put('no_telp'),
            'email' => $this->put('email'),
            'no_member' => $this->put('no_member'),
        ];

        if($this->data->updateMember($data, $id)>0){
            $this->response([
                'status' => true,
                'message' => 'data member has been updated'
            ], REST_Controller::HTTP_OK);
        } else{
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
?>