<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Hallodok extends RestController
{

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Hallodok_model');
        $this->methods['pasien_get']['limit'] = 100;
        $this->methods['index_get']['limit']  = 2;
    }

    public function index()
    {
        $this->response(null, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    }

    public function pasien_get($NoCM = null)
    {
        $NoCM        = $this->get('NoCM');

        if (empty($NoCM)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

            if (!empty($NoCM)) {
                $rspasien           = $this->Hallodok_model->info_pasien_get($NoCM);
                $rsobat             = $this->Hallodok_model->dataobat($NoCM);
                $rsdiagnosa         = $this->Hallodok_model->dataDiagnosa($NoCM);
                $rsriwayattindakan  = $this->Hallodok_model->dataRiwayatTindakan($NoCM);
                $rstindakanmedis    = $this->Hallodok_model->dataTindakanMedis($NoCM);
                $rshasilradiologi   = $this->Hallodok_model->dataHAsilRadiologi($NoCM);
                $rsriwayattindakanlabklinik = $this->Hallodok_model->riwayatTindakanLabKlinik($NoCM);
                
                if($rspasien->num_rows() > 0){
                    $data = array(
                        'status'                => true,
                        'message'               => 'Data ditemukan',
                        'dataPasien'            => $rspasien->result(),
                        'dataObat'              => $rsobat->result(),
                        'dataDiagnosa'          => $rsdiagnosa->result(),
                        'dataRiwayatTindakan'   => $rsriwayattindakan->result(),
                        'dataTindakanMedis'     => $rstindakanmedis->result(),
                        'dataHasilRadiologi'    => $rshasilradiologi->result(),
                        'dataRiwayatTindakanLabKlinik' => $rsriwayattindakanlabklinik->result(),
                    );
                    $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
                }else{
                    $this->response([
                        'status'  => false,
                        'message' => 'Data tidak ditemukan',
                    ], RestController::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
                }
            }
        }
    }

    public function ListObatRawatJalan_get()
    {
        $rsListDataObat = $this->Hallodok_model->listDataObat();
        $data = array(
            'status'                => true,
            'message'               => 'Data ditemukan',
            'listObatRawatJalan'    => $rsListDataObat->result(),
        );
        $this->response($data, RestController::HTTP_OK); // OK (200) being the HTTP response code
    }

}

/* End of file Hallodok.php */
/* Location: ./application/controllers/Hallodok.php */
