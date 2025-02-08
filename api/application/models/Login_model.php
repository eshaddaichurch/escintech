<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function ceklogin($email, $password)
	{
		$rsTemp = $this->db->query("
				select * from jemaat where email='$email' and password = '".md5($password)."'
			");
		return $rsTemp;
	}	

}