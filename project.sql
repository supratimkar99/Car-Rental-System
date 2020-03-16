-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 04:29 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cancelbooking` (IN `id` INT)  NO SQL
delete from booking
where bookingid=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`) VALUES
('supratimkar', 'test1234', 'Supratim'),
('syedinayath', 'test1234', 'Syed');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `model` varchar(20) NOT NULL,
  `bookingfrom` date NOT NULL,
  `bookingto` date NOT NULL,
  `licenseno` varchar(15) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `email`, `model`, `bookingfrom`, `bookingto`, `licenseno`, `amount`) VALUES
(1, 'mrinal6gupta@gmail.com', 'Convertible', '2019-10-17', '2019-10-19', 'AS2320160087412', 5400),
(2, 'agarwalved43@gmail.com', 'Compact', '2019-10-17', '2019-10-18', 'AS2320190087412', 1400),
(4, 'vishal66@gmail.com', 'Compact', '2019-10-20', '2019-10-20', 'KA1020160047412', 700),
(5, 'dhanush7865@gmail.com', 'SUV', '2019-10-21', '2019-10-23', 'KA0820160024812', 3600),
(6, 'rickmuk98@gmail.com', 'Compact', '2019-10-27', '2019-10-29', 'AS1120170054781', 2100),
(7, 'vjk99@gmail.com', 'Sedan', '2019-10-30', '2019-10-31', 'KA1720180054743', 1800),
(8, 'nikhilsingh4@gmail.com', 'Sedan', '2019-10-27', '2019-10-30', 'KL1120180021765', 3600),
(9, 'dhanush7865@gmail.com', 'SUV', '2019-10-31', '2019-11-02', 'KA0820160024812', 3600),
(11, 'mrinal6gupta@gmail.com', 'Luxury', '2019-11-10', '2019-11-11', 'AS2320160087412', 4000),
(12, 'dhiraj99sah@gmail.com', 'Luxury', '2019-11-11', '2019-11-12', 'AS2320170025812', 4000),
(13, 'surgithm76@gmail.com', 'Van', '2019-11-09', '2019-11-10', 'KA1120180047854', 3000),
(16, 'nikhilsingh4@gmail.com', 'Compact', '2019-11-11', '2019-11-12', 'KA052016008457', 1400),
(17, 'nikhilsingh4@gmail.com', 'Luxury', '2019-12-08', '2019-12-09', 'KL1120180021765', 4000),
(18, 'vjk99@gmail.com', 'Luxury', '2019-12-08', '2019-12-10', 'KA1720180054743', 6000),
(19, 'nikhilsingh4@gmail.com', 'Compact', '2019-12-08', '2019-12-09', 'KA0520150054632', 1400),
(22, 'deba1234@hotmail.com', 'SUV', '2020-03-19', '2020-03-20', 'KA2015002875442', 2400);

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `cancelbooking` AFTER DELETE ON `booking` FOR EACH ROW update models
set timesbooked = timesbooked - 1
where name=old.model
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `newbooking` AFTER INSERT ON `booking` FOR EACH ROW update models
set timesbooked = timesbooked + 1
where name=new.model
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`name`, `email`, `phone`, `dob`, `password`) VALUES
('Vedika Agarwal', 'agarwalved43@gmail.com', '9954785641', NULL, 'tskrvce'),
('Debajit Paul', 'deba1234@hotmail.com', '8638090869', '2003-10-11', 'chelseasucks'),
('Dhanush S', 'dhanush7865@gmail.com', '9739851841', NULL, 'ece3434'),
('Dhiraj Sah', 'dhiraj99sah@gmail.com', '7002645872', NULL, 'manu1779'),
('Mrinal Gupta', 'mrinal6gupta@gmail.com', '8712554978', NULL, 'jorhat54'),
('Naba Kishore Sharma', 'nabak97@gmail.com', '8845978585', '1997-02-20', 'madrid13'),
('Nikhil Singh', 'nikhilsingh4@gmail.com', '9946493712', NULL, 'mahala099'),
('Rohan Mukherjee', 'rickmuk98@gmail.com', '8585414177', NULL, 'kol1998'),
('Sajal Kar', 'sajal.kar123@gmail.com', '9987542578', '1970-02-07', 'abcd1234'),
('Sujata Kar', 'sujata.kar1967@gmail.com', '9435333514', '1967-05-06', 'sajalkar'),
('Surgith M', 'surgithm76@gmail.com', '9954544564', NULL, 'cooldude69'),
('Vishal Dadlani', 'vishal66@gmail.com', '7854221654', NULL, 'newyork99'),
('Vaibhav JK', 'vjk99@gmail.com', '8875621237', NULL, 'liverpool18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Rating` text NOT NULL,
  `Comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `Email`, `Rating`, `Comment`) VALUES
(1, 'nikhilsingh4@gmail.com', '5', 'Very Nice'),
(2, 'dhanush7865@gmail.com', '3', 'Average'),
(5, 'sujata.kar1967@gmail.com', '5', 'NEED SOME MORE IMPROVEMENTS');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `name` varchar(20) NOT NULL,
  `rate` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `timesbooked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`name`, `rate`, `units`, `timesbooked`) VALUES
('Compact', 700, 4, 5),
('Convertible', 1800, 2, 1),
('Luxury', 2000, 2, 4),
('Sedan', 900, 3, 2),
('SUV', 1200, 4, 3),
('Van', 1500, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `bookingid` int(11) NOT NULL,
  `nameoncard` varchar(40) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `expmonth` int(2) NOT NULL,
  `expyear` int(4) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`bookingid`, `nameoncard`, `cardno`, `expmonth`, `expyear`, `amount`) VALUES
(1, 'Mrinal Gupta', '2102887541236584', 12, 2022, 5400),
(2, 'Vedika Agarwal', '5045221600398785', 6, 2023, 1400),
(3, 'Surgith M', '5444032187526545', 8, 2020, 1400),
(4, 'Vishal Dadlani', '6013875466520031', 12, 2021, 700),
(5, 'Dhanush S', '5024332587524520', 8, 2021, 3600),
(6, 'Rohan Mukherjee', '5103720003998475', 12, 2020, 2100),
(7, 'Vaibhav Kulkarni', '7545008214743290', 4, 2024, 1800),
(8, 'Nikhil Singh', '6502332187546821', 10, 2022, 3600),
(9, 'Dhanush S', '5024332587524520', 8, 2021, 3600),
(10, 'Nikhil Singh', '6502332187546821', 10, 2022, 1800),
(11, 'Mrinal Gupta', '2102887541236584', 12, 2022, 4000),
(12, 'Dhiraj Sah', '4412580230227479', 4, 2022, 4000),
(13, 'Surgith M', '5444032187526545', 8, 2020, 3000),
(14, 'Nikhil Singh', '5103720003997276', 12, 2020, 1800),
(15, 'Nikhil Singh', '5103720003998784', 12, 2020, 2100),
(16, 'Nikhil Singh', '5103720003998784', 12, 2020, 1400),
(17, 'Nikhil Singh', '6502332187546821', 10, 2022, 4000),
(18, 'Vaibhav JK', '7545008214743290', 4, 2024, 6000),
(19, 'Nikhil Singh', '9024534266785464', 12, 2020, 1400),
(20, 'kaushik dey', '4855457545754578', 12, 2024, 1800),
(21, 'Lion Das', '4584659965487412', 12, 2020, 4900),
(22, 'Roniii', '1234567898765432', 12, 2029, 2400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`bookingid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
