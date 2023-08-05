<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Sijapri extends RestController
{

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('Sijapri_model');
        $this->methods['pasien_get']['limit'] = 100;
        $this->methods['index_get']['limit']  = 2;
    }

    public function index()
    {
        $this->response(null, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    }

    public function pasien_get($NoCM = null, $NoIdentitas = null)
    {
        $NoCM        = $this->get('NoCM');
        $NoIdentitas = $this->get('NoIdentitas');

        // $NoCM        = parse_str($_SERVER['NoCM'], $_GET); 
        // $NoIdentitas = parse_str($_SERVER['NoIdentitas'], $_GET); 



        if (empty($NoCM) && empty($NoIdentitas)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

            if (!empty($NoCM)) {
                $rspasien = $this->Sijapri_model->info_pasien_get($NoCM);
            } else {
                $rspasien = $this->Sijapri_model->info_pasien_nik_get($NoIdentitas);
            }

            $rsruangan = $this->Sijapri_model->ruangan_inap_dan_bedah_get();
            $rsdokter  = $this->Sijapri_model->daftar_dokter();

            if ($rspasien->num_rows() > 0) {
                $data = array(
                    'status'      => true,
                    'message'     => 'Data ditemukan',
                    'dataPasien'  => $rspasien->result(),
                    'dataRuangan' => $rsruangan->result(),
                    'dataDokter'  => $rsdokter->result(),
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

/* End of file Sijapri.php */
/* Location: ./application/controllers/Sijapri.php */
