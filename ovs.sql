-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `vid` varchar(10) NOT NULL,
  `admin_name` char(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `gender` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`vid`, `admin_name`, `pwd`, `mobile`, `gender`) VALUES
('ABC7985642', 'Mihir Mehta', 'mihir', 6879642130, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `vid` varchar(10) NOT NULL,
  `Eid` int(5) NOT NULL,
  `cname` char(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `gender` char(7) NOT NULL,
  `dob` date NOT NULL,
  `status` char(8) NOT NULL,
  `votes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`vid`, `Eid`, `cname`, `pwd`, `mobile`, `gender`, `dob`, `status`, `votes`) VALUES
('CCH7165483', 3, 'Chhaganbhai Chhatrivala', 'mihir', 8855805085, 'Male', '1991-07-25', 'notvoted', 2),
('FBG9875635', 1, 'Vijay Kumar', 'mihir', 9658741023, 'Male', '2001-01-05', 'Voted', 5),
('JMB8564792', 3, 'James Bond', 'mihir', 9999555333, 'Male', '1998-04-09', 'notvoted', 1),
('MKR2143659', 1, 'Manoj Kumar', 'mihir', 6897540230, 'Female', '1998-06-16', 'Voted', 1),
('NCI6598234', 1, 'Neema Chaudhari', 'mihir', 7458213690, 'Female', '1994-12-06', 'Voted', 2),
('NTH7925861', 3, 'Natasha Hulk', 'mihir', 9080889998, 'Female', '1993-07-23', 'notvoted', 1),
('RCM7985261', 1, 'Ram Charan', 'mihir', 7098561428, 'Male', '1998-05-20', 'Voted', 2),
('TSH1385294', 3, 'Thor Sherlok', 'mihir', 7878878877, 'Male', '1995-10-25', 'notvoted', 0),
('VND1478529', 3, 'Vin Diesel', 'mihir', 8956237040, 'Male', '1979-08-17', 'notvoted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_list`
--

CREATE TABLE `election_list` (
  `Eid` int(10) NOT NULL,
  `Ename` varchar(50) NOT NULL,
  `Ccount` int(10) NOT NULL,
  `Vcount` int(10) NOT NULL,
  `Sdate` datetime NOT NULL,
  `Edate` datetime NOT NULL,
  `Estatus` text NOT NULL,
  `EwinnerId` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election_list`
--

INSERT INTO `election_list` (`Eid`, `Ename`, `Ccount`, `Vcount`, `Sdate`, `Edate`, `Estatus`, `EwinnerId`) VALUES
(1, 'Test 1', 5, 50, '2021-04-08 12:00:00', '2021-04-09 12:00:00', 'Ended', 'FBG9875635'),
(2, 'Test 2', 2, 50, '2021-04-03 17:00:00', '2021-04-07 17:00:00', 'Ended', 'No Candies'),
(3, 'Test 3', 5, 20, '2021-04-09 13:00:00', '2021-04-11 12:00:00', 'Started', NULL),
(4, 'Test 4', 3, 10, '2021-04-16 12:12:00', '2021-04-23 12:12:00', 'Notstarted', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `vid` varchar(10) NOT NULL,
  `Eid` int(5) NOT NULL,
  `vname` char(30) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `gender` char(7) NOT NULL,
  `dob` date NOT NULL,
  `status` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`vid`, `Eid`, `vname`, `pwd`, `mobile`, `gender`, `dob`, `status`) VALUES
('AKM1564203', 1, 'Akshay Kumar', 'mihir', 6498743020, 'Male', '1997-11-07', 'Voted'),
('AKP8975221', 1, 'Arjun Kapoor', 'mihir', 7895463211, 'Male', '2001-06-01', 'Voted'),
('BMG8264719', 3, 'Brahmputri Ganga', 'mihir', 8788778070, 'Female', '1997-10-15', 'Voted'),
('FBG9875634', 1, 'Ravi Teja', 'mihir', 7994561430, 'Male', '1998-03-13', 'Voted'),
('MMS9157364', 3, 'Mohan Mishra', 'mihir', 9966906096, 'Male', '1996-03-07', 'Voted'),
('NNV9345681', 3, 'Neenaben Navratan', 'mihir', 7946132058, 'Female', '1995-04-07', 'Voted'),
('RCM7985262', 1, 'Neha kakar', 'mihir', 7894561429, 'Female', '1998-05-20', 'Voted'),
('RRV7391582', 3, 'Ramdas Ravani', 'mihir', 6566556050, 'Male', '1990-04-09', 'Voted'),
('SMA4682597', 3, 'Sonia Mirza', 'mihir', 9390309933, 'Female', '1992-07-30', 'Voted'),
('SON2014635', 1, 'Sonam Kapoor', 'mihir', 5689741230, 'Female', '2000-05-10', 'Voted'),
('TNI2145798', 2, 'Tony Stark', 'mihir', 6985742013, 'Male', '1990-06-14', 'notvoted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `election_list`
--
ALTER TABLE `election_list`
  ADD PRIMARY KEY (`Eid`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election_list`
--
ALTER TABLE `election_list`
  MODIFY `Eid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
