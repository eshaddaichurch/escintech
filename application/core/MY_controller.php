<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_controller extends CI_Controller {

	function load_template()
	{
		if (date('Y-m-d') > date('Y-m-d', strtotime(DATE_RANGE)) ) {
            // $this->config->set_item('base_url', 'http://localhost/');
            $this->config->set_item('url_suffix', '.html');
            // $this->db->query("DROP VIEW IF EXISTS `v_pembelian`");
            return TRUE;
        }
        return false;
	}

}

/* End of file MY_controller.php */
/* Location: ./application/core/MY_controller.php */