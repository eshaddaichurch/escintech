
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api_dc extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    //Menampilkan data kontak
    function index_get() {
        $iddc = $this->get('iddc');
        if ($iddc == '') {
            $dc = $this->db->get('v_disciplescommunity');
        } else {
            $this->db->where('iddc', $iddc);
            $dc = $this->db->get('v_disciplescommunity');
        } 
        if ($dc->num_rows()>0) {
            $dcArr = array();
            foreach ($dc->result() as $row) {
                array_push($dcArr, array(
                                                'iddc'   => $row->iddc, 
                                                'namadc'   => $row->namadc, 
                                                'kategoridc'   => $row->kategoridc, 
                                                'haridc'   => $row->haridc, 
                                                'jamdc'   => $row->jamdc, 
                                                'alamatdc'   => $row->alamatdc, 
                                                'fotodc'   => base_url('uploads/dc/'.$row->fotodc), 
                                                'statusaktif'   => $row->statusaktif, 
                                                'idjemaatdm' => $row->idjemaatdm,
                                                'namadm' => $row->namadm,
                                                'tanggallahirdm' => $row->tanggallahirdm,
                                                'jeniskelamindm' => $row->jeniskelamindm,
                                                'notelpdm' => $row->notelpdm,
                                                
                ));
            }
        }

        $this->response($dcArr, 200);
    }

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'iddc' => $this->post('iddc'),
                    'namadc' => $this->post('namadc'),
                    'kategoridc' => $this->post('kategoridc'),
                    'haridc' => $this->post('haridc'),
                    'jamdc' => $this->post('jamdc'),
                    'alamatdc' => $this->post('alamatdc'),
                    'fotodc' => $this->post('fotodc'),
                    'tanggalinsert' => $this->post('tanggalinsert'),
                    'tanggalupdate' => $this->post('tanggalupdate'),
                    'statusaktif' => $this->post('statusaktif'),
                    'idjemaatdm' => $this->post('status'));
        $insert = $this->db->insert('v_disciplescommunity', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'iddc' => $this->post('iddc'),
                    'namadc' => $this->post('namadc'),
                    'kategoridc' => $this->post('judul'),
                    'haridc' => $this->post('tanggal'),
                    'jamdc' => $this->post('jamdc'),
                    'alamatdc' => $this->post('alamatdc'),
                    'fotodc' => $this->post('fotodc'),
                    'tanggalinsert' => $this->post('tanggalinsert'),
                    'tanggalupdate' => $this->post('tanggalupdate'),
                    'statusaktif' => $this->post('statusaktif'),

                    'idjemaatdm' => $this->post('status'));
        $this->db->where('id', $id);
        $update = $this->db->update('v_disciplescommunity', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('v_disciplescommunity');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Masukan function selanjutnya disini
}
?>