<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktapenyerahananak extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Aktapenyerahananak_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'T100' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'aktapenyerahananak';
        $this->load->view('aktapenyerahananak/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idakta'] = '';        
        $data['menu'] = 'aktapenyerahananak';  
        $this->load->view('aktapenyerahananak/form', $data);
    }

    public function edit($idakta)
    {       
        $idakta = $this->encrypt->decode($idakta);

        if ($this->Aktapenyerahananak_model->get_by_id($idakta)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('aktapenyerahananak');
            exit();
        };
        $data['idakta'] =$idakta;        
        $data['menu'] = 'aktapenyerahananak';
        $this->load->view('aktapenyerahananak/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Aktapenyerahananak_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->noakta.' - '.$rowdata->tglakta;
                $row[] = $rowdata->namajemaatanak;
                $row[] = $rowdata->dilakukanoleh;
                $row[] = $rowdata->namadaerahakta;
                $row[] = '<a href="'.site_url( 'aktapenyerahananak/edit/'.$this->encrypt->encode($rowdata->idakta) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('aktapenyerahananak/delete/'.$this->encrypt->encode($rowdata->idakta) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Aktapenyerahananak_model->count_all(),
                        "recordsFiltered" => $this->Aktapenyerahananak_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idakta)
    {
        $idakta = $this->encrypt->decode($idakta);  
        $rsdata = $this->Aktapenyerahananak_model->get_by_id($idakta);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('aktapenyerahananak');
            exit();
        };

        $hapus = $this->Aktapenyerahananak_model->hapus($idakta);
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
        redirect('aktapenyerahananak');        

    }

    public function simpan()
    {       
        $idakta             = $this->input->post('idakta');
        $namagroup        = $this->input->post('namagroup');
        $idjemaathead        = $this->input->post('idjemaathead');
        $statusaktif        = $this->input->post('statusaktif');
        $namalengkap        = $this->input->post('namalengkap');
        $email        = $this->input->post('email');
        $facebook           = $this->input->post('facebook');
        $instagram           = $this->input->post('instagram');

        $tanggalinsert        = date('Y-m-d H:i:s');
        $tanggalupdate        = date('Y-m-d H:i:s');

        $fotogroup_lama = $this->input->post('fotogroup_lama');
        $fotogroup = $this->App->uploadImage($_FILES, "fotogroup", $fotogroup_lama, 'aktapenyerahananak');
        // var_dump($fotogroup);
        // exit();
        if ( $idakta=='' ) {  

            $idakta = $this->db->query("select create_idakta() as idakta")->row()->idakta;

            $data = array(
                            'idakta'   => $idakta, 
                            'namagroup'   => $namagroup, 
                            'idjemaathead'   => $idjemaathead, 
                            'statusaktif'   => $statusaktif, 
                            'fotogroup'   => $fotogroup, 
                            'namalengkap'   => $namalengkap, 
                            'email'   => $email, 
                            'facebook'   => $facebook, 
                            'instagram'   => $instagram, 
                        );
            $simpan = $this->Aktapenyerahananak_model->simpan($data);      
        }else{ 

            $data = array(
                            'idakta'   => $idakta, 
                            'namagroup'   => $namagroup, 
                            'idjemaathead'   => $idjemaathead, 
                            'statusaktif'   => $statusaktif, 
                            'fotogroup'   => $fotogroup, 
                            'namalengkap'   => $namalengkap, 
                            'email'   => $email, 
                            'facebook'   => $facebook, 
                            'instagram'   => $instagram, 
                        );
            $simpan = $this->Aktapenyerahananak_model->update($data, $idakta);
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
        redirect('aktapenyerahananak');   
    }
    
    public function get_edit_data()
    {
        $idakta = $this->input->post('idakta');
        $RsData = $this->Aktapenyerahananak_model->get_by_id($idakta)->row();

        $data = array( 
                            'idakta'     =>  $RsData->idakta,  
                            'namagroup'     =>  $RsData->namagroup,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                            'idjemaathead'     =>  $RsData->idjemaathead,  
                            'namalengkap'     =>  $RsData->namalengkap,  
                            'email'     =>  $RsData->email,  
                            'facebook'     =>  $RsData->facebook,  
                            'instagram'     =>  $RsData->instagram,  
                            'fotogroup'     =>  $RsData->fotogroup,  
                        );

        echo(json_encode($data));
    }

}

/* End of file Aktapenyerahananak.php */
/* Location: ./application/controllers/Aktapenyerahananak.php */