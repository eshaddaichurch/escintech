<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{

    public function hpSudahTerdaftar($nohp)
    {
        $idjemaat = $this->session->userdata('idjemaat');
        $rsNoHP = $this->db->query("
            select * from v_jemaat where idjemaat <> '$idjemaat' and nohp='$nohp'
        ");
        if ($rsNoHP->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function cekPasswordLama($password)
    {
        $idjemaat = $this->session->userdata('idjemaat');
        $password = md5($password);

        $rsPassword = $this->db->query("
            select * from jemaat where idjemaat = '$idjemaat' and password ='$password' 
        ");
        if ($rsPassword->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function getInfoJemaat($idjemaat = "")
    {
        $this->db->where('idjemaat', $this->session->userdata('idjemaat'));
        return $this->db->get('v_jemaat');
    }

    public function simpanupload($dataUpload)
    {
        $this->db->where("idjemaat", $this->session->userdata('idjemaat'));
        return $this->db->update('jemaat', $dataUpload);
    }

    public function update($data)
    {
        $this->db->where("idjemaat", $this->session->userdata('idjemaat'));
        return $this->db->update('jemaat', $data);
    }
}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */