<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->islogin($this->encrypt->encode('gallery'));
        $this->load->model('Gallery_model');
        $this->session->set_userdata('IDMENUSELECTED', '0008');
        $this->cekOtorisasi();
    }

    public function index()
    {
        $data['rsgallery'] = $this->db->query("select * from gallery order by idgallery");
        $data['menu'] = 'gallery';
        $this->load->view('gallery/listdata', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'gallery';
        $this->load->view('gallery/form', $data);
    }

    public function delete($idgallery)
    {
        $idgallery = $this->encrypt->decode($idgallery);
        $rsdata   = $this->Gallery_model->get_by_id($idgallery);
        if ($rsdata->num_rows() < 1) {
            $pesan = '<script>swal("Upps!", "Data tidak ditemukan!", "error");</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('gallery');
            exit();
        };

        $hapus = $this->Gallery_model->hapus($idgallery);
        if ($hapus) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil dihapus!", "success");</script>';
        } else {
            $eror = $this->db->error();
            if ($eror['code'] == '1451') {
                $pesan = '<script>swal("Gagal!", "Data gagal dihapus karena sudah digunakan!", "error");</script>';
            } else {
                $pesan = '<script>swal("Gagal!", "Data gagal dihapus! Pesan Eror : ' . $eror['code'] . ' ' . $eror['message'] . '", "error");</script>';
            }
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('gallery');
    }

    public function simpan()
    {
        $judulgambar = $this->input->post('judulgambar');
        $foto     = $this->App->uploadImage($_FILES, "filegallery", "", "galery");

        if (empty($judulgambar)) {
            $pesan = '<script>swal("Gagal!", "Judul gambar tidak boleh kosong!", "error");</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('gallery');
        }

        if (empty($foto)) {
            $pesan = '<script>swal("Gagal!", "Gambar gallery harus dipilih!", "error");</script>';
            $this->session->set_flashdata('pesan', $pesan);
            redirect('gallery');
        }

        $data = array(
            'judulgambar'         => $judulgambar,
            'filegallery'         => $foto,
            'deskripsi' => null,
        );
        $simpan = $this->Gallery_model->simpan($data);

        if ($simpan) {
            $pesan = '<script>swal("Berhasil!", "Data berhasil disimpan!", "success");</script>';
        } else {
            $eror = $this->db->error();
            $pesan = '<script>swal("Gagal!", "Data gagal disimpan! Pesan Eror : ' . $error['code'] . ' ' . $error['message'] . '", "error");</script>';
        }

        $this->session->set_flashdata('pesan', $pesan);
        redirect('gallery');
    }

    public function updatestatus()
    {
        $idgallery = $this->input->post('idgallery');
        $tampildifront = $this->input->post('tampildifront');

        $data = array(
            'idgallery' => $idgallery,
            'tampildifront' => $tampildifront,
        );
        $this->Gallery_model->update($data, $idgallery);
        echo json_encode(array('success' => true));
    }
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */