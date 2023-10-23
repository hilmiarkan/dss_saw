-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2023 at 04:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DSS_perhitunganpenerimakeringananspp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `idalternatif` int(11) NOT NULL,
  `nmalternatif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`idalternatif`, `nmalternatif`) VALUES
(1, 'Maulana Hilmi Arkan'),
(2, 'Merryxvelliane Fitriatasa Fujianto'),
(3, 'Sayyed Aamir Hassan'),
(4, 'Fahma Sahmura Habib'),
(5, 'Mafatikhul Huda');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `idbobot` int(11) NOT NULL,
  `idkriteria` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`idbobot`, `idkriteria`, `value`) VALUES
(1, 1, '0.456'),
(2, 2, '0.256'),
(3, 3, '0.156'),
(4, 4, '0.09'),
(5, 5, '0.04');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idkriteria` int(11) NOT NULL,
  `nmkriteria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idkriteria`, `nmkriteria`) VALUES
(1, 'Penghasilan Orang Tua'),
(2, 'Jumlah Tanggungan Orang Tua'),
(3, 'Nilai Rata-Rata Rapor'),
(4, 'Kedisiplinan'),
(5, 'Keikutsertaan dalam Lomba');

-- --------------------------------------------------------

--
-- Table structure for table `matrixkeputusan`
--

