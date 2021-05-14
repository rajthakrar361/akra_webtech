-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2021 at 12:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akra`
--

-- --------------------------------------------------------

--
-- Table structure for table `aefi`
--

CREATE TABLE `aefi` (
  `name` varchar(50) NOT NULL,
  `gender` enum('m','f','0') NOT NULL,
  `birth_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `age` int(2) NOT NULL,
  `age_group` varchar(10) NOT NULL,
  `vaccination_date` timestamp NULL DEFAULT NULL,
  `aadhar_number` bigint(12) NOT NULL,
  `contact_1` bigint(10) NOT NULL,
  `contact_2` bigint(10) DEFAULT NULL,
  `address` text NOT NULL,
  `symptoms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aefi`
--

INSERT INTO `aefi` (`name`, `gender`, `birth_date`, `age`, `age_group`, `vaccination_date`, `aadhar_number`, `contact_1`, `contact_2`, `address`, `symptoms`) VALUES
('Raj Thakrar', 'm', '2001-06-02 18:30:00', 19, '18-45', '2021-04-30 18:30:00', 122312231223, 8780904975, NULL, 'jalaram-krupa, aksharpark-1,rajkot', 'cough, fever, headache and red eyes'),
('Megha Kumari', 'f', '1999-09-08 18:30:00', 21, '18-45', '2021-05-04 18:30:00', 123456789012, 8780904975, NULL, 'H-101, kala residency', 'cough, fever, headache and red eyes');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_center`
--

CREATE TABLE `vaccination_center` (
  `vac_administrator_id` int(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `order_quantity` int(11) NOT NULL DEFAULT '0',
  `stock_available` int(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `daily_capacity` int(10) DEFAULT NULL,
  `address` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccination_center`
--

INSERT INTO `vaccination_center` (`vac_administrator_id`, `name`, `order_quantity`, `stock_available`, `email`, `daily_capacity`, `address`, `created`) VALUES
(9, 'Ramakant Hospital', 1200000, 20000, 'ramakant@gmail.com', 1200, 'kotak road, mumbai', '2021-05-14 11:55:27'),
(10, 'Sterling Hospital', 100000, 300000, 'sterling.mumbai1@gmail.com', 550, 'sterling hospital, kala road, mumbai', '2021-05-14 11:58:06'),
(11, 'apollo hospital, rajkot', 100000, 30000, 'apollo.rajkot1@gmail.com', 1200, 'raiya-chowk, rajkot', '2021-05-14 11:59:13'),
(12, 'Ambuja hospital', 100000, 10000, 'ambuja@hotmail.com', 5000, 'ambuja-nagar, ahmedabad', '2021-05-14 12:00:15'),
(13, 'Rajkumari public school', 1000, 1000, 'rajkumari.schools2@gmail.com', 80, 'rajkumari school, ahmednagar, chennai', '2021-05-14 12:01:23'),
(14, 'Apta Public Center', 100000, 10000, 'apta.email@yahoo.com', 100, 'apta institution, mumbai', '2021-05-14 12:15:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aefi`
--
ALTER TABLE `aefi`
  ADD PRIMARY KEY (`aadhar_number`),
  ADD UNIQUE KEY `aadhar` (`aadhar_number`);

--
-- Indexes for table `vaccination_center`
--
ALTER TABLE `vaccination_center`
  ADD PRIMARY KEY (`vac_administrator_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vaccination_center`
--
ALTER TABLE `vaccination_center`
  MODIFY `vac_administrator_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
