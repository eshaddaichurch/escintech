<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasidc_model extends CI_Model
{
    public function getPermohonanID($idpermohonan)
    {
        $this->db->where('idpermohonan', $idpermohonan);
        return $this->db->get('v_dcmember_permohonan');
    }

    public function getPermohonan()
    {
        $this->db->where('iddc', $this->session->userdata('iddc'));
        return $this->db->get('v_dcmember_permohonan');
    }

    public function getDcMemberAktif($idjemaat)
    {
        $this->db->where('idjemaat', $idjemaat);
        $this->db->where('statusaktif', 'Aktif');
        return $this->db->get('v_dcmember');
    }

    public function setuju($idjemaat, $idpermohonan, $rowPermohonan)
    {
        try {
            $this->db->trans_begin();
            $iddcmember = $this->db->query("select create_iddcmember('" . $this->session->userdata('iddc') . "') as iddcmember")->row()->iddcmember;
            $arrData = array(
                'iddcmember' => $iddcmember,
                'iddc' => $this->session->userdata('iddc'),
                'idjemaat' => $idjemaat,
                'statuskeanggotaan' => 'Anggota',
                'tanggalinsert' => date('Y-m-d H:i:s'),
                'tanggalupdate' => date('Y-m-d H:i:s'),
                'idjemaatupdate' => $this->session->userdata('idjemaat'),
                'idpermohonan' => $idpermohonan,
            );
            $this->db->insert('dcmember', $arrData);


            $arrKonfirmasi = array(
                'statuskonfirmasi' => 'Disetujui',
                'keterangankonfirmasi' => null,
                'tglkonfirmasi' => date('Y-m-d H:i:s'),
                'idjemaatkonfirmasi' => $this->session->userdata('idjemaat'),
            );
            $this->db->where('idpermohonan', $idpermohonan);
            $this->db->update('dcmember_permohonan', $arrKonfirmasi);


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

    public function tolak($idpermohonan, $alasan)
    {
        try {
            $this->db->trans_begin();
            $this->db->query("delete from dcmember where idpermohonan=$idpermohonan");

            $arrKonfirmasi = array(
                'statuskonfirmasi' => 'Ditolak',
                'keterangankonfirmasi' => $alasan,
                'tglkonfirmasi' => date('Y-m-d H:i:s'),
                'idjemaatkonfirmasi' => $this->session->userdata('idjemaat'),
            );
            $this->db->where('idpermohonan', $idpermohonan);
            $this->db->update('dcmember_permohonan', $arrKonfirmasi);


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
