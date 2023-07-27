-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 09:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `audiotb`
--

CREATE TABLE `audiotb` (
  `aid` int(100) NOT NULL,
  `audio` varchar(500) NOT NULL,
  `singer` varchar(200) NOT NULL,
  `releaseyear` varchar(20) NOT NULL,
  `movie` varchar(200) NOT NULL,
  `songname` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audiotb`
--

INSERT INTO `audiotb` (`aid`, `audio`, `singer`, `releaseyear`, `movie`, `songname`) VALUES
(11, 'y2mate.com - Aashiq Banaya Apne Lofi remix  Bolliwood lofi song  After Night  Slow and reverb.mp3', 'himesh rashmiyaa', '2005-01-02', 'ashiq', 'ashiq banaya'),
(12, 'y2mate.com - Arcade x Milne Hai Mujhse Aayi Chillout Mashup  AB AMBIENTS  2021  Muzik Blasters.mp3', 'arjith singh', '2016-02-22', 'ashiqui 2', 'milne he mujse aayi');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `rid` int(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`rid`, `username`, `password`) VALUES
(5, 'admin', 'admin'),
(6, 'sid1', 'sid1'),
(7, 'sac1', 'sac1');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `rid` int(50) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audiotb`
--
ALTER TABLE `audiotb`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiotb`
--
ALTER TABLE `audiotb`
  MODIFY `aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logintb`
--
ALTER TABLE `logintb`
  MODIFY `rid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `logintb` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
