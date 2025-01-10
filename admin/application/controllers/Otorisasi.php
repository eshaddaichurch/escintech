<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otorisasi extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Otorisasi_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'M700' );
        // $this->cekOtorisasi();
    }

    public function index()
    {
    	$rsOtorisasi = $this->Otorisasi_model->get_all();

        $data['rsOtorisasi'] = $rsOtorisasi;
        $data['menu'] = 'otorisasi';
        $this->load->view('otorisasi/listdata', $data);
    }   

    public function tambahotorisasi()
    {       
        $data['idotorisasi'] = '';        
        $data['menu'] = 'otorisasi';  
        $this->load->view('otorisasi/tambahotorisasi', $data);
    }

    public function tambahmenu($idotorisasi)
    {       
    	$rsBackMenus = $this->db->query("select * from backmenus order by nomorurut");
        $data['rsBackMenus'] = $rsBackMenus;

    	$idotorisasi = $this->encrypt->decode($idotorisasi);
        $data['idotorisasi'] = $idotorisasi;        
        $data['menu'] = 'otorisasi';  
        $this->load->view('otorisasi/tambahmenu', $data);
    }

    public function tambahuser($idotorisasi)
    {       
        $idotorisasi = $this->encrypt->decode($idotorisasi);
        $rowOtorisasi = $this->Otorisasi_model->get_by_id($idotorisasi);
        if ($rowOtorisasi->num_rows()==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data Otorisasi tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('otorisasi');
            exit();
        }
        $rowOtorisasi = $rowOtorisasi->row();

        $rsUser = $this->db->query("select * from v_otorisasiuser where idotorisasi='$idotorisasi' order by namalengkap");
        $data['rowOtorisasi'] = $rowOtorisasi;
        $data['rsUser'] = $rsUser;
        $data['idotorisasi'] = $idotorisasi;        
        $data['menu'] = 'otorisasi';  
        $this->load->view('otorisasi/tambahuser', $data);
    }

    public function simpanotorisasiuser()
    {
        $idotorisasi = $this->input->post('idotorisasi');
        $idjemaat = $this->input->post('idjemaat');

        $rsCekUser = $this->db->query("
                select * from v_otorisasiuser where idjemaat='$idjemaat' limit 1
            ");
        if ($rsCekUser->num_rows()>0) {
            $rowUser = $rsCekUser->row();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Upps!</strong> User '.$rowUser->namalengkap.' sudah ada di Otorisasi '.$rowUser->namaotorisasi.'! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('otorisasi/tambahuser/'.$this->encrypt->encode($idotorisasi));
            exit();
        }
        $dataUser = array(
                            'idotorisasi' => $idotorisasi, 
                            'idjemaat' => $idjemaat, 
                        );
        // var_dump($dataUser);
        // exit();
        $simpan = $this->Otorisasi_model->simpanotorisasiuser($dataUser);
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
        redirect('otorisasi/tambahuser/'.$this->encrypt->encode($idotorisasi)); 

    }

    public function hapusotorisasiuser($idotorisasi, $idjemaat)
    {
        $idotorisasi = $this->encrypt->decode($idotorisasi);
        $idjemaat = $this->encrypt->decode($idjemaat);
        $rsUser = $this->db->query("
                select * from otorisasiuser where idotorisasi='$idotorisasi' and idjemaat='$idjemaat'
            ");
        if ($rsUser->num_rows()==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data Otorisasi User tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('otorisasi');
            exit();
        }


        $hapus = $this->Otorisasi_model->hapusotorisasiuser($idotorisasi, $idjemaat);
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
                            <strong>Gagal!</strong> Data gagal dihapus! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('otorisasi/tambahuser/'.$this->encrypt->encode($idotorisasi)); 
    }

    public function edit($idotorisasi)
    {       
        $idotorisasi = $this->encrypt->decode($idotorisasi);

        if ($this->Otorisasi_model->get_by_id($idotorisasi)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('otorisasi');
            exit();
        };
        $data['idotorisasi'] =$idotorisasi;        
        $data['menu'] = 'otorisasi';
        $this->load->view('otorisasi/form', $data);
    }


    public function hapusotorisasi($idotorisasi)
    {
        $idotorisasi = $this->encrypt->decode($idotorisasi);  
        $rsdata = $this->Otorisasi_model->get_by_id($idotorisasi);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('otorisasi');
            exit();
        };

        $hapus = $this->Otorisasi_model->hapusotorisasi($idotorisasi);
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
        redirect('otorisasi');        

    }

    public function simpanotorisasi()
    {       
        $idotorisasi             	= $this->input->post('idotorisasi');
        $namaotorisasi             	= $this->input->post('namaotorisasi');

        if ( $idotorisasi=='' ) {  

            $idotorisasi = $this->db->query("select create_idotorisasi() as idotorisasi")->row()->idotorisasi;

            $data = array(
                            'idotorisasi'   => $idotorisasi, 
                            'namaotorisasi'   => $namaotorisasi,
                        );
            $simpan = $this->Otorisasi_model->simpan($data);      
        }else{ 
        	$data = array(
                            'idotorisasi'   => $idotorisasi, 
                            'namaotorisasi'   => $namaotorisasi,
                        );
            $simpan = $this->Otorisasi_model->update($data, $idotorisasi);
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
        redirect('otorisasi');   
    }

    public function simpanmenu()
    {
    	$idotorisasi = $this->input->post('idotorisasi');
    	$arrMenu = $this->input->post('arrMenu');
        // echo json_encode($arrMenu);
        // exit();
        $dataMenu = array();
        foreach ($arrMenu as $value) {
            array_push($dataMenu, array(
                                        'idotorisasi' => $idotorisasi, 
                                        'idmenu' => $value, 
                                    ));
        }

        $simpan = $this->Otorisasi_model->simpanmenu($dataMenu, $idotorisasi);
    	if ($simpan) {
    		echo json_encode( array('success' => true));
    	}else{
    		echo json_encode( array('success' => false));
    	}
    }
    
    public function get_edit_data()
    {
        $idotorisasi = $this->input->post('idotorisasi');
        $RsData = $this->Otorisasi_model->get_by_id($idotorisasi)->row();

        $data = array( 
                            'idotorisasi'     =>  $RsData->idotorisasi,  
                            'tglhagah'     =>  $RsData->tglhagah,  
                            'idkitab'     =>  $RsData->idkitab,  
                            'pasal1'     =>  $RsData->pasal1,  
                            'pasal2'     =>  $RsData->pasal2,  
                        );

        echo(json_encode($data));
    }

}

/* End of file Otorisasi.php */
/* Location: ./application/controllers/Otorisasi.php */