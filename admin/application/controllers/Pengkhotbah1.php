<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengkhotbah1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Pengkhotbah1_model');
    }

            public function is_login()
            {
                $idjemaat = $this->session->userdata('idjemaat');
                if (empty($idjemaat)) {
                    $pesan = '<div class="alert alert-danger">Sesi telah
                    berakhir. Silahkan login kembali!</div>';
                    $this->session->set_flashdata('pesan', $pesan);
                    redirect('login');
                    exit();
                }
            }

            public function index()
                        {
                            $data['menu'] = 'pengkhotbah1 ';
                            $this->load->view('pengkhotbah1/listdata1', $data);
                        }   

                        public function tambah()
                        {       
                            $data['idpengkhotbah'] = '';        
                            $data['menu'] = 'pengkhotbah1';  
                            $this->load->view('pengkhotbah/form', $data);
            }

    public function edit($idpengkhotbah)
    {
        $idpengkhotbah = $this->encrypt->decode($idpengkhotbah);

        if ($this->pengkhotbah1_model->get_by_id($idpengkhotbah)->num_rows()<1){
            $pesan ='<div>
                        <div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> <strong>Ilegal!</strong> Data tidak ditemukan!  </div>
                     </div>';
            $this->session->set_flashdata('pesan',$pesan);
            redirect('pengkhotbah1');
            exit();

        };
        $data['idpengkhotbah'] =$idpengkhotbah;        
        $data['menu'] = 'pengkhotbah1';
        $this->load->view('pengkhotbah1/form1', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->pengkhotbah1_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if($RsData->num_rows()>0){
            foreach($RsData->result() as $rowdata){
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $rowdata->noaj;
                    $row[] = $rowdata->namalengkap.'<br>'.$rowdata->nik;
                    $row[] = $rowdata->tempatlahir.'<br>'.$rowdata->tanggallahir;
                    $row[] = $rowdata->jeniskelamin;
                    $row[] = $rowdata->statuspernikahan;
                    $row[] = $rowdata->statusjemaat;
                    $row[] = $rowdata->lastlogin;                
                    $row[] = '<a href="'.site_url( 'Pengkhotbah1/edit/'.$this->encrypt->encode($rowdata->idpengkhotbah) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                            <a href="'.site_url('Pengkhotbah1/delete/'.$this->encrypt->encode($rowdata->idpengkhotbah) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                    $data[] = $row;
            }
        }
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pengkhotbah1_model->count_all(),
            "recordsFiltered" => $this->pengkhotbah1_model->count_filtered(),
            "data" => $data,
    );
echo json_encode($output);
}

// public function delete($idpengkhotbah)
// {
// $idjemaat = $this->encrypt->decode($idpengkhotbah);  
// $rsdata = $this->pengkhotbah_model->get_by_id($idpengkhotbah);
// if ($rsdata->num_rows()<1) {
// $pesan = '<div>
//             <div class="alert alert-danger alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Ilegal!</strong> Data tidak ditemukan! 
//             </div>
//         </div>';
// $this->session->set_flashdata('pesan', $pesan);
// redirect('Pengkhotbah1');
// exit();
// };

// $hapus = $this->Pengkhotbah1_model->hapus($idpengkhotbah);
// if ($hapus) {       
// $pesan = '<div>
//             <div class="alert alert-success alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Berhasil!</strong> Data berhasil dihapus!
//             </div>
//         </div>';
// }else{
// $eror = $this->db->error();         
// $pesan = '<div>
//             <div class="alert alert-danger alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
//             </div>
//         </div>';
// }

// $this->session->set_flashdata('pesan', $pesan);
// redirect('Pengkhotbah1');        

// }

// public function simpan()
// {       
// $idjemaat             = $this->input->post('idjemaat');
// $idpengkhotbah        = $this->input->post('idpengkhotbah');
// $tanggalskpengkhotbah        = $this->input->post('tanggalskpengkhotbah');


// $tanggalskberakhir        = $this->input->post('tanggalskberakhir');
// $keterangan        = $this->input->post('keterangan');
// $statusaktif        = $this->input->post('statusaktif');



// if ($password!=$password2) {
// $pesan = '<div>
//             <div class="alert alert-danger alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Gagal!</strong> Ulangi password tidak sama!
//             </div>
//         </div>';
// $this->session->set_flashdata('pesan', $pesan);
// redirect('Pengkhotbah1');   
// }

// if ( $idpengkhotbah=='' ) {  

// $idjemaat = $this->db->query("select create_idpengkhotbah('".date('Y-m-d')."') as idjemaat")->row()->idjemaat;

// $data = array(
//                 'idjemaat'   => $idjemaat, 
//                 'noaj'   => $noaj, 
//                 'nik'   => $nik, 
                
//                 'namalengkap'   => $namalengkap, 
//                 'namapanggilan'   => $namapanggilan, 
//                 'tempatlahir'   => $tempatlahir, 
//                 'tanggallahir'   => $tanggallahir, 
//                 'jeniskelamin'   => $jeniskelamin, 
//                 'statuspernikahan'   => $statuspernikahan, 
//                 'golongandarah'   => $golongandarah, 
//                 'notelp'   => $notelp, 
//                 'nohp'   => $nohp, 
//                 'email'   => $email, 
//                 'facebook'   => $facebook, 
//                 'instagram'   => $instagram, 
                 
//                 'hubungan'   => $hubungan, 
                
//                 'pendidikanterakhir'   => $pendidikanterakhir, 
                
//                 'pekerjaan'   => $pekerjaan, 
                
                
                
                
                
//                 'tanggalupdate'   => $tanggalupdate, 
//                 'username'   => $username, 
//                 'password'   => md5($password), 
//                 'lastlogin'   => $lastlogin, 
//                 'statusjemaat'   => $statusjemaat, 
//                 'tanggalinsert'   => $tanggalinsert, 
//             );
// $simpan = $this->Pengkhotbah1_model->simpan($data);      
// }else{ 

// $data = array(
//                 'idjemaat'   => $idjemaat, 
//                 'noaj'   => $noaj, 
//                 'nik'   => $nik, 
                
//                 'namalengkap'   => $namalengkap, 
//                 'namapanggilan'   => $namapanggilan, 
//                 'tempatlahir'   => $tempatlahir, 
//                 'tanggallahir'   => $tanggallahir, 
//                 'jeniskelamin'   => $jeniskelamin, 
//                 'statuspernikahan'   => $statuspernikahan, 
//                 'golongandarah'   => $golongandarah, 
//                 'notelp'   => $notelp, 
//                 'nohp'   => $nohp, 
//                 'email'   => $email, 
//                 'facebook'   => $facebook, 
//                 'instagram'   => $instagram, 
                
//                 'hubungan'   => $hubungan, 
                
//                 'pendidikanterakhir'   => $pendidikanterakhir, 
                
//                 'pekerjaan'   => $pekerjaan, 
                
                
                
                
                
//                 'tanggalupdate'   => $tanggalupdate, 
//                 'username'   => $username, 
//                 'password'   => md5($password), 
//                 'lastlogin'   => $lastlogin, 
//                 'statusjemaat'   => $statusjemaat, 
//                 'tanggalinsert'   => $tanggalinsert,                
//             );
// $simpan = $this->Pengkhotbah1_model->update($data, $idpengkhotbah);
// }

// if ($simpan) {
// $pesan = '<div>
//             <div class="alert alert-success alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Berhasil!</strong> Data berhasil disimpan!
//             </div>
//         </div>';
// }else{
// $eror = $this->db->error();         
// $pesan = '<div>
//             <div class="alert alert-danger alert-dismissable">
//                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
//                 <strong>Gagal!</strong> Data gagal disimpan! <br>
//                 Pesan Error : '.$eror['code'].' '.$eror['message'].'
//             </div>
//         </div>';
// }

// $this->session->set_flashdata('pesan', $pesan);
// redirect('Pengkhotbah1');   
// }

// public function get_edit_data()
// {
// $idjemaat = $this->input->post('idjemaat');
// $RsData = $this->Pengkhotbah1_model->get_by_id($idpengkhotbah)->row();

// $data = array( 
//                 'idjemaat'   => $idjemaat, 
//                 'noaj'   => $noaj, 
//                 'nik'   => $nik, 
                
//                 'namalengkap'   => $namalengkap, 
//                 'namapanggilan'   => $namapanggilan, 
//                 'tempatlahir'   => $tempatlahir, 
//                 'tanggallahir'   => $tanggallahir, 
//                 'jeniskelamin'   => $jeniskelamin, 
//                 'statuspernikahan'   => $statuspernikahan, 
//                 'golongandarah'   => $golongandarah, 
//                 'notelp'   => $notelp, 
//                 'nohp'   => $nohp, 
//                 'email'   => $email, 
//                 'facebook'   => $facebook, 
//                 'instagram'   => $instagram, 
                
//                 'hubungan'   => $hubungan, 
                
//                 'pendidikanterakhir'   => $pendidikanterakhir, 
                
//                 'pekerjaan'   => $pekerjaan, 
                
                
                
                
                
//                 'tanggalupdate'   => $tanggalupdate, 
//                 'username'   => $username, 
//                 'password'   => md5($password), 
//                 'lastlogin'   => $lastlogin, 
//                 'statusjemaat'   => $statusjemaat, 
//                 'tanggalinsert'   => $tanggalinsert,  
//             );

//           echo(json_encode($data));
//     }


}
    