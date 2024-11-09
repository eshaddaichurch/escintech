<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dc extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		// $this->load->model('Ourlocation_model');
	}

	public function index($idmenu = null)
	{


		$data['title'] = 'DISCIPLES COMMUNITY';
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/dc/index', $data);
	}

	public function list($idmenu = "")
	{
		$rsDC = $this->db->query("
			select * from v_disciplescommunity where statusaktif = 'Aktif'
		");

		$data['title'] = 'LIST DATA DISCIPLES COMMUNITU';
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data['rsDC'] = $rsDC;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/dc/listdata', $data);
	}
}

/* End of file Ourlocation.php */
/* Location: ./application/controllers/Ourlocation.php */