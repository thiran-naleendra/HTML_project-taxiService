-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 26, 2021 at 10:00 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rabbitcabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `Admin_ID` varchar(10) NOT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Admin_ID`),
  KEY `Username` (`Username`),
  KEY `Password` (`Password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Admin_ID`, `Username`, `Password`) VALUES
('admin00001', 'Kavindu', 'KavinduSSS'),
('admin00002', 'Thiran', 'ThiranSSS'),
('admin00003', 'Chaniru', 'ChaniruSSS');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `V_ID` varchar(10) NOT NULL,
  `Maker` varchar(30) DEFAULT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `NumberPlate` varchar(20) DEFAULT NULL,
  `CarType` int(11) DEFAULT NULL,
  `ChargePerKM` float DEFAULT NULL,
  PRIMARY KEY (`V_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`V_ID`, `Maker`, `Model`, `Color`, `NumberPlate`, `CarType`, `ChargePerKM`) VALUES
('SIV0000001', 'Toyota', 'Camry', 'Pale gold', 'CBC-2255', 1, 110),
('SIV0000002', 'Honda', 'Civic sedan', 'Apple green', 'CAB-4455', 1, 110),
('SIV0000003', 'Mazda', 'Mazda 6', 'Pearl white', 'CGH-5566', 1, 150),
('SIV0000004', 'Hyundai', 'Tucson', 'Steel grey', 'CGH-6998', 1, 130),
('SIV0000005', 'Mitsubishi', 'Evolution X', 'Volcano orange', 'CJK-7789', 1, 120),
('LIV0000001', 'Lexus', 'LFA', 'Carbon black', 'CFX-8890', 2, 200),
('LIV0000002', 'Mercedes', 'S500', 'Silver', 'CSF-7070', 2, 220),
('LIV0000003', 'Mazda', 'RX8 Rotary', 'Sapphire blue', 'CDJ-2424', 2, 210),
('LIV0000004', 'BMW', '750', 'Jet black', 'CAT-3568', 2, 220),
('LIV0000005', 'Audi', 'A8', 'Matte grey', 'CEJ-9078', 2, 230);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `CustomerName` varchar(50) DEFAULT NULL,
  `CustomerEmail` varchar(50) DEFAULT NULL,
  `PickupLocation` varchar(50) DEFAULT NULL,
  `Destination` varchar(50) DEFAULT NULL,
  `Distance` int(11) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `PickupDateTime` datetime DEFAULT NULL,
  `SelectedCar` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`CustomerName`, `CustomerEmail`, `PickupLocation`, `Destination`, `Distance`, `Telephone`, `PickupDateTime`, `SelectedCar`) VALUES
('Pamudu Induwara', 'pamuduInduwara@gmail.com', 'Galle', 'Matara', 36, '0776870677', '2021-08-29 18:00:00', 'LIV0000001'),
('Adithya Wimarshana', 'adithyaWimarshana@gmail.com', 'Hambantota', 'Matara', 67, '0715567098', '2021-08-27 22:00:00', 'SIV0000002'),
('Pramith Dulara', 'pramithDulara@gmail.com', 'Galle', 'Tangalle', 65, '0776230677', '2021-08-30 07:30:00', 'LIV0000003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
