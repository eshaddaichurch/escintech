<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konseling_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carekonseling');
    }

    public function getByID($idcarekonseling)
    {
        $this->db->where('idcarekonseling', $idcarekonseling);
        return $this->db->get('v_carekonseling');
    }


    public function simpan($data)
    {
        return $this->db->insert('carekonseling', $data);
    }

    public function update($data, $idcarekonseling)
    {
        $this->db->where("idcarekonseling", $idcarekonseling);
        return $this->db->update('carekonseling', $data);
    }

    public function hapus($idcarekonseling)
    {
        $this->db->where('idcarekonseling', $idcarekonseling);
        return $this->db->delete('carekonseling');
    }
}

/* End of file Konseling_model.php */
/* Location: ./application/models/Konseling_model.php */