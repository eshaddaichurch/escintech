<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function cek_login($username, $password)
    {
        $query = "select * from v_dcmember where username='" . $username . "' and password='" . $password . "'";
        return $this->db->query($query);
    }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */