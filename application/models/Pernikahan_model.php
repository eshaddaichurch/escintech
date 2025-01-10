<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernikahan_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carepernikahan');
    }

    public function getByID($idpernikahan)
    {
        $this->db->where('idpernikahan', $idpernikahan);
        return $this->db->get('v_carepernikahan');
    }


    public function simpan($data)
    {
        return $this->db->insert('carepernikahan', $data);
    }

    public function update($data, $idpernikahan)
    {
        $this->db->where("idpernikahan", $idpernikahan);
        return $this->db->update('carepernikahan', $data);
    }

    public function hapus($idpernikahan)
    {
        $this->db->where('idpernikahan', $idpernikahan);
        return $this->db->delete('carepernikahan');
    }
}

/* End of file Pernikahan_model.php */
/* Location: ./application/models/Pernikahan_model.php */