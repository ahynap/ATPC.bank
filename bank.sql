-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 11:10 PM
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
('ohteh@hotmail.com', '555', 'oh', 'teh', '06000002', 1, '455245'),
('sompongsu@gmail.com', 'sususompong', 'sompong', 'susu', '0812459495', 2, '555555'),
('earn@gmail.com', '123', 'earn', 'anchi', '0821981506', 3, '123456'),
('a', '1', 't', 'i', '02', 4, '120120'),
('f@gmail.com', '123', 'fern', 'susu', '01000', 5, '123654');

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
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
('12369', 'a', 'Savings', '15', 'kmutt', 4, '2021-10-22 18:16:25', 'Main Account'),
('12369', 'anchi', 'Savings', '16', 'kmutt', 4, '2021-10-22 18:24:14', NULL),
('147', 'oh', 'Fixed Deposites', '17', 'kmutt', 1, '2021-10-22 18:27:09', NULL),
('123456', 'anchi', 'Savings', '19', 'kmutt', 3, '2021-10-22 19:17:38', NULL),
('852', 'anchi', 'Savings', '20', 'kmutt', 3, '2021-10-22 20:01:42', NULL),
('12369', 'oh', 'Savings', '21', 'kmutt', 1, '2021-10-22 20:03:18', NULL),
('147', 'fern', 'Savings', '22', 'kmutt', 5, '2021-10-22 20:06:49', 'Main Account'),
('54785', 'fern', 'Savings', '23', 'kmutt', 5, '2021-10-22 20:07:31', NULL),
('db', 'oh', 'Fixed Deposites', '24', 'CPE', 1, '2021-10-22 20:26:23', NULL),
('555', 'sompong', 'Fixed Deposites', '25', 'sdaba', 2, '2021-10-22 20:27:12', NULL),
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
  `BankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountnoinfo`
--

INSERT INTO `accountnoinfo` (`AccountNo`, `BankName`, `Balance`) VALUES
('10', 'ATPCBank', 65422),
('11', 'ATPCBank', 1000009),
('12', 'ATPCBank', 85410),
('13', 'ATPCBank', 574810),
('14', 'ATPCBank', 100000000),
('15', 'ATPCBank', 41),
('16', 'ATPCBank', 200),
('17', 'ATPCBank', 100),
('18', 'ATPCBank', 1200),
('19', 'ATPCBank', 500),
('2', 'ATPCBank', 442360),
('20', 'ATPCBank', 400),
('21', 'ATPCBank', 100),
('22', 'ATPCBank', 300),
('23', 'ATPCBank', 10001),
('24', 'ATPCBank', 523),
('25', 'ATPCBank', 59),
('3', 'ATPCBank', 43526),
('30', 'ATPCBank', 10000),
('4', 'ATPCBank', 55.5),
('5', 'ATPCBank', 463225),
('6', 'ATPCBank', 63262500),
('7', 'ATPCBank', 123456),
('8', 'ATPCBank', 55),
('9', 'ATPCBank', 125478);

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
(1, '5', 'ATPCBank', '11', '2021-10-23 17:17:00', 1),
(2, '5', 'ATPCBank', '11', '2021-10-23 17:24:03', 1),
(3, '25', 'ATPCBank', '11', '2021-10-23 18:12:47', 1);

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
  MODIFY `AccountID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transferhistory`
--
ALTER TABLE `transferhistory`
  MODIFY `TransferID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
