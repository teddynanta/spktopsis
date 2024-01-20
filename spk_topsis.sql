-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 04:26 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_alternatif`
--

INSERT INTO `tab_alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
('1', 'jono'),
('10', 'Dewi Anggun'),
('2', 'Wadiyah'),
('6', 'Teddy Nanta'),
('9', 'Bambang Sugiono');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kriteria`
--

CREATE TABLE `tab_kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kriteria`
--

INSERT INTO `tab_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `status`) VALUES
('c1', 'Karakter', 0.2, 'Benefit'),
('c2', 'Kapasitas', 0.1, 'Benefit'),
('c3', 'Modal', 0.3, 'Cost'),
('c4', 'Jaminan', 0.2, 'Cost'),
('c5', 'Kondisi', 0.2, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tab_pengajuan`
--

CREATE TABLE `tab_pengajuan` (
  `id` int(64) NOT NULL,
  `id_user` int(64) NOT NULL,
  `p1` enum('Ya','Tidak') NOT NULL,
  `p2` enum('Golongan IV','Golongan III','Golongan II','Golongan IB - ID','Golongan IA') NOT NULL,
  `p3` enum('Ya','Tidak') NOT NULL,
  `p4` enum('Tidak Ada','Kecil','Sedang','Besar') NOT NULL,
  `p5` enum('Tidak Ada','<1 Tahun','1 - 5 Tahun','>5 Tahun') NOT NULL,
  `p6` enum('Di Bawah Rp. 2.500.000','Rp. 2.500.000 - Rp. 5.000.000','Rp. 5.000.000 - Rp. 10.000.000','Di Atas Rp. 10.000.000') NOT NULL,
  `p7` enum('Di Bawah Rp. 2.500.000','Rp. 2.500.000 - Rp. 5.000.000','Rp. 5.000.000 - Rp. 10.000.000','Di Atas Rp. 10.000.000') NOT NULL,
  `p8` enum('Tidak Ada','Rp. 2.500.000 - Rp. 5.000.000','Rp. 5.000.000 - Rp. 10.000.000','Di Atas Rp. 10.000.000') NOT NULL,
  `tgl_pengajuan` text NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_pengajuan`
--

INSERT INTO `tab_pengajuan` (`id`, `id_user`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `tgl_pengajuan`, `status`) VALUES
(8, 6, 'Tidak', 'Golongan II', '', '', '', 'Di Bawah Rp. 2.500.000', 'Di Bawah Rp. 2.500.000', 'Tidak Ada', '16 January 2024 21:30', 'Diterima'),
(9, 6, '', 'Golongan IA', '', 'Sedang', '>5 Tahun', 'Di Bawah Rp. 2.500.000', 'Di Bawah Rp. 2.500.000', 'Tidak Ada', '16 January 2024 21:33', 'Ditolak'),
(10, 9, 'Ya', 'Golongan III', 'Ya', 'Kecil', '<1 Tahun', 'Rp. 5.000.000 - Rp. 10.000.000', 'Di Atas Rp. 10.000.000', 'Di Atas Rp. 10.000.000', '18 January 2024 22:13', 'Menunggu'),
(11, 10, 'Tidak', 'Golongan IB - ID', 'Ya', 'Besar', '>5 Tahun', 'Di Atas Rp. 10.000.000', 'Di Atas Rp. 10.000.000', 'Tidak Ada', '19 January 2024 19:01', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_pengajuan` varchar(10) NOT NULL,
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_pengajuan`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
('11', '10', 'c1', 90),
('11', '10', 'c2', 80),
('11', '10', 'c3', 90),
('11', '10', 'c4', 50),
('11', '10', 'c5', 80),
('9', '6', 'c1', 80),
('9', '6', 'c2', 90),
('9', '6', 'c3', 70),
('9', '6', 'c4', 60),
('9', '6', 'c5', 50);

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
  `dokumen1` varchar(128) DEFAULT NULL,
  `dokumen2` varchar(128) DEFAULT NULL,
  `dokumen3` varchar(128) DEFAULT NULL,
  `dokumen4` varchar(128) DEFAULT NULL,
  `role` varchar(26) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `dokumen1`, `dokumen2`, `dokumen3`, `dokumen4`, `role`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', '$2y$10$pIryu1rnBFx2LUSR9wURaeFIqandFeFolpl/Kg11REHFRW.BOFIiG', NULL, NULL, NULL, NULL, 'admin'),
(6, 'Teddy Nanta', 'teddy', 'teddy@gmail.com', '$2y$10$m0qm.HCskT9KOj364ruQJ.xyckUEVQdK58XeDt1fNZQYUsbdGV.vW', 'uploads/none.pdf', 'uploads/none.pdf', 'uploads/none.pdf', 'uploads/none.pdf', 'user'),
(8, 'Jokowi', 'pimpinan', 'pimpinan@gmail.com', '$2y$10$C066tKn8cuzNSztdmBV48ujgws2iH8rYEQ8E0arggW9wSI4vl7wy2', NULL, NULL, NULL, NULL, 'pimpinan'),
(9, 'Bambang Sugiono', 'user', 'user@email.com', '$2y$10$eOYiXa7eob5fJiXj6EbqjOcu0CqxCNXQhQNdW.iS1kOTvfg7kfaIS', 'uploads/gunung.pdf', 'uploads/Dinamika Penduduk Benua Asia.pdf', 'uploads/Alat  Berat dan Pemindahan Tanah Mekanis  - Bab III PENGGUNAAN & KEMAMPUAN ALAT.pdf', 'uploads/DAFTAR_PUSTAKA.pdf', NULL),
(10, 'Dewi Anggun', 'dewi', 'dewi@gmail.com', '$2y$10$WxI26Kufy9/9Vphg3Z2rsu49NDjVJ2jQz7yz7HPd6iHHQr7Y6/Xv2', 'uploads/progit.pdf', 'uploads/701-1433-1-PB.pdf', 'uploads/2969-6793-2-PB.pdf', 'uploads/1103-2185-1-SM.pdf', NULL);

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
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
