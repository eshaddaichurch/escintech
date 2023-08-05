<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BendaharaPenerimaan_model extends CI_Model {

	public function get_sts($where)
	{
		$kd_skpd = '1.02.02.01';
		$kd_kegiatan = '1.02.02.01.00.01';
		$username = 'SIMRS';

		return $this->db->query("
			select NoSTS as no_terima, TglSTS as tgl_terima, NULL as no_tetap, NULL as tgl_tetap,
				NULL as sts_tetap, '".$kd_skpd."' as kd_skpd, '".$kd_kegiatan."' as kd_kegiatan, KdRek5 as kd_rek5, 
				NULL as kd_rek_lo, Nilai as nilai, Keterangan as keterangan, null as jenis, '".$username."' as username
				from v_sts ".$where." order by TglSTS 
				");
	}			

}

/* End of file BendaharaPenerimaan_model.php */
/* Location: ./application/models/BendaharaPenerimaan_model.php */