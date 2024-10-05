<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasikelas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Registrasikelas_model');
    }

    public function index($idkelas)
    {
        switch ($idkelas) {
            case 'KL001':
                $this->session->set_userdata('IDMENUSELECTED', 'N200');
                break;
            case 'KL002':
                $this->session->set_userdata('IDMENUSELECTED', 'N300');
                break;
            case 'KL003':
                $this->session->set_userdata('IDMENUSELECTED', 'N400');
                break;
            case 'KL004':
                $this->session->set_userdata('IDMENUSELECTED', 'N500');
                break;
            case 'KL005':
                $this->session->set_userdata('IDMENUSELECTED', 'N600');
                break;
            case 'KL006':
                $this->session->set_userdata('IDMENUSELECTED', 'N700');
                break;
            case 'KL007':
                $this->session->set_userdata('IDMENUSELECTED', 'N800');
                break;
            case 'KL008':
                $this->session->set_userdata('IDMENUSELECTED', 'N900');
                break;
            case 'KL101':
                $this->session->set_userdata('IDMENUSELECTED', 'C100');
                break;
            case 'KL102':
                $this->session->set_userdata('IDMENUSELECTED', 'C109');
                break;
            default:
                $this->session->set_userdata('IDMENUSELECTED', '');
                break;
        }
        $this->cekOtorisasi();

        $data['rowkelas'] = $this->db->query("select * from kelas where idkelas='$idkelas'")->row();
        $data['idkelas'] = $idkelas;
        $data['menu'] = $idkelas;
        $this->load->view('registrasikelas/listdata', $data);
    }

    public function tambah($idkelas)
    {
        $data['rowkelas'] = $this->db->query("select * from kelas where idkelas='$idkelas'")->row();
        $data['idkelas'] = $idkelas;
        $data['idregistrasikelas'] = '';
        $data['menu'] = $idkelas;
        $this->load->view('registrasikelas/form', $data);
    }

    public function edit($idregistrasikelas, $idkelas)
    {
        $idregistrasikelas = $this->encrypt->decode($idregistrasikelas);

        if ($this->Registrasikelas_model->get_by_id($idregistrasikelas)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('registrasikelas');
            exit();
        };
        $data['rowkelas'] = $this->db->query("select * from kelas where idkelas='$idkelas'")->row();
        $data['idkelas'] = $idkelas;
        $data['idregistrasikelas'] = $idregistrasikelas;
        $data['menu'] = $idkelas;
        $this->load->view('registrasikelas/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Registrasikelas_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idregistrasikelas;
                $row[] = $rowdata->namalengkap . '<br>' . $rowdata->jeniskelamin . '<br> ' . $rowdata->tempatlahir . ' ' . $rowdata->tanggallahir;
                $row[] = $rowdata->alamatrumah;
                $row[] = $rowdata->notelp . '<br>' . $rowdata->email;
                $row[] = $rowdata->nomorsertifikat . '<br>' . $rowdata->tglsertifikat;

                switch ($rowdata->idkelas) {
                    case 'KL002':
                        $row[] = '
                                    <!-- Example split btn-warning button -->
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                                      </div>

                                      <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                                    </div>
                                ';
                        break;
                    case 'KL003':
                        $row[] = '
                                    <!-- Example split btn-warning button -->
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                                      </div>

                                      <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                                    </div>
                                ';
                        break;

                    case 'KL004':
                        $row[] = '
                                    <!-- Example split btn-warning button -->
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                                      </div>

                                      <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                                    </div>
                                ';
                        break;

                    case 'KL008':
                        $row[] = '
                                    <!-- Example split btn-warning button -->
                                    <div class="btn-group dropleft">    
                                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                                      </div>

                                      <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                                    </div>
                                ';
                        break;

                    case 'KL101':
                        $row[] = '
                                    <!-- Example split btn-warning button -->
                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                                      </div>

                                      <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                                    </div>
                                ';
                        break;

                    default:

                        $row[] = '
                            <!-- Example split btn-warning button -->
                            <div class="btn-group dropleft">
                              <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . site_url('registrasikelas/inputnilaimateri/' . $rowdata->idregistrasikelas) . '">Nilai Materi</a>
                                <a class="dropdown-item" href="' . site_url('registrasikelas/cetaksertifikat/' . $rowdata->idregistrasikelas) . '" target="_blank">Cetak Sertifikat</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="' . site_url('registrasikelas/delete/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" id="hapus">Hapus</a>
                              </div>

                              <a href="' . site_url('registrasikelas/edit/' . $this->encrypt->encode($rowdata->idregistrasikelas)) . '/' . $rowdata->idkelas . '" class="btn btn-warning">Edit</a>
                            </div>
                        ';
                        break;
                }
                // $row[] = '<a href="'.site_url( 'registrasikelas/edit/'.$this->encrypt->encode($rowdata->idregistrasikelas) ).'/'.$rowdata->idkelas.'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                //         <a href="'.site_url('registrasikelas/delete/'.$this->encrypt->encode($rowdata->idregistrasikelas) ).'/'.$rowdata->idkelas.'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Registrasikelas_model->count_all(),
            "recordsFiltered" => $this->Registrasikelas_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete($idregistrasikelas, $idkelas)
    {
        $idregistrasikelas = $this->encrypt->decode($idregistrasikelas);
        $rsdata = $this->Registrasikelas_model->get_by_id($idregistrasikelas);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('registrasikelas');
            exit();
        };

        $hapus = $this->Registrasikelas_model->hapus($idregistrasikelas);
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
        redirect('registrasikelas/index/' . $idkelas);
    }

    public function simpan()
    {
        $idregistrasikelas                 = $this->input->post('idregistrasikelas');
        $nomorsertifikat                 = $this->input->post('nomorsertifikat');
        $tglsertifikat                 = $this->input->post('tglsertifikat');
        $idjemaat                 = $this->input->post('idjemaat');
        $idkelas                 = $this->input->post('idkelas');
        $tanggalinsert = date('Y-m-d H:i:s');


        if ($idregistrasikelas == '') {

            $idregistrasikelas = $this->db->query("select create_idregistrasikelas('" . $tanggalinsert . "', '$idkelas') as idregistrasikelas")->row()->idregistrasikelas;

            $data = array(
                'idregistrasikelas'   => $idregistrasikelas,
                'tglsertifikat'   => $tglsertifikat,
                'idjemaat'   => $idjemaat,
                'idkelas'   => $idkelas,
                'tanggalinsert'   => $tanggalinsert,
                'tanggalupdate'   => $tanggalinsert,
                'idpengguna'   => $this->session->userdata('idjemaat'),
                'statuslulus'   => '1',
                'nomorsertifikat'   => $nomorsertifikat
            );
            $simpan = $this->Registrasikelas_model->simpan($data);
        } else {
            $data = array(
                'idregistrasikelas'   => $idregistrasikelas,
                'tglsertifikat'   => $tglsertifikat,
                'idjemaat'   => $idjemaat,
                'idkelas'   => $idkelas,
                'tanggalupdate'   => $tanggalinsert,
                'idpengguna'   => $this->session->userdata('idjemaat'),
                'nomorsertifikat'   => $nomorsertifikat
            );
            $simpan = $this->Registrasikelas_model->update($data, $idregistrasikelas);
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
        redirect('registrasikelas/index/' . $idkelas);
    }

    public function get_edit_data()
    {
        $idregistrasikelas = $this->input->post('idregistrasikelas');
        $RsData = $this->Registrasikelas_model->get_by_id($idregistrasikelas)->row();

        $data = array(
            'idregistrasikelas'     =>  $RsData->idregistrasikelas,
            'tglregistrasikelas'     =>  $RsData->tglregistrasikelas,
            'tglsertifikat'     =>  $RsData->tglsertifikat,
            'idjemaat'     =>  $RsData->idjemaat,
            'idkelas'     =>  $RsData->idkelas,
            'nomorsertifikat'     =>  $RsData->nomorsertifikat,
            'linkurlsertifikat'     =>  $RsData->linkurlsertifikat,
        );

        echo (json_encode($data));
    }

    public function inputnilaimateri($idregistrasikelas)
    {
        $rsregistrasi = $this->Registrasikelas_model->get_by_id($idregistrasikelas)->row();

        $data['rowkelas'] = $this->db->query("select * from kelas where idkelas='" . $rsregistrasi->idkelas . "'")->row();
        $data['rsregistrasi'] = $rsregistrasi;
        $data['idregistrasikelas'] = $idregistrasikelas;
        $data['menu'] = $rsregistrasi->idkelas;
        $this->load->view('registrasikelas/inputnilaimateri', $data);
    }

    public function simpanmateri()
    {
        $idregistrasikelas = $this->input->post('idregistrasikelas');
        $idkelas = $this->input->post('idkelas');

        // echo "select create_idregistrasikelasmateri('".$idregistrasikelas."' as idregistrasikelasmateri)";
        // exit();
        $rsmateri = $this->Registrasikelas_model->getmateri($idkelas);
        if ($rsmateri->num_rows() > 0) {

            $this->db->query("delete from registrasikelasmateri where idregistrasikelas='$idregistrasikelas'");


            foreach ($rsmateri->result() as $rowmateri) {

                $idregistrasikelasmateri = $this->db->query("select create_idregistrasikelasmateri('" . $idregistrasikelas . "') as idregistrasikelasmateri")->row()->idregistrasikelasmateri;

                $datamateri = array(
                    'idregistrasikelasmateri' => $idregistrasikelasmateri,
                    'idregistrasikelas' => $idregistrasikelas,
                    'idkelasmateri' => $rowmateri->idkelasmateri,
                    'judulmateri' => $rowmateri->judulmateri,
                    'tglpelaksanaan' => tgldb($this->input->post("tglpelaksanaan" . $rowmateri->idkelasmateri)),
                    'nilaimateri' => $this->input->post("nilaimateri" . $rowmateri->idkelasmateri),
                );

                $simpan = $this->Registrasikelas_model->simpanmateri($datamateri);
            }
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
        redirect('registrasikelas/index/' . $idkelas);
    }

    public function get_edit_data_nilai()
    {
        $idregistrasikelas = $this->input->get('idregistrasikelas');

        $rsnilai =  $this->db->query("select * from registrasikelasmateri where idregistrasikelas='" . $idregistrasikelas . "'");
        echo json_encode($rsnilai->result());
    }


    public function cetaksertifikat($idregistrasikelas)
    {

        // error_reporting(0);
        $this->load->library('Pdf');


        $rsregistrasi         = $this->db->query("
                                        select * from v_registrasikelas where idregistrasikelas='" . $idregistrasikelas . "'
                                    ")->row();

        $idkelas = $rsregistrasi->idkelas;
        switch ($idkelas) {
            case 'KL002':
                $report = 'sertifikatfc1';
                break;
            case 'KL003':
                $report = 'sertifikatfc2';
                break;
            case 'KL004':
                $report = 'sertifikatfc3';
                break;
            case 'KL005':
                $report = 'sertifikatgrade1';
                break;
            case 'KL006':
                $report = 'sertifikatgrade2';
                break;
            case 'KL007':
                $report = 'sertifikatgrade3';
                break;
            case 'KL008':
                $report = 'sertifikatvc';
                break;
            case 'KL101':
                $report = 'sertifikatpmc';
                break;
            default:
                $report = '';
                break;
        }

        $data['rsregistrasi'] = $rsregistrasi;
        $data['idregistrasikelas'] = $idregistrasikelas;
        $this->load->view('registrasikelas/' . $report, $data);
    }
}

/* End of file Registrasikelas.php */
/* Location: ./application/controllers/Registrasikelas.php */