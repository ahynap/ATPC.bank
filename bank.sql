-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 03:12 PM
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
('jieun16160@gmail.com', 'gggggg', NULL, 'jieun', 'may', '060000005', 8);

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
('234588', 'Fixed Deposites', '6207050046', 'CU', 7, '2021-10-29 14:57:11', NULL),
('001122', 'Savings', '6207051212', ' KMUTT', 7, '2021-10-29 14:24:34', 'Main Account');

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
('1', 'gade', 'zuza', 'ATPCBank', 485),
('2', 'oh', 'teh', 'ATPCBank', 43705),
('3', 'oh', 'teh', 'ATPCBank', 546),
('4', 'fe', 'ng', 'ATPCBank', 45),
('6207050046', 'Sompong', 'Yoosongka', 'ATPCBank', 50095),
('6207051212', 'Sompong', 'Yoosongka', 'ATPCBank', 9714);

-- --------------------------------------------------------

--
-- Table structure for table `reporthistory`
--

CREATE TABLE `reporthistory` (
  `StaffID` int(20) NOT NULL,
  `AccountNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DayTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reporthistory`
--

INSERT INTO `reporthistory` (`StaffID`, `AccountNo`, `DayTime`) VALUES
(5, '6207051212', '2021-10-29 17:57:37');

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
(4, 'Chatchanok', 'Vitoondej', 'staff1010.atpc@gmail.com', 'yha', NULL),
(5, 'somsri', 'soodsauy', 'somsri@gmail.com', 'soodsauy89', NULL);

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
(14, '6207051212', 'ATPCBank', '6207050046', '2021-10-29 15:31:23', 95),
(15, '6207051212', 'ATPCBank', '1', '2021-11-09 13:52:58', 5),
(16, '6207051212', 'ATPCBank', '2', '2021-11-09 14:12:22', 90),
(17, '6207051212', 'ATPCBank', '2', '2021-11-09 14:15:50', 90),
(18, '6207051212', 'ATPCBank', '2', '2021-11-09 16:01:31', 6);

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
  ADD PRIMARY KEY (`StaffID`);

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
  MODIFY `AccountID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `StaffID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transferhistory`
--
ALTER TABLE `transferhistory`
  MODIFY `TransferID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `fk_StaffID2` FOREIGN KEY (`StaffID`) REFERENCES `staffaccount` (`StaffID`);

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
