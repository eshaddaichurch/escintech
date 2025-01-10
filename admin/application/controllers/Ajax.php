<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	public function getNamaKitab()
	{
		$this->db->select('namakitab');
		$this->db->order_by('idkitab');
		$this->db->group_by('namakitab');
		$rsKitab = $this->db->get('kitab');
		echo json_encode($rsKitab->result());
	}


	public function autocomplateJemaat()
	{
		$cari = $this->input->post('cari');
		$rsJemaat = $this->db->query("SELECT * FROM v_jemaat 
                                where (idjemaat like '%" . $cari . "%' and idjemaat IS NOT NULL) 
                                or (namalengkap like '%" . $cari . "%' and namalengkap IS NOT NULL) ORDER BY namalengkap
                                ");


		$result = array();
		if ($rsJemaat->num_rows() > 0) {
			foreach ($rsJemaat->result() as $row) {
				array_push($result, array(
					'idjemaat' => $row->idjemaat,
					'namalengkap' => $row->namalengkap,
					'noaj' => $row->noaj,
					'nik' => $row->nik,
					'tempatlahir' => $row->tempatlahir,
					'tanggallahir' => $row->tanggallahir,
					'jeniskelamin' => $row->jeniskelamin,
					'email' => $row->email,
					'nohp' => $row->nohp,
				));
			}
		}
		echo json_encode($result);
	}

	public function getjadwalevent()
	{
		$idjadwalevent = $this->input->get('idjadwalevent');

		$jadwalEvent = $this->db->query("
			select * from v_jadwalevent where idjadwalevent = '$idjadwalevent'
		")->row();

		$detailRuangan = $this->db->query("
			select * from v_jadwaleventdetailruangan where idjadwalevent = '$idjadwalevent'
		")->result();

		$detailInventaris = $this->db->query("
			select * from v_jadwaleventdetailinventaris where idjadwalevent = '$idjadwalevent'
		")->result();

		$detailParkiran = $this->db->query("
			select * from v_jadwaleventdetailparkiran where idjadwalevent = '$idjadwalevent'
		")->result();

		$detailPelayanan = $this->db->query("
			select * from v_jadwaleventdetailpelayanan where idjadwalevent = '$idjadwalevent'
		")->result();

		echo json_encode(array('jadwalEvent' => $jadwalEvent, 'detailRuangan' => $detailRuangan, 'detailInventaris' => $detailInventaris, 'detailParkiran' => $detailParkiran, 'detailPelayanan' => $detailPelayanan));
	}
}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */