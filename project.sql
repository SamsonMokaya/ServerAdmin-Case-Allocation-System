-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 01:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedcases`
--

CREATE TABLE `assignedcases` (
  `id` int(255) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lawyerid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignedcases`
--

INSERT INTO `assignedcases` (`id`, `civilianid`, `casetype`, `casecategory`, `status`, `lawyerid`) VALUES
(1, 5, 'family', 'Divorce', 'starting', 6);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `caseid` int(11) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`caseid`, `civilianid`, `casetype`, `casecategory`, `date`, `status`) VALUES
(2, 5, 'family', 'Divorce', '2020-04-16', 'starting');

-- --------------------------------------------------------

--
-- Table structure for table `civilian_biodata`
--

CREATE TABLE `civilian_biodata` (
  `userid` int(255) NOT NULL,
  `nationalid` varchar(255) NOT NULL,
  `passportnumber` varchar(255) DEFAULT NULL,
  `criminalrecord` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `civilian_biodata`
--

INSERT INTO `civilian_biodata` (`userid`, `nationalid`, `passportnumber`, `criminalrecord`, `status`) VALUES
(0, '36924374', '', '2', 'pro-bono'),
(0, '36924374', '', '2', 'paying'),
(5, '36924374', '', '2', 'paying');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_biodata`
--

CREATE TABLE `lawyer_biodata` (
  `userid` int(255) NOT NULL,
  `successfulcases` varchar(255) NOT NULL,
  `failedcases` varchar(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_biodata`
--

INSERT INTO `lawyer_biodata` (`userid`, `successfulcases`, `failedcases`, `casetype`, `casecategory`) VALUES
(6, '65', '21', 'family', 'Divorce');

-- --------------------------------------------------------

--
-- Table structure for table `pendingcases`
--

CREATE TABLE `pendingcases` (
  `id` int(255) NOT NULL,
  `civilianid` int(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `casecategory` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lawyerid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `usertype`) VALUES
(5, 'luke', 'luke@strath.edu', '827ccb0eea8a706c4c34a16891f84e7b', 'civilian'),
(6, 'will', 'will@strath.edu', '827ccb0eea8a706c4c34a16891f84e7b', 'lawyer'),
(7, 'admin', 'admin@strath.edu', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedcases`
--
ALTER TABLE `assignedcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`caseid`);

--
-- Indexes for table `pendingcases`
--
ALTER TABLE `pendingcases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedcases`
--
ALTER TABLE `assignedcases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `caseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendingcases`
--
ALTER TABLE `pendingcases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
