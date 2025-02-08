<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Bedonline extends RestController  {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model('Bedonline_model');
    }


    public function loadTable_get($start=NULL, $limit=NULL)
	{
		$start = $this->get('start');
		$limit = $this->get('limit');
		
		if ( empty($start) AND empty($limit) ) {			

			$this->response(NULL, RestController::HTTP_BAD_REQUEST);
		}else{

			$query = $this->Bedonline_model->loadTable($start, $limit);
			if ( $query->num_rows() > 0 ) {
			
				$data_arr  = array();
				foreach ($query->result() as $row) {
				
					$data_temp = array(
						'row'			=> $row->row,
						'NamaRuangan'	=> $row->NamaRuangan,
						'DeskKelas'		=> $row->DeskKelas,
						'Kapasitas'		=> $row->Kapasitas,
						'Rusak'			=> $row->Rusak,
						'Sterilisasi'	=> $row->Sterilisasi,
						'Terisi'		=> $row->Terisi,
						'Tersedia'		=> $row->Tersedia
					);
					array_push($data_arr, $data_temp);
				}

				$data = array(
							'status' => TRUE, 
							'message' => 'Data pasien ditemukan', 
							'rownumber' => $query->num_rows(), 
							'data' => $data_arr	
						);
				$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code


			}else{

				$data = array(
							'status' => FALSE, 
							'message' => 'Data Bed Tidak Di Temukan'
						);
				
				$this->response($data, RestController::HTTP_OK);

			}
		}
	}

	public function loadPanel_get()
	{
		$data_arr = array();
		$query = $this->Bedonline_model->loadPanel();
		foreach ($query->result() as $row) {
			
			$progress = round(($row->Tersedia / $row->Kapasitas) * 100);

			$data_temp = array(
				'DeskKelas'		=> $row->DeskKelas,
				'Tersedia'		=> $row->Tersedia,
				'progress'		=> $progress
			);
			array_push($data_arr, $data_temp); 
		}

		$data = array(
					'status' => TRUE, 
					'message' => 'Data Bedonline ditemukan', 
					'rownumber' => $query->num_rows(), 
					'data' => $data_arr	
				);
		$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code

	}

	public function total_get()
	{
		$total = $this->db->query("SELECT COUNT(*) as Total FROM V_AmbilStatusBed_New_GroupRuangan")->row()->Total;

		$data = array(
					'status' => TRUE, 
					'message' => 'Data Bedonline ditemukan', 
					'total' => $total	
				);
		$this->response($data, RestController::HTTP_OK);
	}

}

/* End of file Bedonline.php */
/* Location: ./application/controllers/Bedonline.php */