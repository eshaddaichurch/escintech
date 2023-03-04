/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.11-MariaDB : Database - u1804486_escindonesia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u1804486_escindonesia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `u1804486_escindonesia`;

/*Table structure for table `disciplescommunity` */

DROP TABLE IF EXISTS `disciplescommunity`;

CREATE TABLE `disciplescommunity` (
  `iddc` char(5) NOT NULL,
  `namadc` varchar(100) DEFAULT NULL,
  `kategoridc` enum('Umum','Youth','Young Adult','Kids','Family') DEFAULT NULL,
  `haridc` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') DEFAULT NULL,
  `jamdc` time DEFAULT NULL,
  `alamatdc` varchar(255) DEFAULT NULL,
  `fotodc` varchar(255) DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`iddc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `disciplescommunity` */

insert  into `disciplescommunity`(`iddc`,`namadc`,`kategoridc`,`haridc`,`jamdc`,`alamatdc`,`fotodc`,`tanggalinsert`,`tanggalupdate`,`statusaktif`) values ('2','DC Tanjung Hulu','Umum',NULL,NULL,NULL,NULL,NULL,NULL,NULL),('3','DC Kota Baru','Umum',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `disciplescommunitymember` */

DROP TABLE IF EXISTS `disciplescommunitymember`;

CREATE TABLE `disciplescommunitymember` (
  `iddcmember` char(15) NOT NULL,
  `iddc` char(5) DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  `noskpengangkatan` varchar(25) DEFAULT NULL,
  `statuskeanggotaan` enum('Disciples Maker','Core Team','Anggota') DEFAULT NULL,
  `tanggalskpengangkatan` date DEFAULT NULL,
  `tanggalskberakhir` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tangalinsert` datetime DEFAULT NULL,
  `tanggalupdate` datetime DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`iddcmember`),
  KEY `idjemaat` (`idjemaat`),
  KEY `iddc` (`iddc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `disciplescommunitymember` */

insert  into `disciplescommunitymember`(`iddcmember`,`iddc`,`idjemaat`,`noskpengangkatan`,`statuskeanggotaan`,`tanggalskpengangkatan`,`tanggalskberakhir`,`keterangan`,`tangalinsert`,`tanggalupdate`,`statusaktif`) values ('1','2','2',NULL,NULL,'2022-05-19','2022-05-19',NULL,NULL,NULL,'Aktif');

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
  KEY `idcoreteam3` (`idcoreteam3`),
  CONSTRAINT `jadwaldc_ibfk_1` FOREIGN KEY (`iddc`) REFERENCES `disciplescommunity` (`iddc`),
  CONSTRAINT `jadwaldc_ibfk_2` FOREIGN KEY (`iddisciplesmmaker`) REFERENCES `disciplescommunitymember` (`iddcmember`),
  CONSTRAINT `jadwaldc_ibfk_3` FOREIGN KEY (`idcoreteam1`) REFERENCES `disciplescommunitymember` (`iddcmember`),
  CONSTRAINT `jadwaldc_ibfk_4` FOREIGN KEY (`idcoreteam2`) REFERENCES `disciplescommunitymember` (`iddcmember`),
  CONSTRAINT `jadwaldc_ibfk_5` FOREIGN KEY (`idcoreteam3`) REFERENCES `disciplescommunitymember` (`iddcmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwaldc` */

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
  KEY `iddcmember` (`iddcmember`),
  CONSTRAINT `jadwaldcabsensi_ibfk_1` FOREIGN KEY (`idjadwaldc`) REFERENCES `jadwaldc` (`idjadwaldc`),
  CONSTRAINT `jadwaldcabsensi_ibfk_2` FOREIGN KEY (`iddcmember`) REFERENCES `disciplescommunitymember` (`iddcmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwaldcabsensi` */

/*Table structure for table `jadwalibadahmingguan` */

DROP TABLE IF EXISTS `jadwalibadahmingguan`;

CREATE TABLE `jadwalibadahmingguan` (
  `idjadwalibadahmingguan` char(10) DEFAULT NULL,
  `tanggaljadwal` datetime DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `subtema` varchar(255) DEFAULT NULL,
  `idpengkotbah` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jadwalibadahmingguan` */

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
  `pendidikanterakhir` enum('SD','SMP','SMA/SMK','D3','D3','D1','S1','S2','S3') DEFAULT NULL,
  `namasekolah` varchar(50) DEFAULT NULL,
  `pekerjaan` enum('Swasta','Pegawai Negeri','TNI','POLRI','Wiraswasta') DEFAULT NULL,
  `namaperusahaan` varchar(50) DEFAULT NULL,
  `sektorindustri` varchar(50) DEFAULT NULL,
  `alamatkantor` varchar(255) DEFAULT NULL,
  `notelpkantor` char(16) DEFAULT NULL,
  `alamatrumah` varchar(255) DEFAULT NULL,
  `rt/rw` varchar(7) DEFAULT NULL,
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
  `statusjemaat` enum('Jemaat','Simpatisan') DEFAULT NULL,
  `tanggalinsert` datetime DEFAULT NULL,
  PRIMARY KEY (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jemaat` */

insert  into `jemaat`(`idjemaat`,`noaj`,`nik`,`kewarganegaraan`,`namalengkap`,`namapanggilan`,`tempatlahir`,`tanggallahir`,`jeniskelamin`,`statuspernikahan`,`golongandarah`,`notelp`,`nohp`,`email`,`facebook`,`instagram`,`namadarurat`,`hubungan`,`notelpdarurat`,`pendidikanterakhir`,`namasekolah`,`pekerjaan`,`namaperusahaan`,`sektorindustri`,`alamatkantor`,`notelpkantor`,`alamatrumah`,`rt/rw`,`kelurahan`,`kecamatan`,`kotakabupaten`,`propinsi`,`kodepos`,`foto`,`tanggalupdate`,`username`,`password`,`lastlogin`,`statusjemaat`,`tanggalinsert`) values ('2','232839','239849823084082','Indonesia','Toni Simanjuntak','TOni','Mdedan','2022-05-03','Laki-laki','','A','23232','23232','toni@gmail.com','toni.facebook.com','-','-','','10201','SD','-','','-','-','-','-','-','-','-','-','-','-','-','-','2022-05-25 00:00:00','toni','toni','0000-00-00 00:00:00','Jemaat','2022-05-25 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengkhotbah` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
