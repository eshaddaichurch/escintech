<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontmenus_model extends CI_Model {

	public function get_menus_level($levels=0, $parentidmenu = "")
	{
		if ($parentidmenu!="") {
			$this->db->where('parentidmenu', $parentidmenu);
		}		
		if ($levels!=0) {
			$this->db->where('levels', $levels);			
		}
		
		$this->db->order_by('levels', 'asc');
		$this->db->order_by('nomorurut', 'asc');
		return $this->db->get('v_frontmenus');
	}

	public function get_by_id($idmenu)
	{
		$this->db->where('idmenu', $idmenu);
		return $this->db->get('frontmenus');
	}

	public function get_nomor_urut_berikut($parentidmenu="")
	{
		if (!empty($parentidmenu)) {
			$nomorurut = $this->db->query("SELECT MAX(nomorurut) as nomorurut FROM frontmenus where parentidmenu='$parentidmenu'")->row()->nomorurut;
		}else{
			$nomorurut = $this->db->query("SELECT MAX(nomorurut) as nomorurut FROM frontmenus where levels=1")->row()->nomorurut;
		}


		if ($nomorurut=="") {
			$nomorurutnext = 1;
		}else{
			$nomorurutnext = $nomorurut+1;
		}

		return $nomorurutnext;
	}

	public function hapus($idmenu)
	{
		$this->db->where('idmenu', $idmenu);
		return $this->db->delete('frontmenus');
	}

	public function simpan($data, $nomorurut)
	{
        $this->db->trans_begin();
		try {
			
			// if (!empty($data['parentidmenu'])) {
			// 	$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut>=$nomorurut and parentidmenu='".$data['parentidmenu']."'");
			// }else{
			// 	$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut>=$nomorurut");
			// }

			$this->db->insert('frontmenus', $data);

			if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
	        }else{
                $this->db->trans_commit();
                return true;
	        }

		} catch (Exception $e) {
			$this->db->trans_rollback();
            return false;
		}
	}

	public function update($data, $idmenu, $nomorurut)
	{
        $this->db->trans_begin();
		try {
			
			// if (!empty($data['parentidmenu'])) {
			// 	$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut>=$nomorurut and parentidmenu='".$data['parentidmenu']."'");
			// }else{
			// 	$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut>=$nomorurut");
			// }
			
			$this->db->where('idmenu', $idmenu);
			$this->db->update('frontmenus', $data);

			if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
	        }else{
                $this->db->trans_commit();
                return true;
	        }

		} catch (Exception $e) {
			$this->db->trans_rollback();
            return false;
		}
	}

	public function pindahkeatas($idmenu, $rowmenu)
	{
        $this->db->trans_begin();
		try {
			
			$nomorurutnext = $rowmenu->nomorurut-1;
			if (!empty($rowmenu->parentidmenu)) {
				$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut=".$nomorurutnext." and parentidmenu='".$rowmenu->parentidmenu."'");
			}else{
				$this->db->query("update frontmenus set nomorurut=nomorurut+1 where nomorurut=".$nomorurutnext." and levels=1");
			}

			$this->db->query("update frontmenus set nomorurut=$nomorurutnext where idmenu='$idmenu'");

			if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
	        }else{
                $this->db->trans_commit();
                return true;
	        }
		} catch (Exception $e) {
			$this->db->trans_rollback();
            return false;
		}
	}

	public function pindahkebawah($idmenu, $rowmenu)
	{
        $this->db->trans_begin();
		try {
			
			$nomorurutnext = $rowmenu->nomorurut+1;
			if (!empty($rowmenu->parentidmenu)) {
				$this->db->query("update frontmenus set nomorurut=nomorurut-1 where nomorurut=".$nomorurutnext." and parentidmenu='".$rowmenu->parentidmenu."'");
			}else{
				$this->db->query("update frontmenus set nomorurut=nomorurut-1 where nomorurut=".$nomorurutnext." and levels=1");
			}

			$this->db->query("update frontmenus set nomorurut=$nomorurutnext where idmenu='$idmenu'");

			if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
	        }else{
                $this->db->trans_commit();
                return true;
	        }
		} catch (Exception $e) {
			$this->db->trans_rollback();
            return false;
		}
	}

}

/* End of file Frontmenus_model.php */
/* Location: ./application/models/Frontmenus_model.php */