-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 10:14 PM
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
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AccountID` int(20) NOT NULL,
  `Pin` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Email`, `Password`, `Name`, `SurName`, `Phone`, `AccountID`, `Pin`) VALUES
('sompongsu@gmail.com', 'sususompong', 'sompong', 'susu', '0812459495', 2, '555555');

-- --------------------------------------------------------

--
-- Table structure for table `accountno`
--

CREATE TABLE `accountno` (
  `SerialNo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DepositorName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountNo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountID` int(20) NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountno`
--

INSERT INTO `accountno` (`SerialNo`, `DepositorName`, `AccountType`, `AccountNo`, `BranchName`, `AccountID`, `DayTime`) VALUES
('fwe', 'somsom', 'wevq', '2', 'KMUTT', 2, '2021-10-17 17:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `accountnoinfo`
--

CREATE TABLE `accountnoinfo` (
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountnoinfo`
--

INSERT INTO `accountnoinfo` (`AccountNo`, `Balance`) VALUES
('2', 442360);

-- --------------------------------------------------------

--
-- Table structure for table `staffaccount`
--

CREATE TABLE `staffaccount` (
  `StaffID` int(20) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `StaffPin` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `accountno`
--
ALTER TABLE `accountno`
  ADD PRIMARY KEY (`AccountNo`),
  ADD KEY `fk_accountID` (`AccountID`),
  ADD KEY `fk_accountNo` (`AccountNo`);

--
-- Indexes for table `accountnoinfo`
--
ALTER TABLE `accountnoinfo`
  ADD PRIMARY KEY (`AccountNo`);

--
-- Indexes for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountno`
--
ALTER TABLE `accountno`
  ADD CONSTRAINT `fk_accountID` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_accountNo` FOREIGN KEY (`AccountNo`) REFERENCES `accountnoinfo` (`AccountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
