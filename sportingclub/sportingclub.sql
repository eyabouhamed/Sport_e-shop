-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2020 at 09:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportingclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE DATABASE IF NOT EXISTS `sportingclub`;
USE `sportingclub`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `passwd`) VALUES
(1, 'admin', 'admin@admin.ad', 'admin123'),
(2, 'eyabouhamed', 'eya.bouhamed@enis.tn', '123'),
(3, 'wiembelhadj', 'wiem.belhadj@enis.tn', '123'),
(4, 'rahmajallouli', 'rahma.jallouli@enis.tn', '123'),
(5, 'nourjridi', 'nour.jridi@enis.tn', '123');


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `label` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banner` int(2) DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `label` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `reference`, `label`, `description`, `banner`, `photo`) VALUES
(2, 'men', 'HOMME', 'Men\'s products', 1, 'https://nsa40.casimages.com/img/2019/12/26/191226110414196265.jpg'),
(3, 'women', 'FEMME', 'Women\'s products', 1, 'https://nsa40.casimages.com/img/2019/12/26/191226110417245650.jpg'),
(4, 'kid', 'ENFANT', 'Kids products', 0, ''),
(5, 'collections', 'COLLECTIONS', 'Collections', 1, 'https://a.imge.to/2019/12/25/v0roJk.md.jpg'),
(6, 'nutrition', 'NUTRITION', 'Nutrition', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cin` int(8) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `passwd` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` int(11) NOT NULL,
  `company` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address2` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `zipcode` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `firstname`, `lastname`, `cin`, `email`, `passwd`, `phone`, `company`, `country`, `address1`, `address2`, `city`, `zipcode`, `title`) VALUES
(1, 'bouhamed', 'eya', 0, 'eya.bouhamed@enis.tn', '060772', 24866940, 'enis', 'tunisia', 'route afrane km 8', 'markez wali', 'sfax', 3093, 'M.'),
(2, 'belhadj', 'wiem', 0, 'wiem.belhadj@stud.enis.tn', '0000000', 52616603, 'enis', 'Tunis', 'route manzel chaker km 6', 'route manzel chaker km 6', 'Sfax', 3013, 'M.'),
(3, 'rahma', 'jallouli', 11100778, 'rahma.jallouli@gmail.com', '123', 52950295, 'ENIS', 'Tunisie', 'Rte. Gremda km6', 'Taher Kammoun', 'Sfax', 3022, 'M.');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(255) CHARACTER SET latin1 NOT NULL,
  `label` varchar(255) CHARACTER SET latin1 NOT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `reference`, `label`, `country`, `address1`, `address2`, `city`, `zipcode`, `phone`, `email`) VALUES