CREATE TABLE `matrixkeputusan` (
  `idmatrix` int(11) NOT NULL,
  `idalternatif` int(11) DEFAULT NULL,
  `idbobot` int(11) DEFAULT NULL,
  `idskala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matrixkeputusan`
--

INSERT INTO `matrixkeputusan` (`idmatrix`, `idalternatif`, `idbobot`, `idskala`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 2),
(7, 2, 2, 2),
(8, 2, 3, 2),
(9, 2, 4, 2),
(10, 2, 5, 2),
(11, 3, 1, 3),
(12, 3, 2, 3),
(13, 3, 3, 3),
(14, 3, 4, 3),
(15, 3, 5, 3),
(16, 4, 1, 4),
(17, 4, 2, 4),
(18, 4, 3, 4),
(19, 4, 4, 4),
(20, 4, 5, 4),
(21, 5, 1, 5),
(22, 5, 2, 5),
(23, 5, 3, 5),
(24, 5, 4, 5),
(25, 5, 5, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nilaimax`
-- (See below for the actual view)
--
CREATE TABLE `nilaimax` (
`idkriteria` int(11)
,`nmkriteria` varchar(50)
,`maksimum` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `skala`
--

CREATE TABLE `skala` (
  `idskala` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skala`
--

INSERT INTO `skala` (`idskala`, `value`, `keterangan`) VALUES
(1, 1, 'Sangat Baik'),
(2, 2, 'Baik'),
(3, 3, 'Cukup'),
(4, 4, 'Kurang Baik'),
(5, 5, 'Tidak Baik');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmatrixkeputusan`
-- (See below for the actual view)
--
CREATE TABLE `vmatrixkeputusan` (
`idmatrix` int(11)
,`idalternatif` int(11)
,`nmalternatif` varchar(50)
,`idkriteria` int(11)
,`nmkriteria` varchar(50)
,`idbobot` int(11)
,`value` varchar(50)
,`nilai` int(11)
,`keterangan` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vnormalisasi`
-- (See below for the actual view)
--
CREATE TABLE `vnormalisasi` (
`idmatrix` int(11)
,`idalternatif` int(11)
,`nmalternatif` varchar(50)
,`idkriteria` int(11)
,`nmkriteria` varchar(50)
,`idbobot` int(11)
,`value` varchar(50)
,`nilai` int(11)
,`keterangan` varchar(50)
,`normalisasi` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vprarangking`
-- (See below for the actual view)
--
CREATE TABLE `vprarangking` (
`idmatrix` int(11)
,`idalternatif` int(11)
,`nmalternatif` varchar(50)
,`idkriteria` int(11)
,`nmkriteria` varchar(50)
,`idbobot` int(11)
,`value` varchar(50)
,`nilai` int(11)
,`keterangan` varchar(50)
,`normalisasi` decimal(14,4)
,`prarangking` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrangking`
-- (See below for the actual view)
--
CREATE TABLE `vrangking` (
`idalternatif` int(11)
,`nmalternatif` varchar(50)
,`rangking` double
);

-- --------------------------------------------------------

--
-- Structure for view `nilaimax`
--
DROP TABLE IF EXISTS `nilaimax`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dss_perhitunganpenerimakeringananspp`.`nilaimax`  AS SELECT `vmatrixkeputusan`.`idkriteria` AS `idkriteria`, `vmatrixkeputusan`.`nmkriteria` AS `nmkriteria`, max(`vmatrixkeputusan`.`nilai`) AS `maksimum` FROM `dss_perhitunganpenerimakeringananspp`.`vmatrixkeputusan` GROUP BY `vmatrixkeputusan`.`idkriteria` ;

-- --------------------------------------------------------

--
-- Structure for view `vmatrixkeputusan`
--
DROP TABLE IF EXISTS `vmatrixkeputusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dss_perhitunganpenerimakeringananspp`.`vmatrixkeputusan`  AS SELECT `dss_perhitunganpenerimakeringananspp`.`matrixkeputusan`.`idmatrix` AS `idmatrix`, `dss_perhitunganpenerimakeringananspp`.`alternatif`.`idalternatif` AS `idalternatif`, `dss_perhitunganpenerimakeringananspp`.`alternatif`.`nmalternatif` AS `nmalternatif`, `dss_perhitunganpenerimakeringananspp`.`kriteria`.`idkriteria` AS `idkriteria`, `dss_perhitunganpenerimakeringananspp`.`kriteria`.`nmkriteria` AS `nmkriteria`, `dss_perhitunganpenerimakeringananspp`.`bobot`.`idbobot` AS `idbobot`, `dss_perhitunganpenerimakeringananspp`.`bobot`.`value` AS `value`, `dss_perhitunganpenerimakeringananspp`.`skala`.`value` AS `nilai`, `dss_perhitunganpenerimakeringananspp`.`skala`.`keterangan` AS `keterangan` FROM ((((`dss_perhitunganpenerimakeringananspp`.`matrixkeputusan` join `dss_perhitunganpenerimakeringananspp`.`skala`) join `dss_perhitunganpenerimakeringananspp`.`bobot`) join `dss_perhitunganpenerimakeringananspp`.`kriteria`) join `dss_perhitunganpenerimakeringananspp`.`alternatif`) WHERE `dss_perhitunganpenerimakeringananspp`.`matrixkeputusan`.`idalternatif` = `dss_perhitunganpenerimakeringananspp`.`alternatif`.`idalternatif` AND `dss_perhitunganpenerimakeringananspp`.`matrixkeputusan`.`idbobot` = `dss_perhitunganpenerimakeringananspp`.`bobot`.`idbobot` AND `dss_perhitunganpenerimakeringananspp`.`matrixkeputusan`.`idskala` = `dss_perhitunganpenerimakeringananspp`.`skala`.`idskala` AND `dss_perhitunganpenerimakeringananspp`.`kriteria`.`idkriteria` = `dss_perhitunganpenerimakeringananspp`.`bobot`.`idkriteria` ;

-- --------------------------------------------------------

--
-- Structure for view `vnormalisasi`
--
DROP TABLE IF EXISTS `vnormalisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dss_perhitunganpenerimakeringananspp`.`vnormalisasi`  AS SELECT `vmatrixkeputusan`.`idmatrix` AS `idmatrix`, `vmatrixkeputusan`.`idalternatif` AS `idalternatif`, `vmatrixkeputusan`.`nmalternatif` AS `nmalternatif`, `vmatrixkeputusan`.`idkriteria` AS `idkriteria`, `vmatrixkeputusan`.`nmkriteria` AS `nmkriteria`, `vmatrixkeputusan`.`idbobot` AS `idbobot`, `vmatrixkeputusan`.`value` AS `value`, `vmatrixkeputusan`.`nilai` AS `nilai`, `vmatrixkeputusan`.`keterangan` AS `keterangan`, `vmatrixkeputusan`.`nilai`/ `nilaimax`.`maksimum` AS `normalisasi` FROM (`dss_perhitunganpenerimakeringananspp`.`vmatrixkeputusan` join `dss_perhitunganpenerimakeringananspp`.`nilaimax`) WHERE `nilaimax`.`idkriteria` = `vmatrixkeputusan`.`idkriteria` GROUP BY `vmatrixkeputusan`.`idmatrix` ;

-- --------------------------------------------------------

--
-- Structure for view `vprarangking`
--
DROP TABLE IF EXISTS `vprarangking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dss_perhitunganpenerimakeringananspp`.`vprarangking`  AS SELECT `vnormalisasi`.`idmatrix` AS `idmatrix`, `vnormalisasi`.`idalternatif` AS `idalternatif`, `vnormalisasi`.`nmalternatif` AS `nmalternatif`, `vnormalisasi`.`idkriteria` AS `idkriteria`, `vnormalisasi`.`nmkriteria` AS `nmkriteria`, `vnormalisasi`.`idbobot` AS `idbobot`, `vnormalisasi`.`value` AS `value`, `vnormalisasi`.`nilai` AS `nilai`, `vnormalisasi`.`keterangan` AS `keterangan`, `vnormalisasi`.`normalisasi` AS `normalisasi`, `vnormalisasi`.`value`* `vnormalisasi`.`normalisasi` AS `prarangking` FROM `dss_perhitunganpenerimakeringananspp`.`vnormalisasi` GROUP BY `vnormalisasi`.`idmatrix` ;

-- --------------------------------------------------------

--
-- Structure for view `vrangking`
--
DROP TABLE IF EXISTS `vrangking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dss_perhitunganpenerimakeringananspp`.`vrangking`  AS SELECT `vprarangking`.`idalternatif` AS `idalternatif`, `vprarangking`.`nmalternatif` AS `nmalternatif`, sum(`vprarangking`.`prarangking`) AS `rangking` FROM `dss_perhitunganpenerimakeringananspp`.`vprarangking` GROUP BY `vprarangking`.`idalternatif` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`idalternatif`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`idbobot`),
  ADD KEY `id_kriteria` (`idkriteria`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idkriteria`);

--
-- Indexes for table `matrixkeputusan`
--
ALTER TABLE `matrixkeputusan`
  ADD PRIMARY KEY (`idmatrix`),
  ADD KEY `idalternatif` (`idalternatif`),
  ADD KEY `idbobot` (`idbobot`),
  ADD KEY `idskala` (`idskala`);

--
-- Indexes for table `skala`
--
ALTER TABLE `skala`
  ADD PRIMARY KEY (`idskala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `idalternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `idbobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `idkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matrixkeputusan`
--
ALTER TABLE `matrixkeputusan`
  MODIFY `idmatrix` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `skala`
--
ALTER TABLE `skala`
  MODIFY `idskala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bobot`
--
ALTER TABLE `bobot`
  ADD CONSTRAINT `bobot_ibfk_1` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`idkriteria`);

--
-- Constraints for table `matrixkeputusan`
--
ALTER TABLE `matrixkeputusan`
  ADD CONSTRAINT `matrixkeputusan_ibfk_1` FOREIGN KEY (`idalternatif`) REFERENCES `alternatif` (`idalternatif`),
  ADD CONSTRAINT `matrixkeputusan_ibfk_2` FOREIGN KEY (`idbobot`) REFERENCES `bobot` (`idbobot`),
  ADD CONSTRAINT `matrixkeputusan_ibfk_3` FOREIGN KEY (`idskala`) REFERENCES `skala` (`idskala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
