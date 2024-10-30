<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

    public function index()
    {
        $idjemaat = $this->session->userdata('idjemaat');
        if (!empty($idjemaat)) {
            redirect(site_url());
        } else {
            $this->load->view('login');
        }
    }

    public function cekLoginAjax()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if (empty($email) and empty($password)) {
            echo json_encode(array('msg' => "Email atau password tidak boleh kosong"));
        } else {

            $kirim = $this->Login_model->cekLoginAjax($email, md5($password));
            if ($kirim->num_rows() > 0) {
                $result = $kirim->row();

                if ($result->statusverifikasiemail == 0) {
                    echo json_encode(array('msg' => "Your email has not been verified"));
                    exit();
                }

                if (empty($result->foto)) {
                    $foto = base_url('admin/images/user-01.png');
                } else {
                    $foto = base_url('admin/uploads/jemaat/' . $result->foto);
                }

                $data = array(
                    'idjemaat' => $result->idjemaat,
                    'namalengkap' => $result->namalengkap,
                    'namapanggilan' => $result->namapanggilan,
                    'alamatrumah' => $result->alamatrumah,
                    'rtrw' => $result->rtrw,
                    'kelurahan' => $result->alamatrumah,
                    'kecamatan' => $result->kecamatan,
                    'kotakabupaten' => $result->kotakabupaten,
                    'propinsi' => $result->propinsi,
                    'foto' => $foto,
                    'notelp' => $result->notelp,
                    'nohp' => $result->nohp,
                    'email' => $result->email,
                );

                $this->session->set_userdata($data);

                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('msg' => "Either your email or password is wrong. Please try again "));
            }
        }
    }

    public function simpanregistrasi()
    {
        $namalengkap = $this->input->post('namalengkap');
        $nik = $this->input->post('nik');
        $jeniskelamin = $this->input->post('jeniskelamin');
        $tempatlahir = $this->input->post('tempatlahir');
        $tanggallahir = $this->input->post('tanggallahir');
        $alamatrumah = $this->input->post('alamatrumah');
        $nohp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $alasanmembuatakun = $this->input->post('alasanmembuatakun');
        $sudahpernahfondationclass = $this->input->post('sudahpernahfondationclass');
        $tanggalinsert = date('Y-m-d H:i:s');

        /*Periksa Email*/
        if ($this->Login_model->emailsudahada($email)) {
            echo json_encode(array('msg' => "Email " . $email . " sudah pernah terdaftar!"));
            exit();
        }


        if ($alasanmembuatakun == 'Bergabung') {

            if (!empty($nik)) {
                $sudahAdaNIK = $this->Login_model->sudahAdaNIK($nik);
                $sudahAdaNIKTgllahir = $this->Login_model->sudahAdaNIKTgllahir($nik, $tanggallahir);
            } else {
                $sudahAdaNIK = false;
                $sudahAdaNIKTgllahir = false;
            }




            if ($sudahAdaNIK && !$sudahAdaNIKTgllahir) {
                $pesan = "<script>
                swal('Informasi', 'Nik tidak cocok dengan tanggal lahir anda.', 'warning');
                </script>";
                $this->session->set_flashdata('pesan', $pesan);
                redirect(site_url());
            }

            // echo json_encode("-1 test");
            // exit();
            if ($sudahAdaNIKTgllahir) {

                $idjemaat = $this->Login_model->getIdJemaatByNIK($nik)->idjemaat;

                $data = array(
                    'namalengkap' => $namalengkap,
                    'nik' => $nik,
                    'jeniskelamin' => $jeniskelamin,
                    'tempatlahir' => $tempatlahir,
                    'nohp' => $nohp,
                    'email' => $email,
                    'password' => md5($password),
                    'alasanmembuatakun' => $alasanmembuatakun,
                    'sudahpernahfondationclass' => $sudahpernahfondationclass,
                );

                $simpan = $this->Login_model->updateregistrasi($data, $idjemaat);
            } else {

                $idjemaat = $this->db->query("select create_idjemaat('" . $tanggalinsert . "') as idjemaat")->row()->idjemaat;

                $data = array(
                    'idjemaat' => $idjemaat,
                    'namalengkap' => $namalengkap,
                    'nik' => $nik,
                    'jeniskelamin' => $jeniskelamin,
                    'tempatlahir' => $tempatlahir,
                    'tanggallahir' => $tanggallahir,
                    'alamatrumah' => $alamatrumah,
                    'nohp' => $nohp,
                    'email' => $email,
                    'password' => md5($password),
                    'tanggalinsert' => $tanggalinsert,
                    'statusjemaat' => 'Umum',
                    'alasanmembuatakun' => $alasanmembuatakun,
                    'sudahpernahfondationclass' => $sudahpernahfondationclass,
                );

                $simpan = $this->Login_model->simpanregistrasi($data);
            }
        } else {
            $sudahpernahfondationclass = 'NULL';

            $idjemaat = $this->db->query("select create_idjemaat('" . $tanggalinsert . "') as idjemaat")->row()->idjemaat;

            $data = array(
                'idjemaat' => $idjemaat,
                'namalengkap' => $namalengkap,
                'nik' => $nik,
                'jeniskelamin' => $jeniskelamin,
                'tempatlahir' => $tempatlahir,
                'tanggallahir' => $tanggallahir,
                'alamatrumah' => $alamatrumah,
                'nohp' => $nohp,
                'email' => $email,
                'password' => md5($password),
                'tanggalinsert' => $tanggalinsert,
                'statusjemaat' => 'Umum',
                'alasanmembuatakun' => $alasanmembuatakun,
                'sudahpernahfondationclass' => $sudahpernahfondationclass,
            );



            $simpan = $this->Login_model->simpanregistrasi($data);
        }

        if ($simpan) {

            if ($alasanmembuatakun == 'Bergabung' && $sudahpernahfondationclass == 'Belum') {
                $dataCareJemaatBaru = array(
                    'tglinsert' => date('Y-m-d H:i:s'),
                    'idjemaat' => $idjemaat,
                    'status' => 'Permohonan',
                    'idadmin' => $this->session->userdata('idjemaat'),
                );
                $simpan = $this->Login_model->kirimKeCare($dataCareJemaatBaru);
            }
            $textemail = 
            '<h4>Shalom! ' . $namalengkap . 'Welcome to myesc! </h4>
            <p>We’re thrilled to have you with us! Before you can start your journey with us, please verify your email with a quick click below!</p>
                <p> <a href="' . site_url('login/verifikasiemail/' . $this->encrypt->encode($email)) 
            . '">
            <div class= "btn btn-primary">
            Verify Email
            </div></a> </p>
            <p>Thank You,</p>
            <p>EL SHADDAI CHURCH</p>
            <hr>
            <h4>Shalom! ' . $namalengkap . 'Selamat datang di MyEsc! </h4>
            <p>Kami senang kamu sudah bergabung. Sebelum kamu bisa memulai perjalananmu bersama kami, yuk, verifikasi email ini dengan satu klik cepat di bawah ini!</p>
                <p> <a href="' . site_url('login/verifikasiemail/' . $this->encrypt->encode($email)) 
            . '">
            <div class= "btn btn-primary">
            Verifikasi Email
            </div></a> </p>
            <p>Terima Kasih,</p>
            <p>GBI EL SHADDAI</p>
            ';
            $this->App->sendEmailDaftar($email, 'Email Verification', $textemail);
            echo json_encode(array('success' => true));
        } else {
            $eror = $this->db->error();
            echo json_encode(array('msg' => "Data gagal disimpan! Pesan Error: " . $eror['code'] . ' ' . $eror['message']));
        }
    }


    public function verifikasiemail($email)
    {
        $email = $this->encrypt->decode($email);

        /*Periksa Email*/
        if ($this->Login_model->emailsudahada($email)) {

            $simpan = $this->db->query("update jemaat set statusverifikasiemail='1' where email='$email' ");
            if ($simpan) {
                $pesan = "<script>
                                    swal('Congrats', 'Your email has been successfully verified.', 'success');
                          </script>";
            } else {
                $pesan = "<script>swal('Sorry', 'Email verification faild. Please try again', 'error')</script>";
            }
            $this->session->set_flashdata('pesan', $pesan);
            redirect(site_url());
        } else {

            $pesan = "<script>
                            swal('Sorry', 'Email not found.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect(site_url());
        }
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */