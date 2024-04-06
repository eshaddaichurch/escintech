<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ourservice extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Ourservice_model');
    }

    public function watch($slug = '', $subtema_slug = '')
    {

        $rowOurservice = $this->Ourservice_model->get_by_slug($slug);
        if ($rowOurservice->num_rows() == 0) {
            $pesan = "<script>
                            swal('Informasi', 'Our service tidak ditemukan.', 'warning');
                        </script>";
            $this->session->set_flashdata('pesan', $pesan);
            redirect('home');
        }
        $rowOurservice = $rowOurservice->row();

        if (empty($subtema_slug)) {
            $rowOurserviceDetail = $this->Ourservice_model->get_last_row($rowOurservice->idourservice);
        }
        $idmenu = '';
        $data["rowinfogereja"] = $this->Home_model->get_infogereja();
        $data["rowOurservice"] = $rowOurservice;
        $data["rowOurserviceDetail"] = $rowOurserviceDetail;
        $data['menu'] = $idmenu;
        $data['slug'] = $slug;
        $data['subtema_slug'] = $subtema_slug;
        $this->load->view('ourservice/index', $data);
    }
}

/* End of file Ourservice.php */
/* Location: ./application/controllers/Ourservice.php */