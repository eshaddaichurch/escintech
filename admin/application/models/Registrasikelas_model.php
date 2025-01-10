<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasikelas_model extends CI_Model {

	var $tabelview = 'v_registrasikelas';
    var $tabel     = 'registrasikelas';
    var $idregistrasikelas = 'idregistrasikelas';

    var $column_order = array(null, 'idregistrasikelas', 'namalengkap', 'alamatrumah', 'notelp', 'nomorsertifikat', null);
    var $column_search = array('idregistrasikelas', 'namalengkap', 'alamatrumah', 'notelp', 'nomorsertifikat');
    var $order = array('idregistrasikelas' => 'desc'); // default order 


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get();        
    }

    private function _get_datatables_query()
    {   
        $this->db->where('idkelas', $_POST['idkelas']);
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

    public function get_by_id($idregistrasikelas)
    {
        $this->db->where('idregistrasikelas', $idregistrasikelas);
        return $this->db->get($this->tabelview);
    }

    public function hapus($idregistrasikelas)
    {
        $this->db->trans_begin();
        try {
            
            $this->db->query("delete from registrasikelasmateri where idregistrasikelas='$idregistrasikelas'");
        
            $this->db->where('idregistrasikelas', $idregistrasikelas);      
            $this->db->delete($this->tabel);

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
    {       
        $this->db->trans_begin();

        try {
            
            $this->db->insert($this->tabel, $data);


            $rskelasmateri = $this->db->query("select * from kelasmateri where idkelas='".$data['idkelas']."' order by idkelasmateri");
            if ($rskelasmateri->num_rows()>0) {
                foreach ($rskelasmateri->result() as $rowmateri) {
                    
                    $idregistrasikelasmateri = $this->db->query("select create_idregistrasikelasmateri('".$data['idregistrasikelas']."') as idregistrasikelasmateri")->row()->idregistrasikelasmateri;

                    $this->db->query("
                            INSERT INTO registrasikelasmateri (idregistrasikelasmateri, idregistrasikelas, idkelasmateri, judulmateri, tglpelaksanaan, nilaimateri)
                                 VALUES('".$idregistrasikelasmateri."', '".$data['idregistrasikelas']."', '".$rowmateri->idkelasmateri."', '".$rowmateri->judulmateri."', '".$data['tglsertifikat']."', '')
                        ");

                }
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
        return $this->db->insert($this->tabel, $data);
    }

    public function update($data, $idregistrasikelas)
    {
        $this->db->where('idregistrasikelas', $idregistrasikelas);
        return $this->db->update($this->tabel, $data);
    }

    public function getmateri($idkelas)
    {
        $this->db->where('idkelas', $idkelas);
        return $this->db->get('kelasmateri');
    }

    public function simpanmateri($data)
    {
        return $this->db->insert('registrasikelasmateri', $data);

    }


}

/* End of file Registrasikelas_model.php */
/* Location: ./application/models/Registrasikelas_model.php */