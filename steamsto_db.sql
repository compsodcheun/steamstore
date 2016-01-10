-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2016 at 05:04 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `steamsto_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buytopup`
--

CREATE TABLE IF NOT EXISTS `buytopup` (
  `ID_btop` int(10) NOT NULL AUTO_INCREMENT,
  `Price_btop` double NOT NULL,
  `Type_btop` set('bank','true') NOT NULL,
  `ID_ord` int(10) NOT NULL,
  `ID_ctop` int(10) NOT NULL,
  PRIMARY KEY (`ID_btop`),
  KEY `ID_ord` (`ID_ord`),
  KEY `ID_ord_2` (`ID_ord`),
  KEY `ID_ctop` (`ID_ctop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `codetop`
--

CREATE TABLE IF NOT EXISTS `codetop` (
  `ID_ctop` int(10) NOT NULL AUTO_INCREMENT,
  `Code_ctop` text NOT NULL,
  `Status_ctop` set('notsale','sold') NOT NULL,
  `ID_top` int(10) NOT NULL,
  PRIMARY KEY (`ID_ctop`),
  KEY `ID_top` (`ID_top`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `ID_deal` int(10) NOT NULL AUTO_INCREMENT,
  `Price_deal` double NOT NULL,
  `Type_deal` set('bank','true') NOT NULL,
  `ID_ord` int(10) NOT NULL,
  `ID_key` int(10) NOT NULL,
  PRIMARY KEY (`ID_deal`),
  KEY `ID_mem` (`ID_ord`),
  KEY `ID_key` (`ID_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `ID_goods` int(10) NOT NULL AUTO_INCREMENT,
  `Name_goods` text NOT NULL,
  `Date_goods` date NOT NULL,
  `Type_goods` set('uplay','origin','steam','steamwallet') NOT NULL,
  `Price_goods` double NOT NULL,
  `Stock_goods` int(10) NOT NULL,
  `Discount_goods` double NOT NULL,
  `DiscountDateStart_goods` date NOT NULL,
  `DiscountTimeStart_goods` time NOT NULL,
  `DiscountDateEnd_goods` date NOT NULL,
  `DiscountTimeEnd_goods` time NOT NULL,
  `Pic_goods` text NOT NULL,
  `Add_goods` text NOT NULL,
  PRIMARY KEY (`ID_goods`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`ID_goods`, `Name_goods`, `Date_goods`, `Type_goods`, `Price_goods`, `Stock_goods`, `Discount_goods`, `DiscountDateStart_goods`, `DiscountTimeStart_goods`, `DiscountDateEnd_goods`, `DiscountTimeEnd_goods`, `Pic_goods`, `Add_goods`) VALUES
(1, 'Watch Dogs', '2015-12-25', 'uplay', 1000, 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/8.jpg', ''),
(2, 'Assasin''Creed Syndicate', '2015-12-25', 'uplay', 1000, 0, 20, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/12.jpg', ''),
(3, 'Far Cry 4', '2015-12-25', 'steam', 1500, 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/10.jpg', ''),
(4, 'FiFA 16', '2015-12-25', 'origin', 150, 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/15.jpg', ''),
(5, 'Battle Field', '2015-12-25', 'steam', 1000, 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/16.jpg', ''),
(9, 'Dragon Ace', '2015-12-25', 'uplay', 1000, 0, 0, '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', './images/18.jpg', ''),
(10, 'Star War', '2015-12-25', 'uplay', 1200, 0, 0, '2015-12-25', '00:00:00', '2015-12-29', '00:00:00', './images/19.jpg', 'เกมส์กาก\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gsteam`
--

CREATE TABLE IF NOT EXISTS `gsteam` (
  `ID_gsteam` bigint(20) NOT NULL,
  `Name_gsteam` text NOT NULL,
  `Type_gsteam` text NOT NULL,
  `Date_gsteam` text NOT NULL,
  `Pic_gsteam` text NOT NULL,
  `IniPrice_gsteam` double NOT NULL,
  `FinPrice_gsteam` double NOT NULL,
  `Dis_gsteam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `gsteam`
--

INSERT INTO `gsteam` (`ID_gsteam`, `Name_gsteam`, `Type_gsteam`, `Date_gsteam`, `Pic_gsteam`, `IniPrice_gsteam`, `FinPrice_gsteam`, `Dis_gsteam`) VALUES
(271590, 'Grand Theft Auto V', 'game', '13 Apr, 2015', 'https://steamcdn-a.akamaihd.net/steam/apps/271590/header.jpg?t=1452188687', 1499, 1499, 0),
(64902, 'Euro Truck Simulator 2 - East Expansion Bundle', 'Bundle', '', 'https://steamcdn-a.akamaihd.net/steam/subs/64902/header_ratio.jpg?t=1447459518', 559, 559, 0),
(730, 'Counter-Strike: Global Offensive', 'game', '21 Aug, 2012', 'https://steamcdn-a.akamaihd.net/steam/apps/730/header.jpg?t=1452221296', 315, 315, 0),
(268500, 'XCOM® 2', 'game', 'February 5, 2016', 'https://steamcdn-a.akamaihd.net/steam/apps/268500/header.jpg?t=1452206377', 1499, 1499, 0),
(295110, 'H1Z1', 'game', '15 Jan, 2015', 'https://steamcdn-a.akamaihd.net/steam/apps/295110/header.jpg?t=1447361459', 369, 369, 0),
(225540, 'Just Cause™ 3', 'game', '30 Nov, 2015', 'https://steamcdn-a.akamaihd.net/steam/apps/225540/header.jpg?t=1452136300', 1049, 1049, 0),
(365590, 'Tom Clancy’s The Division™', 'game', 'Mar 2016', 'https://steamcdn-a.akamaihd.net/steam/apps/365590/header.jpg?t=1452285482', 1790, 1790, 0),
(292030, 'The Witcher® 3: Wild Hunt', 'game', '18 May, 2015', 'https://steamcdn-a.akamaihd.net/steam/apps/292030/header.jpg?t=1450694670', 1490, 1490, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotsale`
--

CREATE TABLE IF NOT EXISTS `hotsale` (
  `ID_hot` int(10) NOT NULL AUTO_INCREMENT,
  `ID_goods` int(10) NOT NULL,
  PRIMARY KEY (`ID_hot`),
  KEY `ID_goods` (`ID_goods`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `key`
--

CREATE TABLE IF NOT EXISTS `key` (
  `ID_key` int(10) NOT NULL AUTO_INCREMENT,
  `Code_key` text NOT NULL,
  `Status_key` set('notsell','sold') NOT NULL DEFAULT 'notsell',
  `ID_goods` int(10) NOT NULL,
  PRIMARY KEY (`ID_key`),
  KEY `ID_goods` (`ID_goods`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `ID_mem` int(10) NOT NULL AUTO_INCREMENT,
  `User_mem` varchar(20) NOT NULL,
  `Pass_mem` varchar(20) NOT NULL,
  `Add_mem` text NOT NULL,
  `Email_mem` varchar(150) NOT NULL,
  `Balance_mem` double NOT NULL,
  `True_mem` double NOT NULL,
  `Permis_mem` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_mem`),
  UNIQUE KEY `User_mem` (`User_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID_mem`, `User_mem`, `Pass_mem`, `Add_mem`, `Email_mem`, `Balance_mem`, `True_mem`, `Permis_mem`) VALUES
(1, 'admin', 'admin', 'Heng Heng Heng', 'admin@steamstore.com', 0, 0, '1'),
(2, 'admin2', 'admin', 'sssss', 'p@j.com', 0, 0, '1'),
(3, 'pon', 'pon', 'pon', 'pon@gmail.com', 5000, 5000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ID_ord` int(10) NOT NULL AUTO_INCREMENT,
  `Date_ord` datetime NOT NULL,
  `Total_ord` double NOT NULL,
  `Pay_ord` set('no','yes') NOT NULL DEFAULT 'no',
  `ID_mem` int(10) NOT NULL,
  PRIMARY KEY (`ID_ord`),
  KEY `ID_mem` (`ID_mem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID_ord`, `Date_ord`, `Total_ord`, `Pay_ord`, `ID_mem`) VALUES
(2, '2015-12-24 16:19:00', 500, 'no', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payrate`
--

CREATE TABLE IF NOT EXISTS `payrate` (
  `ID_payrate` int(10) NOT NULL,
  `Bank_payrate` float NOT NULL,
  `True_payrate` float NOT NULL,
  PRIMARY KEY (`ID_payrate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `payrate`
--

INSERT INTO `payrate` (`ID_payrate`, `Bank_payrate`, `True_payrate`) VALUES
(1, 0.95, 1.1);

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `ID_top` int(10) NOT NULL AUTO_INCREMENT,
  `Type_top` set('steamwallet') NOT NULL,
  `Price_top` double NOT NULL,
  `True_top` double NOT NULL,
  `Stock_topup` int(10) NOT NULL,
  PRIMARY KEY (`ID_top`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` bigint(20) NOT NULL,
  `Name_user` text NOT NULL,
  `Type_user` set('facebook','steam') NOT NULL,
  `Bal_user` double NOT NULL,
  `True_user` double NOT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_user`, `Name_user`, `Type_user`, `Bal_user`, `True_user`) VALUES
(0, '', 'facebook', 0, 0),
(569916363155963, 'Kaewbeer Mozard', 'facebook', 0, 0),
(986034051464237, 'Nickel Sakpisit', 'facebook', 0, 0),
(1189370094424908, 'Mart Sodchuen', 'facebook', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buytopup`
--
ALTER TABLE `buytopup`
  ADD CONSTRAINT `buytopup_ibfk_1` FOREIGN KEY (`ID_ord`) REFERENCES `orders` (`ID_ord`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buytopup_ibfk_2` FOREIGN KEY (`ID_ctop`) REFERENCES `codetop` (`ID_ctop`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `codetop`
--
ALTER TABLE `codetop`
  ADD CONSTRAINT `codetop_ibfk_1` FOREIGN KEY (`ID_top`) REFERENCES `topup` (`ID_top`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `deal_ibfk_3` FOREIGN KEY (`ID_key`) REFERENCES `key` (`ID_key`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `deal_ibfk_4` FOREIGN KEY (`ID_ord`) REFERENCES `orders` (`ID_ord`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotsale`
--
ALTER TABLE `hotsale`
  ADD CONSTRAINT `hotsale_ibfk_1` FOREIGN KEY (`ID_goods`) REFERENCES `goods` (`ID_goods`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `key`
--
ALTER TABLE `key`
  ADD CONSTRAINT `key_ibfk_1` FOREIGN KEY (`ID_goods`) REFERENCES `goods` (`ID_goods`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ID_mem`) REFERENCES `member` (`ID_mem`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
