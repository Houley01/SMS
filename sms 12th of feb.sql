-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2018 at 12:48 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assest`
--

CREATE TABLE `assest` (
  `AssetID` int(10) UNSIGNED NOT NULL,
  `Brand` text NOT NULL,
  `Model` text NOT NULL,
  `DateInto` date NOT NULL,
  `DatedWrittenOff` date DEFAULT NULL,
  `LocationID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobcomplete`
--

CREATE TABLE `jobcomplete` (
  `JobCompleteID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `JobProcessID` int(10) UNSIGNED NOT NULL,
  `DatedComplete` date NOT NULL,
  `DatedTime` datetime NOT NULL,
  `AssetsUsed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `joblogged`
--

CREATE TABLE `joblogged` (
  `JobID` int(10) UNSIGNED NOT NULL,
  `Username` varchar(25) NOT NULL,
  `LocationID` int(10) UNSIGNED NOT NULL,
  `AssestId` int(10) UNSIGNED NOT NULL,
  `Problem` text NOT NULL,
  `DateSubmitted` date NOT NULL,
  `TimeSubmitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobprocess`
--

CREATE TABLE `jobprocess` (
  `JobProcessID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `JobStatus` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationID` int(10) UNSIGNED NOT NULL,
  `Building` varchar(255) NOT NULL,
  `Room` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Password` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assest`
--
ALTER TABLE `assest`
  ADD PRIMARY KEY (`AssetID`),
  ADD KEY `fk_location#2` (`LocationID`);

--
-- Indexes for table `jobcomplete`
--
ALTER TABLE `jobcomplete`
  ADD PRIMARY KEY (`JobCompleteID`),
  ADD KEY `fk_JobID#3` (`JobID`),
  ADD KEY `fk_JobProcessID` (`JobProcessID`);

--
-- Indexes for table `joblogged`
--
ALTER TABLE `joblogged`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `fk_Username` (`Username`),
  ADD KEY `fk_Location` (`LocationID`),
  ADD KEY `fk_Assets` (`AssestId`);

--
-- Indexes for table `jobprocess`
--
ALTER TABLE `jobprocess`
  ADD PRIMARY KEY (`JobProcessID`),
  ADD KEY `fk_JobID#2` (`JobID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobcomplete`
--
ALTER TABLE `jobcomplete`
  MODIFY `JobCompleteID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joblogged`
--
ALTER TABLE `joblogged`
  MODIFY `JobID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobprocess`
--
ALTER TABLE `jobprocess`
  MODIFY `JobProcessID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assest`
--
ALTER TABLE `assest`
  ADD CONSTRAINT `fk_location#2` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobcomplete`
--
ALTER TABLE `jobcomplete`
  ADD CONSTRAINT `fk_JobID#3` FOREIGN KEY (`JobID`) REFERENCES `joblogged` (`JobID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_JobProcessID` FOREIGN KEY (`JobProcessID`) REFERENCES `jobprocess` (`JobProcessID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joblogged`
--
ALTER TABLE `joblogged`
  ADD CONSTRAINT `fk_Assets` FOREIGN KEY (`AssestId`) REFERENCES `assest` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Location` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Username` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobprocess`
--
ALTER TABLE `jobprocess`
  ADD CONSTRAINT `fk_JobID#2` FOREIGN KEY (`JobID`) REFERENCES `joblogged` (`JobID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
