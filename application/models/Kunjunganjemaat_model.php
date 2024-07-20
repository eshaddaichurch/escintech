<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjunganjemaat_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carekunjunganjemaat');
    }

    public function getByID($idkunjunganjemaat)
    {
        $this->db->where('idkunjunganjemaat', $idkunjunganjemaat);
        return $this->db->get('v_carekunjunganjemaat');
    }


    public function simpan($data)
    {
        return $this->db->insert('carekunjunganjemaat', $data);
    }

    public function update($data, $idkunjunganjemaat)
    {
        $this->db->where("idkunjunganjemaat", $idkunjunganjemaat);
        return $this->db->update('carekunjunganjemaat', $data);
    }

    public function hapus($idkunjunganjemaat)
    {
        $this->db->where('idkunjunganjemaat', $idkunjunganjemaat);
        return $this->db->delete('carekunjunganjemaat');
    }
}

/* End of file Kunjunganjemaat_model.php */
/* Location: ./application/models/Kunjunganjemaat_model.php */