<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Baptisan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Baptisan_model');
    }

    public function index($idmenu = "")
    {
        $rsBaptisan = $this->Baptisan_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsBaptisan'] = $rsBaptisan;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('baptisan/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idcarebaptisan'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('baptisan/form', $data);
    }


    public function edit($idcarebaptisan, $idmenu = "")
    {
        $idcarebaptisan = $this->encrypt->decode($idcarebaptisan);

        $rsBaptisan = $this->Baptisan_model->getByID($idcarebaptisan);
        if ($rsBaptisan->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan baptisan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('baptisan');
        }
        $rowBaptisan = $rsBaptisan->row();

        if ($rowBaptisan->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowBaptisan->status . "', 'Status permohonan baptisan sudah " . $rowBaptisan->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('baptisan');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowBaptisan'] = $rowBaptisan;
        $data['idcarebaptisan'] = $idcarebaptisan;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('baptisan/form', $data);
    }

    public function simpan()
    {
        $idcarebaptisan = $this->input->post("idcarebaptisan");
        $tglpermohonan = date('Y-m-d H:i:s');
        $nohpyangbisadihubungi = $this->input->post("nohpyangbisadihubungi");
        $keteranganpermohonan = $this->input->post("keteranganpermohonan");
        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idcarebaptisan)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'status' => $status,
                'tglpermohonan' => $tglpermohonan,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Baptisan_model->simpan($data);
        } else {
            $data = array(
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Baptisan_model->update($data, $idcarebaptisan);
        }

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
        redirect('baptisan');
    }

    public function hapus($idcarebaptisan)
    {
        $idcarebaptisan = $this->encrypt->decode($idcarebaptisan);
        $rsBaptisan = $this->Baptisan_model->getByID($idcarebaptisan);
        if ($rsBaptisan->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan baptisan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('baptisan');
        }

        $rowBaptisan = $rsBaptisan->row();
        if ($rowBaptisan->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowBaptisan->status . "', 'Status permohonan baptisan sudah " . $rowBaptisan->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('baptisan');
        }

        $hapus = $this->Baptisan_model->hapus($idcarebaptisan);
        if ($hapus) {
            $pesan = "<script>
                            swal('Berhasil', 'Permohonan berhasil dihapus.', 'success');
                        </script>";
        } else {
            $pesan = "<script>
                            swal('Gagal', 'Permohonan gagal dihapus.', 'warning');
                        </script>";
        }
        $this->session->set_flashdata('pesan', $pesan);
        redirect('baptisan');
    }

    public function get_edit_data()
    {
        $idcarebaptisan = $this->input->get('idcarebaptisan');

        $rsBaptisan = $this->Baptisan_model->getByID($idcarebaptisan);

        $dataEdit = array();
        if ($rsBaptisan->num_rows() > 0) {
            $row = $rsBaptisan->row();
            $dataEdit = array(
                'idcarebaptisan' => $row->idcarebaptisan,
                'keteranganpermohonan' => $row->keteranganpermohonan,
                'tglpermohonan' => $row->tglpermohonan,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Baptisan.php */
/* Location: ./application/controllers/Baptisan.php */