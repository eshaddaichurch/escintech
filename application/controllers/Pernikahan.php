<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pernikahan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Pernikahan_model');
    }

    public function index($idmenu = "")
    {
        $rsPernikahan = $this->Pernikahan_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsPernikahan'] = $rsPernikahan;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('pernikahan/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idpernikahan'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('pernikahan/form', $data);
    }


    public function edit($idpernikahan, $idmenu = "")
    {
        $idpernikahan = $this->encrypt->decode($idpernikahan);

        $rsPernikahan = $this->Pernikahan_model->getByID($idpernikahan);
        if ($rsPernikahan->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan pernikahan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pernikahan');
        }
        $rowPernikahan = $rsPernikahan->row();

        if ($rowPernikahan->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowPernikahan->status . "', 'Status permohonan pernikahan sudah " . $rowPernikahan->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pernikahan');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowPernikahan'] = $rowPernikahan;
        $data['idpernikahan'] = $idpernikahan;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('pernikahan/form', $data);
    }

    public function simpan()
    {
        $idpernikahan = $this->input->post("idpernikahan");
        $nohpyangbisadihubungi = $this->input->post("nohpyangbisadihubungi");
        $keterangan = $this->input->post("keterangan");
        $namamempelaipria = $this->input->post("namamempelaipria");
        $namaayahpria = $this->input->post("namaayahpria");
        $namaibupria = $this->input->post("namaibupria");
        $namamempelaiwanita = $this->input->post("namamempelaiwanita");
        $namaayahwanita = $this->input->post("namaayahwanita");
        $namaibuwanita = $this->input->post("namaibuwanita");
        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idpernikahan)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'status' => $status,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keterangan' => $keterangan,
                'namamempelaipria' => $namamempelaipria,
                'namaayahpria' => $namaayahpria,
                'namaibupria' => $namaibupria,
                'namamempelaiwanita' => $namamempelaiwanita,
                'namaayahwanita' => $namaayahwanita,
                'namaibuwanita' => $namaibuwanita,
            );
            $simpan = $this->Pernikahan_model->simpan($data);
        } else {
            $data = array(
                'idjemaat' => $this->session->userdata('idjemaat'),
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keterangan' => $keterangan,
                'namamempelaipria' => $namamempelaipria,
                'namaayahpria' => $namaayahpria,
                'namaibupria' => $namaibupria,
                'namamempelaiwanita' => $namamempelaiwanita,
                'namaayahwanita' => $namaayahwanita,
                'namaibuwanita' => $namaibuwanita,
            );
            $simpan = $this->Pernikahan_model->update($data, $idpernikahan);
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
        redirect('pernikahan');
    }

    public function hapus($idpernikahan)
    {
        $idpernikahan = $this->encrypt->decode($idpernikahan);
        $rsPernikahan = $this->Pernikahan_model->getByID($idpernikahan);
        if ($rsPernikahan->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan pernikahan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pernikahan');
        }

        $rowPernikahan = $rsPernikahan->row();
        if ($rowPernikahan->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowPernikahan->status . "', 'Status permohonan pernikahan sudah " . $rowPernikahan->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pernikahan');
        }

        $hapus = $this->Pernikahan_model->hapus($idpernikahan);
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
        redirect('pernikahan');
    }

    public function get_edit_data()
    {
        $idpernikahan = $this->input->get('idpernikahan');

        $rsPernikahan = $this->Pernikahan_model->getByID($idpernikahan);

        $dataEdit = array();
        if ($rsPernikahan->num_rows() > 0) {
            $row = $rsPernikahan->row();
            $dataEdit = array(
                'idpernikahan' => $row->idpernikahan,
                'keterangan' => $row->keterangan,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
                'namamempelaipria' => $row->namamempelaipria,
                'namaayahpria' => $row->namaayahpria,
                'namaibupria' => $row->namaibupria,
                'namamempelaiwanita' => $row->namamempelaiwanita,
                'namaayahwanita' => $row->namaayahwanita,
                'namaibuwanita' => $row->namaibuwanita,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Pernikahan.php */
/* Location: ./application/controllers/Pernikahan.php */