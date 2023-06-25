-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 02:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dl`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Exid` int(11) NOT NULL,
  `NID` int(11) DEFAULT NULL,
  `ov` date DEFAULT NULL,
  `we` date DEFAULT NULL,
  `westat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Exid`, `NID`, `ov`, `we`, `westat`) VALUES
(1, 1, '2023-06-30', '2023-07-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `DLN` int(11) NOT NULL,
  `NID` int(11) DEFAULT NULL,
  `DL_no` int(11) DEFAULT NULL,
  `category` varchar(1) DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `felony` int(11) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`DLN`, `NID`, `DL_no`, `category`, `expiry`, `felony`, `contact`) VALUES
(1, 1, 12456191, 'A', '2027-06-30', NULL, '9840480778');

-- --------------------------------------------------------

--
-- Table structure for table `trials`
--

CREATE TABLE `trials` (
  `trid` int(11) DEFAULT NULL,
  `ftd` date DEFAULT NULL,
  `ftr` tinyint(1) DEFAULT NULL,
  `sctd` date DEFAULT NULL,
  `str` tinyint(1) DEFAULT NULL,
  `ttd` date DEFAULT NULL,
  `ttr` tinyint(1) DEFAULT NULL,
  `NID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `MName` varchar(50) DEFAULT NULL,
  `BGroup` varchar(5) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `DOI` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Nationality` varchar(20) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `sessionid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`ID`, `Name`, `Address`, `FName`, `MName`, `BGroup`, `DOB`, `DOI`, `Gender`, `Nationality`, `pwd`, `sessionid`) VALUES
(1, 'Gautam Mudbhari', 'lokanthali', 'Bhojraj', 'gayatridevi', 'A+', '2001-08-11', '2023-06-17', 'male', 'Nepali', 'Clashon124', '649711651f0bfaefd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`Exid`),
  ADD UNIQUE KEY `NID` (`NID`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`DLN`),
  ADD KEY `NID` (`NID`);

--
-- Indexes for table `trials`
--
ALTER TABLE `trials`
  ADD KEY `NID` (`NID`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `Exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `DLN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `license_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trials`
--
ALTER TABLE `trials`
  ADD CONSTRAINT `trials_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `userdata` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
