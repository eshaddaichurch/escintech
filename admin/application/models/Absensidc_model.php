<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensidc_model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('v_dcabsen');
    }

    public function get_by_id($idabsen)
    {
        $this->db->where('idabsen', $idabsen);
        return $this->db->get('v_dcabsen');
    }

    public function getListAbsensi($tglawal, $tglakhir)
    {
        $rsTemp = $this->db->query("
            select * from v_dcabsen WHERE CONVERT(tglabsen, DATE) BETWEEN  '$tglawal' AND '$tglakhir'
        ");
        return $rsTemp;
    }
}
