-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2023 at 05:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mas_yosi_modul2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE `data_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(8, 'Teknik Informatika'),
(9, 'Sistem Informasi'),
(10, 'management'),
(11, 'akuntansi'),
(12, 'Industri'),
(13, 'Hukum '),
(14, 'Kedokteran'),
(15, 'tkj'),
(16, 'rpl');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim_mahasiswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id_mahasiswa`, `id_jurusan`, `nama_mahasiswa`, `nim_mahasiswa`, `tgl_lahir`, `jenis_kelamin`) VALUES
(16, 8, 'Ananda Maulana Wahyudi', '2202310054', '2003-03-31', 'L'),
(17, 8, 'ananda', '83474737', '1995-12-31', 'L'),
(18, 9, 'Santi', '58485485', '2012-11-30', 'P'),
(19, 12, 'rahem', '34734362', '1998-01-01', 'L'),
(20, 13, 'putri ani', '2323552', '2023-12-31', 'P'),
(21, 10, 'sasuke', '7437473', '2023-12-31', 'L'),
(22, 14, 'rani ', '43743773', '2020-12-28', 'P'),
(23, 13, 'teguh', '5458458', '2000-06-09', 'L'),
(24, 11, 'febri', '4454588', '2023-12-31', 'L'),
(25, 8, 'ramdan', '57457574', '2018-12-29', 'L'),
(26, 8, 'Toriq', '666646', '0022-12-19', 'L'),
(27, 8, 'Ica', '3424346', '0005-05-05', 'P'),
(28, 8, 'dani', '73777347', '2018-12-31', 'P'),
(29, 14, 'ica', '47474377', '2013-12-31', 'P'),
(31, 9, 'wahyudi', '232332', '2015-12-31', 'P'),
(32, 10, 'rafi ', '4664363', '2006-08-24', 'L'),
(33, 15, 'ananda mw mw', '434434343', '2004-03-31', 'L'),
(34, 16, 'ananda mw ', '348343488', '2008-12-30', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_jurusan`
--
ALTER TABLE `data_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD CONSTRAINT `data_mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `data_jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
