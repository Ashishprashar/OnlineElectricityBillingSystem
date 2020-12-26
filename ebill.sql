-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 12:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebill`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(20) DEFAULT NULL,
  `com_id` int(3) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `com_id`, `password`, `region`) VALUES
('companyA', 111, 'admin', 'A'),
('companyB', 112, 'admin', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `name` varchar(20) NOT NULL,
  `c_id` int(3) NOT NULL,
  `meter_id` varchar(3) NOT NULL,
  `branch_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`name`, `c_id`, `meter_id`, `branch_id`) VALUES
('Admin', 11, '098', 102),
('sdvs', 12, '453', 101),
('AASA', 13, '111', 101),
('sdjhcsd', 14, '144', 101),
('ggg', 22, '545', 201);

-- --------------------------------------------------------

--
-- Table structure for table `consumption_record`
--

CREATE TABLE `consumption_record` (
  `record_id` int(3) NOT NULL,
  `month` varchar(20) NOT NULL,
  `c_id` int(3) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `unit_consumed` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumption_record`
--

INSERT INTO `consumption_record` (`record_id`, `month`, `c_id`, `status`, `unit_consumed`) VALUES
(1, 'jan', 12, 1, 990),
(3, 'jan', 12, 1, 990),
(4, 'feb', 11, 0, 910),
(5, 'jan', 22, 0, 910),
(7, 'feb', 11, 0, 980),
(8, 'feb', 12, 1, 90),
(9, 'jan', 13, 1, 990),
(10, 'feb', 13, 0, 990),
(11, 'jan', 14, 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `name` varchar(20) NOT NULL,
  `r_id` int(3) NOT NULL,
  `b_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`name`, `r_id`, `b_id`) VALUES
('A', 1, 101),
('A', 2, 102),
('B', 3, 201),
('B', 4, 202);

-- --------------------------------------------------------

--
-- Table structure for table `supply_branch`
--

CREATE TABLE `supply_branch` (
  `name` varchar(20) NOT NULL,
  `region` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `b_id` int(3) NOT NULL,
  `rate` int(2) NOT NULL,
  `com_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply_branch`
--

INSERT INTO `supply_branch` (`name`, `region`, `password`, `b_id`, `rate`, `com_id`) VALUES
('Branch1', 'A', 'admin', 101, 10, 111),
('Branch2', 'A', 'admin', 102, 11, 111),
('Branch1', 'B', 'admin', 201, 10, 112),
('Branch2', 'B', 'admin', 202, 11, 112);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `consumption_record`
--
ALTER TABLE `consumption_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `supply_branch`
--
ALTER TABLE `supply_branch`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `com_id` (`com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumption_record`
--
ALTER TABLE `consumption_record`
  MODIFY `record_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumption_record`
--
ALTER TABLE `consumption_record`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `consumer` (`c_id`) ON DELETE SET NULL;

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `b_id` FOREIGN KEY (`b_id`) REFERENCES `supply_branch` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
