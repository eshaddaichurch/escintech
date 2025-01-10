<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayattask extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Riwayattask_model');
        $this->load->library('pagination');
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

        $rsriwayat = $this->db->query("select * from riwayattask order by tglriwayat desc");

        //konfigurasi pagination
        $config['base_url']    = site_url('riwayattask/index'); //site url
        $config['total_rows']  = $rsriwayat->num_rows(); //total row
        $config['per_page']    = 20; //show record per halaman
        $config["uri_segment"] = 3; // uri parameter
        $choice                = $config["total_rows"] / $config["per_page"];
        $config["num_links"]   = floor($choice);

        // Membuat Style pagination untuk BootStrap v3
        $config['display_prev_link'] = false;
        $config['display_prev_link'] = false;
        $config['first_link']        = 'First';
        $config['last_link']         = 'Last';
        $config['next_link']         = 'Next';
        $config['prev_link']         = 'Prev';
        $config['full_tag_open']     = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']    = '</ul></nav></div>';
        $config['num_tag_open']      = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']     = '</span></li>';
        $config['cur_tag_open']      = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']     = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']   = '</span>Next</li>';
        $config['first_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close']  = '</span></li>';
        $config['last_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']   = '</span></li>';

        $this->pagination->initialize($config);

        $data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['rsriwayat']  = $this->Riwayattask_model->get_all($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['menu']       = 'riwayattask';
        $this->load->view('riwayattask/listdata', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Riwayattask_model->get_datatables();
        $no     = $_POST['start'];
        $data   = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row   = array();
                $row[] = $no;
                $row[] = $rowdata->namakategori;
                $row[] = '<a href="' . site_url('riwayattask/edit/' . $this->encrypt->encode($rowdata->idkategori)) . '" class="btn btn-sm btn-default btn-circle"><i class="fa fa-edit text-warning"></i></a> |
                        <a href="' . site_url('riwayattask/delete/' . $this->encrypt->encode($rowdata->idkategori)) . '" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Riwayattask_model->count_all(),
            "recordsFiltered" => $this->Riwayattask_model->count_filtered(),
            "data"            => $data,
        );
        echo json_encode($output);
    }

}

/* End of file Riwayattask.php */
/* Location: ./application/controllers/Riwayattask.php */
