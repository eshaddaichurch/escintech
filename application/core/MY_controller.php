<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	public function isLogin()
    {
        if (empty($this->session->userdata('idjemaat'))) {
            redirect(site_url());
        }
    }

}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_controller.php */