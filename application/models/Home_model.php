<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

	public function get_infogereja()
	{
		return $this->db->query("select * from infogereja")->row();
	}

	public function get_menu($levels="")
	{
		if (!empty($levels)) {
			$this->db->where('levels', $levels);
		}
		$this->db->order_by('levels', 'asc');
		$this->db->order_by('nomorurut', 'asc');
		return $this->db->get('v_frontmenus');
	}

	public function get_submenu($parentidmenu)
	{
		if (!empty($parentidmenu)) {
			$this->db->where('parentidmenu', $parentidmenu);
		}
		$this->db->order_by('nomorurut');
		return $this->db->get('v_frontmenus');
	}

	public function isActiveSubMenu($parentidmenu, $idmenu)
	{		
		$this->db->where('parentidmenu', $parentidmenu);
		$this->db->where('idmenu', $idmenu);
		$rsCekAktive =  $this->db->get('v_frontmenus');
		if ($rsCekAktive->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function get_hagah_hari_ini()
	{
		$this->db->where('tglhagah', date('Y-m-d'));
		return $this->db->get('v_hagah_detail');
	}

}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */