<?php
defined('BASEPATH') OR exit('No direct script access allowed');


Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;


class BendaharaPenerimaan extends RestController {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('BendaharaPenerimaan_model');
        $this->methods['stsperiode_get']['limit'] = 50;
        $this->methods['stsakun_get']['limit'] = 50;
        $this->methods['index_get']['limit'] = 2;
        $this->methods['stsid_get']['limit'] = 50;
    }


	public function index_get()
	{
		// echo '<h5>Selamat Datang di API RSUD Dr Soedarso</h5>';
		$this->response(NULL, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
	}

	public function stsperiode_get($tglawal=NULL, $tglakhir=NULL)
	{
		$tglawal = $this->get('tglawal');
		$tglakhir = $this->get('tglakhir');
		


		if ( (empty($tglawal) && empty($tglakhir)) || (empty($tglawal) && !empty($tglakhir)) || (!empty($tglawal) && empty($tglakhir)) ) {
            // $this->response(NULL, RestController::HTTP_BAD_REQUEST);
            $this->response([
	                'status' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);
		}else{
			$where = " where IdSTS is not null ";
			if (!empty($tglawal) && !empty($tglakhir)) {
				$tglawal = date('Y-m-d', strtotime($tglawal));
				$tglakhir = date('Y-m-d', strtotime($tglakhir));
				$where ." and TglSTS between '$tglawal' and '$tglakhir' ";
			}


			$rssts = $this->BendaharaPenerimaan_model->get_sts($where);
			if ($rssts->num_rows()>0) {
				$data = array(
							'status' => TRUE, 
							'message' => 'Data STS ditemukan', 
							'rownumber' => $rssts->num_rows(), 
							'dataSTS' => $rssts->result(),
						);
				$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
			}else{
				$this->response([
	                'status' => FALSE,
	                'message' => 'Data STS tidak ditemukan'
	            ], RestController::HTTP_OK); // NOT_FOUND (404) being the HTTP response code	
			}
		}
	}

	public function stsakun_get($kd_rek5=NULL)
	{
		$kd_rek5 = $this->get('kd_rek5');
		if ( empty($kd_rek5) ) {
            
            $this->response([
	                'status' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);
		}else{
			$where = " where IdSTS is not null and KdRek5 ='".$kd_rek5."' ";

			$rssts = $this->BendaharaPenerimaan_model->get_sts($where);
			if ($rssts->num_rows()>0) {
				$data = array(
							'status' => TRUE, 
							'message' => 'Data STS ditemukan', 
							'rownumber' => $rssts->num_rows(), 
							'dataSTS' => $rssts->result(),
						);
				$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
			}else{
				$this->response([
	                'status' => FALSE,
	                'message' => 'Data STS tidak ditemukan'
	            ], RestController::HTTP_OK); // NOT_FOUND (404) being the HTTP response code	
			}
		}
	}


	public function stsid_get($no_terima=NULL)
	{
		$no_terima = $this->get('no_terima');
		if ( empty($no_terima) ) {
            
            $this->response([
	                'status' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);
		}else{
			$where = " where IdSTS is not null and NoSTS ='".$no_terima."' ";

			$rssts = $this->BendaharaPenerimaan_model->get_sts($where);
			if ($rssts->num_rows()>0) {
				$data = array(
							'status' => TRUE, 
							'message' => 'Data STS ditemukan', 
							'rownumber' => $rssts->num_rows(), 
							'dataSTS' => $rssts->result(),
						);
				$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
			}else{
				$this->response([
	                'status' => FALSE,
	                'message' => 'Data STS tidak ditemukan'
	            ], RestController::HTTP_OK); // NOT_FOUND (404) being the HTTP response code	
			}
		}
	}

}

/* End of file BendaharaPenerimaan.php */
/* Location: ./application/controllers/BendaharaPenerimaan.php */