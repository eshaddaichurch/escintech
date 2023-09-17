<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuanjadwal_model extends CI_Model {

	var $tabelview = 'v_jadwalevent';
    var $tabel     = 'jadwalevent';
    var $idjadwalevent = 'idjadwalevent';

    var $column_order = array(null, 'tglmulai', 'namaevent', 'jenisjadwal', 'statuskonfirmasi', null);
    var $column_search = array('tglmulai', 'namaevent', 'jenisjadwal', 'statuskonfirmasi');
    var $order = array('idjadwalevent' => 'desc'); // default order 


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get();        
    }

    private function _get_datatables_query()
    {   
        if ($this->session->userdata('idotorisasi')!='0000') {
            $this->db->where('idpengguna', $this->session->userdata('idjemaat'));
        }
        
        $this->db->from($this->tabelview);
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); 
            }
            $i++;
        }
        
        // -------------------------> Proses Order by        
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }

    function count_filtered()
    {
        $this->db->select('count(*) as jlh');
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->row()->jlh;
    }
 
    public function count_all()
    {
        $this->db->select('count(*) as jlh');
        return $this->db->get($this->tabelview)->row()->jlh;
    }

    public function get_all()
    {
        return $this->db->get($this->tabelview);
    }

    public function get_by_id($idjadwalevent)
    {
        $this->db->where('idjadwalevent', $idjadwalevent);
        // $this->db->where("tglmulai > '".date('Y-m-d')."' ");
        return $this->db->get($this->tabelview);
    }

    public function hapus($idjadwalevent)
    {

        try {
            
            $this->db->trans_begin();
            

            $this->db->query("delete from jadwaleventregistrasi where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailtanggal_2 where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailtanggal where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailpelayanan where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailinventaris where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailruangan where idjadwalevent='$idjadwalevent'");

            $this->db->query("delete from jadwaleventdetailparkiran where idjadwalevent='$idjadwalevent'");

            $this->db->where('idjadwalevent', $idjadwalevent);      
            $this->db->delete('jadwalevent');

            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return false;
            }else{
                    $this->db->trans_commit();
                    return true;
            }
            
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }

    }

    public function simpan($data)

    {    $this->db->where('idjadwalevent', $idjadwalevent);
        return $this->db->insert($this->tabel, $data);
    }

    public function simpanjadwalevent($arrayhead, $arrTempatWaktu, $arrPelayanan, $arrInventaris, $arrRuangan, $arrParkiran, $idjadwalevent)
    {
        try {
            
            $this->db->trans_begin();
            

            $this->db->insert('jadwalevent', $arrayhead);
            $this->db->query("delete from jadwaleventdetailtanggal where idjadwalevent='$idjadwalevent'");
            $this->db->insert_batch('jadwaleventdetailtanggal', $arrTempatWaktu);

            $this->db->query("delete from jadwaleventdetailpelayanan where idjadwalevent='$idjadwalevent'");
            $this->db->insert_batch('jadwaleventdetailpelayanan', $arrPelayanan);

            $this->db->query("delete from jadwaleventdetailinventaris where idjadwalevent='$idjadwalevent'");
            $this->db->insert_batch('jadwaleventdetailinventaris', $arrInventaris);

            $this->db->query("delete from jadwaleventdetailruangan where idjadwalevent='$idjadwalevent'");
            $this->db->insert_batch('jadwaleventdetailruangan', $arrRuangan);

            $this->db->query("delete from jadwaleventdetailparkiran where idjadwalevent='$idjadwalevent'");
            $this->db->insert_batch('jadwaleventdetailparkiran', $arrParkiran);

            
            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return false;
            }else{
                    $this->db->trans_commit();
                    return true;
            }


        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
    }


    public function updatejadwalevent($arrayhead, $arrTempatWaktu, $arrPelayanan, $arrInventaris, $arrRuangan, $arrParkiran, $idjadwalevent)
    {
        try {
            
            $this->db->trans_begin();
            
            $this->db->query("delete from jadwaleventdetailtanggal_2 where idjadwalevent='$idjadwalevent'");
            $this->db->query("delete from jadwaleventdetailtanggal where idjadwalevent='$idjadwalevent'");
            $this->db->query("delete from jadwaleventdetailpelayanan where idjadwalevent='$idjadwalevent'");
            $this->db->query("delete from jadwaleventdetailinventaris where idjadwalevent='$idjadwalevent'");
            $this->db->query("delete from jadwaleventdetailruangan where idjadwalevent='$idjadwalevent'");
            $this->db->query("delete from jadwaleventdetailparkiran where idjadwalevent='$idjadwalevent'");


            $this->db->where('idjadwalevent', $idjadwalevent);
            $this->db->update('jadwalevent', $arrayhead);


            $this->db->insert_batch('jadwaleventdetailtanggal', $arrTempatWaktu);
            $this->db->insert_batch('jadwaleventdetailpelayanan', $arrPelayanan);
            $this->db->insert_batch('jadwaleventdetailinventaris', $arrInventaris);
            $this->db->insert_batch('jadwaleventdetailruangan', $arrRuangan);
            $this->db->insert_batch('jadwaleventdetailparkiran', $arrParkiran);

            
            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return false;
            }else{
                    $this->db->trans_commit();
                    return true;
            }


        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function extractTanggalJadwal($idjadwalevent)
    {
        try {

            $this->db->trans_begin();
            $rsJadwalTanggal = $this->db->query("
                select * from jadwaleventdetailtanggal where idjadwalevent='$idjadwalevent'
            ");

            if ($rsJadwalTanggal->num_rows()>0) {
                $arrTanggalExtract = array();

                foreach ($rsJadwalTanggal->result() as $row) {


                    if ($row->tgljadwaleventmulai==$row->tgljadwaleventselesai) {
                        //jadwal nya hanya 1 kali saja
                        array_push($arrTanggalExtract, array(
                                                    'idjadwaleventdetail' => $row->idjadwaleventdetail, 
                                                    'idjadwalevent' => $row->idjadwalevent, 
                                                    'tgljadwal' => $row->tgljadwaleventmulai, 
                                                    'jammulai' => $row->jammulai, 
                                                    'jamselesai' => $row->jamselesai, 
                                                ));
                    }else{
                        //jadwal nya berulang perminggu ataupun perhari
                        if ($row->diulangsetiapminggu=='Ya') {
                            $tgljadwal = date('Y-m-d', strtotime($row->tgljadwaleventmulai));

                            while ( $tgljadwal <= $row->tgljadwaleventselesai) {
                                //diulang perminggu
                                array_push($arrTanggalExtract, array(
                                                    'idjadwaleventdetail' => $row->idjadwaleventdetail, 
                                                    'idjadwalevent' => $row->idjadwalevent, 
                                                    'tgljadwal' => $tgljadwal, 
                                                    'jammulai' => $row->jammulai, 
                                                    'jamselesai' => $row->jamselesai, 
                                                ));
                                $tgljadwal = date('Y-m-d', strtotime($tgljadwal . ' +7 day'));
                            }
                        }else{
                            $tgljadwal = date('Y-m-d', strtotime($row->tgljadwaleventmulai));

                            while ( $tgljadwal <= $row->tgljadwaleventselesai) {
                                //diulang perhari
                                array_push($arrTanggalExtract, array(
                                                    'idjadwaleventdetail' => $row->idjadwaleventdetail, 
                                                    'idjadwalevent' => $row->idjadwalevent, 
                                                    'tgljadwal' => $tgljadwal, 
                                                    'jammulai' => $row->jammulai, 
                                                    'jamselesai' => $row->jamselesai, 
                                                ));
                                $tgljadwal = date('Y-m-d', strtotime($tgljadwal . ' +1 day'));
                            }
                        }
                    }
                }

                $this->db->insert_batch('jadwaleventdetailtanggal_2', $arrTanggalExtract);
            }else{
                $this->db->trans_rollback();
                return false;
            }
            
            if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                    return false;
            }else{
                    $this->db->trans_commit();
                    return true;
            }
        } catch (Exception $e) {
            $this->db->trans_rollback();
            return false;
        }
        
    }

    public function update($data, $idjadwalevent)
    {
        $this->db->where('idjadwalevent', $idjadwalevent);
        return $this->db->update($this->tabel, $data);
    }


}

/* End of file Pengajuanjadwal_model.php */
/* Location: ./application/models/Pengajuanjadwal_model.php */