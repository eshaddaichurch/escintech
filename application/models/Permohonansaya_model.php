<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonansaya_model extends CI_Model
{

    public function getPermohonan()
    {
        $idjemaat = $this->session->userdata('idjemaat');
        $this->db->where('idjemaat', $idjemaat);
        $this->db->order_by('tglpermohonan', 'desc');
        return $this->db->get('v_permohonansaya');
    }
}
