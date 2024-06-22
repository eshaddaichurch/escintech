<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahananak extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Penyerahananak_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'C104');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'penyerahananak';
        $this->load->view('penyerahananak/listdata', $data);
    }

    public function proses($idpenyerahananak)
    {
        $idpenyerahananak = $this->encrypt->decode($idpenyerahananak);
        $rsPenyerahanAnak = $this->Penyerahananak_model->get_by_id($idpenyerahananak);

        if ($rsPenyerahanAnak->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penyerahananak');
            exit();
        };
        $data['rowPenyerahanAnak'] = $rsPenyerahanAnak->row();
        $data['idpenyerahananak'] = $idpenyerahananak;
        $data['menu'] = 'penyerahananak';
        $this->load->view('penyerahananak/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Penyerahananak_model->get_datatables();
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
                $row[] = $rowdata->namalengkap;
                $row[] = $rowdata->namaanak;
                $row[] = $rowdata->namaayah . '<br>' . $rowdata->namaibu;
                $row[] = $rowdata->nohpyangbisadihubungi;
                $row[] = $status;
                $row[] = '<a href="' . site_url('penyerahananak/proses/' . $this->encrypt->encode($rowdata->idpenyerahananak)) . '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-check-double"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penyerahananak_model->count_all(),
            "recordsFiltered" => $this->Penyerahananak_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan()
    {
        $idpenyerahananak             = $this->input->post('idpenyerahananak');
        $idpenanggungjawab             = $this->input->post('idpenanggungjawab');
        $keteranganadmin             = $this->input->post('keteranganadmin');
        $status             = $this->input->post('status');
        if (empty($idpenanggungjawab)) {
            $idpenanggungjawab = null;
        }

        $data = array(
            'status'   => $status,
            'tglstatus'   => date('Y-m-d H:i:s'),
            'idadmin'   => $this->session->userdata('idjemaat'),
            'idpenanggungjawab'   => $idpenanggungjawab,
            'keteranganadmin'   => $keteranganadmin,
        );
        $simpan = $this->Penyerahananak_model->update($data, $idpenyerahananak);

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
        redirect('penyerahananak');
    }

    public function get_edit_data()
    {
        $idpenyerahananak = $this->input->post('idpenyerahananak');
        $RsData = $this->Penyerahananak_model->get_by_id($idpenyerahananak)->row();
        $data = array(
            'idpenyerahananak'     =>  $RsData->idpenyerahananak,
            'status'     =>  $RsData->status,
            'keteranganadmin'     =>  $RsData->keteranganadmin,
            'idpenanggungjawab'     =>  $RsData->idpenanggungjawab,
            'namapenanggungjawab'     =>  $RsData->namapenanggungjawab,
            'tglkonseling'     =>  $RsData->tglkonseling,
            'tempatkonseling'     =>  $RsData->tempatkonseling,
        );

        echo (json_encode($data));
    }
}
