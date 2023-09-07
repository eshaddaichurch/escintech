<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {

	public function getJemaat($idjemaat='', $statusjemaat='')
	{
		if ($idjemaat!="") {
			$this->db->where("idjemaat", $idjemaat);
		}
		if (!empty($statusjemaat)) {
			$this->db->where('statusjemaat', $statusjemaat);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

	public function getPengkhotbah($idpengkhotbah='')
	{
		if ($idpengkhotbah!="") {
			$this->db->where("idpengkhotbah", $idpengkhotbah);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_pengkhotbah");
	}

	public function getDepartement($iddepartement="")
	{
		if (!empty($iddepartement)) {
			$this->db->where("iddepartement", $iddepartement);
		}
		$this->db->order_by('namadepartement', 'asc');
		return $this->db->get('v_departement');
	}

	public function getJemaatSimpatisan($idjemaat='')
	{
		if ($idjemaat!="") {
			$this->db->where("idjemaat", $idjemaat);
		}
		$this->db->where("statusjemaat", 'Simpatisan');
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

	public function APPBASEURL()
	{
		return str_replace('/admin', '', site_url());
	}


	public function uploadImage($file, $namaFile, $namaFileLama, $foldername)
	{
        $this->load->library('image_lib');

		if (!empty($file[$namaFile]['name'])) {
            $config['upload_path']          = 'uploads/'.$foldername.'/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';
            

            $this->load->library('upload', $config);           
            if ($this->upload->do_upload($namaFile)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
            }else{
                $foto = $namaFileLama;
            }          
        }else{          
            $foto = $namaFileLama;
        }

        return $foto;
	}

}

/* End of file App.php */
/* Location: ./application/core/App.php */