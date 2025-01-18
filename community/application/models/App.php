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
			// $config['max_size']            = '2000KB';


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
		// $this->compressImage($foto, $size);

		return $foto;
	}

	public function compressImage($foto, $size)
	{
		$default_ukuran_foto = 200; // kb

		// Validasi input
		if (empty($foto) || $size <= 0) {
			return "Parameter tidak valid";
		}

		// Hitung persentase kualitas
		$persentasi_quality = max(10, min(100, (($size / $default_ukuran_foto) * 100)));

		// Validasi file
		$source_path = 'uploads/absensi/' . $foto;
		if (!file_exists($source_path)) {
			return "File tidak ditemukan";
		}

		// Konfigurasi library
		$config['image_library'] = 'gd';
		$config['source_image'] = $source_path;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['quality'] = $persentasi_quality . '%';
		$config['width'] = 600; // Bisa disesuaikan
		$config['height'] = 400; // Bisa disesuaikan
		$config['new_image'] = 'uploads/absensi/compressed_' . $foto;

		// Load library dan resize
		$this->load->library('image_lib', $config);

		if (!$this->image_lib->resize()) {
			return $this->image_lib->display_errors();
		}

		return true;
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

	public function getKelasJemaat($idjemaat)
	{
		$this->db->where("idjemaat", $idjemaat);
		return $this->db->get('v_registrasikelas_sudahlulus');
	}

	public function getJemaatFamily($idjemaat)
	{
		$arrFamily = array();
		$rsJemaat = $this->db->query("select * from v_jemaatfamily where idjemaat = '$idjemaat' limit 1");
		if ($rsJemaat->num_rows() > 0) {
			$nokaj = $rsJemaat->row()->nokaj;
			$rsFamily = $this->db->query("select * from v_jemaatfamily where nokaj = '$nokaj'");
			foreach ($rsFamily->result() as $row) {
				array_push($arrFamily, array(
					'idjemaat' => $row->idjemaat,
					'namalengkap' => $row->namalengkap,
					'namahubungan' => $row->namahubungan,
				));
			}
		}

		return $arrFamily;
	}
}

/* End of file App.php */
/* Location: ./application/core/App.php */