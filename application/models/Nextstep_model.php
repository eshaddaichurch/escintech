<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nextstep_model extends CI_Model {

	public function daftar($data)
	{
		return $this->db->insert('jadwaleventregistrasi', $data);
	}

	public function sudahPernahDaftar($idjadwalevent, $idjemaat)
	{
		$this->db->where('idjadwalevent', $idjadwalevent);
		$this->db->where('idjemaat', $idjemaat);
		$rsDaftar = $this->db->get('jadwaleventregistrasi');
		if ($rsDaftar->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file Nextstep_model.php */
/* Location: ./application/models/Nextstep_model.php */