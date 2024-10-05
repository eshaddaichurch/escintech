<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonansaya extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->wajibLogin();
        $this->load->model('Permohonansaya_model');
        $this->load->model('Akun_model');
        $this->load->model('Home_model');
    }

    public function index($idmenu = "")
    {
        $idmenu = $this->encrypt->decode($idmenu);
        $data['rsPermohonan'] = $this->Permohonansaya_model->getPermohonan();
        $data['rowProfil'] = $this->Akun_model->getInfoJemaat()->row();
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data['menu'] = 'Akun';
        $this->load->view('permohonansaya/index', $data);
    }

    public function tambah() {}

    public function edit($id) {}

    public function hapus($id) {}

    public function simpan() {}
}
