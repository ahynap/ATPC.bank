-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 10:39 PM
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
  `AccountID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Email`, `Password`, `Name`, `SurName`, `Phone`, `AccountID`) VALUES
('ohteh@hotmail.com', '123', 'oh', 'teh', '06000001', 2),
('gade@gmail.com', '555', 'gade', 'gigi', '0850660443', 6);

-- --------------------------------------------------------

--
-- Table structure for table `accountno`
--

CREATE TABLE `accountno` (
  `SerialNo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AccountType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountNo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountID` int(20) NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MainAccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountno`
--

INSERT INTO `accountno` (`SerialNo`, `AccountType`, `AccountNo`, `BranchName`, `AccountID`, `DayTime`, `MainAccount`) VALUES
('123456', 'Savings', '1', 'ICU', 6, '2021-10-27 18:15:06', 'Main Account'),
('123456', 'Savings', '2', 'ICU', 2, '2021-10-27 18:46:53', 'Main Account'),
('123456', 'Savings', '3', 'CPE', 2, '2021-10-27 20:21:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `accountnoinfo`
--

CREATE TABLE `accountnoinfo` (
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountnoinfo`
--

INSERT INTO `accountnoinfo` (`AccountNo`, `Name`, `SurName`, `BankName`, `Balance`) VALUES
('1', 'gade', 'zuza', 'ATPCBank', 480),
('2', 'oh', 'teh', 'ATPCBank', 43519),
('3', 'oh', 'teh', 'ATPCBank', 546),
('4', 'fe', 'ng', 'ATPCBank', 45);

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

-- --------------------------------------------------------

--
-- Table structure for table `transferhistory`
--

CREATE TABLE `transferhistory` (
  `TransferID` int(20) NOT NULL,
  `AccountNo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `BankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DestinationAccountNo` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transferhistory`
--

INSERT INTO `transferhistory` (`TransferID`, `AccountNo`, `BankName`, `DestinationAccountNo`, `DayTime`, `Amount`) VALUES
(4, '1', 'ATPCBank', '2', '2021-10-27 18:43:44', 10),
(5, '1', 'ATPCBank', '2', '2021-10-27 18:44:37', 10),
(6, '1', 'ATPCBank', '2', '2021-10-27 18:44:49', 10),
(7, '2', 'ATPCBank', '1', '2021-10-27 18:47:07', 6),
(8, '2', 'ATPCBank', '1', '2021-10-27 18:54:13', 10),
(9, '2', 'ATPCBank', '1', '2021-10-27 20:02:35', 10),
(10, '2', 'ATPCBank', '1', '2021-10-27 20:03:10', 10),
(11, '2', 'ATPCBank', '1', '2021-10-27 20:05:16', 10),
(12, '2', 'ATPCBank', '1', '2021-10-27 20:05:39', 10),
(13, '2', 'ATPCBank', '1', '2021-10-27 20:06:11', 1);

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
-- Indexes for table `transferhistory`
--
ALTER TABLE `transferhistory`
  ADD PRIMARY KEY (`TransferID`),
  ADD KEY `fk_AcNo` (`AccountNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transferhistory`
--
ALTER TABLE `transferhistory`
  MODIFY `TransferID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountno`
--
ALTER TABLE `accountno`
  ADD CONSTRAINT `fk_accountID` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_accountNo` FOREIGN KEY (`AccountNo`) REFERENCES `accountnoinfo` (`AccountNo`);

--
-- Constraints for table `transferhistory`
--
ALTER TABLE `transferhistory`
  ADD CONSTRAINT `fk_AcNo` FOREIGN KEY (`AccountNo`) REFERENCES `accountnoinfo` (`AccountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
