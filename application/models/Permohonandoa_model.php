<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonandoa_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carepermohonandoa');
    }

    public function getByID($idpermohonan)
    {
        $this->db->where('idpermohonan', $idpermohonan);
        return $this->db->get('v_carepermohonandoa');
    }


    public function simpan($data)
    {
        return $this->db->insert('carepermohonandoa', $data);
    }

    public function update($data, $idpermohonan)
    {
        $this->db->where("idpermohonan", $idpermohonan);
        return $this->db->update('carepermohonandoa', $data);
    }

    public function hapus($idpermohonan)
    {
        $this->db->where('idpermohonan', $idpermohonan);
        return $this->db->delete('carepermohonandoa');
    }
}

/* End of file Permohonandoa_model.php */
/* Location: ./application/models/Permohonandoa_model.php */