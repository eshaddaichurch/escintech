<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Kalender_model');
		$this->load->model('Nextstep_model');
	}

	public function index($idmenu)
	{
		$bulanEvent = date('m');
		$tahunEvent = date('Y');

		$idmenu = $this->encrypt->decode($idmenu);
		$rsEvent = $this->db->query("
			select * from v_jadwaleventdetailtanggal_2 
			where month(tgljadwal)=$bulanEvent and year(tgljadwal)=$tahunEvent 
				and statuskonfirmasi = 'Disetujui'
				order by tgljadwal, jammulai
			");
		$bulanSebelum = $bulanEvent - 1;
		$tahunSebelum = $tahunEvent;
		$bulanBerikut = $bulanEvent + 1;
		$tahunBerikut = $tahunEvent;

		if ($bulanEvent == 1) {
			$bulanSebelum = 12;
			$tahunSebelum = $tahunEvent - 1;
		}

		if ($bulanEvent == 12) {
			$bulanBerikut = 1;
			$tahunBerikut = $tahunEvent + 1;
		}

		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$data['rsEvent'] = $rsEvent;
		$data['bulanEvent'] = $bulanEvent;
		$data['tahunEvent'] = $tahunEvent;
		$data['bulanSebelum'] = $bulanSebelum;
		$data['tahunSebelum'] = $tahunSebelum;
		$data['bulanBerikut'] = $bulanBerikut;
		$data['tahunBerikut'] = $tahunBerikut;
		$data['menu'] = $idmenu;
		$this->load->view('kalender/index', $data);
	}

	public function lihatbulan($bulanEvent, $tahunEvent, $idmenu)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$rsEvent = $this->db->query("
			select * from v_jadwaleventdetailtanggal_2 where month(tgljadwal)=$bulanEvent and year(tgljadwal)=$tahunEvent order by tgljadwal, jammulai
			");

		$bulanSebelum = $bulanEvent - 1;
		$tahunSebelum = $tahunEvent;
		$bulanBerikut = $bulanEvent + 1;
		$tahunBerikut = $tahunEvent;

		if ($bulanEvent == 1) {
			$bulanSebelum = 12;
			$tahunSebelum = $tahunEvent - 1;
		}

		if ($bulanEvent == 12) {
			$bulanBerikut = 1;
			$tahunBerikut = $tahunEvent + 1;
		}

		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$data['rsEvent'] = $rsEvent;
		$data['bulanEvent'] = $bulanEvent;
		$data['tahunEvent'] = $tahunEvent;
		$data['bulanSebelum'] = $bulanSebelum;
		$data['tahunSebelum'] = $tahunSebelum;
		$data['bulanBerikut'] = $bulanBerikut;
		$data['tahunBerikut'] = $tahunBerikut;
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