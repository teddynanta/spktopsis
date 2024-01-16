-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 07:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(10) NOT NULL,
  `data1` text NOT NULL,
  `data2` text NOT NULL,
  `data3` text NOT NULL,
  `data4` text NOT NULL,
  `data5` text NOT NULL,
  `data6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `data1`, `data2`, `data3`, `data4`, `data5`, `data6`) VALUES
(1, 'adnu', 'adalah', '12434', 'tdak', '123', 'ladkf');

-- --------------------------------------------------------

--
-- Table structure for table `tab_alternatif`
--

CREATE TABLE `tab_alternatif` (
  `id_alternatif` varchar(10) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('1', 'teddy'),
('2', 'Wadiyah');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
('1', 'Pekerjaan', 2, 'Benefit'),
('2', 'Hutang', 3, 'Cost'),
('3', 'Penghasilan', 5, 'Benefit'),
('4', 'Pengeluaran', 4, 'Cost'),
('5', 'Simpanan', 1, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_pengajuan`
--

CREATE TABLE `tab_pengajuan` (
  `id` int(64) NOT NULL,
  `id_user` int(64) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `penghasilan` int(128) NOT NULL,
  `pengeluaran` int(128) NOT NULL,
  `hutang` int(128) NOT NULL,
  `simpanan` int(128) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_alternatif`, `id_kriteria`, `nilai`) VALUES
('1', '1', 1),
('1', '2', 5),
('1', '3', 5),
('1', '4', 1),
('1', '5', 4),
('2', '1', 2),
('2', '2', 3),
('2', '3', 3),
('2', '4', 4),
('2', '5', 1),
('Nama Alter', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(26) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `role`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', '$2y$10$pIryu1rnBFx2LUSR9wURaeFIqandFeFolpl/Kg11REHFRW.BOFIiG', 'admin'),
(6, 'Teddy Nanta', 'teddy', 'teddy@gmail.com', '$2y$10$m0qm.HCskT9KOj364ruQJ.xyckUEVQdK58XeDt1fNZQYUsbdGV.vW', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_alternatif`
--
ALTER TABLE `tab_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `tab_kriteria`
--
ALTER TABLE `tab_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tab_pengajuan`
--
ALTER TABLE `tab_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_pengajuan`
--
ALTER TABLE `tab_pengajuan`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tab_topsis`
--
ALTER TABLE `tab_topsis`
  ADD CONSTRAINT `tab_topsis_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `tab_kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
