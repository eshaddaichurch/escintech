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
        redirect('Login');
    }

    public function index()
    { 
        $idpengguna = $this->session->userdata('idpengguna');
        if (!empty($idpengguna)) {
            redirect('Home');
        }else{
            $this->load->view('login');     
        }

    }

    public function cek_login()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        if (empty($username) AND empty($password)) {
            $pesan = '<div class="alert alert-danger">username atau password anda salah . . . Silahkan coba lagi . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
        }else{
            $kirim = $this->Login_model->cek_login($username, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                $data = array(
                    'idpengguna' => $result->idpengguna,
                    'nama' => $result->nama,
                    'username' => $result->username,
                    'foto' => $result->foto,
                    'jabatan' => $result->jabatan,
                    'jeniskelamin' => $result->jeniskelamin
                );
                                
                $this->session->set_userdata( $data );  
                redirect('Home');
            }else{
                $pesan = '<div class="alert alert-danger">Username atau Password Anda Salah . . . Silahkan Coba Lagi . . . </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('Login');
            }

        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */