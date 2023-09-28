<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getAllKitab()
	{
		$this->db->order_by('idkitab');
		$rsKitab = $this->db->get('kitab');
		echo json_encode($rsKitab->result());
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */