<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jemaat extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'M100');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/listdata', $data);
    }

    public function tambah()
    {
        $data['idjemaat'] = '';
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/form', $data);
    }

    public function edit($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);

        if ($this->Jemaat_model->get_by_id($idjemaat)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };
        $data['idjemaat'] = $idjemaat;
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Jemaat_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->noaj_lengkap . '<br><small class="text-gray">' . $rowdata->idjemaat . '</small>';
                $row[] = '<a href="" id="tampilinfojemaat" data-idjemaat="' . $rowdata->idjemaat . '">' . $rowdata->namalengkap . '</a><br>' . $rowdata->nik;
                $row[] = $rowdata->tempatlahir . '<br>' . $rowdata->tanggallahir;
                $row[] = $rowdata->jeniskelamin;
                $row[] = $rowdata->statusjemaat;

                switch ($this->session->userdata('idotorisasi')) {
                    case '0000':
                        $row[] = '<a href="' . site_url('jemaat/edit/' . $this->encrypt->encode($rowdata->idjemaat)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="' . site_url('jemaat/delete/' . $this->encrypt->encode($rowdata->idjemaat)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                        break;
                    case '0001':
                        $row[] = '<a href="' . site_url('jemaat/edit/' . $this->encrypt->encode($rowdata->idjemaat)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a>';
                        break;

                    default:
                        $row[] = '';
                        break;
                }


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

    public function delete($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);
        $rsdata = $this->Jemaat_model->get_by_id($idjemaat);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };

        $hapus = $this->Jemaat_model->hapus($idjemaat);
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
        redirect('jemaat');
    }

    public function simpan()
    {
        $idjemaat             = $this->input->post('idjemaat');
        $noaj        = $this->input->post('noaj');
        $nik        = $this->input->post('nik');
        $kewarganegaraan        = $this->input->post('kewarganegaraan');
        $namalengkap        = $this->input->post('namalengkap');
        $namapanggilan        = $this->input->post('namapanggilan');
        $tempatlahir        = $this->input->post('tempatlahir');
        $tanggallahir        = $this->input->post('tanggallahir');
        $jeniskelamin        = $this->input->post('jeniskelamin');
        $statuspernikahan        = $this->input->post('statuspernikahan');
        $golongandarah        = $this->input->post('golongandarah');
        if (empty($golongandarah)) {
            $golongandarah = null;
        }
        $notelp        = $this->input->post('notelp');
        $nohp        = $this->input->post('nohp');
        $email        = $this->input->post('email');
        $facebook        = $this->input->post('facebook');
        $instagram        = $this->input->post('instagram');
        $namadarurat        = $this->input->post('namadarurat');
        $hubungan        = $this->input->post('hubungan');
        if (empty($hubungan)) {
            $hubungan = null;
        }
        $notelpdarurat        = $this->input->post('notelpdarurat');
        $pendidikanterakhir        = $this->input->post('pendidikanterakhir');
        if (empty($pendidikanterakhir)) {
            $pendidikanterakhir = null;
        }
        $namasekolah        = $this->input->post('namasekolah');
        $pekerjaan        = $this->input->post('pekerjaan');
        if (empty($pekerjaan)) {
            $pekerjaan = null;
        }
        $namaperusahaan        = $this->input->post('namaperusahaan');
        $sektorindustri        = $this->input->post('sektorindustri');
        $alamatkantor        = $this->input->post('alamatkantor');
        $notelpkantor        = $this->input->post('notelpkantor');
        $alamatrumah        = $this->input->post('alamatrumah');
        $rtrw        = $this->input->post('rtrw');
        $kelurahan        = $this->input->post('kelurahan');
        $kecamatan        = $this->input->post('kecamatan');
        $kotakabupaten        = $this->input->post('kotakabupaten');
        $propinsi        = $this->input->post('propinsi');
        $kodepos        = $this->input->post('kodepos');
        $username        = $this->input->post('username');
        $password        = $this->input->post('password');
        $password2        = $this->input->post('password2');
        $statusjemaat        = $this->input->post('statusjemaat');
        $lastlogin        = null;

        $tanggalinsert        = date('Y-m-d H:i:s');
        $tanggalupdate        = date('Y-m-d H:i:s');
        $foto        = '';



        if ($idjemaat == '') {

            if ($password != $password2) {
                $pesan = '<div>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>Gagal!</strong> Ulangi password tidak sama!
                            </div>
                        </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('jemaat');
            }

            $idjemaat = $this->db->query("select create_idjemaat('" . date('Y-m-d') . "') as idjemaat")->row()->idjemaat;


            if ($statusjemaat == 'Jemaat') {
                $noaj = $this->db->query("SELECT create_noaj() as noaj")->row()->noaj;
            } else {
                $noaj = '';
            }

            if ($this->Jemaat_model->sudahAdaNIK($nik)) {
                $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Nik Sudah ada!
                        </div>
                    </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('jemaat');
            }

            $data = array(
                'idjemaat'   => $idjemaat,
                'noaj'   => $noaj,
                'nik'   => $nik,
                'kewarganegaraan'   => $kewarganegaraan,
                'namalengkap'   => $namalengkap,
                'namapanggilan'   => $namapanggilan,
                'tempatlahir'   => $tempatlahir,
                'tanggallahir'   => $tanggallahir,
                'jeniskelamin'   => $jeniskelamin,
                'statuspernikahan'   => $statuspernikahan,
                'golongandarah'   => $golongandarah,
                'notelp'   => $notelp,
                'nohp'   => $nohp,
                'email'   => $email,
                'facebook'   => $facebook,
                'instagram'   => $instagram,
                'namadarurat'   => $namadarurat,
                'hubungan'   => $hubungan,
                'notelpdarurat'   => $notelpdarurat,
                'pendidikanterakhir'   => $pendidikanterakhir,
                'namasekolah'   => $namasekolah,
                'pekerjaan'   => $pekerjaan,
                'namaperusahaan'   => $namaperusahaan,
                'sektorindustri'   => $sektorindustri,
                'alamatkantor'   => $alamatkantor,
                'notelpkantor'   => $notelpkantor,
                'alamatrumah'   => $alamatrumah,
                'rtrw'   => $rtrw,
                'kelurahan'   => $kelurahan,
                'kecamatan'   => $kecamatan,
                'kotakabupaten'   => $kotakabupaten,
                'propinsi'   => $propinsi,
                'kodepos'   => $kodepos,
                'foto'   => $foto,
                'tanggalupdate'   => $tanggalupdate,
                'username'   => $username,
                'password'   => md5($password),
                'lastlogin'   => $lastlogin,
                'statusjemaat'   => $statusjemaat,
                'tanggalinsert'   => $tanggalinsert,
            );
            $simpan = $this->Jemaat_model->simpan($data);
        } else {

            if ($noaj == '') {



                if ($statusjemaat == 'Jemaat' || $statusjemaat == '') {
                    $noaj = $this->db->query("SELECT create_noaj() as noaj")->row()->noaj;
                } else {
                    $noaj = '';
                }
            }

            if ($password != $password2 && !empty($password)) {
                $pesan = '<div>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>Gagal!</strong> Ulangi password tidak sama!
                            </div>
                        </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('jemaat');
            }

            if (!empty($password)) {

                if ($statusjemaat != '') {

                    $data = array(
                        'noaj'   => $noaj,
                        'nik'   => $nik,
                        'kewarganegaraan'   => $kewarganegaraan,
                        'namalengkap'   => $namalengkap,
                        'namapanggilan'   => $namapanggilan,
                        'tempatlahir'   => $tempatlahir,
                        'tanggallahir'   => $tanggallahir,
                        'jeniskelamin'   => $jeniskelamin,
                        'statuspernikahan'   => $statuspernikahan,
                        'golongandarah'   => $golongandarah,
                        'notelp'   => $notelp,
                        'nohp'   => $nohp,
                        'email'   => $email,
                        'facebook'   => $facebook,
                        'instagram'   => $instagram,
                        'namadarurat'   => $namadarurat,
                        'hubungan'   => $hubungan,
                        'notelpdarurat'   => $notelpdarurat,
                        'pendidikanterakhir'   => $pendidikanterakhir,
                        'namasekolah'   => $namasekolah,
                        'pekerjaan'   => $pekerjaan,
                        'namaperusahaan'   => $namaperusahaan,
                        'sektorindustri'   => $sektorindustri,
                        'alamatkantor'   => $alamatkantor,
                        'notelpkantor'   => $notelpkantor,
                        'alamatrumah'   => $alamatrumah,
                        'rtrw'   => $rtrw,
                        'kelurahan'   => $kelurahan,
                        'kecamatan'   => $kecamatan,
                        'kotakabupaten'   => $kotakabupaten,
                        'propinsi'   => $propinsi,
                        'kodepos'   => $kodepos,
                        'foto'   => $foto,
                        'tanggalupdate'   => $tanggalupdate,
                        'username'   => $username,
                        'password'   => md5($password),
                        'lastlogin'   => $lastlogin,
                        'statusjemaat'   => $statusjemaat,
                        'tanggalinsert'   => $tanggalinsert,
                    );
                } else {
                    $data = array(
                        'noaj'   => $noaj,
                        'nik'   => $nik,
                        'kewarganegaraan'   => $kewarganegaraan,
                        'namalengkap'   => $namalengkap,
                        'namapanggilan'   => $namapanggilan,
                        'tempatlahir'   => $tempatlahir,
                        'tanggallahir'   => $tanggallahir,
                        'jeniskelamin'   => $jeniskelamin,
                        'statuspernikahan'   => $statuspernikahan,
                        'golongandarah'   => $golongandarah,
                        'notelp'   => $notelp,
                        'nohp'   => $nohp,
                        'email'   => $email,
                        'facebook'   => $facebook,
                        'instagram'   => $instagram,
                        'namadarurat'   => $namadarurat,
                        'hubungan'   => $hubungan,
                        'notelpdarurat'   => $notelpdarurat,
                        'pendidikanterakhir'   => $pendidikanterakhir,
                        'namasekolah'   => $namasekolah,
                        'pekerjaan'   => $pekerjaan,
                        'namaperusahaan'   => $namaperusahaan,
                        'sektorindustri'   => $sektorindustri,
                        'alamatkantor'   => $alamatkantor,
                        'notelpkantor'   => $notelpkantor,
                        'alamatrumah'   => $alamatrumah,
                        'rtrw'   => $rtrw,
                        'kelurahan'   => $kelurahan,
                        'kecamatan'   => $kecamatan,
                        'kotakabupaten'   => $kotakabupaten,
                        'propinsi'   => $propinsi,
                        'kodepos'   => $kodepos,
                        'foto'   => $foto,
                        'tanggalupdate'   => $tanggalupdate,
                        'username'   => $username,
                        'password'   => md5($password),
                        'lastlogin'   => $lastlogin,
                        'tanggalinsert'   => $tanggalinsert,
                    );
                }
            } else {
                if ($statusjemaat != '') {

                    $data = array(
                        'noaj'   => $noaj,
                        'nik'   => $nik,
                        'kewarganegaraan'   => $kewarganegaraan,
                        'namalengkap'   => $namalengkap,
                        'namapanggilan'   => $namapanggilan,
                        'tempatlahir'   => $tempatlahir,
                        'tanggallahir'   => $tanggallahir,
                        'jeniskelamin'   => $jeniskelamin,
                        'statuspernikahan'   => $statuspernikahan,
                        'golongandarah'   => $golongandarah,
                        'notelp'   => $notelp,
                        'nohp'   => $nohp,
                        'email'   => $email,
                        'facebook'   => $facebook,
                        'instagram'   => $instagram,
                        'namadarurat'   => $namadarurat,
                        'hubungan'   => $hubungan,
                        'notelpdarurat'   => $notelpdarurat,
                        'pendidikanterakhir'   => $pendidikanterakhir,
                        'namasekolah'   => $namasekolah,
                        'pekerjaan'   => $pekerjaan,
                        'namaperusahaan'   => $namaperusahaan,
                        'sektorindustri'   => $sektorindustri,
                        'alamatkantor'   => $alamatkantor,
                        'notelpkantor'   => $notelpkantor,
                        'alamatrumah'   => $alamatrumah,
                        'rtrw'   => $rtrw,
                        'kelurahan'   => $kelurahan,
                        'kecamatan'   => $kecamatan,
                        'kotakabupaten'   => $kotakabupaten,
                        'propinsi'   => $propinsi,
                        'kodepos'   => $kodepos,
                        'foto'   => $foto,
                        'tanggalupdate'   => $tanggalupdate,
                        'username'   => $username,
                        'lastlogin'   => $lastlogin,
                        'statusjemaat'   => $statusjemaat,
                        'tanggalinsert'   => $tanggalinsert,
                    );
                } else {
                    $data = array(
                        'noaj'   => $noaj,
                        'nik'   => $nik,
                        'kewarganegaraan'   => $kewarganegaraan,
                        'namalengkap'   => $namalengkap,
                        'namapanggilan'   => $namapanggilan,
                        'tempatlahir'   => $tempatlahir,
                        'tanggallahir'   => $tanggallahir,
                        'jeniskelamin'   => $jeniskelamin,
                        'statuspernikahan'   => $statuspernikahan,
                        'golongandarah'   => $golongandarah,
                        'notelp'   => $notelp,
                        'nohp'   => $nohp,
                        'email'   => $email,
                        'facebook'   => $facebook,
                        'instagram'   => $instagram,
                        'namadarurat'   => $namadarurat,
                        'hubungan'   => $hubungan,
                        'notelpdarurat'   => $notelpdarurat,
                        'pendidikanterakhir'   => $pendidikanterakhir,
                        'namasekolah'   => $namasekolah,
                        'pekerjaan'   => $pekerjaan,
                        'namaperusahaan'   => $namaperusahaan,
                        'sektorindustri'   => $sektorindustri,
                        'alamatkantor'   => $alamatkantor,
                        'notelpkantor'   => $notelpkantor,
                        'alamatrumah'   => $alamatrumah,
                        'rtrw'   => $rtrw,
                        'kelurahan'   => $kelurahan,
                        'kecamatan'   => $kecamatan,
                        'kotakabupaten'   => $kotakabupaten,
                        'propinsi'   => $propinsi,
                        'kodepos'   => $kodepos,
                        'foto'   => $foto,
                        'tanggalupdate'   => $tanggalupdate,
                        'username'   => $username,
                        'lastlogin'   => $lastlogin,
                        'tanggalinsert'   => $tanggalinsert,
                    );
                }
            }

            $simpan = $this->Jemaat_model->update($data, $idjemaat);
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
        redirect('jemaat');
    }

    public function get_edit_data()
    {
        $idjemaat = $this->input->post('idjemaat');
        $RsData = $this->Jemaat_model->get_by_id($idjemaat)->row();

        $data = array(
            'idjemaat'     =>  $RsData->idjemaat,
            'noaj'     =>  $RsData->noaj,
            'nik'     =>  $RsData->nik,
            'kewarganegaraan'     =>  $RsData->kewarganegaraan,
            'namalengkap'     =>  $RsData->namalengkap,
            'namapanggilan'     =>  $RsData->namapanggilan,
            'tempatlahir'     =>  $RsData->tempatlahir,
            'tanggallahir'     =>  $RsData->tanggallahir,
            'jeniskelamin'     =>  $RsData->jeniskelamin,
            'statuspernikahan'     =>  $RsData->statuspernikahan,
            'golongandarah'     =>  $RsData->golongandarah,
            'notelp'     =>  $RsData->notelp,
            'nohp'     =>  $RsData->nohp,
            'email'     =>  $RsData->email,
            'facebook'     =>  $RsData->facebook,
            'instagram'     =>  $RsData->instagram,
            'namadarurat'     =>  $RsData->namadarurat,
            'hubungan'     =>  $RsData->hubungan,
            'notelpdarurat'     =>  $RsData->notelpdarurat,
            'pendidikanterakhir'     =>  $RsData->pendidikanterakhir,
            'namasekolah'     =>  $RsData->namasekolah,
            'pekerjaan'     =>  $RsData->pekerjaan,
            'namaperusahaan'     =>  $RsData->namaperusahaan,
            'sektorindustri'     =>  $RsData->sektorindustri,
            'alamatkantor'     =>  $RsData->alamatkantor,
            'notelpkantor'     =>  $RsData->notelpkantor,
            'alamatrumah'     =>  $RsData->alamatrumah,
            'rtrw'     =>  $RsData->rtrw,
            'kelurahan'     =>  $RsData->kelurahan,
            'kecamatan'     =>  $RsData->kecamatan,
            'kotakabupaten'     =>  $RsData->kotakabupaten,
            'propinsi'     =>  $RsData->propinsi,
            'kodepos'     =>  $RsData->kodepos,
            'foto'     =>  $RsData->foto,
            'tanggalupdate'     =>  $RsData->tanggalupdate,
            'username'     =>  $RsData->username,
            'password'     =>  $RsData->password,
            'lastlogin'     =>  $RsData->lastlogin,
            'statusjemaat'     =>  $RsData->statusjemaat,
            'tanggalinsert'     =>  $RsData->tanggalinsert,
        );

        echo (json_encode($data));
    }

    public function get_info_detail()
    {
        $idjemaat = $this->input->get('idjemaat');

        $rsJemaat = $this->db->query("
                    SELECT * FROM v_jemaat WHERE idjemaat = '$idjemaat'
            ");

        $rsnokaj = $this->db->query("select * from v_jemaatfamily where idjemaat='" . $idjemaat . "'");



        if ($rsnokaj->num_rows() > 0) {
            $nokaj = $rsnokaj->row()->nokaj;
        } else {
            // echo json_encode( array('success' => false, 'msg'=>'Tidak ditemukan nomor kaj, ini hanya untuk jemaat elshaddai'));
            // exit();
            $nokaj = '-';
        }

        $rsKepalaKeluarga = $this->db->query("select * from v_jemaatfamily where nokaj='" . $nokaj . "' and idhubunganfamily='A01'");
        $arrKepalaKeluarga = array();
        if ($rsKepalaKeluarga->num_rows() > 0) {
            foreach ($rsKepalaKeluarga->result() as $rowKepalaKeluarga) {
                array_push($arrKepalaKeluarga, array(
                    'idjemaatfamily' => $rowKepalaKeluarga->idjemaatfamily,
                    'nokaj' => $rowKepalaKeluarga->nokaj,
                    'idjemaat' => $rowKepalaKeluarga->idjemaat,
                    'idhubunganfamily' => $rowKepalaKeluarga->idhubunganfamily,
                    'noaj' => $rowKepalaKeluarga->noaj,
                    'namalengkap' => $rowKepalaKeluarga->namalengkap,
                    'nik' => $rowKepalaKeluarga->nik,
                    'namahubungan' => $rowKepalaKeluarga->namahubungan,
                ));
            }
        }

        // echo json_encode("test");
        // exit();
        $rsIstriAnak = $this->db->query("select * from v_jemaatfamily where nokaj='" . $nokaj . "' and idhubunganfamily in('B01', 'C01')");
        $arrIstriAnak = array();
        if ($rsIstriAnak->num_rows() > 0) {
            foreach ($rsIstriAnak->result() as $rowIstriAnak) {
                array_push($arrIstriAnak, array(
                    'idjemaatfamily' => $rowIstriAnak->idjemaatfamily,
                    'nokaj' => $rowIstriAnak->nokaj,
                    'idjemaat' => $rowIstriAnak->idjemaat,
                    'idhubunganfamily' => $rowIstriAnak->idhubunganfamily,
                    'noaj' => $rowIstriAnak->noaj,
                    'namalengkap' => $rowIstriAnak->namalengkap,
                    'nik' => $rowIstriAnak->nik,
                    'namahubungan' => $rowIstriAnak->namahubungan,
                ));
            }
        }
        $rsLainnya = $this->db->query("select * from v_jemaatfamily where nokaj='" . $nokaj . "' and idhubunganfamily not in('A01', 'B01', 'C01') ");

        $arrLainnya = array();
        if ($rsLainnya->num_rows() > 0) {
            foreach ($rsLainnya->result() as $rowLainnya) {
                array_push($arrLainnya, array(
                    'idjemaatfamily' => $rowLainnya->idjemaatfamily,
                    'nokaj' => $rowLainnya->nokaj,
                    'idjemaat' => $rowLainnya->idjemaat,
                    'idhubunganfamily' => $rowLainnya->idhubunganfamily,
                    'noaj' => $rowLainnya->noaj,
                    'namalengkap' => $rowLainnya->namalengkap,
                    'nik' => $rowLainnya->nik,
                    'namahubungan' => $rowLainnya->namahubungan,
                ));
            }
        }


        //data kelas
        $rskelas = $this->db->query("
                SELECT kelas.idkelas, kelas.namakelas, kelas.urlsertifikat,
                    registrasikelas.`statuslulus`, tglsertifikat, idregistrasikelas
                    FROM kelas 
                    LEFT JOIN registrasikelas ON registrasikelas.`idkelas`=kelas.`idkelas` and idjemaat='$idjemaat' AND statuslulus=1
                    GROUP BY kelas.idkelas, kelas.namakelas, kelas.urlsertifikat,
                    registrasikelas.`statuslulus`, tglsertifikat, idregistrasikelas
            ");


        //Baptis

        $rsBaptisan = $this->db->query("
                    SELECT * FROM v_aktabaptisan WHERE idjemaat = '$idjemaat' ORDER BY tglakta DESC LIMIT 1
            ");
        $arrBaptisan = array();
        if ($rsBaptisan->num_rows() > 0) {
            foreach ($rsBaptisan->result() as $rowBaptisan) {
                array_push($arrBaptisan, array(
                    'idakta' => $rowBaptisan->idakta,
                    'noakta' => $rowBaptisan->noakta,
                    'tglakta' => tglindonesia($rowBaptisan->tglakta),
                    'dilakukanoleh' => $rowBaptisan->dilakukanoleh,
                    'namaayah' => $rowBaptisan->namaayah,
                    'namaibu' => $rowBaptisan->namaibu,
                    'tglbaptis' => tglindonesia($rowBaptisan->tglbaptis),
                    'namagereja' => $rowBaptisan->namagereja,
                    'namagembala' => $rowBaptisan->namagembala,
                    'tempatbaptis' => $rowBaptisan->tempatbaptis,
                    'fileakta' => $rowBaptisan->fileakta,
                    'fileaktalokasi' => base_url('uploads/akta/baptis/' . $rowBaptisan->fileakta),
                ));
            }
        }

        echo json_encode(array('success' => true, 'rsJemaat' => $rsJemaat->row(), 'idencrypt' => $this->encrypt->encode($idjemaat), 'arrKepalaKeluarga' => $arrKepalaKeluarga, 'arrIstriAnak' => $arrIstriAnak, 'arrLainnya' => $arrLainnya, 'rskelas' => $rskelas->result(), 'arrBaptisan' => $arrBaptisan));
    }


    public function ubahkeluarga($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);

        $rowjemaat = $this->Jemaat_model->get_by_id($idjemaat);
        if ($rowjemaat->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
            exit();
        };

        $rsCekKeluarga = $this->db->query("
                                      select * from jemaatfamily where idjemaat='" . $idjemaat . "'
                                    ");

        if ($rsCekKeluarga->num_rows() == 0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Nomor KAJ!</strong> Nomor KAJ tidak ditemukan. Ubah keluarga ini hanya untuk jemaat bukan simpatisan!
                        </div>
                    </div>';

            $this->session->set_flashdata('pesan', $pesan);
            redirect('jemaat');
        }

        $data['rsCekKeluarga'] = $rsCekKeluarga;
        $data['rowjemaat'] = $rowjemaat->row();
        $data['idjemaat'] = $idjemaat;
        $data['menu'] = 'jemaat';
        $this->load->view('jemaat/ubahkeluarga', $data);
    }

    public function simpanubahkeluarga()
    {
        $idjemaat = $this->input->post('idjemaat');
        $idjemaatfamily = $this->input->post('idjemaatfamily');
        $idhubunganfamily = $this->input->post('idhubunganfamily');

        $simpan = $this->Jemaat_model->simpanubahkeluarga($idjemaat, $idjemaatfamily, $idhubunganfamily);
        if ($simpan) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil disimpan!
                        </div>
                    </div>';
        } else {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal disimpan!
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('jemaat');
    }

    public function hapusfamily($idjemaat)
    {
        $idjemaat = $this->encrypt->decode($idjemaat);
        $hapus = $this->Jemaat_model->hapusfamily($idjemaat);
        if ($hapus) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dihapus!
                        </div>
                    </div>';
        } else {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dihapus!
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('jemaat');
    }


    public function getKabupaten()
    {
        $idprovinsi = $this->input->get('idprovinsi');
        $query = $this->db->query("
            select * from kabupaten where idprovinsi='$idprovinsi' order by namakabupaten
        ");
        echo json_encode($query->result());
    }

    public function getKecamatan()
    {
        $idkabupaten = $this->input->get('idkabupaten');
        $query = $this->db->query("
            select * from kecamatan where idkabupaten='$idkabupaten' order by namakecamatan
        ");
        echo json_encode($query->result());
    }

    public function getKelurahan()
    {
        $idkecamatan = $this->input->get('idkecamatan');
        $query = $this->db->query("
            select * from desa where idkecamatan='$idkecamatan' order by namadesa
        ");
        echo json_encode($query->result());
    }

    public function ajaxUsernameSudahAda()
    {
        $username = $this->input->get('username');
        $idjemaat = $this->input->get('idjemaat');
        if ($this->Jemaat_model->usernameSudahAda($username, $idjemaat)) {
            echo json_encode(array('sudahAda' => true));
        } else {
            echo json_encode(array('sudahAda' => false));
        }
    }
}

/* End of file Jemaat.php */
/* Location: ./application/controllers/Jemaat.php */