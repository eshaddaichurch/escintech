<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pageskategori extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Pageskategori_model');
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
        $data['menu'] = 'pageskategori';
        $this->load->view('pageskategori/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idpageskategori'] = '';        
        $data['menu'] = 'pageskategori';  
        $this->load->view('pageskategori/form', $data);
    }

    public function edit($idpageskategori)
    {       
        $idpageskategori = $this->encrypt->decode($idpageskategori);

        if ($this->Pageskategori_model->get_by_id($idpageskategori)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pageskategori');
            exit();
        };
        $data['idpageskategori'] =$idpageskategori;        
        $data['menu'] = 'pageskategori';
        $this->load->view('pageskategori/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pageskategori_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idpageskategori;
                $row[] = $rowdata->namapageskategori.'<br>'.'<span>'.$rowdata->slug.'</span>';
                $row[] = '<a href="'.site_url( 'pageskategori/edit/'.$this->encrypt->encode($rowdata->idpageskategori) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('pageskategori/delete/'.$this->encrypt->encode($rowdata->idpageskategori) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pageskategori_model->count_all(),
                        "recordsFiltered" => $this->Pageskategori_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idpageskategori)
    {
        $idpageskategori = $this->encrypt->decode($idpageskategori);  
        $rsdata = $this->Pageskategori_model->get_by_id($idpageskategori);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pageskategori');
            exit();
        };

        $hapus = $this->Pageskategori_model->hapus($idpageskategori);
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
        redirect('pageskategori');        

    }

    public function simpan()
    {       
        $idpageskategori             = $this->input->post('idpageskategori');
        $namapageskategori        = $this->input->post('namapageskategori');
        $deskripsi        = $this->input->post('deskripsi');
        $tglinsert        = date('Y-m-d H:i:s');
        $tglupdate        = date('Y-m-d H:i:s');
        $slug = $this->createSlug($namapageskategori);
        $gambarkategori = null;
        $idjemaat = $this->session->userdata('idjemaat');


        if ( $idpageskategori=='' ) {  

            $idpageskategori = $this->db->query("select create_idpageskategori('".$namapageskategori."') as idpageskategori")->row()->idpageskategori;

            $data = array(
                            'idpageskategori'   => $idpageskategori, 
                            'namapageskategori'   => $namapageskategori, 
                            'slug'   => $slug, 
                            'deskripsi'   => $deskripsi, 
                            'gambarkategori'   => $gambarkategori, 
                            'tglinsert'   => $tglinsert, 
                            'tglupdate'   => $tglupdate, 
                            'idjemaat'   => $idjemaat, 
                        );
            $simpan = $this->Pageskategori_model->simpan($data);      
        }else{ 

            $data = array(
                            'namapageskategori'   => $namapageskategori, 
                            'deskripsi'   => $deskripsi, 
                            'gambarkategori'   => $gambarkategori, 
                            'tglupdate'   => $tglupdate, 
                            'idjemaat'   => $idjemaat, 
                        );
            $simpan = $this->Pageskategori_model->update($data, $idpageskategori);
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
        redirect('pageskategori');   
    }
    
    public function get_edit_data()
    {
        $idpageskategori = $this->input->post('idpageskategori');
        $RsData = $this->Pageskategori_model->get_by_id($idpageskategori)->row();

        $data = array( 
                            'idpageskategori'     =>  $RsData->idpageskategori,  
                            'namapageskategori'     =>  $RsData->namapageskategori,  
                            'slug'     =>  $RsData->slug,  
                            'deskripsi'     =>  $RsData->deskripsi,  
                            'gambarkategori'     =>  $RsData->gambarkategori,  
                            'idjemaat'     =>  $RsData->idjemaat,  
                        );

        echo(json_encode($data));
    }


    function createSlug($string) {

	    $table = array(
	            '??'=>'S', '??'=>'s', '??'=>'Dj', '??'=>'dj', '??'=>'Z', '??'=>'z', '??'=>'C', '??'=>'c', '??'=>'C', '??'=>'c',
	            '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'C', '??'=>'E', '??'=>'E',
	            '??'=>'E', '??'=>'E', '??'=>'I', '??'=>'I', '??'=>'I', '??'=>'I', '??'=>'N', '??'=>'O', '??'=>'O', '??'=>'O',
	            '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'U', '??'=>'U', '??'=>'U', '??'=>'U', '??'=>'Y', '??'=>'B', '??'=>'Ss',
	            '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'c', '??'=>'e', '??'=>'e',
	            '??'=>'e', '??'=>'e', '??'=>'i', '??'=>'i', '??'=>'i', '??'=>'i', '??'=>'o', '??'=>'n', '??'=>'o', '??'=>'o',
	            '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'u', '??'=>'u', '??'=>'u', '??'=>'y', '??'=>'y', '??'=>'b',
	            '??'=>'y', '??'=>'R', '??'=>'r', '/' => '-', ' ' => '-'
	    );

	    // -- Remove duplicated spaces
	    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

	    // -- Returns the slug
	    return strtolower(strtr($stripped, $table));
	}
}

/* End of file Pageskategori.php */
/* Location: ./application/controllers/Pageskategori.php */