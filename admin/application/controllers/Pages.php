<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Pages_model');
        $this->load->model('Jemaat_model');
        $this->load->library('image_lib');

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
        $data['menu'] = 'pages';
        $this->load->view('pages/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idpages'] = '';        
        $data['menu'] = 'pages';  
        $this->load->view('pages/form', $data);
    }

    public function edit($idpages)
    {       
        $idpages = $this->encrypt->decode($idpages);

        if ($this->Pages_model->get_by_id($idpages)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pages');
            exit();
        };
        $data['idpages'] =$idpages;        
        $data['menu'] = 'pages';
        $this->load->view('pages/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pages_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {


            	if (!empty($rowdata->gambarsampul)) {
                    $gambarsampul = '<img src="'.base_url('uploads/pages/'.$rowdata->gambarsampul).'" alt="" style="width: 80%;">';
                }else{
                    $gambarsampul = '<img src="'.base_url('images/no-user-images.png').'" alt="" style="width: 80%;">';
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $gambarsampul;
                $row[] = $rowdata->idpages;
                $row[] = $rowdata->namapages;
                $row[] = $rowdata->namapageskategori;
                $row[] = '<a href="'.site_url( 'pages/edit/'.$this->encrypt->encode($rowdata->idpages) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('pages/delete/'.$this->encrypt->encode($rowdata->idpages) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pages_model->count_all(),
                        "recordsFiltered" => $this->Pages_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idpages)
    {
        $idpages = $this->encrypt->decode($idpages);  
        $rsdata = $this->Pages_model->get_by_id($idpages);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pages');
            exit();
        };

        $hapus = $this->Pages_model->hapus($idpages);
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
        redirect('pages');        

    }

    public function simpan()
    {       
        $idpages             = $this->input->post('idpages');
        $idpageskategori        = $this->input->post('idpageskategori');
        $namapages        = $this->input->post('namapages');
        $isipages        = $this->input->post('isipages');
        $slug           = $this->createSlug($namapages);

        $tglinsert        = date('Y-m-d H:i:s');
        $tglupdate        = date('Y-m-d H:i:s');
        $idjemaat = $this->session->userdata('idjemaat');



        if ( $idpages=='' ) {  

            $idpages = $this->db->query("select create_idpages('".date('Y-m-d')."', '".$idpageskategori."') as idpages")->row()->idpages;

        	$gambarsampul = $this->upload_foto($_FILES, "gambarsampul");

            $data = array(
                            'idpages'   => $idpages, 
                            'idpageskategori'   => $idpageskategori, 
                            'namapages'   => $namapages, 
                            'slug'   => $slug, 
                            'isipages'   => $isipages, 
                            'gambarsampul'   => $gambarsampul, 
                            'tglinsert'   => $tglinsert, 
                            'tglupdate'   => $tglupdate, 
                            'idjemaat'   => $idjemaat, 
                        );
            // var_dump($data);
            // exit();
            $simpan = $this->Pages_model->simpan($data);      
        }else{ 


        	$gambarsampul_lama = $this->input->post('gambarsampul_lama');
        	$gambarsampul = $this->update_upload_foto($_FILES, "gambarsampul", $gambarsampul_lama);

            $data = array(
                            'idpages'   => $idpages, 
                            'idpageskategori'   => $idpageskategori, 
                            'namapages'   => $namapages, 
                            'isipages'   => $isipages, 
                            'gambarsampul'   => $gambarsampul, 
                            'tglupdate'   => $tglupdate, 
                            'idjemaat'   => $idjemaat, 
                        );
            $simpan = $this->Pages_model->update($data, $idpages);
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
        redirect('pages');   
    }
    
    public function get_edit_data()
    {
        $idpages = $this->input->post('idpages');
        $RsData = $this->Pages_model->get_by_id($idpages)->row();

        $data = array( 
                            'idpages'     =>  $RsData->idpages,  
                            'idpageskategori'     =>  $RsData->idpageskategori,  
                            'namapages'     =>  $RsData->namapages,  
                            'slug'     =>  $RsData->slug,  
                            'isipages'     =>  $RsData->isipages,  
                            'gambarsampul'     =>  $RsData->gambarsampul,  
                            'linkpages'     => $this->App->APPBASEURL().'pages/read/-/'.$RsData->slug,  
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


	public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/pages/';
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
            $config['upload_path']          = 'uploads/pages/';
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

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */