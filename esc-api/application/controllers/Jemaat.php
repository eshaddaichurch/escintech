<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Jemaat extends RestController  {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Bedonline_model');
    }

    public function info_get($idjemaat)
    {

    }


}
