-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 04:03 AM
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
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail_pembuat`
--

INSERT INTO `detail_pembuat` (`id`, `alamat`, `tanggal_berdiri_perusahaan`, `email`) VALUES
(1, 'jakarta', '2022-10-26', 'ptgxx@gmail.com'),
(2, 'jakarta', '2022-10-01', 'ptggg@gmail.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(70) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `tanggal_kadaluwarsa`, `id_pembuat`) VALUES
(1, 'Sesak Nafas', 25, '2028-10-25', 2),
(2, 'Nyeri Sendi', 34, '2028-10-25', 1);

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
(2, 'PT. GGG', 'LLLP-XXXX-YYY-KKK-HGYD', '081283746212', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_transanksi`
--
ALTER TABLE `detail_transanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembuat`
--
ALTER TABLE `pembuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transanksi`
--
ALTER TABLE `transanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
