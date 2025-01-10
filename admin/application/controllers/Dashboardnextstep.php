<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardnextstep extends MY_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata('IDMENUSELECTED', 'D003');
        $this->load->model('Dashboardnextstep_model');
    }

    public function index()
    {
        $rsMenunggu = $this->Dashboardnextstep_model->getStatusMenunggu();
        // var_dump($rsMenunggu);
        // exit;
        $data['rsMenunggu'] = $rsMenunggu;
        $data["menu"] = "dashboardnextstep";
        $this->load->view("dashboard/nextstep", $data);
    }

    public function detail()
    {
        $rsMenunggu = $this->Dashboardnextstep_model->getStatusMenunggu();
        // var_dump($rsMenunggu);
        // exit;
        $data['rsMenunggu'] = $rsMenunggu;
        $data["menu"] = "dashboardnextstep";
        $this->load->view("dashboard/nextstepdetail", $data);
    }

    public function getinfobox()
    {
        $rsinfobox = $this->Dashboardnextstep_model->getinfobox();
        echo json_encode($rsinfobox->result());
    }

    public function getgrafikmembership()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikmembership()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }

    public function getgrafikfc1()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfc1()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }

    public function getgrafikfc2()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfc2()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }


    public function getgrafikfc3()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfc3()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }


    public function getgrafikgrade1()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikgrade1()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }

    public function getgrafikgrade2()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikgrade2()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }


    public function getgrafikgrade3()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikgrade3()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }

    public function getgrafikfolunteer()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfolunteer()->row();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
        $jumlahmurid = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'totalsiswa' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }
    public function getgrafikfc2_old()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfc2();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;
        if ($rskelas->num_rows() > 0) {
            $i = 1;
            foreach ($rskelas->result() as $row) {
                $datatanggal[] = 'Tgl-' . date('d-m-Y', strtotime($row->tglsertifikat));
                $jumlahmurid[] = $row->jumlah;
                $ratarata[] = ($jumlah + $row->jumlah) / $i;

                $jumlah += $row->jumlah;
                $i++;
            }
        }

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'ratarata' => $ratarata,
            'totalsiswa' => $jumlah,
        );

        echo json_encode($data);
    }


    public function getgrafikfc3_old()
    {
        $rskelas = $this->Dashboardnextstep_model->getgrafikfc3();
        $datatanggal = array();
        $jumlahmurid = array();
        $ratarata = array();
        $jumlah = 0;
        if ($rskelas->num_rows() > 0) {
            $i = 1;
            foreach ($rskelas->result() as $row) {
                $datatanggal[] = 'Tgl-' . date('d-m-Y', strtotime($row->tglsertifikat));
                $jumlahmurid[] = $row->jumlah;
                $ratarata[] = ($jumlah + $row->jumlah) / $i;

                $jumlah += $row->jumlah;
                $i++;
            }
        }

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahmurid' => $jumlahmurid,
            'ratarata' => $ratarata,
            'totalsiswa' => $jumlah,
        );

        echo json_encode($data);
    }
}

/* End of file Dashboardnextstep.php */
/* Location: ./application/controllers/Dashboardnextstep.php */