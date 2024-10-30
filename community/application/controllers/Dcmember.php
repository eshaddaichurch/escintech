<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dcmember extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('DcmemberModel');
        $this->load->library('image_lib');
    }

    public function index()
    {
        $data['menu'] = 'dcmember';
        $this->load->view('dcmember/index', $data);
    }

    public function tambah()
    {
        $data['iddc'] = '';
        $data['menu'] = 'ddcmember';
        $this->load->view('dcmember/form', $data);
    }

    public function edit($iddcmember)
    {
        $iddcmember = $this->encrypt->decode($iddcmember);

        if ($this->DcmemberModel->get_by_id($iddcmember)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('dcmember');
            exit();
        };
        $data['iddcmember'] = $iddcmember;
        $data['menu'] = 'dcmember';
        $this->load->view('dcmember/form', $data);
    }

    public function datatablesource()
    {
        $this->db->reset_query();
        $Datatables = new $this->Datatables;
        $Datatables->tabelview = 'v_dcmember';
        $Datatables->column_order = array(null, null, 'iddcmember', 'iddc', 'namadc', 'namalengkap', 'statuskeanggotaan', 'keterangan', 'statusaktif', null);
        $Datatables->column_search = array('iddcmember', 'iddc', 'namadc', 'namalengkap', 'statuskeanggotaan', 'keterangan');
        $Datatables->order_array = array('iddcmember' => 'desc');
        $where = '';
        $where .= " iddc = '" . $this->session->userdata('iddc') . "'";

        $Datatables->where_condition = $where;

        // static value
        $Datatables->search_value = $this->input->post('search')['value'];
        $Datatables->length_row = $this->input->post('length');
        $Datatables->start_row = $this->input->post('start');
        $urutkan = $this->input->post('order');
        if (isset($urutkan)) {
            $Datatables->num_order_colomn = $urutkan['0']['column'];
            $Datatables->num_order_dir = $urutkan['0']['dir'];
        } else {
            $Datatables->num_order_colomn = NULL;
            $Datatables->num_order_colomn = NULL;
        }
        //-- 

        $RsData = $Datatables->get_datatables();
        $no = $this->input->post('start');
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {

                if (!empty($rowdata->foto)) {
                    $foto = '<img src="' . base_url("../admin/uploads/jemaat/" . $rowdata->foto) . '" alt=""  
                    >';
                } else {
                    $foto = '<img src="' . base_url('images/user-01.png') . '" alt="" style="width:100%;">';
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $foto;
                $row[] = $rowdata->namalengkap . ' / ' . $rowdata->iddcmember;
                $row[] = $rowdata->namadc . '<br><small>' . $rowdata->namadm . '</small>';
                $row[] = $rowdata->statuskeanggotaan;
                $row[] = $rowdata->keterangan;
                $row[] = $rowdata->statusaktif;
                $row[] = '<a href="' . site_url('dcmember/edit/' . $this->encrypt->encode($rowdata->iddcmember)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                                <a href="' . site_url('dcmember/delete/' . $this->encrypt->encode($rowdata->iddcmember)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $Datatables->count_all(),
            "recordsFiltered" => $Datatables->count_filtered(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

    public function delete($iddcmember)
    {
        $iddcmember = $this->encrypt->decode($iddcmember);
        $rsdata = $this->DcmemberModel->get_by_id($iddcmember);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    <strong>Ilegal!</strong> Data tidak ditemukan! 
                                                </div>
                                            </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('dcmember ');
            exit();
        };

        $hapus = $this->DcmemberModel->hapus($iddcmember);
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
        redirect('dcmember');
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

            $simpan = $this->DcmemberModel->simpan($data);
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
            $simpan = $this->DcmemberModel->update($data, $iddcmember);
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
        redirect('dcmember');
    }


    public function get_edit_data()
    {

        $iddcmember = $this->input->post('iddcmember');
        $RsData = $this->DcmemberModel->get_by_id($iddcmember)->row();

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
}
