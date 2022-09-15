-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 12:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administratori`
--

CREATE TABLE `administratori` (
  `idAdmin` int(11) NOT NULL,
  `ime_admina` varchar(255) DEFAULT NULL,
  `prezime_admina` varchar(255) DEFAULT NULL,
  `korisnicko_ime` varchar(255) DEFAULT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `uloga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administratori`
--

INSERT INTO `administratori` (`idAdmin`, `ime_admina`, `prezime_admina`, `korisnicko_ime`, `lozinka`, `uloga`) VALUES
(4, 'Marija', 'Milošević', 'mmilosevic', '$2y$10$O2dTlT6nT8ce14v5hpwLqesrDPu2ZimrdPvILNANMLZ2GbSH6ENmy', 1),
(5, 'Marko', 'Buljan', 'mbuljan', '$2y$10$6/xZqBbh01O0.8bimm1rvOX9DlpYuZRek.pEvvKviMTwmf0pDimeC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `idKategorija` int(11) NOT NULL,
  `naziv_kategorije` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`idKategorija`, `naziv_kategorije`) VALUES
(1, 'Skrb o pokretnim osobama'),
(2, 'Skrb o nepokretnim osobama'),
(3, 'Skrb o psihički bolesnim osobama'),
(4, 'Skrb o osobama s demencijom/Alzheimerom'),
(5, 'Palijativna skrb'),
(10, 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `idLokacije` int(11) NOT NULL,
  `naziv_lokacije` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`idLokacije`, `naziv_lokacije`) VALUES
(1, 'Osje?ko baranjska'),
(2, 'Vukovarsko srijemska');

-- --------------------------------------------------------

--
-- Table structure for table `pruzatelji`
--

CREATE TABLE `pruzatelji` (
  `idPruz` int(11) NOT NULL,
  `naziv_pruzatelja` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresa` varchar(50) DEFAULT NULL,
  `kontakt` varchar(50) DEFAULT NULL,
  `URL_stranice` varchar(50) DEFAULT NULL,
  `radno_vrijeme` varchar(50) DEFAULT NULL,
  `napomena` mediumtext DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `lokacija` int(11) DEFAULT NULL,
  `oib` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruzatelji`
--

INSERT INTO `pruzatelji` (`idPruz`, `naziv_pruzatelja`, `email`, `adresa`, `kontakt`, `URL_stranice`, `radno_vrijeme`, `napomena`, `longitude`, `latitude`, `lokacija`, `oib`) VALUES
(1, 'STARČEVIĆ - obiteljski dom za starije', 'obiteljskidomstarcevic@gmail.com', 'Josipa Kosora 9, 31207 Tenja', '095/37 77 367', 'http://www.obiteljskidomstarcevic.hr/', '', 'slogan “Obitelj-Dom-Zajednica”', '45.51906071427537', '18.724171169784814', 1, 2147483647),
(2, 'ĐURIĆ - obiteljski dom za starije', 'email#2@gmail.com', 'Vinkovačka 42, 32010 Vukovar', '098/9376-930', '', '', '', '45.369911483737084', '18.94873200046968', 2, 2147483647),
(3, 'PRIMUM - dom za starije', 'email#2@gmail.com', 'Hrvatske nezavisnosti 166, 32000 Vukovar ', '032/412-966', 'http://www.centar-primum.hr/', '', '', '45.33231959098914', '19.016094740945267', 2, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pruzatelji_usluge`
--

CREATE TABLE `pruzatelji_usluge` (
  `idPruzUsl` int(11) NOT NULL,
  `pruzatelj` int(11) DEFAULT NULL,
  `usluga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruzatelji_usluge`
--

INSERT INTO `pruzatelji_usluge` (`idPruzUsl`, `pruzatelj`, `usluga`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pruzatelji_usluge_kategorije`
--

CREATE TABLE `pruzatelji_usluge_kategorije` (
  `idPruzUslKat` int(11) NOT NULL,
  `pruzatelj_usluga` int(11) DEFAULT NULL,
  `kategorija` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruzatelji_usluge_kategorije`
--

INSERT INTO `pruzatelji_usluge_kategorije` (`idPruzUslKat`, `pruzatelj_usluga`, `kategorija`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 4, 1),
(5, 5, 2),
(6, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloga` int(11) NOT NULL,
  `nazivUloge` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloga`, `nazivUloge`) VALUES
(1, 'Administrator'),
(2, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `usluge`
--

CREATE TABLE `usluge` (
  `idUsluge` int(11) NOT NULL,
  `naziv_usluge` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usluge`
--

INSERT INTO `usluge` (`idUsluge`, `naziv_usluge`) VALUES
(1, 'Trajni smještaj'),
(2, 'Privremeni i povremeni'),
(3, 'Dnevni boravak u domu'),
(4, 'Probno stanovanje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administratori`
--
ALTER TABLE `administratori`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `administratori_ibfk_1` (`uloga`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`idLokacije`) USING BTREE;

--
-- Indexes for table `pruzatelji`
--
ALTER TABLE `pruzatelji`
  ADD PRIMARY KEY (`idPruz`),
  ADD KEY `lokacija` (`lokacija`);

--
-- Indexes for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  ADD PRIMARY KEY (`idPruzUsl`),
  ADD KEY `pruzatelji_usluge_ibfk_1` (`pruzatelj`),
  ADD KEY `pruzatelji_usluge_ibfk_2` (`usluga`);

--
-- Indexes for table `pruzatelji_usluge_kategorije`
--
ALTER TABLE `pruzatelji_usluge_kategorije`
  ADD PRIMARY KEY (`idPruzUslKat`),
  ADD KEY `pruzatelji_usluge_kategorije_ibfk_1` (`pruzatelj_usluga`),
  ADD KEY `pruzatelji_usluge_kategorije_ibfk_2` (`kategorija`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `usluge`
--
ALTER TABLE `usluge`
  ADD PRIMARY KEY (`idUsluge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratori`
--
ALTER TABLE `administratori`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `idKategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `idLokacije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pruzatelji`
--
ALTER TABLE `pruzatelji`
  MODIFY `idPruz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  MODIFY `idPruzUsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pruzatelji_usluge_kategorije`
--
ALTER TABLE `pruzatelji_usluge_kategorije`
  MODIFY `idPruzUslKat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `idUsluge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administratori`
--
ALTER TABLE `administratori`
  ADD CONSTRAINT `administratori_ibfk_1` FOREIGN KEY (`uloga`) REFERENCES `uloge` (`idUloga`);

--
-- Constraints for table `pruzatelji`
--
ALTER TABLE `pruzatelji`
  ADD CONSTRAINT `pruzatelji_ibfk_1` FOREIGN KEY (`lokacija`) REFERENCES `lokacija` (`idLokacije`);

--
-- Constraints for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  ADD CONSTRAINT `pruzatelji_usluge_ibfk_1` FOREIGN KEY (`pruzatelj`) REFERENCES `pruzatelji` (`idPruz`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruzatelji_usluge_ibfk_2` FOREIGN KEY (`usluga`) REFERENCES `usluge` (`idUsluge`) ON DELETE CASCADE;

--
-- Constraints for table `pruzatelji_usluge_kategorije`
--
ALTER TABLE `pruzatelji_usluge_kategorije`
  ADD CONSTRAINT `pruzatelji_usluge_kategorije_ibfk_1` FOREIGN KEY (`pruzatelj_usluga`) REFERENCES `pruzatelji_usluge` (`idPruzUsl`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruzatelji_usluge_kategorije_ibfk_2` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`idKategorija`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
