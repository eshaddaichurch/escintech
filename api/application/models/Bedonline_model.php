<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bedonline_model extends CI_Model {

	public function loadTable($start, $limit)
	{
		$strSQL = "
					SELECT * FROM ( 
                                        SELECT *, ROW_NUMBER() OVER (ORDER BY NamaRuangan) as row  
                                        FROM V_AmbilStatusBed_New_GroupRuangan 
                                        WHERE DeskKelas <> 'Bedah'
                                    ) a WHERE a.row > $start and a.row <= $limit
	
		";
		return $this->db->query($strSQL);
	}

	public function loadPanel()
	{
		$strSQL = "
					SELECT  
						DeskKelas,
						Kapasitas,
						Tersedia,
						TidakTersedia
					FROM V_AmbilStatusBed_New_GroupKelas
		";
		return $this->db->query($strSQL);
	}	

}

/* End of file Bedonline_model.php */
/* Location: ./application/models/Bedonline_model.php */