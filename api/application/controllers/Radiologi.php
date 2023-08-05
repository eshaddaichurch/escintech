<?php
defined('BASEPATH') or exit('No direct script access allowed');

Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Radiologi extends RestController
{

    public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->methods['pasien_get']['limit'] = 100;
        $this->methods['index_get']['limit']  = 2;
    }

    public function index()
    {
        $this->response(null, RestController::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
    }

    public function sudahdiperiksa_get($tglawal = null, $tglakhir = null)
    {
        $tglawal         = $this->get('tglawal');
        $tglakhir        = $this->get('tglakhir');

        if (empty($tglawal) || empty($tglawal)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

                $strSQL   = "
                    SELECT 
                        NoRadiology,
                        NoPendaftaran,
                        TglPendaftaran,
                        NoCM,
                        [Nama Pasien] AS NamaPasien,
                        JK,
                        Umur,
                        Alamat,
                        [Asal Perujuk] AS AsalPerujuk,
                        [Ruang Perujuk] AS RuangPerujuk,
                        JenisPasien,
                        Kelas,
                        IdDokter,
                        NamaLengkap AS NamaDokter,
                        dbo.TakeNoSEP(NoPendaftaran) AS NoSEP
                    FROM V_RegRadPasien1 
                    WHERE 
                        KdRuangan='101' AND 
                        CAST(TglPendaftaran AS DATE) BETWEEN '$tglawal' AND '$tglakhir'
                    ORDER BY TglPendaftaran ASC
                ";

                $rspasien = $this->db->query($strSQL);
                
                if($rspasien->num_rows() > 0){
                    $data = array(
                        'status'                => true,
                        'message'               => 'Data ditemukan',
                        'dataPasien'            => $rspasien->result()
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


    public function belumdiperiksa_get($tglawal = null, $tglakhir = null)
    {
        $tglawal         = $this->get('tglawal');
        $tglakhir        = $this->get('tglakhir');

        if (empty($tglawal) || empty($tglawal)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

                $strSQL   = "
                    SELECT 
                        NoRadiology,
                        NoPendaftaran,
                        TglPendaftaran,
                        NoCM,
                        [Nama Pasien] AS NamaPasien,
                        JK,
                        Umur,
                        [Asal Perujuk] AS AsalPerujuk,
                        [Asal Perujuk] AS AsalPerujuk,
                        [Ruang Perujuk] AS RuangPerujuk,
                        JenisPasien,
                        Kelas,
                        IdDokter,
                        NamaLengkap AS NamaDokter,
                        dbo.TakeNoSEP(NoPendaftaran) AS NoSEP 
                    FROM 
                        V_RegRadPasien 
                    WHERE 
                        KdRuangan='101' AND 
                        CAST(TglPendaftaran AS DATE) BETWEEN '$tglawal' AND '$tglakhir'
                    ORDER BY TglPendaftaran
                ";

                $rspasien = $this->db->query($strSQL);
                
                if($rspasien->num_rows() > 0){
                    $data = array(
                        'status'                => true,
                        'message'               => 'Data ditemukan',
                        'dataPasien'            => $rspasien->result()
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


    public function hasilradiologi_get($NoPendaftaran = null)
    {
        $NoPendaftaran = $this->get('NoPendaftaran');

        if (empty($NoPendaftaran)) {
            $this->response(null, RestController::HTTP_BAD_REQUEST);
        } else {

                $strSQL   = "
                    SELECT 
                        NoRadiology,
                        TglPelayanan,
                        NoPendaftaran,
                        NoCM,
                        NamaDetailPeriksa
                    FROM DetailHasilPeriksaRadiology
                    WHERE 
                        NoPendaftaran='$NoPendaftaran' AND 
                        KdPelayananRS<>''
                    ORDER BY TglPelayanan
                ";

                $rsHasil = $this->db->query($strSQL);
                
                if($rsHasil->num_rows() > 0){
                    $data = array(
                        'status'                => true,
                        'message'               => 'Data ditemukan',
                        'dataPasien'            => $rsHasil->result()
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

/* End of file Radiologi.php */
/* Location: ./application/controllers/Radiologi.php */
