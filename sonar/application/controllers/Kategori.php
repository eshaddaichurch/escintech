<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Kategori_model');
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
        $data['menu'] = 'kategori';
        $this->load->view('kategori/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idkategori'] = '';        
        $data['menu'] = 'kategori';  
        $this->load->view('kategori/form', $data);
    }

    public function edit($idkategori)
    {       
        $idkategori = $this->encrypt->decode($idkategori);

        if ($this->Kategori_model->get_by_id($idkategori)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('kategori');
            exit();
        };
        $data['idkategori'] =$idkategori;        
        $data['menu'] = 'kategori';
        $this->load->view('kategori/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Kategori_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->namakategori;
                $row[] = '<a href="'.site_url( 'kategori/edit/'.$this->encrypt->encode($rowdata->idkategori) ).'" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> | 
                        <a href="'.site_url('kategori/delete/'.$this->encrypt->encode($rowdata->idkategori) ).'" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Kategori_model->count_all(),
                        "recordsFiltered" => $this->Kategori_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idkategori)
    {
        $idkategori = $this->encrypt->decode($idkategori);  
        $rsdata = $this->Kategori_model->get_by_id($idkategori);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('kategori');
            exit();
        };

        $hapus = $this->Kategori_model->hapus($idkategori);
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
        redirect('kategori');        

    }

    public function simpan()
    {       
        $idkategori             = $this->input->post('idkategori');
        $namakategori        = $this->input->post('namakategori');
        $tglinsert          = date('Y-m-d H:i:s');

        if ( $idkategori=='' ) {  
            $data = array(
                            'namakategori'   => $namakategori, 
                        );
            $simpan = $this->Kategori_model->simpan($data);      
        }else{ 

            $data = array(
                            'namakategori'   => $namakategori,                      );
            $simpan = $this->Kategori_model->update($data, $idkategori);
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
        redirect('kategori');   
    }
    
    public function get_edit_data()
    {
        $idkategori = $this->input->post('idkategori');
        $RsData = $this->Kategori_model->get_by_id($idkategori)->row();

        $data = array( 
                            'idkategori'     =>  $RsData->idkategori,  
                            'namakategori'     =>  $RsData->namakategori,  
                        );

        echo(json_encode($data));
    }


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */