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
-- Struktur dari tabel `dapil_kec`
--

CREATE TABLE `dapil_kec` (
  `id_dapil_kec` int(11) NOT NULL,
  `id_dapil` int(11) NOT NULL,
  `kab_code` varchar(50) NOT NULL,
  `kec_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dapil_kec`
--

INSERT INTO `dapil_kec` (`id_dapil_kec`, `id_dapil`, `kab_code`, `kec_code`) VALUES
(1, 4, '1401', '140102'),
(2, 4, '1401', '140103'),
(3, 4, '1401', '140114'),
(4, 4, '1401', '140117'),
(5, 4, '1401', '140118');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dapil_kec`
--
ALTER TABLE `dapil_kec`
  ADD PRIMARY KEY (`id_dapil_kec`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dapil_kec`
--
ALTER TABLE `dapil_kec`
  MODIFY `id_dapil_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
