<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyekdetail extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Proyekdetail_model');
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
        $data['menu'] = 'Proyekdetail';
        $this->load->view('proyekdetail/listdata', $data);
    }   

    public function tambah()
    {       
        $data[''] = '';        
        $data['menu'] = 'Proyekdetail';  
        $this->load->view('proyekdetail/form', $data);
    }

    public function edit($)
    {       
        $ = $this->encrypt->decode($);

        if ($this->Proyekdetail_model->get_by_id($)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('Proyekdetail');
            exit();
        };
        $data[''] =$;        
        $data['menu'] = 'Proyekdetail';
        $this->load->view('proyekdetail/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Proyekdetail_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idproyek;
                $row[] = $rowdata->idprogrammer;
                $row[] = '<a href="'.site_url( 'Proyekdetail/edit/'.$this->encrypt->encode($rowdata->) ).'" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> | 
                        <a href="'.site_url('Proyekdetail/delete/'.$this->encrypt->encode($rowdata->) ).'" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Proyekdetail_model->count_all(),
                        "recordsFiltered" => $this->Proyekdetail_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($)
    {
        $ = $this->encrypt->decode($);  
        $rsdata = $this->Proyekdetail_model->get_by_id($);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Proyekdetail');
            exit();
        };

        $hapus = $this->Proyekdetail_model->hapus($);
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
        redirect('Proyekdetail');        

    }

    public function simpan()
    {       
        $             = $this->input->post('');
        $idproyek        = $this->input->post('idproyek');
        $idprogrammer        = $this->input->post('idprogrammer');
        $tglinsert          = date('Y-m-d H:i:s');

        if ( $=='' ) {  
            $data = array(
                            'idproyek'   => $idproyek, 
                            'idprogrammer'   => $idprogrammer, 
                        );
            $simpan = $this->Proyekdetail_model->simpan($data);      
        }else{ 

            $data = array(
                            'idproyek'   => $idproyek, 
                            'idprogrammer'   => $idprogrammer,                      );
            $simpan = $this->Proyekdetail_model->update($data, $);
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
        redirect('Proyekdetail');   
    }
    
    public function get_edit_data()
    {
        $ = $this->input->post('');
        $RsData = $this->Proyekdetail_model->get_by_id($)->row();

        $data = array( 
                            'idproyek'     =>  $RsData->idproyek,  
                            'idprogrammer'     =>  $RsData->idprogrammer,  
                        );

        echo(json_encode($data));
    }


}

/* End of file Proyekdetail.php */
/* Location: ./application/controllers/Proyekdetail.php */