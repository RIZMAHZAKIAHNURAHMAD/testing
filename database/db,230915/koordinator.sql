-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2023 pada 21.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `koordinator`
--

CREATE TABLE `koordinator` (
  `id_koordinator` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `id_pendukung` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koordinator`
--

INSERT INTO `koordinator` (`id_koordinator`, `code`, `id_pendukung`, `created_date`, `created_by`) VALUES
(1, 1401, 1, NULL, NULL),
(2, 1403, 532, '2023-09-14 02:18:49', 3),
(3, 1404, 235, '2023-09-14 02:19:25', 3),
(4, 1406, 87, '2023-09-14 02:19:45', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `koordinator`
--
ALTER TABLE `koordinator`
  ADD PRIMARY KEY (`id_koordinator`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `koordinator`
--
ALTER TABLE `koordinator`
  MODIFY `id_koordinator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
