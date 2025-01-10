<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {

	public function getJemaat($idjemaat='')
	{
		if ($idjemaat!="") {
			$this->db->where("idjemaat", $idjemaat);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

	public function getPengkhotbah($idpengkhotbah='')
	{
		if ($idpengkhotbah!="") {
			$this->db->where("idpengkhotbah", $idpengkhotbah);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_pengkhotbah");
	}

	public function getJemaatSimpatisan($idjemaat='')
	{
		if ($idjemaat!="") {
			$this->db->where("idjemaat", $idjemaat);
		}
		$this->db->where("statusjemaat", 'Simpatisan');
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

	public function APPBASEURL()
	{
		return str_replace('/admin', '', site_url());
	}

}

/* End of file App.php */
/* Location: ./application/core/App.php */