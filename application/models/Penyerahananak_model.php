<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahananak_model extends CI_Model
{

    public function getAll()
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_carepenyerahananak');
    }

    public function getByID($idpenyerahananak)
    {
        $this->db->where('idpenyerahananak', $idpenyerahananak);
        return $this->db->get('v_carepenyerahananak');
    }


    public function simpan($data)
    {
        return $this->db->insert('carepenyerahananak', $data);
    }

    public function update($data, $idpenyerahananak)
    {
        $this->db->where("idpenyerahananak", $idpenyerahananak);
        return $this->db->update('carepenyerahananak', $data);
    }

    public function hapus($idpenyerahananak)
    {
        $this->db->where('idpenyerahananak', $idpenyerahananak);
        return $this->db->delete('carepenyerahananak');
    }
}

/* End of file Penyerahananak_model.php */
/* Location: ./application/models/Penyerahananak_model.php */