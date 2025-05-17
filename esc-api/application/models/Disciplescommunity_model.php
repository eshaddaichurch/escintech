<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disciplescommunity_model extends CI_Model
{
    public function getDc($iddc)
    {
        $sql = "SELECT * FROM v_disciplescommunity WHERE iddc = ?";
        return $this->db->query($sql, array($iddc));
    }

    public function getDcMember($iddc)
    {
        $sql = "SELECT * FROM v_dcmember WHERE statuskeanggotaan='Anggota' AND iddc = ?";
        return $this->db->query($sql, array($iddc));
    }

    public function getDcCT($iddc)
    {
        $sql = "SELECT * FROM v_dcmember WHERE statuskeanggotaan = 'Core Team' AND iddc = ?";
        return $this->db->query($sql, array($iddc));
    }

    public function getDcById($iddc) // Nama diubah agar tidak bentrok
    {
        return $this->db->get_where('disciples_community', array('iddc' => $iddc));
    }

    public function getAllDcNames()
    {
        $this->db->select('iddc, namadc,haridc,jamdc,kategoridc,fotodm');
        $query = $this->db->get('v_disciplescommunity'); // atau tabel asli jika bukan view

        return $query->num_rows() > 0 ? $query->result() : array();
    }

    public function saveAttendance($dataHeader, $attendance)
    {
        try {
            $this->db->trans_begin();

            $this->db->insert('dcabsen', $dataHeader);
            $idabsen = $this->db->insert_id();

            $dataDetail = array();
            foreach ($attendance as $value) {
                array_push($dataDetail, array(
                    'idabsen' => $idabsen,
                    'idjemaat' => $value['idjemaat']
                ));
            };

            $this->db->insert_batch('dcabsen_detail', $dataDetail);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return false;
            } else {
                $this->db->trans_commit();
                return true;
            }
        } catch (\Throwable $th) {
            $this->db->trans_rollback();
            return false;
        }
    }
}
