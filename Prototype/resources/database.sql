-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 27. Apr, 2017 19:32 PM
-- Server-versjon: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `TindeUtvikling`
--
-- CREATE DATABASE IF NOT EXISTS `TindeUtvikling` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `TindeUtvikling`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Ansatte`
--

CREATE TABLE `Ansatte` (
  `ansatt_id` bigint(20) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `tlf` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Ansatte`
--

INSERT INTO `Ansatte` (`ansatt_id`, `f_name`, `l_name`, `tlf`, `email`, `role`) VALUES
(17, 'Bjørn', 'Hermansen', '47360030', 'bjorn@tindeutvikling.no', 'selger'),
(18, 'Bjørn', 'Hermansen', '47360030', 'bjorn@tindeutvikling.no', 'selger'),
(19, 'Bjørn', 'Hermansen', '47360030', 'bjorn@tindeutvikling.no', 'selger');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Fasiliteter`
--

CREATE TABLE `Fasiliteter` (
  `navn` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Fasiliteter`
--

INSERT INTO `Fasiliteter` (`navn`, `type`) VALUES
('Avløp', 'Teknisk'),
('Langrenn', 'Aktiviteter'),
('Strøm', 'Teknisk'),
('Vei', 'Teknisk');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Område`
--

CREATE TABLE `Område` (
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Område`
--

INSERT INTO `Område` (`name`) VALUES
('Gudbrandsdalen'),
('Hedemark'),
('Valdres');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Område_selger`
--

CREATE TABLE `Område_selger` (
  `ansatt_id` bigint(20) NOT NULL,
  `feltnr` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Tomtefasiliteter`
--

