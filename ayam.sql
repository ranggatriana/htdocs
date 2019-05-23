-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 09:11 AM
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Peralatan'),
(4, 'Obat'),
(5, 'Ayam');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `harga_barang`, `gambar`, `stok`, `id_kategori`) VALUES
(11, 'B1212', 30000, '', 3000, 2),
(12, 'Scrub', 30000, '', 30, 6),
(13, 'AyamB31', 20000, '', 300, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `rt` int(4) NOT NULL,
  `rw` int(4) NOT NULL,
  `desa` tinyint(1) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pemesanan`
--

CREATE TABLE `tabel_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang`
-- (See below for the actual view)
--
CREATE TABLE `view_barang` (
`id_barang` int(10)
,`nama_barang` varchar(30)
,`harga_barang` int(20)
,`gambar` varchar(225)
,`stok` int(11)
,`id_kategori` int(10)
,`nama_kategori` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pemesanan`
-- (See below for the actual view)
--
CREATE TABLE `view_pemesanan` (
`id_pemesanan` int(11)
,`id_pelanggan` int(11)
,`nama_pelanggan` varchar(30)
,`id_barang` int(11)
,`nama_barang` varchar(30)
,`harga_barang` int(20)
,`jumlah_pesan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`id_transaksi` int(11)
,`tanggal_transaksi` date
,`id_pelanggan` int(11)
,`nama_pelanggan` varchar(30)
,`id_barang` int(11)
,`nama_barang` varchar(30)
,`harga_barang` int(20)
,`jumlah_barang` int(10)
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `tabel_barang`.`id_barang` AS `id_barang`,`tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`harga_barang` AS `harga_barang`,`tabel_barang`.`gambar` AS `gambar`,`tabel_barang`.`stok` AS `stok`,`tabel_barang`.`id_kategori` AS `id_kategori`,`kategori`.`nama_kategori` AS `nama_kategori` from (`tabel_barang` join `kategori`) where (`tabel_barang`.`id_kategori` = `kategori`.`id_kategori`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pemesanan`
--
DROP TABLE IF EXISTS `view_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pemesanan`  AS  select `tabel_pemesanan`.`id_pemesanan` AS `id_pemesanan`,`tabel_pemesanan`.`id_pelanggan` AS `id_pelanggan`,`tabel_pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tabel_pemesanan`.`id_barang` AS `id_barang`,`tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`harga_barang` AS `harga_barang`,`tabel_pemesanan`.`jumlah_pesan` AS `jumlah_pesan` from ((`tabel_pemesanan` join `tabel_pelanggan`) join `tabel_barang`) where ((`tabel_pemesanan`.`id_pelanggan` = `tabel_pelanggan`.`id_pelanggan`) and (`tabel_pemesanan`.`id_barang` = `tabel_barang`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `tabel_transaksi`.`id_transaksi` AS `id_transaksi`,`tabel_transaksi`.`tanggal_transaksi` AS `tanggal_transaksi`,`tabel_transaksi`.`id_pelanggan` AS `id_pelanggan`,`tabel_pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`tabel_transaksi`.`id_barang` AS `id_barang`,`tabel_barang`.`nama_barang` AS `nama_barang`,`tabel_barang`.`harga_barang` AS `harga_barang`,`tabel_transaksi`.`jumlah_barang` AS `jumlah_barang`,`tabel_transaksi`.`total` AS `total` from ((`tabel_transaksi` join `tabel_pelanggan`) join `tabel_barang`) where ((`tabel_transaksi`.`id_pelanggan` = `tabel_pelanggan`.`id_pelanggan`) and (`tabel_transaksi`.`id_barang` = `tabel_barang`.`id_barang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tabel_pemesanan`
--
ALTER TABLE `tabel_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pemesanan`
--
ALTER TABLE `tabel_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
