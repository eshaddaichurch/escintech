<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Login extends RestController  {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Login_model');
    }

    public function index()
    {
        echo '<H1>Selmat Datang</H1>';
    }

    public function ceklogin_post()
    {
        $email        = $this->post('email');
        $password        = $this->post('password');

        $rsLogin = $this->Login_model->ceklogin($email, $password);
        if ($rsLogin->num_rows()>0) {
            $rowLogin = $rsLogin->row();
            $data = array(
                    'token'     => '123',
                    'user'     => $rowLogin,
                );
                $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                    'message' => 'Kombinasi Email atau password anda salah',
                ], RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
    }


}
