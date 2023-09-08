<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontmenus extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->islogin();
        $this->load->model('Frontmenus_model');
        $this->load->model('Pages_model');
        $this->load->model('Pageskategori_model');
        $this->session->set_userdata( 'IDMENUSELECTED', '0005' );
        $this->cekOtorisasi();
	}

	public function index()
	{
		$data['menu'] = 'frontmenus';
        $this->load->view('frontmenus/listdata', $data);
	}

    public function simpan()
    {
        $idmenu = $this->input->post('idmenu');
        $parentidmenu = $this->input->post('parentidmenu');
        $namamenu = $this->input->post('namamenu');
        $jenismenu = $this->input->post('jenismenu');
        $idpages = $this->input->post('idpages');
        $idpageskategori = $this->input->post('idpageskategori');
        $linkmenu = $this->input->post('linkmenu');
        $openinnewtab = $this->input->post('openinnewtab');
        $tanggalinsert = date('Y-m-d H:i:s');
        $tanggalupdate = date('Y-m-d H:i:s');

        if ($parentidmenu==$idmenu && $idmenu!="") {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Parent Menu Salah!</strong> Parent menu salah!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }

        if ($parentidmenu!="") {
            $levels = $this->Frontmenus_model->get_by_id($parentidmenu)->row()->levels;
            $levels++;
            $nomorurut = $this->Frontmenus_model->get_nomor_urut_berikut($parentidmenu);
        }else{
            $levels = 1;
            $nomorurut = $this->Frontmenus_model->get_nomor_urut_berikut();
        }


        if ($parentidmenu=="") {
            $parentidmenu = NULL;
        }

        if ($idpages=="") {
            $idpages = NULL;
        }

        switch ($jenismenu) {
            case 'Page Link':
                $linkmenu = NULL;
                $idpageskategori = NULL;
                break;
            case 'Kategori Link':
                $linkmenu = NULL;
                $idpages = NULL;
                break;
            case 'Url Link':
                $idpages = NULL;
                $idpageskategori = NULL;
                break;
            default:
                $linkmenu = NULL;
                $idpages = NULL;
                $openinnewtab = NULL;
                break;
        }


        if (empty($idmenu)) {
            $idmenu = $this->db->query("select create_idmenu('$namamenu') as idmenu")->row()->idmenu;


            $data = array(
                            'idmenu' => $idmenu, 
                            'parentidmenu' => $parentidmenu, 
                            'namamenu' => $namamenu, 
                            'jenismenu' => $jenismenu, 
                            'idpages' => $idpages, 
                            'idpageskategori' => $idpageskategori, 
                            'linkmenu' => $linkmenu, 
                            'openinnewtab' => $openinnewtab, 
                            'statusaktif' => 'Aktif', 
                            'tanggalinsert' => $tanggalinsert, 
                            'tanggalupdate' => $tanggalupdate, 
                            'sysmenu' => 0, 
                            'levels' => $levels, 
                            'nomorurut' => $nomorurut, 
                        );
            $simpan = $this->Frontmenus_model->simpan($data, $nomorurut);
        }else{

            $rowmenu = $this->Frontmenus_model->get_by_id($idmenu)->row();
            if ($rowmenu->parentidmenu==$parentidmenu) {
                $nomorurut = $rowmenu->nomorurut;
            }
            
            $data = array(
                            'idmenu' => $idmenu, 
                            'parentidmenu' => $parentidmenu, 
                            'namamenu' => $namamenu, 
                            'jenismenu' => $jenismenu, 
                            'idpages' => $idpages, 
                            'idpageskategori' => $idpageskategori, 
                            'linkmenu' => $linkmenu, 
                            'openinnewtab' => $openinnewtab, 
                            'statusaktif' => 'Aktif', 
                            'tanggalupdate' => $tanggalupdate, 
                            'levels' => $levels, 
                            'nomorurut' => $nomorurut, 
                        );
            $simpan = $this->Frontmenus_model->update($data, $idmenu, $nomorurut);

        }

        // var_dump($data);
        // exit();

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
        redirect('frontmenus');   
    }

    public function hapus($idmenu)
    {
        $idmenu = $this->encrypt->decode($idmenu);
        if ($this->Frontmenus_model->get_by_id($idmenu)->num_rows()==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Illegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }

        $hapus = $this->Frontmenus_model->hapus($idmenu);
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
                            <strong>Gagal!</strong> Data gagal dihapus! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('frontmenus'); 
    }
    public function getubahmenu()
    {
        $idmenu = $this->input->get('idmenu');
        $rowmenu = $this->Frontmenus_model->get_by_id($idmenu)->row();
        echo json_encode($rowmenu);
    }

    public function pindahkeatas($idmenu)
    {
        $idmenu = $this->encrypt->decode($idmenu);
        if ($this->Frontmenus_model->get_by_id($idmenu)->num_rows()==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Illegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }


        $rowmenu = $this->db->query("select * from frontmenus where idmenu='$idmenu'")->row();
        $nomorurut = $rowmenu->nomorurut;
        $parentidmenu = $rowmenu->parentidmenu;
        $levels = $rowmenu->levels;

        if (!empty($parentidmenu)) {
            $jumlahrow = $this->db->query("select count(*) as jumlahrow from frontmenus where parentidmenu='$parentidmenu' and nomorurut<$nomorurut")->row()->jumlahrow;
        }else{
            $jumlahrow = $this->db->query("select count(*) as jumlahrow from frontmenus where nomorurut<$nomorurut and levels=$levels")->row()->jumlahrow;
        }

        if ($jumlahrow==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal Pindah Menu!</strong> Menu sudah posisi paling atas!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }


        $pindah = $this->Frontmenus_model->pindahkeatas($idmenu, $rowmenu);
        if ($pindah) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dipindah!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dipindah! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('frontmenus');
    }


    public function pindahkebawah($idmenu)
    {
        $idmenu = $this->encrypt->decode($idmenu);
        if ($this->Frontmenus_model->get_by_id($idmenu)->num_rows()==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Illegal!</strong> Data tidak ditemukan!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }


        $rowmenu = $this->db->query("select * from frontmenus where idmenu='$idmenu'")->row();
        $nomorurut = $rowmenu->nomorurut;
        $parentidmenu = $rowmenu->parentidmenu;
        $levels = $rowmenu->levels;

        if (!empty($parentidmenu)) {
            $jumlahrow = $this->db->query("select count(*) as jumlahrow from frontmenus where parentidmenu='$parentidmenu' and nomorurut>$nomorurut")->row()->jumlahrow;
        }else{
            $jumlahrow = $this->db->query("select count(*) as jumlahrow from frontmenus where nomorurut>$nomorurut and levels=$levels")->row()->jumlahrow;
        }

        if ($jumlahrow==0) {
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal Pindah Menu!</strong> Menu sudah posisi paling bawah!
                        </div>
                    </div>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('frontmenus');
        }


        $pindah = $this->Frontmenus_model->pindahkebawah($idmenu, $rowmenu);
        if ($pindah) {
            $pesan = '<div>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Berhasil!</strong> Data berhasil dipindah!
                        </div>
                    </div>';
        }else{
            $eror = $this->db->error();         
            $pesan = '<div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <strong>Gagal!</strong> Data gagal dipindah! <br>
                            Pesan Error : '.$eror['code'].' '.$eror['message'].'
                        </div>
                    </div>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('frontmenus');
    }

}

/* End of file Frontmenus.php */
/* Location: ./application/controllers/Frontmenus.php */