<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayattask_model extends CI_Model
{

    public function get_all($limit, $start)
    {
        $query = "select * from riwayattask order by tglriwayat desc limit " . $start . "," . $limit . " ";
        return $this->db->query($query);
    }

}

/* End of file Riwayattask_model.php */
/* Location: ./application/models/Riwayattask_model.php */
