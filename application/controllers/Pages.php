<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Pages_model');
	}

	public function read($idmenu, $slug)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$rspages = $this->Pages_model->get_pages_by_slug($slug);
		$data['slug'] = $slug;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();	
		$data['menu'] = $idmenu;
		if ($rspages->num_rows()>0) {
			$data['rowpages'] = $rspages->row();
			$this->load->view('pages/read', $data);
		}else{
			$this->load->view('pages/notfound', $data);
		}
	}

}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */