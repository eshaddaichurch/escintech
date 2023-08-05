<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soundsystem1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soundsystem_model1');
    }

   

    

    public function index()
    {
        $data['menu'] = 'pembangunan';
        $this->load->view('listdata_ss1',);
    }   

    public function datatablesource()
    {
        $RsData = $this->Soundsystem_model1->get_datatables();
        $no = $_POST['start'];
        $data = array();
      

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->nama;
                $row[] = $rowdata->alamat;
                $row[] = $rowdata->telepon;
                $row[] = $rowdata->jumlah;
                $row[] = $rowdata->tunai;
                $row[] = $rowdata->atm;
                $row[] = $rowdata->giro;
                


                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Soundsystem_model1->count_all(),
                        "recordsFiltered" => $this->Soundsystem_model1->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

   

    
    
    

   


    

}

/* End of file Jemaat.php */
/* Location: ./application/controllers/Jemaat.php */