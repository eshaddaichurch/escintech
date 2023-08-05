<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapjadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
            exit();
        }
    }

    public function index()
    {
        $tglawal    = $this->input->post('tglawal');
        $tglakhir   = $this->input->post('tglakhir');
        $id_pegawai = $this->session->userdata('id_pegawai');

        if (empty($tglawal)) {
            $tglawal  = date('Y-m-d');
            $tglakhir = date('Y-m-d');
        }

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['menu']     = 'lapjadwal';
        $this->load->view('lapjadwal/listdata', $data);
    }

    public function cetak()
    {
        error_reporting(0);
        $this->load->library('Pdf');

        $jenis         = $this->uri->segment(3);
        $idproyek      = $this->uri->segment(4);
        $idkategori    = $this->uri->segment(5);
        $prioritas     = $this->uri->segment(6);
        $idpic         = $this->uri->segment(7);
        $idpembuattask = $this->uri->segment(8);
        $tglawal       = date('Y-m-d', strtotime($this->uri->segment(9)));
        $tglakhir      = date('Y-m-d', strtotime($this->uri->segment(10)));

        $where = '';
        if ($idproyek != '-') {
            $and_where .= " and idproyek = '$idproyek' ";
        }

        if ($idkategori != '-') {
            $and_where .= " and idkategori = '$idkategori' ";
        }

        if ($prioritas != '-') {
            $and_where .= " and prioritas = '$prioritas' ";
        }

        if ($idpic != '-') {
            $and_where .= " and (idpic = '$idpic'  ) ";
        }

        if ($idpembuattask != '-') {
            $and_where .= " and pembuattask = '$idpembuattask' ";
        }

        $query = "select * from v_task where convert(tglinsert, date) between '$tglawal' and '$tglakhir' " . $and_where . " order by tglinsert";
        // echo $query;
        // exit();
        $rstask = $this->db->query($query);

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['rstask']   = $rstask;

        if ($jenis == 'print') {
            $this->load->view('lapjadwal/cetak', $data);
        } else {
            $this->load->view('lapjadwal/excel', $data);
        }
    }

}

/* End of file Lapjadwal.php */
/* Location: ./application/controllers/Lapjadwal.php */
