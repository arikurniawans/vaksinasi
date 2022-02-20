-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 20 Feb 2022 pada 14.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `jenis_vaksin` varchar(100) NOT NULL,
  `asal_vaksin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `jenis_vaksin` varchar(100) NOT NULL,
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
  MODIFY `id_capaian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personel`
--
ALTER TABLE `personel`
  MODIFY `id_personel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
