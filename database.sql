-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2014 at 10:36 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ktemplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `k_userlogin`
--

CREATE TABLE IF NOT EXISTS `k_userlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userlogin` varchar(250) NOT NULL,
  `userpass` varchar(250) NOT NULL,
  `userhash` text NOT NULL,
  `userlevel` int(2) NOT NULL,
  `userpage` int(250) NOT NULL,
  `userlastlog` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `k_userlogin`
--

INSERT INTO `k_userlogin` (`id`, `userlogin`, `userpass`, `userhash`, `userlevel`, `userpage`, `userlastlog`, `status`) VALUES
(1, 'administrator', '788754d9252119d3d17cc3eb997e5c53', 'administrator', 0, 0, '0000-00-00 00:00:00', 0),
(5, 'dua', 'a319360336c8cac32102f4dffbee4260', '', 0, 0, '0000-00-00 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
