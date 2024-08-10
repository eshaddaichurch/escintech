<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardcare extends MY_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata('IDMENUSELECTED', 'D004');
        $this->load->model('Dashboardcare_model');
    }

    public function index()
    {
        $data["menu"] = "dashboardcare";
        $this->load->view("dashboard/care", $data);
    }

    public function getinfobox()
    {

        $data = array(
            'jumlahjemaatbaru' => $this->Dashboardcare_model->getJemaatBaru(),
            'jumlahjemaatsemua' => $this->Dashboardcare_model->getTotalJemaat(),
            'jumlahjemaatsimpatisan' => $this->Dashboardcare_model->getTotalSimpatisan(),
            'jumlahjemaatumum' => $this->Dashboardcare_model->getTotalUmum(),
        );
        echo json_encode($data);
    }

    public function getgrafikjemaatbaru()
    {
        $rskelas = $this->Dashboardcare_model->getgrafikjemaatbaru()->row();
        // echo json_encode($rskelas);
        // exit();
        $datatanggal = array();

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');


        $jumlahjemaat = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahjemaat' => $jumlahjemaat,
            'totaljemaat' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }


    public function getgrafikmarriage()
    {
        $rskelas = $this->Dashboardcare_model->getgrafikmarriage()->row();
        // echo json_encode($rskelas);
        // exit();
        $datatanggal = array();

        $datatanggal = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');


        $jumlahjemaat = array($rskelas->Jan, $rskelas->Feb, $rskelas->Mar, $rskelas->Apr, $rskelas->Mei, $rskelas->Jun, $rskelas->Jul, $rskelas->Ags, $rskelas->Sep, $rskelas->Okt, $rskelas->Nov, $rskelas->Des);

        $data = array(
            'datatanggal' => $datatanggal,
            'jumlahjemaat' => $jumlahjemaat,
            'totaljemaat' => $rskelas->Jan + $rskelas->Feb + $rskelas->Mar + $rskelas->Apr + $rskelas->Mei + $rskelas->Jun + $rskelas->Jul + $rskelas->Ags + $rskelas->Sep + $rskelas->Okt + $rskelas->Nov + $rskelas->Des
        );
        echo json_encode($data);
    }
}

/* End of file Dashboardcare.php */
/* Location: ./application/controllers/Dashboardcare.php */