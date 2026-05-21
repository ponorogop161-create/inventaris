-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 02:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_db`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `kembali_barang` (IN `p_id_pinjam` INT, IN `p_id_barang` INT, IN `p_jumlah` INT)   BEGIN

   -- Simpan pengembalian
   INSERT INTO pengembalian(
      id_pinjam,
      tanggal_kembali,
      jumlah_kembali
   )
   VALUES(
      p_id_pinjam,
      CURDATE(),
      p_jumlah
   );

   -- Tambah stok barang
   UPDATE barang
   SET jumlah = jumlah + p_jumlah
   WHERE id_barang = p_id_barang;

   -- Update status
   UPDATE peminjaman
   SET status='Dikembalikan'
   WHERE id_pinjam = p_id_pinjam;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pinjam_barang` (IN `p_id_user` INT, IN `p_id_barang` INT, IN `p_jumlah` INT)   BEGIN

   INSERT INTO peminjaman(
      id_user,
      id_barang,
      jumlah_pinjam,
      tanggal_pinjam,
      status
   )
   VALUES(
      p_id_user,
      p_id_barang,
      p_jumlah,
      CURDATE(),
      'Dipinjam'
   );

   UPDATE barang
   SET jumlah = jumlah - p_jumlah
   WHERE id_barang = p_id_barang;

END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `status_barang` (`jumlah` INT) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN

   DECLARE hasil VARCHAR(20);

   IF jumlah <= 0 THEN
       SET hasil = 'Habis';
   ELSE
       SET hasil = 'Tersedia';
   END IF;

   RETURN hasil;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kondisi_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah`, `kondisi_barang`) VALUES
(1, 'Kulkas', 1, 'Rusak'),
(2, 'Laptop', 6, 'Baik'),
(3, 'Handphone', 22, 'Baik'),
(4, 'Sepatu', 10, 'Rusak'),
(5, 'Topi', 8, 'Baik'),
(6, 'Charge', 6, 'Baik'),
(7, 'Lap', 0, 'Baik'),
(8, 'Laptop asus', 2, 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_pinjam` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_user`, `id_barang`, `jumlah_pinjam`, `tanggal_pinjam`, `status`) VALUES
(2, 2, 2, 2, '2026-05-20', 'Dikembalikan'),
(3, 2, 3, 1, '2026-05-20', 'Dipinjam'),
(4, 2, 4, 2, '2026-05-20', 'Dipinjam'),
(5, 2, 5, 3, '2026-05-20', 'Dikembalikan'),
(6, 3, 1, 2, '2026-05-20', 'Dipinjam'),
(7, 2, 6, 1, '2026-05-20', 'Dipinjam'),
(8, 2, 8, 1, '2026-05-20', 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `jumlah_kembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_pinjam`, `tanggal_kembali`, `jumlah_kembali`) VALUES
(1, 1, '2026-05-20', 1),
(2, 1, '2026-05-20', 1),
(3, 1, '2026-05-20', 1),
(4, 1, '2026-05-20', 1),
(5, 2, '2026-05-20', 2),
(6, 5, '2026-05-20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` enum('admin','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin123', 'admin'),
(2, 'Ahmat Fauzi', 'fauzi', '12345', 'peminjam'),
(3, 'Doni', 'doni', '12345', 'peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
