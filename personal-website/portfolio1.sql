-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2021 at 01:53 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `anasayfa`
--

DROP TABLE IF EXISTS `anasayfa`;
CREATE TABLE IF NOT EXISTS `anasayfa` (
  `id` int NOT NULL,
  `yazi1` varchar(255) DEFAULT NULL,
  `yazi2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anasayfa`
--

INSERT INTO `anasayfa` (`id`, `yazi1`, `yazi2`) VALUES
(1, 'Welcome', 'This website build by Barış Güngör.');

-- --------------------------------------------------------

--
-- Table structure for table `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int NOT NULL,
  `site_baslik` varchar(255) DEFAULT NULL,
  `site_keywords` varchar(255) DEFAULT NULL,
  `site_description` varchar(255) DEFAULT NULL,
  `site_durum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `site_facebook` varchar(255) DEFAULT NULL,
  `site_twitter` varchar(255) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `site_kad` varchar(255) DEFAULT NULL,
  `site_pass` varchar(255) DEFAULT NULL,
  `site_adSoyad` varchar(255) DEFAULT NULL,
  `site_meslek` varchar(255) DEFAULT NULL,
  `site_resim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_keywords`, `site_description`, `site_durum`, `site_facebook`, `site_twitter`, `site_email`, `site_kad`, `site_pass`, `site_adSoyad`, `site_meslek`, `site_resim`) VALUES
(1, 'Portfolyo Sitesi', 'barış,güngör,portfolyo', 'Barış Güngör\'e ait portfolyo sitesi.', '1', 'sitefacebook1', 'sitetwitter1', 'siteemail1', 'admin', '1234', 'siteadsoyad1', 'sitemeslek1', '17523025_1392764614117133_3120036876791451564_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `calismalar`
--

DROP TABLE IF EXISTS `calismalar`;
CREATE TABLE IF NOT EXISTS `calismalar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `aciklama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calismalar`
--

INSERT INTO `calismalar` (`id`, `baslik`, `resim`, `aciklama`) VALUES
(1, 'Başlık 1', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 1-1'),
(2, 'Başlık 2', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 2-2'),
(3, 'Başlık 3', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 3-3'),
(4, 'Başlık 4', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 4-4'),
(63, 'Başlık 5', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 5-5'),
(66, 'Başlık 6', '17523025_1392764614117133_3120036876791451564_n.jpg', 'Başlık 6-6');

-- --------------------------------------------------------

--
-- Table structure for table `hakkimda`
--

DROP TABLE IF EXISTS `hakkimda`;
CREATE TABLE IF NOT EXISTS `hakkimda` (
  `id` int NOT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `yazi` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hakkimda`
--

INSERT INTO `hakkimda` (`id`, `resim`, `yazi`) VALUES
(1, 'P_20170418_125442.jpg', 'Açıklama budur. Ve siz bunu okuyorsunuz.');

-- --------------------------------------------------------

--
-- Table structure for table `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mesaj` text,
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `durum` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iletisim`
--

INSERT INTO `iletisim` (`id`, `isim`, `email`, `mesaj`, `durum`) VALUES
(2, 'Barış Güngör', 'devoyuncu@gmail.com', 'mesaj1', '1'),
(9, 'Yağız Toprak Sarıer', 'yağzısakdjkasaks', 'asdasdadas', '1'),
(11, '', '', '', '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
