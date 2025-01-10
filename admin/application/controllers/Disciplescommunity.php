<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciplescommunity extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Disciplescommunity_model');
        $this->load->library('image_lib');
        $this->session->set_userdata('IDMENUSELECTED', 'M501');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'disciplescommunity';  //
        $this->load->view('disciplescommunity/listdata', $data);
    }

    public function tambah()
    {
        $data['iddc'] = '';
        $data['menu'] = 'disciplescommunity';
        $this->load->view('disciplescommunity/form', $data);
    }

    public function edit($iddc)
    {
        $iddc = $this->encrypt->decode($iddc);

        if ($this->Disciplescommunity_model->get_by_id($iddc)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('disciplescommunity');
            exit();
        };
        $data['iddc'] = $iddc;
        $data['menu'] = 'disciplescommunity';
        $this->load->view('disciplescommunity/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Disciplescommunity_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {

                $fotodc = '';
                if (!empty($rowdata->fotodc)) {
                    $fotodc = base_url('uploads/dc/' . $rowdata->fotodc);
                } else {
                    $fotodc = base_url('images/nofoto.png');
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = '<img src="' . $fotodc . '" alt="" style=" width: 80%;">';
                $row[] = $rowdata->namadc . '<br><small>Kategori: ' . $rowdata->kategoridc . '</small>';
                $row[] = $rowdata->alamatdc . '<br><small style="color: #6EACDA">' . $rowdata->namakabupaten . '<br>' . $rowdata->namakecamatan . '</small>';

                $row[] = $rowdata->namadm;
                $row[] = $rowdata->haridc . ', Jam: ' . $rowdata->jamdc;
                $row[] = $rowdata->statusaktif;
                $row[] = '<a href="' . site_url('disciplescommunity/edit/' . $this->encrypt->encode($rowdata->iddc)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="' . site_url('disciplescommunity/delete/' . $this->encrypt->encode($rowdata->iddc)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Disciplescommunity_model->count_all(),
            "recordsFiltered" => $this->Disciplescommunity_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete($iddc)
    {
        $iddc = $this->encrypt->decode($iddc);
        $rsdata = $this->Disciplescommunity_model->get_by_id($iddc);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('disciplescommunity');
            exit();
        };

        $hapus = $this->Disciplescommunity_model->hapus($iddc);
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
        redirect('disciplescommunity');
    }

    public function simpan()
    {
        $iddc             = $this->input->post('iddc');
        $namadc             = $this->input->post('namadc');
        $kategoridc             = $this->input->post('kategoridc');
        $haridc             = $this->input->post('haridc');
        $jamdc             = $this->input->post('jamdc');
        $alamatdc             = $this->input->post('alamatdc');
        $fotodc             = $this->input->post('fotodc');
        $statusaktif             = $this->input->post('statusaktif');
        $idjemaatdm        = $this->input->post('idjemaatdm');
        $idkabupaten        = $this->input->post('idkabupaten');
        $idkecamatan        = $this->input->post('idkecamatan');
        $idkelurahan        = $this->input->post('idkelurahan');



        if ($iddc == '') {

            $fotodc = $this->upload_foto($_FILES, "fotodc");

            $iddc = $this->db->query("select create_iddc('" . $namadc . "') as iddc")->row()->iddc;

            $data = array(
                'iddc'   => $iddc,
                'namadc'   => $namadc,
                'kategoridc'   => $kategoridc,
                'haridc'   => $haridc,
                'jamdc'   => $jamdc,
                'alamatdc'   => $alamatdc,
                'fotodc'   => $fotodc,
                'statusaktif'   => $statusaktif,
                'idjemaatdm' => $idjemaatdm,
                'tanggalinsert'   => date('Y-m-d H:i:s'),
                'tanggalupdate'   => date('Y-m-d H:i:s'),
                'idkabupaten' => $idkabupaten,
                'idkecamatan' => $idkecamatan,
                'iddesa' => $idkelurahan,

            );
            $simpan = $this->Disciplescommunity_model->simpan($data);
        } else {

            $fotodc_lama = $this->input->post('fotodc_lama');
            $fotodc = $this->update_upload_foto($_FILES, "fotodc", $fotodc_lama);

            $data = array(
                'iddc'   => $iddc,
                'namadc'   => $namadc,
                'kategoridc'   => $kategoridc,
                'haridc'   => $haridc,
                'jamdc'   => $jamdc,
                'alamatdc'   => $alamatdc,
                'fotodc'   => $fotodc,
                'statusaktif'   => $statusaktif,
                'idjemaatdm' => $idjemaatdm,
                'tanggalupdate'   => date('Y-m-d H:i:s'),
                'idkabupaten' => $idkabupaten,
                'idkecamatan' => $idkecamatan,
                'iddesa' => $idkelurahan,
            );
            $simpan = $this->Disciplescommunity_model->update($data, $iddc);
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
        redirect('disciplescommunity');
    }


    public function get_edit_data()
    {

        $iddc = $this->input->post('iddc');
        $RsData = $this->Disciplescommunity_model->get_by_id($iddc)->row();

        $data = array(
            'iddc'   => $RsData->iddc,
            'namadc'   => $RsData->namadc,
            'kategoridc'   => $RsData->kategoridc,
            'haridc'   => $RsData->haridc,
            'jamdc'   => $RsData->jamdc,
            'alamatdc'   => $RsData->alamatdc,
            'fotodc'   => $RsData->fotodc,
            'statusaktif'   => $RsData->statusaktif,
            'idjemaatdm' => $RsData->idjemaatdm,
            'idkabupaten' => $RsData->idkabupaten,
            'idkecamatan' => $RsData->idkecamatan,
            'iddesa' => $RsData->iddesa,
            'tanggalupdate'   => date('Y-m-d H:i:s'),
        );

        echo (json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/dc/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']             = '2000KB';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = "";
            }
        } else {
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/dc/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';


            $this->load->library('upload', $config);
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = $file_lama;
            }
        } else {
            $foto = $file_lama;
        }

        return $foto;
    }


    public function getKecamatan()
    {
        $idkabupaten = $this->input->get('idkabupaten');
        $query = $this->db->query("
            select * from kecamatan where idkabupaten='$idkabupaten' order by namakecamatan
        ");
        echo json_encode($query->result());
    }

    public function getKelurahan()
    {
        $idkecamatan = $this->input->get('idkecamatan');
        $query = $this->db->query("
            select * from desa where idkecamatan='$idkecamatan' order by namadesa
        ");
        echo json_encode($query->result());
    }
}
