<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Kalender_model');
	}

	public function index($idmenu)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$rsEvent = $this->db->query("
			select * from v_jadwaleventdetailtanggal_2 order by tgljadwal, jammulai
			");

		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$data['rsEvent'] = $rsEvent;
		$data['menu'] = $idmenu;
		$this->load->view('kalender/index', $data);
	}

	public function getEvent()
	{
		$rsEvent = $this->db->query("
				select * from v_jadwaleventdetailtanggal_2 where statuskonfirmasi='Disetujui' and tampilkandiwebsite='Ya' order by tgljadwal, jammulai
			");
		echo json_encode($rsEvent->result());
	}
}

/* End of file Kalender.php */
/* Location: ./application/controllers/Kalender.php */