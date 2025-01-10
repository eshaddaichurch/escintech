<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardnextstep_model extends CI_Model
{

    public function getStatusMenunggu()
    {
        return $this->db->query("select * from v_pendaftarankelas where statuskonfirmasi='Menunggu' ");
    }

    public function getinfobox()
    {
        $rsData = $this->db->query("
                                    SELECT SUM(CASE WHEN idkelas='KL001' THEN 1 ELSE 0 END) AS MembershipClass,
                                                SUM(CASE WHEN idkelas='KL002' THEN 1 ELSE 0 END) AS FondationClass1,
                                                SUM(CASE WHEN idkelas='KL003' THEN 1 ELSE 0 END) AS FondationClass2,
                                                SUM(CASE WHEN idkelas='KL004' THEN 1 ELSE 0 END) AS FondationClass3,
                                                SUM(CASE WHEN idkelas='KL005' THEN 1 ELSE 0 END) AS Grade1,
                                                SUM(CASE WHEN idkelas='KL006' THEN 1 ELSE 0 END) AS Grade2,
                                                SUM(CASE WHEN idkelas='KL007' THEN 1 ELSE 0 END) AS Grade3,
                                                SUM(CASE WHEN idkelas='KL008' THEN 1 ELSE 0 END) AS FolunteerClass,
                                                SUM(CASE WHEN idkelas='KL101' THEN 1 ELSE 0 END) AS MarriageClass
                                                FROM registrasikelas WHERE statuslulus=1
                                    ");
        return $rsData;
    }


    public function getgrafikmembership()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL001' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }

    public function getgrafikfc1()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL002' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }

    public function getgrafikfc2()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL003' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }

    public function getgrafikfc3()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL004' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }


    public function getgrafikgrade1()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL005' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }

    public function getgrafikgrade2()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL006' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }


    public function getgrafikgrade3()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL007' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }


    public function getgrafikfolunteer()
    {
        $query = "
            SELECT SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=2)  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=3)  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=4)  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=5)  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=6)  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=7)  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=8)  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=9)  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=10)  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=11)  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN (idkelas='KL008' AND MONTH(tglsertifikat)=12)  THEN 1 ELSE 0 END) AS Des
                FROM registrasikelas 
                WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
                    AND YEAR(tglsertifikat) = YEAR(NOW())
        ";
        return $this->db->query($query);
    }

    public function getgrafikfc2_old()
    {
        $query = "
    SELECT tglsertifikat, COUNT(*) AS jumlah
	FROM registrasikelas 
	WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
		AND YEAR(tglsertifikat) = '" . date('Y') . "' AND idkelas='KL003'
	GROUP BY tglsertifikat
        ";
        return $this->db->query($query);
    }

    public function getgrafikfc3_old()
    {
        $query = "
            SELECT tglsertifikat, COUNT(*) AS jumlah
	FROM registrasikelas 
	WHERE statuslulus=1  AND tglsertifikat IS NOT NULL
		AND YEAR(tglsertifikat) = '" . date('Y') . "' AND idkelas='KL004'
	GROUP BY tglsertifikat
        ";
        return $this->db->query($query);
    }
}

/* End of file Dashboardnextstep_model.php */
/* Location: ./application/models/Dashboardnextstep_model.php */