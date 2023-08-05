<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Kategori_model');
	}


	public function index($idmenu, $slug)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$rskategori = $this->Kategori_model->get_kategori_by_slug($slug);
		$data['slug'] = $slug;
		$data['menu'] = $idmenu;
		if ($rskategori->num_rows()>0) {
			$data['rowkategori'] = $rskategori->row();
			$data['rspages'] = $this->Kategori_model->get_pages($rskategori->row()->idpageskategori);
			$this->load->view('kategori/index', $data);
		}else{
			$this->load->view('kategori/notfound', $data);
		}
	}

	public function read($idmenu, $slug)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$rskategori = $this->Kategori_model->get_kategori_by_slug($slug);
		$data['slug'] = $slug;
		$data['menu'] = $idmenu;
		if ($rskategori->num_rows()>0) {
			$data['rowkategori'] = $rskategori->row();
			$this->load->view('kategori/read', $data);
		}else{
			$this->load->view('kategori/notfound', $data);
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */