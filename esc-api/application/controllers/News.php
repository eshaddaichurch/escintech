<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class News extends RestController
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('News_model');
    }

    public function index()
    {
        echo '<H1>Selmat Datang</H1>';
    }

    public function getnewsumum_get()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type, ELSHADDAI-KEY");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit;
        }
        $setlimit = $this->get('setlimit');

        $rsNewsUmum = $this->News_model->getnewsumum($setlimit);

        if ($rsNewsUmum->num_rows() > 0) {
            $this->response([
                'status' => TRUE,
                'data' => $rsNewsUmum->result(),
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Data DC tidak ditemukan'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
}
