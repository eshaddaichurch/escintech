<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends MY_controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata( 'IDMENUSELECTED', 'dashboard2' );
        $this->load->model('Dashboard2_model');
    }

    public function index()
    {
        $data["menu"] = "dashboard2";
        $this->load->view("dashboard/dashboard2", $data);
    }

    public function getinfobox()
    {
        $kehadiranbulanini = $this->Dashboard2_model->kehadiranbulanini();
       	$kehadiranbulanlalu = $this->Dashboard2_model->kehadiranbulanlalu();
       	$kenaikanbulanlalu = $this->Dashboard2_model->kenaikanbulanlalu($kehadiranbulanlalu);
       	$kenaikanbulanini = $this->Dashboard2_model->kenaikanbulanini($kehadiranbulanini, $kehadiranbulanlalu);

        $data = array(
        				'kehadiranbulanini' => $kehadiranbulanini,
        				'kehadiranbulanlalu' => $kehadiranbulanlalu,
        				'kenaikanbulanlalu' => $kenaikanbulanlalu,
        				'kenaikanbulanini' => $kenaikanbulanini,

        			);
        echo json_encode($data);
    }

    public function getgrafikabsen()
    {
        $idabsenjenis = $this->input->get('idabsenjenis');
    	$rsAbsen = $this->Dashboard2_model->getgrafikabsen($idabsenjenis);
    	$datatanggal = array();
    	$datahadiribadah1 = array();
    	$datahadiribadah2 = array();
    	$datahadiribadah3 = array();
    	$datahadiribadah4 = array();

		$jumlah = 0;
    	if ($rsAbsen->num_rows()>0) {
    		$i = 1;
	    	foreach ($rsAbsen->result() as $rowAbsen) {
	    		$datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
	    		$datahadiribadah1[] = $rowAbsen->jumlahibadah1;
	    		$datahadiribadah2[] = $rowAbsen->jumlahibadah2;
	    		$datahadiribadah3[] = $rowAbsen->jumlahibadah3;
	    		$datahadiribadah4[] = $rowAbsen->jumlahibadah4;
	    		$jumlah += $rowAbsen->jumlahibadah1 + $rowAbsen->jumlahibadah2 + $rowAbsen->jumlahibadah3 + $rowAbsen->jumlahibadah4;
	    		$i++;
	    	}    		
    	}
    	$jumlahPerMinggu = $jumlah/$i;

    	$data = array(
    					'datatanggal' => $datatanggal, 
    					'datahadiribadah1' => $datahadiribadah1, 
    					'datahadiribadah2' => $datahadiribadah2, 
    					'datahadiribadah3' => $datahadiribadah3, 
    					'datahadiribadah4' => $datahadiribadah4, 
    					'jumlahPerMinggu' => $jumlahPerMinggu, 
    					'jumlahi' => $i, 
    				);
    	echo json_encode( $data );
    }


    public function getescwomengrafik()
    {
        $rsAbsen = $this->Dashboard2_model->getescwomengrafik();
        $datatanggal = array();
        $datahadiribadah1 = array();
        $datahadiribadah2 = array();
        $datahadiribadah3 = array();
        $datahadiribadah4 = array();

        $jumlah = 0;
        if ($rsAbsen->num_rows()>0) {
            $i = 1;
            foreach ($rsAbsen->result() as $rowAbsen) {
                $datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
                $datahadiribadah[] = $rowAbsen->jumlahhadir;
                $i++;
            }           
        }
        $jumlahPerMinggu = $jumlah/$i;

        $data = array(
                        'datatanggal' => $datatanggal, 
                        'datahadiribadah' => $datahadiribadah, 
                        'jumlahi' => $i, 
                    );
        echo json_encode( $data );
    }


    public function getpersentase()
    {
    	
    	$rsAbsen = $this->Dashboard2_model->getgrafikabsen('A01');
    	$datatanggal = array();
    	$datapersentase = array();


		$jumlah_old = 0;
		$jumlah = 0;
		$totalpersentase = 0;

    	if ($rsAbsen->num_rows()>0) {
    		$i = 1;
	    	foreach ($rsAbsen->result() as $rowAbsen) {
	    		$datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
	    		$jumlah = $rowAbsen->jumlahibadah1 + $rowAbsen->jumlahibadah2 + $rowAbsen->jumlahibadah3 + $rowAbsen->jumlahibadah4;

	    		if ($jumlah_old==0 || $jumlah==0) {
	    			$persentase = 0;
	    		}else{
		    		$persentase = (($jumlah/$jumlah_old) * 100) - 100;
	    		}
	    		$datapersentase[] = $persentase;
	    		$jumlah_old = $jumlah;
	    		$totalpersentase+=$persentase;
	    		$i++;
	    	}    		
    	}

    	$ratarata = $totalpersentase/$i;

    	$data = array(
    					'datatanggal' => $datatanggal, 
    					'datapersentase' => $datapersentase, 
    					'ratarata' => $ratarata, 
    				);
    	echo json_encode( $data );

    }

}

/* End of file Dashboard2.php */
/* Location: ./application/controllers/Dashboard2.php */