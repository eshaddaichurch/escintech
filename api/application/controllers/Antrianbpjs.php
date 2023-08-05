<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Antrianbpjs extends RestController {

	function __construct($config = 'rest') {
        parent::__construct($config);
        $this->methods['antrian_get']['limit'] = 100;
    }

	public function index_get()
	{
		// echo '<h5>Selamat Datang di API RSUD Dr Soedarso</h5>';
		$this->response(NULL, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
	}

	public function antrian_get( $TglAntrian=NULL, $IdAntrianGroup=NULL, $StatusDilayani='ALL', $NoAntrian=NULL )
	{

		$TglAntrian 			= $this->get('TglAntrian');
		$IdAntrianGroup 		= $this->get('IdAntrianGroup');
		$StatusDilayani 		= $this->get('StatusDilayani');
		$NoAntrian 				= $this->get('NoAntrian');
		
		/**
		KdKelompokPasien
		01 = Umum
		02 = BPJS / Penjamin Lainnya
		**/

		if ( empty($TglAntrian) || empty($IdAntrianGroup) ) {
            
            $this->response([
	                'success' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);

		}else{

			$TglAntrian = date('Y-m-d', strtotime($TglAntrian));
			$where1 = '';

			if ( $StatusDilayani=='1' || $StatusDilayani=='0' ) {
				$where1 .= " and StatusPemanggilan='".$StatusDilayani."'";
			}else{
				$where1 .= "";
			}

			if (!empty($NoAntrian)) {
				$where1 .= " and NoAntrian='".$NoAntrian."'";
			}

			$query = "
					select Antrian_Soedarso.*, AntrianGroup_Soedarso.NamaAntrianGroup from Antrian_Soedarso 
						join AntrianGroup_Soedarso on AntrianGroup_Soedarso.IdAntrianGroup=Antrian_Soedarso.IdAntrianGroup
						where CONVERT(date,Antrian_Soedarso.TglAntrian)= '".$TglAntrian."' and Antrian_Soedarso.IdAntrianGroup='".$IdAntrianGroup."' ".$where1."
						order by Antrian_Soedarso.NoAntrian desc 
					";

				$rsAntrianTerakhir = $this->db->query($query);

				if ($rsAntrianTerakhir->num_rows()>0) {

					$result =array();
					foreach ($rsAntrianTerakhir->result() as $row) {
						array_push($result, array(
								'NoAntrian' => $row->NoAntrian,
								'TglAntrian' => $row->TglAntrian,
								'PosisiLoket' => $row->NamaAntrianGroup,
								'StatusDilayani' => $row->StatusPemanggilan,
						));
					}

					$data = array(
							'success' => TRUE, 
							'message' => '', 
							'result' => $result, 
						);
					$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
				}else{
					$data = array(
							'success' => TRUE, 
							'message' => 'Nomor antrian belum ada', 
							'result' => array(), 
						);
					$this->response($data, RestController::HTTP_OK);
				}

		}

	}


	public function antrian_post()
	{
		$IdAntrianGroup     = $this->input->post('IdAntrianGroup');
		$KdKelompokPasien   = '02';

		switch ($IdAntrianGroup) {
			case '01':
				$NoAntrian_Abjad	= 'A';				
				break;
			case '02':
				$NoAntrian_Abjad	= 'B';				
				break;
			case '01':
				$NoAntrian_Abjad	= 'C';				
				break;			
			default:
				$NoAntrian_Abjad	= '';								
				break;
		}

		
		$IdAntrianGroup_valid = array('01', '02', '03');
		if ( empty($IdAntrianGroup) || empty($NoAntrian_Abjad) ||  !in_array($IdAntrianGroup, $IdAntrianGroup_valid)) {
				
				$this->response([
	                'success' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);

		}else{

			$date				= date('Y-m-d');		
			$IdAntrian			= $this->db->query("SELECT dbo.Create_IdAntrian('$date') AS IdAntrian ")->row()->IdAntrian;
			$TanggalDanWaktu	= date('Y-m-d H:i:s');
			$NoAntrian 			= $this->db->query("SELECT dbo.Create_NoAntrian('$date', '$NoAntrian_Abjad') AS NoAntrian")->row()->NoAntrian;

			$data = array(
				'IdAntrian'			=> $IdAntrian,
				'TglAntrian'		=> $TanggalDanWaktu,
				'NoAntrian'			=> $NoAntrian,
				'TglInsert'			=> $TanggalDanWaktu,
				'KodeExternal'		=> NULL,
	      		'KodeAplikasi'		=> '01',
	      		'NoCM'				=> NULL,
	      		'StatusRegistrasi'  => NULL,
	      		'NoPendaftaran'		=> NULL,
	      		'KdKelompokPasien'  => $KdKelompokPasien,
	      		'IdAntrianGroup'	=> $IdAntrianGroup,
	      		'KdRuangan'			=> NULL,
	      		'StatusPemanggilan' => '0',
	      		'KdLoket'			=> NULL
			);

			$simpan = $this->db->insert('Antrian_Soedarso', $data);

			if ($simpan) {
				
				$dataSendBack = array(
								'IdAntrian'			=> $IdAntrian,
								'TglAntrian'		=> $TanggalDanWaktu,
								'NoAntrian'			=> $NoAntrian,
								'KdKelompokPasien'  => $KdKelompokPasien,
					      		'IdAntrianGroup'	=> $IdAntrianGroup
							);

				$data = array(
							'success' => TRUE, 
							'message' => '', 
							'result' => $dataSendBack, 
						);

					$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code

			}else{

				$this->response([
	                'success' => FALSE,
	                'message' => 'Gagal mendapatkan nomor antrian!'
	            ], RestController::HTTP_BAD_REQUEST);

			}

		}
		

	}


	public function antriangroup_get( $IdAntrianGroup=NULL )
	{

		$IdAntrianGroup 		= $this->get('IdAntrianGroup');
		$where1 = '';

		if ( $IdAntrianGroup!='' ) {
			$where1 .= " and IdAntrianGroup='".$IdAntrianGroup."'";
		}

		$query = "
				select top 2 AntrianGroup_Soedarso.*, Antrian_Soedarso_Mapping.KdRuangan, Ruangan.NamaRuangan from AntrianGroup_Soedarso
					join Antrian_Soedarso_Mapping on Antrian_Soedarso_Mapping.KdLantai=AntrianGroup_Soedarso.KdLantai
					join Ruangan on Ruangan.KdRuangan=Antrian_Soedarso_Mapping.KdRuangan
					where AntrianGroup_Soedarso.StatusAktif='1' and AntrianGroup_Soedarso.IdAntrianGroup in ('01', '02', '03') ".$where1."
					order by AntrianGroup_Soedarso.IdAntrianGroup, Antrian_Soedarso_Mapping.KdLantai
				";

			$rsAntrianGroup = $this->db->query($query);

			if ($rsAntrianGroup->num_rows()>0) {

				$result =array();
				foreach ($rsAntrianGroup->result() as $row) {
					array_push($result, array(
							'IdAntrianGroup' => $row->IdAntrianGroup,
							'NamaAntrianGroup' => $row->NamaAntrianGroup,
							'KdRuangan' => $row->KdRuangan,
							'NamaRuangan' => $row->NamaRuangan
					));
				}

				$data = array(
						'success' => TRUE, 
						'message' => '', 
						'result' => $result, 
					);
				$this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code

			}else{
				$this->response([
	                'success' => FALSE,
	                'message' => 'Wrong paramaters'
	            ], RestController::HTTP_BAD_REQUEST);
			}

		

	}


}

/* End of file Antrianbpjs.php */
/* Location: ./application/controllers/Antrianbpjs.php */