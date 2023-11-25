<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapdatajemaat extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata( 'IDMENUSELECTED', 'L100' );
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

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $this->load->view('lapdatajemaat/index', $data);
    }

    public function cetak()
    {
        error_reporting(0);
        $this->load->library('Pdf');

        $jenis         = $this->uri->segment(3);
        $jeniskelamin      = $this->uri->segment(4);
        $statuspernikahan    = urldecode($this->uri->segment(5));
        $pekerjaan     = urldecode($this->uri->segment(6));
        $statusjemaat         = $this->uri->segment(7);
        $golongandarah         = $this->uri->segment(8);
        $chkumur = $this->uri->segment(9);
        $umur1 = $this->uri->segment(10);
        $umur2 = $this->uri->segment(11);

        $propinsi = $this->uri->segment(12);
        $kotakabupaten = $this->uri->segment(13);
        $kecamatan = $this->uri->segment(14);
        $kelurahan = $this->uri->segment(15);
        
        $where = '';
        if ($jeniskelamin != '-') {
            $and_where .= " and jeniskelamin = '$jeniskelamin' ";
        }
        if ($statuspernikahan != '-') {
            $and_where .= " and statuspernikahan = '$statuspernikahan' ";
        }
        if ($pekerjaan != '-') {
            $and_where .= " and pekerjaan = '$pekerjaan' ";
        }
        if ($statusjemaat != '-') {
            $and_where .= " and statusjemaat = '$statusjemaat' ";
        }
        if ($chkumur == '1') {
            $and_where .= " and umur between '$umur1' and '$umur2'  ";
        }
        if ($golongandarah != '-') {
            $and_where .= " and golongandarah='$golongandarah' ";
        }
        if ($propinsi != '-') {
            $and_where .= " and propinsi='$propinsi' ";
        }
        if ($kotakabupaten != '-') {
            $and_where .= " and kotakabupaten='$kotakabupaten' ";
        }
        if ($kecamatan != '-') {
            $and_where .= " and kecamatan='$kecamatan' ";
        }
        if ($kelurahan != '-') {
            $and_where .= " and kelurahan='$kelurahan' ";
        }


        $query = "select * from v_jemaat where idjemaat is not null " . $and_where . " order by namalengkap";
        // echo urldecode($pekerjaan);
        // exit();
        $rsJemaat = $this->db->query($query);

        $rowInfoGereja = $this->db->query("
        		select * from infogereja
        	")->row();

        $data['jeniskelamin']  = $jeniskelamin;
        $data['statuspernikahan'] = $statuspernikahan;
        $data['pekerjaan']   = $pekerjaan;
        $data['statusjemaat']   = $statusjemaat;
        $data['umur1']   = $umur1;
        $data['umur2']   = $umur2;
        $data['chkumur']   = $chkumur;
        $data['rsJemaat']   = $rsJemaat;
        $data['rowInfoGereja']   = $rowInfoGereja;

        if ($jenis == 'pdf') {
            $this->load->view('lapdatajemaat/cetakpdf', $data);
        } else {
            $this->load->view('lapdatajemaat/cetakexcel', $data);
        }
    }


}

/* End of file Lapdatajemaat.php */
/* Location: ./application/controllers/Lapdatajemaat.php */