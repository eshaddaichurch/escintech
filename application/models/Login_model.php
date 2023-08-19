<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function cekLoginAjax($email, $password)
    {
        $query = "select * from jemaat where email='".$email."' and password='".$password."'";
        return $this->db->query($query);
    }

    public function simpanregistrasi($data)
    {
    	return $this->db->insert('jemaat', $data);
    }

    public function emailsudahada($email)
    {
    	$this->db->where('email', $email);
    	$rsCekEmail = $this->db->get('jemaat');
    	if ($rsCekEmail->num_rows()>0) {
    		return true;
    	}else{
    		return false;
    	}
    }

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */