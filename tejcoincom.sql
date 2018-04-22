-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 12:37 AM
-- Server version: 5.5.52-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tejcoincom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE `admin_setting` (
  `id` int(11) NOT NULL,
  `Setting_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_setting`
--

INSERT INTO `admin_setting` (`id`, `Setting_name`, `setting_value`) VALUES
(1, 'product1price', '40000'),
(2, 'product2price', '35000'),
(3, 'product3price', '1000'),
(4, 'product4price', '4000'),
(5, 'product5price', '2000'),
(6, 'product6price', '700'),
(7, 'transfer_exchange', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Bank_Details`
--

CREATE TABLE `Bank_Details` (
  `id` int(11) NOT NULL,
  `User_email` varchar(100) NOT NULL,
  `Holder_Name` varchar(100) NOT NULL,
  `AC_Number` varchar(100) NOT NULL,
  `IFCA_Code` varchar(50) NOT NULL,
  `Bank_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sellTejRequest`
--

CREATE TABLE `sellTejRequest` (
  `id` int(11) NOT NULL,
  `User_email` varchar(50) NOT NULL,
  `Amount` varchar(10) NOT NULL,
  `Way` varchar(20) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `Sender_Email` varchar(50) NOT NULL,
  `Receiver_email` varchar(100) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `Amount` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Transaction_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `Sender_Email`, `Receiver_email`, `txn_id`, `Amount`, `Description`, `Transaction_Date`) VALUES
(1, 'kishanpatelbca96@gmail.com', '-', 'Buy Product :- 16355', '1000', 'Bluetooth Purchsed ', '2018-04-20 23:45:52'),
(2, 'kishanpatelbca96@gmail.com', 'a@asdasd.nl', '4926747187', '10', '10Send To a@asdasd.nl', '2018-04-21 03:13:58'),
(3, 'kishanpatelbca96@gmail.com', 'a@asdasd.nl', '', '0.2', 'Commission cut to transfer 10 Tej to a@asdasd.nl', '2018-04-21 03:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `User_email` varchar(200) NOT NULL,
  `Paypal_email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Balance` varchar(10) NOT NULL DEFAULT '0',
  `Phone_Number` varchar(12) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Account_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Account_status` varchar(10) NOT NULL,
  `RandomKey` varchar(11) NOT NULL,
  `ForgetPassRandomKey` varchar(11) NOT NULL,
  `Kyc_details` varchar(20) NOT NULL DEFAULT 'Unlock',
  `Bank_Details` varchar(20) NOT NULL DEFAULT 'Unlock'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `First_name`, `Last_name`, `User_email`, `Paypal_email`, `Password`, `Balance`, `Phone_Number`, `City`, `Country`, `Account_created`, `Account_status`, `RandomKey`, `ForgetPassRandomKey`, `Kyc_details`, `Bank_Details`) VALUES
(1, 'Kishan', 'Patel', 'kishanpatelbca96@gmail.com', 'kishanpatelbca96@gmail.com', '25d55ad283aa400af464c76d713c07ad', '19989.8', '+91992436137', 'Surat', 'India', '2018-04-21 03:13:58', 'Active', '5385706528', '', 'Unlock', 'Unlock'),
(2, 'a', 'a', 'a@asdasd.nl', 'a@asdasd.nl', '25d55ad283aa400af464c76d713c07ad', '10', '+91992436137', 'Surat', 'India', '2018-04-21 03:13:58', 'Active', '5958102933', '', 'Lock', 'Unlock');

-- --------------------------------------------------------

--
-- Table structure for table `User_Kyc`
--

CREATE TABLE `User_Kyc` (
  `id` int(11) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `Document1` varchar(100) NOT NULL,
  `Document2` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_Kyc`
--

INSERT INTO `User_Kyc` (`id`, `User_Email`, `Document1`, `Document2`, `Status`) VALUES
(1, 'a@asdasd.nl', 'process.png', 'Untitled.png', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `User_shopping_details`
--

CREATE TABLE `User_shopping_details` (
  `id` int(11) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Shopping_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User_shopping_details`
--

INSERT INTO `User_shopping_details` (`id`, `User_Email`, `Product`, `Model`, `Color`, `Price`, `Shopping_Date`) VALUES
(1, 'kishanpatelbca96@gmail.com', 'Bluetooth', 'Sony', 'black', '1000', '2018-04-20 23:45:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_setting`
--
ALTER TABLE `admin_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `Bank_Details`
--
ALTER TABLE `Bank_Details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellTejRequest`
--
ALTER TABLE `sellTejRequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User_Kyc`
--
ALTER TABLE `User_Kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User_shopping_details`
--
ALTER TABLE `User_shopping_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_setting`
--
ALTER TABLE `admin_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Bank_Details`
--
ALTER TABLE `Bank_Details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sellTejRequest`
--
ALTER TABLE `sellTejRequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `User_Kyc`
--
ALTER TABLE `User_Kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `User_shopping_details`
--
ALTER TABLE `User_shopping_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
