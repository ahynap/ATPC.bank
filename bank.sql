-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 04:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('ohteh@hotmail.com', '555', 'oh', 'teh', '06000002', 1, '455245'),
('sompongsu@gmail.com', 'sususompong', 'sompong', 'susu', '0812459495', 2, '555555'),
('earn@gmail.com', '123', 'earn', 'anchi', '0821981506', 3, '123456');

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
  `DayTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `MainAccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountno`
--

INSERT INTO `accountno` (`SerialNo`, `DepositorName`, `AccountType`, `AccountNo`, `BranchName`, `AccountID`, `DayTime`, `MainAccount`) VALUES
('55555', 'oh', 'Fixed Deposites', '10', 'kmutt', 1, '2021-10-22 13:15:26', NULL),
('888888', 'som', 'Savings', '11', 'kmutt', 2, '2021-10-22 13:18:50', NULL),
('54785', 'anchi', 'Fixed Deposites', '12', 'kmutt', 1, '2021-10-22 13:22:12', NULL),
('1236547', 'anchi', 'Savings', '13', 'kmutt', 3, '2021-10-22 13:44:11', 'Main Account'),
('147', 'anchi', 'Savings', '14', 'kmutt', 3, '2021-10-22 14:25:02', NULL),
('sbafb', 'sompong', 'Fixed Deposites', '4', 'sdaba', 2, '2021-10-22 10:25:27', 'Main Account'),
('db', 'oh', 'Savings', '5', 'LX', 1, '2021-10-22 10:28:08', 'Main Account'),
('555', 'sompong', 'Savings', '6', 'CU', 2, '2021-10-22 10:42:35', NULL),
('555', 'sompong', 'Fixed Deposites', '7', 'sdaba', 2, '2021-10-22 12:59:00', NULL),
('db', 'oh', 'Savings', '8', 'CU', 1, '2021-10-22 13:00:58', NULL),
('123654778', 'som', 'Savings', '9', 'kmutt', 2, '2021-10-22 13:09:00', NULL);

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
('10', 65412),
('11', 999999),
('12', 85410),
('13', 574812),
('14', 100000000),
('2', 442360),
('3', 43526),
('4', 55.5),
('5', 463264),
('6', 63262500),
('7', 123456),
('8', 55),
('9', 125478);

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
