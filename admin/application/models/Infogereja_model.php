<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infogereja_model extends CI_Model {

    public function get_infogereja()
    {
        return $this->db->get('infogereja');
    }

    public function update($data)
    {
        return $this->db->update('infogereja', $data);
    }

}

/* End of file Infogereja_model.php */
/* Location: ./application/models/Infogereja_model.php */