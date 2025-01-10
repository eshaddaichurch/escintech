<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Penjadwalan_model');
        $this->load->model('Departement_model');
        $this->load->model('Jemaat_model');
        $this->session->set_userdata('IDMENUSELECTED', 'P100');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'penjadwalan';
        $this->load->view('penjadwalan/listdata2', $data);
    }

    public function tambahjadwal()
    {
        $data['idjadwalevent'] = '';
        $data['menu'] = 'penjadwalan';
        $this->load->view('penjadwalan/jadwalevent', $data);
    }


    public function edit($idjadwalevent)
    {
        $idjadwalevent = $this->encrypt->decode($idjadwalevent);

        if ($this->Penjadwalan_model->get_by_id($idjadwalevent)->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penjadwalan');
            exit();
        };
        $data['idjadwalevent'] = $idjadwalevent;
        $data['menu'] = 'penjadwalan';
        $this->load->view('penjadwalan/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Penjadwalan_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idjadwalevent;
                $row[] = date('d-m-Y', strtotime($rowdata->tanggaljadwal));
                $row[] = $rowdata->tema;
                $row[] = $rowdata->subtema;
                $row[] = $rowdata->idpengkhotbah;
                $row[] = $rowdata->videoembed;
                $row[] = '<img src="' . base_url('uploads/event/' . $rowdata->gambarsampul) . '" alt="" style=" width: 80%;">';

                // $row[] = $rowdata->gambarsampul;            
                $row[] = '<a href="' . site_url('penjadwalan/edit/' . $this->encrypt->encode($rowdata->idjadwalevent)) . '" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="' . site_url('penjadwalan/delete/' . $this->encrypt->encode($rowdata->idjadwalevent)) . '" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }




        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penjadwalan_model->count_all(),
            "recordsFiltered" => $this->Penjadwalan_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function datatablejadwalevendetail()
    {
        // query ini untuk item yang dimunculkan sesuai dengan kategori yang dipilih        

        $idjadwalevent = $this->input->post('idjadwalevent');
        $query = "select * from jadwaleventdetailtanggal
                        WHERE jadwaleventdetailtanggal.idjadwalevent='" . $idjadwalevent . "'";

        $RsData = $this->db->query($query);

        $no = 0;
        $data = array();

        if ($RsData->num_rows() > 0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->idjadwaleventdetail;
                $row[] = $rowdata->tgljadwaleventmulai;
                $row[] = $rowdata->tgljadwaleventselesai;
                $row[] = $rowdata->jammulai;
                $row[] = $rowdata->jamselesai;
                $row[] = $rowdata->tgljadwaleventmulai . ' s/d ' . $rowdata->tgljadwaleventselesai;
                $row[] = $rowdata->jammulai . ' s/d ' . $rowdata->jamselesai;
                if ($rowdata->diulangsetiapminggu == 1) {
                    $diulangsetiapminggu = 'Ya';
                } else {
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
        // $idjadwalevent = $this->encrypt->decode($idjadwalevent);  
        $rsdata = $this->Penjadwalan_model->get_by_id($idjadwalevent);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('penjadwalan');
            exit();
        };

        $hapus = $this->Penjadwalan_model->hapus($idjadwalevent);
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
        redirect('penjadwalan');
    }


    public function simpanjadwalevent()
    {
        // $isidatatable       = $_REQUEST['isidatatable'];
        $isidatatable       = $this->input->post('isidatatable');
        $idjadwalevent           = $this->input->post('idpengeluaran');
        $jenisjadwal           = $this->input->post('jenisjadwal');
        $namaevent           = $this->input->post('namaevent');
        $tema           = $this->input->post('tema');
        $subtema           = $this->input->post('subtema');
        $iddepartement           = $this->input->post('iddepartement');
        $idpengkhotbah           = $this->input->post('idpengkhotbah');
        $idpenanggungjawab           = $this->input->post('idpenanggungjawab');
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
        $konsepPengumumanOptions           = $this->input->post('konsepPengumumanOptions');
        $detailKonsepPengumuman           = $this->input->post('detailKonsepPengumuman');
        $tampilkanDiWebsiteOptions           = $this->input->post('tampilkanDiWebsiteOptions');
        $foto           = $this->input->post('foto');
        $deskripsi           = $this->input->post('deskripsi');
        $harusdaftar           = $this->input->post('harusdaftar');
        $halYangDisampaian           = $this->input->post('halYangDisampaian');
        $rundown           = $this->input->post('rundown');
        $tglinsert           = date('Y-m-d H:i:s');
        $tglupdate           = date('Y-m-d H:i:s');
        $idpengguna           = $this->session->userdata('idjemaat');


        //jika session berakhir
        if (empty($idpengguna)) {
            echo json_encode(array('msg' => "Session telah berakhir, Silahkan refresh halaman!"));
            exit();
        }

        if (empty($idpengkhotbah)) {
            $idpengkhotbah = NULL;
        }

        if ($onsitestatus == 'Ya') {
            $aplikasiDigunakanOptions = NULL;
        }

        if ($diumumkanKeJemaatOptions == 'Tidak') {
            $tglmulaidiumumkan = NULL;
            $tglselesaidiumumkan = NULL;
            $pengumumanDisampaikanMelaluiOptions = NULL;
            $konsepPengumumanOptions = NULL;
            $detailKonsepPengumuman = NULL;
        }


        $idjadwalevent = $this->db->query("select create_idjadwalevent('" . date('Y-m-d') . "') as idjadwalevent ")->row()->idjadwalevent;

        $arrayhead = array(
            'idjadwalevent' => $idjadwalevent,
            'namaevent' => $namaevent,
            'deskripsi' => $deskripsi,
            'idpenanggungjawab' => $idpenanggungjawab,
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
        );




        //-------------------------------- >> Tempat Dan Waktu 
        $i = 0;
        $arrTempatWaktu = array();
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
        $i = 0;
        $arrPelayanan = array();
        if ($tablePelayanan != NULL) {
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
        $i = 0;
        $arrInventaris = array();
        if ($tableInventaris != NULL) {
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
        $i = 0;
        $arrRuangan = array();
        if ($tableRuangan != NULL) {
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
        $i = 0;

        $arrParkiran = array();
        if ($tableParkiran != NULL) {
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

        $simpan  = $this->Penjadwalan_model->simpanjadwalevent($arrayhead, $arrTempatWaktu, $arrPelayanan, $arrInventaris, $arrRuangan, $arrParkiran, $idjadwalevent);
        if ($simpan) {
            $simpanextract = $this->Penjadwalan_model->extractTanggalJadwal($idjadwalevent);

            if (!$simpanextract) {
                $eror = $this->db->error();
                echo json_encode(array('msg' => 'Kode Eror: Gagal extract detail tanggal jadwal'));
                exit();
            }
        } else {

            $eror = $this->db->error();
            echo json_encode(array('msg' => 'Kode Eror: ' . $eror['code'] . ' ' . $eror['message']));
            exit();
        }
        echo json_encode(array('success' => true));
        exit();
    }

    public function get_edit_data()
    {

        $idjadwalevent = $this->input->post('idjadwalevent');
        $RsData = $this->Penjadwalan_model->get_by_id($idjadwalevent)->row();

        $data = array(
            'idjadwalevent' => $RsData->idjadwalevent,
            'tanggaljadwal' => $RsData->tanggaljadwal,
            'tema'   => $RsData->tema,
            'subtema'   => $RsData->subtema,
            'idpengkhotbah' => $RsData->idpengkhotbah,
            'videoembed' => $RsData->videoembed,
            'gambarsampul' => $RsData->gambarsampul,

        );

        echo (json_encode($data));
    }

    public function cekJadwalTanggalLebihDariSatu()
    {
        $idjadwalevent = $this->input->get('idjadwalevent');
        $jumlahRow = $this->db->query("select * from v_jadwaleventdetailtanggal_2 where idjadwalevent='$idjadwalevent'")->num_rows();
        if ($jumlahRow > 1) {
            $lebihdarisatu = true;
        } else {
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


    public function getCalenderDetail()
    {
        $rsjadwal = $this->db->query("
                select * from v_jadwaleventdetailtanggal_2
            ");
        $arrCalender = array();
        if ($rsjadwal->num_rows() > 0) {
            foreach ($rsjadwal->result() as $row) {

                if (!empty($row->warnapenjadwalan)) {
                    $warnapenjadwalan = $row->warnapenjadwalan;
                } else {
                    $warnapenjadwalan = '#E68302';
                }
                $startDate = $row->tgljadwal . ' ' . $row->jammulai;
                $endDate = $row->tgljadwal . ' ' . $row->jamselesai;

                array_push($arrCalender, array(
                    'idjadwalevent' => $row->idjadwalevent,
                    'title' => $row->namaevent,
                    'start' => date('Y-m-d H:i:s', strtotime($startDate)),
                    'end' => date('Y-m-d H:i:s', strtotime($endDate)),
                    'backgroundColor' => $warnapenjadwalan,
                    'borderColor' => $warnapenjadwalan,
                    'allDay' => false,
                    'url' => "",
                ));
            }
        }
        echo json_encode($arrCalender);
    }

    public function getDetailJadwal()
    {
        $idjadwalevent = $this->input->get('idjadwalevent');

        $rsJadwalDetail = $this->db->query("
                    select * from v_jadwalevent where idjadwalevent='$idjadwalevent'
                ");
        echo json_encode($rsJadwalDetail->row());
    }
}

/* End of file Penjadwalan.php */
/* Location: ./application/controllers/Penjadwalan.php */