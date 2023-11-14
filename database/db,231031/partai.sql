-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 21.07
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
-- Database: `sh_politik_prov`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `partai`
--

CREATE TABLE `partai` (
  `id_partai` int(11) NOT NULL,
  `nama_partai` varchar(100) NOT NULL,
  `akronim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `partai`
--

INSERT INTO `partai` (`id_partai`, `nama_partai`, `akronim`) VALUES
(1, 'Partai Nasdem', 'NasDem'),
(2, 'Partai Hati Nurani Rakyat', 'HANURA'),
(3, 'PARTAI KEADILAN SEJAHTERA', 'PKS'),
(4, 'Partai Amanat Nasional', 'PAN'),
(5, 'Partai Kebangkitan Bangsa', 'PKB'),
(6, 'Partai Golongan Karya', 'Partai GOLKAR'),
(7, 'Partai Gerakan Indonesia Raya', 'Partai GERINDRA'),
(8, 'Partai Persatuan Pembangunan', 'PPP'),
(9, 'Partai Demokrasi Indonesia Perjuangan', 'PDI PERJUANGAN'),
(10, 'Partai Demokrat', 'PD'),
(11, 'PARTAI PERINDO', 'PERSATUAN INDONESIA'),
(12, 'Partai Kebangkitan Nusantara', 'PKN'),
(13, 'Partai Buruh', 'Partai Buruh'),
(14, 'Partai Garda Perubahan Indonesia', 'Partai Garuda'),
(15, 'Partai Bulan Bintang', 'PBB'),
(16, 'Partai Solidaritas Indonesia', 'PSI'),
(17, 'Partai Gelombang Rakyat Indonesia', 'GELORA INDONESIA'),
(18, 'Partai Ummat', 'Partai Ummat'),
(19, 'Partai Aceh', 'PA'),
(20, 'PARTAI SIRA (SOLIDITAS INDEPENDEN RAKYAT ACEH)', 'SIRA'),
(21, 'Partai Nanggroe Aceh', 'PNA'),
(22, 'Partai Generasi Atjeh Beusaboh Thaat Dan Taqwa', 'GABTHAT'),
(23, 'Partai Adil Sejahtera Aceh', 'PAS ACEH'),
(24, 'Partai Darul Aceh', 'PDA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `partai`
--
ALTER TABLE `partai`
  ADD PRIMARY KEY (`id_partai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `partai`
--
ALTER TABLE `partai`
  MODIFY `id_partai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
