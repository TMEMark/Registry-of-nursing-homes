-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 07:09 PM
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
-- Database: `test`
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
(1, 'Skrb i usluge za pokretne starije osobe'),
(2, 'Skrb i usluge za polupokretne starije osobe'),
(3, 'Skrb i usluge za nepokretne starije osobe'),
(4, 'Skrb i usluge za starije osobe s neurološkim bolestima (npr. Parkinsonova bolest, Alzheimerova bolest, Moždani udar i dr.)'),
(5, 'Skrb i usluge za starije osobe koje boluju od psihičkih bolesti'),
(6, 'Palijativna skrb za starije osobe (briga za teško i neizlječivo bolesne i umiruće osobe)'),
(7, 'Informiranje i pomoć pri utvrđivanju potreba'),
(8, 'Savjetovanje i pomaganje'),
(9, 'Psihosocijalna podrška'),
(10, 'Pomoć u kući'),
(11, 'Boravak'),
(12, 'Smještaj za pokretne korisnike/ce oboljele od AB i drugih demencija'),
(13, 'Smještaj za nepokretne korisnike/ce oboljele od AB i drugih demencija');

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `idLokacije` int(11) NOT NULL,
  `naziv_lokacije` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`idLokacije`, `naziv_lokacije`) VALUES
(1, 'Osječko-baranjska'),
(2, 'Vukovarsko-srijemska');

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
  `drustvena_mreza` varchar(50) DEFAULT NULL,
  `radno_vrijeme` varchar(50) DEFAULT NULL,
  `napomena` mediumtext DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `lokacija` int(11) DEFAULT NULL,
  `oib` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruzatelji`
--

INSERT INTO `pruzatelji` (`idPruz`, `naziv_pruzatelja`, `email`, `adresa`, `kontakt`, `URL_stranice`, `drustvena_mreza`, `radno_vrijeme`, `napomena`, `longitude`, `latitude`, `lokacija`, `oib`) VALUES
(1, 'Ženska udruga \"Izvor\"', 'zenska.udruga.izvor@gmail.com', 'Vladka Mačeka 20, Tenja', '031290433', 'http://www.zenska-udruga-izvor.hr/o-nama/', NULL, 'ponedjeljak-petak, 8-16 sati', 'https://www.facebook.com/zenskaudruga.izvor', '18.748566011752366', '45.50121911445222', 1, '1497703750'),
(2, 'REZIDENCIJALNI DOM ZA STARIJE', 'rezidencijalni.domovi@gmail.com', 'OSJEČKA 25, Satnica', '0917395622', 'rezidencijalnidomzastarije.hr', NULL, '0-24', '', '18.49264356942618', '45.61445586742308', 1, '35556131344'),
(3, 'Dom za starije i nemoćne osobe Tajnovac', 'centar.tajnovac@gmail.com', 'Tajnovac 32, Zoljan', '031/ 609 078, 091/ 518 3041', '', NULL, 'ponedjeljak - petak, 9-18 sati', '', '18.046468725245408', '45.46853960710952', 1, '56930592321');

-- --------------------------------------------------------

--
-- Table structure for table `pruzatelji_kategorije`
--

CREATE TABLE `pruzatelji_kategorije` (
  `idPruzKat` int(11) NOT NULL,
  `pruzatelj` int(11) DEFAULT NULL,
  `kategorija` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruzatelji_kategorije`
--

