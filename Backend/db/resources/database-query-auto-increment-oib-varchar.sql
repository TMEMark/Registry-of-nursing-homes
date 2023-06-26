-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 09:01 PM
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
-- Database: `registar`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created`, `last_modified`) VALUES
(1, 'Pokretne starije osobe', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(2, 'Polupokretne starije osobe', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(3, 'Nepokretne starije osobe', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(4, 'Starije osobe s neurološkim bolestima', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(5, 'Starije osobe koje boluju od psihičkih bolesti', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(6, 'Palijativna skrb', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(7, 'Informiranje i pomoć pri utvrđivanju potreba', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(8, 'Savjetovanje i pomaganje', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(9, 'Psihosocijalna podrška', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(10, 'Pomoć u kući', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(11, 'Boravak', '2023-06-26 17:33:59', '2023-06-26 17:33:59'),
(12, 'Smještaj za pokretne korisnike/ce oboljele od demencije', '2023-06-26 17:35:11', '2023-06-26 17:35:11'),
(13, 'Smještaj za nepokretne korisnike/ce oboljele od demencije', '2023-06-26 17:35:11', '2023-06-26 17:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `created`, `last_modified`) VALUES
(6, 'Osječko-baranjska', '2023-06-26 17:36:14', '2023-06-26 17:36:14'),
(7, 'Vukovarsko-srijemska', '2023-06-26 17:36:14', '2023-06-26 17:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created`, `last_modified`) VALUES
(1, 'Administrator', '2023-06-26 17:29:12', '2023-06-26 17:29:12'),
(2, 'Moderator', '2023-06-26 17:29:12', '2023-06-26 17:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `created`, `last_modified`) VALUES
(1, 'Prva socijalna usluga', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(2, 'Savjetovanje i pomaganje', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(3, 'Pomoć u kući (organizacija prehrane, obavljanje ku', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(4, 'Boravak', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(5, 'Smještaj', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(6, 'Organizirano stanovanje', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(7, 'Psihosocijalna podrška', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(8, 'Privremeni smještaj', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(9, 'Dugotrajni smještaj', '2023-06-26 19:49:34', '2023-06-26 19:49:34'),
(10, 'Povremeni smještaj', '2023-06-26 19:49:34', '2023-06-26 19:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `address_number` int(11) DEFAULT NULL,
  `work_time` varchar(50) DEFAULT NULL,
  `website_url` varchar(50) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `oib` varchar(13) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`id`, `name`, `email`, `contact_number`, `address`, `address_number`, `work_time`, `website_url`, `remark`, `longitude`, `latitude`, `location`, `oib`, `created`, `last_modified`) VALUES
(1, 'Ženska udruga \"Izvor\"', 'zenska.udruga.izvor@gmail.com', '031290433', 'Vladka Mačeka 20, Tenja', 0, 'ponedjeljak-petak, 8-16 sati', 'http://www.zenska-udruga-izvor.hr/o-nama/', 'https://www.facebook.com/zenskaudruga.izvor', '18.748566011752366', '45.50121911445222', 6, '1497703750', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(2, 'REZIDENCIJALNI DOM ZA STARIJE', 'rezidencijalni.domovi@gmail.com', '0917395622', 'OSJEČKA 25, Satnica', 0, '0-24', 'rezidencijalnidomzastarije.hr', '', '18.49264356942618', '45.61445586742308', 6, '35556131344', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(3, 'Dom za starije i nemoćne osobe Tajnovac', 'centar.tajnovac@gmail.com', '031/ 609 078, 091/ 518 3041', 'Tajnovac 32, Zoljan', 0, 'ponedjeljak - petak, 9-18 sati', '', '', '18.046468725245408', '45.46853960710952', 6, '56930592321', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(4, 'Obiteljski dom Sanda Peroković', 'sandaperokovic1982@gmail.com', '0914658006', 'Petra Zrinskog 5, Belišće', 0, '24', '', '', '18.41323535', '45.6826177', 6, '78795407314', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(5, 'Obiteljski dom za starije i nemoćne osobe Horvat', 'horvdraz1@gmail.com', '099 771 9262/ 032- 450-275/ 099 212 9084', 'Gorjani 170, Ivankovo', 0, 'ponedjeljak - petak, 8 -18 sati', '', 'https://www.facebook.com/ObiteljskidomHorvat', '18.67285987', '45.28328509', 7, '1580338216', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(6, 'Dom za starije osobe Dobri dom Vinkovci', 'dobri.dom.vinkovci@gmail.com', '0998348342', 'Bana Jelačića 92, Vinkovci', 0, 'ponedjeljak-nedjelja 8-20', 'www.dobri-dom-vinkovci.hr', '', '18.81601144', '45.28670769', 7, '86556799848', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(7, 'AZ Magdalena jdoo za soc. usluge', 'amalovric@gmail.com', '0976030333', 'Alfreda Hilla 1, Vukovar', 0, 'pon-sub 8-18 sati', 'domzastarije-magdalena.com', 'https://www.facebook.com/profile.php?id=100077148338053', '18.99518671', '45.34452915', 7, '7406210768', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(8, 'Dom za starije i nemoćne osobe Đakovo', 'dom@dzs-djakovo.hr', '031/840-049', 'Petra Preradovića 7, Đakovo', 0, '\"UREDOVNO RADNO VRIJEME\r\nPON - PET: 06:30 - 14:30\"', 'http://www.dzs-djakovo.hr/', 'https://hr-hr.facebook.com/dzsdj/', '18.41190474', '45.3057362', 6, '28884778522', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(9, 'Dom za starije i nemoćne osobe Vinkovci', 'dom.vinkovci@gmail.com', ' 032 369 884', 'Nikole Tesle 43b, Vinkovci', 0, 'ponedjeljak-petak 7-15 sati', 'https://domvinkovci.hr/', 'https://www.facebook.com/profile.php?id=100011735121780', '18.81894243', '45.29549605', 7, '67051656383', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(10, 'Socijalno-humanitarna udruga SVJETLOST', 'shusvjetlost@gmail.com', '098 969 5698,   091 976 1709', 'Mažuranićeva ulica 26, Đakovo', 0, 'svakim radnim danom od 09,00 do 12,00', 'web stranica je trenutno u izradi', 'https://www.facebook.com/udrugasvjetlost', '18.41957386', '45.3158888', 6, '19126508680', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(11, 'DOM ZA STARIJE I NEMOĆNE OSOBE VUKOVAR', 'dom.vukovar@gmail.com', '032-451-200', 'Šibenska 14, Vukovar', 0, 'ponedjeljak-petak 7-15 sati', 'www.dom-vukovar.hr', 'https://www.facebook.com/domzastarijevukovar', '19.01900751', '45.34170643', 7, '46655494076', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(12, 'Udruga za psiho-socijalne potrebe Amadea', 'amadea.dj@gmail.com', '0989631896', 'Frankopanska 5c, Đakovo', 0, 'ponedjeljak - petak od 8 - 16 sati', 'www.amadea.hr', '\"facebook amadea', '18.4152513', '45.31276215', 6, '39753103029', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(13, 'DOM ZA STARIJE OSOBE PRIMUM', 'info@centar-primum.hr', '032412966', 'Hrvatske nezavisnosti 166, Vukovar', 0, 'ponedjeljak -petak  8-16', 'http://www.centar-primum.hr/', '', '19.01604101', '45.33230641', 7, '58411215125', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(14, 'Dom za starije i nemoćne osobe  Andraši', 'andrasidom@gmail.com', '095/900-6674 , 032/360-161', 'Alojzija Stepinca 193, Vinkovci', 0, 'svaki dan od  9 - 20 sati', '', '', '18.76048784', '45.28897734', 7, '55656607303', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(15, 'Obiteljski dom Živković', 'vitalis.osijek@gmail.com', '0989420224', 'Poštansko naselje 13, Višnjevac', 0, '9-18', 'https://obiteljskidom.wixsite.com/dom-osijek', 'https://www.facebook.com/dom.za.starije.osijek', '18.61735618', '45.56560853', 6, '50606165571', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(16, 'HCK GDCK Beli Manastir', 'gdck.belimanastir@gmail.com', '031703422', 'Vladimira Nazora 28a, Beli Manastir', 0, '07:00-15:00', 'https://gdck-belimanastir.hr/', 'https://www.facebook.com/crvenikriz.belimanastir', '18.60500137', '45.76901724', 6, '53440067119', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(17, 'Obiteljski dom Nena, vl.Viktoria Piščak', 'obiteljskinena@gmail.com', '091/4951-951', 'Antunovačka 8, Tenja', 0, 'svaki dan od 9-20 sati', '', '', '18.73664441', '45.50765285', 6, '6196632290', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(18, 'Ana-obrt za soc.skrb i usluge', '', '032-388-880', 'Križnog puta 75, Nuštar', 0, 'pon-pet 8-16', '', '', '18.84346295', '45.33334062', 7, '98976023672', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(19, 'Obiteljski dom Marinković', 'marinamarinkovic2807@gmail.com', '097-705-10-73', 'Trpinjska cesta 251, Vukovar', 0, 'Svaki dan od 8-20 sati', '', '', '18.92887564', '45.38730072', 7, '752522760', '2023-06-26 17:51:14', '2023-06-26 17:51:14'),
(20, 'obiteljski dom Klisa', 'obiteljskidomklisa@gmail.com', '0921790537', 'Vukovarska 46, Klisa', 0, 'ponedjeljak-petak, 8-16h', '', '', '18.83367808', '45.47567518', 6, '9453155980', '2023-06-26 17:51:14', '2023-06-26 17:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_category`
--

CREATE TABLE `service_provider_category` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider_category`
--

INSERT INTO `service_provider_category` (`id`, `service_provider_id`, `category_id`, `created`, `last_modified`) VALUES
(1, 1, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(2, 1, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(3, 1, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(4, 1, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(5, 1, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(6, 1, 7, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(7, 1, 8, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(8, 1, 9, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(9, 1, 10, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(10, 1, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(11, 2, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(12, 2, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(13, 2, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(14, 2, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(15, 2, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(16, 2, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(17, 2, 7, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(18, 2, 8, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(19, 2, 9, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(20, 2, 10, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(21, 2, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(22, 2, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(23, 2, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(24, 3, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(25, 3, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(26, 3, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(27, 3, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(28, 3, 7, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(29, 3, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(30, 4, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(31, 4, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(32, 4, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(33, 4, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(34, 4, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(35, 5, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(36, 5, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(37, 5, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(38, 5, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(39, 5, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(40, 5, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(41, 5, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(42, 5, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(43, 6, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(44, 6, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(45, 6, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(46, 6, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(47, 6, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(48, 6, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(49, 6, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(50, 7, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(51, 7, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(52, 7, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(53, 7, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(54, 7, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(55, 7, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(56, 8, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(57, 8, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(58, 8, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(59, 9, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(60, 9, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(61, 9, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(62, 9, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(63, 10, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(64, 10, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(65, 11, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(66, 11, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(67, 11, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(68, 11, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(69, 12, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(70, 12, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(71, 12, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(72, 12, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(73, 12, 8, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(74, 12, 9, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(75, 12, 10, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(76, 12, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(77, 13, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(78, 13, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(79, 13, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(80, 13, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(81, 13, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(82, 13, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(83, 13, 10, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(84, 13, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(85, 13, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(86, 14, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(87, 14, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(88, 14, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(89, 14, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(90, 14, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(91, 14, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(92, 15, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(93, 15, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(94, 15, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(95, 16, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(96, 16, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(97, 17, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(98, 17, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(99, 17, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(100, 17, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(101, 17, 8, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(102, 17, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(103, 17, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(104, 17, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(105, 18, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(106, 18, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(107, 18, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(108, 18, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(109, 18, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(110, 18, 6, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(111, 18, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(112, 18, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(113, 19, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(114, 19, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(115, 19, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(116, 19, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(117, 19, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(118, 19, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(119, 20, 1, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(120, 20, 2, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(121, 20, 3, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(122, 20, 4, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(123, 20, 5, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(124, 20, 7, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(125, 20, 8, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(126, 20, 11, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(127, 20, 12, '2023-06-26 19:59:36', '2023-06-26 19:59:36'),
(128, 20, 13, '2023-06-26 19:59:36', '2023-06-26 19:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider_service`
--

CREATE TABLE `service_provider_service` (
  `id` int(11) NOT NULL,
  `service_provider_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_provider_service`
--

INSERT INTO `service_provider_service` (`id`, `service_provider_id`, `service_id`, `created`, `last_modified`) VALUES
(1, 1, 1, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(2, 1, 2, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(3, 1, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(4, 1, 4, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(5, 1, 7, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(6, 2, 1, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(7, 2, 2, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(8, 2, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(9, 2, 4, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(10, 2, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(11, 2, 6, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(12, 2, 7, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(13, 2, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(14, 2, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(15, 2, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(16, 3, 2, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(17, 3, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(18, 3, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(19, 3, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(20, 3, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(21, 4, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(22, 4, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(23, 5, 4, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(24, 5, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(25, 5, 6, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(26, 5, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(27, 5, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(28, 5, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(29, 6, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(30, 6, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(31, 6, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(32, 6, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(33, 7, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(34, 7, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(35, 7, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(36, 7, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(37, 8, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(38, 8, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(39, 8, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(40, 9, 1, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(41, 9, 2, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(42, 9, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(43, 9, 7, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(44, 9, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(45, 10, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(46, 11, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(47, 11, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(48, 12, 2, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(49, 12, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(50, 12, 4, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(51, 12, 7, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(52, 13, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(53, 13, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(54, 13, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(55, 13, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(56, 14, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(57, 14, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(58, 15, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(59, 15, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(60, 15, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(61, 15, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(62, 16, 3, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(63, 17, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(64, 17, 8, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(65, 17, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(66, 17, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(67, 18, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(68, 18, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(69, 18, 10, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(70, 19, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(71, 19, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(72, 20, 5, '2023-06-26 20:00:51', '2023-06-26 20:00:51'),
(73, 20, 9, '2023-06-26 20:00:51', '2023-06-26 20:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `last_modified` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `created`, `last_modified`) VALUES
(28, 'Marko', 'Buljan', 'mbuljan', 'marko123', 1, '2023-06-26 17:30:21', '2023-06-26 17:30:21'),
(29, 'Marija', 'Milošević', 'mmilosevic', 'marija123', 1, '2023-06-26 17:30:21', '2023-06-26 17:30:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `service_provider_category`
--
ALTER TABLE `service_provider_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_id` (`service_provider_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `service_provider_service`
--
ALTER TABLE `service_provider_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_provider_id` (`service_provider_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_provider_category`
--
ALTER TABLE `service_provider_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `service_provider_service`
--
ALTER TABLE `service_provider_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `service_provider_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`id`);

--
-- Constraints for table `service_provider_category`
--
ALTER TABLE `service_provider_category`
  ADD CONSTRAINT `service_provider_category_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider` (`id`),
  ADD CONSTRAINT `service_provider_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `service_provider_service`
--
ALTER TABLE `service_provider_service`
  ADD CONSTRAINT `service_provider_service_ibfk_1` FOREIGN KEY (`service_provider_id`) REFERENCES `service_provider` (`id`),
  ADD CONSTRAINT `service_provider_service_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
