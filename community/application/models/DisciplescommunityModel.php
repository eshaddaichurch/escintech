<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DisciplescommunityModel extends CI_Model
{

    public function getDcInfo()
    {
        $iddc = $this->session->userdata('iddc');
        $this->db->where('iddc', $iddc);
        return $this->db->get('v_disciplescommunity')->row();
    }
}
