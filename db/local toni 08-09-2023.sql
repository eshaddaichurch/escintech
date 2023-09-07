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

/*Data for the table `api_access` */

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

/*Data for the table `api_keys` */

insert  into `api_keys`(`id`,`user_id`,`key`,`level`,`ignore_limits`,`is_private_key`,`ip_addresses`,`date_created`) values (1,0,'p4cx-s1mrsyutrsg65',1,0,0,NULL,0);

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

/*Data for the table `api_limits` */

insert  into `api_limits`(`id`,`uri`,`count`,`hour_started`,`api_key`) values (1,'uri::get',1,1688794500,'Els4DdaiChUrch'),(2,'uri::get',9,1688795165,'p4cx-s1mrsyutrsg65');

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

/*Data for the table `api_logs` */

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
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `backmenus` */

insert  into `backmenus`(`idmenu`,`namamenu`,`parentidmenu`,`linkmenu`,`statusaktif`,`nomorurut`,`nlevels`) values ('0001','Management Front End',NULL,NULL,'Aktif',1,0),('0002','Informasi Gereja','0001','infogereja','Aktif',2,1),('0003','Kategori Page/Halaman','0001','pageskategori','Aktif',2,1),('0004','Pages/ Halaman','0001','pages','Aktif',4,1),('0005','Kelola Menu','0001','frontmenus','Aktif',5,1),('C000','Care',NULL,NULL,'Aktif',300,0),('C100','Marriage Class','C000','index/KL101','Aktif',301,1),('M000','Data Master',NULL,NULL,'Aktif',6,0),('M100','Jemaat','M000','jemaat','Aktif',7,1),('M200','Pengkhotbah','M000','pengkhotbah2','Aktif',8,1),('M300','Group','M000','group','Aktif',9,1),('M400','Departement','M000','departement','Aktif',10,1),('M500','Disciples Community','M000',NULL,'Aktif',11,1),('M501','List Data DC','M500','disciplescommunity','Aktif',12,2),('M502','DC Member','M500','dcmember','Aktif',13,2),('M600','Hagah','M000','hagah','Aktif',14,1),('M700','Otorisasi Sistem','M000','otorisasi','Aktif',15,1),('N000','Next Step',NULL,NULL,'Aktif',200,0),('N100','Konfirmasi Pendaftaran','N000','konfirmasikelas','Aktif',201,1),('N200','Membership Class','N000','index/KL001','Aktif',202,1),('N300','Fondation Class 1','N000','index/KL002','Aktif',203,1),('N400','Fondation Class 2','N000','index/KL003','Aktif',204,1),('N500','Fondation Class 3','N000','index/KL004','Aktif',205,1),('N600','Grade 1','N000','index/KL005','Aktif',206,1),('N700','Grade 2','N000','index/KL006','Aktif',207,1),('N800','Grade 3','N000','index/KL007','Aktif',208,1),('N900','Folunteer Class','N000','index/KL008','Aktif',209,1),('P000','Penjadwalan',NULL,NULL,'Aktif',100,0),('P100','Kalender','P000','penjadwalan','Aktif',101,1),('P200','Pengajuan Jadwal','P000','pengajuanjadwal','Aktif',102,1),('P300','Konfirmasi Jadwal','P000','konfirmasijadwal','Aktif',103,1);

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

insert  into `dcmember`(`iddcmember`,`iddc`,`idjemaat`,`statuskeanggotaan`,`keterangan`,`tanggalinsert`,`tanggalupdate`,`statusaktif`) values ('23021',NULL,'2207240001',NULL,'','2023-02-14 00:00:00','2023-02-14 00:00:00',NULL),('DBT0100001','DBT01','2212140002','Anggota','-','2023-02-18 13:24:32','2023-02-18 13:24:32',NULL),('DDW0200001','DDW02','2301040001','Anggota','test','2023-02-18 13:43:54','2023-02-18 13:43:54','Aktif'),('DMK0100001','DMK01','2207240001','Core Team','test lagi dulu','2023-02-18 13:44:07','2023-02-18 13:44:07','Aktif'),('DNR0100001','DNR01','2205290001','Disciples maker','Segala Perkara Dapatb kutanggung di dalam Dia yang memeri kekuatan kepadaku','2023-08-03 13:08:04','2023-08-03 13:08:04','Aktif'),('LAR0100001','LAR01','2301040005','Anggota','bBaru masuk','2023-02-18 15:58:48','2023-02-18 15:58:48','Aktif');

/*Table structure for table `departement` */

DROP TABLE IF EXISTS `departement`;

CREATE TABLE `departement` (
  `iddepartement` char(8) NOT NULL,
  `idgroup` char(5) DEFAULT NULL,
  `namadepartement` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `namahead` varchar(100) DEFAULT NULL,
  `fotohead` varchar(255) DEFAULT NULL,
  KEY `idgroup` (`idgroup`),
  CONSTRAINT `departement_ibfk_2` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `departement` */

insert  into `departement`(`iddepartement`,`idgroup`,`namadepartement`,`statusaktif`,`namahead`,`fotohead`) values ('00001001','00001','Worship 1','Aktif',NULL,NULL),('00001002','00001','Visual','Aktif',NULL,NULL),('00001003','00001','Digital Communication','Aktif','Lampos Aritonang','darshan-patel-QJEVpydulGs-unsplash.jpg'),('00002001','00002','ESC IT','Aktif',NULL,NULL),('00004001','00004','Next Step','Aktif','Naomi Yemima Manalu',''),('00006001','00006','Disciples Community','Aktif','Alfiano Armando Tagor','');

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

insert  into `disciplescommunity`(`iddc`,`namadc`,`kategoridc`,`haridc`,`jamdc`,`alamatdc`,`fotodc`,`tanggalinsert`,`tanggalupdate`,`statusaktif`,`idjemaatdm`) values ('DBT01','DC Bercerai kita runtuh','Kids','Jumat','19.00','Jl. Ampera','christina-wocintechchat-com-0Zx1bDv5BNY-unsplash.jpg','2022-08-10 10:11:05','2023-08-05 15:50:59','Aktif','2212140002'),('DDW01','DC Elshaddai','Young Adult','Selasa','12.00','Ampera','albert-dera-ILip77SbmOE-unsplash1.jpg','2022-08-06 14:45:05','2023-08-09 08:40:36','Aktif','2207090001'),('DDW02','DC Paris 2','Family','Rabu','17.00','Ampera','joseph-gonzalez-iFgRcqHznqg-unsplash.jpg','2022-08-09 09:58:56','2023-08-09 08:41:02','Aktif','2301040001'),('DMK01','DC Yerusalem','Young Adult','Selasa','13.00','Ampera','darshan-patel-QJEVpydulGs-unsplash.jpg','2022-08-27 11:29:12','2023-07-30 19:53:42','Aktif','2207240001'),('DNR01','DC NKRI','Family','Sabtu','19.00','Serdam','albert-dera-ILip77SbmOE-unsplash.jpg','2023-01-24 11:58:50','2023-07-30 19:54:12','Aktif','2205290001'),('DRD01','DC El Gibor','Kids','Minggu','08.00','Kota Baru Pontianak','christina-wocintechchat-com-0Zx1bDv5BNY-unsplash.jpg','2022-08-25 15:31:44','2023-07-30 20:05:08','Aktif','2212140004'),('DRS01','DC Betlehem','Family','Jumat','','Jl. Serdam Komp. Puri Akcaya 2','darshan-patel-QJEVpydulGs-unsplash.jpg','2022-08-09 08:49:45','2023-08-09 08:40:11','Aktif','2212140005'),('LAR01','DC Endless Love','Kids','Rabu','07.00','Ampera','fineas-gavre-A6idH5eRaLM-unsplash.jpg','2022-08-13 16:20:45','2023-08-09 08:41:13','Aktif','2301040006'),('MMJ01','DC Glorify','Youth','Minggu','14.00','pontianak','hannah-olinger-NXiIVnzBwZ8-unsplash.jpg','2022-08-18 10:09:38','2023-08-09 08:41:24','Aktif','2212140001'),('TTO01','DC Spirit Love','Youth','Selasa','17.00','test','albert-dera-ILip77SbmOE-unsplash.jpg','2022-08-27 11:29:56','2023-08-08 12:05:21','Aktif','2212130003');

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

insert  into `frontmenus`(`idmenu`,`parentidmenu`,`namamenu`,`jenismenu`,`idpages`,`linkmenu`,`openinnewtab`,`statusaktif`,`tanggalinsert`,`tanggalupdate`,`sysmenu`,`levels`,`nomorurut`,`idpageskategori`) values ('001',NULL,'Home','Url Link',NULL,'/',0,'Aktif','2022-09-23 21:25:15','2022-09-23 21:25:20',1,1,1,NULL),('AE001','AI001','About Elshaddai','Page Link','AP0012208200002',NULL,0,'Aktif','2023-01-28 02:45:56','2023-07-25 09:18:30',0,2,2,NULL),('AI001',NULL,'About / Tentang','None',NULL,NULL,NULL,'Aktif','2023-01-28 00:51:02','2023-01-28 03:48:53',0,1,2,''),('AJ001','AI001','About Jesus','Page Link','AP0012209240001',NULL,0,'Aktif','2023-01-28 02:32:06','2023-03-25 11:43:58',0,2,1,NULL),('CR001',NULL,'Care','Kategori Link',NULL,NULL,1,'Aktif','2023-01-28 03:02:46','2023-02-04 11:10:46',0,1,4,'CH001'),('EI001',NULL,'Event','Url Link',NULL,'/kalender/index',0,'Aktif','2023-09-02 12:34:01','2023-09-02 12:34:01',0,1,7,NULL),('FC001','NS001','Foundation Class 1','Url Link',NULL,'/nextstep/kelas/foundation_class_1',0,'Aktif','2023-08-19 12:31:50','2023-08-21 10:02:36',0,2,1,NULL),('FC002','NS001','Foundation Class 2','Url Link',NULL,'/nextstep/kelas/foundation_class_2',0,'Aktif','2023-08-19 14:53:32','2023-08-19 14:53:32',0,2,3,NULL),('FC003','NS001','Foundation Class 3','Url Link',NULL,'/nextstep/kelas/foundation_class_3',0,'Aktif','2023-08-21 10:00:51','2023-08-21 10:00:51',0,2,4,NULL),('GL001',NULL,'Giving','Page Link','AP0012301280001',NULL,0,'Aktif','2023-01-28 03:56:25','2023-01-28 03:56:25',0,1,5,NULL),('MC001','NS001','Membership Class','Url Link',NULL,'/nextstep/kelas/membership_class',0,'Aktif','2023-08-19 10:51:23','2023-08-19 14:06:25',0,2,2,NULL),('NS001',NULL,'Next Step','None',NULL,NULL,NULL,'Aktif','2023-08-19 10:49:54','2023-08-19 10:49:54',0,1,6,''),('SO001',NULL,'Sermon','Kategori Link',NULL,NULL,0,'Aktif','2023-01-28 03:01:11','2023-01-28 03:01:11',0,1,3,'SW001'),('TA001','AI001','Tentang Alkitab','Url Link',NULL,'https://alkitab.com',1,'Aktif','2023-01-28 02:48:15','2023-01-28 02:48:15',0,2,3,NULL);

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

insert  into `group`(`idgroup`,`namagroup`,`statusaktif`,`idjemaathead`) values ('00001','Creative','Aktif','2212140009'),('00002','Office','Aktif','2207090001'),('00003','OFFICE','Aktif','2207090001'),('00004','Next Step','Aktif','2212140008'),('00005','Finance','Aktif','2212140010'),('00006','Community','Aktif','2207090001');

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

insert  into `infogereja`(`namagereja`,`alamatgereja`,`emailgereja`,`notelpgereja`,`urltwittergereja`,`urlfacebookgereja`,`urlinstagramgereja`,`urlskipegereja`,`urlgooglemaps`,`gambarhomepage`,`judulhomepage`,`subjudulhomepage`,`urlbuttonhomepage`,`opennewtabbuttonhomepage`) values ('El Shaddai Church','Jl. Kota Baru 1','elshaddai@intech.com','123456','1','2','','','-','White_Brown_Minimalist_Praise_Worship_Flyer.png','Cerdik di masa Sulit','enriched','www.escinteach.com/class',NULL);

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
  `idinventaris` char(5) NOT NULL,
  `namainventaris` varchar(100) DEFAULT NULL,
  `satuan` char(15) DEFAULT NULL,
  `gambarinventaris` varchar(255) DEFAULT NULL,
  `statusaktif` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  PRIMARY KEY (`idinventaris`)
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

/*Data for the table `jadwalevent` */

insert  into `jadwalevent`(`idjadwalevent`,`namaevent`,`deskripsi`,`idpenanggungjawab`,`gambarsampul`,`iddepartement`,`tglinsert`,`tglupdate`,`idpengguna`,`jenisjadwal`,`idpengkhotbah`,`streamingurl`,`tema`,`subtema`,`harusdaftar`,`jumlahvolunteer`,`jumlahjemaat`,`onsitestatus`,`aplikasidigunakan`,`diumumkankejemaat`,`tglmulaidiumumkan`,`tglselesaidiumumkan`,`pengumumandisampaikanmelalui`,`konseppengumuman`,`detailkonseppengumuman`,`tampilkandiwebsite`,`halyangdisampaian`,`rundown`,`statuskonfirmasi`,`idpenggunakonfirmasi`,`tglkonfirmasi`,`keterangankonfirmasi`,`idkelas`,`namapenanggungjawab`) values ('JE23060001','Pembuatan Soundtrack Elshaddai','','2212140002','gbr7.jpg','00001001','2023-06-24 15:04:29','2023-06-24 15:04:29','2205280001','Filming',NULL,'','','',0,0,0,'Ya',NULL,'Tidak',NULL,NULL,NULL,NULL,NULL,'Tidak','','','Disetujui','2205280001','2023-07-15 14:19:07','test',NULL,NULL),('JE23070001','Kelas Fondation 1','belajar tentang keselamatan baptisan air','2212140002','gbr.jpg','00002001','2023-07-15 14:27:26','2023-07-15 14:27:26','2205280001','',NULL,'','','',0,0,0,'Ya',NULL,'Tidak',NULL,NULL,NULL,NULL,NULL,'Ya','','','Menunggu',NULL,NULL,NULL,NULL,NULL),('JE23070006','sasdfa','','2212140011','','00002001','2023-07-15 15:40:43','2023-07-15 15:40:43','2205280001','',NULL,'','','',0,1,1,'Ya',NULL,'Tidak',NULL,NULL,NULL,NULL,NULL,'Tidak','','','Menunggu',NULL,NULL,NULL,'KL002',NULL),('JE23070008','Membership Class','Kelas Pengenalan tentang Elshaddai Church serta struktur kepengurusan','2301040007','gbr10.png','00002001','2023-07-17 22:44:31','2023-07-17 22:44:31','2205280001','Kelas Next Step',NULL,'','','',1,4,4,'Ya',NULL,'Ya','2023-07-23','2023-07-23','Via ESC News','Slide','','Ya','','','Disetujui','2205280001','2023-07-18 11:55:30','','KL001',NULL),('JE23070009','Kelas Doa','Apa Itu Doa?, Mengapa Allah Menyuruh kita berdoa? Apa Manfaat Doa bagi orang percaya?','2212140011','pray.png','00001001','2023-07-17 23:05:53','2023-07-17 23:05:53','2205280001','Kelas Next Step',NULL,'','','',0,0,0,'Ya',NULL,'Ya','2023-07-23','2023-07-24','Via ESC News','Slide','','Ya','','','Disetujui','2205280001','2023-08-28 12:48:31','ww','KL003',NULL),('JE23070011','Menara Doa','Menara Doa Bersama ESC Church','2212140002','gbr10.png','00001001','2023-07-18 10:23:22','2023-07-18 10:23:22','2205280001','Doa Bersama','220724000101','','unity','',0,0,0,'Ya',NULL,'Ya','2023-07-17','2023-07-21','Via ESC News','Slide','Menara Doa Bersama ESC Church','Ya','','','Disetujui','2205280001','2023-07-18 10:30:31','',NULL,NULL),('JE23070013','Foundation Class 2','sdihsfobifhsbiosfhb','2212140011','gbr11.png','00004001','2023-07-20 15:28:36','2023-07-20 15:28:36','2205280001','Kelas Next Step',NULL,'','','',1,0,0,'Ya',NULL,'Ya','2023-07-20','2023-07-21','Via ESC News','Slide + Audio','-','Ya','svfvf','ehehteh','Disetujui','2205280001','2023-08-26 12:43:00','','KL003',NULL),('JE23070014','menikah','selamat berbahagia','2305250020','Church Conference .png','00004001','2023-07-22 11:27:23','2023-07-22 11:27:23','2205280001','Kelas Next Step',NULL,'','','',1,0,0,'Ya',NULL,'Ya','2023-07-28','2023-07-29','Via ESC News','Slide','pemberkatan','Ya','','','Disetujui','2205280001','2023-08-26 10:37:09','','KL101',NULL),('JE23080002','Membership Class','Kelas Untuk mengenal Pelayanan yang ada di Elshaddai church','2212140002','gbr11.png','00004001','2023-08-19 14:56:43','2023-08-19 14:56:43','2205280001','Kelas Next Step',NULL,'','','',1,0,0,'Ya',NULL,'Ya','2023-08-19','2023-08-19','Via ESC News','Slide','','Ya','','','Disetujui','2205280001','2023-08-19 14:57:05','','KL001',NULL),('JE23080003','Foundation Class 1','Kelas Baptisan Dan Keselamatan Oktober','2301040007','gbr10.png','00004001','2023-08-26 10:44:11','2023-08-26 10:44:11','2205280001','Kelas Next Step',NULL,'','','',1,0,0,'Ya',NULL,'Ya','2023-08-26','2023-09-10','Via ESC News','Slide','Kelas Baptisan Dan Keselamatan','Ya','','','Disetujui','2205280001','2023-08-26 10:45:54','','KL002',NULL),('JE23090001','test test','test',NULL,'','00002001','2023-09-02 13:15:41','2023-09-02 13:15:41','2205280001','Kelas Next Step',NULL,'','','',0,0,0,'Ya',NULL,'Tidak',NULL,NULL,NULL,NULL,NULL,'Ya','','','Menunggu',NULL,NULL,NULL,'KL003','Lampos Aritonang');

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
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailinventaris` */

insert  into `jadwaleventdetailinventaris`(`idjadwladetailinventaris`,`idjadwalevent`,`idinventaris`,`qty`) values (5,'JE23060001','I0001',50),(9,'JE23070013','I0001',20);

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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailparkiran` */

insert  into `jadwaleventdetailparkiran`(`idjadwaldetailparkiran`,`idparkiran`,`idjadwalevent`) values (4,'P01','JE23060001'),(7,'P03','JE23070001'),(10,'P01','JE23070013'),(11,'P02','JE23070013'),(12,'P03','JE23070013');

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
) ENGINE=InnoDB AUTO_INCREMENT=469 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailpelayanan` */

insert  into `jadwaleventdetailpelayanan`(`idjadwaldetailpelayanan`,`idpelayanan`,`idjadwalevent`) values (5,'PL002','JE23060001'),(6,'PL003','JE23060001'),(7,'PL005','JE23060001'),(8,'PL007','JE23060001'),(9,'PL004','JE23060001'),(21,'PL007','JE23070008'),(24,'PL001','JE23070013');

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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailruangan` */

insert  into `jadwaleventdetailruangan`(`idjadwaldatailruangan`,`idruangan`,`idjadwalevent`) values (4,'R01','JE23060001'),(7,'R04','JE23070001'),(14,'R01','JE23070013'),(15,'R02','JE23070013'),(16,'R03','JE23070013'),(17,'R04','JE23070013'),(18,'R05','JE23070013'),(19,'R06','JE23070013'),(20,'R07','JE23070013'),(21,'R08','JE23070013'),(22,'R09','JE23070013'),(23,'R10','JE23070013'),(24,'R11','JE23070013'),(25,'R12','JE23070013'),(26,'R13','JE23070013'),(28,'R03','JE23080002');

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
  KEY `idjadwalevent` (`idjadwalevent`),
  KEY `idjadwaleventdetail` (`idjadwaleventdetail`),
  CONSTRAINT `jadwaleventdetailtanggal_ibfk_1` FOREIGN KEY (`idjadwalevent`) REFERENCES `jadwalevent` (`idjadwalevent`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailtanggal` */

insert  into `jadwaleventdetailtanggal`(`idjadwaleventdetail`,`idjadwalevent`,`tgljadwaleventmulai`,`tgljadwaleventselesai`,`jammulai`,`jamselesai`,`diulangsetiapminggu`) values (18,'JE23060001','2023-06-26','2023-06-28','08:00:00','10:00:00','Tidak'),(23,'JE23070001','2023-07-17','2023-07-19','10:00:00','11:00:00','Tidak'),(28,'JE23070006','2023-07-14','2023-07-01','15:40:00','15:40:00','Tidak'),(30,'JE23070008','2023-07-30','2023-07-30','13:00:00','15:41:00','Tidak'),(31,'JE23070009','2023-07-25','2023-07-25','04:04:00','05:04:00','Tidak'),(33,'JE23070011','2023-07-22','2023-07-22','10:00:00','12:00:00','Tidak'),(35,'JE23070013','2023-07-27','2023-07-27','19:20:00','20:20:00','Tidak'),(36,'JE23070014','2023-07-29','2023-07-29','11:27:00','14:26:00','Tidak'),(40,'JE23080002','2023-08-20','2023-08-20','13:00:00','15:00:00','Tidak'),(41,'JE23080003','2023-09-17','2023-09-17','13:00:00','15:00:00','Tidak'),(195,'JE23090001','2023-09-02','2023-09-16','13:15:00','16:15:00','Tidak');

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
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jadwaleventdetailtanggal_2` */

insert  into `jadwaleventdetailtanggal_2`(`iddetailtanggal2`,`idjadwaleventdetail`,`idjadwalevent`,`tgljadwal`,`jammulai`,`jamselesai`) values (16,18,'JE23060001','2023-06-26','08:00:00','10:00:00'),(17,18,'JE23060001','2023-06-27','08:00:00','10:00:00'),(18,18,'JE23060001','2023-06-28','08:00:00','10:00:00'),(81,23,'JE23070001','2023-07-17','10:00:00','11:00:00'),(82,23,'JE23070001','2023-07-18','10:00:00','11:00:00'),(83,23,'JE23070001','2023-07-19','10:00:00','11:00:00'),(103,30,'JE23070008','2023-07-30','13:00:00','15:41:00'),(104,31,'JE23070009','2023-07-25','04:04:00','05:04:00'),(107,33,'JE23070011','2023-07-22','10:00:00','12:00:00'),(109,35,'JE23070013','2023-07-27','19:20:00','20:20:00'),(110,36,'JE23070014','2023-07-29','11:27:00','14:26:00'),(123,40,'JE23080002','2023-08-20','13:00:00','15:00:00'),(124,41,'JE23080003','2023-09-17','13:00:00','15:00:00'),(125,195,'JE23090001','2023-09-02','13:15:00','16:15:00'),(126,195,'JE23090001','2023-09-03','13:15:00','16:15:00'),(127,195,'JE23090001','2023-09-04','13:15:00','16:15:00'),(128,195,'JE23090001','2023-09-05','13:15:00','16:15:00'),(129,195,'JE23090001','2023-09-06','13:15:00','16:15:00'),(130,195,'JE23090001','2023-09-07','13:15:00','16:15:00'),(131,195,'JE23090001','2023-09-08','13:15:00','16:15:00'),(132,195,'JE23090001','2023-09-09','13:15:00','16:15:00'),(133,195,'JE23090001','2023-09-10','13:15:00','16:15:00'),(134,195,'JE23090001','2023-09-11','13:15:00','16:15:00'),(135,195,'JE23090001','2023-09-12','13:15:00','16:15:00'),(136,195,'JE23090001','2023-09-13','13:15:00','16:15:00'),(137,195,'JE23090001','2023-09-14','13:15:00','16:15:00'),(138,195,'JE23090001','2023-09-15','13:15:00','16:15:00'),(139,195,'JE23090001','2023-09-16','13:15:00','16:15:00');

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

/*Data for the table `jadwaleventkonfirmasi` */

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

/*Data for the table `jadwaleventregistrasi` */

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
  `statusverifikasiemail` int(1) DEFAULT 0,
  PRIMARY KEY (`idjemaat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `jemaat` */

insert  into `jemaat`(`idjemaat`,`noaj`,`nik`,`kewarganegaraan`,`namalengkap`,`namapanggilan`,`tempatlahir`,`tanggallahir`,`jeniskelamin`,`statuspernikahan`,`golongandarah`,`notelp`,`nohp`,`email`,`facebook`,`instagram`,`namadarurat`,`hubungan`,`notelpdarurat`,`pendidikanterakhir`,`namasekolah`,`pekerjaan`,`namaperusahaan`,`sektorindustri`,`alamatkantor`,`notelpkantor`,`alamatrumah`,`rtrw`,`kelurahan`,`kecamatan`,`kotakabupaten`,`propinsi`,`kodepos`,`foto`,`tanggalupdate`,`username`,`password`,`lastlogin`,`statusjemaat`,`tanggalinsert`,`idlokasi`,`idposisidalamkeluarga`,`statusverifikasiemail`) values ('2205280001','0000005','1111111111111111','Indonesia','Develop System','Develop System','Jakarta','2022-05-19','Laki-laki','Belum Kawin','A','','','budi@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','','000/000','','','','','','','2023-09-08 01:10:21','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Jemaat','2023-09-08 01:10:21',NULL,'1',0),('2205290001','','123456789','Indonesia','RIVAN STEVANUS TAMPI','Rivan','Manado','1983-09-30','Laki-laki','Kawin','B','','085234786655','escintech@gmail.com','rivan','rivan','Rina Vidiawati','Istri/ Suami','234524676367','S1','SMA Nanga Pinoh','Wiraswasta','','','','','Jl. Serdam. Komp. Puri Akcaya D.12','007/002','Sungai raya dalam','Sungai raya','Kubu Raya','Kalimantan barat','2343434','','2023-08-21 09:58:42','Rivan','f385ae958257e19ba5eca887b765bc65',NULL,'Simpatisan','2023-08-21 09:58:42',NULL,'1',0),('2207090001','','6171011712950001','Asing','DAVID RYAN WILANDO','David','Jakarta','1995-12-17','Laki-laki','Kawin','A','','08111358884','davidwilando1795@gmail.com','https://www.facebook.com/DavidWilando/','https://www.instagram.com/davidwilando/?hl=id','Nindya Ellysa Lidsya','Istri/ Suami','081294487010','S1','UPH','Swasta','GBI ELSHADDAI','Organisasi Keagamaan','Jl.Prof. M Yamin 1A','0561765495','jl. ujung pandang 2, komp. the green mansion No. C9 ','004/039','Sui Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78118','','2023-02-15 14:04:29','david','172522ec1028ab781d9dfd17eaca4427',NULL,'Simpatisan','2023-02-15 14:04:29',NULL,'1',0),('2207240001','','161917373545','Asing','Agam Suteja','Agam','pontianak','1998-05-24','Laki-laki','Belum Kawin','A','08992885301','08992885301','agamsutej98@gmail.com','ndak ada','apa lagi ini','',NULL,'',NULL,'',NULL,'','','','','belum punya rumah','1','belum punya','apalagi ini','pontianak','kalbar','176453','','2023-03-11 13:55:36','agam','9c85a3c7fc695d9f7d278f7d409fb09d',NULL,'Simpatisan','2023-03-11 13:55:36',NULL,'1',0),('2212130001','','6112014806830006','Indonesia','RINA VIDIA WATI','RINA','Balikpapan','1983-06-08','Perempuan','Kawin',NULL,'','081543348543','Rinavidia@gmail.com','','','',NULL,'','S1','',NULL,'','','','','Jl. Sungai Raya Dalam Komp. Puri Akcaya 2 No. D 12','007/003','Sungai raya dalam','Sungai raya','Kubu Raya','Kalimantan Barat','','','2022-12-13 09:44:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 09:44:47',NULL,'1',0),('2212130002','','6171013010710003','Indonesia','EDY LUKMAN','Edi','Pontianak','1971-10-30','Laki-laki','Kawin',NULL,'','','Edi@gmail.com','','','',NULL,'','D3','','Swasta','','','','','JL.PURNAMA GG. PERINTIS 2 NO D-5','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2022-12-13 09:59:01','edi','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2022-12-13 09:59:01',NULL,'1',0),('2212130003','','6171016805730006','Indonesia','YUSNITA','YUSNITA','SEKADAU','1973-06-28','Perempuan','Kawin',NULL,'','08524584869','Yusnita@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2022-12-13 09:58:25','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 09:58:25',NULL,'1',0),('2212130004','','6171014305040008','Indonesia','RATU ESTER GENDOT AMPOR','RATU','Pontianak','2004-05-03','Perempuan','Belum Kawin',NULL,'','08524584869','Ratu@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.M YAMIN A 99\r\n','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2022-12-13 10:01:31','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:01:31',NULL,'1',0),('2212130005','','6171012011660003','Indonesia','WIJARNAKO','WIJARNAKO','Tegal','1966-11-20','Laki-laki','Kawin',NULL,'','081253257396','Wijarnako@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PH . HUSIN 2 KP.PARIS INDAH LESTARI BB 11','002/003','Bansur Darat','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2022-12-13 10:04:37','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:04:37',NULL,'1',0),('2212130006','','6171015912660003','Indonesia','LIM PO HUI','LIM PO HUI','Pontianak','1966-12-19','Perempuan','Kawin',NULL,'','','LIMPOHUI@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PH . HUSIN 2 KP.PARIS INDAH LESTARI BB 11\r\n','002/003','Bansir Darat','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2022-12-13 10:22:24','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:22:24',NULL,'1',0),('2212130009','','6171031106760012','Indonesia','HENDRI KAKENANG SAAD, SP','HENDRI KAKENANG SAAD, SP','Pakumbang','1976-06-11','Laki-laki','Kawin',NULL,'','','HENDRIKAKENANGSAAD@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. JERANDING NO. 50','001/009','Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-13 10:31:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-13 10:31:47',NULL,'1',0),('2212140001','','6171030601275001','Indonesia','ERICA FRENSYA CAI','ERICA ','Pontianak','1975-12-20','Perempuan','Kawin',NULL,'','081352500696','ERICAFRENSYACAI@gmail.com','','','',NULL,'','D3','',NULL,'','','','','JL. JERANDING NO. 5','001/009','Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 09:44:57','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 09:44:57',NULL,'1',0),('2212140002','0000002','6171050603750009','Indonesia','AFRA FITRIA','AFRA FITRIA','Penyalimau Hilir','1976-11-21','Laki-laki','Kawin',NULL,'','','AFRAFITRIA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.AMPERA KOMP. ZAL KHATULISTIWA NO. C-3','001/029','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-03-18 14:20:21','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Jemaat','2023-03-18 14:20:21',NULL,'1',0),('2212140003','','6171054603970003','Indonesia','ANASTASIA MARINI AFANTI','ANASTASIA MARINI AFANTI','Pontianak','1997-03-06','Perempuan','Kawin',NULL,'','','ANASTASIAMARINIAFANTI@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.AMPERA KOMP. ZAL KHATULISTIWA NO. C-3','001/029','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 09:53:30','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 09:53:30',NULL,'1',0),('2212140004','','6110569099800001','Indonesia','NURIMANG','NURIMANG','SAMBAS','1998-09-29','Laki-laki','Kawin',NULL,'','','NURIMANG@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.PROF M YAMIN NO 1 A','001/018','Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan barat','781116','','2022-12-14 10:41:16','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 10:41:16',NULL,'1',0),('2212140006','','6171014312770011','Indonesia','HO SOK KIAU','HO SOK KIAU','Pontianak','1977-12-03','Laki-laki','Kawin',NULL,'','081349600523','HOSOKKIAU@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PURNAMA KOMP. PURNAMA AGUNG VII NO . J .15','003/041','Parit Tokaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','78121','','2022-12-14 11:18:58','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 11:18:58',NULL,'1',0),('2212140007','','6171015011060002','Indonesia','TIARA IVANA','TIARA IVANA','Pontianak','2006-11-10','Perempuan','Belum Kawin',NULL,'','081349600523','TIARAIVANA@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PURNAMA KOMP. PURNAMA AGUNG VII NO . J .15','003/041','Parit Tokaya','Pontianak Selatan','Pontianak Kota','Kota Pontianak','78121','','2022-12-14 13:19:55','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 13:19:55',NULL,'1',0),('2212140008','','1271205112860001','Indonesia','NAOMI YEMIMA MANALU','NAOMI','MEDAN','1986-12-11','Perempuan','Belum Kawin',NULL,'','08152052384','NAOMIYEMIMAMANALU@gmail.com','','','',NULL,'','S2','','Swasta','','','','','JL.PROF M YAMIN NO 1 A','001/018','Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 14:56:51','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 14:56:51',NULL,'1',0),('2212140009','','6106011409860002','Indonesia','JOZETHIAN WATTA','JOZETHIAN','MANGOLE','1986-09-14','Laki-laki','Kawin',NULL,'','081522805656','JOZETHIANWATTA@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.IMAM BONJOL GG.MENDAWAI TENGAH NO.46B','002/004','Bansir Laut','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','78121','','2022-12-14 15:05:56','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 15:05:56',NULL,'1',0),('2212140010','','6112016711760003','Indonesia','EIVA RADE SITIO','EIVA','Medan','1899-11-30','Perempuan','Belum Kawin',NULL,'','','eivaradesitio@gmail.com','','','',NULL,'','S1','','Swasta','','','','','komp bali lestari D.13','001/012','','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-03-11 14:21:46','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-03-11 14:21:46',NULL,'1',0),('2212140011','0000003','6112090211940005','Indonesia','LAMPOS LAMBOK ARITONANG','Lampos','Pontianak','1994-04-02','Laki-laki','Kawin',NULL,'','089648565494','Lamposclalucelia@gmail.com','','','',NULL,'','D3','','Swasta','','','','','Jl. Komp. Ari Karya Indah 2\r\n','062/015','Pal.Sembilan','Sungai Kakap','Kabupaten Kuburaya','Kalimantan Barat','78381','','2023-05-13 11:41:16','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Jemaat','2023-05-13 11:41:16',NULL,'1',0),('2212140012','','6171032708870001','Indonesia','ELKANA PUTRA BORNEO PURBA','NEO','Pontianak','1987-08-27','Laki-laki','Kawin',NULL,'','089656038474','ELKANAPUTRABORNEOPURBA@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA GG.PERINTIS IV','001/008','Parit Tokaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','78116','','2022-12-14 15:48:42','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2022-12-14 15:48:42',NULL,'1',0),('2301040001','','6171010507720510','Indonesia','DANIEL DJOKO PRAPMONO','DANIEL DJOKO PRAPMONO','Semarang','1972-07-05','Laki-laki','Kawin',NULL,'','','DANIELDJOKOPRAPMONO@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PARIT H. HUSIN II KOMP.Central Park REAL ESTATE BLOK','005/004','Bangka Belitung Darat','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','78124','','2023-01-04 09:21:33','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-01-04 09:21:33',NULL,'1',0),('2301040002','','6171021605680008','Indonesia','MH.SIMBOLON','MH.SIMBOLON','Tapanuli Utara','1968-05-16','Laki-laki','Kawin',NULL,'','','MH.SIMBOLON@gmail.com','','','',NULL,'',NULL,'','Swasta','','','','','JL. YA\'M SABRAN KOMP.VILLA ELEKTRIK BLOK D2/NO002','002/011','Tanjung Hulu','Pontianak Timur','Kota Pontianak','Kalimantan Barat','78237','','2023-03-18 12:37:19','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-03-18 12:37:19',NULL,'1',0),('2301040003','','6171024711740005','Indonesia','TIURMA SINAGA','TIURMA SINAGA','Medan','1974-11-07','Perempuan','Kawin',NULL,'','','TIURMASINAGA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL. YA\'M SABRAN KOMP.VILLA ELEKTRIK BLOK D2/NO002','002/011','Tanjung Hulu','Pontianak Timur','Kota Pontianak','Kalimantan Barat','78237','','2023-08-09 14:53:36','Tiurma','cbb32ebf73f5cacb0798a3feffa22fa1',NULL,'Simpatisan','2023-08-09 14:53:36',NULL,'1',0),('2301040004','','6171050606730015','Indonesia','DONISIANUS ANDRI','DONISIANUS ANDRI','Kapuas Hulu','1973-06-06','Laki-laki','Kawin',NULL,'','','DONISIANUSANDRI@gmail.com','','','',NULL,'','','','Wiraswasta','','','','','JL. ST A. RAHMAN GGSUKAMULYA NO 12D','002/013','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-01-04 10:08:19','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-01-04 10:08:19',NULL,'1',0),('2301040005','','6305040602800001','Indonesia','KORES WIHANTORO, SH.','KORES WIHANTORO, SH.','TIRTAMULYA MUBA','1980-02-06','Laki-laki','Kawin',NULL,'','','KORESWIHANTORO@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.SWADAYA GG. TUNAS HARAPAN KOMP. ZAMRUD SWADAYA II B. 17','007/007','PAL SEMBILAN','Kubu Raya','Kabupaten Kuburaya','Kalimantan Barat','78381','','2023-03-11 14:51:13','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-03-11 14:51:13',NULL,'1',0),('2301040006','','6305042603100001','Indonesia','YENNY MEGAWATI HUTAPEA','YENNY MEGAWATI HUTAPEA','Kota Baru','1981-06-19','Perempuan','Kawin',NULL,'','','YENNYMEGAWATIHUTAPEA@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','JL.SWADAYA GG. TUNAS HARAPAN KOMP. ZAMRUD SWADAYA II B. 17','007/006','Pal Sembilan','Sei.Kakap','Kuburaya','Kalimantan Barat','78381','','2023-05-13 11:00:15','develop','81dc9bdb52d04dc20036dbd8313ed055',NULL,'Simpatisan','2023-05-13 11:00:15',NULL,'1',0),('2301040007','0000001','6171011512640001','Indonesia','WILAN','WILAN','BOGOR','1964-12-16','Laki-laki','Kawin',NULL,'','','Wilan123@gmail.com','','','',NULL,'','S2','','','','','','','Jl. Karya baru. Komp. Pondok Pelangi Blok D2 No. 3\r\n','007/003','Parit Tokaya','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','','','2023-08-04 15:56:49','Wilan','b6142aa161abb82fa32892ff3aa2c88d',NULL,'Jemaat','2023-08-04 15:56:49',NULL,'1',0),('2305240001','','6171050405890001','Indonesia','DENDI','Dendi','Betung Ambawang','1989-05-04','Laki-laki','Belum Kawin',NULL,'081251407198','','dendi12@gmail.com','','','',NULL,'',NULL,'','Swasta','','','','','jl puskesmas pal III gg sejati II no 20','001/029','Sungai Jawi','Pontianak Kota','Pontianak','Kalimantan Barat','78113','','2023-05-24 10:17:01','develop','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2023-05-24 10:17:01',NULL,'1',0),('2305240002','','6107102412900004','Indonesia','DESKI IMANUEL','Deski','Serukam','1990-12-24','Laki-laki','Belum Kawin',NULL,'','','deski12@gmail.com','','','',NULL,'','','','Swasta','','','','','','004/001','Suti Semarang','Suti Semarang','Bengkayang','Kamlimantan Barat','79283','','2023-05-24 09:39:48','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-24 09:39:48',NULL,'1',0),('2305240003','','1208206303950002','Indonesia','ELENCHIA SIALAGAN','Elen','Sibuntuon','1995-03-23','Perempuan','Belum Kawin',NULL,'085275010318','','elenchia12@gmail.com','','','',NULL,'','D3','','Pegawai Negeri','','','','','sesuai KTP: Sibuntuon Sumatra utara Sekarang: jl danau sentarum gg kademan 19b','000/000','Sibuntuon','Dolok Pardamean','Simalungun','Kalimantan Barat','21163','','2023-05-24 10:16:45','develop','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2023-05-24 10:16:45',NULL,'1',0),('2305240004','','6108074108950001','Indonesia','MELIANA','Meli','Terindak','1995-06-30','Perempuan','Belum Kawin',NULL,'','','meliana12@gmail.com','','','',NULL,'','','','Swasta','','','','','','003/006','Pal Sembilan','Pal Sembilan','Kuburaya','Kalimantan Barat','','','2023-05-24 09:51:42','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-24 09:51:42',NULL,'1',0),('2305240007','','3275033004980024','Indonesia','ZUKRI','Zukri','Pontianak','1997-04-30','Laki-laki','Belum Kawin',NULL,'081298853639','','zukri12@gmail.com','','','',NULL,'','SD','','Swasta','','','','','komplek fortuna golden blok cc7','003/008','Mekar Baru','Sungai Raya','Kubu Raya','Kalimantan Barat','','','2023-05-24 10:15:14','develop','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2023-05-24 10:15:14',NULL,'1',0),('2305240008','','6171045511970003','Indonesia','VIVI RIASANTI','Vivi','Pontianak','1997-11-15','Perempuan','Belum Kawin',NULL,'082112467849','','vivi12@gmail.com','','','',NULL,'',NULL,'','Swasta','','','','','gg harapan III','003/015','Siantan Tengah','Pontianak Utara','Pontianak','Kalimantan Barat','78242','','2023-05-24 10:16:08','develop','202cb962ac59075b964b07152d234b70',NULL,'Simpatisan','2023-05-24 10:16:08',NULL,'1',0),('2305240009','','6171052102000003','Indonesia','NATHANAEL YOEL DAMARA','NATHAN','Pontianak','2000-02-21','Laki-laki','Belum Kawin',NULL,'','085248488694','NATHANAELYOELDAMARA@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PAINI BARDAN GG JELUTUNG 4 NO 43\r\n','003/008','TANJUNG HULU','Mempawah Timur','Kota Pontianak','Kalimantan Barat','78237','','2023-05-24 10:18:24','NATHAN','01b0dc414408caff9dc0f050b19985b5',NULL,'Simpatisan','2023-05-24 10:18:24',NULL,'1',0),('2305240010','','6112014308990014','Asing','YANTI','Yanti','Pontianak','1999-08-03','Perempuan','Belum Kawin',NULL,'081345242022','','yanti12@gmail.com','','','',NULL,'','SD','','Swasta','','','','','jl adisucipto gg melati putih no.67','001/001','Parit Baru','Sungai Raya','Kubu Raya','Kalimantan Barat','78391','','2023-05-24 10:22:13','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-24 10:22:13',NULL,'1',0),('2305240011','','1608016103850001','Indonesia','BETI WISMA MULIA','BETI ','Kota Bumi','1984-03-21','Perempuan','Kawin',NULL,'','','BETIWISMAMULIA@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.ALIANYANG KOMP.ASRAMA P. HIDAYATBARAK Y\r\n','006/025','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat',' 78116','','2023-05-24 10:23:51','BETI ','38d4071c3fffe9cc87ca9de476dd33a1',NULL,'Simpatisan','2023-05-24 10:23:51',NULL,'1',0),('2305240012','','6171016201620169','Indonesia','ELLYATUN TARIGAN , SE','ELLYATUN','Medan','1969-01-22','Laki-laki','Kawin',NULL,'','081210063018','ELLYATUN123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PROF . M YAMIN NO 55 A\r\n','003/030','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2023-05-24 10:41:40','ELLYATUN ','0fd97c9eb4e8380c583290408911bedb',NULL,'Simpatisan','2023-05-24 10:41:40',NULL,'1',0),('2305240014','','6171015007600006','Indonesia','ERNIE SURYANI','ERNIE ','Ketapang','1960-07-10','Perempuan','Janda/ Duda',NULL,'','0895701953908','ERNIESURYANI@gmail.com','','','',NULL,'','D3','','Swasta','','','','','JL.KARYA BARU GG. KARYA BARU 7\r\n','002/003','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-24 11:27:59','Ernie','ad7a002ca901b6ee259ccff7a298f661',NULL,'Simpatisan','2023-05-24 11:27:59',NULL,'1',0),('2305240015','','6171011118200007','Indonesia','FEDY ERICK','FEDY','Pontianak','1982-11-11','Laki-laki','Belum Kawin',NULL,'','082177977797','FEDYERICK@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.GAJAH MADA 1 NO 19\r\n','003/001','Benua Melayu Darat','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-24 11:32:19','Fedy','5cd5e049f3cab0bff44a357a032ff363',NULL,'Simpatisan','2023-05-24 11:32:19',NULL,'1',0),('2305240016','','6112015508820014','Indonesia','Heppy Rawati Manurung','Heppy ','Pontianak','1982-08-15','Perempuan','Janda/ Duda',NULL,'','','Heppy123@gmail.com','','','',NULL,'','D3','','Swasta','','','','','jl adisucipto gg rambu buntu\r\n','008/006','','Sei.Raya','Kubu Raya','Kalimantan Barat','7891','','2023-05-24 11:36:21','Heppy','596f2380bb76485951da10228afc5356',NULL,'Simpatisan','2023-05-24 11:36:21',NULL,'1',0),('2305250001','','6171035108750003','Indonesia','AGUSTIN RINA S KACARIBU','Agustin','Medan','1975-08-11','Perempuan','Belum Kawin',NULL,'','','agustin12@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.UMUT THALIB BLOK LI NO 11','004/026','Sungai Jawi Luar','Pontianak Barat','Pontianak','Kalimantan Barat','78113','','2023-05-25 11:03:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-25 11:03:47',NULL,'1',0),('2305250002','','6112016601680002','Indonesia','RIMNAULI SHINTA HASILOAN S','RIMNAULI','Sintang','1968-01-26','Perempuan','Kawin',NULL,'','','RIMNAULI123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','KOMP.SEJAHTERA INDAH UPS ASPOL NO A.6\r\n','008/003','Sei Raya','Sei Raya','Kuburaya','Kalimantan Barat','','','2023-05-25 11:05:02','RIMNAULI','8cc22fbe9947664b54bc7e3b713ab87c',NULL,'Simpatisan','2023-05-25 11:05:02',NULL,'1',0),('2305250003','','6111054612060001','Indonesia','ASKA IVO SIHOMBING','Aska','Pontianak','2005-12-05','Perempuan','Belum Kawin',NULL,'','','aska12@gmail.com','','','',NULL,'','','',NULL,'','','','','Jl. Dusun Punai Jaya','016/000','Durian Sebatang','Seponti','Kayong Utara','Kalimantan Barat','78856','','2023-05-25 11:08:26','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-25 11:08:26',NULL,'1',0),('2305250004','','6105054202980001','Indonesia','RATI FEBRIANTI','RATI','SUNGAI MALI','1998-02-02','Perempuan','Belum Kawin',NULL,'','082155773831','RATI123@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. DUSUN SEBAJAU\r\n','004/000','KETUNGAU TENGAH','MERABAI','Sintang','Kalimantan Barat','','','2023-05-25 11:09:48','RATI123','45ad92f58b0e8eda8a23b4bb0f14e72e',NULL,'Simpatisan','2023-05-25 11:09:48',NULL,'1',0),('2305250005','','611201580670007','Indonesia','SRI WIDAYATI','SRI','Boyolali','1970-06-18','Perempuan','Kawin',NULL,'','085251835335','Sri123@gmail.com','','','',NULL,'','','',NULL,'','','','','JL.SEI RAYA DALAM.KOMP.SRIKANDI NO 3603/23\r\n','003/023','SUNGAI RAYA','Sei/Sungai Raya','Kuburaya','Kalimantan Barat','','','2023-05-25 11:14:23','Sri123','b22803be491d7997f5d265fdaed838ea',NULL,'Simpatisan','2023-05-25 11:14:23',NULL,'1',0),('2305250006','','6104244708960001','Indonesia','BERLIANTA PARULIAN PANJAITAN','Lian','Ketapang','1996-05-07','Perempuan','Belum Kawin',NULL,'','','berlianta12@gmail.com','','','',NULL,'','','','Swasta','','','','','dusun wonorejo','001/001','','Benua Kayong','Ketapang','Kalimantan Barat','78874','','2023-05-25 11:26:51','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-25 11:26:51',NULL,'1',0),('2305250007','','617101651260005','Indonesia','YOHANA ADRIANA','YOHANA ','MEMPAWAH','1960-12-25','Perempuan','Kawin',NULL,'','081345942412','Yohanadriana123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PURNAMA GG. PURNAMA BARU\r\n','001/015','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-25 11:27:44','Yohana123','f0a7755e49139c205fb7eeea5b2949e1',NULL,'Simpatisan','2023-05-25 11:27:44',NULL,'1',0),('2305250008','','6171011201050005','Indonesia','BRYAN MARTON LIM','Bryan','Pontianak','2005-01-12','Perempuan','Belum Kawin',NULL,'','','bryan12@gmail.com','','','',NULL,'','SD','',NULL,'','','','','JL.PERUMAHAN PURNAMA SEMPURNA NO. G.4','007/010','Akcaya','','Pontianak Selatan','Kalimantan Barat','78121','','2023-05-25 11:31:17','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-25 11:31:17',NULL,'1',0),('2305250009','','6171016012760004','Indonesia','TRISYE TOBING','TRISYE','Jakarta','1976-12-20','Perempuan','Kawin',NULL,'','085245502964','Trisye123@gmail.com','','','',NULL,'','','',NULL,'','','','','Jl. Purwosari Komp. Purwosari Blok B-7\r\n','002/011','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-25 11:31:54','Trisye','d00bc1bec132698c67595380bf9f9a8a',NULL,'Simpatisan','2023-05-25 11:31:54',NULL,'1',0),('2305250010','','6112016804010015','Indonesia','CLARA','Lala','Pontianak','2001-04-28','Perempuan','Belum Kawin',NULL,'','','clara12@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Adisucipto, Gg. Melati Putih','001/001','Parit Baru','Sungai Raya','Kubu Raya','Kalimantan Barat','78391','','2023-05-25 11:47:57','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-25 11:47:57',NULL,'1',0),('2305250011','','6108034310940001','Indonesia','CHINTIA OLIVIA KESEK','CHINTIA','Lalumpe','1994-10-03','Perempuan','Kawin',NULL,'','082350061335','Chintia123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','DUSUN RASO\r\n','009/002','Sepahat','Menjalin','Landak','Kalimantan Barat','','','2023-05-25 13:59:33','Chintia','797b05cabbbc53896f5a9a0d4f17599e',NULL,'Simpatisan','2023-05-25 13:59:33',NULL,'1',0),('2305250012','','6171012111020004','Indonesia','Fedrik Yoel. N','Fedrik ','Pontianak','2002-11-21','Laki-laki','Belum Kawin',NULL,'','089604525328','Fredik123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Purwosari Komp. Purwosari Blok B-7\r\n','002/011','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-25 14:03:25','Fredik','6c7d19d3fdc15dabae4a1a8849b383d8',NULL,'Simpatisan','2023-05-25 14:03:25',NULL,'1',0),('2305250013','','6171041804040009','Indonesia','Jonathan Elsaday','Jonathan','Pontianak','2001-01-01','Laki-laki','Belum Kawin',NULL,'','081347842229','Jonathan123@gmail.com','','','',NULL,'','','','Swasta','','','','','jl. a.r saleh komplek rossana teracce\r\n','001/004','Bangka Belitung Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','','','2023-05-25 14:06:43','Jonathan','a82f3ad5d44138f2971e35e42d7324ec',NULL,'Simpatisan','2023-05-25 14:06:43',NULL,'1',0),('2305250014','','6112014806830006','Indonesia','RINA VIDIA WATI','RINA ','Balikpapan','1983-06-08','Perempuan','Kawin',NULL,'','081543348543','Rina123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Sungai Raya Dalam Komp. Puri Akcaya 2 No. D 12\r\n','007/003','sungai raya dalam','Sei/Sungai Raya','Kuburaya','Kalimantan Barat','','','2023-05-25 14:09:33','Rina','e73b39e7893f96b7f95fdae1bcee1d85',NULL,'Simpatisan','2023-05-25 14:09:33',NULL,'1',0),('2305250015','','6171011101740507','Indonesia','DARIUS ERNALEM SIBERO','DARIUS','Medan','1974-01-11','Laki-laki','Kawin',NULL,'','','Darius123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA I GG.PURNAMA JAYA NO 34\r\n','004/040','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-25 14:19:58','Darius','0316233828c7ce6faf83a3682ffa528c',NULL,'Simpatisan','2023-05-25 14:19:58',NULL,'1',0),('2305250016','','6171013103770003','Indonesia','EDY SURIANTO','EDY','Pontianak','1977-03-31','Laki-laki','Kawin',NULL,'','','Edy123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PURNAMA KOMP. PURNAMA AGUNG VII NO . J .15\r\n','003/041','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-25 14:22:58','Edy','4be2804a0c558221a4301d43ae226c3f',NULL,'Simpatisan','2023-05-25 14:22:58',NULL,'1',0),('2305250017','','6112095109670001','Indonesia','ERLENA POERNOMO','ERLENA','Surabaya','1967-09-11','Perempuan','Kawin',NULL,'','081345384930','Erlena123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. RAYA KAKAP\r\n','017/005','PAL SEMBILAN','Sei/Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-05-25 14:26:04','Erlena','9ad856dc3e3c2d72c4d638b42dd1c05a',NULL,'Simpatisan','2023-05-25 14:26:04',NULL,'1',0),('2305250018','','6171012303650007','Indonesia','ELISA SIMANJUNTAK','ELISA ','Padang Sidempuan','1965-03-23','Laki-laki','Kawin',NULL,'','','Elisa123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','JL. PROF. M YAMIN GG. URAI HAMID NO. 37\r\n','003/013','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-25 14:29:13','Elisa','d08956a500cc42691bc593ec09be4ebb',NULL,'Simpatisan','2023-05-25 14:29:13',NULL,'1',0),('2305250020','0000004','6171014706680001','Indonesia','HOTLIA HUTABARAT','HOTLIA','Tapanuli','1960-06-07','Laki-laki','Kawin',NULL,'','','Hotlia123@gmail.com','','','',NULL,'','','','Pegawai Negeri','','','','','JL. PROF. M YAMIN GG. URAI HAMID NO. 37\r\n','003/013','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-25 14:38:14','Hotlia','52ff121f9ee414317eaab6d8277589ba',NULL,'Jemaat','2023-05-25 14:38:14',NULL,'1',0),('2305260001','','6112090204660001','Indonesia','RICKY','RICKY','Surabaya','1966-04-02','Laki-laki','Kawin',NULL,'','081345384930','Ricky123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. RAYA KAKAP\r\n','017/005','PAL SEMBILAN','Sei/Sungai Kakap','Kuburaya','Kalimantan Barat','78381','','2023-05-26 14:16:37','Ricky','c56e7034081939df13f981a1e07261f6',NULL,'Simpatisan','2023-05-26 14:16:37',NULL,'1',0),('2305260003','','6102167008680001','Indonesia','DEWI ASTUTI','DEWI','Pontianak','1968-08-30','Perempuan','Kawin',NULL,'','','Dewi123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. 28 Oktober No. 8\r\n','001/014','Siantan Hulu','Pontianak Utara','Pontianak','Kalimantan Barat','78241','','2023-05-26 14:28:38','Dewi','b555791e9b304bffba4b527745e5b0eb',NULL,'Simpatisan','2023-05-26 14:28:38',NULL,'1',0),('2305260006','','6171015304750011','Indonesia','HI LUAN','HI LUAN','Tanjung Satai','1975-04-13','Perempuan','Kawin',NULL,'','','HILUAN123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA GG. PERINTIS 2 NO D-5\r\n','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','781116','','2023-05-26 14:38:05','HILUAN','5b0431d12b519cbde366187866a693cf',NULL,'Simpatisan','2023-05-26 14:38:05',NULL,'1',0),('2305260007','','6171064412640002','Indonesia','DWINITA PANIMBA','Dwinita','Palopo','1964-12-04','Perempuan','Belum Kawin',NULL,'','','dwinita12@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','JL.ADI SUCIPTO KOMP. Perkebunan','003/003','Bangka Belitung laut','Pontanak Tenggara','Pontianak','Kalimantan Barat','','','2023-05-26 14:40:53','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-26 14:40:53',NULL,'1',0),('2305260008','','6171014811040001','Indonesia','ESTHER HILARESA','Ester','Pontianak','2004-11-08','Perempuan','Belum Kawin',NULL,'','','ester12@gamil.com','','','',NULL,'','','',NULL,'','','','','Jl. purnama 2, Gg. purnama indah 3 no. 49','002/004','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-26 14:45:22','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-26 14:45:22',NULL,'1',0),('2305260010','','6171066911720001','Indonesia','RUSIAH INTAN','RUSIAH ','NANGA PINOH','1961-01-01','Perempuan','Belum Kawin',NULL,'','','Rusiah123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. IMAM BONJOL. GG. TANJUNG MAS D-7\r\n','004/001','','','Pontianak','Kalimantan Barat','','','2023-05-26 14:53:19','Rusiah','d92a7e5380bc001aec5d5a3332e111c4',NULL,'Simpatisan','2023-05-26 14:53:19',NULL,'1',0),('2305260011','','6171055804750002','Indonesia','SELINA','SELINA','SEI LIMAU','1975-04-16','Laki-laki','Kawin',NULL,'','085248488694','Selina123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PAINI BARDAN GG JELUTUNG 4 NO 43\r\n','003/008','TANJUNG HULU','Mempawah Timur','Pontianak','Kalimantan Barat','78237','','2023-05-26 14:56:09','Selina','1d2c2080a2621603b97de20e983a9eaa',NULL,'Simpatisan','2023-05-26 14:56:09',NULL,'1',0),('2305260013','','6171052704040008','Indonesia','EVAN','Evan','Pontianak','2004-04-27','Laki-laki','Belum Kawin',NULL,'','','evan12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','GG. H SALEH NO 37','001/021','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2023-05-27 15:32:06','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:32:06',NULL,'1',0),('2305260014','','6171024509590001','Indonesia','TUTI SUMIATI','TUTI','Pontianak','1959-09-05','Perempuan','Janda/ Duda',NULL,'','081254979080','Tuti123@gmail.com','','','',NULL,'','Lainnya','','Pegawai Negeri','','','','','GANG JELUTUNG 4 NO.46\r\n','003/008','Tanjung Hulu','Pontianak Timur','Pontianak','Kalimantan Barat','78237','','2023-05-27 15:31:45','Tuti','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:31:45',NULL,'1',0),('2305260015','','6310046512030007','Indonesia','FINA THALIA RERUNG','Fina','Sekadau','2003-12-25','Perempuan','Belum Kawin',NULL,'081345198864','','fina12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','jl.suka mulia gg. sukma 21','003/036','Sungai Jawi','Pontianak Kota','Pontianak','Kalimantan Barat','78118','','2023-05-27 15:31:00','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:31:00',NULL,'1',0),('2305260016','','6171010511670004','Indonesia','ZAKHARIA RONNY ANGGARA','RONNY','Balikpapan','1967-11-05','Laki-laki','Janda/ Duda',NULL,'','081345945877','WayneRonny@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.SUI RAYA DALAM VILLA GADING RAYA 1 NO II B\r\n','001/006','','Pontianak Tenggara','Pontianak','Kalimantan Barat','','','2023-05-26 15:04:31','Ronny','9779d412bab790e557f0bf1b60a3e6a3',NULL,'Simpatisan','2023-05-26 15:04:31',NULL,'1',0),('2305260018','','6107085902070003','Indonesia','INTAN PERMATA SARI','Intan','Pontianak','2007-11-09','Perempuan','Belum Kawin',NULL,'','','intan12@gmail.com','','','',NULL,'','','',NULL,'','','','','\r\nJl danau sentarum no 8 Ab','001/027','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','7816','','2023-05-26 15:12:29','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-26 15:12:29',NULL,'1',0),('2305260019','','6108076704980001','Indonesia','KALISTA APRA PRISELA','Kalista','Ubah','1998-04-27','Perempuan','Belum Kawin',NULL,'','','kalista12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','Jl. Dusun Gundaleng','001/000','Senakin','Sengah Temila','Landak','Kalimantan Barat','79356','','2023-05-27 15:28:10','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:28:10',NULL,'1',0),('2305260020','','6112015004030013','Indonesia','LILI ANDRIANI','Lili','Pontianak','2003-04-10','Perempuan','Belum Kawin',NULL,'','','lili12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','Jl. Adisucipto, Gg. Melati Putih','001/001','Parit Baru','Sungai Raya','Kubu Raya','Kalimantan Barat','78391','','2023-05-27 15:27:49','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:27:49',NULL,'1',0),('2305260021','','6108035212920001','Indonesia','MIKI','Miki','Malino','1992-12-12','Perempuan','Belum Kawin',NULL,'','','miki12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','Jl. Dusun Malino','002/001','Bengkawe','Menjalin','Landak','Kalimantan Barat','','','2023-05-27 15:27:16','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:27:16',NULL,'1',0),('2305260022','','6103206310890001','Indonesia','NOVA PINTAULI TAMPUBOLON','Nova','Meliau','1989-10-23','Perempuan','Belum Kawin',NULL,'','','nova12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','Jl. Perdamian, Komp. Damai Sejahtera Blok. D No. 22','099/017','Pal Sembilan','Sungai Kakap','Kubu Raya','Klaimantan Barat','78381','','2023-05-26 16:05:00','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-26 16:05:00',NULL,'1',0),('2305260023','','6171037011920003','Indonesia','NOVIA MAGDALENA','Novia','Pontianak','1992-11-30','Perempuan','Kawin',NULL,'','','novia12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','JL. PARIT H. HUSIN KOMP. BALI MAS 1 A-19','002/002','Bangka Belitung Darat','Pontianak Tenggara','Pontianak','Kalimantan Barat','78124','','2023-05-27 15:26:48','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:26:48',NULL,'1',0),('2305260024','','6112014703950012','Indonesia','NINDYA ELLYSA LIDSYA','Nindya','Banjarmasin','1995-03-07','Perempuan','Kawin',NULL,'','','nindya12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','JL,.SOEKARNO HATTA , KOMP BUMI ARTHA MAS . NO 8','001/001','Sei Raya Dalam','Sungai Raya','Kubu Raya','Kalimantan Barat','','','2023-05-27 15:26:33','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:26:33',NULL,'1',0),('2305260025','','6171014104686900','Indonesia','RACHEL MIRIAM APRILIA GINTING','Rachel','Pontianak','2000-04-01','Perempuan','Belum Kawin',NULL,'','','rachel12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','JL. PROF . M YAMIN NO 55 A','003/030','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2023-05-26 16:22:21','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-26 16:22:21',NULL,'1',0),('2305260026','','6171055104730001','Indonesia','RINCE ULIARTA SIMANUNGKALIT','Rince','Pontianak','1973-04-11','Perempuan','Belum Kawin',NULL,'','','rince12@gmail.com','','','',NULL,'','Lainnya','',NULL,'','','','','JL. GUSTI HAMZAH GG.PANCASILA 4 NO. 24 D','009/010','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-05-27 15:26:00','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-27 15:26:00',NULL,'1',0),('2305290001','','6171014511020005','Indonesia','RUTH CLAUDIA AGINTA GINTING','Ruth','Jakarta','2002-11-05','Perempuan','Belum Kawin',NULL,'','','ruth12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PROF . M YAMIN NO 55 A','003/030','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-05-29 10:21:10','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:21:10',NULL,'1',0),('2305290002','','357602651290002','Indonesia','SHANGRILA ROSIANA DJEHADUT','Ana','Mojokerto','1992-12-25','Perempuan','Kawin',NULL,'','','shangrilla12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','jl.Kalimas ','004/001','','','Kubu Raya','Kalimantan Barat','','','2023-05-29 10:25:17','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:25:17',NULL,'1',0),('2305290003','','6172014610890001','Indonesia','ULIN HUTAPEA','Ulin','Singkawang','1989-10-06','Perempuan','Kawin',NULL,'','','ulin12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','JL.PAHLAWAN GGBASUNI NO 7','022/009','Roban','Singkawang Tengah','Singkawang','Kalimantan Barat','','','2023-05-29 10:29:17','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:29:17',NULL,'1',0),('2305290004','','6108036311940001','Indonesia','VELLA NOVIANTI','Vella','Karangan','1994-11-23','Perempuan','Belum Kawin',NULL,'','','vella12@gmail.com','','','',NULL,'','','',NULL,'','','','','Jl. Candramidi Gg. Prajaya No. 62A','000/000','','','','','','','2023-05-29 10:35:42','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:35:42',NULL,'1',0),('2305290005','','6108073006050007','Indonesia','YOSAFAT PETER JO','Jojo','Jakarta','2005-06-30','Laki-laki','Belum Kawin',NULL,'','','yosafat12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. AYANI. NO 25 G','004/025','Benua Melayu Darat','Pontianak Selatan','Pontianak','','Kalimantan','','2023-05-29 10:39:33','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:39:33',NULL,'1',0),('2305290006','','6108076004920001','Indonesia','YULIATI','Yuli','Kalimantan Barat','1992-04-20','Perempuan','Kawin',NULL,'','','yuliati12@gamil.com','','','',NULL,'','','',NULL,'','','','','JL.RAYA KUALA PARIT JEPANG GG TEGAL SARI 2','001/001','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-29 10:42:45','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:42:45',NULL,'1',0),('2305290007','','6171015007050003','Indonesia','THERESIA EFFROSINA','There','Pontianak','2005-07-10','Perempuan','Belum Kawin',NULL,'','','there12@gmail.com','','','',NULL,'','','',NULL,'','','','','Jl. Purnama 2, Komp.Purnama Hijau Jalur 1, NO A.1','001/001','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-29 10:49:34','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:49:34',NULL,'1',0),('2305290008','','1871024701050004','Indonesia','SONIA ANGELICA TASLIM','Sonia','Sanggau Kapuas','2005-01-07','Perempuan','Belum Kawin',NULL,'','','sonia12@gamail.com','','','',NULL,'','','',NULL,'','','','','JL. SUI RAYA DALAM KOMP. MEGA SERDAM C','009/007','Sungai Raya Dalam','Sungai Raya','Kubu Raya','Kalimantan Barat','','','2023-05-29 10:53:05','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:53:05',NULL,'1',0),('2305290009','','6171054908050008','Indonesia','JESSICA LESTARI SARSANTO','Jesika','Malang','2003-01-29','Perempuan','Belum Kawin',NULL,'','','jessica12@gmail.com','','','',NULL,'','','',NULL,'','','','','JLDANAU SENTARUM KOMP. SENTARUM MANDIRI 2 BLOCK C/2','008/018','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-05-29 10:57:22','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 10:57:22',NULL,'1',0),('2305290010','','6171010309060002','Indonesia','SAMUEL DASLIM','Samuel','Pontianak','2005-09-03','Laki-laki','Belum Kawin',NULL,'','','samuel12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL.SUPRAPTO IV NO.6 A','003/006','Benua Melayu Darat','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-29 11:00:28','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:00:28',NULL,'1',0),('2305290011','','6171055607050001','Indonesia','EKKLESIA IVANA PRASETIYA','Eklesia','Pontianak','2005-07-16','Perempuan','Belum Kawin',NULL,'','','Ekklesia12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. AMPERA KOMP. GRAHA AMPERA PERMAI BLOK A.6','003/040','Sungai Jawi','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-05-29 11:04:20','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:04:20',NULL,'1',0),('2305290012','','611201550106005','Indonesia','GABRIELA FLORENSIA D.P','Gabriela','Pontianak','2006-01-15','Perempuan','Belum Kawin',NULL,'','','gabriela12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','','003/023','Sungai Raya','Sungai Raya','Kubu Raya','Kalimantan Barat','','','2023-05-29 11:12:11','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:12:11',NULL,'1',0),('2305290013','','6171020812030001','Indonesia','RUBEN NATANAEL','Ruben','Jakarta','2003-12-08','Laki-laki','Belum Kawin',NULL,'','','ruben12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. GG . AGATIS NO. 90 PERUM III','002/004','Tannung Hulu','Pontianak Timur','Pontianak','Kalimantan Barat','','','2023-05-29 11:15:25','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:15:25',NULL,'1',0),('2305290014','','6171034108070006','Indonesia','BETHANIA SOLAGRATIA KARTIKA','Bethania','Pontianak','2007-08-01','Perempuan','Belum Kawin',NULL,'','','bethania12@gamial.com','','','',NULL,'','SMP','',NULL,'','','','','JL. TANJUNG HARAPAN','002/002','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Baratr','','','2023-05-29 11:18:52','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:18:52',NULL,'1',0),('2305290015','','6171016604060002','Indonesia','CLARA CLARESTA','Clara','Pontianak','2001-07-08','Perempuan','Belum Kawin',NULL,'','','clara12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','JL.PURNAMA GG. PERINTIS 2 NO D-5','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-29 11:21:43','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:21:43',NULL,'1',0),('2305290016','','6305044901050001','Indonesia','SHEKINA GLORY','Sheki','Tapin','2005-01-09','Perempuan','Belum Kawin',NULL,'','','shekina12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','JL.SWADAYA GG. TUNAS HARAPAN KOMP. ZAMRUD SWADAYA II B. 17','007/006','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','','','2023-05-29 11:52:11','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 11:52:11',NULL,'1',0),('2305290017','','6112096804040001','Indonesia','MONA FORTA ARDINTA','Mona','Sui Asam','2004-04-28','Perempuan','Belum Kawin',NULL,'','','mona12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','KOMP BALI ASRI 11 NO 28','076/018','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','78380','','2023-05-29 15:28:41','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:28:41',NULL,'1',0),('2305290018','','6171054307050009','Indonesia','FELISA AMELIA EKA PUTRI','Felis','Yogjakarta','2005-07-03','Perempuan','Belum Kawin',NULL,'','','felisa12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','Jl. M. Yamin Gg. Morodadi','003/041','Sei Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-05-29 15:31:27','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:31:27',NULL,'1',0),('2305290019','','6171012011050002','Indonesia','ORLANDO YABES','Orlando','Pontianak','2012-02-09','Laki-laki','Belum Kawin',NULL,'','','orlando12@gmail.com','','','',NULL,'','','',NULL,'','','','','jl imam bonjol gg tanjung mas D7','004/001','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','78124','','2023-05-29 15:34:24','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:34:24',NULL,'1',0),('2305290020','','6112094405060006','Indonesia','REVA CHRISTY RAJAGUKGUK','Reva','Pontianak','2006-05-04','Perempuan','Belum Kawin',NULL,'','','reva12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','Jl. Komp. Ari Karya Indah 2','062/015','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','78381','','2023-05-29 15:39:04','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:39:04',NULL,'1',0),('2305290023','','   6171025807050','Indonesia','GRACE NIA CRISTIA SIMBOLON','Nia','Pontianak','2005-07-18','Perempuan','Belum Kawin',NULL,'','','grace12@gmail.com','','','',NULL,'','SMP','',NULL,'','','','','JL. YA\'M SABRAN KOMP.VILLA ELEKTRIK BLOK D2/NO002','002/011','Tanjung Hulu','Pontianak Timur','Pontianak','Kalimantan Barat','','','2023-05-29 15:50:32','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:50:32',NULL,'1',0),('2305290024','',' 617105541103000','Indonesia','GRACESIA NOVANDILLA','Grace','Pontianak','2003-11-14','Perempuan','Belum Kawin',NULL,'','','grace123@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PAINI BARDAN GG JELUTUNG 4 NO 43','003/008','Tanjung Hulu','Mempawah Timur','Pontianak','Kalimantan Barat','78237','','2023-05-29 15:55:38','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:55:38',NULL,'1',0),('2305290025','','6171011001010008','Indonesia','AMOS HOTMA PANDAPOTAN S','Amos','Pontianak','2001-01-10','Laki-laki','Belum Kawin',NULL,'','','amos12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PROF. M YAMIN GG. URAI HAMID NO. 37','003/013','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-05-29 15:58:15','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 15:58:15',NULL,'1',0),('2305290026','','6112090504920004','Indonesia','YUDA JERRY RAJAGUKGUK','Jerry','Pontianak','1992-04-05','Laki-laki','Kawin',NULL,'','','yuda12@gmail.com','','','',NULL,'','D3','',NULL,'','','','','jl perdamaian komplek areca residence no a38','062/015','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','78381','','2023-05-29 16:01:49','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:01:49',NULL,'1',0),('2305290027','','6171054405670012','Indonesia','CUNMIATY','Ester Mihing','Semitau','1967-05-02','Perempuan','Kawin',NULL,'','','cunmiaty12@gmail.com','','','',NULL,'','','',NULL,'','','','','GANG KEMUNING JERU II','003/019','Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2023-05-29 16:06:42','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:06:42',NULL,'1',0),('2305290028','','6171066312700003','Indonesia','MONALISA','Mona','Bengkayang','1970-12-23','Perempuan','Kawin',NULL,'','','mona123@gmail.com','','','',NULL,'','','',NULL,'','','','','JL. PARIT H. HUSIN KOMP. BALI MAS 1 A-19','002/002','Bangka Belitung Darat','Pontianak Tenggara','Pontianak','Kalimantan Barat','78124','','2023-05-29 16:09:20','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:09:20',NULL,'1',0),('2305290029','','6112095505670004','Indonesia','PURNAMA SIANTURI','Purnama','Pematang Siantar','1967-05-15','Perempuan','Kawin',NULL,'','','purnama12@gmail.com','','','',NULL,'','','',NULL,'','','','','\r\nJl. Komp. Ari Karya Indah 2','062/015','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','78381','','2023-05-29 16:12:31','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:12:31',NULL,'1',0),('2305290030','','6171036304980005','Indonesia','YESSY A.T','Yessy','Pontianak','1998-04-22','Perempuan','Belum Kawin',NULL,'','','yesy12@gmail.com','','','',NULL,'','SD','',NULL,'','','','','\r\nJL.KOM YOS SUDARSOGG. PISANG DALAM','003/019','Sunga Jawi Luar','Pontianak Kota','Pontianak','Kalimantan Barat','78113','','2023-05-29 16:15:31','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:15:31',NULL,'1',0),('2305290031','','6171016805730006','Indonesia','YUNISTA','Yunista','Sekadau','1973-05-28','Perempuan','Kawin',NULL,'','','yunista12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL.M YAMIN A 99','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-29 16:18:18','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:18:18',NULL,'1',0),('2305290032','','6103104708920001','Indonesia','TIKA AGUSTINA SARAGIH','Tika','Sanggau','1992-08-07','Perempuan','Belum Kawin',NULL,'','','tika12@gmail.com','','','',NULL,'',NULL,'',NULL,'','','','','\r\nJl. Dusun Perayan Dangku','005/000','Sosok','Tayan Hulu','Sanggau','Kalimantan Barat','78562','','2023-07-08 13:09:25','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-07-08 13:09:25',NULL,'1',0),('2305290033','','6109015207010003','Indonesia','EZRA AMARYA AIPASSA','Ezra','Sekadau','2001-07-12','Perempuan','Belum Kawin',NULL,'','','ezra12@gmail.com','','','',NULL,'','','',NULL,'','','','','\r\njL.PURNAMA 1 GG. PURNAMA BARU NO.38','016/006','Sungai Ringin','Sekadau Hilir','Sekadau','Kalimantan Barat','79582','','2023-05-29 16:24:47','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-29 16:24:47',NULL,'1',0),('2305300001','','6108081408930002','Indonesia','ALFIANO ARMANDO TAGOR','Tagor','Nanga Suhaid','1993-08-14','Laki-laki','Kawin',NULL,'','','alfiano12@gmail.com','','','',NULL,'','S2','',NULL,'','','','','DUSUN PALAH PARAJO','000/000','','','','Kalimantan Barat','','','2023-05-30 14:13:14','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 14:13:14',NULL,'1',0),('2305300002','','6171011811890004','Indonesia','ANDRI HIMAWAN','Andri','Solo','1989-11-18','Laki-laki','Kawin',NULL,'','','andri12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','Jl. Purnama Agung VII Komp. Pondok Agung Zira A.9','005/007','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-30 14:17:04','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 14:17:04',NULL,'1',0),('2305300003','','1209236810870001','Indonesia','ELVI NADAPDAP','Elvi','Aek Nangali','1987-10-27','Perempuan','Kawin',NULL,'','','elvi12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','Jl. Pedamaian Komp. Ari kARYA aLAM iNDAH IV','071/016','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','','','2023-05-30 15:05:13','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 15:05:13',NULL,'1',0),('2305300004','','6102172607930001','Indonesia','ETI SUSILAWATI','Eti','Rangitan','1993-07-09','Perempuan','Kawin',NULL,'','','eti12@gmail.com','','','',NULL,'','D3','',NULL,'','','','','\r\nDusun Untang','008/004','Pentek','Sadaniang','','Kalimantan Barat','','','2023-05-30 15:09:32','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 15:09:32',NULL,'1',0),('2305300005','','6112010412930007','Indonesia','HENGKY WIJAYA','Hengky','Pontianak','1993-12-04','Laki-laki','Kawin',NULL,'','','hengky12@gmail.com','','','',NULL,'','','',NULL,'','','','','\r\njl adisucipto btn teluk mulus gg wisuda 2 BB6','010/005','Teluk Kapuas','Sungai Ray','Kubu Raya','Kalimantan Barat','','','2023-05-30 15:12:58','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 15:12:58',NULL,'1',0),('2305300006','','6109015505990004','Indonesia','IMELDA BLEGUR','Imelda','Seranjim','1999-05-15','Perempuan','Belum Kawin',NULL,'','','imelda12@gmail.com','','','',NULL,'','','',NULL,'','','','','Jl. Dusun Seraras','001/001','Seraras','Sekadau Hilir','Sekadau','Kalimantan Barat','','','2023-05-30 15:22:20','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 15:22:20',NULL,'1',0),('2305300007','','6171014307530004','Indonesia','RITA MEGAWATI PANJAITAN','Rita','Narumondo','1953-07-03','Perempuan','Kawin',NULL,'','','rita12@gmail.com','','','',NULL,'','S1','',NULL,'','','','','JL.SURYA GANG SURYA NO 1','005/007','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-05-30 15:25:34','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 15:25:34',NULL,'1',0),('2305300008','','1471096310830042','Indonesia','ROTUA TAMPUBOLON','Rotua','Padang Sidempuan','1983-10-23','Perempuan','Kawin',NULL,'','','rotua12@gmail.com','','','',NULL,'','','',NULL,'','','','','JL.AMPERA KOMP.GRAHA AMPERA PERMAI A6','003/006','Sungai Jawi','Pontianak Kota','Pontianak','Kalimantan Barat','78116','','2023-05-30 16:19:33','develop','a19ea622182c63ddc19bb22cde982b82',NULL,'Simpatisan','2023-05-30 16:19:33',NULL,'1',0),('2307240001','','6171015908780006','Indonesia','Juli','Juli','Pontianak','1975-08-13','Perempuan','Kawin',NULL,'','','Juli123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Serdam Permitra Indah Utama 6 B. 34\r\n','004','004','Sei/Sungai Raya','Kuburaya','Kalimantan Barat','78391','','2023-07-24 13:57:01','Juli123','70f5fb779be1312f0b2bcdcf922576c5',NULL,'Simpatisan','2023-07-24 13:57:01',NULL,'1',0),('2307240002','','6171052304730011','Indonesia','AGUS PRASETIYA','AGUS','JEBRES','1973-04-23','Laki-laki','Kawin',NULL,'','','Agus123@gmail.com','','','',NULL,'','','','Wiraswasta','Sketsa Warna','','','','JL. AMPERA KOMP. GRAHA AMPERA PERMAI BLOK A.6\r\n','003/040','Sei Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-07-24 14:07:15','Agus','01c3c766ce47082b1b130daedd347ffd',NULL,'Simpatisan','2023-07-24 14:07:15',NULL,'1',0),('2307240003','','6171035701800010','Indonesia','ROHLIHARNA BR LINGGA','LIHAR','Berastagi','1899-11-30','Perempuan','Kawin',NULL,'','','Lihar123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. TANJUNG HARAPAN\r\n','002/002','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','','','2023-07-24 14:10:46','Lihar','405dae045a17bfa8d33db1fdf8fcf91c',NULL,'Simpatisan','2023-07-24 14:10:46',NULL,'1',0),('2307240004','','6171011902710003','Indonesia','JOHANNES DJUNI','JOHANNES','Jakarta','1971-02-19','Laki-laki','Kawin',NULL,'','','johanes123@gmail.com','','','',NULL,'','S1','','Wiraswasta','','','','','Jl. S. R. Dalam Komp. Villa Gading Raya II No. C-12\r\n','002/007','Bangka Belitung Darat','Pontianak Tenggara','Pontianak','Kalimantan Barat','7814','','2023-07-24 14:54:49','Johannes','2f6df87f74a9f33373c025ce3d93d756',NULL,'Simpatisan','2023-07-24 14:54:49',NULL,'1',0),('2307240005','','6112032303780003','Indonesia','VICTOR IMANUEL','VICTOR','Ambalau','1978-03-23','Laki-laki','Kawin',NULL,'','082155561344','Victor123@gmail.com','','','',NULL,'','S2','','','','','','','Dusun Danau Teluk\r\n','014/000','Cempedak','Tayan Hilir','','Kalimantan Barat','78564','','2023-07-24 14:58:56','Victor','17a821dfa961c93a6c586ca257750fb2',NULL,'Simpatisan','2023-07-24 14:58:56',NULL,'1',0),('2307240006','','6171014706880013','Indonesia','MASNAH HAYATI SIBUEA','MASNAH','Tarutung','1899-11-01','Perempuan','Belum Kawin',NULL,'','','masnah123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','Jl. Sri. Raya Dalam Gg. Pamili No. 2\r\n','003/008','Bangka Belitung Darat','Pontianak Tenggara','Pontianak','Kalimantan Barat','78124','','2023-07-24 15:07:49','Masnah','705d63b4b7e718b538a669ee66f778af',NULL,'Simpatisan','2023-07-24 15:07:49',NULL,'1',0),('2307240007','','6171066802800001','Indonesia','LIWATY','LIWATY','Pontianak','1980-02-28','Perempuan','Kawin',NULL,'','','liwaty123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.PARIT H.HUSEIN IIKOMP MITRA INDAH UTAMA IV NO B.24\r\n','001/004','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','','','2023-07-24 15:11:35','Liwaty','be145d927fc058451146f2abcda03b19',NULL,'Simpatisan','2023-07-24 15:11:35',NULL,'1',0),('2307250001','','6110022509990004','Indonesia','ABELIO PERENZATAMA','ABEL','NANGA PINOH','1999-09-25','Laki-laki','Belum Kawin',NULL,'','','Abelio123@gmail.com','','','',NULL,'','','','Swasta','','','','','DUSUN BELIAN PERMAI\r\n','000/000','Paal','Nanga Pinoh','Melawi','Kalimantan Barat','78672','','2023-07-25 09:39:34','Abelio','fb9a3c9d0f71797b20c0afce52990ffc',NULL,'Simpatisan','2023-07-25 09:39:34',NULL,'1',0),('2307250002','','6171065212000001','Indonesia','ISABEL','ISABEL','Pontianak','2000-12-12','Perempuan','Belum Kawin',NULL,'','','isabel123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PURNAMA IKOMP GRIYA PURNAMA NO. E 3\r\n','001/008','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-07-25 09:42:31','isabel','97727283c98f0c8aa9600372c1cc0195',NULL,'Simpatisan','2023-07-25 09:42:31',NULL,'1',0),('2307250003','','1871020402020002','Indonesia','ADITYA GIOVANI TASLIM','ADIT','Ngabang','2002-11-15','Laki-laki','Belum Kawin',NULL,'','','aditya123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. SUI RAYA DALAM KOMP. MEGA SERDAM C\r\n','009/007','SUNGAI RAYA DALAM','Sei/Sungai Raya','Pontianak','Kalimantan Barat','','','2023-07-25 09:45:33','aditya','8b019af0a1de935cc5e76d804967d51a',NULL,'Simpatisan','2023-07-25 09:45:33',NULL,'1',0),('2307250004','','6171016108970004','Indonesia','ADRIENE MATHILDE','ADRIENE','Pontianak','1997-08-21','Perempuan','Kawin',NULL,'','','adriene123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl.M.Sohor','000/000','','','Pontianak','Kalimantan Barat','','','2023-07-25 09:48:10','adriene','39bcf8654dd5cfdab66d1b1dedb023a9',NULL,'Simpatisan','2023-07-25 09:48:10',NULL,'1',0),('2307250005','','6171025312750003','Indonesia','AIDA LING','AIDA','Pontianak','1975-12-13','Perempuan','Belum Kawin',NULL,'','','aidaling123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.SWADAYA\r\n','003/007','Tambelan Sampit','Pontianak Timur','Pontianak','Kalimantan Barat','','','2023-07-25 09:51:14','aida','3541f1069d0f2c8f990dade424c187f6',NULL,'Simpatisan','2023-07-25 09:51:14',NULL,'1',0),('2307250006','','6109075502970002','Indonesia','AYU ASARI','AAY','Sp III PADAK','1997-02-18','Perempuan','Belum Kawin',NULL,'','','ayuasari123@gmail.com','','','',NULL,'','','','Swasta','','','','','DUSUN PADAK\r\n','005/000','Padak','belitang','Sintang','Kalimantan Barat','','','2023-07-25 09:54:57','Ayu Asari','fae38bd94701cdf2a9d114425cb40292',NULL,'Simpatisan','2023-07-25 09:54:57',NULL,'1',0),('2307250007','','6171031203790015','Indonesia','DARWIN PARDAMEAN','DARWIN','Sekadau','1979-03-12','Laki-laki','Kawin',NULL,'','','darwin123@gmail.com','','','',NULL,'','S1','','POLRI','','','','','JL. TANJUNG HARAPAN\r\n','002/002','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','','','2023-07-25 09:58:03','Darwin','741ff83b5722f08cf0d10843acc96b76',NULL,'Simpatisan','2023-07-25 09:58:03',NULL,'1',0),('2307250008','','6103102810840003','Indonesia','DANY ARYOKO','DANY','Batang','1984-10-28','Laki-laki','Kawin',NULL,'','','Dany123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','PERUM GRAHA ASRI NO. 06\r\n','005/001','','','','Kalimantan Barat','','','2023-07-25 10:01:47','Dany','4aba99f427fdf063b7073aea4afaf2d9',NULL,'Simpatisan','2023-07-25 10:01:47',NULL,'1',0),('2307250009','','6108045612950001','Indonesia','DELIA F','DELIA','NGARAK','1995-10-16','Perempuan','Belum Kawin',NULL,'','089664358875','Delia123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. ALIANYANG, Gg. HARPAN JAYA\r\n','002/001','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-07-25 10:15:08','Delia','17d493287d0fe15bbdbf77111b4e8d9b',NULL,'Simpatisan','2023-07-25 10:15:08',NULL,'1',0),('2307250010','','6112099200899000','Indonesia','DIDIT ADITYA FRESHA','DIDIT','Pontianak','1999-11-30','Laki-laki','Belum Kawin',NULL,'','089689077098','diditfresha@gmail.com','','','',NULL,'','','','Swasta','','','','','JKOMP. ARI KARYA INDAH IV JALUR I NO.C. 18\r\n','061/017','PAL SEMBILAN','Sei/Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-07-25 10:18:18','didit','40f71b8740022bda03e16db8164c6711',NULL,'Simpatisan','2023-07-25 10:18:18',NULL,'1',0),('2307250011','','1212076904930001','Indonesia','ESTER NETRAYATI MANURUNG','ESTER','LUMBAN JULU','1993-04-29','Perempuan','Kawin',NULL,'','085275454569','ester123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','JL.BUDI UTOMOGG. BERSATU NO 26\r\n','000/000','Jungkat','Siantan','Pontianak','Kalimantan Barat','','','2023-07-25 11:16:18','Ester Netrayati','683c81f323eb9f6d2e8df5b9ca028fa4',NULL,'Simpatisan','2023-07-25 11:16:18',NULL,'1',0),('2307250012','','6112096802980005','Indonesia','ALFIANI AMIN','FIA','BITUNG','1998-08-28','Perempuan','Belum Kawin',NULL,'','082255914567','Alifiamin123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','KOMPLEK SUPM NEGERI PTK.JL. PEMBANGUNAN NIPAH KUN\r\n','001/003','Darat Sekip','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-07-25 11:20:30','alifiamin','af3eaaa4cbe48f84d57cf000ffb45ea3',NULL,'Simpatisan','2023-07-25 11:20:30',NULL,'1',0),('2307250013','','6171014509960009','Indonesia','FIELLA TANDAYU','FIEL','Pontianak','1996-09-05','Perempuan','Belum Kawin',NULL,'','','FIELLA123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA KOMP.PURNAMA AGUNG 7 BLOK K.NO 16\r\n','003/007','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78112','','2023-07-25 11:26:55','Fiela','4cacd4c117a922a9c64a7ad37b120ee6',NULL,'Simpatisan','2023-07-25 11:26:55',NULL,'1',0),('2307250014','','6171030107950055','Indonesia','FRENKLIN','EVO','Darit','1995-07-01','Laki-laki','Belum Kawin',NULL,'','','Frenklin123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PROF M YAMIN GG ORDER BARU NO 8 A\r\n','001/016','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-07-25 11:49:34','Frenklin','b56057f415f530fc89d2685d11e28773',NULL,'Simpatisan','2023-07-25 11:49:34',NULL,'1',0),('2307250015','','6107063001010002','Indonesia','Gabriel Jeremy Oraplean','Gerry','Pontianak','2001-01-30','Laki-laki','Belum Kawin',NULL,'','','Gerry123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','DUSUN SANGGAU KOTA\r\n','006/003','Lembang','Sanggau Ledo','Sanggau','Kalimantan Barat','','','2023-07-25 11:53:33','Gerry','03c79911e20a76d92d1fa6419f5617cc',NULL,'Simpatisan','2023-07-25 11:53:33',NULL,'1',0),('2307250016','','6171011506820005','Indonesia','HARTANTO, SE','HARTANTO','Terentang','1982-06-15','Laki-laki','Kawin',NULL,'','','hartanto123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Purnama Komp. Dinasti Indah A.9\r\n','003/008','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-07-25 11:56:42','Hartanto','c58db9a81858acaa417118121a6e4eed',NULL,'Simpatisan','2023-07-25 11:56:42',NULL,'1',0),('2307250017','','6171032011970016','Indonesia','IMMANUEL BOAS RUMAPEA','IMMANUEL','Pontianak','1997-11-20','Laki-laki','Belum Kawin',NULL,'','085820237419','immanuel123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. YA. M.SABRAN','001/019','Sungai Beliung','Pontianak Kota','Pontianak','Kalimantan Barat','78113','','2023-07-25 14:29:39','Immanuel','033abc614d3adef2afb5b8c8d0c6edb5',NULL,'Simpatisan','2023-07-25 14:29:39',NULL,'1',0),('2307250018','','6171061201930001','Indonesia','IGNATIUS RONI EMPUNGAN L','RONI','Lanjak','1993-01-12','Laki-laki','Kawin',NULL,'','085754868688','roni123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.IMAM BONJOL GG MENDAWAI TENGAH NO 46 B','002/004','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','78123','','2023-07-25 14:38:55','Roni','cb2dd8f2be7d4373d33ea5d441abebd3',NULL,'Simpatisan','2023-07-25 14:38:55',NULL,'1',0),('2307250019','','6108052406930001','Indonesia','MUSIANDI','Moses','Sempatung','1993-06-24','Laki-laki','Belum Kawin',NULL,'','','Musiandi123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Dusun Kuningan\r\n','001/001','Sempatung Lawek','Air Besar','','Kalimantan Barat','','','2023-07-25 14:43:10','Musiandi','cd1dca6084c1835a969204a1f4ccc143',NULL,'Simpatisan','2023-07-25 14:43:10',NULL,'1',0),('2307250020','','6112097105950003','Indonesia','MONA YUNIA TEJANINGSIH','MONA','Pontianak','1995-05-31','Laki-laki','Belum Kawin',NULL,'','','mona123@gmail.com','','','',NULL,'','D3','','Swasta','','','','','KOMP BALI ASRI 11 NO 28\r\n','076/018','Pal Sembilan','Sei/Sungai Kakap','Kubueaya','Kalimantan Barat','78381','','2023-07-25 14:55:22','Mona ','72df8e56a8307e2c308808841fcfb3c3',NULL,'Simpatisan','2023-07-25 14:55:22',NULL,'1',0),('2307250021','','6171011003780001','Indonesia','MARKUS TUHUMURY','MAX','TAWIRI','1978-03-11','Laki-laki','Kawin',NULL,'','','tuhumury123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.AHMAD YANI\r\n','004/025','Benua Melayu Laut','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-25 15:00:15','Tuhumury','d1696816bc1a7afe92f1c8787ac222c3',NULL,'Simpatisan','2023-07-25 15:00:15',NULL,'1',0),('2307250022','','6106120912930001','Indonesia','MARCOS JUNGGA ONE SELUTAN','MARCOS','Kedungkang','1993-12-09','Laki-laki','Belum Kawin',NULL,'','','marcos123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. KP Kedungkang\r\n','000/000','Sepandan','Batang Lupar','Kapuas Hulu','Kalimantan Barat','','','2023-07-25 15:06:43','Marcos','c4c62424df7c11291eab30691047315d',NULL,'Simpatisan','2023-07-25 15:06:43',NULL,'1',0),('2307250023','','6103010611870001','Indonesia','ROBERTO MOSES INDRIA HUTAGAOL','ROBERTO ','Sanggau','1987-11-05','Laki-laki','Janda/ Duda',NULL,'','','Robertomoses123@gmail.com','','','',NULL,'','S1','','POLRI','','','','','jl.anggrek gg villa gading\r\n','008/002','HIlir Kota','Kapuas (Sanggau Kapuas)','Sanggau','Kalimantan Barat','78513','','2023-07-25 15:11:20','Roberto Moses','eef1277974665419df56cb3aab4d894a',NULL,'Simpatisan','2023-07-25 15:11:20',NULL,'1',0),('2307250024','','1203071209870004','Indonesia','Robin Paul Simarangkir','Robin','Sibaganding','1987-09-12','Laki-laki','Kawin',NULL,'','085244496525','robin87paul@yahoo.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','Jl. Prof M. Yamin gg Usaha baru 1 No.32 B\r\n\r\n','002/042',' Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-07-25 15:15:17','Robin','8dd1635ff2b8c931952663d4922956e7',NULL,'Simpatisan','2023-07-25 15:15:17',NULL,'1',0),('2307250025','','6112014606990010','Indonesia','REMILINI MEGATI BUALIM','REMI','Sampit','1999-06-06','Perempuan','Belum Kawin',NULL,'','','Remi123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Komp,CendanaFamily Permai No. B.6\r\n','005/004','Sungai Raya Dalam','Sungai Raya','Pontianak','Kalimantan Barat','','','2023-07-25 15:17:44','Remilini','2b5992655008aea68e63cb62513729ed',NULL,'Simpatisan','2023-07-25 15:17:44',NULL,'1',0),('2307260001','','6171030905840001','Indonesia','YOSHEP ANANTA PURBA','YOSHEP ','Pontianak','1984-05-09','Laki-laki','Kawin',NULL,'','081297706281','yoshep123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','JL.PURNAMA GG.PERINTIS I NO 30\r\n','004/015','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-26 10:05:42','Yoshep','4f47a68fba57ff0377194c0af64efb14',NULL,'Simpatisan','2023-07-26 10:05:42',NULL,'1',0),('2307260002','','6171050311990006','Indonesia','RIDHO ANANTA','RIDHO ','Parindu','1999-11-03','Laki-laki','Belum Kawin',NULL,'','','ridho123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.AMPERA KOMP CENDANA MULYA NO C-5\r\n','001/030','Sei/Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-07-26 10:32:17','Ridho','c006cfc408a40fc9662b89c1eb962af0',NULL,'Simpatisan','2023-07-26 10:32:17',NULL,'1',0),('2307260003','','6171012011750014','Indonesia','SILVESTER WELLY',' WELLY','Pontianak','1975-11-20','Laki-laki','Kawin',NULL,'','','Welly123@gmail.com','','','',NULL,'','D3','','Swasta','','','','','JL. MAHAKAM NO. 4/42\r\n','003/001','Benua Melayu Laut','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-26 10:35:12','Welly','01ebb8a2d26f321a83e08b274f468803',NULL,'Simpatisan','2023-07-26 10:35:12',NULL,'1',0),('2307260004','','6112055410980001','Indonesia','STEFANI','STEFANI','Batu Ampar','1998-10-14','Perempuan','Belum Kawin',NULL,'','','stefani123@gmail.com','','','',NULL,'','','','Swasta','','','','','Batu Ampar\r\n','007/003','Batu Ampar','Batu Ampar','Kuburaya','Kalimantan Barat','','','2023-07-26 10:38:29','Stefani','9f7688d7c991f6b3ec3b8e00912079b5',NULL,'Simpatisan','2023-07-26 10:38:29',NULL,'1',0),('2307260005','','6107041505950001','Indonesia','TIMOTIUS KRISRIA DACHI','TIMO','Bengkayang','1995-05-15','Laki-laki','Kawin',NULL,'','','timodachi123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','SENTAGI LUAR\r\n','003/002','Sebalo','Bengkayang','Bengkayang','Kalimantan Barat','','','2023-07-26 10:41:20','Timo Dachi','04802e93d591c4f26e15677a45d1e024',NULL,'Simpatisan','2023-07-26 10:41:20',NULL,'1',0),('2307260006','','6171014403920007','Indonesia','THERESIA STEFANI TAKARENDEHANG','THERE','Tangerang','1992-03-04','Perempuan','Kawin',NULL,'','','theresia123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PURNAMA GG. PURNAMA BARU\r\n','001/015','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-26 10:45:17','Theresia','c22e8e2b03807b1eabfe6dcd3a7efeb7',NULL,'Simpatisan','2023-07-26 10:45:17',NULL,'1',0),('2307260007','','6171015802030002','Indonesia','TIA MONIKA','TIA','Sungai Raya','2003-02-18','Perempuan','Belum Kawin',NULL,'','','tiamonika123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Purnama 2. Gg. Usaha Bersama 2, No. 18\r\n','001/009','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-26 10:49:38','Tia Monika','0a834d514e44387811619f0b0b0d15e5',NULL,'Simpatisan','2023-07-26 10:49:38',NULL,'1',0),('2307260008','','6103217601940001','Indonesia','VERA CHRISTINA','VERA ','Balai Karangan','1994-01-27','Perempuan','Kawin',NULL,'','','verachristina123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Dusun Semanget Nijau\r\n','004/000','Semangit (Semanget)','Entikong','Entikong','Kalimantan Barat','','','2023-07-26 11:02:03','Vera Christina','79b013932a9a7efa4f9e7ee201b96aa7',NULL,'Simpatisan','2023-07-26 11:02:03',NULL,'1',0),('2307260009','','6112014110980004','Indonesia','VELYN CLARISTHYA SIANIPAR','VELYN','Pontianak','1998-10-01','Perempuan','Belum Kawin',NULL,'','','velyn123@gmail.com','','','',NULL,'','','','Swasta','','','','','KOMP. ANGKASA PERMAI\r\n','000/000','Sei Raya','Sei Raya','Kuburaya','Kalimantan Barat','','','2023-07-26 11:05:09','Velyn','f1952365e5df70ef244fe391c13ebf57',NULL,'Simpatisan','2023-07-26 11:05:09',NULL,'1',0),('2307260010','','6103204201940002','Indonesia','YANCE HOTNIDA CRISTIN TAMPUBOLON','YANCE','Meliau','1994-01-02','Perempuan','Kawin',NULL,'','','yance123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Perdamian, Komp. Damai Sejahtera Blok. D No. 22\r\n','099/017','Pal Sembilan','Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-07-26 11:07:30','Yance','5b8a00b255b6d9faedf71f52f43b8f13',NULL,'Simpatisan','2023-07-26 11:07:30',NULL,'1',0),('2307260011','','6108052903990004','Indonesia','YOAS TIRTA','YOAS','Pontianak','1999-03-24','Laki-laki','Belum Kawin',NULL,'','','yoastirta123@gmail.com','','','',NULL,'','','','Swasta','','','','','DUSUN SEPANGAH\r\n','000/000','Sepangah','','','Kalimantan Barat','','','2023-07-26 11:12:06','Yoas Tirta','a78342311744fbb0c30a48e8975d9b95',NULL,'Simpatisan','2023-07-26 11:12:06',NULL,'1',0),('2307260012','','1218131902000002','Indonesia','YERICHO SIMBOLON','YERICHO','Tanjung Pinang','2000-02-19','Laki-laki','Belum Kawin',NULL,'','','yericho123@gmail.com','','','',NULL,'','','','Swasta','','','','','ASRAMA PANGERAN HIDAYAT BLOK P NO 8\r\n','003/025','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-07-26 11:15:15','Yericho','6b6f0fdb2c19e2e5f7b627ecc42b2f6c',NULL,'Simpatisan','2023-07-26 11:15:15',NULL,'1',0),('2307260013','','6103091502960002','Indonesia','JEFRI YONATHAN','Jefri ','Pusat Damai','1996-02-15','Laki-laki','Kawin',NULL,'','','Jefri123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','KTP: Dusun Tunas Lino Sekarang: Jl Budi Utomo 66 bersatu no 40/41\r\n','008/004','Hibun','Parindu','Sanggau','Kalimantan Barat','','','2023-08-01 10:27:25','Jefri Yonathan','e10adc3949ba59abbe56e057f20f883e',NULL,'Simpatisan','2023-08-01 10:27:25',NULL,'1',0),('2307280001','','6109015910010005','Indonesia','CALISTA VALENCIA','CALISTA','Pontianak','2001-10-19','Perempuan','Belum Kawin',NULL,'','08997754519','calistavalencia@gamil.com','','','',NULL,'','','','Swasta','','','','','JL ANGGREK\r\n','005/002','Sei/Sungai Ringin','Sekadau Hilir','Sekadau','Kalimantan Barat','','','2023-07-28 11:46:58','Calista','1985720aab8d8c88d11b455b1e5a278e',NULL,'Simpatisan','2023-07-28 11:46:58',NULL,'1',0),('2307280002','','6171016005900005','Indonesia','CHARA CAROLINE','CAROL','Minahasa','1990-05-20','Perempuan','Belum Kawin',NULL,'','','characaroline123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Karya BaruKomp. Pondok Pelangi Blok D 2 no. 3\r\n','007/003','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-28 13:50:28','Chara','33a03dd04801f3e8578ebb06f67d1de7',NULL,'Simpatisan','2023-07-28 13:50:28',NULL,'1',0),('2307280003','','6171010909990005','Indonesia','HANSEN WIJAYA','HANSEN ','Pontianak','1999-09-09','Laki-laki','Belum Kawin',NULL,'','','hansenwijaya@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Purnama Gg. PurnamaAgung 7 No. C.18\r\n','001/007','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-28 13:54:07','Hansen Wijaya','06ef03ede5c59f0e4171b65b436a46f9',NULL,'Simpatisan','2023-07-28 13:54:07',NULL,'1',0),('2307280004','','6101132009920002','Indonesia','SURYANTO','TOTOK','Pemangkat','1992-09-20','Laki-laki','Belum Kawin',NULL,'','','suryanto123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Dusun Sepinggan Jirak\r\n','006/002','Sepinggan','Semparuk','Pontianak','Kalimantan Barat','','','2023-07-28 13:57:12','Suryanto','e4b72e0c72e822d1015f28a018571b54',NULL,'Simpatisan','2023-07-28 13:57:12',NULL,'1',0),('2307280005','','3171084911990003','Indonesia','YEMIMA CERIA','YEMIMA','JAKARTA','1999-11-09','Perempuan','Belum Kawin',NULL,'','','yemimaceria@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.SEPAKAT II GG. USAHA KOS 6M 7 B.A NO.A\r\n','014/004','Kramat','Senen','','DKI Jakarta','','','2023-07-28 14:00:41','Yemima Ceria','4c49be5b4b495f7fbb0f9316d57bd033',NULL,'Simpatisan','2023-07-28 14:00:41',NULL,'1',0),('2307280006','',' 617101430504000','Indonesia','RATU ESTER GENDOT AMPOR','RATU ','Pontianak','2004-05-03','Perempuan','Belum Kawin',NULL,'','','Ratu123@gmail.com','','','',NULL,'',NULL,'','Swasta','','','','','JL.M YAMIN A 99\r\n','003/010','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-28 14:05:09','Ratu','06739dbf1e26390447c7f637151a42ca',NULL,'Simpatisan','2023-07-28 14:05:09',NULL,'1',0),('2307280007','','6171011612040002','Indonesia','YAFET SANJAYA','YAFET ','Pontianak','2004-12-16','Laki-laki','Belum Kawin',NULL,'','','yafetsanjaya123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. DR. PROF. M . YAMIN GG. SWAKARYA II\r\n','003/001','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-07-28 14:07:41','Yafet','9764dcf67eac92bd0ac083e84e794a11',NULL,'Simpatisan','2023-07-28 14:07:41',NULL,'1',0),('2308010001','','6112090211940005','Indonesia','LAMPOS LAMBOK ARITONANG','LAMPOS','Pontianak','1994-04-02','Laki-laki','Kawin',NULL,'','089648565494','lamposyosua94@gmail.com','','','',NULL,'','D3','','TNI','','','','','Jl. Komp. Ari Karya Indah 2\r\n','062/015','Pal. Sembilan','Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-08-01 09:59:09','Lampos','4c751de32409fe78af8d639c32d6f855',NULL,'Simpatisan','2023-08-01 09:59:09',NULL,'1',0),('2308010002','','6103101903020002','Indonesia','MARTIN MIKAEL EVAN TAMPUBOLON','EVAN','Pontianak','2002-03-19','Laki-laki','Belum Kawin',NULL,'','089693349594','martintampubolon19@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. APEL GG. APEL VII NO 79\r\n','006/011','Sei/Sungai Jawi Luar','Pontianak Barat','Pontianak','Kalimantan Barat ','','','2023-08-01 10:08:52','Evan Tampubolon','a821cd35ae9e617f483590c4a471df71',NULL,'Simpatisan','2023-08-01 10:08:52',NULL,'1',0),('2308010003','','6105012301970002','Indonesia','SENAN','SENAN','Tanjung Kelansam','1997-01-23','Laki-laki','Kawin',NULL,'','081522800330','christiansenan7@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Dudun Sekayu Jaya\r\n','001/000','Tanjung Kelansam','Sintang','','Kalimantan Barat','','','2023-08-01 10:26:45','Senan','75addb9f4a453e086dc18a5caa6c7666',NULL,'Simpatisan','2023-08-01 10:26:45',NULL,'1',0),('2308010004','','6109046404940006','Indonesia','ALING','ALING','NANGA MAHAP','1994-04-04','Perempuan','Kawin',NULL,'','085252105323','aling123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.NURUL HUDA KOMP. HOKYLAND RESIDENCE NO.D28\r\n','017/003','Desa Kapur','Sungai Raya','Kuburaya','Kalimantan Barat','','','2023-08-01 10:30:30','Aling','a19bb42fae3106c99bbac406efad3015',NULL,'Simpatisan','2023-08-01 10:30:30',NULL,'1',0),('2308010005','','6103081303000003','Indonesia','ADRIANUS ALDI','ALDI','Sanggau','2000-03-03','Laki-laki','Belum Kawin',NULL,'','085751221400','aldi123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.DUSUN MUARA ILAI\r\n','003/003','','','','Kalimantan Barat','','','2023-08-01 11:24:55','Aldi','daf036f7f77e11a342e9520ff8fc256d',NULL,'Simpatisan','2023-08-01 11:24:55',NULL,'1',0),('2308010006','','6171032708870001','Indonesia','ELKANA PUTRA BORNEO PURBA','NEO ','Pontianak','1987-08-27','Laki-laki','Kawin',NULL,'','089656038474','purbaelkana@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.PURNAMA GG.PERINTIS IV\r\n','001/008','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78116','','2023-08-01 11:37:42','Elkana Borneo','863da235dfdc454d9a01a0c2ff48e8cc',NULL,'Simpatisan','2023-08-01 11:37:42',NULL,'1',0),('2308010007','','6171062103910001','Indonesia','STEFANUS DANIEL',' DANIEL','Pontianak','1991-03-21','Laki-laki','Kawin',NULL,'','','stefanusdaniel123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PARIT H. HUSIN KOMP. BALI MAS 1 A-19\r\n','002/002','Bangka Belitung Darat','Pontianak Tenggara','Pontianak','Kalimantan Barat','78124','','2023-08-01 11:41:28','Stefanus Daniel','b5ea8985533defbf1d08d5ed2ac8fe9b',NULL,'Simpatisan','2023-08-01 11:41:28',NULL,'1',0),('2308030001','','6171022102840003','Indonesia','FERY PRIMANA ZEBUA','FERY ','Parindu','1984-02-21','Laki-laki','Kawin',NULL,'','','ferry123@gmail.com','','','',NULL,'','D3','','Swasta','','','','','Jl. Tj. raya II Komp. Cendana Permai B.34\r\n','006/003','Saigon','Pontianak Timur','Pontianak','Kalimantan Barat','','','2023-08-03 11:30:12','Fery','d0256bd76c9e1fe1c7f606009fdbf5ff',NULL,'Simpatisan','2023-08-03 11:30:12',NULL,'1',0),('2308030002','','6105031206900004','Indonesia','RIYO YONATHAN','RIYO ','MANIS RAYA','1990-06-12','Laki-laki','Kawin',NULL,'','085252105323','riyoyonathan@gmail.com','','','',NULL,'','D3','','Swasta','','','','','JL.NURUL HUDA KOMP. HOKYLAND RESIDENCE NO.D28\r\n','017/003','Desa Kapur','Sungai Raya','Kuburaya','Kalimantan Barat','','','2023-08-03 11:38:45','Riyo Yonathan','0b51184b8c49b928d8a1aef0ac9b9482',NULL,'Simpatisan','2023-08-03 11:38:45',NULL,'1',0),('2308030003','','6103110104930002','Indonesia','INDRA KURNIAWAN','INDRA ','Singkawang','1993-04-01','Laki-laki','Belum Kawin',NULL,'','','indrakurniawan123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','DUSUN LAIS\r\n','009/000','Lalang','tayan hilir','','Kalimantan Barat','','','2023-08-03 11:45:19','Indra Kurniawan','643ae2b352a4917874655aedec5f52e1',NULL,'Simpatisan','2023-08-03 11:45:19',NULL,'1',0),('2308030004','','6171025607960003','Indonesia','RAHEL LIYANTI','RAHEL','JAKARTA','1996-07-16','Laki-laki','Belum Kawin',NULL,'','085245217071','raheliyanti123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. GG . AGATIS NO. 90 PERUM III\r\n','002/004','Tanjung Hulu','Pontianak Timur','Pontianak','Kalimantan Barat','','','2023-08-03 11:48:51','Rahel Liyanti','4294cc67e90ee9f742b02ff4ed1ba30f',NULL,'Simpatisan','2023-08-03 11:48:51',NULL,'1',0),('2308030005','','6112090608020003','Indonesia','RIO OLIVER HALOMOAN SINAGA','RIO ','Pontianak','2002-08-06','Laki-laki','Belum Kawin',NULL,'','089689551662','Rioliver123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.PERINTIS KOMPHANDAYANI PERMAI\r\n','117/007',' PAL SEMBILAN','Sei/Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-08-03 11:52:39','Rioliver','f237aef579ff90dcd9b528115cb25c32',NULL,'Simpatisan','2023-08-03 11:52:39',NULL,'1',0),('2308080001','','6171050307990008','Indonesia','DORISMAN ELSEPRANTO TURNIP','DORIS','Meliau','1999-07-19','Laki-laki','Belum Kawin',NULL,'','','dorisman123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl.ampera komp villa mutiara mas I c.9\r\n','002/031','Sei/Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-08-08 10:33:18','Dorisman','4abfd2d3421928ccee10bcee2de4bfe9',NULL,'Simpatisan','2023-08-08 10:33:18',NULL,'1',0),('2308080002','','6108016010870009','Indonesia','HENDRAWATI ELOKVITRY','ELOK','NANGA BELOH','1987-10-20','Perempuan','Kawin',NULL,'','082352883535','elok123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Perintis Perdamaian Komp. RBK 2. No. E 2Kota baru ujung\r\n','000/000','','','','Kalimantan Barat','','','2023-08-08 10:54:15','Elok','4a427d00f75cda203938355fe1d8216e',NULL,'Simpatisan','2023-08-08 10:54:15',NULL,'1',0),('2308080003','','6171011906940005','Indonesia','MITRA','MITRA','Jakarta Pusat','1994-08-19','Laki-laki','Belum Kawin',NULL,'','0895701953908','Mitra123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.KARYA BARU GG. KARYA BARU 7\r\n','002/003','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-08-08 10:57:20','Mitra','a3fc9b342d9bf58a8a1bd8ec330b2b2c',NULL,'Simpatisan','2023-08-08 10:57:20',NULL,'1',0),('2308080004','','6106011409860002','Indonesia','JOZETHIAN WATTA','THIAN','MANGOLE','1986-09-14','Laki-laki','Kawin',NULL,'','081522805656','Jozethian123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.IMAM BONJOL GG.MENDAWAI TENGAH NO.46B\r\n','002/004','Bansir Laut','Pontianak Tenggara','Pontianak','Kalimantan Barat','78121','','2023-08-08 11:00:41','Jozethian','59aa1630f8072934240643be21983d09',NULL,'Simpatisan','2023-08-08 11:00:41',NULL,'1',0),('2308080005','','6171051909970008','Indonesia','YOSUA HALOMOAN TURNIP','YOSUA ','Meliau','1997-09-19','Laki-laki','Belum Kawin',NULL,'','','yosua123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl.ampera komp villa mutiara mas I c.9\r\n','002/031','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-08-08 11:03:51','Yosua Turnip','944daee1c2f20b4990d1773fdc21e08b',NULL,'Simpatisan','2023-08-08 11:03:51',NULL,'1',0),('2308080006','',' 617101120288000','Indonesia','FREDY','FREDY','Serang','1988-02-12','Laki-laki','Kawin',NULL,'','082111841688','fredy123@gmail.com','','','',NULL,'','','','TNI','','','','','JL. PROF M YAMIN GG.BARU NO 31\r\n','006/013',' Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-08-08 11:07:21','Fredy','9113207c1da37b6891004653f0d01da5',NULL,'Simpatisan','2023-08-08 11:07:21',NULL,'1',0),('2308080007','','6171052704040008','Indonesia','EVAN','EVAN','Pontianak','2004-04-27','Laki-laki','Belum Kawin',NULL,'','','evan123@gmail.com','','','',NULL,'','','','Swasta','','','','','GG. H SALEH NO 37\r\n','001/021','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-08-08 11:11:30','Evan','a821cd35ae9e617f483590c4a471df71',NULL,'Simpatisan','2023-08-08 11:11:30',NULL,'1',0),('2308080008','','6171062607960001','Indonesia','EPHESIANS GILBERT MANTIRI','GEGE','Pontianak','1995-07-26','Laki-laki','Belum Kawin',NULL,'','','Gege123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Sungai Raya Dala, Komp. Mitra Indah Utama 1 B-9\r\n','002/006','Bangka Belitung Darat','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','','','2023-08-08 11:40:04','Ephesians','7969dd8c54d5a90be43a580b65b53e82',NULL,'Simpatisan','2023-08-08 11:40:04',NULL,'1',0),('2308080009','','6171036004000001','Indonesia','JESSICA APRILIA ASWIN','JESSICA ','Jakarta','2000-04-20','Perempuan','Belum Kawin',NULL,'','','Jessica123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. Karya Sosial,kOMP. Bali Asri II\r\n','075/018','Pal Sembilan','Sungai Kakap','Kubu Raya','Kalimantan Barat','','','2023-08-08 14:08:55','Jessica','84f3ea20769026be4b6512d3e0399832',NULL,'Simpatisan','2023-08-08 14:08:55',NULL,'1',0),('2308080010','',' 610906481299000','Indonesia','Melissa Christy','Melissa ','balai sepuak','1999-12-08','Perempuan','Belum Kawin',NULL,'','','Melissa123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','DUSUN SEPUAK\r\n','005/001','','','','Kalimantan Barat','','','2023-08-08 14:12:52','Melissa','89cb42c1fe0ee96951e44b5e36370e4d',NULL,'Simpatisan','2023-08-08 14:12:52',NULL,'1',0),('2308080011','','6171056811970015','Indonesia','NOVTIA MIHING','NOVTIA ','SEMITAU','1997-11-28','Perempuan','Belum Kawin',NULL,'','085249869280','Novtiamihing123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','GANG KEMUNING JERU II\r\n','003/019','Sei/Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-08-08 14:21:06','Novtia','c6012e655c6008f3d6f265681ee89fc6',NULL,'Simpatisan','2023-08-08 14:21:06',NULL,'1',0),('2308080012','','617105570794004','Indonesia','OLGA M. SIMANGNUNGKALIT','OLGA ','Pontianak','1994-07-17','Perempuan','Kawin',NULL,'','','olga123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. GST. HAMZAH GG.PANCASILA 4 NO. 24-D\r\n','009/010','Sei/Sungai Bangkong','Pontianak Kota','Pontianak','Kalimantan Barat','','','2023-08-08 14:23:53','Olga','68d9faec8177f5a98289c3560086834d',NULL,'Simpatisan','2023-08-08 14:23:53',NULL,'1',0),('2308080013','','6171015506940006','Indonesia','REBECCA SIMANJUNTAK','REBECCA','Pontianak','1994-06-16','Perempuan','Belum Kawin',NULL,'','','rebecca123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. PROF. M YAMIN GG. URAI HAMID NO. 37\r\n','003/013','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-08-08 14:32:27','Rebecca','13852466bb87914ef75d721a117f779d',NULL,'Simpatisan','2023-08-08 14:32:27',NULL,'1',0),('2308080014','','6171045010970015','Indonesia','STEHELLA TRIDEA PANAMUAN','STEHELLA','Pontianak','1997-10-10','Perempuan','Belum Kawin',NULL,'','','stehella123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','jl.selat panjang gg karya bhakti I\r\n','004/020','','Sei/Sungai Raya','Kubu Raya','Kalimantan Barat','','','2023-08-08 14:40:43','Stehella','74a2b8ce30af6c54fb8b799393d5f721',NULL,'Simpatisan','2023-08-08 14:40:43',NULL,'1',0),('2308080015','','6171056906010001','Indonesia','VERONIKA DAVIS','VERO','Subah','2001-06-29','Perempuan','Belum Kawin',NULL,'','','veronika123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PAK KASIH GG. MERAK II\r\n','003/008','','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-08-08 14:43:11','Veronika','2289919f1121d3ef3ede08edbd2e53bb',NULL,'Simpatisan','2023-08-08 14:43:11',NULL,'1',0),('2308080016','','6171055102000007','Indonesia','YEMIMA FLORENCIA','MIMA','Pontianak','2000-02-11','Perempuan','Belum Kawin',NULL,'','','yemimaflorencia123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL.K.H WAHID HASYIM GG.BUKIT SELIDUNG NO.9\r\n','001/001','Sei/Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78118','','2023-08-08 14:46:15','Yemima Florencia','308a29557d589f5e2c9d9b0975ff9c82',NULL,'Simpatisan','2023-08-08 14:46:15',NULL,'1',0),('2308090001','','6101106303020001','Indonesia','Mawar Saron','Mawar','Mugum','2002-03-23','Perempuan','Belum Kawin',NULL,'082153167981','082153167981','mawarsaron123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','KTP: Dusun sondong Sekarang: jl sepakat 2, bansir darat, pontianak tenggara\r\n','010/006','Balai Gemuruh','Subah','Sambas','Kalimantan Barat','79417','','2023-08-09 11:31:01','Mawar','046506f440f66aa99d6a1886e0f16075',NULL,'Simpatisan','2023-08-09 11:31:01',NULL,'1',0),('2308090002','','6171015007050003','Indonesia','THERESIA EFFROSINA','THERE','Pontianak','2005-07-10','Perempuan','Belum Kawin',NULL,'','08996508085','theresia123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Purnama 2, Komp.Purnama Hijau Jalur 1, NO A.1\r\n','001/001','Kota Baru','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-08-09 11:43:19','Theresia','593d75ed6403606e8172bda143ba6663',NULL,'Simpatisan','2023-08-09 11:43:19',NULL,'1',0),('2308090003','','6171045302860013','Indonesia','EVY ROSDIANA PANGARIBUAN','EVY','Pontianak','1986-02-13','Perempuan','Kawin',NULL,'','081352966255','evy123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Purnama Agung VII Komp. Pondok Agung Zira A.9\r\n','005/007','Parit Tokaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-08-09 11:55:45','Evy','28a2024b09cbf8eca7ba4ebfd11da2e8',NULL,'Simpatisan','2023-08-09 11:55:45',NULL,'1',0),('2308090004','','6104184905650001','Indonesia','DERIANA KANDE','DERIANA','POSO','1965-05-09','Perempuan','Janda/ Duda',NULL,'','082112629888','deriana123@gmail.com','','','',NULL,'','','','Wiraswasta','','','','','JL.KRAKATAU NO.180\r\n','004/009','Akcaya','Pontianak Selatan','Pontianak','Kalimantan Barat','78121','','2023-08-09 14:38:23','Deriana','9967fc6e47612fb4d073813e6f170667',NULL,'Simpatisan','2023-08-09 14:38:23',NULL,'1',0),('2308090005','','6171055907770013','Indonesia','Juliana Panjaitan','Juliana ','Sei Pakning','1977-07-19','Perempuan','Belum Kawin',NULL,'','08973925219','juliana123@gmail.com','','','',NULL,'','S1','','Pegawai Negeri','','','','','jl prof m yamin gg guna karya no 9A\r\n','003/011','Sei/Sungai Jawi','Pontianak Kota','Pontianak Kota','Kalimantan Barat','','','2023-08-09 14:42:59','Juliana','aa7b051bf4ce858304b6b83cbad844e3',NULL,'Simpatisan','2023-08-09 14:42:59',NULL,'1',0),('2308090006','','6112011111740004','Indonesia','CIAP PIN','APIN','Pontianak','1974-11-11','Laki-laki','Kawin','B','','','Ciappin123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Adisucipto, Gg. Melati Putih No.89\r\n','001/001','Parit Baru','Sei Raya','Kuburaya','Kalimantan Barat','','','2023-08-09 14:57:22','Ciap Pin','f9fa7d940601a480b306e371d014a998',NULL,'Simpatisan','2023-08-09 14:57:22',NULL,'1',0),('2308090007','','6171016704800008','Indonesia','HELENA HETI','HELENA ','SEBUDUH','1980-04-27','Perempuan','Kawin',NULL,'','','Helena123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. S . PARMAN NO 32\r\n','003/030','Benua Melayu Darat','Pontianak Selatan','Pontianak','Kalimantan Barat','','','2023-08-09 15:00:31','Helena','0c53049255ff4f529a795aeffebca3d8',NULL,'Simpatisan','2023-08-09 15:00:31',NULL,'1',0),('2308090008','','6171010211810012','Indonesia','HERIYANTO','HERIYANTO','Pontianak','1981-11-02','Laki-laki','Kawin',NULL,'','','Herianto123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. S . PARMAN NO 32\r\n','003/030','Benua Melayu Darat','Pontianak Selatan','Pontianak','Kalimantan Barat','78122','','2023-08-09 15:03:32','Herianto','b3a2afc71ba513683b114d073f0a27f4',NULL,'Simpatisan','2023-08-09 15:03:32',NULL,'1',0),('2308090009','','3173074908790006','Indonesia','SANTI YULIANA','SANTI','JAKARTA','1979-06-09','Perempuan','Kawin',NULL,'','','santiyuliana123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. AYANI. NO 25 G\r\n','004/025','Benua Melayu Darat','Pontianak Selatan','Pontianak','Kalimantan Barat','78122','','2023-08-09 15:07:11','Santi Yuliana','f501a8928398ff5210fd486a248e1a52',NULL,'Simpatisan','2023-08-09 15:07:11',NULL,'1',0),('2308090010','','6171050503750009','Indonesia','TRI WIDARYANTO','TRI ','Pontianak','1975-03-05','Laki-laki','Kawin',NULL,'','','triwidaryono123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL.AMPERA KOMP. ZAL KHATULISTIWA NO. C-3\r\n','001/029','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-08-09 15:10:20','Tri','b85593ca6abda3f203e0af8239beb228',NULL,'Simpatisan','2023-08-09 15:10:20',NULL,'1',0),('2308090011','','6110807230575000','Indonesia','Yopi','Yopi','SEBATIH','1975-05-23','Laki-laki','Kawin',NULL,'','','yopi123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','JL. AYANI. NO 25 G\r\n','004/025','Benua Melayu Darat','Pontianak Selatan','Kota Pontianak','Kalimantan Barat','','','2023-08-09 15:13:18','Yopi123','cd34605d889d324e6f18c7752b7ecc34',NULL,'Simpatisan','2023-08-09 15:13:18',NULL,'1',0),('2308110001','','617156808780008','Indonesia','AGNES AJEM','AGNES ','ENGKOLAI','1978-08-28','Perempuan','Kawin',NULL,'0561-746781','','agnesajem123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. AMPERA KOMP. GRAHA AMPERA PERMAI BLOK A.6\r\n','003/040','Sei/Sungai Jawi','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78118','','2023-08-11 14:47:21','Agnes Ajem','7067821a488137b801cd31ee38fcce05',NULL,'Simpatisan','2023-08-11 14:47:21',NULL,'1',0),('2308110002','','6171052806800012','Indonesia','EKO NUGROHO','EKO','Pontianak','1980-05-28','Laki-laki','Kawin',NULL,'','081352422890','ekonugroho@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. M. Yamin Gg. Morodadi\r\n','003/041','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-08-11 15:24:35','Eko Nugroho','8e1a070e9b0340da2b0ea4f193c172f0',NULL,'Simpatisan','2023-08-11 15:24:35',NULL,'1',0),('2308110003','','6171035910710001','Indonesia','EMILIA ERMINA DEWI','EMIL','OLAK OLAK KUBU','1971-10-19','Perempuan','Kawin',NULL,'','','emilia123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. HRA. RAHMAN GG. IKBAR NO 58\r\n','001/021','Sei/Sungai Jawi Dalam','Pontianak Barat','Kota Pontianak','Kalimantan Barat','78115','','2023-08-11 15:28:24','Emillia','93856a9dc9d8424ba04ff110d9726ba1',NULL,'Simpatisan','2023-08-11 15:28:24',NULL,'1',0),('2308110004','','6171032708750001','Indonesia','FUK SEN ANDI','FUK SEN','SEI PINYUH','1971-07-28','Laki-laki','Kawin',NULL,'','','fuksen123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. K.Y SUDARSO GG. NYIUR 2 NO 4\r\n','003/001','Sei/Sungai Jawi Luar','Pontianak Barat','Pontianak','Kalimantan Barat','78116','','2023-08-11 15:31:49','Fuksen Andy','96b71dcccc0d1aa5ce29d59349427928',NULL,'Simpatisan','2023-08-11 15:31:49',NULL,'1',0),('2308110005','','6107172811880002','Indonesia','MARJETO','MARJETO','DAWAR','1988-11-28','Laki-laki','Kawin',NULL,'','085750903678','marjeto123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Dusun Dawar\r\n','001/001','','','','Kalimantan Barat','','','2023-08-11 15:34:19','Marjeto','aa66f33d75ac4c52e7f0577a81ddb03f',NULL,'Simpatisan','2023-08-11 15:34:19',NULL,'1',0),('2308110006','','6112094101690003','Indonesia','MARSELINA','MARSELINA','RABANG','1969-10-08','Perempuan','Kawin',NULL,'','081345348321','marselina123@gmail.com','','','',NULL,'','','','Swasta','','','','','KOMP BALI ASRI 11 NO 28\r\n','076/018','PAL SEMBILAN','Sei/Sungai Kakap','Kuburaya','Kalimantan Barat','','','2023-08-11 15:37:38','Marselina','af0359f5491b84ff6924ed4bf267fba6',NULL,'Simpatisan','2023-08-11 15:37:38',NULL,'1',0),('2308110007','','6171064307800017','Indonesia','MELANI WULAN PUTRI','MELANI','Yogyakarta','1980-07-03','Perempuan','Kawin',NULL,'','','melaniwulan123@gmail.com','','','',NULL,'','S1','','Swasta','','','','','Jl. M. Yamin Gg. Morodadi\r\n','003/041','Sei Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','78116','','2023-08-11 15:40:44','Melani Wulan','9dc00949ec4f62748973cea3c4ad3d40',NULL,'Simpatisan','2023-08-11 15:40:44',NULL,'1',0),('2308110008','','6171051605910008','Indonesia','NORMAN','NORMAN','Pontianak','1991-05-16','Laki-laki','Belum Kawin',NULL,'','','norman123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. PROF M YAMIN NO 18\r\n','001/004','Sei/Sungai Bangkong','Pontianak Kota','Kota Pontianak','Kalimantan Barat','','','2023-08-11 15:45:59','Norman','5f3cd85febeeefd6c03b6042c19c24bf',NULL,'Simpatisan','2023-08-11 15:45:59',NULL,'1',0),('2308110009','','3518136408810002','Indonesia','SULASTRI','SULASTRI','Nganjuk','1961-08-23','Perempuan','Kawin',NULL,'','','rebecasulastri123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. K.Y SUDARSO GG. NYIUR 2 NO 4\r\n','003/001','Sei/Sungai Jawi Luar','Pontianak Barat','Kota Pontianak','Kalimantan Barat','','','2023-08-11 15:49:23','Rebeca','d511d8afea48463a2020ae10ea169db6',NULL,'Simpatisan','2023-08-11 15:49:23',NULL,'1',0),('2308110010','','6171030502830014','Indonesia','SURIONO','SURIONO','Pontianak','1983-02-05','Laki-laki','Belum Kawin',NULL,'','082157186228','suriono123@gmail.com','','','',NULL,'','','','Swasta','','','','','JL. RE, MARTADINATA KOMP. RUKO BLOCK C-8\r\n','001/016','Sei/Sungai Jawi Luar','Pontianak Barat','Kota Pontianak','Kalimantan Barat','78113','','2023-08-11 15:52:19','Suriono','453080bafc1dc5daacbc28568d0e648d',NULL,'Simpatisan','2023-08-11 15:52:19',NULL,'1',0),('2308110011','','6171015212820028','Indonesia','RAHEL RAHAYU','RAHEL','Blitar','1982-12-12','Perempuan','Janda/ Duda',NULL,'','','rahelrahayu123@gmail.com','','','',NULL,'','','','Swasta','','','','','Jl. Imam Bonjol Gg. Tanjung Harapan no. 42\r\n','001/002','Bansir Laut','Pontianak Tenggara','Kota Pontianak','Kalimantan Barat','','','2023-08-11 15:55:00','Rahel Rahayu','4294cc67e90ee9f742b02ff4ed1ba30f',NULL,'Simpatisan','2023-08-11 15:55:00',NULL,'1',0),('2308190001',NULL,NULL,NULL,'Rivan Stevanus Tampi',NULL,'Tumpaan','1983-09-30','',NULL,NULL,NULL,'Rivan Stevanus T','rivantampi@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Jl. Sungai Raya Dalam Komp. Puri Akcaya 2 D.12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'f385ae958257e19ba5eca887b765bc65',NULL,'Umum','2023-08-19 14:51:28',NULL,'1',0),('2308260001',NULL,NULL,NULL,'toni',NULL,'medan','2023-08-26','',NULL,NULL,NULL,'toni','tonibackupfile@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'a19ea622182c63ddc19bb22cde982b82',NULL,'Umum','2023-08-26 10:59:30',NULL,'1',0),('2308260002',NULL,NULL,NULL,'toni',NULL,'Medan','2023-08-26','',NULL,NULL,NULL,'toni','backupta2019@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'eeca7ac1309cf2e02a310adae87e4127',NULL,'Umum','2023-08-26 11:23:46',NULL,'1',0),('2308260003',NULL,NULL,NULL,'toni',NULL,'Medan','2023-08-26','',NULL,NULL,NULL,'toni','masterbotanicalptk@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'eeca7ac1309cf2e02a310adae87e4127',NULL,'Umum','2023-08-26 11:25:52',NULL,'1',0),('2308260004',NULL,NULL,NULL,'toni',NULL,'Meda','2023-08-26','',NULL,NULL,NULL,'toni','rsudsoedarso@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'-',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'eeca7ac1309cf2e02a310adae87e4127',NULL,'Umum','2023-08-26 11:33:33',NULL,'1',1),('2308270001',NULL,NULL,NULL,'Shane Darren Gevariel Tampi',NULL,'Pontianak','2013-08-17','',NULL,NULL,NULL,'Shane Darren Gev','shanedarren77@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Jl. Sungai Raya Dalam Komp. Puri Akcaya Blok D 12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ff28b95457036a0fcff8664f7c0d240f',NULL,'Umum','2023-08-27 08:49:01',NULL,'1',0);

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

/*Data for the table `jemaatfamily` */

insert  into `jemaatfamily`(`idjemaatfamily`,`nokaj`,`idjemaat`,`idhubunganfamily`,`tglinsert`,`tglupdate`) values (2,'00001','2207240001','A01','2023-03-11 13:55:36','2023-03-11 13:55:36'),(3,'00002','2205290001','A01','2023-03-11 13:56:29','2023-03-11 13:56:29'),(5,'00001','2212140010','B01','2023-03-11 14:31:36','2023-03-11 14:31:36'),(6,'00001','2212130004','C01','2023-03-11 14:44:10','2023-03-11 14:44:10'),(7,'00001','2301040005','C01','2023-03-11 14:51:41','2023-03-11 14:51:41'),(8,'00001','2212130003','D01','2023-03-11 15:55:39','2023-03-11 15:55:39'),(9,'00003','2301040003','A01','2023-03-11 15:58:48','2023-03-11 15:58:48'),(11,'00005','2301040002','A01','2023-03-18 12:37:19','2023-03-18 12:37:19'),(13,'00004','2212140002','A01','2023-05-13 10:44:23','2023-05-13 10:44:23'),(17,'00006','2212140011','A01','2023-05-13 11:41:16','2023-05-13 11:41:16'),(19,'00007','2307240001','A01','2023-07-24 13:57:01','2023-07-24 13:57:01'),(20,'00008','2307240002','A01','2023-07-24 14:07:15','2023-07-24 14:07:15'),(21,'00009','2307240003','A01','2023-07-24 14:10:46','2023-07-24 14:10:46'),(22,'00010','2307240004','A01','2023-07-24 14:54:49','2023-07-24 14:54:49'),(23,'00011','2307240005','A01','2023-07-24 14:58:56','2023-07-24 14:58:56'),(24,'00012','2307240006','A01','2023-07-24 15:07:49','2023-07-24 15:07:49'),(25,'00013','2307240007','A01','2023-07-24 15:11:35','2023-07-24 15:11:35'),(26,'00014','2307250001','A01','2023-07-25 09:39:34','2023-07-25 09:39:34'),(27,'00015','2307250002','A01','2023-07-25 09:42:31','2023-07-25 09:42:31'),(28,'00016','2307250003','A01','2023-07-25 09:45:33','2023-07-25 09:45:33'),(29,'00017','2307250004','A01','2023-07-25 09:48:10','2023-07-25 09:48:10'),(30,'00018','2307250005','A01','2023-07-25 09:51:14','2023-07-25 09:51:14'),(31,'00019','2307250006','A01','2023-07-25 09:54:57','2023-07-25 09:54:57'),(32,'00020','2307250007','A01','2023-07-25 09:58:03','2023-07-25 09:58:03'),(33,'00021','2307250008','A01','2023-07-25 10:01:47','2023-07-25 10:01:47'),(34,'00022','2307250009','A01','2023-07-25 10:15:08','2023-07-25 10:15:08'),(35,'00023','2307250010','A01','2023-07-25 10:18:18','2023-07-25 10:18:18'),(36,'00024','2307250011','A01','2023-07-25 11:16:18','2023-07-25 11:16:18'),(37,'00025','2307250012','A01','2023-07-25 11:20:30','2023-07-25 11:20:30'),(38,'00026','2307250013','A01','2023-07-25 11:26:55','2023-07-25 11:26:55'),(39,'00027','2307250014','A01','2023-07-25 11:49:34','2023-07-25 11:49:34'),(40,'00028','2307250015','A01','2023-07-25 11:53:33','2023-07-25 11:53:33'),(41,'00029','2307250016','A01','2023-07-25 11:56:42','2023-07-25 11:56:42'),(42,'00030','2307250017','A01','2023-07-25 14:29:39','2023-07-25 14:29:39'),(43,'00031','2307250018','A01','2023-07-25 14:38:55','2023-07-25 14:38:55'),(44,'00032','2307250019','A01','2023-07-25 14:43:10','2023-07-25 14:43:10'),(45,'00033','2307250020','A01','2023-07-25 14:55:22','2023-07-25 14:55:22'),(46,'00034','2307250021','A01','2023-07-25 15:00:15','2023-07-25 15:00:15'),(47,'00035','2307250022','A01','2023-07-25 15:06:43','2023-07-25 15:06:43'),(48,'00036','2307250023','A01','2023-07-25 15:11:20','2023-07-25 15:11:20'),(49,'00037','2307250024','A01','2023-07-25 15:15:17','2023-07-25 15:15:17'),(50,'00038','2307250025','A01','2023-07-25 15:17:44','2023-07-25 15:17:44'),(51,'00039','2307260001','A01','2023-07-26 10:05:42','2023-07-26 10:05:42'),(52,'00040','2307260002','A01','2023-07-26 10:32:17','2023-07-26 10:32:17'),(53,'00041','2307260003','A01','2023-07-26 10:35:12','2023-07-26 10:35:12'),(54,'00042','2307260004','A01','2023-07-26 10:38:29','2023-07-26 10:38:29'),(55,'00043','2307260005','A01','2023-07-26 10:41:20','2023-07-26 10:41:20'),(56,'00044','2307260006','A01','2023-07-26 10:45:17','2023-07-26 10:45:17'),(57,'00045','2307260007','A01','2023-07-26 10:49:38','2023-07-26 10:49:38'),(58,'00046','2307260008','A01','2023-07-26 11:02:03','2023-07-26 11:02:03'),(59,'00047','2307260009','A01','2023-07-26 11:05:09','2023-07-26 11:05:09'),(60,'00048','2307260010','A01','2023-07-26 11:07:30','2023-07-26 11:07:30'),(61,'00049','2307260011','A01','2023-07-26 11:12:06','2023-07-26 11:12:06'),(62,'00050','2307260012','A01','2023-07-26 11:15:15','2023-07-26 11:15:15'),(63,'00051','2307260013','A01','2023-07-26 11:18:03','2023-07-26 11:18:03'),(64,'00052','2307280001','A01','2023-07-28 11:46:58','2023-07-28 11:46:58'),(65,'00053','2307280002','A01','2023-07-28 13:50:28','2023-07-28 13:50:28'),(66,'00054','2307280003','A01','2023-07-28 13:54:07','2023-07-28 13:54:07'),(67,'00055','2307280004','A01','2023-07-28 13:57:12','2023-07-28 13:57:12'),(68,'00056','2307280005','A01','2023-07-28 14:00:41','2023-07-28 14:00:41'),(69,'00057','2307280006','A01','2023-07-28 14:03:40','2023-07-28 14:03:40'),(70,'00058','2307280007','A01','2023-07-28 14:07:41','2023-07-28 14:07:41'),(71,'00059','2308010001','A01','2023-08-01 09:59:09','2023-08-01 09:59:09'),(72,'00060','2308010002','A01','2023-08-01 10:08:52','2023-08-01 10:08:52'),(73,'00061','2308010003','A01','2023-08-01 10:26:45','2023-08-01 10:26:45'),(74,'00062','2308010004','A01','2023-08-01 10:30:30','2023-08-01 10:30:30'),(75,'00063','2308010005','A01','2023-08-01 11:24:55','2023-08-01 11:24:55'),(76,'00064','2308010006','A01','2023-08-01 11:37:42','2023-08-01 11:37:42'),(77,'00065','2308010007','A01','2023-08-01 11:41:28','2023-08-01 11:41:28'),(78,'00066','2308030001','A01','2023-08-03 11:30:12','2023-08-03 11:30:12'),(79,'00067','2308030002','A01','2023-08-03 11:38:45','2023-08-03 11:38:45'),(80,'00068','2308030003','A01','2023-08-03 11:45:19','2023-08-03 11:45:19'),(81,'00069','2308030004','A01','2023-08-03 11:48:51','2023-08-03 11:48:51'),(82,'00070','2308030005','A01','2023-08-03 11:52:39','2023-08-03 11:52:39'),(83,'00071','2301040007','A01','2023-08-04 15:56:49','2023-08-04 15:56:49'),(84,'00072','2308080001','A01','2023-08-08 10:33:18','2023-08-08 10:33:18'),(85,'00073','2308080002','A01','2023-08-08 10:54:15','2023-08-08 10:54:15'),(86,'00074','2308080003','A01','2023-08-08 10:57:20','2023-08-08 10:57:20'),(87,'00075','2308080004','A01','2023-08-08 11:00:41','2023-08-08 11:00:41'),(88,'00076','2308080005','A01','2023-08-08 11:03:51','2023-08-08 11:03:51'),(89,'00077','2308080006','A01','2023-08-08 11:07:21','2023-08-08 11:07:21'),(90,'00078','2308080007','A01','2023-08-08 11:11:30','2023-08-08 11:11:30'),(91,'00079','2308080008','A01','2023-08-08 11:40:04','2023-08-08 11:40:04'),(92,'00080','2308080009','A01','2023-08-08 14:08:55','2023-08-08 14:08:55'),(93,'00081','2308080010','A01','2023-08-08 14:12:52','2023-08-08 14:12:52'),(94,'00082','2308080011','A01','2023-08-08 14:21:06','2023-08-08 14:21:06'),(95,'00083','2308080012','A01','2023-08-08 14:23:53','2023-08-08 14:23:53'),(96,'00084','2308080013','A01','2023-08-08 14:32:27','2023-08-08 14:32:27'),(97,'00085','2308080014','A01','2023-08-08 14:40:43','2023-08-08 14:40:43'),(98,'00086','2308080015','A01','2023-08-08 14:43:11','2023-08-08 14:43:11'),(99,'00087','2308080016','A01','2023-08-08 14:46:15','2023-08-08 14:46:15'),(100,'00088','2308090001','A01','2023-08-09 11:31:01','2023-08-09 11:31:01'),(101,'00089','2308090002','A01','2023-08-09 11:43:19','2023-08-09 11:43:19'),(102,'00090','2308090003','A01','2023-08-09 11:55:45','2023-08-09 11:55:45'),(103,'00091','2308090004','A01','2023-08-09 14:38:23','2023-08-09 14:38:23'),(104,'00092','2308090005','A01','2023-08-09 14:42:59','2023-08-09 14:42:59'),(105,'00093','2308090006','A01','2023-08-09 14:57:22','2023-08-09 14:57:22'),(106,'00094','2308090007','A01','2023-08-09 15:00:31','2023-08-09 15:00:31'),(107,'00095','2308090008','A01','2023-08-09 15:03:32','2023-08-09 15:03:32'),(108,'00096','2308090009','A01','2023-08-09 15:07:11','2023-08-09 15:07:11'),(109,'00097','2308090010','A01','2023-08-09 15:10:20','2023-08-09 15:10:20'),(110,'00098','2308090011','A01','2023-08-09 15:13:18','2023-08-09 15:13:18'),(111,'00099','2308110001','A01','2023-08-11 14:46:49','2023-08-11 14:46:49'),(112,'00100','2308110002','A01','2023-08-11 15:24:35','2023-08-11 15:24:35'),(113,'00101','2308110003','A01','2023-08-11 15:28:24','2023-08-11 15:28:24'),(114,'00102','2308110004','A01','2023-08-11 15:31:49','2023-08-11 15:31:49'),(115,'00103','2308110005','A01','2023-08-11 15:34:19','2023-08-11 15:34:19'),(116,'00104','2308110006','A01','2023-08-11 15:37:38','2023-08-11 15:37:38'),(117,'00105','2308110007','A01','2023-08-11 15:40:44','2023-08-11 15:40:44'),(118,'00106','2308110008','A01','2023-08-11 15:45:59','2023-08-11 15:45:59'),(119,'00107','2308110009','A01','2023-08-11 15:49:23','2023-08-11 15:49:23'),(120,'00108','2308110010','A01','2023-08-11 15:52:19','2023-08-11 15:52:19'),(121,'00109','2308110011','A01','2023-08-11 15:55:00','2023-08-11 15:55:00'),(122,'00110','2205280001','A01','2023-09-08 01:10:21','2023-09-08 01:10:21');

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

/*Data for the table `kelas` */

insert  into `kelas`(`idkelas`,`namakelas`,`statusaktif`,`urlsertifikat`,`kelas_slug`,`deskripsi`) values ('KL001','Membership Class','Aktif',NULL,'membership_class',NULL),('KL002','Foundation Class 1','Aktif',NULL,'foundation_class_1',NULL),('KL003','Foundation Class 2','Aktif',NULL,'foundation_class_2',NULL),('KL004','Foundation Class 3','Aktif',NULL,'foundation_class_3',NULL),('KL005','Grade 1','Aktif','sertifikat_g1.png','grade_1',NULL),('KL006','Grade 2','Aktif',NULL,'grade_2',NULL),('KL007','Grade 3','Aktif',NULL,'grade_3',NULL),('KL008','Folunteer Class','Aktif',NULL,'folunteer_class',NULL),('KL101','Marriage Class','Aktif',NULL,'marriage_class',NULL);

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

/*Table structure for table `otorisasi` */

DROP TABLE IF EXISTS `otorisasi`;

CREATE TABLE `otorisasi` (
  `idotorisasi` char(4) NOT NULL,
  `namaotorisasi` varbinary(50) DEFAULT NULL,
  PRIMARY KEY (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `otorisasi` */

insert  into `otorisasi`(`idotorisasi`,`namaotorisasi`) values ('0000','Administrator'),('0002','Event'),('0003','Admin ESC');

/*Table structure for table `otorisasimenus` */

DROP TABLE IF EXISTS `otorisasimenus`;

CREATE TABLE `otorisasimenus` (
  `idotorisasi` char(4) DEFAULT NULL,
  `idmenu` char(5) DEFAULT NULL,
  KEY `idotorisasi` (`idotorisasi`),
  CONSTRAINT `otorisasimenus_ibfk_1` FOREIGN KEY (`idotorisasi`) REFERENCES `otorisasi` (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `otorisasimenus` */

insert  into `otorisasimenus`(`idotorisasi`,`idmenu`) values ('0003','0002'),('0003','0003'),('0003','0004'),('0003','0005'),('0003','M100'),('0003','M200'),('0003','M300'),('0003','M400'),('0003','M600'),('0003','M502'),('0003','M501'),('0003','P100'),('0003','P200'),('0003','P300'),('0003','N100'),('0003','N200'),('0003','N300'),('0003','N400'),('0003','N500'),('0003','N600'),('0003','N700'),('0003','N800'),('0003','N900'),('0003','C100'),('0002','0002'),('0000','0002'),('0000','0003'),('0000','0004'),('0000','0005'),('0000','M100'),('0000','M200'),('0000','M300'),('0000','M400'),('0000','M501'),('0000','M502'),('0000','M600'),('0000','M700'),('0000','P100'),('0000','P200'),('0000','P300'),('0000','N100'),('0000','N200'),('0000','N300'),('0000','N400'),('0000','N500'),('0000','N600'),('0000','N700'),('0000','N800'),('0000','N900'),('0000','C100');

/*Table structure for table `otorisasiuser` */

DROP TABLE IF EXISTS `otorisasiuser`;

CREATE TABLE `otorisasiuser` (
  `idotorisasi` char(4) DEFAULT NULL,
  `idjemaat` char(10) DEFAULT NULL,
  UNIQUE KEY `idjemaat` (`idjemaat`),
  KEY `idotorisasi` (`idotorisasi`),
  CONSTRAINT `otorisasiuser_ibfk_1` FOREIGN KEY (`idotorisasi`) REFERENCES `otorisasi` (`idotorisasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `otorisasiuser` */

insert  into `otorisasiuser`(`idotorisasi`,`idjemaat`) values ('0003','2305250020'),('0002','2212140011'),('0000','2205280001');

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

insert  into `pageskategori`(`idpageskategori`,`namapageskategori`,`slug`,`deskripsi`,`gambarkategori`,`tglinsert`,`tglupdate`,`idjemaat`) values ('AP001','About','about','Tentang Elshaddai',NULL,'2022-08-20 12:56:32','2023-07-25 09:18:57','2205280001'),('CH001','Care','care','Care',NULL,'2023-01-28 03:02:31','2023-01-28 03:02:31','2205280001'),('JP001','JESUS','jesus','Menceritakan tentang siapa Yesus bagi gereja ',NULL,'2023-01-31 10:36:33','2023-01-31 10:36:33','2205280001'),('NQ001','News Pelayanan','news','Seputar Berita Tentang Kegiatan Pelayanan Elshaddai',NULL,'2022-07-30 16:10:13','2022-07-30 16:14:44','2205280001'),('NS001','NEXT STEP','next-step','-',NULL,'2023-03-25 11:23:34','2023-03-25 11:23:34','2205280001'),('SW001','Sermon','sermon','Khotbah',NULL,'2023-01-28 02:51:05','2023-01-28 02:51:05','2205280001');

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

insert  into `pelayanan`(`idpelayanan`,`namapelayanan`,`statusaktif`) values ('PL001','Worship (Band & Vocal)','Aktif'),('PL002','Visual (Camera, LED, Lyric Operator)','Aktif'),('PL003','Sound (Live)','Aktif'),('PL004','Sound (Broadcast)','Aktif'),('PL005','Stage Lighting','Aktif'),('PL007','Photographer','Aktif'),('PL008','Videographer','Aktif'),('PL009','Dancer','Aktif'),('PL010','Choir','Aktif'),('PL011','Frontline','Aktif'),('PL012','Event Crew','Aktif');

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
  `idjadwalevent` char(10) DEFAULT NULL,
  `statuskonfirmasi` enum('Disetujui','Ditolak','Menunggu') DEFAULT NULL,
  `idpenggunakonfirmasi` char(10) DEFAULT NULL,
  `tglkonfirmasi` datetime DEFAULT NULL,
  `keterangankonfirmasi` text DEFAULT NULL,
  PRIMARY KEY (`idregistrasikelas`),
  KEY `idjemaat` (`idjemaat`),
  KEY `idkelas` (`idkelas`),
  CONSTRAINT `registrasikelas_ibfk_1` FOREIGN KEY (`idjemaat`) REFERENCES `jemaat` (`idjemaat`),
  CONSTRAINT `registrasikelas_ibfk_2` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `registrasikelas` */

insert  into `registrasikelas`(`idregistrasikelas`,`tglregistrasikelas`,`tglsertifikat`,`idjemaat`,`idkelas`,`tanggalinsert`,`tanggalupdate`,`idpengguna`,`nomorsertifikat`,`linkurlsertifikat`,`statuslulus`,`idjadwalevent`,`statuskonfirmasi`,`idpenggunakonfirmasi`,`tglkonfirmasi`,`keterangankonfirmasi`) values ('KL0012302080001',NULL,'2023-02-08','2207240001','KL001','2023-02-08 13:32:05','2023-02-08 13:32:05','2205280001','121212121',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0022302050001',NULL,'2023-02-05','2212140002','KL002','2023-02-05 12:33:30','2023-02-05 12:33:30','2205280001','',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0022302070001',NULL,'2023-02-07','2207240001','KL002','2023-02-07 13:47:54','2023-02-07 13:47:54','2205280001','122121212121',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0032302040001',NULL,'2023-02-03','2207240001','KL003','2023-02-04 13:59:59','2023-02-04 14:02:34','2205280001','81928192819',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0042302070001',NULL,'2023-02-07','2207240001','KL004','2023-02-07 13:48:26','2023-02-07 13:48:26','2205280001','1122334455',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0052302040001',NULL,'2023-02-04','2212140003','KL005','2023-02-04 16:17:22','2023-02-04 16:17:22','2205280001','12345',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0052302040002',NULL,'2023-02-04','2207240001','KL005','2023-02-04 16:21:32','2023-02-04 16:21:32','2205280001','',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0052302050001',NULL,'2023-02-28','2212140009','KL005','2023-02-05 17:16:47','2023-02-05 17:16:47','2205280001','',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0052302070001',NULL,'2023-02-07','2212130005','KL005','2023-02-07 13:47:26','2023-02-07 13:47:26','2205280001','123322123',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0052302080001',NULL,'2023-02-08','2207090001','KL005','2023-02-08 14:16:39','2023-02-08 14:16:39','2205280001','',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0062302070001',NULL,'2023-02-07','2207240001','KL006','2023-02-07 13:48:39','2023-02-07 13:48:39','2205280001','1122233344455',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0072302070001',NULL,'2023-02-07','2207240001','KL007','2023-02-07 13:48:59','2023-02-07 13:48:59','2205280001','11223344332211',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL0082302070001',NULL,'2023-02-07','2207240001','KL008','2023-02-07 13:49:12','2023-02-07 13:49:12','2205280001','1122334444332211',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL1012303040001',NULL,'2023-03-04','2207240001','KL101','2023-03-04 14:43:51','2023-03-04 14:43:51','2205280001','-',NULL,1,NULL,NULL,NULL,NULL,NULL),('KL1012303040002',NULL,'2023-03-04','2212140003','KL101','2023-03-04 15:07:26','2023-03-04 15:07:26','2205280001','-',NULL,1,NULL,NULL,NULL,NULL,NULL);

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
 `tglselesai` datetime 
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
 `namainventaris` varchar(100) 
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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_departement` AS select `departement`.`iddepartement` AS `iddepartement`,`departement`.`idgroup` AS `idgroup`,`departement`.`namadepartement` AS `namadepartement`,`departement`.`namahead` AS `namahead`,`departement`.`fotohead` AS `fotohead`,`departement`.`statusaktif` AS `statusaktif`,`group`.`namagroup` AS `namagroup` from (`departement` join `group` on(`departement`.`idgroup` = `group`.`idgroup`)) */;

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

/*View structure for view v_jadwalevent */

/*!50001 DROP TABLE IF EXISTS `v_jadwalevent` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwalevent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwalevent` AS select `jadwalevent`.`idjadwalevent` AS `idjadwalevent`,`jadwalevent`.`namaevent` AS `namaevent`,`jadwalevent`.`deskripsi` AS `deskripsi`,`jadwalevent`.`idpenanggungjawab` AS `idpenanggungjawab`,`jadwalevent`.`gambarsampul` AS `gambarsampul`,`jadwalevent`.`iddepartement` AS `iddepartement`,`jadwalevent`.`tglinsert` AS `tglinsert`,`jadwalevent`.`tglupdate` AS `tglupdate`,`jadwalevent`.`idpengguna` AS `idpengguna`,`jadwalevent`.`jenisjadwal` AS `jenisjadwal`,`jadwalevent`.`idpengkhotbah` AS `idpengkhotbah`,`jadwalevent`.`streamingurl` AS `streamingurl`,`jadwalevent`.`tema` AS `tema`,`jadwalevent`.`subtema` AS `subtema`,`jadwalevent`.`harusdaftar` AS `harusdaftar`,`jadwalevent`.`jumlahvolunteer` AS `jumlahvolunteer`,`jadwalevent`.`jumlahjemaat` AS `jumlahjemaat`,`jadwalevent`.`onsitestatus` AS `onsitestatus`,`jadwalevent`.`aplikasidigunakan` AS `aplikasidigunakan`,`jadwalevent`.`diumumkankejemaat` AS `diumumkankejemaat`,`jadwalevent`.`tglmulaidiumumkan` AS `tglmulaidiumumkan`,`jadwalevent`.`tglselesaidiumumkan` AS `tglselesaidiumumkan`,`jadwalevent`.`pengumumandisampaikanmelalui` AS `pengumumandisampaikanmelalui`,`jadwalevent`.`konseppengumuman` AS `konseppengumuman`,`jadwalevent`.`detailkonseppengumuman` AS `detailkonseppengumuman`,`jadwalevent`.`tampilkandiwebsite` AS `tampilkandiwebsite`,`jadwalevent`.`halyangdisampaian` AS `halyangdisampaian`,`jadwalevent`.`statuskonfirmasi` AS `statuskonfirmasi`,`jadwalevent`.`idpenggunakonfirmasi` AS `idpenggunakonfirmasi`,`jadwalevent`.`tglkonfirmasi` AS `tglkonfirmasi`,`jadwalevent`.`keterangankonfirmasi` AS `keterangankonfirmasi`,`jadwalevent`.`idkelas` AS `idkelas`,`jemaat`.`namalengkap` AS `namapenanggungjawab`,`jemaat_1`.`namalengkap` AS `namapengkhobah`,`departement`.`namadepartement` AS `namadepartement`,`f_gettglmulaievent`(`jadwalevent`.`idjadwalevent`) AS `tglmulai`,`f_gettglselesaievent`(`jadwalevent`.`idjadwalevent`) AS `tglselesai` from (((`jadwalevent` left join `jemaat` on(`jadwalevent`.`idpenanggungjawab` = `jemaat`.`idjemaat`)) join `departement` on(`jadwalevent`.`iddepartement` = `departement`.`iddepartement`)) left join `jemaat` `jemaat_1` on(`jadwalevent`.`idpengkhotbah` = `jemaat_1`.`idjemaat`)) */;

/*View structure for view v_jadwaleventdetailinventaris */

/*!50001 DROP TABLE IF EXISTS `v_jadwaleventdetailinventaris` */;
/*!50001 DROP VIEW IF EXISTS `v_jadwaleventdetailinventaris` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwaleventdetailinventaris` AS select `jadwaleventdetailinventaris`.`idjadwladetailinventaris` AS `idjadwladetailinventaris`,`jadwaleventdetailinventaris`.`idjadwalevent` AS `idjadwalevent`,`jadwaleventdetailinventaris`.`idinventaris` AS `idinventaris`,`jadwaleventdetailinventaris`.`qty` AS `qty`,`jadwalevent`.`namaevent` AS `namaevent`,`inventarisruangan`.`namainventaris` AS `namainventaris` from ((`jadwaleventdetailinventaris` join `jadwalevent` on(`jadwaleventdetailinventaris`.`idjadwalevent` = `jadwalevent`.`idjadwalevent`)) join `inventarisruangan` on(`jadwaleventdetailinventaris`.`idinventaris` = `inventarisruangan`.`idinventaris`)) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaat` AS select `jemaat`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`kewarganegaraan` AS `kewarganegaraan`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`golongandarah` AS `golongandarah`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`jemaat`.`facebook` AS `facebook`,`jemaat`.`instagram` AS `instagram`,`jemaat`.`namadarurat` AS `namadarurat`,`jemaat`.`hubungan` AS `hubungan`,`jemaat`.`notelpdarurat` AS `notelpdarurat`,`jemaat`.`pendidikanterakhir` AS `pendidikanterakhir`,`jemaat`.`namasekolah` AS `namasekolah`,`jemaat`.`pekerjaan` AS `pekerjaan`,`jemaat`.`namaperusahaan` AS `namaperusahaan`,`jemaat`.`sektorindustri` AS `sektorindustri`,`jemaat`.`alamatkantor` AS `alamatkantor`,`jemaat`.`notelpkantor` AS `notelpkantor`,`jemaat`.`alamatrumah` AS `alamatrumah`,`jemaat`.`rtrw` AS `rtrw`,`jemaat`.`kelurahan` AS `kelurahan`,`jemaat`.`kecamatan` AS `kecamatan`,`jemaat`.`kotakabupaten` AS `kotakabupaten`,`jemaat`.`propinsi` AS `propinsi`,`jemaat`.`kodepos` AS `kodepos`,`jemaat`.`foto` AS `foto`,`jemaat`.`tanggalupdate` AS `tanggalupdate`,`jemaat`.`username` AS `username`,`jemaat`.`password` AS `password`,`jemaat`.`lastlogin` AS `lastlogin`,`jemaat`.`statusjemaat` AS `statusjemaat`,`jemaat`.`tanggalinsert` AS `tanggalinsert`,`jemaat`.`idlokasi` AS `idlokasi`,`jemaat`.`idposisidalamkeluarga` AS `idposisidalamkeluarga`,`v_dcmember`.`namadc` AS `namadc` from (`jemaat` left join `v_dcmember` on(`jemaat`.`idjemaat` = `v_dcmember`.`idjemaat`)) */;

/*View structure for view v_jemaatfamily */

/*!50001 DROP TABLE IF EXISTS `v_jemaatfamily` */;
/*!50001 DROP VIEW IF EXISTS `v_jemaatfamily` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jemaatfamily` AS select `jemaatfamily`.`nokaj` AS `nokaj`,`jemaatfamily`.`idjemaatfamily` AS `idjemaatfamily`,`jemaatfamily`.`idjemaat` AS `idjemaat`,`jemaatfamily`.`tglinsert` AS `tglinsert`,`jemaatfamily`.`idhubunganfamily` AS `idhubunganfamily`,`jemaatfamily`.`tglupdate` AS `tglupdate`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`namapanggilan` AS `namapanggilan`,`jemaat`.`tempatlahir` AS `tempatlahir`,`jemaat`.`tanggallahir` AS `tanggallahir`,`jemaat`.`jeniskelamin` AS `jeniskelamin`,`jemaat`.`statuspernikahan` AS `statuspernikahan`,`jemaat`.`notelp` AS `notelp`,`jemaat`.`nohp` AS `nohp`,`jemaat`.`email` AS `email`,`hubunganfamily`.`namahubungan` AS `namahubungan` from ((`jemaatfamily` join `jemaat` on(`jemaatfamily`.`idjemaat` = `jemaat`.`idjemaat`)) join `hubunganfamily` on(`jemaatfamily`.`idhubunganfamily` = `hubunganfamily`.`idhubunganfamily`)) */;

/*View structure for view v_otorisasiuser */

/*!50001 DROP TABLE IF EXISTS `v_otorisasiuser` */;
/*!50001 DROP VIEW IF EXISTS `v_otorisasiuser` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_otorisasiuser` AS select `otorisasiuser`.`idotorisasi` AS `idotorisasi`,`otorisasi`.`namaotorisasi` AS `namaotorisasi`,`otorisasiuser`.`idjemaat` AS `idjemaat`,`jemaat`.`noaj` AS `noaj`,`jemaat`.`nik` AS `nik`,`jemaat`.`namalengkap` AS `namalengkap`,`jemaat`.`foto` AS `foto` from ((`otorisasiuser` join `otorisasi` on(`otorisasiuser`.`idotorisasi` = `otorisasi`.`idotorisasi`)) left join `jemaat` on(`otorisasiuser`.`idjemaat` = `jemaat`.`idjemaat`)) */;

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
