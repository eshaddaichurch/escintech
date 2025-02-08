<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftarandcm extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Pendaftarandcm_model');
        $this->load->library('image_lib');
        $this->session->set_userdata('IDMENUSELECTED', 'M504');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'pendaftarandcm';  
        $this->load->view('pendaftarandcm/listdata', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pendaftarandcm_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {

                $fotodc = '';
                if (!empty($rowdata->fotodc)) {
                    $fotodc = base_url('uploads/jemaat/' . $rowdata->foto);
                } else {
                    $fotodc = base_url('images/nofoto.png');
                }

                switch ($rowdata->statuskonfirmasi) {
                    case 'Disetujui':
                        $statuskonfirmasi = '<span class="badge badge-success">'.$rowdata->statuskonfirmasi.'</span><br>'.since($rowdata->tglkonfirmasi);
                        break;
                    case 'Ditolak':
                        $statuskonfirmasi = '<span class="badge badge-danger">'.$rowdata->statuskonfirmasi.'</span><br>'.since($rowdata->tglkonfirmasi).'<br>'.$rowdata->keterangankonfirmasi;
                        break;
                    
                    default:
                        $statuskonfirmasi = '<span class="badge badge-warning">'.$rowdata->statuskonfirmasi.'</span>';
                        break;
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = '<img src="' . $fotodc . '" alt="" style=" width: 80%;">';
                $row[] = $rowdata->namalengkap . '<small> (' . $rowdata->umur  . ' Tahun)</small>';
                $row[] = $rowdata->keterangan;
                $row[] = $rowdata->namadc;
                $row[] = since($rowdata->tglpermohonan);
                $row[] = $statuskonfirmasi;
                
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Pendaftarandcm_model->count_all(),
            "recordsFiltered" => $this->Pendaftarandcm_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

}
