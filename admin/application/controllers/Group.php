 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Group_model');
        $this->load->model('Jemaat_model');
    }

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
        $data['menu'] = 'group';
        $this->load->view('group/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idgroup'] = '';        
        $data['menu'] = 'group';  
        $this->load->view('group/form', $data);
    }

    public function edit($idgroup)
    {       
        $idgroup = $this->encrypt->decode($idgroup);

        if ($this->Group_model->get_by_id($idgroup)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('group');
            exit();
        };
        $data['idgroup'] =$idgroup;        
        $data['menu'] = 'group';
        $this->load->view('group/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Group_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idgroup;
                $row[] = $rowdata->namagroup;
                $row[] = $rowdata->namalengkap;
                $row[] = '<a href="'.site_url( 'group/edit/'.$this->encrypt->encode($rowdata->idgroup) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('group/delete/'.$this->encrypt->encode($rowdata->idgroup) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Group_model->count_all(),
                        "recordsFiltered" => $this->Group_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idgroup)
    {
        $idgroup = $this->encrypt->decode($idgroup);  
        $rsdata = $this->Group_model->get_by_id($idgroup);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('group');
            exit();
        };

        $hapus = $this->Group_model->hapus($idgroup);
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
        redirect('group');        

    }

    public function simpan()
    {       
        $idgroup             = $this->input->post('idgroup');
        $namagroup        = $this->input->post('namagroup');
        $idjemaathead        = $this->input->post('idjemaathead');
        $statusaktif        = $this->input->post('statusaktif');
        $tanggalinsert        = date('Y-m-d H:i:s');
        $tanggalupdate        = date('Y-m-d H:i:s');

        if ( $idgroup=='' ) {  

            $idgroup = $this->db->query("select create_idgroup() as idgroup")->row()->idgroup;

            $data = array(
                            'idgroup'   => $idgroup, 
                            'namagroup'   => $namagroup, 
                            'idjemaathead'   => $idjemaathead, 
                            'statusaktif'   => $statusaktif, 
                        );
            $simpan = $this->Group_model->simpan($data);      
        }else{ 

            $data = array(
                            'idgroup'   => $idgroup, 
                            'namagroup'   => $namagroup, 
                            'idjemaathead'   => $idjemaathead, 
                            'statusaktif'   => $statusaktif, 
                        );
            $simpan = $this->Group_model->update($data, $idgroup);
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
        redirect('group');   
    }
    
    public function get_edit_data()
    {
        $idgroup = $this->input->post('idgroup');
        $RsData = $this->Group_model->get_by_id($idgroup)->row();

        $data = array( 
                            'idgroup'     =>  $RsData->idgroup,  
                            'namagroup'     =>  $RsData->namagroup,  
                            'statusaktif'     =>  $RsData->statusaktif,  
                            'idjemaathead'     =>  $RsData->idjemaathead,  
                        );

        echo(json_encode($data));
    }

}

/* End of file Group.php */
/* Location: ./application/controllers/Group.php */