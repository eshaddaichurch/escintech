<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ourlocation_model extends CI_Model {

	public function getcabang()
	{
		$this->db->where('statusaktif', 'Aktif');
		return $this->db->get('cabanggereja');
	}

}

/* End of file Ourlocation_model.php */
/* Location: ./application/models/Ourlocation_model.php */