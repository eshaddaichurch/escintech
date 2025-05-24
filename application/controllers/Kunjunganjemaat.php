<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjunganjemaat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Kunjunganjemaat_model');
    }

    public function index($idmenu = "")
    {
        $rsKunjunganJemaat = $this->Kunjunganjemaat_model->getAll();
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsKunjunganJemaat'] = $rsKunjunganJemaat;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kunjunganjemaat/index', $data);
    }


    public function tambah($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['idkunjunganjemaat'] = '';
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kunjunganjemaat/form', $data);
    }


    public function edit($idkunjunganjemaat, $idmenu = "")
    {
        $idkunjunganjemaat = $this->encrypt->decode($idkunjunganjemaat);

        $rsKunjunganJemaat = $this->Kunjunganjemaat_model->getByID($idkunjunganjemaat);
        if ($rsKunjunganJemaat->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan kunjungan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kunjunganjemaat');
        }
        $rowKunjunganJemaat = $rsKunjunganJemaat->row();

        if ($rowKunjunganJemaat->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKunjunganJemaat->status . "', 'Status permohonan kunjungan sudah " . $rowKunjunganJemaat->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kunjunganjemaat');
        }


        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowKunjunganJemaat'] = $rowKunjunganJemaat;
        $data['idkunjunganjemaat'] = $idkunjunganjemaat;
        $data['menu'] = $idmenu;
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $this->load->view('kunjunganjemaat/form', $data);
    }

    public function simpan()
    {
        $idkunjunganjemaat = $this->input->post("idkunjunganjemaat");
        $idjeniskunjunganjemaat = $this->input->post("idjeniskunjunganjemaat");
        $nohpyangbisadihubungi = $this->input->post("nohpyangbisadihubungi");
        $alamatjemaat = $this->input->post("alamatjemaat");
        $keterangankunjungan = $this->input->post("keterangankunjungan");
        $tglinsert = date('Y-m-d H:i:s');
        $status = 'Permohonan';

        if (empty($idkunjunganjemaat)) {

            $data = array(
                'tglinsert' => $tglinsert,
                'idjemaat' => $this->session->userdata('idjemaat'),
                'status' => $status,
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'idjeniskunjunganjemaat' => $idjeniskunjunganjemaat,
                'alamatjemaat' => $alamatjemaat,
                'keterangankunjungan' => $keterangankunjungan,
            );
            $simpan = $this->Kunjunganjemaat_model->simpan($data);
        } else {
            $data = array(
                'nohpyangbisadihubungi' => $nohpyangbisadihubungi,
                'idjeniskunjunganjemaat' => $idjeniskunjunganjemaat,
                'alamatjemaat' => $alamatjemaat,
                'keterangankunjungan' => $keterangankunjungan,
            );
            $simpan = $this->Kunjunganjemaat_model->update($data, $idkunjunganjemaat);
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

    public function hapus($idkunjunganjemaat)
    {
        $idkunjunganjemaat = $this->encrypt->decode($idkunjunganjemaat);
        $rsKunjunganJemaat = $this->Kunjunganjemaat_model->getByID($idkunjunganjemaat);

        if ($rsKunjunganJemaat->num_rows() == 0) {
            $pesan = "<script>
                            swal('Upss', 'Data permohonan kunjungan tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kunjunganjemaat');
        }

        $rowKunjunganJemaat = $rsKunjunganJemaat->row();
        if ($rowKunjunganJemaat->status != "Permohonan") {
            $pesan = "<script>
                            swal('Sudah " . $rowKunjunganJemaat->status . "', 'Status permohonan kunjungan sudah " . $rowKunjunganJemaat->status . ", sehingga tidak boleh dihapus lagi.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kunjunganjemaat');
        }

        $hapus = $this->Kunjunganjemaat_model->hapus($idkunjunganjemaat);
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
        $idkunjunganjemaat = $this->input->get('idkunjunganjemaat');

        $rsKunjunganJemaat = $this->Kunjunganjemaat_model->getByID($idkunjunganjemaat);

        $dataEdit = array();
        if ($rsKunjunganJemaat->num_rows() > 0) {
            $row = $rsKunjunganJemaat->row();
            $dataEdit = array(
                'idkunjunganjemaat' => $row->idkunjunganjemaat,
                'idjeniskunjunganjemaat' => $row->idjeniskunjunganjemaat,
                'keterangankunjungan' => $row->keterangankunjungan,
                'nohpyangbisadihubungi' => $row->nohpyangbisadihubungi,
                'alamatjemaat' => $row->alamatjemaat,
            );
        }
        echo json_encode($dataEdit);
    }
}

/* End of file Kunjunganjemaat.php */
/* Location: ./application/controllers/Kunjunganjemaat.php */