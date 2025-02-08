<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['pasien'] = $this->db->query("select top 100 * from Pasien");
		$this->load->view('home', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */