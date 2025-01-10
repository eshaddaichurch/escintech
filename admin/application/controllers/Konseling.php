<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konseling extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Konseling_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'C102');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'konseling';
        $this->load->view('konseling/listdata', $data);
    }

    public function proses($idcarekonseling)
    {
        $idcarekonseling = $this->encrypt->decode($idcarekonseling);
        $rsKonseling = $this->Konseling_model->get_by_id($idcarekonseling);

        if ($rsKonseling->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konseling');
            exit();
        };
        $data['rowKonseling'] = $rsKonseling->row();
        $data['idcarekonseling'] = $idcarekonseling;
        $data['menu'] = 'konseling';
        $this->load->view('konseling/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Konseling_model->get_datatables();
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
                $row[] = $rowdata->namalengkap . '<br>' . $rowdata->jeniskelamin;
                $row[] = ($rowdata->tglpermohonan == null) ? '' : formatHariTanggalJam($rowdata->tglpermohonan);
                $row[] = $rowdata->email;
                $row[] = $rowdata->nohp;
                $row[] = $status;
                $row[] = '<a href="' . site_url('konseling/proses/' . $this->encrypt->encode($rowdata->idcarekonseling)) . '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-check-double"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Konseling_model->count_all(),
            "recordsFiltered" => $this->Konseling_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan()
    {
        $idcarekonseling             = $this->input->post('idcarekonseling');
        $idpenanggungjawab             = $this->input->post('idpenanggungjawab');
        $tempatkonseling             = $this->input->post('tempatkonseling');
        $tglkonseling             = $this->input->post('tglkonseling');
        $keteranganadmin             = $this->input->post('keteranganadmin');
        $status             = $this->input->post('status');
        $tglinsert = date('Y-m-d H:i:s');

        $data = array(
            'idcarekonseling'   => $idcarekonseling,
            'tglinsert'   => $tglinsert,
            'status'   => $status,
            'tglstatus'   => date('Y-m-d H:i:s'),
            'idadmin'   => $this->session->userdata('idjemaat'),
            'keteranganadmin'   => $keteranganadmin,
            'idpenanggungjawab'   => $idpenanggungjawab,
            'tglkonseling'   => $tglkonseling,
            'tempatkonseling'   => $tempatkonseling,
        );
        // var_dump($data);
        // exit();
        $simpan = $this->Konseling_model->update($data, $idcarekonseling);

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
        redirect('konseling');
    }

    public function get_edit_data()
    {
        $idcarekonseling = $this->input->post('idcarekonseling');
        $RsData = $this->Konseling_model->get_by_id($idcarekonseling)->row();
        $data = array(
            'idcarekonseling'     =>  $RsData->idcarekonseling,
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

/* End of file Konseling.php */
/* Location: ./application/controllers/Konseling.php */