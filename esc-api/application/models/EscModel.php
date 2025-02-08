<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EscModel extends CI_Model {

	
	public function jemaat_get($idJemaat)
	{
		$this->db->where('idjemaat', $idJemaat);
		return $this->db->get('jemaat');
	}
}

/* End of file EscModel.php */
/* Location: ./application/models/EscModel.php */