INSERT INTO `pruzatelji_kategorije` (`idPruzKat`, `pruzatelj`, `kategorija`) VALUES
(9, 1, 1),
(10, 1, 2),
(11, 1, 3),
(12, 1, 4),
(13, 1, 5),
(14, 1, 7),
(15, 1, 8),
(16, 1, 9),
(17, 1, 10),
(18, 1, 11),
(19, 2, 1),
(20, 2, 2),
(21, 2, 3),
(22, 2, 4),
(23, 2, 5),
(24, 2, 6),
(25, 2, 7),
(26, 2, 8),
(27, 2, 9),
(28, 2, 10),
(29, 2, 11),
(30, 2, 12),
(31, 2, 13),
(32, 3, 1),
(33, 3, 2),
(34, 3, 3),
(35, 3, 4),
(36, 3, 7),
(37, 3, 13);

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
(23, 1, 1),
(24, 1, 2),
(25, 1, 3),
(26, 1, 4),
(27, 1, 7),
(28, 2, 1),
(29, 2, 2),
(30, 2, 3),
(31, 2, 4),
(32, 2, 5),
(33, 2, 6),
(34, 2, 7),
(35, 2, 8),
(36, 2, 9),
(37, 2, 10),
(38, 3, 2),
(39, 3, 5),
(40, 3, 8),
(41, 3, 9),
(42, 3, 10);

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
(1, 'Prva socijalna usluga (informiranje o socijalnim uslugama i pružateljima, pomoć pri utvrđivanju potreba i izboru prava u sustavu socijalne skrbi i dr.)'),
(2, 'Savjetovanje i pomaganje (stručna pomoć korisnicima/ama i/ili članovima obitelji u cilju prevladavanja poteškoća u svakodnevnom životu)'),
(3, 'Pomoć u kući (organizacija prehrane, obavljanje kućnih poslova i dr.)'),
(4, 'Boravak (cjelodnevni ili poludnevni, organizacija slobodnog vremena i aktivnost, npr. radionice i rekreacijai)'),
(5, 'Smještaj (stanovanje, prehrana, njega, rehabilitacija i dr.)'),
(6, 'Organizirano stanovanje (uz stalnu ili povremenu pomoć stručne osobe, osiguranje životnih ptoreba)'),
(7, 'Psihosocijalna podrška (radi prevladavanja teškoća i osnaživanja pojedinca)'),
(8, 'Privremeni smještaj (npr. u kriznim situacijama, u slučaju rehabilitacije i drugim propisanim slučajevima)'),
(9, 'Dugotrajni smještaj (dugotrajna skrb o korisniku uz zadovoljenje njegovih životnih potreba)'),
(10, 'Povremeni smještaj');

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
-- Indexes for table `pruzatelji_kategorije`
--
ALTER TABLE `pruzatelji_kategorije`
  ADD PRIMARY KEY (`idPruzKat`),
  ADD KEY `pruzatelji_kategorije_ibfk_1` (`pruzatelj`),
  ADD KEY `pruzatelji_kategorije_ibfk_2` (`kategorija`);

--
-- Indexes for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  ADD PRIMARY KEY (`idPruzUsl`),
  ADD KEY `pruzatelji_usluge_ibfk_1` (`pruzatelj`),
  ADD KEY `pruzatelji_usluge_ibfk_2` (`usluga`);

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
  MODIFY `idKategorija` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `idLokacije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pruzatelji`
--
ALTER TABLE `pruzatelji`
  MODIFY `idPruz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pruzatelji_kategorije`
--
ALTER TABLE `pruzatelji_kategorije`
  MODIFY `idPruzKat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  MODIFY `idPruzUsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usluge`
--
ALTER TABLE `usluge`
  MODIFY `idUsluge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `pruzatelji_kategorije`
--
ALTER TABLE `pruzatelji_kategorije`
  ADD CONSTRAINT `pruzatelji_kategorije_ibfk_1` FOREIGN KEY (`pruzatelj`) REFERENCES `pruzatelji` (`idPruz`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruzatelji_kategorije_ibfk_2` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`idKategorija`) ON DELETE CASCADE;

--
-- Constraints for table `pruzatelji_usluge`
--
ALTER TABLE `pruzatelji_usluge`
  ADD CONSTRAINT `pruzatelji_usluge_ibfk_1` FOREIGN KEY (`pruzatelj`) REFERENCES `pruzatelji` (`idPruz`) ON DELETE CASCADE,
  ADD CONSTRAINT `pruzatelji_usluge_ibfk_2` FOREIGN KEY (`usluga`) REFERENCES `usluge` (`idUsluge`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
