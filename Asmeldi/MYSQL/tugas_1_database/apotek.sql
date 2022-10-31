-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2022 pada 09.37
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(70) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `id_pembuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `tanggal_kadaluwarsa`, `id_pembuat`) VALUES
(1, 'Sesak Nafas', 25, '2028-10-25', 2),
(2, 'Nyeri Sendi', 34, '2028-10-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembuat`
--

CREATE TABLE `pembuat` (
  `id` int(11) NOT NULL,
  `nama_perushaan` varchar(200) NOT NULL,
  `izin_perusahaan` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembuat`
--

INSERT INTO `pembuat` (`id`, `nama_perushaan`, `izin_perusahaan`, `alamat`, `no_telp`) VALUES
(1, 'PT. XXX', 'XXX-XXXX-YYY-KKK-LLLP', 'Jakarta', '081283746212'),
(2, 'PT. GGG', 'LLLP-XXXX-YYY-KKK-HGYD', 'Jakarta', '081283746212');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembuat` (`id_pembuat`);

--
-- Indeks untuk tabel `pembuat`
--
ALTER TABLE `pembuat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembuat`
--
ALTER TABLE `pembuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_pembuat` FOREIGN KEY (`id_pembuat`) REFERENCES `pembuat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