(3, 'nike', 'Nike', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'adidas', 'Adidas', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'kappa', 'Kappa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'uhlsport', 'Uhlsport', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'umbro', 'Umbro', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'macron', 'Macron', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'select', 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'wilson', 'Wilson', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'isostar', 'Isostar', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `delivery_type` varchar(255) NOT NULL DEFAULT 'Retrait magasin',
  `delivery_fees` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'En cours de préparation' COMMENT 'En cours de préparation; Confirmé; Livré; Annulé',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

DROP TABLE IF EXISTS `order_line`;
CREATE TABLE IF NOT EXISTS `order_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `line_total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

DROP TABLE IF EXISTS `paths`;
CREATE TABLE IF NOT EXISTS `paths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `name`, `url`) VALUES
(1, 'produits', '../../../../IMAGES/');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(50) CHARACTER SET latin1 NOT NULL,
  `label` mediumtext NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `addeddate` date DEFAULT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `promo` int(2) DEFAULT '0' COMMENT '(%)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ref` (`reference`),
  KEY `productcategory` (`category`),
  KEY `productmanufacturer` (`manufacturer`),
  KEY `productsubcategory` (`subcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `reference`, `label`, `category`, `subcategory`, `manufacturer`, `price`, `quantity`, `addeddate`, `description`, `photo`, `promo`) VALUES
(1, 'CK6357-003', 'Nike Renew Run', 'HOMME', 'Chaussures', 'nike', 270, 5, '2019-12-24', 'La Nike Renew Run vous permet d\'aller plus loin avec une mousse plus souple pour un amorti confortable. Conçue pour les runners réguliers, cette chaussure associe maintien ferme et adhérence durable pour un confort optimal où que vous alliez.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/9bef2b01-7b28-413c-a196-918e08b7dcca/chaussure-de-running-renew-run-pour-SPjMg8.jpg', 0),
(38, 'CW7635-991', 'Nike Internationalist', 'HOMME', 'Chaussures', 'nike', 330, 5, '2019-12-24', 'La Nike Internationalist rend hommage à une icône des années 80 conçue à l\'origine pour les coureurs sans limite. ', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/cussbutfv2umusef54oo/custom-nike-internationalist-low-by-you.jpg', 0),
(39, '749794-410', 'Nike MD Runner 2', 'HOMME', 'Chaussures', 'nike', 190, 5, '2019-12-24', 'La chaussure Nike MD Runner 2 pour Homme est un modèle de running intemporel pour le quotidien composée de matériaux légers.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/qmpi3gj6gcrawtwx3wmk/chaussure-md-runner-2-pour-NwTze8VA.jpg', 0),
(40, 'BQ5518-414', 'Nike Mercurial Vapor 13 Academy AG', 'COLLECTIONS', 'Football', 'nike', 240, 5, '2019-11-24', 'S’appuyant sur le modèle 12, la chaussure à crampons Nike Mercurial Vapor 13 Academy intègre une plaque polyvalente qui offre une excellente adhérence sur surfaces synthétiques.', 'https://nsa40.casimages.com/img/2019/12/26/191226110356766102.jpg', 20),
(41, 'BV4874-010', 'Veste de running Nike AeroLayer', 'HOMME', 'Vêtements', 'nike', 300, 3, '2020-01-13', 'La conception de la veste Nike AeroLayer retient l\'air chaud en toute légèreté. À la fois résistante à l\'eau et respirante, elle vous permet de réussir votre entraînement, peu importe la météo.', 'https://nsa40.casimages.com/img/2019/12/26/19122611035765893.jpg', 0),
(44, 'BV2671-410', 'Pantalon de jogging Nike Sportswear', 'HOMME', 'Vêtements', 'nike', 120, 0, '2019-11-24', 'Confectionné dans un tissu Fleece doux et confortable, le pantalon de jogging en Fleece Nike Sportswear Club est un incontournable qui vous confère un style classique tout en vous offrant un look élégant réellement taillé pour le quotidien.', 'https://nsa40.casimages.com/img/2019/12/26/191226110359897097.jpg', 0),
(46, 'CJ4280-491', 'Pantalon de jogging Nike Sportswear', 'HOMME', 'Vêtements', 'nike', 180, 5, '2019-11-24', 'Confectionné dans un tissu doux et extensible, le pantalon de jogging Nike Sportswear allie confort et protection tout au long de la journée. Les chevilles côtelées et les détails inspirés de la technologie rehaussent le style de cette tenue quotidienne.', 'https://nsa40.casimages.com/img/2019/12/26/191226110402566340.jpg', 20),
(47, 'BV6298-010', 'Sweat de training Nike', 'HOMME', 'Vêtements', 'nike', 300, 4, '2019-11-24', 'Le sweat à capuche Nike Therma associe une isolation légère à un tissu chaud pour vous offrir un maximum de confort par temps froid.', 'https://nsa40.casimages.com/img/2019/12/26/191226110401407313.jpg', 25),
(48, 'AJ9996-657', 'Nike Dri-FIT Academy', 'COLLECTIONS', 'Football', 'nike', 60, 8, '2020-01-13', 'Apportez une touche de style à votre entraînement, avec le haut Nike Dri-FIT Academy. Son tissu est subtilement texturé et intègre une technologie anti-transpiration pour vous offrir un maximum de fraîcheur et de confort.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/ir8y9lamzmydmqpziz9j/haut-de-football-a-manches-courtes-dri-fit-academy-pour-thskqN.jpg', 0),
(49, 'AT4327-451', 'Polo de football Chelsea FC', 'HOMME', 'Vêtements', 'nike', 150, 4, '2019-11-24', 'Le Polo de football Chelsea FC vous permet d\'afficher votre fierté de supporter avec un écusson officiel de l\'équipe sur le côté gauche de la poitrine.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/t6mxfvnh6nwmzymgwypb/polo-de-football-chelsea-fc-pour-scm7Pk.jpg', 0),
(50, 'CI1335-025', 'Polo de football Inter Milan', 'HOMME', 'Vêtements', 'nike', 150, 4, '2019-11-24', 'Le polo Inter Milan présente un écusson officiel de l’équipe sur le côté gauche de la poitrine pour afficher votre fierté de supporter.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/i3aueydcpa6bo3quftly/polo-de-football-inter-milan-pour-GnqhSw.jpg', 0),
(51, 'BA5217-451', 'Sac à dos Nike Sportswear', 'HOMME', 'Accessoires et équipement', 'nike', 120, 3, '2019-11-13', 'Le sac à dos Nike Sportswear Hayward Futura 2.0 possède un grand compartiment principal et un dos rembourré en mesh pour un port confortable où que vous alliez.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/zj6wj0ruocfdclmyk7qe/sac-a-dos-sportswear-hayward-futura-2-Ny4WOE.jpg', 0),
(52, 'BA5217-452', 'Sac à dos Nike Sportswear', 'HOMME', 'Accessoires et équipement', 'nike', 135, 6, '2019-11-13', 'Le sac à dos Nike Sportswear Hayward Futura 2.0 possède un grand compartiment principal et un dos rembourré en mesh pour un port confortable où que vous alliez.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/ncymeoeym4icwuxujs7l/sac-a-dos-sportswear-xNWGMz.jpg', 0),
(53, 'AA6228-419', 'Casquette New York Knicks City', 'HOMME', 'Accessoires et équipement', 'nike', 120, 6, '2019-11-13', 'La casquette NBA New York Knicks City Edition Nike AeroBill Classic99 est fabriquée dans un tissu souple doté de la technologie anti-transpiration Dri-FIT vous permettant de rester au sec et à l\'aise tout au long de la journée.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/lyy256oqjuegcn9mtvgn/casquette-nba-new-york-knicks-city-edition-aerobill-classic99-7DStdl.jpg', 30),
(54, 'AA6228-512', 'Casquette FC Barcelona', 'HOMME', 'Accessoires et équipement', 'nike', 90, 4, '2019-11-13', 'La casquette FC Barcelona Heritage86 vous offre un maximum de confort et de protection tout en vous permettant d\'afficher votre fierté de supporter dans les gradins comme au quotidien.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/zabpbhyhhuserovhdpmi/casquette-reglable-fc-barcelona-heritage86-pRnsxX.jpg', 20),
(55, 'CK6357-015', 'Nike Quest 2', 'FEMME', 'Chaussures', 'nike', 270, 5, '2019-12-24', 'La Nike Quest 2 combine un look technique et une empeigne en mesh ajouré ultra-respirante. Les lacets bicolores passent par les câbles Flywire pour un maintien élégant.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/eae5e6d5-e177-4ce9-8aee-67437227aadb/chaussure-de-running-quest-2-pour-38vwpl.jpg', 0),
(56, 'PG7635-991', 'Nike Air Zoom Pegasus', 'FEMME', 'Chaussures', 'nike', 330, 5, '2019-11-24', 'Sortez de chez vous quelle que soit la météo, avec la Nike Air Zoom Pegasus 36 Shield By You. Conservez la mousse de la Pegasus originale ou optez pour l\'option Turbo, en fonction de votre style de running.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/vcalqiufnvechelu5cl3/custom-nike-air-zoom-pegasus-36-shield-by-you.jpg', 20),
(57, 'PG7635-850', 'Nike Air Zoom Pegasus', 'FEMME', 'Chaussures', 'nike', 330, 5, '2019-11-24', 'Sortez de chez vous quelle que soit la météo, avec la Nike Air Zoom Pegasus 36 Shield By You. Conservez la mousse de la Pegasus originale ou optez pour l\'option Turbo, en fonction de votre style de running.', 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/iwmh6rcedqsmrfb1aeqz/custom-nike-air-zoom-pegasus-36-premium-shoe-by-you.jpg', 20),
(58, 'BW4874-010', 'Sweat a capuche Nike Sportswear', 'FEMME', 'Vêtements', 'nike', 200, 3, '2019-11-24', 'Le sweat à capuche entièrement zippé Nike Sportswear Tech Fleece Windrunner pour Femme est confectionné avec un tissu Fleece léger pour une protection chaude sans devoir superposer les couches.', 'https://nsa40.casimages.com/img/2019/12/26/19122611040840931.jpg', 0),
(59, 'BV4122-010', 'Sweat à capuche Nike Sportswear', 'FEMME', 'Vêtements', 'nike', 180, 3, '2019-11-24', 'Optez pour un look classique avec le sweat à capuche Nike Sportswear Essential. Fabriqué en Fleece semi-brossé doux avec un zip à l\'avant, ce modèle décontracté convient en toutes circonstances.', 'https://nsa40.casimages.com/img/2019/12/26/191226110406166673.jpg', 0),
(60, 'BV3455-606', 'Sweat à capuche Nike Sportswear', 'FEMME', 'Vêtements', 'nike', 220, 5, '2020-01-13', 'Le sweat à capuche à zip Nike Sportswear Windrunner Tech Fleece pour Femme revisite une silhouette emblématique avec la chaleur et la légèreté du tissu Nike Tech Fleece. Il reprend le célèbre motif à chevron inspiré de la veste Windrunner originale.', 'https://nsa40.casimages.com/img/2019/12/26/19122611040977718.jpg', 0),
(61, 'NH5217-451', 'Sac à dos Nike Heritage', 'FEMME', 'Accessoires et équipement', 'nike', 90, 4, '2019-11-13', 'Le sac à dos Nike Heritage combine simplicité et fonctionnalité. L\'inscription « Just Do It » et l’imprimé à pois sur toute la surface donnent un style unique à ce modèle polyvalent.', 'https://nsa40.casimages.com/img/2019/12/26/19122611041749001.jpg', 0),
(62, 'N0000034-991', 'Gourde Nike 710 ml', 'FEMME', 'Accessoires et équipement', 'nike', 50, 4, '2019-11-13', 'La gourde Nike TR HyperCharge Straw 710 ml est fabriquée en matière plastique durable et résistante aux chocs. Un goulot coulissant innovant permet d\'ouvrir la gourde d\'une seule main pour s\'hydrater tout en bougeant.', 'https://nsa40.casimages.com/img/2019/12/26/191226110411234166.jpg', 10),
(63, 'AJ5528-101', 'Maillot de football Chelsea FC', 'COLLECTIONS', 'Football', 'nike', 220, 4, '2019-11-13', 'Le tissu Nike Breathe pour rester au sec et bénéficier d\'un maximum de fraîcheur.\r\nTechnologie Dri-FIT pour rester au sec et bénéficier d\'un maximum de confort.', 'https://render.nikeid.com/ir/render/nikeidrender/CFC_MENS_AS_1907_v1?obj=/s/g1/shirt&show&obj=/s&req=object&fmt=png-alpha&icc=AdobeRGB&wid=1024', 0),
(65, 'AJ5528-601', 'Maillot de football Tottenham Hotspur', 'COLLECTIONS', 'Football', 'nike', 220, 4, '2019-11-13', 'Le tissu Nike Breathe pour rester au sec et bénéficier d\'un maximum de fraîcheur.\r\nTechnologie Dri-FIT pour rester au sec et bénéficier d\'un maximum de confort.', 'https://render.nikeid.com/ir/render/nikeidrender/THFC_MENS_AS_1907_v3?obj=/s/g1/shirt&show&obj=/s&req=object&fmt=png-alpha&icc=AdobeRGB&wid=1024', 0),
(66, 'AJ5528-501', 'Maillot de football FC Barcelone', 'COLLECTIONS', 'Football', 'nike', 220, 4, '2019-11-13', 'Le tissu Nike Breathe pour rester au sec et bénéficier d\'un maximum de fraîcheur.\r\nTechnologie Dri-FIT pour rester au sec et bénéficier d\'un maximum de confort.', 'https://render.nikeid.com/ir/render/nikeidrender/FCB_MENS_HS_1905_v3?obj=/s/g1/shirt&show&obj=/s&req=object&fmt=png-alpha&icc=AdobeRGB&wid=1024', 0),
(67, 'SP2162-100', 'Protege tibias de football', 'COLLECTIONS', 'Football', 'nike', 30, 4, '2019-11-13', 'Le protège-tibias de football Nike J CE incorpore une coque légère et résistante pour vous protéger au mieux des chocs sur le terrain.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/cpu6lghf3hcg9vnyjugf/protege-tibias-de-football-j-ce-W3CwKs.jpg', 0),
(68, 'SC3310-100', 'Ballon de football Nike Strike', 'COLLECTIONS', 'Football', 'nike', 75, 4, '2019-11-13', 'Le ballon de football Nike Strike intègre une vessie en caoutchouc renforcé et arbore des motifs très contrastés pour un toucher uniforme et un meilleur suivi visuel.', 'https://c.static-nike.com/a/images/t_PDP_1728_v1/f_auto,b_rgb:f5f5f5/ih8hkdmrvrjcs3aaqnqn/ballon-de-football-strike-jpkGbw.jpg', 0),
(69, 'GS0331-100', 'Gants de football', 'COLLECTIONS', 'Football', 'nike', 90, 4, '2019-11-13', 'Les gants de football Nike Junior Match Goalkeeper pour Enfant plus âgé permettent d\'absorber les chocs pour une protection optimale pendant les matchs.', 'https://images.nike.com/is/image/DotCom/PDP_HERO/GS0331_100_A/gants-de-football-junior-match-goalkeeper-pour-plus-age-xrl0m6.jpg', 0),
(70, 'SCT30-100', 'Ballon de handball Select', 'COLLECTIONS', 'Handball', 'select', 90, 4, '2019-11-13', '', 'https://www.sport-time.fr/12984-large_default/ballon-handball-select-ultimate-lfh.jpg', 0),
(71, 'SCT30-101', 'Ballon de handball Select', 'COLLECTIONS', 'Handball', 'select', 90, 4, '2019-11-13', '', 'https://www.casalsport.com/img/W/CAS/ST/H5/42/H542/H542_ST.jpg', 0),
(72, 'CHND-158', 'Cage de handball', 'COLLECTIONS', 'Handball', NULL, 1800, 1, '2019-11-13', '', 'https://nwscdn.com/media/catalog/product/r/e/red_and_white_striped_handball_goal.jpg', 10),
(73, 'RQTEN-158', 'Raquette de tennis Federer', 'COLLECTIONS', 'Tennis', 'wilson', 250, 1, '2019-11-13', '', 'https://www.anthem-sports.com/media/extendware/ewimageopt/media/inline/41/0/wilson-federer-tennis-racquet-b0d.jpg', 0),
(74, 'RQTEN-159', 'Raquette de tennis Pro', 'COLLECTIONS', 'Tennis', 'wilson', 300, 1, '2019-11-13', '', 'https://cdn.shopify.com/s/files/1/3099/4872/products/WIL9000009151000L2_fa3984bb-d9c7-4d7a-88dc-0d269b15baa7.jpg?v=1535526898', 10),
(75, 'BALTEN-155', 'Lot de 3 ballons tennis', 'COLLECTIONS', 'Tennis', 'wilson', 25, 5, '2019-11-13', '', 'https://images-na.ssl-images-amazon.com/images/I/71Hko5CNRVL._SL1500_.jpg', 0),
(76, 'GOG-708', 'Swimming goggles', 'COLLECTIONS', 'Natation', NULL, 35, 5, '2019-11-13', '', 'https://www.jaked.com/media/catalog/product/cache/0/main/2000x2000/5e06319eda06f020e43594a9c230972d/J/W/JWOCS99011_030_01_base/www.jaked.com--JWOCS99011-01.jpg', 0),
(78, 'BN-NAT189', 'Bonnet de natation', 'COLLECTIONS', 'Natation', NULL, 20, 5, '2019-11-13', '', 'https://medias.go-sport.com/media/resized/1300x/catalog/product/54/da/8e/67/bonnet-de-bain-polyester-rouge-bonnet-jr_1_v7.jpeg', 0),
(79, 'PR-3XL-2KG', '3XL NUTRITION Pure Whey 2000 g', 'NUTRITION', 'Protéine', NULL, 180, 3, '2020-01-13', 'Pure Whey est un complément alimentaire à base de concentré de lactosérum (Premium Whey Protein concentrate WPC) avec une vaste gamme de saveurs exquises', 'https://scsnutrition.com/1112-tm_thickbox_default/3xl-nutrition-pure-whey.jpg', 0),
(80, 'PR-SCI-2KG', '100% Whey Protein Professional', 'NUTRITION', 'Protéine', NULL, 200, 3, '2019-11-13', 'Protéines 100% Whey Protein Professional SCITEC NUTRITION', 'https://media.fitnessboutique.fr/product_images/SCIWHYPRO1CN/SCIWHYPRO1CN_principale_f.jpg', 10),
(81, 'PR-TRU-4.7KG', 'TRUE MASS 1200 (4.7KG)', 'NUTRITION', 'Protéine', NULL, 190, 3, '2019-11-13', 'Protein Multi-fonctionnelle et Glucides Matrice', 'http://www.protein-shop-tunisia.tn/wp-content/uploads/2016/05/TRUE-MASS-1200-1.jpg', 0),
(82, 'PR-SER-5KG', 'Serious Mass (5KG)', 'NUTRITION', 'Protéine', NULL, 220, 3, '2019-11-13', 'Le Serious Mass de Optimum Nutrition est un gainer ultra complet et incontournable pour prendre du poids et de la masse !', 'http://nutrisport.ma/313-large_default/serious-mass-on-version-usa.jpg', 10),
(83, 'ENE-ISO-400', 'Isostar Hydrate & Perform - 400g', 'NUTRITION', 'Energie', 'isostar', 25, 3, '2019-11-13', 'La poudre Hydrate & Perform est un mélange de boisson isotonique pour l\'exercice qui répond aux besoins d\'hydratation', 'https://www.body-endurance.com/image/isostar_poeder_hydrate_and_perform_1.jpg?w=1200&h=1000&r=1', 0),
(84, 'OTH-BBCA-1011', 'BCAA 10.1.1 Vegan', 'NUTRITION', 'Autres', NULL, 55, 3, '2019-11-13', 'Les B.C.A.A. (branched-chain amino acids) ou acides aminés ramifiés regroupent 3 acides aminés essentiels', 'https://www.ericfavre.com/products_images/prod_163/d_bcaa-10-1-1-vegan-acides-amines-essentiels--eric-favre-sport-nutrition-expert-front-0.jpg', 0),
(85, 'REA-HOM20', 'Maillot Real Madrid', 'COLLECTIONS', 'Football', 'adidas', 220, 4, '2019-11-13', 'Cette élégante tenue domicile du Real Madrid célèbre le statut des nouveaux rois du football européen. Ce maillot de football junior est orné de détails dorés scintillants sur un fond blanc classique.', 'https://images.footballfanatics.com/FFImage/thumb.aspx?i=/productimages/_3580000/altimages/ff_3580421-47f22cdb6f57f57f55faalt2_full.jpg&w=900', 0),
(86, 'M20324', 'Adidas Stan Smith', 'HOMME', 'Chaussures', 'adidas', 260, 5, '2020-01-14', 'CHAUSSURE STAN SMITH\r\n<br />\r\nUNE VERSION AUTHENTIQUE D’UNE ICÔNE TENNIS DE 1971.\r\n<br />\r\nAffiche un style classique. Le tennisman Stan Smith a marqué son époque. Cette chaussure adidas porte bien son nom et te permet d\'imposer ton style dans la rue. Avec sa tige en cuir minimaliste et ses détails sobres, cette sneaker en cuir reste fidèle au modèle original de 1971.', 'https://assets.adidas.com/images/w_840,h_840,f_auto,q_auto:sensitive,fl_lossy/69721f2e7c934d909168a80e00818569_9366/Chaussure_Stan_Smith_Blanc_M20324_01_standard.jpg', 0),
(87, 'EG4959', 'Adidas Superstar', 'HOMME', 'Chaussures', 'adidas', 280, 5, '2020-01-14', 'CHAUSSURE SUPERSTAR.\r\n<br />\r\nLA CÉLÈBRE SNEAKER BASSE À « SHELL-TOE ».\r\n<br />\r\nCréée pour le basketball dans les 70\'s. Acclamée par les stars du hip-hop dans les 80\'s. La chaussure adidas Superstar est désormais une référence streetwear pour tous les sneakerheads. Son célébrissime « shell-toe » garantit style et protection. Tout comme sur les terrains de basketball à l\'époque.    Aujourd\'hui, que ce soit en festival ou dans la rue, ton pied est protégé.  Les 3 bandes dentelées et le logo carré adidas Superstar apportent une touche Originals.', 'https://assets.adidas.com/images/w_840,h_840,f_auto,q_auto:sensitive,fl_lossy/15f901c90a9549d29104aae700d27efb_9366/Chaussure_Superstar._Noir_EG4959_01_standard.jpg', 0),
(88, '304UG20_904_MAN', 'Maillot adulte Kombat Tunisia Third 19/20', 'COLLECTIONS', 'Football', 'kappa', 180, 4, '2019-11-13', 'Elément indispensable dans le placard d\'un fan de la Tunisie. Avec ce maillot Replica adulte, le supporter pourra porter fièrement les couleurs de la Tunisie sur et en dehors des terrains de football. Il est également conseillé de se rendre au stade avec ce produit sur les épaules !', 'https://www.kappastore.fr//media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/3/0/304ug20_904_kombat_third_tunisie_1.jpg', 20),
(89, '304UG20_904_MAN2', 'Maillot adulte Kombat Tunisia First 19/20', 'COLLECTIONS', 'Football', 'kappa', 180, 4, '2019-11-13', 'Elément indispensable dans le placard d\'un fan de la Tunisie. Avec ce maillot Replica adulte, le supporter pourra porter fièrement les couleurs de la Tunisie sur et en dehors des terrains de football. Il est également conseillé de se rendre au stade avec ce produit sur les épaules !', 'https://www.kappastore.fr//media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/3/0/304ug10_901_kombat_home_tunisie_1.jpg', 20),
(90, 'CJ4280', 'Pull Umbro double diamond ultra', 'HOMME', 'Vêtements', 'umbro', 60, 5, '2020-01-14', '', 'https://cdn.shopify.com/s/files/1/1884/0763/products/149827UUM1UAEG_USG_F.jpg?v=1550886086', 0),
(92, 'CJ42801', 'Pull Umbro retro optic graphic', 'HOMME', 'Vêtements', 'umbro', 80, 10, '2020-01-14', 'Pull Umbro Cotton ', 'https://cdn.shopify.com/s/files/1/1884/0763/products/158061UUM1UA3V_UOK_F.jpg?v=1550886703', 0),
(93, 'CJ42802', 'Capuche Umbro LT Hoody', 'HOMME', 'Vêtements', 'umbro', 150, 6, '2020-01-14', '', 'https://cdn.shopify.com/s/files/1/1884/0763/products/157198145495_UUM1UAQH_ULF___UMBRO_F.jpg?v=1554397412', 0),
(94, 'CJ428054', 'Pull Umbro Diamond Poly ', 'HOMME', 'Vêtements', 'umbro', 90, 6, '2020-01-14', '', 'https://cdn.shopify.com/s/files/1/1884/0763/products/142512UUM1UAPV_UQM_TEE_F_18_27.jpg?v=1550886139', 0),
(95, 'CJ4280564', 'Short Umbro Detonation', 'HOMME', 'Vêtements', 'umbro', 90, 5, '2020-01-14', '', 'https://cdn.shopify.com/s/files/1/1884/0763/products/149826UUM1UARN_UNY_SHORT_SET_19_40.jpg?v=1550886584', 0),
(96, 'BQ5518-612', 'Umbro Velocita IV Club FG', 'COLLECTIONS', 'Football', 'umbro', 210, 5, '2019-11-24', 'Construction de chaussettes: la construction de chaussettes autour de la cheville a été réaménagée et recontournée pour un ajustement amélioré et un confort accru.\r\nNéoprène: une couche de base en néoprène fournit une sentiment sans couture contre le pied.\r\nSupérieur: tandis que la couche extérieure assure le soutien et la stabilité, la couche mid \"memory flex\" a des propriétés élastiques et est exposée dans des domaines clés pour créer de l\'étirement et de la flexibilité.\r\n', 'https://cdn.shopify.com/s/files/1/1884/0763/products/157288UUM181396U_FYT___UMBRO_F1.jpg?v=1550888236', 30),
(97, 'BU4974-010', 'Veste Umbro Diamond Flashback', 'FEMME', 'Vêtements', 'umbro', 160, 4, '2020-01-14', 'La veste flashback diamant débrousse aux coutures avec un style rétro. Les couleurs qui attirent les yeux sont colorées sur le nylon froissé donnant certains vibes sérieux des années 90. La flare de cette veste courte est finie avec une fermeture éclair contrastée, un poignet et un ourlet élastiques et un col relevé. Associer avec le legging flashback pour compléter votre look.', 'https://cdn.shopify.com/s/files/1/1884/0763/products/UA2C_FLASHBACK_JACKET_F_copy.jpg?v=1574348053', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_ref` varchar(50) NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_set` int(2) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `product_ref`, `slider_img`, `slider_set`) VALUES
(1, 'REA-HOM20', 'https://nsa40.casimages.com/img/2019/12/25/191225045845236131.jpg', 0),
(2, 'BV4874-010', 'https://nsa40.casimages.com/img/2019/12/26/191226110101357904.jpg', 1),
(3, 'BV3455-606', 'https://nsa40.casimages.com/img/2019/12/27/191227101435569552.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `label` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `label` (`label`) USING BTREE,
  KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `reference`, `label`, `description`) VALUES
(7, 'men', 'Chaussures', ''),
(8, 'men', 'Vêtements', ''),
(9, 'men', 'Accessoires et équipement', ''),
(10, 'women', 'Chaussures', ''),
(11, 'women', 'Vêtements', ''),
(12, 'women', 'Accessoires et équipement', ''),
(13, 'kid', 'Chaussures', ''),
(14, 'kid', 'Vêtements', ''),
(15, 'kid', 'Accessoires et équipement', ''),
(16, 'collections', 'Football', ''),
(17, 'collections', 'Handball', ''),
(18, 'collections', 'Tennis', ''),
(19, 'collections', 'Natation', ''),
(20, 'collections', 'Autres', ''),
(21, 'nutrition', 'Protéine', ''),
(22, 'nutrition', 'Energie', ''),
(23, 'nutrition', 'Autres', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `productcategory` FOREIGN KEY (`category`) REFERENCES `category` (`label`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `productmanufacturer` FOREIGN KEY (`manufacturer`) REFERENCES `manufacturer` (`reference`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `productsubcategory` FOREIGN KEY (`subcategory`) REFERENCES `subcategory` (`label`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
