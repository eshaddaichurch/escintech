<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hagah_model extends CI_Model {

	var $tabelview = 'v_hagah';
    var $tabel     = 'hagah';
    var $idhagah = 'idhagah';

    var $column_order = array(null, 'tahun', 'bulan', 'kitabawal', null);
    var $column_search = array('tahun', 'bulan', 'kitabawal', 'kitabakhir');
    var $order = array('idhagah' => 'asc'); // default order 


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

    public function get_by_id($idhagah)
    {
        $this->db->where('idhagah', $idhagah);
        return $this->db->get($this->tabelview);
    }

    public function hapus($idhagah)
    {
        try {
            $this->db->trans_begin();
            
            $this->db->query("delete from hagah_detail where idhagah='$idhagah'");
            $this->db->query("delete from hagah where idhagah='$idhagah'");
             
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

    public function simpan($arrHeader, $arrDetail, $idhagah)
    {    
        try {
               
                $this->db->trans_begin();

                $this->db->query("delete from hagah_detail where idhagah='$idhagah'");
                $this->db->query("delete from hagah where idhagah='$idhagah'");

                $this->db->insert('hagah', $arrHeader);
                $this->db->insert_batch('hagah_detail', $arrDetail);

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

    public function update($arrHeader, $arrDetail, $idhagah)
    {
        try {
               
                $this->db->trans_begin();

                $this->db->query("delete from hagah_detail where idhagah='$idhagah'");

                $this->db->where('idhagah', $idhagah);
                $this->db->update('hagah', $arrHeader);
                $this->db->insert_batch('hagah_detail', $arrDetail);

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


}

/* End of file Hagah_model.php */
/* Location: ./application/models/Hagah_model.php */