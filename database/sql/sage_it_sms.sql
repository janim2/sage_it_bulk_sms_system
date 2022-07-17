-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2022 at 08:49 PM
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
(1, 'e1b48370-09dc-419a-98fa-5d273d53149b', 'Jesse Anim', 'iamjesse75@gmail.com', 'Ghana', '0268977129', 'password', 0, '2022-07-17 14:45:45'),
(2, 'bb6b52-b291ab-6df935-ca0c27-ceb219', 'Jesse Anim', 'animjesse55@gmail.com', 'Ghana', '0268977129', 'password', 0, '2022-07-17 18:48:31');

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

--
-- Dumping data for table `quickSMS`
--

INSERT INTO `quickSMS` (`id`, `client_id`, `recipients`, `message`, `senderID_used_id`, `date`) VALUES
(61, 1, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace.\r\nGenerate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, and discover plugins for your favorite writing, design and blogging tools. Explore the origins, history and meaning of the famous passage, and learn how Lorem Ipsum went from scrambled Latin passage to ubiqitous ...', 5, '2022-07-16 17:37:10'),
(62, 1, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. ', 5, '2022-07-16 17:37:54'),
(63, 1, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly.', 5, '2022-07-16 17:38:28');

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
(4, 1, 1, 'DaChurchMan', 'For DachurchMan', '2022-06-02 22:34:52'),
(5, 1, 1, 'SageIT', 'for sageIt services', '2022-06-03 12:50:35'),
(7, 0, 1, 'Jesse3', 'For testing', '2022-07-16 14:46:57'),
(9, 0, 1, 'Ben', 'For testing', '2022-07-16 16:24:03'),
(10, 0, 1, 'Jesse', 'Unknown', '2022-07-17 13:50:39'),
(11, 0, 1, 'Boss', 'password', '2022-07-17 13:58:59');

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
-- Dumping data for table `sms_logs`
--

INSERT INTO `sms_logs` (`id`, `client_id`, `senderID_used_id`, `recipient`, `message`, `date`) VALUES
(21, 1, 5, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace.\r\nGenerate Lorem Ipsum placeholder text for use in your graphic, print and web layouts, and discover plugins for your favorite writing, design and blogging tools. Explore the origins, history and meaning of the famous passage, and learn how Lorem Ipsum went from scrambled Latin passage to ubiqitous ...', '2022-07-16 17:37:11'),
(22, 1, 5, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. ', '2022-07-16 17:37:54'),
(23, 1, 5, '0268977129', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly.', '2022-07-16 17:38:28'),
(24, 1, 5, '0268977129', 'Testing', '2022-07-17 12:37:08'),
(25, 1, 5, '0268977129', 'Testing', '2022-07-17 12:42:18'),
(26, 1, 5, '0268977129', 'Testing', '2022-07-17 12:44:45'),
(27, 1, 5, '0268977129', 'Testing', '2022-07-17 12:47:09'),
(28, 1, 5, '0268977129', 'Testing the API', '2022-07-17 14:45:45');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quickSMS`
--
ALTER TABLE `quickSMS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `senderID`
--
ALTER TABLE `senderID`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sms_logs`
--
ALTER TABLE `sms_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
