<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Proyek_model');
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
            exit();
        }
    }

    public function index()
    {
        $data['menu'] = 'proyek';
        $this->load->view('proyek/listdata', $data);
    }

    public function tambah()
    {
        $data['idproyek'] = '';
        $data['menu']     = 'proyek';
        $this->load->view('proyek/form', $data);
    }

    public function edit($idproyek)
    {
        $idproyek = $this->encrypt->decode($idproyek);

        if ($this->Proyek_model->get_by_id($idproyek)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('proyek');
            exit();
        };
        $data['idproyek'] = $idproyek;
        $data['menu']     = 'proyek';
        $this->load->view('proyek/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Proyek_model->get_datatables();
        $no     = $_POST['start'];
        $data   = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row   = array();
                $row[] = $no;
                $row[] = $rowdata->namaproyek;
                $row[] = $rowdata->client;
                $row[] = $rowdata->alamatclient;
                $row[] = $rowdata->deskripsi;
                $row[] = '<a href="' . site_url('proyek/edit/' . $this->encrypt->encode($rowdata->idproyek)) . '" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> |
                        <a href="' . site_url('proyek/delete/' . $this->encrypt->encode($rowdata->idproyek)) . '" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Proyek_model->count_all(),
            "recordsFiltered" => $this->Proyek_model->count_filtered(),
            "data"            => $data,
        );
        echo json_encode($output);
    }

    public function delete($idproyek)
    {
        $idproyek = $this->encrypt->decode($idproyek);
        $rsdata   = $this->Proyek_model->get_by_id($idproyek);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('proyek');
            exit();
        };

        $hapus = $this->Proyek_model->hapus($idproyek);
        if ($hapus) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        } else {
            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('proyek');

    }

    public function simpan()
    {
        $idproyek         = $this->input->post('idproyek');
        $namaproyek       = $this->input->post('namaproyek');
        $idprojectmanager = $this->input->post('idprojectmanager');
        $idpengguna       = $this->input->post('idpengguna');
        $client           = $this->input->post('client');
        $alamatclient     = $this->input->post('alamatclient');
        $deskripsi        = $this->input->post('deskripsi');
        $tglinsert        = date('Y-m-d H:i:s');

        if ($idproyek == '') {

            $idproyek = $this->db->query("select create_idproyek('$client') as idproyek")->row()->idproyek;
            $data     = array(
                'idproyek'         => $idproyek,
                'namaproyek'       => $namaproyek,
                'client'           => $client,
                'alamatclient'     => $alamatclient,
                'deskripsi'        => $deskripsi,
                'idprojectmanager' => $idprojectmanager,
            );

            $arrDetail = array();
            foreach ($idpengguna as $key => $value) {
                array_push($arrDetail, array(
                    'idproyek'   => $idproyek,
                    'idpengguna' => $value,
                ));
            }

            $simpan = $this->Proyek_model->simpan($data, $arrDetail);
        } else {

            $data = array(
                'namaproyek'       => $namaproyek,
                'client'           => $client,
                'alamatclient'     => $alamatclient,
                'deskripsi'        => $deskripsi,
                'idprojectmanager' => $idprojectmanager,
            );

            $arrDetail = array();
            foreach ($idpengguna as $key => $value) {
                array_push($arrDetail, array(
                    'idproyek'   => $idproyek,
                    'idpengguna' => $value,
                ));
            }

            $simpan = $this->Proyek_model->update($data, $arrDetail, $idproyek);
        }

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : ' . $eror['code'] . ' ' . $eror['message'] . '
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('proyek');
    }

    public function get_edit_data()
    {
        $idproyek = $this->input->post('idproyek');
        $RsData   = $this->Proyek_model->get_by_id($idproyek)->row();

        $RsDetail = $this->db->query("select * from proyekdetail where idproyek='$idproyek'");

        $data = array(
            'idproyek'         => $RsData->idproyek,
            'namaproyek'       => $RsData->namaproyek,
            'client'           => $RsData->client,
            'alamatclient'     => $RsData->alamatclient,
            'deskripsi'        => $RsData->deskripsi,
            'idprojectmanager' => $RsData->idprojectmanager,
        );

        $dataDetail = array();

        if ($RsDetail->num_rows() > 0) {
            foreach ($RsDetail->result() as $row) {
                array_push($dataDetail, array(
                    'idproyek'   => $row->idproyek,
                    'idpengguna' => $row->idpengguna,
                ));
            }
        }
        echo (json_encode(array('data' => $data, 'dataDetail' => $dataDetail)));
    }

}

/* End of file Proyek.php */
/* Location: ./application/controllers/Proyek.php */
