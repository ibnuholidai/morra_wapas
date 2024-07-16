-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Apr 2022 pada 03.41
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_moora_waspas_ci_3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`) VALUES
(40, 'Sumarlin Sinaga'),
(41, 'Tiolom Silalahi '),
(42, 'Suarmi'),
(43, 'Hitler Saragi'),
(44, 'Rotua Silalahi '),
(45, 'Susanti'),
(46, 'Yulianti'),
(47, 'Satini'),
(48, 'Paimun'),
(49, 'Saminah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_moora`
--

CREATE TABLE IF NOT EXISTS `hasil_moora` (
  `id_hasil_moora` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_moora`
--

INSERT INTO `hasil_moora` (`id_hasil_moora`, `id_alternatif`, `nilai`) VALUES
(1, 40, 2.1847),
(2, 41, 2.3562),
(3, 42, 2.9039),
(4, 43, 1.8116),
(5, 44, 2.3562),
(6, 45, 2.0969),
(7, 46, 3.0665),
(8, 47, 1.7366),
(9, 48, 2.9895),
(10, 49, 2.5331);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_waspas`
--

CREATE TABLE IF NOT EXISTS `hasil_waspas` (
  `id_hasil_waspas` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_waspas`
--

INSERT INTO `hasil_waspas` (`id_hasil_waspas`, `id_alternatif`, `nilai`) VALUES
(1, 40, 3.4833),
(2, 41, 3.6897),
(3, 42, 4.356),
(4, 43, 3.1018),
(5, 44, 3.6897),
(6, 45, 3.4035),
(7, 46, 4.619),
(8, 47, 2.9757),
(9, 48, 4.5152),
(10, 49, 3.8966);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kode_kriteria` varchar(100) NOT NULL,
  `bobot` float NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `keterangan`, `kode_kriteria`, `bobot`, `jenis`) VALUES
(38, 'Pekerjaan', 'C1', 1, 'Benefit'),
(39, 'Penghasilan', 'C2', 1, 'Cost'),
(40, 'Lantai', 'C3', 2, 'Benefit'),
(41, ' Jenis Dinding', 'C4', 2, 'Benefit'),
(42, 'MCK', 'C5', 2, 'Benefit'),
(43, 'Jenis Atap', 'C7', 2, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pangkat`
--

CREATE TABLE IF NOT EXISTS `nilai_pangkat` (
  `id_nilai_pangkat` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_pangkat`
--

INSERT INTO `nilai_pangkat` (`id_nilai_pangkat`, `id_kriteria`, `nilai`) VALUES
(1, 38, '9'),
(2, 39, '16'),
(3, 40, '9'),
(4, 41, '16'),
(5, 42, '4'),
(6, 43, '4'),
(7, 38, '9'),
(8, 39, '16'),
(9, 40, '16'),
(10, 41, '16'),
(11, 42, '4'),
(12, 43, '4'),
(13, 38, '9'),
(14, 39, '16'),
(15, 40, '9'),
(16, 41, '25'),
(17, 42, '25'),
(18, 43, '4'),
(19, 38, '4'),
(20, 39, '9'),
(21, 40, '9'),
(22, 41, '4'),
(23, 42, '4'),
(24, 43, '4'),
(25, 38, '9'),
(26, 39, '16'),
(27, 40, '16'),
(28, 41, '16'),
(29, 42, '4'),
(30, 43, '4'),
(31, 38, '1'),
(32, 39, '25'),
(33, 40, '9'),
(34, 41, '4'),
(35, 42, '25'),
(36, 43, '4'),
(37, 38, '9'),
(38, 39, '16'),
(39, 40, '25'),
(40, 41, '16'),
(41, 42, '25'),
(42, 43, '4'),
(43, 38, '16'),
(44, 39, '16'),
(45, 40, '9'),
(46, 41, '1'),
(47, 42, '4'),
(48, 43, '4'),
(49, 38, '25'),
(50, 39, '9'),
(51, 40, '9'),
(52, 41, '16'),
(53, 42, '25'),
(54, 43, '4'),
(55, 38, '25'),
(56, 39, '16'),
(57, 40, '25'),
(58, 41, '9'),
(59, 42, '4'),
(60, 43, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `normalisasi_terbobot`
--

CREATE TABLE IF NOT EXISTS `normalisasi_terbobot` (
  `id_normalisasi_terbobot` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `normalisasi_terbobot`
--

INSERT INTO `normalisasi_terbobot` (`id_normalisasi_terbobot`, `id_alternatif`, `jenis`, `nilai`) VALUES
(1, 40, 'Benefit', '0.2785'),
(2, 40, 'Cost', '0.3213'),
(3, 40, 'Benefit', '0.5145'),
(4, 40, 'Benefit', '0.7213'),
(5, 40, 'Benefit', '0.3592'),
(6, 40, 'Benefit', '0.6325'),
(7, 41, 'Benefit', '0.2785'),
(8, 41, 'Cost', '0.3213'),
(9, 41, 'Benefit', '0.686'),
(10, 41, 'Benefit', '0.7213'),
(11, 41, 'Benefit', '0.3592'),
(12, 41, 'Benefit', '0.6325'),
(13, 42, 'Benefit', '0.2785'),
(14, 42, 'Cost', '0.3213'),
(15, 42, 'Benefit', '0.5145'),
(16, 42, 'Benefit', '0.9017'),
(17, 42, 'Benefit', '0.898'),
(18, 42, 'Benefit', '0.6325'),
(19, 43, 'Benefit', '0.1857'),
(20, 43, 'Cost', '0.241'),
(21, 43, 'Benefit', '0.5145'),
(22, 43, 'Benefit', '0.3607'),
(23, 43, 'Benefit', '0.3592'),
(24, 43, 'Benefit', '0.6325'),
(25, 44, 'Benefit', '0.2785'),
(26, 44, 'Cost', '0.3213'),
(27, 44, 'Benefit', '0.686'),
(28, 44, 'Benefit', '0.7213'),
(29, 44, 'Benefit', '0.3592'),
(30, 44, 'Benefit', '0.6325'),
(31, 45, 'Benefit', '0.0928'),
(32, 45, 'Cost', '0.4016'),
(33, 45, 'Benefit', '0.5145'),
(34, 45, 'Benefit', '0.3607'),
(35, 45, 'Benefit', '0.898'),
(36, 45, 'Benefit', '0.6325'),
(37, 46, 'Benefit', '0.2785'),
(38, 46, 'Cost', '0.3213'),
(39, 46, 'Benefit', '0.8575'),
(40, 46, 'Benefit', '0.7213'),
(41, 46, 'Benefit', '0.898'),
(42, 46, 'Benefit', '0.6325'),
(43, 47, 'Benefit', '0.3714'),
(44, 47, 'Cost', '0.3213'),
(45, 47, 'Benefit', '0.5145'),
(46, 47, 'Benefit', '0.1803'),
(47, 47, 'Benefit', '0.3592'),
(48, 47, 'Benefit', '0.6325'),
(49, 48, 'Benefit', '0.4642'),
(50, 48, 'Cost', '0.241'),
(51, 48, 'Benefit', '0.5145'),
(52, 48, 'Benefit', '0.7213'),
(53, 48, 'Benefit', '0.898'),
(54, 48, 'Benefit', '0.6325'),
(55, 49, 'Benefit', '0.4642'),
(56, 49, 'Cost', '0.3213'),
(57, 49, 'Benefit', '0.8575'),
(58, 49, 'Benefit', '0.541'),
(59, 49, 'Benefit', '0.3592'),
(60, 49, 'Benefit', '0.6325');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(74, 40, 38, 53),
(75, 40, 39, 57),
(76, 40, 40, 61),
(77, 40, 41, 63),
(78, 40, 42, 68),
(79, 40, 43, 69),
(80, 41, 38, 53),
(81, 41, 39, 57),
(82, 41, 40, 60),
(83, 41, 41, 63),
(84, 41, 42, 68),
(85, 41, 43, 69),
(86, 42, 38, 53),
(87, 42, 39, 57),
(88, 42, 40, 61),
(89, 42, 41, 62),
(90, 42, 42, 67),
(91, 42, 43, 69),
(92, 43, 38, 54),
(93, 43, 39, 58),
(94, 43, 40, 61),
(95, 43, 41, 65),
(96, 43, 42, 68),
(97, 43, 43, 69),
(98, 44, 38, 53),
(99, 44, 39, 57),
(100, 44, 40, 60),
(101, 44, 41, 63),
(102, 44, 42, 68),
(103, 44, 43, 69),
(104, 45, 38, 55),
(105, 45, 39, 56),
(106, 45, 40, 61),
(107, 45, 41, 65),
(108, 45, 42, 67),
(109, 45, 43, 69),
(110, 46, 38, 53),
(111, 46, 39, 57),
(112, 46, 40, 59),
(113, 46, 41, 63),
(114, 46, 42, 67),
(115, 46, 43, 69),
(116, 47, 38, 52),
(117, 47, 39, 57),
(118, 47, 40, 61),
(119, 47, 41, 66),
(120, 47, 42, 68),
(121, 47, 43, 69),
(122, 48, 38, 51),
(123, 48, 39, 58),
(124, 48, 40, 61),
(125, 48, 41, 63),
(126, 48, 42, 67),
(127, 48, 43, 69),
(128, 49, 38, 51),
(129, 49, 39, 57),
(130, 49, 40, 59),
(131, 49, 41, 64),
(132, 49, 42, 68),
(133, 49, 43, 69);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE IF NOT EXISTS `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `nilai` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `deskripsi`, `nilai`) VALUES
(51, 38, 'Pensiunan', 5),
(52, 38, 'Ibu Rumah Tangga', 4),
(53, 38, 'Petani / Pekebun', 3),
(54, 38, 'Wiraswasta', 2),
(55, 38, 'Karyawan BUMN', 1),
(56, 39, '1.000.000 - 1.100.000', 5),
(57, 39, '1.200.000 - 1.300.000', 4),
(58, 39, '1.400.000 - 1.500.000', 3),
(59, 40, 'Tanah', 5),
(60, 40, 'Papan', 4),
(61, 40, 'Rabat Beton', 3),
(62, 41, 'Gedek', 5),
(63, 41, 'Papan', 4),
(64, 41, 'Papan + Gedek', 3),
(65, 41, 'Papan + Bata', 2),
(66, 41, 'Papan + Bata + Gedek', 1),
(67, 42, 'Tidak', 5),
(68, 42, 'Ya', 2),
(69, 43, 'Seng Gelombang', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `nama`, `email`, `username`, `password`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, 'User', 'user@gmail.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil_moora`
--
ALTER TABLE `hasil_moora`
  ADD PRIMARY KEY (`id_hasil_moora`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `hasil_waspas`
--
ALTER TABLE `hasil_waspas`
  ADD PRIMARY KEY (`id_hasil_waspas`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_pangkat`
--
ALTER TABLE `nilai_pangkat`
  ADD PRIMARY KEY (`id_nilai_pangkat`);

--
-- Indexes for table `normalisasi_terbobot`
--
ALTER TABLE `normalisasi_terbobot`
  ADD PRIMARY KEY (`id_normalisasi_terbobot`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nilai` (`nilai`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `hasil_moora`
--
ALTER TABLE `hasil_moora`
  MODIFY `id_hasil_moora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hasil_waspas`
--
ALTER TABLE `hasil_waspas`
  MODIFY `id_hasil_waspas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `nilai_pangkat`
--
ALTER TABLE `nilai_pangkat`
  MODIFY `id_nilai_pangkat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `normalisasi_terbobot`
--
ALTER TABLE `normalisasi_terbobot`
  MODIFY `id_normalisasi_terbobot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_moora`
--
ALTER TABLE `hasil_moora`
  ADD CONSTRAINT `hasil_moora_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_waspas`
--
ALTER TABLE `hasil_waspas`
  ADD CONSTRAINT `hasil_waspas_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`nilai`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `user_level` (`id_user_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
