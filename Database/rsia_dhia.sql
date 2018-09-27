-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 10:20 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsia_dhia`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `nm_dokter` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `id_poli` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nm_dokter`, `tgl_lahir`, `alamat`, `id_poli`) VALUES
('000001', 'dr. nezman M.ked(Ped) S.Pa', '2018-09-03', 'cipondoh', '000001'),
('000002', 'dr. rita wahyunarti Sp.A', '2018-09-10', 'tangerang', '000002'),
('000003', 'dr. mufti yunus Sp.OG', '2018-12-12', 'tangerang selatan', '000003'),
('000004', 'zakaria', '2013-02-11', 'jakarta', '000004'),
('000005', 'ismail', '2018-07-11', 'ciledug', '000005');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari` varchar(10) NOT NULL,
  `pagi` varchar(13) DEFAULT NULL,
  `sore` varchar(13) DEFAULT NULL,
  `status_hadir` enum('0','1','2','3') NOT NULL COMMENT '0. tidak hadir, 1. hadir, 2. izin, 3. sakit',
  `perjanjian` enum('1') DEFAULT NULL COMMENT '1. ada janji',
  `id_dokter` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `pagi`, `sore`, `status_hadir`, `perjanjian`, `id_dokter`) VALUES
(14, 'kamis', '', '14:00 - 14:00', '1', NULL, '000002'),
(15, 'kamis', '', '14:00 - 14:00', '1', NULL, '000002'),
(17, 'kamis', '', '14:00 - 14:00', '1', '1', '000002'),
(18, 'kamis', '', '14:00 - 14:00', '0', '1', '000001'),
(21, 'Kamis', NULL, '15:00 - 15:00', '3', NULL, '000005'),
(22, 'Selasa', NULL, '15:00 - 15:00', '0', NULL, '000003'),
(23, 'Kamis', NULL, '15:00 - 15:00', '1', NULL, '000003'),
(24, 'Kamis', NULL, '15:00 - 15:00', '1', NULL, '000003'),
(25, 'Selasa', NULL, '15:00 - 15:00', '0', NULL, '000003');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(10) NOT NULL,
  `nm_poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nm_poli`) VALUES
('000001', 'poli anak'),
('000002', 'poli kandungan dan kebidanan'),
('000003', 'poli tht-kl'),
('000004', 'poli gigi'),
('000005', 'poli psikologi'),
('000006', 'dokter umum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nm_user`, `email`, `password`) VALUES
('admin', 'budi luhur', 'budiluhur@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
