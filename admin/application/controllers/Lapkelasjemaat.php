<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapkelasjemaat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata('IDMENUSELECTED', 'LN01');
        $this->cekOtorisasi();
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
        $rsKelas = $this->db->query("select * from kelas order by idkelas");

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['rsKelas'] = $rsKelas;
        $this->load->view('lapkelasjemaat/index', $data);
    }

    public function cetak()
    {
        error_reporting(0);
        $this->load->library('Pdf');

        $jenis         = $this->uri->segment(3);
        $idkelas      = $this->uri->segment(4);
        $tahunkelas    = urldecode($this->uri->segment(5));

        $and_where = '';

        if ($idkelas != '-') {
            $and_where .= " and idkelas = '$idkelas' ";
        }
        if ($tahunkelas != '-') {
            $and_where .= " and year(tglsertifikat) = '$tahunkelas' ";
        }

        $query = "select idjadwalevent,  idkelas, namaevent, tglmulaievent, tglselesaievent 
                        from v_laporan_kelas_jemaat 
                        where idregistrasijadwal is not null " . $and_where . " 
                        GROUP BY idjadwalevent, idkelas, namaevent, tglmulaievent, tglselesaievent
                        ORDER BY tglmulaievent";

        $rsRegistrasi = $this->db->query($query);

        $rowInfoGereja = $this->db->query("
        		select * from infogereja
        	")->row();
        // print_r($rsRegistrasi->result());
        // exit;
        $data['rsRegistrasi']   = $rsRegistrasi;
        $data['rowInfoGereja']   = $rowInfoGereja;

        if ($jenis == 'pdf') {
            $this->load->view('lapkelasjemaat/cetakpdf', $data);
        } else {
            $this->load->view('lapkelasjemaat/cetakexcel', $data);
        }
    }
}
