<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();      
        $this->load->model('Login_model'); 
    }

    public function keluar()
    {
        $this->session->sess_destroy(); 
        redirect('login');
    }

    public function index()
    { 
        $idjemaat = $this->session->userdata('idjemaat');
        if (!empty($idjemaat)) {
            redirect( site_url() );
        }else{
            $this->load->view('login');     
        }

    }

    public function cekLoginAjax()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (empty($email) AND empty($password)) {
            echo json_encode(array('msg' => "Email atau password tidak boleh kosong"));
        }else{

            $kirim = $this->Login_model->cekLoginAjax($email, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                if (empty($result->foto)) {
                    $foto = base_url('admin/images/user-01.png');
                }else{
                    $foto = base_url('admin/uploads/pengguna/'.$result.foto);
                }

                $data = array(
                    'idjemaat' => $result->idjemaat,
                    'namalengkap' => $result->namalengkap,
                    'namapanggilan' => $result->namapanggilan,
                    'foto' => $foto,
                );

                $this->session->set_userdata( $data );  

                echo json_encode(array('success' => true));
            }else{
            	echo json_encode(array('msg' => "Email atau password anda salah"));
            }
        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */