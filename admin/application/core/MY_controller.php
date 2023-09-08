<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function islogin()
    {
        $idjemaat = $this->session->userdata('idjemaat');
        if (empty($idjemaat)) {
            $pesan = '<div class="alert alert-danger">Sesi telah berakhir. Silahkan login kembali!</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('login'); 
            exit();
        }
    }  

	public function cekOtorisasi()
	{
		$idmenu = $this->session->userdata('IDMENUSELECTED');
		$idjemaat = $this->session->userdata('idjemaat');
		$idotorisasi = $this->session->userdata('idotorisasi');
		$rsCekOtorisasi = $this->db->query("select * from otorisasimenus where idotorisasi='$idotorisasi' and idmenu='$idmenu'");
		if ($rsCekOtorisasi->num_rows()==0) {
			$namamenu = $this->db->query("select namamenu from backmenus where idmenu='$idmenu'")->row()->namamenu;
			$pesan = '<div class="alert alert-danger">Pembatasan hak akses untuk membuka halaman '.$namamenu.'!</div>';
            $this->session->set_flashdata('pesan', $pesan);
			redirect(site_url('home'));
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */