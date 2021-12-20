-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2021 at 06:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `admin_id`, `pass`) VALUES
(1, 'suvankar', 55889, '12345'),
(2, 'Mr. Ghosh', 558890, '0123');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `time` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`time`, `admin_id`, `datetime`) VALUES
(33, 558890, '17-12-2021 11:02:29 am'),
(34, 558890, '17-12-2021 11:15:21 am'),
(35, 558890, '19-12-2021 15:50:11 pm');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `holder` varchar(50) NOT NULL,
  `cvv` int(4) NOT NULL,
  `expire` varchar(60) NOT NULL,
  `bankname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cardno` varchar(30) NOT NULL,
  `holder` varchar(40) NOT NULL,
  `cvv` int(4) NOT NULL,
  `expire` varchar(40) NOT NULL,
  `bankname` varchar(60) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `debit`
--

INSERT INTO `debit` (`id`, `phone`, `cardno`, `holder`, `cvv`, `expire`, `bankname`, `pin`) VALUES
(12, '9007414136', '8926427402930493', 'Shovan Ghosh', 667, '2021-11-07', 'SBI Bank', '202cb962ac59075b964b07152d234b70'),
(14, '8013740244', '4536436457675756', 'Debolina Dhara', 567, '2022-04-24', 'Allabahad Bank', '202cb962ac59075b964b07152d234b70'),
(16, '9076521099', '5465767687697867', 'Tiyasha Dey', 744, '2022-04-23', 'SBI Bank', 'acf4b89d3d503d8252c9c4ba75ddbf6d'),
(27, '7990837112', '6376537684638783', 'Monali Ghosh', 123, '2022-06-19', 'Allabahad Bank', '202cb962ac59075b964b07152d234b70'),
(30, '9748836183', '6477488374347847', 'Suvankar Roy Goswami', 123, '2022-02-19', 'Allabahad Bank', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tran_id` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `cardno` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tran_id`, `method`, `cardno`, `phone`, `datetime`, `status`, `purpose`, `amount`) VALUES
('1273859147', 'Wallet', '9748836183', '9748836183', '20-12-2021 20:55:42 pm', 'Failed', 'Money Transfer', ' '),
('1967484039', 'Debit', '6477488374347847', '9748836183', '20-12-2021 20:48:05 pm', 'Success', 'Wallet Recharge', '122'),
('75719926', 'Wallet', '9748836183', '9748836183', '20-12-2021 13:08:04 pm', 'Failed', 'Money Transfer', 'Insufficient wallet balance');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `document` varchar(50) NOT NULL,
  `card_no` varchar(15) NOT NULL,
  `datetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone`, `dob`, `gender`, `document`, `card_no`, `datetime`) VALUES
(37, 'Rahul', 'Bose', 'rahul@gmail.com', '8845377839', '1995-07-07', 'female', 'Aadhaar Card', '598278251218', '24-09-2021 00:22:59 am'),
(42, 'Rajesh', 'nag', 'rajeshnag123@gmail.com', '7885645366', '1984-03-25', 'Male', 'Pan Card', '637388263286', '25-09-2021 01:16:31 am'),
(44, 'Suvankar', 'roy Goswami', 'suvankarroygoswami@gmail.com', '9007414136', '1997-07-01', 'Male', 'Aadhaar Card', '998899889899', '25-09-2021 17:43:00 pm'),
(51, 'Ratul', 'roy', 'ratulroy@gmail.com', '6644882000', '1987-08-25', 'Male', 'Aadhaar Card', '888000898989', '25-09-2021 18:12:18 pm'),
(55, 'Monali', 'Ghosh', 'monali123Ghosh@gmail.com', '7990837112', '1995-02-09', 'Female', 'Aadhaar Card', '900227781211', '25-09-2021 18:55:59 pm'),
(60, 'Sonali', 'polley', 'sonali@gmail.com', '6700012364', '1990-02-09', 'Female', 'Aadhaar Card', '899001224374', '28-09-2021 11:27:38 am'),
(66, 'Suvankar', 'Goswami', 'SI2021IBM01417@smartinternz.com', '9748836183', '1997-07-01', 'Male', 'Aadhaar Card', '889003445618', '28-09-2021 11:28:57 am'),
(81, 'Gopal', 'Goswami', 'Gopal123@gmail.com', '7887363566', '1994-07-08', 'Male', 'Aadhaar Card', '736473463742', '23-10-2021 13:10:35 pm'),
(95, 'Shovan', 'Ghosh', 'sovanghosh569@gmail.com', '8967104727', '1996-02-02', 'Male', 'Aadhaar Card', '635472684274', '23-10-2021 17:27:40 pm'),
(110, 'Debolina', 'Dhara', 'debolina@gmail.com', '8013740244', '1997-03-14', 'Female', 'Aadhaar Card', '664534534343', '28-10-2021 16:41:33 pm'),
(127, 'Tiyasha', 'Dey', 'tiyasha@gmail.com', '9076521099', '1995-07-15', 'Female', 'Aadhaar Card', '676576587878', '28-10-2021 21:32:29 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(7) NOT NULL,
  `document` varchar(20) NOT NULL,
  `card_no` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `byname` varchar(50) NOT NULL,
  `datetime` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `fname`, `lname`, `email`, `phone`, `dob`, `gender`, `document`, `card_no`, `password`, `byname`, `datetime`) VALUES
(110, 'Debolina', 'Dhara', 'debolina@gmail.com', '8013740244', '1997-03-14', 'Female', 'Aadhaar Card', '664534534343', '827ccb0eea8a706c4c34a16891f84e7b', 'Mr. Ghosh', '28-10-2021 16:42:41 pm'),
(55, 'Monali', 'Ghosh', 'monali123Ghosh@gmail.com', '7990837112', '1995-02-09', 'Female', 'Aadhaar Card', '900227781211', '827ccb0eea8a706c4c34a16891f84e7b', 'suvankar', '14-10-2021 12:29:16 pm'),
(66, 'Suvankar', 'Goswami', 'SI2021IBM01417@smartinternz.com', '9748836183', '1997-07-01', 'Male', 'Aadhaar Card', '889003445618', '827ccb0eea8a706c4c34a16891f84e7b', 'suvankar', '28-09-2021 11:53:12 am'),
(44, 'Suvankar', 'roy Goswami', 'suvankarroygoswami@gmail.com', '9007414136', '1997-07-01', 'Male', 'Aadhaar Card', '998899889899', '827ccb0eea8a706c4c34a16891f84e7b', 'Mr. Ghosh', '25-09-2021 17:46:19 pm'),
(127, 'Tiyasha', 'Dey', 'tiyasha@gmail.com', '9076521099', '1995-07-15', 'Female', 'Aadhaar Card', '676576587878', '827ccb0eea8a706c4c34a16891f84e7b', 'Mr. Ghosh', '28-10-2021 21:36:02 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_history`
--

CREATE TABLE `user_login_history` (
  `id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_history`
--

INSERT INTO `user_login_history` (`id`, `phone`, `datetime`) VALUES
(39, '7990837112', '02-12-2021 13:17:22 pm'),
(40, '9748836183', '03-12-2021 00:08:57 am'),
(41, '7990837112', '03-12-2021 00:10:18 am'),
(42, '7990837112', '19-12-2021 16:50:12 pm'),
(43, '7990837112', '20-12-2021 08:57:14 am'),
(44, '7990837112', '20-12-2021 09:13:21 am'),
(45, '7990837112', '20-12-2021 09:47:06 am'),
(46, '7990837112', '20-12-2021 09:52:29 am'),
(47, '7990837112', '20-12-2021 11:39:03 am'),
(48, '9748836183', '20-12-2021 11:44:22 am'),
(49, '7990837112', '20-12-2021 11:47:45 am'),
(50, '9748836183', '20-12-2021 11:52:19 am'),
(51, '7990837112', '20-12-2021 11:55:11 am'),
(52, '9748836183', '20-12-2021 12:53:38 pm'),
(53, '9748836183', '20-12-2021 20:38:39 pm'),
(54, '9748836183', '20-12-2021 20:54:38 pm');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `phone`, `balance`) VALUES
(4, '7990837112', 166),
(5, '9748836183', 251),
(6, '9007414136', 0),
(7, '8013740244', 0),
(8, '9076521099', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_statement`
--

CREATE TABLE `wallet_statement` (
  `tran_id` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `datetime` varchar(200) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet_statement`
--

INSERT INTO `wallet_statement` (`tran_id`, `phone`, `datetime`, `purpose`, `amount`) VALUES
('1054479363', '7990837112', '20-12-2021 12:52:53 pm', 'Debit', '1'),
('1551431586', '9748836183', '20-12-2021 12:57:52 pm', 'Credit', '12'),
('1570398767', '7990837112', '20-12-2021 12:25:08 pm', 'Credit', '12'),
('1666434470', '7990837112', '20-12-2021 12:30:24 pm', 'Debit', '100'),
('1735244939', '7990837112', '20-12-2021 12:27:14 pm', 'Debit', '12'),
('1967484039', '9748836183', '20-12-2021 20:48:05 pm', 'Credit', '122'),
('697595251', '9748836183', '20-12-2021 12:55:57 pm', 'Debit', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`time`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardno` (`cardno`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardno` (`cardno`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD UNIQUE KEY `tran_id` (`tran_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `card_no` (`card_no`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_login_history`
--
ALTER TABLE `user_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `wallet_statement`
--
ALTER TABLE `wallet_statement`
  ADD UNIQUE KEY `tran_id` (`tran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `user_login_history`
--
ALTER TABLE `user_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
