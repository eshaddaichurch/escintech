<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function getInfoJemaat($idjemaat)
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_jemaat');
    }
}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */