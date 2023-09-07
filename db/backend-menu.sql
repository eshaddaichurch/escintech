INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('0001', 'Management Front End', NULL, NULL, 'Aktif', 1, 0);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('0002', 'Informasi Gereja', '0001', 'infogereja', 'Aktif', 2, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('0003', 'Kategori Page/Halaman', '0001', 'pageskategori', 'Aktif', 2, 1);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('0004', 'Pages/ Halaman', '0001', 'pages', 'Aktif', 4, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('0005', 'Kelola Menu', '0001', 'frontmenus', 'Aktif', 5, 1);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M000', 'Data Master', NULL, NULL, 'Aktif', 6, 0);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M100', 'Jemaat', 'M000', 'jemaat', 'Aktif', 7, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M200', 'Pengkhotbah', 'M000', 'pengkhotbah2', 'Aktif', 8, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M300', 'Group', 'M000', 'group', 'Aktif', 9, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M400', 'Departement', 'M000', 'departement', 'Aktif', 10, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M500', 'Disciples Community', 'M000', NULL, 'Aktif', 11, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M501', 'List Data DC', 'M500', 'disciplescommunity', 'Aktif', 12, 2);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M502', 'DC Member', 'M500', 'dcmember', 'Aktif', 13, 2);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M600', 'Hagah', 'M000', 'hagah', 'Aktif', 14, 1);	
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('M700', 'Otorisasi Sistem', 'M000', 'otorisasi', 'Aktif', 15, 1);	

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('P000', 'Penjadwalan', NULL, NULL, 'Aktif', 100, 0);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('P100', 'Kalender', 'P000', 'penjadwalan', 'Aktif', 101, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('P200', 'Pengajuan Jadwal', 'P000', 'pengajuanjadwal', 'Aktif', 102, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('P300', 'Konfirmasi Jadwal', 'P000', 'konfirmasijadwal', 'Aktif', 103, 1);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N000', 'Next Step', NULL, NULL, 'Aktif', 200, 0);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N100', 'Konfirmasi Pendaftaran', 'N000', 'konfirmasikelas', 'Aktif', 201, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N200', 'Membership Class', 'N000', 'index/KL001', 'Aktif', 202, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N300', 'Fondation Class 1', 'N000', 'index/KL002', 'Aktif', 203, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N400', 'Fondation Class 2', 'N000', 'index/KL003', 'Aktif', 204, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N500', 'Fondation Class 3', 'N000', 'index/KL004', 'Aktif', 205, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N600', 'Grade 1', 'N000', 'index/KL005', 'Aktif', 206, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N700', 'Grade 2', 'N000', 'index/KL006', 'Aktif', 207, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N800', 'Grade 3', 'N000', 'index/KL007', 'Aktif', 208, 1);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('N900', 'Folunteer Class', 'N000', 'index/KL008', 'Aktif', 209, 1);

INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('C000', 'Care', NULL, NULL, 'Aktif', 300, 0);
INSERT INTO backmenus (idmenu, namamenu, parentidmenu, linkmenu, statusaktif, nomorurut, nlevels)
	VALUES('C100', 'Marriage Class', 'C000', 'index/KL101', 'Aktif', 301, 1);
