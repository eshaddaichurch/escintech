<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Model
{

    public function insert_notifikasi($data)
    {
        $this->db->insert('notifikasi', $data);
        return true;
    }

    public function insert_riwayat($data)
    {
        $this->db->insert('riwayattask', $data);
        return true;
    }

}

/* End of file App.php */
/* Location: ./application/models/App.php */
