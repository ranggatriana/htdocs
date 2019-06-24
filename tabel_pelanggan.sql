-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 05:16 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `username`, `password`) VALUES
(1, 'rangga tri', 4, 4, 'siliragung', 'siliragung', 'banyuwangi', 'rangga', '$2y$10$n4jgv.d7W5JW.kYhi2jB8urVIZRW46YBNLbm.zoTD5NKcFqC/tj/W'),
(2, '30', 4, 4, '100', '30', '30', 'halo', '$2y$10$4Zs1N3D4R3vv4.kWkBNlMe0e69wedvVk4Njp4TFp2v81tMqx3QCiy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
