-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 07:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
  `Type` varchar(255) DEFAULT NULL,
  `Model` varchar(25) NOT NULL,
  `Serial_Number` varchar(255) NOT NULL,
  `DateIntroduced` date NOT NULL,
  `DateWrittenOff` date DEFAULT NULL,
  `RoomID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`AssetID`, `Brand`, `Type`, `Model`, `Serial_Number`, `DateIntroduced`, `DateWrittenOff`, `RoomID`) VALUES
(10001001, 'Dell', 'Desktop', 'Inspiron Small Desktop', 'dell-001', '2015-05-11', '0000-00-00', 9),
(10001002, 'Dell', 'Desktop', 'Inspiron Small Desktop', 'dell-002', '2015-05-11', NULL, 121),
(10001003, 'Dell', 'Desktop', 'Inspiron Small Desktop', 'dell-003', '2015-05-11', NULL, 120),
(10001004, 'Dell', 'Desktop', 'Inspiron Small Desktop', 'dell-004', '2015-05-11', NULL, 119),
(10001005, 'Dell', 'Desktop', 'Inspiron Small Desktop', 'dell-005', '2015-05-11', NULL, 118),
(10001006, 'Lenovo', 'Desktop', 'V520s', 'LV-001', '2015-10-11', NULL, 117),
(10001007, 'Lenovo', 'Desktop', 'V520s', 'LV-002', '2015-10-11', NULL, 116),
(10001008, 'Lenovo', 'Desktop', 'V520s', 'LV-003', '2015-10-11', NULL, 115),
(10001009, 'Lenovo', 'Laptop', 'e11x', 'e11x-aaa', '2012-01-30', NULL, 114),
(10001010, 'Lenovo', 'Laptop', 'e11x', 'e11x-aab', '2012-01-30', NULL, 113),
(10001011, 'HP', 'Laptop', 'EliteBook 1037', 'eleitebook-001', '2018-01-01', NULL, 25),
(10001012, 'HP', 'Laptop', 'EliteBook 1038', 'eleitebook-002', '2018-01-01', NULL, 44),
(10001013, 'HP', 'Laptop', 'EliteBook 1039', 'eleitebook-003', '2018-01-01', NULL, 60),
(10001014, 'HP', 'Laptop', 'EliteBook 1040', 'eleitebook-004', '2018-01-01', NULL, 70),
(10001015, 'HP', 'Laptop', 'EliteBook 1041', 'eleitebook-005', '2018-01-01', NULL, 80),
(10001016, 'Acer', 'Desktop', 'AXC-230', 'acer-a01', '2018-04-21', NULL, 1),
(10001017, 'Acer', 'Desktop', 'AXC-230', 'acer-a02', '2018-04-21', NULL, 1),
(10001018, 'Acer', 'Desktop', 'AXC-230', 'acer-a03', '2018-04-21', NULL, 1),
(10001019, 'Acer', 'Laptop', 'Aspire E5', 'acer-z01', '2018-04-21', NULL, 7),
(10001020, 'Acer', 'Laptop', 'Aspire E6', 'acer-z02', '2018-04-21', NULL, 7),
(10001021, 'Hitachi', 'Projector', 'Upside-down', 'ud-001', '2010-07-09', NULL, 1),
(10001022, 'Hitachi', 'Projector', 'Upside-down', 'ud-002', '2010-07-09', NULL, 3),
(10001023, 'Hitachi', 'Projector', 'Upside-down', 'ud-003', '2010-07-09', NULL, 22),
(10001024, 'Hitachi', 'Projector', 'Upside-down', 'ud-004', '2010-07-09', NULL, 23),
(10001025, 'Hitachi', 'Projector', 'Upside-down', 'ud-005', '2010-07-09', NULL, 11);

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
  `DateLogged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(10) UNSIGNED NOT NULL,
  `RoomID` int(10) UNSIGNED NOT NULL,
  `AssetID` int(10) UNSIGNED DEFAULT NULL,
  `Broken_Mouse` varchar(255) DEFAULT NULL,
  `Broken_Keyboard` varchar(255) DEFAULT NULL,
  `Broken_Screen` varchar(255) DEFAULT NULL,
  `ExtraInfo` text,
  `JobStatusID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `PartsUsed` varchar(255) DEFAULT NULL,
  `DateComplete` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JobID`, `DateLogged`, `UserID`, `RoomID`, `AssetID`, `Broken_Mouse`, `Broken_Keyboard`, `Broken_Screen`, `ExtraInfo`, `JobStatusID`, `PartsUsed`, `DateComplete`) VALUES
(1, '2018-03-26 04:48:02', 2, 1, 10001004, '2', '2', '2', 'Keyboard was snapped in half when the student could not get his Website to WORK.', 2, 'Ram, Cleaned Case,', '0000-00-00 00:00:00'),
(2, '2018-03-26 04:48:22', 2, 3, NULL, '5', '5', '5', 'Student has used a pen to break the computer, currently a pen is sticking out of the screen.', 1, NULL, NULL),
(3, '2018-03-26 04:48:35', 2, 26, NULL, '2', '5', '', 'Student has used a pen to break the computer, currently a pen is sticking out of the screen.', 1, NULL, NULL),
(6, '2018-03-26 04:49:41', 2, 38, NULL, '1', '1', '1', 'Student has used a hammer to break on the desktop', 1, NULL, NULL),
(7, '2018-03-29 13:07:52', 2, 19, NULL, '0', '1', '0', 'Water was spilled on the keyboard,', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobstatus`
--

CREATE TABLE `jobstatus` (
  `JobStatusID` int(10) UNSIGNED NOT NULL,
  `JobStatusName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobstatus`
--

INSERT INTO `jobstatus` (`JobStatusID`, `JobStatusName`) VALUES
(1, 'Open'),
(2, 'Close');

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
  ADD KEY `FK_UserID#1` (`UserID`),
  ADD KEY `FK_RoomID#1` (`RoomID`),
  ADD KEY `FK_AssetID#1` (`AssetID`),
  ADD KEY `FK_JobStatusID#1` (`JobStatusID`);

--
-- Indexes for table `jobstatus`
--
ALTER TABLE `jobstatus`
  ADD PRIMARY KEY (`JobStatusID`);

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
  MODIFY `AssetID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001026;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `BuildingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobstatus`
--
ALTER TABLE `jobstatus`
  MODIFY `JobStatusID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `FK_AssetID#1` FOREIGN KEY (`AssetID`) REFERENCES `asset` (`AssetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_JobStatusID#1` FOREIGN KEY (`JobStatusID`) REFERENCES `jobstatus` (`JobStatusID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RoomID#1` FOREIGN KEY (`RoomID`) REFERENCES `rooms` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserID#1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_Building#1` FOREIGN KEY (`BuildingID`) REFERENCES `building` (`BuildingID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
