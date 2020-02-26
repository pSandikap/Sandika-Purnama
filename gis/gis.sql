-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2020 pada 14.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `drian` varchar(111) NOT NULL,
  `penyewa` varchar(111) NOT NULL,
  `no_rek` int(111) NOT NULL,
  `biaya` varchar(111) NOT NULL,
  `jatuh_tempo` varchar(111) NOT NULL,
  `ditetapkan` varchar(111) NOT NULL,
  `bukti` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `drian`, `penyewa`, `no_rek`, `biaya`, `jatuh_tempo`, `ditetapkan`, `bukti`, `update_at`) VALUES
(1, 'kd1895', 'Purnama Putra', 2147483647, '12.000.000', '20-01-2021', '20-01-2020', 'download.png', '2020-01-21 14:16:37'),
(2, 'kd36556', 'Purnama Putra', 2147483647, '60.000.000', '18-03-2020', '18-03-2019', 'wifi.jpg', '2020-01-21 14:17:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `drian` varchar(111) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `telp` varchar(20) NOT NULL,
  `latitude` varchar(111) NOT NULL,
  `longitude` varchar(111) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `drian`, `nama`, `alamat`, `telp`, `latitude`, `longitude`, `gambar`) VALUES
(76, 'kd36556', 'TebingWksJambi ', 'Jl.Tebingtinggi Wks , Tanjung Jabung Barat, Jambi', '161', '-1.018188', '103.081514', 'download.png'),
(75, 'kd29195B1', 'Kelong ', 'Jl. Nusantara No.44, Kelong, Bintan Pesisir, Kabupaten Bintan, Kepulauan Riau', '161', '0.864549', '104.651545', 'download.png'),
(74, 'kd27251B1', 'Kotobaru ', 'Jl. Sutan Sjahrir, Kota Baru, Koto Baru, Kec. Sepuluh Koto, Kota Padang Panjang, Sumatera Barat', '161', '-0.391052', '100.401833', 'download.png'),
(73, 'kd25118A', 'Padang Muaro ', 'Jl.Nipah No.28 , Berok Nipah, Padang Barat, Sumatra Barat', '161', '-0.962370', '100.356473', 'download.png'),
(72, 'kd25700', 'TUAPEJAT ', 'Tua Pejat, Sipora, Kepulauan Mentawai, Sumatra Barat', '161', '-2.230855', '99.678688', 'download.png'),
(71, 'kd24591B1', 'Simpang Balek ', 'Jalan Gayo No. 5, Keude Bireuen, Simpang Balek, Wih Pesam, Bener Meuriah, Nangroe Aceh Darussalam', '161', '5.202175', '96.702647', 'download.png'),
(70, 'kd22388', 'Pintupohan Meranti ', 'Jl. Pesanggrahan Pintupohan, Pintupohan Meranti, Toba Samosir, Sumatra Utara', '161', '2.564171', '99.454738', 'download.png'),
(69, 'kd20993', 'Dolok Merawan ', 'Jl.Perintis Kemerdekaan, Pekan Dolok Merawan, Serdang Bedagai, Sumatra Utara', '161', '3.167610', '99.112985', 'download.png'),
(67, 'kd20552', 'Beringin Deli Serdang', 'Jl.Besar Pantai Labu, Karanganyar, Beringin, Deli Serdang, Sumatra Utara', '161', '3.614818', '98.888866', 'download.png'),
(68, 'kd20762', 'Selesai', 'Jl.Binjai - Kuala, Selesai, Langkat, Sumatra Utara', '161', '3.606779', '98.443607', 'download.png'),
(77, 'kd3824', 'Bojongnangka ', 'Jl. Wijayakusuma Blok RC 1/19 ', '161', '-6.254628', '106.597933', 'wifi.jpg'),
(81, 'kd3323', 'Bekasiharapanjaya ', 'Jl.Raya Seroja Harapan Jaya ', '161', '-6.200494', '106.987166', 'download.png'),
(79, 'kd6122', 'Prabumulihbarat ', 'Jalan Jendral Sudirman ', '161', '-3.420053', '104.249040', 'wifi.jpg'),
(80, 'kd9307', 'Jakartapusatgambir ', 'Jl.Medan Merdeka Timur No.27 ', '161', '-6.178436', '106.832903', 'download.png'),
(82, 'kd5640', 'Darma ', 'Jl.Raya Desa Paleben ', '161', '-7.001980', '108.404219', 'download.png'),
(83, 'kd1394', 'Semarangikip ', 'Jl.Kelud Raya Semarang ', '161', '-6.997505', '110.401893', 'download.png'),
(84, 'kd8458', 'Anjirpasar ', 'Anjir Ps. Kota, Anjir Ps., Kabupaten Barito Kuala, Kalimantan Selatan 70565 ', '161', '-3.149942', '114.503043', 'download.png'),
(85, 'kd2661', 'Sebabi ', 'Jl. Jenderal Sudirman No.KM. 86, Sebabi. ', '161', '-2.407113', '112.460637', 'download.png'),
(86, 'kd7038', 'Sumarorong ', 'Jl.Poros Mamasa ', '161', '-2.943175', '119.376713', 'download.png'),
(87, 'kd5548', 'Bandungpasteur ', 'Jl.Pasteur No.38 Bandung ', '161', '-6.899908', '107.599223', 'download.png'),
(88, 'kd1895', 'Bandungciwastra ', 'Jl.Ciwastra Bandung ', '161', '-6.958019', '107.657453', 'download.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `drian` varchar(111) NOT NULL,
  `penyewa` varchar(111) NOT NULL,
  `no_rek` int(111) NOT NULL,
  `biaya` varchar(111) NOT NULL,
  `jatuh_tempo` varchar(111) NOT NULL,
  `ditetapkan` varchar(111) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `drian`, `penyewa`, `no_rek`, `biaya`, `jatuh_tempo`, `ditetapkan`, `bukti`) VALUES
(1, 'kd36556', 'sandika', 2147483647, '50.000.000', '18-01-2021', '18-01-2020', 'wifi.jpg'),
(2, 'kd3824', 'sandika', 2147483647, '12.000.000', '18-01-2021', '18-01-2020', 'wifi.jpg'),
(3, 'kd36556', 'Purnama Putra', 2147483647, '60.000.000', '21-01-2021', '21-01-2020', 'download.png'),
(4, 'kd8068', 'sandika', 2147483647, '50.000.000', '18-03-2020', '18-03-2019', 'wifi.jpg'),
(5, 'kd6122', 'sandika', 2147483647, '35.000.000', '18-04-2020', '18-04-2019', 'wifi.jpg'),
(6, 'kd36556', 'sandika', 2147483647, '30.000.000', '18-06-2020', '18-06-2019', 'wifi.jpg'),
(7, 'kd36556', 'sandika', 2147483647, '25.000.000', '01-05-2020', '01-05-2019', 'wifi.jpg'),
(8, 'kd36556', 'sandika', 2147483647, '12.000.000', '18-09-2020', '18-09-2019', 'wifi.jpg'),
(9, 'kd20552', 'Purnama Putra', 2147483647, '12.500.000', '20-01-2021', '20-01-2020', 'wifi.jpg'),
(10, 'kd9307', 'sandika', 2147483647, '12.000.000', '18-02-2020', '18-02-2019', 'wifi.jpg'),
(11, 'kd5640', 'sandika', 2147483647, '23.000.000', '28-02-2020', '28-02-2019', 'wifi.jpg'),
(12, 'kd3323', 'Purnama Putra', 2147483647, '10.000.000', '21-01-2021', '21-01-2020', 'download.png'),
(13, 'kd2661', 'Purnama Putra', 2147483647, '20.000.000', '20-01-2021', '20-01-2020', 'wifi.jpg'),
(14, 'kd8458', 'Purnama Putra', 2147483647, '9.000.000', '20-01-2021', '20-01-2020', 'wifi.jpg'),
(15, 'kd1895', 'Purnama Putra', 2147483647, '12.000.000', '21-01-2021', '21-01-2020', 'download.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `akses` enum('admin','regional','aset','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `akses`) VALUES
(1, 'Purnama Putra', 'sansan', 'regional', 'sansan@gmail.com', 'regional'),
(7, 'Sandika Purnama Putra', 'sandika', 'sandika', 'sandika@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
