-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 06:12 AM
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
('DKTR000001', 'dr. Nezman M.Ked(Ped) Sp.A', '1988-09-02', 'ciledug raya', 'POLI000001'),
('DKTR000002', 'dr. Rita Wahyuniarti, Sp.A, spdi', '1978-01-08', 'pondok pucung', 'POLI000001'),
('DKTR000003', 'dr. Willy Santoso, Sp.A', '1974-06-06', 'tanjung pinang', 'POLI000001'),
('DKTR000004', 'dr. Mufti Yunus, Sp.OG', '1965-09-10', 'jakarta barat', 'POLI000002'),
('DKTR000005', 'dr. Nina Afiani, Sp.OG, M.Kes', '1987-03-12', 'bekasi', 'POLI000002'),
('DKTR000006', 'dr. Hasni Kemala Sari, Sp.OG', '1977-09-25', 'pancoran', 'POLI000002'),
('DKTR000007', 'dr. John Arianto Sondakh, Sp.OG', '1988-10-30', 'pondok indah', 'POLI000002'),
('DKTR000008', 'dr. M.Firman sidik, Sp. THT-KL', '1976-12-20', 'kebayoran lama', 'POLI000003'),
('DKTR000009', 'drg. Luky Tri Hartanti, Sp.Perio', '1979-05-07', 'pondok betung', 'POLI000004'),
('DKTR000010', 'drg. Helga Juniharas', '1982-04-10', 'bintaro sektor 9', 'POLI000004'),
('DKTR000011', 'drg. Rini Julianti', '1977-09-26', 'pondok aren', 'POLI000004'),
('DKTR000012', 'drg. Irfan', '1979-02-13', 'patal senayan', 'POLI000004'),
('DKTR000013', 'drg. Anita Putriyanti Dewi', '1989-09-20', 'pondok kacang', 'POLI000004'),
('DKTR000014', 'drg. Irza Pragiwati', '1976-11-07', 'kebayoran baru', 'POLI000004'),
('DKTR000015', 'Rahmaniar Pujiastuti, M.Psi., Psikolog', '1978-04-17', 'depok', 'POLI000005'),
('DKTR000016', 'dr. Erry Chas', '1985-09-11', 'pasar baru', 'POLI000006'),
('DKTR000017', 'dr. Sim Aryanto Senjaya', '1977-09-28', 'pakubuwono', 'POLI000006'),
('DKTR000018', 'dr. Ridwan Palili', '1965-05-07', 'joglo', 'POLI000006'),
('DKTR000019', 'dr. Indra Maulana', '1982-12-12', 'jakarta selatan', 'POLI000006'),
('DKTR000020', 'dr. Iswarhery', '1969-03-12', 'pondok indah', 'POLI000006'),
('DKTR000021', 'dr. Nur\' Aini', '1983-01-23', 'jakarta utara', 'POLI000006');

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
(30, 'Senin', NULL, '17:00 - 19:00', '0', NULL, 'DKTR000001'),
(31, 'Rabu', NULL, '17:00 - 19:00', '0', NULL, 'DKTR000001'),
(32, 'Selasa', NULL, '17:00 - 20:00', '0', NULL, 'DKTR000001'),
(33, 'Kamis', NULL, '17:00 - 20:00', '0', NULL, 'DKTR000001'),
(34, 'Jumat', NULL, '17:00 - 20:00', '0', NULL, 'DKTR000001'),
(35, 'Sabtu', '09:00 - 11:00', NULL, '0', NULL, 'DKTR000001'),
(36, 'Senin', NULL, '20:00 - 22:00', '0', NULL, 'DKTR000002'),
(38, 'Selasa', NULL, '20:30 - 22:00', '0', NULL, 'DKTR000002'),
(39, 'Kamis', NULL, '20:30 - 22:00', '0', NULL, 'DKTR000002'),
(40, 'Jumat', NULL, '20:30 - 22:00', '0', NULL, 'DKTR000002'),
(41, 'Senin', '08:00 - 10:00', NULL, '0', NULL, 'DKTR000003'),
(42, 'Selasa', '08:00 - 10:00', NULL, '0', NULL, 'DKTR000003'),
(43, 'Rabu', '08:00 - 10:00', NULL, '0', NULL, 'DKTR000003'),
(44, 'Kamis', '08:00 - 10:00', NULL, '0', NULL, 'DKTR000003'),
(45, 'Jumat', '08:00 - 10:00', NULL, '0', NULL, 'DKTR000003'),
(46, 'Senin', NULL, '21:00 - 22:00', '0', NULL, 'DKTR000004'),
(47, 'Selasa', NULL, '21:00 - 22:00', '0', NULL, 'DKTR000004'),
(48, 'Jumat', NULL, '21:00 - 22:00', '0', NULL, 'DKTR000004'),
(49, 'Rabu', NULL, '17:00 - 18:30', '0', NULL, 'DKTR000004'),
(50, 'Kamis', NULL, '17:00 - 18:30', '0', NULL, 'DKTR000004'),
(51, 'Senin', '09:00 - 11:00', '', '0', NULL, 'DKTR000005'),
(52, 'Kamis', '09:00 - 11:00', '', '0', NULL, 'DKTR000005'),
(53, 'Selasa', '10:00 - 12:00', '', '0', NULL, 'DKTR000005'),
(54, 'Rabu', '10:00 - 12:00', '', '0', NULL, 'DKTR000005'),
(55, 'Jumat', NULL, '17:00 - 19:00', '0', NULL, 'DKTR000005'),
(56, 'Sabtu', NULL, '13:00 - 15:00', '1', '1', 'DKTR000005'),
(57, 'Senin', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000006'),
(58, 'Selasa', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000006'),
(59, 'Jumat', '09:00 - 11:00', NULL, '0', NULL, 'DKTR000006'),
(60, 'Sabtu', '09:00 - 11:00', NULL, '1', NULL, 'DKTR000006'),
(61, 'Selasa', '07:30 - 09:30', NULL, '0', NULL, 'DKTR000007'),
(62, 'Rabu', '07:30 - 09:30', NULL, '0', NULL, 'DKTR000007'),
(63, 'Sabtu', NULL, '16:30 - 19:30', '0', NULL, 'DKTR000007'),
(64, 'Senin', NULL, '20:30 - 21:30', '0', NULL, 'DKTR000008'),
(65, 'Selasa', NULL, '20:30 - 21:30', '0', NULL, 'DKTR000008'),
(66, 'Rabu', NULL, '20:30 - 21:30', '0', NULL, 'DKTR000008'),
(67, 'Kamis', NULL, '20:30 - 21:30', '0', NULL, 'DKTR000008'),
(68, 'Jumat', NULL, '20:30 - 21:30', '0', NULL, 'DKTR000008'),
(69, 'Sabtu', '', '12:00 - 14:00', '0', '1', 'DKTR000008'),
(70, 'Rabu', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000009'),
(71, 'Senin', '10:00 - 12:00', NULL, '0', NULL, 'DKTR000010'),
(72, 'Rabu', '10:00 - 12:00', NULL, '0', NULL, 'DKTR000010'),
(73, 'Kamis', '10:00 - 12:00', NULL, '0', NULL, 'DKTR000010'),
(74, 'Jumat', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000010'),
(75, 'Senin', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000011'),
(76, 'Kamis', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000011'),
(77, 'Selasa', '10:00 - 12:00', NULL, '0', NULL, 'DKTR000011'),
(78, 'Sabtu', '10:00 - 12:00', '', '0', NULL, 'DKTR000012'),
(79, 'Selasa', NULL, '18:00 - 20:00', '0', NULL, 'DKTR000013'),
(80, 'Sabtu', NULL, '17:00 - 20:00', '0', NULL, 'DKTR000013'),
(81, 'Jumat', '10:00 - 12:00', NULL, '0', NULL, 'DKTR000014'),
(82, 'Senin', '09:00 - 17:00', '', '0', '1', 'DKTR000015'),
(83, 'Rabu', '09:00 - 17:00', '', '0', '1', 'DKTR000015'),
(84, 'Sabtu', '09:00 - 17:00', '', '0', '1', 'DKTR000015'),
(85, 'Senin', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000016'),
(86, 'Senin', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000016'),
(87, 'Selasa', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000017'),
(88, 'Selasa', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000018'),
(89, 'Rabu', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000019'),
(90, 'Rabu', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000017'),
(91, 'Kamis', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000018'),
(92, 'Kamis', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000020'),
(93, 'Jumat', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000017'),
(94, 'Jumat', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000018'),
(95, 'Sabtu', '08:00 - 18:00', NULL, '1', NULL, 'DKTR000016'),
(96, 'Sabtu', '', '18:00 - 08:00', '0', NULL, 'DKTR000021'),
(97, 'Minggu', '08:00 - 18:00', NULL, '0', NULL, 'DKTR000020'),
(98, 'Minggu', NULL, '18:00 - 08:00', '0', NULL, 'DKTR000020');

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
('POLI000001', 'poli anak'),
('POLI000002', 'poli kandungan & kebidanan'),
('POLI000003', 'poli tht-kl'),
('POLI000004', 'poli gigi spesialis & umum'),
('POLI000005', 'poli psikologi'),
('POLI000006', 'dokter umum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nm_user`, `email`, `password`) VALUES
(1, 'admin', 'budi luhur', 'budiluhurs@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
