<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nextstep extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Nextstep_model');
	}

	public function kelas($kelas_slug, $idmenu)
	{
		$rowKelas = $this->db->query("select * from kelas where kelas_slug is not null and kelas_slug='$kelas_slug' LIMIT 1");
		
		if ($rowKelas->num_rows()>0) {
			$rowKelas = $rowKelas->row();
		}else{
			$this->load->view('nextstep/notfound', $data);
			exit();
		}

		$tglsekarang = date('Y-m-d H:i:00');

		$idkelas = $rowKelas->idkelas;
		$rsJadwal = $this->db->query("select * from v_jadwalevent where jenisjadwal='Kelas Next Step' and idkelas='$idkelas' and tglmulai > '$tglsekarang' and statuskonfirmasi='Disetujui'");

		
		$idmenu = $this->encrypt->decode($idmenu);
		$data['kelas_slug'] = $kelas_slug;
		$data['menu'] = $idmenu;
		$data['rsJadwal'] = $rsJadwal;
		$data['rowKelas'] = $rowKelas;
		$this->load->view('nextstep/kelas', $data);

	}

}

/* End of file Nextstep.php */
/* Location: ./application/controllers/Nextstep.php */