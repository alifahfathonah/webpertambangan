-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2019 pada 15.50
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penyewaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` varchar(30) NOT NULL,
  `nama_category` varchar(20) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `nama_category`, `nilai`) VALUES
('KTG-34331', 'Alat Tambang minyak ', 22),
('KTG-37833', 'Alat uji minyak bumi', 11),
('KTG-40279', 'Mesin Bor', 23),
('KTG-42021', 'Alat Survey', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kualitas`
--

CREATE TABLE `tb_kualitas` (
  `id_kualitas` varchar(30) NOT NULL,
  `nama_kualitas` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kualitas`
--

INSERT INTO `tb_kualitas` (`id_kualitas`, `nama_kualitas`, `nilai`) VALUES
('KLL-28041', 'bersertifikat/bagus', 14),
('KLL-98131', 'tidak bersertifikat/standart', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id_merk` varchar(30) NOT NULL,
  `nama_merk` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`id_merk`, `nama_merk`, `nilai`) VALUES
('KTG-11788', 'Keniko', 8),
('KTG-30283', 'South', 9),
('KTG-31478', 'NDJ-55', 10),
('KTG-34525', 'BESTWILL', 3),
('KTG-44604', 'Garmin', 8),
('KTG-47984', 'Henan', 2),
('KTG-49145', 'Topcon DT 209', 11),
('KTG-55287', 'Guangdong', 4),
('KTG-57588', 'Vicam Mechatronics', 5),
('KTG-80402', 'Hanfa', 6),
('KTG-82405', 'Naniura', 7),
('KTG-89121', 'YJS-150', 14),
('KTG-93477', 'VA8040', 16),
('KTG-95232', 'ASTM (E100) ', 12),
('KTG-98910', 'Ohaus-PX22', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(30) NOT NULL,
  `id_sewa` varchar(30) NOT NULL,
  `pembayaran_awal` int(11) NOT NULL,
  `pembayaran_akhir` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_sewa`, `pembayaran_awal`, `pembayaran_akhir`, `status_pembayaran`, `bukti`) VALUES
('PMB-40107', '119', 7200000, 16800000, 2, '643c7b56aeae02a304ccb182e2c94083.jpg'),
('PMB-87855', '76', 3600000, 0, 1, '9c0539568b97aa69c4753f22c8af9ee0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penyewaaan`
--

CREATE TABLE `tb_penyewaaan` (
  `id_sewa` varchar(30) NOT NULL,
  `id_users` varchar(30) NOT NULL,
  `id_product` varchar(30) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `alamat` text NOT NULL,
  `alamat_pt` text NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `biaya` int(11) NOT NULL,
  `biaya_dp` int(11) NOT NULL,
  `status_penyewaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penyewaaan`
--

INSERT INTO `tb_penyewaaan` (`id_sewa`, `id_users`, `id_product`, `tgl_sewa`, `tgl_pengembalian`, `alamat`, `alamat_pt`, `kota`, `kode_pos`, `biaya`, `biaya_dp`, `status_penyewaan`) VALUES
('119', 'USR-104', 'PRO-49152', '2019-11-28', '2019-11-30', 'jalan kesadaran raya no 12 A RT.03/01', 'jalan kesadaran raya no 12 A RT.03/01', 'Jakarta', 13420, 24000000, 7200000, 4),
('76', 'USR-104', 'PRO-49152', '2019-11-28', '2019-11-29', 'jalan kesadaran raya no 12 A RT.03/01', 'jalan kesadaran raya no 12 A RT.03/01', 'Jakarta', 13420, 12000000, 3600000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` varchar(30) NOT NULL,
  `nama_product` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kualitas` varchar(30) NOT NULL,
  `id_merk` varchar(30) NOT NULL,
  `id_tujuan` varchar(30) NOT NULL,
  `id_category` varchar(30) NOT NULL,
  `berat` int(11) NOT NULL,
  `kedalaman` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `nama_product`, `harga`, `id_kualitas`, `id_merk`, `id_tujuan`, `id_category`, `berat`, `kedalaman`, `foto`) VALUES
('PRO-49152', 'Bore Hole camera', 12000000, 'KLL-28041', 'KTG-47984', 'TJ-21868', 'KTG-42021', 30, 0, 'a42d7ab6fba35bc6d1470d650de44e6c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tujuan`
--

CREATE TABLE `tb_tujuan` (
  `id_tujuan` varchar(30) NOT NULL,
  `nama_tujuan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tujuan`
--

INSERT INTO `tb_tujuan` (`id_tujuan`, `nama_tujuan`, `nilai`) VALUES
('TJ-11269', 'untuk memberikan gambaran lubang bawah tanah hingga 200m', 200),
('TJ-21868', 'untuk pengeboran dengan kedalaman 100m', 110),
('TJ-21906', 'untuk mengukur kekerasan batu', 13),
('TJ-59783', 'untuk memberikan gambaran lubang bawah tanah hingga 100m', 100),
('TJ-61619', 'untuk mengetahui persebaran mineral di dalam lapisan tanah', 12),
('TJ-74863', 'untuk pemetaan suatu daerah pertambangan', 15),
('TJ-76290', 'untuk memberikan gambaran lubang bawah tanah hingga 120m', 120),
('TJ-76820', 'memberikan gambaran lubang bawah tanah hingga 150m', 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_depan` varchar(15) NOT NULL,
  `nama_belakang` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nomor_telp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `nama_depan`, `nama_belakang`, `email`, `nomor_telp`, `password`, `type`) VALUES
('USR-104', 'kocak', 'Prasetya', 'Hadi', 'prasetya2423@gmail.com', '089746736284', 'c6c30eed246c03ebb9eef7b46a5f006b', 0),
('USR-55', 'admin', 'adm', 'adm', 'admin@gmail.com', '089746736284', 'b8f8312b939f00abb38eeafd4fd107f3', 1),
('USR-87', 'lucu', 'kocak', 'kocak', 'prasetya2421@gmail.com', '089746736284', 'b8f8312b939f00abb38eeafd4fd107f3', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tb_kualitas`
--
ALTER TABLE `tb_kualitas`
  ADD PRIMARY KEY (`id_kualitas`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `tb_penyewaaan`
--
ALTER TABLE `tb_penyewaaan`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_kualitas` (`id_kualitas`),
  ADD KEY `id_merk` (`id_merk`),
  ADD KEY `id_tujuan` (`id_tujuan`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `tb_tujuan`
--
ALTER TABLE `tb_tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `tb_penyewaaan` (`id_sewa`);

--
-- Ketidakleluasaan untuk tabel `tb_penyewaaan`
--
ALTER TABLE `tb_penyewaaan`
  ADD CONSTRAINT `tb_penyewaaan_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`),
  ADD CONSTRAINT `tb_penyewaaan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tb_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`id_kualitas`) REFERENCES `tb_kualitas` (`id_kualitas`),
  ADD CONSTRAINT `tb_product_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tb_merk` (`id_merk`),
  ADD CONSTRAINT `tb_product_ibfk_3` FOREIGN KEY (`id_tujuan`) REFERENCES `tb_tujuan` (`id_tujuan`),
  ADD CONSTRAINT `tb_product_ibfk_4` FOREIGN KEY (`id_category`) REFERENCES `tb_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
