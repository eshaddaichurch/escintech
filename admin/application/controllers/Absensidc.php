<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensidc extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Absensidc_model');
        $this->load->library('image_lib');
        $this->session->set_userdata('IDMENUSELECTED', 'M503');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'absensidc';
        $this->load->view('absensidc/listdata', $data);
    }

    public function tambah()
    {
        $data['iddc'] = '';
        $data['menu'] = 'absensidc';
        $this->load->view('absensidc/form', $data);
    }

    public function edit($iddcmember)
    {
        $iddcmember = $this->encrypt->decode($iddcmember);

        if ($this->Absensidc_model->get_by_id($iddcmember)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('absensidc');
            exit();
        };
        $data['iddcmember'] = $iddcmember;
        $data['menu'] = 'absensidc';
        $this->load->view('absensidc/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Absensidc_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->iddcmember;
                $row[] = $rowdata->iddc;
                $row[] = $rowdata->namadc . '<br><small>' . $rowdata->namadm . '</small>';
                $row[] = $rowdata->namalengkap;
                $row[] = $rowdata->statuskeanggotaan;
                $row[] = $rowdata->keterangan;
                $row[] = $rowdata->statusaktif;
                $row[] = '<a href="' . site_url('absensidc/edit/' . $this->encrypt->encode($rowdata->iddcmember)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                                <a href="' . site_url('absensidc/delete/' . $this->encrypt->encode($rowdata->iddcmember)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Absensidc_model->count_all(),
            "recordsFiltered" => $this->Absensidc_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete($iddcmember)
    {
        $iddcmember = $this->encrypt->decode($iddcmember);
        $rsdata = $this->Absensidc_model->get_by_id($iddcmember);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    <strong>Ilegal!</strong> Data tidak ditemukan! 
                                                </div>
                                            </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('absensidc ');
            exit();
        };

        $hapus = $this->Absensidc_model->hapus($iddcmember);
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
        redirect('absensidc');
    }




    public function simpan()
    {
        $iddcmember             = $this->input->post('iddcmember');
        $iddc             = $this->input->post('iddc');
        $idjemaat             = $this->input->post('idjemaat');
        $statuskeanggotaan             = $this->input->post('statuskeanggotaan');
        $keterangan             = $this->input->post('keterangan');
        $tanggalinsert             = date('Y-m-d H:i:s');
        $tanggalupdate             = date('Y-m-d H:i:s');
        $statusaktif         = $this->input->post('statusaktif');


        if ($iddcmember == '') {

            $iddcmember = $this->db->query("select create_iddcmember('" . $iddc . "') as iddcmember")->row()->iddcmember;

            $data = array(
                'iddcmember'   => $iddcmember,
                'iddc'   => $iddc,
                'idjemaat'   => $idjemaat,
                'statuskeanggotaan'   => $statuskeanggotaan,
                'keterangan'   => $keterangan,
                'tanggalinsert'   => $tanggalinsert,
                'tanggalupdate'   => $tanggalupdate,
                'statusaktif'   => $statusaktif,
            );

            $simpan = $this->Absensidc_model->simpan($data);
        } else {

            $data = array(
                'iddcmember'   => $iddcmember,
                'iddc'   => $iddc,
                'idjemaat'   => $idjemaat,
                'statuskeanggotaan'   => $statuskeanggotaan,
                'keterangan'   => $keterangan,
                'tanggalinsert'   => $tanggalinsert,
                'tanggalupdate'   => $tanggalupdate,
                'statusaktif'   => $statusaktif,
            );
            $simpan = $this->Absensidc_model->update($data, $iddcmember);
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
        redirect('absensidc');
    }


    public function get_edit_data()
    {

        $iddcmember = $this->input->post('iddcmember');
        $RsData = $this->Absensidc_model->get_by_id($iddcmember)->row();

        $data = array(
            'iddcmember'   => $RsData->iddcmember,
            'iddc'   => $RsData->iddc,
            'idjemaat'   => $RsData->idjemaat,
            'statuskeanggotaan'   => $RsData->statuskeanggotaan,
            'keterangan'   => $RsData->keterangan,
            'statusaktif'   => $RsData->statusaktif,
        );
        echo json_encode($data);
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
}
