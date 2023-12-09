<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasikelas_model extends CI_Model {

	var $tabelview = 'v_pendaftarankelas';
    var $tabel     = 'jadwaleventregistrasi';
    var $idregistrasi = 'idregistrasi';

    var $column_order = array(null, 'tglregistrasi', 'namalengkap', 'namakelas', 'statuskonfirmasi', null);
    var $column_search = array('tglregistrasi', 'namalengkap', 'namakelas', 'statuskonfirmasi');
    var $order = array('idregistrasi' => 'desc'); // default order 


    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get();        
    }

    private function _get_datatables_query()
    {   
        $idkelas = $_POST['idkelas'];
        if (!empty($idkelas)) {
            $this->db->where('idkelas', $idkelas);
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

    public function get_by_id($idregistrasi)
    {
        $this->db->where('idregistrasi', $idregistrasi);
        return $this->db->get($this->tabelview);
    }

    public function getKelas($limit, $offset)
    {
        return $this->db->query("
                SELECT * FROM kelas ORDER BY idkelas LIMIT $limit OFFSET $offset
            ");
    }

    public function getSertifikat($idjemaat, $idkelas)
    {
        return $this->db->query("
                SELECT * FROM registrasikelas where idjemaat='$idjemaat' and idkelas='$idkelas' and statuslulus='1' limit 1
                ");
    }

    public function update($data, $idregistrasi, $status)
    {
        try {
            
            $this->db->trans_begin();

            $this->db->where('idregistrasi', $idregistrasi);
            $this->db->update('jadwaleventregistrasi', $data);

            if ($status=='Disetujui') {
                $rsRegistrasi = $this->db->query("select * from v_pendaftarankelas where idregistrasi='$idregistrasi'")->row();

                $idkelas = $rsRegistrasi->idkelas;
                $idjemaat = $rsRegistrasi->idjemaat;
                

                $idregistrasikelas = $this->db->query("select create_idregistrasikelas('".date('Y-m-d')."', '".$idkelas."') as idregistrasikelas")->row()->idregistrasikelas;

                $dataRegistrasi = array(
                                            'idregistrasikelas' => $idregistrasikelas,
                                            'idregistrasijadwal' => $idregistrasi,
                                            'tglregistrasikelas' => $data['tglkonfirmasi'],
                                            'idjemaat' => $idjemaat,
                                            'idkelas' => $idkelas,
                                            'tanggalinsert' => date('Y-m-d H:i:s'),
                                            'tanggalupdate' => date('Y-m-d H:i:s'),

                );
                $this->db->insert('registrasikelas', $dataRegistrasi);
            }


            if ($status=='Ditolak') {
                $this->db->query("delete from registrasikelas where idregistrasijadwal='$idregistrasi'");
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

}

/* End of file Konfirmasikelas_model.php */
/* Location: ./application/models/Konfirmasikelas_model.php */