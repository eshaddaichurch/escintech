<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengkhotbah2 extends MY_Controller {

    public function __construct()

    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Pengkhotbah2_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'M200' );
        $this->cekOtorisasi();

        
    }
    
    public function index()
    {
        $data['menu'] = 'pengkhotbah2';
        $this->load->view('pengkhotbah/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idpengkhotbah'] = '';        
        $data['menu'] = 'pengkhotbah2';  
        $this->load->view('pengkhotbah/form', $data);
    }

    public function edit($idpengkhotbah)
    {       
        $idpengkhotbah = $this->encrypt->decode($idpengkhotbah);

        if ($this->Pengkhotbah2_model->get_by_id($idpengkhotbah)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengkhotbah2');
            exit();
        };
        $data['idpengkhotbah'] =$idpengkhotbah;        
        $data['menu'] = 'pengkhotbah2';
        $this->load->view('pengkhotbah/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pengkhotbah2_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idjemaat;
                $row[] = $rowdata->namalengkap;
                $row[] = $rowdata->nohp;
                $row[] = $rowdata->email;             
                $row[] = date('d-m-Y', strtotime($rowdata->tanggalskpengkotbah)) ;             
                $row[] = date('d-m-Y', strtotime($rowdata->tanggalskberakhir));             
                $row[] = $rowdata->keterangan;             
                $row[] = $rowdata->statusaktif;             
                $row[] = '<a href="'.site_url( 'pengkhotbah2/edit/'.$this->encrypt->encode($rowdata->idpengkhotbah) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('pengkhotbah2/delete/'.$this->encrypt->encode($rowdata->idpengkhotbah) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pengkhotbah2_model->count_all(),
                        "recordsFiltered" => $this->Pengkhotbah2_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    } 

    public function delete($idpengkhotbah)
    {
        $idpengkhotbah = $this->encrypt->decode($idpengkhotbah);  
        $rsdata = $this->Pengkhotbah2_model->get_by_id($idpengkhotbah);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengkhotbah');
            exit();
              };

        $hapus = $this->Pengkhotbah2_model->hapus($idpengkhotbah);
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
        redirect('pengkhotbah2');        

    }

    public function simpan()
    {       
        $idpengkhotbah             = $this->input->post('idpengkhotbah');
        $idjemaat             = $this->input->post('idjemaat');
        $tanggalskberakhir             = $this->input->post('tanggalskberakhir');
        $tanggalskpengkotbah             = $this->input->post('tanggalskpengkotbah');
        $keterangan             = $this->input->post('keterangan');
        $statusaktif             = $this->input->post('statusaktif');
                        

        if ( $idpengkhotbah=='' ) {  

            $idpengkhotbah = $this->db->query("select create_idpengkhotbah('".$idjemaat."') as idpengkhotbah")->row()->idpengkhotbah;

            $data = array(
                            'idpengkhotbah'   => $idpengkhotbah, 
                            'idjemaat'   => $idjemaat, 
                            'tanggalskpengkotbah'   => $tanggalskpengkotbah, 
                            'tanggalskberakhir'   => $tanggalskberakhir, 
                            'keterangan'   => $keterangan, 
                            'statusaktif'   => $statusaktif, 
                        );
            $simpan = $this->Pengkhotbah2_model->simpan($data);      
        }else{ 

            $data = array(
                            'idpengkhotbah'   => $idpengkhotbah, 
                            'idjemaat'   => $idjemaat, 
                            'tanggalskpengkotbah'   => $tanggalskpengkotbah, 
                            'tanggalskberakhir'   => $tanggalskberakhir, 
                            'keterangan'   => $keterangan, 
                            'statusaktif'   => $statusaktif, 
                        );
            $simpan = $this->Pengkhotbah2_model->update($data, $idpengkhotbah);
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
        redirect('pengkhotbah2');   
    }
    

     public function get_edit_data()
    {
        
        $idpengkhotbah = $this->input->post('idpengkhotbah');
        $RsData = $this->Pengkhotbah2_model->get_by_id($idpengkhotbah)->row();

        $data = array( 
                            'idpengkhotbah'   => $RsData->idpengkhotbah, 
                            'idjemaat'   => $RsData->idjemaat, 
                            'tanggalskpengkotbah'   => date('Y-m-d', strtotime($RsData->tanggalskpengkotbah)), 
                            'tanggalskberakhir'   => date('Y-m-d', strtotime($RsData->tanggalskberakhir)), 
                            'keterangan'   => $RsData->keterangan, 
                            'statusaktif'   => $RsData->statusaktif, 
                        );

        echo(json_encode($data));
    }


}


        