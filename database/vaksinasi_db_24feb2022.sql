-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Feb 2022 pada 05.51
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksinasi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `capaian`
--

CREATE TABLE `capaian` (
  `id_capaian` int(4) NOT NULL,
  `tgl_capaian` date NOT NULL,
  `lokasi_vaksin` varchar(100) NOT NULL,
  `capaian_vaksin` varchar(100) NOT NULL,
  `id_stok` int(4) NOT NULL,
  `asal_vaksin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `capaian`
--

INSERT INTO `capaian` (`id_capaian`, `tgl_capaian`, `lokasi_vaksin`, `capaian_vaksin`, `id_stok`, `asal_vaksin`) VALUES
(6, '2022-02-22', 'Polres Tuba', '10', 4, 'Asal'),
(7, '2022-02-02', 'Polres Tuba', '2', 3, 'Asal'),
(8, '2022-02-24', 'Polres Tuba', '3', 2, 'Asal'),
(9, '2022-02-24', 'Polres Tuba', '10', 2, 'Asal'),
(10, '2022-02-24', 'Polres Tuba', '25', 2, 'Asal'),
(11, '2022-02-24', 'Polres Tuba', '28', 4, '8'),
(12, '2022-02-24', 'Polres Tuba', '30', 4, 'Asal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personel`
--

CREATE TABLE `personel` (
  `id_personel` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `nrp` varchar(8) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae',
  `user_status` enum('admin','pimpinan','personel') NOT NULL DEFAULT 'personel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `personel`
--

INSERT INTO `personel` (`id_personel`, `nama`, `pangkat`, `nrp`, `jabatan`, `no_telpon`, `username`, `password`, `user_status`) VALUES
(1, 'Admin', '-', '-', '', '-', 'admin', '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rencana`
--

CREATE TABLE `rencana` (
  `id_rencana` int(4) NOT NULL,
  `tgl_rencana` date NOT NULL,
  `lokasi_vaksin` varchar(100) NOT NULL,
  `rencana_vaksin` varchar(100) NOT NULL,
  `id_stok` int(4) NOT NULL,
  `asal_vaksin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(4) NOT NULL,
  `jenis_vaksin` varchar(100) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `jenis_vaksin`, `jumlah`, `kadaluarsa`, `keterangan`) VALUES
(2, 'Sinovac', 62, '2022-02-28', 'Sinovac pertama'),
(3, 'Vaksin Covid-19 Bio Farma', 7, '2022-02-24', 'Bio farma'),
(4, 'Sinopharm', 112, '2022-03-01', 'Sinopharm');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_capaian`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_capaian` (
`id_capaian` int(4)
,`tgl_capaian` date
,`lokasi_vaksin` varchar(100)
,`capaian_vaksin` varchar(100)
,`asal_vaksin` varchar(100)
,`id_stok` int(4)
,`jenis_vaksin` varchar(100)
,`jumlah` int(6)
,`kadaluarsa` date
,`keterangan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_rencana`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_rencana` (
`id_rencana` int(4)
,`tgl_rencana` date
,`lokasi_vaksin` varchar(100)
,`rencana_vaksin` varchar(100)
,`asal_vaksin` varchar(100)
,`id_stok` int(4)
,`jenis_vaksin` varchar(100)
,`jumlah` int(6)
,`kadaluarsa` date
,`keterangan` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_capaian`
--
DROP TABLE IF EXISTS `v_capaian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_capaian`  AS  select `capaian`.`id_capaian` AS `id_capaian`,`capaian`.`tgl_capaian` AS `tgl_capaian`,`capaian`.`lokasi_vaksin` AS `lokasi_vaksin`,`capaian`.`capaian_vaksin` AS `capaian_vaksin`,`capaian`.`asal_vaksin` AS `asal_vaksin`,`stok`.`id_stok` AS `id_stok`,`stok`.`jenis_vaksin` AS `jenis_vaksin`,`stok`.`jumlah` AS `jumlah`,`stok`.`kadaluarsa` AS `kadaluarsa`,`stok`.`keterangan` AS `keterangan` from (`capaian` join `stok` on(`stok`.`id_stok` = `capaian`.`id_stok`)) order by `capaian`.`id_capaian` desc ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_rencana`
--
DROP TABLE IF EXISTS `v_rencana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rencana`  AS  select `rencana`.`id_rencana` AS `id_rencana`,`rencana`.`tgl_rencana` AS `tgl_rencana`,`rencana`.`lokasi_vaksin` AS `lokasi_vaksin`,`rencana`.`rencana_vaksin` AS `rencana_vaksin`,`rencana`.`asal_vaksin` AS `asal_vaksin`,`stok`.`id_stok` AS `id_stok`,`stok`.`jenis_vaksin` AS `jenis_vaksin`,`stok`.`jumlah` AS `jumlah`,`stok`.`kadaluarsa` AS `kadaluarsa`,`stok`.`keterangan` AS `keterangan` from (`rencana` join `stok` on(`stok`.`id_stok` = `rencana`.`id_stok`)) order by `rencana`.`id_rencana` desc ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `capaian`
--
ALTER TABLE `capaian`
  ADD PRIMARY KEY (`id_capaian`);

--
-- Indeks untuk tabel `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`id_personel`);

--
-- Indeks untuk tabel `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `capaian`
--
ALTER TABLE `capaian`
  MODIFY `id_capaian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `personel`
--
ALTER TABLE `personel`
  MODIFY `id_personel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
