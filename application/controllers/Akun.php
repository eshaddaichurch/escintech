<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Home_model');
        $this->load->model('Akun_model');
    }

    public function profil($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowProfil'] = $this->Akun_model->getInfoJemaat()->row();
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data['menu'] = 'Akun';
        $this->load->view('akun/profil', $data);
    }

    public function ubahprofil($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowProfil'] = $this->Akun_model->getInfoJemaat()->row();
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data['menu'] = 'Akun';
        $this->load->view('akun/ubahprofil', $data);
    }

    public function gantipassword($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rowProfil'] = $this->Akun_model->getInfoJemaat()->row();
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data['menu'] = 'Akun';
        $this->load->view('akun/gantipassword', $data);
    }

    public function kelas($idmenu = "")
    {

        //data kelas
        $rskelas = $this->db->query("
                SELECT kelas.idkelas, kelas.namakelas, kelas.urlsertifikat,
                    registrasikelas.`statuslulus`, tglsertifikat, idregistrasikelas
                    FROM kelas 
                    LEFT JOIN registrasikelas ON registrasikelas.`idkelas`=kelas.`idkelas` and idjemaat='" . $this->session->userdata('idjemaat') . "' AND statuslulus=1
                    GROUP BY kelas.idkelas, kelas.namakelas, kelas.urlsertifikat,
                    registrasikelas.`statuslulus`, tglsertifikat, idregistrasikelas
            ");

        $idmenu = $this->encrypt->decode($idmenu);
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data['menu'] = 'Akun';
        $data['rskelas'] = $rskelas;
        $this->load->view('akun/kelas', $data);
    }


    public function sertifikat($idregistrasikelas)
    {

        // error_reporting(0);
        $this->load->library('Pdf');


        $rsregistrasi         = $this->db->query("
                                        select * from v_registrasikelas where idregistrasikelas='" . $idregistrasikelas . "'
                                    ")->row();

        $idkelas = $rsregistrasi->idkelas;
        switch ($idkelas) {
            case 'KL002':
                $report = 'sertifikatfc1';
                break;
            case 'KL003':
                $report = 'sertifikatfc2';
                break;
            case 'KL004':
                $report = 'sertifikatfc3';
                break;
            case 'KL005':
                $report = 'sertifikatgrade1';
                break;
            case 'KL006':
                $report = 'sertifikatgrade2';
                break;
            case 'KL007':
                $report = 'sertifikatgrade3';
                break;
            case 'KL008':
                $report = 'sertifikatvc';
                break;
            case 'KL101':
                $report = 'sertifikatpmc';
                break;
            default:
                $report = '';
                break;
        }

        $data['rsregistrasi'] = $rsregistrasi;
        $data['idregistrasikelas'] = $idregistrasikelas;
        $this->load->view('akun/' . $report, $data);
    }

    public function simpanupload()
    {
        $idjemaat = $this->session->userdata('idjemaat');

        $foto_lama = $this->input->post('foto_lama');
        $foto = $this->App->uploadImage($_FILES, "foto", $foto_lama, 'jemaat');

        $dataUpload = array(
            'foto' => $foto,
        );

        $simpan = $this->Akun_model->simpanupload($dataUpload);
        redirect('akun/profil');
    }

    public function simpanregistered()
    {
        $nohp = $this->input->post('nohp');

        if ($this->Akun_model->hpSudahTerdaftar($nohp)) {
            $pesan = "<script>
                        swal('Gagal', 'Nomor HP sudah terdaftar.', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/ubahprofil');
        }

        $data = array(
            'nohp' => htmlspecialchars($nohp)
        );
        $simpan = $this->Akun_model->update($data);
        if ($simpan) {
            $pesan = "<script>
                            swal('Berhasil', 'Data berhasil disimpan.', 'success');
                        </script>";
        } else {
            $pesan = "<script>
                            swal('Gagal', 'Data gagal disimpan.', 'warning');
                        </script>";
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('akun/profil');
    }


    public function simpanjemaat()
    {
        $nohp = $this->input->post('nohp');
        $alamatrumah = $this->input->post('alamatrumah');
        $namadarurat = $this->input->post('namadarurat');
        $hubungan = $this->input->post('hubungan');
        $notelpdarurat = $this->input->post('notelpdarurat');
        $instagram = $this->input->post('instagram');
        $facebook = $this->input->post('facebook');

        if ($this->Akun_model->hpSudahTerdaftar($nohp)) {
            $pesan = "<script>
                        swal('Gagal', 'Nomor HP sudah terdaftar.', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/ubahprofil');
        }

        $data = array(
            'nohp' => htmlspecialchars($nohp),
            'alamatrumah' => htmlspecialchars($alamatrumah),
            'namadarurat' => htmlspecialchars($namadarurat),
            'hubungan' => $hubungan,
            'notelpdarurat' => htmlspecialchars($notelpdarurat),
            'instagram' => htmlspecialchars($instagram),
            'facebook' => htmlspecialchars($facebook),
        );

        $simpan = $this->Akun_model->update($data);
        if ($simpan) {
            $pesan = "<script>
                            swal('Berhasil', 'Data berhasil disimpan.', 'success');
                        </script>";
        } else {
            $pesan = "<script>
                            swal('Gagal', 'Data gagal disimpan.', 'warning');
                        </script>";
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('akun/profil');
    }


    public function simpanubahpassword()
    {
        $passwordlama = htmlspecialchars($this->input->post('passwordlama'));
        $passwordbaru1 = htmlspecialchars($this->input->post('passwordbaru1'));
        $passwordbaru2 = htmlspecialchars($this->input->post('passwordbaru2'));

        if (empty($passwordlama)) {
            $pesan = "<script>
                        swal('Gagal', 'Password lama tidak boleh kosong!', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/gantipassword');
        }


        if (empty($passwordbaru1) || empty($passwordbaru2)) {
            $pesan = "<script>
                        swal('Gagal', 'Password baru tidak boleh kosong!', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/gantipassword');
        }

        if (!$this->Akun_model->cekPasswordLama($passwordlama)) {
            $pesan = "<script>
                        swal('Gagal', 'Password lama salah!', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/gantipassword');
        }


        if ($passwordbaru1 != $passwordbaru2) {
            $pesan = "<script>
                        swal('Gagal', 'Ulangi Password tidak sama!', 'warning');
                    </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('akun/gantipassword');
        }


        $data = array(
            'password' => md5($passwordbaru1),
        );

        $simpan = $this->Akun_model->update($data);
        if ($simpan) {
            $pesan = "<script>
                            swal('Berhasil', 'Data berhasil disimpan.', 'success');
                        </script>";
        } else {
            $pesan = "<script>
                            swal('Gagal', 'Data gagal disimpan.', 'warning');
                        </script>";
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('akun/profil');
    }
}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */