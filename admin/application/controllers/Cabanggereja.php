<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabanggereja extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Cabanggereja_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata( 'IDMENUSELECTED', '0006' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'cabanggereja';
        $this->load->view('cabanggereja/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idcabang'] = '';        
        $data['menu'] = 'cabanggereja';  
        $this->load->view('cabanggereja/form', $data);
    }

    public function edit($idcabang)
    {       
        $idcabang = $this->encrypt->decode($idcabang);

        if ($this->Cabanggereja_model->get_by_id($idcabang)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('cabanggereja');
            exit();
        };
        $data['idcabang'] =$idcabang;        
        $data['menu'] = 'cabanggereja';
        $this->load->view('cabanggereja/form', $data);
    }

    public function gallery($idcabang)
    {       
        $idcabang = $this->encrypt->decode($idcabang);

        if ($this->Cabanggereja_model->get_by_id($idcabang)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('cabanggereja');
            exit();
        };
        $data['rowcabang'] =$this->db->query("select * from cabanggereja where idcabang='$idcabang'")->row();        
        $data['rsgallery'] =$this->db->query("select * from cabanggereja_gallery where idcabang='$idcabang' order by idgallery");        
        $data['idcabang'] =$idcabang;        
        $data['menu'] = 'cabanggereja';
        $this->load->view('cabanggereja/gallery', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Cabanggereja_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                if (!empty($rowdata->gambarsampul)) {
                    $gambarsampul = '<img src="'.base_url('uploads/cabanggereja/'.$rowdata->gambarsampul).'" alt="" style="width: 80%;">' ;
                }else{
                    $gambarsampul = '<img src="'.base_url('images/nofoto.png').'" alt="" style="width: 80%;">' ;
                }
                $sosialmedia = '';
                if (!empty($rowdata->urlfacebook)) {
                	$sosialmedia .= '<a href="'.$rowdata->urlfacebook.'" target="_blank" class="mr-1"><i class="fab fa-facebook text-primary"></i></a>';
                }
                if (!empty($rowdata->urlinstagram)) {
                	$sosialmedia .= '<a href="'.$rowdata->urlinstagram.'" target="_blank" class="mr-1"><i class="fab fa-instagram text-danger"></i></a>';
                }
                if (!empty($rowdata->urlyoutube)) {
                	$sosialmedia .= '<a href="'.$rowdata->urlyoutube.'" target="_blank" class="mr-1"><i class="fab fa-youtube text-danger"></i></a>';
                }
                if (!empty($rowdata->urltwitter)) {
                	$sosialmedia .= '<a href="'.$rowdata->urltwitter.'" target="_blank" class="mr-1"><i class="fab fa-twitter text-dark"></i></a>';
                }
                if (!empty($rowdata->urllinkedin)) {
                	$sosialmedia .= '<a href="'.$rowdata->urllinkedin.'" target="_blank" class="mr-1"><i class="fab fa-linkedin text-primary"></i></a>';
                }
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $gambarsampul.'<br>'.$sosialmedia;
                $row[] = $rowdata->idcabang.' - '.$rowdata->namacabang;
                $row[] = $rowdata->alamatlengkap;
                $row[] = $rowdata->latitude.'<br>'.$rowdata->longitude;
                $row[] = '<a href="'.site_url( 'cabanggereja/gallery/'.$this->encrypt->encode($rowdata->idcabang) ).'" class="btn btn-sm btn-primary btn-circle"><i class="fa fa-images"></i></a> | 
                <a href="'.site_url( 'cabanggereja/edit/'.$this->encrypt->encode($rowdata->idcabang) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('cabanggereja/delete/'.$this->encrypt->encode($rowdata->idcabang) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Cabanggereja_model->count_all(),
                        "recordsFiltered" => $this->Cabanggereja_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idcabang)
    {
        $idcabang = $this->encrypt->decode($idcabang);  
        $rsdata = $this->Cabanggereja_model->get_by_id($idcabang);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('cabanggereja');
            exit();
        };

        $hapus = $this->Cabanggereja_model->hapus($idcabang);
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
        redirect('cabanggereja');        

    }

    public function simpan()
    {       
        $idcabang             = $this->input->post('idcabang');
        $namacabang        = $this->input->post('namacabang');
        $namagembala        = $this->input->post('namagembala');
        $alamatlengkap        = $this->input->post('alamatlengkap');
        $latitude        = $this->input->post('latitude');
        $longitude           = $this->input->post('longitude');
        $jadwalibadah           = $this->input->post('jadwalibadah');
        $notelp           = $this->input->post('notelp');
        $urlfacebook           = $this->input->post('urlfacebook');
        $urlinstagram           = $this->input->post('urlinstagram');
        $urlyoutube           = $this->input->post('urlyoutube');
        $urltwitter           = $this->input->post('urltwitter');
        $urllinkedin           = $this->input->post('urllinkedin');
        $deskripsi           = $this->input->post('deskripsi');
        $namacabang_slug = $this->createSlug($namacabang);

        $gambarsampul_lama = $this->input->post('gambarsampul_lama');
        $gambarsampul = $this->App->uploadImage($_FILES, "gambarsampul", $gambarsampul_lama, 'cabanggereja');

        $tanggalinsert        = date('Y-m-d H:i:s');
        $tanggalupdate        = date('Y-m-d H:i:s');

        if ( $idcabang=='' ) {  


	        $statusaktif        = 'Aktif';
            $data = array(
                            'namacabang'   => $namacabang, 
                            'namacabang_slug'   => $namacabang_slug, 
                            'alamatlengkap'   => $alamatlengkap, 
                            'latitude'   => $latitude, 
                            'longitude'   => $longitude, 
                            'deskripsi'   => $deskripsi,
                            'namagembala'   => $namagembala, 
                            'notelp'   => $notelp, 
                            'jadwalibadah'   => $jadwalibadah, 
                            'urlfacebook'   => $urlfacebook, 
                            'urlinstagram'   => $urlinstagram, 
                            'urlyoutube'   => $urlyoutube, 
                            'urltwitter'   => $urltwitter, 
                            'urllinkedin'   => $urllinkedin, 
                            'gambarsampul'   => $gambarsampul, 
                            'statusaktif'   => $statusaktif,
                        );
            $simpan = $this->Cabanggereja_model->simpan($data);      
        }else{ 

            $data = array(
                            'namacabang'   => $namacabang, 
                            'alamatlengkap'   => $alamatlengkap, 
                            'latitude'   => $latitude, 
                            'longitude'   => $longitude, 
                            'deskripsi'   => $deskripsi,
                            'namagembala'   => $namagembala, 
                            'notelp'   => $notelp, 
                            'jadwalibadah'   => $jadwalibadah, 
                            'urlfacebook'   => $urlfacebook, 
                            'urlinstagram'   => $urlinstagram, 
                            'urlyoutube'   => $urlyoutube, 
                            'urltwitter'   => $urltwitter, 
                            'urllinkedin'   => $urllinkedin, 
                            'gambarsampul'   => $gambarsampul, 
                        );
            $simpan = $this->Cabanggereja_model->update($data, $idcabang);
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
        redirect('cabanggereja');   
    }
    
    public function get_edit_data()
    {
        $idcabang = $this->input->post('idcabang');
        $RsData = $this->Cabanggereja_model->get_by_id($idcabang)->row();

        $data = array( 
                            'idcabang'     =>  $RsData->idcabang,  
                            'namacabang'   => $RsData->namacabang, 
                            'namacabang_slug'   => $RsData->namacabang_slug, 
                            'alamatlengkap'   => $RsData->alamatlengkap, 
                            'latitude'   => $RsData->latitude, 
                            'longitude'   => $RsData->longitude, 
                            'deskripsi'   => $RsData->deskripsi,
                            'namagembala'   => $RsData->namagembala, 
                            'notelp'   => $RsData->notelp, 
                            'jadwalibadah'   => $RsData->jadwalibadah, 
                            'urlfacebook'   => $RsData->urlfacebook, 
                            'urlinstagram'   => $RsData->urlinstagram, 
                            'urlyoutube'   => $RsData->urlyoutube, 
                            'urltwitter'   => $RsData->urltwitter, 
                            'urllinkedin'   => $RsData->urllinkedin, 
                            'gambarsampul'   => $RsData->gambarsampul,  
                        );

        echo(json_encode($data));
    }

    function createSlug($string) {

        $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($stripped, $table));
    }


    public function simpangallery()
    {
        $idcabang = $this->input->post('idcabang');        
        $filegallery = $this->App->uploadImage($_FILES, 'filegallery', '', 'cabanggereja/gallery');

        if (!empty($filegallery)) {
            $dataGallery = array(
                                'idcabang' => $idcabang, 
                                'filegallery' => $filegallery, 
                            );
            $simpan = $this->Cabanggereja_model->simpangallery($dataGallery);
        }else{
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> File gambar gallery tidak ada! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('cabanggereja/gallery/'.$this->encrypt->encode($idcabang));  
            exit();
        }

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data gallery berhasil disimpan!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gallery gagal disimpan! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('cabanggereja/gallery/'.$this->encrypt->encode($idcabang));  

    }
    public function deletegallery($idcabang, $idgallery)
    {
        $idcabang = $this->encrypt->decode($idcabang);
        $idgallery = $this->encrypt->decode($idgallery);

        // echo $idcabang;
        // exit();
        $hapus = $this->Cabanggereja_model->deletegallery($idcabang, $idgallery);
        if ($hapus) {       
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Gallery berhasil dihapus!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Gallery gagal dihapus! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('cabanggereja/gallery/'.$this->encrypt->encode($idcabang));    
    }

}

/* End of file Cabanggereja.php */
/* Location: ./application/controllers/Cabanggereja.php */