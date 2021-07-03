-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 05:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notewarehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `arus_barang`
--

CREATE TABLE `arus_barang` (
  `id_arus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `apakah_masuk` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arus_barang`
--

INSERT INTO `arus_barang` (`id_arus`, `id_user`, `kode_barang`, `kode_ruangan`, `jumlah`, `tanggal`, `apakah_masuk`) VALUES
(2, 1, 'BRG001', 'GA1', 100, '2021-07-03 00:00:00', 1),
(3, 1, 'BRG002', 'GA2', 150, '2021-07-03 00:00:00', 1),
(4, 1, 'BRG001', 'GA1', 50, '2021-07-02 00:00:00', 0),
(5, 1, 'BRG002', 'GA2', 20, '2021-07-03 00:00:00', 1),
(6, 1, 'BRG006', 'GB1', 100, '2021-07-03 00:00:00', 1),
(7, 1, 'BRG002', 'GA1', 50, '2021-07-03 00:00:00', 0),
(8, 1, 'BRG006', 'GB1', 45, '2021-07-03 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_barang`, `nama_barang`, `satuan`) VALUES
('BRG001', 'Beras', 'Kg'),
('BRG002', 'Mie Instan', 'Pcs'),
('BRG003', 'Susu', 'Kg'),
('BRG004', 'Gandum', 'Kg'),
('BRG005', 'Telur', 'Kg'),
('BRG006', 'Sayuran', 'Kg'),
('BRG007', 'Jagung', 'Kg'),
('BRG008', 'Makanan Kaleng', 'Kg'),
('BRG009', 'Minyak Sayur', 'L'),
('BRG010', 'Tepung', 'Kg'),
('BRG011', 'Gula', 'Kg'),
('BRG012', 'Mentega', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES
('GA1', 'Gudang A-1'),
('GA2', 'Gudang A-2'),
('GA3', 'Gudang A-3'),
('GB1', 'Gudang B-1'),
('GB2', 'Gudang B-2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `password`) VALUES
(1, 'fulan@mail.com', 'Fulan', 'fulan123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arus_barang`
--
ALTER TABLE `arus_barang`
  ADD PRIMARY KEY (`id_arus`),
  ADD KEY `fk_arus_barang` (`kode_barang`),
  ADD KEY `fk_arus_user` (`id_user`),
  ADD KEY `fk_arus_ruangan` (`kode_ruangan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arus_barang`
--
ALTER TABLE `arus_barang`
  MODIFY `id_arus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arus_barang`
--
ALTER TABLE `arus_barang`
  ADD CONSTRAINT `fk_arus_barang` FOREIGN KEY (`kode_barang`) REFERENCES `jenis_barang` (`kode_barang`),
  ADD CONSTRAINT `fk_arus_ruangan` FOREIGN KEY (`kode_ruangan`) REFERENCES `ruangan` (`kode_ruangan`),
  ADD CONSTRAINT `fk_arus_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
