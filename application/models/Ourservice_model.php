<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ourservice_model extends CI_Model
{
    public function get_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get('ourservice');
    }

    public function get_last_row($idourservice)
    {
        $this->db->where('idourservice', $idourservice);
        $this->db->order_by('tglourservice', 'desc');
        $this->db->limit('1');
        return $this->db->get('ourservicedetail');
    }
}

/* End of file Ourservice_model.php */
/* Location: ./application/models/Ourservice_model.php */