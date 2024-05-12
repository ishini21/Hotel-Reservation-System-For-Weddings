-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 11, 2023 at 04:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventmanager`
--

CREATE TABLE `eventmanager` (
  `R_id` int(11) DEFAULT NULL,
  `Package_id` varchar(5) DEFAULT NULL,
  `Decoration` varchar(50) DEFAULT NULL,
  `Entertainment` varchar(50) DEFAULT NULL,
  `E_id` int(11) DEFAULT NULL,
  `Guests` int(11) DEFAULT NULL,
  `Foods` varchar(50) DEFAULT NULL,
  `Drinks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `NIC` varchar(12) NOT NULL,
  `first_Name` varchar(50) DEFAULT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Postal_code` varchar(10) DEFAULT NULL,
  `House_No` varchar(10) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Contact_Details` varchar(15) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `R_id` int(11) DEFAULT NULL,
  `NiC` varchar(12) DEFAULT NULL,
  `Package_id` varchar(5) DEFAULT NULL,
  `Package_price` decimal(10,2) DEFAULT NULL,
  `Package_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registereduser`
--

CREATE TABLE `registereduser` (
  `R_id` int(11) NOT NULL,
  `NC` varchar(12) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Inquiry_type` varchar(25) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`Id`, `Username`, `Inquiry_type`, `Message`) VALUES
(1, 'Kasun@gmail.com', 'Technical issues', 'Fail to access the packages.'),
(2, 'Bhagya@gmail.com', 'Login inquiry', 'Given password is not valid.'),
(3, 'Sithum@gmail.com', 'Payment issues', 'Discounts haven\'t been added to the payment.');

-- --------------------------------------------------------

--
-- Table structure for table `supporttable`
--

CREATE TABLE `supporttable` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Inquery_type` varchar(25) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supporttable`
--

INSERT INTO `supporttable` (`Id`, `Username`, `Inquery_type`, `Message`) VALUES
(1, 'Kasun@gmail.com', 'Technical issues', 'Fail to access the packages page.'),
(2, 'Bhagya@gmail.com', 'Payment issues', 'Discounts haven\'t been added to the payment.'),
(3, 'Sithum@gmail.com', 'Login inquiry', 'Resend the login password. '),
(4, 'Maduka123@gmail.com', 'Contact an agent', 'To get some details on hotel and the location.'),
(5, 'Vihanga@gmail.com', 'Login inquiry', 'Can\'t login using the given username and password.'),
(6, 'Dimantha@gmail.com', 'Contact an agent', 'To make an appointment to visit to the hotel.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventmanager`
--
ALTER TABLE `eventmanager`
  ADD KEY `FK_EventManager_RegisteredUser` (`R_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD KEY `FK_Packages_RegisteredUser` (`R_id`);

--
-- Indexes for table `registereduser`
--
ALTER TABLE `registereduser`
  ADD PRIMARY KEY (`R_id`);

--
-- Indexes for table `supporttable`
--
ALTER TABLE `supporttable`
  ADD UNIQUE KEY `Id` (`Id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventmanager`
--
ALTER TABLE `eventmanager`
  ADD CONSTRAINT `FK_EventManager_RegisteredUser` FOREIGN KEY (`R_id`) REFERENCES `registereduser` (`R_id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `FK_Packages_RegisteredUser` FOREIGN KEY (`R_id`) REFERENCES `registereduser` (`R_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
