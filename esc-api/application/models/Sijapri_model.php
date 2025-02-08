<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sijapri_model extends CI_Model
{

    public function info_pasien_get($NoCM)
    {
        $this->db->select("NoCM, NamaLengkap,
        case when JenisKelamin='P' then 'Perempuan' else 'Laki-laki' end as JenisKelamin,
        CONVERT(Date, TglLahir) as TglLahir,
        Alamat, Propinsi, Kota, Kecamatan, Kelurahan, Telepon  ");
        $this->db->where('NoCM', $NoCM);
        $row = $this->db->get('pasien');
        return $row;

    }

    public function info_pasien_nik_get($NoIdentitas)
    {
        $this->db->select("NoCM, NamaLengkap,
        case when JenisKelamin='P' then 'Perempuan' else 'Laki-laki' end as JenisKelamin,
        CONVERT(Date, TglLahir) as TglLahir,
        Alamat, Propinsi, Kota, Kecamatan, Kelurahan, Telepon  ");
        $this->db->where('NoIdentitas', $NoIdentitas);
        $row = $this->db->get('pasien');
        return $row;

    }

    public function ruangan_inap_dan_bedah_get()
    {
        // return $this->db->get_where('Ruangan', array('StatusEnabled' => '1', 'KdInstalasi' => $KdInstalasi));
        return $this->db->query("SELECT KdRuangan, NamaRuangan FROM Ruangan WHERE StatusEnabled='1'
                                            AND KdInstalasi in ('03', '04') ORDER BY KdInstalasi, NamaRuangan");
    }

    public function daftar_dokter()
    {

        return $this->db->query("SELECT KodeDokter AS [Kode Dokter],NamaDokter AS [Nama Dokter],
                                    case when JK='L' then 'Laki-laki' else 'Perempuan' end as JenisKelamin
                                    FROM V_DaftarDokter WHERE NamaDokter like '%%' order by [Nama Dokter]");

    }
}

/* End of file Sijapri_model.php */
/* Location: ./application/models/Sijapri_model.php */
