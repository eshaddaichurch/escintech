<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jemaatbaru extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Jemaatbaru_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'C101');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'jemaatbaru';
        $this->load->view('jemaatbaru/listdata', $data);
    }

    public function tambah()
    {
        $data['idcarejemaatbaru'] = '';
        $data['menu'] = 'jemaatbaru';
        $this->load->view('jemaatbaru/form', $data);
    }

    public function edit($idcarejemaatbaru)
    {
        $idcarejemaatbaru = $this->encrypt->decode($idcarejemaatbaru);

        if ($this->Jemaatbaru_model->get_by_id($idcarejemaatbaru)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaatbaru');
            exit();
        };
        $data['idcarejemaatbaru'] = $idcarejemaatbaru;
        $data['menu'] = 'jemaatbaru';
        $this->load->view('jemaatbaru/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Jemaatbaru_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {

                if ($rowdata->status == 'Permohonan') {
                    $status = '<span class="badge badge-warning">' . $rowdata->status . '</span>';
                } else {
                    $status = '<span class="badge badge-success">' . $rowdata->status . '</span>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->namajemaat . '<br>' . $rowdata->jeniskelamin;
                $row[] = formatHariTanggalJam($rowdata->tglinsert);
                $row[] = $rowdata->email;
                $row[] = $rowdata->nohp;
                $row[] = $status;
                $row[] = '<a href="' . site_url('jemaatbaru/edit/' . $this->encrypt->encode($rowdata->idcarejemaatbaru)) . '" class="btn btn-sm btn-primary btn-circle"><i class="fas fa-check-double"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Jemaatbaru_model->count_all(),
            "recordsFiltered" => $this->Jemaatbaru_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete($idcarejemaatbaru)
    {
        $idcarejemaatbaru = $this->encrypt->decode($idcarejemaatbaru);
        $rsdata = $this->Jemaatbaru_model->get_by_id($idcarejemaatbaru);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaatbaru');
            exit();
        };

        $hapus = $this->Jemaatbaru_model->hapus($idcarejemaatbaru);
        if ($hapus) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        } else {
            $eror = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('jemaatbaru');
    }

    public function simpan()
    {
        $idcarejemaatbaru             = $this->input->post('idcarejemaatbaru');
        $noakta        = $this->input->post('noakta');
        $tglakta        = $this->input->post('tglakta');
        $dilakukanoleh        = $this->input->post('dilakukanoleh');
        $namaayah        = $this->input->post('namaayah');
        $namaibu        = $this->input->post('namaibu');
        $idjemaat        = $this->input->post('idjemaat');
        $iddaerahakta        = $this->input->post('iddaerahakta');
        $idcabangakta        = $this->input->post('idcabangakta');

        $statusaktif        = $this->input->post('statusaktif');

        if ($idcarejemaatbaru == '') {

            $idcarejemaatbaru = $this->db->query("select create_idJemaatbaru('" . date('Y-m-d') . "') as idcarejemaatbaru")->row()->idcarejemaatbaru;

            $data = array(
                'idcarejemaatbaru'   => $idcarejemaatbaru,
                'noakta'   => $noakta,
                'tglakta'   => $tglakta,
                'dilakukanoleh'   => $dilakukanoleh,
                'idjemaat'   => $idjemaat,
                'namaayah'   => $namaayah,
                'namaibu'   => $namaibu,
                'iddaerahakta'   => $iddaerahakta,
                'idcabangakta'   => $idcabangakta,
            );
            $simpan = $this->Jemaatbaru_model->simpan($data);
        } else {

            $data = array(
                'idcarejemaatbaru'   => $idcarejemaatbaru,
                'noakta'   => $noakta,
                'tglakta'   => $tglakta,
                'dilakukanoleh'   => $dilakukanoleh,
                'idjemaat'   => $idjemaat,
                'namaayah'   => $namaayah,
                'namaibu'   => $namaibu,
                'iddaerahakta'   => $iddaerahakta,
                'idcabangakta'   => $idcabangakta,
            );
            $simpan = $this->Jemaatbaru_model->update($data, $idcarejemaatbaru);
        }

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
        redirect('jemaatbaru');
    }

    public function get_edit_data()
    {
        $idcarejemaatbaru = $this->input->post('idcarejemaatbaru');
        $RsData = $this->Jemaatbaru_model->get_by_id($idcarejemaatbaru)->row();



        $data = array(
            'idcarejemaatbaru'     =>  $RsData->idcarejemaatbaru,
            'noakta'     =>  $RsData->noakta,
            'tglakta'     =>  $RsData->tglakta,
            'tglcetak'     =>  $RsData->tglcetak,
            'dilakukanoleh'     =>  $RsData->dilakukanoleh,
            'idjemaat'     =>  $RsData->idjemaat,
            'namaayah'     =>  $RsData->namaayah,
            'namaibu'     =>  $RsData->namaibu,
            'iddaerahakta'     =>  $RsData->iddaerahakta,
            'idcabangakta'     =>  $RsData->idcabangakta,
        );

        echo (json_encode($data));
    }

    public function simpandaerah()
    {
        $namadaerah = $this->input->post('namadaerah');
        $iddaerahakta = $this->db->query("SELECT create_iddaerahakta('" . $namadaerah . "') as iddaerahakta")->row()->iddaerahakta;
        $dataDaerah = array(
            'iddaerahakta' => $iddaerahakta,
            'namadaerahakta' => $namadaerah,
            'statusaktif' => 'Aktif',
        );
        $simpan = $this->Jemaatbaru_model->simpandaerah($dataDaerah);
        if ($simpan) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => "Data gagal disimpan."));
        }
    }

    public function simpancabang()
    {
        $namacabang = $this->input->post('namacabang');
        $formatnomorakta = $this->input->post('formatnomorakta');

        $idcabangakta = $this->db->query("SELECT create_idcabangakta('" . $namacabang . "') as idcabangakta")->row()->idcabangakta;

        $dataCabang = array(
            'idcabangakta' => $idcabangakta,
            'namacabangakta' => $namacabang,
            'formatnomorakta' => $formatnomorakta,
            'statusaktif' => 'Aktif',
        );
        $simpan = $this->Jemaatbaru_model->simpancabang($dataCabang);
        if ($simpan) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('msg' => "Data gagal disimpan."));
        }
    }
}

/* End of file Jemaatbaru.php */
/* Location: ./application/controllers/Jemaatbaru.php */