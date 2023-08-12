<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cekLoginAjax($email, $password)
    {
        $query = "select * from jemaat where email='".$email."' and password='".$password."'";
        return $this->db->query($query);
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */