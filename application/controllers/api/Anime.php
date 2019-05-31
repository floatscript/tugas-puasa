<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Anime extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Anime_model');
    }

    public function index_get(){
        $id = $this->get('id');
        if($id != ''){
            $data_anime = $this->Anime_model->getAnime($id);
        }else{
            $data_anime = $this->Anime_model->getAnime();
        }
        if($data_anime == true){
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => $data_anime
          ), REST_Controller::HTTP_CREATED);
        }else{
            $this->response(array(
            'status'  => 'false',
            'code'    => 'data belum ada'
          ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function tambah_post(){
        if($this->Anime_model->tambahDataAnime($_POST) > 0) {
          $this->response(array(
            'status'  => 'true',
            'code'    => '200',
            'data'    => 'data berhasil di tambah'
          ), REST_Controller::HTTP_CREATED);
        } else {
          $this->response(array(
            'status'  => 'false',
            'code'    => '401',
            'data'    => 'data gagal disimpan disisi server'
          ), REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function ubah_post(){
      if($this->Anime_model->ubahDataAnime($_POST) > 0) {
        $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil diubah'
        ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal diubah disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }

    public function hapus_get($id){
      if($this->Anime_model->hapusDataAnime($id)) {
         $this->response(array(
          'status'  => 'true',
          'code'    => '200',
          'data'    => 'data berhasil dihapus'
         ), REST_Controller::HTTP_CREATED);
      } else {
        $this->response(array(
          'status'  => 'false',
          'code'    => '401',
          'data'    => 'data gagal dihapus disisi server'
        ), REST_Controller::HTTP_BAD_REQUEST);
      }
    }

}