-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 03:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservations`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NIC` varchar(50) NOT NULL,
  `Package` varchar(150) NOT NULL,
  `PhoneNumber` bigint(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `FirstName`, `LastName`, `Email`, `NIC`, `Package`, `PhoneNumber`, `date`) VALUES
(1, 'sayuni', 'Mihara', 'sayuni@gmail.com', '200156234213', 'WALEEMA PACKAGE(P3850)', 771425836, '2023-10-20'),
(2, 'Sanuka', 'Ekanayaka', 'sanuka@gmail.com', '920136237817', 'HERITAGE EXPERIENCE(P2390)', 752415963, '2023-09-15'),
(3, 'Sanudi', 'Perera', 'sanudi@gmail.com', '200045625698', 'IMPERIAL EXPERIENCE(P2050)', 752415963, '2023-09-15'),
(4, 'Randi', 'Jayathilaka', 'randi@gmail.com', '974525801465', 'HERITAGE EXPERIENCE(P2390)', 715648975, '2023-08-19'),
(5, 'Kusal', 'Perera', 'kusal@gmail.com', '974525801465', 'WALEEMA PACKAGE(P3850)', 715648975, '2023-08-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
