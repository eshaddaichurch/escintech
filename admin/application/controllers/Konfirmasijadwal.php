<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasijadwal extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Konfirmasijadwal_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'P300' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'konfirmasijadwal';
        $this->load->view('konfirmasijadwal/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idjadwalevent'] = '';        
        $data['menu'] = 'konfirmasijadwal';  
        $this->load->view('konfirmasijadwal/form', $data);
    }

    public function konfirmasi($idjadwalevent)
    {       
        $idjadwalevent = $this->encrypt->decode($idjadwalevent);

        $rowPengajuan =$this->Konfirmasijadwal_model->get_by_id($idjadwalevent);
        if ($rowPengajuan->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konfirmasijadwal');
            exit();
        };

        $data['rowPengajuan'] =$rowPengajuan->row();        
        $data['idjadwalevent'] =$idjadwalevent;        
        $data['menu'] = 'konfirmasijadwal';
        $this->load->view('konfirmasijadwal/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Konfirmasijadwal_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $tglmulai = '';
                $tglselesai = '';
                if (!empty($rowdata->tglmulai)) {
                	$tglmulai = date('Y-m-d', strtotime($rowdata->tglmulai));
                }

                if (!empty($rowdata->tglselesai)) {
                	$tglselesai = date('Y-m-d', strtotime($rowdata->tglselesai));
                }

                $tglevent = '';
            	if ($tglmulai==$tglselesai) {
            		$tglevent = $tglmulai;
            	}else{
            		$tglevent = $tglmulai.'<br>Sd. '.$tglselesai;
            	}

            	switch ($rowdata->statuskonfirmasi) {
            		case 'Menunggu':
            			$statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
            			break;
            		case 'Disetujui':
            			$statuskonfirmasi = '<span class="badge badge-success">Disetujui</span>';
            			break;
            		case 'Ditolak':
            			$statuskonfirmasi = '<span class="badge badge-danger">Ditolak</span>';
            			break;
            		
            		default:
            			$statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
            			break;
            	}

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $tglevent;
                $row[] = '<strong>'.$rowdata->namaevent.'</strong>'.'<br>'.$rowdata->namadepartement;
                $row[] = $rowdata->jenisjadwal;
                $row[] = $statuskonfirmasi;
                $row[] = '<a href="'.site_url( 'konfirmasijadwal/konfirmasi/'.$this->encrypt->encode($rowdata->idjadwalevent) ).'" class="btn btn-sm btn-success btn-circle"><i class="fa fa-check"></i> Konfirmasi</a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Konfirmasijadwal_model->count_all(),
                        "recordsFiltered" => $this->Konfirmasijadwal_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idjadwalevent)
    {
        $idjadwalevent = $this->encrypt->decode($idjadwalevent);  
        $rsdata = $this->Konfirmasijadwal_model->get_by_id($idjadwalevent);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konfirmasijadwal');
            exit();
        };

        $hapus = $this->Konfirmasijadwal_model->hapus($idjadwalevent);
        if ($hapus) {       
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('konfirmasijadwal');        

    }

    public function simpan()
    {       
        $idjadwalevent             	= $this->input->post('idjadwalevent');
        $statuskonfirmasi        		= $this->input->post('status');
        $keterangankonfirmasi        		= $this->input->post('keterangankonfirmasi');
        
    	$data = array(
                        'statuskonfirmasi'   => $statuskonfirmasi, 
                        'keterangankonfirmasi'   => $keterangankonfirmasi, 
                        'idpenggunakonfirmasi'   => $this->session->userdata('idjemaat'), 
                        'tglkonfirmasi'   => date('Y-m-d H:i:s'), 
                    );

        // echo json_encode($data);
        // exit();

        $simpan = $this->Konfirmasijadwal_model->update($data, $idjadwalevent);
        
        if ($simpan) {
            echo json_encode(array('success' => true));
        }else{
            echo json_encode(array('message' => "Data gagal disimpan!"));

        }   
    }
    
    public function get_edit_data()
    {
        $idjadwalevent = $this->input->post('idjadwalevent');
        $RsData = $this->Konfirmasijadwal_model->get_by_id($idjadwalevent)->row();

        $data = array( 
                            'idjadwalevent'     =>  $RsData->idjadwalevent,  
                            'tglhagah'     =>  $RsData->tglhagah,  
                            'idkitab'     =>  $RsData->idkitab,  
                            'pasal1'     =>  $RsData->pasal1,  
                            'pasal2'     =>  $RsData->pasal2,  
                        );

        echo(json_encode($data));
    }

    public function cekStatusTerakhir()
    {
        $idjadwalevent = $this->input->get('idjadwalevent');
        $statuskonfirmasi = $this->Konfirmasijadwal_model->get_by_id($idjadwalevent)->row()->statuskonfirmasi;
        echo json_encode($statuskonfirmasi);
    }

}

/* End of file Konfirmasijadwal.php */
/* Location: ./application/controllers/Konfirmasijadwal.php */