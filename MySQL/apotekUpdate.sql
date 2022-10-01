-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2022 pada 01.52
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `id_supplier` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `harga_barang`, `stok_barang`, `id_supplier`) VALUES
('ob0001', 'bodrex', 'tablet', 2000, 1000, 1),
('ob0002', 'komix', 'sachet cair', 1000, 400, 2),
('ob0003', 'vitamin C', 'botol', 10000, 400, 3),
('ob0004', 'paramex', 'sachet', 1000, 40, 4),
('ob0005', 'paracetamol', 'botol', 2000, 20, 5),
('ob0006', 'ibuprofen 100mg', 'botol', 5000, 70, 6),
('ob0007', 'panadol', 'kotak', 8000, 50, 7),
('ob0008', 'Biogesic Pracetamol', 'kotak', 8000, 50, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id_cabang` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telepon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama`, `alamat`, `no_telepon`) VALUES
(1, 'apotek setia budi', 'jl setia budi no 14 medan', '021-6563-3129'),
(2, 'apotek belawan', 'jl medan labuhan', '021-6563-3008'),
(3, 'apotek marelan raya', 'jl marelan pasar 2', '021-6563-3120'),
(4, 'apotek naga mas', 'jl asia megamas', '021-6563-3023'),
(5, 'apotek langkat', 'jl langkat 2', '021-6563-0929'),
(6, 'apotek griya', 'jl cemara asri', '021-6563-3125'),
(7, 'apotek pancing', 'jl suluh no 31', '021-6563-4455'),
(8, 'apotek sumatera', 'jl ks tubun', '021-6563-8921'),
(9, 'apotek berastagi', 'jl letda sujono', '021-6563-2123'),
(10, 'apotek karya', 'jl sei agul 21', '021-6563-6721');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `no_telepon`, `id_karyawan`) VALUES
('cust0001', 'Bp. Imran', 'jl kra surakarta', '081254547676', 'k0002'),
('cust0002', 'wardi', 'jl ciamis ', '08129137878', 'k0009'),
('cust0003', 'wisran', 'jl lembing 21', '081256532171', 'k0001'),
('cust0004', 'Bp sulaiman', 'jl mesjid', '081254544321', 'k0002'),
('cust0005', 'Ibu nuraini', 'jl gaperta', '081256532109', 'k0002'),
('cust0006', 'Bp arman', 'jl jalan', '081290903270', 'k0002'),
('cust0007', 'Ibu hayati', 'jl kemana', '081256532121', 'k0009'),
('cust0008', 'Ibu riri', 'jl medan pakam', '081290905621', 'k0002'),
('cust0009', 'Ibu siska', 'jl gurami', '081256533398', 'k0009'),
('cust0010', 'Bp suratman', 'jl riau kapuas ', '081290905655', 'k0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `id_cabang` int(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `status_karyawan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `id_cabang`, `alamat`, `status_karyawan`) VALUES
('k0001', 'rizqi', 2, 'jl palem bandung', 'pegawai kontrak'),
('k0002', 'andreas', 1, 'jl sei rampah', 'pegawai tetap'),
('k0003', 'irfan', 3, 'jl sei serayu', 'pegawai tetap'),
('k0004', 'abdi', 4, 'Jl. HR. Rasuna Said, Jakarta', 'pegawai tetap'),
('k0005', 'wendi', 9, 'jl siakad', 'pegawai kontrak'),
('k0006', 'ridho', 10, 'helvetia, medan.', 'pegawai kontrak'),
('k0007', 'rifky', 6, 'setia budi, medan.', 'pegawai kontrak'),
('k0008', 'reza', 5, 'jl asrama', 'pegawai tetap'),
('k0009', 'evan', 7, 'setia budi, medan.', 'pegawai kontrak'),
('k0010', 'wira', 8, 'jl medan binjai', 'pegawai tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `nomor_order` int(10) NOT NULL,
  `tanggal_order` date NOT NULL,
  `id_customer` char(10) NOT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `total_pembayaran` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`nomor_order`, `tanggal_order`, `id_customer`, `tanggal_pembayaran`, `total_pembayaran`) VALUES
(1, '2022-09-01', 'cust0007', NULL, NULL),
(2, '2022-09-02', 'cust0002', NULL, NULL),
(3, '2022-09-14', 'cust0006', NULL, NULL),
(4, '2022-09-15', 'cust0001', NULL, NULL),
(5, '2022-09-16', 'cust0003', NULL, NULL),
(6, '2022-09-17', 'cust0004', NULL, NULL),
(7, '2022-09-18', 'cust0005', NULL, NULL),
(8, '2022-09-18', 'cust0008', NULL, NULL),
(9, '2022-09-19', 'cust0009', NULL, NULL),
(10, '2022-09-19', 'cust0010', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_details`
--

CREATE TABLE `orders_details` (
  `nomor_order` int(10) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders_details`
--

INSERT INTO `orders_details` (`nomor_order`, `jumlah_order`, `id_barang`) VALUES
(4, 12, 'ob0007'),
(2, 10, 'ob0002'),
(9, 40, 'ob0002'),
(10, 30, 'ob0002'),
(1, 10, 'ob0007'),
(10, 20, 'ob0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `no_telepon`, `email`) VALUES
(1, 'PT Tempo Scan Pacific Tbk', 'Jl. HR. Rasuna Said, Jakarta', '021 29218888', 'investorrelation@thetempogroup.com'),
(2, 'PT Kalbe Farma Tbk', 'Jl. Let. Jend Suprapto, Jakarta', '021 4256326', 'corp.comm@kalbe.co.id'),
(3, 'PT Djojonegoro C-100', 'Jl. Gatot Subroto kav.99 Indonesia', '021 79181416', 'contact@youc1000.com'),
(4, 'PT Konimex', 'Desa Sanggrahan, Grogol Sukoharjo', '021-3141856', 'customer_service@konimex.com'),
(5, 'PT Novapharin', 'Jalan Raya Kepatihan 112 Menganti, Gresik', '031 799461416', 'marketing1@novapharin.co.id'),
(6, 'PT Pyridam farma tbk', 'Jl jend sudirman jakarta selatan', '021 7911416', 'marketing@pyridam.co.id'),
(7, 'GSK Group', NULL, '01803442632', 'in.customer-relations@gsk.com'),
(8, 'PT Mandjur Sehat Abadi', 'HOS Cokroaminoto No 1, Menteng, Jakarta ', '021-31927481', 'admin@mandjur.co.id');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `FK_barang` (`id_supplier`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id_cabang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `FK_customer` (`id_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `FK_karyawan` (`id_cabang`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`nomor_order`),
  ADD KEY `FK_orders` (`id_customer`);

--
-- Indeks untuk tabel `orders_details`
--
ALTER TABLE `orders_details`
  ADD KEY `FK_orders_details` (`nomor_order`),
  ADD KEY `FK_orders_details1` (`id_barang`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `nomor_order` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `FK_karyawan` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `FK_orders_details` FOREIGN KEY (`nomor_order`) REFERENCES `orders` (`nomor_order`),
  ADD CONSTRAINT `FK_orders_details1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
