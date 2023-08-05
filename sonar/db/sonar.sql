/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.4.27-MariaDB : Database - sonar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sonar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sonar`;

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `namakategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`idkategori`,`namakategori`) values (1,'Bugs'),(2,'Modul Baru'),(3,'Customize'),(5,'Input Dan Koreksi Data'),(7,'Penarikan Laporan');

/*Table structure for table `notifikasi` */

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `idnotifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `tglnotifikasi` datetime DEFAULT NULL,
  `idpenerimanotif` char(5) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tgldilihat` datetime DEFAULT NULL,
  `sudahdilihat` enum('Ya','Tidak') DEFAULT NULL,
  `jenisnotifikasi` enum('Task','Comment') DEFAULT NULL,
  `idtask` char(15) DEFAULT NULL,
  PRIMARY KEY (`idnotifikasi`),
  KEY `idpenerimanotif` (`idpenerimanotif`),
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`idpenerimanotif`) REFERENCES `pengguna` (`idpengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=1481 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notifikasi` */

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `idpengguna` char(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tempatlahir` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `jabatan` enum('Programmer','Operator','Technical Support','Admin') DEFAULT NULL,
  PRIMARY KEY (`idpengguna`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengguna` */

insert  into `pengguna`(`idpengguna`,`nama`,`foto`,`tempatlahir`,`tgllahir`,`jeniskelamin`,`alamat`,`email`,`username`,`password`,`jabatan`) values ('PR001','Toni Simanjuntak','sonar-logo.png','Medan','2021-09-02','Laki-laki','Jl Karya 2','tonibackupfile@gmail.com','toni','aefe34008e63f1eb205dc4c4b8322253','Admin');

/*Table structure for table `proyek` */

DROP TABLE IF EXISTS `proyek`;

CREATE TABLE `proyek` (
  `idproyek` char(5) NOT NULL,
  `namaproyek` varchar(100) DEFAULT NULL,
  `client` varchar(50) DEFAULT NULL,
  `alamatclient` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `idprojectmanager` char(5) DEFAULT NULL,
  PRIMARY KEY (`idproyek`),
  KEY `idprojectmanager` (`idprojectmanager`),
  CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`idprojectmanager`) REFERENCES `pengguna` (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `proyek` */

insert  into `proyek`(`idproyek`,`namaproyek`,`client`,`alamatclient`,`deskripsi`,`idprojectmanager`) values ('-AM01','SERANGKAILAH.COM','-','-','-','PR001'),('-JT01','MASTERBOTANICAL.COM','-','-','-','PR001'),('-OH01','CAFEMEDAN.COM','-','-','-','PR001'),('-UI01','TABMASTERLABORATORIUM.COM','-','-','-','PR001');

/*Table structure for table `proyekdetail` */

DROP TABLE IF EXISTS `proyekdetail`;

CREATE TABLE `proyekdetail` (
  `idproyek` char(5) DEFAULT NULL,
  `idpengguna` char(5) DEFAULT NULL,
  UNIQUE KEY `idpengguna` (`idpengguna`,`idproyek`),
  KEY `idproyek` (`idproyek`),
  CONSTRAINT `proyekdetail_ibfk_1` FOREIGN KEY (`idproyek`) REFERENCES `proyek` (`idproyek`),
  CONSTRAINT `proyekdetail_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `proyekdetail` */

insert  into `proyekdetail`(`idproyek`,`idpengguna`) values ('-AM01','PR001'),('-JT01','PR001'),('-OH01','PR001'),('-UI01','PR001');

/*Table structure for table `proyeklist` */

DROP TABLE IF EXISTS `proyeklist`;

CREATE TABLE `proyeklist` (
  `idproyeklist` char(8) NOT NULL,
  `idproyek` char(5) DEFAULT NULL,
  `namaproyeklist` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idproyeklist`),
  KEY `idproyek` (`idproyek`),
  CONSTRAINT `proyeklist_ibfk_1` FOREIGN KEY (`idproyek`) REFERENCES `proyek` (`idproyek`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `proyeklist` */

insert  into `proyeklist`(`idproyeklist`,`idproyek`,`namaproyeklist`) values ('-AM01001','-AM01','Back End'),('-JT01001','-JT01','Back End'),('-JT01002','-JT01','Front End'),('-OH01001','-OH01','Admin'),('-OH01002','-OH01','Kasir'),('-OH01003','-OH01','Waitress'),('-OH01004','-OH01','Dapur'),('-UI01001','-UI01','Back End'),('-UI01003','-UI01','Front End');

/*Table structure for table `riwayattask` */

DROP TABLE IF EXISTS `riwayattask`;

CREATE TABLE `riwayattask` (
  `idriwayattask` int(11) NOT NULL AUTO_INCREMENT,
  `tglriwayat` datetime DEFAULT NULL,
  `idpengguna` char(5) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idriwayattask`),
  KEY `idpengguna` (`idpengguna`),
  CONSTRAINT `riwayattask_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=2263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `riwayattask` */

insert  into `riwayattask`(`idriwayattask`,`tglriwayat`,`idpengguna`,`deskripsi`,`linkurl`) values (2238,'2023-05-18 01:34:59','PR001','Toni Simanjuntak membuat task baru, judul task <b>Tambahkan Colour Pada Cetakan</b>','task/lihat/WCNZW1QaUDIJY1M6VDMAY1BhDDoMZFU9BjdTaAM3'),(2239,'2023-05-18 01:35:37','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Tambahkan Colour Pada Cetakan</b>','task/lihat/WCMHBVgWVDZfNQJrUTYHZFZnBjBYMFY-U2JUbwM3'),(2240,'2023-05-18 01:39:46','PR001','Toni Simanjuntak membuat task baru, judul task <b>Tambahkan Logo</b>','task/lihat/A3hRUwBOUzFaMFU8VzAJaAc2BDJcNAFpUWBXbAUx'),(2241,'2023-05-18 01:40:34','PR001','Toni Simanjuntak membuat task baru, judul task <b>Buatkan Cetakan Unique Key</b>','task/lihat/BX4CAFAeUzFfNVc-VjEBYlVkAzULY1U9U2JUbwYx'),(2242,'2023-05-18 01:41:07','PR001','Toni Simanjuntak membuat task baru, judul task <b>Tambahkan Slider di Halaman Login</b>','task/lihat/B3xYWgJMAGJaMFA5VjEFZgMyBTNdNVY-Dj8FPgE3'),(2243,'2023-05-18 01:41:41','PR001','Toni Simanjuntak membuat task baru, judul task <b>Buatkan Cetakan Batchnumber</b>','task/lihat/WSJTUVcZA2EOZAJrVTIGZVVkV2EMZFc_BDUFPg4_'),(2244,'2023-05-18 01:42:12','PR001','Toni Simanjuntak membuat task baru, judul task <b>Rapikan Dashboard</b>','task/lihat/A3gAAlUbUTMJYwBpB2AGZVZnATcPZ1w0ATAFPg8_'),(2245,'2023-05-18 01:43:13','PR001','Toni Simanjuntak membuat task baru, judul task <b>Kolom Banyaknya di Buang</b>','task/lihat/BX5RTFUGB2UPZVE4VzAFZgIzDDpbM1E5AjMBOlFl'),(2246,'2023-05-18 01:43:55','PR001','Toni Simanjuntak membuat task baru, judul task <b>Sesuaikan cetakan penggilingan</b>','task/lihat/VC9ZRFUGA2EBa1Q9BmEIa1ZnVmBYMAFpATAAOwI1'),(2247,'2023-05-18 01:44:37','PR001','Toni Simanjuntak membuat task baru, judul task <b>Sesuaiakan logo cetakan bahan keluar dan penggilingan</b>','task/lihat/AnkFGARXUzEJYwJrVzBQM1JjUWcMZAdvBDUFPlNl'),(2248,'2023-05-18 01:45:38','PR001','Toni Simanjuntak membuat task baru, judul task <b>Sesuaikan logo di cetakan produksi</b>','task/lihat/AnlRTFADBGYNZ1M6AmUAY1FgUGZYMFU9BTQCOQ4_'),(2249,'2023-05-18 01:46:03','PR001','Toni Simanjuntak, mengubah status task dari Baru menjadi Sudah Selesai , judul task <b>Tambahkan Colour Pada Cetakan</b>','task/lihat/BX4CAFAeVzUMZlgxWzwAY1FgATcPZ1I6VmcFPlFl'),(2250,'2023-05-18 01:46:28','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Tambahkan Logo</b>','task/lihat/BX4CAFQaUzFfNVgxAGcIaVBhU2UMZAVtADFXbA87'),(2251,'2023-05-18 01:46:36','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Buatkan Cetakan Unique Key</b>','task/lihat/B3xZW1EfBWcAalE4AmVSMVFgATcIYAVtDz4LMFRj'),(2252,'2023-05-18 01:46:45','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Tambahkan Slider di Halaman Login</b>','task/lihat/UyhWVAdJB2UIYlA5VjEFZlhpBDJaMlQ8Dz5TaFJk'),(2253,'2023-05-18 01:46:52','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Buatkan Cetakan Batchnumber</b>','task/lihat/Vi0DAVIcUzFaMFE4VTJUN1ZnDDpfN1E5BzYCOQU0'),(2254,'2023-05-18 01:46:59','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Rapikan Dashboard</b>','task/lihat/AnlXVQBOVzUAalE4Wj0HZFBhDTsJYVI6Dj8DOAAw'),(2255,'2023-05-18 01:47:09','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Kolom Banyaknya di Buang</b>','task/lihat/WSICHwBTAmANZwRtUzQIa1RlU2VYMAJqUmNTaAYy'),(2256,'2023-05-18 01:47:15','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Sesuaikan cetakan penggilingan</b>','task/lihat/VyxXSlMAUzEAagVsAmVVNlFgVGIAaAZuATAHPFJl'),(2257,'2023-05-18 01:47:22','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Sesuaiakan logo cetakan bahan keluar dan penggilingan</b>','task/lihat/USpRTAdUVTcJYwBpUTYCYQIzBjAMZFU9VGVXbFJk'),(2258,'2023-05-18 01:47:29','PR001','Toni Simanjuntak, mengubah PIC dari  menjadi Toni Simanjuntak , judul task <b>Sesuaikan logo di cetakan produksi</b>','task/lihat/WCNQTVMAWTsJYwRtVzADYFZnDTsBaVE5Dj9XbFRl'),(2259,'2023-05-18 01:47:49','PR001','Toni Simanjuntak, mengubah status task dari Baru menjadi Sudah Selesai , judul task <b>Tambahkan Logo</b>','task/lihat/B3wCAAdJBWdfNVM6UzQBYFNiAzVdNVc_ATAAOwM3'),(2260,'2023-05-18 01:48:00','PR001','Toni Simanjuntak, mengubah status task dari Baru menjadi Sudah Selesai , judul task <b>Buatkan Cetakan Unique Key</b>','task/lihat/WSIDAQNNVzVbMVI7AmUAYwU0ATcBaVI6UmMAOwM0'),(2261,'2023-05-18 01:48:08','PR001','Toni Simanjuntak, mengubah status task dari Baru menjadi Sudah Selesai , judul task <b>Tambahkan Slider di Halaman Login</b>','task/lihat/UyhZW1UbVjQLYVkwUTYCYQc2V2FYMFQ8BzYFPlNl'),(2262,'2023-05-18 01:48:19','PR001','Toni Simanjuntak, mengubah status task dari Baru menjadi Sedang Diproses , judul task <b>Buatkan Cetakan Batchnumber</b>','task/lihat/B3xWVABOUzEPZVQ9VTIFZlVkBjAPZwBoDz5WbQIz');

/*Table structure for table `task` */

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `idtask` char(15) NOT NULL,
  `idproyeklist` char(8) DEFAULT NULL,
  `namatask` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `idkategori` int(11) DEFAULT NULL,
  `idpic` char(5) DEFAULT NULL,
  `idpic2` char(5) DEFAULT NULL,
  `prioritas` enum('Rendah','Sedang','Tinggi') DEFAULT NULL,
  `tglmulai` datetime DEFAULT NULL,
  `tglselesai` datetime DEFAULT NULL,
  `tgltargetselesai` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `assignment` char(5) DEFAULT NULL,
  `statustask` enum('Baru','Sedang Diproses','Sudah Selesai') DEFAULT NULL,
  `pembuattask` char(10) DEFAULT NULL,
  `estimasilamapengerjaan` int(3) DEFAULT NULL,
  `tglinsert` datetime DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idtask`),
  KEY `idkategori` (`idkategori`),
  KEY `assignment` (`assignment`),
  KEY `idproyeklist` (`idproyeklist`),
  KEY `idpengguna` (`idpic`),
  CONSTRAINT `task_ibfk_2` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  CONSTRAINT `task_ibfk_6` FOREIGN KEY (`idproyeklist`) REFERENCES `proyeklist` (`idproyeklist`),
  CONSTRAINT `task_ibfk_8` FOREIGN KEY (`idpic`) REFERENCES `pengguna` (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `task` */

insert  into `task`(`idtask`,`idproyeklist`,`namatask`,`deskripsi`,`idkategori`,`idpic`,`idpic2`,`prioritas`,`tglmulai`,`tglselesai`,`tgltargetselesai`,`file`,`assignment`,`statustask`,`pembuattask`,`estimasilamapengerjaan`,`tglinsert`,`tglupdate`) values ('-JT010012305001','-JT01001','Kolom Banyaknya di Buang','<p>di bagian nota/kwitansi pengadaan bahan, kolom banyaknya di buang saja</p>\r\n',3,'PR001','','Sedang',NULL,NULL,'2023-05-21','','PR001','Baru','PR001',3,'2023-05-18 01:43:13',NULL),('-JT010012305002','-JT01001','Sesuaikan cetakan penggilingan','<p>khusus di bagian penggilingan tambah biaya giling (per kg) dan sub total, persen susut</p>\r\n',3,'PR001','','Sedang',NULL,NULL,'2023-05-21','','PR001','Baru','PR001',3,'2023-05-18 01:43:55',NULL),('-JT010012305003','-JT01001','Sesuaiakan logo cetakan bahan keluar dan penggilingan','<p>logo di nota bahan keluar dan penggilingan ganti yang terbaru (sesuai dengan data logo yang diupload)</p>\r\n',3,'PR001','','Sedang',NULL,NULL,'2023-05-21','','PR001','Baru','PR001',3,'2023-05-18 01:44:37',NULL),('-JT010012305004','-JT01001','Sesuaikan logo di cetakan produksi','<p>logo di produksi</p>\r\n',3,'PR001','','Sedang',NULL,NULL,'2023-05-21','','PR001','Baru','PR001',3,'2023-05-18 01:45:38',NULL),('-UI010012305001','-UI01001','Tambahkan Colour Pada Cetakan','<p>di cetakan lab (CoA), tambahkan dibawah output Colour di bawah Sample Matrix (diexcel dan database ada field kita yang menyimpan kolom tersebut)</p>\r\n',3,'PR001','','Sedang','2023-05-18 01:46:03','2023-05-18 01:46:03','2023-05-21','','PR001','Sudah Selesai','PR001',3,'2023-05-18 01:34:59',NULL),('-UI010012305002','-UI01001','Buatkan Cetakan Unique Key','<p>generate unique key bisa di cetak report baik dalam pdf maupun txt</p>\r\n',2,'PR001','','Sedang','2023-05-18 01:48:00','2023-05-18 01:48:00','2023-05-21','','PR001','Sudah Selesai','PR001',3,'2023-05-18 01:40:34',NULL),('-UI010012305003','-UI01001','Tambahkan Slider di Halaman Login','<p>bagian login bisa ganti foto dan ada slider (jumlah foto bebas)</p>\r\n',3,'PR001','','Sedang','2023-05-18 01:48:08','2023-05-18 01:48:08','2023-05-21','','PR001','Sudah Selesai','PR001',3,'2023-05-18 01:41:07',NULL),('-UI010012305004','-UI01001','Buatkan Cetakan Batchnumber','<p>bisa cetak batch number (formatnya QR CODE dan batch number) baik per PO, maupun custom khusus batch (jadi ada 2 fitur cetak batch)<br />\r\n&nbsp;&nbsp; &nbsp;ukuran kertas F4, 1 halaman menampung 22 batch (bisa 3 halaman)</p>\r\n',2,'PR001','','Sedang','2023-05-18 01:48:19',NULL,'2023-05-21','','PR001','Sedang Diproses','PR001',3,'2023-05-18 01:41:41',NULL),('-UI010012305005','-UI01001','Rapikan Dashboard','<p>percantik dashboard</p>\r\n',3,'PR001','','Rendah',NULL,NULL,'2023-05-21','','PR001','Baru','PR001',3,'2023-05-18 01:42:12',NULL),('-UI010032305001','-UI01003','Tambahkan Logo','<p>di halaman cek barcode (front endnya) kasi logo TAB sama setting presisi khusus mobile phone</p>\r\n',3,'PR001','','Sedang','2023-05-18 01:47:49','2023-05-18 01:47:49','2023-05-21','','PR001','Sudah Selesai','PR001',3,'2023-05-18 01:39:46',NULL);

/*Table structure for table `taskkomentar` */

DROP TABLE IF EXISTS `taskkomentar`;

CREATE TABLE `taskkomentar` (
  `idtaskkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `tgltaskkomentar` datetime DEFAULT NULL,
  `idtask` char(15) DEFAULT NULL,
  `idpengguna` char(5) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  PRIMARY KEY (`idtaskkomentar`),
  KEY `idtask` (`idtask`),
  KEY `idpengguna` (`idpengguna`),
  CONSTRAINT `taskkomentar_ibfk_1` FOREIGN KEY (`idtask`) REFERENCES `task` (`idtask`)
) ENGINE=InnoDB AUTO_INCREMENT=1439 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `taskkomentar` */

insert  into `taskkomentar`(`idtaskkomentar`,`tgltaskkomentar`,`idtask`,`idpengguna`,`komentar`) values (1424,'2023-05-18 01:35:37','-UI010012305001','PR001','Baru'),(1425,'2023-05-18 01:46:03','-UI010012305001','PR001','done'),(1426,'2023-05-18 01:46:28','-UI010032305001','PR001','Baru'),(1427,'2023-05-18 01:46:36','-UI010012305002','PR001','baru'),(1428,'2023-05-18 01:46:45','-UI010012305003','PR001','baru'),(1429,'2023-05-18 01:46:52','-UI010012305004','PR001','baru'),(1430,'2023-05-18 01:46:59','-UI010012305005','PR001','baru'),(1431,'2023-05-18 01:47:09','-JT010012305001','PR001','baru'),(1432,'2023-05-18 01:47:15','-JT010012305002','PR001','baru'),(1433,'2023-05-18 01:47:22','-JT010012305003','PR001','baru'),(1434,'2023-05-18 01:47:29','-JT010012305004','PR001','baru'),(1435,'2023-05-18 01:47:49','-UI010032305001','PR001','done'),(1436,'2023-05-18 01:48:00','-UI010012305002','PR001','done'),(1437,'2023-05-18 01:48:08','-UI010012305003','PR001','done'),(1438,'2023-05-18 01:48:19','-UI010012305004','PR001','progress');

/*Table structure for table `v_notifikasi` */

DROP TABLE IF EXISTS `v_notifikasi`;

/*!50001 DROP VIEW IF EXISTS `v_notifikasi` */;
/*!50001 DROP TABLE IF EXISTS `v_notifikasi` */;

/*!50001 CREATE TABLE  `v_notifikasi`(
 `idnotifikasi` int(11) ,
 `tglnotifikasi` datetime ,
 `idpenerimanotif` char(5) ,
 `linkurl` varchar(255) ,
 `deskripsi` varchar(255) ,
 `tgldilihat` datetime ,
 `sudahdilihat` enum('Ya','Tidak') ,
 `jenisnotifikasi` enum('Task','Comment') ,
 `idtask` char(15) ,
 `namatask` varchar(100) 
)*/;

/*Table structure for table `v_pengguna` */

DROP TABLE IF EXISTS `v_pengguna`;

/*!50001 DROP VIEW IF EXISTS `v_pengguna` */;
/*!50001 DROP TABLE IF EXISTS `v_pengguna` */;

/*!50001 CREATE TABLE  `v_pengguna`(
 `idpengguna` char(5) ,
 `nama` varchar(50) ,
 `foto` varchar(255) ,
 `tempatlahir` varchar(50) ,
 `tgllahir` date ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `alamat` varchar(100) ,
 `email` varchar(50) ,
 `username` varchar(25) ,
 `password` varchar(50) ,
 `jabatan` enum('Programmer','Operator','Technical Support','Admin') 
)*/;

/*Table structure for table `v_proyek` */

DROP TABLE IF EXISTS `v_proyek`;

/*!50001 DROP VIEW IF EXISTS `v_proyek` */;
/*!50001 DROP TABLE IF EXISTS `v_proyek` */;

/*!50001 CREATE TABLE  `v_proyek`(
 `idproyek` char(5) ,
 `namaproyek` varchar(100) ,
 `client` varchar(50) ,
 `alamatclient` varchar(50) ,
 `deskripsi` varchar(255) ,
 `idprojectmanager` char(5) ,
 `namaprojectmanager` varchar(50) 
)*/;

/*Table structure for table `v_proyekdetail` */

DROP TABLE IF EXISTS `v_proyekdetail`;

/*!50001 DROP VIEW IF EXISTS `v_proyekdetail` */;
/*!50001 DROP TABLE IF EXISTS `v_proyekdetail` */;

/*!50001 CREATE TABLE  `v_proyekdetail`(
 `idproyek` char(5) ,
 `namaproyek` varchar(100) ,
 `idpengguna` char(5) ,
 `nama` varchar(50) ,
 `foto` varchar(255) ,
 `jeniskelamin` enum('Laki-laki','Perempuan') ,
 `email` varchar(50) 
)*/;

/*Table structure for table `v_proyeklist` */

DROP TABLE IF EXISTS `v_proyeklist`;

/*!50001 DROP VIEW IF EXISTS `v_proyeklist` */;
/*!50001 DROP TABLE IF EXISTS `v_proyeklist` */;

/*!50001 CREATE TABLE  `v_proyeklist`(
 `idproyek` char(5) ,
 `namaproyek` varchar(100) ,
 `idproyeklist` char(8) ,
 `namaproyeklist` varchar(50) 
)*/;

/*Table structure for table `v_task` */

DROP TABLE IF EXISTS `v_task`;

/*!50001 DROP VIEW IF EXISTS `v_task` */;
/*!50001 DROP TABLE IF EXISTS `v_task` */;

/*!50001 CREATE TABLE  `v_task`(
 `idtask` char(15) ,
 `idproyeklist` char(8) ,
 `namatask` varchar(100) ,
 `deskripsi` text ,
 `idkategori` int(11) ,
 `idpic` char(5) ,
 `idpic2` char(5) ,
 `prioritas` enum('Rendah','Sedang','Tinggi') ,
 `tglmulai` datetime ,
 `tglselesai` datetime ,
 `tgltargetselesai` date ,
 `file` varchar(255) ,
 `assignment` char(5) ,
 `statustask` enum('Baru','Sedang Diproses','Sudah Selesai') ,
 `pembuattask` char(10) ,
 `estimasilamapengerjaan` int(3) ,
 `tglinsert` datetime ,
 `tglupdate` datetime ,
 `namaproyeklist` varchar(50) ,
 `namakategori` varchar(50) ,
 `namapic` varchar(50) ,
 `namapic2` varchar(50) ,
 `namaassignment` varchar(50) ,
 `namapembuattask` varchar(50) ,
 `namaproyek` varchar(100) ,
 `idprojectmanager` char(5) ,
 `namaprojectmanager` varchar(50) ,
 `idproyek` char(5) 
)*/;

/*Table structure for table `v_taskkomentar` */

DROP TABLE IF EXISTS `v_taskkomentar`;

/*!50001 DROP VIEW IF EXISTS `v_taskkomentar` */;
/*!50001 DROP TABLE IF EXISTS `v_taskkomentar` */;

/*!50001 CREATE TABLE  `v_taskkomentar`(
 `idtaskkomentar` int(11) ,
 `tgltaskkomentar` datetime ,
 `idtask` char(15) ,
 `idpengguna` char(5) ,
 `komentar` text ,
 `namatask` varchar(100) ,
 `nama` varchar(50) ,
 `foto` varchar(255) 
)*/;

/*View structure for view v_notifikasi */

/*!50001 DROP TABLE IF EXISTS `v_notifikasi` */;
/*!50001 DROP VIEW IF EXISTS `v_notifikasi` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_notifikasi` AS select `notifikasi`.`idnotifikasi` AS `idnotifikasi`,`notifikasi`.`tglnotifikasi` AS `tglnotifikasi`,`notifikasi`.`idpenerimanotif` AS `idpenerimanotif`,`notifikasi`.`linkurl` AS `linkurl`,`notifikasi`.`deskripsi` AS `deskripsi`,`notifikasi`.`tgldilihat` AS `tgldilihat`,`notifikasi`.`sudahdilihat` AS `sudahdilihat`,`notifikasi`.`jenisnotifikasi` AS `jenisnotifikasi`,`notifikasi`.`idtask` AS `idtask`,`task`.`namatask` AS `namatask` from (`notifikasi` join `task` on(`notifikasi`.`idtask` = `task`.`idtask`)) */;

/*View structure for view v_pengguna */

/*!50001 DROP TABLE IF EXISTS `v_pengguna` */;
/*!50001 DROP VIEW IF EXISTS `v_pengguna` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengguna` AS (select `pengguna`.`idpengguna` AS `idpengguna`,`pengguna`.`nama` AS `nama`,`pengguna`.`foto` AS `foto`,`pengguna`.`tempatlahir` AS `tempatlahir`,`pengguna`.`tgllahir` AS `tgllahir`,`pengguna`.`jeniskelamin` AS `jeniskelamin`,`pengguna`.`alamat` AS `alamat`,`pengguna`.`email` AS `email`,`pengguna`.`username` AS `username`,`pengguna`.`password` AS `password`,`pengguna`.`jabatan` AS `jabatan` from `pengguna`) */;

/*View structure for view v_proyek */

/*!50001 DROP TABLE IF EXISTS `v_proyek` */;
/*!50001 DROP VIEW IF EXISTS `v_proyek` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_proyek` AS select `proyek`.`idproyek` AS `idproyek`,`proyek`.`namaproyek` AS `namaproyek`,`proyek`.`client` AS `client`,`proyek`.`alamatclient` AS `alamatclient`,`proyek`.`deskripsi` AS `deskripsi`,`proyek`.`idprojectmanager` AS `idprojectmanager`,`pengguna`.`nama` AS `namaprojectmanager` from (`proyek` join `pengguna` on(`proyek`.`idprojectmanager` = `pengguna`.`idpengguna`)) */;

/*View structure for view v_proyekdetail */

/*!50001 DROP TABLE IF EXISTS `v_proyekdetail` */;
/*!50001 DROP VIEW IF EXISTS `v_proyekdetail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_proyekdetail` AS select `proyek`.`idproyek` AS `idproyek`,`proyek`.`namaproyek` AS `namaproyek`,`proyekdetail`.`idpengguna` AS `idpengguna`,`pengguna`.`nama` AS `nama`,`pengguna`.`foto` AS `foto`,`pengguna`.`jeniskelamin` AS `jeniskelamin`,`pengguna`.`email` AS `email` from ((`proyekdetail` join `proyek` on(`proyekdetail`.`idproyek` = `proyek`.`idproyek`)) join `pengguna` on(`proyekdetail`.`idpengguna` = `pengguna`.`idpengguna`)) */;

/*View structure for view v_proyeklist */

/*!50001 DROP TABLE IF EXISTS `v_proyeklist` */;
/*!50001 DROP VIEW IF EXISTS `v_proyeklist` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_proyeklist` AS select `proyek`.`idproyek` AS `idproyek`,`proyek`.`namaproyek` AS `namaproyek`,`proyeklist`.`idproyeklist` AS `idproyeklist`,`proyeklist`.`namaproyeklist` AS `namaproyeklist` from (`proyeklist` join `proyek` on(`proyeklist`.`idproyek` = `proyek`.`idproyek`)) */;

/*View structure for view v_task */

/*!50001 DROP TABLE IF EXISTS `v_task` */;
/*!50001 DROP VIEW IF EXISTS `v_task` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_task` AS select `task`.`idtask` AS `idtask`,`task`.`idproyeklist` AS `idproyeklist`,`task`.`namatask` AS `namatask`,`task`.`deskripsi` AS `deskripsi`,`task`.`idkategori` AS `idkategori`,`task`.`idpic` AS `idpic`,`task`.`idpic2` AS `idpic2`,`task`.`prioritas` AS `prioritas`,`task`.`tglmulai` AS `tglmulai`,`task`.`tglselesai` AS `tglselesai`,`task`.`tgltargetselesai` AS `tgltargetselesai`,`task`.`file` AS `file`,`task`.`assignment` AS `assignment`,`task`.`statustask` AS `statustask`,`task`.`pembuattask` AS `pembuattask`,`task`.`estimasilamapengerjaan` AS `estimasilamapengerjaan`,`task`.`tglinsert` AS `tglinsert`,`task`.`tglupdate` AS `tglupdate`,`proyeklist`.`namaproyeklist` AS `namaproyeklist`,`kategori`.`namakategori` AS `namakategori`,`pengguna`.`nama` AS `namapic`,`pengguna_4`.`nama` AS `namapic2`,`pengguna_1`.`nama` AS `namaassignment`,`pengguna_2`.`nama` AS `namapembuattask`,`proyek`.`namaproyek` AS `namaproyek`,`proyek`.`idprojectmanager` AS `idprojectmanager`,`pengguna_3`.`nama` AS `namaprojectmanager`,`proyeklist`.`idproyek` AS `idproyek` from ((((((((`task` join `proyeklist` on(`task`.`idproyeklist` = `proyeklist`.`idproyeklist`)) join `kategori` on(`task`.`idkategori` = `kategori`.`idkategori`)) left join `pengguna` on(`task`.`idpic` = `pengguna`.`idpengguna`)) join `pengguna` `pengguna_1` on(`task`.`assignment` = `pengguna_1`.`idpengguna`)) join `pengguna` `pengguna_2` on(`task`.`pembuattask` = `pengguna_2`.`idpengguna`)) join `proyek` on(`proyeklist`.`idproyek` = `proyek`.`idproyek`)) join `pengguna` `pengguna_3` on(`proyek`.`idprojectmanager` = `pengguna_3`.`idpengguna`)) left join `pengguna` `pengguna_4` on(`task`.`idpic2` = `pengguna_4`.`idpengguna`)) */;

/*View structure for view v_taskkomentar */

/*!50001 DROP TABLE IF EXISTS `v_taskkomentar` */;
/*!50001 DROP VIEW IF EXISTS `v_taskkomentar` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_taskkomentar` AS select `taskkomentar`.`idtaskkomentar` AS `idtaskkomentar`,`taskkomentar`.`tgltaskkomentar` AS `tgltaskkomentar`,`taskkomentar`.`idtask` AS `idtask`,`taskkomentar`.`idpengguna` AS `idpengguna`,`taskkomentar`.`komentar` AS `komentar`,`task`.`namatask` AS `namatask`,`pengguna`.`nama` AS `nama`,`pengguna`.`foto` AS `foto` from ((`taskkomentar` join `task` on(`taskkomentar`.`idtask` = `task`.`idtask`)) join `pengguna` on(`taskkomentar`.`idpengguna` = `pengguna`.`idpengguna`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
