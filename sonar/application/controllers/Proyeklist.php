<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyeklist extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Proyeklist_model');
    }

    public function is_login()
    {
        $idpengguna = $this->session->userdata('idpengguna');
        if (empty($idpengguna)) {
            $pesan = '<div class="alert alert-danger">Session telah berakhir. Silahkan login kembali . . . </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('Login'); 
            exit();
        }
    }   

    public function index()
    {
        $data['menu'] = 'proyeklist';
        $this->load->view('proyeklist/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idproyek'] = "";     
        $data['menu'] = 'proyeklist';  
        $this->load->view('proyeklist/form', $data);
    }

    public function edit($idproyek)
    {       
        $idproyek = $this->encrypt->decode($idproyek);

        if ($this->Proyeklist_model->get_by_id($idproyek)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('proyeklist');
            exit();
        };
        $rowproyek = $this->db->query("select * from proyek where idproyek='$idproyek'")->row();

        $data['rowproyek'] = $rowproyek;      
        $data['idproyek'] = $idproyek;      
        $data['menu'] = 'proyeklist';
        $this->load->view('proyeklist/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Proyeklist_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->namaproyek;

                $rsListModul = $this->db->query("select * from proyeklist where idproyek='$rowdata->idproyek'");
                if ($rsListModul->num_rows()>0) {
                    $isilist = '';
                    foreach ($rsListModul->result() as $rowlist) {
                        $isilist .= '<i class="fa fa-chevron-circle-right text-info"></i> '.$rowlist->namaproyeklist.'<br>';
                    }
                    $row[] = $isilist;

                }else{
                        $row[] = '<i>Belum ada list modul<i>';

                }
                $row[] = '<a href="'.site_url( 'proyeklist/edit/'.$this->encrypt->encode($rowdata->idproyek) ).'" class="btn btn-sm btn-success btn-circle"><i class="fa fa-plus-circle"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Proyeklist_model->count_all(),
                        "recordsFiltered" => $this->Proyeklist_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function datatablesourcedetail()
    {
        // query ini untuk item yang dimunculkan sesuai dengan kategori yang dipilih        

        $idproyek = $this->input->post('idproyek');
        $query = "select * from proyeklist
                        WHERE proyeklist.idproyek='".$idproyek."'";

        $RsData = $this->db->query($query);

        $no = 0;
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {               
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idproyeklist;
                $row[] = $rowdata->namaproyeklist;
                $row[] = '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>';
                $data[] = $row;
            }
        }

        $output = array(
                        "data" => $data,
                        );

        //output to json format
        echo json_encode($output);
    }

    public function delete($idproyek)
    {
        $idproyek = $this->encrypt->decode($idproyek);  

        if ($this->Proyeklist_model->get_by_id($idproyek)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('proyeklist');
            exit();
        };

        $hapus = $this->Proyeklist_model->hapus($idproyek);
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
        redirect('proyeklist');        

    }

    public function simpan()
    {
        $isidatatable       = $_REQUEST['isidatatable'];
        $idproyek           = $this->input->post('idproyek');

        $this->db->query('delete from proyeklist where idproyek="'.$idproyek.'"');


        //-------------------------------- >> simpan dari datatable 
        $i=0;
        foreach ($isidatatable as $item) {
            $namaproyeklist              = $item[2];
            $i++;

            $idproyeklist = $this->db->query("SELECT create_idproyeklist('$idproyek') as idproyeklist")->row()->idproyeklist;
            $data = array(
                            'idproyeklist' => $idproyeklist,
                            'idproyek' => $idproyek,
                            'namaproyeklist' => $namaproyeklist,
                            );
            $simpan  = $this->Proyeklist_model->simpan($data);
        }




        if (!$simpan) { //jika gagal
            $eror = $this->db->error(); 
            echo json_encode(array('msg'=>'Kode Eror: '.$eror['code'].' '.$eror['message']));
            exit();
        }

        // jika berhasil akan sampai ke tahap ini       
        echo json_encode(array('success' => true, 'idproyek' => $idproyek));
    }
    
    public function get_edit_data()
    {
        $idproyek = $this->input->post('idproyek');
        $RsData = $this->Proyeklist_model->get_by_id($idproyek)->row();

        $data = array(
                    'idproyek'     =>  $RsData->idproyek,
                    'namaproyek'     =>  $RsData->namaproyek,
                    'client'     =>  $RsData->client,
                    'alamatclient'     =>  $RsData->alamatclient,
                    'deskripsi'     =>  $RsData->deskripsi,
                    );
        echo(json_encode($data));
    }


}

/* End of file Proyeklist.php */
/* Location: ./application/controllers/Proyeklist.php */