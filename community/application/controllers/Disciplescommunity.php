<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciplescommunity extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DisciplescommunityModel');
    }

    public function index()
    {
        $rowDC = $this->DisciplescommunityModel->getDcInfo();
        $data['rowDC'] = $rowDC;
        $data['menu'] = '';
        $this->load->view('disciplescommunity/index.php', $data);
    }
}
