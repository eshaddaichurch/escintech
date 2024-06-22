<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahananak extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Penyerahananak_model');
    }

    public function index($idmenu = "")
    {
        $rsPenyerahanAnak = $this->Penyerahananak_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsPenyerahanAnak'] = $rsPenyerahanAnak;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('penyerahananak/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idpenyerahananak'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('penyerahananak/form', $data);
    }


    public function edit($idpenyerahananak, $idmenu = "")
    {
        $idpenyerahananak = $this->encrypt->decode($idpenyerahananak);

        $rsPenyerahanAnak = $this->Penyerahananak_model->getByID($idpenyerahananak);
        if ($rsPenyerahanAnak->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penyerahananak');
        }
        $rowKonseling = $rsPenyerahanAnak->row();

        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penyerahananak');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowKonseling'] = $rowKonseling;
        $data['idpenyerahananak'] = $idpenyerahananak;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('penyerahananak/form', $data);
    }

    public function simpan()
    {
        $idpenyerahananak = $this->input->post("idpenyerahananak");
        $namaanak = $this->input->post("namaanak");
        $tempatlahir = $this->input->post("tempatlahir");
        $tgllahir = $this->input->post("tgllahir");
        $namaayah = $this->input->post("namaayah");
        $namaibu = $this->input->post("namaibu");
        $nohpyangbisadihubungi = $this->input->post("nohpyangbisadihubungi");
        $keteranganpermohonan = $this->input->post("keteranganpermohonan");

        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idpenyerahananak)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'namaanak' => $namaanak,
                'tempatlahir' => $tempatlahir,
                'tgllahir' => $tgllahir,
                'namaayah' => $namaayah,
                'namaibu' => $namaibu,
                'status' => $status,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Penyerahananak_model->simpan($data);
        } else {
            $data = array(
                'namaanak' => $namaanak,
                'tempatlahir' => $tempatlahir,
                'tgllahir' => $tgllahir,
                'namaayah' => $namaayah,
                'namaibu' => $namaibu,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keteranganpermohonan' => $keteranganpermohonan,
            );
            $simpan = $this->Penyerahananak_model->update($data, $idpenyerahananak);
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
        redirect('penyerahananak');
    }

    public function hapus($idpenyerahananak)
    {
        $idpenyerahananak = $this->encrypt->decode($idpenyerahananak);
        $rsPenyerahanAnak = $this->Penyerahananak_model->getByID($idpenyerahananak);
        if ($rsPenyerahanAnak->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penyerahananak');
        }

        $rowKonseling = $rsPenyerahanAnak->row();
        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penyerahananak');
        }

        $hapus = $this->Penyerahananak_model->hapus($idpenyerahananak);
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
        redirect('penyerahananak');
    }

    public function get_edit_data()
    {
        $idpenyerahananak = $this->input->get('idpenyerahananak');

        $rsPenyerahanAnak = $this->Penyerahananak_model->getByID($idpenyerahananak);

        $dataEdit = array();
        if ($rsPenyerahanAnak->num_rows() > 0) {
            $row = $rsPenyerahanAnak->row();
            $dataEdit = array(
                'idpenyerahananak' => $row->idpenyerahananak,
                'namaanak' => $row->namaanak,
                'tempatlahir' => $row->tempatlahir,
                'tgllahir' => $row->tgllahir,
                'namaayah' => $row->namaayah,
                'namaibu' => $row->namaibu,
                'keteranganpermohonan' => $row->keteranganpermohonan,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
            );
        }
        echo json_encode($dataEdit);
    }
}
