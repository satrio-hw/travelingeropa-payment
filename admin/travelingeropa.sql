-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 04:47 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelingeropa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `notlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama`, `email`, `role`, `password`, `alamat`, `notlp`) VALUES
('admin 30', 'adm1@te.com', 'adm', '$2y$10$/LvpOVNo3L5zEaLYBk29e.5h7h8vi4NSq09/JedkgPvtDl3jpOFUK', '2 test alamat, nama jalan, no rumah 0000, Daerah, 12345, Indonesia', '080000000123'),
('admin 2', 'adm2@te.com', 'adm', '$2y$10$rrjXjSJz79IWvtym23bvGO2EDudx6K19CmZgNo9RjRoPGLYr5K6OS', '2 test alamat, nama jalan, no rumah 0000, Daerah, 12345, Indonesia', '080000000002'),
('emailadmin', 'rio.elmaestro@gmail.com', 'mailer', 'QXA0YWphYm9sZWg=', 'gmail.com', '0000000'),
('Super Admin 2', 'sa1@te.com', 'spadm', '$2y$10$Pc/BgorxpQpDy41dDGp3.e79yqraSlPo81RiqB35dZ5RhjAMsi2cC', '1 test alamat, nama jalan, no rumah 0000, Daerah, 12345, Indonesia', '080000000000'),
('travelingeropa Info', 'te-info@travelingeropapay.com', 'spadm', '$2y$10$GV/n.dm88WPAFZzrPEdyEu8XRuGg5mReOujms4xp7Q2DhCFzGwOke', 'Jl. Selokan Mataram Kabupaten Sleman Daerah Istimewa Yogyakarta', '+62813641135');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` varchar(20) NOT NULL,
  `id_paket` varchar(20) NOT NULL,
  `email_pemesan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(12) NOT NULL,
  `harga_in_landtour` int(12) NOT NULL,
  `upgrade_kamar` int(50) NOT NULL,
  `keterangan_tambahan` int(12) NOT NULL,
  `visa` int(50) NOT NULL,
  `asuransi` int(50) NOT NULL,
  `simcard` int(50) NOT NULL,
  `upgrade_bagasi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama`, `harga`, `harga_in_landtour`, `upgrade_kamar`, `keterangan_tambahan`, `visa`, `asuransi`, `simcard`, `upgrade_bagasi`) VALUES
('5dfc4180d2bfb', 'West Europe 7-16 April 2020', 18900000, 10900000, 2000000, 0, 1900000, 600000, 600000, 900000),
('5e17e12c86d75', 'paket eropa 1', 20000000, 15000000, 2000000, 0, 500000, 1000000, 300000, 500000),
('5e27059bb4894', 'Paket Eropa 2', 50000000, 20000000, 1000000, 500000, 600000, 1000000, 500000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran` varchar(10) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `bukti` varchar(300) NOT NULL DEFAULT 'default.png',
  `admin` varchar(50) NOT NULL,
  `konfirmasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hp` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `email_peserta` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_passport` varchar(30) DEFAULT NULL,
  `exp_passport` date DEFAULT NULL,
  `hp` varchar(30) NOT NULL,
  `status_tiket` varchar(20) NOT NULL,
  `domisili` varchar(20) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_peserta` varchar(64) NOT NULL,
  `upkamar` varchar(20) NOT NULL,
  `opsional` varchar(20) NOT NULL,
  `visa` varchar(20) NOT NULL,
  `asuransi` varchar(20) NOT NULL,
  `simcard` varchar(20) NOT NULL,
  `upbagasipergi` varchar(20) NOT NULL,
  `upbagasipulang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran`,`id_order`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
