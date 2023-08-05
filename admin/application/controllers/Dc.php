<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classname extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->is_login();
    $this->load->model('dc_model');
  }

            public function index()
            {

            }

}
