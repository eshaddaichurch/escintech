<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baptisan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Baptisan_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'C108');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'baptisan';
        $this->load->view('baptisan/listdata', $data);
    }

    public function proses($idcarebaptisan)
    {
        $idcarebaptisan = $this->encrypt->decode($idcarebaptisan);
        $rsBaptisan = $this->Baptisan_model->get_by_id($idcarebaptisan);

        if ($rsBaptisan->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('baptisan');
            exit();
        };
        $data['rowBaptisan'] = $rsBaptisan->row();
        $data['idcarebaptisan'] = $idcarebaptisan;
        $data['menu'] = 'baptisan';
        $this->load->view('baptisan/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Baptisan_model->get_datatables();
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
                $row[] = '<a href="' . site_url('baptisan/proses/' . $this->encrypt->encode($rowdata->idcarebaptisan)) . '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-check-double"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Baptisan_model->count_all(),
            "recordsFiltered" => $this->Baptisan_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan()
    {
        $idcarebaptisan             = $this->input->post('idcarebaptisan');
        $idpenanggungjawab             = $this->input->post('idpenanggungjawab');
        $tempatbaptisan             = $this->input->post('tempatbaptisan');
        $tglbaptisan             = $this->input->post('tglbaptisan');
        $keteranganadmin             = $this->input->post('keteranganadmin');
        $status             = $this->input->post('status');
        $tglinsert = date('Y-m-d H:i:s');

        $data = array(
            'idcarebaptisan'   => $idcarebaptisan,
            'tglinsert'   => $tglinsert,
            'status'   => $status,
            'tglstatus'   => date('Y-m-d H:i:s'),
            'idadmin'   => $this->session->userdata('idjemaat'),
            'keteranganadmin'   => $keteranganadmin,
            'idpenanggungjawab'   => $idpenanggungjawab,
            'tglbaptisan'   => $tglbaptisan,
            'tempatbaptisan'   => $tempatbaptisan,
        );
        // var_dump($data);
        // exit();
        $simpan = $this->Baptisan_model->update($data, $idcarebaptisan);

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
        redirect('baptisan');
    }

    public function get_edit_data()
    {
        $idcarebaptisan = $this->input->post('idcarebaptisan');
        $RsData = $this->Baptisan_model->get_by_id($idcarebaptisan)->row();
        $data = array(
            'idcarebaptisan'     =>  $RsData->idcarebaptisan,
            'status'     =>  $RsData->status,
            'keteranganadmin'     =>  $RsData->keteranganadmin,
            'idpenanggungjawab'     =>  $RsData->idpenanggungjawab,
            'namapenanggungjawab'     =>  $RsData->namapenanggungjawab,
            'tglbaptisan'     =>  $RsData->tglbaptisan,
            'tempatbaptisan'     =>  $RsData->tempatbaptisan,
        );

        echo (json_encode($data));
    }
}
