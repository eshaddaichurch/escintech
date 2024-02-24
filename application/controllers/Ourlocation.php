<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ourlocation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Ourlocation_model');
	}

	public function index($idmenu)
	{
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();	
		$this->load->view('ourlocation/index', $data);
	}

	public function detail($namacabang_slug="", $idmenu="")
	{
		$rowCabang = $this->db->query("select * from cabanggereja where namacabang_slug='$namacabang_slug'");
		if ($rowCabang->num_rows()==0) {
			$pesan = '<script>swal("Informasi", "Maaf, nama cabang gereja tidak ditemukan!", "info")</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('ourlocation/index/'.$idmenu); 
            exit();
				
		}
		$idmenu = $this->encrypt->decode($idmenu);
		$rowCabang = $rowCabang->row();
		$idcabang = $rowCabang->idcabang;

		$rsGallery = $this->db->query("select * from cabanggereja_gallery where idcabang='$idcabang'");

		// print_r($rsGallery->result());
		// exit();
		$data['idcabang'] = $idcabang;
		$data['rsGallery'] = $rsGallery;
		$data['rowCabang'] = $rowCabang;
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();	
		$this->load->view('ourlocation/detail', $data);
	}

	public function getcabang()
	{
		$rsCabang = $this->Ourlocation_model->getcabang();
		echo json_encode($rsCabang->result());
		
	}

}

/* End of file Ourlocation.php */
/* Location: ./application/controllers/Ourlocation.php */