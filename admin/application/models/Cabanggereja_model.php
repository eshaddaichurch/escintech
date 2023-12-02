<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabanggereja_model extends CI_Model {

	var $tabelview = 'cabanggereja';
    var $tabel     = 'cabanggereja';
    var $idcabang = 'idcabang';

    var $column_order = array(null, null,'namacabang','alamatlengkap','latitude', null );
    var $column_search = array('idcabang','namacabang','alamatlengkap', 'latitude', 'longitude');
    var $order = array('namacabang' => 'asc'); // default order 


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

    public function get_by_id($idcabang)
    {
        $this->db->where('idcabang', $idcabang);
        return $this->db->get($this->tabelview);
    }

    public function hapus($idcabang)
    {
        $this->db->where('idcabang', $idcabang);      
        return $this->db->delete($this->tabel);
    }

    public function simpan($data)
    {       
        return $this->db->insert($this->tabel, $data);
    }

    public function update($data, $idcabang)
    {
        $this->db->where('idcabang', $idcabang);
        return $this->db->update($this->tabel, $data);
    }


    public function deletegallery($idcabang, $idgallery)
    {
        $this->db->where('idcabang', $idcabang);
        $this->db->where('idgallery', $idgallery);
        return $this->db->delete('cabanggereja_gallery');
    }

    public function simpangallery($data)
    {
        return $this->db->insert('cabanggereja_gallery', $data);
    }


}

/* End of file Cabanggereja_model.php */
/* Location: ./application/models/Cabanggereja_model.php */