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

    public function cek_login()
    {
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));

        if (empty($username) AND empty($password)) {
            $pesan = '<div class="alert alert-danger">username atau password tidak boleh kosong!</div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('login');
        }else{
            $kirim = $this->Login_model->cek_login($username, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                if (empty($result->foto)) {
                    $foto = base_url('images/user-01.png');
                }else{
                    $foto = base_url('uploads/pengguna/'.$result.foto);
                }

                $data = array(
                    'idjemaat' => $result->idjemaat,
                    'namalengkap' => $result->namalengkap,
                    'namapanggilan' => $result->namapanggilan,
                    'idotorisasi' => $result->idotorisasi,
                    'namaotorisasi' => $result->namaotorisasi,
                    'foto' => $foto,
                );

                $this->session->set_userdata( $data );  
                redirect( site_url() );
            }else{
                $pesan = '<div class="alert alert-danger">Username atau password salah!</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('login');
            }

        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */