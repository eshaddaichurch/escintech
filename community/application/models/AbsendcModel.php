<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsendcModel extends CI_Model
{

    public function get_by_id($idabsen)
    {
        $this->db->where('idabsen', $idabsen);
        return $this->db->get('dcabsen');
    }

    public function get_all()
    {
        $this->db->where('iddc', $this->session->userdata('iddc'));
        $this->db->order_by('tglabsen', 'desc');
        return $this->db->get('dcabsen');
    }

    public function simpan($dataHeader, $dataJemaat)
    {
        try {
            $this->db->trans_begin();
            $this->db->insert('dcabsen', $dataHeader);

            $absenHadir = array();
            $idabsen = $this->db->insert_id();
            if (count($dataJemaat) > 0) {
                foreach ($dataJemaat as $value) {
                    $idjemaat = $value;
                    array_push($absenHadir, array(
                        'idabsen' => $idabsen,
                        'idjemaat' => $idjemaat,
                    ));
                }
                $this->db->insert_batch('dcabsen_detail', $absenHadir);
            }

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
