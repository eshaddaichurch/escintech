<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciplescommunity_model extends CI_Model
{

    public function getDc($iddc)
    {
        $rsTemp = $this->db->query("
                select * from v_disciplescommunity where iddc='$iddc'
            ");
        return $rsTemp;
    }


    public function getDcMember($iddc)
    {
        $rsTemp = $this->db->query("
                select * from v_dcmember where iddc='$iddc'
            ");
        return $rsTemp;
    }
}
