<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hagah extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Hagah_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'M600' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'hagah';
        $this->load->view('hagah/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idhagah'] = '';        
        $data['menu'] = 'hagah';  
        $this->load->view('hagah/form', $data);
    }

    public function edit($idhagah)
    {       
        $idhagah = $this->encrypt->decode($idhagah);

        if ($this->Hagah_model->get_by_id($idhagah)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('hagah');
            exit();
        };
        $data['idhagah'] =$idhagah;        
        $data['menu'] = 'hagah';
        $this->load->view('hagah/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Hagah_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->tglhagah;
                $row[] = $rowdata->namakitab;
                $row[] = $rowdata->pasal1;
                $row[] = $rowdata->pasal2;
                $row[] = '<a href="'.site_url( 'hagah/edit/'.$this->encrypt->encode($rowdata->idhagah) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('hagah/delete/'.$this->encrypt->encode($rowdata->idhagah) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Hagah_model->count_all(),
                        "recordsFiltered" => $this->Hagah_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idhagah)
    {
        $idhagah = $this->encrypt->decode($idhagah);  
        $rsdata = $this->Hagah_model->get_by_id($idhagah);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('hagah');
            exit();
        };

        $hapus = $this->Hagah_model->hapus($idhagah);
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
        redirect('hagah');        

    }

    public function simpan()
    {       
        $idhagah             	= $this->input->post('idhagah');
        $tglhagah        		= $this->input->post('tglhagah');
        $idkitab        		= $this->input->post('idkitab');
        $pasal1        		= $this->input->post('pasal1');
        $pasal2        		= $this->input->post('pasal2');

        if ( $idhagah=='' ) {  

            $idhagah = $this->db->query("select create_idhagah('".$tglhagah."') as idhagah")->row()->idhagah;

            $data = array(
                            'idhagah'   => $idhagah, 
                            'tglhagah'   => $tglhagah, 
                            'idkitab'   => $idkitab, 
                            'pasal1'   => $pasal1, 
                            'pasal2'   => $pasal2, 
                        );
            $simpan = $this->Hagah_model->simpan($data);      
        }else{ 
        	$data = array(
                            'idhagah'   => $idhagah, 
                            'tglhagah'   => $tglhagah, 
                            'idkitab'   => $idkitab, 
                            'pasal1'   => $pasal1, 
                            'pasal2'   => $pasal2, 
                        );
            $simpan = $this->Hagah_model->update($data, $idhagah);
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
        redirect('hagah');   
    }
    
    public function get_edit_data()
    {
        $idhagah = $this->input->post('idhagah');
        $RsData = $this->Hagah_model->get_by_id($idhagah)->row();

        $data = array( 
                            'idhagah'     =>  $RsData->idhagah,  
                            'tglhagah'     =>  $RsData->tglhagah,  
                            'idkitab'     =>  $RsData->idkitab,  
                            'pasal1'     =>  $RsData->pasal1,  
                            'pasal2'     =>  $RsData->pasal2,  
                        );

        echo(json_encode($data));
    }


}

/* End of file Hagah.php */
/* Location: ./application/controllers/Hagah.php */