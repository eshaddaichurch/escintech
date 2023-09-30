<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasikelas extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Konfirmasikelas_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'N100' );
        $this->cekOtorisasi();
    }    

    public function index()
    {
        $data['menu'] = '';
        $this->load->view('konfirmasikelas/listdata', $data);
    }   

    public function konfirmasi($idregistrasi)
    {       
        $idregistrasi = $this->encrypt->decode($idregistrasi);
        $rsRegistrasi = $this->Konfirmasikelas_model->get_by_id($idregistrasi);
        if ($rsRegistrasi->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('konfirmasikelas');
            exit();
        };
        $rowRegistrasi = $rsRegistrasi->row();
        $idjemaat = $rowRegistrasi->idjemaat;
        $rowJemaat = $this->App->getJemaat($idjemaat)->row();

        $rowJadwalEvent = $this->db->query("select * from v_jadwalevent where idjadwalevent='".$rowRegistrasi->idjadwalevent."'")->row();

        $data['rowJadwalEvent'] = $rowJadwalEvent;
        $data['rowRegistrasi'] = $rowRegistrasi;
        $data['rowJemaat'] = $rowJemaat;
        $data['idregistrasi'] =$idregistrasi;        
        $data['menu'] = '';
        $this->load->view('konfirmasikelas/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Konfirmasikelas_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {

                switch ($rowdata->statuskonfirmasi) {
                    case 'Disetujui':
                        $statuskonfirmasi = '<span class="badge badge-success">'.$rowdata->statuskonfirmasi.'</span>';
                        if (!empty($rowdata->keterangankonfirmasi)) {
                            $statuskonfirmasi .= '<br>Keterangan: '.$rowdata->keterangankonfirmasi;
                        }
                        break;
                    case 'Ditolak':
                        $statuskonfirmasi = '<span class="badge badge-danger">'.$rowdata->statuskonfirmasi.'</span>';
                        if (!empty($rowdata->keterangankonfirmasi)) {
                            $statuskonfirmasi .= '<br>Keterangan: '.$rowdata->keterangankonfirmasi;
                        }
                        break;
                    default:
                        $statuskonfirmasi = '<span class="badge badge-warning">Menunggu</span>';
                        break;
                }

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = formatHariTanggalJam($rowdata->tglregistrasi);
                $row[] = $rowdata->namalengkap;
                $row[] = $rowdata->namakelas;
                $row[] = $statuskonfirmasi;

                $row[] = '<a href="'.site_url( 'konfirmasikelas/konfirmasi/'.$this->encrypt->encode($rowdata->idregistrasi) ).'" class="btn btn-sm btn-success btn-circle"><i class="fa fa-check"></i> Konfirmasi</a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Konfirmasikelas_model->count_all(),
                        "recordsFiltered" => $this->Konfirmasikelas_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function simpan()
    {       
        $idregistrasi             	= $this->input->post('idregistrasi');
        $status             	= $this->input->post('status');
        $keterangankonfirmasi             	= $this->input->post('keterangankonfirmasi');
        $idpengguna = $this->session->userdata('idjemaat');
        $tglkonfirmasi = date('Y-m-d H:i:s');


    	$data = array(
                        'statuskonfirmasi'   => $status, 
                        'tglkonfirmasi'   => $tglkonfirmasi,
                        'idpenggunakonfirmasi'   => $idpengguna,
                        'keterangankonfirmasi'   => $keterangankonfirmasi,
                    );

        
        $simpan = $this->Konfirmasikelas_model->update($data, $idregistrasi, $status);

        if ($simpan) {

            $judul = $status.' - Pendaftaran Kelas Next Step';
            $rsRegistrasi = $this->db->query("select * from v_pendaftarankelas where idregistrasi='$idregistrasi'")->row();
            $idjadwalevent = $rsRegistrasi->idjadwalevent;
            $rsJadwal = $this->db->query("select * from v_jadwalevent where idjadwalevent='$idjadwalevent'")->row();
            $rowKelas = $this->db->query("select * from kelas where idkelas='$rsJadwal->idkelas'")->row();
            $namakelas = $rowKelas->namakelas;

            if ($status=='Disetujui') {
                $textemail = '
                    <h5>Selamat!!! Pendaftaran Kelas Next Step Anda Telah Disetujui</h5>
                      <p>Shalom Toni,</p>
                      <p>Kelas '.$namakelas.' akan dimulai pada tanggal '.tglindonesialengkap($rsJadwal->tglmulai).' sampai dengan tanggal '.tglindonesialengkap($rsJadwal->tglselesai).' pada jam '.date('H:i', strtotime($rsJadwal->tglmulai)).' WIB. Datanglah tepat waktu untuk mengikuti kelas ini. Apabila ada yang kurang jelas, anda dapat menghubungi staf admin di Gereja Elshaddai, Terimakasih</p>
                      <p>Tuhan Yesus Memberkati. </p>
                      <p><a href="https://myesc.id" target="_blank">myesc.id</a></p>
                ';
            }else{
                $textemail = '
                    <h5>Mohon Maaf!!! Pendaftaran Kelas Next Step Anda Ditolak</h5>
                      <p>Shalom Toni,</p>
                      <p>Pendaftaran Kelas '.$namakelas.' anda ditolak, adapun alasan penolakan anda sbb:</p>
                      <p>'.$rsRegistrasi->keterangankonfirmasi.' </p>
                      <p>Apabila ada yang kurang jelas, anda dapat menghubungi staf admin di Gereja Elshaddai, Terimakasih</p>
                      <p>Tuhan Yesus Memberkati. </p>
                      <p><a href="https://myesc.id">myesc.id</a></p>
                ';
            }   
            $this->App->sendEmailNextStep($rsRegistrasi->email, $judul, $textemail);
            // echo json_encode($textemail);

            echo json_encode(array('success' => true));
        }else{
            echo json_encode(array('msg' => "Data gagal disimpan."));
        }

    }
    
    public function get_edit_data()
    {
        $idregistrasi = $this->input->post('idregistrasi');
        $RsData = $this->Konfirmasikelas_model->get_by_id($idregistrasi)->row();

        $data = array( 
                            'idregistrasi'     =>  $RsData->idregistrasi,  
                            'tglregistrasi'     =>  $RsData->tglregistrasi,  
                            'tglsertifikat'     =>  $RsData->tglsertifikat,  
                            'idjemaat'     =>  $RsData->idjemaat,  
                            'idkelas'     =>  $RsData->idkelas,  
                            'nomorsertifikat'     =>  $RsData->nomorsertifikat,  
                            'linkurlsertifikat'     =>  $RsData->linkurlsertifikat,  
	                        );

        echo(json_encode($data));
    }


    public function cekStatusTerakhir()
    {
        $idregistrasi = $this->input->get('idregistrasi');
        $status = $this->db->query("select * from v_jadwaleventregistrasi where idregistrasi='$idregistrasi' ");
        $statuskonfirmasi = '';
        if ($status->num_rows()>0) {
            $statuskonfirmasi = $status->row()->statuskonfirmasi;
        }
        echo json_encode($statuskonfirmasi);
    }



}

/* End of file Konfirmasikelas.php */
/* Location: ./application/controllers/Konfirmasikelas.php */