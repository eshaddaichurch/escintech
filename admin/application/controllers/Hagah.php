<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hagah extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->islogin();
        $this->load->model('Hagah_model');
        $this->session->set_userdata( 'IDMENUSELECTED', 'M600' );
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['menu'] = 'hagah';
        $this->load->view('hagah/listdata', $data);
    }   

    public function tambah()
    {       
        $data['idhagah'] = '';        
        $data['menu'] = 'hagah';  
        $this->load->view('hagah/form', $data);
    }

    public function edit($idhagah)
    {       
        $idhagah = $this->encrypt->decode($idhagah);

        if ($this->Hagah_model->get_by_id($idhagah)->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('hagah');
            exit();
        };
        $data['idhagah'] =$idhagah;        
        $data['menu'] = 'hagah';
        $this->load->view('hagah/form', $data);
    }

    public function datatablesource()
    {
        $RsData = $this->Hagah_model->get_datatables();
        $no = $_POST['start'];
        $data = array();

        if ($RsData->num_rows()>0) {
            foreach ($RsData->result() as $rowdata) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $rowdata->tahun;
                $row[] = $rowdata->bulan.' - '.bulan($rowdata->bulan);
                $row[] = $rowdata->kitabawal.' '.$rowdata->pasalawal.' s/d '.$rowdata->kitabakhir.' '.$rowdata->pasalakhir;
                $row[] = '<a href="'.site_url( 'hagah/edit/'.$this->encrypt->encode($rowdata->idhagah) ).'" class="btn btn-sm btn-warning btn-circle"><i class="fa fa-edit"></i></a> | 
                        <a href="'.site_url('hagah/delete/'.$this->encrypt->encode($rowdata->idhagah) ).'" class="btn btn-sm btn-danger btn-circle" id="hapus"><i class="fa fa-trash"></i></a>';
                $data[] = $row;
            }
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Hagah_model->count_all(),
                        "recordsFiltered" => $this->Hagah_model->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function delete($idhagah)
    {
        $idhagah = $this->encrypt->decode($idhagah);  
        $rsdata = $this->Hagah_model->get_by_id($idhagah);
        if ($rsdata->num_rows()<1) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Ilegal!</strong> Data tidak ditemukan! 
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('hagah');
            exit();
        };

        $hapus = $this->Hagah_model->hapus($idhagah);
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
        redirect('hagah');        

    }

    public function simpanperbulan()
    {
        $idhagah = $this->input->post('idhagah');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $tglHagah = $this->input->post('tglHagah');
        $tglinsert = date('Y-m-d H:i:s');
        $arrDetail = array();

        $i=1;
        $kitabawal = '';
        $kitabakhir = '';

        if (empty($idhagah)) {
            
            $idhagah = substr($tahun,2,2).replwzero($bulan,2);
            if ($this->Hagah_model->get_by_id($idhagah)->num_rows()>0) {
                $pesan = '<div>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <strong>'.bulan($bulan).' '.$tahun.'!</strong> Data hagah bulan ini sudah ada! 
                            </div>
                        </div>';
                $this->session->set_flashdata('pesan', $pesan);
                redirect('hagah');
                exit();
            };


            foreach ($tglHagah as $value) {
                if ($i==1) {
                    $kitabawal = $this->input->post('namakitab'.$i);
                    $pasalawal = $this->input->post('pasalmulai'.$i);
                }

                if ($i==count($tglHagah)) {
                    $kitabakhir = $this->input->post('sdnamakitab'.$i);
                    $pasalakhir = $this->input->post('sdpasalakhir'.$i);
                }

                array_push($arrDetail, array(
                                            'idhagah' => $idhagah, 
                                            'tglHagah' => date('Y-m-d', strtotime($value)), 
                                            'namakitab' => $this->input->post('namakitab'.$i), 
                                            'pasal1' => $this->input->post('pasalmulai'.$i), 
                                            'pasal2' => $this->input->post('pasalakhir'.$i), 
                                            'sdnamakitab' => $this->input->post('sdnamakitab'.$i), 
                                            'sdpasal1' => $this->input->post('sdpasalmulai'.$i), 
                                            'sdpasal2' => $this->input->post('sdpasalakhir'.$i), 
                                        ));
                $i++;
            }

            $arrHeader = array(
                                'idhagah' => $idhagah, 
                                'tahun' => $tahun, 
                                'bulan' => $bulan, 
                                'kitabawal' => $kitabawal, 
                                'pasalawal' => $pasalawal, 
                                'kitabakhir' => $kitabakhir, 
                                'pasalakhir' => $pasalakhir, 
                                'tglinsert' => $tglinsert, 
                                'tglupdate' => $tglinsert, 
                            );

            $simpan = $this->Hagah_model->simpan($arrHeader, $arrDetail, $idhagah);      
        }else{

            foreach ($tglHagah as $value) {
                if ($i==1) {
                    $kitabawal = $this->input->post('namakitab'.$i);
                    $pasalawal = $this->input->post('pasalmulai'.$i);
                }

                if ($i==count($tglHagah)) {
                    $kitabakhir = $this->input->post('sdnamakitab'.$i);
                    $pasalakhir = $this->input->post('sdpasalakhir'.$i);
                }

                array_push($arrDetail, array(
                                            'idhagah' => $idhagah, 
                                            'tglHagah' => date('Y-m-d', strtotime($value)), 
                                            'namakitab' => $this->input->post('namakitab'.$i), 
                                            'pasal1' => $this->input->post('pasalmulai'.$i), 
                                            'pasal2' => $this->input->post('pasalakhir'.$i), 
                                            'sdnamakitab' => $this->input->post('sdnamakitab'.$i), 
                                            'sdpasal1' => $this->input->post('sdpasalmulai'.$i), 
                                            'sdpasal2' => $this->input->post('sdpasalakhir'.$i), 
                                        ));
                $i++;
            }

            $arrHeader = array(
                                'kitabawal' => $kitabawal, 
                                'pasalawal' => $pasalawal, 
                                'kitabakhir' => $kitabakhir, 
                                'pasalakhir' => $pasalakhir, 
                                'tglupdate' => $tglinsert, 
                            );
            // var_dump($arrDetail);
            // exit();
            $simpan = $this->Hagah_model->update($arrHeader, $arrDetail, $idhagah);      
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
        redirect('hagah');
    }
    
    public function get_edit_data()
    {
        $idhagah = $this->input->post('idhagah');
        $RsData = $this->Hagah_model->get_by_id($idhagah)->row();
        $dataHeader = array( 
                            'idhagah'     =>  $RsData->idhagah,  
                            'tahun'     =>  $RsData->tahun,  
                            'bulan'     =>  $RsData->bulan,  
                        );

        $RsDetail = $this->db->query("select * from hagah_detail where idhagah='$idhagah' order by tglhagah");

        echo(json_encode( array('dataHeader' => $dataHeader, 'dataDetail' => $RsDetail->result())));
    }



}

/* End of file Hagah.php */
/* Location: ./application/controllers/Hagah.php */