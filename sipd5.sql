CREATE DATABASE sipd5;
use sipd5;
CREATE TABLE sumber_data(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama_sumber varchar(255) NULL
)ENGINE=INNODB;

INSERT INTO sumber_data VALUES
(3656, 'Badan Perencanaan Pembangunan Penelitian dan Pengembangan Daerah Provinsi Nusa Tenggara Barat'),
(3785, 'Badan Kepegawaian Daerah Provinsi NTB'),
(9447, 'Dinas Lingkungan Hidup dan Kehutanan Provinsi NTB'),
(9450, 'Dinas Kesehatan Provinsi Nusa Tenggara Barat'),
(9451, 'Dinas Perdagangan Provinsi NTB'),
(9452, 'DP3AP2KB Prov NTB'),
(9454, 'Badan Perencanaan Pembangunan Penelitian dan Pengembangan Daerah Provinsi NTB'),
(9455, 'Dinas Perpustakaan dan Kearsipan Provinsi NTB'),
(9456, 'Dinas Perindustrian Provinsi Nusa Tenggara Barat'),
(9457, 'Dinas Peternakan dan Kesehatan Hewan Provinsi NTB'),
(9458, 'Dinas Perumahan dan Permukiman Provinsi NTB'),
(9460, 'Dinas Energi dan Sumber Daya Mineral Provinsi NTB'),
(9461, 'Dinas Koperasi UKM Provinsi NTB'),
(9462, 'Dinas Penanam Modal dan Pelayanan Terpadu Satu Pintu Provinsi NTB'),
(9463, 'Dinas Lingkungan Hidup dan Kehutanan'),
(9466, 'Dinas Komunikasi Informatika, dan Statistik Provinsi NTB'),
(9473, 'DP3AP2KB Prov NTB'),
(9501, 'Dinas Kelautan dan Perikanan Provinsi NTB'),
(9509, 'Dinas Pekerjaan Umum dan Penataan Ruang Provinsi NTB'),
(9584, 'Dinas Pendidikan dan Kebudayaan Provinsi NTB'),
(9586, 'Dinas Dikbud Provinsi NTB'),
(10182, 'Dinas Pemuda dan Olahraga Provinsi NTB'),
(14619, 'Badan Pusat Statistik Provinsi NTB'),
(11834, 'Dinas Ketahanan Pangan'),
(11962, 'PT. PLN (PERSERO) WILAYAH NTB'),
(12096, 'Dinas Sosial Provinsi NTB'),
(12240, 'Dinas Pertanian Dan Perkebunan Prov. NTB'),
(13250, 'SATUAN POLISI PAMONG PRAJA PROV.NTB'),
(13498, 'PT. NNT / KK / IUPK'),
(13606, 'Bandar Udara Sultan Muhammad Kaharuddin'),
(13669, 'Dinas Perhubungan Nusa Tenggara Barat, Bidang Perhubungan Laut dan Udara'),
(13761, 'Kantor Syahbandar Otoritas Pelabuhan Badas'),
(14239, 'Dinas Perhubungan Nusa Tenggara Barat, Bidang Angkutan Darat'),
(14240, 'Dinas Perhubungan Nusa Tenggara Barat, Bidang Pengelolaan Terminal '),
(15150, 'DINAS TENAGA KERJA DAN TRANSMIGRASI PROVINSI NTB'),
(15941, 'BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH PROVINSI NTB');


CREATE TABLE bagian(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama varchar(255) NULL
)ENGINE=INNODB;

INSERT INTO bagian VALUES
(1, 'Data Umum'),
(2,	'Data Urusan Pilihan'),
(3,	'Data Wajib');

