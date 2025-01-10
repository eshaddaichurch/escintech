<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profilsaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Profilsaya_model');
        $this->load->library('image_lib');
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login');
            exit();
        }
    }

    public function index()
    {
        $idpengguna         = $this->session->userdata('idpengguna');
        $data['idpengguna'] = $idpengguna;
        $data['menu']       = 'profilsaya';
        $this->load->view('profilsaya/form', $data);
    }

    public function simpan()
    {
        $idpengguna   = $this->input->post('idpengguna');
        $nama         = $this->input->post('nama');
        $tempatlahir  = $this->input->post('tempatlahir');
        $tgllahir     = date('Y-m-d', strtotime($this->input->post('tgllahir')));
        $jeniskelamin = $this->input->post('jeniskelamin');
        $alamat       = $this->input->post('alamat');
        $email        = $this->input->post('email');
        $username     = $this->input->post('username');
        $passwordlama = $this->input->post('passwordlama');
        $password     = $this->input->post('password');
        $password2    = $this->input->post('password2');

        $tglinsert = date('Y-m-d H:i:s');

        if (!empty($passwordlama) || !empty($password) || !empty($password2)) {
            $cekpasswordlama = $this->db->query("select * from pengguna where idpengguna='$idpengguna' and password='" . md5($passwordlama) . "'")->num_rows();
            if ($cekpasswordlama > 0) {
                if ($password != $password2) {
                    $pesan = '<div>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>Gagal!</strong> Password baru anda tidak sama!
                            </div>
                        </div>';
                    $this->session->set_flashdata('pesan', $pesan);
                    redirect('profilsaya');
                }
            } else {
                $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Password lama anda salah!
                        </div>
                    </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('profilsaya');
            }
        }

        $file_lama = $this->input->post('file_lama');
        $foto      = $this->update_upload_foto($_FILES, "file", $file_lama);

        if (!empty($passwordlama) || !empty($password) || !empty($password2)) {

            $data = array(
                'nama'         => $nama,
                'foto'         => $foto,
                'tempatlahir'  => $tempatlahir,
                'tgllahir'     => $tgllahir,
                'jeniskelamin' => $jeniskelamin,
                'alamat'       => $alamat,
                'password'     => md5($password),
                'email'        => $email,
                'username'     => $username,
            );

        } else {

            $data = array(
                'nama'         => $nama,
                'foto'         => $foto,
                'tempatlahir'  => $tempatlahir,
                'tgllahir'     => $tgllahir,
                'jeniskelamin' => $jeniskelamin,
                'alamat'       => $alamat,
                'email'        => $email,
                'username'     => $username,
            );

        }

        $simpan = $this->Profilsaya_model->update($data, $idpengguna);

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : ' . $eror['code'] . ' ' . $eror['message'] . '
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('profilsaya');
    }

    public function get_edit_data()
    {
        $idpengguna = $this->input->post('idpengguna');
        $RsData     = $this->Profilsaya_model->get_by_id($idpengguna)->row();

        $data = array(
            'idpengguna'   => $RsData->idpengguna,
            'nama'         => $RsData->nama,
            'foto'         => $RsData->foto,
            'tempatlahir'  => $RsData->tempatlahir,
            'tgllahir'     => $RsData->tgllahir,
            'jeniskelamin' => $RsData->jeniskelamin,
            'alamat'       => $RsData->alamat,
            'email'        => $RsData->email,
            'jabatan'      => $RsData->jabatan,
            'username'     => $RsData->username,
        );

        echo (json_encode($data));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']   = './uploads/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_space']  = true;
            $config['max_size']      = '2000KB';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = "";
            }

        } else {
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']   = './uploads/pengguna/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_space']  = true;
            $config['max_size']      = '2000KB';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = $file_lama;
            }
        } else {
            $foto = $file_lama;
        }

        return $foto;
    }

}

/* End of file Profilsaya.php */
/* Location: ./application/controllers/Profilsaya.php */
