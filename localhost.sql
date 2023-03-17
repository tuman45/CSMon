-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2023 pada 09.10
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
-- Database: `admin_csmon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `paket`) VALUES
(1, '3 Mbps'),
(2, '5 Mbps'),
(3, '6 Mbps'),
(4, '10 Mpbs'),
(5, '20 Mbps');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `no_wa`, `alamat`, `id_paket`, `ip`) VALUES
(1, 'test', '123', '0', '', 4, '192.168.10.19'),
(2, 'tedjo', '111', '0', '', 1, '192.168.35.35'),
(3, 'tuman', '2005', '0', '', 1, '192.168.25.22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `tgl_bayar`) VALUES
(1, 1, '2022-01-01'),
(2, 1, '2022-02-01'),
(4, 1, '2022-03-01'),
(6, 1, '2022-04-01'),
(7, 1, '2022-05-01'),
(8, 2, '2022-01-01'),
(9, 1, '2023-01-01'),
(10, 1, '2023-02-01'),
(11, 1, '2023-03-18'),
(12, 1, '2023-03-18'),
(13, 3, '2023-01-01'),
(14, 3, '2023-02-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl`
--

CREATE TABLE `pkl` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `awalpkl` date NOT NULL,
  `akhirpkl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pkl`
--

INSERT INTO `pkl` (`id`, `nama`, `sekolah`, `hp`, `email`, `awalpkl`, `akhirpkl`) VALUES
(1, 'Davina Syafa Fanisa', 'SMK Yapalis', '085784387901', 'vinafanisa07@gmail.com', '2022-11-04', '2023-03-06'),
(2, 'Septiana Iva Bella Attaqi', 'SMK Yapalis', '085733603995', 'bellaatq@gmail.com', '2022-11-04', '2023-03-06'),
(3, 'Futy Khatul Jannah', 'SMK Yapalis', '08990697767', 'futykhatulj@gmail.com', '2022-11-04', '2023-05-04'),
(4, 'Nabila Hikmah Widyadari', 'SMK Yapalis', '081330069796', 'nabilahikmahwtkjx@gmail.com', '2022-11-04', '2023-05-04'),
(5, 'Fikhy Fitrah Ardiansyah', 'SMKN 1 Pungging', '089632825721', 'fikhyfitrah123@gmail.com', '2022-11-01', '2023-02-28'),
(6, 'Mohammad Eric Ardiansyah', 'SMKN 1 Pungging', '085733713800', 'achmataditya972@gmail.com', '2022-11-01', '2023-02-28'),
(7, 'Alin Fernando', 'SMK Wijaya Putra', '085792797861', 'wstrerak665@gmaiil.com', '2022-08-30', '2023-02-28'),
(8, 'Nur Khusaini Ramadhan', 'SMKN 1 Cerme', '0859181282504', 'nurkhusainiramadhan@gmail.com', '2022-11-01', '2022-12-31'),
(9, 'Muhammad Ariel Afansyah', 'SMKN 1 Cerme', '085755562580', 'aril33741@gmail.com', '2022-11-01', '2022-12-31'),
(10, 'Achmad Aura Syahrul Muharrom', 'SMK Wijaya Putra', '085895819945', 'smuharom13@gmail.com', '2022-08-30', '2023-02-28'),
(11, 'Muhammad Firmansyah Maulana', 'SMKN 1 Pungging', '081362303547', 'demons2354@gmail.com', '2022-11-01', '2023-02-28'),
(12, 'M. Fauzan Adhim', 'SMK Yapalis', '0895620052207', 'adhimfauzan880@gmail.com', '2022-11-04', '2023-05-04'),
(13, 'Mauris Hilmy Hasyim', 'SMKN 1 Cerme', '085806009301', 'maurishasyim@gmail.com', '2022-11-01', '2022-12-31'),
(14, 'Fathir Mahda Cesario', 'SMK Yapalis', '0895393659145', 'fathiryot@gmail.com', '2022-11-04', '2023-05-04'),
(15, 'Moch. Rival Firdausy', 'SMKN 1 Cerme', '081398044088', 'muhammadgojam@gmail.com', '2022-11-01', '2022-12-31'),
(16, 'M. Yusuf Javananta', 'SMK Yapalis', '085812369347', 'yjava418@gmail.com', '2022-11-04', '2023-05-04'),
(17, 'Muhammad Sholikhuddin Jaka Susanto', 'SMKN 1 Pungging', '081366382157', 'susantojaka688@gmail.com', '2022-11-01', '2023-02-28'),
(18, 'Haikal Nauval Febryansyah', 'SMK Maarif NU Driyorejo', '085784259327', 'naufalh833@gmail.com', '2023-01-09', '2023-07-09'),
(19, 'Beta Ardianto', 'SMK Maarif NU Driyorejo', '089651922080', 'betaardianto06@gmail.com', '2023-01-09', '2023-07-09'),
(20, 'Shaktria Tedja Prakasa', 'SMKN 2 Surabaya', '088230649933', 'tedjaprakasa@gmail.com', '2023-01-02', '2023-03-31'),
(21, 'Muhammad Iqbal Mahmudi', 'SMKN 2 Surabaya', '085156457762', 'qblmahmudi@gmail.com', '2023-01-02', '2023-03-31'),
(22, 'Muhammad Berliano Adam Saputro', 'SMKN 2 Surabaya', '085219724712', 'adamsaputro317@gmail.com', '2023-01-02', '2023-03-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL,
  `nomor_sertifikat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `nomor_sertifikat`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', 'c4d9cba628d3bb34940610cdcd9c1d62', 'admin'),
(2, 'tuman', '21232f297a57a5a743894a0e4a801fc3', 'iqbal');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pkl`
--
ALTER TABLE `pkl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
