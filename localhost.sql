-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2023 at 12:05 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 8.0.0

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
CREATE DATABASE IF NOT EXISTS `admin_csmon` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `admin_csmon`;

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `awalpkl` date NOT NULL,
  `akhirpkl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pkl`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', 'c4d9cba628d3bb34940610cdcd9c1d62', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pkl`
--
ALTER TABLE `pkl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
