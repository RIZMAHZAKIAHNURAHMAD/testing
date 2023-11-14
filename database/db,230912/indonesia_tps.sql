-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2023 pada 14.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sh_politik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `indonesia_tps`
--

CREATE TABLE `indonesia_tps` (
  `id_tps` int(11) NOT NULL,
  `code_desa` int(11) NOT NULL,
  `nama_tps` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `indonesia_tps`
--

INSERT INTO `indonesia_tps` (`id_tps`, `code_desa`, `nama_tps`, `created_at`, `id_user`) VALUES
(1, 1401011011, 'TPS 01', '2023-09-07 13:46:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `indonesia_tps`
--
ALTER TABLE `indonesia_tps`
  ADD PRIMARY KEY (`id_tps`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `indonesia_tps`
--
ALTER TABLE `indonesia_tps`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
