<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jemaat_model extends CI_Model
{

    public function getJemaat($idjemaat)
    {
        $rsTemp = $this->db->query("
                select * from v_jemaat where idjemaat='$idjemaat'
            ");
        return $rsTemp


    public function cariJemaat($cari)
    {
        $rsTemp = $this->db->query("
                select * from v_jemaat where namalengkap like '%$cari%'
            ");
        return $rsTemp;
    }

}