<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciples_community_model extends CI_Model
{

    public function simpanpermohonanbergabung($data)
    {
        return $this->db->insert('dcmember_permohonan', $data);
    }

    public function getDC($iddc)
    {
        $this->db->where('iddc',$iddc);
        return $this->db->get('v_disciplescommunity');
    }
}
