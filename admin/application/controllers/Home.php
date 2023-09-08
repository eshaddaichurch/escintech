 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->islogin();
        $this->session->set_userdata( 'IDMENUSELECTED', 'HOME' );
	}

	public function index()
	{
		$data["menu"] = "Home";	
		$this->load->view("home", $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */