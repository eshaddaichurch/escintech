<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baptisan_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carebaptisan');
    }

    public function getByID($idcarebaptisan)
    {
        $this->db->where('idcarebaptisan', $idcarebaptisan);
        return $this->db->get('v_carebaptisan');
    }


    public function simpan($data)
    {
        return $this->db->insert('carebaptisan', $data);
    }

    public function update($data, $idcarebaptisan)
    {
        $this->db->where("idcarebaptisan", $idcarebaptisan);
        return $this->db->update('carebaptisan', $data);
    }

    public function hapus($idcarebaptisan)
    {
        $this->db->where('idcarebaptisan', $idcarebaptisan);
        return $this->db->delete('carebaptisan');
    }
}

/* End of file Baptisan_model.php */
/* Location: ./application/models/Baptisan_model.php */