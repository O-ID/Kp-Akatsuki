-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2020 at 04:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

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
-- Table structure for table `jangka_daftar`
--

CREATE TABLE `jangka_daftar` (
  `id_jangkar` int(11) NOT NULL,
  `id_tapel` int(11) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jangka_daftar`
--

INSERT INTO `jangka_daftar` (`id_jangkar`, `id_tapel`, `mulai`, `selesai`) VALUES
(1, 2, '2020-12-29', '2021-01-21'),
(2, 1, '2018-12-01', '2019-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Komputer Dan Jaringan'),
(2, 'Teknik Otomtotif');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(11) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `kebutuhan_khusus_ayah` varchar(100) DEFAULT NULL,
  `pendidikan_ayah` varchar(100) DEFAULT NULL,
  `penghasilan_ayah` varchar(100) DEFAULT NULL,
  `thn_lahir_ayah` year(4) NOT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `kebutuhan_khusus_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `pendidikan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `thn_lahir_ibu` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
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
  `alasan_layak` mediumtext,
  `no_kip` varchar(20) DEFAULT NULL,
  `nama_kip` varchar(100) DEFAULT NULL,
  `alasan_tolak_kip` mediumtext,
  `no_rek_akta_lahir` varchar(20) DEFAULT NULL,
  `lintang` varchar(20) DEFAULT NULL,
  `bujur` varchar(20) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `jarak_sekolah` varchar(10) DEFAULT NULL,
  `waktu_tempuh_sekolah` time DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `id_pendaftar` int(11) DEFAULT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `struktur`
--

CREATE TABLE `struktur` (
  `id_struktur` int(11) NOT NULL,
  `id_tapel` int(11) DEFAULT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  `nama_penjabat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id_tapel` int(11) NOT NULL,
  `tapel` varchar(100) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id_tapel`, `tapel`, `status`) VALUES
(1, '2019-2020', '0'),
(2, '2020-2021', '1'),
(3, '2021-2022', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `pendidikan_wali` varchar(100) DEFAULT NULL,
  `penghasilan_wali` varchar(100) DEFAULT NULL,
  `thn_wali` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jangka_daftar`
--
ALTER TABLE `jangka_daftar`
  ADD PRIMARY KEY (`id_jangkar`),
  ADD UNIQUE KEY `jangka_daftar_pk` (`id_jangkar`),
  ADD KEY `relationship_5_fk` (`id_tapel`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD UNIQUE KEY `jurusan_pk` (`id_jurusan`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`),
  ADD UNIQUE KEY `ortu_pk` (`id_ortu`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD UNIQUE KEY `pendaftar_pk` (`id_pendaftar`),
  ADD KEY `relationship_3_fk` (`id_ortu`),
  ADD KEY `relationship_4_fk` (`id_wali`),
  ADD KEY `relationship_6_fk` (`id_jurusan`),
  ADD KEY `relationship_7_fk` (`id_tapel`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD UNIQUE KEY `registrasi_pk` (`id_registrasi`),
  ADD KEY `relationship_2_fk` (`id_pendaftar`);

--
-- Indexes for table `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id_struktur`),
  ADD UNIQUE KEY `struktur_pk` (`id_struktur`),
  ADD KEY `relationship_8_fk` (`id_tapel`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id_tapel`),
  ADD UNIQUE KEY `tapel_pk` (`id_tapel`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD UNIQUE KEY `wali_pk` (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jangka_daftar`
--
ALTER TABLE `jangka_daftar`
  MODIFY `id_jangkar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `fk_pendafta_relations_wali` FOREIGN KEY (`id_wali`) REFERENCES `wali` (`id_wali`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
