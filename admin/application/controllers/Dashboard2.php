<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard2 extends MY_controller
{

	public function __construct()
	{
		parent::__construct();
		$this->islogin();
		$this->session->set_userdata('IDMENUSELECTED', 'dashboard2');
		$this->load->model('Dashboard2_model');
	}

	public function index()
	{
		$data["menu"] = "dashboard2";
		$this->load->view("dashboard/dashboard2", $data);
	}

	public function getinfobox()
	{



		$kehadiranbulanini = $this->Dashboard2_model->kehadiranbulanini();
		$kehadiranbulanlalu = $this->Dashboard2_model->kehadiranbulanlalu();
		$kenaikanbulanlalu = number_format($this->Dashboard2_model->kenaikanbulanlalu($kehadiranbulanlalu));
		$kenaikanbulanini = number_format($this->Dashboard2_model->kenaikanbulanini($kehadiranbulanini, $kehadiranbulanlalu));

		$data = array(
			'kehadiranbulanini' => $kehadiranbulanini,
			'kehadiranbulanlalu' => $kehadiranbulanlalu,
			'kenaikanbulanlalu' => $kenaikanbulanlalu,
			'kenaikanbulanini' => $kenaikanbulanini,

		);
		echo json_encode($data);
	}

	public function getgrafikabsen()
	{

		$idabsenjenis = $this->input->get('idabsenjenis');
		$tglawal = $this->input->get('tglawal');
		$tglakhir = $this->input->get('tglakhir');


		$rsAbsen = $this->Dashboard2_model->getgrafikabsen($idabsenjenis, $tglawal, $tglakhir);
		$datatanggal = array();
		$datatotalhadiribadah = array();
		$datahadiribadah1 = array();
		$datahadiribadah2 = array();
		$datahadiribadah3 = array();
		$datahadiribadah4 = array();

		$jumlah = 0;
		$i = 1;
		if ($rsAbsen->num_rows() > 0) {
			foreach ($rsAbsen->result() as $rowAbsen) {
				$datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
				$datahadiribadah1[] = $rowAbsen->jumlahibadah1;
				$datahadiribadah2[] = $rowAbsen->jumlahibadah2;
				$datahadiribadah3[] = $rowAbsen->jumlahibadah3;
				$datahadiribadah4[] = $rowAbsen->jumlahibadah4;
				$datatotalhadiribadah[] = $rowAbsen->jumlahibadah1 + $rowAbsen->jumlahibadah2 + $rowAbsen->jumlahibadah3 + $rowAbsen->jumlahibadah4;
				$jumlah += $rowAbsen->jumlahibadah1 + $rowAbsen->jumlahibadah2 + $rowAbsen->jumlahibadah3 + $rowAbsen->jumlahibadah4;
				$i++;
			}
		}
		$jumlahPerMinggu = number_format($jumlah / $i);


		$jumlahPerbulan = array();
		$rsAbsenPerbulan = $this->Dashboard2_model->getgrafikabsenperbulan($idabsenjenis);
		if ($rsAbsenPerbulan->num_rows() > 0) {
			foreach ($rsAbsenPerbulan->result() as $rowAbsen) {
				array_push($jumlahPerbulan, array(
					'jumlah01' => number_format($rowAbsen->jumlah01),
					'jumlah02' => number_format($rowAbsen->jumlah02),
					'jumlah03' => number_format($rowAbsen->jumlah03),
					'jumlah04' => number_format($rowAbsen->jumlah04),
					'jumlah05' => number_format($rowAbsen->jumlah05),
					'jumlah06' => number_format($rowAbsen->jumlah06),
					'jumlah07' => number_format($rowAbsen->jumlah07),
					'jumlah08' => number_format($rowAbsen->jumlah08),
					'jumlah09' => number_format($rowAbsen->jumlah09),
					'jumlah10' => number_format($rowAbsen->jumlah10),
					'jumlah11' => number_format($rowAbsen->jumlah11),
					'jumlah12' => number_format($rowAbsen->jumlah12),
				));
			}
		}

		$data = array(
			'datatanggal' => $datatanggal,
			'datahadiribadah1' => $datahadiribadah1,
			'datahadiribadah2' => $datahadiribadah2,
			'datahadiribadah3' => $datahadiribadah3,
			'datahadiribadah4' => $datahadiribadah4,
			'datatotalhadiribadah' => $datatotalhadiribadah,
			'jumlahPerMinggu' => $jumlahPerMinggu,
			'jumlahPerbulan' => $jumlahPerbulan,
			'jumlahi' => $i,
		);



		echo json_encode($data);
	}



	public function getescwomengrafik()
	{
		$rsAbsen = $this->Dashboard2_model->getescwomengrafik();
		$datatanggal = array();
		$datahadiribadah1 = array();
		$datahadiribadah2 = array();
		$datahadiribadah3 = array();
		$datahadiribadah4 = array();

		$jumlah = 0;
		if ($rsAbsen->num_rows() > 0) {
			$i = 1;
			foreach ($rsAbsen->result() as $rowAbsen) {
				$datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
				$datahadiribadah[] = $rowAbsen->jumlahhadir;
				$i++;
			}
		}
		$jumlahPerMinggu = $jumlah / $i;

		$data = array(
			'datatanggal' => $datatanggal,
			'datahadiribadah' => $datahadiribadah,
			'jumlahi' => $i,
		);
		echo json_encode($data);
	}


	public function getpersentase()
	{

		$idabsenjenis = $this->input->get('idabsenjenis');
		$tglawal = $this->input->get('tglawal');
		$tglakhir = $this->input->get('tglakhir');
		$rsAbsen = $this->Dashboard2_model->getgrafikabsen($idabsenjenis, $tglawal, $tglakhir);

		$datatanggal = array();
		$datapersentase = array();


		$jumlah_old = 0;
		$jumlah = 0;
		$totalpersentase = 0;

		$i = 1;
		if ($rsAbsen->num_rows() > 0) {
			foreach ($rsAbsen->result() as $rowAbsen) {
				$datatanggal[] = date('d-M', strtotime($rowAbsen->tglabsen));
				$jumlah = $rowAbsen->jumlahibadah1 + $rowAbsen->jumlahibadah2 + $rowAbsen->jumlahibadah3 + $rowAbsen->jumlahibadah4;

				if ($jumlah_old == 0 || $jumlah == 0) {
					$persentase = 0;
				} else {
					$persentase = (($jumlah / $jumlah_old) * 100) - 100;
				}
				$datapersentase[] = $persentase;
				$jumlah_old = $jumlah;
				$totalpersentase += $persentase;
				$i++;
			}
		}

		$ratarata = $totalpersentase / $i;

		$data = array(
			'datatanggal' => $datatanggal,
			'datapersentase' => $datapersentase,
			'ratarata' => $ratarata,
		);
		echo json_encode($data);
	}
}

/* End of file Dashboard2.php */
/* Location: ./application/controllers/Dashboard2.php */