CREATE TABLE kategori(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	id_bagian int(11) NOT NULL,
	nama varchar(255) NULL,
	FOREIGN KEY(id_bagian) REFERENCES bagian(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO kategori (`id_bagian`, `nama`) VALUES
(1, 'Umum'),
(2, 'Kelautan dan Perikanan'),
(2, 'Pariwisata'),
(2, 'Pertanian'),
(2, 'Kehutanan'),
(2, 'Energi dan SumberDaya Mineral'),
(2, 'Perdagangan'),
(2, 'Perindustrian'),
(2, 'Transmigrasi');

INSERT INTO kategori (`id_bagian`, `nama`) VALUES
(3, 'Pendidikan'),
(3, 'Kesehatan'),
(3, 'Pekerjaan Umum dan Penataan Ruang'),
(3, 'Perumahan dan Kawasan Permukiman'),
(3, 'Keamanan dan Ketertiban Umum'),
(3, 'Sosial'),
(3, 'Tenaga Kerja'),
(3, 'Pemberdayaan Perempuan dan Perlindungan Anak'),
(3, 'Pangan'),
(3, 'Pertanahan'),
(3, 'Lingkungan Hidup'),
(3, 'Administrasi Kependudukan dan Pencatatan Sipil'),
(3, 'Pemberdayaan Masyarakat Desa'),
(3, 'Pengendalian Penduduk dan Keluarga Berencana'),
(3, 'Perhubungan'),
(3, 'Komunikasi dan Informatika'),
(3, 'Koperasi Usaha Kecil dan Menengah'),
(3, 'Penanaman Modal'),
(3, 'Kepemudaan dan Olahraga'),
(3, 'Kebudayaan'),
(3, 'Perpustakaan'),
(3, 'Kearsipan');

CREATE TABLE kab_kota(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama varchar(255) NOT NULL
)ENGINE=INNODB;
INSERT INTO kab_kota VALUES
(5201, 'KAB. LOMBOK BARAT'),
(5202, 'KAB. LOMBOK TENGAH'),
(5203, 'KAB. LOMBOK TIMUR'),
(5204, 'KAB. SUMBAWA'),
(5205, 'KAB. DOMPU'),
(5206, 'KAB. BIMA'),
(5207, 'KAB. SUMBAWA BARAT'),
(5208, 'KAB. LOMBOK UTARA'),
(5271, 'KOTA MATARAM'),
(5272, 'KOTA BIMA');

CREATE TABLE provinsi(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama varchar(255) NOT NULL
)ENGINE=INNODB;
INSERT INTO provinsi VALUES (52, 'NUSA TENGGARA BARAT');

CREATE TABLE data(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama_data varchar(255) NOT NULL,
	id_kategori int(11) NOT NULL,
	id_prov int(11) NOT NULL,
	id_kab_kota int(11) NULL,
	kec int(11) NULL,
	urusan int(11) NULL,
	id_table int(11) NULL,
	elemen int(11) NULL,
	id_sumber_data int(11) default 0,
	nilai bigint NULL,
	satuan varchar(10) NULL,
	tahun timestamp NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	FOREIGN KEY(id_kategori) REFERENCES kategori(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_prov) REFERENCES provinsi(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_kab_kota) REFERENCES kab_kota(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_sumber_data) REFERENCES sumber_data(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE label(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	nama varchar(255) NOT NULL
)ENGINE=INNODB;

-- 1 data memiliki 1 atau lebih keterangan
CREATE TABLE keterangan(
	id int(11) NOT NULL PRIMARY KEY auto_increment,
	id_data int(11) NOT NULL,
	id_label int(11) NOT NULL,
	FOREIGN KEY(id_data) REFERENCES data(id) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(id_label) REFERENCES label(id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

-- insert data dan keterangan
INSERT INTO `data` (`id`, `nama_data`, `id_kategori`, `id_prov`, `id_kab_kota`, `kec`, `urusan`, `id_table`, `elemen`, `id_sumber_data`, `nilai`, `satuan`, `tahun`, `created_at`, `updated_at`) VALUES 
(1, 'Jumlah Hasil Tangkapan Ikan', 2, '52', NULL, NULL, '25', '237', '652', NULL, '170166.2', NULL, '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL);

INSERT INTO `data` (`id`, `nama_data`, `id_kategori`, `id_prov`, `id_kab_kota`, `kec`, `urusan`, `id_table`, `elemen`, `id_sumber_data`, `nilai`, `satuan`, `tahun`, `created_at`, `updated_at`) VALUES 
(2, 'Nilai Hasil Tangkapan Ikan', 2, '52', NULL, NULL, '25', '237', '653', NULL, '1828887064', NULL, '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(3, 'Jumlah Hasil Tangkapan Lainnya', 2, '52', NULL, NULL, '25', '237', '654', NULL, '0', NULL, '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(4, 'Nilai Hasil Laut Lainnya', 2, '52', NULL, NULL, '25', '237', '655', NULL, '0', NULL, '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(5, 'Jumlah Nelayan', 2, '52', NULL, NULL, '25', '237', '656', NULL, '65690', NULL, '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(6, 'Jukung', 2, '52', NULL, NULL, '25', '238', '3450', NULL, '0', 'Unit', '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(7, 'Perahu', 2, '52', NULL, NULL, '25', '238', '3451', NULL, '0', 'Unit', '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL),
(8, 'Perahu Motor Tempel', 2, '52', NULL, NULL, '25', '238', '1902', NULL, '0', 'Unit', '2019-09-26 00:00:00', '2019-09-26 00:00:00', NULL);

INSERT INTO `label`(`id`, `nama`) VALUES 
(1, 'Perikanan Tangkap Laut'),
(2, 'Kapal Penangkap Ikan'),
(3, 'Kapal Tanpa Motor');

INSERT INTO `keterangan`(`id_data`, `id_label`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2);