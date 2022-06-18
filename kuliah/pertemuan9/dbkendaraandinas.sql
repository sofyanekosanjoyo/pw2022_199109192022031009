-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 03:06 PM
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
(2, 'Kijang', 'Innova', 'B 6819 TQQ', 'Direktorat Sistem dan Strategi Pengelolaan Sumber Daya Air', 'innova-hitam.jpg', 'innovaditsspsdahitam1@pu.go.id'),
(3, 'Toyota', 'Alphard', 'B 6887 TQQ', 'Direktorat Sungai dan Pantai', 'alphard-hitam.jpg', 'aphardhitamditsupan1@pu.go.id'),
(9, 'Kijang 222', 'Panther', 'B 222 AGV', 'Direktorat Bina Operasional Sumber Daya Air', 'hitam.jpg', 'binaop@gmail.com'),
(10, 'Tesla', 'abc', 'D 333 N', 'Direktorrat Bina Teknik Sumber Daya Air', '62a456e73f72a.jpg', 'tesla@pu.go.id'),
(11, 'Tesla', 'Merah', 'B 4321 A', 'Sekretariat Dewan Sumber Daya Air', '62a4568733e49.jpg', 'setdewan@gmail.com'),
(12, 'Mercedez', 'Benz', 'B 111 DS', 'Direktorat Sungai dan Pantai', '62a5f9feda9a5.jpg', 'supan@pu.go.id'),
(13, 'Honda', 'Brio', 'B 222 QAW', 'Direktorat Sistem dan Strategi Pengelolaan Sumber Daya Air', '62a5fa4f3ff79.jpg', 'brio@pu.go.id');

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
(2, 'sofyanekosanjoyo@gmail.com', '$2y$10$/VCZWVHRlIiDCGwccYdv7ejGVkv20.fOzYZtril5WnNlbyk9fmedC');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
