<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programmer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Programmer_model');
        $this->load->library('image_lib');
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
        $data['menu'] = 'programmer';
        $this->load->view('programmer/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idprogrammer'] = '';        
        $data['menu'] = 'programmer';  
        $this->load->view('programmer/form', $data);
    }

    public function edit($idprogrammer)
    {       
        $idprogrammer = $this->encrypt->decode($idprogrammer);

        if ($this->Programmer_model->get_by_id($idprogrammer)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('programmer');
            exit();
        };
        $data['idprogrammer'] =$idprogrammer;        
        $data['menu'] = 'programmer';
        $this->load->view('programmer/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Programmer_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->foto)) {
                    $foto = '<img src="'.base_url('uploads/pengguna/'.$rowdata->foto).'" alt="" width="80%">';
                }else{
                    $foto = '<img src="'.base_url('images/nofoto.png').'" alt="" width="80%">';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $foto;
                $row[] = $rowdata->nama.'<br>'.$rowdata->jeniskelamin;
                $row[] = $rowdata->tempatlahir.'<br>'.tglindonesia($rowdata->tgllahir);
                $row[] = $rowdata->alamat;
                $row[] = $rowdata->username.'<br>'.$rowdata->email;
                $row[] = '<a href="'.site_url( 'programmer/edit/'.$this->encrypt->encode($rowdata->idprogrammer) ).'" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> | 
                        <a href="'.site_url('programmer/delete/'.$this->encrypt->encode($rowdata->idprogrammer) ).'" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Programmer_model->count_all(),
                        "recordsFiltered" => $this->Programmer_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idprogrammer)
    {
        $idprogrammer = $this->encrypt->decode($idprogrammer);  
        $rsdata = $this->Programmer_model->get_by_id($idprogrammer);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('programmer');
            exit();
        };

        $hapus = $this->Programmer_model->hapus($idprogrammer);
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
        redirect('programmer');        

    }

    public function simpan()
    {       
        $idprogrammer           = $this->input->post('idprogrammer');
        $nama                   = $this->input->post('nama');
        $tempatlahir        = $this->input->post('tempatlahir');
        $tgllahir        = date('Y-m-d', strtotime($this->input->post('tgllahir')));
        $jeniskelamin        = $this->input->post('jeniskelamin');
        $alamat        = $this->input->post('alamat');
        $email        = $this->input->post('email');
        $username        = $this->input->post('username');
        $password        = md5($this->input->post('password'));
        $tglinsert          = date('Y-m-d H:i:s');

        if ( $idprogrammer=='' ) {  

            $foto               = $this->upload_foto($_FILES, "file");     
            $idprogrammer       = $this->db->query("select create_idprogrammer() as idprogrammer")->row()->idprogrammer;

            $data = array(
                            'idprogrammer'   => $idprogrammer, 
                            'nama'   => $nama, 
                            'foto'   => $foto, 
                            'tempatlahir'   => $tempatlahir, 
                            'tgllahir'   => $tgllahir, 
                            'jeniskelamin'   => $jeniskelamin, 
                            'alamat'   => $alamat, 
                            'email'   => $email, 
                            'username'   => $username, 
                            'password'   => $password, 
                        );
            $simpan = $this->Programmer_model->simpan($data);      
        }else{ 

            $file_lama = $this->input->post('file_lama');
            $foto = $this->update_upload_foto($_FILES, "file", $file_lama);

            $data = array(
                            'nama'   => $nama, 
                            'foto'   => $foto, 
                            'tempatlahir'   => $tempatlahir, 
                            'tgllahir'   => $tgllahir, 
                            'jeniskelamin'   => $jeniskelamin, 
                            'alamat'   => $alamat, 
                            'email'   => $email, 
                            'username'   => $username, 
                            'password'   => $password,                      
                        );
            $simpan = $this->Programmer_model->update($data, $idprogrammer);
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
        redirect('programmer');   
    }
    
    public function get_edit_data()
    {
        $idprogrammer = $this->input->post('idprogrammer');
        $RsData = $this->Programmer_model->get_by_id($idprogrammer)->row();

        $data = array( 
                            'idprogrammer'     =>  $RsData->idprogrammer,  
                            'nama'     =>  $RsData->nama,  
                            'foto'     =>  $RsData->foto,  
                            'tempatlahir'     =>  $RsData->tempatlahir,  
                            'tgllahir'     =>  $RsData->tgllahir,  
                            'jeniskelamin'     =>  $RsData->jeniskelamin,  
                            'alamat'     =>  $RsData->alamat,  
                            'email'     =>  $RsData->email,  
                            'username'     =>  $RsData->username,  
                        );

        echo(json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = './uploads/pengguna/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']             = '2000KB';

            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
             }else{
                 $foto = "";
             }

        }else{
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = './uploads/pengguna/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';
            

            $this->load->library('upload', $config);           
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext'); 
            }else{
                $foto = $file_lama;
            }          
        }else{          
            $foto = $file_lama;
        }

        return $foto;
    }


}

/* End of file Programmer.php */
/* Location: ./application/controllers/Programmer.php */