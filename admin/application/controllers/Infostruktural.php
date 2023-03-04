<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infostruktural extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Infostruktural_model');
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
        $data['menu'] = 'infostruktural';
        $this->load->view('infostruktural/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idinfostruktural'] = '';        
        $data['menu'] = 'infostruktural';  
        $this->load->view('infostruktural/form', $data);
    }

    public function edit($idinfostruktural)
    {       
        $idinfostruktural = $this->encrypt->decode($idinfostruktural);

        if ($this->Infostruktural_model->get_by_id($idinfostruktural)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('infostruktural');
            exit();
        };
        $data['idinfostruktural'] =$idinfostruktural;        
        $data['menu'] = 'infostruktural';
        $this->load->view('infostruktural/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Infostruktural_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
            	if (!empty($rowdata->fotoinfostruktural)) {
            		$fotoinfostruktural = base_url('uploads/infostruktural/'.$rowdata->fotoinfostruktural)
            	}else{
            		$fotoinfostruktural = base_url('images/user01.png');
            	}

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = '<img src="'.$fotoinfostruktural.'" alt="" style="width: 80%;">';

                $row[] = 'Nama : '.$rowdata->namastruktural.
                		'<br>jabatan: '.$rowdata->jabatan.
                		'<br>urlfacebookstruktural: '.$rowdata->urlfacebookstruktural.
                		'<br>urltwitterstruktural: '.$rowdata->urltwitterstruktural.
                		'<br>urlinstagramstruktural: '.$rowdata->urlinstagramstruktural.
                		'<br>urlskipestruktural: '.$rowdata->urlskipestruktural;
                $row[] = '<a href="'.site_url( 'infostruktural/edit/'.$this->encrypt->encode($rowdata->idinfostruktural) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('infostruktural/delete/'.$this->encrypt->encode($rowdata->idinfostruktural) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Infostruktural_model->count_all(),
                        "recordsFiltered" => $this->Infostruktural_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idinfostruktural)
    {
        $idinfostruktural = $this->encrypt->decode($idinfostruktural);  
        $rsdata = $this->Infostruktural_model->get_by_id($idinfostruktural);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('infostruktural');
            exit();
        };

        $hapus = $this->Infostruktural_model->hapus($idinfostruktural);
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
        redirect('infostruktural');        

    }

    public function simpan()
    {       
        $idinfostruktural             = $this->input->post('idinfostruktural');
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
            redirect('infostruktural');   
        }

        if ( $idinfostruktural=='' ) {  

            $idinfostruktural = $this->db->query("select create_idinfostruktural('".date('Y-m-d')."') as idinfostruktural")->row()->idinfostruktural;

            $data = array(
                            'idinfostruktural'   => $idinfostruktural, 
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
            $simpan = $this->Infostruktural_model->simpan($data);      
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
            $simpan = $this->Infostruktural_model->update($data, $idinfostruktural);
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
        redirect('infostruktural');   
    }
    
    public function get_edit_data()
    {
        $idinfostruktural = $this->input->post('idinfostruktural');
        $RsData = $this->Infostruktural_model->get_by_id($idinfostruktural)->row();

        $data = array( 
                            'idinfostruktural'     =>  $RsData->idinfostruktural,  
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

}

/* End of file Infostruktural.php */
/* Location: ./application/controllers/Infostruktural.php */