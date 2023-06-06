-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 01:51 PM
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
-- Database: `saarthi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_id` varchar(100) NOT NULL,
  `bank_name` varchar(400) NOT NULL,
  `bank_account_no` int(225) NOT NULL,
  `bank_ifsc_code` varchar(400) NOT NULL,
  `bank_account_holder` varchar(200) NOT NULL,
  `ngo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `bank_name`, `bank_account_no`, `bank_ifsc_code`, `bank_account_holder`, `ngo_id`) VALUES
('acc_KGYmPSnx6WPJTW', 'Bank OF Maharashtra', 455454, 'HDFC0CAGSBK', 'saarthi', 952461247);

-- --------------------------------------------------------

--
-- Table structure for table `campain`
--

CREATE TABLE `campain` (
  `campain_id` int(10) NOT NULL,
  `campain_title` varchar(500) NOT NULL,
  `campain_description` varchar(500) NOT NULL,
  `campain_amount` int(20) NOT NULL,
  `camapin_start_date` varchar(200) NOT NULL,
  `campain_end_date` varchar(200) NOT NULL,
  `campain_beneficiary_name` varchar(400) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `account_id` int(10) NOT NULL,
  `campain_image` varchar(200) NOT NULL,
  `campain_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campain`
--

INSERT INTO `campain` (`campain_id`, `campain_title`, `campain_description`, `campain_amount`, `camapin_start_date`, `campain_end_date`, `campain_beneficiary_name`, `ngo_id`, `account_id`, `campain_image`, `campain_status`) VALUES
(18858, 'cjsdcbs', 'jcsdndsncds cds ckdsoc dskp copdspc kdspcpdsop\r\n          ', 4000, '2022-09-12', '2022-08-29', 'kishor', 952461247, 123456, 'Profile20220910631c23679bcf9.png', 'stoped'),
(27311, 'cancer patient', 'need money to collect treat cancer surgery\r\n                                ', 50000, '2022-09-22', '2022-09-30', 'neha kore', 952461247, 123456, 'Profile20220920632a1404a35fc.jpg', 'active'),
(29091, 'cdshciusdh', 'jniknekdnwejndjkwenkdnwndwenkjdnkjwnedkjnwekdnkwendkjnweknjkwnedknwekndknwekdnwekndkwnekjdnkwenejndkwendjkwnekjdnwejkndkwndwednkwejjkw\r\n                                ', 788, '2022-09-14', '2022-09-20', 'iohihuhui', 952461247, 123456, 'Profile20220910631bf240b5197.jpg', 'stoped'),
(48352, 'blood donation', 'ngo strugling for bllods\r\n                                ', 50000, '2022-09-20', '2022-09-23', 'kishor', 952461247, 123456, 'Profile2022092063293d7d49350.jpg', 'active'),
(48442, 'food donation', 'need fund  to  feed  200 hfhh hfnn fhhh fhfjf  fjh\r\n                                ', 5000, '2022-09-22', '2022-09-24', 'maharashtra', 952461280, 123456, 'Profile20220921632ac1f892ac7.jpg', 'active'),
(58604, 'Tree plantation', 'we need to plant 100000 trees in maharashtra to  treate globle worming its our duty to protect our earth\r\n\r\n                                ', 50000, '2022-09-22', '2022-09-24', 'maharashtra', 952461278, 123456, 'Profile20220920632a1b1c2c90c.jpg', ''),
(85848, 'cancer Patient', 'When you have been diagnosed with cancer, you are considered a cancer survivor from that moment throughout the rest of your life.\r\n                                ', 5000, '2022-09-21', '2022-09-30', 'amol shelke', 952461247, 123456, 'Profile2022092063297e200594e.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(20) NOT NULL,
  `donor_name` varchar(200) NOT NULL,
  `donor_email` varchar(200) NOT NULL,
  `donor_mobile` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `donation_discription` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `donated` varchar(200) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `donor_name`, `donor_email`, `donor_mobile`, `date`, `ngo_id`, `donation_discription`, `status`, `donated`, `userId`) VALUES
(12692, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-20', 952461247, 'I want to donate 500 trees to your ngo', 'Send', 'trees', 456470),
(48650, ' neha kore', 'nehakore@gmail.com', '9763739992', '2022-09-21', 952461278, 'i  want to donate 500 meals', 'Send', 'food', 456474),
(48904, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-20', 952461279, 'test test test test test test', 'Send', 'pedigress', 456473),
(71479, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-21', 952461280, '200 books for student', 'Send', 'books', 456474),
(96903, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-19', 952461278, 'dscds sdcdcjksdc sdckjds csdkncds cdsk ', 'Send', 'food', 1001),
(4655645, 'pankaj karsode', 'pankaj@gmail.com', '7030601460', '20/10/200', 952461247, 'i has some old books to donate', 'pending', 'food', 1001),
(65456465, 'videsh batole', 'videsh@gmail.com', '7709289203', '12/12/2022', 952461247, ' i had some food to donate', 'receved', 'books', 1001),
(99148828, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-19', 952461278, '', 'Send', 'food', 1001),
(1157757106, ' videsh batole', 'videshbatole1999@gmail.com', '7709289203', '2022-09-19', 952461247, 'cas kadasd asdklsad asdkas;ldasdsakdasdas;dkas ', 'Send', 'food', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` varchar(100) NOT NULL,
  `event_time` varchar(100) NOT NULL,
  `event_image` varchar(100) NOT NULL,
  `event_description` mediumtext NOT NULL,
  `event_status` varchar(200) NOT NULL,
  `ngo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_start_date`, `event_end_date`, `event_time`, `event_image`, `event_description`, `event_status`, `ngo_id`) VALUES
(39001, 'tree plantation', '2022-09-21', '2022-09-24', '16:00', 'Profile20220920632986f58b56f.jpg', 'we have to plant 200 trees \r\n                                ', 'active', 952461247),
(50417, 'blood donation camp', '2022-09-21', '2022-09-23', '02:00', 'Profile2022092063297fb91d6f0.jpg', 'due to covid we are facing huge blood dsjcksd cjslkdcs \r\n                                ', 'active', 952461247),
(74188, 'tree plantation', '2022-09-22', '2022-09-24', '08:00', 'Profile20220920632a1b828382c.jpg', 'need to protect our earth from golble worming its our duety to protect out nature\r\n                                ', 'stoped', 952461278);

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

CREATE TABLE `event_registration` (
  `registratin_id` int(50) NOT NULL,
  `registration_name` varchar(200) NOT NULL,
  `registration_email` varchar(200) NOT NULL,
  `registration_mobile` varchar(200) NOT NULL,
  `event_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_registration`
--

INSERT INTO `event_registration` (`registratin_id`, `registration_name`, `registration_email`, `registration_mobile`, `event_id`, `userId`) VALUES
(1, 'videsh batole', 'videsh@gmail.com', '7030601416', 71077, 1001),
(123321, 'videsh batole', 'videsh@gmail.com', '7709289203', 99338, 1001),
(654465, 'kishor jangam', 'kishor@gmail.com', '7030601416', 99338, 1001),
(654466, 'sakshi mhaske', 'sakshi@gmail.com', '7030601416', 86657, 1001),
(654467, 'amol shelke', 'Amol@gmail.com', '9763739992', 86657, 1001),
(654468, 'nikita pawar', 'nikita@gmail.com', '7030601416', 86657, 1001),
(654469, 'jui shinde', 'jui@gmail.com', '7030601416', 86657, 1001),
(654470, 'shubham Adagale', 'shubham@gmail.com', '9763739992', 86657, 1001),
(654471, 'kashmira Pawar', 'kashmira@gmail.com', '7030601416', 86657, 1001),
(654472, 'nilima pawar', 'nilima@gmail.com', '7030601416', 86657, 1001),
(654473, 'videsh batole', 'videshbatole1999@gmail.com', '7709289203', 71077, 1001),
(654474, 'shubham adagle', 'shubham@gmail.com', '707070707070', 86657, 1001),
(654475, 'kishor jangam', 'kishor@gmail.com', '7030601416', 71077, 1001),
(654476, 'videsh batole', 'videshbatole1999@gmail.com', '7709289203', 50417, 1001),
(654477, 'videsh batole', 'videshbatole1999@gmail.com', '07709289203', 39001, 456470),
(654478, 'neha kore ', 'nehakore@gmail.com', '8787878787', 39001, 456474),
(654479, 'videsh batole', 'videshbatole1999@gmail.com', '7709289203', 63218, 456474);

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `ngo_id` int(10) NOT NULL,
  `ngo_name` varchar(50) NOT NULL,
  `ngo_registration_no` varchar(50) NOT NULL,
  `ngo_pan_no` varchar(20) NOT NULL,
  `establish_date` varchar(20) NOT NULL,
  `ngo_contact_no` varchar(10) NOT NULL,
  `ngo_email` varchar(30) NOT NULL,
  `setlor_first_name` varchar(60) NOT NULL,
  `setlor_last_name` varchar(50) NOT NULL,
  `setlor_gender` varchar(20) NOT NULL,
  `setlor_mobile_no` varchar(10) NOT NULL,
  `setlor_email` varchar(50) NOT NULL,
  `ngo_address` varchar(60) NOT NULL,
  `ngo_country` varchar(100) NOT NULL,
  `ngo_state` varchar(100) NOT NULL,
  `ngo_city` varchar(100) NOT NULL,
  `ngo_pincode` varchar(10) NOT NULL,
  `working_sector` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`ngo_id`, `ngo_name`, `ngo_registration_no`, `ngo_pan_no`, `establish_date`, `ngo_contact_no`, `ngo_email`, `setlor_first_name`, `setlor_last_name`, `setlor_gender`, `setlor_mobile_no`, `setlor_email`, `ngo_address`, `ngo_country`, `ngo_state`, `ngo_city`, `ngo_pincode`, `working_sector`, `password`, `profile_image`) VALUES
(952461247, 'saarthi help', 'MH15FF25', 'EVJPB2881J', '2022-09-05', '7709289205', 'videshbatole@gmail.com', 'kishor', 'batole', 'Female', '9763739992', 'setlor@email.comff', 'ngo address', 'China', 'Hebei', 'Hengshui', '411021', 'rescue', 'saarthi@123', 'Profile2022092063298732b1606.png'),
(952461278, 'Need You', 'VVFD54545', 'EVJPB2881J', ' 05-09-22', '7709289203', 'Saarthi@support.com', 'yogita', 'shinde', 'Female', '7030601416', 'videsh@setlor.com', 'sr no 23 pashan', 'India', 'Maharashtra', 'Pune', '411021', 'healthcare ', 'Videsh@123', 'Profile20220920632a19cc6f56c.png'),
(952461279, 'Resque heros', 'REGMH4125', 'EVJPB2881J', ' 13-06-22', '7030601416', 'Resque.support@gmail.com', 'shubham', 'adagle', 'Male', '7730601416', 'shubham@gmail.com', 'floor no 2 office no 14', 'India', 'Maharashtra', 'Pune', '411005', 'education', 'Resque@123', 'detault.png'),
(952461280, 'udan ', 'MJBJSD54', 'EVJPB2881J', ' 05-09-22', '9898989898', 'udan@gmsail.com', 'videsh', 'batole', 'Male', '7709289203', 'videshbatole1999@gmail.com', '29/1', 'India', 'Maharashtra', 'Ambajogai', '411005', 'education ', 'Udan@1234', 'Profile20220921632ac3a8e7d6a.png');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(10) NOT NULL,
  `beneficiary_first_name` varchar(200) NOT NULL,
  `beneficiary_last_name` varchar(200) NOT NULL,
  `beneficiary_email` varchar(200) NOT NULL,
  `beneficiary_mobile` varchar(200) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `beneficiary_image` varchar(200) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `date` date NOT NULL,
  `beneficiary_country` varchar(200) NOT NULL,
  `beneficiary_city` varchar(200) NOT NULL,
  `beneficiary_state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `beneficiary_first_name`, `beneficiary_last_name`, `beneficiary_email`, `beneficiary_mobile`, `Issue`, `status`, `beneficiary_image`, `ngo_id`, `userId`, `date`, `beneficiary_country`, `beneficiary_city`, `beneficiary_state`) VALUES
(54558, 'videsh', 'batole', 'videshbatole1999@gmail.com', '7709289203', 'wekljflwef efwefkwhenfwe fkwehnfwe fkwefwe fwefwef e', 'Accepted', 'Profile20220920632a050fd1413.jpg', 952461247, 1001, '2022-09-20', 'India', 'Amalner', 'Maharashtra'),
(54559, 'videsh', 'batole', 'videshbatole1999@gmail.com', '7709289203', 'cjsdkl fsdhfjksnfsd fsdkfnsdknf sdfsdnfs dfsdfsdfsd fsdf sdk', 'Created', 'Profile20220920632a06248926f.jpg', 952461247, 1001, '2022-09-20', 'India', '', 'Maharashtra'),
(54560, 'videsh', 'batole', 'videshbatole1999@gmail.com', '7709289203', 'i have a place to plant trees but i dont have trees', 'Accepted', 'Profile20220920632a1d4f91b3e.jpg', 952461278, 456470, '2022-09-20', 'India', 'Pune', 'Maharashtra'),
(54563, 'videsh', 'batole', 'videshbatole1999@gmail.com', '7709289203', 'jdsknkjcns kfnsd fds,nf dsmfds fkjjdsnfm dsfkjbds fdsmfsd f dsbfsd m', 'Created', 'Profile20220921632ac440a5c60.jpg', 952461279, 456474, '2022-09-21', 'India', 'Alore', 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `ngo_id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `campain_id` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `ngo_id`, `userId`, `Amount`, `type`, `status`, `campain_id`, `date`) VALUES
(18858, 952461247, 1001, '500', 'cash', 'success', 18858, '2022-09-19'),
(65654, 952461247, 1001, '2000', 'cash', 'success', 18858, '2022-09-19'),
(65657, 952461247, 1001, '900', 'CASH', 'Success', 29091, '2022-09-19'),
(65658, 952461247, 1001, '800', 'CASH', 'Success', 18858, '2022-09-19'),
(65659, 952461247, 1001, '700', 'CASH', 'Success', 18858, '2022-09-19'),
(65660, 952461247, 1001, '800', 'CASH', 'Success', 18858, '2022-09-19'),
(65662, 952461247, 1001, '100', 'CASH', 'Success', 85848, '2022-09-20'),
(65663, 952461247, 1001, '7000', 'CASH', 'Success', 85848, '2022-09-20'),
(65664, 952461247, 1001, '7000', 'CASH', 'Success', 27311, '2022-09-20'),
(65665, 952461247, 456470, '5000', 'CASH', 'Success', 27311, '2022-09-20'),
(65666, 952461247, 456473, '1000', 'CASH', 'Success', 48352, '2022-09-20'),
(65667, 952461247, 456474, '700', 'CASH', 'Success', 27311, '2022-09-21'),
(65668, 952461280, 456474, '500', 'CASH', 'Success', 48442, '2022-09-21'),
(65669, 952461280, 456474, '5000', 'CASH', 'Success', 48442, '2022-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `profile_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `mobileNo`, `email`, `gender`, `pincode`, `address`, `country`, `city`, `state`, `password`, `dob`, `profile_image`) VALUES
(1001, 'videsh', 'batole', '7709289203', 'videshbatole@gmail.com', 'Male', '411021', '21/9 shivaji ', 'India', 'Pune', 'Maharashtra', 'pass', '2022-09-12', 'Profile2022091963282a9e4f6a5.jpg'),
(456456, 'videsh', 'batole', '7709289203', 'videshbatole1999@gmail.com', 'male', '411021', 'djhaisadsad sad', '', 'pun', 'maharashtra', 'pass', '1999-02-19', ''),
(456457, 'kishor', 'jangam', '7030601416', 'kishor@gmail.com', 'Male', '411005', 'shivaji nagar', 'India', 'Pune', 'Maharashtra', 'kishor@123', '0000-00-00', ''),
(456458, 'jhjjhjh', 'guyguyu', '7709289203', 'videsh@gmail.com', 'Male', '411021', 'vfjhfbhjvb', 'Austria', 'Klagenfurt', 'Karnten', 'Kishor@123', '0000-00-00', ''),
(456459, 'knkn', 'jshcds', '7709289203', 'videshbatole1999@gmail.com', 'Male', '411021', 'vdjkfbvfdbvkfn ld', 'American Samoa', 'Alao', 'Eastern', 'Videsh@123', '0000-00-00', ''),
(456460, 'videsh', 'batole', '7709289200', 'videshbhatole1999@gmail.com', 'Male', '411005', '29/1', 'India', 'Pune', 'Maharashtra', 'Kashmira@1999', '0000-00-00', ''),
(456470, 'nikita', 'pawar', '9763952369', 'nikita@gmail.com', 'Male', '411005', '29/1', 'India', 'Nildoh', 'Maharashtra', 'Nikita@123', '2006-09-22', 'Profile20220920632a1cbcb9b30.jpg'),
(456471, 'shubham', 'adagle', '7878787887', 'shubham@gmail.com', 'Male', '411005', '29/1', 'India', 'Ambad', 'Maharashtra', 'Pune@123', '2006-09-22', 'detault.png'),
(456473, 'niraj', 'barudwale', '8888507874', 'niraj@gmail.com', 'Male', '411021', 'sr no 123 ', 'India', 'Nashik', 'Maharashtra', 'Niraj@123', '2004-07-22', 'Profile20220920632a21a7ed441.jpg'),
(456474, 'neha', 'kore', '8989898989', 'nehakore@gmail.com', 'Female', '411021', 'shivaji nagar pune', 'India', 'Pune', 'Maharashtra', 'Neha@123', '2008-09-22', 'Profile20220921632abeb480d92.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `ngo_id` (`ngo_id`);

--
-- Indexes for table `campain`
--
ALTER TABLE `campain`
  ADD PRIMARY KEY (`campain_id`),
  ADD KEY `ngo_id` (`ngo_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`),
  ADD KEY `ngo_id` (`ngo_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `ngo_id` (`ngo_id`);

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`registratin_id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`ngo_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `ngo_id` (`ngo_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_ibfk_1` (`campain_id`),
  ADD KEY `transaction_ibfk_2` (`ngo_id`),
  ADD KEY `transaction_ibfk_3` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1157757107;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `registratin_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=654480;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `ngo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=952461281;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54564;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65670;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456475;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`) ON DELETE CASCADE;

--
-- Constraints for table `campain`
--
ALTER TABLE `campain`
  ADD CONSTRAINT `campain_ibfk_1` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `ngo_id` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`),
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`campain_id`) REFERENCES `campain` (`campain_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ngo_id`) REFERENCES `ngo` (`ngo_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
