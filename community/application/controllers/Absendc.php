<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absendc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('DcmemberModel');
        $this->load->model('AbsendcModel');
        $this->load->library('image_lib');
    }

    public function index()
    {
        $data['rsAbsensi'] = $this->AbsendcModel->get_all();
        $data['menu'] = 'absendc';
        $this->load->view('absendc/index', $data);
    }

    public function tambah()
    {
        $data['rsDcmember'] = $this->DcmemberModel->get_all();
        $data['menu'] = 'ddcmember';
        $this->load->view('absendc/form', $data);
    }

    public function simpan()
    {
        $keterangan             = $this->input->post('keterangan');
        $dataJemaat             = $this->input->post('idjemaat');

        $foto = $this->App->uploadImage($_FILES, "foto", '', 'absensi');

        $dataHeader = array(
            'tglabsen' => date('Y-m-d H:i:s'),
            'foto' => $foto,
            'iddc' => $this->session->userdata('iddc'),
            'keterangan' => $keterangan,
            'totalpeserta' => count($dataJemaat),
            'idpengguna' => $this->session->userdata('idjemaat'),
        );


        $simpan = $this->AbsendcModel->simpan($dataHeader, $dataJemaat);
        if ($simpan) {
            $pesan = '<script>swal("Berhasil", "Data berhasil disimpan!", "success");</script>';
        } else {
            $pesan = '<script>swal("Gagal", "Data gagal disimpan", "error");</script>';
        }
        $this->session->set_flashdata('pesan', $pesan);
        redirect('absendc');
    }

    public function getDetailAbsen()
    {
        $idabsen = $this->input->get('idabsen');
        $rsAbsen = $this->AbsendcModel->get_by_id($idabsen);

        $dataHeader = array();
        if ($rsAbsen->num_rows() > 0) {
            $foto = base_url('images/nofoto.png');
            if (!empty($rsAbsen->row()->foto)) {
                $foto = base_url('uploads/absensi/' . $rsAbsen->row()->foto);
            }

            $dataHeader = array(
                'idabsen' => $rsAbsen->row()->idabsen,
                'tglabsen' => formatHariTanggalJam($rsAbsen->row()->tglabsen),
                'foto' => $foto,
                'keterangan' => $rsAbsen->row()->keterangan,
            );
        }

        $rsDetail = $this->db->query("
            select * from v_dcabsen_detail where idabsen = $idabsen
        ");
        echo json_encode(
            array(
                'dataHeader' => $dataHeader,
                'dataDetail' => $rsDetail->result(),
            )
        );
    }
}
