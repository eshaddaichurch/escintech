<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Absen extends MY_Controller {

	public function __construct()

    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Absen_model');
    }
    
    public function index($idabsenjenis)
    {
        switch ($idabsenjenis) {
            case 'A01':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S100' );
                break;
            case 'A02':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S101' );
                break;
            case 'A03': 
                $this->session->set_userdata( 'IDMENUSELECTED', 'S102' );
                break;
            case 'A04':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S103' );
                break;
            case 'A05':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S104' );
                break;
            case 'A06':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S105' );
                break;
            case 'A07':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S106' );
                break;
            case 'A08':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S107' );
                break;
            case 'A09':
                $this->session->set_userdata( 'IDMENUSELECTED', 'S108' );
                break;
            
            default:
                $this->session->set_userdata( 'IDMENUSELECTED', 'S100' );
                break;
        }
        $this->cekOtorisasi();
        $data['idabsenjenis'] = $idabsenjenis;
        $data['rowabsenjenis'] = $this->db->query("select * from absenjenis where idabsenjenis='".$idabsenjenis."'")->row();
        $data['menu'] = 'Absen';
        $this->load->view('absen/listdata', $data);
    }   

    public function tambah($idabsenjenis)
    {       
        $data['idabsenjenis'] = $idabsenjenis;
        $data['rowabsenjenis'] = $this->db->query("select * from absenjenis where idabsenjenis='".$idabsenjenis."'")->row();
        $data['idabsen'] = '';        
        $data['menu'] = 'Absen';  
        $this->load->view('absen/form', $data);
    }

    public function edit($idabsenjenis, $idabsen)
    {       
        $idabsenjenis = $this->encrypt->decode($idabsenjenis);
        $idabsen = $this->encrypt->decode($idabsen);

        if ($this->Absen_model->get_by_id($idabsen)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('absen/index/'.$idabsenjenis);
            exit();
        };
        $data['idabsenjenis'] = $idabsenjenis;
        $data['rowabsenjenis'] = $this->db->query("select * from absenjenis where idabsenjenis='".$idabsenjenis."'")->row();
        $data['idabsen'] =$idabsen;        
        $data['menu'] = 'Absen';
        $this->load->view('absen/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Absen_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = tgldmy($rowdata->tglabsen);
                $row[] = $rowdata->namalengkap.'<br>'.$rowdata->namasesi;
                $row[] = $rowdata->namasesi;
                $row[] = $rowdata->jumlahhadir;             
                $row[] = '<a href="'.site_url( 'absen/edit/'.$this->encrypt->encode($rowdata->idabsenjenis).'/'.$this->encrypt->encode($rowdata->idabsen) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('absen/delete/'.$this->encrypt->encode($rowdata->idabsenjenis).'/'.$this->encrypt->encode($rowdata->idabsen) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Absen_model->count_all(),
                        "recordsFiltered" => $this->Absen_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    } 

    public function delete($idabsenjenis, $idabsen)
    {
        $idabsenjenis = $this->encrypt->decode($idabsenjenis);  
        $idabsen = $this->encrypt->decode($idabsen);  
        $rsdata = $this->Absen_model->get_by_id($idabsen);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('absen');
            exit();
              };
        // $idabsenjenis = $rsdata->row()->idabsenjenis;

        $hapus = $this->Absen_model->hapus($idabsen);
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
        redirect('absen/index/'.$idabsenjenis);        

    }

    public function simpan()
    {       
        $idabsen             = $this->input->post('idabsen');
        $idabsenjenis             = $this->input->post('idabsenjenis');
        $tglabsen             = $this->input->post('tglabsen');
        $idsesi             = $this->input->post('idsesi');
        $jumlahhadir             = $this->input->post('jumlahhadir');
        $idabsenlokasi             = $this->input->post('idabsenlokasi');
        $idjemaatcounter             = $this->input->post('idjemaatcounter');
        $statusaktif             = 'Aktif';
                        
        if ($idsesi=='') {
            $idsesi = NULL;
        }
        
        if ( $idabsen=='' ) {  

            $idabsen = $this->db->query("select create_idabsen('".date('Y-m-d')."') as idabsen")->row()->idabsen;

            $data = array(
                            'idabsen'   => $idabsen, 
                            'idabsenjenis'   => $idabsenjenis, 
                            'tglabsen'   => $tglabsen, 
                            'idsesi'   => $idsesi, 
                            'jumlahhadir'   => $jumlahhadir, 
                            'idabsenlokasi'   => $idabsenlokasi, 
                            'idjemaatcounter'   => $idjemaatcounter, 
                        );

            $simpan = $this->Absen_model->simpan($data);      
        }else{ 

            $data = array(
                            'idabsenjenis'   => $idabsenjenis, 
                            'tglabsen'   => $tglabsen, 
                            'idsesi'   => $idsesi, 
                            'jumlahhadir'   => $jumlahhadir, 
                            'idabsenlokasi'   => $idabsenlokasi, 
                            'idjemaatcounter'   => $idjemaatcounter, 
                        );
            $simpan = $this->Absen_model->update($data, $idabsen);
        }

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('absen/index/'.$idabsenjenis);   
    }
    

     public function get_edit_data()
    {
        
        $idabsen = $this->input->post('idabsen');
        $RsData = $this->Absen_model->get_by_id($idabsen)->row();

        $data = array( 		'idabsen'   => $RsData->idabsen, 	
                            'idsesi'   => $RsData->idsesi, 
                            'tglabsen'   => date('Y-m-d', strtotime($RsData->tglabsen)), 
                            'jumlahhadir'   => $RsData->jumlahhadir, 
                            'idabsenjenis'   => $RsData->idabsenjenis, 
                            'idabsenlokasi'   => $RsData->idabsenlokasi, 
                            'idjemaatcounter'   => $RsData->idjemaatcounter, 
                            'idabsenlokasi'   => $RsData->idabsenlokasi, 
                        );

        echo(json_encode($data));
    }

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */