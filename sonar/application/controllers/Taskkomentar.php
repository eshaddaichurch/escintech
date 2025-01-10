<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taskkomentar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Taskkomentar_model');
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login'); 
            exit();
        }
    }   

    public function index()
    {
        $data['menu'] = 'Taskkomentar';
        $this->load->view('taskkomentar/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idtaskkomentar'] = '';        
        $data['menu'] = 'Taskkomentar';  
        $this->load->view('taskkomentar/form', $data);
    }

    public function edit($idtaskkomentar)
    {       
        $idtaskkomentar = $this->encrypt->decode($idtaskkomentar);

        if ($this->Taskkomentar_model->get_by_id($idtaskkomentar)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('Taskkomentar');
            exit();
        };
        $data['idtaskkomentar'] =$idtaskkomentar;        
        $data['menu'] = 'Taskkomentar';
        $this->load->view('taskkomentar/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Taskkomentar_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->tgltaskkomentar;
                $row[] = $rowdata->idtask;
                $row[] = $rowdata->idprojectmanager;
                $row[] = $rowdata->idprogrammer;
                $row[] = $rowdata->komentar;
                $row[] = '<a href="'.site_url( 'Taskkomentar/edit/'.$this->encrypt->encode($rowdata->idtaskkomentar) ).'" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> | 
                        <a href="'.site_url('Taskkomentar/delete/'.$this->encrypt->encode($rowdata->idtaskkomentar) ).'" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Taskkomentar_model->count_all(),
                        "recordsFiltered" => $this->Taskkomentar_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idtaskkomentar)
    {
        $idtaskkomentar = $this->encrypt->decode($idtaskkomentar);  
        $rsdata = $this->Taskkomentar_model->get_by_id($idtaskkomentar);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Taskkomentar');
            exit();
        };

        $hapus = $this->Taskkomentar_model->hapus($idtaskkomentar);
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
        redirect('Taskkomentar');        

    }

    public function simpan()
    {       
        $idtaskkomentar             = $this->input->post('idtaskkomentar');
        $tgltaskkomentar        = $this->input->post('tgltaskkomentar');
        $idtask        = $this->input->post('idtask');
        $idprojectmanager        = $this->input->post('idprojectmanager');
        $idprogrammer        = $this->input->post('idprogrammer');
        $komentar        = $this->input->post('komentar');
        $tglinsert          = date('Y-m-d H:i:s');

        if ( $idtaskkomentar=='' ) {  
            $data = array(
                            'tgltaskkomentar'   => $tgltaskkomentar, 
                            'idtask'   => $idtask, 
                            'idprojectmanager'   => $idprojectmanager, 
                            'idprogrammer'   => $idprogrammer, 
                            'komentar'   => $komentar, 
                        );
            $simpan = $this->Taskkomentar_model->simpan($data);      
        }else{ 

            $data = array(
                            'tgltaskkomentar'   => $tgltaskkomentar, 
                            'idtask'   => $idtask, 
                            'idprojectmanager'   => $idprojectmanager, 
                            'idprogrammer'   => $idprogrammer, 
                            'komentar'   => $komentar,                      );
            $simpan = $this->Taskkomentar_model->update($data, $idtaskkomentar);
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
        redirect('Taskkomentar');   
    }
    
    public function get_edit_data()
    {
        $idtaskkomentar = $this->input->post('idtaskkomentar');
        $RsData = $this->Taskkomentar_model->get_by_id($idtaskkomentar)->row();

        $data = array( 
                            'idtaskkomentar'     =>  $RsData->idtaskkomentar,  
                            'tgltaskkomentar'     =>  $RsData->tgltaskkomentar,  
                            'idtask'     =>  $RsData->idtask,  
                            'idprojectmanager'     =>  $RsData->idprojectmanager,  
                            'idprogrammer'     =>  $RsData->idprogrammer,  
                            'komentar'     =>  $RsData->komentar,  
                        );

        echo(json_encode($data));
    }


}

/* End of file Taskkomentar.php */
/* Location: ./application/controllers/Taskkomentar.php */