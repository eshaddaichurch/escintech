<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soundsystem extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('/soundsystem_model');
    }

   

    

    public function index()
    {
        $data['menu'] = 'soundsystem';
        $this->load->view('soundsystem/listdata_ss',);
    }   

    public function datatablesource()
    {
        $RsData = $this->soundsystem_model->get_datatables();
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
                        "recordsTotal" => $this->soundsystem_model->count_all(),
                        "recordsFiltered" => $this->soundsystem_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

   
    

}

    
    
    

   


    



/* End of file Jemaat.php */
/* Location: ./application/controllers/Jemaat.php */