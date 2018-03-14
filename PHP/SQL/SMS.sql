-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 08:40 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `AssetID` int(10) UNSIGNED NOT NULL,
  `Brand` varchar(25) NOT NULL,
  `Model` varchar(25) NOT NULL,
  `Serial_Number` varchar(255) NOT NULL,
  `DateIntroduced` date NOT NULL,
  `DateWrittenOff` date DEFAULT NULL,
  `LocationID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobID` int(10) UNSIGNED NOT NULL,
  `DateLogged` date NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  `LocationID` int(10) UNSIGNED NOT NULL,
  `AssetID` int(10) UNSIGNED NOT NULL,
  `JobStatus` int(3) NOT NULL DEFAULT '0',
  `PartsUsed` varchar(255) DEFAULT NULL,
  `DateComplete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationID` int(10) UNSIGNED NOT NULL,
  `Building` varchar(25) NOT NULL,
  `Room` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocationID`, `Building`, `Room`) VALUES
(1, 'Waiting_For_Building', 'Waiting_For_Room'),
(2, 'A_Block', '1'),
(3, 'A_Block', '2'),
(4, 'A_Block', '3'),
(5, 'A_Block', '4'),
(6, 'A_Block', '5'),
(7, 'A_Block', '6'),
(8, 'A_Block', '7'),
(9, 'A_Block', '8'),
(10, 'A_Block', '9'),
(11, 'A_Block', '10'),
(12, 'A_Block', '11'),
(13, 'A_Block', '12'),
(14, 'A_Block', '13'),
(15, 'A_Block', '14'),
(16, 'A_Block', '15'),
(17, 'A_Block', '16'),
(18, 'A_Block', '17'),
(19, 'A_Block', '18'),
(20, 'A_Block', '19'),
(21, 'A_Block', '20'),
(22, 'A_Block', '21'),
(23, 'A_Block', '22'),
(24, 'A_Block', '23'),
(25, 'A_Block', '24'),
(26, 'A_Block', '25'),
(27, 'B_Block', '1'),
(28, 'B_Block', '2'),
(29, 'B_Block', '3'),
(30, 'B_Block', '4'),
(31, 'B_Block', '5'),
(32, 'B_Block', '6'),
(33, 'C_Block', '1'),
(34, 'C_Block', '2'),
(35, 'C_Block', '3'),
(36, 'C_Block', '4'),
(37, 'C_Block', '5'),
(38, 'C_Block', '6'),
(39, 'C_Block', '7'),
(40, 'C_Block', '8'),
(41, 'C_Block', '9'),
(42, 'C_Block', '10'),
(43, 'D_Block', '1'),
(44, 'E_Block', '5'),
(45, 'F_Block', '1'),
(46, 'F_Block', '2'),
(47, 'F_Block', '3'),
(48, 'F_Block', '4'),
(49, 'F_Block', '5'),
(50, 'F_Block', '6'),
(51, 'F_Block', '7'),
(52, 'F_Block', '8'),
(53, 'F_Block', '9'),
(54, 'F_Block', '10'),
(55, 'F_Block', '11'),
(56, 'F_Block', '12'),
(57, 'F_Block', '13'),
(58, 'F_Block', '14'),
(59, 'F_Block', '15'),
(60, 'F_Block', '16'),
(61, 'F_Block', '17'),
(62, 'F_Block', '18'),
(63, 'F_Block', '19'),
(64, 'F_Block', '20'),
(65, 'F_Block', '21'),
(66, 'F_Block', '22'),
(67, 'F_Block', '23'),
(68, 'F_Block', '24'),
(69, 'F_Block', '25'),
(70, 'F_Block', '26'),
(71, 'F_Block', '27'),
(72, 'F_Block', '28'),
(73, 'F_Block', '29'),
(74, 'F_Block', '30'),
(75, 'F_Block', '31'),
(76, 'F_Block', '32'),
(77, 'F_Block', '33'),
(78, 'F_Block', '34'),
(79, 'F_Block', '35'),
(80, 'G_Block', '1'),
(81, 'G_Block', '2'),
(82, 'G_Block', '3'),
(83, 'G_Block', '4'),
(84, 'G_Block', '5'),
(85, 'G_Block', '6'),
(86, 'G_Block', '7'),
(87, 'G_Block', '8'),
(88, 'G_Block', '9'),
(89, 'G_Block', '10'),
(90, 'G_Block', '11'),
(91, 'G_Block', '12'),
(92, 'G_Block', '13'),
(93, 'G_Block', '14'),
(94, 'G_Block', '15'),
(95, 'G_Block', '16'),
(96, 'G_Block', '17'),
(97, 'G_Block', '18'),
(98, 'G_Block', '19'),
(99, 'G_Block', '20'),
(100, 'G_Block', '21'),
(101, 'G_Block', '22'),
(102, 'G_Block', '23'),
(103, 'G_Block', '24'),
(104, 'G_Block', '25'),
(105, 'Sports_Hall', '1'),
(106, 'Sports_Hall', '3'),
(107, 'Sports_Hall', '4'),
(108, 'Library', 'IT'),
(109, 'Library', 'Laptops'),
(110, 'Library', 'Desktops');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) UNSIGNED NOT NULL,
  `F.Name` varchar(255) NOT NULL,
  `L.Name` varchar(255) NOT NULL,
  `Username` varchar(8) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `UserStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `F.Name`, `L.Name`, `Username`, `Password`, `UserStatus`) VALUES
(1, 'Staff', 'Test', 'Staff', 'password', 1),
(2, 'Admin', 'Test', 'Admin', 'password', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`AssetID`),
  ADD KEY `FK_Location#1` (`LocationID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `FK_AssetID#1` (`AssetID`),
  ADD KEY `FK_UserID` (`UserID`),
  ADD KEY `FK_Location#2` (`LocationID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `AssetID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `FK_Location#1` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`) ON DELETE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `FK_AssetID#1` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Location#2` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
