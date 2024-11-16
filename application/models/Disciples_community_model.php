<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciples_community_model extends CI_Model
{

    public function simpanpermohonanbergabung($data)
    {
        return $this->db->insert('dcmember_permohonan', $data);
    }
}
