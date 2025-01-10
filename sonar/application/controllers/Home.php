<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Home_model');
        //Do your magic here
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata("idpengguna");
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata("pesan", $pesan);
            redirect("Login");
            exit();
        }
    }

    public function index()
    {
        $jumlahProyek            = $this->db->query("select count(*) as jumlahProyek from proyek")->row()->jumlahProyek;
        $jumlahTugas             = $this->db->query("select count(*) as jumlahTugas from task")->row()->jumlahTugas;
        $jumlahTugasSelesai      = $this->db->query("select count(*) as jumlahTugasSelesai from task where statustask='Sudah Selesai'")->row()->jumlahTugasSelesai;
        $jumlahTugasBelumSelesai = $this->db->query("select count(*) as jumlahTugasBelumSelesai from task where statustask='Baru' or statustask='Sedang Diproses'")->row()->jumlahTugasBelumSelesai;

        $data["menu"]                    = "home";
        $data["jumlahProyek"]            = $jumlahProyek;
        $data["jumlahTugas"]             = $jumlahTugas;
        $data["jumlahTugasBelumSelesai"] = $jumlahTugasBelumSelesai;
        $data["jumlahTugasSelesai"]      = $jumlahTugasSelesai;
        $this->load->view("home", $data);
    }

    public function allnotifikasi()
    {
        $rsnotifikasi = $this->db->query("select * from v_notifikasi where idpenerimanotif='".$this->session->userdata('idpengguna')."' order by tglnotifikasi desc limit 100");
        $data["menu"]                    = "home";
        $data["rsnotifikasi"]            = $rsnotifikasi;
        $this->load->view("allnotifikasi", $data);
    }

    public function datatabletask()
    {
        $RsData    = $this->Home_model->get_datatables();
        $no        = $_POST['start'];
        $data      = array();
        $jenisdata = $_POST['jenisdata'];

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row   = array();
                $row[] = $no;
                $row[] = '<span class="font-weight-bold">' . $rowdata->namatask . '</span><br>Prioritas: ' . $rowdata->prioritas . '<br><small>' . $rowdata->namaproyek . ' <i class="fa fa-angle-right"></i> ' . $rowdata->namaproyeklist . '</small>';
                $row[] = tglindonesia($rowdata->tglmulai) . '<br>' . tglindonesia($rowdata->tglselesai);
                $row[] = $rowdata->namapic;
                $row[] = $rowdata->namaassignment;
                switch ($rowdata->statustask) {
                    case 'Sedang Diproses':
                        $row[] = '<span class="badge badge-info">' . $rowdata->statustask . '</span>';
                        break;
                    case 'Sudah Selesai':
                        $row[] = '<span class="badge badge-success">' . $rowdata->statustask . '</span>';
                        break;
                    default:
                        $row[] = '<span class="badge badge-danger">' . $rowdata->statustask . '</span>';
                        break;
                }
                $row[]  = '<a href="' . site_url('task/lihat/' . $this->encrypt->encode($rowdata->idtask)) . '" class="btn btn-sm btn-default btn-circle"><i class="fa fa-search text-warning"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Home_model->count_all(),
            "recordsFiltered" => $this->Home_model->count_filtered(),
            "data"            => $data,
        );
        echo json_encode($output);
    }

    public function getChartAllTask()
    {
        $rsData = $this->db->query("
                SELECT *, count_task(pengguna.`idpengguna`) AS jumlahtask FROM pengguna
            ");

        $dataNama   = array();
        $dataJumlah = array();
        $dataColor  = array();
        if ($rsData->num_rows() > 0) {
            foreach ($rsData->result() as $row) {
                if ($row->jumlahtask > 0) {

                    $dataNama[]   = $row->nama;
                    $dataJumlah[] = $row->jumlahtask;
                    $dataColor[]  = $this->random_color();
                }
            }
        }

        echo (json_encode(array('dataNama' => $dataNama, 'dataJumlah' => $dataJumlah, 'dataColor' => $dataColor)));
    }

    public function getChartAllPembuatTask()
    {
        $rsData = $this->db->query("
                SELECT namapembuattask, COUNT(*) AS jumlahtask
                        FROM v_task
                        GROUP BY namapembuattask
            ");

        $dataNama   = array();
        $dataJumlah = array();
        $dataColor  = array();
        if ($rsData->num_rows() > 0) {
            foreach ($rsData->result() as $row) {
                $dataNama[]   = $row->namapembuattask;
                $dataJumlah[] = $row->jumlahtask;
                $dataColor[]  = $this->random_color();
            }
        }

        echo (json_encode(array('dataNama' => $dataNama, 'dataJumlah' => $dataJumlah, 'dataColor' => $dataColor)));
    }

    public function random_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    public function get_notifikasi()
    {

        $rsnotif = $this->db->query("select * from v_notifikasi 
              where idpenerimanotif='".$this->session->userdata('idpengguna')."' 
                order by sudahdilihat desc, tglnotifikasi desc limit 5
              ");
        $data = array();

        if ($rsnotif->num_rows()>0) {
            foreach ($rsnotif->result() as $row) {
                array_push($data, array(
                                        'deskripsi' => $row->deskripsi, 
                                        'idnotifikasi' => $row->idnotifikasi, 
                                        'idpenerimanotif' => $row->idpenerimanotif, 
                                        'idtask' => $row->idtask, 
                                        'namatask' => $row->namatask, 
                                        'jenisnotifikasi' => $row->jenisnotifikasi, 
                                        'linkurl' => base_url().'/'.$row->linkurl, 
                                        'sudahdilihat' => $row->sudahdilihat, 
                                        'tgldilihat' => $row->tgldilihat, 
                                        'tglnotifikasi' => berapawaktuyanglalu($row->tglnotifikasi), 
                                        ));
            }
            echo json_encode( array('data' => $data, 'base_url' => base_url() ));
        }else{
            echo json_encode( array('data' => $data, 'base_url' => base_url() ));
        }

    }


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
