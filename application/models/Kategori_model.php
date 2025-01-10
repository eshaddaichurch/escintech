<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function get_kategori_by_slug($slug)
	{
		$this->db->where('slug', $slug);
		return $this->db->get('pageskategori');
	}

	public function get_pages($idpageskategori)
	{
		$this->db->where('idpageskategori', $idpageskategori);
		return $this->db->get('v_pages');
	}

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */