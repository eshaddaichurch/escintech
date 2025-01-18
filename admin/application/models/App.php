<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Model
{

	public function getJemaat($idjemaat = '', $statusjemaat = '')
	{
		if ($idjemaat != "") {
			$this->db->where("idjemaat", $idjemaat);
		}
		if (!empty($statusjemaat)) {
			$this->db->where('statusjemaat', $statusjemaat);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}

	public function getPengkhotbah($idpengkhotbah = '')
	{
		if ($idpengkhotbah != "") {
			$this->db->where("idpengkhotbah", $idpengkhotbah);
		}
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_pengkhotbah");
	}

	public function getDepartement($iddepartement = "")
	{
		if (!empty($iddepartement)) {
			$this->db->where("iddepartement", $iddepartement);
		}
		$this->db->order_by('namadepartement', 'asc');
		return $this->db->get('v_departement');
	}

	public function getJemaatSimpatisan($idjemaat = '')
	{
		if ($idjemaat != "") {
			$this->db->where("idjemaat", $idjemaat);
		}
		$this->db->where("statusjemaat", 'Simpatisan');
		$this->db->order_by('namalengkap', 'asc');
		return $this->db->get("v_jemaat");
	}


	public function getKelas($idkelas = '')
	{
		if ($idkelas != "") {
			$this->db->where("idkelas", $idkelas);
		}
		$this->db->where("statusaktif", 'Aktif');
		$this->db->order_by('idkelas', 'asc');
		return $this->db->get("kelas");
	}

	public function getJenisPengumuman($idjenispengumuman = "")
	{
		if (!empty($idjenispengumuman)) {
			$this->db->where('idjenispengumuman', $idjenispengumuman);
		}
		$this->db->where('statusaktif', 'Aktif');
		$this->db->order_by('idjenispengumuman', 'Asc');
		return $this->db->get('jenispengumuman');
	}

	public function APPBASEURL()
	{
		return str_replace('/admin', '', site_url());
	}

	public function uploadImage($file, $namaFile, $namaFileLama, $foldername)
	{
		$this->load->library('image_lib');

		if (!empty($file[$namaFile]['name'])) {
			$config['upload_path']          = 'uploads/' . $foldername . '/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['remove_space']         = TRUE;
			$config['max_size']            = '2000KB';


			$this->load->library('upload', $config);
			if ($this->upload->do_upload($namaFile)) {
				$foto = $this->upload->data('file_name');
				$size = $this->upload->data('file_size');
				$ext  = $this->upload->data('file_ext');
			} else {
				$foto = $namaFileLama;
			}
		} else {
			$foto = $namaFileLama;
		}

		return $foto;
	}

	public function sendEmailNextStep($email, $subject, $textemail)
	{
		$this->load->library('email');

		$smtp_host = 'mail.myesc.id';
		$smtp_port = '465';
		$smtp_user = 'nextstep@myesc.id';
		$smtp_pass = 'Elshaddaichurch1';
		$namapengirim = 'Next Step - Elshaddai Church';


		$config = array();
		$config['protocol'] = "smtp";
		$config['mailtype'] = 'html';
		$config['smtp_host'] = $smtp_host;
		$config['smtp_port'] = $smtp_port;
		$config['smtp_timeout'] = "5";
		$config['smtp_user'] = $smtp_user;
		$config['smtp_pass'] = $smtp_pass;
		$config['smtp_crypto'] = 'ssl';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);

		$this->email->from($smtp_user, $namapengirim);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($textemail);

		return $this->email->send();
	}

	public function getCabangAkta($idcabangakta = "")
	{
		if (!empty($idcabangakta)) {
			$this->db->where('idcabangakta', $idcabangakta);
		}
		return $this->db->get('aktacabang');
	}

	public function getDaerahAkta($iddaerahakta = "")
	{
		if (!empty($iddaerahakta)) {
			$this->db->where('iddaerahakta', $iddaerahakta);
		}
		return $this->db->get('aktadaerah');
	}

	public function getSettings($prefix)
	{
		$rsSettings = $this->db->query("
			select * from settings where prefix = '$prefix' limit 1
		");
		if ($rsSettings->num_rows() > 0) {
			$values = $rsSettings->row()->values;
		} else {
			$values = '';
		}
		return $values;
	}
}

/* End of file App.php */
/* Location: ./application/core/App.php */