<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infogereja extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Infogereja_model');
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
    	$data['rowinfogereja'] = $this->Infogereja_model->get_infogereja()->row();
        $data['menu'] = 'infogereja';
        $this->load->view('infogereja/form', $data);
    }   

    // ini simpan


    /**
	=============================================================================================================
		Keterangan: ini adalah fungsi untuk menyimpan data
	=============================================================================================================
    **/
    public function simpan()
    {       
        $namagereja             = $this->input->post('namagereja');
        $alamatgereja             = $this->input->post('alamatgereja');
        $emailgereja             = $this->input->post('emailgereja');
        $notelpgereja             = $this->input->post('notelpgereja');
        $urltwittergereja             = $this->input->post('urltwittergereja');
        $urlfacebookgereja             = $this->input->post('urlfacebookgereja');
        $urlinstagramgereja             = $this->input->post('urlinstagramgereja');
        $urlskipegereja             = $this->input->post('urlskipegereja');
        $urlgooglemaps             = $this->input->post('urlgooglemaps');
        $judulhomepage             = $this->input->post('judulhomepage');
        $subjudulhomepage             = $this->input->post('subjudulhomepage');
        $urlbuttonhomepage             = $this->input->post('urlbuttonhomepage');
        $opennewtabbuttonhomepage             = $this->input->post('opennewtabbuttonhomepage');
        
        $gambarhomepage_lama = $this->input->post('gambarhomepage_lama');
        $gambarhomepage = $this->update_upload_foto($_FILES, "gambarhomepage", $gambarhomepage_lama);
        	
        $data = array(
                            'namagereja'   => $namagereja, 
                            'alamatgereja'   => $alamatgereja, 
                            'emailgereja'   => $emailgereja, 
                            'notelpgereja'   => $notelpgereja, 
                            'urltwittergereja'   => $urltwittergereja, 
                            'urlfacebookgereja'   => $urlfacebookgereja, 
                            'urlinstagramgereja'   => $urlinstagramgereja, 
                            'urlskipegereja'   => $urlskipegereja, 
                            'urlgooglemaps'   => $urlgooglemaps, 
                            'gambarhomepage'   => $gambarhomepage, 
                            'judulhomepage'   => $judulhomepage, 
                            'subjudulhomepage'   => $subjudulhomepage, 
                            'urlbuttonhomepage'   => $urlbuttonhomepage, 
                            'opennewtabbuttonhomepage'   => $opennewtabbuttonhomepage, 
                        );
        $simpan = $this->Infogereja_model->update($data);

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
        redirect('infogereja');   
    }


    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/infogereja/';
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
            $config['upload_path']          = 'uploads/infogereja/';
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

/* End of file Infogereja.php */
/* Location: ./application/controllers/Infogereja.php */