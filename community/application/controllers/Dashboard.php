<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('DashboardModel');
    }

    public function index()
    {
        $jumlahdm = $this->db->query("select count(*) as jumlah from v_dcmember where iddc = '" . $this->session->userdata('iddc') . "' and statuskeanggotaan = 'Disciples maker'")->row()->jumlah;
        $jumlahcore = $this->db->query("select count(*) as jumlah from v_dcmember where iddc = '" . $this->session->userdata('iddc') . "' and statuskeanggotaan = 'Core Team'")->row()->jumlah;
        $jumlahmember = $this->db->query("select count(*) as jumlah from v_dcmember where iddc = '" . $this->session->userdata('iddc') . "' and statuskeanggotaan = 'Anggota'")->row()->jumlah;

        $data['jumlahdm'] = $jumlahdm;
        $data['jumlahcore'] = $jumlahcore;
        $data['jumlahmember'] = $jumlahmember;
        $data['menu'] = 'dashboard';
        $this->load->view('dashboard.php', $data);
    }

    public function getinfobox()
    {
        $jumlahdm = $this->db->query("select count(*) from v_dcmember where iddc = '" . $this->session->userdata('iddc') . "' and statuskeanggotaan = 'Disciples maker'");
    }
}
