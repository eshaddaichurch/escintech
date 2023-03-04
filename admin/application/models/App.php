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

	public function getJemaatSimpatisan($idjemaat='')
	{
		if ($idjemaat!="") {
			$this->db->where("idjemaat", $idjemaat);
		}
		$this->db->where("statusjemaat", 'Simpatisan');
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

}

/* End of file App.php */
/* Location: ./application/core/App.php */