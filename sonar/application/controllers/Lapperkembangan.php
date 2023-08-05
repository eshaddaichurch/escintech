<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapperkembangan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
            exit();
        }
    }

    public function index()
    {
        $tglawal    = $this->input->post('tglawal');
        $tglakhir   = $this->input->post('tglakhir');
        $id_pegawai = $this->session->userdata('id_pegawai');

        if (empty($tglawal)) {
            $tglawal  = date('Y-m-d');
            $tglakhir = date('Y-m-d');
        }

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['menu']     = 'lapperkembangan';
        $this->load->view('lapperkembangan/listdata', $data);
    }

    public function cetak()
    {
        error_reporting(0);
        $this->load->library('Pdf');

        $idproyek = $this->uri->segment(3);
        $idprogrammer = $this->uri->segment(4);
        $tglawal  = date('Y-m-d', strtotime($this->uri->segment(5)));
        $tglakhir = date('Y-m-d', strtotime($this->uri->segment(6)));

        $where = '';
        if ($idproyek!='-') {
        	$and_where .= " and idproyek = '$idproyek' ";
        }

        if ($idprogrammer!='-') {
        	$and_where .= " and idprogrammer = '$idprogrammer' ";
        }


        $query = "SELECT
                          `task`.`idprogrammer`         AS `idprogrammer`,
                          `programmer`.`nama`           AS `namaprogrammer`,
                          `proyek`.`namaproyek`         AS `namaproyek`,
                          SUM(CASE WHEN prioritas = 'Rendah' THEN 1 ELSE 0 END) AS prioritasrendah,
                          SUM(CASE WHEN prioritas = 'Sedang' THEN 1 ELSE 0 END) AS prioritassedang,
                          SUM(CASE WHEN prioritas = 'Tinggi' THEN 1 ELSE 0 END) AS prioritastinggi,
                          SUM(CASE WHEN statustask <> 'Sudah Selesai' THEN 1 ELSE 0 END) AS statusbelumselesai,
                           SUM(CASE WHEN statustask = 'Sudah Selesai' THEN 1 ELSE 0 END) AS statussudahselesai  
                        FROM `proyeklist`
                             JOIN `proyek`
                               ON `proyeklist`.`idproyek` = `proyek`.`idproyek`
                            JOIN `task`
                              ON `task`.`idproyeklist` = `proyeklist`.`idproyeklist`
                           JOIN `programmer`
                             ON `task`.`idprogrammer` = `programmer`.`idprogrammer`
                             WHERE tglmulai between '$tglawal' and '$tglakhir' ";

        $group_by = " GROUP BY `task`.`idprogrammer`, `programmer`.`nama`, `proyek`.`namaproyek`";
        $order_by = " ORDER BY proyek.idproyek, task.`idprogrammer` ";

        $rstask = $this->db->query($query.$and_where.$group_by.$order_by);

        $data['tglawal']  = $tglawal;
        $data['tglakhir'] = $tglakhir;
        $data['rstask'] = $rstask;
        $this->load->view('lapperkembangan/cetak', $data);
    }

}

/* End of file Lapperkembangan.php */
/* Location: ./application/controllers/Lapperkembangan.php */