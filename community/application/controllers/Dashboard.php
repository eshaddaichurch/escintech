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
        $data['menu'] = 'dashboard';
        $this->load->view('dashboard.php', $data);
    }
}
