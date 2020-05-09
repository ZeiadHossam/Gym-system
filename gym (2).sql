-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 07:38 AM
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
(1, 'Main Branch', 1, 'Concord Plaza Mall - 90th street south، Cairo Governorate', 0, '2020-05-09 05:04:27', '2020-05-09 05:08:05'),
(2, 'Maadi', 1, '1 El-Mahata، Square، Maadi as Sarayat Al Gharbeyah, Maadi, Cairo Governorate', 0, '2020-05-09 05:06:54', '0000-00-00 00:00:00'),
(3, 'Heliopolis', 1, '18 Salah El-Din St., Almazah, Heliopolis, Cairo Governorate', 0, '2020-05-09 05:07:32', '0000-00-00 00:00:00'),
(4, 'Dokki', 1, '130 شارع النيل، Ad Doqi A, Dokki, Giza Governorate', 0, '2020-05-09 05:08:46', '0000-00-00 00:00:00');

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
  `packageId` int(11) DEFAULT NULL,
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
(1, 1, '2020-05-09', '2020-08-07', 1, 2, '																																			', '2020-07-31', 2, 3, 10, 0, '2020-05-09 05:55:38', '2020-05-09 07:18:54'),
(2, 2, '2020-05-09', '2020-11-05', 2, 3, '										', '2020-10-29', 3, 6, 15, 0, '2020-05-09 05:56:46', '2020-05-09 06:20:44'),
(3, 2, '2020-03-09', '2020-05-08', 3, 5, '					', '2020-05-01', 6, 10, 5, 0, '2020-05-09 05:58:09', '0000-00-00 00:00:00'),
(4, 4, '2020-05-15', '2020-06-15', 4, 4, '					', '2020-06-08', 11, 6, 5, 0, '2020-05-09 05:59:00', '0000-00-00 00:00:00'),
(5, 3, '2020-05-09', '2021-05-04', 5, 2, '										', '2021-04-27', 4, 12, 15, 0, '2020-05-09 06:00:05', '2020-05-09 06:24:31'),
(6, 3, '2020-04-09', '2020-07-09', 6, 3, '					', '2020-07-02', 7, 14, 15, 0, '2020-05-09 06:01:48', '0000-00-00 00:00:00'),
(7, 1, '2020-04-15', '2020-05-15', 7, 4, '					', '2020-05-08', 10, 4, 5, 0, '2020-05-09 06:03:18', '0000-00-00 00:00:00'),
(8, 5, '2020-05-05', '2020-05-15', 8, 2, '																														', '2020-05-08', 20, 6, 0, 0, '2020-05-09 06:15:04', '2020-05-09 07:18:57'),
(9, 5, '2020-05-09', '2020-06-08', 9, 3, '					', '2020-06-01', 1, 1, 2, 0, '2020-05-09 06:26:06', '0000-00-00 00:00:00');

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
(1, 1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 2, 3, 'admin1', '21232f297a57a5a743894a0e4a801fc3'),
(3, 3, 4, 'admin2', '21232f297a57a5a743894a0e4a801fc3'),
(4, 4, 5, 'admin3', '21232f297a57a5a743894a0e4a801fc3'),
(5, 5, 2, 'admin4', '21232f297a57a5a743894a0e4a801fc3');

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
(1, 'Gold', 'golds-gym-logo.png', 1, 1, '0000-00-00 00:00:00');

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
(1, 6, 'El tagamo3					', 'Single', '', ' ', ' 25489654', ' ', ' 					', 1),
(2, 7, '  Maadi						        					        ', 'Single', '', ' 															', '', '', ' 															', 1),
(3, 8, '					', 'Married', '', ' ', ' ', ' ', ' 					', 2),
(4, 9, '  Maadi										        					        ', 'Single', '', ' 															', '24896523', '', ' 															', 2),
(5, 10, '					', 'Single', '', ' ', ' ', ' ', ' 					', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memberattendance`
--

CREATE TABLE `memberattendance` (
  `id` int(11) NOT NULL,
  `attendanceDate` datetime NOT NULL,
  `contractId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberattendance`
--

INSERT INTO `memberattendance` (`id`, `attendanceDate`, `contractId`) VALUES
(1, '2020-05-09 06:00:17', 1),
(2, '2020-05-09 06:01:52', 6),
(3, '2020-05-09 06:26:31', 9);

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
(1, 1, 1),
(2, 1, 3),
(3, 1, 6),
(4, 1, 12),
(5, 2, 5),
(6, 2, 10),
(7, 2, 15),
(8, 2, 20),
(9, 3, 2),
(10, 3, 4),
(11, 3, 6),
(12, 3, 8),
(13, 3, 10),
(17, 5, 15),
(18, 5, 30),
(19, 5, 45),
(20, 4, 10),
(21, 4, 20),
(22, 4, 30),
(23, 6, 10),
(24, 6, 20),
(25, 6, 30);

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
(1, 'Membership', 'Months', 1, 0, '2020-05-09 05:12:13', '0000-00-00 00:00:00'),
(2, 'Trainer', 'Sessions', 1, 0, '2020-05-09 05:12:38', '0000-00-00 00:00:00'),
(3, 'GOLD’S  AMP™', 'Sessions', 1, 0, '2020-05-09 05:13:56', '0000-00-00 00:00:00'),
(4, 'Kids Club', 'Days', 1, 0, '2020-05-09 05:14:30', '2020-05-09 06:09:17'),
(5, 'Group Exercise', 'Days', 1, 1, '2020-05-09 05:14:54', '2020-05-09 05:15:00'),
(6, 'Spa', 'Sessions', 1, 0, '2020-05-09 06:31:42', '0000-00-00 00:00:00');

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
(1, 15, 1200, 2, 120, '2020-05-30', 900, 1020),
(2, 5, 2000, 2, 0, '2020-05-09', 1900, 1900),
(3, 0, 1000, 1, 0, '2020-03-09', 1000, 1000),
(4, 10, 500, 1, 50, '2020-05-30', 400, 450),
(5, 10, 3500, 2, 150, '2020-05-30', 3000, 3150),
(6, 10, 1500, 1, 50, '2020-05-15', 1300, 1350),
(7, 0, 500, 1, 0, '2020-04-15', 500, 500),
(8, 5, 300, 1, -15, '2020-05-05', 300, 285),
(9, 0, 200, 1, 0, '2020-05-09', 200, 200);

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
(1, 'Cash', 1, 0, '2020-05-09 05:08:58', '2020-05-09 06:32:18'),
(2, 'Visa', 1, 0, '2020-05-09 05:09:01', '0000-00-00 00:00:00'),
(3, 'Paypal', 1, 1, '2020-05-09 05:09:05', '2020-05-09 05:09:08'),
(4, 'Paypal', 1, 0, '2020-05-09 06:31:59', '0000-00-00 00:00:00');

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
(1, 'Ahmed', 'Tarek', '1997-10-27', 'person.jpg', NULL, '01001547896', '23546588', 'male', 'Ahmed_Tarek@gmail.com', 0, '2020-05-09 05:04:27', '0000-00-00 00:00:00'),
(2, 'Tarek', 'Medhat', '1998-10-10', 'DefaultPersonImage.png', 2, '01158963254', '25864751', 'Male', 'Tarek_Medhat@gmail.com', 0, '2020-05-09 05:16:18', '0000-00-00 00:00:00'),
(3, 'Zeiad', 'Hossam', '1999-10-06', 'DefaultPersonImage.png', 3, '01012323665', '22035461', 'Male', 'Zeiad_Hossam@gmail.com', 0, '2020-05-09 05:17:50', '0000-00-00 00:00:00'),
(4, 'Mohamed', 'Abdelaziz', '1998-08-19', 'DefaultPersonImage.png', 4, '01052148666', '25687412', 'Male', 'Mohamed_AbdelAziz@gmail.com', 0, '2020-05-09 05:19:36', '0000-00-00 00:00:00'),
(5, 'Ziad', 'Khaled', '1999-05-09', 'DefaultPersonImage.png', 1, '01114584555', '26548899', 'Male', 'Ziad_Khaled@gmail.com', 0, '2020-05-09 05:21:20', '2020-05-09 06:05:14'),
(6, 'Omar', 'Khaled', '1995-09-25', 'DefaultPersonImage.png', 1, '01157897456', '32035461', 'male', 'Omar_Khaled@gmail.com', 0, '2020-05-09 05:25:51', '0000-00-00 00:00:00'),
(7, 'Ahmed', 'Mostafa', '2001-05-09', 'DefaultPersonImage.png', 3, '01225478996', '31645199', 'Male', 'Ahmed_Mostafa@gmail.com', 0, '2020-05-09 05:26:50', '2020-05-09 06:05:36'),
(8, 'Youssef', 'Amr', '1989-10-30', 'DefaultPersonImage.png', 2, '01005789654', '', 'male', 'Youssef_Amr@gmail.com', 0, '2020-05-09 05:28:21', '0000-00-00 00:00:00'),
(9, 'Islam', 'Khaled', '1996-10-30', 'DefaultPersonImage.png', 2, '01001547896', '25698741', 'Male', 'Islam_khaled@gmail.com', 0, '2020-05-09 05:30:20', '2020-05-09 05:30:59'),
(10, 'Fares', 'Abdallah', '2006-09-29', 'DefaultPersonImage.png', 3, '01552365448', '32035412', 'male', 'fares_abdallah@gmail.com', 0, '2020-05-09 06:10:33', '0000-00-00 00:00:00');

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
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 2, 1, 1),
(9, 2, 2, 1),
(10, 2, 3, 1),
(11, 2, 4, 0),
(12, 2, 5, 1),
(13, 2, 6, 0),
(14, 2, 7, 0),
(15, 3, 1, 1),
(16, 3, 2, 1),
(17, 3, 3, 1),
(18, 3, 4, 1),
(19, 3, 5, 1),
(20, 3, 6, 0),
(21, 3, 7, 1),
(22, 4, 1, 1),
(23, 4, 2, 1),
(24, 4, 3, 1),
(25, 4, 4, 0),
(26, 4, 5, 1),
(27, 4, 6, 0),
(28, 4, 7, 0),
(29, 5, 1, 1),
(30, 5, 2, 0),
(31, 5, 3, 0),
(32, 5, 4, 0),
(33, 5, 5, 0),
(34, 5, 6, 0),
(35, 5, 7, 1);

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
(1, 'Owner', 1, 0, '2020-05-09 05:04:27', '0000-00-00 00:00:00'),
(2, 'Receptionist', 1, 0, '2020-05-09 05:09:41', '0000-00-00 00:00:00'),
(3, 'Manager', 1, 0, '2020-05-09 05:10:17', '0000-00-00 00:00:00'),
(4, 'Trainer', 1, 0, '2020-05-09 05:11:32', '0000-00-00 00:00:00'),
(5, 'Sales', 1, 0, '2020-05-09 05:11:43', '0000-00-00 00:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `freezecontract`
--
ALTER TABLE `freezecontract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gym`
--
ALTER TABLE `gym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `memberattendance`
--
ALTER TABLE `memberattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packageperiod`
--
ALTER TABLE `packageperiod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `packagetype`
--
ALTER TABLE `packagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
