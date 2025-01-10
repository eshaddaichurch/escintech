<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konseling extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Konseling_model');
    }

    public function index($idmenu = "")
    {
        $rsKonseling = $this->Konseling_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsKonseling'] = $rsKonseling;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('konseling/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idcarekonseling'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('konseling/form', $data);
    }


    public function edit($idcarekonseling, $idmenu = "")
    {
        $idcarekonseling = $this->encrypt->decode($idcarekonseling);

        $rsKonseling = $this->Konseling_model->getByID($idcarekonseling);
        if ($rsKonseling->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konseling');
        }
        $rowKonseling = $rsKonseling->row();

        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konseling');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowKonseling'] = $rowKonseling;
        $data['idcarekonseling'] = $idcarekonseling;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('konseling/form', $data);
    }

    public function simpan()
    {
        $idcarekonseling = $this->input->post("idcarekonseling");
        $tglpermohonan = $this->input->post("tglpermohonan");
        $nohpyangbisadihubungi = $this->input->post("nohpyangbisadihubungi");
        $keteranganpermohonan = $this->input->post("keteranganpermohonan");
        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idcarekonseling)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'status' => $status,
                'tglpermohonan' => $tglpermohonan,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Konseling_model->simpan($data);
        } else {
            $data = array(
                'tglpermohonan' => $tglpermohonan,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Konseling_model->update($data, $idcarekonseling);
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
        redirect('konseling');
    }

    public function hapus($idcarekonseling)
    {
        $idcarekonseling = $this->encrypt->decode($idcarekonseling);
        $rsKonseling = $this->Konseling_model->getByID($idcarekonseling);
        if ($rsKonseling->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konseling');
        }

        $rowKonseling = $rsKonseling->row();
        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konseling');
        }

        $hapus = $this->Konseling_model->hapus($idcarekonseling);
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
        redirect('konseling');
    }

    public function get_edit_data()
    {
        $idcarekonseling = $this->input->get('idcarekonseling');

        $rsKonseling = $this->Konseling_model->getByID($idcarekonseling);

        $dataEdit = array();
        if ($rsKonseling->num_rows() > 0) {
            $row = $rsKonseling->row();
            $dataEdit = array(
                'idcarekonseling' => $row->idcarekonseling,
                'keteranganpermohonan' => $row->keteranganpermohonan,
                'tglpermohonan' => $row->tglpermohonan,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Konseling.php */
/* Location: ./application/controllers/Konseling.php */