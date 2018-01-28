-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2017 at 03:08 PM
-- Server version: 1.0.30
-- PHP Version: 5.6.30-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4754_afr741`
--

-- --------------------------------------------------------

--
-- Table structure for table `Catalog`
--

CREATE TABLE IF NOT EXISTS `Catalog` (
  `sid` int(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `cost` double NOT NULL,
  PRIMARY KEY (`sid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Catalog`
--

INSERT INTO `Catalog` (`sid`, `pid`, `cost`) VALUES
(111, 'P1', 300),
(111, 'P3', 50),
(111, 'P4', 500),
(222, 'P1', 350),
(222, 'P2', 200),
(222, 'P3', 70),
(222, 'P5', 30),
(333, 'P2', 210),
(333, 'P3', 56),
(444, 'P1', 350),
(444, 'P2', 300),
(444, 'P3', 48),
(444, 'P4', 550),
(444, 'P5', 29),
(555, 'P3', 65),
(555, 'P4', 600);

-- --------------------------------------------------------

--
-- Table structure for table `Parts`
--

CREATE TABLE IF NOT EXISTS `Parts` (
  `pid` varchar(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Parts`
--

INSERT INTO `Parts` (`pid`, `pname`, `color`) VALUES
('P1', 'Mother board', 'Grey'),
('P2', 'CPU-AMD', 'White'),
('P3', 'Case', 'Grey'),
('P4', 'Monitor', 'White'),
('P5', 'Cable', 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `Suppliers`
--

CREATE TABLE IF NOT EXISTS `Suppliers` (
  `sid` int(10) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Suppliers`
--

INSERT INTO `Suppliers` (`sid`, `sname`, `address`) VALUES
(111, 'John Smith', '1 Elizabeth Ave'),
(222, 'Linda Wang', '20 Main Street'),
(333, 'Paul Justin', '150 Water Street'),
(444, 'Andy Brown', '1 Elizabeth Ave'),
(555, 'Bob Lee', '10 Governor Road'),
(666, 'Lisa Reed', '10 Governor Road');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Catalog`
--
ALTER TABLE `Catalog`
  ADD CONSTRAINT `Catalog_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `Suppliers` (`sid`),
  ADD CONSTRAINT `Catalog_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `Parts` (`pid`);
