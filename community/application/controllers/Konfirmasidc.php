<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasidc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Konfirmasidc_model');
    }

    public function index()
    {
        $rsPermohonan = $this->Konfirmasidc_model->getPermohonan();
        $data['rsPermohonan'] = $rsPermohonan;
        $data['menu'] = 'konfirmasidc';
        $this->load->view('konfirmasidc/index', $data);
    }

    public function getDetailPermohon()
    {
        $idpermohonan = $this->input->get('idpermohonan');
        $idpermohonan = $this->encrypt->decode($idpermohonan);
        // echo json_encode($idpermohonan);
        // exit();
        $rsPermohonan = $this->Konfirmasidc_model->getPermohonanID($idpermohonan);
        if ($rsPermohonan->num_rows() == 0) {
            echo json_encode(array('msg' => "Data permohonan tidak ditemukan!"));
            exit();
        }
        $rowPermohonan = $rsPermohonan->row();
        $idjemaat = $rowPermohonan->idjemaat;

        $rsNextStep = $this->App->getKelasJemaat($idjemaat);
        $arrNextStep = array();
        if ($rsNextStep->num_rows() > 0) {
            foreach ($rsNextStep->result() as $row) {
                array_push($arrNextStep, array(
                    'namakelas' => $row->namakelas
                ));
            }
        }

        $arrJemaatFamily = $this->App->getJemaatFamily($idjemaat);

        echo json_encode(array('rowPermohonan' => $rowPermohonan, 'arrNextStep' => $arrNextStep, 'arrJemaatFamily' => $arrJemaatFamily));
    }

    public function tolak()
    {
        $idpermohonan = $this->input->post('idpermohonan');
        $alasan = $this->input->post('alasan');
        $idpermohonan = $this->encrypt->decode($idpermohonan);
        // echo json_encode($idpermohonan);
        // exit();
        $rsPermohonan = $this->Konfirmasidc_model->getPermohonanID($idpermohonan);
        if ($rsPermohonan->num_rows() == 0) {
            echo json_encode(array('msg' => "Data permohonan tidak ditemukan!"));
            exit();
        }
        $rowPermohonan = $rsPermohonan->row();


        $idjemaat = $rowPermohonan->idjemaat;
        $simpan = $this->Konfirmasidc_model->tolak($idpermohonan, $alasan);
        if ($simpan) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => "Data gagal ditolak!"));
        }
    }

    public function setuju($idpermohonan)
    {

        $idpermohonan = $this->encrypt->decode($idpermohonan);
        $rsPermohonan = $this->Konfirmasidc_model->getPermohonanID($idpermohonan);
        if ($rsPermohonan->num_rows() == 0) {
            $pesan = '<script>swal("Informasi", "Data permohonan tidak ditemukan!", "info");</script>';
            redirect('Konfirmasidc');
        }
        $rowPermohonan = $rsPermohonan->row();

        $idjemaat = $rowPermohonan->idjemaat;
        $rsDcMember = $this->Konfirmasidc_model->getDcMemberAktif($idjemaat);
        if ($rsDcMember->num_rows() > 0) {
            $namadc = $rsDcMember->row()->namadc;
            $pesan = '<script>swal("Informasi", "Jemaat ini sudah menjadi anggota ' . $namadc . '", "info");</script>';
            redirect('Konfirmasidc');
        }

        $simpan = $this->Konfirmasidc_model->setuju($idjemaat, $idpermohonan, $rowPermohonan);
        if ($simpan) {
            $pesan = '<script>swal("Berhasil", "Data berhasil disetujui!", "success");</script>';
        } else {
            $pesan = '<script>swal("Gagal", "Data gagal disetujui", "error");</script>';
        }
        $this->session->set_flashdata('pesan', $pesan);
        redirect('Konfirmasidc');
    }
}
