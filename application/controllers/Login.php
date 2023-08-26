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
        redirect( site_url() );
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

                if ($result->statusverifikasiemail==0) {
                    echo json_encode(array('msg' => "Email anda belum diverifikasi."));
                    exit();
                }

                if (empty($result->foto)) {
                    $foto = base_url('admin/images/user-01.png');
                }else{
                    $foto = base_url('admin/uploads/jemaat/'.$result->foto);
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

    public function simpanregistrasi()
    {
        $namalengkap = $this->input->post('namalengkap');
        $jeniskelamin = $this->input->post('jeniskelamin');
        $tempatlahir = $this->input->post('tempatlahir');
        $tanggallahir = $this->input->post('tanggallahir');
        $alamatrumah = $this->input->post('alamatrumah');
        $nohp = $this->input->post('namalengkap');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $tanggalinsert = date('Y-m-d H:i:s');
        $idjemaat = $this->db->query("select create_idjemaat('".$tanggalinsert."') as idjemaat")->row()->idjemaat;

        /*Periksa Email*/
        if ($this->Login_model->emailsudahada($email)) {
            $pesan = "<script>
                            swal('Informasi', 'Email ".$email." sudah pernah terdaftar.', 'warning')
                                .then(function(){
                                        $('#registrasiModal').modal('show');
                                        $('#namalengkap').val('".$namalengkap."');
                                        $('#jeniskelamin').val('".$jeniskelamin."');
                                        $('#tempatlahir').val('".$tempatlahir."');
                                        $('#tanggallahir').val('".$tanggallahir."');
                                        $('#alamatrumah').val('".$alamatrumah."');
                                        $('#nohp').val('".$nohp."');
                                        $('#email').val('".$email."');
                                    })
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect(site_url());  
        }

        $data = array(
                        'idjemaat' => $idjemaat, 
                        'namalengkap' => $namalengkap, 
                        'jeniskelamin' => $idjemaat, 
                        'tempatlahir' => $tempatlahir, 
                        'tanggallahir' => $tanggallahir, 
                        'alamatrumah' => $alamatrumah, 
                        'nohp' => $nohp, 
                        'email' => $email, 
                        'password' => md5($password), 
                        'tanggalinsert' => $tanggalinsert,
                        'statusjemaat' => 'Umum',
                    );

        $simpan = $this->Login_model->simpanregistrasi($data);
        if ($simpan) {
            $textemail = '<a href="'.site_url('login/verifikasiemail/'.$this->encrypt->encode($email)).'">Verifikasi Email</a>';
            $this->App->sendEmailDaftar($email, 'Konfirmasi Pendaftaran MyEsc', $textemail);

            $pesan = "<script>
                                swal('Informasi', 'Data berhasil disimpan! Silahkan buka email dan verifikasi email anda. Apabila tidak ada di dalam folder kotak masuk, coba periksa di dalam folder spam.', 'success').then(function(){
                                        $('#loginModal').modal('show');
                                    })
                      </script>";
        }else{
            $eror = $this->db->error();         
            $pesan = "<script>swal('Informasi', 'Data gagal disimpan! Pesan Error: ".$eror['code'].' '.$eror['message']."', 'error')</script>";
        }
        $this->session->set_flashdata('pesan', $pesan);
        redirect(site_url());  
    }

    public function verifikasiemail($email)
    {
        $email = $this->encrypt->decode($email);

        /*Periksa Email*/
        if ($this->Login_model->emailsudahada($email)) {

            $simpan = $this->db->query("update jemaat set statusverifikasiemail='1' where email='$email' ");
             if ($simpan) {
                $pesan = "<script>
                                    swal('Informasi', 'Email berhasil di verifikasi.', 'success');
                          </script>";
            }else{
                $pesan = "<script>swal('Informasi', 'Email gagal diverifikasi!', 'error')</script>";
            }
            $this->session->set_flashdata('pesan', $pesan);
            redirect(site_url());  

        }else{

            $pesan = "<script>
                            swal('Informasi', 'Email tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect(site_url());  
        }

    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */