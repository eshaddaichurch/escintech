<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalibadah extends CI_Controller {

    public function __construct()

    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Jadwalibadah_model');

        
    }
    
        //login
        public function is_login()
        {
            $idjemaat = $this->session->userdata('idjemaat');
            if (empty($idjemaat)) {
                $pesan = '<div class="alert alert-danger">Sesi telah berakhir. Silahkan login kembali!</div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('login'); 
                exit();
            }
        }   


            public function index()
            {
                $data['menu'] = 'jadwalibadah';
                $this->load->view('jadwalibadah/listdata', $data);
            }   

            public function tambah()
            {       
                $data['idjadwalibadahmingguan'] = '';        
                $data['menu'] = 'jadwalibadah';  
                $this->load->view('jadwalibadah/form', $data);
            }

    public function edit($idjadwalibadahmingguan)
    {       
        $idjadwalibadahmingguan = $this->encrypt->decode($idjadwalibadahmingguan);

        if ($this->Jadwalibadah_model->get_by_id($idjadwalibadahmingguan)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jadwalibadah');
            exit();
        };
        $data['idjadwalibadahmingguan'] =$idjadwalibadahmingguan;        
        $data['menu'] = 'jadwalibadah';
        $this->load->view('jadwalibadah/form', $data);
    }

            public function datatablesource()
            {
                $RsData = $this->Jadwalibadah_model->get_datatables();
                $no = $_POST['start'];
                $data = array();

                if ($RsData->num_rows()>0) {
                    foreach ($RsData->result() as $rowdata) {
                        $no++;
                        $row = array();
                        $row[] = $no;
                        $row[] = $rowdata->idjadwalibadahmingguan;                                                                 
                        $row[] = date('d-m-Y', strtotime($rowdata->tanggaljadwal));             
                        $row[] = $rowdata->tema; 
                        $row[] = $rowdata->subtema;
                        $row[] = $rowdata->idpengkhotbah;
                        $row[] = $rowdata->videoembed; 
                        $row[] = $rowdata->gambarsampul;            
                        $row[] = '<a href="'.site_url( 'jadwalibadah/edit/'.$this->encrypt->encode($rowdata->idjadwalibadahmingguan) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                                <a href="'.site_url('jadwalibadah/delete/'.$this->encrypt->encode($rowdata->idjadwalibadahmingguan) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                        $data[] = $row;
                        
                    }
                }



                $output = array(
                                "draw" => $_POST['draw'],
                                "recordsTotal" => $this->Jadwalibadah_model->count_all(),
                                "recordsFiltered" => $this->Jadwalibadah_model->count_filtered(),
                                "data" => $data,
                        );
                echo json_encode($output);
            } 

                            public function delete($idjadwalibadahmingguan)
                            {
                                $idjadwalibadahmingguan = $this->encrypt->decode($idjadwalibadahmingguan);  
                                $rsdata = $this->Jadwalibadah_model->get_by_id($idjadwalibadahmingguan);
                                if ($rsdata->num_rows()<1) {
                                    $pesan = '<div>
                                                <div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    <strong>Ilegal!</strong> Data tidak ditemukan! 
                                                </div>
                                            </div>';
                                    $this->session->set_flashdata('pesan', $pesan);
                                    redirect('jadwalibadah');
                                    exit();
              };

        $hapus = $this->Jadwalibadah_model->hapus($idjadwalibadahmingguan);
        if ($hapus) {       
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('jadwalibadah');        

    }

    public function simpan()
    {       
        $idjadwalibadahmingguan = $this->input->post('idjadwalibadahmingguan');
        $tanggaljadwal             = $this->input->post('tanggaljadwal');
        $tema             = $this->input->post('tema');
        $subtema             = $this->input->post('subtema');
        $idpengkhotbah             = $this->input->post('idpengkhotbah');
        $videoembed             = $this->input->post('videoembed');
        $gambarsampul             = $this->input->post('gambarsampul');
                        

        if ( $idjadwalibadahmingguan=='' ) {  

            $idjadwalibadahmingguan = $this->db->query("select create_idjadwalibadah('".date('Y-m-d')."') as idjadwalibadah")->row()->idjadwalibadah;


            
            $data = array(
                            'idjadwalibadahmingguan' => $idjadwalibadahmingguan,
                            'tanggaljadwal' => $tanggaljadwal,
                            'tema'   => $tema,  
                            'subtema'   => $subtema,
                            'idpengkhotbah' => $idpengkhotbah,
                            'videoembed' => $videoembed,
                            'gambarsampul' => $gambarsampul,

                        );
            $simpan = $this->Jadwalibadah_model->simpan($data);      
        }else{ 

            $data = array(
                            
                            'idjadwalibadahmingguan' => $idjadwalibadahmingguan,
                            'tanggaljadwal' => $tanggaljadwal,
                            'tema'   => $tema,  
                            'subtema'   => $subtema,
                            'idpengkhotbah' => $idpengkhotbah,
                            'videoembed' => $videoembed,
                            'gambarsampul' => $gambarsampul,
                            

                        );
            $simpan = $this->Jadwalibadah_model->update($data, $idjadwalibadahmingguan);
        }

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }


        $this->session->set_flashdata('pesan', $pesan);
        redirect('jadwalibadah');   
    }
    

     public function get_edit_data()
    {
        
        $idjadwalibadahmingguan = $this->input->post('idjadwalibadahmingguan');
        $RsData = $this->Jadwalibadah_model->get_by_id($idjadwalibadahmingguan)->row();

        $data = array( 
                            'idjadwalibadahmingguan' => $RsData->idjadwalibadahmingguan,
                            'tanggaljadwal' => $RsData->tanggaljadwal,
                            'tema'   => $RsData->tema,  
                            'subtema'   => $RsData->subtema,
                            'idpengkhotbah' => $RsData->idpengkhotbah,
                            'videoembed' => $RsData->videoembed,
                            'gambarsampul' => $RsData->gambarsampul,

                     );

        echo(json_encode($data));
    }

    public function getjadwalibadah()
    {
        $rsjadwal = $this->Jadwalibadah_model->get_all();
        echo json_encode($rsjadwal->result());
    }
}


        