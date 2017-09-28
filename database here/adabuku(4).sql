-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 12:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adabuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id_buku` int(11) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `penerbit` varchar(11) NOT NULL,
  `penulis` varchar(11) NOT NULL,
  `noisbn` varchar(20) NOT NULL,
  `picture` varchar(40) NOT NULL,
  `date` year(4) NOT NULL,
  `harga_pokok` varchar(20) NOT NULL,
  `ppn` varchar(20) NOT NULL,
  `diskon` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `stok` varchar(11) NOT NULL,
  `sisa` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penerbit`, `penulis`, `noisbn`, `picture`, `date`, `harga_pokok`, `ppn`, `diskon`, `harga_jual`, `stok`, `sisa`) VALUES
(6, 'Hacking So Easy', 'Hacker', 'Jim', '11111', 'mr.robot.jpg', 2013, '50000', '0.1', '', '55000', '19', ''),
(7, 'Harry Potter', 'Elex Media', 'J.K Rownlin', '914718', 'images.jpg', 1999, '50000', '0.4', '', '70000', '18', ''),
(8, 'Hacking Again', 'Hacker', 'Jim', '888888', 'download-buku-tutorial-hacking-dasar.jpg', 2015, '50000', '0.4', '', '70000', '19', ''),
(9, 'D. Conan', 'Elex Media', 'Edogawa', '123456', '9786020299983.jpg', 2000, '13000', '0.4', '', '18200', '20', ''),
(10, 'Persaudaraan Agama2', 'mizan', 'Millah Ibra', '234567', 'covIM-116.jpg', 2013, '35000', '0.4', '', '49000', '16', ''),
(25, 'asda', 'asdasd', 'asdasd', 'asdasd', 'high-strung.jpg', 0000, '20000', '0.1', '1', '21999', '14', ''),
(29, 'Harry Potter', 'Marvel', 'maryon', '12313', 'kamen-all.jpg', 2013, '20000', '0.1', '1', '21999', '58', ''),
(30, 'asda', 'asdasd', 'asdad', 'asdasd', 'mr-bean.jpg', 2013, '25000', '0.4', '', '35000', '10', ''),
(32, 'toy story 3', 'Disney', 'Rowan Awk', '56667', '220px-Small_Fry_poster.jpg', 2015, '25000', '0.4', '10', '34990', '20', ''),
(33, 'Juzama', 'Prestasi Ut', 'Abu Muhamma', '56789', '62JUZ AMMA & TERJEMAHAN.jpg', 2000, '20000', '0.1', '1', '21999', '20', ''),
(35, 'History Of Jobs', 'Apple', 'Steve Mozia', '678910', 'Biografia-de-Steve-Jobs3-925x1024.jpg', 2013, '100000', '0.4', '1', '139999', '22', '');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
`id_distributor` int(11) NOT NULL,
  `nama_distributor` varchar(30) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(2, 'Wanwa', 'Bojong Herang', '2311231'),
(3, 'Ujang', 'Gg.Wareng', '08888');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
`id_kasir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(65) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `photo` text NOT NULL,
  `akses` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telpon`, `status`, `username`, `password`, `photo`, `akses`) VALUES
(9, 'Raihan', 'Ciwaru', '0899999', 0, 'ras', 'MTIzcmF5', 'IMG_20160710_062854.jpg', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE IF NOT EXISTS `pasok` (
`id_pasok` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `date`, `id_distributor`, `id_buku`, `jumlah`) VALUES
(2, '2017-02-10', 1, 5, '10'),
(5, '2017-02-16', 2, 29, '20'),
(6, '2017-02-16', 2, 29, '20'),
(7, '2017-02-16', 2, 7, '20'),
(8, '2017-02-16', 3, 30, '8');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`id_penjualan` int(11) NOT NULL,
  `date` date NOT NULL,
  `judul` varchar(30) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `jumlah` varchar(64) NOT NULL,
  `harga_jual` varchar(20) NOT NULL,
  `total` varchar(64) NOT NULL,
  `laba` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `date`, `judul`, `id_buku`, `id_kasir`, `jumlah`, `harga_jual`, `total`, `laba`) VALUES
(20, '2017-02-16', 'Hacking Again', 8, 9, '1', '70000', '70000', '20000'),
(33, '2017-02-16', 'asda', 25, 9, '6', '21999', '131994', '11994'),
(34, '2017-02-16', 'asda', 30, 9, '6', '35000', '210000', '60000'),
(36, '2017-02-16', 'Harry Potter', 29, 9, '2', '21999', '43998', '3998');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
 ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
 ADD PRIMARY KEY (`id_pasok`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
