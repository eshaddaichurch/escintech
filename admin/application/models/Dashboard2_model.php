<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2_model extends CI_Model {

    function __construct() {
        
    }

    public function kehadiranbulanini()
    {
    	$jumlah = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen WHERE MONTH(tglabsen) = ".date('m')." and YEAR(tglabsen)='".date('Y')."'
    		")->row()->jumlah;
    	$jumlah = (empty($jumlah)) ? 0 : $jumlah;
    	return $jumlah;
    }

    public function kehadiranbulanlalu()
    {

    	if (date('m')=='1') {
    		$where = " WHERE MONTH(tglabsen) = 12 and YEAR(tglabsen)=".(date('Y'))-1;
    	}else{

    		$where = " WHERE MONTH(tglabsen) = ".(date('m') - 1)." and YEAR(tglabsen)='".date('Y')."'";
    	}
    	$jumlah = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen $where
    		")->row()->jumlah;
    	$jumlah = (empty($jumlah)) ? 0 : $jumlah;
    	return $jumlah;
    }

    public function kenaikanbulanlalu($kehadiranbulanlalu)
    {
    	if (date('m')=='2') {
    		$where = " WHERE MONTH(tglabsen) = 12 and YEAR(tglabsen)=".(date('Y'))-1;
    	}else{
    		$where = " WHERE MONTH(tglabsen) = ".(date('m')- 2)." and YEAR(tglabsen)='".date('Y')."'";
    	}
    	$jumlah2BulanLalu = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen $where
    		")->row()->jumlah;
    	$jumlah2BulanLalu = (empty($jumlah2BulanLalu)) ? 0 : $jumlah2BulanLalu;
    	
    	if ($jumlah2BulanLalu==0 || $kehadiranbulanlalu==0) {
    		$lebihkurang = 0;
    	}else{
	    	$persen = ($kehadiranbulanlalu/$jumlah2BulanLalu)*100;
	    	$lebihkurang = $persen - 100;
    	}
    	return $lebihkurang;
    }

    public function kenaikanbulanini($kehadiranbulanini, $kehadiranbulanlalu)
    {
    	if ($kehadiranbulanini==0 || $kehadiranbulanlalu==0) {
    		$lebihkurang = 0;
    	}else{
	    	$persen = ($kehadiranbulanini/$kehadiranbulanlalu)*100;
	    	$lebihkurang = $persen - 100;
    	}
    	return $lebihkurang;
    }

    public function getgrafikabsen($idabsenjenis)
    {
    	$sql = "SELECT tglabsen, idabsenjenis, idsesi, sum(jumlahhadir) as jumlahhadir,
					SUM(CASE WHEN idsesi='001' THEN jumlahhadir ELSE 0 END) AS jumlahibadah1, 
					SUM(CASE WHEN idsesi='002' THEN jumlahhadir ELSE 0 END) AS jumlahibadah2,
					SUM(CASE WHEN idsesi='003' THEN jumlahhadir ELSE 0 END) AS jumlahibadah3,
					SUM(CASE WHEN idsesi='004' THEN jumlahhadir ELSE 0 END) AS jumlahibadah4	
				FROM absen
				WHERE idabsenjenis='$idabsenjenis' AND tglabsen >= NOW() - INTERVAL 6 MONTH
				GROUP BY tglabsen, idabsenjenis, idsesi
				ORDER BY tglabsen";
		$rsAbsen = $this->db->query($sql);

		return $rsAbsen;
    }

    public function getescwomengrafik()
    {
        $sql = "SELECT tglabsen, idabsenjenis, idsesi,sum(jumlahhadir) as jumlahhadir
                FROM absen
                WHERE idabsenjenis='A06' AND tglabsen >= NOW() - INTERVAL 6 MONTH
                GROUP BY tglabsen, idabsenjenis,idsesi
                ORDER BY tglabsen";
        $rsAbsen = $this->db->query($sql);
        return $rsAbsen;
    }

}

/* End of file Dashboard2_model.php */
/* Location: ./application/models/Dashboard2_model.php */