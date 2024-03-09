-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 10:45 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevotting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `Id` int(20) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Age` int(30) NOT NULL,
  `postId` varchar(23) NOT NULL,
  `plofile` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `NID` varchar(16) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Id`, `Firstname`, `LastName`, `Age`, `postId`, `plofile`, `DateOfBirth`, `NID`, `status`) VALUES
(2, 'SHIKAMUSENGE', 'Philemon', 23, '1', 'sample.jpg', '2000-12-15', '1200080137900043', 1),
(4, 'NIYIKIZA', 'Lilliane', 22, '1', 'IMG-20221219-WA0005.jpg.', '2002-04-12', '1200037569689676', 1),
(5, 'TUYISENGE', 'Remy', 24, '2', 'IMG-20221015-WA0009.jpg', '1998-02-23', '12397478', 1),
(7, 'KWIZERA', 'Elissa', 34, '2', 'IMG-20220801-WA0004.jpg', '2001-02-03', '1200189004567', 1),
(8, 'HOGOZA', 'Peace', 22, '2', 'IMG-20221019-WA0067.jpg', '2023-03-16', '120073345677', 1),
(9, 'HOGOZA', 'Peace', 22, '2', 'IMG-20220728-WA0007.jpg', '2023-03-16', '120073345677', 1),
(10, 'MURENGEZI', 'MURENGEZI', 23, '3', 'IMG-20230112-WA0000.jpg', '1998-02-11', '11974658678989', 1),
(11, 'Kevin', 'Kevin', 21, '4', 'IMG-20221124-WA0019.jpg', '2023-03-09', '1200365748930394', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postId` int(20) NOT NULL,
  `postName` varchar(20) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `postName`, `Description`) VALUES
(1, 'Grid-President', 'Head of Student Union'),
(2, 'Vice president', 'President assistent'),
(3, 'Minister in charge o', 'Eduction support officer'),
(4, 'Minister-Sport', 'Minister in charge of Sport');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `userName`, `password`) VALUES
(1, 'philemon@gmail.com', '$2y$10$hKVDnc/5RjvVnqZqey3xPetvr4c1iArIW4Vx1bm5GwOgLox.SE5tO');

-- --------------------------------------------------------

--
-- Table structure for table `votte`
--

CREATE TABLE IF NOT EXISTS `votte` (
  `Id` int(20) NOT NULL,
  `candidateId` int(20) NOT NULL,
  `votterId` int(20) NOT NULL,
  `postId` int(20) NOT NULL,
  `pts` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votte`
--

INSERT INTO `votte` (`Id`, `candidateId`, `votterId`, `postId`, `pts`) VALUES
(1, 8, 3, 2, 1),
(2, 2, 3, 1, 1),
(3, 2, 3, 1, 1),
(4, 4, 5, 1, 1),
(5, 7, 5, 2, 1),
(6, 10, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `votters`
--

CREATE TABLE IF NOT EXISTS `votters` (
  `Id` int(11) NOT NULL,
  `NID` int(16) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `Age` int(3) NOT NULL COMMENT 'Date of Birth',
  `Date of Birth` date NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votters`
--

INSERT INTO `votters` (`Id`, `NID`, `firstname`, `lastName`, `Age`, `Date of Birth`, `userName`, `password`) VALUES
(1, 2354673, 'NTAKIRUTIMANA', 'Sabin', 22, '2023-03-08', 'philemon@gmail.com', '123'),
(2, 12453774, 'MUSILIMU', 'Sabin', 22, '2023-03-09', 'philemon@gmail.com', '$2y$10$ivO858pYO6A7EY2Osbmv/uTZiVdHRdzmYDH9zc/pMPybIyXu5N2UO'),
(3, 1236475, 'KAMUMPA', 'Allen', 21, '2023-03-30', 'phile@lion', '$2y$10$EmEIaBlvptyqpyUsapFItOaAzV56sZTo3U5vLwg45p7nVXkrtMIMG'),
(4, 2147483647, 'NTAKIRUTIMANA', 'Sabin', 22, '2001-03-08', 'kevin@gmail.com', '$2y$10$0AUNi8fpZoeljp/Jp6kIOuaWSLHst7h29h4vCMC4/F3JvzC3rjjQC'),
(5, 2147483647, 'NTAKIRUTIMANA', 'Sabin', 22, '2023-03-10', 'sabin@gmail.com', '$2y$10$TJVJX4SafWWZP0/HX4y8v.EiBuR8zwzqTleApTKyqdnJd8xalZ7Fm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `votte`
--
ALTER TABLE `votte`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `candidateId` (`candidateId`),
  ADD KEY `votterId` (`votterId`),
  ADD KEY `postId` (`postId`);

--
-- Indexes for table `votters`
--
ALTER TABLE `votters`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `votte`
--
ALTER TABLE `votte`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `votters`
--
ALTER TABLE `votters`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
