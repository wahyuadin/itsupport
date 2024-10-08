-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2024 at 05:29 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `id_device` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idkategori` int NOT NULL,
  `idmerk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int NOT NULL,
  `kodedivisi` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `kodedivisi`, `divisi`) VALUES
(1, 'TI', 'Teknologi Informasi'),
(2, 'HRD', 'Human Resource'),
(4, 'CMC4', 'Comercial'),
(5, 'CMP5', 'Complain'),
(7, 'SCM', 'Supply Chain'),
(8, 'KEU', 'Keuangan'),
(10, 'SEKPER', 'Sekretaris Perusahaan'),
(12, 'LGC10', 'Logistic');

-- --------------------------------------------------------

--
-- Table structure for table `h_user`
--

CREATE TABLE `h_user` (
  `user_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `h_user`
--

INSERT INTO `h_user` (`user_id`, `username`, `password`, `Role`, `img`, `status`) VALUES
('321342827423847', 'wahyu', '$2y$10$JNI6cH5sROVxtfFPgpU0UeJEO8aQpqSuO0wQHVodd5h3Oa0WPg8YG', 'testing', 'default.jpg', 0),
('7869504321', 'akusuka', '$2y$10$9U3/BfsaRipuxF9Y7Jr.MOCl/hyVkE7PX1oElXmjnYQr3WNAf2OjG', 'Karyawan', 'default.jpg', 0),
('887906812', 'cecep', '$2y$10$Xhj9LSAMdsQ0ulJQG2YHleoN0.voU0YEvVH8EsbUW95ejd2stN6ne', 'Administrator', 'default.jpg', 0),
('K1121203', 'made', 'gemoy', 'Karyawan', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `n_pengguna` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `j_device` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_beli` date NOT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int NOT NULL,
  `namakategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(1, 'Motherboard'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `idkomponen` int NOT NULL,
  `idkategori` int NOT NULL,
  `idmerk` int NOT NULL,
  `tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `spesifikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hdd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`idkomponen`, `idkategori`, `idmerk`, `tipe`, `spesifikasi`, `keterangan`, `hdd`, `ram`, `stats`) VALUES
(1, 1, 1, 'X453MA', 'Intel Celeron', 'Ready', '2tb', '8GB', 'AKTIF'),
(5, 2, 1, 'A1G34', 'i9', 'ready', '1tb', '16GB', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `idmerk` int NOT NULL,
  `namamerk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`idmerk`, `namamerk`) VALUES
(1, 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `idpc` int NOT NULL,
  `idpengguna` int NOT NULL,
  `namapc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usrlogin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ipaddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `internet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `catatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_delete` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_keur_relasi` int NOT NULL,
  `n_pelapor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `j_pelapor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `d_pelapor` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `n_barang` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket_petugas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lapor` timestamp NOT NULL,
  `tgl_proses` timestamp NULL DEFAULT NULL,
  `tgl_selesai` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `id_keur_relasi`, `n_pelapor`, `j_pelapor`, `d_pelapor`, `n_barang`, `ket`, `status`, `ket_petugas`, `tgl_lapor`, `tgl_proses`, `tgl_selesai`) VALUES
