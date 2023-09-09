<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasikelas extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Konfirmasikelas_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'N100' );
        $this->cekOtorisasi();
    }    

    public function index()
    {
        $data['menu'] = '';
        $this->load->view('konfirmasikelas/listdata', $data);
    }   

    public function konfirmasi($idregistrasi)
    {       
        $idregistrasi = $this->encrypt->decode($idregistrasi);
        $rsRegistrasi = $this->Konfirmasikelas_model->get_by_id($idregistrasi);
        if ($rsRegistrasi->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konfirmasikelas');
            exit();
        };
        $rowRegistrasi = $rsRegistrasi->row();
        $idjemaat = $rowRegistrasi->idjemaat;
        $rowJemaat = $this->App->getJemaat($idjemaat)->row();

        $rowJadwalEvent = $this->db->query("select * from v_jadwalevent where idjadwalevent='".$rowRegistrasi->idjadwalevent."'")->row();

        $data['rowJadwalEvent'] = $rowJadwalEvent;
        $data['rowRegistrasi'] = $rowRegistrasi;
        $data['rowJemaat'] = $rowJemaat;
        $data['idregistrasi'] =$idregistrasi;        
        $data['menu'] = '';
        $this->load->view('konfirmasikelas/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Konfirmasikelas_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {

                switch ($rowdata->statuskonfirmasi) {
                    case 'Disetujui':
                        $statuskonfirmasi = '<span class="badge badge-success">'.$rowdata->statuskonfirmasi.'</span>';
                        if (!empty($rowdata->keterangankonfirmasi)) {
                            $statuskonfirmasi .= '<br>Keterangan: '.$rowdata->keterangankonfirmasi;
                        }
                        break;
                    case 'Ditolak':
                        $statuskonfirmasi = '<span class="badge badge-danger">'.$rowdata->statuskonfirmasi.'</span>';
                        if (!empty($rowdata->keterangankonfirmasi)) {
                            $statuskonfirmasi .= '<br>Keterangan: '.$rowdata->keterangankonfirmasi;
                        }
                        break;
                    default:
                        $statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
                        break;
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = formatHariTanggalJam($rowdata->tglregistrasi);
                $row[] = $rowdata->namalengkap;
                $row[] = $rowdata->namakelas;
                $row[] = $statuskonfirmasi;

                $row[] = '<a href="'.site_url( 'konfirmasikelas/konfirmasi/'.$this->encrypt->encode($rowdata->idregistrasi) ).'" class="btn btn-sm btn-success btn-circle"><i class="fa fa-check"></i> Konfirmasi</a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Konfirmasikelas_model->count_all(),
                        "recordsFiltered" => $this->Konfirmasikelas_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function simpan()
    {       
        $idregistrasi             	= $this->input->post('idregistrasi');
        $status             	= $this->input->post('status');
        $keterangankonfirmasi             	= $this->input->post('keterangankonfirmasi');
        $idpengguna = $this->session->userdata('idjemaat');
        $tglkonfirmasi = date('Y-m-d H:i:s');


    	$data = array(
                        'statuskonfirmasi'   => $status, 
                        'tglkonfirmasi'   => $tglkonfirmasi,
                        'idpenggunakonfirmasi'   => $idpengguna,
                        'keterangankonfirmasi'   => $keterangankonfirmasi,
                    );

        $simpan = $this->Konfirmasikelas_model->update($data, $idregistrasi, $status);

        if ($simpan) {
            echo json_encode(array('success' => true));
        }else{
            echo json_encode(array('msg' => "Data gagal disimpan."));
        }

    }
    
    public function get_edit_data()
    {
        $idregistrasi = $this->input->post('idregistrasi');
        $RsData = $this->Konfirmasikelas_model->get_by_id($idregistrasi)->row();

        $data = array( 
                            'idregistrasi'     =>  $RsData->idregistrasi,  
                            'tglregistrasi'     =>  $RsData->tglregistrasi,  
                            'tglsertifikat'     =>  $RsData->tglsertifikat,  
                            'idjemaat'     =>  $RsData->idjemaat,  
                            'idkelas'     =>  $RsData->idkelas,  
                            'nomorsertifikat'     =>  $RsData->nomorsertifikat,  
                            'linkurlsertifikat'     =>  $RsData->linkurlsertifikat,  
	                        );

        echo(json_encode($data));
    }


    public function cekStatusTerakhir()
    {
        $idregistrasi = $this->input->get('idregistrasi');
        $status = $this->db->query("select * from v_jadwaleventregistrasi where idregistrasi='$idregistrasi' ");
        $statuskonfirmasi = '';
        if ($status->num_rows()>0) {
            $statuskonfirmasi = $status->row()->statuskonfirmasi;
        }
        echo json_encode($statuskonfirmasi);
    }

}

/* End of file Konfirmasikelas.php */
/* Location: ./application/controllers/Konfirmasikelas.php */