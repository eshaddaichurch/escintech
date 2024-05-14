<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard2_model extends CI_Model
{

	function __construct()
	{
	}

	public function kehadiranbulanini()
	{
		$jumlah = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen WHERE MONTH(tglabsen) = " . date('m') . " and YEAR(tglabsen)='" . date('Y') . "'
    		")->row()->jumlah;
		$jumlah = (empty($jumlah)) ? 0 : $jumlah;
		return $jumlah;
	}

	public function kehadiranbulanlalu()
	{

		if (date('m') == '1') {
			$where = " WHERE MONTH(tglabsen) = 12 and YEAR(tglabsen)=" . (date('Y')) - 1;
		} else {

			$where = " WHERE MONTH(tglabsen) = " . (date('m') - 1) . " and YEAR(tglabsen)='" . date('Y') . "'";
		}
		$jumlah = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen $where
    		")->row()->jumlah;
		$jumlah = (empty($jumlah)) ? 0 : $jumlah;
		return $jumlah;
	}

	public function kenaikanbulanlalu($kehadiranbulanlalu)
	{
		if (date('m') == '2') {
			$where = " WHERE MONTH(tglabsen) = 12 and YEAR(tglabsen)=" . (date('Y')) - 1;
		} else {
			$where = " WHERE MONTH(tglabsen) = " . (date('m') - 2) . " and YEAR(tglabsen)='" . date('Y') . "'";
		}
		$jumlah2BulanLalu = $this->db->query("
    			SELECT SUM(jumlahhadir) as jumlah FROM absen $where
    		")->row()->jumlah;
		$jumlah2BulanLalu = (empty($jumlah2BulanLalu)) ? 0 : $jumlah2BulanLalu;

		if ($jumlah2BulanLalu == 0 || $kehadiranbulanlalu == 0) {
			$lebihkurang = 0;
		} else {
			$persen = ($kehadiranbulanlalu / $jumlah2BulanLalu) * 100;
			$lebihkurang = $persen - 100;
		}
		return $lebihkurang;
	}

	public function kenaikanbulanini($kehadiranbulanini, $kehadiranbulanlalu)
	{
		if ($kehadiranbulanini == 0 || $kehadiranbulanlalu == 0) {
			$lebihkurang = 0;
		} else {
			$persen = ($kehadiranbulanini / $kehadiranbulanlalu) * 100;
			$lebihkurang = $persen - 100;
		}
		return $lebihkurang;
	}

	public function getgrafikabsen($idabsenjenis, $tglawal, $tglakhir)
	{
		$sql = "SELECT tglabsen, idabsenjenis, sum(jumlahhadir) as jumlahhadir,
					SUM(CASE WHEN idsesi='001' THEN jumlahhadir ELSE 0 END) AS jumlahibadah1, 
					SUM(CASE WHEN idsesi='002' THEN jumlahhadir ELSE 0 END) AS jumlahibadah2,
					SUM(CASE WHEN idsesi='003' THEN jumlahhadir ELSE 0 END) AS jumlahibadah3,
					SUM(CASE WHEN idsesi='004' THEN jumlahhadir ELSE 0 END) AS jumlahibadah4,	
					SUM(CASE WHEN idsesi='005' THEN jumlahhadir ELSE 0 END) AS jumlahibadah5	
				FROM absen
				WHERE idabsenjenis='$idabsenjenis' AND convert(tglabsen, date) between '" . date('Y-m-d', strtotime($tglawal)) . "' and '" . date('Y-m-d', strtotime($tglakhir)) . "'
				GROUP BY tglabsen, idabsenjenis
				ORDER BY tglabsen";
		$rsAbsen = $this->db->query($sql);

		return $rsAbsen;
	}

	public function getgrafikabsenperbulan($idabsenjenis)
	{
		// $tahun = '2023';
		$tahun = date('Y'); //tahun berjalan

		$sql = "SELECT idabsenjenis, SUM(jumlahhadir) AS jumlahhadir,
					SUM(CASE WHEN MONTH(tglabsen)=1  THEN jumlahhadir ELSE 0 END) AS jumlah01,	
					SUM(CASE WHEN MONTH(tglabsen)=2  THEN jumlahhadir ELSE 0 END) AS jumlah02,	
					SUM(CASE WHEN MONTH(tglabsen)=3  THEN jumlahhadir ELSE 0 END) AS jumlah03,	
					SUM(CASE WHEN MONTH(tglabsen)=4  THEN jumlahhadir ELSE 0 END) AS jumlah04,	
					SUM(CASE WHEN MONTH(tglabsen)=5  THEN jumlahhadir ELSE 0 END) AS jumlah05,	
					SUM(CASE WHEN MONTH(tglabsen)=6  THEN jumlahhadir ELSE 0 END) AS jumlah06,	
					SUM(CASE WHEN MONTH(tglabsen)=7  THEN jumlahhadir ELSE 0 END) AS jumlah07,	
					SUM(CASE WHEN MONTH(tglabsen)=8  THEN jumlahhadir ELSE 0 END) AS jumlah08,	
					SUM(CASE WHEN MONTH(tglabsen)=9  THEN jumlahhadir ELSE 0 END) AS jumlah09,	
					SUM(CASE WHEN MONTH(tglabsen)=10  THEN jumlahhadir ELSE 0 END) AS jumlah10,	
					SUM(CASE WHEN MONTH(tglabsen)=11  THEN jumlahhadir ELSE 0 END) AS jumlah11,	
					SUM(CASE WHEN MONTH(tglabsen)=12  THEN jumlahhadir ELSE 0 END) AS jumlah12		
				FROM absen
				WHERE idabsenjenis='$idabsenjenis' AND year(tglabsen)='$tahun'
				GROUP BY idabsenjenis
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