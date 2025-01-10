<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function loadsessiongereja()
	{
		if (empty($this->session->userdata('namagereja'))) {
			$rowinfogereja = $this->db->query("select * from infogereja")->row();
			

			$data = array(
                    'namagereja' => $rowinfogereja->namagereja,
                    'alamatgereja' => $rowinfogereja->alamatgereja,
                    'emailgereja' => $rowinfogereja->emailgereja,
                    'notelpgereja' => $rowinfogereja->notelpgereja,
                    'urltwittergereja' => $rowinfogereja->urltwittergereja,
                    'urlfacebookgereja' => $rowinfogereja->urlfacebookgereja,
                    'urlinstagramgereja' => $rowinfogereja->urlinstagramgereja,
                    'urlskipegereja' => $rowinfogereja->urlskipegereja,
                    'urlgooglemaps' => $rowinfogereja->urlgooglemaps,
                    'gambarhomepage' => $rowinfogereja->gambarhomepage,
                    'judulhomepage' => $rowinfogereja->judulhomepage,
                    'subjudulhomepage' => $rowinfogereja->subjudulhomepage,
                    'urlbuttonhomepage' => $rowinfogereja->urlbuttonhomepage,
                    'opennewtabbuttonhomepage' => $rowinfogereja->opennewtabbuttonhomepage,
	                );
            $this->session->set_userdata( $data );  

		}
	}	

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */