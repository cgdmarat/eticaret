-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2022 at 09:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veritabani`
--

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `nick` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `mail` text COLLATE utf8_turkish_ci NOT NULL,
  `sifre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `nick`, `mail`, `sifre`) VALUES
(1, 'admin', 'admin', 'admin123321', 'admin@gmail.com', 1234),
(3, 'test', 'test', 'test', 'test', 1234),
(4, 'test2', 'test2', 'test2', 'test2', 1234),
(5, 'test3', 'test3', 'test3', 'test3', 1234),
(6, 'asd', 'asd', 'asd', 'asd', 1234),
(7, 'asd2', 'asd2', 'asd2', 'asd2', 1234),
(8, 'aaadsdf', 'sdsfdsf', 'fdsfsds', ' dsdsf', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ad` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(16) NOT NULL,
  `adet` int(16) NOT NULL,
  `resimkonum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfakonum` int(1) NOT NULL DEFAULT '-1',
  `sayfakonum1` int(1) NOT NULL DEFAULT '-1',
  `sayfakonum2` int(1) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `urunler`
--

INSERT INTO `urunler` (`id`, `ad`, `aciklama`, `fiyat`, `adet`, `resimkonum`, `sayfakonum`, `sayfakonum1`, `sayfakonum2`) VALUES
(1, 'Telefon1', 'iyi bir telefon', 1000, 1, 'C:fakepath128245_small.jpg', 1, 1, 1),
(2, 'telefon 2', 'fghfhgfhgfghfghfhgf', 2500, 1, 'C:fakepathformat_webp (10).jpg', 1, 1, 1);
