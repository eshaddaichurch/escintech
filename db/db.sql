/*
SQLyog Enterprise v10.42 
MySQL - 5.5.5-10.4.32-MariaDB : Database - u1804486_escindonesia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u1804486_escindonesia` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `u1804486_escindonesia`;

/*Table structure for table `absen` */

DROP TABLE IF EXISTS `absen`;

CREATE TABLE `absen` (
  `idabsen` char(10) NOT NULL,
  `tglabsen` datetime DEFAULT NULL,
  `jumlahhadir` int(4) DEFAULT NULL,
  `idabsenjenis` char(3) DEFAULT NULL,
  `idabsenlokasi` char(3) DEFAULT NULL,
  `idjemaatcounter` char(10) DEFAULT NULL,
  `idsesi` char(3) DEFAULT NULL,
  PRIMARY KEY (`idabsen`),
  KEY `idabsenjenis` (`idabsenjenis`),
  KEY `idabsenlokasi` (`idabsenlokasi`),
  KEY `idjemaatcounter` (`idjemaatcounter`),
  KEY `idsesi` (`idsesi`),
  CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`idabsenjenis`) REFERENCES `absenjenis` (`idabsenjenis`),
  CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`idabsenlokasi`) REFERENCES `absenlokasi` (`idabsenlokasi`),
  CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`idjemaatcounter`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `absen_ibfk_4` FOREIGN KEY (`idsesi`) REFERENCES `sesiibadahminggu` (`idsesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `absenjenis` */

DROP TABLE IF EXISTS `absenjenis`;

CREATE TABLE `absenjenis` (
  `idabsenjenis` char(3) NOT NULL,
  `namaabsenjenis` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `adasesi` int(1) DEFAULT 0,
  PRIMARY KEY (`idabsenjenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `absenlokasi` */

DROP TABLE IF EXISTS `absenlokasi`;

CREATE TABLE `absenlokasi` (
  `idabsenlokasi` char(3) NOT NULL,
  `namaabsenlokasi` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idabsenlokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `aktabaptisan` */

DROP TABLE IF EXISTS `aktabaptisan`;

CREATE TABLE `aktabaptisan` (
  `idakta` char(10) NOT NULL,
  `noakta` varchar(25) DEFAULT NULL,
  `tglakta` date DEFAULT NULL,
  `tglcetak` date DEFAULT NULL,
  `dilakukanoleh` varchar(100) DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `namaayah` varchar(50) DEFAULT NULL,
  `namaibu` varchar(50) DEFAULT NULL,
  `iddaerahakta` char(5) DEFAULT NULL,
  `idcabangakta` char(5) DEFAULT NULL,
  PRIMARY KEY (`idakta`),
  KEY `idjemaat` (`idjemaat`),
  KEY `iddaerahakta` (`iddaerahakta`),
  KEY `idcabangakta` (`idcabangakta`),
  CONSTRAINT `aktabaptisan_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktabaptisan_ibfk_2` FOREIGN KEY (`iddaerahakta`) REFERENCES `aktadaerah` (`iddaerahakta`),
  CONSTRAINT `aktabaptisan_ibfk_3` FOREIGN KEY (`idcabangakta`) REFERENCES `aktacabang` (`idcabangakta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `aktacabang` */

DROP TABLE IF EXISTS `aktacabang`;

CREATE TABLE `aktacabang` (
  `idcabangakta` char(5) NOT NULL,
  `namacabangakta` varchar(50) DEFAULT NULL,
  `formatnomorakta` varchar(25) DEFAULT NULL,
  `nomorotomatis` enum('Ya','Tidak') DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idcabangakta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `aktadaerah` */

DROP TABLE IF EXISTS `aktadaerah`;

CREATE TABLE `aktadaerah` (
  `iddaerahakta` char(5) NOT NULL,
  `namadaerahakta` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`iddaerahakta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `aktanikah` */

DROP TABLE IF EXISTS `aktanikah`;

CREATE TABLE `aktanikah` (
  `idakta` char(10) NOT NULL,
  `noakta` varchar(25) DEFAULT NULL,
  `tglakta` date DEFAULT NULL,
  `tglcetak` date DEFAULT NULL,
  `dilakukanoleh` varchar(100) DEFAULT NULL,
  `idjemaatpria` char(10) DEFAULT NULL,
  `namaayahpria` varchar(50) DEFAULT NULL,
  `namaibupria` varchar(50) DEFAULT NULL,
  `idjemaatwanita` char(10) DEFAULT NULL,
  `namaayahwanita` varchar(50) DEFAULT NULL,
  `namaibuwanita` varchar(50) DEFAULT NULL,
  `iddaerahakta` char(5) DEFAULT NULL,
  `idcabangakta` char(5) DEFAULT NULL,
  PRIMARY KEY (`idakta`),
  KEY `idjemaatpria` (`idjemaatpria`),
  KEY `idjemaatwanita` (`idjemaatwanita`),
  KEY `iddaerahakta` (`iddaerahakta`),
  KEY `idcabangakta` (`idcabangakta`),
  CONSTRAINT `aktanikah_ibfk_1` FOREIGN KEY (`idjemaatpria`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktanikah_ibfk_2` FOREIGN KEY (`idjemaatwanita`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktanikah_ibfk_3` FOREIGN KEY (`iddaerahakta`) REFERENCES `aktadaerah` (`iddaerahakta`),
  CONSTRAINT `aktanikah_ibfk_4` FOREIGN KEY (`idcabangakta`) REFERENCES `aktacabang` (`idcabangakta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `aktapenyerahananak` */

DROP TABLE IF EXISTS `aktapenyerahananak`;

CREATE TABLE `aktapenyerahananak` (
  `idakta` char(10) NOT NULL,
  `noakta` varchar(25) DEFAULT NULL,
  `tglakta` date DEFAULT NULL,
  `tglcetak` date DEFAULT NULL,
  `dilakukanoleh` varchar(100) DEFAULT NULL,
  `idjemaatanak` char(10) DEFAULT NULL,
  `idjemaatayah` char(10) DEFAULT NULL,
  `idjemaatibu` char(10) DEFAULT NULL,
  `iddaerahakta` char(5) DEFAULT NULL,
  `idcabangakta` char(5) DEFAULT NULL,
  PRIMARY KEY (`idakta`),
  KEY `idjemaatanak` (`idjemaatanak`),
  KEY `idjemaatayah` (`idjemaatayah`),
  KEY `idjemaatibu` (`idjemaatibu`),
  KEY `iddaerahakta` (`iddaerahakta`),
  KEY `idcabangakta` (`idcabangakta`),
  CONSTRAINT `aktapenyerahananak_ibfk_1` FOREIGN KEY (`idjemaatanak`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktapenyerahananak_ibfk_2` FOREIGN KEY (`idjemaatayah`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktapenyerahananak_ibfk_3` FOREIGN KEY (`idjemaatibu`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `aktapenyerahananak_ibfk_4` FOREIGN KEY (`iddaerahakta`) REFERENCES `aktadaerah` (`iddaerahakta`),
  CONSTRAINT `aktapenyerahananak_ibfk_5` FOREIGN KEY (`idcabangakta`) REFERENCES `aktacabang` (`idcabangakta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `api_access` */

DROP TABLE IF EXISTS `api_access`;

CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `all_access` tinyint(1) NOT NULL DEFAULT 0,
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `api_keys` */

DROP TABLE IF EXISTS `api_keys`;

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `api_limits` */

DROP TABLE IF EXISTS `api_limits`;

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `api_logs` */

DROP TABLE IF EXISTS `api_logs`;

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `backmenus` */

DROP TABLE IF EXISTS `backmenus`;

CREATE TABLE `backmenus` (
  `idmenu` char(5) NOT NULL,
  `namamenu` varchar(50) DEFAULT NULL,
  `parentidmenu` char(5) DEFAULT NULL,
  `linkmenu` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `nomorurut` int(5) DEFAULT NULL,
  `nlevels` int(1) DEFAULT 0,
  `fontawesomeicon` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `cabanggereja` */

DROP TABLE IF EXISTS `cabanggereja`;

CREATE TABLE `cabanggereja` (
  `idcabang` int(11) NOT NULL AUTO_INCREMENT,
  `namacabang` varchar(255) DEFAULT NULL,
  `namacabang_slug` varchar(255) DEFAULT NULL,
  `alamatlengkap` varchar(255) DEFAULT NULL,
  `latitude` varchar(25) DEFAULT NULL,
  `longitude` varchar(25) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `namagembala` varchar(100) DEFAULT NULL,
  `notelp` varchar(25) DEFAULT NULL,
  `jadwalibadah` text DEFAULT NULL,
  `urlfacebook` varchar(255) DEFAULT NULL,
  `urlinstagram` varchar(255) DEFAULT NULL,
  `urlyoutube` varchar(255) DEFAULT NULL,
  `urltwitter` varchar(255) DEFAULT NULL,
  `urllinkedin` varchar(255) DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idcabang`),
  UNIQUE KEY `namacabang_slug` (`namacabang_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `cabanggereja_gallery` */

DROP TABLE IF EXISTS `cabanggereja_gallery`;

CREATE TABLE `cabanggereja_gallery` (
  `idgallery` int(11) NOT NULL AUTO_INCREMENT,
  `filegallery` varchar(255) DEFAULT NULL,
  `idcabang` int(11) DEFAULT NULL,
  PRIMARY KEY (`idgallery`),
  KEY `idcabang` (`idcabang`),
  CONSTRAINT `cabanggereja_gallery_ibfk_1` FOREIGN KEY (`idcabang`) REFERENCES `cabanggereja` (`idcabang`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `dcmember` */

DROP TABLE IF EXISTS `dcmember`;

CREATE TABLE `dcmember` (
  `iddcmember` char(10) NOT NULL,
  `iddc` char(5) DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `statuskeanggotaan` enum('Disciples maker','Core Team','Anggota') DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`iddcmember`),
  KEY `idjemaat` (`idjemaat`),
  KEY `iddc` (`iddc`),
  CONSTRAINT `dcmember_ibfk_3` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `dcmember_ibfk_4` FOREIGN KEY (`iddc`) REFERENCES `disciplescommunity` (`iddc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `departement` */

DROP TABLE IF EXISTS `departement`;

CREATE TABLE `departement` (
  `iddepartement` char(8) NOT NULL,
  `idgroup` char(5) DEFAULT NULL,
  `namadepartement` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `namahead` varchar(100) DEFAULT NULL,
  `fotohead` varchar(255) DEFAULT NULL,
  `warnapenjadwalan` varchar(25) DEFAULT NULL,
  KEY `idgroup` (`idgroup`),
  CONSTRAINT `departement_ibfk_2` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `desa` */

DROP TABLE IF EXISTS `desa`;

CREATE TABLE `desa` (
  `iddesa` char(9) NOT NULL,
  `idkecamatan` char(7) DEFAULT NULL,
  `namadesa` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`iddesa`),
  KEY `idkecamatan` (`idkecamatan`),
  CONSTRAINT `desa_ibfk_1` FOREIGN KEY (`idkecamatan`) REFERENCES `kecamatan` (`idkecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `disciplescommunity` */

DROP TABLE IF EXISTS `disciplescommunity`;

CREATE TABLE `disciplescommunity` (
  `iddc` char(5) NOT NULL,
  `namadc` varchar(100) DEFAULT NULL,
  `kategoridc` enum('Umum','Youth','Young Adult','Kids','Family') DEFAULT NULL,
  `haridc` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL,
  `jamdc` char(5) DEFAULT NULL,
  `alamatdc` varchar(255) DEFAULT NULL,
  `fotodc` varchar(255) DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `idjemaatdm` char(10) DEFAULT NULL,
  PRIMARY KEY (`iddc`),
  UNIQUE KEY `namadm` (`iddc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `frontmenus` */

DROP TABLE IF EXISTS `frontmenus`;

CREATE TABLE `frontmenus` (
  `idmenu` char(5) NOT NULL,
  `parentidmenu` char(5) DEFAULT NULL,
  `namamenu` varchar(50) DEFAULT NULL,
  `jenismenu` enum('Page Link','Url Link','None','Kategori Link') DEFAULT NULL,
  `idpages` char(15) DEFAULT NULL,
  `linkmenu` varchar(255) DEFAULT NULL,
  `openinnewtab` int(1) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `sysmenu` int(1) DEFAULT NULL,
  `levels` int(2) DEFAULT NULL,
  `nomorurut` int(3) DEFAULT NULL,
  `idpageskategori` char(5) DEFAULT NULL,
  PRIMARY KEY (`idmenu`),
  KEY `idpage` (`idpages`),
  CONSTRAINT `frontmenus_ibfk_2` FOREIGN KEY (`idpages`) REFERENCES `pages` (`idpages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `idgroup` char(5) NOT NULL,
  `namagroup` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `idjemaathead` char(10) DEFAULT NULL,
  `fotogroup` varchar(255) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idgroup`),
  KEY `idjemaathead` (`idjemaathead`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `hagah` */

DROP TABLE IF EXISTS `hagah`;

CREATE TABLE `hagah` (
  `idhagah` char(4) NOT NULL,
  `tahun` char(4) DEFAULT NULL,
  `bulan` char(2) DEFAULT NULL,
  `kitabawal` varchar(50) DEFAULT NULL,
  `pasalawal` int(3) DEFAULT NULL,
  `kitabakhir` varchar(50) DEFAULT NULL,
  `pasalakhir` int(3) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idhagah`),
  KEY `kitabawal` (`kitabawal`),
  KEY `kitabakhir` (`kitabakhir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `hagah_detail` */

DROP TABLE IF EXISTS `hagah_detail`;

CREATE TABLE `hagah_detail` (
  `idhagah` char(4) DEFAULT NULL,
  `namakitab` varchar(50) DEFAULT NULL,
  `pasal1` int(11) DEFAULT NULL,
  `pasal2` int(11) DEFAULT NULL,
  `tglhagah` date DEFAULT NULL,
  `sdnamakitab` varchar(50) DEFAULT NULL,
  `sdpasal1` int(11) DEFAULT NULL,
  `sdpasal2` int(11) DEFAULT NULL,
  KEY `kitab` (`namakitab`),
  KEY `idhagah` (`idhagah`),
  CONSTRAINT `hagah_detail_ibfk_2` FOREIGN KEY (`idhagah`) REFERENCES `hagah` (`idhagah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `hubunganfamily` */

DROP TABLE IF EXISTS `hubunganfamily`;

CREATE TABLE `hubunganfamily` (
  `idhubunganfamily` char(3) NOT NULL,
  `namahubungan` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idhubunganfamily`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `infogereja` */

DROP TABLE IF EXISTS `infogereja`;

CREATE TABLE `infogereja` (
  `namagereja` varchar(255) DEFAULT NULL,
  `alamatgereja` varchar(255) DEFAULT NULL,
  `emailgereja` varchar(50) DEFAULT NULL,
  `notelpgereja` varchar(25) DEFAULT NULL,
  `urltwittergereja` varchar(255) DEFAULT NULL,
  `urlfacebookgereja` varchar(255) DEFAULT NULL,
  `urlinstagramgereja` varchar(255) DEFAULT NULL,
  `urlskipegereja` varchar(255) DEFAULT NULL,
  `urlgooglemaps` varchar(255) DEFAULT NULL,
  `gambarhomepage` varchar(255) DEFAULT NULL,
  `judulhomepage` varchar(255) DEFAULT NULL,
  `subjudulhomepage` varchar(255) DEFAULT NULL,
  `urlbuttonhomepage` varchar(255) DEFAULT NULL,
  `opennewtabbuttonhomepage` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `infostruktural` */

DROP TABLE IF EXISTS `infostruktural`;

CREATE TABLE `infostruktural` (
  `idinfostruktural` char(5) NOT NULL,
  `namastruktural` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `deskripsisingkat` varchar(255) DEFAULT NULL,
  `urlfacebookstruktural` varchar(255) DEFAULT NULL,
  `urltwitterstruktural` varchar(255) DEFAULT NULL,
  `urlinstagramstruktural` varchar(255) DEFAULT NULL,
  `urlskipestruktural` varchar(255) DEFAULT NULL,
  `fotoinfostruktural` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idinfostruktural`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `inventarisruangan` */

DROP TABLE IF EXISTS `inventarisruangan`;

CREATE TABLE `inventarisruangan` (
  `idinventaris` char(5) NOT NULL,
  `namainventaris` varchar(100) DEFAULT NULL,
  `satuan` char(15) DEFAULT NULL,
  `gambarinventaris` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idinventaris`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaldc` */

DROP TABLE IF EXISTS `jadwaldc`;

CREATE TABLE `jadwaldc` (
  `idjadwaldc` char(10) NOT NULL,
  `iddc` char(5) DEFAULT NULL,
  `tanggaljadwaldc` date DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `alamatlokasidc` varchar(255) DEFAULT NULL,
  `thema` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `iddisciplesmmaker` char(15) DEFAULT NULL,
  `idcoreteam1` char(15) DEFAULT NULL,
  `idcoreteam2` char(15) DEFAULT NULL,
  `idcoreteam3` char(15) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idjadwaldc`),
  KEY `iddc` (`iddc`),
  KEY `iddisciplesmmaker` (`iddisciplesmmaker`),
  KEY `idcoreteam1` (`idcoreteam1`),
  KEY `idcoreteam2` (`idcoreteam2`),
  KEY `idcoreteam3` (`idcoreteam3`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaldcabsensi` */

DROP TABLE IF EXISTS `jadwaldcabsensi`;

CREATE TABLE `jadwaldcabsensi` (
  `idjadwaldcabsensi` int(11) NOT NULL AUTO_INCREMENT,
  `idjadwaldc` char(10) DEFAULT NULL,
  `tanggalabsensi` datetime DEFAULT NULL,
  `statuskehadiran` enum('Hadir','Tidak Hadir') DEFAULT NULL,
  `iddcmember` char(15) DEFAULT NULL,
  `statuskeanggotaan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idjadwaldcabsensi`),
  KEY `idjadwaldc` (`idjadwaldc`),
  KEY `iddcmember` (`iddcmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwalevent` */

DROP TABLE IF EXISTS `jadwalevent`;

CREATE TABLE `jadwalevent` (
  `idjadwalevent` char(10) NOT NULL,
  `namaevent` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `idpenanggungjawab` char(10) DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `iddepartement` char(8) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `idpengguna` char(10) DEFAULT NULL,
  `jenisjadwal` enum('Disciple Community','Doa Bersama','Ibadah Jemaat','Latihan Acara/Musik','Meeting','Pelayanan Jemaat','Team Night/Fellowship','Filming','Kelas Next Step') DEFAULT NULL,
  `idpengkhotbah` char(12) DEFAULT NULL,
  `streamingurl` varchar(255) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `subtema` varchar(255) DEFAULT NULL,
  `harusdaftar` int(1) DEFAULT NULL,
  `jumlahvolunteer` int(11) DEFAULT NULL,
  `jumlahjemaat` int(11) DEFAULT NULL,
  `onsitestatus` enum('Ya','Tidak') DEFAULT NULL,
  `aplikasidigunakan` enum('Zoom','Youtube') DEFAULT NULL,
  `diumumkankejemaat` enum('Ya','Tidak') DEFAULT NULL,
  `tglmulaidiumumkan` date DEFAULT NULL,
  `tglselesaidiumumkan` date DEFAULT NULL,
  `pengumumandisampaikanmelalui` enum('Via ESC News','Via Instagram','Via Live di ibadah minggu melalui MC') DEFAULT NULL,
  `konseppengumuman` enum('Slide','Slide + Audio','Filming','Flyer') DEFAULT NULL,
  `detailkonseppengumuman` text DEFAULT NULL,
  `tampilkandiwebsite` enum('Ya','Tidak') DEFAULT NULL,
  `halyangdisampaian` text DEFAULT NULL,
  `rundown` text DEFAULT NULL,
  `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `idpenggunakonfirmasi` char(12) DEFAULT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `keterangankonfirmasi` text DEFAULT NULL,
  `idkelas` char(5) DEFAULT NULL,
  `namapenanggungjawab` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idjadwalevent`),
  KEY `idpenanggungjawab` (`idpenanggungjawab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailinventaris` */

DROP TABLE IF EXISTS `jadwaleventdetailinventaris`;

CREATE TABLE `jadwaleventdetailinventaris` (
  `idjadwladetailinventaris` int(11) NOT NULL AUTO_INCREMENT,
  `idjadwalevent` char(10) DEFAULT NULL,
  `idinventaris` char(5) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`idjadwladetailinventaris`),
  KEY `idjadwalevent` (`idjadwalevent`),
  KEY `idinventaris` (`idinventaris`),
  CONSTRAINT `jadwaleventdetailinventaris_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventdetailinventaris_ibfk_2` FOREIGN KEY (`idinventaris`) REFERENCES `inventarisruangan` (`idinventaris`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailparkiran` */

DROP TABLE IF EXISTS `jadwaleventdetailparkiran`;

CREATE TABLE `jadwaleventdetailparkiran` (
  `idjadwaldetailparkiran` int(11) NOT NULL AUTO_INCREMENT,
  `idparkiran` char(3) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  PRIMARY KEY (`idjadwaldetailparkiran`),
  KEY `idparkiran` (`idparkiran`),
  KEY `idjadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventdetailparkiran_ibfk_1` FOREIGN KEY (`idparkiran`) REFERENCES `parkiran` (`idparkiran`),
  CONSTRAINT `jadwaleventdetailparkiran_ibfk_2` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailpelayanan` */

DROP TABLE IF EXISTS `jadwaleventdetailpelayanan`;

CREATE TABLE `jadwaleventdetailpelayanan` (
  `idjadwaldetailpelayanan` int(11) NOT NULL AUTO_INCREMENT,
  `idpelayanan` char(5) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  PRIMARY KEY (`idjadwaldetailpelayanan`),
  KEY `idpelayanan` (`idpelayanan`),
  KEY `idjadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventdetailpelayanan_ibfk_1` FOREIGN KEY (`idpelayanan`) REFERENCES `pelayanan` (`idpelayanan`),
  CONSTRAINT `jadwaleventdetailpelayanan_ibfk_2` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=500 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailruangan` */

DROP TABLE IF EXISTS `jadwaleventdetailruangan`;

CREATE TABLE `jadwaleventdetailruangan` (
  `idjadwaldatailruangan` int(11) NOT NULL AUTO_INCREMENT,
  `idruangan` char(3) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  PRIMARY KEY (`idjadwaldatailruangan`),
  KEY `idruangan` (`idruangan`),
  KEY `idjadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventdetailruangan_ibfk_1` FOREIGN KEY (`idruangan`) REFERENCES `ruanganacara` (`idruangan`),
  CONSTRAINT `jadwaleventdetailruangan_ibfk_2` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailtanggal` */

DROP TABLE IF EXISTS `jadwaleventdetailtanggal`;

CREATE TABLE `jadwaleventdetailtanggal` (
  `idjadwaleventdetail` int(11) NOT NULL AUTO_INCREMENT,
  `idjadwalevent` char(10) DEFAULT NULL,
  `tgljadwaleventmulai` date DEFAULT NULL,
  `tgljadwaleventselesai` date DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `diulangsetiapminggu` enum('Ya','Tidak') DEFAULT NULL,
  `lokasievent` varchar(100) DEFAULT NULL,
  KEY `idjadwalevent` (`idjadwalevent`),
  KEY `idjadwaleventdetail` (`idjadwaleventdetail`),
  CONSTRAINT `jadwaleventdetailtanggal_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventdetailtanggal_2` */

DROP TABLE IF EXISTS `jadwaleventdetailtanggal_2`;

CREATE TABLE `jadwaleventdetailtanggal_2` (
  `iddetailtanggal2` int(11) NOT NULL AUTO_INCREMENT,
  `idjadwaleventdetail` int(11) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  `tgljadwal` date DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  PRIMARY KEY (`iddetailtanggal2`),
  KEY `idjadwaleventdetail` (`idjadwaleventdetail`),
  KEY `idjadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventdetailtanggal_2_ibfk_1` FOREIGN KEY (`idjadwaleventdetail`) REFERENCES `jadwaleventdetailtanggal` (`idjadwaleventdetail`),
  CONSTRAINT `jadwaleventdetailtanggal_2_ibfk_2` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=300 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventjenispengumuman` */

DROP TABLE IF EXISTS `jadwaleventjenispengumuman`;

CREATE TABLE `jadwaleventjenispengumuman` (
  `idjadwalevent` char(10) DEFAULT NULL,
  `idjenispengumuman` char(2) DEFAULT NULL,
  UNIQUE KEY `idjadwalevent` (`idjadwalevent`,`idjenispengumuman`),
  KEY `idjenispengumuman` (`idjenispengumuman`),
  CONSTRAINT `jadwaleventjenispengumuman_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventjenispengumuman_ibfk_2` FOREIGN KEY (`idjenispengumuman`) REFERENCES `jenispengumuman` (`idjenispengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventkonfirmasi` */

DROP TABLE IF EXISTS `jadwaleventkonfirmasi`;

CREATE TABLE `jadwaleventkonfirmasi` (
  `idkonfirmasi` char(10) NOT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak','Koreksi') DEFAULT NULL,
  `keterangankonfirmasi` varchar(255) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `idpengguna` char(10) DEFAULT NULL,
  PRIMARY KEY (`idkonfirmasi`),
  KEY `idjadwalevent` (`idjadwalevent`),
  KEY `idpengguna` (`idpengguna`),
  CONSTRAINT `jadwaleventkonfirmasi_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`),
  CONSTRAINT `jadwaleventkonfirmasi_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `jemaat` (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwaleventregistrasi` */

DROP TABLE IF EXISTS `jadwaleventregistrasi`;

CREATE TABLE `jadwaleventregistrasi` (
  `idregistrasi` char(10) NOT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  `tglregistrasi` datetime DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') DEFAULT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `idpenggunakonfirmasi` char(10) DEFAULT NULL,
  `keterangankonfirmasi` text DEFAULT NULL,
  PRIMARY KEY (`idregistrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jadwalibadahmingguan` */

DROP TABLE IF EXISTS `jadwalibadahmingguan`;

CREATE TABLE `jadwalibadahmingguan` (
  `idjadwalibadahmingguan` char(10) NOT NULL,
  `tanggaljadwal` datetime DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `subtema` varchar(255) DEFAULT NULL,
  `idpengkhotbah` char(12) DEFAULT NULL,
  `videoembed` varchar(255) DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idjadwalibadahmingguan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jemaat` */

DROP TABLE IF EXISTS `jemaat`;

CREATE TABLE `jemaat` (
  `idjemaat` char(10) NOT NULL,
  `noaj` char(15) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `kewarganegaraan` enum('Indonesia','Asing') DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `namapanggilan` varchar(50) DEFAULT NULL,
  `tempatlahir` varchar(50) DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `statuspernikahan` enum('Belum Kawin','Kawin','Janda/ Duda') DEFAULT NULL,
  `golongandarah` enum('A','B','AB','O') DEFAULT NULL,
  `notelp` char(16) DEFAULT NULL,
  `nohp` char(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `namadarurat` varchar(100) DEFAULT NULL,
  `hubungan` enum('Istri/ Suami','Ibu','Ayah','Anak','Saudara','Kerabat') DEFAULT NULL,
  `notelpdarurat` char(16) DEFAULT NULL,
  `pendidikanterakhir` enum('SD','SMP','SMA/SMK','D3','D3','D1','S1','S2','S3','Lainnya') DEFAULT NULL,
  `namasekolah` varchar(50) DEFAULT NULL,
  `pekerjaan` enum('Swasta','Pegawai Negeri','TNI','POLRI','Wiraswasta') DEFAULT NULL,
  `namaperusahaan` varchar(50) DEFAULT NULL,
  `sektorindustri` varchar(50) DEFAULT NULL,
  `alamatkantor` varchar(255) DEFAULT NULL,
  `notelpkantor` char(16) DEFAULT NULL,
  `alamatrumah` varchar(255) DEFAULT NULL,
  `rtrw` varchar(7) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kotakabupaten` varchar(50) DEFAULT NULL,
  `propinsi` varchar(50) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `foto` varchar(155) DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `statusjemaat` enum('Jemaat','Simpatisan','Umum') DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `idlokasi` char(3) DEFAULT NULL,
  `idposisidalamkeluarga` char(1) NOT NULL DEFAULT '1',
  `statusverifikasiemail` int(1) DEFAULT 0,
  PRIMARY KEY (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jemaatfamily` */

DROP TABLE IF EXISTS `jemaatfamily`;

CREATE TABLE `jemaatfamily` (
  `idjemaatfamily` int(11) NOT NULL AUTO_INCREMENT,
  `nokaj` char(5) DEFAULT NULL,
  `idjemaat` char(10) NOT NULL,
  `idhubunganfamily` char(3) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idjemaatfamily`),
  UNIQUE KEY `idjemaat` (`idjemaat`),
  KEY `idhubunganfamily` (`idhubunganfamily`),
  CONSTRAINT `jemaatfamily_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `jemaatfamily_ibfk_2` FOREIGN KEY (`idhubunganfamily`) REFERENCES `hubunganfamily` (`idhubunganfamily`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `jenispengumuman` */

DROP TABLE IF EXISTS `jenispengumuman`;

CREATE TABLE `jenispengumuman` (
  `idjenispengumuman` char(2) NOT NULL,
  `namajenispengumuman` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idjenispengumuman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `kabupaten` */

DROP TABLE IF EXISTS `kabupaten`;

CREATE TABLE `kabupaten` (
  `idkabupaten` char(5) NOT NULL,
  `idprovinsi` char(3) DEFAULT NULL,
  `namakabupaten` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkabupaten`),
  KEY `idprovinsi` (`idprovinsi`),
  CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`idprovinsi`) REFERENCES `provinsi` (`idprovinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `kecamatan` */

DROP TABLE IF EXISTS `kecamatan`;

CREATE TABLE `kecamatan` (
  `idkecamatan` char(7) NOT NULL,
  `idkabupaten` char(5) DEFAULT NULL,
  `namakecamatan` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkecamatan`),
  KEY `idkabupaten` (`idkabupaten`),
  CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`idkabupaten`) REFERENCES `kabupaten` (`idkabupaten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idkelas` char(5) NOT NULL,
  `namakelas` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `urlsertifikat` varchar(255) DEFAULT NULL,
  `kelas_slug` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `kelasmateri` */

DROP TABLE IF EXISTS `kelasmateri`;

CREATE TABLE `kelasmateri` (
  `idkelasmateri` char(10) NOT NULL,
  `idkelas` char(5) DEFAULT NULL,
  `judulmateri` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idkelasmateri`) USING BTREE,
  KEY `idkelas` (`idkelas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

/*Table structure for table `kitab` */

DROP TABLE IF EXISTS `kitab`;

CREATE TABLE `kitab` (
  `idkitab` int(11) NOT NULL AUTO_INCREMENT,
  `bagianalkitab` varchar(25) DEFAULT NULL,
  `namakitab` varchar(50) DEFAULT NULL,
  `pasal` int(3) DEFAULT NULL,
  `judul` text DEFAULT NULL,
  `ayat` int(3) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `externalid` char(25) DEFAULT NULL,
  PRIMARY KEY (`idkitab`)
) ENGINE=InnoDB AUTO_INCREMENT=3589 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `lokasigereja` */

DROP TABLE IF EXISTS `lokasigereja`;

CREATE TABLE `lokasigereja` (
  `idlokasi` char(3) NOT NULL,
  `namagereja` varchar(100) DEFAULT NULL,
  `alamatgereja` varchar(255) DEFAULT NULL,
  `namagembala` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idlokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `otorisasi` */

DROP TABLE IF EXISTS `otorisasi`;

CREATE TABLE `otorisasi` (
  `idotorisasi` char(4) NOT NULL,
  `namaotorisasi` varbinary(50) DEFAULT NULL,
  PRIMARY KEY (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `otorisasimenus` */

DROP TABLE IF EXISTS `otorisasimenus`;

CREATE TABLE `otorisasimenus` (
  `idotorisasi` char(4) DEFAULT NULL,
  `idmenu` char(5) DEFAULT NULL,
  KEY `idotorisasi` (`idotorisasi`),
  CONSTRAINT `otorisasimenus_ibfk_1` FOREIGN KEY (`idotorisasi`) REFERENCES `otorisasi` (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `otorisasiuser` */

DROP TABLE IF EXISTS `otorisasiuser`;

CREATE TABLE `otorisasiuser` (
  `idotorisasi` char(4) DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  UNIQUE KEY `idjemaat` (`idjemaat`),
  KEY `idotorisasi` (`idotorisasi`),
  CONSTRAINT `otorisasiuser_ibfk_1` FOREIGN KEY (`idotorisasi`) REFERENCES `otorisasi` (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `ourservice` */

DROP TABLE IF EXISTS `ourservice`;

CREATE TABLE `ourservice` (
  `idourservice` char(5) NOT NULL,
  `namaourservice` varchar(255) DEFAULT NULL,
  `deskripsisingkat` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `rangeumur` varchar(25) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `urlvideo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idourservice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `ourservicedetail` */

DROP TABLE IF EXISTS `ourservicedetail`;

CREATE TABLE `ourservicedetail` (
  `idourservice` char(5) DEFAULT NULL,
  `tglourservice` date DEFAULT NULL,
  `subtema` varchar(255) DEFAULT NULL,
  `namapastor` varchar(255) DEFAULT NULL,
  `urlyoutube` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  KEY `idourservice` (`idourservice`),
  CONSTRAINT `ourservicedetail_ibfk_1` FOREIGN KEY (`idourservice`) REFERENCES `ourservice` (`idourservice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `idpages` char(15) NOT NULL,
  `idpageskategori` char(5) DEFAULT NULL,
  `namapages` varchar(100) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `isipages` text DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `jumlahdilihat` int(11) DEFAULT 0,
  `ringkasan` text DEFAULT NULL,
  PRIMARY KEY (`idpages`),
  UNIQUE KEY `slug` (`slug`),
  KEY `pages_ibfk_1` (`idjemaat`),
  KEY `idpageskategori` (`idpageskategori`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`idpageskategori`) REFERENCES `pageskategori` (`idpageskategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `pageskategori` */

DROP TABLE IF EXISTS `pageskategori`;

CREATE TABLE `pageskategori` (
  `idpageskategori` char(5) NOT NULL,
  `namapageskategori` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambarkategori` varchar(255) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  PRIMARY KEY (`idpageskategori`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `parkiran` */

DROP TABLE IF EXISTS `parkiran`;

CREATE TABLE `parkiran` (
  `idparkiran` char(3) NOT NULL,
  `namaparkiran` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idparkiran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `pelayanan` */

DROP TABLE IF EXISTS `pelayanan`;

CREATE TABLE `pelayanan` (
  `idpelayanan` char(5) NOT NULL,
  `namapelayanan` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idpelayanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `pengkhotbah` */

DROP TABLE IF EXISTS `pengkhotbah`;

CREATE TABLE `pengkhotbah` (
  `idpengkhotbah` char(12) NOT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `tanggalskpengkotbah` datetime DEFAULT NULL,
  `tanggalskberakhir` datetime DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idpengkhotbah`),
  KEY `idjemaat` (`idjemaat`),
  CONSTRAINT `pengkhotbah_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `posisidalamkeluarga` */

DROP TABLE IF EXISTS `posisidalamkeluarga`;

CREATE TABLE `posisidalamkeluarga` (
  `idposisidalamkeluarga` char(1) NOT NULL,
  `namaposisidalamkeluarga` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idposisidalamkeluarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `provinsi` */

DROP TABLE IF EXISTS `provinsi`;

CREATE TABLE `provinsi` (
  `idprovinsi` char(3) NOT NULL,
  `namaprovinsi` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idprovinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `registrasikelas` */

DROP TABLE IF EXISTS `registrasikelas`;

CREATE TABLE `registrasikelas` (
  `idregistrasikelas` char(15) NOT NULL,
  `tglregistrasikelas` date DEFAULT NULL,
  `tglsertifikat` date DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `idkelas` char(5) DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `idpengguna` char(10) DEFAULT NULL,
  `nomorsertifikat` varchar(25) DEFAULT NULL,
  `linkurlsertifikat` varchar(255) DEFAULT NULL,
  `statuslulus` int(1) DEFAULT NULL,
  `idjadwalevent` char(10) DEFAULT NULL,
  `statuskonfirmasi` enum('Disetujui','Ditolak','Menunggu') DEFAULT NULL,
  `idpenggunakonfirmasi` char(10) DEFAULT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `keterangankonfirmasi` text DEFAULT NULL,
  `idregistrasijadwal` char(10) DEFAULT NULL,
  PRIMARY KEY (`idregistrasikelas`),
  KEY `idjemaat` (`idjemaat`),
  KEY `idkelas` (`idkelas`),
  CONSTRAINT `registrasikelas_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `registrasikelas_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `registrasikelasmateri` */

DROP TABLE IF EXISTS `registrasikelasmateri`;

CREATE TABLE `registrasikelasmateri` (
  `idregistrasikelasmateri` char(20) NOT NULL,
  `idregistrasikelas` char(15) DEFAULT NULL,
  `idkelasmateri` char(10) DEFAULT NULL,
  `judulmateri` varchar(100) DEFAULT NULL,
  `tglpelaksanaan` date DEFAULT NULL,
  `nilaimateri` char(3) DEFAULT NULL,
  PRIMARY KEY (`idregistrasikelasmateri`),
  KEY `idregistrasikelas` (`idregistrasikelas`),
  CONSTRAINT `registrasikelasmateri_ibfk_1` FOREIGN KEY (`idregistrasikelas`) REFERENCES `registrasikelas` (`idregistrasikelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `ruanganacara` */

DROP TABLE IF EXISTS `ruanganacara`;

CREATE TABLE `ruanganacara` (
  `idruangan` char(3) NOT NULL,
  `namaruangan` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `ruangangedung` */

DROP TABLE IF EXISTS `ruangangedung`;

CREATE TABLE `ruangangedung` (
  `idruangan` char(3) NOT NULL,
  `namaruangan` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `sesiibadahminggu` */

DROP TABLE IF EXISTS `sesiibadahminggu`;

CREATE TABLE `sesiibadahminggu` (
  `idsesi` char(3) NOT NULL,
  `namasesi` varchar(255) DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idsesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `sidemenus` */

DROP TABLE IF EXISTS `sidemenus`;

CREATE TABLE `sidemenus` (
  `idotorisasi` char(4) DEFAULT NULL,
  `idmenu` char(5) DEFAULT NULL,
  `isdropdown` int(1) DEFAULT NULL,
  `menuonselected` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Table structure for table `site_log` */

DROP TABLE IF EXISTS `site_log`;

CREATE TABLE `site_log` (
  `site_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_of_visits` int(10) unsigned NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `requested_url` tinytext NOT NULL,
  `referer_page` tinytext NOT NULL,
  `page_name` tinytext NOT NULL,
  `query_string` tinytext NOT NULL,
  `user_agent` tinytext NOT NULL,
  `is_unique` tinyint(1) NOT NULL DEFAULT 0,
  `access_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `visits_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`site_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21915 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Table structure for table `site_online` */

DROP TABLE IF EXISTS `site_online`;

CREATE TABLE `site_online` (
  `site_online_id` int(10) NOT NULL AUTO_INCREMENT,
  `idusers` tinytext DEFAULT NULL,
  `lastseen` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_users` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`site_online_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12812 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/* Function  structure for function  `create_idabsen` */

/*!50003 DROP FUNCTION IF EXISTS `create_idabsen` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idabsen`(`var_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = CONCAT(DATE_FORMAT(var_tgl, '%y%m%d')) ;
	
	SELECT MAX(RIGHT(RTRIM(idabsen),jumlah_digit)) FROM absen  
		WHERE LEFT(idabsen,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idaktaanak` */

/*!50003 DROP FUNCTION IF EXISTS `create_idaktaanak` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idaktaanak`(`var_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cTgl CHAR(7);
		
	SET cTgl = concat(DATE_FORMAT(var_tgl, '%y%m%d'), 'A') ;
	
	SELECT MAX(RIGHT(RTRIM(idakta),jumlah_digit)) FROM aktapenyerahananak  
		WHERE LEFT(idakta,7) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idaktabaptisan` */

/*!50003 DROP FUNCTION IF EXISTS `create_idaktabaptisan` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idaktabaptisan`(`var_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cTgl CHAR(7);
		
	SET cTgl = concat(DATE_FORMAT(var_tgl, '%y%m%d') , 'B')  ;
	
	SELECT MAX(RIGHT(RTRIM(idakta),jumlah_digit)) FROM aktabaptisan  
		WHERE LEFT(idakta,7) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idaktanikah` */

/*!50003 DROP FUNCTION IF EXISTS `create_idaktanikah` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idaktanikah`(`var_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cTgl CHAR(7);
		
	SET cTgl = concat(DATE_FORMAT(var_tgl, '%y%m%d') , 'N')  ;
	
	SELECT MAX(RIGHT(RTRIM(idakta),jumlah_digit)) FROM aktanikah  
		WHERE LEFT(idakta,7) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idcabangakta` */

/*!50003 DROP FUNCTION IF EXISTS `create_idcabangakta` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idcabangakta`(`var_namacabang` VARCHAR(100)) RETURNS char(5) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE var_singkat CHAR(2);
	
	SET var_singkat = create_unix_name(var_namacabang, 2); -- contohnya DKB
	
	SELECT MAX(RIGHT(RTRIM(idcabangakta),jumlah_digit)) FROM aktacabang  
		WHERE LEFT(idcabangakta,2) = var_singkat INTO cNosekarang;	-- 02
	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 3
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "3"
	SET nlen = LENGTH(cNoselanjutnya); -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "03"
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_singkat, cNoselanjutnya); -- DKB03
    END */$$
DELIMITER ;

/* Function  structure for function  `create_iddaerahakta` */

/*!50003 DROP FUNCTION IF EXISTS `create_iddaerahakta` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_iddaerahakta`(`var_namadaerah` VARCHAR(100)) RETURNS char(5) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE var_singkat CHAR(2);
	
	SET var_singkat = create_unix_name(var_namadaerah, 2); -- contohnya DKB
	
	SELECT MAX(RIGHT(RTRIM(iddaerahakta),jumlah_digit)) FROM aktadaerah  
		WHERE LEFT(iddaerahakta,2) = var_singkat INTO cNosekarang;	-- 02
	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 3
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "3"
	SET nlen = LENGTH(cNoselanjutnya); -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "03"
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_singkat, cNoselanjutnya); -- DKB03
    END */$$
DELIMITER ;

/* Function  structure for function  `create_iddc` */

/*!50003 DROP FUNCTION IF EXISTS `create_iddc` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_iddc`(`var_namadc` VARCHAR(100)) RETURNS char(5) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(2);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(2);
	DECLARE jumlah_digit INT DEFAULT 2;
	DECLARE var_singkat CHAR(3);
	
	SET var_singkat = create_unix_name(var_namadc, 3); -- contohnya DKB
	
	SELECT MAX(RIGHT(RTRIM(iddc),jumlah_digit)) FROM disciplescommunity  
		WHERE LEFT(iddc,3) = var_singkat INTO cNosekarang;	-- 02
	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 3
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "3"
	SET nlen = LENGTH(cNoselanjutnya); -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "03"
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_singkat, cNoselanjutnya); -- DKB03
    END */$$
DELIMITER ;

/* Function  structure for function  `create_iddcmember` */

/*!50003 DROP FUNCTION IF EXISTS `create_iddcmember` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_iddcmember`(`variddc` CHAR(5)) RETURNS char(10) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(5);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(5);
	DECLARE jumlah_digit INT DEFAULT 5;
	DECLARE ctgl CHAR(5);
	
	SET cTgl = variddc;
	
	SELECT MAX(RIGHT(RTRIM(iddcmember),jumlah_digit)) FROM dcmember  
		WHERE LEFT(iddc,5) = cTgl INTO cNosekarang;	-- 02
	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 3
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "3"
	SET nlen = LENGTH(cNoselanjutnya); -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "03"
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(variddc, cNoselanjutnya); -- DKB03
    END */$$
DELIMITER ;

/* Function  structure for function  `create_iddepartement` */

/*!50003 DROP FUNCTION IF EXISTS `create_iddepartement` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_iddepartement`(`var_idgroup` CHAR(5)) RETURNS char(8) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	
	SELECT MAX(RIGHT(RTRIM(iddepartement),jumlah_digit)) FROM departement  
		WHERE LEFT(iddepartement,5) = var_idgroup INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_idgroup, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idgroup` */

/*!50003 DROP FUNCTION IF EXISTS `create_idgroup` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idgroup`() RETURNS char(5) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(5);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(5);
	DECLARE jumlah_digit INT DEFAULT 5;
	
	SELECT MAX(RIGHT(RTRIM(idgroup),jumlah_digit)) FROM `group` INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idhagah` */

/*!50003 DROP FUNCTION IF EXISTS `create_idhagah` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idhagah`(`_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	-- 230121
	RETURN CONCAT(cTgl);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idjadwalevent` */

/*!50003 DROP FUNCTION IF EXISTS `create_idjadwalevent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idjadwalevent`(`_tgl` DATE) RETURNS char(10) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = concat('JE', DATE_FORMAT(_tgl, '%y%m')); -- JE2208 (Jadwal Event)
	
	SELECT MAX(RIGHT(RTRIM(idjadwalevent),jumlah_digit)) FROM jadwalevent  
		WHERE LEFT(idjadwalevent,6) = CONCAT(cTgl) INTO cNosekarang;	-- cNosekarang = belum ada maka hasilnya = NULL
	
	
	SET cNosekarang = IF( ISNULL(cNosekarang), 0 ,cNosekarang); --
	
	/**
	********************************************************************
	brapa cNosekarang 
	**/
	
	
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 1
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "1"
	SET nlen = LENGTH(cNoselanjutnya);  -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "0001"
		SET nlen=nlen+1;
	END WHILE;	
	
	
	RETURN CONCAT(cTgl, cNoselanjutnya); -- "2208060001"
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idjadwalibadah` */

/*!50003 DROP FUNCTION IF EXISTS `create_idjadwalibadah` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idjadwalibadah`(`_tgl` DATE) RETURNS char(10) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d'); -- 220806
	
	SELECT MAX(RIGHT(RTRIM(idjadwalibadahmingguan),jumlah_digit)) FROM jadwalibadahmingguan  
		WHERE LEFT(idjadwalibadahmingguan,6) = CONCAT(cTgl) INTO cNosekarang;	-- cNosekarang = belum ada maka hasilnya = NULL
	
	
	SET cNosekarang = IF( ISNULL(cNosekarang), 0 ,cNosekarang); --
	
	/**
	********************************************************************
	brapa cNosekarang 
	**/
	
	
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1; -- 1
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR)); -- "1"
	SET nlen = LENGTH(cNoselanjutnya);  -- 1
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya); -- "0001"
		SET nlen=nlen+1;
	END WHILE;	
	
	
	RETURN CONCAT(cTgl, cNoselanjutnya); -- "2208060001"
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idjemaat` */

/*!50003 DROP FUNCTION IF EXISTS `create_idjemaat` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idjemaat`(`_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idjemaat),jumlah_digit)) FROM jemaat  
		WHERE LEFT(idjemaat,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idmenu` */

/*!50003 DROP FUNCTION IF EXISTS `create_idmenu` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idmenu`(`varnamamenu` VARCHAR(50)) RETURNS char(5) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cunix CHAR(2);
	
	SET cunix = create_unix_name(varnamamenu, 2);
	
	SELECT MAX(RIGHT(RTRIM(idmenu),jumlah_digit)) FROM `frontmenus` WHERE LEFT(idmenu,2) = cunix INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cunix, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idotorisasi` */

/*!50003 DROP FUNCTION IF EXISTS `create_idotorisasi` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idotorisasi`() RETURNS char(4) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	
	SELECT MAX(idotorisasi) FROM otorisasi INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idourservice` */

/*!50003 DROP FUNCTION IF EXISTS `create_idourservice` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idourservice`(`var_namaourservice` varchar(255)) RETURNS char(5) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cunix CHAR(2);
	
	SET cunix = create_unix_name(var_namaourservice, 2); 
	
	SELECT MAX(RIGHT(RTRIM(idourservice),jumlah_digit)) FROM ourservice  
		WHERE LEFT(idourservice,2) = CONCAT(cunix) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cunix, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idpages` */

/*!50003 DROP FUNCTION IF EXISTS `create_idpages` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idpages`(`var_tgl` DATE, `var_idpagekategori` CHAR(5)) RETURNS char(15) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(11);
		
	SET cTgl = CONCAT(var_idpagekategori, DATE_FORMAT(var_tgl, '%y%m%d')) ;
	
	SELECT MAX(RIGHT(RTRIM(idpages),jumlah_digit)) FROM pages  
		WHERE LEFT(idpages,11) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idpageskategori` */

/*!50003 DROP FUNCTION IF EXISTS `create_idpageskategori` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idpageskategori`(`var_namapageskategori` VARCHAR(255)) RETURNS char(5) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN	
	DECLARE cNosekarang CHAR(3);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(3);
	DECLARE jumlah_digit INT DEFAULT 3;
	DECLARE cTgl CHAR(2);
	
	SELECT create_unix_name(var_namapageskategori,2) INTO cTgl;
	
	SELECT MAX(RIGHT(RTRIM(idpageskategori),jumlah_digit)) FROM pageskategori  
		WHERE LEFT(idpageskategori,2) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idpengkhotbah` */

/*!50003 DROP FUNCTION IF EXISTS `create_idpengkhotbah` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idpengkhotbah`(`var_idjemaat` CHAR(10)) RETURNS char(12) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(2);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(2);
	DECLARE jumlah_digit INT DEFAULT 2;
	
	SELECT MAX(RIGHT(RTRIM(idpengkhotbah),jumlah_digit)) FROM pengkhotbah  
		WHERE LEFT(idpengkhotbah,10) = var_idjemaat INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_idjemaat, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idregistrasievent` */

/*!50003 DROP FUNCTION IF EXISTS `create_idregistrasievent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idregistrasievent`(`_tgl` DATE) RETURNS char(10) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(6);
		
	SET cTgl = DATE_FORMAT(_tgl, '%y%m%d');
	
	SELECT MAX(RIGHT(RTRIM(idregistrasi),jumlah_digit)) FROM jadwaleventregistrasi  
		WHERE LEFT(idregistrasi,6) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idregistrasikelas` */

/*!50003 DROP FUNCTION IF EXISTS `create_idregistrasikelas` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idregistrasikelas`(`_tgl` DATE, `varidkelas` CHAR(5)) RETURNS char(15) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(4);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(4);
	DECLARE jumlah_digit INT DEFAULT 4;
	DECLARE cTgl CHAR(11);
		
	SET cTgl = CONCAT(varidkelas, DATE_FORMAT(_tgl, '%y%m%d')) ;
	
	SELECT MAX(RIGHT(RTRIM(idregistrasikelas),jumlah_digit)) FROM registrasikelas  
		WHERE LEFT(idregistrasikelas,11) = CONCAT(cTgl) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cTgl, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_idregistrasikelasmateri` */

/*!50003 DROP FUNCTION IF EXISTS `create_idregistrasikelasmateri` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_idregistrasikelasmateri`(`var_idregistrasikelas` CHAR(15)) RETURNS char(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci
BEGIN
	DECLARE cNosekarang CHAR(5);
	DECLARE nlen INT;
	DECLARE nNoselanjutnya INT;
	DECLARE cNoselanjutnya CHAR(5);
	DECLARE jumlah_digit INT DEFAULT 5;
	
	SELECT MAX(RIGHT(RTRIM(idregistrasikelasmateri),jumlah_digit)) FROM registrasikelasmateri  
		WHERE LEFT(idregistrasikelasmateri,15) = CONCAT(var_idregistrasikelas) INTO cNosekarang;	
	SET cNosekarang = IF(ISNULL(cNosekarang),0,cNosekarang);
	
	SET nNoselanjutnya = CONVERT(cNosekarang,INT)+1;
	SET cNoselanjutnya = RTRIM(CONVERT(nNoselanjutnya,CHAR));
	SET nlen = LENGTH(cNoselanjutnya);
	
	WHILE nlen+1 <= jumlah_digit DO		
		SET cNoselanjutnya= CONCAT('0',cNoselanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(var_idregistrasikelas, cNoselanjutnya);
    END */$$
DELIMITER ;

/* Function  structure for function  `create_noaj` */

/*!50003 DROP FUNCTION IF EXISTS `create_noaj` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_noaj`() RETURNS char(7) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNoselanjutnya CHAR(7);
	declare cNosekarang char(7);
	declare iNoselanjutnya int(11);
	
	SELECT MAX(RIGHT(RTRIM(noaj),7)) FROM jemaat INTO cNosekarang;	
	IF cNosekarang IS NULL THEN 
		SET cNoSekarang = "0";
	END IF;
	set iNoselanjutnya = convert(cNosekarang , int) + 1;
	set cNoselanjutnya = replwz(convert(iNoselanjutnya, char), 7);
	
	return cNoselanjutnya;
    END */$$
DELIMITER ;

/* Function  structure for function  `create_NoAJ_New` */

/*!50003 DROP FUNCTION IF EXISTS `create_NoAJ_New` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_NoAJ_New`(`varLokasiGereja` CHAR(3), `varPosisi` CHAR(1)) RETURNS char(18) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE nlen INT;
	DECLARE varNomorKKSekarang CHAR(5);
	DECLARE varNomorKKSelanjutnya CHAR(5);
	
	DECLARE cNoAnggotaSekarang CHAR(6);
	DECLARE cNoAnggotaSelanjutnya CHAR(6);
	
	SELECT MAX(SUBSTRING(noaj,5,5)) INTO varNomorKKSekarang FROM jemaat;
	
	SET varNomorKKSelanjutnya = CONVERT(varNomorKKSekarang,INT)+1;
	SET varNomorKKSelanjutnya = RTRIM(CONVERT(varNomorKKSelanjutnya,CHAR));
	SET nlen = LENGTH(varNomorKKSelanjutnya);
	WHILE nlen+1 <= 5 DO		
		SET varNomorKKSelanjutnya= CONCAT('0',varNomorKKSelanjutnya);
		SET nlen=nlen+1;
	END WHILE;
	
	
	SELECT MAX(RIGHT(noaj,6)) INTO cNoAnggotaSekarang FROM jemaat;
	SET cNoAnggotaSelanjutnya = CONVERT(cNoAnggotaSekarang,INT)+1;
	SET cNoAnggotaSelanjutnya = RTRIM(CONVERT(cNoAnggotaSelanjutnya,CHAR));
	SET nlen = LENGTH(cNoAnggotaSelanjutnya);
	WHILE nlen+1 <= 6 DO		
		SET cNoAnggotaSelanjutnya= CONCAT('0',cNoAnggotaSelanjutnya);
		SET nlen=nlen+1;
	END WHILE;	
	
	
	RETURN CONCAT(varLokasiGereja, '.', varNomorKKSelanjutnya, '.', varPosisi, '-', cNoAnggotaSelanjutnya);
	
    END */$$
DELIMITER ;

/* Function  structure for function  `create_nokaj` */

/*!50003 DROP FUNCTION IF EXISTS `create_nokaj` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_nokaj`() RETURNS char(5) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE cNoselanjutnya CHAR(5);
	declare cNosekarang char(5);
	declare iNoselanjutnya int(11);
	
	SELECT MAX(RIGHT(RTRIM(nokaj),5)) FROM jemaatfamily INTO cNosekarang;	
	if cNosekarang is null then 
		set cNoSekarang = "0";
	end if;
	set iNoselanjutnya = convert(cNosekarang , int) + 1;
	set cNoselanjutnya = replwz(convert(iNoselanjutnya, char), 5);
	
	return cNoselanjutnya;
    END */$$
DELIMITER ;

/* Function  structure for function  `create_unix_name` */

/*!50003 DROP FUNCTION IF EXISTS `create_unix_name` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `create_unix_name`(`var_string` VARCHAR(255), `var_length` INT(11)) RETURNS char(10) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	DECLARE var_return CHAR(10);
	DECLARE var_char CHAR(1);
	DECLARE posisi_space INT(11);	
	DECLARE posisi_space_temp INT(11);	
	DECLARE i INT(11);
	
	SET posisi_space = 0;
	SET posisi_space_temp = 0;
	SET i = 0;
	IF LEFT(var_string,2) IN ('PT', 'CV', 'UD') THEN
		SET var_return = '';
	ELSE
		SET var_return = LEFT(var_string,1);
		SET var_length = var_length-1;
	END IF;
	
	LoopChar: WHILE i < var_length DO
			
			SET posisi_space_temp = LOCATE(' ' ,var_string, posisi_space+1);
			IF posisi_space_temp = 0 THEN 
				-- leave LoopChar;
				SET var_char = SUBSTRING('ABCDEFGHIJKLMNOPQRSTUVWXYZ', FLOOR(RAND()*(25-1)+1), 1);
				SET var_return = CONCAT(var_return, var_char);
			ELSE
				SET posisi_space = posisi_space_temp;
				SET var_char = SUBSTRING(var_string, posisi_space+1, 1);
				IF TRIM(var_char) <> '' THEN
					SET var_return = CONCAT(var_return, var_char);
				ELSE
					SET var_char = SUBSTRING('ABCDEFGHIJKLMNOPQRSTUVWXYZ', FLOOR(RAND()*(25-1)+1), 1);
					SET var_return = CONCAT(var_return, var_char);
				END IF;
			END IF;
			SET i = i +1;
		END WHILE LoopChar;	
		
		
	RETURN UPPER(var_return);
    END */$$
DELIMITER ;

/* Function  structure for function  `f_gettglmulaievent` */

/*!50003 DROP FUNCTION IF EXISTS `f_gettglmulaievent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_gettglmulaievent`(`var_idjadwalevent` CHAR(10)) RETURNS datetime
BEGIN
	declare var_TglMulai datetime;
	
	select concat(tgljadwaleventmulai, ' ' ,jammulai) into var_TglMulai from jadwaleventdetailtanggal where idjadwalevent = var_idjadwalevent order by tgljadwaleventmulai limit 1;
	return var_TglMulai;
    END */$$
DELIMITER ;

/* Function  structure for function  `f_gettglselesaievent` */

/*!50003 DROP FUNCTION IF EXISTS `f_gettglselesaievent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_gettglselesaievent`(`var_idjadwalevent` CHAR(10)) RETURNS datetime
BEGIN
	declare var_tglselesai datetime;
	
	select concat(tgljadwal, ' ' ,jamselesai) into var_tglselesai from jadwaleventdetailtanggal_2 where idjadwalevent = var_idjadwalevent order by tgljadwal desc limit 1;
	return var_tglselesai;
    END */$$
DELIMITER ;

/* Function  structure for function  `f_hitungumurthn` */

/*!50003 DROP FUNCTION IF EXISTS `f_hitungumurthn` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_hitungumurthn`(dtgllahir date) RETURNS int(11)
BEGIN
	declare umurTahun int(11);
	set umurTahun = 0;
	if dtgllahir is not null then
		SET umurTahun = YEAR(NOW()) - YEAR(dtgllahir);
	end if;
	
	return umurTahun;
    END */$$
DELIMITER ;

/* Function  structure for function  `getstatuskelas` */

/*!50003 DROP FUNCTION IF EXISTS `getstatuskelas` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `getstatuskelas`(`varidkelas` CHAR(5), `varidjemaat` CHAR(10)) RETURNS int(1)
BEGIN
	declare varstatuslulus int(1);
	
	select statuslulus  into varstatuslulus from registrasikelas 
		where idkelas=varidkelas and idjemaat=varidjemaat order by tglregistrasikelas desc limit 1;
	if varstatuslulus is null then
		set varstatuslulus = 0;
	end if;
	
	return varstatuslulus;
    END */$$
DELIMITER ;

/* Function  structure for function  `replwz` */

/*!50003 DROP FUNCTION IF EXISTS `replwz` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `replwz`(`cAngka` CHAR(25), `cJlhNol` INT(11)) RETURNS char(25) CHARSET latin1 COLLATE latin1_swedish_ci
BEGIN
	
	declare nlen int(11);
	
	SET nlen = LENGTH(trim(cAngka));
	
	WHILE nlen+1 <= cJlhNol DO		
		SET cAngka= CONCAT('0',cAngka);
		SET nlen=nlen+1;
	END WHILE;	
	
	RETURN CONCAT(cAngka);
    END */$$
DELIMITER ;

/*Table structure for table `v_absensi_ibadah_mingguan` */

DROP TABLE IF EXISTS `v_absensi_ibadah_mingguan`;

/*!50001 DROP VIEW IF EXISTS `v_absensi_ibadah_mingguan` */;
/*!50001 DROP TABLE IF EXISTS `v_absensi_ibadah_mingguan` */;

/*!50001 CREATE TABLE  `v_absensi_ibadah_mingguan`(
 `idabsen` char(10) ,
 `tglabsen` datetime ,
 `jumlahhadir` int(4) ,
 `idabsenjenis` char(3) ,
 `namaabsenjenis` varchar(50) ,
 `idabsenlokasi` char(3) ,
 `namaabsenlokasi` varchar(50) ,
 `idjemaatcounter` char(10) ,
 `namalengkap` varchar(100) ,
 `idsesi` char(3) ,
 `namasesi` varchar(255) ,
 `jammulai` time ,
 `jamselesai` time 
)*/;

/*Table structure for table `v_aktabaptisan` */

DROP TABLE IF EXISTS `v_aktabaptisan`;

/*!50001 DROP VIEW IF EXISTS `v_aktabaptisan` */;
/*!50001 DROP TABLE IF EXISTS `v_aktabaptisan` */;

/*!50001 CREATE TABLE  `v_aktabaptisan`(
 `idakta` char(10) ,
 `noakta` varchar(25) ,
 `tglakta` date ,
 `tglcetak` date ,
 `dilakukanoleh` varchar(100) ,
 `idjemaat` char(10) ,
 `namaayah` varchar(50) ,
 `namaibu` varchar(50) ,
 `iddaerahakta` char(5) ,
 `idcabangakta` char(5) ,
 `namalengkap` varchar(100) ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `namadaerahakta` varchar(100) ,
 `namacabangakta` varchar(50) ,
 `formatnomorakta` varchar(25) 
)*/;

/*Table structure for table `v_aktanikah` */

DROP TABLE IF EXISTS `v_aktanikah`;

/*!50001 DROP VIEW IF EXISTS `v_aktanikah` */;
/*!50001 DROP TABLE IF EXISTS `v_aktanikah` */;

/*!50001 CREATE TABLE  `v_aktanikah`(
 `idakta` char(10) ,
 `noakta` varchar(25) ,
 `tglakta` date ,
 `tglcetak` date ,
 `dilakukanoleh` varchar(100) ,
 `idjemaatpria` char(10) ,
 `namajemaatpria` varchar(100) ,
 `namaayahpria` varchar(50) ,
 `namaibupria` varchar(50) ,
 `idjemaatwanita` char(10) ,
 `namajemaatwanita` varchar(100) ,
 `namaayahwanita` varchar(50) ,
 `namaibuwanita` varchar(50) ,
 `iddaerahakta` char(5) ,
 `namadaerahakta` varchar(100) ,
 `idcabangakta` char(5) ,
 `namacabangakta` varchar(50) 
)*/;

/*Table structure for table `v_aktapenyerahananak` */

DROP TABLE IF EXISTS `v_aktapenyerahananak`;

/*!50001 DROP VIEW IF EXISTS `v_aktapenyerahananak` */;
/*!50001 DROP TABLE IF EXISTS `v_aktapenyerahananak` */;

/*!50001 CREATE TABLE  `v_aktapenyerahananak`(
 `idakta` char(10) ,
 `noakta` varchar(25) ,
 `tglakta` date ,
 `tglcetak` date ,
 `dilakukanoleh` varchar(100) ,
 `idjemaatanak` char(10) ,
 `namajemaatanak` varchar(100) ,
 `idjemaatayah` char(10) ,
 `namajemaatayah` varchar(100) ,
 `idjemaatibu` char(10) ,
 `namajemaatibu` varchar(100) ,
 `iddaerahakta` char(5) ,
 `namadaerahakta` varchar(100) ,
 `idcabangakta` char(5) ,
 `namacabangakta` varchar(50) 
)*/;

/*Table structure for table `v_calenderevent` */

DROP TABLE IF EXISTS `v_calenderevent`;

/*!50001 DROP VIEW IF EXISTS `v_calenderevent` */;
/*!50001 DROP TABLE IF EXISTS `v_calenderevent` */;

/*!50001 CREATE TABLE  `v_calenderevent`(
 `jenis` varchar(14) ,
 `tema` varchar(255) ,
 `tanggalmulai` datetime ,
 `tanggalselesai` datetime 
)*/;

/*Table structure for table `v_dcmember` */

DROP TABLE IF EXISTS `v_dcmember`;

/*!50001 DROP VIEW IF EXISTS `v_dcmember` */;
/*!50001 DROP TABLE IF EXISTS `v_dcmember` */;

/*!50001 CREATE TABLE  `v_dcmember`(
 `iddcmember` char(10) ,
 `iddc` char(5) ,
 `idjemaat` char(10) ,
 `statuskeanggotaan` enum('Disciples maker','Core Team','Anggota') ,
 `keterangan` varchar(255) ,
 `tanggalinsert` datetime ,
 `tanggalupdate` datetime ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `namalengkap` varchar(100) ,
 `namadc` varchar(100) ,
 `namadm` varchar(100) 
)*/;

/*Table structure for table `v_departement` */

DROP TABLE IF EXISTS `v_departement`;

/*!50001 DROP VIEW IF EXISTS `v_departement` */;
/*!50001 DROP TABLE IF EXISTS `v_departement` */;

/*!50001 CREATE TABLE  `v_departement`(
 `iddepartement` char(8) ,
 `idgroup` char(5) ,
 `namadepartement` varchar(255) ,
 `namahead` varchar(100) ,
 `fotohead` varchar(255) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `warnapenjadwalan` varchar(25) ,
 `namagroup` varchar(100) 
)*/;

/*Table structure for table `v_disciplescommunity` */

DROP TABLE IF EXISTS `v_disciplescommunity`;

/*!50001 DROP VIEW IF EXISTS `v_disciplescommunity` */;
/*!50001 DROP TABLE IF EXISTS `v_disciplescommunity` */;

/*!50001 CREATE TABLE  `v_disciplescommunity`(
 `iddc` char(5) ,
 `namadc` varchar(100) ,
 `kategoridc` enum('Umum','Youth','Young Adult','Kids','Family') ,
 `haridc` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') ,
 `jamdc` char(5) ,
 `alamatdc` varchar(255) ,
 `fotodc` varchar(255) ,
 `tanggalinsert` datetime ,
 `tanggalupdate` datetime ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `idjemaatdm` char(10) ,
 `namadm` varchar(100) ,
 `tanggallahirdm` date ,
 `jeniskelamindm` enum('Laki-laki','Perempuan') ,
 `notelpdm` char(16) ,
 `fotodm` varchar(155) 
)*/;

/*Table structure for table `v_frontmenus` */

DROP TABLE IF EXISTS `v_frontmenus`;

/*!50001 DROP VIEW IF EXISTS `v_frontmenus` */;
/*!50001 DROP TABLE IF EXISTS `v_frontmenus` */;

/*!50001 CREATE TABLE  `v_frontmenus`(
 `idmenu` char(5) ,
 `parentidmenu` char(5) ,
 `namamenu` varchar(50) ,
 `jenismenu` enum('Page Link','Url Link','None','Kategori Link') ,
 `idpages` char(15) ,
 `linkmenu` varchar(255) ,
 `openinnewtab` int(1) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `tanggalinsert` datetime ,
 `tanggalupdate` datetime ,
 `sysmenu` int(1) ,
 `levels` int(2) ,
 `nomorurut` int(3) ,
 `idpageskategori` char(5) ,
 `slug_pages` varchar(255) ,
 `namapages` varchar(100) ,
 `namapageskategori` varchar(255) ,
 `slug_pageskategori` varchar(255) 
)*/;

/*Table structure for table `v_group` */

DROP TABLE IF EXISTS `v_group`;

/*!50001 DROP VIEW IF EXISTS `v_group` */;
/*!50001 DROP TABLE IF EXISTS `v_group` */;

/*!50001 CREATE TABLE  `v_group`(
 `idgroup` char(5) ,
 `namagroup` varchar(100) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `idjemaathead` char(10) ,
 `fotogroup` varchar(255) ,
 `namalengkap` varchar(100) ,
 `email` varchar(100) ,
 `facebook` varchar(255) ,
 `instagram` varchar(255) 
)*/;

/*Table structure for table `v_hagah` */

DROP TABLE IF EXISTS `v_hagah`;

/*!50001 DROP VIEW IF EXISTS `v_hagah` */;
/*!50001 DROP TABLE IF EXISTS `v_hagah` */;

/*!50001 CREATE TABLE  `v_hagah`(
 `idhagah` char(4) ,
 `tahun` char(4) ,
 `bulan` char(2) ,
 `kitabawal` varchar(50) ,
 `pasalawal` int(3) ,
 `kitabakhir` varchar(50) ,
 `pasalakhir` int(3) ,
 `tglinsert` datetime ,
 `tglupdate` datetime 
)*/;

/*Table structure for table `v_hagah_detail` */

DROP TABLE IF EXISTS `v_hagah_detail`;

/*!50001 DROP VIEW IF EXISTS `v_hagah_detail` */;
/*!50001 DROP TABLE IF EXISTS `v_hagah_detail` */;

/*!50001 CREATE TABLE  `v_hagah_detail`(
 `idhagah` char(4) ,
 `namakitab` varchar(50) ,
 `pasal1` int(11) ,
 `pasal2` int(11) ,
 `tglhagah` date ,
 `sdnamakitab` varchar(50) ,
 `sdpasal1` int(11) ,
 `sdpasal2` int(11) 
)*/;

/*Table structure for table `v_jadwalevent` */

DROP TABLE IF EXISTS `v_jadwalevent`;

/*!50001 DROP VIEW IF EXISTS `v_jadwalevent` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwalevent` */;

/*!50001 CREATE TABLE  `v_jadwalevent`(
 `idjadwalevent` char(10) ,
 `namaevent` varchar(255) ,
 `deskripsi` text ,
 `idpenanggungjawab` char(10) ,
 `gambarsampul` varchar(255) ,
 `iddepartement` char(8) ,
 `tglinsert` datetime ,
 `tglupdate` datetime ,
 `idpengguna` char(10) ,
 `jenisjadwal` enum('Disciple Community','Doa Bersama','Ibadah Jemaat','Latihan Acara/Musik','Meeting','Pelayanan Jemaat','Team Night/Fellowship','Filming','Kelas Next Step') ,
 `idpengkhotbah` char(12) ,
 `streamingurl` varchar(255) ,
 `tema` varchar(255) ,
 `subtema` varchar(255) ,
 `harusdaftar` int(1) ,
 `jumlahvolunteer` int(11) ,
 `jumlahjemaat` int(11) ,
 `onsitestatus` enum('Ya','Tidak') ,
 `aplikasidigunakan` enum('Zoom','Youtube') ,
 `diumumkankejemaat` enum('Ya','Tidak') ,
 `tglmulaidiumumkan` date ,
 `tglselesaidiumumkan` date ,
 `pengumumandisampaikanmelalui` enum('Via ESC News','Via Instagram','Via Live di ibadah minggu melalui MC') ,
 `konseppengumuman` enum('Slide','Slide + Audio','Filming','Flyer') ,
 `detailkonseppengumuman` text ,
 `tampilkandiwebsite` enum('Ya','Tidak') ,
 `halyangdisampaian` text ,
 `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') ,
 `idpenggunakonfirmasi` char(12) ,
 `tglkonfirmasi` datetime ,
 `keterangankonfirmasi` text ,
 `idkelas` char(5) ,
 `namapenanggungjawab` varchar(100) ,
 `namapengkhobah` varchar(100) ,
 `namadepartement` varchar(255) ,
 `tglmulai` datetime ,
 `tglselesai` datetime ,
 `warnapenjadwalan` varchar(25) 
)*/;

/*Table structure for table `v_jadwaleventdetailinventaris` */

DROP TABLE IF EXISTS `v_jadwaleventdetailinventaris`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailinventaris` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailinventaris` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetailinventaris`(
 `idjadwladetailinventaris` int(11) ,
 `idjadwalevent` char(10) ,
 `idinventaris` char(5) ,
 `qty` int(11) ,
 `namaevent` varchar(255) ,
 `namainventaris` varchar(100) ,
 `satuan` char(15) 
)*/;

/*Table structure for table `v_jadwaleventdetailparkiran` */

DROP TABLE IF EXISTS `v_jadwaleventdetailparkiran`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailparkiran` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailparkiran` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetailparkiran`(
 `idjadwaldetailparkiran` int(11) ,
 `idparkiran` char(3) ,
 `idjadwalevent` char(10) ,
 `namaevent` varchar(255) ,
 `namaparkiran` varchar(100) 
)*/;

/*Table structure for table `v_jadwaleventdetailpelayanan` */

DROP TABLE IF EXISTS `v_jadwaleventdetailpelayanan`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailpelayanan` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailpelayanan` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetailpelayanan`(
 `idjadwaldetailpelayanan` int(11) ,
 `idpelayanan` char(5) ,
 `idjadwalevent` char(10) ,
 `namapelayanan` varchar(100) 
)*/;

/*Table structure for table `v_jadwaleventdetailruangan` */

DROP TABLE IF EXISTS `v_jadwaleventdetailruangan`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailruangan` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailruangan` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetailruangan`(
 `idjadwaldatailruangan` int(11) ,
 `idruangan` char(3) ,
 `idjadwalevent` char(10) ,
 `namaevent` varchar(255) ,
 `namaruangan` varchar(50) 
)*/;

/*Table structure for table `v_jadwaleventdetailtanggal_2` */

DROP TABLE IF EXISTS `v_jadwaleventdetailtanggal_2`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailtanggal_2` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailtanggal_2` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetailtanggal_2`(
 `idjadwalevent` char(10) ,
 `namaevent` varchar(255) ,
 `gambarsampul` varchar(255) ,
 `deskripsi` text ,
 `jenisjadwal` enum('Disciple Community','Doa Bersama','Ibadah Jemaat','Latihan Acara/Musik','Meeting','Pelayanan Jemaat','Team Night/Fellowship','Filming','Kelas Next Step') ,
 `tema` varchar(255) ,
 `subtema` varchar(255) ,
 `tampilkandiwebsite` enum('Ya','Tidak') ,
 `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') ,
 `iddetailtanggal2` int(11) ,
 `idjadwaleventdetail` int(11) ,
 `tgljadwal` date ,
 `jammulai` time ,
 `jamselesai` time 
)*/;

/*Table structure for table `v_jadwaleventregistrasi` */

DROP TABLE IF EXISTS `v_jadwaleventregistrasi`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventregistrasi` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventregistrasi` */;

/*!50001 CREATE TABLE  `v_jadwaleventregistrasi`(
 `idregistrasi` char(10) ,
 `idjadwalevent` char(10) ,
 `tglregistrasi` datetime ,
 `idjemaat` char(10) ,
 `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') ,
 `tglkonfirmasi` datetime ,
 `idpenggunakonfirmasi` char(10) ,
 `keterangankonfirmasi` text ,
 `namalengkap` varchar(100) ,
 `namaevent` varchar(255) ,
 `jenisjadwal` enum('Disciple Community','Doa Bersama','Ibadah Jemaat','Latihan Acara/Musik','Meeting','Pelayanan Jemaat','Team Night/Fellowship','Filming','Kelas Next Step') ,
 `jumlahjemaat` int(11) ,
 `idkelas` char(5) 
)*/;

/*Table structure for table `v_jemaat` */

DROP TABLE IF EXISTS `v_jemaat`;

/*!50001 DROP VIEW IF EXISTS `v_jemaat` */;
/*!50001 DROP TABLE IF EXISTS `v_jemaat` */;

/*!50001 CREATE TABLE  `v_jemaat`(
 `idjemaat` char(10) ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `kewarganegaraan` enum('Indonesia','Asing') ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) ,
 `tempatlahir` varchar(50) ,
 `tanggallahir` date ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `statuspernikahan` enum('Belum Kawin','Kawin','Janda/ Duda') ,
 `golongandarah` enum('A','B','AB','O') ,
 `notelp` char(16) ,
 `nohp` char(16) ,
 `email` varchar(50) ,
 `facebook` varchar(100) ,
 `instagram` varchar(100) ,
 `namadarurat` varchar(100) ,
 `hubungan` enum('Istri/ Suami','Ibu','Ayah','Anak','Saudara','Kerabat') ,
 `notelpdarurat` char(16) ,
 `pendidikanterakhir` enum('SD','SMP','SMA/SMK','D3','D3','D1','S1','S2','S3','Lainnya') ,
 `namasekolah` varchar(50) ,
 `pekerjaan` enum('Swasta','Pegawai Negeri','TNI','POLRI','Wiraswasta') ,
 `namaperusahaan` varchar(50) ,
 `sektorindustri` varchar(50) ,
 `alamatkantor` varchar(255) ,
 `notelpkantor` char(16) ,
 `alamatrumah` varchar(255) ,
 `rtrw` varchar(7) ,
 `kelurahan` varchar(50) ,
 `kecamatan` varchar(50) ,
 `kotakabupaten` varchar(50) ,
 `propinsi` varchar(50) ,
 `kodepos` varchar(10) ,
 `foto` varchar(155) ,
 `tanggalupdate` datetime ,
 `username` varchar(50) ,
 `password` varchar(50) ,
 `lastlogin` datetime ,
 `statusjemaat` enum('Jemaat','Simpatisan','Umum') ,
 `tanggalinsert` datetime ,
 `idlokasi` char(3) ,
 `idposisidalamkeluarga` char(1) ,
 `namadc` varchar(100) ,
 `umur` int(11) 
)*/;

/*Table structure for table `v_jemaatfamily` */

DROP TABLE IF EXISTS `v_jemaatfamily`;

/*!50001 DROP VIEW IF EXISTS `v_jemaatfamily` */;
/*!50001 DROP TABLE IF EXISTS `v_jemaatfamily` */;

/*!50001 CREATE TABLE  `v_jemaatfamily`(
 `nokaj` char(5) ,
 `idjemaatfamily` int(11) ,
 `idjemaat` char(10) ,
 `tglinsert` datetime ,
 `idhubunganfamily` char(3) ,
 `tglupdate` datetime ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) ,
 `tempatlahir` varchar(50) ,
 `tanggallahir` date ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `statuspernikahan` enum('Belum Kawin','Kawin','Janda/ Duda') ,
 `notelp` char(16) ,
 `nohp` char(16) ,
 `email` varchar(50) ,
 `namahubungan` varchar(50) 
)*/;

/*Table structure for table `v_loginadmin` */

DROP TABLE IF EXISTS `v_loginadmin`;

/*!50001 DROP VIEW IF EXISTS `v_loginadmin` */;
/*!50001 DROP TABLE IF EXISTS `v_loginadmin` */;

/*!50001 CREATE TABLE  `v_loginadmin`(
 `idjemaat` char(10) ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `kewarganegaraan` enum('Indonesia','Asing') ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) ,
 `tempatlahir` varchar(50) ,
 `tanggallahir` date ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `statuspernikahan` enum('Belum Kawin','Kawin','Janda/ Duda') ,
 `golongandarah` enum('A','B','AB','O') ,
 `notelp` char(16) ,
 `nohp` char(16) ,
 `email` varchar(50) ,
 `facebook` varchar(100) ,
 `instagram` varchar(100) ,
 `namadarurat` varchar(100) ,
 `hubungan` enum('Istri/ Suami','Ibu','Ayah','Anak','Saudara','Kerabat') ,
 `notelpdarurat` char(16) ,
 `pendidikanterakhir` enum('SD','SMP','SMA/SMK','D3','D3','D1','S1','S2','S3','Lainnya') ,
 `namasekolah` varchar(50) ,
 `pekerjaan` enum('Swasta','Pegawai Negeri','TNI','POLRI','Wiraswasta') ,
 `namaperusahaan` varchar(50) ,
 `sektorindustri` varchar(50) ,
 `alamatkantor` varchar(255) ,
 `notelpkantor` char(16) ,
 `alamatrumah` varchar(255) ,
 `kelurahan` varchar(50) ,
 `rtrw` varchar(7) ,
 `kecamatan` varchar(50) ,
 `kotakabupaten` varchar(50) ,
 `propinsi` varchar(50) ,
 `kodepos` varchar(10) ,
 `foto` varchar(155) ,
 `tanggalupdate` datetime ,
 `username` varchar(50) ,
 `password` varchar(50) ,
 `lastlogin` datetime ,
 `statusjemaat` enum('Jemaat','Simpatisan','Umum') ,
 `tanggalinsert` datetime ,
 `idlokasi` char(3) ,
 `idposisidalamkeluarga` char(1) ,
 `statusverifikasiemail` int(1) ,
 `idotorisasi` char(4) ,
 `namaotorisasi` varbinary(50) 
)*/;

/*Table structure for table `v_otorisasimenus` */

DROP TABLE IF EXISTS `v_otorisasimenus`;

/*!50001 DROP VIEW IF EXISTS `v_otorisasimenus` */;
/*!50001 DROP TABLE IF EXISTS `v_otorisasimenus` */;

/*!50001 CREATE TABLE  `v_otorisasimenus`(
 `idotorisasi` char(4) ,
 `namaotorisasi` varbinary(50) ,
 `idmenu` char(5) ,
 `namamenu` varchar(50) ,
 `parentidmenu` char(5) ,
 `linkmenu` varchar(255) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `nomorurut` int(5) ,
 `nlevels` int(1) ,
 `fontawesomeicon` varchar(25) 
)*/;

/*Table structure for table `v_otorisasiuser` */

DROP TABLE IF EXISTS `v_otorisasiuser`;

/*!50001 DROP VIEW IF EXISTS `v_otorisasiuser` */;
/*!50001 DROP TABLE IF EXISTS `v_otorisasiuser` */;

/*!50001 CREATE TABLE  `v_otorisasiuser`(
 `idotorisasi` char(4) ,
 `namaotorisasi` varbinary(50) ,
 `idjemaat` char(10) ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `namalengkap` varchar(100) ,
 `foto` varchar(155) 
)*/;

/*Table structure for table `v_pages` */

DROP TABLE IF EXISTS `v_pages`;

/*!50001 DROP VIEW IF EXISTS `v_pages` */;
/*!50001 DROP TABLE IF EXISTS `v_pages` */;

/*!50001 CREATE TABLE  `v_pages`(
 `idpages` char(15) ,
 `idpageskategori` char(5) ,
 `slug` varchar(255) ,
 `namapages` varchar(100) ,
 `isipages` text ,
 `gambarsampul` varchar(255) ,
 `tglinsert` datetime ,
 `tglupdate` datetime ,
 `idjemaat` char(10) ,
 `jumlahdilihat` int(11) ,
 `namapageskategori` varchar(255) ,
 `ringkasan` text 
)*/;

/*Table structure for table `v_pendaftarankelas` */

DROP TABLE IF EXISTS `v_pendaftarankelas`;

/*!50001 DROP VIEW IF EXISTS `v_pendaftarankelas` */;
/*!50001 DROP TABLE IF EXISTS `v_pendaftarankelas` */;

/*!50001 CREATE TABLE  `v_pendaftarankelas`(
 `idregistrasi` char(10) ,
 `idjadwalevent` char(10) ,
 `tglregistrasi` datetime ,
 `idjemaat` char(10) ,
 `tglkonfirmasi` datetime ,
 `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') ,
 `idpenggunakonfirmasi` char(10) ,
 `keterangankonfirmasi` text ,
 `noaj` char(15) ,
 `namalengkap` varchar(100) ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `tanggallahir` date ,
 `nohp` char(16) ,
 `email` varchar(50) ,
 `namaevent` varchar(255) ,
 `idkelas` char(5) ,
 `namakelas` varchar(100) 
)*/;

/*Table structure for table `v_pengkhotbah` */

DROP TABLE IF EXISTS `v_pengkhotbah`;

/*!50001 DROP VIEW IF EXISTS `v_pengkhotbah` */;
/*!50001 DROP TABLE IF EXISTS `v_pengkhotbah` */;

/*!50001 CREATE TABLE  `v_pengkhotbah`(
 `idjemaat` char(10) ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `kewarganegaraan` enum('Indonesia','Asing') ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) ,
 `tempatlahir` varchar(50) ,
 `tanggallahir` date ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `statuspernikahan` enum('Belum Kawin','Kawin','Janda/ Duda') ,
 `golongandarah` enum('A','B','AB','O') ,
 `notelp` char(16) ,
 `nohp` char(16) ,
 `email` varchar(50) ,
 `facebook` varchar(100) ,
 `instagram` varchar(100) ,
 `namadarurat` varchar(100) ,
 `hubungan` enum('Istri/ Suami','Ibu','Ayah','Anak','Saudara','Kerabat') ,
 `notelpdarurat` char(16) ,
 `pendidikanterakhir` enum('SD','SMP','SMA/SMK','D3','D3','D1','S1','S2','S3','Lainnya') ,
 `namasekolah` varchar(50) ,
 `pekerjaan` enum('Swasta','Pegawai Negeri','TNI','POLRI','Wiraswasta') ,
 `namaperusahaan` varchar(50) ,
 `sektorindustri` varchar(50) ,
 `alamatkantor` varchar(255) ,
 `notelpkantor` char(16) ,
 `alamatrumah` varchar(255) ,
 `rtrw` varchar(7) ,
 `kelurahan` varchar(50) ,
 `kecamatan` varchar(50) ,
 `kotakabupaten` varchar(50) ,
 `propinsi` varchar(50) ,
 `kodepos` varchar(10) ,
 `foto` varchar(155) ,
 `tanggalupdate` datetime ,
 `username` varchar(50) ,
 `password` varchar(50) ,
 `lastlogin` datetime ,
 `statusjemaat` enum('Jemaat','Simpatisan','Umum') ,
 `tanggalinsert` datetime ,
 `tanggalskpengkotbah` datetime ,
 `tanggalskberakhir` datetime ,
 `keterangan` varchar(255) ,
 `idpengkhotbah` char(12) ,
 `statusaktif` enum('Aktif','Tidak Aktif') 
)*/;

/*Table structure for table `v_registrasikelas` */

DROP TABLE IF EXISTS `v_registrasikelas`;

/*!50001 DROP VIEW IF EXISTS `v_registrasikelas` */;
/*!50001 DROP TABLE IF EXISTS `v_registrasikelas` */;

/*!50001 CREATE TABLE  `v_registrasikelas`(
 `idregistrasikelas` char(15) ,
 `tglregistrasikelas` date ,
 `tglsertifikat` date ,
 `idjemaat` char(10) ,
 `idkelas` char(5) ,
 `tanggalinsert` datetime ,
 `tanggalupdate` datetime ,
 `idpengguna` char(10) ,
 `nomorsertifikat` varchar(25) ,
 `linkurlsertifikat` varchar(255) ,
 `statuslulus` int(1) ,
 `namalengkap` varchar(100) ,
 `tempatlahir` varchar(50) ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `tanggallahir` date ,
 `notelp` char(16) ,
 `email` varchar(50) ,
 `alamatrumah` varchar(255) ,
 `foto` varchar(155) ,
 `namakelas` varchar(100) 
)*/;

/*Table structure for table `v_sidemenus` */

DROP TABLE IF EXISTS `v_sidemenus`;

/*!50001 DROP VIEW IF EXISTS `v_sidemenus` */;
/*!50001 DROP TABLE IF EXISTS `v_sidemenus` */;

/*!50001 CREATE TABLE  `v_sidemenus`(
 `idotorisasi` char(4) ,
 `namaotorisasi` varbinary(50) ,
 `idmenu` char(5) ,
 `namamenu` varchar(50) ,
 `parentidmenu` char(5) ,
 `linkmenu` varchar(255) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `nomorurut` int(5) ,
 `nlevels` int(1) ,
 `fontawesomeicon` varchar(25) ,
 `isdropdown` int(1) ,
 `menuonselected` varchar(255) 
)*/;

/*View structure for view v_absensi_ibadah_mingguan */

/*!50001 DROP TABLE IF EXISTS `v_absensi_ibadah_mingguan` */;
/*!50001 DROP VIEW IF EXISTS `v_absensi_ibadah_mingguan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_absensi_ibadah_mingguan` AS select `absen`.`idabsen` AS `idabsen`,`absen`.`tglabsen` AS `tglabsen`,`absen`.`jumlahhadir` AS `jumlahhadir`,`absen`.`idabsenjenis` AS `idabsenjenis`,`absenjenis`.`namaabsenjenis` AS `namaabsenjenis`,`absen`.`idabsenlokasi` AS `idabsenlokasi`,`absenlokasi`.`namaabsenlokasi` AS `namaabsenlokasi`,`absen`.`idjemaatcounter` AS `idjemaatcounter`,`jemaat`.`namalengkap` AS `namalengkap`,`absen`.`idsesi` AS `idsesi`,case when `sesiibadahminggu`.`namasesi` is null then 'Tidak ada' else `sesiibadahminggu`.`namasesi` end AS `namasesi`,`sesiibadahminggu`.`jammulai` AS `jammulai`,`sesiibadahminggu`.`jamselesai` AS `jamselesai` from ((((`absen` join `absenjenis` on(`absen`.`idabsenjenis` = `absenjenis`.`idabsenjenis`)) join `absenlokasi` on(`absen`.`idabsenlokasi` = `absenlokasi`.`idabsenlokasi`)) join `jemaat` on(`absen`.`idjemaatcounter` = `jemaat`.`idjemaat`)) left join `sesiibadahminggu` on(`absen`.`idsesi` = `sesiibadahminggu`.`idsesi`)) */;

/*View structure for view v_aktabaptisan */

/*!50001 DROP TABLE IF EXISTS `v_aktabaptisan` */;
/*!50001 DROP VIEW IF EXISTS `v_aktabaptisan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_aktabaptisan` AS select `aktabaptisan`.`idakta` AS `idakta`,`aktabaptisan`.`noakta` AS `noakta`,`aktabaptisan`.`tglakta` AS `tglakta`,`aktabaptisan`.`tglcetak` AS `tglcetak`,`aktabaptisan`.`dilakukanoleh` AS `dilakukanoleh`,`aktabaptisan`.`idjemaat` AS `idjemaat`,`aktabaptisan`.`namaayah` AS `namaayah`,`aktabaptisan`.`namaibu` AS `namaibu`,`aktabaptisan`.`iddaerahakta` AS `iddaerahakta`,`aktabaptisan`.`idcabangakta` AS `idcabangakta`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`aktadaerah`.`namadaerahakta` AS `namadaerahakta`,`aktacabang`.`namacabangakta` AS `namacabangakta`,`aktacabang`.`formatnomorakta` AS `formatnomorakta` from (((`aktabaptisan` join `jemaat` on(`aktabaptisan`.`idjemaat` = `jemaat`.`idjemaat`)) join `aktadaerah` on(`aktabaptisan`.`iddaerahakta` = `aktadaerah`.`iddaerahakta`)) join `aktacabang` on(`aktabaptisan`.`idcabangakta` = `aktacabang`.`idcabangakta`)) */;

/*View structure for view v_aktanikah */

/*!50001 DROP TABLE IF EXISTS `v_aktanikah` */;
/*!50001 DROP VIEW IF EXISTS `v_aktanikah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_aktanikah` AS select `aktanikah`.`idakta` AS `idakta`,`aktanikah`.`noakta` AS `noakta`,`aktanikah`.`tglakta` AS `tglakta`,`aktanikah`.`tglcetak` AS `tglcetak`,`aktanikah`.`dilakukanoleh` AS `dilakukanoleh`,`aktanikah`.`idjemaatpria` AS `idjemaatpria`,`jemaat`.`namalengkap` AS `namajemaatpria`,`aktanikah`.`namaayahpria` AS `namaayahpria`,`aktanikah`.`namaibupria` AS `namaibupria`,`aktanikah`.`idjemaatwanita` AS `idjemaatwanita`,`jemaat_1`.`namalengkap` AS `namajemaatwanita`,`aktanikah`.`namaayahwanita` AS `namaayahwanita`,`aktanikah`.`namaibuwanita` AS `namaibuwanita`,`aktanikah`.`iddaerahakta` AS `iddaerahakta`,`aktadaerah`.`namadaerahakta` AS `namadaerahakta`,`aktanikah`.`idcabangakta` AS `idcabangakta`,`aktacabang`.`namacabangakta` AS `namacabangakta` from ((((`aktanikah` join `jemaat` on(`aktanikah`.`idjemaatpria` = `jemaat`.`idjemaat`)) join `jemaat` `jemaat_1` on(`aktanikah`.`idjemaatwanita` = `jemaat_1`.`idjemaat`)) join `aktadaerah` on(`aktanikah`.`iddaerahakta` = `aktadaerah`.`iddaerahakta`)) join `aktacabang` on(`aktacabang`.`idcabangakta` = `aktanikah`.`idcabangakta`)) */;

/*View structure for view v_aktapenyerahananak */

/*!50001 DROP TABLE IF EXISTS `v_aktapenyerahananak` */;
/*!50001 DROP VIEW IF EXISTS `v_aktapenyerahananak` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_aktapenyerahananak` AS select `aktapenyerahananak`.`idakta` AS `idakta`,`aktapenyerahananak`.`noakta` AS `noakta`,`aktapenyerahananak`.`tglakta` AS `tglakta`,`aktapenyerahananak`.`tglcetak` AS `tglcetak`,`aktapenyerahananak`.`dilakukanoleh` AS `dilakukanoleh`,`aktapenyerahananak`.`idjemaatanak` AS `idjemaatanak`,`jemaat`.`namalengkap` AS `namajemaatanak`,`aktapenyerahananak`.`idjemaatayah` AS `idjemaatayah`,`jemaat_1`.`namalengkap` AS `namajemaatayah`,`aktapenyerahananak`.`idjemaatibu` AS `idjemaatibu`,`jemaat_2`.`namalengkap` AS `namajemaatibu`,`aktapenyerahananak`.`iddaerahakta` AS `iddaerahakta`,`aktadaerah`.`namadaerahakta` AS `namadaerahakta`,`aktapenyerahananak`.`idcabangakta` AS `idcabangakta`,`aktacabang`.`namacabangakta` AS `namacabangakta` from (((((`aktapenyerahananak` join `jemaat` on(`aktapenyerahananak`.`idjemaatanak` = `jemaat`.`idjemaat`)) join `jemaat` `jemaat_1` on(`jemaat_1`.`idjemaat` = `aktapenyerahananak`.`idjemaatayah`)) join `aktadaerah` on(`aktapenyerahananak`.`iddaerahakta` = `aktadaerah`.`iddaerahakta`)) join `aktacabang` on(`aktapenyerahananak`.`idcabangakta` = `aktacabang`.`idcabangakta`)) join `jemaat` `jemaat_2` on(`aktapenyerahananak`.`idjemaatibu` = `jemaat_2`.`idjemaat`)) */;

/*View structure for view v_calenderevent */

/*!50001 DROP TABLE IF EXISTS `v_calenderevent` */;
/*!50001 DROP VIEW IF EXISTS `v_calenderevent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_calenderevent` AS select 'Ibadah Minggu ' AS `jenis`,`jadwalibadahmingguan`.`tema` AS `tema`,`jadwalibadahmingguan`.`tanggaljadwal` AS `tanggalmulai`,`jadwalibadahmingguan`.`tanggaljadwal` AS `tanggalselesai` from `jadwalibadahmingguan` union all select 'Event' AS `Event`,`jadwalevent`.`namaevent` AS `namaevent`,`f_gettglmulaievent`(`jadwalevent`.`idjadwalevent`) AS `f_gettglmulaievent(idjadwalevent)`,`f_gettglselesaievent`(`jadwalevent`.`idjadwalevent`) AS `f_gettglselesaievent(idjadwalevent)` from `jadwalevent` order by `tanggalmulai` */;

/*View structure for view v_dcmember */

/*!50001 DROP TABLE IF EXISTS `v_dcmember` */;
/*!50001 DROP VIEW IF EXISTS `v_dcmember` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dcmember` AS select `dcmember`.`iddcmember` AS `iddcmember`,`dcmember`.`iddc` AS `iddc`,`dcmember`.`idjemaat` AS `idjemaat`,`dcmember`.`statuskeanggotaan` AS `statuskeanggotaan`,`dcmember`.`keterangan` AS `keterangan`,`dcmember`.`tanggalinsert` AS `tanggalinsert`,`dcmember`.`tanggalupdate` AS `tanggalupdate`,`dcmember`.`statusaktif` AS `statusaktif`,`jemaat`.`namalengkap` AS `namalengkap`,`v_disciplescommunity`.`namadc` AS `namadc`,`v_disciplescommunity`.`namadm` AS `namadm` from ((`dcmember` join `jemaat` on(`dcmember`.`idjemaat` = `jemaat`.`idjemaat`)) join `v_disciplescommunity` on(`dcmember`.`iddc` = `v_disciplescommunity`.`iddc`)) */;

/*View structure for view v_departement */

/*!50001 DROP TABLE IF EXISTS `v_departement` */;
/*!50001 DROP VIEW IF EXISTS `v_departement` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_departement` AS select `departement`.`iddepartement` AS `iddepartement`,`departement`.`idgroup` AS `idgroup`,`departement`.`namadepartement` AS `namadepartement`,`departement`.`namahead` AS `namahead`,`departement`.`fotohead` AS `fotohead`,`departement`.`statusaktif` AS `statusaktif`,`departement`.`warnapenjadwalan` AS `warnapenjadwalan`,`group`.`namagroup` AS `namagroup` from (`departement` join `group` on(`departement`.`idgroup` = `group`.`idgroup`)) */;

/*View structure for view v_disciplescommunity */

/*!50001 DROP TABLE IF EXISTS `v_disciplescommunity` */;
/*!50001 DROP VIEW IF EXISTS `v_disciplescommunity` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_disciplescommunity` AS select `disciplescommunity`.`iddc` AS `iddc`,`disciplescommunity`.`namadc` AS `namadc`,`disciplescommunity`.`kategoridc` AS `kategoridc`,`disciplescommunity`.`haridc` AS `haridc`,`disciplescommunity`.`jamdc` AS `jamdc`,`disciplescommunity`.`alamatdc` AS `alamatdc`,`disciplescommunity`.`fotodc` AS `fotodc`,`disciplescommunity`.`tanggalinsert` AS `tanggalinsert`,`disciplescommunity`.`tanggalupdate` AS `tanggalupdate`,`disciplescommunity`.`statusaktif` AS `statusaktif`,`disciplescommunity`.`idjemaatdm` AS `idjemaatdm`,`jemaat`.`namalengkap` AS `namadm`,`jemaat`.`tanggallahir` AS `tanggallahirdm`,`jemaat`.`jeniskelamin` AS `jeniskelamindm`,`jemaat`.`notelp` AS `notelpdm`,`jemaat`.`foto` AS `fotodm` from (`disciplescommunity` join `jemaat` on(`disciplescommunity`.`idjemaatdm` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_frontmenus */

/*!50001 DROP TABLE IF EXISTS `v_frontmenus` */;
/*!50001 DROP VIEW IF EXISTS `v_frontmenus` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_frontmenus` AS select `frontmenus`.`idmenu` AS `idmenu`,`frontmenus`.`parentidmenu` AS `parentidmenu`,`frontmenus`.`namamenu` AS `namamenu`,`frontmenus`.`jenismenu` AS `jenismenu`,`frontmenus`.`idpages` AS `idpages`,`frontmenus`.`linkmenu` AS `linkmenu`,`frontmenus`.`openinnewtab` AS `openinnewtab`,`frontmenus`.`statusaktif` AS `statusaktif`,`frontmenus`.`tanggalinsert` AS `tanggalinsert`,`frontmenus`.`tanggalupdate` AS `tanggalupdate`,`frontmenus`.`sysmenu` AS `sysmenu`,`frontmenus`.`levels` AS `levels`,`frontmenus`.`nomorurut` AS `nomorurut`,`frontmenus`.`idpageskategori` AS `idpageskategori`,`pages`.`slug` AS `slug_pages`,`pages`.`namapages` AS `namapages`,`pageskategori`.`namapageskategori` AS `namapageskategori`,`pageskategori`.`slug` AS `slug_pageskategori` from ((`frontmenus` left join `pages` on(`frontmenus`.`idpages` = `pages`.`idpages`)) left join `pageskategori` on(`frontmenus`.`idpageskategori` = `pageskategori`.`idpageskategori`)) */;

/*View structure for view v_group */

/*!50001 DROP TABLE IF EXISTS `v_group` */;
/*!50001 DROP VIEW IF EXISTS `v_group` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_group` AS select `group`.`idgroup` AS `idgroup`,`group`.`namagroup` AS `namagroup`,`group`.`statusaktif` AS `statusaktif`,`group`.`idjemaathead` AS `idjemaathead`,`group`.`fotogroup` AS `fotogroup`,`group`.`namalengkap` AS `namalengkap`,`group`.`email` AS `email`,`group`.`facebook` AS `facebook`,`group`.`instagram` AS `instagram` from `group` */;

/*View structure for view v_hagah */

/*!50001 DROP TABLE IF EXISTS `v_hagah` */;
/*!50001 DROP VIEW IF EXISTS `v_hagah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hagah` AS select `hagah`.`idhagah` AS `idhagah`,`hagah`.`tahun` AS `tahun`,`hagah`.`bulan` AS `bulan`,`hagah`.`kitabawal` AS `kitabawal`,`hagah`.`pasalawal` AS `pasalawal`,`hagah`.`kitabakhir` AS `kitabakhir`,`hagah`.`pasalakhir` AS `pasalakhir`,`hagah`.`tglinsert` AS `tglinsert`,`hagah`.`tglupdate` AS `tglupdate` from `hagah` */;

/*View structure for view v_hagah_detail */

/*!50001 DROP TABLE IF EXISTS `v_hagah_detail` */;
/*!50001 DROP VIEW IF EXISTS `v_hagah_detail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hagah_detail` AS select `hagah_detail`.`idhagah` AS `idhagah`,`hagah_detail`.`namakitab` AS `namakitab`,`hagah_detail`.`pasal1` AS `pasal1`,`hagah_detail`.`pasal2` AS `pasal2`,`hagah_detail`.`tglhagah` AS `tglhagah`,`hagah_detail`.`sdnamakitab` AS `sdnamakitab`,`hagah_detail`.`sdpasal1` AS `sdpasal1`,`hagah_detail`.`sdpasal2` AS `sdpasal2` from (`hagah_detail` join `hagah` on(`hagah_detail`.`idhagah` = `hagah`.`idhagah`)) */;

/*View structure for view v_jadwalevent */

/*!50001 DROP TABLE IF EXISTS `v_jadwalevent` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwalevent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwalevent` AS select `jadwalevent`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`deskripsi` AS `deskripsi`,`jadwalevent`.`idpenanggungjawab` AS `idpenanggungjawab`,`jadwalevent`.`gambarsampul` AS `gambarsampul`,`jadwalevent`.`iddepartement` AS `iddepartement`,`jadwalevent`.`tglinsert` AS `tglinsert`,`jadwalevent`.`tglupdate` AS `tglupdate`,`jadwalevent`.`idpengguna` AS `idpengguna`,`jadwalevent`.`jenisjadwal` AS `jenisjadwal`,`jadwalevent`.`idpengkhotbah` AS `idpengkhotbah`,`jadwalevent`.`streamingurl` AS `streamingurl`,`jadwalevent`.`tema` AS `tema`,`jadwalevent`.`subtema` AS `subtema`,`jadwalevent`.`harusdaftar` AS `harusdaftar`,`jadwalevent`.`jumlahvolunteer` AS `jumlahvolunteer`,`jadwalevent`.`jumlahjemaat` AS `jumlahjemaat`,`jadwalevent`.`onsitestatus` AS `onsitestatus`,`jadwalevent`.`aplikasidigunakan` AS `aplikasidigunakan`,`jadwalevent`.`diumumkankejemaat` AS `diumumkankejemaat`,`jadwalevent`.`tglmulaidiumumkan` AS `tglmulaidiumumkan`,`jadwalevent`.`tglselesaidiumumkan` AS `tglselesaidiumumkan`,`jadwalevent`.`pengumumandisampaikanmelalui` AS `pengumumandisampaikanmelalui`,`jadwalevent`.`konseppengumuman` AS `konseppengumuman`,`jadwalevent`.`detailkonseppengumuman` AS `detailkonseppengumuman`,`jadwalevent`.`tampilkandiwebsite` AS `tampilkandiwebsite`,`jadwalevent`.`halyangdisampaian` AS `halyangdisampaian`,`jadwalevent`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwalevent`.`idpenggunakonfirmasi` AS `idpenggunakonfirmasi`,`jadwalevent`.`tglkonfirmasi` AS `tglkonfirmasi`,`jadwalevent`.`keterangankonfirmasi` AS `keterangankonfirmasi`,`jadwalevent`.`idkelas` AS `idkelas`,`jemaat`.`namalengkap` AS `namapenanggungjawab`,`jemaat_1`.`namalengkap` AS `namapengkhobah`,`departement`.`namadepartement` AS `namadepartement`,`f_gettglmulaievent`(`jadwalevent`.`idjadwalevent`) AS `tglmulai`,`f_gettglselesaievent`(`jadwalevent`.`idjadwalevent`) AS `tglselesai`,`departement`.`warnapenjadwalan` AS `warnapenjadwalan` from (((`jadwalevent` left join `jemaat` on(`jadwalevent`.`idpenanggungjawab` = `jemaat`.`idjemaat`)) join `departement` on(`jadwalevent`.`iddepartement` = `departement`.`iddepartement`)) left join `jemaat` `jemaat_1` on(`jadwalevent`.`idpengkhotbah` = `jemaat_1`.`idjemaat`)) */;

/*View structure for view v_jadwaleventdetailinventaris */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailinventaris` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailinventaris` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailinventaris` AS select `jadwaleventdetailinventaris`.`idjadwladetailinventaris` AS `idjadwladetailinventaris`,`jadwaleventdetailinventaris`.`idjadwalevent` AS `idjadwalevent`,`jadwaleventdetailinventaris`.`idinventaris` AS `idinventaris`,`jadwaleventdetailinventaris`.`qty` AS `qty`,`jadwalevent`.`namaevent` AS `namaevent`,`inventarisruangan`.`namainventaris` AS `namainventaris`,`inventarisruangan`.`satuan` AS `satuan` from ((`jadwaleventdetailinventaris` join `jadwalevent` on(`jadwaleventdetailinventaris`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `inventarisruangan` on(`jadwaleventdetailinventaris`.`idinventaris` = `inventarisruangan`.`idinventaris`)) */;

/*View structure for view v_jadwaleventdetailparkiran */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailparkiran` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailparkiran` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailparkiran` AS select `jadwaleventdetailparkiran`.`idjadwaldetailparkiran` AS `idjadwaldetailparkiran`,`jadwaleventdetailparkiran`.`idparkiran` AS `idparkiran`,`jadwaleventdetailparkiran`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`parkiran`.`namaparkiran` AS `namaparkiran` from ((`jadwaleventdetailparkiran` join `jadwalevent` on(`jadwaleventdetailparkiran`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `parkiran` on(`jadwaleventdetailparkiran`.`idparkiran` = `parkiran`.`idparkiran`)) */;

/*View structure for view v_jadwaleventdetailpelayanan */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailpelayanan` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailpelayanan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailpelayanan` AS select `jadwaleventdetailpelayanan`.`idjadwaldetailpelayanan` AS `idjadwaldetailpelayanan`,`jadwaleventdetailpelayanan`.`idpelayanan` AS `idpelayanan`,`jadwaleventdetailpelayanan`.`idjadwalevent` AS `idjadwalevent`,`pelayanan`.`namapelayanan` AS `namapelayanan` from (`jadwaleventdetailpelayanan` join `pelayanan` on(`jadwaleventdetailpelayanan`.`idpelayanan` = `pelayanan`.`idpelayanan`)) */;

/*View structure for view v_jadwaleventdetailruangan */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailruangan` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailruangan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailruangan` AS select `jadwaleventdetailruangan`.`idjadwaldatailruangan` AS `idjadwaldatailruangan`,`jadwaleventdetailruangan`.`idruangan` AS `idruangan`,`jadwaleventdetailruangan`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`ruanganacara`.`namaruangan` AS `namaruangan` from ((`jadwaleventdetailruangan` join `jadwalevent` on(`jadwaleventdetailruangan`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `ruanganacara` on(`jadwaleventdetailruangan`.`idruangan` = `ruanganacara`.`idruangan`)) */;

/*View structure for view v_jadwaleventdetailtanggal_2 */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailtanggal_2` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailtanggal_2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailtanggal_2` AS select `jadwalevent`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`gambarsampul` AS `gambarsampul`,`jadwalevent`.`deskripsi` AS `deskripsi`,`jadwalevent`.`jenisjadwal` AS `jenisjadwal`,`jadwalevent`.`tema` AS `tema`,`jadwalevent`.`subtema` AS `subtema`,`jadwalevent`.`tampilkandiwebsite` AS `tampilkandiwebsite`,`jadwalevent`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwaleventdetailtanggal_2`.`iddetailtanggal2` AS `iddetailtanggal2`,`jadwaleventdetailtanggal_2`.`idjadwaleventdetail` AS `idjadwaleventdetail`,`jadwaleventdetailtanggal_2`.`tgljadwal` AS `tgljadwal`,`jadwaleventdetailtanggal_2`.`jammulai` AS `jammulai`,`jadwaleventdetailtanggal_2`.`jamselesai` AS `jamselesai` from (`jadwaleventdetailtanggal_2` join `jadwalevent` on(`jadwaleventdetailtanggal_2`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) */;

/*View structure for view v_jadwaleventregistrasi */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventregistrasi` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventregistrasi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventregistrasi` AS select `jadwaleventregistrasi`.`idregistrasi` AS `idregistrasi`,`jadwaleventregistrasi`.`idjadwalevent` AS `idjadwalevent`,`jadwaleventregistrasi`.`tglregistrasi` AS `tglregistrasi`,`jadwaleventregistrasi`.`idjemaat` AS `idjemaat`,`jadwaleventregistrasi`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwaleventregistrasi`.`tglkonfirmasi` AS `tglkonfirmasi`,`jadwaleventregistrasi`.`idpenggunakonfirmasi` AS `idpenggunakonfirmasi`,`jadwaleventregistrasi`.`keterangankonfirmasi` AS `keterangankonfirmasi`,`jemaat`.`namalengkap` AS `namalengkap`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`jenisjadwal` AS `jenisjadwal`,`jadwalevent`.`jumlahjemaat` AS `jumlahjemaat`,`jadwalevent`.`idkelas` AS `idkelas` from ((`jadwaleventregistrasi` join `jadwalevent` on(`jadwaleventregistrasi`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `jemaat` on(`jadwaleventregistrasi`.`idjemaat` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_jemaat */

/*!50001 DROP TABLE IF EXISTS `v_jemaat` */;
/*!50001 DROP VIEW IF EXISTS `v_jemaat` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaat` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`jemaat`.`idlokasi` AS `idlokasi`,`jemaat`.`idposisidalamkeluarga` AS `idposisidalamkeluarga`,`v_dcmember`.`namadc` AS `namadc`,`f_hitungumurthn`(`jemaat`.`tanggallahir`) AS `umur` from (`jemaat` left join `v_dcmember` on(`jemaat`.`idjemaat` = `v_dcmember`.`idjemaat`)) */;

/*View structure for view v_jemaatfamily */

/*!50001 DROP TABLE IF EXISTS `v_jemaatfamily` */;
/*!50001 DROP VIEW IF EXISTS `v_jemaatfamily` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaatfamily` AS select `jemaatfamily`.`nokaj` AS `nokaj`,`jemaatfamily`.`idjemaatfamily` AS `idjemaatfamily`,`jemaatfamily`.`idjemaat` AS `idjemaat`,`jemaatfamily`.`tglinsert` AS `tglinsert`,`jemaatfamily`.`idhubunganfamily` AS `idhubunganfamily`,`jemaatfamily`.`tglupdate` AS `tglupdate`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`hubunganfamily`.`namahubungan` AS `namahubungan` from ((`jemaatfamily` join `jemaat` on(`jemaatfamily`.`idjemaat` = `jemaat`.`idjemaat`)) join `hubunganfamily` on(`jemaatfamily`.`idhubunganfamily` = `hubunganfamily`.`idhubunganfamily`)) */;

/*View structure for view v_loginadmin */

/*!50001 DROP TABLE IF EXISTS `v_loginadmin` */;
/*!50001 DROP VIEW IF EXISTS `v_loginadmin` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_loginadmin` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`jemaat`.`idlokasi` AS `idlokasi`,`jemaat`.`idposisidalamkeluarga` AS `idposisidalamkeluarga`,`jemaat`.`statusverifikasiemail` AS `statusverifikasiemail`,`otorisasiuser`.`idotorisasi` AS `idotorisasi`,`otorisasi`.`namaotorisasi` AS `namaotorisasi` from ((`jemaat` join `otorisasiuser` on(`jemaat`.`idjemaat` = `otorisasiuser`.`idjemaat`)) join `otorisasi` on(`otorisasiuser`.`idotorisasi` = `otorisasi`.`idotorisasi`)) */;

/*View structure for view v_otorisasimenus */

/*!50001 DROP TABLE IF EXISTS `v_otorisasimenus` */;
/*!50001 DROP VIEW IF EXISTS `v_otorisasimenus` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_otorisasimenus` AS select `otorisasimenus`.`idotorisasi` AS `idotorisasi`,`otorisasi`.`namaotorisasi` AS `namaotorisasi`,`otorisasimenus`.`idmenu` AS `idmenu`,`backmenus`.`namamenu` AS `namamenu`,`backmenus`.`parentidmenu` AS `parentidmenu`,`backmenus`.`linkmenu` AS `linkmenu`,`backmenus`.`statusaktif` AS `statusaktif`,`backmenus`.`nomorurut` AS `nomorurut`,`backmenus`.`nlevels` AS `nlevels`,`backmenus`.`fontawesomeicon` AS `fontawesomeicon` from ((`otorisasimenus` join `otorisasi` on(`otorisasimenus`.`idotorisasi` = `otorisasi`.`idotorisasi`)) join `backmenus` on(`otorisasimenus`.`idmenu` = `backmenus`.`idmenu`)) */;

/*View structure for view v_otorisasiuser */

/*!50001 DROP TABLE IF EXISTS `v_otorisasiuser` */;
/*!50001 DROP VIEW IF EXISTS `v_otorisasiuser` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_otorisasiuser` AS select `otorisasiuser`.`idotorisasi` AS `idotorisasi`,`otorisasi`.`namaotorisasi` AS `namaotorisasi`,`otorisasiuser`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`foto` AS `foto` from ((`otorisasiuser` join `otorisasi` on(`otorisasiuser`.`idotorisasi` = `otorisasi`.`idotorisasi`)) left join `jemaat` on(`otorisasiuser`.`idjemaat` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_pages */

/*!50001 DROP TABLE IF EXISTS `v_pages` */;
/*!50001 DROP VIEW IF EXISTS `v_pages` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pages` AS select `pages`.`idpages` AS `idpages`,`pages`.`idpageskategori` AS `idpageskategori`,`pages`.`slug` AS `slug`,`pages`.`namapages` AS `namapages`,`pages`.`isipages` AS `isipages`,`pages`.`gambarsampul` AS `gambarsampul`,`pages`.`tglinsert` AS `tglinsert`,`pages`.`tglupdate` AS `tglupdate`,`pages`.`idjemaat` AS `idjemaat`,`pages`.`jumlahdilihat` AS `jumlahdilihat`,`pageskategori`.`namapageskategori` AS `namapageskategori`,`pages`.`ringkasan` AS `ringkasan` from (`pages` join `pageskategori` on(`pages`.`idpageskategori` = `pageskategori`.`idpageskategori`)) */;

/*View structure for view v_pendaftarankelas */

/*!50001 DROP TABLE IF EXISTS `v_pendaftarankelas` */;
/*!50001 DROP VIEW IF EXISTS `v_pendaftarankelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pendaftarankelas` AS select `jadwaleventregistrasi`.`idregistrasi` AS `idregistrasi`,`jadwaleventregistrasi`.`idjadwalevent` AS `idjadwalevent`,`jadwaleventregistrasi`.`tglregistrasi` AS `tglregistrasi`,`jadwaleventregistrasi`.`idjemaat` AS `idjemaat`,`jadwaleventregistrasi`.`tglkonfirmasi` AS `tglkonfirmasi`,`jadwaleventregistrasi`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwaleventregistrasi`.`idpenggunakonfirmasi` AS `idpenggunakonfirmasi`,`jadwaleventregistrasi`.`keterangankonfirmasi` AS `keterangankonfirmasi`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`idkelas` AS `idkelas`,`kelas`.`namakelas` AS `namakelas` from (((`jadwaleventregistrasi` join `jadwalevent` on(`jadwaleventregistrasi`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `jemaat` on(`jadwaleventregistrasi`.`idjemaat` = `jemaat`.`idjemaat`)) join `kelas` on(`jadwalevent`.`idkelas` = `kelas`.`idkelas`)) where `jadwalevent`.`jenisjadwal` = 'Kelas Next Step' */;

/*View structure for view v_pengkhotbah */

/*!50001 DROP TABLE IF EXISTS `v_pengkhotbah` */;
/*!50001 DROP VIEW IF EXISTS `v_pengkhotbah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengkhotbah` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`pengkhotbah`.`tanggalskpengkotbah` AS `tanggalskpengkotbah`,`pengkhotbah`.`tanggalskberakhir` AS `tanggalskberakhir`,`pengkhotbah`.`keterangan` AS `keterangan`,`pengkhotbah`.`idpengkhotbah` AS `idpengkhotbah`,`pengkhotbah`.`statusaktif` AS `statusaktif` from (`pengkhotbah` join `jemaat` on(`pengkhotbah`.`idjemaat` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_registrasikelas */

/*!50001 DROP TABLE IF EXISTS `v_registrasikelas` */;
/*!50001 DROP VIEW IF EXISTS `v_registrasikelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_registrasikelas` AS select `registrasikelas`.`idregistrasikelas` AS `idregistrasikelas`,`registrasikelas`.`tglregistrasikelas` AS `tglregistrasikelas`,`registrasikelas`.`tglsertifikat` AS `tglsertifikat`,`registrasikelas`.`idjemaat` AS `idjemaat`,`registrasikelas`.`idkelas` AS `idkelas`,`registrasikelas`.`tanggalinsert` AS `tanggalinsert`,`registrasikelas`.`tanggalupdate` AS `tanggalupdate`,`registrasikelas`.`idpengguna` AS `idpengguna`,`registrasikelas`.`nomorsertifikat` AS `nomorsertifikat`,`registrasikelas`.`linkurlsertifikat` AS `linkurlsertifikat`,`registrasikelas`.`statuslulus` AS `statuslulus`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`email` AS `email`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`foto` AS `foto`,`kelas`.`namakelas` AS `namakelas` from ((`registrasikelas` join `jemaat` on(`registrasikelas`.`idjemaat` = `jemaat`.`idjemaat`)) join `kelas` on(`registrasikelas`.`idkelas` = `kelas`.`idkelas`)) */;

/*View structure for view v_sidemenus */

/*!50001 DROP TABLE IF EXISTS `v_sidemenus` */;
/*!50001 DROP VIEW IF EXISTS `v_sidemenus` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sidemenus` AS select `sidemenus`.`idotorisasi` AS `idotorisasi`,`otorisasi`.`namaotorisasi` AS `namaotorisasi`,`sidemenus`.`idmenu` AS `idmenu`,`backmenus`.`namamenu` AS `namamenu`,`backmenus`.`parentidmenu` AS `parentidmenu`,`backmenus`.`linkmenu` AS `linkmenu`,`backmenus`.`statusaktif` AS `statusaktif`,`backmenus`.`nomorurut` AS `nomorurut`,`backmenus`.`nlevels` AS `nlevels`,`backmenus`.`fontawesomeicon` AS `fontawesomeicon`,`sidemenus`.`isdropdown` AS `isdropdown`,`sidemenus`.`menuonselected` AS `menuonselected` from ((`sidemenus` join `otorisasi` on(`sidemenus`.`idotorisasi` = `otorisasi`.`idotorisasi`)) join `backmenus` on(`sidemenus`.`idmenu` = `backmenus`.`idmenu`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
