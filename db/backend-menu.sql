DELETE FROM backmenus;

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0001', 'Management Front End', NULL, NULL, 'Aktif', 1, 0, 'fas fa-newspaper');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0002', 'Informasi Gereja', '0001', 'infogereja', 'Aktif', 2, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0003', 'Kategori Page/Halaman', '0001', 'pageskategori', 'Aktif', 3, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0004', 'Pages/ Halaman', '0001', 'pages', 'Aktif', 4, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0005', 'Kelola Menu', '0001', 'frontmenus', 'Aktif', 5, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0006', 'Cabang Gereja', '0001', 'cabanggereja', 'Aktif', 6, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('0007', 'Our Service', '0001', 'ourservice', 'Aktif', 7, 1, NULL);
		

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M000', 'Data Master', NULL, NULL, 'Aktif', 20, 0, 'fas fa-server');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M100', 'Jemaat', 'M000', 'jemaat', 'Aktif', 21, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M200', 'Pengkhotbah', 'M000', 'pengkhotbah2', 'Aktif', 22, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M300', 'Group', 'M000', 'group', 'Aktif', 23, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M400', 'Departement', 'M000', 'departement', 'Aktif', 24, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M600', 'Hagah', 'M000', 'hagah', 'Aktif', 28, 1, NULL);	
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M700', 'Otorisasi Sistem', 'M000', 'otorisasi', 'Aktif', 29, 1, NULL);	


INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S000', 'Absen Kehadiran', NULL, NULL, 'Aktif', 40, 0, 'fa fa-clock');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S100', 'Sunday Service', 'S000', 'absen/index/A01', 'Aktif', 41, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S101', 'Easter', 'S000', 'absen/index/A02', 'Aktif', 42, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S102', 'Ascension Day', 'S000', 'absen/index/A03', 'Aktif', 43, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S103', 'Good Friday Service', 'S000', 'absen/index/A04', 'Aktif', 44, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S104', 'Sunday Service', 'S000', 'absen/index/A05', 'Aktif', 45, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S105', 'Esc Women', 'S000', 'absen/index/A06', 'Aktif', 46, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S106', 'Esc Young Adult', 'S000', 'absen/index/A07', 'Aktif', 47, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S107', 'Esc Youth', 'S000', 'absen/index/A08', 'Aktif', 48, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('S108', 'Esc Kids', 'S000', 'absen/index/A09', 'Aktif', 49, 1, NULL);



INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M500', 'Disciples Community', NULL, NULL, 'Aktif', 50, 0, 'fas fa-address-card');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M501', 'List Data DC', 'M500', 'disciplescommunity', 'Aktif', 51, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('M502', 'DC Member', 'M500', 'dcmember', 'Aktif', 52, 1, NULL);


INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('P000', 'Penjadwalan', NULL, NULL, 'Aktif', 100, 0, 'fas fa-calendar-alt');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('P100', 'Kalender', 'P000', 'penjadwalan', 'Aktif', 101, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('P200', 'Pengajuan Jadwal', 'P000', 'pengajuanjadwal', 'Aktif', 102, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('P300', 'Konfirmasi Jadwal', 'P000', 'konfirmasijadwal', 'Aktif', 104, 1, NULL);
	
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N000', 'Next Step', NULL, NULL, 'Aktif', 200, 0, 'fas fa-walking');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N100', 'Konfirmasi Pendaftaran', 'N000', 'konfirmasikelas', 'Aktif', 201, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N200', 'Membership Class', 'N000', 'registrasikelas/index/KL001', 'Aktif', 202, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N300', 'Fondation Class 1', 'N000', 'registrasikelas/index/KL002', 'Aktif', 203, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N400', 'Fondation Class 2', 'N000', 'registrasikelas/index/KL003', 'Aktif', 204, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N500', 'Fondation Class 3', 'N000', 'registrasikelas/index/KL004', 'Aktif', 205, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N600', 'Grade 1', 'N000', 'registrasikelas/index/KL005', 'Aktif', 206, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N700', 'Grade 2', 'N000', 'registrasikelas/index/KL006', 'Aktif', 207, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N800', 'Grade 3', 'N000', 'registrasikelas/index/KL007', 'Aktif', 208, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('N900', 'Folunteer Class', 'N000', 'registrasikelas/index/KL008', 'Aktif', 209, 1, NULL);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C000', 'Care', NULL, NULL, 'Aktif', 300, 0, 'fas fa-people-carry');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C100', 'Marriage Class', 'C000', 'registrasikelas/index/KL101', 'Aktif', 301, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C101', 'Jemaat Baru', 'C000', 'jemaatbaru', 'Aktif', 302, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C102', 'Konseling', 'C000', 'konseling', 'Aktif', 303, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C103', 'Permohonan Doa', 'C000', 'permohonandoa', 'Aktif', 304, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C104', 'Penyerahan Anak', 'C000', 'penyerahananak', 'Aktif', 305, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C105', 'Kunjungan Jemaat', 'C000', 'kunjunganjemaat', 'Aktif', 306, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C106', 'Permohonan Pernikahan', 'C000', 'pernikahan', 'Aktif', 307, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('C107', 'Pelayanan Kematian', 'C000', 'kematian', 'Aktif', 308, 1, NULL);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('T000', 'Akta', NULL, NULL, 'Aktif', 400, 0, 'fas fa-paperclip');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('T100', 'Penyerahan Anak', 'T000', 'aktapenyerahananak', 'Aktif', 401, 1, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('T200', 'Baptisan', 'T000', 'aktabaptisan', 'Aktif', 402, 2, NULL);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('T300', 'Nikah', 'T000', 'aktanikah', 'Aktif', 403, 3, NULL);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('L000', 'Laporan', NULL, NULL, 'Aktif', 900, 0, 'fas fa-print');
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels, fontawesomeicon)
	VALUES('L100', 'Lap Data Jemaat', 'L000', 'lapdatajemaat', 'Aktif', 901, 1, NULL);