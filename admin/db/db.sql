/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.27-MariaDB : Database - u1804486_escindonesia
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

/*Data for the table `dcmember` */

insert  into `dcmember`(`iddcmember`,`iddc`,`idjemaat`,`statuskeanggotaan`,`keterangan`,`tanggalinsert`,`tanggalupdate`,`statusaktif`) values ('23021',NULL,'2207240001',NULL,'','2023-02-14 00:00:00','2023-02-14 00:00:00',NULL),('DBT0100001','DBT01','2212140002','Anggota','-','2023-02-18 13:24:32','2023-02-18 13:24:32',NULL),('DDW0200001','DDW02','2301040001','Anggota','test','2023-02-18 13:43:54','2023-02-18 13:43:54','Aktif'),('DMK0100001','DMK01','2207240001','Core Team','test lagi dulu','2023-02-18 13:44:07','2023-02-18 13:44:07','Aktif'),('LAR0100001','LAR01','2301040005','Anggota','bBaru masuk','2023-02-18 15:58:48','2023-02-18 15:58:48','Aktif');

/*Table structure for table `departement` */

DROP TABLE IF EXISTS `departement`;

CREATE TABLE `departement` (
  `iddepartement` char(8) NOT NULL,
  `idgroup` char(5) DEFAULT NULL,
  `namadepartement` varchar(255) DEFAULT NULL,
  `idjemaathead` char(10) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`iddepartement`),
  KEY `idjemaathead` (`idjemaathead`),
  KEY `idgroup` (`idgroup`),
  CONSTRAINT `departement_ibfk_1` FOREIGN KEY (`idjemaathead`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `departement_ibfk_2` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `departement` */

insert  into `departement`(`iddepartement`,`idgroup`,`namadepartement`,`idjemaathead`,`statusaktif`) values ('00001001','00001','Worship 1','2207090001','Aktif'),('00002001','00002','ESC IT','2205290001','Aktif');

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

/*Data for the table `disciplescommunity` */

insert  into `disciplescommunity`(`iddc`,`namadc`,`kategoridc`,`haridc`,`jamdc`,`alamatdc`,`fotodc`,`tanggalinsert`,`tanggalupdate`,`statusaktif`,`idjemaatdm`) values ('DBT01','DC Bersatu Kita Teguh','Youth','Jumat','19.00','Jl. Ampera','gambar1.jpeg','2022-08-10 10:11:05','2023-02-18 11:27:13','Aktif','2212140002'),('DDW01','DC David Wilando','Young Adult','Selasa','12.00','Ampera','foto dc','2022-08-06 14:45:05','2023-02-18 11:37:37','Aktif','2207090001'),('DDW02','DC David wilando 2','Family','Rabu','17.00','Ampera','gambar3.jpeg','2022-08-09 09:58:56','2023-02-18 11:28:19','Aktif','2301040001'),('DMK01','DC MArkus','Young Adult','Selasa','13.00','Ampera','','2022-08-27 11:29:12','2023-02-18 11:28:27','Aktif','2207240001'),('DNR01','DC NKRI','Family','Sabtu','19.00','Serdam','favicon1.png','2023-01-24 11:58:50','2023-02-18 11:37:55','Aktif','2205290001'),('DRD01','DC Rachel ','Kids','Minggu','08.00','Kota Baru Pontianak','','2022-08-25 15:31:44','2023-02-18 11:28:47','Aktif','2212140004'),('DRS01','DC Rivan Stevanus','Family','Jumat','','Jl. Serdam Komp. Puri Akcaya 2','fotodc','2022-08-09 08:49:45','2023-02-18 11:29:04','Tidak Aktif','2212140005'),('LAR01','Lampos Aritonang','Kids','Rabu','07.00','Ampera','fotodc','2022-08-13 16:20:45','2023-02-18 11:28:54','Aktif','2301040006'),('MMJ01','moses mo','Youth','Minggu','14.00','pontianak','','2022-08-18 10:09:38','2023-02-18 11:29:10','Aktif','2212140001'),('P9S01','psalm 91','Young Adult','Kamis','18.00','dimana saja','','2023-02-07 14:00:02','2023-02-18 11:29:17','Aktif','2212130001'),('TTO01','Test Toni','Youth','Selasa','17.00','test','025788100_1639671178-Ajaib.jpg','2022-08-27 11:29:56','2023-02-18 11:29:26','Aktif','2212130003');

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

/*Data for the table `frontmenus` */

insert  into `frontmenus`(`idmenu`,`parentidmenu`,`namamenu`,`jenismenu`,`idpages`,`linkmenu`,`openinnewtab`,`statusaktif`,`tanggalinsert`,`tanggalupdate`,`sysmenu`,`levels`,`nomorurut`,`idpageskategori`) values ('001',NULL,'Home','Url Link',NULL,'/',0,'Aktif','2022-09-23 21:25:15','2022-09-23 21:25:20',1,1,1,NULL),('AE001','AI001','About Elshaddai','Page Link','AP0012208200002',NULL,0,'Aktif','2023-01-28 02:45:56','2023-01-28 02:45:56',0,2,2,NULL),('AI001',NULL,'About / Tentang','None',NULL,NULL,NULL,'Aktif','2023-01-28 00:51:02','2023-01-28 03:48:53',0,1,2,''),('AJ001','AI001','About Jesus','Page Link','AP0012209240001',NULL,0,'Aktif','2023-01-28 02:32:06','2023-03-25 11:43:58',0,2,1,NULL),('CR001',NULL,'Care','Kategori Link',NULL,NULL,1,'Aktif','2023-01-28 03:02:46','2023-02-04 11:10:46',0,1,4,'CH001'),('GL001',NULL,'Giving','Page Link','AP0012301280001',NULL,0,'Aktif','2023-01-28 03:56:25','2023-01-28 03:56:25',0,1,5,NULL),('SO001',NULL,'Sermon','Kategori Link',NULL,NULL,0,'Aktif','2023-01-28 03:01:11','2023-01-28 03:01:11',0,1,3,'SW001'),('TA001','AI001','Tentang Alkitab','Url Link',NULL,'https://alkitab.com',1,'Aktif','2023-01-28 02:48:15','2023-01-28 02:48:15',0,2,3,NULL);

/*Table structure for table `group` */

DROP TABLE IF EXISTS `group`;

CREATE TABLE `group` (
  `idgroup` char(5) NOT NULL,
  `namagroup` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `idjemaathead` char(10) DEFAULT NULL,
  PRIMARY KEY (`idgroup`),
  KEY `idjemaathead` (`idjemaathead`),
  CONSTRAINT `group_ibfk_1` FOREIGN KEY (`idjemaathead`) REFERENCES `jemaat` (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `group` */

insert  into `group`(`idgroup`,`namagroup`,`statusaktif`,`idjemaathead`) values ('00001','Creative','Aktif','2212140009'),('00002','Office','Aktif','2207090001'),('00003','OFFICE','Aktif','2207090001'),('00004','Next Step','Aktif','2212140008'),('00005','Finance','Aktif','2207240001'),('00006','Community','Aktif','2207090001');

/*Table structure for table `hagah` */

DROP TABLE IF EXISTS `hagah`;

CREATE TABLE `hagah` (
  `idhagah` char(6) NOT NULL,
  `idkitab` int(3) DEFAULT NULL,
  `pasal1` int(11) DEFAULT NULL,
  `pasal2` int(11) DEFAULT NULL,
  `tglhagah` date DEFAULT NULL,
  PRIMARY KEY (`idhagah`),
  KEY `kitab` (`idkitab`),
  CONSTRAINT `hagah_ibfk_1` FOREIGN KEY (`idkitab`) REFERENCES `kitab` (`idkitab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `hagah` */

insert  into `hagah`(`idhagah`,`idkitab`,`pasal1`,`pasal2`,`tglhagah`) values ('230101',1,1,2,'2023-01-01'),('230102',1,3,5,'2023-01-02'),('230103',1,6,9,'2023-01-03'),('230104',1,10,11,'2023-01-04');

/*Table structure for table `hubunganfamily` */

DROP TABLE IF EXISTS `hubunganfamily`;

CREATE TABLE `hubunganfamily` (
  `idhubunganfamily` char(3) NOT NULL,
  `namahubungan` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idhubunganfamily`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `hubunganfamily` */

insert  into `hubunganfamily`(`idhubunganfamily`,`namahubungan`,`statusaktif`) values ('A01','KEPALA KELUARGA','Aktif'),('B01','ISTRI','Aktif'),('C01','ANAK','Aktif'),('D01','LAINNYA','Aktif');

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

/*Data for the table `infogereja` */

insert  into `infogereja`(`namagereja`,`alamatgereja`,`emailgereja`,`notelpgereja`,`urltwittergereja`,`urlfacebookgereja`,`urlinstagramgereja`,`urlskipegereja`,`urlgooglemaps`,`gambarhomepage`,`judulhomepage`,`subjudulhomepage`,`urlbuttonhomepage`,`opennewtabbuttonhomepage`) values ('El Shaddai Church','Jl. Kota Baru 1','elshaddai@intech.com','123456','1','2','','','-','2017-02-25.jpg','Sign And Wonders 1','Level UP','www.escinteach.com/class',NULL);

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

/*Data for the table `infostruktural` */

/*Table structure for table `inventarisruangan` */

DROP TABLE IF EXISTS `inventarisruangan`;

CREATE TABLE `inventarisruangan` (
  `idinventaris` char(5) DEFAULT NULL,
  `namainventaris` varchar(100) DEFAULT NULL,
  `satuan` char(15) DEFAULT NULL,
  `gambarinventaris` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `inventarisruangan` */

insert  into `inventarisruangan`(`idinventaris`,`namainventaris`,`satuan`,`gambarinventaris`,`statusaktif`) values ('I0001','Kursi','bh',NULL,'Aktif'),('I0002','Meja Krisbow Kecil 1','bh',NULL,'Aktif'),('I0003','Meja Krisbow Kecil 2','bh',NULL,'Aktif'),('I0004','Meja Krisbow Kecil 3','bh',NULL,'Aktif'),('I0005','Meja Krisbow Kecil 4','bh',NULL,'Aktif'),('I0006','Meja Krisbow Besar 1','bh',NULL,'Aktif'),('I0007','Meja Krisbow Besar 2','bh',NULL,'Aktif'),('I0008','Meja Krisbow Besar 3','bh',NULL,'Aktif'),('I0009','Meja Bundar Jati 1','bh',NULL,'Aktif'),('I0010','Meja Bundar Jati 2','bh',NULL,'Aktif'),('I0011','Meja Bundar Jati 3','bh',NULL,'Aktif'),('I0012','Meja Bundar Informa 1','bh',NULL,'Aktif'),('I0013','Meja Bundar Informa 2','bh',NULL,'Aktif');

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
  KEY `iddcmember` (`iddcmember`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaldcabsensi` */

/*Table structure for table `jadwalevent` */

DROP TABLE IF EXISTS `jadwalevent`;

CREATE TABLE `jadwalevent` (
  `idjadwalevent` char(10) NOT NULL,
  `namaevent` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `idpenanggungjawab` char(10) DEFAULT NULL,
  `gambarsampul` varchar(255) DEFAULT NULL,
  `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') DEFAULT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `idpenggunakonfirmasi` char(10) DEFAULT NULL,
  `iddepartement` char(8) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `idpengguna` char(10) DEFAULT NULL,
  `jenisjadwal` enum('Jadwal Ibadah','Kelas Next Step','Event') DEFAULT NULL,
  `idpengkhotbah` char(12) DEFAULT NULL,
  `streamingurl` varchar(255) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `subtema` varchar(255) DEFAULT NULL,
  `harusdaftar` int(1) DEFAULT NULL,
  PRIMARY KEY (`idjadwalevent`),
  KEY `idpenanggungjawab` (`idpenanggungjawab`),
  KEY `iddepartement` (`iddepartement`),
  CONSTRAINT `jadwalevent_ibfk_1` FOREIGN KEY (`idpenanggungjawab`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `jadwalevent_ibfk_2` FOREIGN KEY (`iddepartement`) REFERENCES `departement` (`iddepartement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwalevent` */

insert  into `jadwalevent`(`idjadwalevent`,`namaevent`,`deskripsi`,`idpenanggungjawab`,`gambarsampul`,`statuskonfirmasi`,`tglkonfirmasi`,`idpenggunakonfirmasi`,`iddepartement`,`tglinsert`,`tglupdate`,`idpengguna`,`jenisjadwal`,`idpengkhotbah`,`streamingurl`,`tema`,`subtema`,`harusdaftar`) values ('JE23040002','test','test','2301040007',NULL,'Menunggu',NULL,NULL,'00001001','2023-04-29 13:11:32','2023-04-29 13:11:32','2205280001',NULL,NULL,NULL,NULL,NULL,NULL),('JE23040003','test','test','2301040007',NULL,'Menunggu',NULL,NULL,'00001001','2023-04-29 13:18:34','2023-04-29 13:18:34','2205280001',NULL,NULL,NULL,NULL,NULL,NULL),('JE23040004','test','test','2301040007',NULL,'Menunggu',NULL,NULL,'00001001','2023-04-29 13:20:56','2023-04-29 13:20:56','2205280001',NULL,NULL,NULL,NULL,NULL,NULL),('JE23050001','Esc Women','esc perempuan','2212140002',NULL,'Menunggu',NULL,NULL,'00001001','2023-05-06 14:34:22','2023-05-06 14:34:22','2205280001',NULL,NULL,NULL,NULL,NULL,NULL),('JE23050002','Ibadah I','-','2212140002',NULL,'Menunggu',NULL,NULL,'00001001','2023-05-13 12:11:49','2023-05-13 12:11:49','2205280001','Jadwal Ibadah','220724000101','','Endrich','-',NULL),('JE23050003','atest','','2212140002',NULL,'Menunggu',NULL,NULL,'00001001','2023-05-13 13:34:05','2023-05-13 13:34:05','2205280001','Jadwal Ibadah','220724000101','','sdaf','sdaf',0),('JE23050004','ESC Women','aaaa','2212140002',NULL,'Menunggu',NULL,NULL,'00001001','2023-05-13 14:20:04','2023-05-13 14:20:04','2205280001','Event','','test','','',0),('JE23060001','sdaf','','2212140011',NULL,'Menunggu',NULL,NULL,'00001001','2023-06-17 11:55:34','2023-06-17 11:55:34','2205280001','','220529000101','','','',0);

/*Table structure for table `jadwaleventdetailtanggal` */

DROP TABLE IF EXISTS `jadwaleventdetailtanggal`;

CREATE TABLE `jadwaleventdetailtanggal` (
  `idjadwaleventdetail` int(11) NOT NULL AUTO_INCREMENT,
  `idjadwalevent` char(10) DEFAULT NULL,
  `tgljadwaleventmulai` date DEFAULT NULL,
  `tgljadwaleventselesai` date DEFAULT NULL,
  `jammulai` time DEFAULT NULL,
  `jamselesai` time DEFAULT NULL,
  `diulangsetiapminggu` int(1) DEFAULT 0,
  KEY `idjadwalevent` (`idjadwalevent`),
  KEY `idjadwaleventdetail` (`idjadwaleventdetail`),
  CONSTRAINT `jadwaleventdetailtanggal_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailtanggal` */

insert  into `jadwaleventdetailtanggal`(`idjadwaleventdetail`,`idjadwalevent`,`tgljadwaleventmulai`,`tgljadwaleventselesai`,`jammulai`,`jamselesai`,`diulangsetiapminggu`) values (2,'JE23040002','2023-04-29','2023-04-29','12:50:00','00:50:00',0),(4,'JE23040003','2023-04-29','2023-04-29','12:50:00','00:50:00',0),(6,'JE23040004','2023-04-29','2023-04-29','12:50:00','00:50:00',0),(7,'JE23050001','2023-05-17','2023-05-19','22:00:00','12:06:00',0),(8,'JE23050002','2023-05-13','2023-05-13','12:11:00','00:11:00',0),(9,'JE23050003','2023-03-08','2023-05-13','15:33:00','15:20:00',0),(10,'JE23050004','2023-05-14','2023-05-24','16:19:00','18:19:00',0),(11,'JE23060001','2023-06-15','2023-06-02','00:49:00','01:49:00',0);

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

/*Data for the table `jadwalibadahmingguan` */

insert  into `jadwalibadahmingguan`(`idjadwalibadahmingguan`,`tanggaljadwal`,`tema`,`subtema`,`idpengkhotbah`,`videoembed`,`gambarsampul`) values ('2301280001','2023-01-15 00:00:00','adad','adad','2207240001','adad',NULL),('2301280002','2023-01-29 00:00:00','b','b','2207090001','b',NULL),('2302130001','2023-02-13 00:00:00','Diperkaya ','miskin untuk menjadi kaya','2207090001','',NULL),('2304150001','2023-04-16 00:00:00','test','test','2212140002','test',NULL);

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
  PRIMARY KEY (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jemaat` */

insert  into `jemaat`(`idjemaat`,`noaj`,`nik`,`kewarganegaraan`,`namalengkap`,`namapanggilan`,`tempatlahir`,`tanggallahir`,`jeniskelamin`,`statuspernikahan`,`golongandarah`,`notelp`,`nohp`,`email`,`facebook`,`instagram`,`namadarurat`,`hubungan`,`notelpdarurat`,`pendidikanterakhir`,`namasekolah`,`pekerjaan`,`namaperusahaan`,`sektorindustri`,`alamatkantor`,`notelpkantor`,`alamatrumah`,`rtrw`,`kelurahan`,`kecamatan`,`kotakabupaten`,`propinsi`,`kodepos`,`foto`,`tanggalupdate`,`username`,`password`,`lastlogin`,`statusjemaat`,`tanggalinsert`,`idlokasi`,`idposisidalamkeluarga`) values ('2205280001','','1111111111111111','Indonesia','Develop System','Develop System','Jakarta','2022-05-19','Laki-laki','Belum Kawin','A','','','budi@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','','','','','','','','','2022-05-28 02:50:25','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-05-28 02:50:25',NULL,'1'),('2205290001','','123456789','Indonesia','RIVAN STEVANUS TAMPI','Rivan','Manado','1983-09-30','Laki-laki','Kawin','B','','085234786655','escintech@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Serdam. Komp. Puri Akcaya D.12','007/002','Sungai raya dalam','Sungai raya','Kubu Raya','Kalimantan barat','','','2023-03-11 13:56:29','Rivan','708af01b0093065b9fa75aafba5a67d8',NULL,'Simpatisan','2023-03-11 13:56:29',NULL,'1'),('2207090001','','6171011712950001','Asing','DAVID RYAN WILANDO','David','Jakarta','1995-12-17','Laki-laki','Kawin','A','','08111358884','davidwilando1795@gmail.com','https://www.facebook.com/DavidWilando/','https://www.instagram.com/davidwilando/?hl=id','Nindya Ellysa Lidsya','Istri/ Suami','081294487010','S1','UPH','Swasta','GBI ELSHADDAI','Organisasi Keagamaan','Jl.Prof. M Yamin 1A','0561765495','jl. ujung pandang 2, komp. the green mansion No. C9 ','004/039','Sui Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78118','','2023-02-15 14:04:29','david','172522ec1028ab781d9dfd17eaca4427',NULL,'Simpatisan','2023-02-15 14:04:29',NULL,'1'),('2207240001','','161917373545','Asing','Agam Suteja','Agam','pontianak','1998-05-24','Laki-laki','Belum Kawin','A','08992885301','08992885301','agamsutej98@gmail.com','ndak ada','apa lagi ini','',NULL,'',NULL,'',NULL,'','','','','belum punya rumah','1','belum punya','apalagi ini','pontianak','kalbar','176453','','2023-03-11 13:55:36','agam','9c85a3c7fc695d9f7d278f7d409fb09d',NULL,'Simpatisan','2023-03-11 13:55:36',NULL,'1'),('2212130001','','6112014806830006','Indonesia','RINA VIDIA WATI','RINA','Balikpapan','1983-06-08','Perempuan','Kawin',NULL,'','081543348543','Rinavidia@gmail.com','','','',NULL,'','S1','',NULL,'','','','','Jl. Sungai Raya Dalam Komp. Puri Akcaya 2 No. D 12','007/003','Sungai raya dalam','Sungai raya','Kubu Raya','Kalimantan Barat','','','2022-12-13 09:44:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 09:44:47',NULL,'1'),('2212130002','','6171013010710003','Indonesia','EDY LUKMAN','Edi','Pontianak','1971-10-30','Laki-laki','Kawin',NULL,'','','Edi@gmail.com','','','',NULL,'','D3','','Swasta','','','','','JL.PURNAMA GG. PERINTIS 2 NO D-5','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2022-12-13 09:59:01','edi','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2022-12-13 09:59:01',NULL,'1'),('2212130003','','6171016805730006','Indonesia','YUSNITA','YUSNITA','SEKADAU','1973-06-28','Perempuan','Kawin',NULL,'','08524584869','Yusnita@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2022-12-13 09:58:25','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 09:58:25',NULL,'1'),('2212130004','','6171014305040008','Indonesia','RATU ESTER GENDOT AMPOR','RATU','Pontianak','2004-05-03','Perempuan','Belum Kawin',NULL,'','08524584869','Ratu@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.M YAMIN A 99\r\n','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2022-12-13 10:01:31','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:01:31',NULL,'1'),('2212130005','','6171012011660003','Indonesia','WIJARNAKO','WIJARNAKO','Tegal','1966-11-20','Laki-laki','Kawin',NULL,'','081253257396','Wijarnako@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PH . HUSIN 2 KP.PARIS INDAH LESTARI BB 11','002/003','Bansur Darat','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2022-12-13 10:04:37','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:04:37',NULL,'1'),('2212130006','','6171015912660003','Indonesia','LIM PO HUI','LIM PO HUI','Pontianak','1966-12-19','Perempuan','Kawin',NULL,'','','LIMPOHUI@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PH . HUSIN 2 KP.PARIS INDAH LESTARI BB 11\r\n','002/003','Bansir Darat','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2022-12-13 10:22:24','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:22:24',NULL,'1'),('2212130007','','6171013010710003','Indonesia','EDY LUKMAN','EDY LUKMAN','Pontianak','1971-10-30','Laki-laki','Kawin',NULL,'','','EDYLUKMAN@gmail.com','','','',NULL,'','S1','',NULL,'','','','','','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78116','','2022-12-13 10:25:23','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:25:23',NULL,'1'),('2212130008','','6171015304750011','Indonesia','HI LUAN','HI LUAN','Tanjung Satai','1975-04-13','Perempuan','Kawin',NULL,'','','HILUAN@gmail.com','','','',NULL,'','S1','',NULL,'','','','','JL.PURNAMA GG. PERINTIS 2 NO D-5','004/015','Akcaya','Pontianak Selatan','Pontianak ','Kalimantan Barat','78116','','2022-12-13 10:28:32','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:28:32',NULL,'1'),('2212130009','','6171031106760012','Indonesia','HENDRI KAKENANG SAAD, SP','HENDRI KAKENANG SAAD, SP','Pakumbang','1976-06-11','Laki-laki','Kawin',NULL,'','','HENDRIKAKENANGSAAD@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. JERANDING NO. 50','001/009','Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-13 10:31:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:31:47',NULL,'1'),('2212140001','','6171030601275001','Indonesia','ERICA FRENSYA CAI','ERICA ','Pontianak','1975-12-20','Perempuan','Kawin',NULL,'','081352500696','ERICAFRENSYACAI@gmail.com','','','',NULL,'','D3','',NULL,'','','','','JL. JERANDING NO. 5','001/009','Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 09:44:57','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 09:44:57',NULL,'1'),('2212140002','0000002','6171050603750009','Indonesia','AFRA FITRIA','AFRA FITRIA','Penyalimau Hilir','1976-11-21','Laki-laki','Kawin',NULL,'','','AFRAFITRIA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.AMPERA KOMP. ZAL KHATULISTIWA NO. C-3','001/029','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-03-18 14:20:21','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Jemaat','2023-03-18 14:20:21',NULL,'1'),('2212140003','','6171054603970003','Indonesia','ANASTASIA MARINI AFANTI','ANASTASIA MARINI AFANTI','Pontianak','1997-03-06','Perempuan','Kawin',NULL,'','','ANASTASIAMARINIAFANTI@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.AMPERA KOMP. ZAL KHATULISTIWA NO. C-3','001/029','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 09:53:30','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 09:53:30',NULL,'1'),('2212140004','','6110569099800001','Indonesia','NURIMANG','NURIMANG','SAMBAS','1998-09-29','Laki-laki','Kawin',NULL,'','','NURIMANG@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.PROF M YAMIN NO 1 A','001/018','Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan barat','781116','','2022-12-14 10:41:16','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 10:41:16',NULL,'1'),('2212140005','','6171010511670004','Indonesia','ZAKHARIA RONNY ANGGARA','ZAKHARIA RONNY ANGGARA','Balikpapan','1967-11-05','Laki-laki','Janda/ Duda',NULL,'','081345945877','ZAKHARIARONNYANGGARA@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.SUI RAYA DALAM VILLA GADING RAYA 1 NO II B','001/006','','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','781116','','2022-12-14 10:45:17','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 10:45:17',NULL,'1'),('2212140006','','6171014312770011','Indonesia','HO SOK KIAU','HO SOK KIAU','Pontianak','1977-12-03','Laki-laki','Kawin',NULL,'','081349600523','HOSOKKIAU@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PURNAMA KOMP. PURNAMA AGUNG VII NO . J .15','003/041','Parit Tokaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','78121','','2022-12-14 11:18:58','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 11:18:58',NULL,'1'),('2212140007','','6171015011060002','Indonesia','TIARA IVANA','TIARA IVANA','Pontianak','2006-11-10','Perempuan','Belum Kawin',NULL,'','081349600523','TIARAIVANA@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PURNAMA KOMP. PURNAMA AGUNG VII NO . J .15','003/041','Parit Tokaya','Pontianak Selatan','Pontianak Kota','Kota Pontianak','78121','','2022-12-14 13:19:55','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 13:19:55',NULL,'1'),('2212140008','','1271205112860001','Indonesia','NAOMI YEMIMA MANALU','NAOMI','MEDAN','1986-12-11','Perempuan','Belum Kawin',NULL,'','08152052384','NAOMIYEMIMAMANALU@gmail.com','','','',NULL,'','S2','','Swasta','','','','','JL.PROF M YAMIN NO 1 A','001/018','Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 14:56:51','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 14:56:51',NULL,'1'),('2212140009','','6106011409860002','Indonesia','JOZETHIAN WATTA','JOZETHIAN','MANGOLE','1986-09-14','Laki-laki','Kawin',NULL,'','081522805656','JOZETHIANWATTA@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.IMAM BONJOL GG.MENDAWAI TENGAH NO.46B','002/004','Bansir Laut','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','78121','','2022-12-14 15:05:56','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 15:05:56',NULL,'1'),('2212140010','','6112016711760003','Indonesia','EIVA RADE SITIO','EIVA','Medan','1899-11-30','Perempuan','Belum Kawin',NULL,'','','eivaradesitio@gmail.com','','','',NULL,'','S1','','Swasta','','','','','komp bali lestari D.13','001/012','','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-03-11 14:21:46','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-03-11 14:21:46',NULL,'1'),('2212140011','0000003','6112090211940005','Indonesia','LAMPOS LAMBOK ARITONANG','Lampos','Pontianak','1994-04-02','Laki-laki','Kawin',NULL,'','089648565494','Lamposclalucelia@gmail.com','','','',NULL,'','D3','','Swasta','','','','','Jl. Komp. Ari Karya Indah 2\r\n','062/015','Pal.Sembilan','Sungai Kakap','Kabupaten Kuburaya','Kalimantan Barat','78381','','2023-05-13 11:41:16','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Jemaat','2023-05-13 11:41:16',NULL,'1'),('2212140012','','6171032708870001','Indonesia','ELKANA PUTRA BORNEO PURBA','NEO','Pontianak','1987-08-27','Laki-laki','Kawin',NULL,'','089656038474','ELKANAPUTRABORNEOPURBA@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA GG.PERINTIS IV','001/008','Parit Tokaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 15:48:42','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 15:48:42',NULL,'1'),('2301040001','','6171010507720510','Indonesia','DANIEL DJOKO PRAPMONO','DANIEL DJOKO PRAPMONO','Semarang','1972-07-05','Laki-laki','Kawin',NULL,'','','DANIELDJOKOPRAPMONO@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PARIT H. HUSIN II KOMP.Central Park REAL ESTATE BLOK','005/004','Bangka Belitung Darat','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','78124','','2023-01-04 09:21:33','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-01-04 09:21:33',NULL,'1'),('2301040002','','6171021605680008','Indonesia','MH.SIMBOLON','MH.SIMBOLON','Tapanuli Utara','1968-05-16','Laki-laki','Kawin',NULL,'','','MH.SIMBOLON@gmail.com','','','',NULL,'',NULL,'','Swasta','','','','','JL. YA\'M SABRAN KOMP.VILLA ELEKTRIK BLOK D2/NO002','002/011','Tanjung Hulu','Pontianak Timur','Kota Pontianak','Kalimantan Barat','78237','','2023-03-18 12:37:19','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-03-18 12:37:19',NULL,'1'),('2301040003','','6171024711740005','Indonesia','TIURMA SINAGA','TIURMA SINAGA','Medan','1974-11-07','Laki-laki','Kawin',NULL,'','','TIURMASINAGA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL. YA\'M SABRAN KOMP.VILLA ELEKTRIK BLOK D2/NO002','002/011','Tanjung Hulu','Pontianak Timur','Kota Pontianak','Kalimantan Barat','78237','','2023-03-11 15:58:48','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-03-11 15:58:48',NULL,'1'),('2301040004','','6171050606730015','Indonesia','DONISIANUS ANDRI','DONISIANUS ANDRI','Kapuas Hulu','1973-06-06','Laki-laki','Kawin',NULL,'','','DONISIANUSANDRI@gmail.com','','','',NULL,'','','','Wiraswasta','','','','','JL. ST A. RAHMAN GGSUKAMULYA NO 12D','002/013','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-01-04 10:08:19','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-01-04 10:08:19',NULL,'1'),('2301040005','','6305040602800001','Indonesia','KORES WIHANTORO, SH.','KORES WIHANTORO, SH.','TIRTAMULYA MUBA','1980-02-06','Laki-laki','Kawin',NULL,'','','KORESWIHANTORO@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.SWADAYA GG. TUNAS HARAPAN KOMP. ZAMRUD SWADAYA II B. 17','007/007','PAL SEMBILAN','Kubu Raya','Kabupaten Kuburaya','Kalimantan Barat','78381','','2023-03-11 14:51:13','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-03-11 14:51:13',NULL,'1'),('2301040006','','6305042603100001','Indonesia','YENNY MEGAWATI HUTAPEA','YENNY MEGAWATI HUTAPEA','Kota Baru','1981-06-19','Perempuan','Kawin',NULL,'','','YENNYMEGAWATIHUTAPEA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.SWADAYA GG. TUNAS HARAPAN KOMP. ZAMRUD SWADAYA II B. 17','007/006','Pal Sembilan','Sei.Kakap','Kuburaya','Kalimantan Barat','78381','','2023-05-13 11:00:15','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-05-13 11:00:15',NULL,'1'),('2301040007','0000001','6104184905650001','Indonesia','DERIANA KANDE','DERIANA ','POSO','1965-05-09','Perempuan','Janda/ Duda','A','','','DERIANAKANDE@gmail.com','','','',NULL,'',NULL,'','Wiraswasta','','','','','JL.KRAKATAU NO.180','004/009','Akcaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','78121','','2023-03-18 12:57:16','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Jemaat','2023-03-18 12:57:16',NULL,'1');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jemaatfamily` */

insert  into `jemaatfamily`(`idjemaatfamily`,`nokaj`,`idjemaat`,`idhubunganfamily`,`tglinsert`,`tglupdate`) values (2,'00001','2207240001','A01','2023-03-11 13:55:36','2023-03-11 13:55:36'),(3,'00002','2205290001','A01','2023-03-11 13:56:29','2023-03-11 13:56:29'),(5,'00001','2212140010','B01','2023-03-11 14:31:36','2023-03-11 14:31:36'),(6,'00001','2212130004','C01','2023-03-11 14:44:10','2023-03-11 14:44:10'),(7,'00001','2301040005','C01','2023-03-11 14:51:41','2023-03-11 14:51:41'),(8,'00001','2212130003','D01','2023-03-11 15:55:39','2023-03-11 15:55:39'),(9,'00003','2301040003','A01','2023-03-11 15:58:48','2023-03-11 15:58:48'),(11,'00005','2301040002','A01','2023-03-18 12:37:19','2023-03-18 12:37:19'),(13,'00004','2212140002','A01','2023-05-13 10:44:23','2023-05-13 10:44:23'),(17,'00006','2212140011','A01','2023-05-13 11:41:16','2023-05-13 11:41:16');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `idkelas` char(5) NOT NULL,
  `namakelas` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `urlsertifikat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `kelas` */

insert  into `kelas`(`idkelas`,`namakelas`,`statusaktif`,`urlsertifikat`) values ('KL001','Membership Class','Aktif',NULL),('KL002','Foundation Class 1','Aktif',NULL),('KL003','Foundation Class 2','Aktif',NULL),('KL004','Foundation Class 3','Aktif',NULL),('KL005','Grade 1','Aktif','sertifikat_g1.png'),('KL006','Grade 2','Aktif',NULL),('KL007','Grade 3','Aktif',NULL),('KL008','Folunteer Class','Aktif',NULL),('KL101','Marriage Class','Aktif',NULL);

/*Table structure for table `kelasmateri` */

DROP TABLE IF EXISTS `kelasmateri`;

CREATE TABLE `kelasmateri` (
  `idkelasmateri` char(10) NOT NULL,
  `idkelas` char(5) DEFAULT NULL,
  `judulmateri` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idkelasmateri`) USING BTREE,
  KEY `idkelas` (`idkelas`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `kelasmateri` */

insert  into `kelasmateri`(`idkelasmateri`,`idkelas`,`judulmateri`) values ('KL00300001','KL003','APAKAH DOA'),('KL00300002','KL003','MENGAPA ALLAH MEMINTA KITA BERDOA'),('KL00300003','KL003','PENGHALANG DOA'),('KL00300004','KL003','SAAT TEDUH'),('KL00300005','KL003','PELAYANAN DOA SAFAAT'),('KL00300006','KL003','PEPERANGAN ROHANI'),('KL00400001','KL004','HATI BAPA'),('KL00400002','KL004','GAMBAR DIRI'),('KL00400003','KL004','LUKA BATIN'),('KL00400004','KL004','PELEPASAN'),('KL00500001','KL005','DOKTRIN TENTANG ALKITAB'),('KL00500002','KL005','DOKTRIN TENTANG ALLAH'),('KL00500003','KL005','DOKTRIN TENTANG YESUS'),('KL00500004','KL005','DOKTRIN TENTANG PENCIPTAAN'),('KL00500005','KL005','DOKTIN TENTANG MANUSIA'),('KL00500006','KL005','DOKTRIN TENTANG KESELAMATAN'),('KL00600001','KL006','ROH KUDUS PRIBADI ILLAHI'),('KL00600002','KL006','NAMA & LAMBANG ROH KUDUS'),('KL00600003','KL006','BAPTISAN ROH KUDUS'),('KL00600004','KL006','KARYA ROH KUDUS'),('KL00600005','KL006','KARUNIA-KARUNIA ROH KUDUS'),('KL00600006','KL006','BUAH ROH'),('KL00700001','KL007','DOKTRIN TENTANG AKHIR ZAMAN (ESKATOLOGI)'),('KL00700002','KL007','DOKTRIN TENTANG PENGANGKATAN ORANG PERCAYA'),('KL00700003','KL007','DOKTRIN TENTANG TAHTA PENGADILAN KRISTUS'),('KL00700004','KL007','DOKTRIN TENTANG PERJAMUAN KAWIN ANAK DOMBA'),('KL00700005','KL007','DOKTRIN TENTANG ANTIKRISTUS'),('KL00700006','KL007','DOKTRIN TENTANG MASA BERLANGSUNGNYA KUASA KEJAHATAN ANTIKRISTUS'),('KL00700007','KL007','DOKTRIN TENTANG KEDATANGAN YESUS YANG KEDUA'),('KL00700008','KL007','DOKTRIN TENTANG PERANG HAMAGEDON '),('KL00700009','KL007','DOKTRIN KERAJAAN 1000 TAHUN DAMAI'),('KL00700010','KL007','DOKTRIN TENTANG GOG MAGOG '),('KL00700011','KL007','DOKTRIN TAHTA PUTIH YANG BESAR'),('KL00700012','KL007','DOKTRIN TENTANG KEBANGKITAN YANG PERTAMA DAN KEDUA & SORGA'),('KL00700013','KL007','DOKTRIN TENTANG SORGA');

/*Table structure for table `kitab` */

DROP TABLE IF EXISTS `kitab`;

CREATE TABLE `kitab` (
  `idkitab` int(3) NOT NULL AUTO_INCREMENT,
  `namakitab` varchar(50) DEFAULT NULL,
  `externalid` char(25) DEFAULT NULL,
  PRIMARY KEY (`idkitab`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `kitab` */

insert  into `kitab`(`idkitab`,`namakitab`,`externalid`) values (1,'Kejadian',NULL),(2,'Keluaran',NULL),(5,'Imamat',NULL),(6,'Bilangan',NULL),(7,'Ulangan',NULL),(8,'Yosua',NULL);

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

/*Data for the table `lokasigereja` */

insert  into `lokasigereja`(`idlokasi`,`namagereja`,`alamatgereja`,`namagembala`,`statusaktif`) values ('01','Elshaddai Church','Jl. Kotabaru','Pdt. Wilan','Aktif'),('02','GBI Elshaddai Serdam','Jl. Serdam','Pdm. Johanes Johari','Aktif');

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
  PRIMARY KEY (`idpages`),
  UNIQUE KEY `slug` (`slug`),
  KEY `pages_ibfk_1` (`idjemaat`),
  KEY `idpageskategori` (`idpageskategori`),
  CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `pages_ibfk_2` FOREIGN KEY (`idpageskategori`) REFERENCES `pageskategori` (`idpageskategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `pages` */

insert  into `pages`(`idpages`,`idpageskategori`,`namapages`,`slug`,`isipages`,`gambarsampul`,`tglinsert`,`tglupdate`,`idjemaat`,`jumlahdilihat`) values ('AP0012208200002','AP001','Tentang Elshaddai','sadfs','<p>daf</p>\r\n','2017-02-251.jpg','2022-08-20 13:16:48','2022-08-20 13:19:07','2205280001',0),('AP0012209240001','JP001','JESUS','jesus','<p><em><strong>&quot;Yesus Kristus adalah Anak Allah yang tunggal, dilahirkan oleh perawan Maria yang dinaungi oleh Roh Kudus. Bahwa Yesus telah disalibkan, mati, dikuburkan, dan dibangkitkan pada hari yang ketiga dari antara orang mati. Bahwa la telah naik ke Surga dan duduk di sebelah kanan Allah Bapa sebagai Tuhan, Juruselamat, dan pengantara kita&quot;.</strong></em></p>\r\n\r\n<p>&quot;Anak Allah&quot; menunjukkan hubungan yang sangat dekat antara Yesus dengan Allah Bapa. Dalam Efesus 1:3 dikatakan, &quot;Terpujilah Allah dan Bapa kita Tuhan Yesus Kristus&quot;. Bapa menunjuk kepada pribadi Allah, hal ini lebih dari hanya sekadar sebutan, tetapi mengarah kepada pengertian hubungan antara Yesus dengan Bapa (pribadi Allah). Juga sering digunakannya nama &ldquo;Anak Allah&quot; sehubungan dengan keberadaan Keallahan-Nya dan pekerjaan ilahi-Nya (Luk 1:35). Selain itu nama &quot;Anak Allah&quot; juga berhubungan dengan ketrinitasan (Mat 11:27, Mat 14:28-33, Mat 16:16, Mat 21:33-46, Mat 22:41-46). Hubungan antara Bapa dan Yesus sangatlah unik karena bersifat kekal (Yoh 17:1-5). Yesus digambarkan sebagai anak tunggal Bapa; hal ini melukiskan tentang Bapa yang dengan kasih sayang telah memberikan Anak- Nya yang sangat dikasihi kepada kita (Yoh 1:1).</p>\r\n\r\n<p>Bukti tentang Keilahian Yesus:</p>\r\n\r\n<ul>\r\n	<li>Gelar Anak Allah yang banyak dicatat oleh penulis Alkitab (Kis 8:37, 1 Kor 1:19, Gal 2:20, Ef 4:13) menunjukkan keilahian Yesus.</li>\r\n	<li>la adalah Firman dan Firman itu adalah Allah (Yoh 1:1).</li>\r\n	<li>la mampu mengampuni dosa (Mat 9:2-7).</li>\r\n	<li>Setan pun mengakui Yesus adalah Allah (pengusiran setan dari orang yang kerasukan di Gadara).</li>\r\n	<li>la mati dan bangkit pada hari yang ke-tiga, membuktikan la sebagai Allah yang hidup.</li>\r\n	<li>la disembah oleh orang-orang (Mat 2:2).</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>NEXT STEP:</p>\r\n\r\n<p><a class=\"btn btn-sm btn-warning\" href=\"http://localhost:6060/escintech/pages/read/-/salvation-prayer\">The First Step - Follow This Prayer</a></p>\r\n','','2022-09-24 10:44:39','2023-03-25 12:24:20','2205280001',0),('AP0012301280001','AP001','Giving','giving','','','2023-01-28 03:55:54','2023-01-28 03:55:54','2205280001',0),('CH0012302040001','CH001','Kunjungan Penjara','kunjungan-penjara','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n','','2023-02-04 00:30:50','2023-02-04 00:37:39','2205280001',0),('NS0012303250001','NS001','Salvation Prayer','salvation-prayer','<p style=\"text-align:center\"><iframe align=\"middle\" frameborder=\"0\" height=\"500\" scrolling=\"no\" src=\"https://www.youtube.com/embed/XdlhJiEDqJ8\" title=\"YouTube video player\" width=\"80%\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4 style=\"text-align:center\">SELAMAT ANDA TELAH BERGABUNG DI DALAM KELUARGA ALLAH</h4>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ingin lebih dalam mengalami kuasa dan kasih Tuhan? Mari bergabung dengan Step Berikutnya.</p>\r\n\r\n<p><a class=\"btn btn-sm btn-warning\" href=\"http://localhost:6060/escintech/pages/read/-/salvation-prayer\">The Second Step - Baptized</a></p>\r\n','','2023-03-25 11:24:02','2023-03-25 12:59:40','2205280001',0),('NS0012303250002','NS001','Second Step - Baptized','second-step---baptized','<p>Penjelasan tengan Fondation Class 1 dan persyaratannya.</p>\r\n','','2023-03-25 13:03:28','2023-03-25 13:03:28','2205280001',0),('SW0012301280001','SW001','Khotbah Minggu 8 Januari 2023','khotbah-minggu-8-januari-2023','','','2023-01-28 02:52:03','2023-01-28 02:52:03','2205280001',0),('SW0012301280002','SW001','ibadah minggu ke 4 januari 2023','ibadah-minggu-ke-4-januari-2023','<p>-</p>\r\n','','2023-01-28 15:25:45','2023-01-28 15:25:45','2205280001',0);

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

/*Data for the table `pageskategori` */

insert  into `pageskategori`(`idpageskategori`,`namapageskategori`,`slug`,`deskripsi`,`gambarkategori`,`tglinsert`,`tglupdate`,`idjemaat`) values ('AP001','About','about','Tentang Elshaddai',NULL,'2022-08-20 12:56:32','2022-08-20 12:56:32','2205280001'),('CH001','Care','care','Care',NULL,'2023-01-28 03:02:31','2023-01-28 03:02:31','2205280001'),('JP001','JESUS','jesus','Menceritakan tentang siapa Yesus bagi gereja ',NULL,'2023-01-31 10:36:33','2023-01-31 10:36:33','2205280001'),('NQ001','News Pelayanan','news','Seputar Berita Tentang Kegiatan Pelayanan Elshaddai',NULL,'2022-07-30 16:10:13','2022-07-30 16:14:44','2205280001'),('NS001','NEXT STEP','next-step','-',NULL,'2023-03-25 11:23:34','2023-03-25 11:23:34','2205280001'),('SW001','Sermon','sermon','Khotbah',NULL,'2023-01-28 02:51:05','2023-01-28 02:51:05','2205280001');

/*Table structure for table `parkiran` */

DROP TABLE IF EXISTS `parkiran`;

CREATE TABLE `parkiran` (
  `idparkiran` char(3) NOT NULL,
  `namaparkiran` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idparkiran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `parkiran` */

insert  into `parkiran`(`idparkiran`,`namaparkiran`,`statusaktif`) values ('P01','Parkiran Depan','Aktif'),('P02','Parkiran Sebelah Kiri (Genset)','Aktif'),('P03','Parkiran Belakang','Aktif');

/*Table structure for table `pelayanan` */

DROP TABLE IF EXISTS `pelayanan`;

CREATE TABLE `pelayanan` (
  `idpelayanan` char(5) NOT NULL,
  `namapelayanan` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idpelayanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `pelayanan` */

insert  into `pelayanan`(`idpelayanan`,`namapelayanan`,`statusaktif`) values ('','Event Crew','Aktif'),('PL001','Worship (Band & Vocal)','Aktif'),('PL002','Visual (Camera, LED, Lyric Operator)','Aktif'),('PL003','Sound (Live)','Aktif'),('PL004','Sound (Broadcast)','Aktif'),('PL005','Stage Lighting','Aktif'),('PL007','Photographer','Aktif'),('PL008','Videographer','Aktif'),('PL009','Dancer','Aktif'),('PL010','Choir','Aktif'),('PL011','Frontline','Aktif');

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

/*Data for the table `pengkhotbah` */

insert  into `pengkhotbah`(`idpengkhotbah`,`idjemaat`,`tanggalskpengkotbah`,`tanggalskberakhir`,`keterangan`,`statusaktif`) values ('220529000101','2205290001','2022-08-14 00:00:00','2022-08-21 00:00:00','keterangan','Aktif'),('220724000101','2207240001','2022-12-04 00:00:00','2022-12-11 00:00:00','ad','Aktif');

/*Table structure for table `posisidalamkeluarga` */

DROP TABLE IF EXISTS `posisidalamkeluarga`;

CREATE TABLE `posisidalamkeluarga` (
  `idposisidalamkeluarga` char(1) NOT NULL,
  `namaposisidalamkeluarga` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idposisidalamkeluarga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `posisidalamkeluarga` */

insert  into `posisidalamkeluarga`(`idposisidalamkeluarga`,`namaposisidalamkeluarga`,`statusaktif`) values ('1','Kepala Keluarga','Aktif'),('2','Istri','Aktif'),('3','Anak','Aktif'),('4','Cucu','Aktif'),('5','Saudara','Aktif'),('6','ART','Aktif');

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
  PRIMARY KEY (`idregistrasikelas`),
  KEY `idjemaat` (`idjemaat`),
  KEY `idkelas` (`idkelas`),
  CONSTRAINT `registrasikelas_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `registrasikelas_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `registrasikelas` */

insert  into `registrasikelas`(`idregistrasikelas`,`tglregistrasikelas`,`tglsertifikat`,`idjemaat`,`idkelas`,`tanggalinsert`,`tanggalupdate`,`idpengguna`,`nomorsertifikat`,`linkurlsertifikat`,`statuslulus`) values ('KL0012302080001',NULL,'2023-02-08','2207240001','KL001','2023-02-08 13:32:05','2023-02-08 13:32:05','2205280001','121212121',NULL,1),('KL0022302050001',NULL,'2023-02-05','2212140002','KL002','2023-02-05 12:33:30','2023-02-05 12:33:30','2205280001','',NULL,1),('KL0022302070001',NULL,'2023-02-07','2207240001','KL002','2023-02-07 13:47:54','2023-02-07 13:47:54','2205280001','122121212121',NULL,1),('KL0032302040001',NULL,'2023-02-03','2207240001','KL003','2023-02-04 13:59:59','2023-02-04 14:02:34','2205280001','81928192819',NULL,1),('KL0042302070001',NULL,'2023-02-07','2207240001','KL004','2023-02-07 13:48:26','2023-02-07 13:48:26','2205280001','1122334455',NULL,1),('KL0052302040001',NULL,'2023-02-04','2212140003','KL005','2023-02-04 16:17:22','2023-02-04 16:17:22','2205280001','12345',NULL,1),('KL0052302040002',NULL,'2023-02-04','2207240001','KL005','2023-02-04 16:21:32','2023-02-04 16:21:32','2205280001','',NULL,1),('KL0052302050001',NULL,'2023-02-28','2212140009','KL005','2023-02-05 17:16:47','2023-02-05 17:16:47','2205280001','',NULL,1),('KL0052302070001',NULL,'2023-02-07','2212130005','KL005','2023-02-07 13:47:26','2023-02-07 13:47:26','2205280001','123322123',NULL,1),('KL0052302080001',NULL,'2023-02-08','2207090001','KL005','2023-02-08 14:16:39','2023-02-08 14:16:39','2205280001','',NULL,1),('KL0062302070001',NULL,'2023-02-07','2207240001','KL006','2023-02-07 13:48:39','2023-02-07 13:48:39','2205280001','1122233344455',NULL,1),('KL0072302070001',NULL,'2023-02-07','2207240001','KL007','2023-02-07 13:48:59','2023-02-07 13:48:59','2205280001','11223344332211',NULL,1),('KL0082302070001',NULL,'2023-02-07','2207240001','KL008','2023-02-07 13:49:12','2023-02-07 13:49:12','2205280001','1122334444332211',NULL,1),('KL1012303040001',NULL,'2023-03-04','2207240001','KL101','2023-03-04 14:43:51','2023-03-04 14:43:51','2205280001','-',NULL,1),('KL1012303040002',NULL,'2023-03-04','2212140003','KL101','2023-03-04 15:07:26','2023-03-04 15:07:26','2205280001','-',NULL,1);

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

/*Data for the table `registrasikelasmateri` */

insert  into `registrasikelasmateri`(`idregistrasikelasmateri`,`idregistrasikelas`,`idkelasmateri`,`judulmateri`,`tglpelaksanaan`,`nilaimateri`) values ('KL005230204000100001','KL0052302040001','KL00500001','PENDAHULUAN S/D ALKITAB ADALAH FIRMAN YANG DIILHAMKAN ALLAH','2023-02-04','B'),('KL005230204000100002','KL0052302040001','KL00500002','KANONISASI ALKITAB S/D BAGAIMANA MEMAHAMI PESAN ALLAH DI DALAM ALKITAB','2023-02-04','A'),('KL005230204000100003','KL0052302040001','KL00500003','DOKTRIN TENTANG ALLAH S/D NAMA-NAMA ALLAH','2023-02-04','B'),('KL005230204000100004','KL0052302040001','KL00500004','ATRIBUT-ATRIBUT ALLAH S/D ATRIBUT-ATRIBUT YANG DITEMUKAN DALAM MANAUSIA','2023-02-04','D'),('KL005230204000100005','KL0052302040001','KL00500005','TRINITAS S/D TRINITAS MENURUT PERJANJIAN BARU','2023-02-04','A'),('KL005230204000100006','KL0052302040001','KL00500006','DOKTRIN TENTANG KRISTUS S/D NUBUAT INKARNASI KRISTUS DAN PENGGENAPANNYA','2023-02-04','B'),('KL005230204000200001','KL0052302040002','KL00500001','DOKTRIN TENTANG ALKITAB','2023-02-05','D'),('KL005230204000200002','KL0052302040002','KL00500002','DOKTRIN TENTANG ALLAH','2023-02-05','A'),('KL005230204000200003','KL0052302040002','KL00500003','DOKTRIN TENTANG YESUS','2023-02-05','A'),('KL005230204000200004','KL0052302040002','KL00500004','DOKTRIN TENTANG PENCIPTAAN','2023-02-05','A'),('KL005230204000200005','KL0052302040002','KL00500005','DOKTIN TENTANG MANUSIA','2023-02-05','A'),('KL005230204000200006','KL0052302040002','KL00500006','DOKTRIN TENTANG KESELAMATAN','2023-02-05','A'),('KL005230205000100001','KL0052302050001','KL00500001','PENDAHULUAN S/D ALKITAB ADALAH FIRMAN YANG DIILHAMKAN ALLAH','2023-02-05','A'),('KL005230205000100002','KL0052302050001','KL00500002','KANONISASI ALKITAB S/D BAGAIMANA MEMAHAMI PESAN ALLAH DI DALAM ALKITAB','2023-02-05','C'),('KL005230205000100003','KL0052302050001','KL00500003','DOKTRIN TENTANG ALLAH S/D NAMA-NAMA ALLAH','2023-02-05','A'),('KL005230205000100004','KL0052302050001','KL00500004','ATRIBUT-ATRIBUT ALLAH S/D ATRIBUT-ATRIBUT YANG DITEMUKAN DALAM MANAUSIA','2023-02-05','A'),('KL005230205000100005','KL0052302050001','KL00500005','TRINITAS S/D TRINITAS MENURUT PERJANJIAN BARU','2023-02-28','C'),('KL005230205000100006','KL0052302050001','KL00500006','DOKTRIN TENTANG KRISTUS S/D NUBUAT INKARNASI KRISTUS DAN PENGGENAPANNYA','2023-02-05','C'),('KL005230207000100001','KL0052302070001','KL00500001','DOKTRIN TENTANG ALKITAB','2023-02-11','A'),('KL005230207000100002','KL0052302070001','KL00500002','DOKTRIN TENTANG ALLAH','2023-02-11','A'),('KL005230207000100003','KL0052302070001','KL00500003','DOKTRIN TENTANG YESUS','2023-02-11','A'),('KL005230207000100004','KL0052302070001','KL00500004','DOKTRIN TENTANG PENCIPTAAN','2023-02-11','A'),('KL005230207000100005','KL0052302070001','KL00500005','DOKTIN TENTANG MANUSIA','2023-02-11','A'),('KL005230207000100006','KL0052302070001','KL00500006','DOKTRIN TENTANG KESELAMATAN','2023-02-11','A'),('KL005230208000100001','KL0052302080001','KL00500001','DOKTRIN TENTANG ALKITAB','2023-02-08','C'),('KL005230208000100002','KL0052302080001','KL00500002','DOKTRIN TENTANG ALLAH','2023-02-08','A'),('KL005230208000100003','KL0052302080001','KL00500003','DOKTRIN TENTANG YESUS','2023-02-08','A'),('KL005230208000100004','KL0052302080001','KL00500004','DOKTRIN TENTANG PENCIPTAAN','2023-02-08','C'),('KL005230208000100005','KL0052302080001','KL00500005','DOKTIN TENTANG MANUSIA','2023-02-08','B'),('KL005230208000100006','KL0052302080001','KL00500006','DOKTRIN TENTANG KESELAMATAN','2023-02-08','A'),('KL006230207000100001','KL0062302070001','KL00600001','ROH KUDUS PRIBADI ILLAHI','2023-02-11','B'),('KL006230207000100002','KL0062302070001','KL00600002','NAMA & LAMBANG ROH KUDUS','2023-02-11','B'),('KL006230207000100003','KL0062302070001','KL00600003','BAPTISAN ROH KUDUS','2023-02-11','D'),('KL006230207000100004','KL0062302070001','KL00600004','KARYA ROH KUDUS','2023-02-11','D'),('KL006230207000100005','KL0062302070001','KL00600005','KARUNIA-KARUNIA ROH KUDUS','2023-02-11','D'),('KL006230207000100006','KL0062302070001','KL00600006','BUAH ROH','2023-02-11','B');

/*Table structure for table `ruanganacara` */

DROP TABLE IF EXISTS `ruanganacara`;

CREATE TABLE `ruanganacara` (
  `idruangan` char(3) NOT NULL,
  `namaruangan` varchar(50) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `ruanganacara` */

insert  into `ruanganacara`(`idruangan`,`namaruangan`,`statusaktif`) values ('R01','Main Hall A','Aktif'),('R02','Main Hall B','Aktif'),('R03','Multi Function Hall','Aktif'),('R04','Mezzanine A','Aktif'),('R05','Mezzanine B','Aktif'),('R06','Kids Hall','Aktif'),('R07','Staff Meeting Room 1 & 2 (Digabung)','Aktif'),('R08','Staff Meeting Room 1 (Dekat Genset)','Aktif'),('R09','Staff Meeting Room 2 (Dekat Ruang Keuangan)','Aktif'),('R10','Small Meeting Room','Aktif'),('R11','Lobby Lt. 1 (Gedung Lama)','Aktif'),('R12','Lobby Lt. 1 (Gedung Baru)','Aktif'),('R13','Parkiran','Aktif');

/*Table structure for table `ruangangedung` */

DROP TABLE IF EXISTS `ruangangedung`;

CREATE TABLE `ruangangedung` (
  `idruangan` char(3) NOT NULL,
  `namaruangan` varchar(100) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`idruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `ruangangedung` */

insert  into `ruangangedung`(`idruangan`,`namaruangan`,`statusaktif`) values ('001','Main Hall A','Aktif'),('002','Main Hall B','Aktif'),('003','Multi Function Hall','Aktif'),('004','Mezzanine A','Aktif'),('005','Mezzanine B','Aktif'),('006','Kids Hall','Aktif'),('007','Staff Meeting Room 1 & 2 (Digabung)','Aktif'),('008','Staff Meeting Room 1 (Dekat Genset)','Aktif'),('009','Staff Meeting Room 2 (Dekat Ruang Keuangan)','Aktif'),('010','Small Meeting Room','Aktif'),('011','Lobby Lt. 1 (Gedung Lama)','Aktif'),('012','Lobby Lt. 1 (Gedung Baru)','Aktif'),('013','Parkiran','Aktif');

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

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_gettglmulaievent`(var_idjadwalevent char(10)) RETURNS datetime
BEGIN
	declare var_TglMulai datetime;
	
	select concat(tgljadwaleventmulai, ' ' ,jammulai) into var_TglMulai from jadwaleventdetailtanggal where idjadwalevent = var_idjadwalevent order by tgljadwaleventmulai limit 1;
	return var_TglMulai;
    END */$$
DELIMITER ;

/* Function  structure for function  `f_gettglselesaievent` */

/*!50003 DROP FUNCTION IF EXISTS `f_gettglselesaievent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `f_gettglselesaievent`(var_idjadwalevent char(10)) RETURNS datetime
BEGIN
	declare var_tglselesai datetime;
	
	select concat(tgljadwaleventselesai, ' ' ,jamselesai) into var_tglselesai from jadwaleventdetailtanggal where idjadwalevent = var_idjadwalevent order by tgljadwaleventselesai desc limit 1;
	return var_tglselesai;
    END */$$
DELIMITER ;

/* Function  structure for function  `getstatuskelas` */

/*!50003 DROP FUNCTION IF EXISTS `getstatuskelas` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `getstatuskelas`(varidkelas char(5), varidjemaat char(10)) RETURNS int(1)
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

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `replwz`(cAngka char(25), cJlhNol int(11)) RETURNS char(25) CHARSET latin1 COLLATE latin1_swedish_ci
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
 `idjemaathead` char(10) ,
 `statusaktif` enum('Aktif','Tidak Aktif') ,
 `namagroup` varchar(100) ,
 `noaj` char(15) ,
 `nik` char(16) ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) 
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
 `noaj` char(15) ,
 `nik` char(16) ,
 `namalengkap` varchar(100) ,
 `namapanggilan` varchar(50) ,
 `foto` varchar(155) ,
 `email` varchar(50) ,
 `facebook` varchar(100) ,
 `instagram` varchar(100) 
)*/;

/*Table structure for table `v_hagah` */

DROP TABLE IF EXISTS `v_hagah`;

/*!50001 DROP VIEW IF EXISTS `v_hagah` */;
/*!50001 DROP TABLE IF EXISTS `v_hagah` */;

/*!50001 CREATE TABLE  `v_hagah`(
 `idhagah` char(6) ,
 `idkitab` int(3) ,
 `pasal1` int(11) ,
 `pasal2` int(11) ,
 `tglhagah` date ,
 `namakitab` varchar(50) ,
 `externalid` char(25) 
)*/;

/*Table structure for table `v_jadwaleventdetail` */

DROP TABLE IF EXISTS `v_jadwaleventdetail`;

/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetail` */;
/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetail` */;

/*!50001 CREATE TABLE  `v_jadwaleventdetail`(
 `idjadwalevent` char(10) ,
 `namaevent` varchar(255) ,
 `deskripsi` text ,
 `idpenanggungjawab` char(10) ,
 `gambarsampul` varchar(255) ,
 `statuskonfirmasi` enum('Menunggu','Disetujui','Ditolak') ,
 `tglkonfirmasi` datetime ,
 `idpenggunakonfirmasi` char(10) ,
 `iddepartement` char(8) ,
 `tglinsert` datetime ,
 `tglupdate` datetime ,
 `idpengguna` char(10) ,
 `idjadwaleventdetail` int(11) ,
 `tgljadwaleventmulai` date ,
 `tgljadwaleventselesai` date ,
 `jammulai` time ,
 `jamselesai` time 
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
 `namadc` varchar(100) 
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
 `namapageskategori` varchar(255) 
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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_departement` AS select `departement`.`iddepartement` AS `iddepartement`,`departement`.`idgroup` AS `idgroup`,`departement`.`namadepartement` AS `namadepartement`,`departement`.`idjemaathead` AS `idjemaathead`,`departement`.`statusaktif` AS `statusaktif`,`group`.`namagroup` AS `namagroup`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan` from ((`departement` join `group` on(`departement`.`idgroup` = `group`.`idgroup`)) join `jemaat` on(`departement`.`idjemaathead` = `jemaat`.`idjemaat`)) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_group` AS select `group`.`idgroup` AS `idgroup`,`group`.`namagroup` AS `namagroup`,`group`.`statusaktif` AS `statusaktif`,`group`.`idjemaathead` AS `idjemaathead`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`foto` AS `foto`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram` from (`group` left join `jemaat` on(`group`.`idjemaathead` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_hagah */

/*!50001 DROP TABLE IF EXISTS `v_hagah` */;
/*!50001 DROP VIEW IF EXISTS `v_hagah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hagah` AS select `hagah`.`idhagah` AS `idhagah`,`hagah`.`idkitab` AS `idkitab`,`hagah`.`pasal1` AS `pasal1`,`hagah`.`pasal2` AS `pasal2`,`hagah`.`tglhagah` AS `tglhagah`,`kitab`.`namakitab` AS `namakitab`,`kitab`.`externalid` AS `externalid` from (`hagah` join `kitab` on(`hagah`.`idkitab` = `kitab`.`idkitab`)) */;

/*View structure for view v_jadwaleventdetail */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetail` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetail` AS select `jadwalevent`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`deskripsi` AS `deskripsi`,`jadwalevent`.`idpenanggungjawab` AS `idpenanggungjawab`,`jadwalevent`.`gambarsampul` AS `gambarsampul`,`jadwalevent`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwalevent`.`tglkonfirmasi` AS `tglkonfirmasi`,`jadwalevent`.`idpenggunakonfirmasi` AS `idpenggunakonfirmasi`,`jadwalevent`.`iddepartement` AS `iddepartement`,`jadwalevent`.`tglinsert` AS `tglinsert`,`jadwalevent`.`tglupdate` AS `tglupdate`,`jadwalevent`.`idpengguna` AS `idpengguna`,`jadwaleventdetailtanggal`.`idjadwaleventdetail` AS `idjadwaleventdetail`,`jadwaleventdetailtanggal`.`tgljadwaleventmulai` AS `tgljadwaleventmulai`,`jadwaleventdetailtanggal`.`tgljadwaleventselesai` AS `tgljadwaleventselesai`,`jadwaleventdetailtanggal`.`jammulai` AS `jammulai`,`jadwaleventdetailtanggal`.`jamselesai` AS `jamselesai` from (`jadwaleventdetailtanggal` join `jadwalevent` on(`jadwaleventdetailtanggal`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) */;

/*View structure for view v_jemaat */

/*!50001 DROP TABLE IF EXISTS `v_jemaat` */;
/*!50001 DROP VIEW IF EXISTS `v_jemaat` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaat` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`jemaat`.`idlokasi` AS `idlokasi`,`jemaat`.`idposisidalamkeluarga` AS `idposisidalamkeluarga`,`v_dcmember`.`namadc` AS `namadc` from (`jemaat` left join `v_dcmember` on(`jemaat`.`idjemaat` = `v_dcmember`.`idjemaat`)) */;

/*View structure for view v_jemaatfamily */

/*!50001 DROP TABLE IF EXISTS `v_jemaatfamily` */;
/*!50001 DROP VIEW IF EXISTS `v_jemaatfamily` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaatfamily` AS select `jemaatfamily`.`nokaj` AS `nokaj`,`jemaatfamily`.`idjemaatfamily` AS `idjemaatfamily`,`jemaatfamily`.`idjemaat` AS `idjemaat`,`jemaatfamily`.`tglinsert` AS `tglinsert`,`jemaatfamily`.`idhubunganfamily` AS `idhubunganfamily`,`jemaatfamily`.`tglupdate` AS `tglupdate`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`hubunganfamily`.`namahubungan` AS `namahubungan` from ((`jemaatfamily` join `jemaat` on(`jemaatfamily`.`idjemaat` = `jemaat`.`idjemaat`)) join `hubunganfamily` on(`jemaatfamily`.`idhubunganfamily` = `hubunganfamily`.`idhubunganfamily`)) */;

/*View structure for view v_pages */

/*!50001 DROP TABLE IF EXISTS `v_pages` */;
/*!50001 DROP VIEW IF EXISTS `v_pages` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pages` AS select `pages`.`idpages` AS `idpages`,`pages`.`idpageskategori` AS `idpageskategori`,`pages`.`slug` AS `slug`,`pages`.`namapages` AS `namapages`,`pages`.`isipages` AS `isipages`,`pages`.`gambarsampul` AS `gambarsampul`,`pages`.`tglinsert` AS `tglinsert`,`pages`.`tglupdate` AS `tglupdate`,`pages`.`idjemaat` AS `idjemaat`,`pages`.`jumlahdilihat` AS `jumlahdilihat`,`pageskategori`.`namapageskategori` AS `namapageskategori` from (`pages` join `pageskategori` on(`pages`.`idpageskategori` = `pageskategori`.`idpageskategori`)) */;

/*View structure for view v_pengkhotbah */

/*!50001 DROP TABLE IF EXISTS `v_pengkhotbah` */;
/*!50001 DROP VIEW IF EXISTS `v_pengkhotbah` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengkhotbah` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`pengkhotbah`.`tanggalskpengkotbah` AS `tanggalskpengkotbah`,`pengkhotbah`.`tanggalskberakhir` AS `tanggalskberakhir`,`pengkhotbah`.`keterangan` AS `keterangan`,`pengkhotbah`.`idpengkhotbah` AS `idpengkhotbah`,`pengkhotbah`.`statusaktif` AS `statusaktif` from (`pengkhotbah` join `jemaat` on(`pengkhotbah`.`idjemaat` = `jemaat`.`idjemaat`)) */;

/*View structure for view v_registrasikelas */

/*!50001 DROP TABLE IF EXISTS `v_registrasikelas` */;
/*!50001 DROP VIEW IF EXISTS `v_registrasikelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_registrasikelas` AS select `registrasikelas`.`idregistrasikelas` AS `idregistrasikelas`,`registrasikelas`.`tglregistrasikelas` AS `tglregistrasikelas`,`registrasikelas`.`tglsertifikat` AS `tglsertifikat`,`registrasikelas`.`idjemaat` AS `idjemaat`,`registrasikelas`.`idkelas` AS `idkelas`,`registrasikelas`.`tanggalinsert` AS `tanggalinsert`,`registrasikelas`.`tanggalupdate` AS `tanggalupdate`,`registrasikelas`.`idpengguna` AS `idpengguna`,`registrasikelas`.`nomorsertifikat` AS `nomorsertifikat`,`registrasikelas`.`linkurlsertifikat` AS `linkurlsertifikat`,`registrasikelas`.`statuslulus` AS `statuslulus`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`email` AS `email`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`foto` AS `foto`,`kelas`.`namakelas` AS `namakelas` from ((`registrasikelas` join `jemaat` on(`registrasikelas`.`idjemaat` = `jemaat`.`idjemaat`)) join `kelas` on(`registrasikelas`.`idkelas` = `kelas`.`idkelas`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
