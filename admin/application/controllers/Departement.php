<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Departement_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'M400' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'departement';
        $this->load->view('departement/listdata', $data);
    }   

    public function tambah()
    {       
        $data['iddepartement'] = '';        
        $data['menu'] = 'departement';  
        $this->load->view('departement/form', $data);
    }

    public function edit($iddepartement)
    {       
        $iddepartement = $this->encrypt->decode($iddepartement);

        if ($this->Departement_model->get_by_id($iddepartement)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('departement');
            exit();
        };
        $data['iddepartement'] =$iddepartement;        
        $data['menu'] = 'departement';
        $this->load->view('departement/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Departement_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->fotohead)) {
                    $fotohead = '<img src="'.base_url('uploads/departement/'.$rowdata->fotohead).'" alt="" style="width: 80%;">' ;
                }else{
                    $fotohead = '<img src="'.base_url('images/user-01.png').'" alt="" style="width: 80%;">' ;
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $fotohead.'<br>'.$rowdata->namahead;
                $row[] = $rowdata->iddepartement;
                $row[] = $rowdata->namadepartement;
                $row[] = $rowdata->namagroup;
                $row[] = '<a href="'.site_url( 'departement/edit/'.$this->encrypt->encode($rowdata->iddepartement) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('departement/delete/'.$this->encrypt->encode($rowdata->iddepartement) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Departement_model->count_all(),
                        "recordsFiltered" => $this->Departement_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($iddepartement)
    {
        $iddepartement = $this->encrypt->decode($iddepartement);  
        $rsdata = $this->Departement_model->get_by_id($iddepartement);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('departement');
            exit();
        };

        $hapus = $this->Departement_model->hapus($iddepartement);
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
        redirect('departement');        

    }

    public function simpan()
    {       
        $iddepartement             = $this->input->post('iddepartement');
        $namadepartement        = $this->input->post('namadepartement');
        $namahead        = $this->input->post('namahead');
        $idgroup        = $this->input->post('idgroup');
        $statusaktif        = $this->input->post('statusaktif');
        $tanggalinsert        = date('Y-m-d H:i:s');

        $tanggalupdate        = date('Y-m-d H:i:s');
            
        $fotohead_lama = $this->input->post('fotohead_lama');
        $fotohead = $this->App->uploadImage($_FILES, "fotohead", $fotohead_lama, 'departement');

        if ( $iddepartement=='' ) {  

            $iddepartement = $this->db->query("select create_iddepartement('".$idgroup."') as iddepartement")->row()->iddepartement;

            $data = array(
                            'iddepartement'   => $iddepartement, 
                            'namadepartement'   => $namadepartement, 
                            'idgroup'   => $idgroup, 
                            'namahead'   => $namahead, 
                            'fotohead'   => $fotohead, 
                            'statusaktif'   => $statusaktif, 
                        );
            $simpan = $this->Departement_model->simpan($data);      
        }else{ 

            $data = array(
                            'iddepartement'   => $iddepartement, 
                            'namadepartement'   => $namadepartement, 
                            'idgroup'   => $idgroup, 
                            'namahead'   => $namahead, 
                            'fotohead'   => $fotohead, 
                            'statusaktif'   => $statusaktif, 
                        );
            // var_dump($data);
            // exit();
            $simpan = $this->Departement_model->update($data, $iddepartement);
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
        redirect('departement');   
    }
    
    public function get_edit_data()
    {
        $iddepartement = $this->input->post('iddepartement');
        $RsData = $this->Departement_model->get_by_id($iddepartement)->row();

        $data = array( 
                            'iddepartement'     =>  $RsData->iddepartement,  
                            'namadepartement'     =>  $RsData->namadepartement,  
                            'idgroup'     =>  $RsData->idgroup,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                            'namahead'     =>  $RsData->namahead,  
                            'fotohead'     =>  $RsData->fotohead,  
                        );

        echo(json_encode($data));
    }

}

/* End of file Departement.php */
/* Location: ./application/controllers/Departement.php */