CREATE TABLE `Tomtefasiliteter` (
  `feltnr` bigint(20) NOT NULL,
  `fasilitet_navn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Tomtefasiliteter`
--

INSERT INTO `Tomtefasiliteter` (`feltnr`, `fasilitet_navn`) VALUES
(1, 'Strøm'),
(1, 'Vei'),
(1, 'Langrenn'),
(2, 'Avløp'),
(2, 'Vei'),
(2, 'Langrenn'),
(3, 'Avløp'),
(3, 'Vei'),
(3, 'Langrenn'),
(3, 'Strøm'),
(4, 'Vei');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Tomteområde`
--

CREATE TABLE `Tomteområde` (
  `felt_nr` bigint(20) NOT NULL,
  `navn` varchar(50) NOT NULL,
  `lat` decimal(9,6) NOT NULL,
  `lng` decimal(9,6) NOT NULL,
  `ingress` text NOT NULL,
  `oneliner` text NOT NULL,
  `tekst` longtext NOT NULL,
  `reg_plan` varchar(500) NOT NULL,
  `reg_map` varchar(500) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `thumbnail` varchar(512) NOT NULL,
  `area_images` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Tomteområde`
--

INSERT INTO `Tomteområde` (`felt_nr`, `navn`, `lat`, `lng`, `ingress`, `oneliner`, `tekst`, `reg_plan`, `reg_map`, `area_name`, `thumbnail`, `area_images`) VALUES
(1, 'Skreikampen', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Flotte hyttetomter som ligger høyt og usjenert med fantastisk utsikt over Gålåvatnet. Rondane-massivene og Jotunheimen ruver i horisonten.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regmap1.pdf', '', 'Valdres', "img/tomteområder/skreikampen/4023-c4fd5d532cb57e7f1a84987c0b34352e-2b9a2424d58d18de7bb26e547aa2bbb8nordseter5.jpg", "img/tomteområder/skreikampen"),
(2, 'Gålåtoppen', '61.519523', '9.778843', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Gudbrandsdalen Nord', "img/4046-f8184968280632c1e0dcddfb36da6de0-7977f928de23ce5601691f2c748a301324.jpg", "img/tomteområder/gålåtoppen"),
(3, 'Femundsmarka', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'En hytte i dette området gir et godt utgangspunkt til fritidsopplevelser både sommer og vinter!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Hedmark', "img/4039-c544bd176878d642a7883180c6c69d9e-2c4541be28649e23415f7f67b5bc7e5fnordseter1.jpg", "img/tomteområder/femundsmarka"),
(4, 'Liabygda', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Sør-Trøndelag', "img/4023-c4fd5d532cb57e7f1a84987c0b34352e-2b9a2424d58d18de7bb26e547aa2bbb8nordseter5.jpg", "img/tomteområder/liabygda"),
(5, 'Hjerkinnlia', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Hedmark', "img/4037-9d674db4a1df6b0df94c81469c23696d-a3c0a85afc1f59979df1b5511e1b134b13.jpg", "img/tomteområder/hjerkinnlia"),
(6, 'Låvåshaugen', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Sør-Trøndelag', "img/3610-6317b676de359186a6b008f3d8c8efd0-0b71b6b7b89d687c5e07f83650669fb320_utsikt_1.jpg", "img/tomteområder/låvåshaugen"),
(7, 'Raudalen', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Valdres', "img/4061-1f46df75421721feb93d21fa32064576-69a53dd84dd0c56f2ca1012320ad7cddlvshaugen4.jpg", "img/tomteområder/raudalen"),
(8, 'Haugsetra', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Gudbrandsdalen Nord', "img/4103-3bd758f731ecdbb498f15e90712fd93a-b4dc47ac9839afe4cba7d8ce3b5d1ccd02.jpg", "img/tomteområder/haugsetra"),
(9, 'Ringebu', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Gudbrandsdalen Sør', "img/4105-427fe031bcddffb5a05362402216573d-12bfe86bc22a2bcf57e972444fbdd0fa05utsikt.jpg", "img/tomteområder/ringebu"),
(10, 'Hjerkinnhø', '60.567125', '11.149905', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi, minima deleniti totam cumque reiciendis est possimus. Ut, asperiores! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate totam possimus fugit eius dolores mollitia ducimus perferendis dolorum voluptatem, delectus soluta similique sequi minus dolor suscipit exercitationem esse nisi optio! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis accusantium repellat autem nostrum voluptas nam eaque! Architecto, iure velit, eligendi facilis harum ducimus tempora esse numquam, aliquam error voluptas laudantium.', 'docs/regmap/omr/regplan1.pdf', 'docs/regmap/omr/regmap1.pdf', 'Gudbrandsdalen Sør', "img/4142-e4b895d6b72df2258affe33a1c1a7155-8be89426803c20a68642b95875a86a5ehjerkinnhhyttegrend.jpg", "img/tomteområder/hjerkinnhø");
-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Tomter`
--

CREATE TABLE `Tomter` (
  `feltnr` bigint(20) NOT NULL,
  `tomtenr` bigint(20) NOT NULL,
  `gnr_bnr` varchar(50) NOT NULL,
  `areal` int(11) NOT NULL,
  `pris` int(11) NOT NULL,
  `tekst` longtext NOT NULL,
  `status_solgt` tinyint(1) NOT NULL,
  `reg_plan` varchar(500) NOT NULL,
  `reg_kart` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Tomter`
--

INSERT INTO `Tomter` (`feltnr`, `tomtenr`, `gnr_bnr`, `areal`, `pris`, `tekst`, `status_solgt`, `reg_plan`, `reg_kart`) VALUES
(1, 1, 'Gårdsnr 101, Bruksnummer 3', 300, 800000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis necessitatibus ipsam cum dignissimos unde quisquam porro dolores corporis reprehenderit tempora modi.', 1, 'docs/regplan/omr/tomt/regplan1.pdf', 'docs/regplan/omr/tomt/regkart1.pdf'),
(1, 2, 'Gårdsnr 101, Bruksnummer 4', 600, 800000, 'Lorefvasvas asdv as asdv as vas vas va sdv asv avsdsva dsvasd v', 0, 'sdsd/sdcsd/sbasdf.pdf', 'sdsd/sdcsd/sbasdf.pdf'),
(1, 3, 'Gårdsnr 101, Bruksnummer 5', 200, 200000, 'Lorefvasvas asdv as asdv as vas vas va sdv asv avsdsva dsvasd v', 0, 'sdsd/sdcsd/sbasdf.pdf', 'sdsd/sdcsd/sbasdf.pdf'),
(1, 4, 'Gårdsnr 101, Bruksnummer 6', 500, 900000, 'Lorefvasvas asdv as asdv as vas vas va sdv asv avsdsva dsvasd v', 1, 'sdsd/sdcsd/sbasdf.pdf', 'sdsd/sdcsd/sbasdf.pdf'),
(2, 1, 'Gårdsnr 999, Bruksnummer 1', 100, 700000, 'Lorefvasvas asdv as asdv as vas vas va sdv asv avsdsva dsvasd v', 1, 'sdsd/sdcsd/sbasdf.pdf', 'sdsd/sdcsd/sbasdf.pdf'),
(2, 2, 'Gårdsnr 999, Bruksnummer 2', 300, 600000, 'Lorefvasvas asdv as asdv as vas vas va sdv asv avsdsva dsvasd v', 0, 'sdsd/sdcsd/sbasdf.pdf', 'sdsd/sdcsd/sbasdf.pdf');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Tomter_Geopts`
--

CREATE TABLE `Tomter_Geopts` (
  `id` int(11) NOT NULL,
  `feltnr` bigint(20) NOT NULL,
  `tomtenr` bigint(20) NOT NULL,
  `lat` decimal(9,6) NOT NULL,
  `lng` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `Tomter_Geopts`
--

INSERT INTO `Tomter_Geopts` (`id`, `feltnr`, `tomtenr`, `lat`, `lng`) VALUES
(1, 1, 1, '60.566917', '11.145628'),
(2, 1, 1, '60.566922', '11.146272'),
(3, 1, 1, '60.567167', '11.146267'),
(4, 1, 1, '60.567186', '11.145639'),
(5, 1, 2, '60.566284', '11.145762'),
(6, 1, 2, '60.566342', '11.147195'),
(7, 1, 2, '60.566727', '11.147141'),
(8, 1, 2, '60.566756', '11.146256'),
(9, 1, 3, '60.566766', '11.147636'),
(10, 1, 3, '60.566860', '11.149404'),
(11, 1, 3, '60.567289', '11.148952'),
(12, 1, 3, '60.567294', '11.147586'),
(13, 1, 4, '60.567057', '11.149906'),
(14, 1, 4, '60.566899', '11.150750'),
(15, 1, 4, '60.566386', '11.150710'),
(16, 1, 4, '60.566346', '11.149775'),
(17, 2, 1, '61.519365', '9.778360'),
(18, 2, 1, '61.519226', '9.778832'),
(19, 2, 1, '61.519134', '9.778027'),
(19, 2, 2, '61.519487', '9.777619'),
(19, 2, 2, '61.519395', '9.778049'),
(19, 2, 2, '61.519093', '9.777566'),
(19, 2, 2, '61.519267', '9.777233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ansatte`
--
ALTER TABLE `Ansatte`
  ADD PRIMARY KEY (`ansatt_id`);

--
-- Indexes for table `Fasiliteter`
--
ALTER TABLE `Fasiliteter`
  ADD PRIMARY KEY (`navn`);

--
-- Indexes for table `Område`
--
ALTER TABLE `Område`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `Område_selger`
--
ALTER TABLE `Område_selger`
  ADD PRIMARY KEY (`ansatt_id`,`feltnr`),
  ADD KEY `os_tomtefac_fk` (`feltnr`);

--
-- Indexes for table `Tomtefasiliteter`
--
ALTER TABLE `Tomtefasiliteter`
  ADD PRIMARY KEY (`feltnr`,`fasilitet_navn`),
  ADD KEY `tf_fasilitetnavn_fk` (`fasilitet_navn`);

--
-- Indexes for table `Tomteområde`
--
ALTER TABLE `Tomteområde`
  ADD PRIMARY KEY (`felt_nr`),
  ADD KEY `tomteomrade_areaname_fk` (`area_name`);

--
-- Indexes for table `Tomter`
--
ALTER TABLE `Tomter`
  ADD PRIMARY KEY (`feltnr`,`tomtenr`);

--
-- Indexes for table `Tomter_Geopts`
--
ALTER TABLE `Tomter_Geopts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feltnr` (`feltnr`,`tomtenr`,`lat`,`lng`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ansatte`
--
ALTER TABLE `Ansatte`
  MODIFY `ansatt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Tomteområde`
--
ALTER TABLE `Tomteområde`
  MODIFY `felt_nr` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Tomter_Geopts`
--
ALTER TABLE `Tomter_Geopts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `Område_selger`
--
ALTER TABLE `Område_selger`
  ADD CONSTRAINT `os_ansattid_fk` FOREIGN KEY (`ansatt_id`) REFERENCES `Ansatte` (`ansatt_id`),
  ADD CONSTRAINT `os_tomtefac_fk` FOREIGN KEY (`feltnr`) REFERENCES `Tomteområde` (`felt_nr`);

--
-- Begrensninger for tabell `Tomtefasiliteter`
--
ALTER TABLE `Tomtefasiliteter`
  ADD CONSTRAINT `tf_fasilitetnavn_fk` FOREIGN KEY (`fasilitet_navn`) REFERENCES `Fasiliteter` (`navn`),
  ADD CONSTRAINT `tf_feltnr_fk` FOREIGN KEY (`feltnr`) REFERENCES `Tomteområde` (`felt_nr`);

--
-- Begrensninger for tabell `Tomteområde`
--
ALTER TABLE `Tomteområde`
  ADD CONSTRAINT `tomteomrade_areaname_fk` FOREIGN KEY (`area_name`) REFERENCES `Område` (`name`);

--
-- Begrensninger for tabell `Tomter`
--
ALTER TABLE `Tomter`
  ADD CONSTRAINT `tomter_feltnr_fk` FOREIGN KEY (`feltnr`) REFERENCES `Tomteområde` (`felt_nr`);

--
-- Begrensninger for tabell `Tomter_Geopts`
--
ALTER TABLE `Tomter_Geopts`
  ADD CONSTRAINT `geopts_feltnr_tomtenr_fk` FOREIGN KEY (`feltnr`,`tomtenr`) REFERENCES `Tomter` (`feltnr`, `tomtenr`);
--
-- Database: `imt3851_db`
--
CREATE DATABASE IF NOT EXISTS `imt3851_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `imt3851_db`;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `datetime` int(11) DEFAULT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `text` text,
  `category` varchar(10) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `publisher` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `articles`
--

INSERT INTO `articles` (`id`, `datetime`, `heading`, `text`, `category`, `rating`, `publisher`) VALUES
(1, 1492009049, 'Hello world!', 'This is the very first article, isnt that awesome?', 'News', 0, 'Admin'),
(2, 1492009200, 'Fake News', 'This is a really fake news article, inspired by the 45th president of the United States.', 'News', 0, 'testuser');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Sport'),
(2, 'News'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` char(250) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `usertype` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `surname`, `email`, `usertype`) VALUES
(1, 'admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Admin', 'Bruker', 'admin@nettavis.no', 1),
(2, 'thomhess', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Thomas', 'Hesselberg', 'thomhes@stud.ntnu.no', 1),
(3, 'kolloen', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Øivind', 'Kolloen', 'oeivind.kolloen@ntnu.no', 2),
(4, 'testuser', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Test', 'Bruker', 'testbruker@test.no', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;