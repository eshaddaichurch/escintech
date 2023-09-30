<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getNamaKitab()
	{
		$this->db->select('namakitab');
		$this->db->order_by('idkitab');
		$this->db->group_by('namakitab');
		$rsKitab = $this->db->get('kitab');
		echo json_encode($rsKitab->result());
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */