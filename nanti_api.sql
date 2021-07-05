-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nanti_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `type`, `contact`) VALUES
(2, 'mango', 'individual', 'mango@mango.ocm.gh'),
(4, 'orange', 'individual', 'orange@orange.com.uk'),
(5, 'apple', 'limited liability company', 'apple@iproducts.com');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `manufacturer` varchar(200) NOT NULL,
  `serialNumber` text NOT NULL,
  `isAvailable` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `manufacturer`, `serialNumber`, `isAvailable`) VALUES
(1, 'thunder dude', 'bolt comapanies', '99009900', 0),
(3, 'white match', 'toast pos', '098834980', 0),
(4, 'dark owl', 'lightspeed retial', '983499743', 0),
(5, 'light speed', 'light speed co.', '389798748', 1),
(6, 'lightning pos+', 'pos hub co.', '289379472', 1),
(7, 'slim black', 'slims co.', '87487827', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE `dispatches` (
  `id` int(11) NOT NULL,
  `deviceId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispatches`
--

INSERT INTO `dispatches` (`id`, `deviceId`, `companyId`) VALUES
(3, 1, 2),
(4, 3, 2),
(5, 4, 2),
(6, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `deviceId` int(11) NOT NULL,
  `problemDescription` varchar(255) NOT NULL,
  `dateSent` date NOT NULL,
  `dateDone` datetime DEFAULT NULL,
  `isDone` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenances`
--

INSERT INTO `maintenances` (`id`, `companyId`, `deviceId`, `problemDescription`, `dateSent`, `dateDone`, `isDone`) VALUES
(1, 2, 1, 'cannot print', '2021-06-29', NULL, 1),
(2, 2, 7, 'faulty', '2021-07-05', NULL, 1),
(3, 2, 7, 'faulty', '2021-07-05', NULL, 0),
(4, 2, 1, 'some problem', '2021-07-05', NULL, 0),
(5, 2, 3, 'another problem', '2021-07-05', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maintenancestatus`
--

CREATE TABLE `maintenancestatus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `companyId` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userTypeId`, `companyId`, `password`) VALUES
(1, 'mudi', 2, 0, '$2y$10$UnT30ortcsIEOixABBbKa.hvaWdqqSy1ysOJbG0EOjfqMaPnJtfCK'),
(2, 'mudi21', 2, 2, '$2y$10$W/eHcHLcuXTLpgnFG6cG3OS1q2CldPprXjdJVYPP1.IDXnHCi6cu2');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `userType` varchar(200) NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `userType`) VALUES
(1, 'admin'),
(2, 'regular');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_dispatches`
-- (See below for the actual view)
--
CREATE TABLE `view_dispatches` (
`companyName` varchar(200)
,`type` varchar(200)
,`contact` varchar(200)
,`deviceName` varchar(200)
,`manufacturer` varchar(200)
,`serialNumber` text
,`isAvailable` int(1)
,`id` int(11)
,`deviceId` int(11)
,`companyId` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_maintenance`
-- (See below for the actual view)
--
CREATE TABLE `view_maintenance` (
`id` int(11)
,`companyId` int(11)
,`deviceId` int(11)
,`problemDescription` varchar(255)
,`dateSent` date
,`dateDone` datetime
,`isDone` int(11)
,`companyName` varchar(200)
,`type` varchar(200)
,`contact` varchar(200)
,`deviceName` varchar(200)
,`manufacturer` varchar(200)
,`serialNumber` text
,`isAvailable` int(1)
);

-- --------------------------------------------------------

--
-- Structure for view `view_dispatches`
--
DROP TABLE IF EXISTS `view_dispatches`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dispatches`  AS SELECT `companies`.`name` AS `companyName`, `companies`.`type` AS `type`, `companies`.`contact` AS `contact`, `devices`.`name` AS `deviceName`, `devices`.`manufacturer` AS `manufacturer`, `devices`.`serialNumber` AS `serialNumber`, `devices`.`isAvailable` AS `isAvailable`, `dispatches`.`id` AS `id`, `dispatches`.`deviceId` AS `deviceId`, `dispatches`.`companyId` AS `companyId` FROM ((`dispatches` join `devices` on(`dispatches`.`deviceId` = `devices`.`id`)) join `companies` on(`dispatches`.`companyId` = `companies`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_maintenance`
--
DROP TABLE IF EXISTS `view_maintenance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_maintenance`  AS SELECT `maintenances`.`id` AS `id`, `maintenances`.`companyId` AS `companyId`, `maintenances`.`deviceId` AS `deviceId`, `maintenances`.`problemDescription` AS `problemDescription`, `maintenances`.`dateSent` AS `dateSent`, `maintenances`.`dateDone` AS `dateDone`, `maintenances`.`isDone` AS `isDone`, `companies`.`name` AS `companyName`, `companies`.`type` AS `type`, `companies`.`contact` AS `contact`, `devices`.`name` AS `deviceName`, `devices`.`manufacturer` AS `manufacturer`, `devices`.`serialNumber` AS `serialNumber`, `devices`.`isAvailable` AS `isAvailable` FROM ((`maintenances` join `devices` on(`maintenances`.`deviceId` = `devices`.`id`)) join `companies` on(`maintenances`.`companyId` = `companies`.`id`)) ORDER BY `maintenances`.`dateSent` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `deviceId` (`deviceId`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `deviceId` (`deviceId`);

--
-- Indexes for table `maintenancestatus`
--
ALTER TABLE `maintenancestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userTypeId` (`userTypeId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dispatches`
--
ALTER TABLE `dispatches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenancestatus`
--
ALTER TABLE `maintenancestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD CONSTRAINT `dispatches_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dispatches_ibfk_2` FOREIGN KEY (`deviceId`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenances_ibfk_2` FOREIGN KEY (`deviceId`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
