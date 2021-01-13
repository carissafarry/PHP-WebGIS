-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 23.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis-php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kabupaten`
--

CREATE TABLE `m_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `kd_kabupaten` int(11) NOT NULL,
  `nm_kabupaten` varchar(100) NOT NULL,
  `geojson_kabupaten` varchar(30) NOT NULL,
  `warna_kabupaten` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kabupaten`
--

INSERT INTO `m_kabupaten` (`id_kabupaten`, `kd_kabupaten`, `nm_kabupaten`, `geojson_kabupaten`, `warna_kabupaten`) VALUES
(1, 1, 'Bangkalan', '1060121123229.json', '#f5dbc1'),
(2, 2, 'Banyuwangi', '78060121123259.json', '#beffe8'),
(3, 3, 'Blitar', '85060121123311.json', '#7dd696'),
(4, 4, 'Bojonegoro', '33060121123321.json', '#cdcd66'),
(5, 5, 'Bondowoso', '75060121123337.json', '#d7c29e'),
(6, 6, 'Gresik', '96060121123419.json', '#f57a7a'),
(7, 7, 'Jember', '41070121021212.json', '#e9ffbe'),
(8, 8, 'Jombang', '73070121021221.json', '#d7c1f7'),
(9, 0, 'Kediri', '1070121021235.json', '#cde6fa'),
(10, 0, 'Kota Batu', '19070121021248.json', '#9ed7c2'),
(11, 0, 'Kota Blitar', '39070121021256.json', '#efcdfa'),
(12, 0, 'Kota Kediri', '36070121021304.json', '#9eaad7'),
(13, 0, 'Kota Malang', '6070121021310.json', '#d79e9e'),
(14, 0, 'Kota Mojokerto', '56070121021319.json', '#fcf9c5'),
(15, 0, 'Kota Pasuruan', '95070121021647.json', '#f5a27a'),
(16, 0, 'Kota Probolinggo', '17070121021659.json', '#baf5f5'),
(17, 0, 'Kota Jember', '26070121021709.json', '#d69dbc'),
(18, 0, 'Lamongan', '81070121021739.json', '#cdaa66'),
(19, 0, 'Lumajang', '32070121021826.json', '#f5ca7a'),
(20, 0, 'Madiun', '30070121021840.json', '#d2ecf7'),
(21, 0, 'Magetan', '79070121024117.json', '#00a19c'),
(22, 0, 'Malang', '63070121024129.json', '#e8db70'),
(23, 0, 'Mojokerto', '35070121024138.json', '#abcd66'),
(24, 0, 'Nganjuk', '70070121024145.json', '#89cd66'),
(25, 0, 'Ngawi', '41070121024152.json', '#eef2c9'),
(26, 0, 'Pacitan', '40070121024159.json', '#edc9a3'),
(27, 0, 'Pamekasan', '72070121024205.json', '#7ab6f5'),
(28, 0, 'Pasuruan', '67070121024211.json', '#6677cd'),
(29, 0, 'Ponorogo', '34070121024219.json', '#a6a686'),
(30, 0, 'Probolinggo', '65070121024225.json', '#d4ccbd'),
(31, 0, 'Sampang', '64070121024232.json', '#f2a882'),
(32, 0, 'Sidoarjo', '44070121024240.json', '#9e9cc7'),
(33, 0, 'Situbondo', '31070121024247.json', '#fce3cf'),
(34, 0, 'Sumenep', '20070121024253.json', '#caca97'),
(35, 0, 'Surabaya', '47070121024300.json', '#f5dbc1'),
(36, 0, 'Trenggalek', '91070121024307.json', '#beffe8'),
(37, 0, 'Tuban', '93070121024313.json', '#7dd696'),
(38, 0, 'Tulunggagung', '33070121024321.json', '#cdcd66');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`) VALUES
(1, 'admin', '123456'),
(2, 'a', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_candi`
--

CREATE TABLE `t_candi` (
  `id_candi` int(11) NOT NULL,
  `nama_candi` varchar(50) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_candi`
--

INSERT INTO `t_candi` (`id_candi`, `nama_candi`, `lat`, `lng`, `marker`) VALUES
(1, 'Candi Penataran', -8.016428, 112.209747, ''),
(2, 'Candi Cungkup', -7.650382, 112.529938, ''),
(3, 'Candi Tegowangi', -7.734665, 112.161232, ''),
(4, 'Candi Badut', -7.957770, 112.598602, ''),
(5, 'Candi Tondowongso', -7.790361, 112.142509, ''),
(6, 'Candi Dorok', -7.817864, 112.218483, ''),
(7, 'Candi Tikus', -7.572290, 112.403229, ''),
(8, 'Candi Bajangratu', -7.567731, 112.398758, ''),
(9, 'Candi Gempur', -7.769698, 112.117111, ''),
(10, 'Candi Minak Djinggo', -7.558282, 112.386475, ''),
(11, 'Candi Klotok', -7.808978, 111.968872, ''),
(12, 'Candi Penampihan', -7.902713, 111.795372, ''),
(13, 'Candi Jawi', -7.662489, 112.669945, ''),
(14, 'Candi Lor', -7.637790, 111.892128, ''),
(15, 'Candi Keboireng', -7.599943, 112.698586, ''),
(16, 'Candi Sumbernanas', -8.011303, 112.142738, ''),
(17, 'Candi Kepung Petirtaan', -7.801662, 112.253120, ''),
(18, 'Candi Brahu ', -7.543001, 112.374344, ''),
(19, 'Candi Surowono', -7.746232, 112.218102, ''),
(20, 'Candi Arimbi', -7.673684, 112.343033, ''),
(21, 'Candi Mleri', -8.056210, 112.082794, ''),
(22, 'Candi Mirigambar', -8.134081, 111.973633, ''),
(23, 'Candi Dadi', -8.130192, 111.924583, ''),
(24, 'Candi Simping', -8.164091, 112.143929, ''),
(25, 'Candi Sanggrahan', -8.115872, 111.915054, ''),
(26, 'Candi Gayatri', -8.104701, 111.947044, ''),
(27, 'Candi Sawentar', -8.098825, 112.233192, ''),
(28, 'Candi Gambar Wetan', -7.967911, 112.236702, ''),
(29, 'Candi Kalicilik', -7.997993, 112.138176, ''),
(30, 'Candi Gedog', -8.087882, 112.182243, ''),
(31, 'Candi Wringin Branjang', -8.002721, 112.279549, ''),
(32, 'Candi Plumbangan', -8.064355, 112.340942, ''),
(33, 'Candi Kotes', -8.050541, 112.285820, ''),
(34, 'Candi Naga', -8.016241, 112.207298, ''),
(35, 'Candi Kedaton', -7.995833, 113.451950, ''),
(36, 'Candi Purwo', -8.542500, 114.363274, ''),
(37, 'Candi Jabung', -7.735272, 113.469528, ''),
(38, 'Candi Kidal', -8.025627, 112.706345, ''),
(39, 'Candi Karang Besuki', -7.953311, 112.597839, ''),
(40, 'Candi Bangkal', -7.543176, 112.633514, ''),
(41, 'Candi Songgoriti', -7.867219, 112.490570, ''),
(42, 'Candi Belahan', -7.607433, 112.649406, ''),
(43, 'Candi Bocok', -7.838691, 112.321938, ''),
(44, 'Candi Wringin Lawang', -7.542000, 112.388901, ''),
(45, 'Candi Sepilar', -7.769907, 112.616104, ''),
(46, 'Candi Pasetran', -7.575840, 112.612923, ''),
(47, 'Candi Sumur', -7.517086, 112.680763, ''),
(48, 'Candi Sumberawan', -7.855375, 112.642609, ''),
(49, 'Candi Kama IV', -7.604697, 112.618118, ''),
(50, 'Candi Gunung Gangsir', -7.586853, 112.731277, ''),
(51, 'Candi Jedong', -7.580230, 112.609016, ''),
(52, 'Candi Yuda', -7.608433, 112.610497, ''),
(53, 'Candi Jolotundo', -7.609240, 112.595413, ''),
(54, 'Candi Jago Tumpang', -8.005785, 112.483940, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_kabupaten`
--
ALTER TABLE `m_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `t_candi`
--
ALTER TABLE `t_candi`
  ADD PRIMARY KEY (`id_candi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_kabupaten`
--
ALTER TABLE `m_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_candi`
--
ALTER TABLE `t_candi`
  MODIFY `id_candi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
