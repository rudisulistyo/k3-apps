-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 10:40 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_k3`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `IDArea` int(11) NOT NULL,
  `namaarea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`IDArea`, `namaarea`) VALUES
(0, 'Gudang1'),
(1, 'Gudang2'),
(2, 'Kantor1'),
(3, 'Kantor2'),
(4, 'Lab1');

-- --------------------------------------------------------

--
-- Table structure for table `areabahaya`
--

CREATE TABLE `areabahaya` (
  `IDArea` int(11) NOT NULL,
  `NIP` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areabahaya`
--

INSERT INTO `areabahaya` (`IDArea`, `NIP`, `keterangan`, `approve`) VALUES
(0, 3, 'Rak 1 berkarat', 0),
(1, 5, 'ada taikucing di pojokan', 1),
(0, 6, 'upil dibawah meja sudah numpuk', 0),
(0, 7, 'pintu sudah lapuk', 0),
(0, 8, 'apaan ini?', 0),
(2, 2, 'oh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `iddiv` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`iddiv`, `divisi`) VALUES
(0, 'div0'),
(1, 'div1'),
(2, 'div2'),
(3, 'divisi3');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `info` text NOT NULL,
  `quizaktif` int(11) NOT NULL,
  `quiztime` int(11) NOT NULL,
  `reset` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`info`, `quizaktif`, `quiztime`, `reset`) VALUES
('Selamat Datang', 0, 10, '2018-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `hasilquiz`
--

CREATE TABLE `hasilquiz` (
  `NIP` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `durasi` double NOT NULL,
  `ftime_answer` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasilquiz`
--

INSERT INTO `hasilquiz` (`NIP`, `nilai`, `durasi`, `ftime_answer`, `tanggal`) VALUES
(0, 1, 600, '2019-01-06 16:52:48', '2019-01-06'),
(2, 10, 94, '0000-00-00 00:00:00', '2019-01-03'),
(3, 135, 145, '0000-00-00 00:00:00', '2019-01-03'),
(4, 90, 118, '0000-00-00 00:00:00', '2019-01-03'),
(5, 1, 600, '0000-00-00 00:00:00', '2019-01-06'),
(6, 81, 601, '0000-00-00 00:00:00', '2019-01-08'),
(7, 117, 21, '0000-00-00 00:00:00', '2019-01-08'),
(8, 117, 74, '0000-00-00 00:00:00', '2019-01-08'),
(9, 55, 34, '0000-00-00 00:00:00', '2019-01-09'),
(10, 2, 0, '0000-00-00 00:00:00', '2018-06-14'),
(11, 3, 0, '0000-00-00 00:00:00', '2018-06-14'),
(12, 0, 0, '0000-00-00 00:00:00', '2018-06-14'),
(13, 2, 0, '0000-00-00 00:00:00', '2018-06-14'),
(14, 20, 0, '0000-00-00 00:00:00', '2018-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idsoal` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idsoal`, `nip`, `nilai`) VALUES
(0, 14, 0),
(1, 14, 9.9999),
(2, 14, 0),
(3, 14, 9.9999),
(4, 14, 0),
(5, 14, 0),
(0, 2, 1),
(1, 2, 9),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(0, 3, 0),
(1, 3, 9),
(2, 3, 18),
(3, 3, 27),
(4, 3, 36),
(5, 3, 45),
(0, 4, 0),
(1, 4, 9),
(2, 4, 0),
(3, 4, 0),
(4, 4, 36),
(5, 4, 45),
(0, 5, 1),
(1, 5, 0),
(2, 5, 0),
(3, 5, 0),
(4, 5, 0),
(5, 5, 0),
(0, 0, 1),
(1, 0, 0),
(2, 0, 0),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(0, 7, 0),
(1, 7, 9),
(2, 7, 0),
(3, 7, 27),
(4, 7, 36),
(5, 7, 45),
(0, 8, 0),
(1, 8, 9),
(2, 8, 0),
(3, 8, 27),
(4, 8, 36),
(5, 8, 45),
(0, 6, 0),
(1, 6, 9),
(2, 6, 0),
(3, 6, 27),
(4, 6, 0),
(5, 6, 45),
(0, 9, 1),
(1, 9, 0),
(2, 9, 18),
(3, 9, 0),
(4, 9, 36),
(5, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir`
--

CREATE TABLE `nilai_akhir` (
  `id_na` bigint(20) UNSIGNED NOT NULL,
  `NIP` int(11) NOT NULL,
  `na` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `observasi`
--

CREATE TABLE `observasi` (
  `idobs` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `observasi` text NOT NULL,
  `status` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `observasi`
--

INSERT INTO `observasi` (`idobs`, `nip`, `observasi`, `status`, `tgl`, `approve`) VALUES
(0, 2, 'asdfg', 0, '2018-10-15', 1),
(1, 3, 'Lorem ipsum dolor sit amet.', 1, '2018-10-15', 0),
(2, 7, 'sdfg', 0, '2018-10-15', 1),
(3, 7, 'yre', 0, '2018-10-15', 1),
(4, 2, 'fbd', 0, '2018-10-15', 0),
(5, 4, 'sdtr', 1, '2018-10-15', 0),
(6, 2, 'wer', 1, '2018-10-15', 1),
(7, 10, 'sdg', 3, '2018-10-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `idquiz` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`idquiz`, `waktu`) VALUES
(0, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `soalquiz`
--

CREATE TABLE `soalquiz` (
  `IDsoal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL,
  `pilihan1` text NOT NULL,
  `pilihan2` text NOT NULL,
  `pilihan3` text NOT NULL,
  `idquiz` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `images` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soalquiz`
--

INSERT INTO `soalquiz` (`IDsoal`, `soal`, `jawaban`, `pilihan1`, `pilihan2`, `pilihan3`, `idquiz`, `bobot`, `images`) VALUES
(0, 'abc?', 'd', 'alfabets', 'xyz', 'huruf awal', 1, 1, ''),
(1, 'Berapa jumlah huruf dalam alfabet?', '7', '26', '43', '34', 0, 9, ''),
(2, 'jawab dengan benar!', 'benar', 'salah', 'mungkin', 'bisa jadi', 0, 18, ''),
(3, 'ini soal?', 'ya', 'tidak', 'masa?', 'bukan', 1, 27, ''),
(4, '1+1=?', '2', '11', '12', '123', 0, 36, 'matematika.jpg'),
(5, 'qwe?', 'r', 's', 'a', 'z', 0, 45, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `idstat` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`idstat`, `status`, `poin`) VALUES
(0, 'Near Miss', 5),
(1, 'Property Damage', 10),
(2, 'Cidera Ringan', 20),
(3, 'Fatality', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIP` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `level` int(11) NOT NULL,
  `iddivisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `nama`, `pass`, `level`, `iddivisi`) VALUES
(0, 'admin', '21232F297A57A5A743894A0E4A801FC3', 1, 0),
(1, 'super', '1B3231655CEBB7A1F783EDDF27D254CA', 2, 0),
(2, 'user2', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(3, 'user3', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 2),
(4, 'user4', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 3),
(5, 'user5', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 2),
(6, 'user6', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(7, 'user7', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(8, 'user8', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(9, 'user9', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(10, 'user10', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 0),
(11, 'user11', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(12, 'user12', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(13, 'user13', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(14, 'user14', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0),
(15, 'user15', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userquiz`
--

CREATE TABLE `userquiz` (
  `iduser` int(11) NOT NULL,
  `quiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userquiz`
--

INSERT INTO `userquiz` (`iduser`, `quiz`) VALUES
(2, 2),
(3, 1),
(4, 0),
(5, 0),
(6, 2),
(7, 10),
(8, 22),
(9, 21),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`IDArea`);

--
-- Indexes for table `hasilquiz`
--
ALTER TABLE `hasilquiz`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id_na`),
  ADD UNIQUE KEY `id_na` (`id_na`),
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `observasi`
--
ALTER TABLE `observasi`
  ADD PRIMARY KEY (`idobs`);

--
-- Indexes for table `soalquiz`
--
ALTER TABLE `soalquiz`
  ADD PRIMARY KEY (`IDsoal`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `idstat` (`idstat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`),
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `userquiz`
--
ALTER TABLE `userquiz`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `iduser` (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id_na` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
