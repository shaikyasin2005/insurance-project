-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 08:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8*/;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_policy`
--

CREATE TABLE `customer_policy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relation` varchar(60) NOT NULL,
  `Sdate` date NOT NULL,
  `Pname` varchar(60) NOT NULL,
  `SumAssured` varchar(50) NOT NULL,
  `PremiumPerYear` varchar(50) NOT NULL,
  `PolicyCategory` varchar(50) NOT NULL,
  `PolicyTerm` int(20) NOT NULL,
  `ProfitRate` int(20) NOT NULL,
  `InstallmentType` varchar(60) NOT NULL,
  `InstallmentAmount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_policy`
--

INSERT INTO `customer_policy` (`id`, `name`, `relation`, `Sdate`, `Pname`, `SumAssured`, `PremiumPerYear`, `PolicyCategory`, `PolicyTerm`, `ProfitRate`, `InstallmentType`, `InstallmentAmount`) VALUES
(3, 'asad', 'wife', '2017-09-08', 'Natural Death ', '1000000 ', '1500 ', 'Single ', 30, 30, 'Annually ', '36000 '),
(5, 'Uzair', 'Son', '2017-09-11', 'Accidental Hospitalization ', '100000 ', '800 ', 'Single/Jointee ', 40, 25, 'Annually ', '24000 ');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `receiver` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `comment`, `receiver`) VALUES
(4, 'asad', 'asad@gmail.com', 'i want to know about installment.', 'admin'),
(5, 'adeel', 'adeel@yahoo.com', 'i want to know about policies.', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `SumAssured` varchar(100) NOT NULL,
  `PremiumPerYear` varchar(100) NOT NULL,
  `PolicyCategory` varchar(60) NOT NULL,
  `PolicyTerm` int(60) NOT NULL,
  `ProfitRate` int(100) NOT NULL,
  `InstallmentAmount` int(100) NOT NULL,
  `InstallmentType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `plan_name`, `SumAssured`, `PremiumPerYear`, `PolicyCategory`, `PolicyTerm`, `ProfitRate`, `InstallmentAmount`, `InstallmentType`) VALUES
(6, 'Health', '200000', '1000', 'Single/Jointee', 25, 16, 14000, 'Half Annually'),
(9, 'Accidental Hospitalization', '100000', '800', 'Single/Jointee', 40, 25, 24000, 'Annually'),
(10, 'Natural Death', '1000000', '1500', 'Single', 30, 30, 36000, 'Annually');

-- --------------------------------------------------------

--
-- Table structure for table `policy_installment`
--

CREATE TABLE `policy_installment` (
  `id` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Pname` varchar(50) NOT NULL,
  `InstallmentAmount` int(30) NOT NULL,
  `InstallmentYear` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy_installment`
--

INSERT INTO `policy_installment` (`id`, `Name`, `Pname`, `InstallmentAmount`, `InstallmentYear`) VALUES
(1, ' asad ', '  Natural Death', 36000, '2017-09-09'),
(2, ' asad ', ' Natural Death  ', 36000, '2018-09-09'),
(3, ' Uzair ', ' Accidental Hospitalization  ', 24000, '2017-09-11'),
(4, ' Uzair ', ' Accidental Hospitalization', 24000, '2018-09-10'),
(5, ' Uzair ', ' Accidental Hospitalization  ', 24000, '2019-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `num` varchar(12) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `manager_name` varchar(50) NOT NULL,
  `agent_name` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `num`, `userType`, `manager_name`, `agent_name`, `address`) VALUES
(1, 'asad', 'asad@gmail.com', 'qwerty', '03033332221', 'user', '', 'Usama', 'sultanabad karachi'),
(2, 'Uzair', 'uzair@gmail.com', 'qwerty', '03012525254', 'user', '', 'Adnan', 'f10 markaz, islamabad'),
(3, 'Atiqa', 'atiqa@gmail.com', 'qwerty', '03441234567', 'manager', '', '', 'raiwind lahore'),
(5, 'Adnan', 'adnam123@yahoo.com', 'qwerty', '03123456789', 'agent', 'Atiqa', '', 'supply abbottabad'),
(6, 'Usama', 'usama@yahoo.com', 'qwerty', '03123456775', 'agent', 'Atiqa', '', 'sadar karachi'),
(7, 'Anza', 'anza@yahoo.com', 'qwerty', '03331112223', 'user', '', 'Adnan', 'murrey road rawalpindi'),
(8, 'sohail', 'sohailqureshi718@gmail.com', 'qwerty', '03111222333', 'admin', '', '', 'islamabad'),
(10, 'Ali khan', 'ali123@yahoo.com', 'qwerty', '03123451989', 'manager', '', '', 'bari imam islamabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_policy`
--
ALTER TABLE `customer_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_installment`
--
ALTER TABLE `policy_installment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_policy`
--
ALTER TABLE `customer_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `policy_installment`
--
ALTER TABLE `policy_installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
