-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2022 pada 07.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` char(14) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `alamat`, `no_hp`, `id_level`) VALUES
(1, 'Joko', 'Berbah', '089782465323', 2),
(2, 'Dono', 'Kalasan', '089678287981', 2),
(3, 'Dina', 'Kalasan', '089463734831', 2),
(4, 'Dio', 'Maguwo', '082849274478', 2),
(5, 'Nana', 'Pogung', '085903984333', 2),
(6, 'Iky', 'Sleman', '089668376482', 2),
(7, 'Beni', 'Godean', '081789876345', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `no_hp` char(14) NOT NULL,
  `alamat` text NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama_penjual`, `no_hp`, `alamat`, `id_level`) VALUES
(1, 'Andini', '085789123654', 'Jogja', 1),
(2, 'Alfiah', '081872614889', 'Banguntapan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'penjual'),
(2, 'pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga` char(10) NOT NULL,
  `stok` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama`, `jenis`, `harga`, `stok`) VALUES
(1, 'Isprinol Sirup 60 ml', 'Cair', '88.900', '10'),
(2, 'Aciclovir 400 mg 10 Tablet', 'Tablet', '13.000', '23'),
(3, 'Methisoprinol 500 mg 10 Tablet', 'Tablet', '35.400', '17'),
(5, 'Acifar 400 mg 10 Tablet', 'Tablet', '9.500', '13'),
(7, 'Paramex Flu & Batuk PE 4 Tablet', 'Tablet', '3.000', '17'),
(8, 'OBH Combi Plus Batuk Flu Menthol 60 ml', 'Cair', '15.300', '6'),
(9, 'Dexteem Plus 10 Tablet', 'Tablet', '2.500', '5'),
(10, 'Cetrizine 10 ml Drops', 'Cair', '14.500', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah_beli` char(10) NOT NULL,
  `total_harga` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `tgl_transaksi`, `id_penjual`, `id_pembeli`, `id_obat`, `jumlah_beli`, `total_harga`) VALUES
(1, '2022-09-20', 2, 1, 2, '1', '12.800'),
(4, '2022-09-20', 2, 2, 7, '3', '9.000'),
(5, '2022-09-21', 1, 2, 9, '2', '6.000'),
(6, '2022-09-16', 2, 7, 7, '2', '6.000'),
(7, '2022-09-10', 2, 4, 8, '1', '15.300'),
(8, '2022-09-18', 1, 5, 1, '1', '88.900'),
(9, '2022-09-19', 1, 3, 9, '2', '5.000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD CONSTRAINT `pembeli_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `penjual`
--
ALTER TABLE `penjual`
  ADD CONSTRAINT `penjual_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
