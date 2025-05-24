<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonandoa extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Permohonandoa_model');
    }

    public function index($idmenu = "")
    {
        $rsPermohonanDoa = $this->Permohonandoa_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsPermohonanDoa'] = $rsPermohonanDoa;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('permohonandoa/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idpermohonan'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('permohonandoa/form', $data);
    }


    public function edit($idpermohonan, $idmenu = "")
    {
        $idpermohonan = $this->encrypt->decode($idpermohonan);

        $rsPermohonanDoa = $this->Permohonandoa_model->getByID($idpermohonan);
        if ($rsPermohonanDoa->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('permohonandoa');
        }
        $rowKonseling = $rsPermohonanDoa->row();

        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('permohonandoa');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowKonseling'] = $rowKonseling;
        $data['idpermohonan'] = $idpermohonan;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('permohonandoa/form', $data);
    }

    public function simpan()
    {
        $idpermohonan = $this->input->post("idpermohonan");
        $nohpyangbisadihubungi = htmlspecialchars($this->input->post("nohpyangbisadihubungi"));
        $keteranganpermohonan = htmlspecialchars($this->input->post("keteranganpermohonan"));
        $idjenispermohonandoa = $this->input->post("idjenispermohonandoa");
        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idpermohonan)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjenispermohonandoa' => $idjenispermohonandoa,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'status' => $status,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'perihaldoa' => $keteranganpermohonan,
            );
            $simpan = $this->Permohonandoa_model->simpan($data);
        } else {
            $data = array(
                'idjenispermohonandoa' => $idjenispermohonandoa,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'perihaldoa' => $keteranganpermohonan,
            );
            $simpan = $this->Permohonandoa_model->update($data, $idpermohonan);
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
        redirect('permohonansaya');
    }

    public function hapus($idpermohonan)
    {
        $idpermohonan = $this->encrypt->decode($idpermohonan);
        $rsPermohonanDoa = $this->Permohonandoa_model->getByID($idpermohonan);
        if ($rsPermohonanDoa->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan konseling tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('permohonandoa');
        }

        $rowKonseling = $rsPermohonanDoa->row();
        if ($rowKonseling->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKonseling->status . "', 'Status permohonan konseling sudah " . $rowKonseling->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('permohonandoa');
        }

        $hapus = $this->Permohonandoa_model->hapus($idpermohonan);
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
        redirect('permohonansaya');
    }

    public function get_edit_data()
    {
        $idpermohonan = $this->input->get('idpermohonan');

        $rsPermohonanDoa = $this->Permohonandoa_model->getByID($idpermohonan);

        $dataEdit = array();
        if ($rsPermohonanDoa->num_rows() > 0) {
            $row = $rsPermohonanDoa->row();
            $dataEdit = array(
                'idpermohonan' => $row->idpermohonan,
                'idjenispermohonandoa' => $row->idjenispermohonandoa,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
                'perihaldoa' => $row->perihaldoa,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Permohonandoa.php */
/* Location: ./application/controllers/Permohonandoa.php */