<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpuluhan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jemaat_model');
    }

   

    

    public function index()
    {
        $data['menu'] = 'perpuluhan';
        $this->load->view('Persembahan/listdata', $data);
    }   

    // public function tambah()
    // {       
    //     $data['idjemaat'] = '';        
    //     $data['menu'] = 'jemaat';  
    //     $this->load->view('jemaat/form', $data);
    // }

    // public function edit($idjemaat)
    // {       
    //     $idjemaat = $this->encrypt->decode($idjemaat);

    //     if ($this->Jemaat_model->get_by_id($idjemaat)->num_rows()<1) {
    //         $pesan = '<div>
    //                     <div class="alert alert-danger alert-dismissable">
    //                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    //                         <strong>Ilegal!</strong> Data tidak ditemukan! 
    //                     </div>
    //                 </div>';
    //         $this->session->set_flashdata('pesan', $pesan);
    //         redirect('jemaat');
    //         exit();
    //     };
    //     $data['idjemaat'] =$idjemaat;        
    //     $data['menu'] = 'jemaat';
    //     $this->load->view('jemaat/form', $data);
    // }

    public function datatablesource()
    {
        $RsData = $this->Jemaat_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->nama;
                $row[] = $rowdata->perpuluhan;
                $row[] = $rowdata->ucapansyukur;
                $row[] = $rowdata->dll;
                $row[] = $rowdata->tunai;
                $row[] = $rowdata->atm;
                $row[] = $rowdata->giro;
                $row[] = $rowdata->rk;


                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Jemaat_model->count_all(),
                        "recordsFiltered" => $this->Jemaat_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    

}

/* End of file Jemaat.php */
/* Location: ./application/controllers/Jemaat.php */