('SNMC-0001', 1, 'adin', 'KARYAWAN', 'Comercial', 'Hehe.jpg', 'testing', 'Selesai diproses', '-', '2024-10-08 03:34:32', '2024-10-08 03:35:34', '2024-10-08 03:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idkary` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unitkerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statkary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idkary`, `nama`, `jabatan`, `unitkerja`, `statkary`) VALUES
(15, 'Made', 'KARYAWAN', '1', 'AKTIF'),
(16, 'Asep', 'ASSISTEN MANAGER', '8', 'AKTIF'),
(17, 'Ucep', 'STAFF', '7', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `rakitan`
--

CREATE TABLE `rakitan` (
  `idrakitan` int NOT NULL,
  `idpc` int NOT NULL,
  `idkomponen` int NOT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int NOT NULL,
  `pengaduan_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `pengaduan_id`, `nama`, `deskripsi`) VALUES
(3, 1, 'adin', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `Role`, `img`, `status`) VALUES
('7869504321', 'akusuka', '$2y$10$9U3/BfsaRipuxF9Y7Jr.MOCl/hyVkE7PX1oElXmjnYQr3WNAf2OjG', 'Karyawan', 'default.jpg', 0),
('887906812', 'cecep', '$2y$10$Xhj9LSAMdsQ0ulJQG2YHleoN0.voU0YEvVH8EsbUW95ejd2stN6ne', 'Administrator', '458327661_1401516792_hayu.jpg', 1),
('K1121203', 'made', '$2y$10$YWGlwkkPTCA0UP4TgLNUJuGvFkvWoEbpVNB0IBuipLuNwletkrISW', 'Karyawan', 'default.jpg', 1),
('M0701001', 'admin', '$2y$10$tFkLOG2KPaOL0Wpa5h4U7us1AIMGJnVSsAgR3Kkl0xNu9URjDCfT.', 'Administrator', '506123789_WhatsApp Image 2024-04-23 at 09.42.36_729ff7c3.jpg', 1);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `trg_insert_histori_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	
	INSERT INTO `h_user`
	(
		`user_id`, 
		`username`, 
		`password`, 
		`Role`, 
		`img`, 
		`status`
	)
	VALUES
	(
		NEW.`user_id`, 
		NEW.`username`, 
		NEW.`password`, 
		NEW.`Role`, 
		NEW.`img`, 
		NEW.`status`
	);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_user_activity`
-- (See below for the actual view)
--
CREATE TABLE `vw_user_activity` (
`sedang_diajukan` bigint
,`sedang_diproses` bigint
,`selesai_diproses` bigint
,`total_laporan` bigint
,`jumlah_karyawan` bigint
,`jumlah_hardware` bigint
,`jumlah_software` bigint
,`jumlah_network` bigint
);

-- --------------------------------------------------------

--
-- Structure for view `vw_user_activity`
--
DROP TABLE IF EXISTS `vw_user_activity`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_user_activity`  AS SELECT (select count(`pengaduan`.`id`) from `pengaduan` where (`pengaduan`.`status` = 'Sedang Diajukan')) AS `sedang_diajukan`, (select count(`pengaduan`.`id`) from `pengaduan` where (`pengaduan`.`status` = 'Sedang Diproses')) AS `sedang_diproses`, (select count(`pengaduan`.`id`) from `pengaduan` where (`pengaduan`.`status` = 'Selesai Diproses')) AS `selesai_diproses`, (select count(`pengaduan`.`id`) from `pengaduan`) AS `total_laporan`, (select count(`pengguna`.`idkary`) from `pengguna`) AS `jumlah_karyawan`, (select count(`kategori`.`idkategori`) from `kategori`) AS `jumlah_hardware`, (select count(`merk`.`idmerk`) from `merk`) AS `jumlah_software`, (select count(`komponen`.`idkomponen`) from `komponen`) AS `jumlah_network` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`),
  ADD KEY `kategory` (`idkategori`),
  ADD KEY `merk` (`idmerk`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `h_user`
--
ALTER TABLE `h_user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`) USING BTREE;

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`idkomponen`) USING BTREE,
  ADD KEY `fk_komponen_kategori` (`idkategori`),
  ADD KEY `fk_komponen_merk` (`idmerk`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idmerk`) USING BTREE;

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`idpc`) USING BTREE,
  ADD KEY `fk_pc_pengguna` (`idpengguna`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_keur_relasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idkary`) USING BTREE;

--
-- Indexes for table `rakitan`
--
ALTER TABLE `rakitan`
  ADD PRIMARY KEY (`idrakitan`) USING BTREE,
  ADD KEY `fk_rakitan_pc` (`idpc`),
  ADD KEY `fk_rakitan_komponen` (`idkomponen`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `pengaduan_id` (`pengaduan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `idkomponen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `idmerk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `idpc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_keur_relasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idkary` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rakitan`
--
ALTER TABLE `rakitan`
  MODIFY `idrakitan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `kategory` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`),
  ADD CONSTRAINT `merk` FOREIGN KEY (`idmerk`) REFERENCES `merk` (`idmerk`);

--
-- Constraints for table `komponen`
--
ALTER TABLE `komponen`
  ADD CONSTRAINT `fk_komponen_kategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_komponen_merk` FOREIGN KEY (`idmerk`) REFERENCES `merk` (`idmerk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `fk_pc_pengguna` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idkary`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rakitan`
--
ALTER TABLE `rakitan`
  ADD CONSTRAINT `fk_rakitan_komponen` FOREIGN KEY (`idkomponen`) REFERENCES `komponen` (`idkomponen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rakitan_pc` FOREIGN KEY (`idpc`) REFERENCES `pc` (`idpc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduan` (`id_keur_relasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
