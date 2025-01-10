<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardcare_model extends CI_Model
{

    function __construct() {}

    public function getJemaatBaru()
    {
        return $this->db->query("SELECT count(*) as jumlah FROM jemaat WHERE statusjemaat='Jemaat' AND YEAR(tanggalinsert) = '" . date('Y-m-d') . "' ")->row()->jumlah;
    }

    public function getTotalJemaat()
    {
        return $this->db->query("SELECT count(*) as jumlah FROM jemaat WHERE statusjemaat='Jemaat'")->row()->jumlah;
    }

    public function getTotalSimpatisan()
    {
        return $this->db->query("SELECT count(*) as jumlah FROM jemaat WHERE statusjemaat='Simpatisan'")->row()->jumlah;
    }

    public function getTotalUmum()
    {
        return $this->db->query("SELECT count(*) as jumlah FROM jemaat WHERE statusjemaat='Umum'")->row()->jumlah;
    }

    public function getTotalBaptis()
    {
        return $this->db->query("select count(*) as jumlah from aktabaptisan")->row()->jumlah;
    }

    public function getgrafikjemaatbaru()
    {
        $query = "
            SELECT SUM( CASE WHEN (MONTH(tanggalinsert)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN MONTH(tanggalinsert)=2  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN MONTH(tanggalinsert)=3  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN MONTH(tanggalinsert)=4  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN MONTH(tanggalinsert)=5  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN MONTH(tanggalinsert)=6  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN MONTH(tanggalinsert)=7  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN MONTH(tanggalinsert)=8  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN MONTH(tanggalinsert)=9  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN MONTH(tanggalinsert)=10  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN MONTH(tanggalinsert)=11  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN MONTH(tanggalinsert)=12  THEN 1 ELSE 0 END) AS Des
                FROM jemaat
                WHERE statusjemaat='Jemaat' AND tanggalinsert IS NOT NULL
                    AND YEAR(tanggalinsert) = '2023'
        ";
        return $this->db->query($query);
    }

    public function getgrafikmarriage()
    {
        $query = "
            SELECT SUM( CASE WHEN (MONTH(tglpernikahan)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN MONTH(tglpernikahan)=2  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN MONTH(tglpernikahan)=3  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN MONTH(tglpernikahan)=4  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN MONTH(tglpernikahan)=5  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN MONTH(tglpernikahan)=6  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN MONTH(tglpernikahan)=7  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN MONTH(tglpernikahan)=8  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN MONTH(tglpernikahan)=9  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN MONTH(tglpernikahan)=10  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN MONTH(tglpernikahan)=11  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN MONTH(tglpernikahan)=12  THEN 1 ELSE 0 END) AS Des
                FROM carepernikahan
                WHERE carepernikahan.status = 'Disetujui' AND tglpernikahan IS NOT NULL
                    AND YEAR(tglpernikahan) = '" . date('Y') . "'
        ";
        return $this->db->query($query);
    }


    public function getgrafikbaptis()
    {
        $query = "
            SELECT SUM( CASE WHEN (MONTH(tglakta)=1)  THEN 1 ELSE 0 END) AS Jan,
                SUM( CASE WHEN MONTH(tglakta)=2  THEN 1 ELSE 0 END) AS Feb,
                SUM( CASE WHEN MONTH(tglakta)=3  THEN 1 ELSE 0 END) AS Mar,
                SUM( CASE WHEN MONTH(tglakta)=4  THEN 1 ELSE 0 END) AS Apr,
                SUM( CASE WHEN MONTH(tglakta)=5  THEN 1 ELSE 0 END) AS Mei,
                SUM( CASE WHEN MONTH(tglakta)=6  THEN 1 ELSE 0 END) AS Jun,
                SUM( CASE WHEN MONTH(tglakta)=7  THEN 1 ELSE 0 END) AS Jul,
                SUM( CASE WHEN MONTH(tglakta)=8  THEN 1 ELSE 0 END) AS Ags,
                SUM( CASE WHEN MONTH(tglakta)=9  THEN 1 ELSE 0 END) AS Sep,
                SUM( CASE WHEN MONTH(tglakta)=10  THEN 1 ELSE 0 END) AS Okt,
                SUM( CASE WHEN MONTH(tglakta)=11  THEN 1 ELSE 0 END) AS Nov,
                SUM( CASE WHEN MONTH(tglakta)=12  THEN 1 ELSE 0 END) AS Des
                FROM aktabaptisan
                WHERE tglakta IS NOT NULL AND YEAR(tglakta) = '" . date('Y') . "'
        ";
        return $this->db->query($query);
    }
}

/* End of file Dashboardcare_model.php */
/* Location: ./application/models/Dashboardcare_model.php */