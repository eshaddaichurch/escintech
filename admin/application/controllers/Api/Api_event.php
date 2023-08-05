
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api_event extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    //Menampilkan data kontak
    function index_get() {
      


        $idjadwalevent = $this->get('idjadwalevent');
        if ($idjadwalevent == '') {
            // $nt = $this->db->get('v_jadwalevent');
            $nt = $this->db->get_where("v_jadwalevent", array('statuskonfirmasi'=>'Disetujui','diumumkankejemaat'=>'Ya'));
            // $nt = $this->db->row("jenisjadwal", array('Doa Bersama', 'Ibadah Jemaat'));
           
           
            
        } else {
            
            
            // $this->db->get_where("v_jadwalevent", array('jenisjadwal'=>'Kelas Next Step'));
            // $this->db->where("tglmulai<'".date(Y-m-l)."'");
           
        }

            if ($nt->num_rows()>0) {
                $ntArr = array();
                foreach ($nt->result() as $row) {
                    array_push($ntArr, array(
                        'idjadwalevent'   => $row->idjadwalevent, 
                        'namaevent'   => $row->namaevent, 
                        'gambarsampul'   =>  base_url('uploads/jadwalevent/'.$row->gambarsampul), 
                        'deskripsi'   => $row->deskripsi, 
                        'jenisjadwal'   => $row->jenisjadwal, 
                        'konseppengumuman'   => $row->konseppengumuman, 
                        'namadepartement'   => $row->namadepartement, 
                        'tglmulai'   => $row->tglmulai, 
                       

                                                   
                                                    
                    ));
                }
            
            
        }

        $this->response($ntArr, 200);
    }

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'idjadwalevent' => $this->post('idjadwalevent'),
                    'namaevent' => $this->post('namaevent'),
                    'deskripsi' => $this->post('deskripsi'),
                    'jenisjadwal' => $this->post('jenisjadwal'),
                    'konseppengumuman' => $this->post('konseppengumuman'),
                    'namadepartement' => $this->post('namadepartement'),
                    'tglmulai' => $this->post('tglmulai'));
                    
        $insert = $this->db->insert('v_jadwalevent', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $idjadwalevent = $this->put('id');
        $data = array(
            'idjadwalevent' => $this->post('idjadwalevent'),
            'namaevent' => $this->post('namaevent'),
            'deskripsi' => $this->post('deskripsi'),
            'jenisjadwal' => $this->post('jenisjadwal'),
            'konseppengumuman' => $this->post('konseppengumuman'),
            'namadepartement' => $this->post('namadepartement'),
            'tglmulai' => $this->post('tglmulai'));
        $this->db->where('idjadwalevent', $idjadwalevent);
        $update = $this->db->update('v_jadwalevent', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('idjadwalevent');
        $this->db->where('id', $id);
        $delete = $this->db->delete('v_jadwalevent');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Masukan function selanjutnya disini
}
?>