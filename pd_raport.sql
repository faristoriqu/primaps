-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 04:23 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pd_raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_mapel`
--

CREATE TABLE `detail_mapel` (
  `kelas` int(2) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `mapel` text NOT NULL,
  `subtema` text NOT NULL,
  `kd` text NOT NULL,
  `indikator1` text NOT NULL,
  `indikator2` text NOT NULL,
  `indikator3` text NOT NULL,
  `indikator4` text NOT NULL,
  `nilai` int(2) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(40) NOT NULL,
  `nama_guru` text NOT NULL,
  `jenkel` enum('pria','wanita') NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `nis` varchar(25) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `kelas` int(2) NOT NULL,
  `semester` enum('pria','wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `kelas` int(2) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kelas` int(2) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama_siswa` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `jenkel` enum('pria','wanita','','') NOT NULL,
  `agama` varchar(50) NOT NULL,
  `ayah` text NOT NULL,
  `ibu` text NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD KEY `semester` (`semester`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD KEY `nis` (`nis`,`nip`,`kelas`,`semester`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas` (`kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD CONSTRAINT `detail_mapel_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `mapel` (`kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_mapel_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `mapel` (`semester`) ON UPDATE CASCADE;

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_3` FOREIGN KEY (`kelas`) REFERENCES `mapel` (`kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_4` FOREIGN KEY (`semester`) REFERENCES `mapel` (`semester`) ON UPDATE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
