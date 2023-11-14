-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2023 pada 02.50
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
-- Struktur dari tabel `dapil`
--

CREATE TABLE `dapil` (
  `id_dapil` int(11) NOT NULL,
  `kab_code` varchar(50) NOT NULL,
  `nama_dapil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dapil`
--

INSERT INTO `dapil` (`id_dapil`, `kab_code`, `nama_dapil`) VALUES
(1, '1401', 'Dapil 1'),
(2, '1401', 'Dapil 2'),
(3, '1401', 'Dapil 3'),
(4, '1401', 'Dapil 4'),
(5, '1401', 'Dapil 5'),
(6, '1401', 'Dapil 6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dapil`
--
ALTER TABLE `dapil`
  ADD PRIMARY KEY (`id_dapil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dapil`
--
ALTER TABLE `dapil`
  MODIFY `id_dapil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
