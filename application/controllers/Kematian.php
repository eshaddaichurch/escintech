<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kematian extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Kematian_model');
    }

    public function index($idmenu = "")
    {
        $rsKematian = $this->Kematian_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsKematian'] = $rsKematian;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kematian/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idkematian'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kematian/form', $data);
    }


    public function edit($idkematian, $idmenu = "")
    {
        $idkematian = $this->encrypt->decode($idkematian);

        $rsKematian = $this->Kematian_model->getByID($idkematian);
        if ($rsKematian->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data kematian tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kematian');
        }
        $rowKematian = $rsKematian->row();

        if ($rowKematian->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKematian->status . "', 'Status kematian sudah " . $rowKematian->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kematian');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowKematian'] = $rowKematian;
        $data['idkematian'] = $idkematian;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kematian/form', $data);
    }

    public function simpan()
    {
        $idkematian = $this->input->post("idkematian");
        $namayangmeninggal = $this->input->post("namayangmeninggal");
        $tglmeninggal = $this->input->post("tglmeninggal");
        $umuryangmeninggal = $this->input->post("umuryangmeninggal");
        $jeniskelaminyangmeninggal = $this->input->post("jeniskelaminyangmeninggal");
        $hubungankeluarga = $this->input->post("hubungankeluarga");
        $nohpyangbisadihubungi = htmlspecialchars($this->input->post("nohpyangbisadihubungi"));
        $keteranganpermohonan = htmlspecialchars($this->input->post("keteranganpermohonan"));

        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idkematian)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'namayangmeninggal' => $namayangmeninggal,
                'hubungankeluarga' => $hubungankeluarga,
                'keterangan' => $keteranganpermohonan,
                'tglmeninggal' => $tglmeninggal,
                'jeniskelaminyangmeninggal' => $jeniskelaminyangmeninggal,
                'umuryangmeninggal' => $umuryangmeninggal,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'status' => $status,
            );

            $simpan = $this->Kematian_model->simpan($data);
        } else {
            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'namayangmeninggal' => $namayangmeninggal,
                'tglmeninggal' => $tglmeninggal,
                'umuryangmeninggal' => $umuryangmeninggal,
                'hubungankeluarga' => $hubungankeluarga,
                'status' => $status,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'keterangan' => $keteranganpermohonan,
            );
            $simpan = $this->Kematian_model->update($data, $idkematian);
        }

        if ($simpan) {
            $pesan = "<script>
                            swal('Berhasil', 'Permohonan berhasil disimpan.', 'success');
                        </script>";
        } else {
            $eror = $this->db->error();
            // var_dump($eror);
            // exit();
            // $pesan = "<script>
            //                 swal('Gagal', 'Permohonan gagal disimpan. Pesan Error: " . $eror["code"] . " " . $eror["message"] . "', 'warning');
            //             </script>";

            $pesan = "<script>
                            swal('Gagal', 'Permohonan gagal disimpan.', 'warning');
                        </script>";
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('permohonansaya');
    }

    public function hapus($idkematian)
    {
        $idkematian = $this->encrypt->decode($idkematian);
        $rsKematian = $this->Kematian_model->getByID($idkematian);
        if ($rsKematian->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kematian');
        }

        $rowKematian = $rsKematian->row();
        if ($rowKematian->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKematian->status . "', 'Status permohonan konseling sudah " . $rowKematian->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kematian');
        }

        $hapus = $this->Kematian_model->hapus($idkematian);
        if ($hapus) {
            $pesan = "<script>
                            swal('Berhasil', 'Permohonan berhasil dihapus.', 'success');
                        </script>";
        } else {
            $eror = $this->db->error();
            $pesan = "<script>
                            swal('Gagal', 'Permohonan gagal dihapus. Pesan Error: " . $eror['code'] . " " . $eror['message'] . "', 'warning');
                        </script>";
        }
        $this->session->set_flashdata('pesan', $pesan);
        redirect('permohonansaya');
    }

    public function get_edit_data()
    {
        $idkematian = $this->input->get('idkematian');

        $rsKematian = $this->Kematian_model->getByID($idkematian);

        $dataEdit = array();
        if ($rsKematian->num_rows() > 0) {
            $row = $rsKematian->row();
            $dataEdit = array(
                'idkematian' => $row->idkematian,
                'namayangmeninggal' => $row->namayangmeninggal,
                'hubungankeluarga' => $row->hubungankeluarga,
                'keterangan' => $row->keterangan,
                'tglmeninggal' => $row->tglmeninggal,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
                'jeniskelaminyangmeninggal' => $row->jeniskelaminyangmeninggal,
                'umuryangmeninggal' => $row->umuryangmeninggal,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Kematian.php */
/* Location: ./application/controllers/Kematian.php */