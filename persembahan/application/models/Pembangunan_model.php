<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembangunan_model extends CI_Model {

    var $tabelview = 'pembangunan';
    var $tabel     = 'pembangunan';
    // var $iddcmember = 'iddcmember';

    var $column_order = array(null,'nama', 'alamat', 'telepon','jumlah','tunai','atm', 'giro',null);
    var $column_search = array('nama', 'alamat', 'telepon','jumlah','tunai','atm', 'giro');
    var $order = array('nama' => 'desc'); // default order 


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get();
    }
    

    private function _get_datatables_query()
    {
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

    // public function get_all($statusjemaat="")
    // {
    //     if ($statusjemaat!="") {
    //         $this->db->where("statusjemaat", $statusjemaat);
    //     }
    //     return $this->db->get($this->tabelview);
    // }

    // public function get_by_id($idjemaat)
    // {
    //     $this->db->where('idjemaat', $idjemaat);
    //     return $this->db->get($this->tabelview);
    // }

    // public function hapus($idjemaat)
    // {
    //     $this->db->where('idjemaat', $idjemaat);      
    //     return $this->db->delete($this->tabel);
    // }

    // public function simpan($data)
    // {       
    //     $this->db->trans_begin();
    //     $this->db->insert($this->tabel, $data);

    //     $nokaj = $this->db->query("SELECT create_nokaj() as nokaj")->row()->nokaj;

    //     $dataFamily = array(
    //                         'nokaj' => $nokaj, 
    //                         'idjemaat' => $data['idjemaat'], 
    //                         'idhubunganfamily' => 'A01', 
    //                         'tglinsert' => date('Y-m-d H:i:s'),
    //                         'tglupdate' => date('Y-m-d H:i:s'),
    //                     );
    //     $this->db->insert('jemaatfamily', $dataFamily);

    //     if ($this->db->trans_status() === FALSE){
    //         $this->db->trans_rollback();
    //         return false;
    //     }else{
    //         $this->db->trans_commit();
    //         return true;
    //     }
    // }

    // public function update($data, $idjemaat)
    // {
    //     $this->db->trans_begin();

    //     $this->db->where('idjemaat', $idjemaat);
    //     $this->db->update($this->tabel, $data);


    //     if ($data['statusjemaat']=='Jemaat' || $data['statusjemaat']=='' ) {
            
    //         $cekKeluarga = $this->db->query("select count(*) as cekKeluarga from jemaatfamily where idjemaat='".$idjemaat."'")->row()->cekKeluarga;
    //         if ($cekKeluarga==0) {
    //             $nokaj = $this->db->query("SELECT create_nokaj() as nokaj")->row()->nokaj;
    //             $dataFamily = array(
    //                                 'nokaj' => $nokaj, 
    //                                 'idjemaat' => $idjemaat, 
    //                                 'idhubunganfamily' => 'A01', 
    //                                 'tglinsert' => date('Y-m-d H:i:s'),
    //                                 'tglupdate' => date('Y-m-d H:i:s'),
    //                             );
    //             $this->db->insert('jemaatfamily', $dataFamily);
    //         }

    //     }


    //     if ($this->db->trans_status() === FALSE){
    //         $this->db->trans_rollback();
    //         return false;
    //     }else{
    //         $this->db->trans_commit();
    //         return true;
    //     }

    // }

    // public function simpanubahkeluarga($idjemaat, $idjemaatfamily, $idhubunganfamily)
    // {
    //     $this->db->trans_begin();
    //         // =====================================

    //         $noKeluarga = $this->db->query("select nokaj from jemaatfamily where idjemaat='".$idjemaat."'")->row()->nokaj;


    //         $this->db->query("delete from jemaatfamily where idjemaat='".$idjemaatfamily."'");

    //         $dataJemaatFamilyBaru = array(
    //                                         'nokaj' => $noKeluarga, 
    //                                         'idjemaat' => $idjemaatfamily, 
    //                                         'idhubunganfamily' => $idhubunganfamily, 
    //                                         'tglinsert' => date('Y-m-d H:i:s'), 
    //                                         'tglupdate' => date('Y-m-d H:i:s'), 
    //                                     );
    //         $this->db->insert('jemaatfamily', $dataJemaatFamilyBaru);



    //         // ==================================== =
    //     if ($this->db->trans_status() === FALSE){
    //         $this->db->trans_rollback();
    //         return false;
    //     }else{
    //         $this->db->trans_commit();
    //         return true;
    //     }

    // }


    // public function hapusfamily($idjemaat)
    // {
    //     $this->db->trans_begin();
        

    //     $this->db->query("delete from jemaatfamily where idjemaat='".$idjemaat."'");


    //     if ($this->db->trans_status() === FALSE){
    //         $this->db->trans_rollback();
    //         return false;
    //     }else{
    //         $this->db->trans_commit();
    //         return true;
    //     }


    // }


}

/* End of file Jemaat_model.php */
/* Location: ./application/models/Jemaat_model.php */