-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2021 pada 02.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb_kp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123123', 'odydahary1@gmail.com', '$2y$10$LHaNjgM4r6E3V9LW0rZuBOHTIuWvdbiEx71V44Jr.Fpd9QwEPnVNS', NULL, '2020-12-30 05:30:57', '2020-12-30 05:30:57'),
(3, 'Ody Dahary', 'odybisn@gmail.com', '$2y$10$uz0uJOs7P151xKacBoF6BuTfjZwYaoFYcqFOqKkxweTJzZ5VryKs.', NULL, '2020-12-30 11:39:46', '2020-12-30 11:39:46'),
(4, 'Admin', 'admin@sekolah.ac.id', '$2y$10$IJfY5d7lDA4smbg4tnwkJ.1NCxNTGP7z3IMzdmLodVt.DmDDV/d.K', NULL, '2020-12-30 11:41:57', '2020-12-30 11:41:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jangka_daftar`
--

CREATE TABLE `jangka_daftar` (
  `id_jangkar` int(11) NOT NULL,
  `id_tapel` int(11) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jangka_daftar`
--

INSERT INTO `jangka_daftar` (`id_jangkar`, `id_tapel`, `mulai`, `selesai`) VALUES
(1, 2, '2021-01-01', '2021-06-21'),
(2, 1, '2018-12-01', '2019-01-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer Dan Jaringan'),
(2, 'Teknik Otomtotif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(11) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `kebutuhan_khusus_ayah` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `thn_lahir_ayah` int(4) NOT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `kebutuhan_khusus_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `thn_lahir_ibu` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `nama_ayah`, `pekerjaan_ayah`, `kebutuhan_khusus_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `thn_lahir_ayah`, `nama_ibu`, `kebutuhan_khusus_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `thn_lahir_ibu`) VALUES
(4, 'qweqw', 'qweqw', 'qweqwe', 'qweq', 'qweqe', 0, '123', 'qweqw', 'qweqwe', 'qweqwe', 'qweqwe', 0),
(5, 'qweqw', 'qweqw', 'qweqwe', 'qweq', 'qweqe', 1988, '123', 'qweqw', 'qweqwe', 'qweqwe', 'qweqwe', 1988),
(6, 'amirul', 'tani', 'tidak', 'SMP Sederajat', '< 1.000.000', 1888, 'mukminah', 'tidak', 'tani', 'SMP Sederajat', '< 1.000.000', 1888),
(7, 'amirul', 'tani', 'tidak', 'SMP Sederajat', '< 1.000.000', 1888, 'mukminah', 'tidak', 'tani', 'SMP Sederajat', '< 1.000.000', 1888),
(8, 'amirul', 'tani', 'tidak', 'SMP Sederajat', '< 1.000.000', 1988, 'mukminah', 'tidak', 'tani', 'SMP Sederajat', '< 1.000.000', 1988),
(9, 'amirul', 'tani', 'tidak', 'SMP Sederajat', '< 1.000.000', 1988, 'mukminah', 'tidak', 'tani', 'SMP Sederajat', '< 1.000.000', 1988),
(10, 'Amirul', 'Tani', 'Tidak', 'SD Sederajat', '< 1.000.000', 1960, 'Mukminah', 'Tidak', 'Tani', 'SMA Sederajat', '< 1.000.000', 1960);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `id_tapel` int(11) DEFAULT NULL,
  `id_wali` int(11) DEFAULT NULL,
  `id_ortu` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `no_seri_ijazah` varchar(20) DEFAULT NULL,
  `no_seri_skhun` varchar(20) DEFAULT NULL,
  `no_un` varchar(20) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `npsn_sekolah_asal` varchar(20) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `berkebutuhan_khusus` varchar(100) DEFAULT NULL,
  `alamat_asal` varchar(100) DEFAULT NULL,
  `dusun` varchar(100) DEFAULT NULL,
  `rt_rw` varchar(10) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `jenis_tinggal` varchar(100) DEFAULT NULL,
  `no_telp_rumah` varchar(15) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_kks` varchar(20) DEFAULT NULL,
  `no_kps` varchar(20) DEFAULT NULL,
  `alasan_layak` mediumtext DEFAULT NULL,
  `no_kip` varchar(20) DEFAULT NULL,
  `nama_kip` varchar(100) DEFAULT NULL,
  `alasan_tolak_kip` mediumtext DEFAULT NULL,
  `no_rek_akta_lahir` varchar(20) DEFAULT NULL,
  `lintang` varchar(20) DEFAULT NULL,
  `bujur` varchar(20) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `jarak_sekolah` varchar(10) DEFAULT NULL,
  `waktu_tempuh_sekolah` time DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `id_tapel`, `id_wali`, `id_ortu`, `id_jurusan`, `nama_lengkap`, `jk`, `nisn`, `nis`, `no_seri_ijazah`, `no_seri_skhun`, `no_un`, `nik`, `npsn_sekolah_asal`, `tmpt_lahir`, `tgl_lahir`, `agama`, `berkebutuhan_khusus`, `alamat_asal`, `dusun`, `rt_rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `jenis_tinggal`, `no_telp_rumah`, `no_hp`, `email`, `no_kks`, `no_kps`, `alasan_layak`, `no_kip`, `nama_kip`, `alasan_tolak_kip`, `no_rek_akta_lahir`, `lintang`, `bujur`, `tinggi_badan`, `berat_badan`, `jarak_sekolah`, `waktu_tempuh_sekolah`, `jumlah_saudara`) VALUES
