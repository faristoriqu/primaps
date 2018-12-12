-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2018 pada 08.34
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prima`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `namabarang`, `idkat`, `stok`, `ids`, `hargab`, `hargaj`) VALUES
(2, '124p', 1, 5, 2, 300000, 300000),
(5, 'premix', 1, 19, 3, 100000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `nofaktur` varchar(10) DEFAULT NULL,
  `tgl` date NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_supplier` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`nofaktur`, `tgl`, `id_barang`, `id_supplier`, `jumlah`, `harga`, `jual`) VALUES
('1234', '2018-12-12', 2, 4, 5, 300000, 300000),
('1234', '2018-12-12', 5, 4, 5, 100000, 100000);

--
-- Trigger `barangmasuk`
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
-- Struktur dari tabel `barangmasuk_tmp`
--

CREATE TABLE `barangmasuk_tmp` (
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `jual` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangmasuk_tmp`
--

INSERT INTO `barangmasuk_tmp` (`id_barang`, `jumlah`, `harga`, `jual`) VALUES
(2, 2, 300000, 300000),
(5, 2, 100000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `kode_transaksi` varchar(100) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`kode_transaksi`, `id_barang`, `jumlah_beli`) VALUES
('TRS0001', 2, 1),
('TRS0001', 5, 1),
('TRS000002', 2, 12),
('TRS000003', 5, 2),
('TRS000004', 2, 1),
('TRS000004', 5, 1),
('TRS000005', 2, 1),
('TRS000017', 2, 2),
('TRS000017', 2, 3),
('TRS000017', 2, 1),
('TRS000017', 5, 1);

--
-- Trigger `detail`
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
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `kode_pemesanan` int(11) NOT NULL,
  `id_po` int(10) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`kode_pemesanan`, `id_po`, `jumlah`) VALUES
(0, 0, 1),
(0, 1, 1),
(0, 2, 2),
(0, 0, 1),
(0, 1, 1),
(0, 2, 2),
(0, 0, 1),
(0, 1, 1),
(0, 2, 2),
(0, 0, 1),
(0, 1, 1),
(0, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkat` int(10) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkat`, `kategori`) VALUES
(1, 'pakan'),
(2, 'obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('admin','karyawan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `level`) VALUES
('1', 'admin', 'admin', 'admin'),
('2', 'safina', 'safii', 'karyawan'),
('80', 'yusuf', 'kjjkbkln', 'karyawan'),
('89', 'khizam', 'asdfjisdfjis', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kode_pemesanan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(20) NOT NULL,
  `bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`kode_pemesanan`, `tanggal`, `total`, `bayar`) VALUES
('', '2018-06-12', 1056000, 0),
('PSN000002', '2018-06-12', 1056000, 0),
('PSN000003', '2018-06-12', 1056000, 0),
('PSN000004', '2018-06-12', 1056000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_tmp`
--

CREATE TABLE `pemesanan_tmp` (
  `id_po` int(10) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id_po` int(10) NOT NULL,
  `nama` text NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id_po`, `nama`, `harga`) VALUES
(1, 'pullet isa brown', 56000),
(2, 'doc wonokoyo', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `ids` int(10) NOT NULL,
  `namasatuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`ids`, `namasatuan`) VALUES
(2, 'sak'),
(3, 'kilo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `namasupplier` text NOT NULL,
  `alamat` text NOT NULL,
  `telefon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `namasupplier`, `alamat`, `telefon`) VALUES
(4, 'pokphan', 'surabaya arjasa', '089633150044');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(20) NOT NULL,
  `potongan` int(20) NOT NULL,
  `bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tanggal`, `total`, `potongan`, `bayar`) VALUES
('TRS000002', '2018-07-12', 4560000, 0, 0),
('TRS000003', '2018-12-09', 30000, 0, 0),
('TRS000004', '2018-12-09', 395000, 0, 0),
('TRS000005', '2018-12-10', 380000, 0, 0),
('TRS000006', '2018-12-10', 0, 0, 0),
('TRS000007', '2018-12-10', 0, 0, 0),
('TRS000008', '2018-12-10', 0, 0, 0),
('TRS000009', '2018-12-10', 0, 0, 0),
('TRS000010', '2018-12-10', 0, 0, 0),
('TRS000011', '2018-12-10', 0, 0, 0),
('TRS000012', '2018-12-10', 0, 0, 0),
('TRS000013', '2018-12-10', 0, 0, 0),
('TRS000014', '2018-12-10', 0, 0, 0),
('TRS000015', '2018-12-10', 0, 0, 0),
('TRS000016', '2018-12-10', 0, 0, 0),
('TRS000017', '2018-12-11', 400000, 0, 410000),
('TRS0001', '2018-08-12', 395000, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_tmp`
--

CREATE TABLE `transaksi_tmp` (
  `id_barang` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `sid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_tmp`
--

INSERT INTO `transaksi_tmp` (`id_barang`, `jumlah`, `sid`) VALUES
(2, 2, '5r83gq3vkg6uc50akjcjd5o95l'),
(5, 3, '5r83gq3vkg6uc50akjcjd5o95l');

--
-- Trigger `transaksi_tmp`
--
DELIMITER $$
CREATE TRIGGER `tmp` AFTER INSERT ON `transaksi_tmp` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok - NEW.jumlah
    WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tmpdel` AFTER DELETE ON `transaksi_tmp` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok + OLD.jumlah
    WHERE id_barang=OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatetmp` AFTER UPDATE ON `transaksi_tmp` FOR EACH ROW BEGIN
	IF NEW.jumlah <> OLD.jumlah THEN
    	UPDATE barang SET stok=stok+OLD.jumlah
        WHERE id_barang=NEW.id_barang;
        
        
        UPDATE barang SET stok=stok-NEW.jumlah
        WHERE id_barang=NEW.id_barang;
        END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `ids` (`ids`,`idkat`),
  ADD KEY `idkat` (`idkat`);

--
-- Indeks untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD UNIQUE KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`ids`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `id_po` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`ids`) REFERENCES `satuan` (`ids`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`idkat`) REFERENCES `kategori` (`idkat`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barangmasuk_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
