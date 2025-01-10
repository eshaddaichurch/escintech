<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carekematian');
    }

    public function getByID($idkematian)
    {
        $this->db->where('idkematian', $idkematian);
        return $this->db->get('v_carekematian');
    }


    public function simpan($data)
    {
        return $this->db->insert('carekematian', $data);
    }

    public function update($data, $idkematian)
    {
        $this->db->where("idkematian", $idkematian);
        return $this->db->update('carekematian', $data);
    }

    public function hapus($idkematian)
    {
        $this->db->where('idkematian', $idkematian);
        return $this->db->delete('carekematian');
    }
}

/* End of file Kematian_model.php */
/* Location: ./application/models/Kematian_model.php */