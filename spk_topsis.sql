-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 12:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `id_pengajuan` varchar(64) NOT NULL,
  `id_user` varchar(64) NOT NULL,
  `pekerjaan` enum('PNS','CPNS','Pegawai BUMN/BUMD','Pegawai Swasta','Pensiunan','Lainnya') NOT NULL,
  `NIP` varchar(64) DEFAULT NULL,
  `perusahaan` varchar(64) NOT NULL,
  `lamakerja` enum('1 Tahun','2 Tahun','3 Tahun','4 Tahun','5 Tahun','Di Atas 5 Tahun') NOT NULL,
  `Jabatan` enum('Direktur/Kepala Kantor/Kepala Dinas','Manajer/Kepala Bagian','Kepala Seksi','Staf') NOT NULL,
  `alamatkantor` text NOT NULL,
  `notelkantor` varchar(64) NOT NULL,
  `atasan` varchar(128) NOT NULL,
  `jab_atasan` enum('Direktur/Kepala Kantor/Kepala Dinas','Manajer/Kepala Bagian','Kepala Seksi','Staf') NOT NULL,
  `tgl_submit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pekerjaan`
--

INSERT INTO `data_pekerjaan` (`id_pengajuan`, `id_user`, `pekerjaan`, `NIP`, `perusahaan`, `lamakerja`, `Jabatan`, `alamatkantor`, `notelkantor`, `atasan`, `jab_atasan`, `tgl_submit`) VALUES
('PENG/00001/10/2024', '10', 'PNS', '199911192024121001', 'Pemerintah kota lubuklinggau', '2 Tahun', 'Staf', 'Jl. Duku II RT. 003', '081234567890', 'Asep Sumargono Putro, S. Kom., M. Si', 'Direktur/Kepala Kantor/Kepala Dinas', '21 January 2024 13:11'),
('PENG/00002/11/2024', '11', 'Pegawai BUMN/BUMD', '0', 'PT. Maju Sejahtera', 'Di Atas 5 Tahun', 'Manajer/Kepala Bagian', 'Jl. Duku II RT. 003', '081234567890', 'Jack Doherty Subagio, M. Sc., Phd', 'Direktur/Kepala Kantor/Kepala Dinas', '21 January 2024 20:41');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemohon`
--

CREATE TABLE `data_pemohon` (
  `id_pengajuan` varchar(128) NOT NULL,
  `id_user` int(64) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bdate` varchar(128) NOT NULL,
  `warga` enum('Warga Negara Indonesia','Warga Negara Asing (WNA)') NOT NULL,
  `nik` varchar(64) NOT NULL,
  `npwp` varchar(64) DEFAULT NULL,
  `ibu` varchar(128) NOT NULL,
  `nikah` enum('Belum Menikah','Menikah','Janda/Duda') NOT NULL,
  `pnama` varchar(128) DEFAULT NULL,
  `pbdate` varchar(128) DEFAULT NULL,
  `alamat` text NOT NULL,
  `alamatdom` text NOT NULL,
  `notel` varchar(64) NOT NULL,
  `tgl_submit` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pemohon`
--

INSERT INTO `data_pemohon` (`id_pengajuan`, `id_user`, `nama`, `bdate`, `warga`, `nik`, `npwp`, `ibu`, `nikah`, `pnama`, `pbdate`, `alamat`, `alamatdom`, `notel`, `tgl_submit`) VALUES
('PENG/00001/10/2024', 10, 'Dewi Anggun', '2024-01-02', 'Warga Negara Indonesia', '2147483647', '0', 'Anda', 'Belum Menikah', '-', '0001-01-01', 'Jl. Duku II RT. 003', 'Jl. Duku II RT. 003', '0812345677890', '21 January 2024 20:03'),
('PENG/00002/11/2024', 11, 'kuro', '1988-03-12', 'Warga Negara Asing (WNA)', '1673568815669008', '0', 'Haruka Haruno', 'Menikah', 'Elisabeth January', '1998-01-31', 'Jl. Duku II RT. 003', 'Jl. Duku II RT. 003', '08123456778888', '21 January 2024 20:51');

-- --------------------------------------------------------

--
-- Table structure for table `data_penghasilan`
--

CREATE TABLE `data_penghasilan` (
  `id_pengajuan` varchar(64) NOT NULL,
  `id_user` int(64) NOT NULL,
  `penghasilan` varchar(64) NOT NULL,
  `sertifikasi` varchar(64) DEFAULT NULL,
  `tpp` varchar(64) DEFAULT NULL,
  `lainnya` varchar(64) DEFAULT NULL,
  `norek` varchar(64) NOT NULL,
  `tgl_submit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_penghasilan`
--

INSERT INTO `data_penghasilan` (`id_pengajuan`, `id_user`, `penghasilan`, `sertifikasi`, `tpp`, `lainnya`, `norek`, `tgl_submit`) VALUES
('PENG/00001/10/2024', 10, 'IDR 5,000,000', 'IDR 2,500,000', 'IDR 100,000', 'IDR 6,000,000', '1209229480', '21 January 2024 13:34'),
('PENG/00002/11/2024', 11, 'IDR 50,000,000', 'IDR 0', 'IDR 0', 'IDR 35,678,900', '1001110009864', '21 January 2024 20:41');

-- --------------------------------------------------------

--
-- Table structure for table `data_permohonan`
--

CREATE TABLE `data_permohonan` (
  `id_pengajuan` varchar(64) NOT NULL,
  `id_user` int(64) NOT NULL,
  `permohonan` varchar(64) NOT NULL,
  `jangka` enum('6 Bulan','1 Tahun - 3 Tahun','3 Tahun - 5 Tahun','Lebih dari 5 Tahun') NOT NULL,
  `tujuan` text NOT NULL,
  `tgl_submit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_permohonan`
--

INSERT INTO `data_permohonan` (`id_pengajuan`, `id_user`, `permohonan`, `jangka`, `tujuan`, `tgl_submit`) VALUES
('PENG/00001/10/2024', 10, 'IDR 100,000,000', '3 Tahun - 5 Tahun', 'foya-foya', '21 January 2024 17:29'),
('PENG/00002/11/2024', 11, 'IDR 325,460,090', '1 Tahun - 3 Tahun', 'Pengembangan Infrastruktur Kota', '21 January 2024 20:46');

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
('1', 'jono'),
('10', 'Dewi Anggun'),
('11', 'kuro'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `id_pengajuan` varchar(64) NOT NULL,
  `id_user` int(64) NOT NULL,
  `data_pemohon` int(1) DEFAULT NULL,
  `data_pekerjaan` int(1) DEFAULT NULL,
  `data_penghasilan` int(1) DEFAULT NULL,
  `data_permohonan` int(1) DEFAULT NULL,
  `data_pendukung` int(1) DEFAULT NULL,
  `tgl_pengajuan` text NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_pengajuan`
