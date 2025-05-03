<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Disciplescommunity extends RestController
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Disciplescommunity_model');
    }

    public function index()
    {
        echo '<H1>Selmat Datang</H1>';
    }

    public function getDc_post()
    {
        $iddc        = $this->post('iddc');
        $rsDc = $this->Disciplescommunity_model->getDc($iddc);
        if ($rsDc->num_rows() > 0) {
            $rowDc = $rsDc->row();
            $rsDcMember = $this->Disciplescommunity_model->getDcMember($iddc);
            $rsDcCT = $this->Disciplescommunity_model->getDcCT($iddc);

            $data = array(
                'data'     => $rowDc,
                'member' => $rsDcMember->result(),
                'coreteam' => $rsDcCT->result(),
            );
            $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->response([
                'message' => 'Data tidak ditemukan',
            ], RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
    }
}
