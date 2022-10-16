-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 02:21 PM
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
  `domisili` varchar(32) NOT NULL,
  `agama` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `instagram` varchar(64) DEFAULT NULL,
  `facebook` varchar(64) DEFAULT NULL,
  `twitter` varchar(64) DEFAULT NULL,
  `youtube` varchar(64) DEFAULT NULL,
  `linkedin` varchar(64) NOT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembuat`
--

INSERT INTO `detail_pembuat` (`id`, `domisili`, `agama`, `email`, `instagram`, `facebook`, `twitter`, `youtube`, `linkedin`, `id_pembuat`) VALUES
(1, 'Bandung', 'Kristen', 'andre14@gmail.com', 'andre14', 'Andre14', 'Andre14', 'Andre14', 'www.linkedin.com/in/Andre14', 1),
(2, 'Malang', 'Kristen', 'Kurniawan12@gmail.com', 'Kurniawan12', 'Kurniawan12', 'Kurniawan12', 'Kurniawan12', 'www.linkedin.com/in/Kurniawan12', 2),
(3, 'Jakarta', 'Kristen', 'Rusli13@gmail.com', 'Rusli13', 'Rusli13', 'Rusli13', 'Rusli13', 'www.linkedin.com/in/Rusli13', 3),
(4, 'Surabaya', 'Kristen', 'Dani15@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Dani15', 4),
(5, 'Yogyakarta', 'Kristen', 'Rosi30@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Rosi30', 5),
(6, 'Banten', 'Kristen', 'Maguire21@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Maguire21', 6),
(7, 'Bengkulu', 'Kristen', 'Larry29@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Larry29', 7),
(8, 'Pekanbaru', 'Kristen', 'Nick300@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Nick300', 8),
(9, 'Samarinda', 'Kristen', 'Ramos21@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Ramos21', 9),
(10, 'Salatiga', 'Kristen', 'Lestari20@gmail.com', NULL, NULL, NULL, NULL, 'www.linkedin.com/in/Lestari20', 10);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_obat`, `id_transaksi`, `harga`) VALUES
(1, 1, 1, 200000),
(2, 2, 2, 300000),
(3, 3, 3, 400000),
(4, 4, 4, 300000),
(5, 5, 5, 250000),
(6, 6, 6, 700000),
(7, 7, 7, 1000000),
(8, 8, 8, 600000),
(9, 9, 9, 800000),
(10, 10, 10, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(32) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `tanggal_kadaluwarsa`, `id_pembuat`) VALUES
(1, 'Glutamin Fernodius', 20, '2030-10-25', 1),
(2, 'Paracetamol 24', 30, '2031-10-30', 2),
(3, 'Glukosin Suroksida', 30, '2030-10-20', 3),
(4, 'Peroksin Lokoma', 25, '2031-10-22', 4),
(5, 'Raguna Silko', 30, '2031-10-02', 5),
(6, 'Lisono Maguna', 100, '2031-10-23', 6),
(7, 'Kirson Lativa', 90, '2031-10-25', 7),
(8, 'Numero Silom', 30, '2031-10-08', 8),
(9, 'Simosa Lamaso', 20, '2031-10-23', 9),
(10, 'Lingko Sumasi', 40, '2031-10-14', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'Andreas', 'Jalan Primaraja no. 10', '085627790011'),
(2, 'Kurniawan', 'Jalan Kebangsaan no.2', '089910109090'),
(3, 'Rusli', 'Jalan Menara no. 17', '089202008000'),
(4, 'Doni', 'Jalan Merdeka no. 9', '087820209991'),
(5, 'Prangestu', 'Jalan Malin Kundang no. 80', '087771009090'),
(6, 'Bima', 'Jalan Mundur no. 20', '087720218989'),
(7, 'Timo', 'Jalan Kebangsaan no 91', '088792830900'),
(8, 'Mike', 'Jalan Prambanan no 10', '081020903874'),
(9, 'Luke', 'Jalan Rambunan no. 10', '087629899076'),
(10, 'Sebastian', 'Jalan Maju no. 76', '087520202973');

-- --------------------------------------------------------

--
-- Table structure for table `pembuat`
--

CREATE TABLE `pembuat` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembuat`
--

INSERT INTO `pembuat` (`id`, `nama`, `tanggal_lahir`, `alamat`, `no_tlp`) VALUES
(1, 'Andreas', '1992-10-08', 'Jalan Kebangsaan no. 2', '087920201090'),
(2, 'Kurniawan', '1992-10-13', 'Jalan Mentari No. 20', '087820398010'),
(3, 'Rusli', '1992-10-20', 'Jalan Sentul no. 19', '081723459018'),
(4, 'Dani', '1992-10-31', 'Jalan Limau no. 200', '087820209735'),
(5, 'Rosi', '1992-10-27', 'Jalan Merantau no. 109', '082930308080'),
(6, 'Maguire', '1992-10-04', 'Jalan Lima no. 5', '082180762020'),
(7, 'Larry', '1992-08-19', 'Jalan Pulau no. 80', '086720293017'),
(8, 'Nick', '1983-10-27', 'Jalan Benua no. 10', '082090903876'),
(9, 'Ramos', '1992-10-31', 'Jalan Merintis no. 90', '087612123000'),
(10, 'Lestari', '1994-10-10', 'Jalan Sumbawa no. 30', '087230809192');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal_beli`, `total`, `id_pembeli`) VALUES
(1, '2022-10-11', 2, 1),
(2, '2022-10-11', 2, 2),
(3, '2022-10-13', 2, 3),
(4, '2022-10-11', 2, 4),
(5, '2022-10-21', 2, 5),
(6, '2022-10-09', 2, 6),
(7, '2022-10-14', 2, 7),
(8, '2022-10-12', 2, 8),
(9, '2022-10-15', 3, 9),
(10, '2022-10-03', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembuat`
--
ALTER TABLE `detail_pembuat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembuat_detail_pembuat` (`id_pembuat`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obat` (`id_obat`),
  ADD KEY `fk_transaksi` (`id_transaksi`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembeli` (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembuat`
--
ALTER TABLE `detail_pembuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembuat`
--
ALTER TABLE `detail_pembuat`
  ADD CONSTRAINT `fk_pembuat_detail_pembuat` FOREIGN KEY (`id_pembuat`) REFERENCES `pembuat` (`id`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_pembuat` FOREIGN KEY (`id_pembuat`) REFERENCES `pembuat` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
