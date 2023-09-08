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
            
            $this->db->query("delete from sidemenus where idotorisasi='$idotorisasi'");
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

    public function simpanmenu($dataMenu, $idotorisasi)
    {
        try {
            
            $this->db->trans_begin();
            $this->db->query("delete from otorisasimenus where idotorisasi='$idotorisasi'");
            $this->db->query("delete from sidemenus where idotorisasi='$idotorisasi'");

            $this->db->insert_batch('otorisasimenus', $dataMenu);

            $rsOtorisasiMenu = $this->db->query("
                    select * from v_otorisasimenus where idotorisasi='$idotorisasi' order by nomorurut
                ");

            /*
                Agar loading sidemenu nya tidak lama, maka kita simpan ditabel sidemenu
            */
            if ($rsOtorisasiMenu->num_rows()>0) {
                $i = 1;
                $parentidmenu_old = '';
                foreach ($rsOtorisasiMenu->result() as $rowMenu) {
                    

                    $sidemenus = array(
                                            'idotorisasi' => $idotorisasi, 
                                            'idmenu' => $rowMenu->idmenu, 
                                            'isdropdown' => '0', 
                                            'menuonselected' => '', 
                                        );
                    $this->db->insert('sidemenus', $sidemenus);


                    if ($parentidmenu_old!=$rowMenu->parentidmenu) {
                        
                        $parentidmenu = $rowMenu->parentidmenu;
                        do {
                            
                            $sudahada = $this->db->query("
                                    select count(*) as sudahada from sidemenus where idmenu = '$parentidmenu' and idotorisasi='$idotorisasi'
                                ")->row()->sudahada;
                            if ($sudahada==0) {

                                /*
                                Ambil child menu untuk menentukan status active menu
                                */
                                $rsMenuChild = $this->db->query("
                                        select * from backmenus where parentidmenu='$parentidmenu'
                                    ");

                                $menuonselected = '';
                                if ($rsMenuChild->num_rows()>0) {
                                    foreach ($rsMenuChild->result() as $rowChild) {
                                        if (!empty($menuonselected)) {
                                            $menuonselected .= ",".$rowChild->idmenu;
                                        }else{
                                            $menuonselected .= $rowChild->idmenu;
                                        }
                                    }
                                }

                                /*
                                Ambil child level 2  untuk menentukan status active menu
                                */
                                $rsMenuChild = $this->db->query("
                                        select * from backmenus where nlevels=2 and parentidmenu in 
                                        (select idmenu from backmenus b where b.parentidmenu='$parentidmenu')
                                    ");
                                if ($rsMenuChild->num_rows()>0) {
                                    foreach ($rsMenuChild->result() as $rowChild) {
                                        if (!empty($menuonselected)) {
                                            $menuonselected .= ",".$rowChild->idmenu;
                                        }else{
                                            $menuonselected .= $rowChild->idmenu;
                                        }
                                    }
                                }


                                $sidemenus = array(
                                                    'idotorisasi' => $idotorisasi, 
                                                    'idmenu' => $parentidmenu, 
                                                    'isdropdown' => '1', 
                                                    'menuonselected' => $menuonselected, 
                                                );
                                $this->db->insert('sidemenus', $sidemenus);

                                $rsMenuParent = $this->db->query("
                                                select * from backmenus where idmenu='$parentidmenu'
                                            ");

                                if ($rsMenuParent->num_rows()>0) {
                                    $parentidmenu = $rsMenuParent->row()->parentidmenu;

                                }else{
                                    $parentidmenu = '';
                                }

                            }else{
                                $parentidmenu = '';
                            }


                        } while (!empty($parentidmenu));

                    } //end if

                    $i++;
                    $parentidmenu_old = $rowMenu->parentidmenu;
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
    }
}

/* End of file Otorisasi_model.php */
/* Location: ./application/models/Otorisasi_model.php */