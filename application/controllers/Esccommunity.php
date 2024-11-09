<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Esccommunity extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		// $this->load->model('Ourlocation_model');
	}

	public function index($idmenu = null)
	{
		$data['title'] = 'COMMUNITY';
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/index', $data);
	}
}

/* End of file Ourlocation.php */
/* Location: ./application/controllers/Ourlocation.php */