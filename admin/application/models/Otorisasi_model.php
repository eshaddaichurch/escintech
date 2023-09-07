<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otorisasi_model extends CI_Model {

	var $tabelview = 'otorisasi';
    var $tabel     = 'otorisasi';
    var $idotorisasi = 'idotorisasi';

    public function get_all()
    {
    	$this->db->order_by('idotorisasi', 'asc');
        return $this->db->get($this->tabelview);
    }

    public function get_by_id($idotorisasi)
    {
        $this->db->where('idotorisasi', $idotorisasi);
        return $this->db->get($this->tabelview);
    }

    public function getJumlahMenu($idotorisasi)
    {
    	$jumlahMenu =  $this->db->query("select count(*) as jumlahMenu from otorisasimenus where idotorisasi='$idotorisasi' ")->row()->jumlahMenu;
    	return $jumlahMenu;
    }

    public function getJumlahUser($idotorisasi)
    {
    	$jumlahUser =  $this->db->query("select count(*) as jumlahUser from otorisasiuser where idotorisasi='$idotorisasi' ")->row()->jumlahUser;
    	return $jumlahUser;
    }

    public function isDropDown($idmenu)
    {
    	$jlhDropDown = $this->db->query("select count(*) as jlhDropDown from backmenus where parentidmenu='$idmenu' ")->row()->jlhDropDown;
    	if ($jlhDropDown>0) {
    		return true;
    	}else{
    		return false;
    	}
    }

    public function isChecked($idotorisasi, $idmenu)
    {
    	$jlh = $this->db->query("select count(*) as jlh from otorisasimenus where idotorisasi='$idotorisasi' and idmenu='$idmenu' ")->row()->jlh;
    	if ($jlh>0) {
    		return true;
    	}else{
    		return false;
    	}
    }


    public function hapusotorisasi($idotorisasi)
    {
        $this->db->trans_begin();
        try {
            
            $this->db->query("delete from otorisasimenus where idotorisasi='$idotorisasi'");
            $this->db->query("delete from otorisasiuser where idotorisasi='$idotorisasi'");

            $this->db->where('idotorisasi', $idotorisasi);      
            $this->db->delete($this->tabel);
            if ($this->db->trans_status() === false) {
                $this->db->trans_rollback();
                return false;
            } else {
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
        return $this->db->insert($this->tabel, $data);
    }

    public function update($data, $idotorisasi)
    {
        $this->db->where('idotorisasi', $idotorisasi);
        return $this->db->update($this->tabel, $data);
    }

    public function simpanotorisasiuser($dataUser)
    {
        return $this->db->insert('otorisasiuser', $dataUser);
    }

    public function hapusotorisasiuser($idotorisasi, $idjemaat)
    {
        $this->db->where('idotorisasi', $idotorisasi);
        $this->db->where('idjemaat', $idjemaat);
        return $this->db->delete('otorisasiuser');
    }
}

/* End of file Otorisasi_model.php */
/* Location: ./application/models/Otorisasi_model.php */