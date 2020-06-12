-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 08:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gymId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `city`, `gymId`, `address`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(11, 'tagamo3 awal', 21, 'masr el gdida', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'maadi', 24, '9th street', 0, '0000-00-00 00:00:00', '2020-04-25 03:27:41'),
(18, 'dos', 28, 'das', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'doss', 29, 'dass', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'maadi', 30, 'rehab', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'maadi', 31, 'rehab', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'israeeel', 33, 'mosaaad', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'shru2', 35, 'masr el gdida', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'nasr city', 24, 'a5er 3abbas 3shan 28iz zizo', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'tagamo3', 24, '5ames', 0, '0000-00-00 00:00:00', '2020-04-25 04:13:49'),
(36, 'tagamo3 5ames', 37, 'golf', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'tgmo3', 38, 'hena', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'tagamo3 awal', 39, 'masr el gdida', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'shru2', 40, 'masr el gdidas', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'shru2', 41, 'masr el gdidases', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'tagamo3 awal', 52, 'masr el gdida', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'tagamo3 5anes', 53, 'masr el gdida', 0, '0000-00-00 00:00:00', '2020-04-26 20:05:04'),
(60, 'maadi', 53, '9th street', 1, '2020-04-24 22:12:59', '0000-00-00 00:00:00'),
(61, 'maadi', 53, '9th street', 1, '2020-04-24 22:14:50', '0000-00-00 00:00:00'),
(62, 'nasr city', 53, 'a5er 3abbas 3shan 28iz zizo', 1, '2020-04-24 22:20:45', '0000-00-00 00:00:00'),
(63, 'maadi', 53, '3ala salah salem', 1, '2020-04-24 23:03:12', '2020-04-24 23:03:22'),
(64, 'tagamo3 5anes', 24, '3asher', 0, '2020-04-25 03:38:14', '2020-04-25 04:04:40'),
(65, 'shru2', 54, 'el door el tany', 0, '2020-04-26 22:39:20', '0000-00-00 00:00:00'),
(66, 'tagamo3 awal', 55, 'masr el gdida', 0, '2020-04-26 22:40:23', '0000-00-00 00:00:00'),
(68, 'tagamo3', 57, 'seven stars', 0, '2020-04-26 22:49:14', '0000-00-00 00:00:00'),
(69, 'beeety', 58, 'fel oooda', 0, '2020-04-26 22:53:38', '0000-00-00 00:00:00'),
(70, 'myarea', 59, 'here', 0, '2020-04-26 22:55:25', '0000-00-00 00:00:00'),
(71, 'Main Branch', 60, '', 0, '2020-04-27 06:41:34', '0000-00-00 00:00:00'),
(72, 'maadi', 53, '9th street', 0, '2020-04-28 05:10:05', '0000-00-00 00:00:00'),
(73, 'Main Branch', 61, 'masr el gdida', 0, '2020-04-29 21:33:57', '0000-00-00 00:00:00'),
(74, 'maadi', 61, 'el door el tany', 0, '2020-04-29 21:34:55', '2020-04-29 21:35:40'),
(75, 'tagamo3', 61, '3nd beety', 1, '2020-04-29 21:35:52', '2020-04-29 21:35:55'),
(76, 'Main Branch', 62, '90th street', 0, '2020-04-30 00:41:37', '0000-00-00 00:00:00'),
(77, 'Main Branch', 63, 'masr el gdida', 0, '2020-05-01 22:42:16', '0000-00-00 00:00:00'),
(78, 'nasr city', 53, 'awel 3abas 3shan zizo by3yt', 1, '2020-05-02 00:09:06', '2020-05-02 00:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `paymentId` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `note` text NOT NULL,
  `issueDate` date NOT NULL,
  `packageId` int(11) NOT NULL,
  `remainingPackagePeriod` int(11) NOT NULL,
  `remainingFreezeDays` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `memberId`, `startDate`, `endDate`, `paymentId`, `sales`, `note`, `issueDate`, `packageId`, `remainingPackagePeriod`, `remainingFreezeDays`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(1, 1, '2017-11-29', '2020-10-17', 1, 26, '	m3lsh														', '2020-10-10', 109, 10, 19, 0, '2020-05-03 05:29:49', '2020-05-05 20:27:17'),
(2, 2, '2018-11-30', '2020-11-30', 2, 37, '																				', '2020-11-23', 85, 18596, 1, 0, '2020-05-03 06:24:28', '2020-05-04 23:06:42'),
(3, 1, '2019-12-31', '2020-12-31', 3, 36, '															', '2020-12-24', 87, 0, 5, 0, '2020-05-04 16:56:50', '2020-05-05 19:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `personId`, `typeId`, `userName`, `password`) VALUES
(6, 60, 0, 'alo', 'alo'),
(9, 63, 0, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(12, 66, 0, 'ana', 'c71fd39e988b0456769fccbe617d127c'),
(13, 67, 0, 'anas', '9f6e6800cfae7749eb6c486619254b9c'),
(14, 68, 0, 'mika', '07af613eea059030daaed3bde1fd1ce7'),
(15, 69, 0, 'mikaa', '07af613eea059030daaed3bde1fd1ce7'),
(16, 71, 0, 'koky', '9c67d2e6ac14981985d00e2b941f0310'),
(17, 72, 0, 'hamada', 'bdc7f4fae58fa4d5b4b48226896aeea9'),
(19, 74, 0, 'ahmed', '9193ce3b31332b03f7d8af056c692b84'),
(20, 75, 0, '12345', '827ccb0eea8a706c4c34a16891f84e7b'),
(21, 76, 0, 'lkansdlk', '3f76818f507fe7eb6422bd0703c64c88'),
(22, 77, 0, 'admin2', '827ccb0eea8a706c4c34a16891f84e7b'),
(23, 78, 0, 'admin43', '827ccb0eea8a706c4c34a16891f84e7b'),
(24, 79, 21, 'adminnew', '827ccb0eea8a706c4c34a16891f84e7b'),
(25, 80, 22, 'admin11', '21232f297a57a5a743894a0e4a801fc3'),
(26, 81, 25, 'admin12', '21232f297a57a5a743894a0e4a801fc3'),
(27, 0, 27, 'm7maa', 'cfa24f0292a40a6d43227e577e90fb14'),
(28, 0, 28, 'a7maa', '827ccb0eea8a706c4c34a16891f84e7b'),
(29, 85, 30, 'zizozizo', '827ccb0eea8a706c4c34a16891f84e7b'),
(30, 86, 31, 'admin100', '21232f297a57a5a743894a0e4a801fc3'),
(31, 87, 32, 'tarook', '432cc32a51e5d3e88a2dda9474474d32'),
(32, 88, 33, '', 'd41d8cd98f00b204e9800998ecf8427e'),
(33, 90, 34, 'admin16', '21232f297a57a5a743894a0e4a801fc3'),
(34, 91, 35, 'admin17', '21232f297a57a5a743894a0e4a801fc3'),
(35, 92, 36, 'admin20', '21232f297a57a5a743894a0e4a801fc3'),
(36, 93, 25, 'admin30', '21232f297a57a5a743894a0e4a801fc3'),
(37, 94, 25, 'admin40', '21232f297a57a5a743894a0e4a801fc3'),
(38, 95, 25, 'admin50', '21232f297a57a5a743894a0e4a801fc3'),
(39, 96, 25, 'admin60', '21232f297a57a5a743894a0e4a801fc3'),
(40, 97, 37, 'admin110', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `freezecontract`
--

CREATE TABLE `freezecontract` (
  `id` int(11) NOT NULL,
  `contractId` int(11) NOT NULL,
  `freezeFrom` date NOT NULL,
  `freezeTo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freezecontract`
--

INSERT INTO `freezecontract` (`id`, `contractId`, `freezeFrom`, `freezeTo`) VALUES
(37, 1, '2020-05-04', '2020-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`id`, `name`, `image`, `ownerId`, `isActive`, `createdAt`) VALUES
(21, 'power', '', 6, 1, '0000-00-00 00:00:00'),
(24, 'gamed', '', 9, 1, '0000-00-00 00:00:00'),
(28, 'dis', '', 12, 1, '0000-00-00 00:00:00'),
(29, 'disco', '', 13, 1, '0000-00-00 00:00:00'),
(30, 'moka', '', 14, 1, '0000-00-00 00:00:00'),
(31, 'mokaa', '', 15, 1, '0000-00-00 00:00:00'),
(33, 'yahudyiiin', '', 16, 1, '0000-00-00 00:00:00'),
(35, 'power\'s', '', 17, 1, '0000-00-00 00:00:00'),
(37, 'spartan', '', 19, 1, '0000-00-00 00:00:00'),
(38, '2t3in', '', 20, 1, '0000-00-00 00:00:00'),
(39, 'powerz', '', 21, 1, '0000-00-00 00:00:00'),
(40, 'gymaawy', '', 22, 1, '0000-00-00 00:00:00'),
(41, 'gymawy', '', 23, 1, '0000-00-00 00:00:00'),
(52, 'balance', '', 24, 0, '0000-00-00 00:00:00'),
(53, 'gold', 'DefaultGymLogo.png', 25, 1, '0000-00-00 00:00:00'),
(54, 'm7ma', '', 27, 1, '0000-00-00 00:00:00'),
(55, 'a7maaa', '', 28, 1, '0000-00-00 00:00:00'),
(57, 'vein', '', 29, 1, '0000-00-00 00:00:00'),
(58, 'Royal', '', 30, 1, '0000-00-00 00:00:00'),
(59, 'balance2', 'DefaultGymLogo.png', 31, 1, '0000-00-00 00:00:00'),
(60, '', 'DefaultGymLogo.png', 32, 1, '0000-00-00 00:00:00'),
(61, 'titanium', 'DefaultGymLogo.png', 33, 1, '0000-00-00 00:00:00'),
(62, 'titan', 'DefaultGymLogo.png', 35, 1, '0000-00-00 00:00:00'),
(63, 'balanced', 'DefaultGymLogo.png', 40, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `personId` int(11) NOT NULL,
  `address` text NOT NULL,
  `marriedStatus` varchar(255) NOT NULL,
  `emergencyNumber` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `workPhone` varchar(255) NOT NULL,
  `faxNumber` varchar(255) NOT NULL,
  `companyAddress` text NOT NULL,
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `personId`, `address`, `marriedStatus`, `emergencyNumber`, `companyName`, `workPhone`, `faxNumber`, `companyAddress`, `addedBy`) VALUES
(1, 89, ' el tgmo3 madinty					        ', 'Married', '122', 'fe beety					', '01112131415', '165165165165', 'fe beety					', 26),
(2, 98, ' 			tagamo3							        ', 'Married', '', '										', '', '', '										', 25);

-- --------------------------------------------------------

--
-- Table structure for table `memberattendance`
--

CREATE TABLE `memberattendance` (
  `id` int(11) NOT NULL,
  `attendanceDate` datetime NOT NULL,
  `contractId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packageperiod`
--

CREATE TABLE `packageperiod` (
  `id` int(11) NOT NULL,
  `packageTypeId` int(11) NOT NULL,
  `period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packageperiod`
--

INSERT INTO `packageperiod` (`id`, `packageTypeId`, `period`) VALUES
(42, 21, 10),
(43, 21, 20),
(44, 21, 30),
(45, 22, 30),
(46, 22, 60),
(47, 22, 90),
(48, 23, 10),
(49, 23, 20),
(50, 24, 1),
(51, 24, 3),
(52, 24, 6),
(53, 24, 12),
(66, 26, 1),
(67, 26, 3),
(68, 26, 6),
(75, 25, 1),
(76, 25, 3),
(77, 25, 6),
(84, 28, 10),
(85, 28, 20),
(86, 28, 30),
(87, 29, 10),
(88, 29, 20),
(89, 29, 30),
(108, 27, 1),
(109, 27, 3),
(110, 27, 6);

-- --------------------------------------------------------

--
-- Table structure for table `packagetype`
--

CREATE TABLE `packagetype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `gymId` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packagetype`
--

INSERT INTO `packagetype` (`id`, `name`, `type`, `gymId`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(21, 'Membership', 'Months', 24, 0, '2020-04-25 20:47:46', '2020-04-25 21:11:20'),
(22, 'membership', 'Days', 53, 1, '2020-04-26 20:51:14', '2020-04-26 20:51:16'),
(23, 'trainer', 'Sessions', 53, 1, '2020-04-26 20:51:28', '2020-04-26 20:51:31'),
(24, 'membership', 'Months', 61, 0, '2020-04-29 21:35:13', '0000-00-00 00:00:00'),
(25, 'membership', 'Sessions', 53, 1, '2020-05-01 23:03:37', '2020-05-01 23:22:19'),
(26, 'membership', 'Months', 53, 1, '2020-05-01 23:04:41', '2020-05-01 23:22:22'),
(27, 'membership', 'Months', 53, 0, '2020-05-01 23:05:07', '2020-05-05 20:15:05'),
(28, 'Trainer', 'Days', 53, 0, '2020-05-01 23:18:34', '0000-00-00 00:00:00'),
(29, 'spa', 'Sessions', 53, 0, '2020-05-01 23:18:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `pageName`) VALUES
(1, 'Reciption'),
(2, 'Notifications'),
(3, 'Members'),
(4, 'Emlpoyees'),
(5, 'Contracts'),
(6, 'Administration'),
(7, 'Reports');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `amountDue` int(11) NOT NULL,
  `dateDueBy` date NOT NULL,
  `amountPaid` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `discount`, `fees`, `paymentMethodId`, `amountDue`, `dateDueBy`, `amountPaid`, `totalAmount`) VALUES
(1, 5, 1000, 46, 450, '2019-12-30', 500, 950),
(2, 5, 2000, 46, 900, '2017-11-30', 1000, 1900),
(3, 40, 2000, 47, 200, '2020-12-31', 1000, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gymId` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `name`, `gymId`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(34, 'Cash', 24, 0, '2020-04-25 03:30:39', '0000-00-00 00:00:00'),
(38, 'Visa', 24, 1, '2020-04-25 03:36:51', '2020-04-25 04:12:27'),
(42, 'Paypal', 24, 1, '2020-04-25 03:59:12', '2020-04-25 04:00:01'),
(43, 'Pay', 24, 1, '2020-04-25 04:00:11', '2020-04-25 04:12:14'),
(44, 'Visa', 53, 1, '2020-04-26 20:50:38', '2020-04-26 20:50:41'),
(45, 'Cash', 61, 0, '2020-04-29 21:35:00', '0000-00-00 00:00:00'),
(46, 'Cash', 53, 0, '2020-05-01 23:50:29', '2020-05-01 23:51:52'),
(47, 'Visa', 53, 0, '2020-05-01 23:51:56', '0000-00-00 00:00:00'),
(48, 'PayPal', 53, 1, '2020-05-01 23:52:02', '2020-05-01 23:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDay` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `branchId` int(11) DEFAULT NULL,
  `mobilePhone` varchar(255) NOT NULL,
  `homePhone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `firstName`, `lastName`, `birthDay`, `image`, `branchId`, `mobilePhone`, `homePhone`, `gender`, `email`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(60, 'mohamed', 'zizo', '1998-08-19', '', 11, '01010203050', '02587123654', 'male', 'rafanadal13@live.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'ziad', 'hoss', '2020-04-18', 'splashscreen.png', 14, '01236541', '1556015', 'male', 'alo@alo.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'shaher', 'sheeko', '2007-12-29', 'splashscreen.png', 18, '011111111', '2222222222', 'male', 'sh@sh.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'shaher', 'sheeko', '2007-12-29', 'splashscreen.png', 19, '0111111111', '2222222222', 'male', 'shs@sh.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'mohamed', 'mika', '2017-12-30', '', 20, '01020304050', '02156189', 'male', 'mo@mo.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'mohamed', 'mika', '2017-12-30', '', 21, '010203040508', '02156189', 'male', 'moo@mo.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'kareem', 'atef', '2002-12-30', '', NULL, '0203056145', '2255589965', 'male', 'koky@koky.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'ziad\'s', 'zizo', '2020-04-15', '', NULL, '01111112', '22222', 'male', 'sdd@live.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'ahmed', 'mahmoud', '2004-06-16', '', NULL, '01234567852', '31645192', 'male', 'ahmed@ahmed.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'ziad', 'zizo', '1996-12-28', '', NULL, '02146516103', '32035465', 'male', 'sad@sad.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'ziad', 'zizo', '1995-11-29', '', NULL, '02146516101', '31645199', 'male', 'asdsad@asd.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'ziad', 'zizo', '1990-01-01', '', NULL, '02146516102', '', 'male', 'admin@admin.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'ziad', 'zizo', '2000-01-02', '', NULL, '02146516109', '', 'male', 'mo@mos.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'zoooooz', 'zoooooooz', '1999-12-29', '', NULL, '02146516112', '32035461', 'male', 'asdssaad@asd.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'ziad', 'zizo', '1998-12-29', 'DefaultPersonimage.png', NULL, '02146516112', '32035461', 'male', 'rafanadal12@live.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'ziad', 'zizo', '2002-11-29', 'DefaultPersonimage.png', 50, '12354556541', '32135131', 'Male', 'rafanadal13@live.com', 0, '2020-04-26 04:01:20', '2020-05-01 22:37:16'),
(82, 'ziad', 'zoooooooz', '1999-11-28', '', NULL, '02146516112', '32035461', 'male', 'rafanadal13@live.com', 0, '2020-04-26 22:39:20', '0000-00-00 00:00:00'),
(83, 'ziad', 'zizo', '2000-10-27', '', NULL, '02146516112', '32035461', 'male', 'rafanadal13@live.com', 0, '2020-04-26 22:40:23', '0000-00-00 00:00:00'),
(84, 'mohamed', 'abdelaziz', '2000-11-27', '', NULL, '01111111111', '22222222', 'male', 'zizo@zizo.com', 0, '2020-04-26 22:46:45', '0000-00-00 00:00:00'),
(85, 'mohamed', 'abdelaziz', '2000-11-27', '', NULL, '01111111111', '22222222', 'male', 'zizo@zizo.com', 0, '2020-04-26 22:49:14', '0000-00-00 00:00:00'),
(86, 'tarek', 'medhat', '1997-11-29', '', NULL, '02146516112', '32035461', 'male', 'rafanadal13@live.com', 0, '2020-04-26 22:53:38', '0000-00-00 00:00:00'),
(87, 'tarek', 'halaby', '2001-10-27', 'DefaultPersonimage.png', NULL, '02146516103', '87632873', 'male', 'tarek@tarek.com', 0, '2020-04-26 22:55:25', '0000-00-00 00:00:00'),
(88, 'ziad', 'zizo', '0000-00-00', 'DefaultPersonimage.png', NULL, '02146516112', '', '', '', 0, '2020-04-27 06:41:34', '0000-00-00 00:00:00'),
(89, 'mohamed', 'ayman', '1999-12-10', 'DefaultPersonimage.png', 72, '01185663247', '23564789', 'Male', 'hamada@elso8yr.com', 0, '2020-04-27 22:47:12', '2020-05-02 00:43:12'),
(90, 'ammar', 'ibrahim', '1994-09-29', 'DefaultPersonImage.png', NULL, '02055553213', '', 'male', 'ammar@ammar.com', 0, '2020-04-29 21:33:57', '0000-00-00 00:00:00'),
(91, 'mostafa', 'ashraf', '1992-09-29', 'DefaultPersonImage.png', 74, '05265465165', '', 'Male', 'asdssaad@asd.com', 0, '2020-04-29 21:37:14', '0000-00-00 00:00:00'),
(92, 'aly', 'mohsen', '2000-10-28', 'DefaultPersonImage.png', NULL, '02146516113', '', 'male', 'aly@aly.com', 0, '2020-04-30 00:41:37', '0000-00-00 00:00:00'),
(93, 'ammar', 'hammad', '1999-05-05', 'DefaultPersonImage.png', 50, '25412323665', '', 'Male', 'rafanadal13@live.com', 0, '2020-05-01 01:18:58', '2020-05-01 02:25:42'),
(94, 'essam', 'elhadary', '2006-11-30', 'DefaultPersonImage.png', 50, '84662245888', '', 'Male', 'alo@lool.com', 0, '2020-05-01 01:21:13', '0000-00-00 00:00:00'),
(95, 'aawad', 'mohamaden', '2006-11-30', 'DefaultPersonImage.png', 50, '84662245888', '', 'Male', 'alo@lool.com', 0, '2020-05-01 01:23:20', '0000-00-00 00:00:00'),
(96, 'aawad', 'mohamaden', '2006-11-30', 'DefaultPersonImage.png', 50, '84662245888', '', 'Male', 'alo@lool.com', 0, '2020-05-01 01:24:37', '2020-05-01 01:36:45'),
(97, 'ziad', 'zizo', '2001-11-27', 'DefaultPersonImage.png', NULL, '02146516112', '32035461', 'male', 'rafanadal13@live.com', 0, '2020-05-01 22:42:16', '0000-00-00 00:00:00'),
(98, 'mohamed', 'osama', '2001-11-27', 'DefaultPersonImage.png', 72, '02684684665', '', 'Female', 'mo@mo.com', 0, '2020-05-02 00:51:38', '2020-05-02 00:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `hasAccess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `typeId`, `pageId`, `hasAccess`) VALUES
(1, 0, 1, 1),
(2, 0, 2, 1),
(3, 0, 3, 1),
(4, 0, 4, 1),
(5, 0, 5, 1),
(6, 0, 6, 1),
(7, 0, 7, 1),
(22, 14, 1, 1),
(23, 14, 2, 1),
(24, 14, 3, 1),
(25, 14, 4, 1),
(26, 14, 5, 1),
(27, 14, 6, 0),
(28, 14, 7, 0),
(29, 15, 1, 1),
(30, 15, 2, 1),
(31, 15, 3, 0),
(32, 15, 4, 0),
(33, 15, 5, 1),
(34, 15, 6, 1),
(35, 15, 7, 0),
(36, 21, 1, 1),
(37, 21, 2, 1),
(38, 21, 3, 1),
(39, 21, 4, 1),
(40, 21, 5, 1),
(41, 21, 6, 1),
(42, 21, 7, 1),
(43, 22, 1, 1),
(44, 22, 2, 1),
(45, 22, 3, 1),
(46, 22, 4, 1),
(47, 22, 5, 1),
(48, 22, 6, 1),
(49, 22, 7, 1),
(50, 23, 1, 0),
(51, 23, 2, 0),
(52, 23, 3, 1),
(53, 23, 4, 1),
(54, 23, 5, 0),
(55, 23, 6, 0),
(56, 23, 7, 0),
(57, 24, 1, 1),
(58, 24, 2, 1),
(59, 24, 3, 1),
(60, 24, 4, 0),
(61, 24, 5, 0),
(62, 24, 6, 0),
(63, 24, 7, 0),
(64, 25, 1, 1),
(65, 25, 2, 1),
(66, 25, 3, 0),
(67, 25, 4, 0),
(68, 25, 5, 0),
(69, 25, 6, 0),
(70, 25, 7, 0),
(71, 26, 1, 1),
(72, 26, 2, 1),
(73, 26, 3, 1),
(74, 26, 4, 1),
(75, 26, 5, 1),
(76, 26, 6, 1),
(77, 26, 7, 0),
(78, 27, 1, 1),
(79, 27, 2, 1),
(80, 27, 3, 1),
(81, 27, 4, 1),
(82, 27, 5, 1),
(83, 27, 6, 1),
(84, 27, 7, 1),
(85, 28, 1, 1),
(86, 28, 2, 1),
(87, 28, 3, 1),
(88, 28, 4, 1),
(89, 28, 5, 1),
(90, 28, 6, 1),
(91, 28, 7, 1),
(99, 30, 1, 1),
(100, 30, 2, 1),
(101, 30, 3, 1),
(102, 30, 4, 1),
(103, 30, 5, 1),
(104, 30, 6, 1),
(105, 30, 7, 1),
(106, 31, 1, 1),
(107, 31, 2, 1),
(108, 31, 3, 1),
(109, 31, 4, 1),
(110, 31, 5, 1),
(111, 31, 6, 1),
(112, 31, 7, 1),
(113, 32, 1, 1),
(114, 32, 2, 1),
(115, 32, 3, 1),
(116, 32, 4, 1),
(117, 32, 5, 1),
(118, 32, 6, 1),
(119, 32, 7, 1),
(120, 33, 1, 1),
(121, 33, 2, 1),
(122, 33, 3, 1),
(123, 33, 4, 1),
(124, 33, 5, 1),
(125, 33, 6, 1),
(126, 33, 7, 1),
(127, 34, 1, 1),
(128, 34, 2, 1),
(129, 34, 3, 1),
(130, 34, 4, 1),
(131, 34, 5, 1),
(132, 34, 6, 1),
(133, 34, 7, 1),
(134, 35, 1, 1),
(135, 35, 2, 1),
(136, 35, 3, 1),
(137, 35, 4, 1),
(138, 35, 5, 0),
(139, 35, 6, 0),
(140, 35, 7, 0),
(141, 36, 1, 1),
(142, 36, 2, 1),
(143, 36, 3, 1),
(144, 36, 4, 1),
(145, 36, 5, 1),
(146, 36, 6, 1),
(147, 36, 7, 1),
(148, 37, 1, 1),
(149, 37, 2, 1),
(150, 37, 3, 1),
(151, 37, 4, 1),
(152, 37, 5, 1),
(153, 37, 6, 1),
(154, 37, 7, 1),
(155, 38, 1, 1),
(156, 38, 2, 1),
(157, 38, 3, 1),
(158, 38, 4, 1),
(159, 38, 5, 1),
(160, 38, 6, 0),
(161, 38, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gymId` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `gymId`, `isDeleted`, `createdAt`, `updatedAt`) VALUES
(0, 'owner', NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'reception', 24, 1, '0000-00-00 00:00:00', '2020-04-25 04:05:24'),
(15, 'admin', 24, 0, '0000-00-00 00:00:00', '2020-04-25 03:16:38'),
(21, 'Owner', 52, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Owner', 53, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'manager', 24, 1, '2020-04-25 03:17:04', '2020-04-25 19:19:12'),
(24, 'reception', 24, 1, '2020-04-25 04:07:41', '2020-04-25 04:08:51'),
(25, 'Reciopionist', 53, 0, '2020-04-26 03:59:57', '2020-05-01 23:38:34'),
(26, 'manager', 53, 1, '2020-04-26 17:09:13', '2020-04-26 20:49:33'),
(27, 'Owner', 54, 0, '2020-04-26 22:39:20', '0000-00-00 00:00:00'),
(28, 'Owner', 55, 0, '2020-04-26 22:40:23', '0000-00-00 00:00:00'),
(30, 'Owner', 57, 0, '2020-04-26 22:49:14', '0000-00-00 00:00:00'),
(31, 'Owner', 58, 0, '2020-04-26 22:53:38', '0000-00-00 00:00:00'),
(32, 'Owner', 59, 0, '2020-04-26 22:55:25', '0000-00-00 00:00:00'),
(33, 'Owner', 60, 0, '2020-04-27 06:41:34', '0000-00-00 00:00:00'),
(34, 'Owner', 61, 0, '2020-04-29 21:33:57', '0000-00-00 00:00:00'),
(35, 'reception', 61, 0, '2020-04-29 21:34:38', '0000-00-00 00:00:00'),
(36, 'Owner', 62, 0, '2020-04-30 00:41:37', '0000-00-00 00:00:00'),
(37, 'Owner', 63, 0, '2020-05-01 22:42:16', '0000-00-00 00:00:00'),
(38, 'manager', 53, 0, '2020-05-01 23:38:07', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gymId` (`gymId`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `paymentId` (`paymentId`),
  ADD KEY `sales` (`sales`),
  ADD KEY `packageId` (`packageId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personid` (`personId`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `freezecontract`
--
ALTER TABLE `freezecontract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contractId` (`contractId`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`),
  ADD KEY `personId` (`personId`);

--
-- Indexes for table `memberattendance`
--
ALTER TABLE `memberattendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberId` (`contractId`);

--
-- Indexes for table `packageperiod`
--
ALTER TABLE `packageperiod`
  ADD PRIMARY KEY (`id`,`packageTypeId`),
  ADD KEY `featureTypeId` (`packageTypeId`);

--
-- Indexes for table `packagetype`
--
ALTER TABLE `packagetype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gymId` (`gymId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentMethodId` (`paymentMethodId`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gymId` (`gymId`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branchId` (`branchId`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pageId` (`pageId`),
  ADD KEY `typeId` (`typeId`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gymId` (`gymId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `freezecontract`
--
ALTER TABLE `freezecontract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `memberattendance`
--
ALTER TABLE `memberattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `packageperiod`
--
ALTER TABLE `packageperiod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `packagetype`
--
ALTER TABLE `packagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`gymId`) REFERENCES `gym` (`id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`paymentId`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`sales`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`packageId`) REFERENCES `packageperiod` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`);

--
-- Constraints for table `freezecontract`
--
ALTER TABLE `freezecontract`
  ADD CONSTRAINT `freezecontract_ibfk_1` FOREIGN KEY (`contractId`) REFERENCES `contract` (`id`);

--
-- Constraints for table `gym`
--
ALTER TABLE `gym`
  ADD CONSTRAINT `gym_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `employee` (`id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `employee` (`id`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`personId`) REFERENCES `person` (`id`);

--
-- Constraints for table `memberattendance`
--
ALTER TABLE `memberattendance`
  ADD CONSTRAINT `memberattendance_ibfk_1` FOREIGN KEY (`contractId`) REFERENCES `contract` (`id`);

--
-- Constraints for table `packageperiod`
--
ALTER TABLE `packageperiod`
  ADD CONSTRAINT `packageperiod_ibfk_1` FOREIGN KEY (`packageTypeId`) REFERENCES `packagetype` (`id`);

--
-- Constraints for table `packagetype`
--
ALTER TABLE `packagetype`
  ADD CONSTRAINT `packagetype_ibfk_1` FOREIGN KEY (`gymId`) REFERENCES `gym` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`paymentMethodId`) REFERENCES `paymentmethod` (`id`);

--
-- Constraints for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD CONSTRAINT `paymentmethod_ibfk_1` FOREIGN KEY (`gymId`) REFERENCES `gym` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`branchId`) REFERENCES `branch` (`id`);

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`pageId`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `privilege_ibfk_2` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`gymId`) REFERENCES `gym` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
