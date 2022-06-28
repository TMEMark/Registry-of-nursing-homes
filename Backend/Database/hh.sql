CREATE TABLE `administratori` (
  `idAdmin` int(11) NOT NULL,
  `ime_admina` varchar(255) DEFAULT NULL,
  `prezime_admina` varchar(255) DEFAULT NULL,
  `korisnicko_ime` varchar(255) DEFAULT NULL,
  `lozinka` varchar(255) DEFAULT NULL,
  `uloga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `administratori`
  ADD PRIMARY KEY (`idAdmin`);

INSERT INTO `administratori` (`idAdmin`, `ime_admina`, `prezime_admina`, `korisnicko_ime`, `lozinka`, `uloga`) VALUES
(1, 'Marko', 'Buljan', 'mbuljan', '12345', 1),
(2, 'Marija', 'Milošević', 'mmilosevic', '12345', NULL);


CREATE TABLE `kategorije` (
  `idKategorija` int(11) NOT NULL,
  `naziv_kategorije` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`idKategorija`);

INSERT INTO `kategorije` (`idKategorija`, `naziv_kategorije`) VALUES
(1, 'Skrb o pokretnim osobama'),
(2, 'Skrb o nepokretnim osobama'),
(3, 'Skrb o psihički bolesnim osobama'),
(4, 'Skrb o osobama s demencijom/Alzheimerom'),
(5, 'Palijativna skrb');


CREATE TABLE `lokacija` (
  `idLokacije` int(11) NOT NULL,
  `naziv_lokacije` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`idLokacije`) USING BTREE;

INSERT INTO `lokacija` (`idLokacije`, `naziv_lokacije`) VALUES
(1, 'Osječko baranjska'),
(2, 'Vukovarsko srijemska');


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

ALTER TABLE `pruzatelji`
  ADD PRIMARY KEY (`idPruz`),
  ADD KEY `lokacija` (`lokacija`);

ALTER TABLE `pruzatelji`
    ADD CONSTRAINT `pruzatelji_ibfk_1` FOREIGN KEY (`lokacija`) REFERENCES `lokacija` (`idLokacije`);

INSERT INTO `pruzatelji` (`idPruz`, `naziv_pruzatelja`, `email`, `adresa`, `kontakt`, `URL_stranice`, `radno_vrijeme`, `napomena`, 
`longitude`, `latitude`, `lokacija`, `oib`) 
VALUES
(1, 
'STARČEVIĆ - obiteljski dom za starije', 
'obiteljskidomstarcevic@gmail.com', 
'Josipa Kosora 9, 31207 Tenja', 
'095/37 77 367', 
'http://www.obiteljskidomstarcevic.hr/', 
'', 
'slogan “Obitelj-Dom-Zajednica”', 
'45.51906071427537', 
'18.724171169784814', 
1, 
52828965289),

(2, 
'ĐURIĆ - obiteljski dom za starije', 
'email#2@gmail.com', 
'Vinkovačka 42, 32010 Vukovar', 
'098/9376-930', 
'', 
'', 
'', 
'45.369911483737084', 
'18.94873200046968', 
2, 
10025720735),

(3, 
'PRIMUM - dom za starije', 
'email#2@gmail.com', 
'Hrvatske nezavisnosti 166, 32000 Vukovar ', 
'032/412-966', 
'http://www.centar-primum.hr/', 
'', 
'', 
'45.33231959098914', 
'19.016094740945267', 
2, 
58411215125);


CREATE TABLE `usluge` (
  `idUsluge` int(11) NOT NULL,
  `naziv_usluge` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usluge`
  ADD PRIMARY KEY (`idUsluge`);

INSERT INTO `usluge` (`idUsluge`, `naziv_usluge`) VALUES
(1, 'Trajni smještaj'),
(2, 'Privremeni i povremeni'),
(3, 'Dnevni boravak u domu'),
(4, 'Probno stanovanje');


CREATE TABLE `pruzatelji_usluge` (
  `idPruzUsl` int(11) NOT NULL,
  `pruzatelj` int(11) DEFAULT NULL,
  `usluga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `pruzatelji_usluge`
  ADD PRIMARY KEY (`idPruzUsl`);

INSERT INTO `pruzatelji_usluge` (`idPruzUsl`, `pruzatelj`, `usluga`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3),
(8, 3, 4);


CREATE TABLE `pruzatelji_usluge_kategorije` (
  `idPruzUslKat` int(11) NOT NULL,
  `pruzatelj_usluga` int(11) DEFAULT NULL,
  `kategorija` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `pruzatelji_usluge_kategorije`
  ADD PRIMARY KEY (`idPruzUslKat`);

INSERT INTO `pruzatelji_usluge_kategorije` (`idPruzUslKat`, `pruzatelj_usluga`, `kategorija`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4);
(4, 2, 1);
(5, 2, 2);
(6, 5, 1);
(6, 6, 2);


CREATE TABLE `uloge` (
  `idUloga` int(11) NOT NULL,
  `nazivUloge` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloga`);

INSERT INTO `uloge` (`idUloga`, `nazivUloge`) VALUES
(1, 'Administrator'),
(2, 'Moderator');