<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Esc extends RestController {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('EscModel');
        $this->methods['jemaat_get']['limit'] = 100;
        $this->methods['index_get']['limit']  = 2;
    }

	public function index()
	{
		$this->response(NULL, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
	}

	public function jemaat_get($idjemaat=null)
	{

		$this->response(NULL, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
		exit();
		$idjemaat        = $this->get('idjemaat');

        if (empty($idjemaat)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

            $rsjemaat = $this->EscModel->jemaat_get($idjemaat);
            
            if ($rsjemaat->num_rows() > 0) {
                $data = array(
                    'status'      => true,
                    'message'     => 'Data ditemukan',
                    'dataJemaat'  => $rsjemaat->result(),
                );
                $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                $this->response([
                    'status'  => false,
                    'message' => 'Data tidak ditemukan',
                ], RestController::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
            }
        }

	}

}

/* End of file Esc.php */
/* Location: ./application/controllers/Esc.php */