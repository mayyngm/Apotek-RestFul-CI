<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class obat extends CI_Controller{

    var $API ="";

    function __construct() {
        parent::__construct();
        $this->API="http://localhost/12.codeigniter/apotek_server/api/obat";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    // menampilkan data obat
    public function index(){
        $respon = json_decode($this->curl->simple_get($this->API.'/obat'));
        $data['dataobat'] = $respon->data;
        $this->load->view('obat/index_obat',$data);
    }

    // insert data obat
    public function create(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $this->input->NULL,
                'nama_obat' => $this->input->post('nama_obat'),
                'harga'=> $this->input->post('harga'),
                'stok' => $this->input->post('stok'));
            $insert =  $this->curl->simple_post($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('obat');
        }else{
            $this->load->view('obat/create_obat');
        }
    }

    // edit data obat
    function edit(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $this->input->post('id'),
                'nama_obat' => $this->input->post('nama_obat'),
                'harga'=> $this->input->post('harga'),
                'stok' => $this->input->post('stok')
            );

            $update =  $this->curl->simple_put($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('obat');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $respon = json_decode($this->curl->simple_get($this->API.'/obat', $params));
            $data['dataobat'] = $respon->data;
            $this->load->view('obat/edit_obat',$data);
        }
    }

    // delete data obat
    function delete($id){
        if(empty($id)){
            redirect('obat');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/obat', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('obat');
        }
    }
}