<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ourservice extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Ourservice_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', '0007');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'ourservice';
        $this->load->view('ourservice/listdata', $data);
    }

    public function tambah()
    {
        $data['idourservice'] = '';
        $data['menu'] = 'ourservice';
        $this->load->view('ourservice/form', $data);
    }

    public function edit($idourservice)
    {
        $idourservice = $this->encrypt->decode($idourservice);

        if ($this->Ourservice_model->get_by_id($idourservice)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('ourservice');
            exit();
        };
        $data['idourservice'] = $idourservice;
        $data['menu'] = 'ourservice';
        $this->load->view('ourservice/form', $data);
    }

    public function detail($idourservice)
    {
        $idourservice = $this->encrypt->decode($idourservice);
        $rsOurservice = $this->Ourservice_model->get_by_id($idourservice);

        if ($rsOurservice->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('ourservice');
            exit();
        };
        $rsOurserviceDetail = $this->Ourservice_model->get_detail($idourservice);

        $data['rsOurserviceDetail'] = $rsOurserviceDetail;
        $data['rowOurservice'] = $rsOurservice->row();
        $data['idourservice'] = $idourservice;
        $data['menu'] = 'ourservice';
        $this->load->view('ourservice/detail', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Ourservice_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();

                if (!empty($rowdata->gambarsampul)) {
                    $gambarsampul = base_url('uploads/ourservice/' . $rowdata->gambarsampul);
                } else {
                    $gambarsampul = base_url('images/nofoto.png');
                }

                if ($rowdata->statusaktif == 'Aktif') {
                    $statusaktif = '<span class="badge badge-success">Aktif</span>';
                } else {
                    $statusaktif = '<span class="badge badge-danger">Tidak Aktif</span>';
                }

                $row[] = $no;
                $row[] = '<img src="' . $gambarsampul . '" alt="" style="width: 80%;">';
                $row[] = $rowdata->namaourservice . '<br>' . '<span>' . $rowdata->deskripsisingkat . '</span>';
                $row[] = $rowdata->rangeumur;
                $row[] = $statusaktif;
                $row[] = '<a href="' . site_url('ourservice/detail/' . $this->encrypt->encode($rowdata->idourservice)) . '" class="btn btn-sm btn-success btn-circle"><i class="fa fa-plus"></i></a> | <a href="' . site_url('ourservice/edit/' . $this->encrypt->encode($rowdata->idourservice)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="' . site_url('ourservice/delete/' . $this->encrypt->encode($rowdata->idourservice)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Ourservice_model->count_all(),
            "recordsFiltered" => $this->Ourservice_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function delete($idourservice)
    {
        $idourservice = $this->encrypt->decode($idourservice);
        $rsdata = $this->Ourservice_model->get_by_id($idourservice);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('ourservice');
            exit();
        };

        $hapus = $this->Ourservice_model->hapus($idourservice);
        if ($hapus) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        } else {
            $eror = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('ourservice');
    }

    public function simpan()
    {
        $idourservice             = $this->input->post('idourservice');
        $namaourservice        = $this->input->post('namaourservice');
        $deskripsisingkat        = $this->input->post('deskripsisingkat');
        $deskripsi        = $this->input->post('deskripsi');
        $rangeumur        = $this->input->post('rangeumur');
        $urlvideo        = $this->input->post('urlvideo');
        $statusaktif        = $this->input->post('statusaktif');
        $slug = $this->createSlug($namaourservice);
        $tglinsert = date('Y-m-d H:i:s');

        if ($idourservice == '') {

            $idourservice = $this->db->query("select create_idourservice('" . $namaourservice . "') as idourservice")->row()->idourservice;
            $gambarsampul = $this->upload_foto($_FILES, "gambarsampul");

            $data = array(
                'idourservice'   => $idourservice,
                'namaourservice'   => $namaourservice,
                'deskripsisingkat'   => $deskripsisingkat,
                'deskripsi'   => $deskripsi,
                'rangeumur'   => $rangeumur,
                'statusaktif'   => $statusaktif,
                'gambarsampul'   => $gambarsampul,
                'urlvideo'   => $urlvideo,
                'slug'   => $slug,
                'tglinsert'   => $tglinsert,
                'tglupdate'   => $tglinsert,
            );
            $simpan = $this->Ourservice_model->simpan($data);
        } else {

            $gambarsampul_lama = $this->input->post('gambarsampul_lama');
            $gambarsampul = $this->update_upload_foto($_FILES, "gambarsampul", $gambarsampul_lama);

            $data = array(
                'namaourservice'   => $namaourservice,
                'deskripsisingkat'   => $deskripsisingkat,
                'deskripsi'   => $deskripsi,
                'rangeumur'   => $rangeumur,
                'statusaktif'   => $statusaktif,
                'gambarsampul'   => $gambarsampul,
                'urlvideo'   => $urlvideo,
                'tglupdate'   => $tglinsert,
            );
            $simpan = $this->Ourservice_model->update($data, $idourservice);
        }

        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $eror = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : ' . $eror['code'] . ' ' . $eror['message'] . '
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('ourservice');
    }

    public function get_edit_data()
    {
        $idourservice = $this->input->post('idourservice');
        $RsData = $this->Ourservice_model->get_by_id($idourservice)->row();

        $data = array(
            'idourservice'     =>  $RsData->idourservice,
            'namaourservice'     =>  $RsData->namaourservice,
            'deskripsisingkat'     =>  $RsData->deskripsisingkat,
            'deskripsi'     =>  $RsData->deskripsi,
            'rangeumur'     =>  $RsData->rangeumur,
            'statusaktif'     =>  $RsData->statusaktif,
            'gambarsampul'     =>  $RsData->gambarsampul,
            'urlvideo'     =>  $RsData->urlvideo,
            'slug'     =>  $RsData->slug,
        );

        echo (json_encode($data));
    }


    function createSlug($string)
    {

        $table = array(
            'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
            'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
            'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
            'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

        // -- Returns the slug
        return strtolower(strtr($stripped, $table));
    }

    public function upload_foto($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/ourservice/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']             = '2000KB';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = "";
            }
        } else {
            $foto = "";
        }
        return $foto;
    }

    public function update_upload_foto($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']          = 'uploads/ourservice/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['remove_space']         = TRUE;
            $config['max_size']            = '2000KB';


            $this->load->library('upload', $config);
            if ($this->upload->do_upload($nama)) {
                $foto = $this->upload->data('file_name');
                $size = $this->upload->data('file_size');
                $ext  = $this->upload->data('file_ext');
            } else {
                $foto = $file_lama;
            }
        } else {
            $foto = $file_lama;
        }

        return $foto;
    }
}

/* End of file Ourservice.php */
/* Location: ./application/controllers/Ourservice.php */