--

INSERT INTO `tab_pengajuan` (`id_pengajuan`, `id_user`, `data_pemohon`, `data_pekerjaan`, `data_penghasilan`, `data_permohonan`, `data_pendukung`, `tgl_pengajuan`, `status`) VALUES
('PENG/00001/10/2024', 10, 1, 1, 1, 1, 1, '21 January 2024 20:03', 'Menunggu'),
('PENG/00002/11/2024', 11, 1, 1, 1, 1, 1, '21 January 2024 20:39', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tab_topsis`
--

CREATE TABLE `tab_topsis` (
  `id_pengajuan` varchar(64) NOT NULL,
  `id_alternatif` varchar(10) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tab_topsis`
--

INSERT INTO `tab_topsis` (`id_pengajuan`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
('11', '10', 'c1', 90),
('11', '10', 'c2', 80),
('11', '10', 'c3', 90),
('11', '10', 'c4', 50),
('11', '10', 'c5', 80),
('', '11', 'c1', 80),
('', '11', 'c2', 90),
('', '11', 'c3', 90),
('', '11', 'c4', 60),
('', '11', 'c5', 90),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `dokumen1`, `dokumen2`, `dokumen3`, `dokumen4`, `role`) VALUES
(5, 'admin', 'admin', 'admin@gmail.com', '$2y$10$pIryu1rnBFx2LUSR9wURaeFIqandFeFolpl/Kg11REHFRW.BOFIiG', NULL, NULL, NULL, NULL, 'admin'),
(6, 'Teddy Nanta', 'teddy', 'teddy@gmail.com', '$2y$10$m0qm.HCskT9KOj364ruQJ.xyckUEVQdK58XeDt1fNZQYUsbdGV.vW', 'uploads/none.pdf', 'uploads/none.pdf', 'uploads/none.pdf', 'uploads/none.pdf', 'user'),
(8, 'Jokowi', 'pimpinan', 'pimpinan@gmail.com', '$2y$10$C066tKn8cuzNSztdmBV48ujgws2iH8rYEQ8E0arggW9wSI4vl7wy2', NULL, NULL, NULL, NULL, 'pimpinan'),
(9, 'Bambang Sugiono', 'user', 'user@email.com', '$2y$10$eOYiXa7eob5fJiXj6EbqjOcu0CqxCNXQhQNdW.iS1kOTvfg7kfaIS', 'uploads/gunung.pdf', 'uploads/Dinamika Penduduk Benua Asia.pdf', 'uploads/Alat  Berat dan Pemindahan Tanah Mekanis  - Bab III PENGGUNAAN & KEMAMPUAN ALAT.pdf', 'uploads/DAFTAR_PUSTAKA.pdf', NULL),
(10, 'Dewi Anggun', 'dewi', 'dewi@gmail.com', '$2y$10$WxI26Kufy9/9Vphg3Z2rsu49NDjVJ2jQz7yz7HPd6iHHQr7Y6/Xv2', 'uploads/document (1).pdf', 'uploads/document.pdf', 'uploads/file (1).pdf', 'uploads/file (2).pdf', NULL),
(11, 'Ansor Abror', 'kuro', 'kuropantsu99@gmail.com', '$2y$10$1TvmyrkD8wLDx8IrhqpkJ.WYKGoAhv3xy5Iotjh1E2vzwDNqQwD26', 'uploads/SanDiskMemoryZone_QuickStartGuide.pdf', 'uploads/document (1).pdf', 'uploads/file (1).pdf', 'uploads/file (2).pdf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `data_pemohon`
--
ALTER TABLE `data_pemohon`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `data_penghasilan`
--
ALTER TABLE `data_penghasilan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `data_permohonan`
--
ALTER TABLE `data_permohonan`
  ADD PRIMARY KEY (`id_pengajuan`);

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
  ADD PRIMARY KEY (`id_pengajuan`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
