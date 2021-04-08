-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2021 pada 11.30
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akuntan`
--

CREATE TABLE `akuntan` (
  `id_akuntan` int(11) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `nama_akuntan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `api_token` varchar(100) DEFAULT NULL,
  `fcm_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akuntan`
--

INSERT INTO `akuntan` (`id_akuntan`, `id_owner`, `nama_akuntan`, `email`, `password`, `nomor_telepon`, `api_token`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pipit', 'pipit@gmail.com', '$2y$10$To44/b0SW51yQkeXNryw9u6fqc4lXxCMIR6GpsGEQysH98cHmzXU.', NULL, '$2y$10$pjqcyY5.V83/6VYo5EGsfeSZFgHQSlAlD1OYz4CRpt0/b/2C6s5bW', 'debug', '2021-02-13 15:38:59', '2021-02-13 15:38:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bisnis`
--

CREATE TABLE `bisnis` (
  `id_bisnis` int(11) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `nama_bisnis` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bisnis`
--

INSERT INTO `bisnis` (`id_bisnis`, `id_owner`, `nama_bisnis`, `alamat`, `latitude`, `longitude`) VALUES
(1, 1, 'Bisnis Utama', NULL, NULL, NULL),
(2, 1, 'Bisnis Kedua', 'Jl.in aja', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_satuan`
--

CREATE TABLE `jenis_satuan` (
  `id_jenis_satuan` int(11) NOT NULL,
  `nama_jenis_satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_satuan`
--

INSERT INTO `jenis_satuan` (`id_jenis_satuan`, `nama_jenis_satuan`) VALUES
(1, 'Lainnya'),
(2, 'Berat'),
(3, 'Panjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_transaksi`
--

CREATE TABLE `jenis_transaksi` (
  `id_jenis_transaksi` int(11) NOT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `nama_jenis_transaksi` varchar(100) DEFAULT NULL,
  `kategori` enum('masuk','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_transaksi`
--

INSERT INTO `jenis_transaksi` (`id_jenis_transaksi`, `id_bisnis`, `nama_jenis_transaksi`, `kategori`) VALUES
(4, NULL, 'Air', 'keluar'),
(5, NULL, 'Listrik', 'keluar'),
(6, 1, 'Vaksin', 'keluar'),
(7, 1, 'Telur', 'masuk'),
(8, NULL, 'Gaji', 'masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE `owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `api_token` varchar(100) DEFAULT NULL,
  `fcm_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`id_owner`, `nama_owner`, `email`, `password`, `nomor_telepon`, `api_token`, `fcm_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhon Doe', 'jhondoe@gmail.com', '$2y$10$ZRj0PFJBjbKEEsEjsxxfI.QnG4RIU7fFJ2loQBlklDCnvtq6it352', '85233889578', '$2y$10$kL3zRgwdfwEYfsSFH5l.7ujg21LfL1QmxktvI9Alk119u/W6MRzRW', 'debug', '2021-02-15 23:06:04', '2021-02-13 15:37:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `id_jenis_satuan` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `nama_satuan` varchar(100) DEFAULT NULL,
  `aktif` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `id_jenis_satuan`, `id_owner`, `nama_satuan`, `aktif`) VALUES
(1, 2, NULL, 'Gram', '1'),
(2, 2, NULL, 'Kilo Gram', '1'),
(3, 3, NULL, 'Meter', '1'),
(4, 3, NULL, 'Kilo Meter', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_bisnis` int(11) DEFAULT NULL,
  `id_jenis_transaksi` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `id_akuntan` int(11) DEFAULT NULL,
  `keterangan_transaksi` varchar(100) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL,
  `jumlah_item` int(11) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL,
  `kategori` enum('masuk','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_bisnis`, `id_jenis_transaksi`, `id_satuan`, `id_akuntan`, `keterangan_transaksi`, `tanggal_transaksi`, `metode_pembayaran`, `jumlah_item`, `nominal`, `kategori`) VALUES
(1, 1, 7, 2, 1, NULL, '2021-03-08', NULL, 10, 100000, 'masuk');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akuntan`
--
ALTER TABLE `akuntan`
  ADD PRIMARY KEY (`id_akuntan`),
  ADD KEY `FK_relationship_9` (`id_owner`);

--
-- Indeks untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id_bisnis`),
  ADD KEY `FK_relationship_1` (`id_owner`);

--
-- Indeks untuk tabel `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  ADD PRIMARY KEY (`id_jenis_satuan`);

--
-- Indeks untuk tabel `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
  ADD PRIMARY KEY (`id_jenis_transaksi`),
  ADD KEY `id_bisnis` (`id_bisnis`);

--
-- Indeks untuk tabel `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `FK_relationship_5` (`id_owner`),
  ADD KEY `FK_relationship_6` (`id_jenis_satuan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_relationship_3` (`id_bisnis`),
  ADD KEY `FK_relationship_4` (`id_satuan`),
  ADD KEY `FK_relationship_7` (`id_jenis_transaksi`),
  ADD KEY `FK_relationship_8` (`id_akuntan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akuntan`
--
ALTER TABLE `akuntan`
  MODIFY `id_akuntan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_satuan`
--
ALTER TABLE `jenis_satuan`
  MODIFY `id_jenis_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
  MODIFY `id_jenis_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `owner`
--
ALTER TABLE `owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akuntan`
--
ALTER TABLE `akuntan`
  ADD CONSTRAINT `FK_relationship_9` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`);

--
-- Ketidakleluasaan untuk tabel `bisnis`
--
ALTER TABLE `bisnis`
  ADD CONSTRAINT `FK_relationship_1` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`);

--
-- Ketidakleluasaan untuk tabel `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
  ADD CONSTRAINT `jenis_transaksi_ibfk_1` FOREIGN KEY (`id_bisnis`) REFERENCES `bisnis` (`id_bisnis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD CONSTRAINT `FK_relationship_5` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`),
  ADD CONSTRAINT `FK_relationship_6` FOREIGN KEY (`id_jenis_satuan`) REFERENCES `jenis_satuan` (`id_jenis_satuan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_relationship_3` FOREIGN KEY (`id_bisnis`) REFERENCES `bisnis` (`id_bisnis`),
  ADD CONSTRAINT `FK_relationship_4` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `FK_relationship_7` FOREIGN KEY (`id_jenis_transaksi`) REFERENCES `jenis_transaksi` (`id_jenis_transaksi`),
  ADD CONSTRAINT `FK_relationship_8` FOREIGN KEY (`id_akuntan`) REFERENCES `akuntan` (`id_akuntan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