(2, 2, 4, 9, 1, 'Nur Kholis', 'L', '123456789', '123456789', '123456789', '123456789', '123456789', '123123345', '123456789', 'Sumenep', '2020-01-30', 'kristen', 'ss', 'Kaduara Timur', 'Gunung', '08/08', 'Kaduara Timur', 'Pragaan', 'Sumenep', 'Jawa Timur', 'Rumah Ortu', '23498234', '095233889578', 'nurkholispragaan@gmail.com', '123456789', '123456789', 'Miskin', '123456789', 'Nur Kholis', 'Kaya', '123456789', '123456789', '123456789', 128, 60, '8', '00:00:30', 2),
(3, 2, 5, 10, 1, 'Nur Kholis', 'L', '12345678910', '12345678910', '12345678910', '12345678910', '12345678910', '12345678910', '12345678910', 'Sumenep', '2020-01-28', 'islam', 'Tidak', 'Kaduara Timur', 'Gunung', '08/08', 'Kaduara Timur', 'Pragaan', 'Sumenep', 'Jawa Timur', 'Tetap', '085233889578', '085233889578', 'tes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 128, 60, '8', '00:00:08', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `id_pendaftar` int(11) DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `id_pendaftar`, `tgl_registrasi`, `status`) VALUES
(1, 2, '2021-01-02', '1'),
(2, 3, '2021-01-05', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id_struktur` int(11) NOT NULL,
  `id_atasan` int(11) DEFAULT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `nama_pejabat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id_struktur`, `id_atasan`, `nama_jabatan`, `nama_pejabat`) VALUES
(1, NULL, 'PENGASUH', 'K. ACH. SAHRI'),
(2, 1, 'KEPALA SEKOLAH', 'JUNAIDI,M.Pd.I'),
(3, 1, 'KOMITE SEKOLAH', 'LIONO ADI, S.Pd.I'),
(4, 2, 'KEPALA TU', 'HAMSINAH, S.Pd'),
(5, 2, 'BENDAHARA', 'ISTIANAH, S.Pd'),
(6, 4, 'BAGIAN IT', 'NASA\'I, S.Kom'),
(7, 4, 'OPERATOR', 'NUR ALIA, S.Pd'),
(8, 2, 'WAKA KURIKULUM', 'RIA ADRIANA, S.Pd'),
(9, 2, 'WAKA KESISWAAN', 'NUR LAELY, S.Pd'),
(10, 2, 'WAKA HUMAS', 'SUNARTO, S.Pd'),
(11, 2, 'WAKA SARANA', 'ACH. SYARIF HIDAYAT, S.Pd'),
(12, 8, 'KA PERPUSTAKAAN', 'MOH. ILYAS SAYYADI'),
(13, 9, 'PEMBINA OSIS', 'ABD. ROHIM, S.Ei'),
(14, 10, 'BKK', 'SUTRISNO EFENDI, ST'),
(15, 2, 'KA PROG KEAHLIAN TKJ', 'ACH. KUSAIRI, S.Kom'),
(16, 2, 'KA PROG KEAHLIAN TBSM', 'SUTRISNO EFENDI, ST');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tapel`
--

CREATE TABLE `tapel` (
  `id_tapel` int(11) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tapel`
--

INSERT INTO `tapel` (`id_tapel`, `tapel`, `status`) VALUES
(1, '2019-2020', '1'),
(2, '2020-2021', '0'),
(3, '2021-2022', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `pendidikan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` varchar(100) DEFAULT NULL,
  `thn_wali` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id_wali`, `nama_wali`, `pekerjaan_wali`, `pendidikan_wali`, `penghasilan_wali`, `thn_wali`) VALUES
(4, 'amirul', 'tani', 'SMP Sederajat', '< 1.000.000', 1888),
(5, 'Amirul', 'Tani', 'SMA Sederajat', '< 1.000.000', 1960);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_email_admin_unique` (`email`);

--
-- Indeks untuk tabel `jangka_daftar`
--
ALTER TABLE `jangka_daftar`
  ADD PRIMARY KEY (`id_jangkar`),
  ADD UNIQUE KEY `jangka_daftar_pk` (`id_jangkar`),
  ADD KEY `relationship_5_fk` (`id_tapel`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD UNIQUE KEY `jurusan_pk` (`id_jurusan`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD UNIQUE KEY `ortu_pk` (`id_ortu`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD UNIQUE KEY `pendaftar_pk` (`id_pendaftar`),
  ADD KEY `relationship_3_fk` (`id_ortu`),
  ADD KEY `relationship_4_fk` (`id_wali`),
  ADD KEY `relationship_6_fk` (`id_jurusan`),
  ADD KEY `relationship_7_fk` (`id_tapel`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD UNIQUE KEY `registrasi_pk` (`id_registrasi`),
  ADD KEY `relationship_2_fk` (`id_pendaftar`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_struktur`),
  ADD KEY `id_atasan` (`id_atasan`);

--
-- Indeks untuk tabel `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id_tapel`),
  ADD UNIQUE KEY `tapel_pk` (`id_tapel`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD UNIQUE KEY `wali_pk` (`id_wali`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jangka_daftar`
--
ALTER TABLE `jangka_daftar`
  MODIFY `id_jangkar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendafta_relations_wali` FOREIGN KEY (`id_wali`) REFERENCES `wali` (`id_wali`);

--
-- Ketidakleluasaan untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD CONSTRAINT `struktur_ibfk_1` FOREIGN KEY (`id_atasan`) REFERENCES `struktur` (`id_struktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
