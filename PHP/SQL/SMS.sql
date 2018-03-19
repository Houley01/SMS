-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 08:41 AM
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
  `RoomID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `BuildingID` int(10) UNSIGNED NOT NULL,
  `BuildingName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`BuildingID`, `BuildingName`) VALUES
(1, 'A Block'),
(2, 'B Block'),
(3, 'C  Block'),
(4, 'D Block'),
(5, 'E Block'),
(6, 'F Block'),
(7, 'G Block'),
(8, 'H Block'),
(9, 'I  Block'),
(10, 'J Block'),
(11, 'Library');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobID` int(10) UNSIGNED NOT NULL,
  `DateLogged` date NOT NULL,
  `UserID` int(10) UNSIGNED NOT NULL,
  `RoomID` int(10) UNSIGNED NOT NULL,
  `AssetID` int(10) UNSIGNED NOT NULL,
  `JobStatus` int(3) NOT NULL DEFAULT '0',
  `PartsUsed` varchar(255) DEFAULT NULL,
  `DateComplete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `RoomID` int(10) UNSIGNED NOT NULL,
  `RoomName` varchar(255) NOT NULL,
  `BuildingID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`RoomID`, `RoomName`, `BuildingID`) VALUES
(1, 'A01', 1),
(2, 'A02', 1),
(3, 'A03', 1),
(4, 'A04', 1),
(5, 'A05', 1),
(6, 'A06', 1),
(7, 'A07', 1),
(8, 'A08', 1),
(9, 'A09', 1),
(10, 'A10', 1),
(11, 'A11', 1),
(12, 'A12', 1),
(13, 'A13', 1),
(14, 'A14', 1),
(15, 'A15', 1),
(16, 'A16', 1),
(17, 'A17', 1),
(18, 'A18', 1),
(19, 'A19', 1),
(20, 'A20', 1),
(21, 'A21', 1),
(22, 'A22', 1),
(23, 'A23', 1),
(24, 'A24', 1),
(25, 'A25', 1),
(26, 'B01', 2),
(27, 'B02', 2),
(28, 'B03', 2),
(29, 'B04', 2),
(30, 'B05', 2),
(31, 'B06', 2),
(32, 'C01', 3),
(33, 'D01', 4),
(34, 'D02', 4),
(35, 'D03', 4),
(36, 'D04', 4),
(37, 'E01', 5),
(38, 'E02', 5),
(39, 'E03', 5),
(40, 'E04', 5),
(41, 'E05', 5),
(42, 'F01', 6),
(43, 'F02', 6),
(44, 'F03', 6),
(45, 'F04', 6),
(46, 'F05', 6),
(47, 'F06', 6),
(48, 'F07', 6),
(49, 'F08', 6),
(50, 'F09', 6),
(51, 'F10', 6),
(52, 'F11', 6),
(53, 'F12', 6),
(54, 'F13', 6),
(55, 'F14', 6),
(56, 'F15', 6),
(57, 'F16', 6),
(58, 'F17', 6),
(59, 'F18', 6),
(60, 'F19', 6),
(61, 'F20', 6),
(62, 'F21', 6),
(63, 'F22', 6),
(64, 'F23', 6),
(65, 'F24', 6),
(66, 'F25', 6),
(67, 'F26', 6),
(68, 'F27', 6),
(69, 'F28', 6),
(70, 'F29', 6),
(71, 'F30', 6),
(72, 'F31', 6),
(73, 'F32', 6),
(74, 'F33', 6),
(75, 'F34', 6),
(76, 'F35', 6),
(77, 'G01', 7),
(78, 'G02', 7),
(79, 'G03', 7),
(80, 'G04', 7),
(81, 'G05', 7),
(82, 'G06', 7),
(83, 'G07', 7),
(84, 'G08', 7),
(85, 'G09', 7),
(86, 'G10', 7),
(87, 'G11', 7),
(88, 'G12', 7),
(89, 'G13', 7),
(90, 'G14', 7),
(91, 'G15', 7),
(92, 'G16', 7),
(93, 'G17', 7),
(94, 'G18', 7),
(95, 'G19', 7),
(96, 'G20', 7),
(97, 'G21', 7),
(98, 'G22', 7),
(99, 'G23', 7),
(100, 'G24', 7),
(101, 'G25', 7),
(102, 'H01', 8),
(103, 'I01', 9),
(104, 'I02', 9),
(105, 'I03', 9),
(106, 'I04', 9),
(107, 'I05', 9),
(108, 'I06', 9),
(109, 'I07', 9),
(110, 'I08', 9),
(111, 'I09', 9),
(112, 'I10', 9),
(113, 'I11', 9),
(114, 'I12', 9),
(115, 'I13', 9),
(116, 'I14', 9),
(117, 'I15', 9),
(118, 'J01', 10),
(119, 'IT', 11),
(120, 'Desktops', 11),
(121, 'Laptops', 11);

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
  ADD KEY `FK_Location#1` (`RoomID`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`BuildingID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobID`),
  ADD KEY `FK_Room#1` (`RoomID`) USING BTREE,
  ADD KEY `FK_AssetID#1` (`AssetID`) USING BTREE,
  ADD KEY `FK_UserID` (`UserID`) USING BTREE;

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `FK_Building#1` (`BuildingID`);

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
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `BuildingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `RoomID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

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
  ADD CONSTRAINT `FK_Room#2` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`) ON DELETE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_Building#1` FOREIGN KEY (`BuildingID`) REFERENCES `building` (`BuildingID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
