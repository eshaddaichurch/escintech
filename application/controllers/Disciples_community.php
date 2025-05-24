<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciples_community extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('Disciples_community_model');
	}

	public function index($idmenu = null)
	{
		$data['title'] = 'DISCIPLES COMMUNITY';
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/dc/index', $data);
	}

	public function list($idmenu = "")
	{
		$rsDC = $this->db->query("
			select * from v_disciplescommunity where statusaktif = 'Aktif'
		");

		$data['title'] = 'LIST DATA DISCIPLES COMMUNITY';
		$idmenu = $this->encrypt->decode($idmenu);
		$data['menu'] = $idmenu;
		$data['rsDC'] = $rsDC;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/dc/listdata', $data);
	}

	public function getKecamatan()
	{
		$idkabupaten = $this->input->get('idkabupaten');
		$query = $this->db->query("
            select * from kecamatan where idkabupaten='$idkabupaten' order by namakecamatan
        ");
		echo json_encode($query->result());
	}

	public function getListDC()
	{
		$idkategoridc = $this->input->get('idkategoridc', true);
		$idkabupaten = $this->input->get('idkabupaten', true);
		$idkecamatan = $this->input->get('idkecamatan', true);
		$cari = $this->input->get('cari', true);

		// Inisialisasi query builder
		$this->db->select('*');
		$this->db->from('v_disciplescommunity');
		$this->db->where('statusaktif', 'Aktif');

		if (!empty($idkategoridc)) {
			$this->db->where('idkategoridc', $idkategoridc);
		}
		if (!empty($idkabupaten)) {
			$this->db->where('idkabupaten', $idkabupaten);
		}
		if (!empty($idkecamatan)) {
			$this->db->where('idkecamatan', $idkecamatan);
		}
		if (!empty($cari)) {
			$this->db->like('namadc', $cari);
		}

		// Eksekusi query
		$query = $this->db->get();

		$data = array();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				array_push($data, array(
					'iddc' => $row->iddc,
					'namadc' => $row->namadc,
					'kategoridc' => $row->kategoridc,
					'alamatdc' => $row->alamatdc,
					'fotodc' => $row->fotodc,
					'iddcEncrypt' => $this->encrypt->encode($row->iddc),
				));
			}
		}

		// Kirimkan respons JSON
		echo json_encode([
			'success' => true,
			'data' => $data,
		]);
	}

	public function bergabung($iddc)
	{
		$this->wajibLogin();
		$iddc = $this->encrypt->decode($iddc);
		$idmenu = "";

		$idmenu = $this->encrypt->decode($idmenu);
		$rowDC = $this->Disciples_community_model->getDC($iddc);

		$data['rowDC'] = $rowDC->row();
		$data['iddc'] = $iddc;
		$data['menu'] = $idmenu;
		$data["rowinfogereja"] = $this->Home_model->get_infogereja();
		$this->load->view('community/dc/bergabung', $data);
	}

	public function simpanpermohonanbergabung()
	{
		$keteranganpermohonan = $this->input->post('keteranganpermohonan');
		$iddc = $this->input->post('iddc');
		$idjemaat = $this->session->userdata('idjemaat');

		$rsPeriksaPermohonan = $this->db->query("
			select * from dcmember_permohonan where idjemaat = '$idjemaat' and statuskonfirmasi = 'Menunggu Konfirmasi'
		");
		if ($rsPeriksaPermohonan->num_rows() > 0) {
			$pesan = "<script>
                            swal('Upss!', 'Permohonan anda sebelum nya masih dalam progres konfirmasi. Harap tunggu sampai permohonan anda sebelumnya dikonfirmasi!', 'warning');
                        </script>";

			$this->session->set_flashdata('pesan', $pesan);
			redirect('disciples_community/list');
		}
		$dataPemohon = array(
			'tglpermohonan' => date('Y-m-d H:i:s'),
			'iddc' => $iddc,
			'idjemaat' => $idjemaat,
			'keterangan' => $keteranganpermohonan,
			'statuskonfirmasi' => 'Menunggu Konfirmasi',
		);

		$simpan = $this->Disciples_community_model->simpanpermohonanbergabung($dataPemohon);
		if ($simpan) {
			$pesan = "<script>
                            swal('Berhasil', 'Permohonan berhasil disimpan.', 'success');
                        </script>";
		} else {
			$pesan = "<script>
                            swal('Gagal', 'Permohonan gagal disimpan.', 'warning');
                        </script>";
		}

		$this->session->set_flashdata('pesan', $pesan);
		redirect('disciples_community/list');
	}
}

/* End of file Disciples_community.php */
/* Location: ./application/controllers/Disciples_community.php */