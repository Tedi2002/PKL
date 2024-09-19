-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2024 at 06:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_servicekom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `nama`, `telepon`, `alamat`) VALUES
('1', 'virgy dias prasetya', '0838256458965', 'Ciberung Rt02 Rw 02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cross_auth`
--

CREATE TABLE `tbl_cross_auth` (
  `id` int NOT NULL,
  `user` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `ket` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cross_auth`
--

INSERT INTO `tbl_cross_auth` (`id`, `user`, `waktu`, `ket`) VALUES
(1, 'admin', '2024-09-13 00:20:22', 'Pengguna dengan username admin , nama : admin melakukan cross authority dengan akses  sebagai Admin'),
(2, '', '2024-09-13 00:20:34', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(3, '', '2024-09-13 00:22:19', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(4, '', '2024-09-13 00:22:25', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(5, '', '2024-09-13 00:22:33', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(6, '', '2024-09-13 00:24:35', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(7, '', '2024-09-13 00:25:51', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(8, '', '2024-09-13 00:25:54', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(9, '', '2024-09-13 00:29:00', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(10, '', '2024-09-13 00:29:15', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(11, '', '2024-09-13 00:29:24', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(12, '', '2024-09-13 00:30:42', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(13, '', '2024-09-13 00:30:51', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(14, '', '2024-09-13 00:31:20', 'Pengguna dengan username  , nama :  melakukan cross authority dengan akses  sebagai Super User'),
(15, 'teknisi', '2024-09-13 00:31:59', 'Pengguna dengan username teknisi , nama : tedi melakukan cross authority dengan akses  sebagai Teknisi'),
(16, 'teknisi', '2024-09-13 00:32:09', 'Pengguna dengan username teknisi , nama : tedi melakukan cross authority dengan akses  sebagai Teknisi'),
(17, 'teknisi', '2024-09-13 00:34:50', 'Pengguna dengan username teknisi , nama : tedi melakukan cross authority dengan akses  sebagai Teknisi'),
(18, 'teknisi', '2024-09-13 00:38:18', 'Pengguna dengan username teknisi , nama : tedi melakukan cross authority dengan akses  sebagai Teknisi'),
(19, 'teknisi', '2024-09-13 00:39:43', 'Pengguna dengan username teknisi , nama : tedi melakukan cross authority dengan akses  sebagai Teknisi'),
(20, '087722727722', '2024-09-19 09:19:32', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(21, '087722727722', '2024-09-19 09:32:12', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(22, '087722727722', '2024-09-19 09:48:04', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(23, '087722727722', '2024-09-19 09:48:06', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(24, '087722727722', '2024-09-19 09:48:07', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(25, '087722727722', '2024-09-19 09:48:07', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(26, '087722727722', '2024-09-19 09:48:08', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(27, '087722727722', '2024-09-19 09:48:13', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(28, '087722727722', '2024-09-19 09:48:18', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi'),
(29, '087722727722', '2024-09-19 09:48:22', 'Pengguna dengan username 087722727722 , nama : Eko Gunawan melakukan cross authority dengan akses  sebagai Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `kd_customer` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`kd_customer`, `nama`, `telepon`, `alamat`) VALUES
('1', 'billa', '089654589878', 'Jatisawit Rt 07 Rw 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenisservice`
--

CREATE TABLE `tbl_jenisservice` (
  `kd_service` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_service` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenisservice`
--

INSERT INTO `tbl_jenisservice` (`kd_service`, `jenis_service`) VALUES
('00001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `nama`, `hak_akses`) VALUES
('', '087722727722', 'd8e858d91c7856d091e8f2789d5fd89d7295f171', 'Eko Gunawan', '2'),
('1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '1'),
('2', 'teknisi', 'bb5fd707b68a69354e08aed905388f69e697d93e', 'tedi', '2'),
('5', '086576543235', 'f7b9236065b120e1e66d4defc909ebfb3c424f5d', 'wong gagah', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id_request` int NOT NULL,
  `nama_cust` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_request` date NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_teknisi` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saran_teknisi` text COLLATE utf8mb4_general_ci,
  `status` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id_request`, `nama_cust`, `alamat`, `kontak`, `tanggal_request`, `keluhan`, `keterangan`, `id_teknisi`, `saran_teknisi`, `status`) VALUES
(1, 'wong bingung', 'Cihonje', '087987656778', '2024-09-19', 'pilek', 'lapotop, tas, casan satu buah', '20002', 'hardisk , motherboard, ram harus di ganti', '3'),
(2, 'aan umam', 'jatisawit', '8989899188881', '2024-09-19', 'keyboard loncat, layar kadang mati, sering mati pass booting', 'lapotop', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayatservice`
--

CREATE TABLE `tbl_riwayatservice` (
  `kd_riwayat` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_token` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_teknisi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_service` int NOT NULL,
  `nama_cust` varchar(254) COLLATE utf8mb4_general_ci NOT NULL,
  `telepon` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_riwayatservice`
--

INSERT INTO `tbl_riwayatservice` (`kd_riwayat`, `kd_token`, `kd_teknisi`, `jenis_service`, `nama_cust`, `telepon`, `alamat`, `status`) VALUES
('10001', '', '20001', 1, 'billa', '089653245878', 'Jatisawit rt 07 Rw 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saranservice`
--

CREATE TABLE `tbl_saranservice` (
  `id_request` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_request` date NOT NULL,
  `saran_teknisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `nama_cust` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_teknisi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_saranservice`
--

INSERT INTO `tbl_saranservice` (`id_request`, `tanggal_request`, `saran_teknisi`, `keterangan`, `keluhan`, `nama_cust`, `kontak`, `alamat`, `id_teknisi`, `status`) VALUES
('1', '2024-09-19', 'tidak ada saran11111111', 'lapotop', 'matitotal keyboard rusak', 'Tedi Maulana', '087718787991', 'jatisawit', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `kd_token` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_customer` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `kd_teknisi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `progres` int NOT NULL,
  `estimasi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparepart`
--

CREATE TABLE `tbl_sparepart` (
  `kd_sparepart` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sparepart`
--

INSERT INTO `tbl_sparepart` (`kd_sparepart`, `nama`, `harga`) VALUES
('1122', 'motherboard H61', 'Rp 1.500.000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teknisi`
--

CREATE TABLE `tbl_teknisi` (
  `id_teknisi` int NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kontak` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_teknisi`
--

INSERT INTO `tbl_teknisi` (`id_teknisi`, `nama`, `kontak`, `alamat`) VALUES
(20002, 'Eko Gunawan', '087722727722', 'Winduaji Kec Paguyangan'),
(20004, 'wong gagah', '086576543235', 'Australia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_cross_auth`
--
ALTER TABLE `tbl_cross_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `tbl_jenisservice`
--
ALTER TABLE `tbl_jenisservice`
  ADD PRIMARY KEY (`kd_service`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `tbl_riwayatservice`
--
ALTER TABLE `tbl_riwayatservice`
  ADD PRIMARY KEY (`kd_riwayat`);

--
-- Indexes for table `tbl_saranservice`
--
ALTER TABLE `tbl_saranservice`
  ADD PRIMARY KEY (`id_request`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`kd_token`);

--
-- Indexes for table `tbl_sparepart`
--
ALTER TABLE `tbl_sparepart`
  ADD PRIMARY KEY (`kd_sparepart`);

--
-- Indexes for table `tbl_teknisi`
--
ALTER TABLE `tbl_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cross_auth`
--
ALTER TABLE `tbl_cross_auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id_request` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_teknisi`
--
ALTER TABLE `tbl_teknisi`
  MODIFY `id_teknisi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
