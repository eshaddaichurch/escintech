<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Jemaat extends RestController
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Jemaat_model');
    }

    public function index()
    {
        echo '<H1>Selmat Datang</H1>';
    }

    public function infoid_post()
    {
        $idjemaat        = $this->post('idjemaat');
        $rsJemaat = $this->Jemaat_model->getJemaat($idjemaat);
        if ($rsJemaat->num_rows() > 0) {
            $rowJemaat = $rsJemaat->row();

            $data = array(
                'data'     => $rowJemaat,
            );
            $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->response([
                'message' => 'Data tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
    }

    public function cari_post()
    {        
        $cari        = $this->post('cari');
        $rsJemaat = $this->Jemaat_model->cariJemaat($cari);
        if ($rsJemaat->num_rows() > 0) {
            $data = array(
                'data'     => $rsJemaat->result(),
            );
            $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->response([
                'message' => 'Data tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
    }
}
