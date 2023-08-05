<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->is_login();
        $this->load->model('Task_model');
        $this->load->model('Pengguna_model');
        $this->load->library('image_lib');
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
        $data['menu']       = 'task';
        $data['idpengguna'] = $this->session->userdata('idpengguna');
        $this->load->view('task/listdata', $data);
    }

    public function maintenance()
    {
        $data['menu']       = 'task';
        $data['idpengguna'] = $this->session->userdata('idpengguna');
        $this->load->view('undermaintenance', $data);
    }

    public function tambah()
    {
        $data['idtask'] = '';
        $data['menu']   = 'task';
        $this->load->view('task/form', $data);
    }

    public function lihat($idtask)
    {
        $idtask = $this->encrypt->decode($idtask);

        if ($this->Task_model->get_by_id($idtask)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', );
            redirect('task');
            exit();
        };
        $this->db->query("update notifikasi set sudahdilihat='Ya', tgldilihat='".date('Y-m-d H:i:s')."' where idtask='$idtask' and idpenerimanotif='".$this->session->userdata('idpengguna')."'");

        $rowtask                = $this->db->query("select * from v_task where idtask='$idtask'")->row();
        $pembuattask            = $rowtask->pembuattask;
        $rowpembuattask         = $this->db->query("select * from v_pengguna where idpengguna='$pembuattask'")->row();
        $data['rowtask']        = $rowtask;
        $data['rowpembuattask'] = $rowpembuattask;
        $data['idtask']         = $idtask;
        $data['menu']           = 'task';

        $this->load->view('task/lihat', $data);

        // if ($this->session->userdata('username') != 'toni') {
        //     $this->load->view('undermaintenance', $data);
        // } else {
        //     $this->load->view('task/lihat', $data);
        // }
    }

    public function datatablesource()
    {
        $RsData   = $this->Task_model->get_datatables();
        $no       = $_POST['start'];
        $data     = array();
        $idproyek = $_POST['idproyek'];

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row   = array();
                $row[] = $no;
                $row[] = '<span class="font-weight-bold">' . $rowdata->namatask . '</span><br>Prioritas: ' . $rowdata->prioritas . '<br><small>' . $rowdata->namaproyek . ' <i class="fa fa-angle-right"></i> ' . $rowdata->namaproyeklist . '</small>';
                $row[] = tglindonesia($rowdata->tglmulai) . '<br>' . tglindonesia($rowdata->tglselesai);
                if (!empty($rowdata->namapic2)) {
                    $row[] = $rowdata->namapic . ' & ' . $rowdata->namapic2;
                } else {
                    $row[] = $rowdata->namapic;
                }
                $row[] = $rowdata->namaassignment;
                switch ($rowdata->statustask) {
                    case 'Sedang Diproses':
                        $row[] = '<span class="badge badge-info">' . $rowdata->statustask . '</span>';
                        break;
                    case 'Sudah Selesai':
                        $row[] = '<span class="badge badge-success">' . $rowdata->statustask . '</span>';
                        break;
                    default:
                        $row[] = '<span class="badge badge-danger">' . $rowdata->statustask . '</span>';
                        break;
                }
                if ($this->session->userdata('jabatan') == 'Admin') {
                    $row[] = '<a href="' . site_url('task/lihat/' . $this->encrypt->encode($rowdata->idtask)) . '" class="btn btn-sm btn-default btn-circle"><i class="fa fa-search text-warning"></i></a> |
                        <a href="' . site_url('task/delete/' . $this->encrypt->encode($rowdata->idtask)) . '" class="btn btn-sm btn-default btn-circle" id="hapus"><i class="fa fa-trash text-danger"></i></a>';
                } else {
                    $row[] = '<a href="' . site_url('task/lihat/' . $this->encrypt->encode($rowdata->idtask)) . '" class="btn btn-sm btn-default btn-circle"><i class="fa fa-search text-warning"></i></a>';
                }

                $data[] = $row;
            }
        }

        $output = array(
            "draw"            => $_POST['draw'],
            "recordsTotal"    => $this->Task_model->count_all(),
            "recordsFiltered" => $this->Task_model->count_filtered(),
            "data"            => $data,
        );
        echo json_encode($output);
    }

    public function delete($idtask)
    {
        $idtask = $this->encrypt->decode($idtask);
        $rsdata = $this->Task_model->get_by_id($idtask);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('task');
            exit();
        };

        $hapus = $this->Task_model->hapus($idtask);
        if ($hapus) {

            //riwayat --------------------------------------------------------------------------------------------
            $riwayattext = $this->session->userdata('nama') . ', menghapus task <b>' . $rsdata->namatask . '</b>';
            $datariwayat = array(
                'tglriwayat' => date('Y-m-d H:i:s'),
                'idpengguna' => $this->session->userdata('idpengguna'),
                'deskripsi'  => $riwayattext,
                'linkurl'    => null,
            );
            $this->App->insert_riwayat($datariwayat);
            // end riwayat

            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        } else {
            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus karena sudah digunakan! <br>
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('task');

    }

    public function simpan()
    {
        $idtask                 = $this->input->post('idtask');
        $idproyeklist           = $this->input->post('idproyeklist');
        $namatask               = $this->input->post('namatask');
        $deskripsi              = $this->input->post('deskripsi');
        $idkategori             = $this->input->post('idkategori');
        $idpic                  = null;
        $prioritas              = $this->input->post('prioritas');
        $tglmulai               = $this->input->post('tglmulai');
        $tglselesai             = $this->input->post('tglselesai');
        $assignment             = $this->input->post('assignment');
        $estimasilamapengerjaan = $this->input->post('estimasilamapengerjaan');
        $statustask             = $this->input->post('statustask');
        $tglinsert              = date('Y-m-d H:i:s');
        $tgltargetselesai       = date('Y-m-d', strtotime($tglinsert . ' +' . $estimasilamapengerjaan . ' day'));
        $pembuattask = $this->session->userdata('idpengguna');


        $idtask = $this->db->query("SELECT create_idtask('$idproyeklist', '" . date('Y-m-d') . "') as idtask")->row()->idtask;
        $file   = $this->upload_file($_FILES, "file");

        $data = array(
            'idtask'                 => $idtask,
            'idproyeklist'           => $idproyeklist,
            'namatask'               => $namatask,
            'deskripsi'              => $deskripsi,
            'idkategori'             => $idkategori,
            'idpic'                  => $idpic,
            'prioritas'              => $prioritas,
            'tglmulai'               => $tglmulai,
            'tglselesai'             => $tglselesai,
            'tgltargetselesai'       => $tgltargetselesai,
            'file'                   => $file,
            'assignment'             => $assignment,
            'estimasilamapengerjaan' => $estimasilamapengerjaan,
            'statustask'             => $statustask,
            'pembuattask'            => $this->session->userdata('idpengguna'),
            'tglinsert'              => $tglinsert,
            'tglupdate'              => $tglupdate,
        );
        $simpan = $this->Task_model->simpan($data);

        if ($simpan) {
            $idtask_encode = $this->encrypt->encode($idtask);
            $linkurl       = 'task/lihat/' . $idtask_encode;

            if ($this->session->userdata('idpengguna') != $assignment) {
                $notifikasitext = $this->session->userdata('nama') . ' membuat assign task baru ke anda';
                $dataNotifikasi = array(
                    'tglnotifikasi'   => date('Y-m-d H:i:s'),
                    'idpenerimanotif' => $assignment,
                    'linkurl'         => $linkurl,
                    'deskripsi'       => $notifikasitext,
                    'sudahdilihat'    => 'Tidak',
                    'jenisnotifikasi' => 'Task',
                    'idtask' => $idtask,
                );
                $this->App->insert_notifikasi($dataNotifikasi);
            }

            $riwayattext = $this->session->userdata('nama') . ' membuat task baru, judul task <b>' . $namatask . '</b>';
            $datariwayat = array(
                'tglriwayat' => date('Y-m-d H:i:s'),
                'idpengguna' => $this->session->userdata('idpengguna'),
                'deskripsi'  => $riwayattext,
                'linkurl'    => $linkurl,
            );
            $this->App->insert_riwayat($datariwayat);

            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : ' . $eror['code'] . ' ' . $eror['message'] . '
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('task');
    }

    public function update()
    {
        $idtask     = $this->input->post('idtask');
        $namatask   = $this->input->post('namatask');
        $idpic      = $this->input->post('idpic');
        $idpic2     = $this->input->post('idpic2');
        $prioritas  = $this->input->post('prioritas');
        $assignment = $this->input->post('assignment');
        $statustask = $this->input->post('statustask');
        $tglinsert  = date('Y-m-d H:i:s');

        $statustask_old     = $this->input->post('statustask_old');
        $assignment_old     = $this->input->post('assignment_old');
        $namaassignment_old = $this->input->post('namaassignment_old');
        $idpic_old          = $this->input->post('idpic_old');
        $namapic_old        = $this->input->post('namapic_old');
        $idpic2_old         = $this->input->post('idpic2_old');
        $namapic2_old       = $this->input->post('namapic2_old');
        $tglmulai_old       = $this->input->post('tglmulai_old');
        $tglselesai_old     = $this->input->post('tglselesai_old');

        $pembuattask = $this->Task_model->get_by_id($idtask)->row()->pembuattask;

        if ($idpic == $idpic2) {

            $eror  = $this->db->error();
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan! <br>
                            Pesan Error : PIC 1 dan PIC 2 nya jangan sama dong!!
                        </div>
                    </div>';

            $this->session->set_flashdata('pesan', $pesan);
            redirect('task/lihat/' . $this->encrypt->encode($idtask));

        }

        $komentar         = $this->input->post('komentar');
        $notifyangberubah = '';

        $data = array(
            'idpic'      => $idpic,
            'idpic2'     => $idpic2,
            'prioritas'  => $prioritas,
            'assignment' => $assignment,
            'statustask' => $statustask,
        );
        $simpan = $this->Task_model->update($data, $idtask);

        // Update tgl mulai
        if ($statustask != 'Baru' && empty($tglmulai_old)) {
            $data = array(
                'tglmulai' => date('Y-m-d H:i:s'),
            );
        }
        $simpan = $this->Task_model->update($data, $idtask);

        // Update tgl selesai
        if ($statustask == 'Sudah Selesai' && empty($tglselesai_old)) {
            $data = array(
                'tglselesai' => date('Y-m-d H:i:s'),
            );
        }
        $simpan = $this->Task_model->update($data, $idtask);

        $dataKomentar = array(
            'tgltaskkomentar' => $tglinsert,
            'idtask'          => $idtask,
            'idpengguna'      => $this->session->userdata('idpengguna'),
            'komentar'        => $komentar,
        );
        $simpan = $this->Task_model->insert_komentar($dataKomentar);

        // ===================== notifikasi
        $namapic       = $this->Pengguna_model->get_by_id($idpic)->row()->nama;
        $namapic2      = $this->Pengguna_model->get_by_id($idpic2)->row()->nama;
        $lkirimnotif   = false;
        $idtask_encode = $this->encrypt->encode($idtask);
        $linkurl       = 'task/lihat/' . $idtask_encode;


        //riwayat --------------------------------------------------------------------------------------------
        $riwayatyangberubah = '';
        $namaassignment     = $this->Pengguna_model->get_by_id($assignment)->row()->nama;
        if ($statustask_old != $statustask) {
            $riwayatyangberubah .= ", mengubah status task dari $statustask_old menjadi $statustask ";
        }

        if ($idpic_old != $idpic && $idpic2_old != $idpic2) {
            $riwayatyangberubah .= ", mengubah PIC menjadi $namapic dan $namapic2 ";
        } else {

            if (!empty($idpic) && $idpic != $idpic_old) {
                if ($idpic != $idpic_old) {
                    $riwayatyangberubah .= ", mengubah PIC dari $namapic_old menjadi $namapic ";
                } else {
                    $riwayatyangberubah .= ", mengubah PIC menjadi $namapic ";
                }
            }

            if (!empty($idpic2) && $idpic2_old != $idpic2) {

                if ($idpic2_old != $idpic2) {
                    $riwayatyangberubah .= ", mengubah PIC 2 dari $namapic_old2 menjadi $namapic2 ";
                } else {
                    $riwayatyangberubah .= ", mengubah PIC 2 menjadi $namapic2 ";
                }

            }

        }

        if ($assignment_old != $assignment) {
            $riwayatyangberubah .= ", mengubah assignment dari $namaassignment_old menjadi $namaassignment ";
        }

        if (!empty($riwayatyangberubah)) {
        $riwayattext = $this->session->userdata('nama') . $riwayatyangberubah . ', judul task <b>' . $namatask . '</b>';
        $datariwayat = array(
            'tglriwayat' => date('Y-m-d H:i:s'),
            'idpengguna' => $this->session->userdata('idpengguna'),
            'deskripsi'  => $riwayattext,
            'linkurl'    => $linkurl,
        );
        $this->App->insert_riwayat($datariwayat);
            
        }
        // end riwayat



        // ----------------------- NOTIFIKASI -------------------------------------------
        $notifikasitext = $this->session->userdata('nama') . $riwayatyangberubah . '';
        $kirimkankepembuattask = false;
        //assignment
        if ($this->session->userdata('idpengguna')!=$assignment && !empty($riwayatyangberubah) ) {            
            $dataNotifikasi = array(
                'tglnotifikasi'   => date('Y-m-d H:i:s'),
                'idpenerimanotif' => $assignment,
                'linkurl'         => $linkurl,
                'deskripsi'       => $notifikasitext,
                'sudahdilihat'    => 'Tidak',
                'jenisnotifikasi' => 'Task',
                'idtask' => $idtask,
            );
            $this->App->insert_notifikasi($dataNotifikasi);
            $kirimkankepembuattask = true;
        }
        
        //PIC
        if (!empty($idpic) && $idpic!=$this->session->userdata('idpengguna') && !empty($riwayatyangberubah) ) {            
            $dataNotifikasi = array(
                'tglnotifikasi'   => date('Y-m-d H:i:s'),
                'idpenerimanotif' => $idpic,
                'linkurl'         => $linkurl,
                'deskripsi'       => $notifikasitext,
                'sudahdilihat'    => 'Tidak',
                'jenisnotifikasi' => 'Task',
                'idtask' => $idtask,
            );
            $this->App->insert_notifikasi($dataNotifikasi);
            $kirimkankepembuattask = true;
        }
        //PIC2
        if (!empty($idpic2) && $idpic!=$idpic2 && $idpic2!=$this->session->userdata('idpengguna') && !empty($riwayatyangberubah) ) {            
            $dataNotifikasi = array(
                'tglnotifikasi'   => date('Y-m-d H:i:s'),
                'idpenerimanotif' => $idpic2,
                'linkurl'         => $linkurl,
                'deskripsi'       => $notifikasitext,
                'sudahdilihat'    => 'Tidak',
                'jenisnotifikasi' => 'Task',
                'idtask' => $idtask,
            );
            $this->App->insert_notifikasi($dataNotifikasi);
            $kirimkankepembuattask = true;
        }

        //pembuat task
        if ( $this->session->userdata('idpengguna')!=$pembuattask && !empty($riwayatyangberubah) ) {            
            $dataNotifikasi = array(
                'tglnotifikasi'   => date('Y-m-d H:i:s'),
                'idpenerimanotif' => $pembuattask,
                'linkurl'         => $linkurl,
                'deskripsi'       => $notifikasitext,
                'sudahdilihat'    => 'Tidak',
                'jenisnotifikasi' => 'Task',
                'idtask' => $idtask,
            );
            $this->App->insert_notifikasi($dataNotifikasi);
            $kirimkankepembuattask = true;
        }



        $pesan = '<div>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <strong>Berhasil!</strong> Data berhasil disimpan!
                    </div>
                </div>';

        $this->session->set_flashdata('pesan', $pesan);
        redirect('task');
    }

    public function simpankomentar()
    {
        $idtask    = $this->input->post('idtask');
        $tglinsert = date('Y-m-d H:i:s');
        $komentar  = $this->input->post('komentar');

        $dataKomentar = array(
            'tgltaskkomentar' => $tglinsert,
            'idtask'          => $idtask,
            'idpengguna'      => $this->session->userdata('idpengguna'),
            'komentar'        => $komentar,
        );

        $simpan = $this->Task_model->insert_komentar($dataKomentar);
        $this->session->set_flashdata('pesan', $pesan);
        redirect('task/lihat/' . $this->encrypt->encode($idtask));
    }

    public function get_edit_data()
    {
        $idtask = $this->input->post('idtask');
        $RsData = $this->Task_model->get_by_id($idtask)->row();

        $data = array(
            'idtask'                 => $RsData->idtask,
            'idproyeklist'           => $RsData->idproyeklist,
            'namatask'               => $RsData->namatask,
            'idprojectmanager'       => $RsData->idprojectmanager,
            'deskripsi'              => $RsData->deskripsi,
            'idkategori'             => $RsData->idkategori,
            'idpic'                  => $RsData->idpic,
            'prioritas'              => $RsData->prioritas,
            'tglmulai'               => $RsData->tglmulai,
            'tglselesai'             => $RsData->tglselesai,
            'file'                   => $RsData->file,
            'assignment'             => $RsData->assignment,
            'estimasilamapengerjaan' => $RsData->estimasilamapengerjaan,
            'statustask'             => $RsData->statustask,
        );

        echo (json_encode($data));
    }

    public function upload_file($file, $nama)
    {

        if (!empty($file[$nama]['name'])) {
            $config['upload_path']   = './uploads/task/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF';
            $config['remove_space']  = true;
            $config['max_size']      = '2000KB';

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

    public function update_upload_file($file, $nama, $file_lama)
    {
        if (!empty($file[$nama]['name'])) {
            $config['upload_path']   = './uploads/task/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|PDF';
            $config['remove_space']  = true;
            $config['max_size']      = '2000KB';

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

    public function ajax_getlistproyek()
    {
        $idproyek     = $this->input->get('idproyek');
        $rslistproyek = $this->db->query("
                select * from proyeklist  where idproyek='$idproyek' order by idproyeklist
            ");
        $arrListProyek = array();
        if ($rslistproyek->num_rows() > 0) {
            foreach ($rslistproyek->result() as $row) {
                array_push($arrListProyek, array(
                    'idproyeklist'   => $row->idproyeklist,
                    'namaproyeklist' => $row->namaproyeklist,
                ));

            }
        }

        echo json_encode($arrListProyek);
    }

    public function ajax_getprogrammer()
    {
        $idproyek     = $this->input->get('idproyek');
        $rsprogrammer = $this->db->query("
                select * from v_proyekdetail  where idproyek='$idproyek' order by idprogrammer
            ");
        $arrProgrammer = array();
        if ($rsprogrammer->num_rows() > 0) {
            foreach ($rsprogrammer->result() as $row) {
                array_push($arrProgrammer, array(
                    'idprogrammer' => $row->idprogrammer,
                    'nama'         => $row->nama,
                ));

            }
        }

        echo json_encode($arrProgrammer);
    }

    public function ajax_getassignment()
    {
        $idproyek     = $this->input->get('idproyek');
        $rsAssignment = $this->db->query("
                SELECT * from v_proyek where idproyek='$idproyek'
            ");

        $arrAssignment = array();
        if ($rsAssignment->num_rows() > 0) {
            foreach ($rsAssignment->result() as $row) {
                array_push($arrAssignment, array(
                    'id'   => $row->idprojectmanager,
                    'nama' => $row->namaprojectmanager,
                ));

            }
        }

        echo json_encode($arrAssignment);
    }

    public function simpan_field()
    {
        $idtask  = $this->input->post('idtask');
        $field   = $this->input->post('field');
        $value   = $this->input->post('value');
        $rowtask = $this->db->query("select * from task where idtask='$idtask'")->row();
        $output  = '';

        switch ($field) {
            case 'estimasilamapengerjaan':
                $tglinsert        = $rowtask->tglinsert;
                $tgltargetselesai = date('Y-m-d', strtotime($tglinsert . ' +' . $value . ' day'));
                $simpan           = $this->db->query("update task set $field='$value', tgltargetselesai='$tgltargetselesai' where idtask='$idtask'");
                $output           = tglindonesia($tgltargetselesai);
                break;

            default:
                $simpan = $this->db->query("update task set $field='$value' where idtask='$idtask'");
                break;
        }

        // if ($field == 'estimasilamapengerjaan') {
        //     $tglinsert        = $rowtask->tglinsert;
        //     $tgltargetselesai = date('Y-m-d', strtotime($tglinsert . ' +' . $value . ' day'));
        //     $simpan           = $this->db->query("update task set $field='$value', tgltargetselesai='$tgltargetselesai' where idtask='$idtask'");
        //     $output           = tglindonesia($tgltargetselesai);
        // } else {
        //     $simpan = $this->db->query("update task set $field='$value' where idtask='$idtask'");
        // }

        if ($simpan) {
            echo json_encode(array('success' => true, 'output' => $output));
        } else {
            echo json_encode(array('success' => true, 'output' => $output));
        }
    }

}

/* End of file Task.php */
/* Location: ./application/controllers/Task.php */
