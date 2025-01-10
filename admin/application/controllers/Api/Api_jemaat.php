
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Api_jemaat extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    //Menampilkan data kontak
    function index_get() {
        $idjemaat = $this->get('idjemaat');
        if ($idjemaat == '') {
            $jemaat = $this->db->get('v_jemaat');
        } else {
            $this->db->where('idjemaat', $idjemaat);
            $jemaat = $this->db->get('v_jemaat');
        } 
        if ($jemaat->num_rows()>0) {
            $jemaatArr = array();
            foreach ($jemaat->result() as $row) {
                array_push($jemaatArr, array(
                                                'idjemaat'   => $row->idjemaat, 
                                                'noaj'   => $row->noaj, 
                                                // 'nik'   => $row->nik, 
                                                'kewarganegaraan'   => $row->kewarganegaraan, 
                                                'namalengkap'   => $row->namalengkap, 
                                                'namapanggilan'   => $row->namapanggilan, 
                                                'foto'   => base_url('uploads/dc/'.$row->foto), 
                                                'tempatlahir'   => $row->tempatlahir, 
                                                'tanggallahir' => $row->tanggallahir,
                                                'jeniskelamin' => $row->jeniskelamin,
                                                'statuspernikahan' => $row->statuspernikahan,
                                                // 'golongandarah' => $row->golongandarah,
                                                'notelp' => $row->notelp,
                                                'nohp' => $row->nohp,
                                                'email' => $row->email,
                                                // 'facebook' => $row->facebook,
                                                // 'instagram' => $row->instagram,
                                                'namadarurat' => $row->namadarurat,
                                                // 'hubungan' => $row->hubungan,
                                                'notelpdarurat' => $row->notelpdarurat,
                                                // 'pendidikanterakhir' => $row->pendidikanterakhir,
                                                'namasekolah' => $row->namasekolah,
                                                // 'pekerjaan' => $row->pekerjaan,
                                                // 'namaperusahaan' => $row->namaperusahaan,
                                                // 'sektorindustri' => $row->sektorindustri,
                                                // 'alamatkantor' => $row->alamatkantor,
                                                // 'notelpkantor' => $row->notelpkantor,
                                                'alamatrumah' => $row->alamatrumah,
                                                'rtrw' => $row->rtrw,
                                                'kelurahan' => $row->kelurahan,
                                                'kecamatan' => $row->kecamatan,
                                                'kotakabupaten' => $row->kotakabupaten,
                                                'propinsi' => $row->propinsi,
                                                'kodepos' => $row->kodepos,
                                                'username' => $row->username,
                                                'password' => $row->password,
                                                'statusjemaat' => $row->statusjemaat,
                                                'namadc' => $row->namadc,
                                              
                                                
                ));
            }
        }

        $this->response($jemaatArr, 200);
    }

    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'idjemaat' => $this->post('idjemaat'),
                    'noaj' => $this->post('noaj'),
                    'nik' => $this->post('nik'),
                    'kewarganegaraan' => $this->post('kewarganegaraan'),
                    'namalengkap' => $this->post('namalengkap'),
                    'namapanggilan' => $this->post('namapanggilan'),
                    'foto' => $this->post('foto'),
                    'tempatlahir' => $this->post('tempatlahir'),
                    'tanggallahir' => $this->post('tanggallahir'),
                    'jeniskelamin' => $this->post('jeniskelamin'),
                    'statuspernikahan' => $this->post('statuspernikahan'),
                    'golongandarah' => $this->post('golongandarah'),
                    'notelp' => $this->post('notelp'),
                    'nohp' => $this->post('nohp'),
                    'email' => $this->post('email'),
                    'facebook' => $this->post('facebook'),
                    'instagram' => $this->post('instagram'),
                    'namadarurat' => $this->post('namadarurat'),
                    'hubungan' => $this->post('hubungan'),
                    'notelpdarurat' => $this->post('notelpdarurat'),
                    'pendidikanterakhir' => $this->post('pendidikanterakhir'),
                    'namaperusahaan' => $this->post('namaperusahaan'),
                    'sektorindustri' => $this->post('sektorindustri'),
                    'alamatkantor' => $this->post('alamatkantor'),
                    'notelpkantor' => $this->post('notelpkantor'),
                    'alamatrumah' => $this->post('alamatrumah'),
                    'pekerjaan' => $this->post('pekerjaan'),
                    'rtrw' => $this->post('rtrw'),
                    'kelurahan' => $this->post('kelurahan'),
                    'kecamatan' => $this->post('kecamatan'),
                    'kotakabupaten' => $this->post('kotakabupaten'),
                    'propinsi' => $this->post('propinsi'),
                    'kodepos' => $this->post('kodepos'),
                    'username' => $this->post('username'),
                    'password' => $this->post('password'),
                    'namadc' => $this->post('namadc'),
                    'statusjemaat' => $this->post('statusjemaat'));
        $insert = $this->db->insert('v_jemaat', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    function index_put() {
        $idjemaat = $this->put('idjemaat');
        $data = array(
            'idjemaat' => $this->post('idjemaat'),
            'noaj' => $this->post('noaj'),
            'nik' => $this->post('nik'),
            'kewarganegaraan' => $this->post('kewarganegaraan'),
            'namalengkap' => $this->post('namalengkap'),
            'namapanggilan' => $this->post('namapanggilan'),
            'foto' => $this->post('foto'),
            'tempatlahir' => $this->post('tempatlahir'),
            'tanggallahir' => $this->post('tanggallahir'),
            'jeniskelamin' => $this->post('jeniskelamin'),
            'statuspernikahan' => $this->post('statuspernikahan'),
            'golongandarah' => $this->post('golongandarah'),
            'notelp' => $this->post('notelp'),
            'nohp' => $this->post('nohp'),
            'email' => $this->post('email'),
            'facebook' => $this->post('facebook'),
            'instagram' => $this->post('instagram'),
            'namadarurat' => $this->post('namadarurat'),
            'hubungan' => $this->post('hubungan'),
            'notelpdarurat' => $this->post('notelpdarurat'),
            'pendidikanterakhir' => $this->post('pendidikanterakhir'),
            'namaperusahaan' => $this->post('namaperusahaan'),
            'sektorindustri' => $this->post('sektorindustri'),
            'alamatkantor' => $this->post('alamatkantor'),
            'notelpkantor' => $this->post('notelpkantor'),
            'alamatrumah' => $this->post('alamatrumah'),
            'pekerjaan' => $this->post('pekerjaan'),
            'rtrw' => $this->post('rtrw'),
            'kelurahan' => $this->post('kelurahan'),
            'kecamatan' => $this->post('kecamatan'),
            'kotakabupaten' => $this->post('kotakabupaten'),
            'propinsi' => $this->post('propinsi'),
            'kodepos' => $this->post('kodepos'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'namadc' => $this->post('namadc'),
            'statusjemaat' => $this->post('statusjemaat'));
        $this->db->where('id', $idjemaat);
        $update = $this->db->update('v_jemaat', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete() {
        $idjemmaat = $this->delete('idjemmaat');
        $this->db->where('idjemmaat', $idjemmaat);
        $delete = $this->db->delete('v_jemaat');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Masukan function selanjutnya disini
}
?>