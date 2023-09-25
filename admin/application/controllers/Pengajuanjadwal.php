<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuanjadwal extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Pengajuanjadwal_model');
        $this->load->model('Departement_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'P200' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['idjadwalevent'] = '';        
        $data['menu'] = 'pengajuanjadwal';  
        $this->load->view('pengajuanjadwal/listdata', $data);
    }   

    public function tambah()
    {
        $data['idjadwalevent'] = '';        
        $data['menu'] = 'pengajuanjadwal';  
        $this->load->view('pengajuanjadwal/form', $data);
    }   

    public function tambahjadwal()
    {       
        $data['idjadwalevent'] = '';        
        $data['menu'] = 'pengajuanjadwal';  
        $this->load->view('pengajuanjadwal/form', $data);
    }


    public function edit($idjadwalevent)
    {       
        $idjadwalevent = $this->encrypt->decode($idjadwalevent);
        $rsPengajuan = $this->Pengajuanjadwal_model->get_by_id($idjadwalevent); 
        if ($rsPengajuan->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengajuanjadwal');
            exit();
        };

        $statuskonfirmasi = $rsPengajuan->row()->statuskonfirmasi;
        if ($statuskonfirmasi=='Disetujui' || $statuskonfirmasi=='Ditolak') {
          $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Upss!</strong> Data ini sudah "'.$statuskonfirmasi.'" tidak bisa diedit lagi! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengajuanjadwal');
            exit();  
        }

        $data['idjadwalevent'] =$idjadwalevent;        
        $data['menu'] = 'pengajuanjadwal';
        $this->load->view('pengajuanjadwal/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Pengajuanjadwal_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $tglmulai = '';
                $tglselesai = '';
                if (!empty($rowdata->tglmulai)) {
                    $tglmulai = date('Y-m-d', strtotime($rowdata->tglmulai));
                }

                if (!empty($rowdata->tglselesai)) {
                    $tglselesai = date('Y-m-d', strtotime($rowdata->tglselesai));
                }

                $tglevent = '';
                if ($tglmulai==$tglselesai) {
                    $tglevent = $tglmulai;
                }else{
                    $tglevent = $tglmulai.'<br>Sd. '.$tglselesai;
                }

                switch ($rowdata->statuskonfirmasi) {
                    case 'Menunggu':
                        $statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
                        break;
                    case 'Disetujui':
                        $statuskonfirmasi = '<span class="badge badge-success">Disetujui</span>';
                        break;
                    case 'Ditolak':
                        $statuskonfirmasi = '<span class="badge badge-danger">Ditolak</span>';
                        break;
                    
                    default:
                        $statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
                        break;
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $tglevent;
                $row[] = '<strong>'.$rowdata->namaevent.'</strong>'.'<br>'.$rowdata->namadepartement;
                $row[] = $rowdata->jenisjadwal;
                $row[] = $statuskonfirmasi;
                $row[] = '<a href="'.site_url( 'pengajuanjadwal/edit/'.$this->encrypt->encode($rowdata->idjadwalevent) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('pengajuanjadwal/delete/'.$this->encrypt->encode($rowdata->idjadwalevent) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pengajuanjadwal_model->count_all(),
                        "recordsFiltered" => $this->Pengajuanjadwal_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function datatablejadwalevendetail()
    {
        // query ini untuk item yang dimunculkan sesuai dengan kategori yang dipilih        

        $idjadwalevent = $this->input->post('idjadwalevent');
        $query = "select * from jadwaleventdetailtanggal
                        WHERE jadwaleventdetailtanggal.idjadwalevent='".$idjadwalevent."'";

        $RsData = $this->db->query($query);

        $no = 0;
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {               
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idjadwaleventdetail;
                $row[] = $rowdata->tgljadwaleventmulai;
                $row[] = $rowdata->tgljadwaleventselesai;
                $row[] = $rowdata->jammulai;
                $row[] = $rowdata->jamselesai;
                $row[] = $rowdata->tgljadwaleventmulai.' s/d '.$rowdata->tgljadwaleventselesai;
                $row[] = $rowdata->jammulai.' s/d '.$rowdata->jamselesai;
                $row[] = $rowdata->lokasievent;
                if ($rowdata->diulangsetiapminggu==1) {
                    $diulangsetiapminggu = 'Ya';
                }else{
                    $diulangsetiapminggu = 'Tidak';
                }
                $row[] = $diulangsetiapminggu;
                $row[] = '<span class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></span>';
                $data[] = $row;
            }
        }
        $output = array(
                        "data" => $data,
                        );
        echo json_encode($output);
    }
        
    public function delete($idjadwalevent)
    {
        $idjadwalevent = $this->encrypt->decode($idjadwalevent);  
        $rsdata = $this->Pengajuanjadwal_model->get_by_id($idjadwalevent);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengajuanjadwal');
            exit();
      	};

        $rowPengajuan = $rsdata->row();
        if ($rowPengajuan->statuskonfirmasi!='Menunggu') {
          $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Uppss!</strong> Pengajuan ini sudah '.$rowPengajuan->statuskonfirmasi.'. Tidak bisa dihapus lagi! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('pengajuanjadwal');
            exit();  
        }

        $hapus = $this->Pengajuanjadwal_model->hapus($idjadwalevent);
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
        redirect('pengajuanjadwal');        

    }


    public function simpanjadwalevent()
    {
        // $isidatatable       = $_REQUEST['isidatatable'];
        $isidatatable       = $this->input->post('isidatatable');
        $idjadwalevent           = $this->input->post('idjadwalevent');
        $idkelas           = $this->input->post('idkelas');
        $jenisjadwal           = $this->input->post('jenisjadwal');
        $namaevent           = $this->input->post('namaevent');
        $tema           = $this->input->post('tema');
        $subtema           = $this->input->post('subtema');
        $iddepartement           = $this->input->post('iddepartement');
        $idpengkhotbah           = $this->input->post('idpengkhotbah');
        $namapenanggungjawab           = $this->input->post('namapenanggungjawab');
        $jumlahvolunteer           = $this->input->post('jumlahvolunteer');
        $jumlahjemaat           = $this->input->post('jumlahjemaat');
        $onsitestatus           = $this->input->post('onsitestatus');
        $aplikasiDigunakanOptions           = $this->input->post('aplikasiDigunakanOptions');
        $tableRuangan           = $this->input->post('tableRuangan');
        $tableInventaris           = $this->input->post('tableInventaris');
        $tableParkiran           = $this->input->post('tableParkiran');
        $tablePelayanan           = $this->input->post('tablePelayanan');


        $streamingurl           = $this->input->post('streamingurl');
        $diumumkanKeJemaatOptions           = $this->input->post('diumumkanKeJemaatOptions');
        $tglmulaidiumumkan           = $this->input->post('tglmulaidiumumkan');
        $tglselesaidiumumkan           = $this->input->post('tglselesaidiumumkan');
        $pengumumanDisampaikanMelaluiOptions           = $this->input->post('pengumumanDisampaikanMelaluiOptions');
        $jenisPengumuman           = $this->input->post('jenisPengumuman');
        $konsepPengumumanOptions           = $this->input->post('konsepPengumumanOptions');
        $detailKonsepPengumuman           = $this->input->post('detailKonsepPengumuman');
        $tampilkanDiWebsiteOptions           = $this->input->post('tampilkanDiWebsiteOptions');
        $deskripsi           = $this->input->post('deskripsi');
        $harusdaftar           = $this->input->post('harusdaftar');
        $halYangDisampaian           = $this->input->post('halYangDisampaian');
        $rundown           = $this->input->post('rundown');
        $tglinsert           = date('Y-m-d H:i:s');
        $tglupdate           = date('Y-m-d H:i:s');
        $idpengguna           = $this->session->userdata('idjemaat');


        //jika session berakhir
        if (empty($idpengguna)) { 
            echo json_encode(array('msg'=>"Session telah berakhir, Silahkan refresh halaman!"));
            exit();
        }               

        if (empty($idpengkhotbah)) {
            $idpengkhotbah = NULL;
        }

        if ($onsitestatus=='Ya') {
            $aplikasiDigunakanOptions = NULL;
        }

        if ($diumumkanKeJemaatOptions=='Tidak') {
            $tglmulaidiumumkan = NULL;
            $tglselesaidiumumkan = NULL;
            $pengumumanDisampaikanMelaluiOptions = NULL;
            $konsepPengumumanOptions = NULL;
            $detailKonsepPengumuman = NULL;
        }

        if ($jenisjadwal!="Kelas Next Step") {
            $idkelas = null;
        }

        $foto_lama = $this->input->post('foto_lama');
        $foto = $this->App->uploadImage($_FILES, 'foto', $foto_lama, 'pengajuanjadwal');

        if (empty($idjadwalevent)) {
            
            $idjadwalevent = $this->db->query("select create_idjadwalevent('".date('Y-m-d')."') as idjadwalevent ")->row()->idjadwalevent;

            $arrayhead = array(
                                'idjadwalevent' => $idjadwalevent,
                                'namaevent' => $namaevent,
                                'deskripsi' => $deskripsi,
                                'namapenanggungjawab' => $namapenanggungjawab,
                                'gambarsampul' => $foto,
                                'iddepartement' => $iddepartement,
                                'tglinsert' => $tglinsert,
                                'tglupdate' => $tglupdate,
                                'idpengguna' => $idpengguna,
                                'jenisjadwal' => $jenisjadwal,
                                'idpengkhotbah' => $idpengkhotbah,
                                'streamingurl' => $streamingurl,
                                'tema' => $tema,
                                'subtema' => $subtema,
                                'harusdaftar' => $harusdaftar,
                                'jumlahvolunteer' => $jumlahvolunteer,
                                'jumlahjemaat' => $jumlahjemaat,
                                'onsitestatus' => $onsitestatus,
                                'aplikasidigunakan' => $aplikasiDigunakanOptions,
                                'diumumkankejemaat' => $diumumkanKeJemaatOptions,
                                'tglmulaidiumumkan' => $tglmulaidiumumkan,
                                'tglselesaidiumumkan' => $tglselesaidiumumkan,
                                'pengumumandisampaikanmelalui' => $pengumumanDisampaikanMelaluiOptions,
                                'konseppengumuman' => $konsepPengumumanOptions,
                                'detailkonseppengumuman' => $detailKonsepPengumuman,
                                'tampilkandiwebsite' => $tampilkanDiWebsiteOptions,
                                'halyangdisampaian' => $halYangDisampaian,
                                'rundown' => $rundown,
                                'idkelas' => $idkelas,
                                );

            


            //-------------------------------- >> Tempat Dan Waktu 
            $i=0;
            $arrTempatWaktu=array();       
            foreach ($isidatatable as $item) {
                        $tgljadwaleventmulai    = $item[2];
                        $tgljadwaleventselesai  = $item[3];
                        $jammulai               = $item[4];
                        $jamselesai             = $item[5];
                        $lokasievent             = $item[8];
                        $diulangsetiapminggu             = $item[9];
                $i++;
                $detail = array(
                                'idjadwalevent' => $idjadwalevent,
                                'tgljadwaleventmulai' => $tgljadwaleventmulai,
                                'tgljadwaleventselesai' => $tgljadwaleventselesai,
                                'jammulai' => $jammulai,
                                'jamselesai' => $jamselesai,
                                'diulangsetiapminggu' => $diulangsetiapminggu,
                                );
                array_push($arrTempatWaktu, $detail);              
            }


            //-------------------------------- >> Pelayanan Yang dibutuhkan
            $i=0;
            $arrPelayanan=array();  
            if ($tablePelayanan!=NULL) {
                    foreach ($tablePelayanan as $item) {
                                $idpelayanan    = $item[2];
                        $i++;
                        $detail = array(
                                        'idjadwalevent' => $idjadwalevent,
                                        'idpelayanan' => $idpelayanan,
                                        );
                        array_push($arrPelayanan, $detail);              
                    }
                 }     


            //-------------------------------- >> Inventaris Yang dibutuhkan
            $i=0;
            $arrInventaris=array();       
            if ($tableInventaris!=NULL) {
                foreach ($tableInventaris as $item) {
                            $idinventaris    = $item[2];
                            $qty    = $item[3];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idinventaris' => $idinventaris,
                                    'qty' => $qty,
                                    );
                    array_push($arrInventaris, $detail);              
                }
            }

            //-------------------------------- >> RUangan 
            $i=0;
            $arrRuangan=array();       
            if ($tableRuangan!=NULL) {
                foreach ($tableRuangan as $item) {
                            $idruangan    = $item[2];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idruangan' => $idruangan,                                
                                    );
                    array_push($arrRuangan, $detail);              
                }
            }



            //-------------------------------- >> Parkiran 
            $i=0;

            $arrParkiran=array();       
            if ($tableParkiran!=NULL) {
                foreach ($tableParkiran as $item) {
                            $idparkiran    = $item[2];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idparkiran' => $idparkiran,                                
                                    );
                    array_push($arrParkiran, $detail);              
                }
            }


            //-------------------------------- >> Jenis Pengumuman 
            $i=0;

            $arrIdJenisPengumuman=array();       
            if (count($jenisPengumuman)>0) {
                foreach ($jenisPengumuman as $item) {
                            $idjenispengumuman    = $item;
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idjenispengumuman' => $idjenispengumuman,                                
                                    );
                    array_push($arrIdJenisPengumuman, $detail);              
                }
            }

            $simpan  = $this->Pengajuanjadwal_model->simpanjadwalevent($arrayhead, $arrTempatWaktu, $arrPelayanan, $arrInventaris, $arrRuangan, $arrParkiran, $idjadwalevent, $arrIdJenisPengumuman);
        }else{

            $arrayhead = array(
                                'idjadwalevent' => $idjadwalevent,
                                'namaevent' => $namaevent,
                                'deskripsi' => $deskripsi,
                                'namapenanggungjawab' => $namapenanggungjawab,
                                'gambarsampul' => $foto,
                                'iddepartement' => $iddepartement,
                                'tglupdate' => $tglupdate,
                                'jenisjadwal' => $jenisjadwal,
                                'idpengkhotbah' => $idpengkhotbah,
                                'streamingurl' => $streamingurl,
                                'tema' => $tema,
                                'subtema' => $subtema,
                                'harusdaftar' => $harusdaftar,
                                'jumlahvolunteer' => $jumlahvolunteer,
                                'jumlahjemaat' => $jumlahjemaat,
                                'onsitestatus' => $onsitestatus,
                                'aplikasidigunakan' => $aplikasiDigunakanOptions,
                                'diumumkankejemaat' => $diumumkanKeJemaatOptions,
                                'tglmulaidiumumkan' => $tglmulaidiumumkan,
                                'tglselesaidiumumkan' => $tglselesaidiumumkan,
                                'pengumumandisampaikanmelalui' => $pengumumanDisampaikanMelaluiOptions,
                                'konseppengumuman' => $konsepPengumumanOptions,
                                'detailkonseppengumuman' => $detailKonsepPengumuman,
                                'tampilkandiwebsite' => $tampilkanDiWebsiteOptions,
                                'halyangdisampaian' => $halYangDisampaian,
                                'rundown' => $rundown,
                                'idkelas' => $idkelas,
                                'statuskonfirmasi' => 'Menunggu',
                                'idpenggunakonfirmasi' => NULL,
                                'tglkonfirmasi' => NULL,
                                'keterangankonfirmasi' => NULL,
                                );

            


            //-------------------------------- >> Tempat Dan Waktu 
            $i=0;
            $arrTempatWaktu=array();       
            foreach ($isidatatable as $item) {
                        $tgljadwaleventmulai    = $item[2];
                        $tgljadwaleventselesai  = $item[3];
                        $jammulai               = $item[4];
                        $jamselesai             = $item[5];
                        $lokasievent             = $item[8];
                        $diulangsetiapminggu             = $item[9];
                $i++;
                $detail = array(
                                'idjadwalevent' => $idjadwalevent,
                                'tgljadwaleventmulai' => $tgljadwaleventmulai,
                                'tgljadwaleventselesai' => $tgljadwaleventselesai,
                                'jammulai' => $jammulai,
                                'jamselesai' => $jamselesai,
                                'diulangsetiapminggu' => $diulangsetiapminggu,
                                );
                array_push($arrTempatWaktu, $detail);              
            }


            //-------------------------------- >> Pelayanan Yang dibutuhkan
            // echo json_encode(array('msg' => $tablePelayanan));
            // exit();
            $i=0;
            $arrPelayanan=array();  
            if ($tablePelayanan!=NULL) {
                    foreach ($tablePelayanan as $item) {
                                $idpelayanan    = $item[2];
                        $i++;
                        $detail = array(
                                        'idjadwalevent' => $idjadwalevent,
                                        'idpelayanan' => $idpelayanan,
                                        );
                        array_push($arrPelayanan, $detail);              
                    }
                 }     


            //-------------------------------- >> Inventaris Yang dibutuhkan
            $i=0;
            $arrInventaris=array();       
            if ($tableInventaris!=NULL) {
                foreach ($tableInventaris as $item) {
                            $idinventaris    = $item[2];
                            $qty    = $item[3];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idinventaris' => $idinventaris,
                                    'qty' => $qty,
                                    );
                    array_push($arrInventaris, $detail);              
                }
            }

            //-------------------------------- >> RUangan 
            $i=0;
            $arrRuangan=array();       
            if ($tableRuangan!=NULL) {
                foreach ($tableRuangan as $item) {
                            $idruangan    = $item[2];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idruangan' => $idruangan,                                
                                    );
                    array_push($arrRuangan, $detail);              
                }
            }



            //-------------------------------- >> Parkiran 
            $i=0;

            $arrParkiran=array();       
            if ($tableParkiran!=NULL) {
                foreach ($tableParkiran as $item) {
                            $idparkiran    = $item[2];
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idparkiran' => $idparkiran,                                
                                    );
                    array_push($arrParkiran, $detail);              
                }
            }

            
            //-------------------------------- >> Jenis Pengumuman 
            $i=0;

            $arrIdJenisPengumuman=array();       
            if (count($jenisPengumuman)>0) {
                foreach ($jenisPengumuman as $item) {
                            $idjenispengumuman    = $item;
                    $i++;
                    $detail = array(
                                    'idjadwalevent' => $idjadwalevent,
                                    'idjenispengumuman' => $idjenispengumuman,                                
                                    );
                    array_push($arrIdJenisPengumuman, $detail);              
                }
            }

            $simpan  = $this->Pengajuanjadwal_model->updatejadwalevent($arrayhead, $arrTempatWaktu, $arrPelayanan, $arrInventaris, $arrRuangan, $arrParkiran, $idjadwalevent, $arrIdJenisPengumuman);
        }

        if ($simpan) { 
            $simpanextract = $this->Pengajuanjadwal_model->extractTanggalJadwal($idjadwalevent);

            if (!$simpanextract) {
                $eror = $this->db->error(); 
                echo json_encode(array('msg'=>'Kode Eror: Gagal extract detail tanggal jadwal'));
                exit();                
            }
        }else{

            $eror = $this->db->error(); 
            echo json_encode(array('msg'=>'Kode Eror: '.$eror['code'].' '.$eror['message']));
            exit();
        }
        echo json_encode(array('success' => true));
        exit();


    }

    public function get_edit_data()
    {
        
        $idjadwalevent = $this->input->post('idjadwalevent');
        $RsData = $this->db->query("
                select * from jadwalevent where idjadwalevent='$idjadwalevent'
            ")->row();


        $rsPelayanan = $this->db->query("
                select * from v_jadwaleventdetailpelayanan where idjadwalevent='$idjadwalevent' order by idpelayanan
            ")->result();

        $rsRuangan = $this->db->query("
                select * from v_jadwaleventdetailruangan where idjadwalevent='$idjadwalevent' order by idruangan
            ")->result();

        $rsInventaris = $this->db->query("
                select * from v_jadwaleventdetailinventaris where idjadwalevent='$idjadwalevent' order by idinventaris
            ")->result();

        $rsParkiran = $this->db->query("
                select * from v_jadwaleventdetailparkiran where idjadwalevent='$idjadwalevent' order by idparkiran
            ")->result();

        $rsJenisPengumuman = $this->db->query("
                select * from jadwaleventjenispengumuman where idjadwalevent='$idjadwalevent' order by idjenispengumuman
            ")->result();

        $data = array(
                            'idjadwalevent'=> $RsData->idjadwalevent,
                            'namaevent'=> $RsData->namaevent,
                            'deskripsi'=> $RsData->deskripsi,
                            'idpenanggungjawab'=> $RsData->idpenanggungjawab,
                            'gambarsampul'=> $RsData->gambarsampul,
                            'iddepartement'=> $RsData->iddepartement,
                            'tglinsert'=> $RsData->tglinsert,
                            'tglupdate'=> $RsData->tglupdate,
                            'idpengguna'=> $RsData->idpengguna,
                            'jenisjadwal'=> $RsData->jenisjadwal,
                            'idpengkhotbah'=> $RsData->idpengkhotbah,
                            'streamingurl'=> $RsData->streamingurl,
                            'tema'=> $RsData->tema,
                            'subtema'=> $RsData->subtema,
                            'harusdaftar'=> $RsData->harusdaftar,
                            'jumlahvolunteer'=> $RsData->jumlahvolunteer,
                            'jumlahjemaat'=> $RsData->jumlahjemaat,
                            'onsitestatus'=> $RsData->onsitestatus,
                            'aplikasidigunakan'=> $RsData->aplikasidigunakan,
                            'diumumkankejemaat'=> $RsData->diumumkankejemaat,
                            'tglmulaidiumumkan'=> $RsData->tglmulaidiumumkan,
                            'tglselesaidiumumkan'=> $RsData->tglselesaidiumumkan,
                            'pengumumandisampaikanmelalui'=> $RsData->pengumumandisampaikanmelalui,
                            'konseppengumuman'=> $RsData->konseppengumuman,
                            'detailkonseppengumuman'=> $RsData->detailkonseppengumuman,
                            'tampilkandiwebsite'=> $RsData->tampilkandiwebsite,
                            'halyangdisampaian'=> $RsData->halyangdisampaian,
                            'rundown'=> $RsData->rundown,
                            'statuskonfirmasi'=> $RsData->statuskonfirmasi,
                            'idpenggunakonfirmasi'=> $RsData->idpenggunakonfirmasi,
                            'tglkonfirmasi'=> $RsData->tglkonfirmasi,
                            'keterangankonfirmasi'=> $RsData->keterangankonfirmasi,
                            'idkelas'=> $RsData->idkelas,
                            'namapenanggungjawab'=> $RsData->namapenanggungjawab,
                            'rsPelayanan'=> $rsPelayanan,
                            'rsRuangan'=> $rsRuangan,
                            'rsInventaris'=> $rsInventaris,
                            'rsParkiran'=> $rsParkiran,
                            'rsJenisPengumuman'=> $rsJenisPengumuman,
                     );

        echo(json_encode($data));
    }

    public function cekJadwalTanggalLebihDariSatu()
     {
        $idjadwalevent = $this->input->get('idjadwalevent');
         $jumlahRow = $this->db->query("select * from v_jadwaleventdetailtanggal_2 where idjadwalevent='$idjadwalevent'")->num_rows();
         if ($jumlahRow>1) {
            $lebihdarisatu = true;
         }else{
            $lebihdarisatu = false;
         }
        echo json_encode($lebihdarisatu); 
     } 

    public function getJadwalKalender()
    {
        $rsjadwal = $this->db->query("
                select *, CONCAT(tgljadwal, ' ' ,jammulai) as tglmulai from v_jadwaleventdetailtanggal_2
            ");

        echo json_encode($rsjadwal->result());
    }

    public function getPelayanan()
    {
        $rsPelayanan = $this->db->query("select * from pelayanan where statusaktif='Aktif' order by idpelayanan");
        echo json_encode($rsPelayanan->result());
    }

    public function getRuangan()
    {
        $rsRuangan = $this->db->query("select * from ruanganacara where statusaktif='Aktif' order by idruangan");
        echo json_encode($rsRuangan->result());
    }


    public function getInventaris()
    {
        $rsRuangan = $this->db->query("select * from inventarisruangan where statusaktif='Aktif' order by idinventaris");
        echo json_encode($rsRuangan->result());
    }


    public function getParkiran()
    {
        $rsparkiran = $this->db->query("select * from parkiran where statusaktif='Aktif' order by idparkiran");
        echo json_encode($rsparkiran->result());
    }

}

/* End of file Pengajuanjadwal.php */
/* Location: ./application/controllers/Pengajuanjadwal.php */