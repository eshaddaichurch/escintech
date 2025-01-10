<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernikahan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Pernikahan_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'C102');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'pernikahan';
        $this->load->view('pernikahan/listdata', $data);
    }

    public function proses($idpernikahan)
    {
        $idpernikahan = $this->encrypt->decode($idpernikahan);
        $rsPernikahan = $this->Pernikahan_model->get_by_id($idpernikahan);

        if ($rsPernikahan->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pernikahan');
            exit();
        };
        $data['rowPernikahan'] = $rsPernikahan->row();
        $data['idpernikahan'] = $idpernikahan;
        $data['menu'] = 'pernikahan';
        $this->load->view('pernikahan/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pernikahan_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                switch ($rowdata->status) {
                    case 'Disetujui':
                        $status = '<span class="badge badge-success">' . $rowdata->status . '</span>';
                        break;
                    case 'Ditolak':
                        $status = '<span class="badge badge-danger">' . $rowdata->status . '</span>';
                        break;
                    default:
                        $status = '<span class="badge badge-warning">' . $rowdata->status . '</span>';
                        break;
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = ($rowdata->tglinsert == null) ? '' : formatHariTanggalJam($rowdata->tglinsert);
                $row[] = $rowdata->namamempelaipria;
                $row[] = $rowdata->namamempelaiwanita;
                $row[] = $status;
                $row[] = '<a href="' . site_url('pernikahan/proses/' . $this->encrypt->encode($rowdata->idpernikahan)) . '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-check-double"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pernikahan_model->count_all(),
            "recordsFiltered" => $this->Pernikahan_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan()
    {
        $idpernikahan             = $this->input->post('idpernikahan');
        $tglpernikahan             = $this->input->post('tglpernikahan');
        $keteranganadmin             = $this->input->post('keteranganadmin');
        $status             = $this->input->post('status');
        $tglinsert = date('Y-m-d H:i:s');

        $data = array(
            'idpernikahan'   => $idpernikahan,
            'status'   => $status,
            'tglstatus'   => date('Y-m-d H:i:s'),
            'idadmin'   => $this->session->userdata('idjemaat'),
            'keteranganadmin'   => $keteranganadmin,
            'tglpernikahan'   => $tglpernikahan,
        );
        // var_dump($data);
        // exit();
        $simpan = $this->Pernikahan_model->update($data, $idpernikahan);

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $eror = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : ' . $eror['code'] . ' ' . $eror['message'] . '
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('pernikahan');
    }

    public function get_edit_data()
    {
        $idpernikahan = $this->input->post('idpernikahan');
        $RsData = $this->Pernikahan_model->get_by_id($idpernikahan)->row();
        $data = array(
            'idpernikahan'     =>  $RsData->idpernikahan,
            'status'     =>  $RsData->status,
            'keteranganadmin'     =>  $RsData->keteranganadmin,
            'tglpernikahan'     =>  $RsData->tglpernikahan,
        );

        echo (json_encode($data));
    }
}

/* End of file Pernikahan.php */
/* Location: ./application/controllers/Pernikahan.php */