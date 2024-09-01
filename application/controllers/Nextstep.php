<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nextstep extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Nextstep_model');
	}

	public function kelas($kelas_slug, $idmenu = "")
	{
		$rowKelas = $this->db->query("select * from kelas where kelas_slug is not null and kelas_slug='$kelas_slug' LIMIT 1");

		if ($rowKelas->num_rows() > 0) {
			$rowKelas = $rowKelas->row();
		} else {
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
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('nextstep/kelas', $data);
	}

	public function daftar()
	{
		$idjadwalevent = $this->input->post('idjadwalevent');
		$idjemaat = $this->session->userdata('idjemaat');

		if (empty($idjemaat)) {
			echo json_encode(array('msg' => "Anda harus login terlebih dahulu untuk mendaftar di kelas ini."));
			exit();
		}

		if ($this->Nextstep_model->sudahPernahDaftar($idjadwalevent, $idjemaat)) {
			echo json_encode(array('msg' => "Anda sudah pernah mendaftar di jadwal kelas ini."));
			exit();
		}

		$idregistrasi = $this->db->query("SELECT create_idregistrasievent('" . date('Y-m-d') . "') as idregistrasi")->row()->idregistrasi;
		$data = array(
			'idregistrasi' => $idregistrasi,
			'idjadwalevent' => $idjadwalevent,
			'tglregistrasi' => date('Y-m-d H:i:s'),
			'idjemaat' => $idjemaat,
			'statuskonfirmasi' => 'Menunggu',
		);
		// echo json_encode($data);
		// exit();

		$simpan = $this->Nextstep_model->daftar($data);
		if ($simpan) {
			$idkelas = '';
			$kelas_slug = '';
			$rsNextStep = $this->db->query("SELECT jadwalevent.idkelas, kelas.namakelas, kelas.kelas_slug 
													FROM jadwalevent JOIN kelas ON kelas.idkelas=jadwalevent.idkelas 
													where idjadwalevent='$idjadwalevent'");
			if ($rsNextStep->num_rows() > 0) {
				$idkelas = $rsNextStep->row()->idkelas;
				$kelas_slug = $rsNextStep->row()->kelas_slug;
			}

			echo json_encode(array('success' => true, 'kelas_slug' => $kelas_slug, 'menu' => '-'));
		} else {
			echo json_encode(array('msg' => "Gagal registrasi kelas"));
		}
	}
}

/* End of file Nextstep.php */
/* Location: ./application/controllers/Nextstep.php */