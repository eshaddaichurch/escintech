<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->session->set_userdata( 'IDMENUSELECTED', 'HOME' );
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data["menu"] = "home";
        $this->load->view("home", $data);
    }

    public function getinfobox()
    {
        $hitcounterlastweek = $this->Home_model->get_site_data_for_last_week();
        $hitcountertoday = $this->Home_model->get_site_data_for_today();
        $newvisitorthismonth = $this->Home_model->get_new_visitor_last_month();
        $onlinevisitor = $this->Home_model->get_online_visitor();

        $data = array(
        				'hitcountertoday' => $hitcountertoday, 
        				'hitcounterlastweek' => $hitcounterlastweek, 
        				'newvisitorthismonth' => $newvisitorthismonth, 
        				'onlinevisitor' => $onlinevisitor, 
        			);
        echo json_encode($data);
    }

    public function getgrafikhit()
    {
    	$rshit = $this->Home_model->get_chart_data_for_month_year();
    	$datatanggal = array();
    	$datahit = array();
    	$dataaverage = array();
		$jumlah = 0;
    	if ($rshit->num_rows()>0) {
    		$i = 1;
	    	foreach ($rshit->result() as $rowhit) {
	    		$datatanggal[] = 'Tgl-'.date('d', strtotime($rowhit->day));
	    		$datahit[] = $rowhit->visits;
	    		$dataaverage[] = ($jumlah+$rowhit->visits)/$i;

	    		$jumlah += $rowhit->visits;
	    		$i++;
	    	}    		
    	}

    	$data = array(
    					'datatanggal' => $datatanggal, 
    					'datahit' => $datahit, 
    					'dataaverage' => $dataaverage, 
    					'totalhit' => $jumlah, 
    				);
    	echo json_encode( $data );
    }


    public function getgraviknewvisitor()
    {
    	$rsvisitor = $this->Home_model->get_chart_data_for_month_year_new_visitor();
    	$datatanggal = array();
    	$datavisitor = array();
    	$totalnewvisitor = 0;
    	if ($rsvisitor->num_rows()>0) {
	    	foreach ($rsvisitor->result() as $rowvisitor) {
	    		$datatanggal[] = 'Tgl-'.date('d', strtotime($rowvisitor->day));
	    		$datavisitor[] = $rowvisitor->visitor;
	    		$totalnewvisitor += $rowvisitor->visitor;
	    	}    		
    	}
    	$data = array(
    					'datatanggal' => $datatanggal, 
    					'datavisitor' => $datavisitor, 
    					'totalnewvisitor' => $totalnewvisitor, 
    				);
    	echo json_encode($data);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */