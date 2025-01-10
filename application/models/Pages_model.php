<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

	public function get_pages_by_slug($slug)
	{
		$this->db->where('slug', $slug);
		return $this->db->get('v_pages');
	}

}

/* End of file Pages_model.php */
/* Location: ./application/models/Pages_model.php */