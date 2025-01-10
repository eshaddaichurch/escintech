<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardutama extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        if (!empty($this->session->userdata('idotorisasi'))) {
            $idotorisasi = $this->session->userdata('idotorisasi');

            if ($idotorisasi == '0000') {
                redirect('dashboardvisitor');
            }

            if ($idotorisasi == '0001') {
                redirect('dashboardkehadiran');
            }

            if ($idotorisasi == '0002') {
                redirect('dashboardkehadiran');
            }

            if ($idotorisasi == '0003') {
                redirect('dashboardnextstep');
            }
        }
        redirect('dashboardvisitor');
    }
}
