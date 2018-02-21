-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2018 at 10:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikimina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(0, 'administrator', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contribution`
--

CREATE TABLE `contribution` (
  `contribution_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `amount` int(20) NOT NULL,
  `bankslip` varchar(250) NOT NULL,
  `cont_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contribution`
--

INSERT INTO `contribution` (`contribution_id`, `member_id`, `amount`, `bankslip`, `cont_date`, `status`) VALUES
(10, 1, 54, 'fdfa', '0000-00-00', 'Approved'),
(11, 20, 10000, 'dr32da', '2018-02-21', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_interest` int(20) NOT NULL,
  `payment_date` date NOT NULL,
  `request_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `staff_id`, `member_id`, `amount`, `amount_interest`, `payment_date`, `request_date`, `status`) VALUES
(47, 0, 1, 11200, 12, '2018-12-12', '2018-02-21', 'accepted'),
(48, 0, 20, 22400, 12, '2018-12-12', '2018-02-21', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `type` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `bdate`, `username`, `password`, `phone`, `address`, `email`, `gender`, `status`, `type`) VALUES
(1, 'Nelson', '2000-01-03', 'nelson', '123', 34958354, 'kicukiro', 'nelson@gmail.com', 'M', 'member', 'member'),
(2, 'karenzi', '1993-01-06', 'karenzi', '123', 534552, 'kanombe', 'karenzi@gmail.com', 'M', 'staff', 'member'),
(19, 'eric kalisa', '2012-02-04', 'erika', '123', 2147483647, 'kickiro/kic', 'eric@gmail.com', 'F', 'staff', 'member'),
(20, 'david eric', '2012-02-04', 'dav2', '123', 2147483647, 'kigali', 'dev@gmail.com', 'M', 'member', 'member'),
(21, 'test one', '0000-00-00', 'tet', '123', 898883434, 'kickafe', 'test@gmail.com', 'M', 'waiting', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `ploan`
--

CREATE TABLE `ploan` (
  `loan_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `bankslip` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `rem_amount` int(20) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ploan`
--

INSERT INTO `ploan` (`loan_id`, `staff_id`, `member_id`, `bankslip`, `amount`, `rem_amount`, `payment_date`, `status`) VALUES
(1, 0, 20, 'faewr', 1000, 21400, '2018-02-21', 'waiting'),
(2, 0, 1, 'fern', 3000, 8200, '2018-02-21', 'accepted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contribution`
--
ALTER TABLE `contribution`
  ADD PRIMARY KEY (`contribution_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `ploan`
--
ALTER TABLE `ploan`
  ADD PRIMARY KEY (`loan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contribution`
--
ALTER TABLE `contribution`
  MODIFY `contribution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ploan`
--
ALTER TABLE `ploan`
  MODIFY `loan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
