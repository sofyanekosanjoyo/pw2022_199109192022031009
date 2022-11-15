-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 02:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkendaraandinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `merk_kendaraan` varchar(30) NOT NULL,
  `tipe_kendaraan` varchar(30) NOT NULL,
  `nomor_plat` char(20) NOT NULL,
  `unit_kerja` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `merk_kendaraan`, `tipe_kendaraan`, `nomor_plat`, `unit_kerja`, `gambar`, `email`) VALUES
(1, 'Mitsubishi', 'Pajero Sport', 'B 9101 TAA', 'Sekretariat Direktorat Jenderal Sumber Daya Air', 'pajero-hitam.jpg', 'pajerosetditjensda1@pu.go.id'),
(2, 'Kijang', 'Innova', 'B 6819 TQQ', 'Direktorat Sistem dan Strategi Pengelolaan Sumber Daya Air', '62aee4fad357b.jpg', 'innovaditsspsdahitam1@pu.go.id'),
(3, 'Toyota', 'Alphard', 'B 6887 TQQ', 'Direktorat Sungai dan Pantai', 'alphard-hitam.jpg', 'aphardhitamditsupan1@pu.go.id'),
(9, 'Kijang 222', 'Panther', 'B 222 AGV', 'Direktorat Bina Operasional Sumber Daya Air', '62aee0a748b77.jpg', 'binaop@gmail.com'),
(11, 'Tesla', 'Merah', 'B 4321 A', 'Sekretariat Dewan Sumber Daya Air', '62a4568733e49.jpg', 'setdewan@gmail.com'),
(12, 'Mercedez 4', 'Benz', 'B 111 DS', 'Direktorat Sungai dan Pantai', '62aee6c93f779.jpg', 'supan@pu.go.id'),
(13, 'Honda', 'Brio', 'B 222 QAW', 'Direktorat Sistem dan Strategi Pengelolaan Sumber Daya Air', '62a5fa4f3ff79.jpg', 'brio@pu.go.id'),
(14, 'Nissan', 'Livina', 'B 444 BAG', 'Direktorat Bendungan dan Danau', 'nissan-livina.jpg', 'bendasda@gmail.com'),
(18, 'Ford', 'Biru', 'B 999 ASZ', 'Sekretariat Dewan Sumber Daya Air', 'fortuner-hitam.jpg', 'setdewan@gmail.com'),
(19, 'qwerty', 'qwerty 2', 'qwerty', 'qwerty', 'nophoto.jpg', 'qwerty'),
(20, 'Lambhorgini', 'Ocean', 'B 777 ABG', 'Setditjen SDA', 'nophoto.jpg', 'sofyanekosanjoyo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'adminpusat', '$2y$10$6FYTdUbkCROQQd1.M4/mQerYL1.dCyv8Nd2ZYZfbD.fidfcIXBADu'),
(2, 'sofyanekosanjoyo@gmail.com', '$2y$10$/VCZWVHRlIiDCGwccYdv7ejGVkv20.fOzYZtril5WnNlbyk9fmedC'),
(4, 'joy', '$2y$10$BPBPl3Nt4fcKNKnWttNRsu1dRC9ERrRvMkWB.4Cs2uM1pWZVj15RC'),
(5, 'setditjensda', '$2y$10$c.Ed8yZ240.LVG08TMIY4uf8oAoVQCg3Axn/cikZ/M3pJ0/TKWehO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
