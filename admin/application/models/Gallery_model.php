<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function get_by_id($idgallery)
    {
        $this->db->where('idgallery', $idgallery);
        return $this->db->get('gallery');
    }

    public function simpan($data)
    {
        return $this->db->insert('gallery', $data);
    }

    public function update($data, $idgallery)
    {
        $this->db->where('idgallery', $idgallery);
        return $this->db->update('gallery', $data);
    }

    public function hapus($idgallery)
    {
        $this->db->where('idgallery', $idgallery);
        return $this->db->delete('gallery');
    }

}

/* End of file Gallery_model.php */
/* Location: ./application/models/Gallery_model.php */