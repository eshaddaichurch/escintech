<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resources extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		// $this->load->model('Ourlocation_model');
	}

	public function index($idmenu = null)
	{
		$data['title'] = 'RESOURCES';
		if ($idmenu !== null) {
			$idmenu = $this->encrypt->decode($idmenu);
			$data['menu'] = $idmenu;
		} else {
			$data['menu'] = 'Resources';
		}
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('resources/index', $data);
	}
	public function kids($idmenu = null)
	{
		$data['title'] = 'KIDS RESOURCES';
		if ($idmenu !== null) {
			$idmenu = $this->encrypt->decode($idmenu);
			$data['menu'] = $idmenu;
		} else {
			$data['menu'] = 'Resources';
		}
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('resources/resourceskids', $data);
	}
	public function youth($idmenu = null)
	{
		$data['title'] = 'YOUTH RESOURCES';
		if ($idmenu !== null) {
			$idmenu = $this->encrypt->decode($idmenu);
			$data['menu'] = $idmenu;
		} else {
			$data['menu'] = 'Resources';
		}
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('resources/resourcesyouth', $data);
	}
}

/* End of file Ourlocation.php */
/* Location: ./application/controllers/Ourlocation.php */