-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 09 apr 2017 om 00:06
-- Serverversie: 5.5.44-0ubuntu0.14.04.1
-- PHP-versie: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `stardunk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_code` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(11,2) NOT NULL,
  `other_product_details` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES
(1, 1, 1, 'Sprinkled', '1.24', '1 pc.'),
(2, 1, 4, 'Chocolate', '1.25', '1 pc.'),
(3, 1, 1, 'Maple', '1.45', '1 pc.'),
(5, 3, 3, 'Steak Long Jim', '2.44', 'Steak Wrap'),
(10, 3, 5, 'Joel Hanzo main', '3.55', 'Hanzo Main'),
(11, 2, 3, 'franky', '2.12', 'asdfasfd'),
(12, 45, 34, 'sadf', '3.44', 'sfwf'),
(13, 11, 22, 'qq', '4.32', 'weee'),
(14, 56, 21, 'tyuio', '9.12', 'lool'),
(15, 11, 76, 'tyy', '4.00', 'rert'),
(16, 65, 3, 'guil', '44.20', 'poli'),
(17, 2, 3, 'a', '2.00', 'b'),
(18, 4, 2, 'b', '2.00', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
