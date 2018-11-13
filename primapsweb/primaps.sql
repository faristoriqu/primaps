-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 03:54 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `namabarang` text NOT NULL,
  `idkat` int(10) NOT NULL,
  `stok` int(20) NOT NULL,
  `ids` int(10) NOT NULL,
  `hargab` int(20) NOT NULL,
  `hargaj` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idbm` int(10) DEFAULT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `barangmamsukadd` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok+NEW.jumlah
    WHERE id_barang=NEW.id_barang;
    UPDATE barang SET hargaj=NEW.jual
    WHERE id_barang=NEW.id_barang;
    UPDATE barang SET hargab=NEW.harga
    WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `kode_transaksi` int(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detail`
--
DELIMITER $$
CREATE TRIGGER `kurangistok` AFTER INSERT ON `detail` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok - NEW.jumlah_beli
    WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkat` int(10) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','karyawan','','') NOT NULL,
  `id_pegawai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`, `id_pegawai`) VALUES
('3', 'tahud', 'tahu', 'karyawan', 0),
('4', 'sda', 'asdf', 'karyawan', 0),
('5', 'asd', 'sfg', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `namapegawai` text NOT NULL,
  `alamat` text NOT NULL,
  `jenkel` enum('pria','wanita') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `ids` int(10) NOT NULL,
  `namasatuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `total` int(20) NOT NULL,
  `diskon` int(20) NOT NULL,
  `bayar` int(20) NOT NULL,
  `kembalian` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `ids` (`ids`,`idkat`),
  ADD KEY `idkat` (`idkat`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD UNIQUE KEY `id_barang` (`id_barang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(100) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`ids`) REFERENCES `satuan` (`ids`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`idkat`) REFERENCES `kategori` (`idkat`) ON UPDATE CASCADE;

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
