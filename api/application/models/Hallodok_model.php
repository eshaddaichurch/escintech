<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hallodok_model extends CI_Model
{

    public function info_pasien_get($NoCM)
    {
        $strSQL = $this->db->query("
                                    SELECT 
                                        NoCM, 
                                        dbo.FB_TakeNoBPJS(NoCM) AS NoBPJS,
                                        NamaLengkap,
                                        CASE
                                            WHEN JenisKelamin='P' Then 'Perempuan' 
                                            ELSE 'Laki-laki' 
                                        END AS JenisKelamin,
                                        CONVERT(Date, TglLahir) as TglLahir,
                                        Alamat, 
                                        Propinsi, 
                                        Kota, 
                                        Kecamatan, 
                                        Kelurahan, 
                                        Telepon 
                                    FROM Pasien 
                                    WHERE NoCM='$NoCM'
        ");        
        return $strSQL;
    }

    public function info_pasien_nik_get($NoIdentitas)
    {
        $strSQL = $this->db->query("
            SELECT NoCM, NamaLengkap,
            case when JenisKelamin='P' then 'Perempuan' else 'Laki-laki' end as JenisKelamin,
            CONVERT(Date, TglLahir) as TglLahir,
            Alamat, Propinsi, Kota, Kecamatan, Kelurahan, Telepon FROM Pasien WHERE NoCM='$NoIdentitas'
        ");
        return $strSQL;

    }

    public function dataobat($NoCM)
    {
        $strSQL = $this->db->query("
                        SELECT 
                        DISTINCT NoCM, CONVERT(date, TglPelayanan) AS TglPelayanan,[Detail Jenis Brg],NamaBarang,NamaRuangan AS [Ruang Pelayanan],Kelas,JenisTarif,
                        SatuanJml as Sat,JmlBarang as Jml,HargaSatuan as Tarif,BiayaAdministrasi,TarifService,BiayaTotal,
                        DokterPemeriksa,[Status Bayar],KdBarang,KdAsal,Operator,KdRuangan,NoTerima,ResepKe,[Status Retur],
                        NamaPelayanan 
                    FROM V_BiayaPemakaianObatAlkes 
                    WHERE 
                        NoCM='$NoCM' AND
                        CONVERT(date, TglPelayanan) IN(
                            SELECT TOP 3 TglPelayanan FROM
                            (
                                SELECT 
                                CONVERT(date, TglPelayanan) AS TglPelayanan
                                FROM V_BiayaPemakaianObatAlkes 
                                WHERE NoCM='$NoCM' 
                            ) z 
                            GROUP BY TglPelayanan
                            ORDER BY TglPelayanan DESC
                        ) 
                    ORDER BY TglPelayanan DESC
        ");

        return $strSQL;
    }

    public function dataDiagnosa($NoCM)
    {
        $strSQL = "
                    SELECT 
                    NoPendaftaran, NoCM, CONVERT(date, TglPeriksa) AS TglPeriksa, JenisDiagnosa, KdDiagnosa, Diagnosa, JenisDiagnosaTindakan, KdDiagnosaTindakan,
                    DiagnosaTindakan, [Ruang Periksa] AS RuangPeriksa, [Dokter Pemeriksa] AS DokterPemeriksa, [Nama Pasien] AS NamaPasien,
                    JK, Umur
                    FROM V_DaftarDiagnosaPasien 
                    WHERE 
                        NoCM='$NoCM' AND
                        NoPendaftaran IN(
                            SELECT TOP 3 NoPendaftaran FROM
                            (
                                SELECT 
                                NoPendaftaran
                                FROM V_DaftarDiagnosaPasien 
                                WHERE NoCM='$NoCM' 
                            ) z 
                            GROUP BY NoPendaftaran
                            ORDER BY NoPendaftaran DESC
                        )
                    ORDER BY NoPendaftaran DESC
        ";

        return $this->db->query($strSQL);
    }

    public function dataRiwayatTindakan($NoCM)
    {
        $strSQL = "
                    SELECT  
                        V_RiwayatPemeriksaanPasien.NoCM, 
                        V_RiwayatPemeriksaanPasien.NoPendaftaran, 
                        V_RiwayatPemeriksaanPasien.RuangPemeriksaan, 
                        V_RiwayatPemeriksaanPasien.[Tgl. Periksa] AS TglPeriksa, 
                        V_RiwayatPemeriksaanPasien.JenisPemeriksaan, 
                        V_RiwayatPemeriksaanPasien.NamaPemeriksaan, 
                        V_RiwayatPemeriksaanPasien.DokterPemeriksa,
                        Ruangan.NamaRuangan
                    FROM V_RiwayatPemeriksaanPasien 
                    JOIN Ruangan ON V_RiwayatPemeriksaanPasien.KdRuangan=Ruangan.KdRuangan
                    WHERE 
                        NoCM='$NoCM' AND
                        NoPendaftaran IN(
                            SELECT TOP 3 NoPendaftaran FROM
                            (
                                SELECT 
                                NoPendaftaran
                                FROM V_RiwayatPemeriksaanPasien 
                                WHERE NoCM='$NoCM' 
                            ) z 
                            GROUP BY NoPendaftaran
                            ORDER BY NoPendaftaran DESC
                        )
                    ORDER BY NoPendaftaran DESC
        ";

        return $this->db->query($strSQL);
    }

    public function dataTindakanMedis($NoCM)
    {
        $strSQL = "
                    SELECT
                        NoHasilPeriksa,
                        NoCM,
                        NoPendaftaran,
                        KasusPenyakit,
                        JenisTindakanMedis,
                        TglMulaiPeriksa,
                        TglAkhirPeriksa,
                        TglHasilPeriksa,
                        NamaRuangan
                    FROM 
                        V_HasilTindakanMedis 
                    WHERE 
                        (NoCM = '$NoCM') AND
                        NoPendaftaran IN(
                            SELECT TOP 3 NoPendaftaran FROM
                            (
                                SELECT 
                                NoPendaftaran
                                FROM V_HasilTindakanMedis 
                                WHERE NoCM='$NoCM' 
                            ) z 
                            GROUP BY NoPendaftaran
                            ORDER BY NoPendaftaran DESC
                        )
                    ORDER BY TglMulaiPeriksa DESC
        ";

        return $this->db->query($strSQL);
    }

    public function dataHAsilRadiologi($NoCM)
    {
        $strSQL = "
                    SELECT 
                        NoRadiology,
                        NoPendaftaran,
                        NoCM,
                        TglPelayanan,
                        NamaDetailPeriksa
                    FROM DetailHasilPeriksaRadiology 
                    WHERE 
                        KdPelayananRS<>'' AND
                        NoCM='$NoCM' AND
                        NoPendaftaran IN(
                            SELECT TOP 3 NoPendaftaran FROM
                            (
                                SELECT 
                                    NoPendaftaran
                                    FROM DetailHasilPeriksaRadiology 
                                WHERE NoCM='$NoCM' 
                            ) z 
                            GROUP BY NoPendaftaran
                            ORDER BY NoPendaftaran DESC
                        )
                    ORDER BY TglPelayanan DESC
        ";

        return $this->db->query($strSQL);
    }

    public function listDataObat()
    {
        $strSQL = "
                    SELECT DISTINCT 
                        MasterBarang.KdBarang ,
                        MasterBarang.NamaBarang,
                        JenisBarang.JenisBarang,
                        MasterBarang.KeKuatan ,
                        MasterBarang.StatusAktif ,
                        MasterBarang.JmlTerkecil ,
                        MasterBarang.JmlJualTerkecil ,
                        MasterBarang.JmlKemasan ,
                        MasterBarang.KdSatuanJmlB ,
                        AsalBarang.NamaAsal AS AsalBarang ,
                        StokRuanganFIFO.KdAsal ,
                        StokRuanganFIFO.KdRuangan ,
                        SUM(StokRuanganFIFO.JmlStokOnHand) AS JmlStokOnHand ,
                        DetailHargaNettoBarangFIFO.Satuan AS SatuanJml ,
                        SatuanJumlahK.SatuanJmlK AS Satuan ,
                        SUM(StokRuanganFIFO.JmlStok) AS JmlStok ,
                        MasterBarang.KdGenerikBarang ,
                        MIN(StokRuanganFIFO.NoTerima) AS NoTerima ,
                        MappingPenjaminToAsalBarang.KdKelompokPasien ,
                        MappingPenjaminToAsalBarang.IdPenjamin ,
                        Pabrik.NamaPabrik ,
                        HargaNettoBarangFIFO.HargaNetto2 ,
                        dbo.FB_TakeHargaNettoObatAlkesFifo('0000000001',
                                                    '02',
                                                    MasterBarang.KdBarang,
                                                    stokruanganfifo.kdasal,
                                                    DetailHargaNettoBarangFIFO.Satuan,
                                                    '702',
                                                    stokruanganfifo.noterima) AS beli ,
                        dbo.DetailHargaNettoBarangFIFO.HargaNetto2
                        + ( ( ( dbo.DetailHargaNettoBarangFIFO.HargaNetto2
                                * 17.5 ) / 100 )) AS harhgajual ,
                        dbo.FB_TakeTarifOA('02',
                                        '0000000001',
                                        stokruanganfifo.kdasal,
                                        ROUND(dbo.HargaNettoBarangFIFO.HargaNetto2,
                                                2)) AS hargajual,NamaGenerikBarang.NamaGenerikBarang
                FROM         SatuanJumlahB RIGHT OUTER JOIN
                        HargaNettoBarangFIFO INNER JOIN
                        StokRuanganFIFO INNER JOIN
                        AsalBarang ON StokRuanganFIFO.KdAsal = AsalBarang.KdAsal INNER JOIN
                        MasterBarang ON StokRuanganFIFO.KdBarang = MasterBarang.KdBarang INNER JOIN
                        SatuanJumlahK ON MasterBarang.KdSatuanJmlK = SatuanJumlahK.KdSatuanJmlK INNER JOIN
                        MappingPenjaminToAsalBarang ON StokRuanganFIFO.KdAsal = MappingPenjaminToAsalBarang.KdAsal ON HargaNettoBarangFIFO.KdBarang = StokRuanganFIFO.KdBarang AND 
                        HargaNettoBarangFIFO.KdAsal = StokRuanganFIFO.KdAsal AND HargaNettoBarangFIFO.NoTerima = StokRuanganFIFO.NoTerima INNER JOIN
                        DetailHargaNettoBarangFIFO ON HargaNettoBarangFIFO.NoTerima = DetailHargaNettoBarangFIFO.NoTerima AND HargaNettoBarangFIFO.KdAsal = DetailHargaNettoBarangFIFO.KdAsal AND 
                        HargaNettoBarangFIFO.KdBarang = DetailHargaNettoBarangFIFO.KdBarang LEFT OUTER JOIN
                        NamaGenerikBarang ON MasterBarang.KdGenerikBarang = NamaGenerikBarang.KdGenerikBarang LEFT OUTER JOIN
                        JenisBarang INNER JOIN
                        DetailJenisBarang ON JenisBarang.KdJenisBarang = DetailJenisBarang.KdJenisBarang ON MasterBarang.KdDetailJenisBarang = DetailJenisBarang.KdDetailJenisBarang ON 
                        SatuanJumlahB.KdSatuanJmlB = MasterBarang.KdSatuanJmlB LEFT OUTER JOIN
                        Pabrik ON MasterBarang.KdPabrik = Pabrik.KdPabrik
                WHERE   ( MasterBarang.StatusEnabled <> 0 )
                        AND ( MasterBarang.StatusAktif <> 'T' )
                        AND DetailHargaNettoBarangFIFO.Satuan = 'S'
                        AND StokRuanganFIFO.NoTerima = dbo.TakeNoFIFO_F(masterbarang.kdbarang,AsalBarang.kdasal,StokRuanganFIFO.KdRuangan) AND
                        (MasterBarang.NamaBarang LIKE '%' + '%%' + '%' OR NamaGenerikBarang.NamaGenerikBarang LIKE '%' + '%%' +'%')
                        AND kdRuangan = '702'
                        AND ( dbo.MappingPenjaminToAsalBarang.IdPenjamin = '0000000001' )
                        AND ( dbo.MappingPenjaminToAsalBarang.KdKelompokPasien = '02' )
                        AND ( JmlStok > 0 )
                GROUP BY HargaNettoBarangFIFO.HargaNetto2 ,
                        MasterBarang.KdBarang ,
                        MasterBarang.NamaBarang ,
                        JenisBarang.JenisBarang ,
                        MasterBarang.KeKuatan ,
                        MasterBarang.StatusAktif ,
                        MasterBarang.JmlTerkecil ,
                        MasterBarang.JmlJualTerkecil ,
                        MasterBarang.JmlKemasan ,
                        MasterBarang.KdSatuanJmlB ,
                        AsalBarang.NamaAsal ,
                        StokRuanganFIFO.KdAsal ,
                        DetailHargaNettoBarangFIFO.Satuan ,
                        SatuanJumlahK.SatuanJmlK ,
                        MasterBarang.KdGenerikBarang ,
                        StokRuanganFIFO.KdRuangan ,
                        MappingPenjaminToAsalBarang.KdKelompokPasien ,
                        MappingPenjaminToAsalBarang.IdPenjamin ,
                        NamaPabrik ,
                        StokRuanganFIFO.NoTerima ,
                        DetailHargaNettoBarangFIFO.HargaNetto2,NamaGenerikBarang.NamaGenerikBarang 
        ";

        return $this->db->query($strSQL);
    }

    public function riwayatTindakanLabKlinik($NoCM)
    {
        $strSQL = "
            SELECT * FROM V_RiwayatPemeriksaanPasien 
            WHERE 
                NoCM = '$NoCM' AND 
                KdRuangan='901' AND
                NoPendaftaran IN(
                    SELECT  TOP 3
                        NoPendaftaran
                    FROM V_RiwayatPemeriksaanPasien 
                    WHERE 
                        NoCM = '$NoCM' AND 
                        KdRuangan='901' 
                    GROUP BY NoPendaftaran
                    ORDER BY NoPendaftaran DESC
                )
            ORDER BY NoPendaftaran DESC
        ";

        return $this->db->query($strSQL);
    }

}

/* End of file Hallodok_model.php */
/* Location: ./application/models/Hallodok_model.php */
