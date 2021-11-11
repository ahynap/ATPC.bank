-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 06:31 PM
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
  `Token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AccountID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Email`, `Password`, `Token`, `Name`, `SurName`, `Phone`, `AccountID`) VALUES
('sompongsu@gmail.com', 'su', NULL, 'Sompong', 'Yoosongka', '0881234590', 7),
('jieun16160@gmail.com', 'jieunmay', NULL, 'Jieun', 'Maysa', '0897654321', 9);

-- --------------------------------------------------------

--
-- Table structure for table `accountno`
--

CREATE TABLE `accountno` (
  `AccountType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `AccountID` int(20) NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MainAccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountno`
--

INSERT INTO `accountno` (`AccountType`, `AccountNo`, `BranchName`, `AccountID`, `DayTime`, `MainAccount`) VALUES
('Fixed Deposites', '22', 'KMUTT', 9, '2021-11-11 16:03:12', NULL),
('Fixed Deposites', '6207050046', 'CU', 7, '2021-10-29 14:57:11', NULL),
('Savings', '6207051212', ' KMUTT', 7, '2021-10-29 14:24:34', 'Main Account'),
('Savings', '9', 'KMUTT', 9, '2021-11-11 15:56:57', 'Main Account');

-- --------------------------------------------------------

--
-- Table structure for table `accountnoinfo`
--

CREATE TABLE `accountnoinfo` (
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `BankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accountnoinfo`
--

INSERT INTO `accountnoinfo` (`AccountNo`, `Name`, `SurName`, `BankName`, `Balance`) VALUES
('1', 'gade', 'zuza', 'ATPCBank', 485),
('10', 'Sam', 'Son', 'ATPCBank', 333),
('11', 'a', 'b', 'ATPCBank', 555),
('12', 'ohh', 'tehh', 'ATPCBank', 111),
('15', 'w', 'e', 'ATPCBank', 222),
('16', 'r', 't', 'ATPCBank', 444),
('17', 'y', 'u', 'ATPCBank', 666),
('18', 'ohh', 'p', 'ATPCBank', 888),
('2', 'oh', 'teh', 'ATPCBank', 43705),
('20', 'Jieun', 'May', 'KMUTT', 555555),
('22', 'Jieun', 'May', 'KMUTT', 888987),
('3', 'oh', 'teh', 'ATPCBank', 546),
('4', 'fe', 'ng', 'ATPCBank', 45),
('6207050046', 'Sompong', 'Yoosongka', 'ATPCBank', 50095),
('6207051212', 'Sompong', 'Yoosongka', 'ATPCBank', 9714),
('9', 'Jieun', 'May', 'ATPCBank', 999900);

-- --------------------------------------------------------

--
-- Table structure for table `reporthistory`
--

CREATE TABLE `reporthistory` (
  `ReportID` int(20) NOT NULL,
  `StaffID` int(20) NOT NULL,
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reporthistory`
--

INSERT INTO `reporthistory` (`ReportID`, `StaffID`, `AccountNo`, `DayTime`) VALUES
(1, 1, '22', '2021-11-11 16:16:15'),
(2, 1, '9', '2021-11-11 16:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `staffaccount`
--

CREATE TABLE `staffaccount` (
  `StaffID` int(20) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffaccount`
--

INSERT INTO `staffaccount` (`StaffID`, `Name`, `SurName`, `Email`, `Password`, `Token`) VALUES
(1, 'Chatchanok', 'Vitoondej', 'staff1010.atpc@gmail.com', 'st', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `StaffID` int(20) NOT NULL,
  `BranchName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SurName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffinfo`
--

INSERT INTO `staffinfo` (`StaffID`, `BranchName`, `Name`, `SurName`) VALUES
(1, 'Bangkok', 'Chatchanok', 'Vitoondej'),
(2, 'Korat', 'Thanapromporn', 'Punturux'),
(3, 'Rayong', 'Phunparporn', 'Amnauymucha'),
(4, 'Supanburi', 'Anchira', 'Paengsai'),
(5, 'KMITL', 'somsri', 'soodsauy');

-- --------------------------------------------------------

--
-- Table structure for table `transferhistory`
--

CREATE TABLE `transferhistory` (
  `TransferID` int(20) NOT NULL,
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BankName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DestinationAccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transferhistory`
--

INSERT INTO `transferhistory` (`TransferID`, `AccountNo`, `BankName`, `DestinationAccountNo`, `DayTime`, `Amount`) VALUES
(14, '6207051212', 'ATPCBank', '6207050046', '2021-10-29 15:31:23', 95),
(15, '6207051212', 'ATPCBank', '1', '2021-11-09 13:52:58', 5),
(16, '6207051212', 'ATPCBank', '2', '2021-11-09 14:12:22', 90),
(17, '6207051212', 'ATPCBank', '2', '2021-11-09 14:15:50', 90),
(18, '6207051212', 'ATPCBank', '2', '2021-11-09 16:01:31', 6),
(19, '9', 'ATPCBank', '22', '2021-11-11 16:06:34', 9),
(20, '9', 'ATPCBank', '22', '2021-11-11 16:10:39', 90);

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
-- Indexes for table `reporthistory`
--
ALTER TABLE `reporthistory`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `ss` (`StaffID`);

--
-- Indexes for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
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
  MODIFY `AccountID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reporthistory`
--
ALTER TABLE `reporthistory`
  MODIFY `ReportID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `StaffID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transferhistory`
--
ALTER TABLE `transferhistory`
  MODIFY `TransferID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `reporthistory`
--
ALTER TABLE `reporthistory`
  ADD CONSTRAINT `ss` FOREIGN KEY (`StaffID`) REFERENCES `staffaccount` (`StaffID`);

--
-- Constraints for table `staffaccount`
--
ALTER TABLE `staffaccount`
  ADD CONSTRAINT `fk_StaffID` FOREIGN KEY (`StaffID`) REFERENCES `staffinfo` (`StaffID`);

--
-- Constraints for table `transferhistory`
--
ALTER TABLE `transferhistory`
  ADD CONSTRAINT `fk_AcNo` FOREIGN KEY (`AccountNo`) REFERENCES `accountnoinfo` (`AccountNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
