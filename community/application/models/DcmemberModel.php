<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DcmemberModel extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('v_dcmember');
    }

    public function get_by_id($iddcmember)
    {
        $this->db->where('iddcmember', $iddcmember);
        return $this->db->get('v_dcmember');
    }

    public function hapus($iddcmember)
    {
        $this->db->where('iddcmember', $iddcmember);
        return $this->db->delete('dcmember');
    }

    public function simpan($data)
    {
        return $this->db->insert('dcmember', $data);
    }

    public function update($data, $iddcmember)
    {
        $this->db->where('iddcmember', $iddcmember);
        return $this->db->update('dcmember', $data);
    }
}
