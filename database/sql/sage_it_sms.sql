-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2022 at 01:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sage_it_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_created`
--

CREATE TABLE `api_created` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `api_created`
--

INSERT INTO `api_created` (`id`, `creator_id`, `created_id`, `date`) VALUES
(1, 6, 19, '2022-07-21 22:26:48'),
(2, 6, 20, '2022-07-21 22:27:37'),
(3, 6, 21, '2022-07-21 22:28:54'),
(4, 6, 22, '2022-07-21 22:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sms_credits` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `apikey`, `fullname`, `email`, `business_name`, `phonenumber`, `password`, `sms_credits`, `date`) VALUES
(6, '3206b2-57e667-c4eb29-97c694-f3725d', 'Jesse Anim', 'iamjesse75@gmail.com', 'Testing company', '0268977129', 'password', 0, '2022-07-21 20:29:56'),
(17, '1777a9-4d2236-64241d-a78f90-d155ef', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company', '0268977129', '12@34@56', 0, '2022-07-21 21:36:10'),
(18, 'f4d2bc-967a6c-21c60b-45259b-b488d3', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company3', '0268977129', '12@34@56', 0, '2022-07-21 22:24:07'),
(19, 'ca4965-28bb19-f82a98-4c97b4-69dbdb', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company33', '0268977129', '12@34@56', 0, '2022-07-21 22:26:48'),
(20, '4f2c7f-cfdfe5-d92b84-d11ccf-8c0039', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company333', '0268977129', '12@34@56', 0, '2022-07-21 22:27:37'),
(21, '40814d-c2e983-dc34e1-1d684f-63c605', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company3332', '0268977129', '12@34@56', 0, '2022-07-21 22:28:54'),
(22, '8c9465-557206-dc2107-d0b002-6794d1', 'Jesse Anim', 'animjesse55@gmail.com', 'Testing company1111', '0268977129', '12@34@56', 0, '2022-07-21 22:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `quickSMS`
--

CREATE TABLE `quickSMS` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `recipients` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `senderID_used_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `senderID`
--

CREATE TABLE `senderID` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `client_id` int(11) NOT NULL,
  `sender_id` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `senderID`
--

INSERT INTO `senderID` (`id`, `status`, `client_id`, `sender_id`, `purpose`, `date_created`) VALUES
(28, 0, 6, 'n', 'testing', '2022-07-21 21:36:10'),
(29, 0, 6, 'Boss', 'testing', '2022-07-21 22:06:40'),
(30, 0, 6, 'Boss1', 'testing', '2022-07-21 22:20:08'),
(31, 0, 6, 'Boss12', 'testing', '2022-07-21 22:24:06'),
(32, 0, 6, 'Boss3', 'testing', '2022-07-21 22:26:23'),
(33, 0, 6, 'Boss33', 'testing', '2022-07-21 22:26:47'),
(34, 0, 6, 'Boss333', 'testing', '2022-07-21 22:27:37'),
(35, 0, 6, 'Boss3332', 'testing', '2022-07-21 22:28:53'),
(36, 0, 6, 'Bossb', 'testing', '2022-07-21 22:29:10'),
(37, 0, 6, 'Bossb2', 'testing', '2022-07-21 22:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `sms_logs`
--

CREATE TABLE `sms_logs` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `senderID_used_id` int(11) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_created`
--
ALTER TABLE `api_created`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quickSMS`
--
ALTER TABLE `quickSMS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senderID`
--
ALTER TABLE `senderID`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_logs`
--
ALTER TABLE `sms_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_created`
--
ALTER TABLE `api_created`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quickSMS`
--
ALTER TABLE `quickSMS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `senderID`
--
ALTER TABLE `senderID`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
