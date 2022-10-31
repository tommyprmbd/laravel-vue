-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 01:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembuat`
--

CREATE TABLE `detail_pembuat` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_berdiri_perusahaan` date NOT NULL,
  `tahun` year(4) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pembuat`
--

INSERT INTO `detail_pembuat` (`id`, `alamat`, `tanggal_berdiri_perusahaan`, `tahun`, `email`) VALUES
(1, 'jakarta', '2013-10-26', 2013, 'ptgxx@gmail.com'),
(2, 'jakarta', '2016-10-01', 2016, 'ptggg@gmail.com'),
(3, 'jakarta', '2005-10-26', 2005, 'ptzzz@gmail.com'),
(4, 'jakarta', '2008-10-01', 2008, 'pthnm@gmail.com'),
(5, 'jakarta', '2008-10-26', 2008, 'ptjjj@gmail.com'),
(6, 'jakarta', '2008-10-01', 2008, 'ptkkk@gmail.com'),
(7, 'jakarta', '2022-10-26', 0000, 'ptll@gmail.com'),
(8, 'jakarta', '2022-10-01', 0000, 'ptooo@gmail.com'),
(9, 'jakarta', '2022-10-26', 0000, 'ptppp@gmail.com'),
(10, 'jakarta', '2022-10-01', 0000, 'ptolk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transanksi`
--

CREATE TABLE `detail_transanksi` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_transanksi`
--

INSERT INTO `detail_transanksi` (`id`, `id_obat`, `id_penjualan`, `harga`) VALUES
(1, 10, 2, '100000'),
(2, 9, 3, '100000'),
(3, 2, 4, '100000'),
(4, 9, 5, '100000'),
(5, 10, 6, '100000'),
(6, 9, 7, '100000'),
(7, 2, 8, '100000'),
(8, 9, 9, '100000'),
(9, 2, 10, '100000'),
(10, 9, 11, '100000');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(70) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `tahun_kadaluarsa` year(4) NOT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `tanggal_kadaluwarsa`, `tahun_kadaluarsa`, `id_pembuat`) VALUES
(1, 'Sesak Nafas', 25, '2024-10-25', 2024, 2),
(2, 'Nyeri Sendi', 34, '2024-10-25', 2024, 1),
(3, 'Sakit Kepala', 25, '2026-10-25', 2026, 2),
(4, 'maag', 34, '2026-10-25', 2026, 2),
(5, 'betadine', 25, '2023-10-25', 2023, 2),
(6, 'asam fenamate', 34, '2029-10-25', 2029, 1),
(7, 'amoxilin', 25, '2022-10-25', 2022, 2),
(8, 'amoxilin', 34, '2029-10-25', 2029, 2),
(9, 'amoxilin', 25, '2030-10-25', 2030, 7),
(10, 'amoxilin', 34, '2026-10-25', 2026, 12);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `name`, `alamat`, `no_hp`) VALUES
(1, 'Asmeldi', 'Batam', '08124453534'),
(2, 'john doe', 'Batam', '0812476755'),
(3, 'Rio', 'Batam', '45465456'),
(4, 'Alex', 'Batam', '5765878679'),
(5, 'furqan', 'Batam', '08124453534'),
(6, 'mela', 'Batam', '-097567565'),
(7, 'akbar', 'Batam', '45465456'),
(8, 'sari', 'Batam', '5435345'),
(9, 'rendu', 'Batam', '45465456'),
(10, 'hengky', 'Batam', '53563654');

-- --------------------------------------------------------

--
-- Table structure for table `pembuat`
--

CREATE TABLE `pembuat` (
  `id` int(11) NOT NULL,
  `nama_perushaan` varchar(200) NOT NULL,
  `izin_perusahaan` varchar(200) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `id_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembuat`
--

INSERT INTO `pembuat` (`id`, `nama_perushaan`, `izin_perusahaan`, `no_telp`, `id_detail`) VALUES
(1, 'PT. XXX', 'XXX-XXXX-YYY-KKK-LLLP', '081283746212', 1),
(2, 'PT. GGG', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 2),
(5, 'PT. ZZZ', 'XXX-XXXX-YYY-KKK-LLLP', '081283746212', 3),
(6, 'PT. HNM', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 4),
(7, 'PT. JJJ', 'XXX-XXXX-YYY-KKK-LLLP', '081283746212', 5),
(8, 'PT. KKK', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 6),
(9, 'PT. LL', 'XXX-XXXX-YYY-KKK-LLLP', '081283746212', 7),
(10, 'PT. OOO', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 8),
(11, 'PT. PPP', 'XXX-XXXX-YYY-KKK-LLLP', '081283746212', 9),
(12, 'PT. OLK', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 10);

-- --------------------------------------------------------

--
-- Table structure for table `transanksi`
--

CREATE TABLE `transanksi` (
  `id` int(11) NOT NULL,
  `no_transanksi` int(25) NOT NULL,
  `total` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transanksi`
--

INSERT INTO `transanksi` (`id`, `no_transanksi`, `total`, `id_pembeli`) VALUES
(2, 325576, 100000, 1),
(3, 325576, 100000, 6),
(4, 325576, 100000, 1),
(5, 325576, 100000, 4),
(6, 325576, 100000, 6),
(7, 325576, 100000, 4),
(8, 325576, 100000, 4),
(9, 325576, 100000, 6),
(10, 325576, 100000, 9),
(11, 325576, 100000, 4),
(12, 325576, 100000, 6),
(13, 325576, 100000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembuat`
--
ALTER TABLE `detail_pembuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transanksi`
--
ALTER TABLE `detail_transanksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_penjualan` (`id_penjualan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembuat` (`id_pembuat`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembuat`
--
ALTER TABLE `pembuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_details` (`id_detail`);

--
-- Indexes for table `transanksi`
--
ALTER TABLE `transanksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelian` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembuat`
--
ALTER TABLE `detail_pembuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transanksi`
--
ALTER TABLE `detail_transanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembuat`
--
ALTER TABLE `pembuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transanksi`
--
ALTER TABLE `transanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transanksi`
--
ALTER TABLE `detail_transanksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `transanksi` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_pembuat` FOREIGN KEY (`id_pembuat`) REFERENCES `pembuat` (`id`);

--
-- Constraints for table `pembuat`
--
ALTER TABLE `pembuat`
  ADD CONSTRAINT `fk_details` FOREIGN KEY (`id_detail`) REFERENCES `detail_pembuat` (`id`);

--
-- Constraints for table `transanksi`
--
ALTER TABLE `transanksi`
  ADD CONSTRAINT `fk_pembelian` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
