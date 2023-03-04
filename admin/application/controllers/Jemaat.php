<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jemaat extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Jemaat_model');
    }

    public function is_login()
    {
        $idjemaat = $this->session->userdata('idjemaat');
        if (empty($idjemaat)) {
            $pesan = '<div class="alert alert-danger">Sesi telah berakhir. Silahkan login kembali!</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('login'); 
            exit();
        }
    }   

    

    public function index()
    {
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idjemaat'] = '';        
        $data['menu'] = 'jemaat';  
        $this->load->view('jemaat/form', $data);
    }

    public function edit($idjemaat)
    {       
        $idjemaat = $this->encrypt->decode($idjemaat);

        if ($this->Jemaat_model->get_by_id($idjemaat)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };
        $data['idjemaat'] =$idjemaat;        
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Jemaat_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->noaj;
                $row[] = '<a href="" id="tampilinfojemaat" data-idjemaat="'.$rowdata->idjemaat.'">'.$rowdata->namalengkap.'</a><br>'.$rowdata->nik;
                $row[] = $rowdata->tempatlahir.'<br>'.$rowdata->tanggallahir;
                $row[] = $rowdata->jeniskelamin;
                $row[] = $rowdata->statusjemaat;
                $row[] = '<a href="'.site_url( 'jemaat/edit/'.$this->encrypt->encode($rowdata->idjemaat) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('jemaat/delete/'.$this->encrypt->encode($rowdata->idjemaat) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Jemaat_model->count_all(),
                        "recordsFiltered" => $this->Jemaat_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);  
        $rsdata = $this->Jemaat_model->get_by_id($idjemaat);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };

        $hapus = $this->Jemaat_model->hapus($idjemaat);
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
        redirect('jemaat');        

    }

    public function simpan()
    {       
        $idjemaat             = $this->input->post('idjemaat');
        $noaj        = $this->input->post('noaj');
        $nik        = $this->input->post('nik');
        $kewarganegaraan        = $this->input->post('kewarganegaraan');
        $namalengkap        = $this->input->post('namalengkap');
        $namapanggilan        = $this->input->post('namapanggilan');
        $tempatlahir        = $this->input->post('tempatlahir');
        $tanggallahir        = $this->input->post('tanggallahir');
        $jeniskelamin        = $this->input->post('jeniskelamin');
        $statuspernikahan        = $this->input->post('statuspernikahan');
        $golongandarah        = $this->input->post('golongandarah');
        if (empty($golongandarah)) {
            $golongandarah = null;
        }
        $notelp        = $this->input->post('notelp');
        $nohp        = $this->input->post('nohp');
        $email        = $this->input->post('email');
        $facebook        = $this->input->post('facebook');
        $instagram        = $this->input->post('instagram');
        $namadarurat        = $this->input->post('namadarurat');
        $hubungan        = $this->input->post('hubungan');
        if (empty($hubungan)) {
            $hubungan = null;
        }
        $notelpdarurat        = $this->input->post('notelpdarurat');
        $pendidikanterakhir        = $this->input->post('pendidikanterakhir');
        if (empty($pendidikanterakhir)) {
            $pendidikanterakhir = null;
        }
        $namasekolah        = $this->input->post('namasekolah');
        $pekerjaan        = $this->input->post('pekerjaan');
        if (empty($pekerjaan)) {
            $pekerjaan = null;
        }
        $namaperusahaan        = $this->input->post('namaperusahaan');
        $sektorindustri        = $this->input->post('sektorindustri');
        $alamatkantor        = $this->input->post('alamatkantor');
        $notelpkantor        = $this->input->post('notelpkantor');
        $alamatrumah        = $this->input->post('alamatrumah');
        $rtrw        = $this->input->post('rtrw');
        $kelurahan        = $this->input->post('kelurahan');
        $kecamatan        = $this->input->post('kecamatan');
        $kotakabupaten        = $this->input->post('kotakabupaten');
        $propinsi        = $this->input->post('propinsi');
        $kodepos        = $this->input->post('kodepos');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $password2        = $this->input->post('password2');
        $statusjemaat        = $this->input->post('statusjemaat');
        $lastlogin        = null;
        
        $tanggalinsert        = date('Y-m-d H:i:s');
        $tanggalupdate        = date('Y-m-d H:i:s');
        $foto        = '';

        if ($password!=$password2) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Ulangi password tidak sama!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');   
        }

        if ( $idjemaat=='' ) {  

            $idjemaat = $this->db->query("select create_idjemaat('".date('Y-m-d')."') as idjemaat")->row()->idjemaat;

            $data = array(
                            'idjemaat'   => $idjemaat, 
                            'noaj'   => $noaj, 
                            'nik'   => $nik, 
                            'kewarganegaraan'   => $kewarganegaraan, 
                            'namalengkap'   => $namalengkap, 
                            'namapanggilan'   => $namapanggilan, 
                            'tempatlahir'   => $tempatlahir, 
                            'tanggallahir'   => $tanggallahir, 
                            'jeniskelamin'   => $jeniskelamin, 
                            'statuspernikahan'   => $statuspernikahan, 
                            'golongandarah'   => $golongandarah, 
                            'notelp'   => $notelp, 
                            'nohp'   => $nohp, 
                            'email'   => $email, 
                            'facebook'   => $facebook, 
                            'instagram'   => $instagram, 
                            'namadarurat'   => $namadarurat, 
                            'hubungan'   => $hubungan, 
                            'notelpdarurat'   => $notelpdarurat, 
                            'pendidikanterakhir'   => $pendidikanterakhir, 
                            'namasekolah'   => $namasekolah, 
                            'pekerjaan'   => $pekerjaan, 
                            'namaperusahaan'   => $namaperusahaan, 
                            'sektorindustri'   => $sektorindustri, 
                            'alamatkantor'   => $alamatkantor, 
                            'notelpkantor'   => $notelpkantor, 
                            'alamatrumah'   => $alamatrumah, 
                            'rtrw'   => $rtrw, 
                            'kelurahan'   => $kelurahan, 
                            'kecamatan'   => $kecamatan, 
                            'kotakabupaten'   => $kotakabupaten, 
                            'propinsi'   => $propinsi, 
                            'kodepos'   => $kodepos, 
                            'foto'   => $foto, 
                            'tanggalupdate'   => $tanggalupdate, 
                            'username'   => $username, 
                            'password'   => md5($password), 
                            'lastlogin'   => $lastlogin, 
                            'statusjemaat'   => $statusjemaat, 
                            'tanggalinsert'   => $tanggalinsert, 
                        );
            $simpan = $this->Jemaat_model->simpan($data);      
        }else{ 

            $data = array(
                            'noaj'   => $noaj, 
                            'nik'   => $nik, 
                            'kewarganegaraan'   => $kewarganegaraan, 
                            'namalengkap'   => $namalengkap, 
                            'namapanggilan'   => $namapanggilan, 
                            'tempatlahir'   => $tempatlahir, 
                            'tanggallahir'   => $tanggallahir, 
                            'jeniskelamin'   => $jeniskelamin, 
                            'statuspernikahan'   => $statuspernikahan, 
                            'golongandarah'   => $golongandarah, 
                            'notelp'   => $notelp, 
                            'nohp'   => $nohp, 
                            'email'   => $email, 
                            'facebook'   => $facebook, 
                            'instagram'   => $instagram, 
                            'namadarurat'   => $namadarurat, 
                            'hubungan'   => $hubungan, 
                            'notelpdarurat'   => $notelpdarurat, 
                            'pendidikanterakhir'   => $pendidikanterakhir, 
                            'namasekolah'   => $namasekolah, 
                            'pekerjaan'   => $pekerjaan, 
                            'namaperusahaan'   => $namaperusahaan, 
                            'sektorindustri'   => $sektorindustri, 
                            'alamatkantor'   => $alamatkantor, 
                            'notelpkantor'   => $notelpkantor, 
                            'alamatrumah'   => $alamatrumah, 
                            'rtrw'   => $rtrw, 
                            'kelurahan'   => $kelurahan, 
                            'kecamatan'   => $kecamatan, 
                            'kotakabupaten'   => $kotakabupaten, 
                            'propinsi'   => $propinsi, 
                            'kodepos'   => $kodepos, 
                            'foto'   => $foto, 
                            'tanggalupdate'   => $tanggalupdate, 
                            'username'   => $username, 
                            'password'   => md5($password), 
                            'lastlogin'   => $lastlogin, 
                            'statusjemaat'   => $statusjemaat, 
                            'tanggalinsert'   => $tanggalinsert,                      
                        );
            $simpan = $this->Jemaat_model->update($data, $idjemaat);
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
        redirect('jemaat');   
    }
    
    public function get_edit_data()
    {
        $idjemaat = $this->input->post('idjemaat');
        $RsData = $this->Jemaat_model->get_by_id($idjemaat)->row();

        $data = array( 
                            'idjemaat'     =>  $RsData->idjemaat,  
                            'noaj'     =>  $RsData->noaj,  
                            'nik'     =>  $RsData->nik,  
                            'kewarganegaraan'     =>  $RsData->kewarganegaraan,  
                            'namalengkap'     =>  $RsData->namalengkap,  
                            'namapanggilan'     =>  $RsData->namapanggilan,  
                            'tempatlahir'     =>  $RsData->tempatlahir,  
                            'tanggallahir'     =>  $RsData->tanggallahir,  
                            'jeniskelamin'     =>  $RsData->jeniskelamin,  
                            'statuspernikahan'     =>  $RsData->statuspernikahan,  
                            'golongandarah'     =>  $RsData->golongandarah,  
                            'notelp'     =>  $RsData->notelp,  
                            'nohp'     =>  $RsData->nohp,  
                            'email'     =>  $RsData->email,  
                            'facebook'     =>  $RsData->facebook,  
                            'instagram'     =>  $RsData->instagram,  
                            'namadarurat'     =>  $RsData->namadarurat,  
                            'hubungan'     =>  $RsData->hubungan,  
                            'notelpdarurat'     =>  $RsData->notelpdarurat,  
                            'pendidikanterakhir'     =>  $RsData->pendidikanterakhir,  
                            'namasekolah'     =>  $RsData->namasekolah,  
                            'pekerjaan'     =>  $RsData->pekerjaan,  
                            'namaperusahaan'     =>  $RsData->namaperusahaan,  
                            'sektorindustri'     =>  $RsData->sektorindustri,  
                            'alamatkantor'     =>  $RsData->alamatkantor,  
                            'notelpkantor'     =>  $RsData->notelpkantor,  
                            'alamatrumah'     =>  $RsData->alamatrumah,  
                            'rtrw'     =>  $RsData->rtrw,  
                            'kelurahan'     =>  $RsData->kelurahan,  
                            'kecamatan'     =>  $RsData->kecamatan,  
                            'kotakabupaten'     =>  $RsData->kotakabupaten,  
                            'propinsi'     =>  $RsData->propinsi,  
                            'kodepos'     =>  $RsData->kodepos,  
                            'foto'     =>  $RsData->foto,  
                            'tanggalupdate'     =>  $RsData->tanggalupdate,  
                            'username'     =>  $RsData->username,  
                            'password'     =>  $RsData->password,  
                            'lastlogin'     =>  $RsData->lastlogin,  
                            'statusjemaat'     =>  $RsData->statusjemaat,  
                            'tanggalinsert'     =>  $RsData->tanggalinsert,  
                        );

        echo(json_encode($data));
    }

    public function get_info_detail()
    {
        $idjemaat = $this->input->get('idjemaat');

        $rsJemaat = $this->db->query("
                    SELECT * FROM v_jemaat WHERE idjemaat = '$idjemaat'
            ");

        echo json_encode(array('rsJemaat'=>$rsJemaat->row(), 'idencrypt' => $this->encrypt->encode($idjemaat)) );
    }


    public function ubahkeluarga($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);

        if ($this->Jemaat_model->get_by_id($idjemaat)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };
        $data['idjemaat'] =$idjemaat;        
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/ubahkeluarga', $data);
    }

    public function simpanubahkeluarga()
    {
        $idjemaat = $this->input->post('idjemaat');
        $idhubunganfamily = $this->input->post('idhubunganfamily');

        
    }

}

/* End of file Jemaat.php */
/* Location: ./application/controllers/Jemaat.php */